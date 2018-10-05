<?php
class Validasi extends CI_Controller{
    
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tata_usaha');
		$this->load->library(array('pagination','form_validation','upload'));
    }
    function validasi(){
		include('menu_akses.php'); //hak akses
		$data['title']="Validasi Mahasiswa | Polling AKN Bojonegoro";
		$data['judul']="Validasi Mahasiswa";
		$data['content']="validasimaha/index.php";
		$user=$this->uri->segment(4);
		$data['session_id']=$user;
		$data['mahasiswa']=$this->m_login->maha($user)->row_array();
		$this->load->view('admin/template_maha',$data);
    }
	function validasi_proses($nimkirim){
		$info=array(
			'nim'=>$nimkirim,
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'agama'=>$this->input->post('agama'),
			'alamat_asli'=>$this->input->post('alamat_asli'),
			'alamat_tinggal'=>$this->input->post('alamat_tinggal'),
			'phone'=>$this->input->post('phone'),
			'sekolah_asal'=>$this->input->post('sekolah_asal'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'nama_ibu'=>$this->input->post('nama_ibu'),
			'nama_bapak'=>$this->input->post('nama_bapak'),
		);
		$date=date('Y-m-d');
		$this->m_login->validasi($nimkirim,$date);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Validasi Data sudah berhasil!');
		$level='mahasiswa';
		$this->session->set_userdata('level',$level);
		redirect('validasi/validasi_pass/'.$level.'/'.$nimkirim);
	}	
    function validasi_pass(){
		//include('menu_akses.php'); //hak akses
		$data['title']="Validasi Mahasiswa | Polling AKN Bojonegoro";
		$data['judul']="Validasi Mahasiswa";
		$data['content']="validasimaha/password.php";
		$user=$this->uri->segment(4);
		$data['session_id']=$user;
		$data['mahasiswa']=$this->m_login->maha($user)->row_array();
		$this->load->view('admin/template_maha',$data);
    }
	function validasi_pass_pro($nimkirim){
		$info=array(
			'password'=>md5($this->input->post('password'))
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Validasi Data sudah berhasil!');
		$level='mahasiswa';
		$this->session->set_userdata('level',$level);
		redirect('dashboard');
    }	
	function akses(){
		include('menu_akses.php'); //hak akses
		$data['title']="Pilih Hak Akses | Polling AKN Bojonegoro";
		$data['judul']="Pilih Hak Akses Anda";
		$akses=$this->uri->segment(3);
		$data['session_id']=$akses;
		$cek1=$this->m_login->cektu($akses)->row_array();
		$cek2=$this->m_login->cekdosen($akses)->row_array();
		if($cek1>0){
			$data['jumlahakses']=$this->m_login->akses_tu($akses)->result();
		}elseif($cek2>0){
			$data['jumlahakses']=$this->m_login->akses_dos($akses)->result();
		}else{
			redirect('home');
		}
		$this->load->view('admin/akses/index',$data);
	}
	function pilih($username,$a){
		if($a=='tata_usaha'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='tata_usaha';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='dosen'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='dosen';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='mahasiswa'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='mahasiswa';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='administrator'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='administrator';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='bendahara'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='bendahara';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='pimpinan'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='pimpinan';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}elseif($a=='superadmin'){
			$this->session->set_userdata('username',$username);
			$session_id = $this->session->userdata('username');
			$level='superadmin';
			$this->session->set_userdata('level',$level);
			redirect('dashboard');
		}else{
			redirect('home');
		}
	}
	
	
	function logout(){
        $this->session->unset_userdata('username');
        redirect('home');
    }
}