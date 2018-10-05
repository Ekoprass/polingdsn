<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('mahasiswa/nonaktif');?>"><strong>Mahasiswa Nonaktif</strong></a> &nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Detail</strong>
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
	<form class="form-horizontal" action="<?php echo site_url('mahasiswa/tambah_proses');?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">NIM</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['nim'];?>" type="text" name="nim" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['nama_mahasiswa'];?>" type="text" name="nama" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenim Kelamin</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['jenis_kelamin'];?>" type="text" name="jenis_kelamin" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['tempat_lahir'];?>" type="text" name="tempat_lahir" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['tgl_lahir'];?>" type="text" name="tgl_lahir" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['agama'];?>" type="text" name="agama" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat Asli</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['alamat_asli'];?>" type="text" name="alamat_asli" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat Tinggal/Kos</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['alamat_tinggal'];?>" type="text" name="alamat_tinggal" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Telepon</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['phone'];?>" type="text" name="phone" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sekolah Asal</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['sekolah_asal'];?>" type="text" name="sekolah_asal" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun Masuk</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['tahun_masuk'];?>" type="text" name="tahun_masuk" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ibu</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['nama_ibu'];?>" type="text" name="nama_ibu" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Bapak</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['nama_bapak'];?>" type="text" name="nama_bapak" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mahasiswa['status'];?>" type="text" name="status" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm"> 
					<div class="form-group">
						<div class="col-sm-offset-10 col-sm-5">
							<a href="<?php echo site_url('mahasiswa/nonaktif');?>" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
						</div>
					</div>
				</div>
			</div>
		</form>
</div>