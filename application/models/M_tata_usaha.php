<?php
class M_tata_usaha extends CI_Model{
    private $table="tata_usaha";
	private $primary="id_tu";
	private $state="status_keanggotaan";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from tata_usaha 
							where status_keanggotaan='aktif' ORDER BY id_tu DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from tata_usaha 
							where status_keanggotaan='nonaktif' ORDER BY id_tu DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
    function jumlah_tu(){
         $q=$this->db->query(" select distinct tata_usaha.id_tu as jumlah_tu from tata_usaha where status_keanggotaan='aktif' ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cek($kode){
        $this->db->where($this->primary,$kode);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekaktif($id){
        $this->db->where($this->primary,$id);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
    function simakses($user,$akses){
       $this->db->query("INSERT INTO hak_akses_user (id_user,id_akses) VALUES ('$user','$akses')");
    }
	function ceki($id){
        $this->db->where($this->primary,$id);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function update_hapus($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from tata_usaha where nama_tu LIKE '%$cari%' and status_keanggotaan='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from tata_usaha where nama_tu LIKE '%$cari%' and status_keanggotaan='nonaktif'
							");
        return $q;
    }
}