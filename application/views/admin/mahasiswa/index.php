<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('mahasiswa');?>"><strong>Mahasiswa Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('mahasiswa/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<a href="<?php echo site_url('mahasiswa/nonaktif');?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Lihat Data Nonaktif</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('mahasiswa/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Mahasiswa </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
			</div>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
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
		</br>
		<?php echo $pagination;?>
		<table class="datatable-1 table table-bordered" id="dataTable" width="100%" cellspacing="0">
			<thead style="text-align='center'">
				<tr>
					<th >No.</th>
					<th >NIM</th>
					<th >Nama</th>
					<th >Jenis Kelamin</th>
					<th >Alamat</th>
					<th ><center>Aksi</center></th>
				</tr>
			</thead>
			
			<?php $no=0; foreach($mahasiswa as $row): $no++;?>
			<tr>
				<td ><?php echo $no+$page; ?></td>
				<td ><?php echo $row->nim;?></td>
				<td ><?php echo $row->nama_mahasiswa;?></td>
				<td ><?php echo $row->jenis_kelamin;?></td>
				<td ><?php echo $row->alamat_asli;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('mahasiswa/detail/'.$row->nim);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->nama_mahasiswa;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('mahasiswa/edit/'.$row->nim);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->nama_mahasiswa;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('mahasiswa/hapus/'.$row->nim);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->nama_mahasiswa;?>"
							>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		</br>
			<?php echo $pagination;?>
	</div>
</div>

	<script>
		$(document).ready(function() {
			$('.datatable-1').dataTable();
			$('.dataTables_paginate').addClass("btn-group datatable-pagination");
			$('.dataTables_paginate > a').wrapInner('<span />');
			$('.dataTables_paginate > a:first-child').append('<i class="icon-chevron-left shaded"></i>');
			$('.dataTables_paginate > a:last-child').append('<i class="icon-chevron-right shaded"></i>');
		} );
	</script>