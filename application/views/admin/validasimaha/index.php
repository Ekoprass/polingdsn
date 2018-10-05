<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<center><span class="glyphicon glyphicon-file"/></span>&nbsp;&nbsp;<strong> Harap Lengkapi Data Diri Anda Dengan Benar</strong></center>
		</h4>
    </div>
	<div class="side-body padding-top">
		<div class="row">
			<div class="col-sm-	6 col-xs-12">
				<div class="col-xs-12">
					<?php $nim=$mahasiswa['nim']; ?>
					<form class="form-horizontal" role="form" action="<?php echo site_url('validasi/validasi_proses/'.$nim);?>" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label">NIM</label>
							<div class="col-sm-10">
								<input type="text" name="nim" class="form-control" value="<?php echo $mahasiswa['nim'];?>" readonly="readonly">
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Nama</label>
							<div class="col-sm-10">
								<input type="text" name="nama_mahasiswa" class="form-control" value="<?php echo $mahasiswa['nama_mahasiswa'];?>">
							</div>
						</div>
						<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-10">
									<select required name="jenis_kelamin" class="form-control" >
										<option value="<?php echo $mahasiswa['jenis_kelamin'];?>"><?php echo $mahasiswa['jenis_kelamin'];?></option>
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tempat Lahir</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" name="tempat_lahir" value="<?php echo $mahasiswa['tempat_lahir'];?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Tanggal Lahir</label>
								<div class="col-lg-10">
									<input required type="date" name="tgl_lahir" id="tanggal" class="form-control" value="<?php echo $mahasiswa['tgl_lahir'];?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Agama</label>
								<div class="col-sm-10">
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
								<div class="col-sm-10">
									<input type="text" class="form-control" name="alamat_asli" value="<?php echo $mahasiswa['alamat_asli'];?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Alamat Tinggal</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="alamat_tinggal" value="<?php echo $mahasiswa['alamat_tinggal'];?>" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">No.HP/Phone</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="phone" value="<?php echo $mahasiswa['phone'];?>" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Sekolah Asal</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="sekolah_asal" value="<?php echo $mahasiswa['sekolah_asal'];?>" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ibu</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_ibu" value="<?php echo $mahasiswa['nama_ibu'];?>">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ayah</label>
								<div class="col-sm-10">
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
		</div>
	</div>
</div>