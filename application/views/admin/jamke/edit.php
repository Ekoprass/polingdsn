<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('jamke');?>"><strong>Jam Ke</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Edit</strong>
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
		<?php echo validation_errors();?>
		<?php $id=$jamke['id_jam_ke'];?>
		</br>
		</br>
		<form class="form-horizontal" action="<?php echo site_url('jamke/edit_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Jam ke</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jamke['id_jam_ke'];?>" type="text" name="id_mk" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-10">
					<input required value="<?php echo $jamke['nama'];?>" type="text" name="nama" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Mulai</label>
				<div class="col-sm-10">
					<input required value="<?php echo $jamke['jam_mulai'];?>" type="text" name="jam_mulai" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Selesai</label>
				<div class="col-sm-10">
					<input required value="<?php echo $jamke['jam_selesai'];?>" type="text" name="jam_selesai" class="form-control"/>
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</button>
								<a href="<?php echo site_url('jamke');?>" class="btn btn-default">Kembali</a>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>