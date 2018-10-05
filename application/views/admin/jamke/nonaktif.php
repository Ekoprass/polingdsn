<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('mata_kuliah/nonaktif');?>"><strong>Mata Kuliah Nonaktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
			<a href="<?php echo site_url('mata_kuliah');?>" class="btn btn-success"><i class="glyphicon glyphicon-star"></i> Lihat Data Aktif</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('mata_kuliah/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Mata Kuliah </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>	
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
			
		<table class="table table-hover table-responsive table-bordered">
			<thead>
				<tr>
					<th >No.</th>
					<th >Id Mata Kuliah</th>
					<th >Nama Mata Kuliah</th>
					<th >Deskripsi</th>
					<th >Jumlah Jam</th>
					<th >Jumlah SKS</th>
					<th >Semester</th>
					<th >Status</th>
					<th colspan="3" align="center">Aksi</th>
				</tr>
			</thead>
			<?php $no=0; foreach($mata_kuliah as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php echo $row->id_mk;?></td>
				<td ><?php echo $row->nama_mk;?></td>
				<td ><?php echo $row->deskripsi_mk;?></td>
				<td ><?php echo $row->jml_jam;?></td>			
				<td ><?php echo $row->jml_sks;?></td>
				<td ><?php echo $row->smt;?></td>
				<td ><?php echo $row->status_mk;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('mata_kuliah/detail/'.$row->id_mk);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'detail '.$row->id_mk;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
						<a href="#"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title='data nonaktif tidak boleh di edit'
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a disabled href="<?php echo site_url('mata_kuliah/aktifkan/'.$row->id_mk);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Aktifkan'.$row->id_mk;?>"
							>
							<button type="button" class="btn btn-success" aria-label="Left Align">
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