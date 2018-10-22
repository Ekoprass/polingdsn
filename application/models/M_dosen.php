<?php
class M_dosen extends CI_Model{
    private $table="dosen";
	private $primary="id_dosen";
	private $state="status_keanggotaan";
	public $order = 'DESC';
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from dosen
                            where status_keanggotaan='aktif' ORDER BY id_dosen DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
    function mek_data(){
        $q=$this->db->query(" select * from dosen
							where status_keanggotaan='aktif' ");
        return $q;
    }
    function jumlah_dosen(){
         $q=$this->db->query(" select distinct dosen.id_dosen as jumlah_dosen from dosen where status_keanggotaan='aktif' ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from dosen
							where status_keanggotaan='nonaktif' ORDER BY id_dosen DESC LIMIT $limit OFFSET $offset ");
        return $q;
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cek($id_dosen){
        $this->db->where($this->primary,$id_dosen);
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
	function ceki($id_dosen){
        $this->db->where($this->primary,$id_dosen);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_dosen){
        $this->db->where($this->primary,$id_dosen);
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
	function cekaktif($id_dosen){
        $this->db->where($this->primary,$id_dosen);
        $query=$this->db->get($this->table);        
        return $query;
    }
		function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($cari){
        $q=$this->db->query("
							select * from dosen where nama_dosen LIKE '%$cari%' and status_keanggotaan='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from dosen where nama_dosen LIKE '%$cari%' and status_keanggotaan='nonaktif'
							");
        return $q;
    }
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_dosen' => $dataarray[$i]['id_dosen'],
                'nama_dosen' => $dataarray[$i]['nama_dosen'],
                'tmpt_lahir' => $dataarray[$i]['tmpt_lahir'],
                'tgl_lahir' => $dataarray[$i]['tgl_lahir'],
                'jenis_kelamin' => $dataarray[$i]['jenis_kelamin'],
                'agama' => $dataarray[$i]['agama'],
                'pendidikan_akhir' => $dataarray[$i]['pendidikan_akhir'],
                'status_kepegawaian' => $dataarray[$i]['status_kepegawaian'],
                'status_keanggotaan' => $dataarray[$i]['status_keanggotaan'],
                'alamat' => $dataarray[$i]['alamat'],
                'username' => $dataarray[$i]['username'],
                'password' => $dataarray[$i]['password']
            );
            $cek=$this->db->where('id_dosen', $this->input->post('id_dosen'));  
            if($cek){
                $this->db->insert($this->table, $data);
            }
        }
    }

    function dosen_mk($id_dosen)
    {
         $q=$this->db->query("select * from dosen_mk where id_dosen ='$id_dosen'");
         return $q;
    }
    function jumlah_mhs($id_kelas, $id_dosen)
    {
         $q=$this->db->query("select count(nim) as jumlah from jumlah_mhs where id_kelas='$id_kelas' and id_dosen='$id_dosen'");
         return $q;
    }
     function jumlah_mhs_tahun($id_kelas, $id_dosen)
    {
         $q=$this->db->query("select count(nim) jumlah from jumlah_mhs where substring(id_kelas,1,6)='$id_kelas' and id_dosen='$id_dosen'");
         return $q;
    }
    
}