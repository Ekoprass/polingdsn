<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<center><span class="glyphicon glyphicon-file"/></span>&nbsp;&nbsp;<strong> Validasi Password</strong></center>
		</h4>
    </div>
	<div class="side-body padding-top">
		<div class="row">
			<div class="col-sm-	6 col-xs-12">
				<div class="col-xs-12">
					<?php $nim=$mahasiswa['nim']; ?>
					<form class="form-horizontal" role="form" action="<?php echo site_url('validasi/validasi_pass_pro/'.$nim);?>" method="post">
						<div class="form-group">
							<label class="col-sm-2 control-label">Username</label>
							<div class="col-sm-9">
								<input type="text" name="username" class="form-control" value="<?php echo $mahasiswa['username'];?>" readonly="readonly">
							</div>
						</div>
						<div class="form-group">
						<label class="col-sm-2 control-label">Password</label>
							<div class="col-sm-9">
								<input type="password" name="password" class="form-control" value="<?php echo $mahasiswa['password'];?>">
							</div>
						</div>
						<div class="form-group">
								<div class="col-sm-offset-2 col-sm-5">
									<button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-edit"></i> Validasi</button>
									<a href="<?php echo base_url('index.php/dashboard');?>" class="btn btn-warning"><span class="fa fa-sign-out"></span> Skip</a>
								</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>