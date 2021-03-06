<?php
class M_kriteria_nilai extends CI_Model{
    private $table="kriteria_nilai";
	private $primary="id_kriteria_nilai";
	private $state="status";
	public $order = 'DESC';
	
    function ambil_data(){
        $q=$this->db->query(" select * from kriteria_nilai 
							where status='aktif' ORDER BY id_kriteria_nilai DESC ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function ambil_datanon(){
        $q=$this->db->query(" select * from kriteria_nilai 
							where status='nonaktif' ORDER BY id_kriteria_nilai DESC ");
        return $q;
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	public function getnomor()
    {
        $q = $this->db->query("select MAX(id_kriteria_nilai) as kd_max from kriteria_nilai");
        $kd = "";
        if($q->num_rows()>0)
        {
            foreach($q->result() as $k)
            {
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%03s", $tmp);
            }
        }
        else
        {
            $kd = "001";
        }
        return $kd;
    }
	function cek($id_kriteria_nilai){
        $this->db->where($this->primary,$id_kriteria_nilai);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
	function ceki($id_kriteria_nilai){
        $this->db->where($this->primary,$id_kriteria_nilai);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_kriteria_nilai){
        $this->db->where($this->primary,$id_kriteria_nilai);
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
	function cekaktif($id_kriteria_nilai){
        $this->db->where($this->primary,$id_kriteria_nilai);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from kriteria_nilai  where id_kriteria_nilai LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from kriteria_nilai  where id_kriteria_nilai LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_kriteria_nilai' => $dataarray[$i]['id_kriteria_nilai'],
                'nilai' => $dataarray[$i]['nama'],
                'keterangan' => $dataarray[$i]['keterangan'],
                'status' => $dataarray[$i]['status'],                
            );
			$this->db->where('id_kriteria_nilai', $this->input->post('id_kriteria_nilai'));            
            if ($cek) {
                $this->db->insert($this->table, $data);
            }
		}
	}
}