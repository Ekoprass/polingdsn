<!-- MENU -->
				<div class="side-menu">
					<nav class="navbar navbar-default" role="navigation">
						<div class="side-menu-container">
							<div class="navbar-header">
								<a class="navbar-brand" href="<?php echo base_url('');?>">
									<div class="icon fa fa-paper-plane"></div>
									<div class="title">Polling AKN Bojonegoro</div>
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
									<a data-toggle="collapse" href="#dropdown-form">
										&nbsp; <span class="glyphicon glyphicon-info-sign"></span><span class="title">Info</span>
									</a>
									<!-- Dropdown level 1 -->
									<div id="dropdown-form" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li>
													<a href="<?php echo base_url('index.php/laporan');?>">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-usd"></span>  Info Pembayaran SPP</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/caribayar');?>">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-usd"></span>  Pencarian Pembayaran SPP</a>
												</li>
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