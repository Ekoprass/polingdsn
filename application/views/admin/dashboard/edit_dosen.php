<div class="panel panel-info side-body">
	<!--panel header-->
	<?php $id=$dosen['id_dosen'];?>
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dashboard/profil/'.$id);?>"><strong><?php echo $dosen['nama_dosen'];?></strong></a> &nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Profil</strong>
		</h4>
    </div>
		<div class="well well-lg">
			&nbsp;
			&nbsp;
			<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('dosen/editpass/'.$id);?>" method="post">
				<div class="form-group">
					<label class="control-label"> Username</label>
					<input required disabled value="<?php echo $dosen['username'];?>" type="text" name="username" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
					<label class="control-label">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Password</label>
					<input required value="<?php echo $dosen['password'];?>" type="password" name="password" class="form-control" size="18" maxlength="20" >
				<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Ubah</button>	
				</div>
			</form>
			</br>
			</br>
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
		<form class="form-horizontal" action="<?php echo site_url('dosen/edit_proses2/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">NIP / ID Dosen</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $dosen['id_dosen'];?>" type="text" name="id_dosen" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-9">
					<input required value="<?php echo $dosen['nama_dosen'];?>" type="text" name="nama" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-9">
					<input required value="<?php echo $dosen['tmpt_lahir'];?>" type="text" name="tempat" maxlength=90 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input required value="<?php echo $dosen['tgl_lahir'];?>" type="date" name="tgl_lahir" id="tanggal" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-9">
					<select required name="jenis_kelamin" class="form-control">
						<?php $jenis=$dosen['jenis_kelamin'];?>
						<option value="">Jenis Kelamin Anda?</option>
						<option <?php if($jenis=="L"){ echo "selected";}?> value="L">Laki Laki</option>
						<option <?php if($jenis=="P"){ echo "selected";}?> value="P">Perempuan</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<select required name="agama" class="form-control">
						<?php $agama=$dosen['agama'];?>
						<option value="">Agama Anda?</option>
						<option <?php if($agama=="Islam"){ echo "selected";}?> value="Islam">Islam</option>
						<option <?php if($agama=="Kristen"){ echo "selected";}?> value="Kristen">Kristen</option>
						<option <?php if($agama=="Protestan"){ echo "selected";}?> value="Protestan">Protestan</option>
						<option <?php if($agama=="Budha"){ echo "selected";}?> value="Budha">Budha</option>
						<option <?php if($agama=="Hindu"){ echo "selected";}?> value="Hindu">Hindu</option>
						<option <?php if($agama=="Kepercayaan"){ echo "selected";}?> value="Kepercayaan">Kepercayaan</option>
					</select>
				</div>
			</div>			
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
				<div class="col-sm-9">
					<select required name="pendidikan" class="form-control">
						<?php $Pendidikan=$dosen['pendidikan_akhir'];?>
						<option value="">Pendidikan terakhir Anda?</option>
						<option <?php if($Pendidikan=='SMA'){ echo "selected";}?> value="SMA">SMA dan sederajatnya</option>
						<option <?php if($Pendidikan=="D1"){ echo "selected";}?> value="D1">Diploma 1</option>
						<option <?php if($Pendidikan=="D2"){ echo "selected";}?> value="D2">Diploma 2</option>
						<option <?php if($Pendidikan=="D3"){ echo "selected";}?> value="D3">Diploma 3</option>
						<option <?php if($Pendidikan=="D4"){ echo "selected";}?> value="D4">Diploma 4</option>
						<option <?php if($Pendidikan=="S1"){ echo "selected";}?> value="S1">Strata 1</option>
						<option <?php if($Pendidikan=="S2"){ echo "selected";}?> value="S2">Strata 2</option>
						<option <?php if($Pendidikan=="S3"){ echo "selected";}?> value="S3">Strata 3</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kepegawaian</label>
				<div class="col-sm-9">
					<select required name="status_kepegawaian" class="form-control">
						<?php $status_kepegawaian=$dosen['status_kepegawaian'];?>
						<option value="">Status Anda?</option>
						<option <?php if($status_kepegawaian=="pns"){ echo "selected";}?> value="pns">PNS</option>
						<option <?php if($status_kepegawaian=="gtt"){ echo "selected";}?> value="gtt">GTT</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-9">					
					<input required value="<?php echo $dosen['alamat'];?>" class="form-control" name="alamat" >
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