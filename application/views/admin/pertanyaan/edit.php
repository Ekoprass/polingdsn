<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-font"/></span> &nbsp <a href="<?php echo site_url('pertanyaan');?>"><strong>Pertanyaan Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Edit</strong>
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
	<?php $id=$pertanyaan['id_pertanyaan'];?>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('pertanyaan/edit_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Pertanyaan</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $pertanyaan['id_pertanyaan'];?>" type="text" name="id_pertanyaan" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">pertanyaan</label>
				<div class="col-sm-9">
					<input value="<?php echo $pertanyaan['pertanyaan'];?>" type="text" name="pertanyaan" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-9">
					<select name="kategori" class="form-control">
						<option value="<?php echo $pertanyaan['kategori'];?>"><?php echo $pertanyaan['kategori'];?> </option>
						<option value="positif">Positif</option>
						<option value="negatif">Negatif</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<select name="status" class="form-control">
						<option value="<?php echo $pertanyaan['status'];?>"><?php echo $pertanyaan['status'];?> </option>
						<option value="aktif">Aktif</option>
						<option value="nonaktif">Nonaktif</option>
					</select>
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
