<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('mahasiswa');?>"><strong>Mahasiswa Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Tambah</strong>
		</h4>
    </div>
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
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title"><span class="glyphicon glyphicon-inbox"/></span> From Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<div class="form-group well">
						<form action="<?php echo site_url('mahasiswa/importdata')?>" method="post" enctype="multipart/form-data" role="form">
								<input class="btn btn-flat btn-md btn-success" type="submit"  value="Import" name="save"/>
							<div class="col-sm-5">
									<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
							</div>
						</form>
						</div>
						<form class="form-horizontal" role="form" action="<?php echo site_url('mahasiswa/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">NIM</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nim" placeholder="NIM mahasiswa" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Mahasiswa</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nama_mahasiswa" placeholder="Nama Mahasiswa" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-9">
									<select required name="jenis_kelamin" class="form-control" >
										<option value="">Jenis Kelamin ?</option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tempat Lahir</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="tempat_lahir" placeholder="Tempat Lahir Mahasiswa" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Tanggal Lahir</label>
								<div class="col-lg-9">
									<input required type="text" name="tgl_lahir" id="tanggal" class="form-control" placeholder="Tanggal Lahir Mahasiswa"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">agama</label>
								<div class="col-sm-9">
									<select required name="agama" class="form-control">
										<option value="">Agama mahasiswa?</option>
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
									<input type="text" class="form-control" name="alamat_asli" placeholder="Alamat Asli Mahasiswa" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Alamat Tinggal</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="alamat_tinggal" placeholder="Alamat Tinggal Mahasiswa" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">No.HP/Phone</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="phone" placeholder="No. HP/Phone Mahasiswa" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Sekolah Asal</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="sekolah_asal" placeholder="Sekolah Asal Mahasiswa" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun Masuk</label>
								<div class="col-sm-9">
									<select required name="tahun_masuk" class="form-control">
										<option>Tahun Masuk Mahasiswa?</option>
										<?php
											for($i=date('Y'); $i>=date('Y')-9; $i-=1){
												echo"<option value='$i'> $i </option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ibu</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nama_ibu" placeholder="Nama Ibu Mahasiswa">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Ayah</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" name="nama_bapak" placeholder="Nama Ayah Mahasiswa" >
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Status</label>
								<div class="col-sm-9">
									<select required name="status" class="form-control">
										<option value="">Status Mahasiswa</option>
										<option value="aktif">Aktif</option>
										<option value="nonaktif">Nonaktif</option>
									</select>
								</div>
							</div>
							<div class="col-sm-20">
								<div class="well well-sm">
									<div class="form-group">
											<div class="col-sm-offset-2 col-sm-5">
												<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
											</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>