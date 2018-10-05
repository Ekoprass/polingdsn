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
		<div class="col-md-2">
			
		</div>
		<!-- <div class="col-md-6">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th colspan=3><center>Kriteria Nilai</center></th>
						</tr>
						<tr>
							<th width=100>Nilai</th>
							<th width=100>Kategori</th>						
							<th width=100>Keterangan</th>
						</tr>
						<?php $n=0; foreach($nilai as $row): $n++; ?>
						<tr>
							<td ><?php echo $row->kriteria_nilai;?></td>
							<td ><?php echo $row->kategori;?></td>
							<td ><?php echo $row->keterangan;?></td>							
						</tr>
						<?php endforeach;?>
				</table>
		</div> -->
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
					<form method="post" action="<?php echo site_url('polling/input');?>" >
					<table class="table table-hover table-responsive table-bordered">
							<tr>
								<th width=50>No</th>
								<th width=550 >Pertanyaan</th>
								<th width=100 ><center>Nilai</center></th>
							</tr>
							<?php $no=0; foreach($pertanyaan as $row ): $no++;?>
							<input type="hidden" value="<?php echo $row->id_pertanyaan; ?>" name="soal[]" >
							<tr>
								<td><?php echo ($no);?></td>
								<td><?php echo $row->pertanyaan;?></td>
								<!--<td><?php echo $row->kategori;?></td>
								<td><?php $nilai=$this->m_polling->kriteria($row->kategori);?>
								<div class="col-md-12">
									<select required name="nilai[]" >
										<option value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</option>
										<?php
										foreach($nilai->result_array() as $d)
											{
												echo "<option value='".$d['id_kriteria_nilai']."'> ".$d['kriteria_nilai']."</option>";
											}
										?>
									</select>
								</div>
								</td>-->
							</tr>
						<?php endforeach;?>
					</table>
					<div class="col-sm-20">
						<div class="well well-sm">
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