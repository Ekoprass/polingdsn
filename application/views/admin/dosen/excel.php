<?php
header("content-type:Application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=dosen.xls");
?>
<table border="1">
	<tr>
		<th>No</th>
		<th>ID Dosen</th>
		<th>Nama Dosen</th>
		<th>Tempat Lahir</th>
		<th>Tanggal Lahir</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Pendidikan Akhir</th>
		<th>Status Kepegawaian</th>
		<th>Status Keanggotaan</th>
		<th>Alamat</th>
	</tr>
	<?php
		$dosen=$this->m_dosen->mek_data()->result();
		$no=0; foreach($dosen as $row): $no++;
	?>
	<tr>
		<td><?php echo $no;?></td>
		<td><?php echo $row->id_dosen;?></td>
		<td><?php echo $row->nama_dosen;?></td>
		<td><?php echo $row->tmpt_lahir;?></td>
		<td><?php echo $row->tgl_lahir;?></td>
		<td><?php echo $row->jenis_kelamin;?></td>
		<td><?php echo $row->agama;?></td>
		<td><?php echo $row->pendidikan_akhir;?></td>
		<td><?php echo $row->status_kepegawaian;?></td>
		<td><?php echo $row->status_keanggotaan;?></td>
		<td><?php echo $row->alamat;?></td>
	</tr>
	<?php endforeach;?>
</table>