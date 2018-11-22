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

    function getNilaiMk($id_mk, $tahun)
    {
         $q=$this->db->query("select distinct * from rank where id_mk='$id_mk' and substr(tahun,1,4)='$tahun'");
        return $q;


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
         $q=$this->db->query("select distinct * from rank order by nilai desc limit 3");
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

    function mhs_menilai_dosen_thn($dosen, $id_kelas)
    {
        $q=$this->db->query("select count(nim) as jumlah_penilai from mahasiswa where nim in 
            (select p.nim from polling p where p.id_dosen='$dosen' and substring(id_kelas,1,6)='$id_kelas' group by p.nim)");
        return $q;
    }

     function getNilaiThn($id_dosen, $tahun)
    {
        $q=$this->db->query("
            select d.nama_dosen, 
            sum(if(kn.id_kriteria_nilai=p.kriteria_nilai,kn.kriteria_nilai,0)) as nilai
            from polling p, kriteria_nilai kn, dosen d
            where p.id_dosen='".$id_dosen."' and substring(p.id_kelas,1,6)=$tahun
            and p.id_dosen=d.id_dosen
            and p.kriteria_nilai=kn.id_kriteria_nilai");
        return $q;
    }
     function rankThn($id_dosen,$id_kelas)
    {
        $q=$this->db->query("select * from rank where id_dosen=$id_dosen and tahun=$id_kelas");
        return $q;

    }

    function rata_rata($id_dosen, $id_kelas)
    { 
        $q=$this->db->query("
           select (( select distinct nilai from polingdsn where id_dosen=$id_dosen and substr(id_kelas,1,4)=substr($id_kelas,1,4))/(select distinct (count(nim)/10) as bagi from polling where id_dosen=$id_dosen and substr(id_polling,1,4)=substr($id_kelas,1,4))) as rata_rata");
        return $q;
    }
    function matkul()
    {
         $q=$this->db->query("
            select distinct id_mk, nama_mk from dosen_mk order by nama_mk");
         return $q;
    }
    function tahun()
    {
        $q=$this->db->query("
       select distinct substr(id_kelas,1,4)as tahun from kelas");
        return $q;
    }

    function dsn_nilai($id_dosen)
    {
         $q=$this->db->query("
            select distinct * from rank where id_dosen=$id_dosen");
         return $q;
    }

    function nilai_mhs($id_dosen, $nim)
    {
        $q=$this->db->query("
            select p.id_soal, pr.pertanyaan, kn.kriteria_nilai from polling p 
            inner join kriteria_nilai kn on p.kriteria_nilai=kn.id_kriteria_nilai
            inner join pertanyaan pr on p.id_soal=pr.id_pertanyaan
            where nim=$nim and id_dosen=$id_dosen");
        return $q;
    }

    function dsn_rank($tahun)
    {
         $q=$this->db->query("
            select distinct count(*)as jum_dsn from rank where tahun=$tahun");
         return $q;
    }
}