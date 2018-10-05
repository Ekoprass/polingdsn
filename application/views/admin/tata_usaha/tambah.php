 <div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('tata_usaha');?>"><strong>Tata Usaha Aktif</strong></a> &nbsp
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
		<div>
			<div>
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title"><span class="glyphicon glyphicon-inbox"/></span> Form Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<!--<div class="form-group well">
						<form action="<?php echo site_url('tata_usaha/importdata')?>" method="post" enctype="multipart/form-data" role="form">
								<input class="btn btn-flat btn-md btn-success" type="submit"  value="Import" name="save"/>
							<div class="col-sm-5">
									<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
							</div>-->
						</form>
						</div>
						<form class="form-horizontal" role="form" action="<?php echo site_url('tata_usaha/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Tata usaha</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_tu" placeholder="ID tata usaha">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Tata usaha</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_tu" placeholder="Nama tata usaha">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tempat Lahir</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="tmpt_lahir" placeholder="Tempat Lahir">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Tanggal Lahir</label>
								<div class="col-lg-10">
									<input required type="text" name="tgl_lahir" id="tanggal" class="form-control" placeholder="Tanggal Lahir">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-lg-10">
									<select required name="jenis_kelamin" class="form-control">
										<option value="">Jenis Kelamin ?</option>
										<option value="L">Laki - Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">agama</label>
								<div class="col-sm-10">
									<select required name="agama" class="form-control">
										<option value="">Agama Anda?</option>
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
								<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
								<div class="col-sm-10">
									<select required name="pendidikan" class="form-control">
										<option value="">Pendidikan terakhir Anda?</option>
										<option value="SMA">SMA dan sederajatnya</option>
										<option value="D1">Diploma 1</option>
										<option value="D2">Diploma 2</option>
										<option value="D3">Diploma 3</option>
										<option value="D4">Diploma 4</option>
										<option value="S1">Strata 1</option>
										<option value="S2">Strata 2</option>
										<option value="S3">Strata 3</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Status Kepegawaian</label>
								<div class="col-sm-10">
									<select required name="status_kepegawaian" class="form-control">
										<option value="">Status Kepegawaian ?</option>
										<option value="pns">PNS</option>
										<option value="gtt">GTT</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Status Keanggotaan</label>
								<div class="col-sm-10">
									<select required name="status_keanggotaan" class="form-control">
										<option value="">Status Keanggotaan ?</option>
										<option value="aktif">Aktif</option>
										<option value="nonaktif">Non Aktif</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Alamat</label>
								<div class="col-sm-10">
									<textarea type="text" class="form-control" name="alamat" placeholder="Alamat"></textarea>
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