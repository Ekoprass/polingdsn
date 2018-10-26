<?php
class Polling extends CI_Controller{
    private $limit=20;
	
	function __construct(){
        parent::__construct();
		//$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_polling');
		$this->load->model('m_laporan');
		$this->load->model('m_dosen');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$username=$this->session->userdata('username');
		$data['content']="polling/index.php";
		$data['polling']=$this->m_polling->ambil_data($username)->result();
		$this->load->view('admin/template',$data);
    }
	function tambah(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="MASTER DATA > Penilaian > Tambah";		
		$data['content']="polling/tambah.php";
		$data['polling']=$this->m_polling->ambil_data()->result();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id_polling=$this->input->post('id_polling'); 	// mendapatkan input dari kode
		$polling=$this->input->post('polling'); 	// mendapatkan input dari kode
		$status=$this->input->post('status'); 	// mendapatkan input dari kode
		$kategori=$this->input->post('kategori');  // mendapatkan input dari kode
		$cek=$this->m_polling->cek($id_polling); 		// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','polling <b>'.$id_polling.'</b> sudah ada!');
			redirect('polling/tambah');
		}else { 								// jika prodi belum ada, maka simpan
			$info=array(
				'id_polling'=>$id_polling,
				'polling'=>$polling,
				'status'=>$status,
				'kategori'=>$kategori,
			);
			$this->m_polling->simpan($info);
			$this->session->set_flashdata('m_sukses','Id polling <b>'.$id_polling. '</b> berhasil ditambahkan!');
			redirect('polling');
		}
	}
	function input(){
		$dosen=$this->input->post('dosen');
		$kelas=$this->input->post('kelas');
		$nim=$this->input->post('nim');
		
			$this->m_polling->simpan_polling($dosen,$kelas,$nim);
			$this->session->set_flashdata('m_sukses','Penilaian Berhasil Dilakukan');
			redirect('polling/detail/'.$kelas);
	}
	function edit_polling(){
		$dosen=$this->input->post('dosen');
		$kelas=$this->input->post('kelas');
		$nim=$this->input->post('nim');
		$this->m_polling->edit_polling($dosen,$kelas,$nim);
		$this->session->set_flashdata('m_sukses','Penilaian Berhasil Dilakukan');
		redirect('polling/detail/'.$kelas);
	}
	function detail($id){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$data['content']="polling/detail.php";
		$data['kelas_siswa']=$this->m_polling->kelas_siswa($id)->row_array();
		$data['dosen_kelas']=$this->m_polling->dosen_kelas($id)->result();
		$this->load->view('admin/template',$data);
    }
    function laporan(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Laporan Penilaian";
		$data['content']="polling/laporan.php";
		$data['dosen_kelas']=$this->m_polling->dosen_polling()->result();
		$data['dosen']=$this->m_polling->daftar_dosen()->result();
		$data['thn_semester']=$this->m_polling->tahun_polling()->result();
		$id_mk='7';
		$chart['datanilai']=$this->m_laporan->getNilaiMk($id_mk);

		$chart['matkul']=$this->m_laporan->Mk($id_mk)->row_array();

		$data['chart'] = $this->load->view('admin/laporan/detail_report', $chart, TRUE);

		$this->load->view('admin/template',$data);
    }
    function laporan_dosen(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Laporan Penilaian";
		$data['content']="polling/laporan_dosen.php";
		$id=$this->session->userdata('username');
		$data['dosen']=$this->m_polling->dosenuser($id)->row_array();
		$r=$this->m_polling->dosenuser($id)->row_array();
		$id_dosen=$r['id_dosen'];
		$data['tahun_semester']=$this->m_polling->get_tahun_semester($id_dosen)->result();
		$this->load->view('admin/template',$data);
    }
	function detail_nilai($id){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$data['content']="polling/detail_nilai.php";
		$data['dosen']=$this->m_polling->dosen($id)->row_array();
		$data['nilai']=$this->m_polling->nilai()->result();
		$id_kelas=$this->uri->segment(4);
		$id_tahun_semester=substr($id_kelas,0,6);
		$data['pertanyaan']=$this->m_polling->soal($id_tahun_semester)->result();
		$this->load->view('admin/template',$data);
    }
    function detail_dosen(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$data['content']="polling/detail_dosen.php";
		$id=$this->uri->segment(3);
		$data['dosen']=$this->db->query("select * from dosen where id_dosen='$id'")->row_array();
		$data['nilai']=$this->m_polling->nilai()->result();
		$id_kelas=$this->uri->segment(4);
		$id_tahun_semester=substr($id_kelas,0,6);
		$data['pertanyaan']=$this->m_polling->soal($id_tahun_semester)->result();
		$this->load->view('admin/template',$data);
    }
    function detail_admin(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$data['content']="polling/detail_admin.php";
		$kelas=$this->uri->segment(4);
		$id=$this->uri->segment(3);
		$data['dosen']=$this->db->query("select * from dosen where id_dosen='$id'")->row_array();
		$data['tahun_semester']=$this->uri->segment(4);
		$data['nilai']=$this->m_polling->nilai()->result();
		$id_kelas=$this->uri->segment(4);
		$id_tahun_semester=substr($id_kelas,0,6);
		$data['pertanyaan']=$this->m_polling->soal($id_tahun_semester)->result();
		$data['dosen_mk']=$this->m_laporan->dosen_mk($id)->row_array();

		$jumlah_mhs_penilai=$this->m_laporan->mhs_menilai_dosen_thn($id, $kelas)->row_array();
		$jumlah_mhs=$this->m_dosen->jumlah_mhs_tahun($kelas, $id)->row_array(); 
		$data['jumlah_mhs']=$jumlah_mhs;
		$data['mhs_sudah_menilai']=$jumlah_mhs_penilai;
		$data['mhs_belum_menilai']=$jumlah_mhs['jumlah']-$jumlah_mhs_penilai['jumlah_penilai'];

		$data['kelas']=$this->m_laporan->getKelas($id)->result();
		$data['tot_nilai']=$this->m_laporan->rankThn($id, $kelas)->row_array();
		$data['rank']=$this->m_laporan->rankThn($id, $kelas)->row_array();



		$this->load->view('admin/template',$data);
    }
    function detail_hasil_dosen(){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$data['content']="polling/detail_admin.php";
		$kelas=$this->uri->segment(4);
		$id=$this->uri->segment(3);
		$data['dosen']=$this->db->query("select * from dosen where id_dosen='$id'")->row_array();
		$data['tahun_semester']=$this->uri->segment(4);
		$data['nilai']=$this->m_polling->nilai()->result();
		$id_tahun_semester=$this->uri->segment(4);
		$data['pertanyaan']=$this->m_polling->soal($id_tahun_semester)->result();
		$data['dosen_mk']=$this->m_laporan->dosen_mk($id)->row_array();

		$jumlah_mhs_penilai=$this->m_laporan->mhs_menilai_dosen_thn($id, $kelas)->row_array();
		$jumlah_mhs=$this->m_dosen->jumlah_mhs_tahun($kelas, $id)->row_array(); 
		$data['jumlah_mhs']=$jumlah_mhs;
		$data['mhs_sudah_menilai']=$jumlah_mhs_penilai;
		$data['mhs_belum_menilai']=$jumlah_mhs['jumlah']-$jumlah_mhs_penilai['jumlah_penilai'];

		$data['kelas']=$this->m_laporan->getKelas($id)->result();
		$data['tot_nilai']=$this->m_laporan->rankThn($id, $kelas)->row_array();
		$data['rank']=$this->m_laporan->rankThn($id, $kelas)->row_array();


		$this->load->view('admin/template',$data);
    }
    function edit_nilai($id){
		include('menu_akses.php'); //hak akses
		$data['title']="Penilaian | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > Penilaian";
		$data['content']="polling/edit_nilai.php";
		$data['dosen']=$this->m_polling->dosen($id)->row_array();
		$data['nilai']=$this->m_polling->nilai()->result();
		$id_kelas=$this->uri->segment(4);
		$id_tahun_semester=substr($id_kelas,0,6);
		$data['pertanyaan']=$this->m_polling->soal($id_tahun_semester)->result();
		$this->load->view('admin/template',$data);
    }
	function edit($id_polling){
		include('menu_akses.php'); //hak akses
		$data['title']	="Edit Penilaian"; 		//judul
		$data['judul']="MASTER DATA > P > Edit";	
        $data['content']="polling/edit.php"; 	//konten
        $data['polling']=$this->m_polling->ceki($id_polling)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_pollingkirim){
		$info=array(
			'id_polling'=>$id_pollingkirim,
			'polling'=>$this->input->post('polling'),
			'status'=>$this->input->post('status'),
			'kategori'=>$this->input->post('kategori'),
			);
		$this->m_polling->update($info, $id_pollingkirim);
		$this->session->set_flashdata('m_sukses','Data polling sudah berhasil diedit!');
		redirect('polling');
	}
	function hapus($id_polling){
		include('menu_akses.php'); //hak akses
		$data['title']="Hapus Penilaian";
		$data['judul']="MASTER DATA > Penilaian > Hapus";		
		$data['content']="polling/hapus.php";
		$data['polling']=$this->m_polling->ceki($id_polling)->row_array();
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_polling){
		$status='nonaktif';	
		$info=array(
			'id_polling'=>$id_polling,
			'status'=>$status,
		);
        $this->m_polling->update_hapus($info,$id_polling);
		$this->session->set_flashdata('m_sukses','Data polling sudah berhasil dinonaktifkan!');
		redirect('polling');
	}
	function aktifkan($id_polling){
		include('menu_akses.php'); //hak akses
		$data['title']="aktifkan polling";
		$data['judul']="MASTER DATA > polling > Aktifkan";		
		$data['content']="polling/aktifkan.php"; //isi konten
		$data['polling']=$this->m_polling->ceki($id_polling)->row_array(); //mengambil dari model polling
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_polling){
		$status='aktif';
		$info=array(
			'id_polling'=>$id_polling,
			'status'=>$status,
		);
        $this->m_polling->update_aktif($info,$id_polling);
		$this->session->set_flashdata('m_sukses','Data polling sudah berhasil diaktifkan!');
		redirect('polling/nonaktif');
	}
	function nonaktif(){
		include('menu_akses.php'); //hak akses
		$data['title']="polling | Penilaian AKN Bojonegoro";
		$data['judul']="MASTER DATA > polling";
		$data['content']="polling/nonaktif.php";
		$data['polling']=$this->m_polling->ambil_datanon()->result();
		$this->load->view('admin/template',$data);
    }
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Penilaian Cari | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > polling Cari";
		$data['content']="polling/cari.php";
		$thn_semester=$this->input->post('thn_semester');
		$dosen=$this->input->post('dosen');		
		if ($thn_semester==null){
			redirect('polling/laporan');
		}
		elseif($dosen==null){
			$cek=$this->m_polling->cari($thn_semester);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$this->m_polling->daftar_dosen()->result();
				$data['thn_semester']=$this->m_polling->tahun_polling()->result();
				$data['polling']=$cek->result();
				$data['ketemu']='<b>'.$hasil.' </b>data berhasil ditemukan ';
				$data['jumlah']=$hasil;
				$data['tahun_semester']=$thn_semester;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_error','Pencarian data tidak ditemukan!');
				$data['polling']=$cek->result();
				redirect('polling/laporan');
			}
		}
		elseif($dosen!=null){
			$cek=$this->m_polling->cari_dosen($thn_semester,$dosen);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$this->m_polling->daftar_dosen()->result();
				$data['thn_semester']=$this->m_polling->tahun_polling()->result();
				$data['polling']=$cek->result();
				$data['ketemu']='<b>'.$hasil.' </b>data berhasil ditemukan ';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['polling']=$cek->result();
				redirect('polling/laporan');
			}
		}
    }
    function caridos(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Penilaian Cari | Penilaian AKN Bojonegoro";
		$data['judul']="TRANSAKSI > polling Cari";
		$data['content']="polling/caridos.php";
		$thn_semester=$this->input->post('thn_semester');
		$dosen=$this->input->post('dosen');		
		if ($thn_semester==null){
			redirect('polling/laporan_dosen');
		}
		elseif($dosen==null){
			$cek=$this->m_polling->cari($thn_semester);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$this->m_polling->daftar_dosen()->result();
				$data['thn_semester']=$this->m_polling->tahun_polling()->result();
				$data['polling']=$cek->result();
				$data['ketemu']='<b>'.$hasil.' </b>data berhasil ditemukan ';
				$data['jumlah']=$hasil;
				$data['tahun_semester']=$thn_semester;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_error','Pencarian data tidak ditemukan!');
				$data['polling']=$cek->result();
				redirect('polling/laporan_dosen');
			}
		}
		elseif($dosen!=null){
			$cek=$this->m_polling->cari_dosen($thn_semester,$dosen);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$this->m_polling->daftar_dosen()->result();
				$data['thn_semester']=$this->m_polling->tahun_polling()->result();
				$data['polling']=$cek->result();
				$data['ketemu']='<b>'.$hasil.' </b>data berhasil ditemukan ';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['polling']=$cek->result();
				redirect('polling/laporan_dosen');
			}
		}
    }
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" polling Cari | Penilaian AKN Bojonegoro";
		$data['judul']="MASTER DATA > polling Cari";
		$data['content']="polling/carinon.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(polling);
		}
		else{
			$cek=$this->m_polling->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['polling']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['polling']=$cek->result();
				redirect('polling');
			}
		}
    }
    function ekspor(){
		$this->load->view('admin/polling/excel');
	}
	

}