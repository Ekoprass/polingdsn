<div class="container-fluid">
	<div class="side-body">
		<!--panel header-->
		<div class="page-title">
			<span class="title">Kelas <strong><?php echo "- [ ".$kelas_mahasiswa['id_kelas']." ]";?></strong></span>
		</div>
		<div class="panel panel-info panel-body">
			<div class="col-md-12">
				<div class="panel panel-default">
					<div class="well well-sm">
						<!--panel header-->		
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>
							</h4>
						</div>
					</div>
					<div class="panel-body">
						<div class="col-md-5">	
							<table class="table table-hover table-responsive table-bordered">
									<tr>
										<th width=100>Id Kelas</th>
										<td width=500><?php echo $kelas_mahasiswa['id_kelas'];?></td>
									</tr>
									<tr>
										<th>Tahun Angkatan</th>
										<td><?php echo $kelas_mahasiswa['tahun'];?></td>
									</tr>
									<tr>
										<th width=250>Prodi</th>
										<td><?php echo $kelas_mahasiswa['nama_prodi'];?></td>
									</tr>
									<tr>
										<th width=100>Status Kelas</th>
										<td><?php echo $kelas_mahasiswa['status'];?></td>
									</tr>
									<tr>
										<th width=250>DPA</th>
										<td><?php echo $kelas_mahasiswa['nama_dosen'];?></td>
									</tr>
							</table>
						</div>
					</div>
				</div>
				<div class="col-md-12">
					<div class="panel panel-default">
						<!--panel header-->
						<div class="panel-heading">
							<h4 class="panel-title">
								<span class="glyphicon glyphicon-inbox"></span>
								<strong>Daftar Siswa </strong>
							</h4>
						</div>
						<div class="panel-body">
							<div class="panel panel-default">
							<form class="form-horizontal" action="<?php echo site_url('kelas/tambah_mahasiswa_proses');?>" method="post" enctype="multipart/form-data">
								<table>
									<tr>
										<th class="col-sm-1">
											<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
										</th>
										<td class="col-sm-10">
											<select required name="nim" class="form-control">
												<option value="">Pilih Mahasiswa.....!</option>
													<?php
														foreach($semua_mahasiswa_all->result_array() as $s)
														{
															
															echo "<option value='".$s['nim']."'> ".$s['nim']." - ".$s['nama_mahasiswa']."</option>";
														}
													?>
											</select>
											<input type="hidden" name="id_kelas" value=<?php echo $kelas_mahasiswa['id_kelas']; ?> readonly maxlength=100 class="form-control">
											<input type="hidden" name="semester" value=<?php echo $kelas_mahasiswa['semester']; ?> readonly maxlength=100 class="form-control">
											<input type="hidden" name="tahun_angkatan" value=<?php echo $kelas_mahasiswa['tahun_angkatan']; ?> readonly maxlength=100 class="form-control">
										</td>
										<td class="col-sm-2" align="center">
											<button class="btn btn-info"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
										</td>
									</tr>
								</table>
							</form>
							</div>
							<table class="table table-hover table-responsive table-bordered">
								<thead>
									<tr>
										<th width=50>No.</th>
										<th width=150>NIM</th>
										<th width=300>Nama Mahaiswa</th>
										<th width=120>Jenis Kelamin</th>
										<th width=300>Alamat Asli</th>
										<th width=160>Aksi</th>
									</tr>
								</thead>
								<tbody>
								<?php $no=0; foreach($semua_mahasiswa as $row ): $no++;?>
									<tr>
										<td align=center><?php echo ($no);?></td>
										<td ><?php echo $row->nim;?></th>
										<td ><?php echo $row->nama_mahasiswa;?></th>
										<td ><?php echo $row->jenis_kelamin;?></th>
										<td ><?php echo $row->alamat_asli;?></th>
										<td >
											<a href="<?php echo site_url('kelas/detail/'.$row->id_kelas);?>"
												class='tooltipsku' 
												data-toggle='tooltip' 
												data-placement='top' 
												title="<?php echo 'detail '.$row->id_kelas;?>"
												>
												<button type="button" class="btn btn-default" aria-label="Left Align">
													<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
												</button>
											</a>
											<a href="<?php echo site_url('kelas/edit/'.$row->id_kelas);?>"
												class='tooltipsku' 
												data-toggle='tooltip' 
												data-placement='top' 
												title="<?php echo 'edit '.$row->id_kelas;?>"
												>
												<button type="button" class="btn btn-default" aria-label="Left Align">
													<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
												</button>
											</a>
											<a href="<?php echo site_url('kelas/hapus/'.$row->id_kelas);?>"
												class='tooltipsku' 
												data-toggle='tooltip' 
												data-placement='top' 
												title="<?php echo 'hapus dari '.$row->id_kelas;?>"
												>
												<button type="button" class="btn btn-warning" aria-label="Left Align">
													<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												</button>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
							</table>
						</div>							
					</div>
				</div>
			</div>
		</div>
	</div>
</div>