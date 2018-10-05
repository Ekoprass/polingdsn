
<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas/nonaktif');?>"><strong>Kelas Nonaktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
			<a href="<?php echo site_url('kelas');?>" class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Lihat Data Aktif</a>
	</div>
	<div class="panel-body">		
	<!--pesan error/sukses/dll-->
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
		<?php //echo $pagination;?>	
		<table class="table table-hover table-responsive table-bordered">
			<thead>
				<tr>
					<th >No.</th>
					<th >Id Kelas</th>
					<th >Tahun</th>
					<th >Kelas</th>
					<th >DPA</th>
					<th >Jumlah Mahasiswa</th>
					<th ><center>Aksi</center></th>
				</tr>
			</thead>
			<?php $no=0; foreach($kelas as $row): $no++;?>
			<tr>
				<td ><?php echo $no//+$page;?></td>
				<td ><?php 
						$id_kelas= $row->id_kelas;
						echo $id_kelas; ?>
				</td>
				<td ><?php echo $row->tahun;?></td>
				<td><?php echo $row->semester." - ".$row->nama_prodi." - ".$row->ruang;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td ><?php 
						$jumlahsiswa=$this->m_kelas->jumlah_siswa($id_kelas);
						echo $jumlahsiswa;
					?>
				</td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('kelas/detailnon/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="#"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="Edit Hanya Untuk Data Aktif"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('kelas/aktifkan/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Aktifkan '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-success" aria-label="Left Align">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
			</table>
			<?php //echo $pagination;?>
	</div>
</div>