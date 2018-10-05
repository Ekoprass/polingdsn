<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('tahun_semester');?>"><strong>Tahun Semester</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail</strong>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="panel-body">		
	<!--pesan error/sukses/dll-->
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
		<div class="col-md-5">	
			<table class="table table-hover table-responsive table-bordered">
					<tr>
						<th width=100>Id Tahun Semester</th>
						<td width=500>
							<?php
								echo $id;
							?>
						</td>
					</tr>
					<tr>
						<th>Tahun</th>
						<td><?php echo $tahun;?></td>
					</tr>
					<tr>
						<th width=250>Semester</th>
						<td><?php echo $semester;?></td>
					</tr>
					<tr>
						<th width=100>Jumlah Akun</th>
						<td><?php echo $jumlah_akun;?></td>
					</tr>
					<tr>
						<th width=250>Jumlah Bayar</th>
						<td>
							<?php 
								if ($jumlah_akun==0){
									echo '0';
								} else{
									$jumlah_bayar=$this->m_tahun_semester->jumlahbayar($id)->result();
									$n=0; foreach($jumlah_bayar as $r ): $n++;
										$jumlah=$r->jumlahbayarth;
									echo $jumlah;
									endforeach;
								}								
							?>
						</td>
					</tr>
					
			</table>
		</div>
		<div class="col-md-12">
			<div class="panel panel-default">
				<!--panel header-->
				<div class="panel-heading">
					<h4 class="panel-title">
						<span class="glyphicon glyphicon-user"></span>
						<strong>Daftar Akun </strong>
					</h4>
				</div>				
				<!--body-->
				<div class="panel-body">
					<div class="panel-body">
					<table class="table table-hover table-responsive table-bordered">
							<thead>
								<tr>
									<th width=50>No.</th>
									<th width=150>Kode</th>
									<th width=300>Nama Akun</th>
									<th width=75>Jumlah</th>
									<th width=300>Aksi</th>
								</tr>
							</thead>
							<form class="form-horizontal" action="<?php echo site_url('tahun_semester/edit_pertama');?>" method="post" enctype="multipart/form-data">
								<tr>
									<td colspan=4>
										<select required name="id_akun" class="form-control">
											<option value="">Pilih Akun</option>
											<?php
												foreach($semua_akun->result_array() as $s)
												{
													echo "<option value='".$s['id_akun']."'> ".$s['id_akun']." - ".$s['nama']."</option>";
												}
											?>
										</select>
										<input type="hidden" name="id_tahun_semester" value=<?php echo $id; ?> readonly maxlength=100 class="form-control">
										<input type="hidden" name="id_lama" value=<?php echo $idlama; ?> readonly maxlength=100 class="form-control">
										<input type="hidden" name="tahun" value=<?php echo $tahun; ?> readonly maxlength=100 class="form-control">
										<input type="hidden" name="semester" value=<?php echo $semester; ?> readonly maxlength=100 class="form-control">
										
									</td>
									<td  align=center>
										<button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
									</td>
								</tr>
							</form>
												
							<?php $no=0; foreach($semuaa as $row ): $no++;?>
								<tr>
									<td align=center><?php echo ($no);?></td>
									<td><?php echo $row->id_akun;?></td>
									<td><?php echo $row->nama;?></td>
									<td><?php echo $row->jumlah;?></td>
									<td align=center>
										<!--tambah siswa-->
										<a disabled href="<?php echo site_url('akun/detail/'.$row->id_akun);?>"
											class='tooltipsku' 
											data-toggle='tooltip' 
											data-placement='top' 
											title="<?php echo 'detail '.$row->id_akun;?>"
											>
											<button type="button" class="btn btn-default" aria-label="Left Align">
												<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
											</button>
										</a>
										<a disabled href="<?php echo site_url('akun/edit/'.$row->id_akun);?>"
											class='tooltipsku' 
											data-toggle='tooltip' 
											data-placement='top' 
											title="<?php echo 'edit '.$row->id_akun;?>"
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
</div>