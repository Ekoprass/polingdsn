<?php
class M_login extends CI_Model{
    
    function cek_mahasiswa($username,$password){
      $q=$this->db->query("select * from mahasiswa,hak_akses_user,hak_akses
							where mahasiswa.nim=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and mahasiswa.username='$username'
							and mahasiswa.password='$password'");
        return $q;
    }function cekmaha($akses){
      $q=$this->db->query("select * from mahasiswa
							where username='$akses'
							");
        return $q;
    }
	function cek_validasi($username,$date){
		$q=$this->db->query("select * from validasi_maha
							where nim='$username' and date='$date'
							");
        return $q;
	}
	function validasi($nim,$date){
		$q=$this->db->query("insert into validasi_maha (id_validasi,nim,date) values('$nim-$date','$nim','$date')");
        return $q;
	}
	function cek_dosen($username,$password){
      $q=$this->db->query("select * from dosen,hak_akses_user,hak_akses
							where dosen.id_dosen=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and dosen.username='$username'
							and password='$password'");
        return $q;
    }function cekdosen($akses){
      $q=$this->db->query("select * from dosen
							where username='$akses'
							");
        return $q;
    }
	function cektu($akses){
      $q=$this->db->query("select * from tata_usaha
							where username='$akses'
							");
        return $q;
    }
	function cek_tu($username,$password){
      $q=$this->db->query("select * from tata_usaha,hak_akses_user,hak_akses
							where tata_usaha.id_tu=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and tata_usaha.username='$username'
							and password='$password'");
        return $q;
    }
	
	function data_mahasiswa($username){
        $q=$this->db->query("select * from mahasiswa,hak_akses_user,hak_akses
							where mahasiswa.nim=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and mahasiswa.username='$username'");
        return $q;
    }
	function data_dosen($username){
        $q=$this->db->query("select * from dosen,hak_akses_user,hak_akses
							where dosen.id_dosen=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and dosen.username='$username'");
        return $q;
    }
	function data_tu($username){
        $q=$this->db->query("select * from tata_usaha,hak_akses_user,hak_akses
							where tata_usaha.id_tu=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and tata_usaha.username='$username'");
        return $q;
    }
	function ambilakses_tu($username){
        $q=$this->db->query("select * from tata_usaha,hak_akses_user,hak_akses
							where tata_usaha.id_tu=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and tata_usaha.username='$username'");
        return $q;
    }
	function ambilakses_dos($username){
        $q=$this->db->query("select * from dosen,hak_akses_user,hak_akses
							where dosen.id_dosen=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and dosen.username='$username'");
        return $q;
    }
	function jum_akses_dos($session_id){
        $q=$this->db->query("select id_user, count(id_user) as jml
							from dosen,hak_akses_user,hak_akses
							where dosen.id_dosen=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and dosen.username='$session_id'
							group by id_user ");
        return $q;
    }
	function jum_akses_tu($session_id){
        $q=$this->db->query("select id_user, count(id_user) as jml
							from tata_usaha,hak_akses_user,hak_akses
							where tata_usaha.id_tu=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and tata_usaha.username='$session_id'
							group by id_user ");
        return $q;
    }
	function jum_akses_maha($session_id){
        $q=$this->db->query("select id_user, count(id_user) as jml
							from mahasiswa,hak_akses_user,hak_akses
							where mahasiswa.nim=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and mahasiswa.username='$session_id'
							group by id_user ");
        return $q;
    }
	function akses_maha($username){
        $q=$this->db->query("select * from mahasiswa,hak_akses_user,hak_akses
							where mahasiswa.nim=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and mahasiswa.username='$username'");
        return $q;
    }
	function akses_dos($username){
        $q=$this->db->query("select * from dosen,hak_akses_user,hak_akses
							where dosen.id_dosen=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and dosen.username='$username'");
        return $q;
    }
	function akses_tu($username){
        $q=$this->db->query("select * from tata_usaha,hak_akses_user,hak_akses
							where tata_usaha.id_tu=hak_akses_user.id_user
							and hak_akses.id_hak_akses=hak_akses_user.id_akses
							and tata_usaha.username='$username'");
        return $q;
    }
	function maha($username){
        $q=$this->db->query("select * from mahasiswa 
							where username='$username'");
        return $q;
    }
}