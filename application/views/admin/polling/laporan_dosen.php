<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Laporan Penilaian</strong></a>
		</h4>
    </div>
    <div class="panel-body">	
		</br>
		<div class="col-md-4">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th colspan=2><center>Dosen</center></th>
						</tr>
						<tr>
							<th width=125>ID Dosen</th>
							<td><?php echo $dosen['id_dosen'];?></td>
						</tr>
						<tr>
							<th width=125>Nama Dosen</th>
							<td><?php echo $dosen['nama_dosen'];?></td>
						</tr>
				</table>
		</div>
	</div>
	<?php
		$data=$this->session->flashdata('m_sukses');
		if ($data!=null){?>
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $data;?>
			</div>
		<?php
		}
		$data=$this->session->flashdata('m_eror');
		if ($data!=null){?>
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $this->session->flashdata('m_eror');?>
			</div>
		<?php
		}
		?>
	<!--bawah panel / tambah dan cari-->
	<div class="panel-body">		
	<!--pesan error/sukses/dll-->
		</br>
		<table class="table table-hover table-responsive table-bordered">
				<tr>
					<th >No</th>
					<th >ID Tahun Semester</th>
					<th >NIlai</th>
					<th >Kategori</th>
					<th ><center>Opsi</center></th>
				</tr>
					<?php $no=0; foreach ($tahun_semester as $row): $no++ ;?>
				<tr>
					<td ><?php echo $no?></td>
					<?php $jumlah_mhs_penilai=$this->m_laporan->mhs_menilai_dosen_thn($row->id_dosen, $row->tahun)->result(); 
					foreach ($jumlah_mhs_penilai as $key) {
						$rata=$row->nilai/$key->jumlah_penilai;?>
					<td ><?php echo "Tahun Ajaran ".substr($row->tahun,0,4)." Semester ".substr($row->tahun,4,2);?></td>
					<td ><?php echo $rata?></td>
					<td ><?php echo get_kategori($rata);?></td>
					<td width=150 align = "center">
					<a href="<?php echo  site_url('polling/detail_hasil_dosen/'.$row->id_dosen.'/'.$row->tahun);?>"
						class='tooltipsku' 
						data-toggle='tooltip' 
						data-placement='top' 
						title=""
						>
						<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
						</button>
					</a>
				</td>
			<?php } ?>
				</tr>
			<?php endforeach; ?>
		</table>
		</br>
			
<?php 
$ceknilai=$this->m_polling->ceknilai_dosen($row->id_dosen)->result();
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
				
				
 ?>
	</div>
</div>