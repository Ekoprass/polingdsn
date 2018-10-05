<?php
class Jadwal extends CI_Controller{
    private $limit=20;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_jadwal');
		$this->load->model('m_kelas');
		$this->load->model('m_login');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Jadwal | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Jadwal ";
		$data['content']="jadwal/index.php";
		$data['kelas']=$this->m_jadwal->kelasambil()->result();
		$this->load->view('admin/template',$data);
    }
	function detail($id_kelas,$order_type='asc'){
		include('menu_akses.php'); //hak akses
		$data['title']		="detail jadwal";
		$data['judul']="MASTER DATA > Jadwal > Detail"; //judul
        $data['content']			="jadwal/detail.php"; //konten
        $data['kelas_j']			=$this->m_jadwal->detailk($id_kelas)->row_array(); //ambil data
        $data['jam_ke']			=$this->m_jadwal->jam_ke()->row_array(); //ambil data
        $data['jadwal']			=$this->m_jadwal->jadwal($id_kelas)->row_array(); //ambil data
		
		$this->load->view('admin/template',$data);
	}
	function tambah(){
		include('menu_akses.php'); //hak akses
		$id_kelas			=$this->uri->segment(3);
		$jadwal				=$this->uri->segment(4);
		$jam				=$this->uri->segment(5);
		$hari				=$this->uri->segment(6);
		$data['title']		="tambah jadwal";
		$data['judul']		="MASTER DATA > Jadwal > Tambah"; //judul
		$data['kelas']		= $id_kelas;
		$data['jadwali']	= $jadwal;
		$data['jam']		= $jam;
		$data['hari']		= $hari;
		$data['nkelas']		=$this->m_jadwal->nama_kelas($id_kelas)->row_array();
		$data['dosen']		=$this->m_jadwal->nama_dosen();
		$data['mk']			=$this->m_jadwal->nama_mk();
        $data['content']	="jadwal/tambah.php"; //konten
       
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('iniid'); 	// mendapatkan input dari kode
		$hari=$this->input->post('hari'); 	// mendapatkan input dari kode
		$jam=$this->input->post('jam'); 	// mendapatkan input dari kode
		$idkelas=$this->input->post('id_kelas'); 	// mendapatkan input dari kode
		$kode=substr($id,10,3); 	// mendapatkan input dari kode
		$id_dosen=$this->input->post('id_dosen'); 	// mendapatkan input dari kode
		$id_mk=$this->input->post('id_mk'); 	// mendapatkan input dari kode
		$jadwal=$this->input->post('jadwal'); 	// mendapatkan input dari kode
		$km=$this->input->post('kel'); 	// mendapatkan input dari kode
		$detail=$id.$id_dosen.$id_mk;
		$cek=$this->m_jadwal->ceki($id_dosen,$jam,$hari,$idkelas); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Dosen Mengajar Di Tempat Lain!');
			redirect('jadwal/tambah/'.$idkelas.'/'.$kode.'/'.$jam.'/'.$hari);
		}else { 
		$status='aktif';
			$info=array(
				'id_jadwal'=>$id,
				'id_kelas'=>$idkelas,
				'hari'=>$hari,
				'status'=>$status
			);
			$this->m_jadwal->simpan($info);
			$this->m_jadwal->simpandetail($detail,$id,$id_mk,$id_dosen,$jam,$status);
			$this->session->set_flashdata('m_sukses','Mata Kuliah berhasil ditambahkan!');
			redirect('jadwal/detail/'.$idkelas);
		}
	}
	function tambah_kosong(){
		$id=$this->input->post('iniid'); 	// mendapatkan input dari kode
		$hari=$this->input->post('hari'); 	// mendapatkan input dari kode
		$jam=$this->input->post('jam'); 	// mendapatkan input dari kode
		$idkelas=$this->input->post('id_kelas'); 	// mendapatkan input dari kode
		$id_dosen=$this->input->post('doko'); 	// mendapatkan input dari kode
		$id_mk=$this->input->post('mako'); 	// mendapatkan input dari kode
		$jadwal=$this->input->post('jadwal'); 	// mendapatkan input dari kode
		$km=$this->input->post('kel'); 	// mendapatkan input dari kodede
		$detail=$id.$id_dosen.$id_mk;
		 $st="kosong";
		$status='aktif';
			$info=array(
				'id_jadwal'=>$id,
				'id_kelas'=>$idkelas,
				'hari'=>$hari,
				'status'=>$status
			);
			$this->m_jadwal->simpan($info);
			$this->m_jadwal->simpandetail($detail,$id,$id_mk,$id_dosen,$jam,$st);
			$this->session->set_flashdata('m_sukses','Mata Kuliah berhasil ditambahkan!');
			redirect('jadwal/detail/'.$idkelas);
	}
}