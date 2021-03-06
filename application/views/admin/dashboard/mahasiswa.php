<div class="panel panel-info side-body">
<!-- HEADER -->
	<div class="panel-heading">
		<h4 class="panel-title">
		<center><span class="icon fa fa-inbox fa-2x"> Info Kelas</span></center>
		</h4>
    </div>
<!-- BODY -->
   <div class="panel-body">         
		<div class="padding-top">
			<div class="row">	  
			<?php foreach($polling as $row):?>  
				<div class="col-sm-3">
	                <div class="panel fresh-color panel-danger">
		             	<div class="panel-heading"><i class="icon fa fa-th-large fa-2x"> Detail Kelas</i>
		             	<a href="<?php echo site_url('polling/detail/'.$row->id_kelas.'') ?>" class="btn btn-danger  pull-right" style="margin: unset;"><i class="glyphicon glyphicon-zoom-in" ></i></a> </div>
	                   	<div class="panel-body">
	                   		<echo > <center> Program Studi : </center></echo>
		                    <div class="sub-title" align="center"><H3><b><?php $id=$row->id_kelas;
		                       $kelas_siswa=$this->m_polling->kelas_siswa($id)->row_array(); 
		                       echo $kelas_siswa['nama_prodi'];?></b></H3>
		                       <div class="panel-body">
		                       		<echo> Tahun Ajaran : </echo>
			                    	<div class="sub-title" align="center"><H3><b><?php $id=$row->id_kelas;
			                      	$kelas_siswa=$this->m_polling->kelas_siswa($id)->row_array(); 
			                       	echo $kelas_siswa['tahun'];?></b></H3></div>
			                        	<echo> Kelas : </echo>
										<div class="sub-title" align="center"><H3><b><?php echo " Semester ".substr($id=$row->id_kelas,5,1)." Kelas ".strtoupper(substr($id=$row->id_kelas,6,2))." - ".substr($id=$row->id_kelas,8,2)  ?></b></H3>
										</div>
										
					                    <div class="panel-body">
					                   	<button type="button" class="btn btn-default" data-toggle="modal" data-target="#<?php echo $id=$row->id_kelas;?>" style="padding: 0; margin: auto; background: #fff; border-color: #fff; text-align: center; width: -webkit-fill-available;">
					                   		<div class="sub-title" align="center"><i class="icon fa fa-user fa-2x"></i> <H4><b>Jumlah Dosen</b></H4></div>
					                    	<div class="sub-title" align="center"><H3><b><?php $id=$row->id_kelas;
											$nim=$this->session->userdata('username');
											$jumlah_dosen=$this->m_polling->jumlah_dosen($id)->num_rows();
											echo $jumlah_dosen;?></b></H3></div>
										</button>
					                    </div>


                				</div>
                			</div>
                		</div>
	            	</div>		            
         		</div>
        		<?php endforeach; ?>

         		<!-- <div class="col-sm-3">
				<div class="col-sm-3"> -->
	            <!-- </div> -->   
	            <!-- dosen -->  
	        <?php foreach($polling as $row):?>
			<div id="<?php echo $id=$row->id_kelas;?>" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title"><?php echo "Tahun ".substr($id=$row->id_kelas,0,4)." Semester ".substr($id=$row->id_kelas,5,1)." Kelas ".strtoupper(substr($id=$row->id_kelas,6,2))." - ".substr($id=$row->id_kelas,8,2)  ?></h4>
			      </div>
			      <div class="modal-body">
					<table class="table table-hover table-responsive table-bordered">
						<tr class="text-center">
							<th >ID Dosen</th>
							<th >Nama Dosen</th>
							<th >Mata Kuliah</th>
						</tr>
						<?php 
						$nim=$this->session->userdata('username');
						$dosenkls=$this->m_laporan->dosen_mahasiswa($nim,$row->id_kelas )->result();
						foreach ($dosenkls as $dsn) {?>
						<tr class="text-center">
							<td><?php echo $dsn->id_dosen ?></td>
							<td><?php echo $dsn->nama_dosen ?></td>
							<td><?php echo $dsn->nama_mk ?></td>
						</tr>
						<?php }?> 
					</table>

			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			        </div>						
				</div>
			</div>
        <?php endforeach; ?>

		</div>
	</div>
	</div>	
</div>