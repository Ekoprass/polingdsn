<?php
class Mata_kuliah extends CI_Controller{
    private $limit=20;
	
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_mata_kuliah');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index(){
		include('menu_akses.php'); //hak akses
		$data['title']="Mata Kuliah | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mata Kuliah";
		$data['content']="mata_kuliah/index.php";
		$data['mata_kuliah']=$this->m_mata_kuliah->ambil_data()->result();
		$this->load->view('admin/template',$data);
    }
	function detail($id_mk){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail Mata Kuliah";
		$data['judul']="MASTER DATA > Mata Kuliah > Detail"; //judul
		$data['content']="mata_kuliah/detail.php"; //konten
		$data['mata_kuliah'] =$this->m_mata_kuliah->ceki($id_mk)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_mk){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail Mata Kuliah";
		$data['judul']="MASTER DATA > Mata Kuliah > Detail Nonaktif"; //judul
		$data['content']="mata_kuliah/detailnon.php"; //konten
		$data['mata_kuliah'] =$this->m_mata_kuliah->cekn($id_mk)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit($id_mk){
		include('menu_akses.php'); //hak akses
		$data['title']	="Edit Mata Kuliah"; 		//judul
		$data['judul']="MASTER DATA > Mata Kuliah > Edit";	
        $data['content']="mata_kuliah/edit.php"; 	//konten
        $data['mata_kuliah']=$this->m_mata_kuliah->ceki($id_mk)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_mata_kuliahkirim){
		$info=array(
			'id_mk'=>$id_mata_kuliahkirim,
			'nama_mk'=>$this->input->post('nama_mk'),
			'deskripsi_mk'=>$this->input->post('deskripsi_mk'),
			'jml_jam'=>$this->input->post('jml_jam'),
			'jml_sks'=>$this->input->post('jml_sks'),
			'smt'=>$this->input->post('smt'),
			'status_mk'=>$this->input->post('status'),
		);
		$this->m_mata_kuliah->update($info, $id_mata_kuliahkirim);
		$this->session->set_flashdata('m_sukses','Data Mata Kuliah sudah berhasil diedit!');
		redirect('mata_kuliah');
	}
	function tambah(){
		include('menu_akses.php'); //hak akses
		$data['title']="Mata Kuliah | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mata Kuliah > Tambah";		
		$data['content']="mata_kuliah/tambah.php";
		$data['mata_kuliah']=$this->m_mata_kuliah->ambil_data()->result();
		$this->load->view('admin/template',$data);
	}
	function delete($id_mk){
		include('menu_akses.php'); //hak akses
		$data['title']="Mata Kuliah | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mata Kuliah > Hapus";		
		$data['content']="mata_kuliah/delete.php";
		$data['mata_kuliah']=$this->m_mata_kuliah->ceki($id_mk)->row_array();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id_mk=$this->input->post('id_mk'); 	// mendapatkan input dari kode
		$nama_mk=$this->input->post('nama_mk'); 	// mendapatkan input dari kode
		$deskripsi_mk=$this->input->post('deskripsi_mk'); 	// mendapatkan input dari kode
		$jml_jam=$this->input->post('jml_jam'); 	// mendapatkan input dari kode
		$jml_sks=$this->input->post('jml_sks');		// mendapatkan input dari kode
		$smt=$this->input->post('smt'); 
		$status_mk=$this->input->post('status_mk'); 
		$cek=$this->m_mata_kuliah->cek($id_mk); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','mata_kuliah <b>'.$id_mk.'</b> sudah ada!');
			redirect('mata_kuliah/tambah');
		}else { 								// jika prodi belum ada, maka simpan
			$info=array(
				'id_mk'=>$id_mk,
				'nama_mk'=>$nama_mk,
				'deskripsi_mk'=>$deskripsi_mk,
				'jml_jam'=>$jml_jam,
				'jml_sks'=>$jml_sks,
				'smt'=>$smt,
				'status_mk'=>$status_mk,
			);
			$this->m_mata_kuliah->simpan($info);
			$this->session->set_flashdata('m_sukses','Id Mata Kuliah <b>'.$id_mk. '</b> berhasil ditambahkan!');
			redirect('mata_kuliah');
		}
	}
		
	function aktifkan($id_mk){
		include('menu_akses.php'); //hak akses
		$data['title']="Aktifkan Mata Kuliah";
		$data['judul']="MASTER DATA > Mata Kuliah > Aktifkan";//judul
        $data['content']="mata_kuliah/aktifkan.php"; //konten
        $data['mata_kuliah']=$this->m_mata_kuliah->cekaktif($id_mk)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_mata_kuliahkirim){
		$status='aktif';
		$info=array(
			'id_mk'=>$id_mata_kuliahkirim,
			'status_mk'=>$status,
		);
        $this->m_mata_kuliah->update_aktif($info,$id_mata_kuliahkirim);
		$this->session->set_flashdata('m_sukses','Data Mata Kuliah sudah berhasil diaktifkan!');
		redirect('mata_kuliah/nonaktif');
    }
	function deleteproses($idkirim){
		$status='nonaktif';
		$info=array(
			'id_mk'=>$idkirim,
			'status_mk'=>$status,
		);
        $this->m_mata_kuliah->update_hapus($info,$idkirim);
		$this->session->set_flashdata('m_sukses','Data Mata Kuliah sudah berhasil dinonaktifkan!');
		redirect('mata_kuliah');
    }
	
	 function nonaktif(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Mata Kuliah Nonaktif | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mata Kuliah > Nonaktif ";
		$data['content']="mata_kuliah/nonaktif.php";
		$data['mata_kuliah']=$this->m_mata_kuliah->ambil_non()->result();
		$this->load->view('admin/template',$data);
    }
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Mata Kuliah Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mata Kuliah > Cari";
		$data['content']="mata_kuliah/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(mata_kuliah);
		}
		else{
			$cek=$this->m_mata_kuliah->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['mata_kuliah']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['mata_kuliah']=$cek->result();
				redirect('mata_kuliah/');
			}
		}
    }
    function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Mata Kuliah Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mata Kuliah > Cari Nonaktif";
		$data['content']="mata_kuliah/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(mata_kuliah);
		}
		else{
			$cek=$this->m_mata_kuliah->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['mata_kuliah']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['mata_kuliah']=$cek->result();
				redirect('mata_kuliah/nonaktif');
			}
		}
    }

}