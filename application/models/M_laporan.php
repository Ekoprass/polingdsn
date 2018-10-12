<?php
class M_laporan extends CI_Model{
    private $table="polling";
	private $primary="id_polling";
	private $state="status";
	public $order = 'DESC';
	
    function ambil_data($username){
        $q=$this->db->query(" select * from dosen, polling
							where dosen.id_kelas=kelas_mahasiswa.id_kelas and mahasiswa.nim=kelas_mahasiswa.nim
							and kelas_mahasiswa.nim='$username'");
        return $q;
    }
    function jumlah_nilai($id){
        $q=$this->db->query(" select * from kriteria_nilai where id_kriteria_nilai='$id'");
        return $q;
    }

    function getKelas($id_dosen)
    {
        $q=$this->db->query("
            select kel.id_kelas from detail_jadwal dj
            inner join jadwal da on dj.id_jadwal=da.id_jadwal
            inner join kelas kel on da.id_kelas=kel.id_kelas 
            inner join kelas_mahasiswa km on kel.id_kelas=km.id_kelas
            where dj.id_dosen='".$id_dosen."'
            group by kel.id_kelas");
        return $q;
    }

    function jumlahmhs_dosen($id_dosen)
    {
        $q=$this->db->query("
            select count(nim) as jumlah_siswa from kelas_mahasiswa where id_kelas IN
            (select kel.id_kelas from detail_jadwal dj
            inner join jadwal da on dj.id_jadwal=da.id_jadwal
            inner join kelas kel on da.id_kelas=kel.id_kelas 
            inner join kelas_mahasiswa km on kel.id_kelas=km.id_kelas
            where dj.id_dosen='".$id_dosen."'
            group by kel.id_kelas)");
        return $q;
    }

    function dosen_mk($id_dosen)
    {
         $q=$this->db->query("
            select mata_kuliah.nama_mk from detail_jadwal, mata_kuliah where id_dosen='".$id_dosen."' 
            and detail_jadwal.id_mk=mata_kuliah.id_mk
            group by nama_mk");
         return $q;
    }

    function mk_dosen($id_mk)
    {
        $q=$this->db->query("
            select dosen.id_dosen, dosen.nama_dosen from detail_jadwal, dosen where detail_jadwal.id_mk='".$id_mk."'
            and detail_jadwal.id_dosen=dosen.id_dosen
            group by id_dosen ");
        return $q;  
    }

    function mhs_menilai_dosen($id_dosen)
    {
        $q=$this->db->query("
            select count(nim) as jumlah_penilai from mahasiswa where nim in 
            (select p.nim from polling p where p.id_dosen='".$id_dosen."' group by p.nim)");
        return $q;
    }

    function getNilai($id_dosen)
    {
        $q=$this->db->query("
            select d.nama_dosen, 
            sum(if(kn.id_kriteria_nilai=p.kriteria_nilai,kn.kriteria_nilai,0)) as nilai
            from polling p, kriteria_nilai kn, dosen d
            where p.id_dosen='".$id_dosen."'
            and p.id_dosen=d.id_dosen
            and p.kriteria_nilai=kn.id_kriteria_nilai");
        return $q;
    }

    function getNilaiMk($id_mk)
    {
        $q=$this->db->query("select * from polingdsn where id_mk='".$id_mk."'");
         if($q->num_rows() > 0){
            foreach($q->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }

    }

     function Mk($id_mk)
    {
        $q=$this->db->query("select nama_mk from polingdsn where id_mk='".$id_mk."' group by nama_mk");
        return $q;

    }

      function mhs_menilai()
    {
        $q=$this->db->query("
            select count(nim) as jumlah_penilai from mahasiswa where nim in 
            (select p.nim from polling p group by p.nim)");
        return $q;
    }

      function jumlah_mhs_total_kelas()
    {
        $q=$this->db->query("select count(nim) as total from kelas_mahasiswa");
        return $q;
    }

    function toptri()
    {
         $q=$this->db->query("select * from polingdsn limit 3");
         return $q;
    }

    function rank($id_dosen)
    {
        $q=$this->db->query("select nama_dosen, nilai, FIND_IN_SET( nilai, (SELECT GROUP_CONCAT( nilai ORDER BY nilai DESC )FROM polingdsn )) AS rank from polingdsn where id_dosen='".$id_dosen."'");
        return $q;

    }

    function dosen_mahasiswa($nim, $id_kelas)
    {
        $q=$this->db->query("select * from dosen_mhs where nim=$nim and id_kelas='".$id_kelas."' group by id_dosen");
        return $q;
    }
}