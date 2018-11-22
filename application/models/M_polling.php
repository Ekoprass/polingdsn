<?php
class M_polling extends CI_Model{
    private $table="polling";
	private $primary="id_polling";
	private $state="status";
	public $order = 'DESC';
	
    function ambil_data($username){
        $q=$this->db->query(" select * from kelas,kelas_mahasiswa,mahasiswa
							where kelas.id_kelas=kelas_mahasiswa.id_kelas and mahasiswa.nim=kelas_mahasiswa.nim
							and kelas_mahasiswa.nim='$username'");
        return $q;
    }
    function jumlah_nilai($id){
        $q=$this->db->query(" select * from kriteria_nilai where id_kriteria_nilai='$id'");
        return $q;
    }
	function jumlahaktif(){
		$this->db->where($this->state, 'aktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function jumlah_dosen($id){
         $q=$this->db->query(" select distinct dosen.id_dosen as jumlah_dosen from dosen,detail_jadwal,jadwal
                            where dosen.id_dosen=detail_jadwal.id_dosen and detail_jadwal.id_jadwal=jadwal.id_jadwal 
                            and jadwal.id_kelas='$id'");
        return $q;
    }
    function tampil_dosen($id){
         $q=$this->db->query(" select distinct dosen.id_dosen as jumlah_dosen from dosen,detail_jadwal,jadwal
                            where dosen.id_dosen=detail_jadwal.id_dosen and detail_jadwal.id_jadwal=jadwal.id_jadwal 
                            and jadwal.id_kelas='$id'");
        return $q;
    }
    function dosen_sudah($id,$nim){
         $q=$this->db->query(" select distinct polling.id_dosen from dosen,detail_jadwal,jadwal,polling
                            where dosen.id_dosen=detail_jadwal.id_dosen and detail_jadwal.id_jadwal=jadwal.id_jadwal
                            and dosen.id_dosen=polling.id_dosen and polling.nim=$nim and polling.id_kelas='".$id."'");
        return $q;
    }
	function dosen_kelas($id){
         $q=$this->db->query(" select distinct dosen.id_dosen,dosen.nama_dosen,mata_kuliah.nama_mk from dosen,detail_jadwal,jadwal,mata_kuliah
                            where dosen.id_dosen=detail_jadwal.id_dosen and detail_jadwal.id_jadwal=jadwal.id_jadwal and detail_jadwal.id_mk=mata_kuliah.id_mk
                            and jadwal.id_kelas='$id'");
        return $q;
    }
    function dosen_polling(){
		 $q=$this->db->query(" select distinct dosen.id_dosen,dosen.nama_dosen from dosen,polling where dosen.id_dosen=polling.id_dosen");
        return $q;
    }
	function dosen($id){
         $q=$this->db->query(" select * from dosen where id_dosen='$id' ");
        return $q;
    }
    function dosenuser($username){
         $q=$this->db->query(" select * from dosen where username='$username' ");
        return $q;
    }
    function get_tahun_semester($id){
         $q=$this->db->query(" select distinct detail_jadwal.id_dosen,tahun_semester.id_tahun_semester from     tahun_semester,detail_jadwal 
             where left(detail_jadwal.id_detail_jadwal,6)=tahun_semester.id_tahun_semester
             and detail_jadwal.id_dosen='$id' ");
        return $q;
    }
    function daftar_dosen(){
         $q=$this->db->query(" select * from dosen where status_keanggotaan='aktif' ");
        return $q;
    }
    function tahun_polling(){
		 $q=$this->db->query(" select * from tahun_semester ");
        return $q;
    }
	function kriteria($id){
		 $q=$this->db->query(" select * from kriteria_nilai where kategori='$id' ");
        return $q;
    }
	function nilai(){
		 $q=$this->db->query(" select * from kriteria_nilai where status='aktif' ");
        return $q;
    }
	function soal($id){
		 $q=$this->db->query(" select * from tahun_semester_soal ths inner join pertanyaan p on p.id_pertanyaan=ths.id_soal where ths.id_tahun_semester=$id");
        return $q;
    }
	function kelas_siswa($id){
		 $q=$this->db->query(" select * from kelas,prodi,dosen where id_kelas='$id' and kelas.id_prodi=prodi.id_prodi
							 and kelas.dpa=dosen.id_dosen");
        return $q;
    }
	function ambil_datanon(){
        $q=$this->db->query(" select * from polling
							where status='nonaktif' ORDER BY id_polling DESC ");
        return $q;
    }
	function jumlahnonaktif(){
		$this->db->where($this->state, 'nonaktif');
		$this->db->from($this->table);
		return $this->db->count_all_results();
    }
	function cek($id_polling){
        $this->db->where($this->primary,$id_polling);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function ceknilai($id_dosen,$id_kelas,$nim){
        $q=$this->db->query("select polling.kriteria_nilai from polling,kriteria_nilai where id_dosen='$id_dosen' and id_kelas='$id_kelas' and nim='$nim' and polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai and kriteria_nilai.kategori='positif' ");
        return $q;
    }
    function ceknilai_dosen($id_dosen){
        $q=$this->db->query("select polling.kriteria_nilai from polling,kriteria_nilai where id_dosen='$id_dosen' and polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai and kriteria_nilai.kategori='positif' ");
        return $q;
    }
    function ceknilai2($id_dosen,$id_kelas,$nim){
        $q=$this->db->query("select polling.kriteria_nilai from polling,kriteria_nilai where id_dosen='$id_dosen' and id_kelas='$id_kelas' and nim='$nim' and polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai and kriteria_nilai.kategori='negatif' ");
        return $q;
    }
    function cek_p($id_dosen,$id_kelas,$nim){
        $q=$this->db->query("select polling.kriteria_nilai from polling,kriteria_nilai where id_dosen='$id_dosen' and id_kelas='$id_kelas' and nim='$nim' and polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai ");
        return $q;
    }
    function ceknilai2_dosen($id_dosen){
        $q=$this->db->query("select polling.kriteria_nilai from polling,kriteria_nilai where id_dosen='$id_dosen' and polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai and kriteria_nilai.kategori='negatif' ");
		return $q;
    }
	function simpan($info){
        $this->db->insert($this->table,$info);
        return $this->db->insert_id();
    }
	function simpan_polling($dosen,$kelas,$nim){
        $nilai=$this->input->post('nilai');
        $soal=$this->input->post('soal');
		$waktu=date("Y-m-d H:i:s");
		$id_polling=$waktu.$dosen.$kelas;
		for ($i=0; $i < count($nilai) ; $i++) {;
		$this->db->query("INSERT INTO polling (nim,id_polling,id_kelas,id_soal,kriteria_nilai,id_dosen,waktu) VALUES ('$nim','$id_polling','$kelas','$soal[$i]','$nilai[$i]','$dosen','$waktu')");
    }
	}
    function edit_polling($dosen,$kelas,$nim){
        $nilai=$this->input->post('nilai');
        $soal=$this->input->post('soal');
        $waktu=date("Y-m-d H:i:s");
        $id_polling=$waktu.$dosen.$kelas;
        $this->db->query("delete from polling where id_dosen='$dosen' and id_kelas='$kelas' and nim='$nim'");
        for ($i=0; $i < count($nilai) ; $i++) {;
        $this->db->query("INSERT INTO polling (nim,id_polling,id_kelas,id_soal,kriteria_nilai,id_dosen,waktu) VALUES ('$nim','$id_polling','$kelas','$soal[$i]','$nilai[$i]','$dosen','$waktu')");
    }
    }
	function ceki($id_polling){
        $this->db->where($this->primary,$id_polling);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function cekn($id_polling){
        $this->db->where($this->primary,$id_polling);
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
	function cekaktif($id_polling){
        $this->db->where($this->primary,$id_polling);
        $query=$this->db->get($this->table);        
        return $query;
    }
	function update_aktif($info,$id){
        $this->db->where($this->primary, $id);
		$this->db->update($this->table, $info);
    }
	function cari($thn_semester){
        $q=$this->db->query("
                            select distinct * from rank where tahun=$thn_semester order by rank asc
                            ");
        return $q;
    }
    function cari_dosen($thn_semester,$dosen){
        $q=$this->db->query("
							 select distinct * from rank where tahun=$thn_semester and id_dosen=$dosen
							");
        return $q;
    }
	function carinon($cari){
        $q=$this->db->query("
							select * from polling where id_polling LIKE '%$cari%' and status='nonaktif'
							");
        return $q;
    }
	function loaddata($dataarray) {
        for ($i = 0; $i < count($dataarray); $i++) {
            $data = array(
                'id_polling' => $dataarray[$i]['id_polling'],
                'nama_polling' => $dataarray[$i]['nama'],
                'tmpt_lahir' => $dataarray[$i]['tempat_lahir'],
                'tgl_lahir' => $dataarray[$i]['tanggal_lahir'],
                'jenis_kelamin' => $dataarray[$i]['jenis_kelamin'],
                'agama' => $dataarray[$i]['agama'],
                'pendidikan_akhir' => $dataarray[$i]['pendidikan_akhir'],
                'status_kepegawaian' => $dataarray[$i]['status_kepegawaian'],
                'status_keanggotaan' => $dataarray[$i]['status_keanggotaan'],
                'alamat' => $dataarray[$i]['alamat']
            );
			$this->db->where('id_polling', $this->input->post('id_polling'));            
            if ($cek) {
                $this->db->insert($this->table, $data);
            }
		}
	}

    function nilai_dsn($id_dosen)
    {
       $q=$this->db->query("select kriteria_nilai.id_kriteria_nilai from polling,kriteria_nilai where id_dosen='3' and polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai and kriteria_nilai.kategori='positif'");
       return $q;
    }
}