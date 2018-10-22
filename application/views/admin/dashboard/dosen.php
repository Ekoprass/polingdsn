    <div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
		<center><span class="icon fa fa-inbox fa-2x"> Info Kelas</span></center>
		</h4>
    </div>
	
	        	<div class="panel-body">         
					<div class="padding-top">
						<?php foreach ($dosen as $row): ?>
						<div class="row">	    
						<div class="col-sm-3">
			                <div class="panel fresh-color panel-danger">
				             	<div class="panel-heading"><i class="icon fa fa-th-large fa-2x"> Detail Kelas</i>
				             	<a href="<?php echo site_url('polling/detail_hasil_dosen/'.$row->id_dosen.'/'.substr($row->id_kelas,0,6).'') ?>" class="btn btn-danger  pull-right" style="margin: unset;"><i class="glyphicon glyphicon-zoom-in" ></i></a> </div>
			                   	<div class="panel-body">
			                   		<echo > <center> Program Studi : </center></echo>
				                    <div class="sub-title" align="center"><H3><b><?php 
				                       echo $row->nama_mk;?></b></H3>
				                       <div class="panel-body">
				                       		<echo> Tahun Ajaran : </echo>
					                    	<div class="sub-title" align="center"><H3><b><?php echo $row->tahun;?></b></H3></div>
					                        	<echo> Kelas : </echo>
												<div class="sub-title" align="center"><H3><b><?php echo " Semester ".substr($row->id_kelas,5,1)." Kelas ".strtoupper(substr($row->id_kelas,6,2))." - ".substr($row->id_kelas,8,2)  ?></b></H3>
												</div>
												
							                    <div class="panel-body">
							                   	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $id=$row->id_kelas;?>" style="padding: 0; margin: auto; background: #fff; border-color: #fff; text-align: center; width: -webkit-fill-available;">
							                   		<div class="sub-title" align="center"><i class="icon fa fa-user fa-2x"></i> <H4><b>Jumlah Mahasiswa</b></H4></div>
							                    	<div class="sub-title" align="center"><H3><b><?php $kelas=$row->id_kelas; $dosen=$row->id_dosen;
					                      			$jumlah_mhs=$this->m_dosen->jumlah_mhs($kelas, $dosen)->row_array(); 
													echo $jumlah_mhs['jumlah'];
													// echo "<br>".$row->id_kelas.''.$row->id_dosen;
													?></b></H3></div>
												</button>
							                    </div>
		                				</div>
		                			</div>
		                		</div>
			            	</div>		            
		         		</div>
						
					<?php endforeach; ?>
					</div>
				</div>
</div>	</div>
    