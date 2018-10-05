<div class="panel panel-info side-body">
	<?php $id=$dosen['id_dosen'];?>
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dashboard/profil/'.$id);?>"><strong><?php echo $dosen['nama_dosen'];?></strong></a> &nbsp
			<span class="fa fa-angle-double-right"/></span></span> <strong> Detail</strong>
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
	<form class="form-horizontal" action="<?php echo site_url('dosen/tambah_proses');?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">NIP / ID Dosen</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $dosen['id_dosen'];?>" type="text" name="id_dosen" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $dosen['nama_dosen'];?>" type="text" name="nama_dosen" maxlength=90 class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Tempat Lahir</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $dosen['tmpt_lahir'];?>" type="text" name="tempat" maxlength=90 class="form-control">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Tanggal Lahir</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $dosen['tgl_lahir'];?>" type="date" name="tgl_lahir" id="tanggal" class="form-control"/>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Jenis Kelamin</label>
			<div class="col-sm-9">
				<select required disabled name="jenis_kelamin" class="form-control">
					<option value=""><?php echo $dosen['jenis_kelamin'];?> </option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Agama</label>
			<div class="col-sm-9">
				<select required disabled name="agama" class="form-control">
					<option value=""><?php echo $dosen['agama'];?> </option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
			<div class="col-sm-9">
				<select required disabled name="pendidikan" class="form-control">
					<option value=""><?php echo $dosen['pendidikan_akhir'];?> </option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Kepegawaian</label>
			<div class="col-sm-9">
				<select required disabled name="status" class="form-control">
					<option value=""><?php echo $dosen['status_kepegawaian'];?> </option>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">Alamat</label>
			<div class="col-sm-9">
				<input required disabled value="<?php echo $dosen['alamat'];?>" class="form-control" name="alamat">
			</div>
		</div>
		<div class="col-sm-20">
			<div class="well well-sm"> 
				<div class="form-group">
					<div class="col-sm-offset-10 col-sm-5">
						<a href="<?php echo site_url('dashboard/profil/'.$id);?>" class="btn btn-primary"><i class="glyphicon glyphicon-backward"/></i> Kembali</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>