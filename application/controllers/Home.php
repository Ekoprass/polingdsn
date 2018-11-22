<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->model('m_login');
        $this->load->model('m_mahasiswa');
        $this->load->library('form_validation');
        $this->load->library(array('pagination','form_validation','upload'));
		
        if($this->session->userdata('username')){
            redirect('dashboard');
		}
    }
	
	public function index(){
		$data['title']="Login | Polling AKN Bojonegoro";
		$data['judul']="Login Aplikasi Polling AKN Bojonegoro";
		$this->load->view('home/index.php',$data);
	}
	public function proses(){
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        
        if($this->form_validation->run()==false){
            $this->session->set_flashdata('m_eror','Validasi gagal!');
            redirect('home');
        }else{
            $username=$this->input->post('username');
            $password=$this->input->post('password');
            $cek_mahasiswa=$this->m_login->cek_mahasiswa($username,md5($password));
            $cek_dosen=$this->m_login->cek_dosen($username,md5($password));
            $cek_tu=$this->m_login->cek_tu($username,md5($password));
            if($cek_mahasiswa->num_rows()>0){
                $this->session->set_userdata('username', $username);
				$session_id = $this->session->userdata('username');
				$data_mahasiswa=$this->m_login->data_mahasiswa($session_id)->row_array(); 
				$level=$data_mahasiswa['nama_akses'];
				$this->session->set_userdata('level',$level);
				$this->session->set_flashdata('m_sukses','Sukses Login!');
				date_default_timezone_set('Asia/Jakarta');
				$date = date ("Ymd");
				$cek_validasi=$this->m_mahasiswa->cek_vali($date, $username);
				if($cek_validasi->num_rows()>0){
						$id_date=$date.$username;
						$this->m_mahasiswa->sim_validasi($id_date,$date,$username);
						redirect('validasi/validasi/'.$level.'/'.$username);	
					}
					else{
						redirect('dashboard');				
					}
					                
            }elseif($cek_dosen->num_rows()>0){
				$cekakses=$this->m_login->ambilakses_dos($username)->num_rows();
				if($cekakses>1){
					 redirect('validasi/akses/'.$username);					
				}else{
					$this->session->set_userdata('username',$username);
					$session_id = $this->session->userdata('username');
					$data_dosen=$this->m_login->data_dosen($session_id)->row_array();
					$level=$data_dosen['nama_akses'];
					$this->session->set_userdata('level',$level);
					$this->session->set_flashdata('m_sukses','Sukses Login!');
					redirect('dashboard');
                }
            }elseif($cek_tu->num_rows()>0){
               $cekakses=$this->m_login->ambilakses_tu($username)->num_rows();
			   if($cekakses>1){
					 redirect('validasi/akses/'.$username);
			   }else{
				$this->session->set_userdata('username',$username);
				$session_id = $this->session->userdata('username');
				$data_tu=$this->m_login->data_tu($session_id)->row_array();
				$leve=$data_tu['nama_akses'];
				$this->session->set_userdata('level',$leve);
				$level= $this->session->userdata('level');
				redirect('dashboard');
			   }
            }else{
                //login gagal
				$this->session->set_flashdata('m_eror','GAGAL!');
                redirect('home');
            }
        }
	}
}
