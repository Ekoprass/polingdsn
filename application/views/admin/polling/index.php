<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Penilaian Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<!--<a href="<?php echo site_url('polling/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('polling/cari');?>" method="post">
			<div class="form-group">
				<label>Cari polling </label>
				<input type="text" class="form-control" placeholder="masukkan id polling" name="cari">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>
		</form>-->
	</div>
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
		</br>
		<table class="table table-hover table-responsive table-bordered">
				<tr>
					<th >No</th>
					<th >Kelas Semester</th>
					<th >Jumlah Dosen</th>
					<th >Sudah</th>
					<th >Belum</th>
					<th ><center>Aksi</center></th>
				</tr>
			 <?php $no=0; foreach($polling as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_kelas;?></td>
				<td ><?php $id=$row->id_kelas;
				$nim=$this->session->userdata('username');
				$jumlah_dosen=$this->m_polling->jumlah_dosen($id)->num_rows();
				echo $jumlah_dosen;?></td>
				<td ><?php $id=$row->id_kelas;
				$dosen_sudah=$this->m_polling->dosen_sudah($id,$nim)->num_rows();
				echo $dosen_sudah ;?></td>
				<td ><?php $dosen_belum=$jumlah_dosen - $dosen_sudah;
				echo $dosen_belum ;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('polling/detail/'.$id);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php //echo 'Edit '.$row->id_polling;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		</br>
			
	</div>
</div>
