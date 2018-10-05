<?php 
	
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Chart extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('m_laporan');
		}
	
		public function index()
		{
			$id_mk='7';
			$x['data']=$this->m_laporan->getNilaiMk($id_mk);
			$x['matkul']=$this->m_laporan->Mk($id_mk)->row_array();
       		$this->load->view('admin/laporan/detail_report',$x);
		}


		public function presentase_penilai()
		{
			$id_mk='7';
			$sudah=$this->m_laporan->mhs_menilai()->row_array();
			$total=$this->m_laporan->jumlah_mhs_total_kelas()->row_array();
			$x['sudah']=$sudah['jumlah_penilai'];
			$x['total']=$total['total'];
			$belum=$total['total']-$sudah['jumlah_penilai'];
			$x['belum']=$belum;
       		$this->load->view('admin/laporan/test_chart',$x);
		}
	
	}
	
	/* End of file Chart.php */
	/* Location: ./application/controllers/Chart.php */
 ?>