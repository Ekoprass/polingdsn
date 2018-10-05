<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller {

	function __construct(){
        parent::__construct();
		$this->load->helper('back'); // helper yg di atas
		backButtonHandle();
		$this->load->helper(array('form', 'url'));
        $this->load->model('m_login');
     
    }
	function tambah($kelas, $id){
		$id=$id;
		$semua=$this->m_login->semua()->result();
		$no=0; foreach($semua as $ak): $no++; 
		$semua_ak=$ak->id_hak_akses;
		$nama_akses=$ak->nama_akses;
		$status='nonaktif';
			$id_status_akses=$id.$nama_akses;
			$cek=$this->m_login->jumlah_akses($id_status_akses)->row_array();
			$info=array(
				'id_status_akses'=>$id.$nama_akses,
				'id_user'=>$id,
				'id_akses'=>$semua_ak,
				'status_akses'=>$status,
			);
			if($cek<1){
				$this->m_login->simpan_akses($info);
			}
			endforeach;
			$this->session->set_flashdata('m_sukses','<b>'.$kelas.' - ' .$id.'</b> berhasil ditambahkan!');
			redirect($kelas.'/edit/'.$id);
		}
	function tambah_user_maha($id){
		$id=$id;
		$semua=$this->m_login->semua()->result();
		$no=0; foreach($semua as $ak): $no++; 
		$semua_ak='akses001';
		$nama_akses='mahasiswa';
		$status='aktif';
			$id_status_akses=$id.$nama_akses;
			$cek=$this->m_login->jumlah_akses($id_status_akses)->row_array();
			$info=array(
				'id_status_akses'=>$id.$nama_akses,
				'id_user'=>$id,
				'id_akses'=>$semua_ak,
				'status_akses'=>$status,
			);
			if($cek<1){
				$this->m_login->simpan_akses($info);
			}
			endforeach;
			$this->session->set_flashdata('m_sukses','<b>'.$kelas.' - ' .$id.'</b> berhasil ditambahkan!');
			redirect('dashboard');
		}
	function aktifkan($kelas, $id, $j){
		$status_akses='aktif';
		$info=array(
			'id_status_akses'=>$j,
			'status_akses'=>$status_akses,
		);
        $this->m_login->update_akses($info,$j);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$j. '</b> berhasil diaktifkan!');
		redirect($kelas.'/edit/'.$id);
    }
	function nonaktif($kelas, $id, $j){
		$status_akses='nonaktif';
		$info=array(
			'id_status_akses'=>$j,
			'status_akses'=>$status_akses,
		);
        $this->m_login->update_hapus_akses($info, $j);
		$this->session->set_flashdata('m_sukses','Data Tata Usaha <b>'.$j. '</b> berhasil dinonaktifkan!');
		redirect($kelas.'/edit/'.$id);
    }
}
