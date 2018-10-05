<?php
class Tata_usaha extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_tata_usaha');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index($offset=0,$order_column='id_tu',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_tu';
        if(empty($order_type)) $order_type='asc';
		
		include('menu_akses.php'); //hak akses
		$data['title']="Tata Usaha | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha";
		$data['content']="tata_usaha/index.php";
		$data['tata_usaha']=$this->m_tata_usaha->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('tata_usaha/index/');
        $config['total_rows']	=$this->m_tata_usaha->jumlahaktif();
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
		
		include('menu_akses.php'); //hak akses
		$data['title']="Tata Usaha | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha > Nonaktif";
		$data['content']="tata_usaha/nonaktif.php";
		$data['tata_usaha']=$this->m_tata_usaha->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('tata_usaha/nonaktif/');
        $config['total_rows']	=$this->m_tata_usaha->jumlahnonaktif();
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
		$data['title']="Tata Usaha | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha > Tambah";		
		$data['content']="tata_usaha/tambah.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('id_tu'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_tu'); 	// mendapatkan input dari kode
		$tmpt_lahir=$this->input->post('tmpt_lahir'); 	// mendapatkan input dari kode
		$tgl_lahir=$this->input->post('tgl_lahir'); 	// mendapatkan input dari kode
		$jenis_kelamin=$this->input->post('jenis_kelamin'); 	// mendapatkan input dari kode
		$agama=$this->input->post('agama'); 	// mendapatkan input dari kode
		$pendidikan=$this->input->post('pendidikan'); 	// mendapatkan input dari kode
		$status_kepegawaian=$this->input->post('status_kepegawaian'); 	// mendapatkan input dari kode
		$status_keanggotaan=$this->input->post('status_keanggotaan'); 	// mendapatkan input dari kode
		$alamat=$this->input->post('alamat');
		$akses='akses005'; 
		
		$cek=$this->m_tata_usaha->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Tata Usaha <b>'.$id."-".$nama. '</b> sudah ada!');
			redirect('tata_usaha/tambah');
		}else { 								// jika id tata_usaha belum ada, maka simpan
			$info=array(
				'id_tu'=>$id,
				'nama_tu'=>$nama,
				'tmpt_lahir'=>$tmpt_lahir,
				'tgl_lahir'=>$tgl_lahir,
				'jenis_kelamin'=>$jenis_kelamin,
				'agama'=>$agama,
				'pendidikan_akhir'=>$pendidikan,
				'status_kepegawaian'=>$status_kepegawaian,
				'status_keanggotaan'=>$status_keanggotaan,
				'alamat'=>$alamat,
				'username'=>$id,
				'password'=>md5($id)
			);
			$this->m_tata_usaha->simpan($info);
			$this->m_tata_usaha->simakses($id,$akses);
			$this->session->set_flashdata('m_sukses','Tata Usaha <b>'.$id.'</b> berhasil ditambahkan!');
			redirect('tata_usaha');
		}
	}
	function edit($id_tu){
		include('menu_akses.php'); //hak akses
		$data['title']	="Edit Tata Usaha"; 		//judul
		$data['judul']="MASTER DATA > Tata Usaha > Edit";	
        $data['content']="tata_usaha/edit.php"; 	//konten
        $data['tata_usaha']	=$this->m_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	
	function edit_proses($id_tukirim){
		$info=array(
			'id_tu'=>$id_tukirim,
			'nama_tu'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'status_keanggotaan'=>$this->input->post('status_keanggotaan'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->m_tata_usaha->update($info, $id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil diedit!');
		redirect('tata_usaha');
	}
	function edit_proses2($id_tukirim){
		$info=array(
			'id_tu'=>$id_tukirim,
			'nama_tu'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->m_tata_usaha->update($info, $id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil diedit!');
		redirect('tata_usaha/detail_profil/'.$id_tukirim);
	}
	function editpass($id_tukirim){
		$info=array(
			'password'=>md5($this->input->post('password'))
		);
		$this->m_tata_usaha->update($info, $id_tukirim);
		$this->session->set_flashdata('m_sukses','Username dan Password <b>'.$id_tukirim. '</b> berhasil diedit!');
		redirect('tata_usaha/detail_profil/'.$id_tukirim);
	}
	function hapus($id_tu){
		include('menu_akses.php'); //hak akses
		$data['title']		="Hapus Tata Usaha";
		$data['judul']="MASTER DATA > Tata Usaha > Hapus";//judul
        $data['content']	="tata_usaha/hapus.php"; //konten
        $data['tata_usaha']		=$this->m_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_tukirim){
		$status_keanggotaan='nonaktif';
		$info=array(
			'id_tu'=>$id_tukirim,
			'status_keanggotaan'=>$status_keanggotaan,
		);
        $this->m_tata_usaha->update_hapus($info,$id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil dinonaktifkan!');
		redirect('tata_usaha/nonaktif');
    }
	function aktif_proses($id_tukirim){
		$status_keanggotaan='aktif';
		$info=array(
			'id_tu'=>$id_tukirim,
			'status_keanggotaan'=>$status_keanggotaan,
		);
        $this->m_tata_usaha->update_hapus($info,$id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil dinonaktifkan!');
		redirect('tata_usaha/nonaktif');
    }
	function detail($id_tu){
		include('menu_akses.php'); //hak akses
		$data['title']		="Detail Tata Usaha";
		$data['judul']="MASTER DATA > Tata Usaha > Detail"; //judul
        $data['content']	="tata_usaha/detail.php"; //konten
        $data['tata_usaha']		=$this->m_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detail_profil($id_tu){
		include('menu_akses.php'); //hak akses
		$data['title']		="Detail | Polling AKN Bojonegoro";
		$data['judul']="Profil > Detail"; //judul
        $data['content']	="tata_usaha/detail_profil.php"; //konten
        $data['tata_usaha']		=$this->m_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_tu){
		include('menu_akses.php'); //hak akses
		$data['title']		="Detail Tata Usaha";
		$data['judul']="MASTER DATA > Tata Usaha > Detail Nonaktif"; //judul
        $data['content']	="tata_usaha/detailnon.php"; //konten
        $data['tata_usaha']		=$this->m_tata_usaha->ceki($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}

	function aktifkan($id_tu){
		include('menu_akses.php'); //hak akses
		$data['title']		="Aktifkan Tata Usaha";
		$data['judul']="MASTER DATA > Tata Usaha > Aktifkan";//judul
        $data['content']	="tata_usaha/aktifkan.php"; //konten
        $data['tata_usaha']		=$this->m_tata_usaha->cekaktif($id_tu)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_tukirim){
		$status='aktif';
		$info=array(
			'id_tu'=>$id_tukirim,
			'status_keanggotaan'=>$status,
		);
        $this->m_tata_usaha->update_aktif($info,$id_tukirim);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$id_tukirim. '</b> berhasil diaktifkan!');
		redirect('tata_usaha/nonaktif');
    }
	function cari(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Tata Usaha Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha > Cari";
		$data['content']="tata_usaha/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(tata_usaha);
		}
		else{
			$cek=$this->m_tata_usaha->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['tata_usaha']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['tata_usaha']=$cek->result();
				redirect('tata_usaha/');
			}
		}
    }
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Tata Usaha Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Tata Usaha > Cari Nonaktif";
		$data['content']="tata_usaha/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(tata_usaha);
		}
		else{
			$cek=$this->m_tata_usaha->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['tata_usaha']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['tata_usaha']=$cek->result();
				redirect('tata_usaha/nonaktif');
			}
		}
    }
}