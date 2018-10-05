<?php
class Mahasiswa extends CI_Controller{
    private $limit=5;
    
	function __construct(){
        parent::__construct();
		$this->load->library(array('pagination','form_validation','upload'));
		$this->load->model('m_login');
		$this->load->model('m_mahasiswa');
		if(!$this->session->userdata('username')){
            redirect('home');
		}
    }
    function index($offset=0,$order_column='nim',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='nim';
        if(empty($order_type)) $order_type='asc';
		
		include('menu_akses.php'); //hak akses
		$data['title']="Mahasiswa | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa";
		$data['content']="mahasiswa/index.php";
		$data['mahasiswa']=$this->m_mahasiswa->ambil_data($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('mahasiswa/index/');
        $config['total_rows']	=$this->m_mahasiswa->jumlahaktif();
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
		$data['title']="Mahasiswa | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa > Tambah";		
		$data['content']="mahasiswa/tambah.php";
		$this->load->view('admin/template',$data);
	}
	function tambah_proses(){
		$id=$this->input->post('nim'); 	// mendapatkan input dari kode
		$nama=$this->input->post('nama_mahasiswa'); 	// mendapatkan input dari kode
		$jenis_kelamin=$this->input->post('jenis_kelamin'); 	// mendapatkan input dari kode
		$tempat_lahir=$this->input->post('tempat_lahir'); 	// mendapatkan input dari kode
		$tgl_lahir=$this->input->post('tgl_lahir'); 	// mendapatkan input dari kode
		$agama=$this->input->post('agama'); 	// mendapatkan input dari kode
		$alamat_asli=$this->input->post('alamat_asli'); 	// mendapatkan input dari kode
		$alamat_tinggal=$this->input->post('alamat_tinggal'); 	// mendapatkan input dari kode
		$phone=$this->input->post('phone'); 	// mendapatkan input dari kode
		$sekolah_asal=$this->input->post('sekolah_asal'); 	// mendapatkan input dari kode
		$thn_masuk=$this->input->post('tahun_masuk'); 	// mendapatkan input dari kode
		$ibu=$this->input->post('nama_ibu'); 	// mendapatkan input dari kode
		$bapak=$this->input->post('nama_bapak'); 	// mendapatkan input dari kode 	
		$akses='akses001'; 	 	
		$cek=$this->m_mahasiswa->cek($id); 			// cek kode di database
		if($cek->num_rows()>0){ 				// jika kode sudah ada, maka tampilkan pesan
			$this->session->set_flashdata('m_eror','Mahasiswa <b>'.$id." - ".$nama. '</b> sudah ada!');
			redirect('mahasiswa/tambah');
		}else { 								// jika kode buku belum ada, maka simpan
			$info=array(
				'nim'=>$id,
				'nama_mahasiswa'=>$nama,
				'jenis_kelamin'=>$jenis_kelamin,
				'tempat_lahir'=>$tempat_lahir,
				'tgl_lahir'=>$tgl_lahir,
				'agama'=>$agama,
				'alamat_asli'=>$alamat_asli,
				'alamat_tinggal'=>$alamat_tinggal,
				'phone'=>$phone,
				'sekolah_asal'=>$sekolah_asal,
				'tahun_masuk'=>$thn_masuk,
				'nama_ibu'=>$ibu,
				'nama_bapak'=>$bapak,
				'username'=>$id,
				'password'=>md5($id),
			);
			$this->m_mahasiswa->simpan($info);
			$this->m_mahasiswa->simakses($id,$akses);
			$this->session->set_flashdata('m_sukses','Mahasiswa <b>'.$id." - ".$nama. '</b> berhasil ditambahkan!');
			redirect('mahasiswa');
		}
	}
	function importdata(){
		 if ($this->input->post('save')) {
			$fileNames = $_FILES['import']['name'];
			$config['upload_path'] = './assets/file/';
            $config['file_name'] = $fileNames;
            $config['allowed_types'] = 'xls|xlsx';
            $config['max_size']        = 10000;
			$this->load->library('upload');
            $this->upload->initialize($config);
			if (!$this->upload->do_upload('import')) {
				$this->session->set_flashdata('m_eror','Data Gagal Di Impor!');
				redirect('mahasiswa/tambah');
			} else {
			  $upload_data = $this->upload->data('import');
			  $this->load->library('Excel_reader');
			  $this->excel_reader->setOutputEncoding('230787');
			  $files = './assets/file/'.$fileNames;
			  $this->excel_reader->read($files);
			  error_reporting(E_ALL ^ E_NOTICE);
			  $data = $this->excel_reader->sheets[0];
			  $dataexcel = array();
			  for ($i = 2; $i <= $data['numRows']; $i++) {
				   if ($data['cells'][$i][2] == '') break;
				   $dataexcel[$i - 2]['nim'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['nama_mahasiswa'] = $data['cells'][$i][2];
				   $dataexcel[$i - 2]['jenis_kelamin'] = $data['cells'][$i][3];
				   $dataexcel[$i - 2]['tempat_lahir'] = $data['cells'][$i][4];
				   $dataexcel[$i - 2]['tgl_lahir'] = $data['cells'][$i][5];
				   $dataexcel[$i - 2]['agama'] = $data['cells'][$i][6];
				   $dataexcel[$i - 2]['alamat_asli'] = $data['cells'][$i][7];
				   $dataexcel[$i - 2]['alamat_tinggal'] = $data['cells'][$i][8];
				   $dataexcel[$i - 2]['phone'] = $data['cells'][$i][9];
				   $dataexcel[$i - 2]['sekolah_asal'] = $data['cells'][$i][10];
				   $dataexcel[$i - 2]['tahun_masuk'] = $data['cells'][$i][11];
				   $dataexcel[$i - 2]['status'] = $data['cells'][$i][12];
				   $dataexcel[$i - 2]['nama_ibu'] = $data['cells'][$i][13];
				   $dataexcel[$i - 2]['nama_bapak'] = $data['cells'][$i][14];
				   $dataexcel[$i - 2]['username'] = $data['cells'][$i][1];
				   $dataexcel[$i - 2]['password'] = md5($data['cells'][$i][1]);
			  }
			  for ($a = 2; $a <= $data['numRows']; $a++) {
					if ($data['cells'][$a][2] == '') break;
				   $dataexcel2[$a - 2]['nim'] = $data['cells'][$a][1];
			  }
			  $files = $upload_data['file_name'];
			  $path = './assets/file/'.$files;
			  delete_files($path);
			  $this->load->model('M_mahasiswa');
			  $this->m_mahasiswa->loaddata($dataexcel);
			}
			$this->session->set_flashdata('m_sukses','Data Berhasil Di Impor!');
			redirect('mahasiswa');
		}
	}
	function edit($nim){
		include('menu_akses.php'); //hak akses
		$data['title']	="Edit Mahasiswa"; 		//judul
		$data['judul']="MASTER DATA > Mahasiswa > Edit";	
        $data['content']="mahasiswa/edit.php"; 	//konten
        $data['mahasiswa']	=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}	
	function edit_proses($nimkirim){
		$info=array(
			'nim'=>$nimkirim,
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'agama'=>$this->input->post('agama'),
			'alamat_asli'=>$this->input->post('alamat_asli'),
			'alamat_tinggal'=>$this->input->post('alamat_tinggal'),
			'phone'=>$this->input->post('phone'),
			'sekolah_asal'=>$this->input->post('sekolah_asal'),
			'tahun_masuk'=>$this->input->post('tahun_masuk'),
			'nama_ibu'=>$this->input->post('nama_ibu'),
			'nama_bapak'=>$this->input->post('nama_bapak'),
			'status'=>$this->input->post('status')
			
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Data Mahasiswa sudah berhasil diedit!');
		redirect('mahasiswa');
	}
	function edit_proses2($nimkirim){
		$info=array(
			'nim'=>$nimkirim,
			'nama_mahasiswa'=>$this->input->post('nama_mahasiswa'),
			'jenis_kelamin'=>$this->input->post('jenis_kelamin'),
			'tempat_lahir'=>$this->input->post('tempat_lahir'),
			'tgl_lahir'=>$this->input->post('tgl_lahir'),
			'agama'=>$this->input->post('agama'),
			'alamat_asli'=>$this->input->post('alamat_asli'),
			'alamat_tinggal'=>$this->input->post('alamat_tinggal'),
			'phone'=>$this->input->post('phone'),
			'sekolah_asal'=>$this->input->post('sekolah_asal'),
			'nama_ibu'=>$this->input->post('nama_ibu'),
			'nama_bapak'=>$this->input->post('nama_bapak')			
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Data Mahasiswa sudah berhasil diedit!');
		redirect('mahasiswa/detail_profil/'.$nimkirim);
	}
	function editpass($nimkirim){
		$info=array(
			'password'=>md5($this->input->post('password'))
		);
		$this->m_mahasiswa->update($info, $nimkirim);
		$this->session->set_flashdata('m_sukses','Password <b>'.$nimkirim. '</b> berhasil diedit!');
		redirect('mahasiswa/detail_profil/'.$nimkirim);
	}
	function hapus($nim){
		include('menu_akses.php'); //hak akses
		$data['title']="Hapus Mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Hapus";//judul
        $data['content']="mahasiswa/hapus.php"; //konten
        $data['mahasiswa']=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function hapus_proses($nimkirim){
		$status='nonaktif';
		$info=array(
			'nim'=>$nimkirim,
			'status'=>$status,
		);
        $this->m_mahasiswa->update_hapus($info,$nimkirim);
		$this->session->set_flashdata('m_sukses','Data Mahasiswa sudah berhasil dinonaktifkan!');
		redirect('mahasiswa');
    }
	function detail($nim){
		include('menu_akses.php'); //hak akses
		$data['title']		="Detail Mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Detail"; //judul
        $data['content']	="mahasiswa/detail.php"; //konten
        $data['mahasiswa']		=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detail_profil($nim){
		include('menu_akses.php'); //hak akses
		$data['title']		="Detail | Polling AKN Bojonegoro";
		$data['judul']="Profil > Detail"; //judul
        $data['content']	="mahasiswa/detail_profil.php"; //konten
        $data['mahasiswa']		=$this->m_mahasiswa->ceki($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function detailnon($nim){
		include('menu_akses.php'); //hak akses
		$data['title']="Detail Mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Detail Nonaktif"; //judul
        $data['content']="mahasiswa/detailnon.php"; //konten
        $data['mahasiswa']=$this->m_mahasiswa->cekn($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan($nim){
		include('menu_akses.php'); //hak akses
		$data['title']="Aktifkan Mahasiswa";
		$data['judul']="MASTER DATA > Mahasiswa > Aktifkan";//judul
        $data['content']="mahasiswa/aktifkan.php"; //konten
        $data['mahasiswa']=$this->m_mahasiswa->cekaktif($nim)->row_array(); //ambil data
		$this->load->view('admin/template',$data);
	}
	function aktifkan_proses($nimkirim){
		$status='aktif';
		$info=array(
			'nim'=>$nimkirim,
			'status'=>$status,
		);
        $this->m_mahasiswa->update_aktif($info,$nimkirim);
		$this->session->set_flashdata('m_sukses','Data Mahasiswa sudah berhasil diaktifkan!');
		redirect('mahasiswa/nonaktif');
    }
	function nonaktif($offset=0,$order_column='nim',$order_type='asc'){
        if(empty($offset)) $offset=0;
        if(empty($order_column)) $order_column='nim';
        if(empty($order_type)) $order_type='asc';
		include('menu_akses.php'); //hak akses
		$data['title']="Mahasiswa | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa Nonaktif";
		$data['content']="mahasiswa/nonaktif.php";
		$data['mahasiswa']=$this->m_mahasiswa->ambil_non($this->limit,$offset,$order_column,$order_type)->result();
		//pengalamatan
		$config['base_url']		=site_url('mahasiswa/nonaktif/');
        $config['total_rows']	=$this->m_mahasiswa->jumlahnonaktif();
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
		$data['title']=" Mahasiswa Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa Cari";
		$data['content']="mahasiswa/cari.php";
		$cari=$this->input->post('cari');
		if ($cari==null){
			redirect(mahasiswa);
		}
		else{
			$cek=$this->m_mahasiswa->cari($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['mahasiswa']=$cek->result();//mahasiswa di panggil view
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['mahasiswa']=$cek->result();
				redirect('mahasiswa');
			}
		}
    }
	function carinon(){
		include('menu_akses.php'); //hak akses
		$data['title']=" Mahasiswa Cari | Polling AKN Bojonegoro";
		$data['judul']="MASTER DATA > Mahasiswa > Cari Nonaktif";
		$data['content']="mahasiswa/carinon.php";
		$cari=$this->input->post('carinon');
		if ($cari==null){
			redirect(mahasiswa);
		}
		else{
			$cek=$this->m_mahasiswa->carinon($cari);
			$hasil=$cek->num_rows();
			if($hasil>0){
				$data['mahasiswa']=$cek->result();
				$data['ketemu']='<b>'.$hasil.'</b>data ditemukan berdasarkan <b>'.$cari.'</b>';
				$data['jumlah']=$hasil;
				$this->load->view('admin/template',$data);
			}else{
				$this->session->set_flashdata('m_eror','Pencarian data tidak ditemukan!');
				$data['mahasiswa']=$cek->result();
				redirect('mahasiswa/nonaktif');
			}
		}
    }
}