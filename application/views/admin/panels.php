<!DOCTYPE html>
<html>
<head lang="en">

    <link rel='shortcut icon' type='image/x-icon' href='favicon.ico' />
    <title>Panels :: Metro UI CSS - The front-end framework for developing projects on the web in Windows Metro Style</title>
	<link href='<?php echo base_url('load/css/metro.css');?>' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url('load/css/metro-responsive.css');?>' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url('load/css/metro-schemes.css');?>' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url('load/css/docs.css');?>' rel='stylesheet' type='text/css'>
	<link href='<?php echo base_url('load/css/metro-icons.css');?>' rel='stylesheet' type='text/css'>
	<script src="<?php echo base_url('load/js/jquery-2.1.3.min.js');?>"></script>
	<script src="<?php echo base_url('load/js/docs.js');?>"></script>
	<script src="<?php echo base_url('load/js/prettify/run_prettify.js');?>"></script>
	<script src="<?php echo base_url('load/js/ga.js');?>"></script>
	<script src="<?php echo base_url('load/js/metro.js');?>"></script>
	<script src="<?php echo base_url('load/js/select2.min.js');?>"></script>
	<style>
        @media screen and (max-width: 640px) {
            .countdown {
                font-size: 1rem !important;
            }
        }
    </style>
	<div class="app-bar">
		<a class="app-bar-element">
			<span id="toggle-tiles-dropdown" class="mif-apps mif-2x"></span>
			<div class="app-bar-drop-container" data-role="dropdown" data-toggle-element="#toggle-tiles-dropdown" data-no-close="false" style="width: 324px;">
				<div class="tile-container bg-white">
					<div class="tile-small bg-cyan">
						<div class="tile-content iconic">
							<span class="icon mif-onedrive"></span>
						</div>
					</div>
					<div class="tile-small bg-yellow">
						<div class="tile-content iconic">
							<span class="icon mif-google"></span>
						</div>
					</div>
					<div class="tile-small bg-red">
						<div class="tile-content iconic">
							<span class="icon mif-facebook"></span>
						</div>
					</div>
					<div class="tile-small bg-green">
						<div class="tile-content iconic">
							<span class="icon mif-twitter"></span>
						</div>
					</div>
				</div>
			</div>
		</a>

		<div class="app-bar-divider"></div>

		<div class="app-bar-element place-right">
			<a class="dropdown-toggle fg-white"><span class="mif-enter"></span> Log In Dashboard</a>
			<div class="app-bar-drop-container bg-white fg-dark place-right" data-role="dropdown" data-no-close="true">
				<div class="padding10">
					<form>
						<h4 class="text-light">Login </h4>
						<div class="input-control text">
							<span class="mif-user prepend-icon"></span>
							<input type="text">
						</div>
						<div class="input-control text">
							<span class="mif-lock prepend-icon"></span>
							<input type="password">
						</div>
						<div class="form-actions">
							<button class="button">Login</button>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="app-bar-divider place-right"></div>
	</div>
</head>
<body class="bg-lightBlue fg-white" >
	<div class="bg-lightBlue fg-white align-left">
		<div class="container page-content">
			<div class="grid" >
				<div class="row cells4">
					<div class="cell">
						<h5>Informasi Satu Bulan Yang Lalu</h5>
						<div class="accordion" data-role="accordion" style="color:#000;">
							<div class="frame">
								<div class="heading">Item 1<span class="mif-home icon"></span></div>
								<div class="content">
									Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
								</div>
							</div>
						</div>
					</div>
					<div class="cell">
						<h5>Informasi Bulan Sekarang</h5>
						<div class="accordion" data-role="accordion" style="color:#000;">
							<div class="frame">
								<div class="heading">Item 1<span class="mif-home icon"></span></div>
								<div class="content">
									Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
								</div>
							</div>
						</div>
					</div>
					<div class="cell">
						<h5>Informasi Satu Bulan Berikutnya</h5>
						<div class="accordion" data-role="accordion" style="color:#000;">
							<div class="frame">
								<div class="heading">Item 1<span class="mif-home icon"></span></div>
								<div class="content">
									<div class="flex-grid">
									
									<div class="row flex-just-end">
										<div class="cell"><button class="button loading-cube">Loading...</button></div>
									</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cell">
						<h5>Informasi Dua Bulan Berikutnya</h5>
						<div class="accordion" data-role="accordion" style="color:#000;">
							<div class="frame">
								<div class="heading">Item 1<span class="mif-home icon"></span></div>
								<div class="content">
									Duis autem vel eum iriure dolor in hendrerit in vulputate. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut.
								</div>
							</div>
						</div>
					</div>
				  </div>
			</div>
			<div class="row cells1">
			<div class="cell">
				<div class="panel success" data-role="panel">
					<div class="heading">
						&nbsp; <span class="mif-bell mif-ani-ring mif-ani-slow"></span>
						<span class="title">Keterangan :</span>
					</div>
					<div class="content padding10">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean luctus lectus sit amet odio ullamcorper malesuada dignissim justo gravida.
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>