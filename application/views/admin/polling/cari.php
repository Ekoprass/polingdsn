<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Laporan Penilaian</strong></a>
		</h4>
    </div>
    <div class="well well-sm">
    <!--<a href="<?php echo site_url('polling/ekspor');?>" class="btn btn-info"><i class="glyphicon glyphicon-export"></i> Expor</a>-->
	    
	    <form class="navbar-form navbar-right" role="search" action="<?php //echo site_url('dosen/cari');?>" method="post">
			<div class="form-group">
				<select class="col-md-12" name="dosen">
					<option value="">Pilih Dosen</option>
					<?php $no=0; foreach ($dosen as $row): $no++ ;?>
					<option value="<?php echo $row->id_dosen;?>"><?php echo $row->nama_dosen;?></option>
				<?php endforeach; ?>
				</select>				
				<select required name="thn_semester">
					<option value="">Pilih Tahun Semester</option>
					<?php $no=0; foreach ($thn_semester as $row): $no++ ;?>
					<option value="<?php echo $row->id_tahun_semester;?>"><?php echo $row->id_tahun_semester;?></option>
				<?php endforeach; ?>
				</select>
			</div>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
	</br>
	</br>
	</div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="panel-body">		
	<!--pesan error/sukses/dll-->
	<?php
		$data=$ketemu;
		if ($data!=null){?>
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-ok-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $ketemu;?>
			</div>
		<?php
		}
		?>
		</br>
		<table class="table table-hover table-responsive table-bordered">
				<tr>
					<th >No</th>
					<th >ID Dosen</th>
					<th >Nama</th>
					<th >Total Poin Nilai</th>
					<th >Nilai Rata-rata</th>
					<th >Kategori</th>
					<th >Ranking</th>
					<th ><center>Opsi</center></th>
				</tr>
				<?php $no=0;  foreach($polling as $row ): $no++;?>			
				<tr>
					<?php $jumlah_mhs_penilai=$this->m_laporan->mhs_menilai_dosen_thn($row->id_dosen, $tahun_semester)->result(); 
					foreach ($jumlah_mhs_penilai as $key) {
						$rata=$row->nilai/$key->jumlah_penilai;?>

					
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_dosen;?></td>
				<td ><?php echo $row->nama_dosen?></td>
				<td ><?php echo $row->nilai?></td>
				<td ><?php echo $rata;?></td>
				<td ><?php echo get_kategori($rata);?></td>
				<th ><?php echo $row->rank?> dari <?php echo $dsn_rank['jum_dsn'] ?> </th>
				<td width=150 align = "center">
					<a href="<?php echo  site_url('polling/detail_admin/'.$row->id_dosen.'/'.$tahun_semester);?>"
						class='tooltipsku' 
						data-toggle='tooltip' 
						data-placement='top' 
						title=""
						>
						<button type="button" class="btn btn-default" aria-label="Left Align">
							<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
						</button>
					</a>
				</td>
			<?php }	?>
			</tr>
		<?php endforeach;?>
		</table>
		</br>
			
	</div>
</div>