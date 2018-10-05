<?php
	//hak akses menu
	$level = $this->session->userdata('level');
	$session_id = $this->session->userdata('username');
	$akses=($session_id);
	$cek1=$this->m_login->cektu($akses)->row_array();
	$cek2=$this->m_login->cekdosen($akses)->row_array();
	$cek3=$this->m_login->cekmaha($akses)->row_array();
	$cekpro_tu=$this->m_tata_usaha->ceki($id)->row_array();
	$cekpro_dos=$this->m_dosen->ceki($id)->row_array();
	$cekpro_maha=$this->m_mahasiswa->ceki($id)->row_array();
	if ($level=='dosen'){
		$data['menu']		="menu_dosen.php";
		if($cek1>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']		=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}
	}elseif($level=='superadmin'){
		$data['menu']		="menu_super.php";
		if($cek1>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}
	}elseif($level=='mahasiswa'){
		$data['menu']		="menu_mahasiswa.php";
		$cek3=$this->m_login->cekmaha($akses)->row_array();
		if($cek1>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			}elseif($cek3>0){
				$data['mahasiswa']	=$cekpro_maha;
				$data['content']	="dashboard/edit_mahasiswa.php";
			}
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}elseif($cek3>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['nim']=$this->m_login->akses_maha($akses)->result();
	}elseif($level=='pimpinan'){
		$data['menu']		="menu_pimpinan.php";
		if($cek1>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			if($cek1>0){
				$data['tata_usaha']	=$cekpro_tu;
				$data['content']	="dashboard/edit_tu.php";
			}elseif($cek2>0){
				$data['dosen']	=$cekpro_dos;
				$data['content']	="dashboard/edit_dosen.php";
			}
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}
	}	
	
?>	