<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Penilaian</strong>&nbsp
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
						<tr> 
							<th width=125>Mata Kuliah</th>
							<td><?php echo $dosen_mk['nama_mk'];?></td>
						</tr>
				</table>
		</div>
		<div class="col-md-4">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th colspan=2><center>Tahun Ajaran <?php echo substr($this->uri->segment(4),0,4) ?></center></th>
						</tr>
						<tr>
							<th width=140>Jumlah Mahasiswa</th>
							<td><?php echo $jumlah_mhs['jumlah'];?></td>
						</tr>
						<tr>
							<th width=140>Sudah Menilai</th>
							<td><?php echo $mhs_sudah_menilai['jumlah_penilai'];?></td>
						</tr>
						<tr>
							<th width=140>Belum Menilai</th>
							<td><?php echo $mhs_belum_menilai;?></td>
						</tr>
				</table>
		</div>

		<div class="col-md-4">	
			<a href="#">
				<div class="card red summary-inline">
					<div class="card-body">
						<i class="icon fa fa-check fa-4x"></i>
						<div class="content">
							<div class="title"><h3><b>Rata-rata  <?php 
								$rata=$tot_nilai['nilai']/$mhs_sudah_menilai['jumlah_penilai'];
							echo $rata;?><br> Rank <?php echo $rank['rank'] ?></b><br>
							<h4>Total Nilai  <?php echo $tot_nilai['nilai']?></h4></H3>
						</div>
					</div>
					<div class="clear-both"></div>
					</div>
				</div>
			</a>
		</div>

		<div class="col-md-12">	
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
							<strong>Form Rincian Nilai</strong>
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
								<td><center><?php echo getnilai($dosen['id_dosen'],$row->id_pertanyaan,$tahun_semester); ?></center></td>
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
					</form>
				</div>
			</div>
		</div>
	</div>
</div>