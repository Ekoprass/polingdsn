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
	
	<body class="flat-blue">
		<div class="app-container">
			<div class="row content-container">
				<nav class="navbar navbar-default navbar-fixed-top navbar-top">
					<!-- HEADER -->
					<div class="container-fluid">
						<div class="navbar-header">
							<button type="button" class="navbar-expand-toggle">
								<i class="fa fa-bars icon"></i>
							</button>
							<ol class="breadcrumb navbar-breadcrumb">
								<li class="active"><?php echo $judul;?></li>
							</ol>
							<button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
								<i class="fa fa-th icon"></i>
							</button>
						</div>
						<ul class="nav navbar-nav navbar-right">
							<button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
								<i class="fa fa-times icon"></i>
							</button>
							<li class="dropdown profile">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Emily Hart <span class="caret"></span></a>
								<ul class="dropdown-menu animated fadeInDown">
									<li class="profile-img">
										<img src="../img/profile/picjumbo.com_HNCK4153_resize.jpg" class="profile-img">
									</li>
									<li>
										<div class="profile-info">
											<h4 class="username">Emily Hart</h4>
											<p>emily_hart@email.com</p>
											<div class="btn-group margin-bottom-2x" role="group">
												<button type="button" class="btn btn-default"><i class="fa fa-user"></i> Profile</button>
												<button type="button" class="btn btn-default"><a href="<?php echo site_url('dashboard/logout');?>"><i class="fa fa-sign-out"></i> Logout</a></button>
											</div>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- END HEADER -->
				
				<!-- MENU -->
				<div class="side-menu">
					<nav class="navbar navbar-default" role="navigation">
						<div class="side-menu-container">
							<div class="navbar-header">
								<a class="navbar-brand" href="<?php echo base_url('');?>">
									<div class="icon fa fa-paper-plane"></div>
									<div class="title">SIBAM AKN Bojonegoro</div>
								</a>
								<button type="button" class="navbar-expand-toggle pull-right visible-xs">
									<i class="fa fa-times icon"></i>
								</button>
							</div>
							<!-- deretan menu-->
							<ul class="nav navbar-nav">
								<li class="active">
									<a href="<?php echo base_url('');?>">
										<span class="icon fa fa-paper-plane"></span><span class="title">Halaman Utama</span>
									</a>
								</li>
								<li class="panel panel-default dropdown">
									<a data-toggle="collapse" href="#dropdown-element">
										&nbsp <span class="glyphicon glyphicon-folder-close"></span><span class="title">Master Data</span>
									</a>
									<!-- Dropdown level 1 -->
									<div id="dropdown-element" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li><a href="<?php echo base_url('index.php/dosen');?>">Dosen</a></li>
												<li><a href="<?php echo base_url('index.php/mahasiswa');?>">Mahasiswa</a></li>
												<li><a href="<?php echo base_url('index.php/mata_kuliah');?>">Mata Kuliah</a></li>
												<li><a href="<?php echo base_url('index.php/jadwal');?>">Jadwal</a></li>
												<li><a href="<?php echo base_url('index.php/prodi');?>">Prodi</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li class="panel panel-default dropdown">
									<a data-toggle="collapse" href="#dropdown-table">
										&nbsp <span class="glyphicon glyphicon-cog"></span><span class="title">Konfigurasi</span>
									</a>
									<!-- Dropdown level 1 -->
									<div id="dropdown-table" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li><a href="<?php echo base_url('index.php/petugas');?>">Petugas</a></li>
												<li><a href="<?php echo base_url('index.php/kelas_mahasiswa');?>">Kelas Mahasiswa</a></li>
												<li><a href="<?php echo base_url('index.php/tahun_jenjang');?>">Tahun Jenjang</a></li>
											</ul>
										</div>
									</div>
								</li>
								<li class="panel panel-default dropdown">
									<a data-toggle="collapse" href="#dropdown-form">
										&nbsp <span class="glyphicon glyphicon-usd"></span><span class="title">Transaksi</span>
									</a>
									<!-- Dropdown level 1 -->
									<div id="dropdown-form" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li><a href="<?php echo base_url('index.php/transaksi_spp');?>">Transaksi SPP</a></li>
											</ul>
										</div>
									</div>
								</li>
							</ul>
						</div>
						<!-- /.navbar-collapse -->
					</nav>				
					<!-- END MENU -->
				</div>			
				
				<!-- MAIN CONTENT -->
				<?php include $content;?>
				<!-- END MAIN CONTENT -->
			</div>
			
			<!-- FOOTER -->
			<footer class="app-footer">
				<div class="wrapper">
					<span class="pull-right">2.0 <a href=""><i class="fa fa-long-arrow-up"></i></a></span> © 2015 Copyright.
				</div>
			</footer>
			<!-- END FOOTER -->
		</div>
				
		<!-- JAVASCRIPT -->
		<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/chartjs/Chart.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/bootstrap-switch/dist/js/bootstrap-switch.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/iCheck/icheck.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/matchHeight/jquery.matchHeight-min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/DataTables/media/js/jquery.dataTables.min.js');?>"></script>
		<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/dataTables.bootstrap.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/ace/ace.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/ace/mode-html.js');?>"></script>
		<script src="<?php echo base_url('assets/vendor/js/ace/theme-github.js');?>"></script>
		<script src="<?php echo base_url('assets/js/app.js');?>"></script>
		<script src="<?php echo base_url('assets/js/index.js');?>"></script>
	</body>

</html>
