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
		$data['laporan']=$this->m_laporan->ambil_data()->result();
		$this->load->view('admin/template',$data);
    }
	
	function detail_report()
	{
		include('menu_akses.php'); //hak akses

		$data['title']="Polling | Polling AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Detail Report";
		$id_mk='7';
		$data['content']="laporan/detail_report.php";
		$data['datanilai']=$this->m_laporan->getNilaiMk($id_mk);
		$data['matkul']=$this->m_laporan->Mk($id_mk)->row_array();
       	$this->load->view('admin/laporan/detail_report',$data,false);

	}


}