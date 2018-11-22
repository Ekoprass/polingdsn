<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Polling</strong>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Detail</strong>&nbsp	
			<span class="fa fa-angle-double-right"/></span> <strong> Detail Nilai</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->	
	<div class="panel-body">	
		</br>
		<div class="col-md-4">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th colspan=2><center>Dosen</center></th>
						</tr>
						<tr>
							<th width=125>ID Dosen</th>
							<td><?php echo $dosen['id_dosen'];?></td>
						</tr>
						<tr>
							<th width=125>Nama Dosen</th>
							<td><?php echo $dosen['nama_dosen'];?></td>
						</tr>
						
				</table>
		</div>


		<div class="col-md-8">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th colspan=6><center>Kriteria Nilai</center></th>
						</tr>
						<tr>
							<th width=125>Nilai Poin</th>
							<?php $n=0; foreach($nilai as $row): $n++; ?>
								<td><center><?php echo $row->kriteria_nilai;?></center></td>
							<?php endforeach; ?>
						</tr>
						<tr>
							<th width=125>Kriteria Nilai</th>
							<?php $n=0; foreach($nilai as $row): $n++; ?>
								<td><center><?php echo $row->keterangan;?></center></td>
							<?php endforeach; ?>
						</tr>
				</table>
		</div>

		<div class="col-md-12">
			<div class="panel panel-default">
					<!--panel header-->
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-inbox"></span>
							<strong>Form Pengisian Nilai</strong>
						</h4>
					</div>				
					<!--body-->
				<div class="panel-body">
					</br>
					<form method="post" action="<?php echo site_url('polling/edit_polling');?>" >
					<table class="table table-hover table-responsive table-bordered">
							<tr>
								<th width=50>No</th>
								<th width=550 >Pertanyaan</th>
								<!--<th width=200 >Kategori</th>-->
								<th width=100 ><center>Nilai</center></th>
							</tr>
						<?php $no=0; foreach($penilaian as $row ): $no++;?>
							<input type="hidden" value="<?php echo $row->id_soal; ?>" name="soal[]" >
							<tr>
								<td><?php echo ($no);?></td>
								<td><?php echo $row->pertanyaan;?></td>
								<td><center><?php echo $row->kriteria_nilai;?></center></td>
								
							</tr>
						<?php endforeach;?>
					</table>
					<input type="hidden" value="<?php echo $this->uri->segment(3); ?>" name="dosen" >
					<input type="hidden" value="<?php echo $this->uri->segment(4); ?>" name="kelas" >
					<input type="hidden" value="<?php echo $this->session->userdata('username'); ?>" name="nim" >
					<div class="col-sm-20">
						<div class="well well-sm">
							<!-- <div class="form-group">
									<div class="col-sm-offset-0 col-sm-5">
										<button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Edit Nilai</button>
									</div>
							</div> -->
							</br>
							</br>
						</div>
					</div>
				</form>
				</div>
			</div>
		</div>
	</div>
</div>