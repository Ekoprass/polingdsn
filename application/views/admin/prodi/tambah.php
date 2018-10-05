<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-th"/></span> &nbsp <a href="<?php echo site_url('prodi');?>"><strong>Prodi Aktif</strong></a>&nbsp
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
							<div class="title"><span class="glyphicon glyphicon-inbox"/></span> Form Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?php echo site_url('prodi/tambah_proses');?>" method="post">
							<div class="form-group">
								<label  for="inputEmail3" class="col-sm-2 control-label">ID Prodi</label>
								<div class="col-sm-10">
									<input maxlength="2" type="text" class="form-control" name="id_prodi" id="inputEmail3" placeholder="ID Prodi">
								</div>
							</div>
							<div class="form-group">
								<label for="inputPassword3" class="col-sm-2 control-label">Nama Prodi</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama_prodi" id="inputPassword3" placeholder="Nama Prodi">
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