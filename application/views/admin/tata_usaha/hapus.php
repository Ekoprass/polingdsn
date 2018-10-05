<div class="panel panel-info side-body">
	<!--panel header-->
	<div class="panel-heading">
		<h4 class="panel-title">
			<span class="glyphicon glyphicon-user"/></span> &nbsp <a href="<?php echo site_url('dosen');?>"><strong> Tata Usaha Aktif</strong></a>&nbsp
			<span class="fa fa-angle-double-right"/></span> <strong> Hapus</strong>
		</h4>
    </div>
		<!--pesan error/sukses/dll-->		
		<?php
		$data=$this->session->flashdata('message');
		if ($data!=null){?>
			<div class="alert alert-danger" role="alert">
				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
				<span class="sr-only">Error:</span>
				<?php echo $this->session->flashdata('message');?>
			</div>
		<?php
		}
		?>
		<?php echo validation_errors();?>
		</br>
		</br>
		<?php $id=$tata_usaha['id_tu'];?>
		<div class="card-body">
		<form class="form-horizontal" action="<?php echo site_url('tata_usaha/hapus_proses/'.$id);?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label class="col-sm-2 control-label">NIP / ID Tata Usaha</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $tata_usaha['id_tu'];?>" type="text" name="id_tu" class="form-control" onkeypress="return isNumberKey(event)" size="12" maxlength="20" >
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Nama</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $tata_usaha['nama_tu'];?>" type="text" name="nama" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tempat Lahir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $tata_usaha['tmpt_lahir'];?>" type="text" name="tempat" maxlength=100 class="form-control">
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Tanggal Lahir</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $tata_usaha['tgl_lahir'];?>" type="text" name="tgl_lahir" id="tanggal" class="form-control"/>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Jenis Kelamin</label>
				<div class="col-sm-9">
					<select required disabled name="jk" class="form-control">
						<option value="<?php echo $tata_usaha['jenis_kelamin'];?>"><?php echo $tata_usaha['jenis_kelamin'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Agama</label>
				<div class="col-sm-9">
					<select required disabled name="agama" class="form-control">
						<option value="<?php echo $tata_usaha['agama'];?>"><?php echo $tata_usaha['agama'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Pendidikan Terakhir</label>
				<div class="col-sm-9">
					<select required disabled name="pendidikan" class="form-control">
						<option value="<?php echo $tata_usaha['pendidikan_akhir'];?>"><?php echo $tata_usaha['pendidikan_akhir'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Kepegawaian</label>
				<div class="col-sm-9">
					<select required disabled name="status_kepegawaian" class="form-control">
						<option value="<?php echo $tata_usaha['status_kepegawaian'];?>"><?php echo $tata_usaha['status_kepegawaian'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Status</label>
				<div class="col-sm-9">
					<select required disabled name="status_keanggotaan" class="form-control">
						<option value="<?php echo $tata_usaha['status_keanggotaan'];?>"><?php echo $tata_usaha['status_keanggotaan'];?> </option>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-2 control-label">Alamat</label>
				<div class="col-sm-9">
					<input required disabled value="<?php echo $tata_usaha['alamat'];?>" class="form-control" name="alamat" rows="3">
				</div>
			</div>
			<div class="col-sm-20">
				<div class="well well-sm">
					<div class="form-group">
							<div class="col-sm-offset-2 col-sm-5">
								<button type="delete" class="btn btn-danger"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
							</div>
					</div>
				</div>
			</div>
		</form>
	</div>