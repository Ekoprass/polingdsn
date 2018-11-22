<?php
class laporan extends CI_Controller{
    private $limit=20;
	
	function __construct(){
        parent::__construct();
		//$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_polling');
		$this->load->model('m_laporan');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index(){
		include('menu_akses.php'); //hak akses
		$data['title']="Laporan | Polling AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Laporan";
		$data['content']="laporan/index.php";
		$username=$this->session->userdata('username');
		$data['laporan']=$this->m_laporan->ambil_data()->result();
		$this->load->view('admin/template',$data);
    }
	
	function detail_report($id_mk=null,$tahun=null)
	{
		include('menu_akses.php'); //hak akses

		$data['title']="Polling | Polling AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Laporan Grafik";
		$id_mk=$this->input->post('matakuliah');
		$tahun=$this->input->post('tahun');
		$data['thn']=$this->input->post('tahun');
		$data['content']="laporan/detail_report.php";
		$data['datanilai']=$this->m_laporan->getNilaiMk($id_mk, $tahun)->result();
		$data['matkul']=$this->m_laporan->Mk($id_mk)->row_array();
		$data['daftar_mk']=$this->m_laporan->matkul()->result();
		$data['tahun']=$this->m_laporan->tahun()->result();
		$this->load->view('admin/template',$data);

	}


}