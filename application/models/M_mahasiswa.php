<?php
class M_mahasiswa extends CI_Model{
    private $table="mahasiswa";
	private $primary="nim";
	private $state="status";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from mahasiswa
							where status='aktif' ORDER BY nim ASC LIMIT $limit OFFSET $offset ");
        return $q;
    }
    function jumlah_mhs(){
         $q=$this->db->query(" select distinct mahasiswa.nim as jumlah_mhs from mahasiswa where status='aktif' ");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function ambil_non($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query(" select * from mahasiswa
							where status='nonaktif' ORDER BY nim ASC LIMIT $limit OFFSET $offset ");
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
	function cek_vali($date, $username){
        $q=$this->db->query("select * from validasi_maha
							 where date='$date'
							 and nim='$username'");
        return $q;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
    function simakses($user,$akses){
       $this->db->query("INSERT INTO hak_akses_user (id_user,id_akses) VALUES ('$user','$akses')");
    }
	function ceki($nim){
        $this->db->where($this->primary,$nim);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function sim_validasi($id_date,$date,$nim){
       $this->db->query("INSERT INTO validasi_maha (id_validasi,date,nim) VALUES ('$id_date','$date','$nim')");
    }
	function cekn($nim){
        $this->db->where($this->primary,$nim);
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
	function cekaktif($nim){
        $this->db->where($this->primary,$nim);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
    function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'nim'=>$dataarray[$i]['nim'],
                'nama_mahasiswa'=>$dataarray[$i]['nama_mahasiswa'],
                'jenis_kelamin'=>$dataarray[$i]['jenis_kelamin'],
                'tempat_lahir'=>$dataarray[$i]['tempat_lahir'],
                'tgl_lahir'=>$dataarray[$i]['tgl_lahir'],
                'agama'=>$dataarray[$i]['agama'],
                'alamat_asli'=>$dataarray[$i]['alamat_asli'],
                'alamat_tinggal'=>$dataarray[$i]['alamat_tinggal'],
                'phone'=>$dataarray[$i]['phone'],
                'sekolah_asal'=>$dataarray[$i]['sekolah_asal'],
                'tahun_masuk'=>$dataarray[$i]['tahun_masuk'],
                'status'=>$dataarray[$i]['status'],
                'nama_ibu'=>$dataarray[$i]['nama_ibu'],
                'nama_bapak'=>$dataarray[$i]['nama_bapak'],
                'username'=>$dataarray[$i]['username'],
                'password'=>$dataarray[$i]['password']
            );
            $data2 = array(
                'id_user' => $dataarray[$i]['nim'],
                'id_akses' => 'akses001'
            );
            $this->db->insert('hak_akses_user', $data2);
            $cek=$this->db->where('nim', $this->input->post('nim'));  
            if($cek){
                $this->db->insert($this->table, $data);
            }
        }
    }
	function cari($cari){
        $q=$this->db->query("
							select * from mahasiswa where nama_mahasiswa LIKE '%$cari%' and status='aktif'
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from mahasiswa where nama_mahasiswa LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
}