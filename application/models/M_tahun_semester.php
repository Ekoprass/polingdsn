<?php
class M_tahun_semester extends CI_Model{
    private $table="tahun_semester";
	private $primary="id_tahun_semester";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query("select * from tahun_semester ORDER BY id_tahun_semester ASC LIMIT $limit OFFSET $offset");
        return $q;
    }
	 function jumlah_soal($id_tahun){
        $this->db->from('tahun_semester_soal');
		$this->db->where('tahun_semester_soal.id_tahun_semester', $id_tahun);
		$q=$this->db->count_all_results();
		return $q;
    }
	function tahun_semester($id){
        $q=$this->db->query(" select * from tahun_semester where id_tahun_semester='$id'");
        return $q;
    }
	function semua($id){
        $q=$this->db->query(" select * from tahun_semester,tahun_semester_soal,pertanyaan
				where tahun_semester.id_tahun_semester=tahun_semester_soal.id_tahun_semester
				and tahun_semester_soal.id_soal=pertanyaan.id_pertanyaan
				and tahun_semester_soal.id_tahun_semester=$id
				");
        return $q;
    }
	function semua_pertanyaan(){
        $q=$this->db->query(" select * from pertanyaan where status='aktif'");
        return $q;
    }
	function tambah_soal($pertanyaan,$semester){
         $q=$this->db->query("insert into tahun_semester_soal(id_tahun_semester,id_soal) values('$semester','$pertanyaan')");
        return $q;
    }
	function cekid($id_tahun_semester){
        $this->db->where($this->primary,$id_tahun_semester);
        $query=$this->db->get($this->table);        
        return $query;
    }
    function cekid_soal($id_tahun_semester,$id_soal){
        $q=$this->db->query(" select * from tahun_semester_soal where id_tahun_semester='$id_tahun_semester' and id_soal='$id_soal'");
        return $q;
    }
	function simpan($info){
		$this->db->insert($this->table,$info); //samadengan perintah insert into - untuk memasukkan data ke database
		return $this->db->get($this->table);
	}
}