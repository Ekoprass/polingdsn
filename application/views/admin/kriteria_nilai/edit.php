<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('kriteria_nilai');?>"><strong>Kriteria Nilai Aktif</strong></a>
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
	</br>
	</br>
	<?php $id=$kriteria_nilai['id_kriteria_nilai'];?>
	<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('kriteria_nilai/edit_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Kriteria Nilai</label>
				<div class="col-sm-9">
					<input disabled value="<?php echo $kriteria_nilai['id_kriteria_nilai'];?>" type="text" name="id_kriteria_nilai" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kriteria Nilai</label>
				<div class="col-sm-9">
					<select name="kriteria_nilai" class="form-control">
						<option value="<?php echo $kriteria_nilai['kriteria_nilai'];?>"><?php echo $kriteria_nilai['kriteria_nilai'];?> </option>
						<option value="4">4</option>
						<option value="3">3</option>
						<option value="2">2</option>
						<option value="1">1</option>
						<option value="0">0</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Keterangan</label>
				<div class="col-sm-9">
					<select name="keterangan" class="form-control">
						<option value="<?php echo $kriteria_nilai['keterangan'];?>"><?php echo $kriteria_nilai['keterangan'];?> </option>
						<option value="Sangat Baik">Sangat Baik</option>
						<option value="Baik">Baik</option>
						<option value="Cukup">Cukup</option>
						<option value="Tidak Baik">Tidak Baik</option>
						<option value="Sangat Tidak Baik">Sangat Tidak Baik</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kategori</label>
				<div class="col-sm-9">
					<select required name="kategori" class="form-control">
						<option value="<?php echo $kriteria_nilai['kategori'];?>"><?php echo $kriteria_nilai['kategori'];?></option>
						<option value="positif">Positif</option>
						<option value="negatif">Negatif</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<select required name="status" class="form-control">
						<option value="<?php echo $kriteria_nilai['status'];?>"><?php echo $kriteria_nilai['status'];?></option>
						<option value="aktif">Aktif</option>
						<option value="nonaktif">Non Aktif</option>
					</select>
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="edit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Edit</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>
</div>
