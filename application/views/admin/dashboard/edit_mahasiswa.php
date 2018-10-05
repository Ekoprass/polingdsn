<div class="panel panel-info side-body">
	<?php $id=$mahasiswa['nim'];?>
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dashboard/profil/'.$id);?>"><strong><?php echo $mahasiswa['nama_mahasiswa'];?></strong></a> &nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Profil</strong>
		</h4>
    </div>
		<div class="well well-lg">
			&nbsp;
			&nbsp;
			<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('mahasiswa/editpass/'.$id);?>" method="post">
				<div class="form-group">
					<label class="control-label"> Username</label>
					<input required disabled value="<?php echo $mahasiswa['username'];?>" type="text" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
					<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password</label>
					<input required value="<?php echo $mahasiswa['password'];?>" type="password" name="password" class="form-control" size="18" maxlength="20" >
				<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</button>	
				</div>
			</form>
			</br>
			</br>
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
		<form class="form-horizontal" action="<?php echo site_url('mahasiswa/edit_proses2/'.$id);?>" method="post"enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">NIM</label>
				<div class="col-sm-9">
					<input type="text" name="nim" class="form-control" value="<?php echo $mahasiswa['nim'];?>" readonly="readonly">
				</div>
			</div>
			<div class="form-group">
			<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-9">
					<input type="text" name="nama_mahasiswa" class="form-control" value="<?php echo $mahasiswa['nama_mahasiswa'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-9">
					<select required name="jenis_kelamin" class="form-control" >
						<option value="<?php echo $mahasiswa['jenis_kelamin'];?>"><?php echo $mahasiswa['jenis_kelamin'];?></option>
						<option value="L">Laki-laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-9">
					<input required type="text" class="form-control" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-lg-2 control-label">Tanggal Lahir</label>
				<div class="col-lg-9">
					<input required type="date" name="tgl_lahir" id="tanggal" class="form-control" value="<?php echo $mahasiswa['tgl_lahir'];?>"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<select required name="agama" class="form-control">
						<option value="<?php echo $mahasiswa['agama'];?>"><?php echo $mahasiswa['agama'];?></option>
						<option value="Islam">Islam</option>
						<option value="Kristen">Kristen</option>
						<option value="Protestan">Protestan</option>
						<option value="Budha">Budha</option>
						<option value="Hindu">Hindu</option>
						<option value="Kepercayaan">Kepercayaan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat Asli</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="alamat_asli" value="<?php echo $mahasiswa['alamat_asli'];?>" />
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat Tinggal</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="alamat_tinggal" value="<?php echo $mahasiswa['alamat_tinggal'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">No.HP/Phone</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="phone" value="<?php echo $mahasiswa['phone'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sekolah Asal</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="sekolah_asal" value="<?php echo $mahasiswa['sekolah_asal'];?>" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ibu</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="nama_ibu" value="<?php echo $mahasiswa['nama_ibu'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ayah</label>
				<div class="col-sm-9">
					<input type="text" class="form-control" name="nama_bapak" value="<?php echo $mahasiswa['nama_bapak'];?>" >
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-5">
					<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Validasi</button>
				</div>
			</div>
		</form>
	</div>
</div>