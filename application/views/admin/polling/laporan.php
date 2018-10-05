


<div class="panel panel-info side-body">
	<!--panel header-->
	<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Laporan Penilaian</a></li>
    <li><a data-toggle="tab" href="#menu1" onclick="myFunction()">Grafik Laporan Bedasarkan Matakuliah</a></li>
  <!--   <li><a data-toggle="tab" href="#menu2">Pendapatan Gedung </a></li>
    <li><a data-toggle="tab" href="#menu3">Pendapatan Seluruh Gedung</a></li> -->
    
  </ul>



	<div class="tab-content">
		<div id="home" class="tab-pane fade in active">
			<div class="content">
				<div class="module">
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Laporan Polling</strong></a>
						</h4>
				    </div>
				    <div class="well well-sm">
					    
					    <form class="navbar-form navbar-right" role="search" action="<?php echo site_url('polling/cari');?>" method="post">
							<div class="form-group">
								<select class="col-md-12" name="dosen">
									<option value="">Pilih Dosen</option>
									<?php $no=0; foreach ($dosen as $row): $no++ ;?>
									<option value="<?php echo $row->id_dosen;?>"><?php echo $row->nama_dosen;?></option>
								<?php endforeach; ?>
								</select>				
								<select required name="thn_semester">
									<option value="">Tahun Semester</option>
									<?php $no=0; foreach ($thn_semester as $row): $no++ ;?>
									<option value="<?php echo $row->id_tahun_semester;?>"><?php echo $row->id_tahun_semester;?></option>
								<?php endforeach; ?>
								</select>
							</div>
							<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>	
						</form>
					</br>
					</br>
					</div>
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
					<!--bawah panel / tambah dan cari-->
					<div class="panel-body">		
					<!--pesan error/sukses/dll-->
						</br>
						<table class="table table-hover table-responsive table-bordered">
								<tr>
									<th >No</th>
									<th >ID Dosen</th>
									<th >Nama</th>
									<th >Nilai</th>
								</tr>
						</table>
						</br>
					</div>
				</div>
			</div>
		</div>


		 <div id="menu1" class="tab-pane fade in active">
			<div class="content">
				<div class="module">
					<?=$chart?>
				</div>
			</div>
		</div>
	</div>



