<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('mahasiswa/nonaktif');?>"><strong>Mahasiswa Nonaktif</strong></a> &nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Aktifkan</strong>
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
		<?php $id=$mahasiswa['nim'];?>
		<form class="form-horizontal" action="<?php echo site_url('mahasiswa/aktifkan_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">NIM</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $mahasiswa['nim'];?>" type="text" name="nim" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama </label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $mahasiswa['nama_mahasiswa'];?>" type="text" name="nama_mahasiswa" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">JK</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $mahasiswa['jenis_kelamin'];?>" type="text" name="jenis_kelamin" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $mahasiswa['alamat_asli'];?>" type="text" name="alamat_asli"  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $mahasiswa['status'];?>" type="text" name="status"  class="form-control">
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Aktifkan</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
