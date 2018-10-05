<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('soal');?>"><strong>Soal Aktif</strong></a>
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
	<?php $id=$soal['id_soal'];?>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('soal/hapus_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Soal</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $soal['id_soal'];?>" type="text" name="id_soal" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Soal</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $soal['soal'];?>" type="text" name="soal" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<select disabled name="status" class="form-control">
						<option value="<?php echo $soal['status'];?>"><?php echo $soal['status'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-9">
					<select disabled name="kategori" class="form-control">
						<option value="<?php echo $soal['kategori'];?>"><?php echo $soal['kategori'];?> </option>
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
