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
										&nbsp; <span class="glyphicon glyphicon-folder-close"></span><span class="title">Master Data</span>
									</a>
									<!-- Dropdown level 1 -->
									<div id="dropdown-element" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li>
													<a href="<?php echo base_url('index.php/dosen');?>"> 
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-user"></span>  Dosen</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/mahasiswa');?>"> 
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-file"></span>  Mahasiswa</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/tata_usaha');?>"> 
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-th"></span>  Tata Usaha</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/akun');?>"> 
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-font"></span>  Akun</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/prodi');?>"> 
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-list"></span>  Prodi</a>
												</li>
											</ul>
										</div>
									</div>
								</li>
								<li class="panel panel-default dropdown">
									<a data-toggle="collapse" href="#dropdown-table">
										&nbsp; <span class="glyphicon glyphicon-cog"></span><span class="title">Konfigurasi</span>
									</a>
									<!-- Dropdown level 1 -->
									<div id="dropdown-table" class="panel-collapse collapse">
										<div class="panel-body">
											<ul class="nav navbar-nav">
												<li>
													<a href="<?php echo base_url('index.php/petugas');?>">  
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													Petugas</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/kelas');?>">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-inbox"></span>  Kelas Mahasiswa</a>
												</li>
												<li>
													<a href="<?php echo base_url('index.php/tahun_semester');?>">
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<span class="glyphicon glyphicon-calendar"></span>  Tahun Semester</a>
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