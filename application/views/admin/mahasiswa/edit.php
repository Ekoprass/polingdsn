<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('mahasiswa');?>"><strong>Mahasiswa Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Edit</strong>
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
		<?php $id=$mahasiswa['nim'];?>
		</br>
		</br>	
		<form class="form-horizontal" action="<?php echo site_url('mahasiswa/edit_proses/'.$id);?>" method="post" enctype="multipart/form-data">
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
					<select name="jenis_kelamin" class="form-control">
						<option value="<?php echo $mahasiswa['jenis_kelamin'];?>"><?php echo $mahasiswa['jenis_kelamin'];?></option>
						<option value="L">Laki - Laki</option>
						<option value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-9">
					<input type="text" name="tempat_lahir" class="form-control" value="<?php echo $mahasiswa['tempat_lahir'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input type="text" name="tgl_lahir" id="tanggal" class="form-control" value="<?php echo $mahasiswa['tgl_lahir'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<select name="agama" class="form-control">
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
					<input type="text" name="alamat_asli" class="form-control" value="<?php echo $mahasiswa['alamat_asli'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat Tinggal</label>
				<div class="col-sm-9">
					<input type="text" name="alamat_tinggal" class="form-control" value="<?php echo $mahasiswa['alamat_tinggal'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Telepon</label>
				<div class="col-sm-9">
					<input type="text" name="phone" class="form-control" value="<?php echo $mahasiswa['phone'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Sekolah Asal</label>
				<div class="col-sm-9">
					<input type="text" name="sekolah_asal" class="form-control" value="<?php echo $mahasiswa['sekolah_asal'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun Masuk</label>
				<div class="col-sm-9">
					<input type="text" name="tahun_masuk" class="form-control" value="<?php echo $mahasiswa['tahun_masuk'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Ibu</label>
				<div class="col-sm-9">
					<input type="text" name="nama_ibu" class="form-control" value="<?php echo $mahasiswa['nama_ibu'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Bapak</label>
				<div class="col-sm-9">
					<input type="text" name="nama_bapak" class="form-control" value="<?php echo $mahasiswa['nama_bapak'];?>">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<input type="text" name="status" class="form-control" value="<?php echo $mahasiswa['status'];?>">
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>