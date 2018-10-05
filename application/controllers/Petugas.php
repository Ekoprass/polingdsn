<?php
class Petugas extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_petugas');
		$this->load->model('m_petugas');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
   function index($offset=0,$order_column='id_petugas',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_petugas';
        if(empty($order_type)) $order_type='asc';
		$data['title']="petugas | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > petugas";
		$data['content']="petugas/index.php";
		$data['petugas']=$this->m_petugas->semua($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('petugas/index/');
        $config['total_rows']	=$this->m_petugas->jumlahaktif();
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
	function nonaktif($offset=0,$order_column='id_tu',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_tu';
        if(empty($order_type)) $order_type='asc';
		$data['title']="petugas | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > petugas";
		$data['content']="petugas/nonaktif.php";
		$data['petugas']=$this->m_petugas->semua_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('petugas/nonaktif/');
        $config['total_rows']	=$this->m_petugas->jumlahnonaktif();
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
	function tambah(){
		$data['title']="Petugas | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Petugas > Tambah";		
		$data['content']="petugas/tambah.php";
		$data['semuakar']=$this->m_petugas->semuakar();
		$data['semuados']=$this->m_petugas->semuados();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id_kar=$this->input->post('id_kar'); 	// mendapatkan input dari kode
		$username=$this->input->post('username'); // mendapatkan input dari kode
		$password=$this->input->post('password'); 	// mendapatkan input dari kode
		
		$cek=$this->m_petugas->cek($username,$password); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Petugas <b>'.$username. '</b> sudah ada!');
			redirect('petugas/tambah');
		}else { 								// jika id petugas belum ada, maka simpan
			$info=array(
				'id_kar'=>$id_kar,
				'username'=>$username,
				'password'=>md5($password),
			);
			$this->m_petugas->simpan($info);
			$this->session->set_flashdata('m_sukses','Petugas <b>'.$username. '</b> berhasil ditambahkan!');
			redirect('petugas');
		}
	}
	function edit($id_petugas){
		$data['title']	="edit Petugas"; 		//judul
		$data['judul']="MASTER DATA > Petugas > Edit";	
        $data['content']="petugas/edit.php"; 	//konten
		$data['semuakar']=$this->m_petugas->semuakar();
        $data['petugas']	=$this->m_petugas->ceki($id_petugas)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	
	function edit_proses($id_petugaskirim){
		$p=$this->input->post('password');
		$info=array(
			'id_petugas'=>$id_petugaskirim,
			'id_kar'=>$this->input->post('id_kar'),
			'password'=>md5($p),
			
		);
		$this->m_petugas->update($id_petugaskirim, $info);
		$this->session->set_flashdata('m_sukses','Data Petugas sudah berhasil diedit!');
		redirect('petugas');
	}
	function hapus($id_petugas){
		$data['title']		="hapus Petugas";
		$data['judul']="MASTER DATA > Petugas > Non Aktifkan";//judul
        $data['content']	="petugas/hapus.php"; //konten
        $data['petugas']		=$this->m_petugas->ceki($id_petugas)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_petugaskirim){
		$status='nonaktif';
		$info=array(
			'id_petugas'=>$id_petugaskirim,
			'status'=>$status,
		);
        $this->m_petugas->update_hapus($info,$id_petugaskirim);
		$this->session->set_flashdata('m_sukses','Data petugas sudah berhasil dinonaktifkan!');
		redirect('petugas');
    }
	function aktif_proses($id_petugaskirim){
		$status_keanggotaan='aktif';
		$info=array(
			'id_petugas'=>$id_petugaskirim,
			'status'=>$status,
		);
        $this->m_petugas->update_hapus($info,$id_petugaskirim);
		$this->session->set_flashdata('m_sukses','Data petugas sudah berhasil dinonaktifkan!');
		redirect('petugas/nonaktif');
    }
	
	function detail($id_petugas){
		$data['title']		="detail petugas";
		$data['judul']="MASTER DATA > Petugas > Detail"; //judul
        $data['content']	="petugas/detail.php"; //konten
        $data['petugas']		=$this->m_petugas->ceki($id_petugas)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_tu){
		$data['title']		="detail petugas";
		$data['judul']="MASTER DATA > Tata Usaha > Detail"; //judul
        $data['content']	="petugas/detail.php"; //konten
        $data['petugas']		=$this->m_petugas->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($id_petugas){
		$data['title']="aktifkanpetugas";
		$data['judul']="MASTER DATA > Petugas> Aktifkan";//judul
        $data['content']="petugas/aktifkan.php"; //konten
        $data['petugas']=$this->m_petugas->ceki($id_petugas)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_petugaskirim){
		$status='aktif';
		$info=array(
			'id_petugas'=>$id_petugaskirim,
			'status'=>$status,
		);
        $this->m_petugas->update_aktif($info,$id_petugaskirim);
		$this->session->set_flashdata('m_sukses','Data petugas sudah berhasil diaktifkan!');
		redirect('petugas/nonaktif');
    }
   function cari(){
		$data['title']=" petugas Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > petugas Cari";
		$data['content']="petugas/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(petugas);
		}
		else{
			$cek=$this->m_petugas->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['petugas']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['petugas']=$cek->result();
				redirect('petugas/');
			}
		}
    }
	function carinon(){
		$data['title']=" petugas Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > petugas Cari";
		$data['content']="petugas/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(petugas);
		}
		else{
			$cek=$this->m_petugas->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['petugas']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['petugas']=$cek->result();
				redirect('petugas/nonaktif');
			}
		}
    }
}