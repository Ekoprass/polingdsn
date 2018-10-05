<?php
class M_jamke extends CI_Model{
    private $table="jam_ke";
	private $primary="id_jam_ke";
    
    function ambil_data(){
        $q=$this->db->query("
							select * from jam_ke
							");
        return $q;
    }
	function cek($id_jam_ke){
        $this->db->where($this->primary,$id_jam_ke);
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
							select * from jam_ke where nama LIKE '%$cari%'
							");
        return $q;
    }
}
