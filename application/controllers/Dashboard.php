<?php
class Dashboard extends CI_Controller{
    private $limit=20;
    
	function __construct(){
        parent::__construct();
        $this->load->model('m_mahasiswa');
		$this->load->model('m_dosen');
		$this->load->model('m_tata_usaha');
		$this->load->model('m_login');
		$this->load->model('m_polling');
		$this->load->model('m_laporan');
		$this->load->library(array('pagination','form_validation','upload'));
		if(!$this->session->userdata('username')){
            redirect('home');
        }
    }    
    function index(){
		include('menu_akses.php');
		$level = $this->session->userdata('level');
		$data['title']="Dashboard | Polling AKN Bojonegoro";
		$data['judul']="HALAMAN UTAMA";
		$username=$this->session->userdata('username');
		if($level=='mahasiswa'){
			$data['content']="dashboard/mahasiswa.php";
			$data['polling']=$this->m_polling->ambil_data($username)->result();
		}elseif($level=='dosen'){
			$data['content']="dashboard/index.php";
		}elseif($level=='superadmin'){
			$data['content']="dashboard/index.php";
		}

		$sudah=$this->m_laporan->mhs_menilai()->row_array();
			$total=$this->m_laporan->jumlah_mhs_total_kelas()->row_array();
			$data['sudah']=$sudah['jumlah_penilai'];
			$data['total']=$total['total'];
			$belum=$total['total']-$sudah['jumlah_penilai'];
			$data['belum']=$belum;

		$data['topdosen']=$this->m_laporan->toptri()->result();

		$this->load->view('admin/template',$data);
    }
    function profil($id){
		include('menu_profil.php');
		$data['title']="Profil | Polling AKN Bojonegoro";
		$data['judul']="Profil";
		$this->load->view('admin/template',$data);
	}
	function logout(){
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        redirect('home');
    }
}