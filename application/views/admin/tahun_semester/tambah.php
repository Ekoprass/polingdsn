<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('tahun_semester');?>"><strong>Tahun Semester</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Tambah</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->
		<?php
		$data=$this->session->flashdata('m_sukses');
		if ($data!=null){?>
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $data;?>
			</div>
		<?php
		}
		$data=$this->session->flashdata('m_eror');
		if ($data!=null){?>
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $this->session->flashdata('m_eror');?>
			</div>
		<?php
		}
		?>
		<div>
			<div>
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title"> Form Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?php echo site_url('tahun_semester/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">ID Tahun Semester</label>
								<div class="col-sm-10">
									<input disabled type="text" class="form-control" name="">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Tahun</label>
								<div class="col-sm-10">
									<select required name="tahun" class="form-control">
										<option value="">Pilih tahun angkatan...</option>
										<?php
											for($i=date('Y')-10; $i<=date('Y')+5; $i+=1){
												echo"<option value='$i'> $i </option>";
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
							</div>
							<div class="col-sm-20">
								<div class="well well-sm">
								<?php echo str_repeat("&nbsp", 55);?>				<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
												</br>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>