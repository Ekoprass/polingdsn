<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Jadwal</span>
		</div>
		<?php $i= $kelas.$jadwali;
			  $h=$hari;
		?>
		<form  class="navbar-form navbar-right" role="form" action="<?php echo site_url('jadwal/tambah_kosong');?>" method="post">
			<input type="hidden" value="<?php echo $kelas;?>" name="id_kelas" readonly />
			<input type="hidden" value="<?php echo $i;?>" name="iniid" readonly />
			<input type="hidden" value="<?php echo $h;?>" name="hari" readonly />
			<input type="hidden" value="<?php echo $i;?>" name="jadwal" readonly />
			<input type="hidden" value="<?php echo $kelas;?>" name="kel" readonly />
			<input type="hidden" value="<?php echo $jam;?>" name="jam" readonly />
				<div class="col-sm-offset-5 col-sm-10">
					<div class="form-group">
						<label>Klik Untuk Jam Kosong</label>
							<button type="delete" class="btn btn-default"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Kosong</button>
					</div>
				</div>
		</form>
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
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title">From Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?php echo site_url('jadwal/tambah_proses');?>" method="post">
							<div class="form-group">
							
								<label class="col-sm-2 control-label">Id Jadwal</label>
								<div class="col-sm-10">
									<input disabled type="text" class="form-control" value=<?php echo $i;?>  placeholder="Id Jadwal"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama Kelas</label>
								<div class="col-sm-10">
									<input disabled type="text" class="form-control" value="<?php $n=$nkelas['nama_prodi'];
																								$m=$nkelas['semester'];
																								$r=$nkelas['ruang'];
																							 echo $m.'-'.$n.'-'.$r;?>" name="nama_kelas"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Hari</label>
								<div class="col-sm-10">
									<input disabled type="text" class="form-control" value="<?php echo $h;?>" />
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Jam Ke</label>
								<div class="col-sm-10">
									<input disabled type="text" class="form-control" value="<?php echo $jam; ?>"/>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Dosen</label>
								<div class="col-sm-10">
									<select  name="id_dosen" class="form-control">
										<option value="">Pilih Dosen Pengampu</option>
										<?php
											foreach($dosen->result_array() as $d)
											{
												
												echo "<option value='".$d['id_dosen']."'> ".$d['id_dosen']." - ".$d['nama_dosen']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Mata Kuliah</label>
								<div class="col-sm-10">
									<select  name="id_mk" class="form-control">
										<option value="">Pilih Mata Kuliah</option>
										<?php
											foreach($mk->result_array() as $j)
											{
												
												echo "<option value='".$j['id_mk']."'> ".$j['id_mk']." - ".$j['nama_mk']."</option>";
											}
										?>
									</select>
								</div>
							</div>
							<input type="hidden" value="<?php echo $kelas;?>" name="id_kelas" readonly />
							<input type="hidden" value="<?php echo $i;?>" name="iniid" readonly />
							<input type="hidden" value="<?php echo $h;?>" name="hari" readonly />
							<input type="hidden" value="<?php echo $i;?>" name="jadwal" readonly />
							<input type="hidden" value="<?php echo $kelas;?>" name="kel" readonly />
							<input type="hidden" value="<?php echo $jam;?>" name="jam" readonly />
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span>Tambah</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>