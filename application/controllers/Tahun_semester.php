<?php
class Tahun_semester extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->model('m_login');
		$this->load->model('m_pertanyaan');
		$this->load->model('m_tahun_semester');
		$this->load->library(array('pagination','form_validation','upload'));
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
	function index($offset=0,$order_column='id_tahun_semester',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_tahun_semester';
        if(empty($order_type)) $order_type='asc';
        
		//load data
		include('menu_akses.php'); //hak akses
		$data['title']="Tahun Semester | Polling AKN Bojonegoro";
		$data['judul']="KONFIGURASI > Tahun Semester";
		$data['content']="tahun_semester/index.php";
		$data['tahun']=$this->m_tahun_semester->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		$data['total_rows']	=$this->m_tahun_semester->jumlah_soal($order_column);
        
		//pagination atau pengalamatan
		$config['base_url']		=site_url('tahun_semester/index/');
        $config['total_rows']	=$this->m_tahun_semester->jumlah_soal($order_column);
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
    
	 
	 function detail(){
		 include('menu_akses.php'); //hak akses
		$id=$this->uri->segment(3);
		$data['title']				="detail tahun semester"; 			//judul
		$data['judul']="KONFIGURASI > Detail Tahun Semester";
        $data['content']			="tahun_semester/detail.php"; //konten
		$data['semua']				=$this->m_tahun_semester->semua($id)->result();
		$data['semua_pertanyaan']	=$this->m_tahun_semester->semua_pertanyaan();
		$this->load->view('admin/template',$data);
    }
	function tambah(){
		include('menu_akses.php'); //hak akses
		$data['title']				="tambah tahun semester"; 			//judul
		$data['judul']="KONFIGURASI > Tambah Tahun Semester";
        $data['content']			="tahun_semester/tambah.php"; //konten
		$this->load->view('admin/template',$data);
    }
	function tambah_proses(){ 
		$tahun=$this->input->post('tahun'); 
		$semester=$this->input->post('semester');
		$id_tahun_semester=$tahun.$semester;
		$cekid=$this->m_tahun_semester->cekid($id_tahun_semester);
		if($cekid->num_rows()>0){
			$this->session->set_flashdata('m_eror','Tahun Semester Sudah Ada');
			redirect('tahun_semester/tambah/'.$id_tahun_semester);
		}else{
			$info=array(	//$info= adalah untuk penyimpanan sementara id_tahun,tahun,semester yang kemudian akan di panggil ke model simpan
			'id_tahun_semester'=>$id_tahun_semester,
			'tahun'=>$tahun,
			'semester'=>$semester
			);
			$this->m_tahun_semester->simpan($info); //memanggil model tahun semester bernama 'simpan' yang fungsinya untuk proses menyimpan ke database
			$this->session->set_flashdata('m_sukses','Tahun Semester Berhasil Ditambahkan!');
			redirect('tahun_semester');
		}

	}
	function edit($id){
		include('menu_akses.php'); //hak akses
		$data['title']				="edit tahun_semester"; 			//judul
		$data['judul']="KONFIGURASI > Edit Tahun Semester";
        $data['content']			="tahun_semester/edit.php"; //konten
        $data['tahun']				=$this->m_tahun_semester->tahun_semester($id)->row_array();
		$this->load->view('admin/template',$data);
    }
	function tambah_pertanyaan_proses(){
		$pertanyaan=$this->input->post('id_pertanyaan');
		$semester=$this->input->post('id_tahun_semester');
		$this->m_tahun_semester->tambah_soal($pertanyaan,$semester);
		$this->session->set_flashdata('m_sukses','Pertanyaan Berhasil Ditambahkan');
			redirect('tahun_semester/detail/'.$semester);
		
    }
	function edit_pertama(){
		$id_tahun_semester=$this->input->post('id_tahun_semester'); 
		$idlama=$this->input->post('id_lama'); 
		$tahun=$this->input->post('tahun'); 
		$semester=$this->input->post('semester'); 
		$id_akun=$this->input->post('id_akun');
		$cekid=$this->m_tahun_semester->cekid($id_tahun_semester,$id_akun);
		if($cekid->num_rows()>0){
			$this->session->set_flashdata('m_eror','Akun Telah Ada Di Tahun Semester Ini');
			redirect('tahun_semester/detail/'.$id_tahun_semester);
		}else{
			$info=array(
				'id_tahun_semester'=>$id_tahun_semester,
				'tahun'=>$tahun,
				'semester'=>$semester,
				
			);
			$this->m_tahun_semester->uped($info,$idlama);
			$this->m_tahun_semester->tahun_smt_akun($id_tahun_semester, $id_akun);
			$this->session->set_flashdata('m_sukses','Data Akun Berhasil Diedit!');
			redirect('tahun_semester/detail/'.$id_tahun_semester);
		}

	}
	function edit_proses($id){
		$tahun=$this->input->post('tahun');
		$semester=$this->input->post('semester');
		$idthn=$tahun.$semester;
		$cekid=$this->m_tahun_semester->cekthm($idthn)->num_rows();
		if($cekid>0){
			$this->session->set_flashdata('m_eror','Tahun Semester Sudah Ada!');
			redirect('tahun_semester/edit'.$id);
		}else{
		$data['title']				="tahun_semester edit akun"; 			//judul
		$data['judul']="KONFIGURASI > Tambah Tahun Semester > Edit Akun";
        $data['content']			="tahun_semester/deedit.php"; //konten
        $data['jumlah_akun']		=$this->m_tahun_semester->jumlahakun($idthn);
		$data['semuaa']				=$this->m_tahun_semester->semuaa($idthn)->result();
		$data['semua_akun']			=$this->m_tahun_semester->semua_akunt($idthn);
		$data['semester']			=$this->m_tahun_semester->semua_akunt($idthn);
		$data['id']					=$idthn;
		$data['idlama']				=$id;
		$data['tahun']				=$tahun;
		$data['semester']			=$semester;
		}
		$this->load->view('admin/template',$data);
		
    }
}