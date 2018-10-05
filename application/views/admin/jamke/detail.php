<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Jam ke</span>
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

		<form class="form-horizontal" action="<?php echo site_url('jamke/tambah_proses');?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">Id Jam ke</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jamke['id_jam_ke'];?>" type="text" name="id_jam_ke" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jamke['nama'];?>" type="text" name="nama_" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Mulai</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jamke['jam_mulai'];?>" type="text" name="jam_mulai" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jam Selesai</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $jam_selesai['jam_selesai'];?>" type="text" name="jam_selesai" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jumlah SKS</label>
				<div class="col-sm-10">
					<input required disabled value="<?php echo $mata_kuliah['jml_sks'];?>" type="int" name="jml_sks" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Semester</label>
				<div class="col-sm-10">
					<select required disabled name="smt" class="form-control">
						<option value=""><?php echo $dosen['smt'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-10">
					<select required disabled name="status" class="form-control">
						<option value=""><?php echo $mata_kuliah['status_mk'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group well">
				<a href="<?php echo site_url('mata_kuliah');?>" class="btn btn-default">Kembali</a>
			</div>
		</form>
	</div>
</div>