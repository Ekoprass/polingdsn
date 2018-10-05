<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Dosen</span>
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
							<div class="title">From Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?php echo site_url('dosen/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Dosen</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_dosen" placeholder="ID Dosen">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Dosen</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_dosen" placeholder="Nama Dosen">
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
									<input required type="date" name="tgl_lahir" id="tanggal" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Jenis Kelamin</label>
								<div class="col-sm-10">
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
									<input type="text" class="form-control" name="alamat" placeholder="Alamat">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Tambah</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>