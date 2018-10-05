<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('tahun_semester');?>"><strong>Tahun Semester</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Edit</strong>
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
		<?php $id=$tahun['id_tahun_semester'];?>
		<form class="form-horizontal" action="<?php echo site_url('tahun_semester/edit_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">ID Tahun Semester</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $tahun['id_tahun_semester'];?>" type="text" name="id_tahun_semester" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tahun</label>
				<div class="col-sm-9">
					<select required name="tahun" class="form-control">
						<option value="<?php echo $tahun['tahun'];?>"><?php echo $tahun['tahun'];?></option>
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
						<option value="<?php echo $tahun['semester'];?>"><?php echo $tahun['semester'];?></option>
						<option value="01">I</option>
						<option value="02">II</option>
						<option value="03">III</option>
						<option value="04">IV</option>
					</select>
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