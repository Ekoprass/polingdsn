<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span><strong> Edit</strong>
		</h4>
    </div>
	</br>
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
		<?php $id=$kelas['id_kelas'];?>
		<form class="form-horizontal" action="<?php echo site_url('kelas/edit_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Kelas</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $kelas['id_kelas'];?>" type="text" name="id_kelas" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun</label>
				<div class="col-sm-9">
					<select required name="tahun" class="form-control">
						<option value="<?php echo $kelas['tahun'];?>"><?php echo $kelas['tahun'];?></option>
						<?php
							for($i=date('Y')-5; $i<=date('Y')+5; $i+=1){
								echo"<option value='$i'> $i </option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Semester</label>
				<div class="col-sm-9">
					<select required name="semester" class="form-control">
						<option value="<?php echo $kelas['semester'];?>"><?php echo $kelas['semester'];?></option>
						<option value="01">I</option>
						<option value="02">II</option>
						<option value="03">III</option>
						<option value="04">IV</option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Prodi</label>
				<div class="col-sm-9">
					<select required name="prodi" class="form-control">
						<option value="<?php echo $kelas['id_prodi'];?>"><?php echo $kelas['nama_prodi']?></option>
						<?php
							foreach($prodi->result_array() as $f)
							{
								echo "<option value='".$f['id_prodi']."'> ".$f['id_prodi']." - ".$f['nama_prodi']."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">DPA</label>
				<div class="col-sm-9">
					<select required name="dpa" class="form-control">
						<option value="<?php echo $kelas['dpa'];?>"><?php echo $kelas['nama_dosen']?></option>
						<?php
							
							foreach($dpa->result_array() as $o)
							{
								echo "<option value='".$o['id_dosen']."'> ".$o['id_dosen']." - ".$o['nama_dosen']."</option>";
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
						<select required name="status" class="form-control">
							<option value="<?php echo $kelas['status'];?>"><?php echo $kelas['status']; ?></option>
							<option value="aktif">Aktif</option>
							<option value="nonaktif">Nonaktif</option>
						</select>
					
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Ruang</label>
				<div class="col-sm-9">
					<select required name="ruang" class="form-control">
						<option value="<?php echo $kelas['ruang'];?>"><?php echo $kelas['ruang'];?></option>
						<?php
						for($i=1; $i<=10; $i+=1){
							echo"<option value='$i'> $i </option>";
						}
						?>
					</select>
				</div>
			</div>			
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-success"><i class="glyphicon glyphicon-edit"></i> Edit</button>
							</div>
					</div>
				</div>
			</div>
			
		</form>
	</div>
</div>