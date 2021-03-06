<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('kriteria_nilai');?>"><strong>Kriteria Nilai Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Tambah</strong>
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
						<div class="title"> Form Pengisian</div>
					</div>
				</div>
				<?php $no=$this->m_kriteria_nilai->getnomor(); ?>
				<div class="card-body">
						<div class="form-group well">
						<form action="<?php echo site_url('kriteria_nilai/importdata')?>" method="post" enctype="multipart/form-data" role="form">
								<input class="btn btn-flat btn-md btn-success" type="submit"  value="Import" name="save"/>
							<div class="col-sm-5">
									<input type="file" id="import" readonly name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
							</div>
						</form>
						</div>
					<form class="form-horizontal" role="form" action="<?php echo site_url('kriteria_nilai/tambah_proses');?>" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Kriteria Nilai</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="<?php echo $no; ?>" name="id_kriteria_nilai" placeholder="Id kriteria nilai">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Kriteria Nilai</label>
							<div class="col-sm-10">
								<select required name="kriteria_nilai" class="form-control">
									<option value="">Pilih Kriteria Nilai</option>
									<option value="4">4</option>
									<option value="3">3</option>
									<option value="2">2</option>
									<option value="1">1</option>
									<option value="0">0</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Keterangan</label>
							<div class="col-sm-10">
								<select required name="keterangan" class="form-control">
									<option value="">Pilih Keterangan</option>
									<option value="Sangat Baik">Sangat Baik</option>
									<option value="Baik">Baik</option>
									<option value="Cukup">Cukup</option>
									<option value="Tidak Baik">Tidak Baik</option>
									<option value="Sangat Tidak Baik">Sangat Tidak Baik</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Kategori</label>
							<div class="col-sm-10">
								<select required name="kategori" class="form-control">
									<option value="">Pilih Kategori</option>
									<option value="positif">Positif</option>
									<option value="negatif">Negatif</option>
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Status</label>
							<div class="col-sm-10">
								<select required name="status" class="form-control">
									<option value="">Pilih Status</option>
									<option value="aktif">Aktif</option>
									<option value="nonaktif">Non Aktif</option>
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