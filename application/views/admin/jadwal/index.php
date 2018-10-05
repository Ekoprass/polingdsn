<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('jadwal');?>"><strong>Jadwal Aktif</strong></a>
		</h4>
    </div>
	
	<!--bawah panel / tambah dan cari-->
	<!--<div class="well well-lg">
		&nbsp;
		&nbsp;
		<form class="navbar-form navbar-right" role="search" action="<?php echo site_url('jadwal/cari');?>" method="post">
			<div class="form-group">
				<label>Cari Jadwal </label>
				<input type="text" class="form-control" placeholder="masukkan nama" name="cari">
			</div>
			<button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i> Cari</button>	
		</form>
		</br>
		</br>
	</div>-->
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
			
		<table class="datatable table table-striped">
			<thead>
				<tr>
					<th >No.</th>
					<th >Id Kelas</th>
					<th >Tahun</th>
					<th >Kelas</th>
					<th >Status</th>
					<th >DPA</th>
					<th colspan="3" align="center">Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=0; foreach($kelas as $row): $no++;?>
			<tr>
				<td ><?php echo $no;?></td>
				<td ><?php 
						$id_kelas= $row->id_kelas;
						echo $id_kelas; ?>
				</td>
				<td ><?php echo $row->tahun;?></td>
				<td><?php echo $row->semester." - ".$row->nama_prodi." - ".$row->ruang;?></td>
				<td ><?php echo $row->status;?></td>
				<td ><?php echo $row->nama_dosen;?></td>
				<td width=150 align = "center">
						<a href="<?php echo site_url('jadwal/detail/'.$row->id_kelas);?>"
							class='tooltipsku' 
							data-toggle='tooltip' 
							data-placement='top' 
							title="<?php echo 'Detail '.$row->id_kelas;?>"
							>
							<button type="button" class="btn btn-default" aria-label="Left Align">
								<span class="glyphicon glyphicon-zoom-in" aria-hidden="true"></span>
							</button>
						</a>
				</td>
			</tr>
		<?php endforeach;?>
		</tbody>
		</table>
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