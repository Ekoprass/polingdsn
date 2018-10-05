<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Tambah</strong>
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
		<div>
			<div>
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title"> Form Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" action="<?php echo site_url('kelas/tuambah/'.$ini);?>" method="post" enctype="multipart/form-data">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Kelas</label>
								<div class="col-sm-10">
									<input disabled type="text" name="idkelas" value="<?php echo $ini;?>" class="form-control">
								</div>
							</div>
							<input type="hidden" value="<?php echo $lama;?>" name="lama" />
							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun </label>
								<div class="col-lg-10">
									<input disabled type="text" name="tahun" value="<?php echo $tahun;?>" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Prodi</label>
								<div class="col-sm-10">
									<input disabled type="text" name="prodi" value="<?php echo $prodi;?>" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Semester</label>
								<div class="col-sm-10">
									<input disabled type="text" name="semester" value="<?php echo $semester;?>" class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">DPA</label>
								<div class="col-sm-10">
									<select required name="dpa" class="form-control">
										<option value="">Pilih DPA...</option>
										<?php
											foreach($dpa->result_array() as $d)
											{
												echo "<option value='".$d['id_dosen']."'> ".$d['id_dosen']." - ".$d['nama_dosen']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Status</label>
								<div class="col-sm-10">
									<input disabled type="text" name="status" value=<?php echo 'aktif';?> class="form-control">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Ruang</label>
								<div class="col-sm-10">
									<input disabled type="text" value="<?php echo $ruang;?>" name="ruang" class="form-control">
								</div>
							</div>
							<div class="col-sm-20">
								<div class="well well-sm">
									<div class="form-group">
											<div class="col-sm-offset-2 col-sm-5">
												<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah Kelas</button>
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
</div>