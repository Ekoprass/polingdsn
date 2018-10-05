<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Laporan.xls");
?>
<table border="1">
	<tr>
		<th>No</th>
		<th>ID Dosen</th>
		<th>Nama Dosen</th>
		<th>Nilai</th>
	</tr>
	<?php
		$no=0; foreach($polling as $row): $no++;
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $row->id_dosen;?></td>
		<td><?php echo $row->nama_dosen;?></td>
		<td><?php $ceknilai=$this->m_polling->ceknilai_dosen($row->id_dosen)->result();
			$nil=array();
			$n=0;  foreach($ceknilai as $rows ): $n++;
			$id_kriteria_nilai=$rows->kriteria_nilai;
			$jumlah_nilai=$this->m_polling->jumlah_nilai($id_kriteria_nilai)->row_array();
			$nil[]=$jumlah_nilai['kriteria_nilai'];
			//echo $jumlah_nilai['kriteria_nilai'];
			endforeach;
			$jumlah=array_sum($nil);
			$ceknilai2=$this->m_polling->ceknilai2_dosen($row->id_dosen)->result();
			$nil2=array();
			$n=0;  foreach($ceknilai2 as $rows2 ): $n++;
			$id_kriteria_nilai2=$rows2->kriteria_nilai;
			$jumlah_nilai2=$this->m_polling->jumlah_nilai($id_kriteria_nilai2)->row_array();
			$nil2[]=$jumlah_nilai2['kriteria_nilai'];
			//echo $jumlah_nilai['kriteria_nilai'];
			endforeach;
			$jumlah=array_sum($nil);
			$jumlah2=array_sum($nil2);
			echo $jumlah-$jumlah2; ?></td>
	</tr>
	<?php endforeach;?>
</table>