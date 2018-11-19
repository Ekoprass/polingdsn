-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 04:40 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poling`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getRank` (IN `id` INT)  BEGIN
select * from rank where id_dosen = id;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `mhs_menilai` (IN `id_dosen` INT, IN `tahun_smt` INT)  BEGIN
DECLARE mhs float; 
DECLARE nilai float;
select count(nim) as jumlah_penilai into mhs from mahasiswa where nim in 
            (select p.nim from polling p where p.id_dosen=id_dosen and substring(id_kelas,1,6)=tahun_smt group by p.nim);
select distinct r.nilai into nilai from rank r where r.id_dosen=id_dosen and r.tahun=tahun_smt;
select (nilai/mhs) as rata;


END$$

--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `RATA` (`id_dsn` INT, `thn` INT) RETURNS FLOAT BEGIN 

	set @mhs=(select count(nim) as jumlah_penilai from mahasiswa where nim in 
	            (select p.nim from polling p where p.id_dosen=id_dsn and substring(id_kelas,1,6)=thn group by p.nim));
	set @nilai =(select distinct nilai from polingdsn where id_dosen=id_dsn and substring(id_kelas,1,6)=thn);
	set @rata := @nilai/@mhs;
  RETURN @rata;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `id_akun` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `waktu` datetime NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`id_akun`, `keterangan`, `nama`, `jumlah`, `waktu`, `status`) VALUES
