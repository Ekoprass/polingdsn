<?php
class Kelas extends CI_Controller{
    private $limit=10;
    
	function __construct(){
        parent::__construct();
		$this->load->model('m_kelas');
		$this->load->model('m_login');
		$this->load->model('m_tahun_semester');
		$this->load->library(array('pagination','form_validation','upload'));
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index($offset=0,$order_column='id_kelas',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kelas';
        if(empty($order_type)) $order_type='asc';
        
		//load data
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas";
		$data['content']="kelas/index.php";
		$data['kelas']=$this->m_kelas->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		$data['total_rows']	=$this->m_kelas->jumlah_kelas($order_column);
        
		//pagination atau pengalamatan
		$config['base_url']		=site_url('kelas/index/');
        $config['total_rows']	=$this->m_kelas->jumlah_kelas($order_column);
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
        //style untuk pengalamatan dengan bootstrap
		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tagl_close'] = "</li>";	
		
		//parser
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->view('admin/template',$data);
    }
    
	function tambah(){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas";
		$data['content']="kelas/tambah.php";
		$data['prodi']=$this->m_kelas->prodi();
		$data['dpa']=$this->m_kelas->dosen();
		$this->load->view('admin/template',$data);
    }
    function naikkelas() {
		$kelas=$this->input->post('idkelas');
		$id=$this->input->post('kelas');
		$tahun=$this->input->post('tahun');
		$prodi=$this->input->post('prodi');
		$semester=$this->input->post('semester');
		$dpa=$this->input->post('dpa');
		$ruang=$this->input->post('ruang');
		$status='aktif';
		$info=array(
			'id_kelas'=>$kelas,
			'tahun'=>$tahun,
			'semester'=>$semester,
			'id_prodi'=>$prodi,
			'dpa'=>$dpa,
			'ruang'=>$ruang,
			'status'=>$status
		);
		$data=array(
			'status'=>'nonaktif'
			);
		$this->m_kelas->naikkelas($kelas,$info,$data,$id);
		$this->session->set_flashdata('m_sukses','Proses Naik Kelas Berhasil Dilakukan');
		redirect('kelas');
	}
    function naik($id){
		include('menu_akses.php');
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas";
		$data['content']="kelas/naikkelas.php";
		$data['kelas']=$id;
		$data['semua_mahasiswa']=$this->m_kelas->siswa_kelas($id)->result();
		$this->load->view('admin/template',$data);
    }
    function tambahnaik(){
		include('menu_akses.php');
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas > Tambah Kelas";
		$data['content']="kelas/tambahnaik.php";
		$ini=$this->uri->segment(3);
		$tahun=substr($ini,0,4);
		$semester=substr($ini,4,2);
		$prodi=substr($ini,6,2);
		$ruang=substr($ini,8,2);
		$data['prodi']=$prodi;
		$data['tahun']=$tahun;
		$data['semester']=$semester;
		$data['ruang']=$ruang;
		$data['ini']=$this->uri->segment(3);
		$data['lama']=$this->uri->segment(4);
		$data['dpa']=$this->m_kelas->dosen();
		$this->load->view('admin/template',$data);
    }
    function tuambah($ini){
		$prodi=substr($ini,6,2); 
		$lama=$this->input->post('lama'); 
		$tahun=substr($ini,0,4); 
		$semester=substr($ini,4,2); 
		$dpa=$this->input->post('dpa'); 
		$status="aktif"; 
		$ruang=substr($ini,8,2); 
		$id=$ini;
		$info=array(
					'id_kelas'=>$id,
					'ruang'=>$ruang,
					'semester'=>$semester,
					'id_prodi'=>$prodi,
					'dpa'=>$dpa,
					'tahun'=>$tahun,
					'status'=>$status,
		);
		$cek=$this->m_kelas->cek($id);
		$cekgu=$this->m_kelas->cekgu($tahun,$dpa);				// cek kode di database
		if($cek->num_rows()>0){
			$this->session->set_flashdata('message','Kelas Sudah Ada');
			redirect('kelas/tambahnaik/'.$id.'/'.$lama);
		} elseif($cekgu->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('message','Dosen Telah Menjadi DPA Di Tahun Ini!');
			redirect('kelas/tambahnaik/'.$id.'/'.$lama);
		}else{
				$this->m_kelas->simpan($info);
				$this->session->set_flashdata('m_sukses','Data Kelas Berhasil Disimpan');
				redirect('kelas');
			}
	}
	function edit($id_kelas){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas >Edit";
		$data['content']="kelas/edit.php";
		$data['kelas']=$this->m_kelas->ambilkelas($id_kelas)->row_array();
		$data['prodi']=$this->m_kelas->npro();
		$data['dpa']=$this->m_kelas->doskel();
		$this->load->view('admin/template',$data);
    }
	function tambah_proses(){
		$prodi=$this->input->post('prodi'); 
		$tahun=$this->input->post('tahun'); 
		$semester=$this->input->post('semester'); 
		$dpa=$this->input->post('dpa'); 
		$status='aktif';
		$ruang=$this->input->post('ruang'); 
		$id=$tahun.$semester.$prodi.$ruang;
	
		$cek=$this->m_kelas->cek($id);
		$cekgu=$this->m_kelas->cekgu($tahun,$dpa);				// cek kode di database
		if($cek->num_rows()>0){
			$this->session->set_flashdata('message','Kelas Sudah Ada');
			redirect('kelas/tambah');
		} elseif($cekgu->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('message','Dosen Telah Menjadi DPA Di Tahun Ini!');
			redirect('kelas/tambah');
		}else {
				$info=array(
					'id_kelas'=>$id,
					'ruang'=>$ruang,
					'semester'=>$semester,
					'id_prodi'=>$prodi,
					'dpa'=>$dpa,
					'tahun'=>$tahun,
					'status'=>$status,
				);
					$this->m_kelas->simpan($info);
					$this->session->set_flashdata('m_sukses','Data Kelas Berhasil Disimpan');
					redirect('kelas');
			}
			
		}
	function detail($id_kelas){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas";
		$data['content']="kelas/detail.php";
		$data['kelas_siswa']=$this->m_kelas->detailkelas($id_kelas)->row_array();
		$data['semua_siswa_all']=$this->m_kelas->all();
		$data['semua_siswa']=$this->m_kelas->siswa_kelas($id_kelas)->result();
		$this->load->view('admin/template',$data);
    }
    function detailnon($id_kelas){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas";
		$data['content']="kelas/detailnon.php";
		$data['kelas_siswa']=$this->m_kelas->detailkelas($id_kelas)->row_array();
		$data['semua_siswa_all']=$this->m_kelas->all();
		$data['semua_siswa']=$this->m_kelas->siswa_kelas($id_kelas)->result();
		$this->load->view('admin/template',$data);
    }
	function tambah_siswa_proses(){
		$id_kelas=$this->input->post('id_kelas'); 
		$semester=$this->input->post('semester');
		$tahun=$this->input->post('tahun');
		$nis=$this->input->post('nim');
		$cek=$this->m_kelas->cekid($nis,$tahun);
		if($cek->num_rows()>0){
			$this->session->set_flashdata('m_eror','Mahasiswa Di Kelas Ini Sudah Ada Atau Mahasiswa Telah Masuk Di Kelas Lain');
			redirect('kelas/detail/'.$id_kelas);
		}
		else{
			$this->m_kelas->kelas($id_kelas,$nis);
		}
		$this->session->set_flashdata('m_sukses','Data Mahasiswa pada kelas berhasil ditambahkan!');
		redirect('kelas/detail/'.$id_kelas);
		

	}
	function edit_proses($idi){
		$id_kelas=$this->input->post('id_kelas');
		$tahun=$this->input->post('tahun');
		$semester=$this->input->post('semester');
		$prodi=$this->input->post('prodi');
		$dpa=$this->input->post('dpa');
		$status=$this->input->post('status');
		$ruang=$this->input->post('ruang');
		$id=$tahun.$semester.$prodi.$ruang;
		$tahun_semester=$tahun.$semester;
		$cek=$this->m_kelas->cek($id);
		$cekgu=$this->m_kelas->cekgu($tahun,$dpa);
		if($cek->num_rows()>0){
			$this->session->set_flashdata('m_eror','Kelas Sudah Ada');
			redirect('kelas/edit/'.$idi);
		}elseif($cekgu->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('message','Dosen Telah Menjadi DPA Di Tahun Ini!');
			redirect('kelas/edit/'.$idi);
		}
		else{
			$info=array(
			'id_kelas'=>$id,
			'tahun'=>$tahun,
			'semester'=>$semester,
			'id_prodi'=>$prodi,
			'dpa'=>$dpa,
			'ruang'=>$ruang,
			'status'=>$status,
			);
			$cektahun=$this->m_kelas->cektah($tahun_semester);
			if($cektahun->num_rows()>0){
				$this->m_kelas->update($info,$idi);
				$this->session->set_flashdata('m_sukses','Data kelas berhasil diedit!');
				redirect('kelas');
			}else{
				$data['title']="Kelas | Polling AKN Bojonegoro";
				$data['judul']="KONFIGURASI > Kelas > Tambah >Tambah Akun";
				$data['content']="kelas/editakun.php";
				$data['prodi']=$prodi;
				$data['tahun']=$tahun;
				$data['semester']=$semester;
				$data['dpa']=$dpa;
				$data['status']=$status;
				$data['ruang']=$ruang;
				$data['id_kelas']=$id_kelas;
				$data['idi']=$idi;
				$data['jumlah_akun']		=$this->m_kelas->jumlahakun($tahun_semester);
				$data['semuaa']				=$this->m_kelas->semuaa($tahun_semester)->result();
				$data['semua_akun']			=$this->m_kelas->semua_akunt($tahun_semester);
				$this->load->view('admin/template',$data);
				}
			}
			
	}
	function hapus($id_kelas){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas >Edit";
		$data['content']="kelas/hapus.php";
		$data['kelas']=$this->m_kelas->ambilkelas($id_kelas)->row_array();
		$this->load->view('admin/template',$data);
    }
	function hapus_proses($id){
		$status='nonaktif';
		$info=array(
			'id_kelas'=>$id,
			'status'=>$status,
			);
		$this->m_kelas->hapus($info,$id);
		$this->session->set_flashdata('m_sukses','Data kelas berhasil Nonaktifkan!');
		redirect('kelas');
	}
	function aktifkan($id_kelas){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas >Edit";
		$data['content']="kelas/aktifkan.php";
		$data['kelas']=$this->m_kelas->ambilkelas($id_kelas)->row_array();
		$this->load->view('admin/template',$data);
    }
    function nonaktif(){
    	include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas Nonaktif";
		$data['content']="kelas/nonaktif.php";
		$data['kelas']=$this->m_kelas->ambil_data_non()->result();
		$this->load->view('admin/template',$data);
    }
	 function non($offset=0,$order_column='id_kelas',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_kelas';
        if(empty($order_type)) $order_type='asc';
        
		//load data
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas Nonaktif";
		$data['content']="kelas/nonaktif.php";
		$data['kelas']=$this->m_kelas->ambil_data_non($this->limit,$offset,$order_column,$order_type)->result();
		$data['total_rows']	=$this->m_kelas->jumlah_kelas_non($order_column);
        
		//pagination atau pengalamatan
		$config['base_url']		=site_url('kelas/nonaktif/');
        $config['total_rows']	=$this->m_kelas->jumlah_kelas_non($order_column);
        $config['per_page']		=$this->limit;
        $config['uri_segment']	=3;
        //style untuk pengalamatan dengan bootstrap
		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = "<li class='disabled'><li class='active'><a href='#'>";
		$config['cur_tag_close'] = "<span class='sr-only'></span></a></li>";
		$config['next_tag_open'] = "<li>";
		$config['next_tagl_close'] = "</li>";
		$config['prev_tag_open'] = "<li>";
		$config['prev_tagl_close'] = "</li>";
		$config['first_tag_open'] = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_tagl_close'] = "</li>";	
		
		//parser
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->view('admin/template',$data);
    }
	function aktif_proses($id){
		$status='aktif';
		$info=array(
			'id_kelas'=>$id,
			'status'=>$status,
			);
		$this->m_kelas->aktif($info,$id);
		$this->session->set_flashdata('m_sukses','Data kelas berhasil Diaktifkan!');
		redirect('kelas/nonaktif');
	}
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas > Cari Kelas Aktif";
		$data['content']="kelas/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect('kelas');
		}
		else{
			$cek=$this->m_kelas->cari($cari);
			$ceki=$this->m_kelas->carinama($cari);
			$hasil=$cek->num_rows();
			$hasili=$ceki->num_rows();
			if($hasil>0){
				$data['kelas']=$cek->result();
				$data['ketemu']='Ditemukan <b> '.$hasil.' </b> data berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasili>0){
				$data['kelas']=$ceki->result();
				$data['ketemu']='Ditemukan <b>'.$hasili.'</b> data berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasili;
				$this->load->view('admin/template',$data);
			}
			else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kelas']=$cek->result();
				redirect('kelas/');
			}
		}
	}
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']="Kelas | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Kelas > Cari Kelas Nonaktif";
		$data['content']="kelas/carinon.php";
		$carinon=$this->input->post('carinon');
		if ($cari==null){
			redirect('kelas/nonaktif');
		}
		else{
			$cek=$this->m_kelas->carinon($carinon);
			$ceki=$this->m_kelas->carinamanon($carinon);
			$hasil=$cek->num_rows();
			$hasili=$ceki->num_rows();
			if($hasil>0){
				$data['kelas']=$cek->result();
				$data['ketemu']='Ditemukan <b> '.$hasil.' </b> data berdasarkan <b>'.$carinon.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasili>0){
				$data['kelas']=$ceki->result();
				$data['ketemu']='Ditemukan <b> '.$hasili.' </b> data berdasarkan <b>'.$carinon.'</b>';
				$data['jumlah']=$hasili;
				$this->load->view('admin/template',$data);
			}
			else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['kelas']=$cek->result();
				redirect('kelas/nonaktif');
			}
		}
	}
}