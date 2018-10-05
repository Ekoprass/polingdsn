<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas/nonaktif');?>"><strong>Kelas Nonaktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span><strong> Aktifkan</strong>
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
	<?php $id=$kelas['id_kelas'];?>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('kelas/aktif_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Kelas</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['id_kelas'];?>" type="text" name="id_kelas" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['tahun'];?>" type="text" name="tahun" class="form-control"  size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Semester</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['semester'];?>" type="text" name="semester" class="form-control" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Prodi</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['id_prodi'];?>" type="text" name="id_prodi" class="form-control"  size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">ID DPA</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['dpa'];?>" type="text" name="dpa" class="form-control" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Ruang</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['ruang'];?>" type="text" name="ruang" class="form-control" size="12" maxlength="20" >
				</div>
			</div>			
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Aktifkan</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
