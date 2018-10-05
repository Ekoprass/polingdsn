<script src="<?php echo base_url('assets/js/jquery-1.5.2.min.js');?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$("input[name='checkAll']").click(function() {
			var checked = $(this).attr("checked");
			$("#myTable tr td input:checkbox").attr("checked", checked);
		});
	});
</script>
<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> <strong> Naik Kelas</strong>
		</h4>
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
		<form action="<?php echo site_url('kelas/naikkelas'); ?>" method="post">
			<button type="submit" name="submit" class="btn btn-success"><i class="glyphicon glyphicon-eject"></i>Naik Kelas</button>	
			</br>
			</br>
			<?php
				$r=substr($kelas,0,2);
				$i=substr($kelas,2,2);
				$k=substr($kelas,4,2); 
				$h=substr($kelas,6,4); 
				$g=$i+01;
				$m=$k+01;
				if($k==01){
					$id=$r.$g.'0'.$m.$h;
				}elseif($k==02){
					$id=$r.$g.'0'.$m.$h;
				}else{
					$id=$r.$g.'0'.$m.$h;
				}
				?>
			<?php $tentukan=$this->m_kelas->tentu($this->uri->segment(3))->row_array();
			$kelas=$tentukan['id_kelas'];
			$tahun=$tentukan['tahun'];
			$prodi=$tentukan['id_prodi'];
			$semester=$tentukan['semester'];
			$dpa=$tentukan['dpa'];
			$ruang=$tentukan['ruang'];
			?>
			<input type="text" value="<?php echo $id;?>" name="idkelas"/>
			<input type="text" value="<?php echo $this->uri->segment(3);?>" name="kelas"/>
			<input type="hidden" value="<?php echo $tahun;?>" name="tahun"/>
			<input type="hidden" value="<?php echo $prodi;?>" name="prodi"/>
			<input type="text" value="<?php echo '0'.$m;?>" name="semester"/>
			<input type="hidden" value="<?php echo $dpa;?>" name="dpa"/>
			<input type="hidden" value="<?php echo $ruang;?>" name="ruang"/>
			<table class="table table-hover table-responsive table-bordered" id="myTable">
				<thead>
					<tr>
						<th><input type="checkbox" id="checkAll" name="checkAll"></th>
						<th >No.</th>
						<th >NIM</th>
						<th >Nama Mahasiswa</th>
						<th >Jenis Kelamin</th>
						<th >Alamat Asli</th>
					</tr>
				</thead>
				<?php if (count($semua_mahasiswa)>0) {
					$no=0; foreach($semua_mahasiswa as $row ): $no++;?>
					<tr>
						<td><input type="checkbox" name="msg[]" value="<?php echo $row->nim; ?>"></td>
						<td align='center'><?php echo ($no);?></td>
						<td ><?php echo $row->nim;?></th>
						<td ><?php echo $row->nama_mahasiswa;?></th>
						<td ><?php echo $row->jenis_kelamin;?></th>
						<td ><?php echo $row->alamat_asli;?></th>
					</tr>
					<?php
					endforeach;
				}
				else {
					echo "<tr><td colspan=5>DATA KOSONG!!</td></tr>";
				}
				?>
			</table>
		</form>
	</div>
</div>