<?php
	//hak akses menu
	$level = $this->session->userdata('level');
	$session_id = $this->session->userdata('username');
	$akses=($session_id);
	$cek1=$this->m_login->cektu($akses)->row_array();
	$cek2=$this->m_login->cekdosen($akses)->row_array();
	$cek3=$this->m_login->cekmaha($akses)->row_array();
	if($level=='mahasiswa'){
		$data['menu']		="menu_mahasiswa.php";
		if($cek1>0){
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}elseif($cek3>0){
			$data['jumlahakses']=$this->m_login->akses_maha($akses)->result();
		}
	}elseif($level=='pimpinan'){
		$data['menu']		="menu_pimpinan.php";
		if($cek1>0){
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0)
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
	}elseif($level=='dosen'){
		$data['menu']		="menu_dosen.php";
		if($cek1>0){
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}
	}elseif($level=='superadmin'){
		$data['menu']		="menu_super.php";
		if($cek1>0){
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}
	}
?>