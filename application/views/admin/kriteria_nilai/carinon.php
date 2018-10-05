<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-file"/></span> &nbsp <a href="<?php echo site_url('kriteria_nilai/nonaktif');?>"><strong>Kriteria Nilai Nonaktif</strong></a>
			<span class="glyphicon glyphicon-forward"/></span> &nbsp <strong>Cari</strong>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('kriteria_nilai/nonaktif');?>" class="btn btn-default"> Kembali</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('kriteria_nilai/carinon');?>" method="post">
			<div class="form-group">
				<label>Cari Kriteria Nilai </label>
				<input type="text" class="form-control" placeholder="masukkan id kriteria_nilai" name="cari">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>	
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
					<th >No</th>
					<th >Id kriteria_nilai</th>
					<th >kriteria_nilai</th>
					<th >Keterangan</th>
					<th >Kategori</th>
					<th >Status</th>
					<th colspan="3" align="center">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($kriteria_nilai as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_kriteria_nilai;?></td>
				<td ><?php echo $row->kriteria_nilai;?></td>
				<td ><?php echo $row->keterangan;?></td>
				<td ><?php echo $row->kategori;?></td>
				<td ><?php echo $row->status;?></td>
				<td width=150 align = "center">
						<a href="#"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="data nonaktif tidak boleh di edit"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('kriteria_nilai/aktifkan/'.$row->id_kriteria_nilai);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Aktifkan '.$row->id_kriteria_nilai;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-star" aria-hidden="true"></span>
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