<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dosen/nonaktif');?>"><strong>Dosen Nonaktif</strong></a> &nbsp
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
		<?php $id=$dosen['id_dosen'];?>
		<form class="form-horizontal" action="<?php echo site_url('dosen/aktifkan_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Dosen</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['id_dosen'];?>" type="text" name="id_dosen" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama Dosen</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['nama_dosen'];?>" type="text" name="nama_dosen" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['tmpt_lahir'];?>" type="text" name="tmpt_lahir" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['tgl_lahir'];?>" type="date" name="tgl_lahir"  class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['jenis_kelamin'];?>" type="text" name="jenis_kelamin" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['agama'];?>" type="text" name="agama" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Akhir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['pendidikan_akhir'];?>" type="text" name="pendidikan_akhir" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status Kepegawaian</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['status_kepegawaian'];?>" type="text" name="status_kepegawaian" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status Keanggotaan</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['status_keanggotaan'];?>" type="text" name="status_keanggotaan" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['alamat'];?>" type="text" name="alamat" class="form-control"/>
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Aktifkan</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
