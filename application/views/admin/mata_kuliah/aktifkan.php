<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-book"/></span> &nbsp <a href="<?php echo site_url('mata_kuliah');?>"><strong>Mata Kuliah Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Aktifkan</strong>
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
		</br>
		</br>
		<?php $id=$mata_kuliah['id_mk'];?>
		<form class="form-horizontal" action="<?php echo site_url('mata_kuliah/aktifkan_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Mata Kuliah</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['id_mk'];?>" type="text" name="id_mk" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Mata Kuliah</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['nama_mk'];?>" type="text" name="nama_mk" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Deskripsi</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['deskripsi_mk'];?>" type="text" name="deskripsi_mk" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jumlah Jam</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['jml_jam'];?>" type="int" name="jml_jam"  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jumlah SKS</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['jml_sks'];?>" type="int" name="jml_sks" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Semester</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['smt'];?>" type="text" name="smt" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $mata_kuliah['status_mk'];?>" type="text" name="status" class="form-control"/>
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Aktifkan</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>