<?php
class M_prodi extends CI_Model{
    private $table="prodi";
	private $primary="id_prodi";
	private $state="status";
    
     function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from prodi
							where status='aktif' ORDER BY id_prodi DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from prodi
							where status='nonaktif' ORDER BY id_prodi DESC LIMIT $limit OFFSET $offset ");
        return $q;
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
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
	function ceki($id_prodi){
        $this->db->where($this->primary,$id_prodi);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_prodi){
        $this->db->where($this->primary,$id_prodi);
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
	function cekaktif($id_prodi){
        $this->db->where($this->primary,$id_prodi);
        $query=$this->db->get($this->table);        
        return $query;
    }
		function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from prodi where nama_prodi LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function cariid($cari){
        $q=$this->db->query("
							select * from prodi where id_prodi LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from prodi where nama_prodi LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
}