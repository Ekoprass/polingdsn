<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('jadwal');?>"><strong>Jadwal Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Detail</strong>
		</h4>
    </div>
	<!--pesan error/sukses/dll-->	
	<div class="panel-body">	
		
		</br>
		<div class="col-md-5">	
				<table class="table table-hover table-responsive table-bordered">
						<tr>
							<th width=100>Id Kelas</th>
							<td width=500><?php $k=$kelas_j['id_kelas'];
							echo $k; ?></td>
						</tr>
						<tr>
							<th>Tahun Ajaran</th>
							<td><?php echo $kelas_j['tahun'];?></td>
						</tr>
						<tr>
							<th width=250>Prodi</th>
							<td><?php echo $kelas_j['nama_prodi'];?></td>
						</tr>
						<tr>
							<th width=100>Status Kelas</th>
							<td><?php echo $kelas_j['status'];?></td>
						</tr>
						<tr>
							<th width=250>DPA</th>
							<td><?php echo $kelas_j['nama_dosen'];?></td>
						</tr>
				</table>
		</div>
		
		</br>
				
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
						<strong>Detail Jadwal Kelas <?php echo substr($kelas_j['id_kelas'], 6,2)." - ".substr($kelas_j['id_kelas'], 8,2)." Semester ".substr($kelas_j['id_kelas'], 4,2)." Tahun ".substr($kelas_j['id_kelas'], 0,4);?></strong>
					</h4>
				</div>				
					<!--body-->
				<div class="panel-body">
					<table class="table table-hover table-responsive table-bordered" >
						<thead>
							<tr align="center">
								<th>Jam-Ke</th>
								<th>SENIN</th>
								<th>SELASA</th>
								<th>RABU</th>
								<th>KAMIS</th>
								<th>JUM'AT</th>
								<th>SABTU</th>
							</tr>
						</thead>
						<tr align="center">
							<td>01</td>
							<td>
								<?php $jam="01";
									  $jadwal="001";
									  $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="01";
									  $jadwal="002";
									  $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="01";
									  $jadwal="003";
									  $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk']."</br>[ Dosen : ". $rabu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="01";
									  $jadwal="004";
									   $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="01";
									  $jadwal="005";
									  $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="01";
									  $jadwal="006";
									   $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>02</td>
							<td>
								<?php $jam="02";
									  $jadwal="001";
									   $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="02";
									  $jadwal="002";
									  $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="02";
									  $jadwal="003";
									  $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk']."</br>[ Dosen : ". $rabu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="02";
									  $jadwal="004";
									  $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="02";
									  $jadwal="005";
									  $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="02";
									  $jadwal="006";
									  $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>03</td>
							<td>
								<?php $jam="03";
									  $jadwal="001";
									  $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="03";
									  $jadwal="002";
									  $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="03";
									  $jadwal="003";
									  $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk']."</br>[ Dosen : ". $rabu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="03";
									  $jadwal="004";
									  $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="03";
									  $jadwal="005";
									    $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="03";
									  $jadwal="006";
									    $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>04</td>
							<td>
								<?php $jam="04";
									  $jadwal="001";
									    $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="04";
									  $jadwal="002";
									    $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="04";
									  $jadwal="003";
									    $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk']."</br>[ Dosen : ". $rabu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="04";
									  $jadwal="004";
									    $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="04";
									  $jadwal="005";
									    $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="04";
									  $jadwal="006";
									    $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>05</td>
							<td>
								<?php $jam="05";
									  $jadwal="001";
									    $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="05";
									  $jadwal="002";
									    $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="05";
									  $jadwal="003";
									    $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk']."</br>[ Dosen : ". $rabu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="05";
									  $jadwal="004";
									    $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="05";
									  $jadwal="005";
									    $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="05";
									  $jadwal="006";
									    $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>06</td>
							<td>
								<?php $jam="06";
									  $jadwal="001";
									    $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="06";
									  $jadwal="002";
									    $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="06";
									  $jadwal="003";
									    $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk'];
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="06";
									  $jadwal="004";
									    $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="06";
									  $jadwal="005";
									    $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="06";
									  $jadwal="006";
									    $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>07</td>
							<td>
								<?php $jam="07";
									  $jadwal="001";
									    $hari="Senin";
								$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($senin>0){
									$senin=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $senin['nama_mk']."</br>[ Dosen : ". $senin['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td> 
							<td>
								<?php $jam="07";
									  $jadwal="002";
									    $hari="Selasa";
								$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($selasa>0){
									$selasa=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $selasa['nama_mk']."</br>[ Dosen : ". $selasa['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="07";
									  $jadwal="003";
									    $hari="Rabu";
								$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($rabu>0){
									$rabu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $rabu['nama_mk']."</br>[ Dosen : ". $rabu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="07";
									  $jadwal="004";
									    $hari="Kamis";
								$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($kamis>0){
									$kamis=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $kamis['nama_mk']."</br>[ Dosen : ". $kamis['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="07";
									  $jadwal="005";
									    $hari="jumat";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
										  $jumat['nama_dosen'];
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td>
								<?php $jam="07";
									  $jadwal="006";
									    $hari="Sabtu";
								$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($sabtu>0){
									$sabtu=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $sabtu['nama_mk']."</br>[ Dosen : ". $sabtu['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
						</tr>
						<tr align="center">
							<td>08</td>
							<td> - </td> 
							<td> - </td>
							<td> - </td>
							<td> - </td>
							<td>
								<?php $jam="08";
									  $jadwal="007";
								$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->num_rows();
								$cekkosong=$this->m_jadwal->cekkosong($k,$jam,$jadwal)->num_rows();
								if($jumat>0){
									$jumat=$this->m_jadwal->cek($k,$jam,$jadwal)->row_array();
									 echo $jumat['nama_mk']."</br>[ Dosen : ". $jumat['nama_dosen']."]";
								}elseif($cekkosong>0){
									echo "kosong";								
								}else {
									include 'button.php';
								}
								?>
							</td>
							<td> - </td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>