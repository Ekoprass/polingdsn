<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Jadwal</span>
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
		<?php $id=$jadwal['id_jadwal'];?>
		<form class="form-horizontal" action="<?php echo site_url('jadwal/aktifkan_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Jadwal</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jadwal['id_jadwal'];?>" type="text" name="id_jadwal" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Kelas</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jadwal['id_kelas'];?>" type="text" name="id_kelas" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Hari</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jadwal['hari'];?>" type="text" name="hari" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jadwal['status'];?>" type="text" name="status" class="form-control"/>
				</div>
			</div>
			<div class="form-group well">
				<button class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Aktifkan</button>
				<a href="<?php echo site_url('jadwal/nonaktif');?>" class="btn btn-default">Kembali</a>
			</div>
		</form>
	</div>
</div>