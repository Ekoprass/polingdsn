<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('jadwal');?>"><strong>Jadwal</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail Jadwal <?php echo $jadwal['hari'];?></strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->	
	<div class="panel-body">	
		
		</br>
		<div class="col-md-5">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th width=100>Id Jadwal</th>
							<td width=500><?php $ij= $jadwal['id_jadwal'];
							echo $ij;
							?></td>
						</tr>
						<tr>
							<th>Hari</th>
							<td><?php $har=$jadwal['hari'];
									echo $har;
							?>
							</td>
						</tr>
						<tr>
							<th width=250>Status</th>
							<td><?php echo $jadwal['status'];?></td>
						</tr>
				</table>
		</div>
		<div class="col-md-12">
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
			<div class="panel panel-default">
					<!--panel header-->
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-user"></span>
							<strong>Daftar Jadwal Hari <?php echo $har;?> Kelas <?php $k= substr($ij,0,9);
							echo $k; ?> </strong>
						</h4>
					</div>				
					<!--body-->
				<div class="panel-body">
					<table class="table table-hover table-responsive table-bordered">
						<thead>
							<tr>
								<th width=50></th>
								<th width=250>Pilih Matakuliah</th>
								<th width=300>Pilih Dosen Pengampu</th>
								<th width=300>Pilih Jam Ke</th>
								<th width=50>Aksi</th>
							</tr>
						</thead>
						<form class="form-horizontal" action="<?php echo site_url('jadwal/tambah_mk_proses');?>" method="post" enctype="multipart/form-data">
							<tr>
								<td></td>
								<td>
									<select required name="id_mk" class="form-control">
										<option value="">Pilih Matakuliah</option>
										<?php
											foreach($semua_mk_all->result_array() as $s)
											{
												
												echo "<option value='".$s['id_mk']."'> ".$s['id_mk']." - ".$s['nama_mk']."</option>";
											}
										?>
									</select>
								</td>
								<td>
									<select required name="id_dosen" class="form-control">
										<option value="">Pilih Dosen Pengampu</option>
										<?php
											foreach($semua_dosen->result_array() as $d)
											{
												
												echo "<option value='".$d['id_dosen']."'> ".$d['id_dosen']." - ".$d['nama_dosen']."</option>";
											}
										?>
									</select>
								</td>
								<td>
									<select required name="id_jamke" class="form-control">
										<option value="">Pilih Jamke</option>
										<?php
											foreach($semua_jam->result_array() as $m)
											{
												
												echo "<option value='".$m['id_jam_ke']."'> ".$m['id_jam_ke']." - ".$m['nama']."</option>";
											}
										?>
									</select>
								</td>
								<input type="hidden" name="id_jadwal" value=<?php echo $ij; ?> readonly maxlength=100 class="form-control">
								<td  align=center>
									<button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
								</td>
							</tr>
						</form>
					</table>
					<table class="table table-hover table-responsive table-bordered">
						<thead>
							<tr>
								<th width=50>No</th>
								<th width=150>Matakuliah</th>
								<th width=300>Dosen Pengampu</th>
								<th width=300>Jam Ke</th>
								<th width=300>Waktu</th>
								<th width=300>Aksi</th>
							</tr>
						</thead>
						<?php $no=0; foreach($detailmk as $row ): $no++;?>
							<tr>
								<td align=center><?php echo ($no);?></td>
								<td><?php echo $row->nama_mk;?></td>
								<td><?php echo $row->nama_dosen;?></td>
								<td><?php echo $row->id_jam_ke;?></td>
								<td><?php $waktumulai=$row->jam_mulai;
										  $waktuselesai=$row->jam_selesai;
										  echo $waktumulai." s/d ".$waktuselesai;?>
								</td>
								<td align="center">
									<a href="<?php echo site_url('jadwal/editjd/'.$row->id_jadwal);?>"
										class='tooltipsku' 
										data-toggle='tooltip' 
										data-placement='top' 
										title="<?php echo 'Edit '.$row->id_jadwal;?>"
										>
										<button type="button" class="btn btn-default" aria-label="Left Align">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
										</button>
									</a>
									<a disabled href="<?php echo site_url('jadwal/hapusjd/'.$row->id_jadwal);?>"
										class='tooltipsku' 
										data-toggle='tooltip' 
										data-placement='top' 
										title="<?php echo 'Hapus '.$row->id_jadwal;?>"
										>
										<button type="button" class="btn btn-danger" aria-label="Left Align">
											<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
										</button>
									</a>
								</td>
							</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>