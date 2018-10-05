<!DOCTYPE html>
<html>
	<head>
		<link rel="icon" type="image/png" href="<?php echo base_url('assets/aknbjn.png');?>">
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
		<link href="<?php echo base_url('assets/css/plugins/morris/morris-0.4.3.min.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/plugins/timeline/timeline.css');?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/css/datepicker.css');?>" rel="stylesheet">
		<!-- CSS App -->
		<link href="<?php echo base_url('assets/css/style.css');?>" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url('assets/css/themes.css');?>" rel="stylesheet" type="text/css">
		<script src="<?php echo base_url('assets/js_add/pemisah_angka.js');?>"></script>
		<script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/tinymce/tinymce.min.js');?>"></script> 
		<script type="text/javascript">
				$(function () {
				$(".tooltipsku").tooltip();
				});
			</script>
			<script>
					
					$(function(){
						$("#tanggal1").datepicker({
							format:'yyyy-mm-dd'
						});
						
						$("#tanggal2").datepicker({
							format:'yyyy-mm-dd'
						});
						
						$("#tanggal").datepicker({
							format:'yyyy-mm-dd'
						});
					})
			</script>
			
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
		<script src="<?php echo base_url('assets/js/holder.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
		<script src="<?php echo base_url('assets/js/application.js');?>"></script>
		<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/metisMenu/jquery.metisMenu.js');?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/morris/raphael-2.1.0.min.js');?>"></script>
		<script src="<?php echo base_url('assets/js/plugins/morris/morris.js');?>"></script>
		<script src="<?php echo base_url('assets/js/sb-admin.js');?>"></script>
		<script src="<?php echo base_url('assets/js/demo/dashboard-demo.js');?>"></script> 
		<script src="<?php echo base_url('assets/js/bootstrap.js');?>"></script>	
		<SCRIPT language=Javascript>
				<!--
				function isNumberKey(evt)
				{
				var charCode = (evt.which) ? evt.which : event.keyCode
				if (charCode > 31 && (charCode < 48 || charCode > 57))

				return false;
				return true;
				}
				//-->
			</SCRIPT>
	</head>
	
	<body class="flat-blue">
		<div class="app-container">
			<div class="row content-container">
				<nav class="navbar navbar-default navbar-fixed-top navbar-top">
					<!-- HEADER -->
					<div class="container-fluid">
						<div class="navbar-header">
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
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
									<?php 
										$session_id = $this->session->userdata('username');
										$level = $this->session->userdata('level');
										$akses=$this->m_login->akses_maha($session_id)->row_array();
										if($akses){
											$nama=$akses['nama_mahasiswa'];
										}else{
											redirect('home');
										}
										echo "hai, "."&nbsp;&nbsp;&nbsp;&nbsp;"."<strong>".$nama."</strong>";
									?>
								<span class="caret"></span></a>
								<ul class="dropdown-menu animated fadeDown">
									<li class="profile-img">
										<img src="<?php echo base_url('assets/aknbjn.png');?>"height="200px">
									</li>
									<li>
										<div class="profile-info">
											<h4 class="username"><?php echo $nama;?></h4>
											<p><?php echo "Username Anda : <strong>".$session_id."</strong>";?></p>
											<?php
												if($akses>0){
													$id_user=$akses['nim'];
												}else{
													redirect('home');
												}
											?><br /><br />
											<a href="<?php echo base_url('index.php/dashboard/logout');?>" class="btn btn-danger"><span class="fa fa-sign-out"></span>Log Out</a>
										</div>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</nav>
				<!-- END HEADER -->
				
				<!-- MAIN CONTENT -->
				<?php include $content;?>
				<!-- END MAIN CONTENT -->
			</div>
			
			<!-- FOOTER -->
			<footer class="app-footer">
				<div class="wrapper">
				</div>
			</footer>
			<!-- END FOOTER -->
		</div>
	</body>
</html>