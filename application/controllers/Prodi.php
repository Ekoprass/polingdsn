<?php
class Prodi extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_prodi');
		$this->load->model('m_login');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index($offset=0,$order_column='id_prodi',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_prodi';
        if(empty($order_type)) $order_type='asc';
		include('menu_akses.php'); //hak akses
		$data['title']="Prodi | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Prodi";
		$data['content']="prodi/index.php";
		$data['prodi']=$this->m_prodi->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('prodi/index/');
        $config['total_rows']	=$this->m_prodi->jumlahaktif();
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
		include('menu_akses.php'); //hak akses
		$data['title']="Prodi | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Prodi > Tambah";		
		$data['content']="prodi/tambah.php";
		// $data['mahasiswa']=$this->m_mahasiswa->ambil_data()->result();
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('id_prodi'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_prodi'); 	// mendapatkan input dari kode
		$cek=$this->m_prodi->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Prodi <b>'.$id."-".$nama. '</b> sudah ada!');
			redirect('prodi/tambah');
		}else { 								// jika prodi belum ada, maka simpan
			$info=array(
				'id_prodi'=>$id,
				'nama_prodi'=>$nama
			);
			$this->m_prodi->simpan($info);
			$this->session->set_flashdata('m_sukses','Prodi <b>'.$id."-".$nama. '</b> berhasil ditambahkan!');
			redirect('prodi');
		}
	}
	function edit($id_prodi){
		include('menu_akses.php'); //hak akses
		$data['title']	="Edit Prodi"; 		//judul
		$data['judul']="MASTER DATA > Prodi > Edit";	
        $data['content']="prodi/edit.php"; 	//konten
        $data['prodi']	=$this->m_prodi->ceki($id_prodi)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	
	function edit_proses($id_prodikirim){
		$info=array(
			'id_prodi'=>$id_prodikirim,
			'nama_prodi'=>$this->input->post('nama'),
		);
		$this->m_prodi->update($info, $id_prodikirim);
		$this->session->set_flashdata('m_sukses','Data Prodi sudah berhasil diedit!');
		redirect('prodi');
	}
	function hapus($id_prodi){
		include('menu_akses.php'); //hak akses
		$data['title']		="Hapus prodi";
		$data['judul']="MASTER DATA > Prodi > Hapus";//judul
        $data['content']	="prodi/hapus.php"; //konten
        $data['prodi']		=$this->m_prodi->ceki($id_prodi)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_prodikirim){
		$status='nonaktif';
		$info=array(
			'id_prodi'=>$id_prodikirim,
			'status'=>$status,
		);
        $this->m_prodi->update_hapus($info,$id_prodikirim);
		$this->session->set_flashdata('m_sukses','Data Prodi sudah berhasil dinonaktifkan!');
		redirect('prodi');
    }
	function detail($id_prodi){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail prodi";
		$data['judul']="MASTER DATA > Prodi > Detail"; //judul
        $data['content']="prodi/detail.php"; //konten
        $data['prodi']=$this->m_prodi->ceki($id_prodi)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_prodi){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail prodi";
		$data['judul']="MASTER DATA > Prodi > Detail Nonaktif"; //judul
        $data['content']="prodi/detailnon.php"; //konten
        $data['prodi']=$this->m_prodi->cekn($id_prodi)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($id_prodi){
		include('menu_akses.php'); //hak akses
		$data['title']="Aktifkan Prodi";
		$data['judul']="MASTER DATA > Prodi > Aktifkan";//judul
        $data['content']="prodi/aktifkan.php"; //konten
        $data['prodi']=$this->m_prodi->cekaktif($id_prodi)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_prodikirim){
		$status='aktif';
		$info=array(
			'id_prodi'=>$id_prodikirim,
			'status'=>$status,
		);
        $this->m_prodi->update_aktif($info,$id_prodikirim);
		$this->session->set_flashdata('m_sukses','Data Prodi sudah berhasil diaktifkan!');
		redirect('prodi/nonaktif');
    }
	function nonaktif($offset=0,$order_column='id_prodi',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_prodi';
        if(empty($order_type)) $order_type='asc';
		include('menu_akses.php'); //hak akses
		$data['title']="Prodi | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Prodi Nonaktif";
		$data['content']="prodi/nonaktif.php";
		$data['prodi']=$this->m_prodi->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('prodi/nonaktif/');
        $config['total_rows']	=$this->m_prodi->jumlahnonaktif();
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
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Prodi Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Prodi Cari";
		$data['content']="prodi/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(prodi);
		}
		else{
			$cek=$this->m_prodi->cari($cari);
			$cekid=$this->m_prodi->cariid($cari);
			$hasil=$cek->num_rows();
			$hasilid=$cekid->num_rows();
			if($hasil>0){
				$data['prodi']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}elseif($hasilid>0){
				$data['prodi']=$cekid->result();
				$data['ketemu']='<b>'.$hasilid.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasilid;
				$this->load->view('admin/template',$data);
			}
			else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['prodi']=$cek->result();
				redirect('prodi/');
			}
		}
    }
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Prodi Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Prodi Cari";
		$data['content']="prodi/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(prodi);
		}
		else{
			$cek=$this->m_prodi->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['prodi']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['prodi']=$cek->result();
				redirect('prodi/nonaktif');
			}
		}
    }
}