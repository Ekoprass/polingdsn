<?php
class Kriteria_nilai extends CI_Controller{
    private $limit=20;
	
	function __construct(){
        parent::__construct();
		//$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_kriteria_nilai');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index(){
		include('menu_akses.php');
		$data['title']="Kriteria Nilai | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kriteria Nilai";
		$data['content']="kriteria_nilai/index.php";
		$data['kriteria_nilai']=$this->m_kriteria_nilai->ambil_data()->result();
		$this->load->view('admin/template',$data);
    }
	function tambah(){
		include('menu_akses.php');
		$data['title']=" Tambah Kriteria Nilai | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kriteria Nilai";		
		$data['content']="kriteria_nilai/tambah.php";
		$data['kriteria_nilai']=$this->m_kriteria_nilai->ambil_data()->result();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id_kriteria_nilai=$this->input->post('id_kriteria_nilai'); 	// mendapatkan input dari kode
		$kriteria_nilai=$this->input->post('kriteria_nilai'); 	// mendapatkan input dari kode
		$keterangan=$this->input->post('keterangan');  // mendapatkan input dari kode
		$kategori=$this->input->post('kategori');  // mendapatkan input dari kode
		$status=$this->input->post('status');  // mendapatkan input dari kode
		$cek=$this->m_kriteria_nilai->cek($id_kriteria_nilai); 		// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','kriteria_nilai <b>'.$id_kriteria_nilai.'</b> sudah ada!');
			redirect('kriteria_nilai/tambah');
		}else { 								// jika prodi belum ada, maka simpan
			$info=array(
				'id_kriteria_nilai'=>$id_kriteria_nilai,
				'kriteria_nilai'=>$kriteria_nilai,
				'keterangan'=>$keterangan,
				'kategori'=>$kategori,
				'status'=>$status,
			);
			$this->m_kriteria_nilai->simpan($info);
			$this->session->set_flashdata('m_sukses','Id kriteria nilai <b>'.$id_kriteria_nilai. '</b> berhasil ditambahkan!');
			redirect('kriteria_nilai');
		}
	}
	function edit($id_kriteria_nilai){
		include('menu_akses.php');
		$data['title']	="Edit Kriteria Nilai"; 		//judul
		$data['judul']="MASTER DATA > Kriteria Nilai";	
        $data['content']="kriteria_nilai/edit.php"; 	//konten
        $data['kriteria_nilai']=$this->m_kriteria_nilai->ceki($id_kriteria_nilai)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_kriteria_nilai){
		$info=array(
			'id_kriteria_nilai'=>$id_kriteria_nilai,
			'kriteria_nilai'=>$this->input->post('kriteria_nilai'),
			'keterangan'=>$this->input->post('keterangan'),
			'kategori'=>$this->input->post('kategori'),
			'status'=>$this->input->post('status'),
			);
		$this->m_kriteria_nilai->update($info, $id_kriteria_nilai);
		$this->session->set_flashdata('m_sukses','Data kriteria nilai sudah berhasil diedit!');
		redirect('kriteria_nilai');
	}
	function hapus($id_kriteria_nilai){
		include('menu_akses.php');
		$data['title']="Hapus Kriteria Nilai";
		$data['judul']="MASTER DATA > Kriteria Nilai";		
		$data['content']="kriteria_nilai/hapus.php";
		$data['kriteria_nilai']=$this->m_kriteria_nilai->ceki($id_kriteria_nilai)->row_array();
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_kriteria_nilai){
		$status='nonaktif';
		$info=array(
			'id_kriteria_nilai'=>$id_kriteria_nilai,
			'status'=>$status,
		);
        $this->m_kriteria_nilai->update_hapus($info,$id_kriteria_nilai);
		$this->session->set_flashdata('m_sukses','Data kriteria nilai sudah berhasil dinonaktifkan!');
		redirect('kriteria_nilai');
	}
	function aktifkan($id_kriteria_nilai){
		include('menu_akses.php');
		$data['title']="Aktifkan Kriteria Nilai";
		$data['judul']="MASTER DATA > Kriteria Nilai";		
		$data['content']="kriteria_nilai/aktifkan.php"; //isi konten
		$data['kriteria_nilai']=$this->m_kriteria_nilai->ceki($id_kriteria_nilai)->row_array(); //mengambil dari model kriteria_nilai
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_kriteria_nilai){
		$status='aktif';
		$info=array(
			'id_kriteria_nilai'=>$id_kriteria_nilai,
			'status'=>$status,
		);
        $this->m_kriteria_nilai->update_aktif($info,$id_kriteria_nilai);
		$this->session->set_flashdata('m_sukses','Data kriteria nilai sudah berhasil diaktifkan!');
		redirect('kriteria_nilai/nonaktif');
	}
	function nonaktif(){
		include('menu_akses.php');
		$data['title']="Kriteria Nilai | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kriteria Nilai";
		$data['content']="kriteria_nilai/nonaktif.php";
		$data['kriteria_nilai']=$this->m_kriteria_nilai->ambil_datanon()->result();
		$this->load->view('admin/template',$data);
    }
	function cari(){
		include('menu_akses.php');
		$data['title']="Kriteria Nilai Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kriteria Nilai";
		$data['content']="kriteria_nilai/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(kriteria_nilai);
		}
		else{
			$cek=$this->m_kriteria_nilai->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['kriteria_nilai']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kriteria_nilai']=$cek->result();
				redirect('kriteria_nilai');
			}
		}
    }
	function carinon(){
		include('menu_akses.php');
		$data['title']=" Kriteria Nilai Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Kriteria Nilai";
		$data['content']="kriteria_nilai/carinon.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(kriteria_nilai);
		}
		else{
			$cek=$this->m_kriteria_nilai->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['kriteria_nilai']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kriteria_nilai']=$cek->result();
				redirect('kriteria_nilai');
			}
		}
    }
	

}