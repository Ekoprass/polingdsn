
<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas/nonaktif');?>"><strong>Kelas Nonaktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('kelas/nonaktif');?>" class="btn btn-default"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('kelas/carinon');?>" method="post">
			<div class="form-group">
				<label>Cari Kelas </label>
				<input type="text" class="form-control" placeholder="masukkan id/prodi" name="carinon">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
	</div>
	<div class="panel-body">		
	<!--pesan error/sukses/dll-->
		<?php $data=$ketemu;
		if ($data!=null){?>
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $ketemu;?>
			</div>
		<?php
		}
		?>
		<table class="table table-hover table-responsive table-bordered">
			<thead>
				<tr>
					<th >No.</th>
					<th >Id Kelas</th>
					<th >Tahun</th>
					<th >Kelas</th>
					<th >Status</th>
					<th >DPA</th>
					<th >Jumlah Siswa</th>
					<th colspan="3" align="center">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($kelas as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php 
						$id_kelas= $row->id_kelas;
						echo $id_kelas; ?>
				</td>
				<td ><?php echo $row->tahun;?></td>
				<td><?php echo $row->semester." - ".$row->nama_prodi." - ".$row->ruang;?></td>
				<td ><?php echo $row->status;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td ><?php 
						$jumlahsiswa=$this->m_kelas->jumlah_siswa($id_kelas);
						echo $jumlahsiswa;
					?>
				</td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('kelas/detail/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('kelas/edit/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a disabled href="<?php echo site_url('kelas/aktifkan/'.$row->id_kelas);?>"
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
	</div>
</div>