<link href="<?php echo base_url('assets/js/jquery-ui-timepicker-addon.css');?>" media="all" rel="stylesheet">"
		<link href="<?php echo base_url('assets/js/jquery-ui.css');?>" media="all" rel="stylesheet">"
		<script src="<?php echo base_url('assets/js/jquery-1.9.0.min.js');?>"></script>		
		<script src="<?php echo base_url('assets/js/jquery-ui.min.js');?>"></script>		
		<script src="<?php echo base_url('assets/js/jquery-ui-timepicker-addon.js');?>"></script>
		<script language=Javascript>
			$(document).ready(function(){
				$('#time').timepicker();
			});
		</script>
		<script language=Javascript>
			$(document).ready(function(){
				$('#wak').timepicker();
			});
		</script>
<div class="container-fluid">
	<div class="side-body">
		<div class="page-title">
			<span class="title">Jam ke</span>
		</div>
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
		<div class="row">
			<div class="col-xs-12">
				<div class="card">
					<div class="card-header">
						<div class="card-title">
							<div class="title">From Pengisian</div>
						</div>
					</div>
					<div class="card-body">
						<form class="form-horizontal" role="form" action="<?php echo site_url('jamke/tambah_proses');?>" method="post">
							<div class="form-group">
								<label class="col-sm-2 control-label">Id Jam ke</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="id_jam_ke" placeholder="Id Jam ke">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Nama</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name="nama" placeholder="Nama Jam ke">
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 control-label">Jam Mulai</label>
								<div class="col-sm-10">
									<input type="text"  id="time" class="form-control" name="jam_mulai" placeholder="Jam Mulai">
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">Jam Selesai</label>
								<div class="col-lg-10">
									<input required type="text" name="jam_selesai" id="wak"  placeholder="Jam Selesai" class="form-control"/>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<button type="submit" class="btn btn-success">Tambah</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>