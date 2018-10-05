<!DOCTYPE html>
<html>

	<head>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/akn.png');?>">
		<title><?php echo $title;?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- Fonts -->
		<link href='<?php echo base_url('assets/css/css.css?family=Roboto+Condensed:300,400');?>' rel='stylesheet' type='text/css'>
		<link href='<?php echo base_url('assets/css/css.css?family=Lato:300,400,700,900');?>' rel='stylesheet' type='text/css'>
		<!-- CSS Libs -->
		<link href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/bower_components/fontawesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/bower_components/animate.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/bower_components/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/bower_components/iCheck/skins/flat/_all.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/bower_components/DataTables/media/css/jquery.dataTables.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/vendor/css/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css">
		
		<!-- CSS App -->
		<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/css/themes.css');?>" rel="stylesheet" type="text/css">
	</head>

	<body class="flat-blue login-page">
		<div class="container">
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
			<div class="login-box">
				<div>
					<div class="login-form row">
						<div class="col-sm-18 text-center login-header">
							<img src="<?php echo base_url('assets/aknbjn.png');?>"height="200px">
							<!-- <i class="login-logo fa fa-connectdevelop fa-5x"></i> -->
							<h4 class="login-title"><?php echo $judul; ?></h4>
						</div>
						<div class="col-md-18">
							<div class="panel panel-default">
								<div class="panel-heading">
									<span class="glyphicon glyphicon-lock"></span> Pilih Hak Akses Dengan Username "<?php echo $session_id; ?>"
								</div>
								<div class="panel-body">
									<center>
										<?php $no=0; foreach($jumlahakses as $a): $no++; ?>
											<a href="<?php echo site_url('validasi/pilih/'.$session_id."/".$a->nama_akses);?>" class="btn btn-lg btn-info"><span class="glyphicon glyphicon-user"></span>  <?php echo $a->nama_akses;?></a>
										<?php endforeach; ?>
									</center>
								</div>
								<div class="panel-footer">
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Javascript Libs -->
		<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/chartjs/Chart.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/iCheck/icheck.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/matchHeight/jquery.matchHeight-min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/DataTables/media/js/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
		
		<!-- Javascript -->
		<script src="<?php echo base_url('assets/vendor/js/dataTables.bootstrap.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/ace/ace.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/ace/mode-html.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/ace/theme-github.js');?>"></script>
		<script src="<?php echo base_url('assets/js/app.js');?>"></script>
	</body>

</html>
