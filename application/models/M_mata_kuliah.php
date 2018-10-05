<?php
class M_mata_kuliah extends CI_Model{
    private $table="mata_kuliah";
	private $primary="id_mk";
    
    function ambil_data(){
        $q=$this->db->query("
							select * from mata_kuliah where status_mk='aktif'
							");
        return $q;
    }
    function jumlahaktif(){
        $this->db->where($this->state, 'aktif');
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }
	function cek($id_mk){
        $this->db->where($this->primary,$id_mk);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
    function ceki($id_mk){
        $this->db->where($this->primary,$id_mk);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_mk){
        $this->db->where($this->primary,$id_mk);
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
	function cekaktif($id_mk){
        $this->db->where($this->primary,$id_mk);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	 function ambil_non(){
        $q=$this->db->query("
							select * from mata_kuliah where status_mk='nonaktif'
							");
        return $q;
    }
	function cari($cari){
        $q=$this->db->query("
							select * from mata_kuliah where nama_mk LIKE '%$cari%' and status_mk='aktif'
							");
        return $q;
    }
    function carinon($cari){
        $q=$this->db->query("
                            select * from mata_kuliah where nama_mk LIKE '%$cari%' and status_mk='nonaktif'
                            ");
        return $q;
    }
    
}
