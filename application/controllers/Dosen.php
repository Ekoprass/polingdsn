<?php
class Dosen extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload','tools'));
		$this->load->model('m_dosen');
		$this->load->model('m_login');
		$this->load->database();
        $this->load->helper(array('form','url'));
		$this->load->library('Excel_readers');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    
    function index($offset=0,$order_column='id_dosen',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_dosen';
        if(empty($order_type)) $order_type='asc';
		include('menu_akses.php'); //hak akses
		$data['title']="Dosen | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen";
		$data['content']="dosen/index.php";
		$data['dosen']=$this->m_dosen->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('dosen/index/');
        $config['total_rows']	=$this->m_dosen->jumlahaktif();
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
		$data['title']="Dosen | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen > Tambah";		
		$data['content']="dosen/tambah.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){					//dari form yang diisi pada halaman tambah dosen akan dikirim ke tambah proses 
		$id=$this->input->post('id_dosen'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_dosen'); 	// mendapatkan input dari kode
		$tmpt_lahir=$this->input->post('tmpt_lahir'); 	// mendapatkan input dari kode
		$tgl_lahir=$this->input->post('tgl_lahir'); 	// mendapatkan input dari kode
		$jenis_kelamin=$this->input->post('jenis_kelamin'); 	// mendapatkan input dari kode
		$agama=$this->input->post('agama'); 	// mendapatkan input dari kode
		$pendidikan=$this->input->post('pendidikan'); 	// mendapatkan input dari kode
		$status_kepegawaian=$this->input->post('status_kepegawaian'); 	// mendapatkan input dari kode
		$status_keanggotaan=$this->input->post('status_keanggotaan'); 	// mendapatkan input dari kode
		$alamat=$this->input->post('alamat'); 	// mendapatkan input dari kode
		$akses='akses002';
		
		$cek=$this->m_dosen->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Dosen <b>'.$id."-".$nama. '</b> sudah ada!');
			redirect('dosen/tambah');
		}else { 								// jika id dosen belum ada, maka simpan
			$info=array(
				'id_dosen'=>$id,
				'nama_dosen'=>$nama,
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
			$this->m_dosen->simpan($info);
			$this->m_dosen->simakses($id,$akses);
			$this->session->set_flashdata('m_sukses','Dosen <b>'.$id."-".$nama. '</b> berhasil ditambahkan!');
			redirect('dosen');
		}
	}
	function edit($id_dosen){
		include('menu_akses.php'); //hak akses
		$data['title']="Edit Dosen"; 		//judul
		$data['judul']="MASTER DATA > Dosen > Edit";	
        $data['content']="dosen/edit.php"; 	//konten
        $data['dosen']=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	
	function edit_proses($id_dosenkirim){
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'nama_dosen'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'status_keanggotaan'=>$this->input->post('status_keanggotaan'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->m_dosen->update($info, $id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data Dosen sudah berhasil diedit!');
		redirect('dosen');
	}
	function edit_proses2($id_dosenkirim){
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'nama_dosen'=>$this->input->post('nama'),
			'tmpt_lahir'=>$this->input->post('tempat'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'agama'=>$this->input->post('agama'),
			'pendidikan_akhir'=>$this->input->post('pendidikan'),
			'status_kepegawaian'=>$this->input->post('status_kepegawaian'),
			'alamat'=>$this->input->post('alamat')
		);
		$this->m_dosen->update($info, $id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data berhasil diedit!');
		redirect('dosen/detail_profil/'.$id_dosenkirim);
	}
	function editpass($id_dosenkirim){
		$info=array(
			'password'=>md5($this->input->post('password'))
		);
		$this->m_dosen->update($info, $id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Password <b>'.$id_dosenkirim. '</b> berhasil diedit!');
		redirect('dosen/detail_profil/'.$id_dosenkirim);
	}
	function hapus($id_dosen){
		include('menu_akses.php'); //hak akses
		$data['title']="Hapus Dosen";
		$data['judul']="MASTER DATA > Dosen > Hapus";//judul
        $data['content']="dosen/hapus.php"; //konten
        $data['dosen']=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($id_dosenkirim){
		$status_keanggotaan='nonaktif';
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'status_keanggotaan'=>$status_keanggotaan,
		);
        $this->m_dosen->update_hapus($info,$id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data Dosen sudah berhasil dinonaktifkan!');
		redirect('dosen');
    }
	function detail($id_dosen){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail Dosen";
		$data['judul']="MASTER DATA > Dosen > Detail"; //judul
        $data['content']="dosen/detail.php"; //konten
        $data['dosen']=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detail_profil($id_dosen){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail | Polling AKN Bojonegoro";
		$data['judul']="Profil > Detail"; //judul
        $data['content']="dosen/detail_profil.php"; //konten
        $data['dosen']=$this->m_dosen->ceki($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($id_dosen){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail Dosen";
		$data['judul']="MASTER DATA > Dosen > Detail Nonaktif"; //judul
        $data['content']="dosen/detailnon.php"; //konten
        $data['dosen']=$this->m_dosen->cekn($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($id_dosen){
		include('menu_akses.php'); //hak akses
		$data['title']="Aktifkan Dosen";
		$data['judul']="MASTER DATA > Dosen > Aktifkan";//judul
        $data['content']="dosen/aktifkan.php"; //konten
        $data['dosen']=$this->m_dosen->cekaktif($id_dosen)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($id_dosenkirim){
		$status='aktif';
		$info=array(
			'id_dosen'=>$id_dosenkirim,
			'status_keanggotaan'=>$status,
		);
        $this->m_dosen->update_aktif($info,$id_dosenkirim);
		$this->session->set_flashdata('m_sukses','Data Dosen sudah berhasil diaktifkan!');
		redirect('dosen/nonaktif');
    }
	function nonaktif($offset=0,$order_column='id_dosen',$order_type='asc'){
		include('menu_akses.php'); //hak akses
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='id_dosen';
        if(empty($order_type)) $order_type='asc';
		$data['title']="Dosen | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen > Nonaktif";
		$data['content']="dosen/nonaktif.php";
		$data['dosen']=$this->m_dosen->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('dosen/nonaktif/');
        $config['total_rows']	=$this->m_dosen->jumlahnonaktif();
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
		$data['title']=" Dosen Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen > Cari";
		$data['content']="dosen/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(dosen);
		}
		else{
			$cek=$this->m_dosen->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['dosen']=$cek->result();
				redirect('dosen');
			}
		}
    }
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Dosen Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Dosen > Cari Nonaktif";
		$data['content']="dosen/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(dosen);
		}
		else{
			$cek=$this->m_dosen->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['dosen']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['dosen']=$cek->result();
				redirect('dosen/nonaktif');
			}
		}
    }
	function importdata(){
		 if ($this->input->post('save')) {
			$fileName = $_FILES['import']['name'];
			$config['upload_path'] = './assets/file/';
            $config['file_name'] = $fileName;
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size']        = 10000;
			$this->load->library('upload');
            $this->upload->initialize($config);
			if (!$this->upload->do_upload('import')) {
				$this->session->set_flashdata('m_eror','Data Gagal Di Impor!');
				redirect('dosen/tambah');
			} else {
			  $upload_data = $this->upload->data('import');
			  $this->load->library('Excel_reader');
			  $this->excel_reader->setOutputEncoding('230787');
			  $file = './assets/file/'.$fileName;
			  $this->excel_reader->read($file);
			  error_reporting(E_ALL ^ E_NOTICE);
			  $data = $this->excel_reader->sheets[0];
			  $dataexcel = array();
			  for ($i = 2; $i <= $data['numRows']; $i++) {
				   if ($data['cells'][$i][2] == '') break;
				   $dataexcel[$i - 2]['id_dosen'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['nama_dosen'] = $data['cells'][$i][2];
				   $dataexcel[$i - 2]['tmpt_lahir'] = $data['cells'][$i][3];
				   $dataexcel[$i - 2]['tgl_lahir'] = $data['cells'][$i][4];
				   $dataexcel[$i - 2]['jenis_kelamin'] = $data['cells'][$i][5];
				   $dataexcel[$i - 2]['agama'] = $data['cells'][$i][6];
				   $dataexcel[$i - 2]['pendidikan_akhir'] = $data['cells'][$i][7];
				   $dataexcel[$i - 2]['status_kepegawaian'] = $data['cells'][$i][8];
				   $dataexcel[$i - 2]['status_keanggotaan'] = $data['cells'][$i][9];
				   $dataexcel[$i - 2]['alamat'] = $data['cells'][$i][10];
				   $dataexcel[$i - 2]['username'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['password'] = md5($data['cells'][$i][1]);
			  }
			  for ($a = 2; $a <= $data['numRows']; $a++) {
					if ($data['cells'][$a][2] == '') break;
				   $dataexcel2[$a - 2]['id_dosen'] = $data['cells'][$a][1];
			  }
			  $file = $upload_data['file_name'];
			  $path = './assets/file/' . $file;
			  delete_files($path);
			   $this->load->model('M_dosen');
			  $this->m_dosen->loaddata($dataexcel);
			  $this->m_dosen->loaddata2($dataexcel2);
			}
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
			redirect('dosen');
		}
	}
	function ekspor(){
		$this->load->view('admin/dosen/excel');
	}
}