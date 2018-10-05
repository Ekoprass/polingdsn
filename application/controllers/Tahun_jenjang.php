<?php
class Tahun_jenjang extends CI_Controller{
    private $limit=20;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
    }
    
    function index(){
		$data['title']="Tahun Jenjang | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tahun Jenjang";
		$data['content']="tahun_jenjang/index.php";
		$this->load->view('admin/template',$data);
    }
}