<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('tata_usaha');?>"><strong> Tata Usaha Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Cari</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('tata_usaha');?>" class="btn btn-primary"><i class="glyphicon glyphicon-backward"></i> Kembali</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('tata_usaha/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Tata Usaha </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
			</div>
			<button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
	</div>
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
		<table class="table table-hover table-responsive table-bordered">
			<thead>
				<tr>
					<th >No.</th>
					<th >Id Tata Usaha</th>
					<th >Nama</th>
					<th >Jenis Kelamin</th>
					<th >Status Kepegawaian</th>
					<th >Status Keanggotaan</th>
					<th colspan="1" align="center">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($tata_usaha as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_tu;?></td>
				<td ><?php echo $row->nama_tu;?></td>
				<td ><?php echo $row->jenis_kelamin;?></td>
				<td ><?php echo $row->status_kepegawaian;?></td>
				<td ><?php echo $row->status_keanggotaan;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('tata_usaha/detail/'.$row->id_tu);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->id_tu;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('tata_usaha/edit/'.$row->id_tu);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->id_tu;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('tata_usaha/hapus/'.$row->id_tu);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->id_tu;?>"
							>
							<button type="button" class="btn btn-danger" aria-label="Left Align">
								<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
			<?php endforeach; ?>
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