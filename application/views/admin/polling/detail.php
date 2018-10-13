<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <strong>Penialaian Dosen</strong>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Detail</strong>
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
		<div class="col-md-12">
			<div class="panel panel-default">
					<!--panel header-->
					<div class="panel-heading">
						<h4 class="panel-title">
							<span class="glyphicon glyphicon-inbox"></span>
							<strong>Daftar Dosen</strong>
						</h4>
					</div>				
					<!--body-->
				<div class="panel-body">
					</br>
					<table class="table table-hover table-responsive table-bordered">
							<tr>
								<th width=150 >No.</th>
								<th width=500 >Nama Dosen</th>
								<th width=150 >Mata Kuliah Yang Diampu</th>
								<th width=150 >Nilai</th>
								<th colspan=2 ><center>Mulai Penilaian</center></th>
							</tr>
						<?php $no=0;  foreach($dosen_kelas as $row ): $no++;?>
							<tr>
								<td><?php echo ($no);?></td>
								<td><?php echo $row->nama_dosen;?></td>
								<td><?php echo $row->nama_mk;?></td>
								<td><?php
								$nim=$this->session->userdata('username');
								$ceknilai=$this->m_polling->ceknilai($row->id_dosen,$kelas_siswa['id_kelas'],$nim)->result();
								$cek=$this->m_polling->cek_p($row->id_dosen,$kelas_siswa['id_kelas'],$nim)->num_rows();
								$nil=array();
								$n=0;  foreach($ceknilai as $rows ): $n++;
								$id_kriteria_nilai=$rows->kriteria_nilai;
								$jumlah_nilai=$this->m_polling->jumlah_nilai($id_kriteria_nilai)->row_array();
								$nil[]=$jumlah_nilai['kriteria_nilai'];
								//echo $jumlah_nilai['kriteria_nilai'];
								endforeach;
								$jumlah=array_sum($nil);
								$ceknilai2=$this->m_polling->ceknilai2($row->id_dosen,$kelas_siswa['id_kelas'],$nim)->result();
								$nil2=array();
								$n=0;  foreach($ceknilai2 as $rows2 ): $n++;
								$id_kriteria_nilai2=$rows2->kriteria_nilai;
								$jumlah_nilai2=$this->m_polling->jumlah_nilai($id_kriteria_nilai2)->row_array();
								$nil2[]=$jumlah_nilai2['kriteria_nilai'];
								//echo $jumlah_nilai['kriteria_nilai'];
								endforeach;
								$jumlah=array_sum($nil);
								$jumlah2=array_sum($nil2);
								echo $jumlah-$jumlah2;
								if($cek==0){
									$url=site_url('polling/detail_nilai/'.$row->id_dosen.'/'.$kelas_siswa['id_kelas']);
								}
								else{
									$url=site_url('polling/edit_nilai/'.$row->id_dosen.'/'.$kelas_siswa['id_kelas']);
								}
								//echo count($ceknilai);
								?></td>
								<td align=center>
									<!--tambah mahasiswa-->
									<a href="<?php echo $url; ?>"
										class='tooltipsku' 
										data-toggle='tooltip' 
										data-placement='top' 
										title=""
										>
										<button type="button" class="btn btn-success" aria-label="Left Align">
											<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
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