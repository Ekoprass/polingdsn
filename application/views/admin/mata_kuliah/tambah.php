<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-book"/></span> &nbsp <a href="<?php echo site_url('mata_kuliah');?>"><strong>Mata Kuliah Aktif</strong></a>&nbsp
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
						<form class="form-horizontal" role="form" action="<?php echo site_url('mata_kuliah/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Mata Kuliah</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_mk" placeholder="Id Mata Kuliah">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Mata Kuliah</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_mk" placeholder="Nama Mata Kuliah">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Deskripsi</label>
								<div class="col-sm-10">
									<textarea class="form-control" name="deskripsi_mk" placeholder="Deskripsi"></textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jumlah Jam</label>
								<div class="col-lg-10">
									<input required type="int" name="jml_jam" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jumlah SKS</label>
								<div class="col-lg-10">
									<input required type="int" name="jml_sks" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Semester</label>
								<div class="col-sm-10">
									<select required name="smt" class="form-control">
										<option value="">Semester Berapa?</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Status</label>
								<div class="col-sm-10">
									<select required name="status_mk" class="form-control">
										<option value="">Status Mata Kuliah ?</option>
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
</div>