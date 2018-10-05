<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Laporan Polling</strong></a>
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
					<th >Nilai</th>
					<th ><center>Opsi</center></th>
				</tr>
				<?php $no=0;  foreach($polling as $row ): $no++;?>			
				<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_dosen;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td ><?php 
				$ceknilai=$this->m_polling->ceknilai_dosen($row->id_dosen)->result();
				$nil=array();
				$n=0;  foreach($ceknilai as $rows ): $n++;
				$id_kriteria_nilai=$rows->kriteria_nilai;
				$jumlah_nilai=$this->m_polling->jumlah_nilai($id_kriteria_nilai)->row_array();
				$nil[]=$jumlah_nilai['kriteria_nilai'];
				//echo $jumlah_nilai['kriteria_nilai'];
				endforeach;
				$jumlah=array_sum($nil);
				$ceknilai2=$this->m_polling->ceknilai2_dosen($row->id_dosen)->result();
				$nil2=array();
				$n=0;  foreach($ceknilai2 as $rows2 ): $n++;
				$id_kriteria_nilai2=$rows2->kriteria_nilai;
				$jumlah_nilai2=$this->m_polling->jumlah_nilai($id_kriteria_nilai2)->row_array();
				$nil2[]=$jumlah_nilai2['kriteria_nilai'];
				//echo $jumlah_nilai['kriteria_nilai'];	
				endforeach;
				$jumlah=array_sum($nil);
				$jumlah2=array_sum($nil2);
				echo $jumlah-$jumlah2; ?></td>
				<td width=150 align = "center">
					<a href="<?php echo  site_url('polling/detail_dosen/'.$row->id_dosen.'/'.$tahun_semester);?>"
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
			</tr>
		<?php endforeach;?>
		</table>
		</br>
			
	</div>
</div>