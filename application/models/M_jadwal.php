<?php
class M_jadwal extends CI_Model{
    private $table="jadwal";
	private $primary="id_jadwal";
    
  
	function kelasambil(){
        $q=$this->db->query("select kelas.id_kelas,kelas.status,dosen.nama_dosen,prodi.nama_prodi,kelas.semester,kelas.ruang,kelas.tahun from kelas,dosen,prodi
							where kelas.dpa=dosen.id_dosen
							and kelas.id_prodi=prodi.id_prodi
							and kelas.status='aktif'");
        return $q;
    }
	function jam_ke(){
        $q=$this->db->query("select * from jam_ke");
        return $q;
    }
	function simpandetail($detail,$id,$id_mk,$id_dosen,$jam,$status){
        $q=$this->db->query("INSERT INTO detail_jadwal (id_detail_jadwal,id_jadwal,id_mk,id_dosen,id_jam_ke,status) VALUES ('$detail','$id','$id_mk','$id_dosen','$jam','$status')");
    }
	function simpan($info){
       $this->db->insert($this->table,$info);
       return $this->db->insert_id();
    }
	function ceki($id_dosen,$jam,$hari,$kelas){
        $q=$this->db->query("select * from detail_jadwal,jadwal,kelas
							where detail_jadwal.id_dosen='$id_dosen'
							and kelas.id_kelas=jadwal.id_kelas
							and jadwal.id_jadwal=detail_jadwal.id_jadwal
							and detail_jadwal.id_jam_ke='$jam'
							and kelas.id_kelas!='$kelas'
							and kelas.status='aktif'
							and jadwal.hari='$hari'
							and detail_jadwal.status='aktif'");
        return $q;
    }
	function jadwal($id_kelas){
        $q=$this->db->query("select * from jadwal 
							where LEFT(id_jadwal,9)='$id_kelas'");
        return $q;
    }
	function detailk($id){
        $q=$this->db->query("select * from kelas,prodi,dosen 
							where kelas.dpa=dosen.id_dosen
							and kelas.id_prodi=prodi.id_prodi
							and kelas.id_kelas='$id'");
        return $q;
    }
	function nama_dosen(){
        $q=$this->db->query("select * from dosen where status_keanggotaan='aktif'");
        return $q;
    }
	function nama_mk(){
        $q=$this->db->query("select * from mata_kuliah where status_mk='aktif'");
        return $q;
    }
	function nama_kelas($id){
        $q=$this->db->query("select * from kelas,prodi 
							where kelas.id_prodi=prodi.id_prodi
							and kelas.id_kelas='$id'");
        return $q;
    }
	function cek($k,$jam,$jadwal){
        $q=$this->db->query(" select * from jadwal,detail_jadwal,jam_ke,dosen,mata_kuliah
							where jadwal.id_jadwal=detail_jadwal.id_jadwal
							and jam_ke.id_jam_ke=detail_jadwal.id_jam_ke
							and detail_jadwal.id_dosen=dosen.id_dosen
							and mata_kuliah.id_mk=detail_jadwal.id_mk
							and jam_ke.id_jam_ke='$jam'
							and LEFT(jadwal.id_jadwal,10)='$k' 
							and RIGHT(jadwal.id_jadwal,3)='$jadwal'
							and detail_jadwal.status='aktif'");
	return $q;
    }
	function cekkosong($k,$jam,$jadwal){
        $q=$this->db->query(" select * from jadwal,detail_jadwal,jam_ke
							where jadwal.id_jadwal=detail_jadwal.id_jadwal
							and jam_ke.id_jam_ke=detail_jadwal.id_jam_ke
							and jam_ke.id_jam_ke='$jam'
							and LEFT(jadwal.id_jadwal,10)='$k' 
							and RIGHT(jadwal.id_jadwal,3)='$jadwal'
							and detail_jadwal.status='kosong'");
		return $q;
    }
}