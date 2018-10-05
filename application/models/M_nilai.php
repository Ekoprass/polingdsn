<?php
class M_kriteria_nilai extends CI_Model{
    private $table="nilai";
	private $primary="id_nilai";
	private $state="status";
	public $order = 'DESC';
	
    function ambil_data(){
        $q=$this->db->query(" select * from nilai 
							where status='aktif' ORDER BY id_nilai DESC ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function ambil_datanon(){
        $q=$this->db->query(" select * from nilai
							where status='nonaktif' ORDER BY id_nilai DESC ");
        return $q;
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cek($id_nilai){
        $this->db->where($this->primary,$id_nilai);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
	function ceki($id_nilai){
        $this->db->where($this->primary,$id_nilai);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_nilai){
        $this->db->where($this->primary,$id_nilai);
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
	function cekaktif($id_nilai){
        $this->db->where($this->primary,$id_nilai);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from nilai where id_nilai LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from nilai where id_nilai LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_nilai' => $dataarray[$i]['id_nilai'],
                'nilai' => $dataarray[$i]['nama'],
                'keterangan' => $dataarray[$i]['keterangan'],
                'status' => $dataarray[$i]['status'],                
            );
			$this->db->where('id_nilai', $this->input->post('id_nilai'));            
            if ($cek) {
                $this->db->insert($this->table, $data);
            }
		}
	}
}