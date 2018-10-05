<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-inbox"/></span> &nbsp <a href="<?php echo site_url('kelas');?>"><strong>Kelas Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('kelas/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
			<a href="<?php echo site_url('kelas/nonaktif');?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Lihat Data Nonaktif</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('kelas/cari');?>" method="post">
			<div class="form-group">
				<label>Cari kelas </label>
				<input type="text" class="form-control" placeholder="masukkan id/prodi" name="cari">
			</div>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
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
		<?php echo $pagination;?>	
		<table class="table table-hover table-responsive table-bordered">
			<thead>
				<tr>
					<th >No.</th>
					<th >Id Kelas</th>
					<th >Tahun</th>
					<th >Kelas</th>
					<th >Status</th>
					<th >DPA</th>
					<th >Jumlah Mahasiswa</th>
					<th colspan="3" align="center">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($kelas as $row): $no++;?>
			<tr>
				<td ><?php echo $no+$page;?></td>
				<td ><?php 
						$id_kelas= $row->id_kelas;
						echo $id_kelas; ?>
				</td>
				<td ><?php echo $row->tahun;?></td>
				<td><?php echo $row->semester." - ".$row->nama_prodi." - ".$row->ruang;?></td>
				<td ><?php echo $row->status;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td ><?php 
						$jumlahsiswa=$this->m_kelas->jumlah_siswa($id_kelas);
						echo $jumlahsiswa;
					?>
				</td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('kelas/detail/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('kelas/edit/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a disabled href="<?php echo site_url('kelas/hapus/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
			</table>
			<?php echo $pagination;?>
	</div>
</div>


<script>
    $(function(){
        $(".hapus").click(function(){
            var kode=$(this).attr("kode");
            
            $("#idhapus").val(kode);
            $("#myModal").modal("show");
        });
        
        $("#konfirmasi").click(function(){
            var kode=$("#idhapus").val();
            
            $.ajax({
                url:"<?php echo site_url('dashboard/hapus');?>",
                type:"POST",
                data:"kode="+kode,
                cache:false,
                success:function(html){
                    location.href="<?php echo site_url('dashboard/petugas/delete_success');?>";
                }
            });
        });
    });
</script>