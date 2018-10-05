<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-font"/></span> &nbsp <a href="<?php echo site_url('pertanyaan');?>"><strong>Pertanyaan Aktif</strong></a>&nbsp
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
				<div class="card-body">
						<!--<div class="form-group well">
						<form action="<?php echo site_url('pertanyaan/importdata')?>" method="post" enctype="multipart/form-data" role="form">
								<input class="btn btn-flat btn-md btn-success" type="submit"  value="Import" name="save"/>
							<div class="col-sm-5">
									<input type="file" id="import" name="import" class="form-control" required="" placeholder="Pilih File" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"> 
							</div>
						</form>
						</div>-->
					<form class="form-horizontal" role="form" action="<?php echo site_url('pertanyaan/tambah_proses');?>" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label">ID Pertanyaan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="id_pertanyaan" placeholder="ID pertanyaan">
							</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label">Pertanyaan</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" name="pertanyaan" placeholder="pertanyaan">
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