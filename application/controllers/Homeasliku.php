<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper(array('form', 'url'));
        $this->load->model('m_petugas');
        $this->load->library('form_validation');
        $this->load->library(array('pagination','form_validation','upload'));
        
        if($this->session->userdata('username')){
            redirect('dashboard');
		}
    }
	
	public function index()
	{
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
            $cek=$this->m_petugas->cek($username,md5($password));
            if($cek->num_rows()>0){
                //login berhasil, buat session
                $this->session->set_userdata('username',$username);
				$session_id = $this->session->userdata('username');
				$ambil_data=$this->m_petugas->ambil_data($session_id)->row_array();
				$this->session->set_flashdata('m_sukses','Sukses Login!');
				//$level=$ambil_data['akses'];
                //$this->session->set_userdata('level',$level);
                redirect('dashboard');
                
            }else{
                //login gagal
                // $this->session->set_flashdata('message','Username atau password salah');
				$this->session->set_flashdata('m_eror','GAGAL!');
                redirect('home');
            }
        }
	}
}
