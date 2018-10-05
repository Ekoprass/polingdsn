<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-list"/></span> &nbsp <a href="<?php echo site_url('prodi/nonaktif');?>"><strong>Prodi Nonaktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail Nonaktif</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->		
	<?php
	$data=$this->session->flashdata('message');
	if ($data!=null){?>
		<div class="alert alert-danger" role="alert">
			<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
			<span class="sr-only">Error:</span>
			<?php echo $this->session->flashdata('message');?>
		</div>
	<?php
	}
	?>
	<?php echo validation_errors();?>
	</br>
	</br>
	<form class="form-horizontal" action="<?php echo site_url('prodi/tambah_proses');?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Id Jurusan</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $prodi['id_prodi'];?>" type="text" name="id_prodi" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nama Jurusan</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $prodi['nama_prodi'];?>" type="text" name="nama_prodi" maxlength=90 class="form-control">
			</div>
		</div>
	</form>
</div>