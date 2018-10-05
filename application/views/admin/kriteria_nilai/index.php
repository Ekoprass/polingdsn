<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('kriteria_nilai');?>"><strong>Kriteria Nilai Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<div class="well well-sm">
		<a href="<?php echo site_url('kriteria_nilai/tambah');?>" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
		<a href="<?php echo site_url('kriteria_nilai/nonaktif');?>" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Lihat Data Nonaktif</a>
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('kriteria_nilai/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Kriteria Nilai </label>
				<input type="text" class="form-control" placeholder="masukkan id kriteria nilai" name="cari">
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
		</br>
		
		<table class="table table-hover table-responsive table-bordered">
			<thead style="text-align='center'">
				<tr>
					<th >No</th>
					<th >Id Kriteria Nilai</th>
					<th >Kriteria Nilai</th>
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
						<a href="<?php echo site_url('kriteria_nilai/edit/'.$row->id_kriteria_nilai);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Edit '.$row->id_kriteria_nilai;?>"
							>
							<button type="button" class="btn btn-info" aria-label="Left Align">
								<span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
							</button>
						</a>
						<a href="<?php echo site_url('kriteria_nilai/hapus/'.$row->id_kriteria_nilai);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Hapus '.$row->id_kriteria_nilai;?>"
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