('001', 'Uang Kuliah dan Praktikum 1 Semester', 'SPP', 900000, '2015-12-15 07:00:00', 'aktif'),
('002', 'Biaya Pengembangan Dan Pemeliharaan Pada Gelombang 1 Semester 1', 'BPPg1', 300000, '2015-12-16 08:00:00', 'aktif'),
('003', 'Jas Almamater,Seragam Ordik,Kegiatan Pengukuhan Maba di Polinema,Kegiatan Ordik, Outbound Kewirausahaan,Kartu Tanda Mahasiswa,Asuransi,Kalender,Majalah,Kegiatan PHBI dan PHBN', 'Biaya Perlengkapan & Kegiatan Pra Kuliah', 800000, '2015-12-16 11:00:00', 'aktif'),
('004', 'Biaya Pengembangan Dan Pemeliharaan Semester 1 pada gelombang 2', 'BPPg2', 400000, '2015-12-16 09:00:00', 'aktif'),
('005', 'Peningkatan Kemampuan Akademik & Kemahasiswaan 1 semeeter', 'PKAK', 75000, '2015-12-02 00:00:00', 'aktif'),
('006', 'Pemeliharaan dan Perbaikan Peralatan Praktek 1 Semester', 'P4', 300000, '2015-12-07 00:00:00', 'aktif'),
('007', 'Buletin kampus 1 kali terbitan', 'Buletin', 25000, '2015-12-07 00:00:00', 'aktif'),
('008', 'Kalender Kampus', 'Kalender', 30000, '2015-12-07 00:00:00', 'aktif'),
('009', 'Kegiatan PHBI, PHBN, dan PHBK', 'PHBI,PHBN,PHBK', 50000, '2015-12-07 00:00:00', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id_detail_jadwal` varchar(50) NOT NULL,
  `id_jadwal` varchar(15) NOT NULL,
  `id_mk` varchar(20) NOT NULL,
  `id_dosen` varchar(15) NOT NULL,
  `id_jam_ke` varchar(7) NOT NULL,
  `status` enum('aktif','kosong') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`id_detail_jadwal`, `id_jadwal`, `id_mk`, `id_dosen`, `id_jam_ke`, `status`) VALUES
('201805mi02001110', '201805mi02001', '10', '1', '01', 'aktif'),
('201805mi02001110', '201805mi02001', '10', '1', '02', 'aktif'),
('201805mi02001110', '201805mi02001', '10', '1', '03', 'aktif'),
('201805mi02001110', '201805mi02001', '10', '1', '04', 'aktif'),
('201805mi02001110', '201805mi02001', '10', '1', '05', 'aktif'),
('201805mi0200225', '201805mi02002', '5', '2', '01', 'aktif'),
('201805mi0200225', '201805mi02002', '5', '2', '02', 'aktif'),
('201805mi0200225', '201805mi02002', '5', '2', '03', 'aktif'),
('201805mi02002', '201805mi02002', '', '', '04', 'kosong'),
('201805mi0200237', '201805mi02002', '7', '3', '05', 'aktif'),
('201805mi0200237', '201805mi02002', '7', '3', '06', 'aktif'),
('201805mi0200237', '201805mi02002', '7', '3', '07', 'aktif'),
('201805mi0200142', '201805mi02001', '2', '4', '06', 'aktif'),
('201805mi0200142', '201805mi02001', '2', '4', '07', 'aktif'),
('201805mi020031016', '201805mi02003', '6', '101', '01', 'aktif'),
('201805mi020031016', '201805mi02003', '6', '101', '02', 'aktif'),
('201805mi020031016', '201805mi02003', '6', '101', '03', 'aktif'),
('201805ti040011016', '201805ti04001', '6', '101', '01', 'aktif'),
('201805ti040011016', '201805ti04001', '6', '101', '02', 'aktif'),
('201805ti040011016', '201805ti04001', '6', '101', '03', 'aktif'),
('201805ti04001', '201805ti04001', '', '', '04', 'kosong'),
('201805ti04001', '201805ti04001', '', '', '04', 'kosong'),
('201805ti0400165', '201805ti04001', '5', '6', '05', 'aktif'),
('201805ti0400165', '201805ti04001', '5', '6', '06', 'aktif'),
('201805ti0400165', '201805ti04001', '5', '6', '07', 'aktif'),
('201805ti0400257', '201805ti04002', '7', '5', '01', 'aktif'),
('201805ti0400257', '201805ti04002', '7', '5', '02', 'aktif'),
('201805ti0400257', '201805ti04002', '7', '5', '03', 'aktif'),
('201805ti04002', '201805ti04002', '', '', '04', 'kosong'),
('201805ti04002810', '201805ti04002', '10', '8', '05', 'aktif'),
('201805ti04002810', '201805ti04002', '10', '8', '06', 'aktif'),
('201805ti04002810', '201805ti04002', '10', '8', '07', 'aktif'),
('201805ti04003102', '201805ti04003', '2', '10', '01', 'aktif'),
('201805ti04003102', '201805ti04003', '2', '10', '02', 'aktif'),
('201805ti04003102', '201805ti04003', '2', '10', '03', 'aktif'),
('201805ti0800197', '201805ti08001', '7', '9', '01', 'aktif'),
('201805ti0800197', '201805ti08001', '7', '9', '02', 'aktif'),
('201805ti0800197', '201805ti08001', '7', '9', '03', 'aktif'),
('201703ti01001610', '201703ti01001', '10', '6', '01', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `id_dosen` varchar(20) NOT NULL,
  `nama_dosen` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Kristen','Protestan','Budha','Hindu','KongHuChu','Kepercayaan') NOT NULL,
  `pendidikan_akhir` enum('SMA','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
  `status_kepegawaian` enum('pns','gtt','') NOT NULL,
  `status_keanggotaan` enum('aktif','nonaktif','') NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `nama_dosen`, `username`, `password`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `pendidikan_akhir`, `status_kepegawaian`, `status_keanggotaan`, `alamat`) VALUES
('1', 'Andika Aradhita Priadi', '1', 'c4ca4238a0b923820dcc509a6f75849b', 'BJN', '2016-06-03', 'L', 'Islam', 'S1', 'pns', 'aktif', 'REL LOCCO'),
('10', 'ANANG ANGGONO LUTFI', '10', 'd3d9446802a44259755d38e6d163e820', 'BOJONEGORO', '2016-06-16', 'L', 'Islam', 'S1', 'pns', 'aktif', 'BJN'),
('101', 'Teguh Pribadi', '101', '38b3eff8baf56627478ec76a704e9b52', 'Bojonegoro', '1991-03-02', 'L', 'Islam', 'S2', 'pns', 'aktif', 'Jl.Pemuda No.69 Bojonegoro'),
('11222', 'Nikitaf', '11222', '480eb54452f63abfa7f2eb0ffb1c62fe', 'L', '0000-00-00', '', 'Islam', '', 'pns', '', 'alrosyd'),
('2', 'PRIYO JOKO', '2', 'c81e728d9d4c2f636f067f89cc14862c', 'BJN', '2016-06-03', 'L', 'Islam', 'S1', 'pns', 'aktif', 'MOJORANU'),
('3', 'ARIES ALFIAN PRASETYO', '3', 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'BJN', '2016-06-04', 'L', 'Islam', 'S1', 'pns', 'aktif', 'BJN'),
('4', 'LUSY KURNIAWATI', '4', 'a87ff679a2f3e71d9181a67b7542122c', 'BJn', '2016-06-04', 'P', 'Islam', 'S1', 'pns', 'aktif', 'BJN'),
('5', 'DONI ABDUL FATAH', '5', 'e4da3b7fbbce2345d7772b0674a318d5', 'BJn', '2016-06-03', 'L', 'Islam', 'S1', 'pns', 'aktif', 'BJN'),
('6', 'VENANDI', '6', '1679091c5a880faf6fb5e6087eb1b2dc', 'BJN', '2016-06-18', 'L', 'Islam', 'S1', 'pns', 'aktif', 'BJN'),
('7', 'TEGUH PRIBADI', '7', '8f14e45fceea167a5a36dedd4bea2543', 'BJN', '2016-06-09', 'L', 'Islam', 'S1', 'pns', 'aktif', 'BJN'),
('8', 'DJOKO SUWITO', '8', 'c9f0f895fb98ab9159f51fd0297e236d', 'BJN', '2016-06-11', 'L', 'Islam', 'S2', 'pns', 'aktif', 'BJN'),
('9', 'ERWIN ALEXANDRA', '9', '45c48cce2e2d7fbdea1afc51c7c6ad26', 'BJN', '2016-06-09', 'L', 'Islam', 'S1', 'pns', 'aktif', 'BJN');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dosen_mhs`
-- (See below for the actual view)
--
CREATE TABLE `dosen_mhs` (
`id_kelas` varchar(15)
,`nim` varchar(15)
,`id_dosen` varchar(20)
,`nama_dosen` varchar(100)
,`nama_mk` varchar(20)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `dosen_mk`
-- (See below for the actual view)
--
CREATE TABLE `dosen_mk` (
`id_kelas` varchar(10)
,`tahun` varchar(4)
,`semseter` varchar(1)
,`kelas` varchar(4)
,`id_dosen` varchar(20)
,`nama_dosen` varchar(100)
,`id_mk` varchar(15)
,`nama_mk` varchar(20)
);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_hak_akses` varchar(30) NOT NULL,
  `nama_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_hak_akses`, `nama_akses`) VALUES
('akses001', 'mahasiswa'),
('akses005', 'superadmin'),
('akses002', 'dosen');

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses_user`
--

CREATE TABLE `hak_akses_user` (
  `id_user` varchar(30) NOT NULL,
  `id_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses_user`
--

INSERT INTO `hak_akses_user` (`id_user`, `id_akses`) VALUES
('22', 'akses005'),
('1421024179', 'akses001'),
('101', 'akses002'),
('102', 'akses002'),
('102', 'akses005'),
('1421024178', 'akses001'),
('12345678', 'akses005'),
('12123', 'akses002'),
('1421024180', 'akses001'),
('11111', 'akses002'),
('123', 'akses002'),
('22', 'akses002'),
('22', 'akses001'),
('1996', 'akses002'),
('1421024181', 'akses001'),
('11', 'akses002'),
('123456789', 'akses005'),
('085', 'akses005'),
('0857', 'akses005'),
('123', 'akses002'),
('1421024189', 'akses001'),
('1421024188', 'akses001'),
('1421024187', 'akses001'),
('11111111', 'akses002'),
('111', 'akses001'),
('1', 'akses002'),
('2', 'akses002'),
('3', 'akses002'),
('4', 'akses002'),
('5', 'akses002'),
('6', 'akses002'),
('7', 'akses002'),
('8', 'akses002'),
('9', 'akses002'),
('10', 'akses002'),
('1421024175', 'akses001'),
('1421024178', 'akses001'),
('1421024189', 'akses001'),
('1421024198', 'akses001'),
('1421024112', 'akses001'),
('1421024112', 'akses001'),
('1421024112', 'akses001'),
('1421024113', 'akses001'),
('1421024112', 'akses001'),
('1421024113', 'akses001'),
('1421024119', 'akses001'),
('1421024118', 'akses001'),
('1421024117', 'akses001'),
('1421024117', 'akses001'),
('1421024117', 'akses001'),
('1421024117', 'akses001'),
('1421024115', 'akses001'),
('14210241171', 'akses001'),
('14210241171', 'akses001'),
('14210241151', 'akses001'),
('14210241173', 'akses001'),
('14210241153', 'akses001');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `id_kelas` varchar(15) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_kelas`, `hari`, `status`) VALUES
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02002', '201805mi02', 'Selasa', 'aktif'),
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02001', '201805mi02', 'Senin', 'aktif'),
('201805mi02003', '201805mi02', 'Rabu', 'aktif'),
('201805mi02003', '201805mi02', 'Rabu', 'aktif'),
('201805mi02003', '201805mi02', 'Rabu', 'aktif'),
('201805mi02003', '201805mi02', 'Rabu', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04001', '201805ti04', 'Senin', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04002', '201805ti04', 'Selasa', 'aktif'),
('201805ti04003', '201805ti04', 'Rabu', 'aktif'),
('201805ti04003', '201805ti04', 'Rabu', 'aktif'),
('201805ti04003', '201805ti04', 'Rabu', 'aktif'),
('201805ti08001', '201805ti08', 'Senin', 'aktif'),
('201805ti08001', '201805ti08', 'Senin', 'aktif'),
('201805ti08001', '201805ti08', 'Senin', 'aktif'),
('201703ti01001', '201703ti01', 'Senin', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jam_ke`
--

CREATE TABLE `jam_ke` (
  `id_jam_ke` varchar(15) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jam_ke`
--

INSERT INTO `jam_ke` (`id_jam_ke`, `nama`, `jam_mulai`, `jam_selesai`) VALUES
('01', 'Jam-ke-1', '14:00:00', '14:45:00'),
('02', 'Jam-ke-2', '14:45:00', '15:30:00'),
('03', 'Jam-ke-3', '15:30:00', '16:15:00'),
('04', 'Jam-ke-4', '16:15:00', '17:00:00'),
('05', 'Jam-ke-5', '17:00:00', '17:45:00'),
('06', 'Jam-ke-6', '17:45:00', '18:30:00'),
('07', 'Jam-ke-7', '18:30:00', '19:15:00'),
('08', 'Jam-ke-8', '12:00:00', '13:00:00'),
('1x', 'Jam-ke-1', '14:00:00', '14:45:00'),
('2x', 'Jam-ke-2', '14:45:00', '15:30:00'),
('3x', 'Jam-ke-3', '15:30:00', '16:15:00'),
('4x', 'Jam-ke-4', '16:15:00', '17:00:00'),
('5x', 'Jam-ke-5', '17:00:00', '17:45:00'),
('6x', 'Jam-ke-6', '17:45:00', '18:30:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `jumlah_mhs`
-- (See below for the actual view)
--
CREATE TABLE `jumlah_mhs` (
`id_kelas` varchar(15)
,`nim` varchar(15)
,`id_dosen` varchar(15)
);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` varchar(20) NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `id_prodi` varchar(20) NOT NULL,
  `semester` enum('01','02','03','04','05','06','07','08') NOT NULL,
  `dpa` varchar(20) NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `ruang` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `tahun`, `id_prodi`, `semester`, `dpa`, `status`, `ruang`) VALUES
('201703ti01', '2017', 'ti', '03', '2', 'aktif', '01'),
('201805mi02', '2018', 'mi', '05', '2', 'aktif', '02'),
('201805ti04', '2018', 'ti', '05', '1', 'aktif', '04'),
('201805ti08', '2018', 'ti', '05', '9', 'aktif', '08');

-- --------------------------------------------------------

--
-- Table structure for table `kelas_mahasiswa`
--

CREATE TABLE `kelas_mahasiswa` (
  `id_kelas` varchar(15) NOT NULL,
  `nim` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelas_mahasiswa`
--

INSERT INTO `kelas_mahasiswa` (`id_kelas`, `nim`) VALUES
('201805ti04', '1421024180'),
('201805ti04', '1421024181'),
('201805ti04', '1421024184'),
('201805ti04', '1421024187'),
('201805ti04', '1421024188'),
('201805mi02', '1421024178'),
('201805mi02', '1421024183'),
('201805mi02', '1421024186'),
('201805mi02', '1421024189'),
('201805mi02', '1421024191'),
('201805ti08', '1421024179'),
('201805ti08', '1421024182'),
('201805ti08', '1421024190'),
('201805ti08', '1421024192'),
('201805ti08', '1421024193'),
('201703ti01', '1421024178');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_nilai`
--

CREATE TABLE `kriteria_nilai` (
  `id_kriteria_nilai` varchar(10) NOT NULL,
  `kriteria_nilai` enum('4','3','2','1','0') NOT NULL,
  `keterangan` enum('Sangat Baik','Baik','Cukup','Tidak Baik','Sangat Tidak Baik') NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria_nilai`
--

INSERT INTO `kriteria_nilai` (`id_kriteria_nilai`, `kriteria_nilai`, `keterangan`, `kategori`, `status`) VALUES
('001', '4', 'Sangat Baik', 'positif', 'aktif'),
('002', '3', 'Baik', 'positif', 'aktif'),
('003', '2', 'Cukup', 'positif', 'aktif'),
('004', '1', 'Tidak Baik', 'positif', 'aktif'),
('005', '0', 'Sangat Tidak Baik', 'positif', 'aktif'),
('006', '4', 'Sangat Tidak Baik', 'negatif', 'nonaktif'),
('007', '3', 'Tidak Baik', 'negatif', 'nonaktif'),
('008', '2', 'Cukup', 'negatif', 'nonaktif'),
('009', '1', 'Baik', 'negatif', 'nonaktif'),
('010', '0', 'Sangat Baik', 'negatif', 'nonaktif');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(50) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `jenis_kelamin` varchar(2) DEFAULT NULL,
  `tempat_lahir` varchar(30) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `agama` varchar(100) DEFAULT NULL,
  `alamat_asli` varchar(100) DEFAULT NULL,
  `alamat_tinggal` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `sekolah_asal` varchar(50) DEFAULT NULL,
  `tahun_masuk` year(4) DEFAULT NULL,
  `status` enum('aktif','nonaktif','','') CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `nama_bapak` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_mahasiswa`, `username`, `password`, `jenis_kelamin`, `tempat_lahir`, `tgl_lahir`, `agama`, `alamat_asli`, `alamat_tinggal`, `phone`, `sekolah_asal`, `tahun_masuk`, `status`, `nama_ibu`, `nama_bapak`) VALUES
('1421024178', 'ACHMAD FAHRIZAL BUSTOMI', '1421024178', 'ef79636451c755a0257ee93d88eaa3c2', 'L', 'Bojonegoro', '1996-10-01', 'Islam', '', '', '', '', NULL, 'aktif', '', ''),
('1421024179', 'ADINDA NUR FIRDIYANI WATI', '1421024179', 'a28f45f4073cefdc1addd55afe5442f8', 'P', 'Bojonegoro', '0000-00-00', 'Islam', '', '', '', '', NULL, 'aktif', '', ''),
('1421024180', 'AKRIMA BUNGA YUNIA RIZKY', '1421024180', '1CCCAA9D39105E3EC4C1114F2C5A103B', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024181', 'BAMBANG TRI HANDIKA', '1421024181', '18e0e74aff8f1c8c638f7e6f23d70860', 'L', 'Bojonegoro', '2018-10-01', 'Islam', 'Bojonegoro', '', '', '', NULL, 'aktif', '', ''),
('1421024182', 'BENY RHAMDANI', '1421024182', '92EABBA6495B36FC4FC603CAA0122D26', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024183', 'BETHA YOGA ASMARA ADHY P.', '1421024183', 'C89893F56DBD12EA9090B6E621180DCF', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024184', 'CHOIRUL FATIKHIN', '1421024184', 'F7A17DA8109A4245C528874F81126343', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024185', 'DEVI MARLINA SAFITRI', '1421024185', '39C0C1D8283FE088914F5DA69FE21413', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024186', 'DEWI PUSPITASARI', '1421024186', 'E8E5B84F2C0454235CC8B9E0F3C83F6F', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024187', 'DYAH AYU MUSTIKANINGRUM', '1421024187', '98A69C2834BE64F9AD17C375DEB18FBE', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024188', 'EKO IRIANTO', '1421024188', '9B9AD56BB3BD99D439E78A0E793E20D6', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024189', 'EKO PRASETYO KURNIAWAN', '1421024189', 'a1179446960648233a77cd04c412f95b', 'L', 'Bojonegoro', '0000-00-00', 'Islam', 'Bojonegoro', '', '', '', NULL, 'aktif', '', ''),
('1421024190', 'HADI ISMA SURYADI', '1421024190', '8CF6061750467566D0BCD062A2BB2E88', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024191', 'INGGRIT ARIMBI SAPUTRI', '1421024191', 'C9AC7717B1D25AAD8DA5A416DBA8F406', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024192', 'IRFAN ANDIK ANDRIANTO', '1421024192', 'E4A915084EBBB5D9CB7F85962F3E275F', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024193', 'JEPRI DWI PRASETYO', '1421024193', '85D3D70D71A2EEE84C8968EEA1E715EB', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024194', 'M. DUWI AGUS HERMAWAN', '1421024194', '0630D2D74B74A521A0BB2A95EB39EB0D', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024195', 'M. SYAIFUL AZIZ B.', '1421024195', 'AD93E498CE0ED4273647EED87725AB84', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024196', 'MAFNI SILA AKTORI', '1421024196', '39808193925C120D55142548E85C61B7', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024197', 'MA\'RUFI SUADIAH', '1421024197', 'E656D3C9A122C8465C65D8876243FBA9', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024198', 'MAUIDLOTUL MUDRIKAH', '1421024198', '7F04F143D33A0664409B84F99912C831', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024199', 'MOHAMMAD BAYU AINUL IQBAL', '1421024199', '2C34F4CE2CB5413D5643F4B2421A464D', 'L', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024200', 'NIHAYATUL KHUSNA', '1421024200', '5EE6789F12FAC5D76A5C57ADC9044DE2', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024201', 'NINUK HERNA MAYA', '1421024201', '0AABA84E2892853F92086E98C6E5A037', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024202', 'NUR HARIYATI', '1421024202', 'C3A19074B78D6F801270F06DE9BDE558', 'P', '', '0000-00-00', 'Islam', '', '', '', '', 2014, 'aktif', '', ''),
('1421024203', 'NUR KHOZIN ', '1421024203', '2485C12268E97A0F0A83F8C01005C452', 'La', '', '0000-00-00', 'Islam', '', '', '', '', 2014, '', '', ''),
('1421024204', 'TRI SANTIKO ANDI YAHYA', '1421024204', 'D975B32CE545B124B3462234AE40CBAA', 'La', '', '0000-00-00', 'Islam', '', '', '', '', 2014, '', '', ''),
('nim', 'nama_mahasiswa', 'username', 'password', 'je', 'tempat_lahir', '0000-00-00', 'agama', 'alamat_asli', 'alamat_tinggal', 'phone', 'sekolah_asal', 0000, '', 'nama_ibu', 'nama_bapak');

-- --------------------------------------------------------

--
-- Table structure for table `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id_mk` varchar(15) NOT NULL,
  `nama_mk` varchar(20) NOT NULL,
  `deskripsi_mk` varchar(30) NOT NULL,
  `jml_jam` int(5) NOT NULL,
  `jml_sks` int(5) NOT NULL,
  `smt` enum('01','02','03','04') NOT NULL,
  `status_mk` enum('aktif','nonaktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id_mk`, `nama_mk`, `deskripsi_mk`, `jml_jam`, `jml_sks`, `smt`, `status_mk`) VALUES
('1', 'BASIS DATA', 'data base', 5, 3, '04', 'aktif'),
('2', 'B. INGGRIS', 'Bahasa Inggris', 3, 3, '04', 'aktif'),
('3', 'PKL', 'PKL adalah ...', 2, 4, '04', 'aktif'),
('4', 'APLIKOM', 'Aplikom adalah', 4, 2, '04', 'aktif'),
('5', 'INJARKOM', 'INJARKOM adalah', 3, 2, '04', 'aktif'),
('6', 'FRAMEWORK', 'Framework adalah', 4, 3, '04', 'aktif'),
('7', 'PEMROGRAMAN MOBILE', 'pemrograman mobile', 6, 3, '04', 'aktif'),
('8', 'ARTIFICIAL INTELLIGE', 'AI', 3, 2, '04', 'aktif'),
('9', 'KEAMANAN SISTEM DAN ', 'Kamjar', 2, 3, '04', 'aktif'),
('10', 'MANAJEMEN PROYEK', 'proyek', 5, 3, '04', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `pertanyaan`
--

CREATE TABLE `pertanyaan` (
  `id_pertanyaan` varchar(10) NOT NULL,
  `pertanyaan` varchar(200) NOT NULL,
  `kategori` enum('positif','negatif','','') NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pertanyaan`
--

INSERT INTO `pertanyaan` (`id_pertanyaan`, `pertanyaan`, `kategori`, `status`) VALUES
('1', 'Memberikan kuliah tepat waktu sesuai dengan jadwal kuliah ', 'positif', 'aktif'),
('2', 'Memenuhi dan memberikan kuliah sesuai dengan jam SKS', 'positif', 'aktif'),
('3', 'Menyampaikan deskripsi/ kompetensi/ tujuan/pokok materi mata kuliah dengan jelas.', 'positif', 'aktif'),
('4', 'Menyajikan materi perkuliahan dengan jelas', 'positif', 'aktif'),
('5', 'Mahasiswa dapat memahami materi yang telah diajarkan', 'positif', 'aktif'),
('6', 'Melibatkan mahasiswa secara aktif.', 'positif', 'aktif'),
('7', 'Meningkatkan motivasi belajar mahasiswa', 'positif', 'aktif'),
('8', 'Merespon dengan benar pernyataan mahasiswa, dan dosen menguasai dan siap dengan materi yang diajarkan', 'positif', 'aktif'),
('9', 'Menggunakan metode pembelajaran yang tepat (diskusi, demonstrasi, simulasi, dll)', 'positif', 'aktif'),
('10', 'Memanfaatkan sumber belajar secara maksimal (multy media, buku, perpustakaan, lingkungan sekitar, dll)', 'positif', 'aktif'),
('11', 'Menginformasikan buku rujukan mata kuliah secara lengkap', 'positif', 'aktif'),
('12', 'Memberikan test/ tugas/ latihan setelah penyampaian materi', 'positif', 'aktif'),
('13', 'Memberikan umpan balik pada test/ latihan/ tugas yang dikerjakan oleh mahasiswa', 'positif', 'aktif'),
('14', 'Menginformasikan hasil tes sesuai dengan waktu yang ditetapkan', 'positif', 'aktif'),
('15', 'Membangun etika, disiplin, kejujuran, tanggung jawab, dan menghargai pendapat orang lain', 'positif', 'aktif');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(11) NOT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` text,
  `hak_akses` enum('admin','administrator','mahasiswa','pimpinan') NOT NULL,
  `status` enum('aktif','nonaktif') NOT NULL,
  `id_kar` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `username`, `password`, `hak_akses`, `status`, `id_kar`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'aktif', '11'),
(25, 'admin1', 'e00cf25ad42683b3df678c61f42c6bda', 'admin', 'aktif', '22');

-- --------------------------------------------------------

--
-- Stand-in structure for view `polingdsn`
-- (See below for the actual view)
--
CREATE TABLE `polingdsn` (
`id_kelas` varchar(10)
,`id_dosen` varchar(20)
,`nama_dosen` varchar(100)
,`id_mk` varchar(15)
,`nama_mk` varchar(20)
,`nilai` double
);

-- --------------------------------------------------------

--
-- Table structure for table `polling`
--

CREATE TABLE `polling` (
  `nim` varchar(15) NOT NULL,
  `id_polling` varchar(11) NOT NULL,
  `id_kelas` varchar(11) NOT NULL,
  `id_soal` varchar(11) NOT NULL,
  `kriteria_nilai` varchar(11) NOT NULL,
  `id_dosen` varchar(20) NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `polling`
--

INSERT INTO `polling` (`nim`, `id_polling`, `id_kelas`, `id_soal`, `kriteria_nilai`, `id_dosen`, `waktu`) VALUES
('1421024189', '2018-09-27 ', '201805mi02', '1', '001', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '2', '001', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '3', '002', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '4', '001', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '5', '003', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '6', '003', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '7', '001', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '8', '001', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '9', '002', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '10', '001', '1', '2018-09-27 14:38:02'),
('1421024189', '2018-09-27 ', '201805mi02', '1', '001', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '2', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '3', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '4', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '5', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '6', '001', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '7', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '8', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '9', '002', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '10', '001', '4', '2018-09-27 14:38:25'),
('1421024189', '2018-09-27 ', '201805mi02', '1', '001', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '2', '002', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '3', '003', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '4', '002', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '5', '001', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '6', '002', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '7', '003', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '8', '001', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '9', '002', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '10', '001', '2', '2018-09-27 14:38:51'),
('1421024189', '2018-09-27 ', '201805mi02', '1', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '2', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '3', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '4', '002', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '5', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '6', '002', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '7', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '8', '002', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '9', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '10', '001', '3', '2018-09-27 14:39:17'),
('1421024189', '2018-09-27 ', '201805mi02', '1', '002', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '2', '002', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '3', '003', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '4', '001', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '5', '002', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '6', '003', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '7', '002', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '8', '001', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '9', '001', '101', '2018-09-27 14:39:42'),
('1421024189', '2018-09-27 ', '201805mi02', '10', '003', '101', '2018-09-27 14:39:42'),
('1421024181', '2018-09-27 ', '201805ti04', '1', '002', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '2', '001', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '3', '001', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '4', '002', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '5', '001', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '6', '002', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '7', '001', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '8', '002', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '9', '001', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '10', '002', '101', '2018-09-27 14:41:37'),
('1421024181', '2018-09-27 ', '201805ti04', '1', '002', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '2', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '3', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '4', '002', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '5', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '6', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '7', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '8', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '9', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '10', '001', '6', '2018-09-27 14:41:59'),
('1421024181', '2018-09-27 ', '201805ti04', '1', '003', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '2', '003', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '3', '004', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '4', '002', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '5', '003', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '6', '003', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '7', '002', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '8', '003', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '9', '002', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '10', '003', '5', '2018-09-27 14:42:21'),
('1421024181', '2018-09-27 ', '201805ti04', '1', '003', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '2', '002', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '3', '001', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '4', '001', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '5', '001', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '6', '001', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '7', '002', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '8', '002', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '9', '002', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '10', '002', '8', '2018-09-27 14:42:44'),
('1421024181', '2018-09-27 ', '201805ti04', '1', '001', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '2', '002', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '3', '003', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '4', '003', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '5', '002', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '6', '003', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '7', '003', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '8', '002', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '9', '003', '10', '2018-09-27 14:43:08'),
('1421024181', '2018-09-27 ', '201805ti04', '10', '003', '10', '2018-09-27 14:43:08'),
('1421024179', '2018-09-28 ', '201805ti08', '1', '003', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '2', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '3', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '4', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '5', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '6', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '7', '002', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '8', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '9', '001', '9', '2018-09-28 06:59:33'),
('1421024179', '2018-09-28 ', '201805ti08', '10', '001', '9', '2018-09-28 06:59:33'),
('1421024178', '2018-10-29 ', '201703ti01', '1', '001', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '2', '003', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '3', '002', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '4', '001', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '5', '002', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '6', '001', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '7', '001', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '8', '002', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '9', '003', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-10-29 ', '201703ti01', '10', '002', '6', '2018-10-29 03:05:27'),
('1421024178', '2018-11-19 ', '201805mi02', '1', '001', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '2', '001', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '3', '001', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '4', '002', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '5', '003', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '6', '002', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '7', '002', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '8', '001', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '9', '004', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '10', '003', '1', '2018-11-19 04:12:51'),
('1421024178', '2018-11-19 ', '201805mi02', '1', '002', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '2', '001', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '3', '001', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '4', '001', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '5', '002', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '6', '002', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '7', '002', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '8', '002', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '9', '001', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '10', '003', '4', '2018-11-19 04:13:18'),
('1421024178', '2018-11-19 ', '201805mi02', '1', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '2', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '3', '003', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '4', '003', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '5', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '6', '002', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '7', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '8', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '9', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '10', '001', '2', '2018-11-19 04:13:49'),
('1421024178', '2018-11-19 ', '201805mi02', '1', '001', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '2', '002', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '3', '001', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '4', '001', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '5', '003', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '6', '004', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '7', '002', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '8', '002', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '9', '003', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '10', '003', '3', '2018-11-19 04:14:17'),
('1421024178', '2018-11-19 ', '201805mi02', '1', '003', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '2', '002', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '3', '004', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '4', '003', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '5', '004', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '6', '002', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '7', '001', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '8', '001', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '9', '001', '101', '2018-11-19 04:14:42'),
('1421024178', '2018-11-19 ', '201805mi02', '10', '001', '101', '2018-11-19 04:14:42');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `id_prodi` varchar(3) NOT NULL,
  `nama_prodi` varchar(50) NOT NULL,
  `status` enum('aktif','nonaktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `nama_prodi`, `status`) VALUES
('123', 'Manajemen Informatika', 'nonaktif'),
('mi', 'Manajemen Informatika', 'aktif'),
('ti', 'Teknik Informatika', 'aktif');

-- --------------------------------------------------------

--
-- Stand-in structure for view `rank`
-- (See below for the actual view)
--
CREATE TABLE `rank` (
`tahun` varchar(6)
,`id_dosen` varchar(20)
,`nama_dosen` varchar(100)
,`nilai` double
,`rata` float
,`rank` int(3)
);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_semester`
--

CREATE TABLE `tahun_semester` (
  `id_tahun_semester` varchar(20) NOT NULL,
  `tahun` varchar(5) NOT NULL,
  `semester` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_semester`
--

INSERT INTO `tahun_semester` (`id_tahun_semester`, `tahun`, `semester`) VALUES
('201703', '2017', '03'),
('201805', '2018', '05');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_semester_soal`
--

CREATE TABLE `tahun_semester_soal` (
  `id_tahun_semester` varchar(10) NOT NULL,
  `id_soal` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun_semester_soal`
--

INSERT INTO `tahun_semester_soal` (`id_tahun_semester`, `id_soal`) VALUES
('201805', '1'),
('201805', '2'),
('201805', '3'),
('201805', '4'),
('201805', '5'),
('201805', '6'),
('201805', '7'),
('201805', '8'),
('201805', '9'),
('201805', '10');

-- --------------------------------------------------------

--
-- Table structure for table `tata_usaha`
--

CREATE TABLE `tata_usaha` (
  `id_tu` varchar(20) NOT NULL,
  `nama_tu` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `tmpt_lahir` varchar(25) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `agama` enum('Islam','Kristen','Protestan','Budha','Hindu','KongHuChu','Kepercayaan') NOT NULL,
  `pendidikan_akhir` enum('SMA','D1','D2','D3','D4','S1','S2','S3') NOT NULL,
  `status_kepegawaian` enum('pns','gtt','') NOT NULL,
  `status_keanggotaan` enum('aktif','nonaktif','') NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tata_usaha`
--

INSERT INTO `tata_usaha` (`id_tu`, `nama_tu`, `username`, `password`, `tmpt_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `pendidikan_akhir`, `status_kepegawaian`, `status_keanggotaan`, `alamat`) VALUES
('22', 'ADMIN', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Bojonegoro', '1996-05-18', 'L', 'Islam', 'S2', 'pns', 'aktif', 'Ds. Sumodikaran Dk. Tempuran Kec. Dander');

-- --------------------------------------------------------

--
-- Table structure for table `validasi_maha`
--

CREATE TABLE `validasi_maha` (
  `id_validasi` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `nim` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `validasi_maha`
--

INSERT INTO `validasi_maha` (`id_validasi`, `date`, `nim`) VALUES
('1421024178-2016-06-20', '2016-06-20', '1421024178'),
('1421024178-2018-10-01', '2018-10-01', '1421024178'),
('1421024178-2018-10-05', '2018-10-05', '1421024178'),
('1421024179-2016-06-12', '2016-06-12', '1421024179'),
('1421024179-2016-06-15', '2016-06-15', '1421024179'),
('1421024179-2016-06-17', '2016-06-17', '1421024179'),
('1421024179-2016-06-18', '2016-06-18', '1421024179'),
('1421024179-2016-06-20', '2016-06-20', '1421024179'),
('1421024179-2016-07-26', '2016-07-26', '1421024179'),
('1421024179-2016-08-19', '2016-08-19', '1421024179'),
('1421024179-2018-09-28', '2018-09-28', '1421024179'),
('1421024181-2018-09-27', '2018-09-27', '1421024181'),
('1421024181-2018-10-01', '2018-10-01', '1421024181'),
('1421024189-2016-09-28', '2016-09-28', '1421024189'),
('1421024189-2018-09-27', '2018-09-27', '1421024189'),
('1421024198-2016-09-28', '2016-09-28', '1421024198'),
('201606131421024179', '2016-06-13', '1421024179'),
('201606151421024179', '2016-06-15', '1421024179'),
('201606171421024179', '2016-06-17', '1421024179'),
('201606181421024179', '2016-06-18', '1421024179'),
('201606201421024178', '2016-06-20', '1421024178'),
('201606201421024179', '2016-06-20', '1421024179'),
('201607261421024179', '2016-07-26', '1421024179'),
('201608191421024179', '2016-08-19', '1421024179'),
('201608231421024179', '2016-08-23', '1421024179'),
('201609281421024189', '2016-09-28', '1421024189'),
('201609281421024198', '2016-09-28', '1421024198'),
('201809271421024181', '2018-09-27', '1421024181'),
('201809271421024189', '2018-09-27', '1421024189'),
('201809281421024179', '2018-09-28', '1421024179'),
('201810011421024178', '2018-10-01', '1421024178'),
('201810011421024181', '2018-10-01', '1421024181'),
('201810051421024178', '2018-10-05', '1421024178'),
('201810081421024178', '2018-10-08', '1421024178');

-- --------------------------------------------------------

--
-- Structure for view `dosen_mhs`
--
DROP TABLE IF EXISTS `dosen_mhs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dosen_mhs`  AS  select `km`.`id_kelas` AS `id_kelas`,`km`.`nim` AS `nim`,`d`.`id_dosen` AS `id_dosen`,`d`.`nama_dosen` AS `nama_dosen`,`d`.`nama_mk` AS `nama_mk` from ((`detail_jadwal` `dj` join `kelas_mahasiswa` `km` on((`km`.`id_kelas` = substr(`dj`.`id_detail_jadwal`,1,10)))) join `dosen_mk` `d` on((`d`.`id_dosen` = `dj`.`id_dosen`))) order by `d`.`nama_dosen` ;

-- --------------------------------------------------------

--
-- Structure for view `dosen_mk`
--
DROP TABLE IF EXISTS `dosen_mk`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dosen_mk`  AS  select distinct substr(`dj`.`id_jadwal`,1,10) AS `id_kelas`,substr(`dj`.`id_jadwal`,1,4) AS `tahun`,substr(`dj`.`id_jadwal`,6,1) AS `semseter`,substr(`dj`.`id_jadwal`,7,4) AS `kelas`,`d`.`id_dosen` AS `id_dosen`,`d`.`nama_dosen` AS `nama_dosen`,`mk`.`id_mk` AS `id_mk`,`mk`.`nama_mk` AS `nama_mk` from ((`detail_jadwal` `dj` join `dosen` `d`) join `mata_kuliah` `mk`) where ((`d`.`id_dosen` = `dj`.`id_dosen`) and (`dj`.`id_mk` = `mk`.`id_mk`)) ;

-- --------------------------------------------------------

--
-- Structure for view `jumlah_mhs`
--
DROP TABLE IF EXISTS `jumlah_mhs`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `jumlah_mhs`  AS  select `km`.`id_kelas` AS `id_kelas`,`km`.`nim` AS `nim`,`dj`.`id_dosen` AS `id_dosen` from (`kelas_mahasiswa` `km` join `detail_jadwal` `dj` on((`km`.`id_kelas` = substr(`dj`.`id_detail_jadwal`,1,10)))) where (`dj`.`status` = 'aktif') group by `km`.`nim`,`km`.`id_kelas`,`dj`.`id_dosen` ;

-- --------------------------------------------------------

--
-- Structure for view `polingdsn`
--
DROP TABLE IF EXISTS `polingdsn`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `polingdsn`  AS  select distinct `d`.`id_kelas` AS `id_kelas`,`d`.`id_dosen` AS `id_dosen`,`d`.`nama_dosen` AS `nama_dosen`,`d`.`id_mk` AS `id_mk`,`d`.`nama_mk` AS `nama_mk`,sum(if(((`kn`.`id_kriteria_nilai` = `p`.`kriteria_nilai`) and (substr(`p`.`id_kelas`,1,6) = substr(`d`.`id_kelas`,1,6))),`kn`.`kriteria_nilai`,0)) AS `nilai` from ((`polling` `p` join `kriteria_nilai` `kn` on((`kn`.`id_kriteria_nilai` = `p`.`kriteria_nilai`))) join `dosen_mk` `d` on((`d`.`id_dosen` = `p`.`id_dosen`))) group by `p`.`id_dosen`,`d`.`kelas` order by sum(if(((`kn`.`id_kriteria_nilai` = `p`.`kriteria_nilai`) and (substr(`p`.`id_kelas`,1,6) = substr(`d`.`id_kelas`,1,6))),`kn`.`kriteria_nilai`,0)) desc ;

-- --------------------------------------------------------

--
-- Structure for view `rank`
--
DROP TABLE IF EXISTS `rank`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rank`  AS  select substr(`polingdsn`.`id_kelas`,1,6) AS `tahun`,`polingdsn`.`id_dosen` AS `id_dosen`,`polingdsn`.`nama_dosen` AS `nama_dosen`,`polingdsn`.`nilai` AS `nilai`,`RATA`(`polingdsn`.`id_dosen`,substr(`polingdsn`.`id_kelas`,1,6)) AS `rata`,find_in_set(`polingdsn`.`nilai`,(select group_concat(distinct `polingdsn`.`nilai` order by `polingdsn`.`nilai` DESC separator ',') from `polingdsn` where find_in_set(`tahun`,`tahun`))) AS `rank` from `polingdsn` order by `polingdsn`.`nama_dosen` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id_dosen`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`id_prodi`);

--
-- Indexes for table `tahun_semester`
--
ALTER TABLE `tahun_semester`
  ADD PRIMARY KEY (`id_tahun_semester`),
  ADD KEY `id_tahun_semester` (`id_tahun_semester`);

--
-- Indexes for table `tata_usaha`
--
ALTER TABLE `tata_usaha`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indexes for table `validasi_maha`
--
ALTER TABLE `validasi_maha`
  ADD PRIMARY KEY (`id_validasi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
