<?php
function getnilai($id,$id_soal,$thn){
	$ci=&get_instance();
	$q=$ci->db->query("select polling.kriteria_nilai from polling,kriteria_nilai where polling.kriteria_nilai=kriteria_nilai.id_kriteria_nilai and id_dosen='$id' and id_soal='$id_soal' and left(id_kelas,6)='$thn'")->result();
	$nil2=array();
	$n=0;  foreach($q as $rows2 ): $n++;
	$id_kriteria_nilai2=$rows2->kriteria_nilai;
	$jumlah_nilai2=$ci->m_polling->jumlah_nilai($id_kriteria_nilai2)->row_array();
	//if($jumlah_nilai2['kategori']=='positif'){
	$nil2[]=$jumlah_nilai2['kriteria_nilai'];
	
	// }else{
		// $nil2='-'.$jumlah_nilai2['kriteria_nilai'];
	// }
	//echo $jumlah_nilai['kriteria_nilai'];	
	endforeach;
	$jumlah2=array_sum($nil2); 
	return $jumlah2;	

}
function get_kategori($kategori){
	if($kategori>=30){ //300 jika jumlah mahasiswa sekitar 300 (bisa diganti sesuai jumlah mahasiswa)
		$ket='Sangat Baik';
	}elseif($kategori>=25){ //250
		$ket='Baik';
	}elseif($kategori>=20){ //200
		$ket='Cukup';
	}elseif($kategori>=15){ //150
		$ket='Buruk';
	}elseif($kategori<=12){ //100
		$ket='Sangat Buruk';
	}
	return $ket;	
}