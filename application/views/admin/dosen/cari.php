<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dosen');?>"><strong>Dosen Aktif</strong></a> &nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Cari</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('dosen');?>" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('dosen/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Dosen </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
			</div>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
	</div>
	<div class="panel-body">		
	<!--pesan error/sukses/dll-->
		<?php
		$data=$ketemu;
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
					<th >Id Dosen</th>
					<th >Nama Dosen</th>
					<th >Jenis Kelamin</th>
					<th >Status Kepegawaian</th>
					<th >Status Keanggotaan</th>
					<th ><center>Aksi</center></th>
				</tr>
			</thead>
			<?php $no=0; foreach($dosen as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_dosen;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td ><?php echo $row->jenis_kelamin;?></td>
				<td ><?php echo $row->status_kepegawaian;?></td>
				<td ><?php echo $row->status_keanggotaan;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('dosen/detail/'.$row->id_dosen);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->id_dosen;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('dosen/edit/'.$row->id_dosen);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->id_dosen;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('dosen/delete/'.$row->id_dosen);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->id_dosen;?>"
							>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
	</div>
</div>
