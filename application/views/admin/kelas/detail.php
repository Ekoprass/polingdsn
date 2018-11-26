<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span><strong> Detail</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->	
	<div class="panel-body">	
		</br>
		<div class="col-md-5">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th width=100>Id Kelas</th>
							<td width=500><?php echo $kelas_siswa['id_kelas'];?></td>
						</tr>
						<tr>
							<th>Tahun Akademik</th>
							<td><?php echo $kelas_siswa['tahun'];?></td>
						</tr>
						<tr>
							<th width=250>Prodi</th>
							<td><?php echo $kelas_siswa['nama_prodi'];?></td>
						</tr>
						<tr>
							<th width=100>Status Kelas</th>
							<td><?php echo $kelas_siswa['status'];?></td>
						</tr>
						<tr>
							<th width=250>DPA</th>
							<td><?php echo $kelas_siswa['nama_dosen'];?></td>
						</tr>
				</table>
		</div>
		<div class="col-md-5">
			<?php
				$kelas=$kelas_siswa['id_kelas'];
				$r=substr($kelas,0,2); 			//2 digit tahun depan 20
				$i=substr($kelas,2,2); 			//2 digit tahun belakang 18
				$k=substr($kelas,4,2); 			//2 digit semester 05
				$h=substr($kelas,6,5); 			//4 digit kelas ti02
				$g=$i+1; 						//digit belakang tahun +1
				$m=$k+1; 						//digit semester +1


				if($k % 2 == 1){ 				//jika semester ganjil
					$id=$r.$g.'0'.$m.$h; 		//maka tahun dan semester ditambah 1
				}elseif($k % 2 == 0){ 			//jika semester genap 
					$id=$r.$i.'0'.$m.$h; 		// maka hanya semester diatambah 1
				}
				?>

				<table>
					<th>
					</br></br></br>
						<?php
							$cekkelas=$this->m_kelas->ceknaik($id)->num_rows();
							if($cekkelas>0){ 
									if($k==04){?>
										<a href="<?php echo site_url('kelas/naik/'.$kelas_siswa['id_kelas']);?>">
											<button class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eject"></i>  Naik Kelas  <?php echo $id;?></button>
										</a>
								<?php }else{ ?>
									<a href="<?php echo site_url('kelas/naik/'.$kelas_siswa['id_kelas']);?>">
										<button class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eject"></i>  Naik Kelas  <?php echo $id;?></button>
									</a>
							<?php  }
							} else {?>
							<a href="<?php echo site_url('kelas/tambahnaik/'.$id.'/'.$kelas_siswa['id_kelas']);?>">
								<button class="btn btn-success btn-lg"><i class="glyphicon glyphicon-eject"></i>  Naik Kelas Dan Tambah  <?php echo $id;?></button>
							</a>
						<?php } 
						?>
					</th>
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
							<span class="glyphicon glyphicon-inbox"></span>
							<strong>Daftar Mahasiswa </strong>
						</h4>
					</div>				
					<!--body-->
				<div class="panel-body">
					</br>
					<table class="table table-hover table-responsive table-bordered">
						<thead>
							<tr>
								<th width=50>No.</th>
								<th width=150>NIM</th>
								<th width=300>Nama Mahasiswa</th>
								<th width=75>Jenis Kelamin</th>
								<th width=300>Alamat Asli</th>
								<th width=300>Aksi</th>
							</tr>
						</thead>
						<form class="form-horizontal" action="<?php echo site_url('kelas/tambah_siswa_proses');?>" method="post" enctype="multipart/form-data">
							<tr>
								<td>
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</td>
								<td colspan=4>
									<select required name="nim" class="form-control">
										<option value="">Pilih mahasiswa</option>
										<?php
											foreach($semua_siswa_all->result_array() as $s)
											{
												
												echo "<option value='".$s['nim']."'> ".$s['nim']." - ".$s['nama_mahasiswa']."</option>";
											}
										?>
									</select>
									<input type="hidden" name="id_kelas" value=<?php echo $kelas_siswa['id_kelas']; ?> readonly maxlength=100 class="form-control">
									<input type="hidden" name="jenjang" value=<?php echo $kelas_siswa['semester']; ?> readonly maxlength=100 class="form-control">
									<input type="hidden" name="tahun" value=<?php echo $kelas_siswa['tahun']; ?> readonly maxlength=100 class="form-control">
									
								</td>
								<td  align=center>
									<button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
								</td>
							</tr>
						</form>
						<?php $no=0; foreach($semua_siswa as $row ): $no++;?>
							<tr>
								<td align=center><?php echo ($no);?></td>
								<td><?php echo $row->nim;?></td>
								<td><?php echo $row->nama_mahasiswa;?></td>
								<td><?php echo $row->jenis_kelamin;?></td>
								<td><?php echo $row->alamat_asli;?></td>
								<td align=center>
									<!--tambah mahasiswa-->
									<a href="<?php echo site_url('mahasiswa/detail/'.$row->nim);?>"
										class='tooltipsku' 
										data-toggle='tooltip' 
										data-placement='top' 
										title="<?php echo 'detail '.$row->nim;?>"
										>
										<button type="button" class="btn btn-default" aria-label="Left Align">
											<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
										</button>
									</a>
									<a href="<?php echo site_url('mahasiswa/edit/'.$row->nim);?>"
										class='tooltipsku' 
										data-toggle='tooltip' 
										data-placement='top' 
										title="<?php echo 'edit '.$row->nim;?>"
										>
										<button type="button" class="btn btn-default" aria-label="Left Align">
											<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
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