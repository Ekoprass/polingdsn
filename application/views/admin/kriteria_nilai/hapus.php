<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('kriteria_nilai');?>"><strong>Nilai Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Hapus</strong>
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
	</br>
	</br>
	<?php $id=$kriteria_nilai['id_kriteria_nilai'];?>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('kriteria_nilai/hapus_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Kriteria Nilai</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $kriteria_nilai['id_kriteria_nilai'];?>" type="text" name="id_kriteria_nilai" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kriteria Nilai</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $kriteria_nilai['kriteria_nilai'];?>" type="text" name="kriteria_nilai" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-9">
					<select disabled name="keterangan" class="form-control">
						<option value="<?php echo $kriteria_nilai['keterangan'];?>"><?php echo $kriteria_nilai['keterangan'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-9">
					<select disabled name="kategori" class="form-control">
						<option value="<?php echo $kriteria_nilai['kategori'];?>"><?php echo $kriteria_nilai['kategori'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<select disabled name="status" class="form-control">
						<option value="<?php echo $kriteria_nilai['status'];?>"><?php echo $kriteria_nilai['status'];?> </option>
					</select>
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
