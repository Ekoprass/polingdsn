<?php
class M_kelas extends CI_Model{
    private $table="kelas";
    private $tables="kelas_mahasiswa";
	private $primary="id_kelas";
	private $state="status";
    
    function ambil_data($limit,$offset,$order_column,$order_type='asc'){
        $q=$this->db->query("
							select * from kelas,prodi,dosen
							where kelas.id_prodi=prodi.id_prodi
							and kelas.dpa=dosen.id_dosen
							and kelas.status='aktif' ORDER BY id_kelas ASC LIMIT $limit OFFSET $offset
							");
        return $q;
    }
    function ambil_data_non(){
        $q=$this->db->query("
							select * from kelas,prodi,dosen
							where kelas.id_prodi=prodi.id_prodi
							and kelas.dpa=dosen.id_dosen
							and kelas.status='nonaktif'
							");
        return $q;
    }
	function doskel(){
        $q=$this->db->query("
							select * from dosen
							");
        return $q;
    }
	function ambilkelas($id_kelas){
        $q=$this->db->query("
							select * from kelas,dosen,prodi
							where kelas.id_kelas='$id_kelas'
							and kelas.id_prodi=prodi.id_prodi
							and kelas.dpa=dosen.id_dosen
							");
        return $q;
    }
	function npro(){
        $q=$this->db->query("
							select * from prodi where status='aktif'
							");
        return $q;
    }
	function update($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function jumlahakun($id_tahun){
        $this->db->from('thn_semester_akn');
		$this->db->where('thn_semester_akn.id_tahun_semester', $id_tahun);
		$q=$this->db->count_all_results();
		return $q;
    }
	function semuaa($id){
        $q=$this->db->query(" select * from tahun_semester,akun,thn_semester_akn
							where akun.id_akun=thn_semester_akn.id_akun
							and tahun_semester.id_tahun_semester=thn_semester_akn.id_tahun_semester
							and tahun_semester.id_tahun_semester='$id'");
        return $q;
    }
	function semua_akunt(){
        $q=$this->db->query(" select * from akun");
        return $q;
    }
	function jumlah_kelas(){
		$this->db->where($this->state,'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	 function dosen(){
        $q=$this->db->query(" select * from dosen where status_keanggotaan='aktif'");
        return $q;
    }
	 function prodi(){
        $q=$this->db->query(" select * from prodi where status='aktif'");
        return $q;
    }
	function cek($id){
        $this->db->where($this->primary,$id);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekgu($tahun,$dpa){
       $q=$this->db->query("select * from kelas
							where kelas.tahun='$tahun'
							and kelas.dpa='$dpa'
							and status='aktif'");
	return $q;
    }
	function cektah($tahun_semester){
       $q=$this->db->query("select * from tahun_semester
							where id_tahun_semester='$tahun_semester'");
	return $q;
    }	
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }	
	function simpanth($tahun_semester,$tahun,$semester,$gelombang){
        $this->db->query("INSERT INTO tahun_semester (id_tahun_semester,tahun,semester,gelombang) VALUES ('$tahun_semester','$tahun','$semester','$gelombang')");
    }
	function tambahakun($tahun_semester,$akun){
        $this->db->query("INSERT INTO thn_semester_akn (id_tahun_semester,id_akun) VALUES ('$tahun_semester','$akun')");
    }
	function jumlah_siswa($id_kelas){
		$this->db->from('kelas_mahasiswa');
		$this->db->where('kelas_mahasiswa.id_kelas', $id_kelas);
		$q=$this->db->count_all_results();
		return $q;
	}
	function detailkelas($id_kelas){
		$q=$this->db->query("select * from kelas,dosen,prodi
						where kelas.dpa=dosen.id_dosen
						and kelas.id_kelas='$id_kelas'
						and prodi.id_prodi=kelas.id_prodi");
	
		return $q;
	}
	function all(){
        $q=$this->db->query("select * from mahasiswa ");
		return $q;
    }
	function siswa_kelas($id_kelas){
        $q=$this->db->query("select * from mahasiswa,kelas,kelas_mahasiswa
						where mahasiswa.nim=kelas_mahasiswa.nim
						and kelas.id_kelas=kelas_mahasiswa.id_kelas
						and kelas.id_kelas='$id_kelas'");
		return $q;
    }
	function cekid($nis,$tahun){
        $q=$this->db->query("select * from kelas_mahasiswa
							where kelas_mahasiswa.nim='$nis' and left(kelas_mahasiswa.id_kelas,4)='$tahun'");
		return $q;
    }
	function kelas($id_kelas, $nis){
        $q=$this->db->query("INSERT INTO kelas_mahasiswa (id_kelas,nim) VALUES ('$id_kelas','$nis')");
		return $q;
    }
	function hapus($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function aktif($info, $id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }	
	function cari($cari){
        $q=$this->db->query(" select * from kelas,dosen,prodi
								where kelas.dpa=dosen.id_dosen
								and kelas.id_prodi=prodi.id_prodi
								and kelas.id_kelas LIKE '%$cari%' and kelas.status='aktif' ");
        return $q;
    }
	function carinama($cari){
        $q=$this->db->query(" select * from prodi,kelas,dosen
							where prodi.nama_prodi LIKE '%$cari%' 
							and prodi.id_prodi=kelas.id_prodi
							and dosen.id_dosen=kelas.dpa
							and prodi.status='aktif' ");
        return $q;
    }
	function ceknaik($id){
        $q=$this->db->query(" select * from kelas 
							where kelas.id_kelas='$id'");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("  select * from kelas,dosen,prodi
								where kelas.dpa=dosen.id_dosen
								and kelas.id_prodi=prodi.id_prodi
								and kelas.id_kelas LIKE '%$cari%' and kelas.status='nonaktif' ");
        return $q;
    }
	function carinamanon($cari){
        $q=$this->db->query(" select * from prodi,kelas,dosen
							where prodi.nama_prodi LIKE '%$cari%' 
							and prodi.id_prodi=kelas.id_prodi
							and dosen.id_dosen=kelas.dpa
							and prodi.status='nonaktif'");
        return $q;
    }
	function tentu($id){
        $q=$this->db->query(" select * from kelas where id_kelas='$id'");
        return $q;
    }
	function jumlah_kelas_non(){
		$this->db->where($this->state,'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function naikkelas($kelas,$info,$data,$id) {
		// $action = $this->input->post('action');
		// if ($action == "naik") {
			$naik = $this->input->post('msg');
			for ($i=0; $i < count($naik) ; $i++) {;
			$q=$this->db->query("INSERT INTO kelas_mahasiswa (id_kelas,nim) VALUES ('$kelas','$naik[$i]')");
			 $this->db->where($this->primary, $id);
			 $this->db->update($this->table, $data);
			}
		// }
	}
}