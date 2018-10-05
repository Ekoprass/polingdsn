<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('tahun_semester');?>"><strong>Tahun Semester Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->	
	<div class="panel-body">	
		</br>
		<div class="col-md-5">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th width=100>Id Tahun Semester</th>
							<td width=500><?php echo $id_tahun_semester=$this->uri->segment(3);?></td>
						</tr>
						<tr>
							<th>Tahun</th>
							<td><?php $tahun=substr($id_tahun_semester,0,4);
									echo $tahun;?></td>
						</tr>
						<tr>
							<th width=250>Semester</th>
							<td><?php $semester=substr($id_tahun_semester,4,2);
									echo $semester;?></td>
						</tr>
						<tr>
							<th width=250>Jumlah Pertanyaan</th>
							<td><?php $jumlahsoal=$this->m_tahun_semester->jumlah_soal($id_tahun_semester);
									echo $jumlahsoal;;?></td>
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
							<span class="glyphicon glyphicon-inbox"></span>
							<strong>Daftar Pertanyaan </strong>
						</h4>
					</div>				
					<!--body-->
				<div class="panel-body">
					</br>
					<table class="table table-hover table-responsive table-bordered">
						<thead>
							<tr>
								<th width=50>No.</th>
								<th width=150>Id Pertanyaan</th>
								<th width=300>Pertanyaan</th>
								<th width=75>Kategori</th>
							</tr>
						</thead>
						<form class="form-horizontal" action="<?php echo site_url('tahun_semester/tambah_pertanyaan_proses');?>" method="post" enctype="multipart/form-data">
							<tr>
								<td>
									<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
								</td>
								<td colspan=2>
									<select required name="id_pertanyaan" class="form-control">
										<option value="">Pilih Pertanyaan</option>
										<?php foreach($semua_pertanyaan->result_array() as $s)
											{
												
												echo "<option value='".$s['id_pertanyaan']."'> ".$s['id_pertanyaan']." - ".$s['pertanyaan']."</option>";
											}
										?>
									</select>
									<input type="hidden" name="id_tahun_semester" value=<?php echo $id_tahun_semester; ?> maxlength=100 class="form-control">
									
								</td>
								<td  align=center>
									<button class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
								</td>
							</tr>
						</form>
						<?php $no=0; foreach($semua as $row ): $no++;?>  
							<tr>
								<td align=center><?php echo ($no);?></td>
								<td><?php echo $row->id_pertanyaan;?></td>
								<td><?php echo $row->pertanyaan;?></td>
								<td><?php echo $row->kategori;?></td>
							</tr>
						<?php endforeach;?>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>