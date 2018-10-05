<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dosen');?>"><strong>Dosen Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('dosen/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<a href="<?php echo site_url('dosen/nonaktif');?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Lihat Data Nonaktif</a>
		<!--<a href="<?php echo site_url('dosen/ekspor');?>" class="btn btn-info"><i class="glyphicon glyphicon-export"></i> Expor</a>-->
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('dosen/cari');?>" method="post">
			<div class="form-group">
				<label>Cari dosen </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
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
		</br>
		<?php echo $pagination;?>
		<table class="table table-hover table-responsive table-bordered">
			<thead style="text-align='center'">
				<tr>
					<th >No.</th>
					<th >ID Dosen</th>
					<th >Nama Dosen</th>
					<th >Jenis Kelamin</th>
					<th >Kepegawaian</th>
					<th >Status</th>
					<th ><center>Aksi</center></th>
				</tr>
			</thead>
			
			<?php $no=0; foreach($dosen as $row): $no++;?>
			<tr>
				<td ><?php echo $no+$page;?></td>
				<td ><?php echo $row->id_dosen;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td ><?php echo $row->jenis_kelamin;?></td>
				<td ><?php echo $row->status_kepegawaian;?></td>
				<td ><?php echo $row->status_keanggotaan;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('dosen/detail/'.$row->id_dosen);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->nama_dosen;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('dosen/edit/'.$row->id_dosen);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->nama_dosen;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a disabled href="<?php echo site_url('dosen/hapus/'.$row->id_dosen);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->nama_dosen;?>"
							>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
		</table>
		</br>
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