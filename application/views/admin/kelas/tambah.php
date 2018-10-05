<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span><strong> Tambah</strong>
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
						<form class="form-horizontal" role="form" action="<?php echo site_url('kelas/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Kelas</label>
								<div class="col-sm-10">
									<input required type="text" class="form-control" readonly="readonly">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun </label>
								<div class="col-lg-10">
									<select required name="tahun" class="form-control">
										<option value="">Pilih tahun angkatan...</option>
										<?php
											for($i=date('Y')-5; $i<=date('Y')+5; $i+=1){
												echo"<option value='$i'> $i </option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Prodi</label>
								<div class="col-sm-10">
									<select required name="prodi" class="form-control">
										<option value="">Pilih prodi kelas...</option>
										<?php
											foreach($prodi->result_array() as $j)
											{
												echo "<option value='".$j['id_prodi']."'> ".$j['id_prodi']." - ".$j['nama_prodi']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Semester</label>
								<div class="col-sm-10">
									<select required name="semester" class="form-control">
										<option value="">Semester...</option>
										<option value="01">I</option>
										<option value="02">II</option>
										<option value="03">III</option>
										<option value="04">IV</option>
										<option value="05">V</option>
										<option value="06">VI</option>
										<option value="07">VII</option>
										<option value="08">VIII</option>
									</select>
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
								<label class="col-sm-2 control-label">Ruang</label>
								<div class="col-sm-10">
									<select required name="ruang" class="form-control">
										<option value="">Pilih ruang kelas...</option>
										<?php
										for($i=1; $i<=10; $i+=1){
											echo"<option value='0$i'> 0$i </option>";
										}
										?>
									</select>
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