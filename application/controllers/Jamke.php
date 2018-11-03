<?php
class Jamke extends CI_Controller{
    private $limit=20;
	
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_jamke');
		$this->load->model('m_login');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index(){
		include('menu_akses.php'); //hak akses
		$data['title']="Jamke | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Jamke";
		$data['content']="jamke/index.php";
		$data['jamke']=$this->m_jamke->ambil_data()->result();
		$this->load->view('admin/template',$data);
    }

    function nonaktif($offset=0,$order_column='id_jam_ke',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_jam_ke';
        if(empty($order_type)) $order_type='asc';
		include('menu_akses.php'); //hak akses
		$data['title']="Jamke | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Jamke Nonaktif";
		$data['content']="jamke/nonaktif.php";
		$data['jamke']=$this->m_jamke->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('jamke/nonaktif/');
        $config['total_rows']	=$this->m_jamke->ambil_non();
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
		$config['last_tag_open'] = "<li>";
		$config['last_tagl_close'] = "</li>";	
		
		//parser
        $this->pagination->initialize($config);
        $data['pagination']=$this->pagination->create_links();		
		$data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->load->view('admin/template',$data);
    }
	
	function edit($id_jam_ke){
		include('menu_akses.php'); //hak akses
		$data['title']	="edit jamke"; 		//judul
		$data['judul']="MASTER DATA > Jam ke > Edit";	
        $data['content']="jamke/edit.php"; 	//konten
        $data['jamke']=$this->m_jamke->ceki($id_jam_ke)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function edit_proses($id_jam_kekirim){
		$info=array(
			'id_jam_ke'=>$id_jam_kekirim,
			'nama'=>$this->input->post('nama'),
			'jam_mulai'=>$this->input->post('jam_mulai'),
			'jam_selesai'=>$this->input->post('jam_selesai'),
			);
		$this->m_jamke->update($info, $id_jam_kekirim);
		$this->session->set_flashdata('m_sukses','Data Jam ke sudah berhasil diedit!');
		redirect('jamke');
	}
	function tambah(){
		include('menu_akses.php'); //hak akses
		$data['title']="Jamke | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Jam ke > Tambah";		
		$data['content']="jamke/tambah.php";
		$data['jamke']=$this->m_jamke->ambil_data()->result();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id_jam_ke=$this->input->post('id_jam_ke'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama'); 	// mendapatkan input dari kode
		$jam_mulai=$this->input->post('jam_mulai'); 	// mendapatkan input dari kode
		$jam_selesai=$this->input->post('jam_selesai'); 
		$cek=$this->m_jamke->cek($id_jam_ke); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','jamke <b>'.$id_jam_ke.'</b> sudah ada!');
			redirect('jamke/tambah');
		}else { 								// jika prodi belum ada, maka simpan
			$info=array(
				'id_jam_ke'=>$id_jam_ke,
				'nama'=>$nama,
				'jam_mulai'=>$jam_mulai,
				'jam_selesai'=>$jam_selesai,
			);
			$this->m_jamke->simpan($info);
			$this->session->set_flashdata('m_sukses','Id Jam ke <b>'.$id_jam_ke. '</b> berhasil ditambahkan!');
			redirect('jamke');
		}
	}
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Jam ke Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Jam ke Cari";
		$data['content']="jamke/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(jamke);
		}
		else{
			$cek=$this->m_jamke->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['jamke']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['jamke']=$cek->result();
				redirect('jamke');
			}
		}
    }
	

}