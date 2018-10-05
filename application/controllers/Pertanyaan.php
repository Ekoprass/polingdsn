<?php
class Pertanyaan extends CI_Controller{
    private $limit=20;
	
	function __construct(){
        parent::__construct();
		//$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_pertanyaan');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index(){
		include('menu_akses.php'); //hak akses
		$data['title']="Pertanyaan | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Pertanyaan";
		$data['content']="pertanyaan/index.php";
		$data['pertanyaan']=$this->m_pertanyaan->ambil_data()->result();
		$this->load->view('admin/template',$data);
    }
	function tambah(){
		include('menu_akses.php'); //hak akses
		$data['title']="Pertanyaan | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Pertanyaan > Tambah";		
		$data['content']="pertanyaan/tambah.php";
		$data['pertanyaan']=$this->m_pertanyaan->ambil_data()->result();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id_pertanyaan=$this->input->post('id_pertanyaan'); 	// mendapatkan input dari kode
		$pertanyaan=$this->input->post('pertanyaan'); 	// mendapatkan input dari kode
		$status=$this->input->post('status'); 	// mendapatkan input dari kode
		$kategori=$this->input->post('kategori');  // mendapatkan input dari kode
		$cek=$this->m_pertanyaan->cek($id_pertanyaan); 		// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','pertanyaan <b>'.$id_pertanyaan.'</b> sudah ada!');
			redirect('pertanyaan/tambah');
		}else { 								// jika prodi belum ada, maka simpan
			$info=array(
				'id_pertanyaan'=>$id_pertanyaan,
				'pertanyaan'=>$pertanyaan,
				'status'=>$status,
				'kategori'=>$kategori,
			);
			$this->m_pertanyaan->simpan($info);
			$this->session->set_flashdata('m_sukses','Id pertanyaan <b>'.$id_pertanyaan. '</b> berhasil ditambahkan!');
			redirect('pertanyaan');
		}
	}
	function edit($id_pertanyaan){
		include('menu_akses.php'); //hak akses
		$data['title']	="Edit Pertanyaan"; 		//judul
		$data['judul']="MASTER DATA > Pertanyaan > Edit";	
        $data['content']="pertanyaan/edit.php"; 	//konten
        $data['pertanyaan']=$this->m_pertanyaan->ceki($id_pertanyaan)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_pertanyaankirim){
		$info=array(
			'id_pertanyaan'=>$id_pertanyaankirim,
			'pertanyaan'=>$this->input->post('pertanyaan'),
			'status'=>$this->input->post('status'),
			'kategori'=>$this->input->post('kategori'),
			);
		$this->m_pertanyaan->update($info, $id_pertanyaankirim);
		$this->session->set_flashdata('m_sukses','Data pertanyaan sudah berhasil diedit!');
		redirect('pertanyaan');
	}
	function hapus($id_pertanyaan){
		include('menu_akses.php'); //hak akses
		$data['title']="Hapus Pertanyaan";
		$data['judul']="MASTER DATA > Pertanyaan > Hapus";		
		$data['content']="pertanyaan/hapus.php";
		$data['pertanyaan']=$this->m_pertanyaan->ceki($id_pertanyaan)->row_array();
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_pertanyaan){
		$status='nonaktif';
		$info=array(
			'id_pertanyaan'=>$id_pertanyaan,
			'status'=>$status,
		);
        $this->m_pertanyaan->update_hapus($info,$id_pertanyaan);
		$this->session->set_flashdata('m_sukses','Data Pertanyaan sudah berhasil dinonaktifkan!');
		redirect('pertanyaan');
	}
	function aktifkan($id_pertanyaan){
		include('menu_akses.php'); //hak akses
		$data['title']="Aktifkan Pertanyaan";
		$data['judul']="MASTER DATA > Pertanyaan > Aktifkan";		
		$data['content']="pertanyaan/aktifkan.php"; //isi konten
		$data['pertanyaan']=$this->m_pertanyaan->ceki($id_pertanyaan)->row_array(); //mengambil dari model pertanyaan
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_pertanyaan){
		$status='aktif';
		$info=array(
			'id_pertanyaan'=>$id_pertanyaan,
			'status'=>$status,
		);
        $this->m_pertanyaan->update_aktif($info,$id_pertanyaan);
		$this->session->set_flashdata('m_sukses','Data Pertanyaan sudah berhasil diaktifkan!');
		redirect('pertanyaan/nonaktif');
	}
	function nonaktif(){
		include('menu_akses.php'); //hak akses
		$data['title']="Pertanyaan | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Pertanyaan";
		$data['content']="pertanyaan/nonaktif.php";
		$data['pertanyaan']=$this->m_pertanyaan->ambil_datanon()->result();
		$this->load->view('admin/template',$data);
    }
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Pertanyaan Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Pertanyaan Cari";
		$data['content']="pertanyaan/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(pertanyaan);
		}
		else{
			$cek=$this->m_pertanyaan->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['pertanyaan']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['pertanyaan']=$cek->result();
				redirect('pertanyaan');
			}
		}
    }
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Pertanyaan Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Pertanyaan Cari";
		$data['content']="pertanyaan/carinon.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(pertanyaan);
		}
		else{
			$cek=$this->m_pertanyaan->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['pertanyaan']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['pertanyaan']=$cek->result();
				redirect('pertanyaan');
			}
		}
    }
	

}