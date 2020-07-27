-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2017 at 06:21 PM
-- Server version: 5.5.54-cll
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ordodev_sideka`
--

-- --------------------------------------------------------

--
-- Table structure for table `ref_agama`
--

CREATE TABLE `ref_agama` (
  `id_agama` int(5) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `is_diakui` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_agama`
--

INSERT INTO `ref_agama` (`id_agama`, `deskripsi`, `is_diakui`) VALUES
(0, 'Tidak Diketahui', 'Y'),
(1, 'Islam', 'Y'),
(2, 'Kristen', 'Y'),
(3, 'Katholik', 'Y'),
(4, 'Hindu', 'Y'),
(5, 'Budha', 'Y'),
(6, 'Konghucu', 'Y'),
(7, 'Aliran Kepercayaan Kepada Tuhan YME', 'N'),
(8, 'Aliran Kepercayaan Lainnya', 'N'),
(9, 'isis', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `ref_alasan_pindah`
--

CREATE TABLE `ref_alasan_pindah` (
  `id_alasan_pindah` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_alasan_pindah`
--

INSERT INTO `ref_alasan_pindah` (`id_alasan_pindah`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Table structure for table `ref_desa`
--

CREATE TABLE `ref_desa` (
  `id_desa` int(10) NOT NULL,
  `kode_desa_bps` char(20) NOT NULL,
  `kode_desa_kemendagri` char(20) NOT NULL,
  `nama_desa` varchar(50) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `id_kecamatan` int(10) NOT NULL,
  `id_penduduk` int(10) DEFAULT NULL,
  `alamat_desa` text,
  `kode_pos` char(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_desa`
--

INSERT INTO `ref_desa` (`id_desa`, `kode_desa_bps`, `kode_desa_kemendagri`, `nama_desa`, `luas_wilayah`, `id_kecamatan`, `id_penduduk`, `alamat_desa`, `kode_pos`) VALUES
(0, '0', '0', 'Tidak Diketahui', 0, 0, NULL, '0', '0'),
(1, '34.03.03.31', '34.03.03.31', 'Ngawung', 97.5, 1, NULL, 'Jl. Merdeka No 45', '97');

-- --------------------------------------------------------

--
-- Table structure for table `ref_difabilitas`
--

CREATE TABLE `ref_difabilitas` (
  `id_difabilitas` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_difabilitas`
--

INSERT INTO `ref_difabilitas` (`id_difabilitas`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Tidak Cacat'),
(2, 'Cacat Fisik'),
(3, 'Cacat Netra / Buta'),
(4, 'Cacat Rungu / Wicara'),
(5, 'Cacat Mental / Jiwa'),
(6, 'Cacat Lainnya'),
(7, 'cacat tangan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_dusun`
--

CREATE TABLE `ref_dusun` (
  `id_dusun` int(10) NOT NULL,
  `kode_dusun_bps` char(20) NOT NULL,
  `kode_dusun_kemendagri` char(20) NOT NULL,
  `nama_dusun` varchar(50) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `id_desa` int(10) NOT NULL,
  `id_penduduk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_dusun`
--

INSERT INTO `ref_dusun` (`id_dusun`, `kode_dusun_bps`, `kode_dusun_kemendagri`, `nama_dusun`, `luas_wilayah`, `id_desa`, `id_penduduk`) VALUES
(0, '0', '0', 'Tidak Diketahui', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_goldar`
--

CREATE TABLE `ref_goldar` (
  `id_goldar` int(10) NOT NULL,
  `deskripsi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_goldar`
--

INSERT INTO `ref_goldar` (`id_goldar`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'A'),
(2, 'A+'),
(3, 'A-'),
(4, 'B'),
(5, 'B+'),
(6, 'B-'),
(7, 'AB'),
(8, 'AB+'),
(9, 'AB-'),
(10, 'O'),
(11, 'O+'),
(12, 'O-'),
(13, 'A+++');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jabatan`
--

CREATE TABLE `ref_jabatan` (
  `id_jabatan` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_jabatan`
--

INSERT INTO `ref_jabatan` (`id_jabatan`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Kepala Desa'),
(3, 'Sekretaris Desa'),
(5, 'Bendahara Desa'),
(6, 'Kaur Kesejahteraan Rakyat'),
(7, 'Kaur Pemerintahan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jenis_pindah`
--

CREATE TABLE `ref_jenis_pindah` (
  `id_jenis_pindah` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_jenis_pindah`
--

INSERT INTO `ref_jenis_pindah` (`id_jenis_pindah`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Table structure for table `ref_jen_kel`
--

CREATE TABLE `ref_jen_kel` (
  `id_jen_kel` int(2) NOT NULL,
  `deskripsi` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_jen_kel`
--

INSERT INTO `ref_jen_kel` (`id_jen_kel`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Laki - laki'),
(2, 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kab_kota`
--

CREATE TABLE `ref_kab_kota` (
  `id_kab_kota` int(10) NOT NULL,
  `kode_kab_kota_bps` char(10) NOT NULL,
  `kode_kab_kota_kemendagri` char(10) NOT NULL,
  `nama_kab_kota` varchar(50) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `id_provinsi` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kab_kota`
--

INSERT INTO `ref_kab_kota` (`id_kab_kota`, `kode_kab_kota_bps`, `kode_kab_kota_kemendagri`, `nama_kab_kota`, `luas_wilayah`, `id_provinsi`) VALUES
(0, '0', '0', 'Tidak Diketahui', 0, 0),
(1, '34.03', '34.03', 'Gunungkidul', 1485.36, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_kecamatan`
--

CREATE TABLE `ref_kecamatan` (
  `id_kecamatan` int(10) NOT NULL,
  `kode_kecamatan_bps` char(10) NOT NULL,
  `kode_kecamatan_kemendagri` char(10) NOT NULL,
  `nama_kecamatan` varchar(50) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `id_kab_kota` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kecamatan`
--

INSERT INTO `ref_kecamatan` (`id_kecamatan`, `kode_kecamatan_bps`, `kode_kecamatan_kemendagri`, `nama_kecamatan`, `luas_wilayah`, `id_kab_kota`) VALUES
(0, '0', '0', 'Tidak Diketahui', 0, 0),
(1, '34.03.03', '34.03.03', 'Plajen', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `ref_kelas_sosial`
--

CREATE TABLE `ref_kelas_sosial` (
  `id_kelas_sosial` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kelas_sosial`
--

INSERT INTO `ref_kelas_sosial` (`id_kelas_sosial`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Kaya'),
(2, 'Sedang'),
(3, 'Miskin'),
(4, 'Sangat Miskin');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kewarganegaraan`
--

CREATE TABLE `ref_kewarganegaraan` (
  `id_kewarganegaraan` int(15) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kewarganegaraan`
--

INSERT INTO `ref_kewarganegaraan` (`id_kewarganegaraan`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'WNI'),
(2, 'WNA'),
(3, 'DWIKEWARGANEGARAAN'),
(4, 'alient');

-- --------------------------------------------------------

--
-- Table structure for table `ref_klasifikasi_pindah`
--

CREATE TABLE `ref_klasifikasi_pindah` (
  `id_klasifikasi_pindah` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_klasifikasi_pindah`
--

INSERT INTO `ref_klasifikasi_pindah` (`id_klasifikasi_pindah`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Tidak Diketahui');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kode_surat`
--

CREATE TABLE `ref_kode_surat` (
  `kode_surat` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `supra_kode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kode_surat`
--

INSERT INTO `ref_kode_surat` (`kode_surat`, `deskripsi`, `supra_kode`) VALUES
(1, 'Umum', '0'),
(2, 'Pemerintah', '100'),
(3, 'Politik', '200'),
(4, 'Keamanan / Ketertiban', '300'),
(5, 'Kesejahteraan Rakyat', '400'),
(6, 'Perekonomian', '500'),
(7, 'Pekerjaan Umum dan Ketenagakerjaan', '600'),
(8, 'Pengawasan', '700'),
(9, 'Kepegawaian', '800'),
(10, 'Keuangan', '900'),
(11, 'Kelahiran', '1000'),
(13, 'Kematian', '1100'),
(14, 'SKTM', '00032');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kompetensi`
--

CREATE TABLE `ref_kompetensi` (
  `id_kompetensi` int(5) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kompetensi`
--

INSERT INTO `ref_kompetensi` (`id_kompetensi`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Kesehatan'),
(2, 'Profesional Bangunan'),
(3, 'Profesional Kelistrikan'),
(4, 'Profesional Pendidikan'),
(5, 'ahli memasak');

-- --------------------------------------------------------

--
-- Table structure for table `ref_kontrasepsi`
--

CREATE TABLE `ref_kontrasepsi` (
  `id_kontrasepsi` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_kontrasepsi`
--

INSERT INTO `ref_kontrasepsi` (`id_kontrasepsi`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Pil'),
(2, 'Suntik'),
(3, 'IUD'),
(4, 'Kondom'),
(5, 'Implant'),
(6, 'MOP'),
(7, 'MOW');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pangkat_gol`
--

CREATE TABLE `ref_pangkat_gol` (
  `id_pangkat_gol` int(10) NOT NULL,
  `deskripsi` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pangkat_gol`
--

INSERT INTO `ref_pangkat_gol` (`id_pangkat_gol`, `deskripsi`) VALUES
(0, '-'),
(1, '3A'),
(2, '3B');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pekerjaan`
--

CREATE TABLE `ref_pekerjaan` (
  `id_pekerjaan` int(15) NOT NULL,
  `deskripsi` varchar(75) NOT NULL,
  `deskripsi_singkat` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pekerjaan`
--

INSERT INTO `ref_pekerjaan` (`id_pekerjaan`, `deskripsi`, `deskripsi_singkat`) VALUES
(0, 'Tidak Diketahui', NULL),
(1, 'BELUM/TIDAK BEKERJA', ''),
(2, 'MENGURUS RUMAH TANGGA', ''),
(3, 'PELAJAR/MAHASISWA', ''),
(4, 'PENSIUNAN', ''),
(5, 'PEGAWAI NEGERI SIPIL (PNS)', ''),
(6, 'TENTARA NASIONAL INDONESIA (TNI)', ''),
(7, 'KEPOLISIAN RI ', ''),
(8, 'PERDAGANGAN', ''),
(9, 'PETANI/PEKEBUN', ''),
(10, 'PETERNAK', ''),
(11, 'NELAYAN/PERIKANAN', ''),
(12, 'INDUSTRI', ''),
(13, 'KONSTRUKSI', ''),
(14, 'TRANSPORTASI', ''),
(15, 'KARYAWAN SWASTA', ''),
(16, 'KARYAWAN BUMN', ''),
(17, 'KARYAWAN HONORER', ''),
(18, 'BURUH HARIAN LEPAS', ''),
(19, 'BURUH TANI/PERKEBUNAN', ''),
(20, 'BURUH NELAYAN/PERIKANAN', ''),
(21, 'BURUH PETERNAKAN', ''),
(22, 'PEMBANTU RUMAH TANGGA', ''),
(23, 'TUKANG CUKUR', ''),
(24, 'TUKANG BATU', ''),
(25, 'TUKANG LISTRIK', ''),
(26, 'TUKANG KAYU', ''),
(27, 'TUKANG SOL SEPATU', ''),
(28, 'TUKANG LAS/PANDAI BESI', ''),
(29, 'TUKANG JAIT', ''),
(30, 'TUKANG GIGI', ''),
(31, 'PENATA RIAS', ''),
(32, 'PENATA BUSANA', ''),
(33, 'PENATA RAMBUT', ''),
(34, 'MEKANIK', ''),
(35, 'SENIMAN', ''),
(36, 'TABIB', ''),
(37, 'PARAJI', ''),
(38, 'PERANCANG BUSANA', ''),
(39, 'PENTERJEMAH', ''),
(40, 'IMAM MASJID', ''),
(41, 'PENDETA', ''),
(42, 'PASTOR', ''),
(43, 'WARTAWAN', ''),
(44, 'USTADZ/MUBALIGH', ''),
(45, 'JURU MASAK', ''),
(46, 'PROMOTOR ACARA', ''),
(47, 'ANGGOTA DPR RI', ''),
(48, 'ANGGOTA DPD', ''),
(49, 'ANGGOTA BPK', ''),
(50, 'PRESIDEN', ''),
(51, 'WAKIL PRESIDEN', ''),
(52, 'ANGGOTA MAHKAMAH KONSTITUSI', ''),
(53, 'DUTA BESAR', ''),
(54, 'GUBERNUR', ''),
(55, 'WAKIL GUBERNUR', ''),
(56, 'BUPATI', ''),
(57, 'WAKIL BUPATI', ''),
(58, 'WALIKOTA', ''),
(59, 'WAKIL WALIKOTA', ''),
(60, 'ANGGOTA DPRD PROP', ''),
(61, 'ANGGOTA DPRD KAB. KOTA', ''),
(62, 'DOSEN', ''),
(63, 'GURU', ''),
(64, 'PILOT', ''),
(65, 'PENGACARA', ''),
(66, 'NOTARIS', ''),
(67, 'ARSITEK', ''),
(68, 'AKUNTAN', ''),
(69, 'KONSULTAN', ''),
(70, 'DOKTER', ''),
(71, 'BIDAN', ''),
(72, 'PERAWAT', ''),
(73, 'APOTEKER', ''),
(74, 'PSIKIATER/PSIKOLOG', ''),
(75, 'PENYIAR TELEVISI', ''),
(76, 'PENYIAR RADIO', ''),
(77, 'PELAUT', ''),
(78, 'PENELITI', ''),
(79, 'SOPIR', ''),
(80, 'PIALANG', ''),
(81, 'PARANORMAL', ''),
(82, 'PEDAGANG', ''),
(83, 'PERANGKAT DESA', ''),
(84, 'KEPALA DESA', ''),
(85, 'BIARAWATI', ''),
(86, 'WIRASWASTA', ''),
(87, 'BURUH MIGRAN', ''),
(88, 'programmer', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_pekerjaan_ped`
--

CREATE TABLE `ref_pekerjaan_ped` (
  `id_pekerjaan_ped` int(10) NOT NULL,
  `deskripsi` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pekerjaan_ped`
--

INSERT INTO `ref_pekerjaan_ped` (`id_pekerjaan_ped`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Tidak Diketahui'),
(2, 'Petani'),
(3, 'Pedagang'),
(4, 'Petani Kebun'),
(5, 'Tukang Batu / Jasa Lainnya'),
(6, 'Seniman');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pelapor`
--

CREATE TABLE `ref_pelapor` (
  `id_pelapor` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pelapor`
--

INSERT INTO `ref_pelapor` (`id_pelapor`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Ayah'),
(2, 'Ibu'),
(3, 'Kakak'),
(4, 'Adik'),
(5, 'Kakek'),
(6, 'Nenek'),
(7, 'Paman'),
(8, 'Tante'),
(9, 'Keponakan'),
(10, 'Sepupu'),
(11, 'Kerabat');

-- --------------------------------------------------------

--
-- Table structure for table `ref_pendidikan`
--

CREATE TABLE `ref_pendidikan` (
  `id_pendidikan` int(15) NOT NULL,
  `deskripsi` varchar(75) NOT NULL,
  `is_bsm` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_pendidikan`
--

INSERT INTO `ref_pendidikan` (`id_pendidikan`, `deskripsi`, `is_bsm`) VALUES
(0, 'Tidak Diketahui', 'N'),
(1, 'Tidak dapat membaca', 'N'),
(2, 'Tidak Pernah Sekolah', 'N'),
(3, 'Tidak Tamat SD/Sederajat', 'N'),
(4, 'Tamat SD/Sederajat', 'N'),
(5, 'Tamat SMP/Sederajat', 'N'),
(6, 'Tamat SMA/Sederajat', 'N'),
(7, 'Tamat D-3/Sederajat', 'N'),
(8, 'Tamat S-1/Sederajat', 'N'),
(9, 'Tamat S-2/Sederajat', 'N'),
(10, 'Tamat S-3/Sederajat', 'N'),
(11, 'Belum Masuk TK/PAUD ', 'N'),
(12, 'Sedang TK/PAUD', 'N'),
(13, 'Sedang SD/Sederajat', 'Y'),
(14, 'Sedang SMP/Sederajat', 'Y'),
(15, 'Sedang SMA/Sederajat', 'Y'),
(16, 'Sedang D-3/Sederajat', 'N'),
(17, 'Sedang S-1/Sederajat', 'N'),
(18, 'Sedang S-2/Sederajat', 'N'),
(19, 'Sedang S-3/Sederajat', 'N'),
(20, 'Putus Sekolah', 'N'),
(21, 'jenius', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `ref_provinsi`
--

CREATE TABLE `ref_provinsi` (
  `id_provinsi` int(10) NOT NULL,
  `kode_provinsi_bps` char(10) NOT NULL,
  `kode_provinsi_kemendagri` char(10) NOT NULL,
  `nama_provinsi` varchar(50) NOT NULL,
  `luas_wilayah` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_provinsi`
--

INSERT INTO `ref_provinsi` (`id_provinsi`, `kode_provinsi_bps`, `kode_provinsi_kemendagri`, `nama_provinsi`, `luas_wilayah`) VALUES
(0, '0', '0', 'Tidak Diketahui', 0),
(1, '34', '34', 'Daerah Istimewa Aceh', 3185);

-- --------------------------------------------------------

--
-- Table structure for table `ref_rt`
--

CREATE TABLE `ref_rt` (
  `id_rt` int(10) NOT NULL,
  `nomor_rt` char(10) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `id_rw` int(10) NOT NULL,
  `id_penduduk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_rt`
--

INSERT INTO `ref_rt` (`id_rt`, `nomor_rt`, `luas_wilayah`, `id_rw`, `id_penduduk`) VALUES
(0, '-', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_rw`
--

CREATE TABLE `ref_rw` (
  `id_rw` int(10) NOT NULL,
  `nomor_rw` char(10) NOT NULL,
  `luas_wilayah` float NOT NULL,
  `id_dusun` int(10) NOT NULL,
  `id_penduduk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_rw`
--

INSERT INTO `ref_rw` (`id_rw`, `nomor_rw`, `luas_wilayah`, `id_dusun`, `id_penduduk`) VALUES
(0, '-', 0, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ref_status_kawin`
--

CREATE TABLE `ref_status_kawin` (
  `id_status_kawin` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_status_kawin`
--

INSERT INTO `ref_status_kawin` (`id_status_kawin`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Belum Kawin'),
(2, 'Kawin'),
(3, 'Cerai Hidup'),
(4, 'Cerai Mati');

-- --------------------------------------------------------

--
-- Table structure for table `ref_status_keluarga`
--

CREATE TABLE `ref_status_keluarga` (
  `id_status_keluarga` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_status_keluarga`
--

INSERT INTO `ref_status_keluarga` (`id_status_keluarga`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Kepala Keluarga'),
(2, 'Suami'),
(3, 'Istri'),
(4, 'Anak'),
(5, 'Menantu'),
(6, 'Mertua'),
(7, 'Famili Lain'),
(8, 'selingkuh');

-- --------------------------------------------------------

--
-- Table structure for table `ref_status_penduduk`
--

CREATE TABLE `ref_status_penduduk` (
  `id_status_penduduk` int(5) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_status_penduduk`
--

INSERT INTO `ref_status_penduduk` (`id_status_penduduk`, `deskripsi`) VALUES
(0, 'Tidak diketahui'),
(1, 'Tinggal Tetap'),
(2, 'Meninggal'),
(3, 'Pindahan Keluar'),
(4, 'Pindahan Masuk'),
(5, 'bertahan');

-- --------------------------------------------------------

--
-- Table structure for table `ref_status_tinggal`
--

CREATE TABLE `ref_status_tinggal` (
  `id_status_tinggal` int(10) NOT NULL,
  `deskripsi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref_status_tinggal`
--

INSERT INTO `ref_status_tinggal` (`id_status_tinggal`, `deskripsi`) VALUES
(0, 'Tidak Diketahui'),
(1, 'Tinggal Tetap'),
(2, 'Tinggal di luar desa (dalam 1 kab/kota)'),
(3, 'Tinggal di luar kota'),
(4, 'Tinggal di luar provinsi'),
(5, 'Tinggal di luar negeri');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_berita`
--

CREATE TABLE `tbl_berita` (
  `id_berita` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `gambar` text NOT NULL,
  `judul_berita` varchar(100) NOT NULL,
  `isi_berita` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_berita`
--

INSERT INTO `tbl_berita` (`id_berita`, `id_pengguna`, `gambar`, `judul_berita`, `isi_berita`, `waktu`) VALUES
(1, 2, '', 'Sektor Utama Gunung Kidul Potensi Buah Manggis', '', '2015-04-30 18:11:53'),
(2, 2, '', 'UU Desa', '', '2015-04-30 18:11:58'),
(3, 2, '', 'Menkominfo Lepas Keberangkatan Tenaga Pendamping TI SIDeka', '', '2015-04-30 18:20:53'),
(4, 2, '', 'Panen Raya', '', '2015-04-30 18:12:06');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_demografi`
--

CREATE TABLE `tbl_demografi` (
  `id_demografi` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `isi_demografi` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_demografi`
--

INSERT INTO `tbl_demografi` (`id_demografi`, `id_pengguna`, `isi_demografi`, `waktu`, `foto_banner`) VALUES
(1, 2, '', '2015-04-11 10:02:36', 'uploads/web/foto_banner_demografi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gizi_buruk`
--

CREATE TABLE `tbl_gizi_buruk` (
  `id_gizi_buruk` int(10) NOT NULL,
  `berat_badan` int(10) NOT NULL,
  `tinggi_badan` int(10) NOT NULL,
  `tgl_timbang` datetime NOT NULL,
  `id_penduduk` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hub_kel`
--

CREATE TABLE `tbl_hub_kel` (
  `id_hub_kel` int(10) NOT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `id_penduduk` int(10) NOT NULL,
  `id_keluarga` int(10) NOT NULL,
  `id_status_keluarga` int(10) NOT NULL,
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_hub_kel`
--

INSERT INTO `tbl_hub_kel` (`id_hub_kel`, `nama_ayah`, `nama_ibu`, `id_penduduk`, `id_keluarga`, `id_status_keluarga`, `is_delete`) VALUES
(1, 'RAHMAN', 'LALA', 1, 1, 1, 'N'),
(2, 'HERMAN', 'NANA', 2, 1, 2, 'N'),
(3, 'FIRMANSYAH', 'RACHEL', 3, 1, 4, 'N'),
(4, 'FIRMANSYAH', 'RACHEL', 4, 1, 4, 'N'),
(5, 'AYAH', 'IBU', 5, 2, 1, 'N'),
(6, 'BAPAKNYA YOGI', 'IBUNYA YOGI', 6, 3, 1, 'N'),
(7, 'AL SUPARDI', 'MM YUNIATI', 7, 4, 1, 'N'),
(8, 'LUCAS SANDY', 'ISTRINYA LUCAS SANDY', 8, 4, 4, 'N'),
(9, 'YOGIE PALATINO', 'TINA', 9, 3, 4, 'N'),
(10, 'YOGIE PALATINO', 'TINA', 10, 3, 4, 'N'),
(11, 'AHMAD', 'DINA', 11, 3, 3, 'N'),
(12, 'DIMAN', 'YATI', 12, 4, 2, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ikut_pindah_keluar`
--

CREATE TABLE `tbl_ikut_pindah_keluar` (
  `id_ikut_pindah_keluar` int(10) NOT NULL,
  `id_penduduk` int(10) NOT NULL,
  `id_pindah_keluar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ikut_pindah_masuk`
--

CREATE TABLE `tbl_ikut_pindah_masuk` (
  `id_ikut_pindah_masuk` int(10) NOT NULL,
  `id_penduduk` int(10) NOT NULL,
  `id_keluarga` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelahiran`
--

CREATE TABLE `tbl_kelahiran` (
  `id_kelahiran` int(10) NOT NULL,
  `tgl_kelahiran` datetime NOT NULL,
  `nama_bayi` varchar(50) NOT NULL,
  `id_jen_kel` int(10) NOT NULL DEFAULT '0',
  `berat_bayi` varchar(10) DEFAULT NULL,
  `panjang_bayi` int(10) DEFAULT NULL,
  `nama_ayah` varchar(100) DEFAULT NULL,
  `nama_ibu` varchar(100) DEFAULT NULL,
  `is_kembar` enum('Y','N') DEFAULT 'N',
  `lokasi_lahir` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `penolong` varchar(100) DEFAULT NULL,
  `id_keluarga` int(10) DEFAULT NULL,
  `nama_pelapor` varchar(100) DEFAULT NULL,
  `id_pelapor` int(10) DEFAULT NULL,
  `id_penduduk` int(4) DEFAULT NULL,
  `id_surat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_keluarga`
--

CREATE TABLE `tbl_keluarga` (
  `id_keluarga` int(10) NOT NULL,
  `no_kk` varchar(25) NOT NULL,
  `alamat_jalan` varchar(50) NOT NULL,
  `is_sementara` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_raskin` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_jamkesmas` enum('Y','N') NOT NULL DEFAULT 'N',
  `is_pkh` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_kelas_sosial` int(10) DEFAULT NULL,
  `id_kepala_keluarga` int(10) DEFAULT NULL,
  `id_rt` int(10) DEFAULT NULL,
  `id_rw` int(10) DEFAULT NULL,
  `id_dusun` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_keluarga`
--

INSERT INTO `tbl_keluarga` (`id_keluarga`, `no_kk`, `alamat_jalan`, `is_sementara`, `is_raskin`, `is_jamkesmas`, `is_pkh`, `id_kelas_sosial`, `id_kepala_keluarga`, `id_rt`, `id_rw`, `id_dusun`) VALUES
(1, '747105.060693.0100', 'Jl. Kumbang', 'N', 'Y', 'Y', 'Y', 2, 1, 0, 0, 0),
(2, '747105.060693.0101', 'Jl. Mawar Melati Semuanya Indah', 'N', 'Y', 'Y', 'Y', 2, 5, 0, 0, 0),
(3, '747105.060693.0102', 'Jl. Manis Madu', 'N', 'Y', 'Y', 'Y', 3, 6, 0, 0, 0),
(4, '747105.060693.0103', 'Jl. Sehat Tentrem', 'N', 'N', 'N', 'N', 1, 7, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kondisi_kehamilan`
--

CREATE TABLE `tbl_kondisi_kehamilan` (
  `id_kondisi_kehamilan` int(10) NOT NULL,
  `keterangan` varchar(20) NOT NULL,
  `tgl_hpl` datetime NOT NULL,
  `is_resti` enum('Y','N') NOT NULL,
  `id_penduduk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kontak`
--

CREATE TABLE `tbl_kontak` (
  `id_kontak` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `pesan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lembaga_desa`
--

CREATE TABLE `tbl_lembaga_desa` (
  `id_lembaga_desa` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `isi_lembaga_desa` blob NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_lembaga_desa`
--

INSERT INTO `tbl_lembaga_desa` (`id_lembaga_desa`, `id_pengguna`, `isi_lembaga_desa`, `waktu`) VALUES
(1, 2, '', '2015-04-11 10:02:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

CREATE TABLE `tbl_log` (
  `id_log` int(20) NOT NULL,
  `fungsi` varchar(50) NOT NULL,
  `kegiatan` text NOT NULL,
  `kegiatan_rinci` text NOT NULL,
  `table` varchar(50) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ip_address` varchar(50) NOT NULL,
  `user_agent` text NOT NULL,
  `id_pengguna` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`id_log`, `fungsi`, `kegiatan`, `kegiatan_rinci`, `table`, `waktu`, `ip_address`, `user_agent`, `id_pengguna`) VALUES
(1, 'update_penduduk', 'UPDATE : {\"id_penduduk\":\"10\"}', '{\"is_sementara\":\"N\",\"nik\":\"647105.060693.0110\",\"nama\":\"KARINA ULFA HANDAYANI\",\"tempat_lahir\":\"BALI\",\"tanggal_lahir\":\"1997-04-08\",\"no_telp\":\"8999999\",\"email\":\"yogiepalatino@gmail.com\",\"no_kitas\":\"10003\",\"no_paspor\":\"10003\",\"id_agama\":\"4\",\"id_goldar\":\"6\",\"id_pendidikan\":\"15\",\"id_pendidikan_terakhir\":\"5\",\"id_pekerjaan\":\"3\",\"id_pekerjaan_ped\":\"\",\"id_jen_kel\":\"2\",\"id_kewarganegaraan\":\"1\",\"id_kompetensi\":\"0\",\"id_status_kawin\":\"1\",\"id_status_penduduk\":\"1\",\"id_status_tinggal\":\"1\",\"id_difabilitas\":\"1\",\"id_kontrasepsi\":\"\",\"is_bsm\":\"Y\",\"foto\":\"uploads\\/647105.060693.0110.jpg\",\"pendapatan_per_bulan\":0}', 'tbl_penduduk', '2017-05-17 03:21:53', '36.71.10.134', 'Mozilla/5.0 (Windows NT 6.1; rv:53.0) Gecko/20100101 Firefox/53.0', 3),
(2, 'simpan_tambah_anggota', 'INSERT', '{\"is_sementara\":\"N\",\"nik\":\"3232323244\",\"nama\":\"LISTANTO\",\"tempat_lahir\":\"MADIUN\",\"tanggal_lahir\":\"2017-06-15\",\"no_telp\":\"081111111111\",\"email\":\"gdgdg@gmail.com\",\"no_kitas\":\"3232\",\"no_paspor\":\"3232\",\"id_rt\":\"0\",\"id_rw\":\"0\",\"id_dusun\":\"0\",\"id_agama\":\"3\",\"id_goldar\":\"10\",\"id_pendidikan\":\"8\",\"id_pendidikan_terakhir\":\"17\",\"id_pekerjaan\":\"14\",\"id_pekerjaan_ped\":\"2\",\"id_jen_kel\":\"1\",\"id_kewarganegaraan\":\"1\",\"id_kompetensi\":\"3\",\"id_status_kawin\":\"2\",\"id_status_penduduk\":\"1\",\"id_status_tinggal\":\"1\",\"id_difabilitas\":\"1\",\"id_kontrasepsi\":\"1\",\"is_bsm\":\"N\",\"foto\":\"uploads\\/3232323244.jpg\",\"pendapatan_per_bulan\":0}', 'tbl_penduduk', '2017-06-18 11:50:20', '115.178.201.59', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 UBrowser/6.1.2015.1007 Safari/537.36', 3),
(3, 'simpan_tambah_anggota', 'INSERT', '{\"nama_ayah\":\"DIMAN\",\"nama_ibu\":\"YATI\",\"id_penduduk\":\"12\",\"id_keluarga\":\"4\",\"id_status_keluarga\":\"2\"}', 'tbl_hub_kel', '2017-06-18 11:50:20', '115.178.201.59', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 UBrowser/6.1.2015.1007 Safari/537.36', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logo`
--

CREATE TABLE `tbl_logo` (
  `id_logo` int(11) NOT NULL,
  `konten_logo_desa` varchar(50) NOT NULL,
  `konten_logo_kabupaten` varchar(50) NOT NULL,
  `path_css` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_logo`
--

INSERT INTO `tbl_logo` (`id_logo`, `konten_logo_desa`, `konten_logo_kabupaten`, `path_css`) VALUES
(1, 'uploads/web/logo_desa.png', 'uploads/web/logo_kabupaten.jpg', 'assetku/css/style.css');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_meninggal`
--

CREATE TABLE `tbl_meninggal` (
  `id_meninggal` int(10) NOT NULL,
  `tgl_meninggal` datetime NOT NULL,
  `nama` varchar(50) NOT NULL,
  `sebab` varchar(50) DEFAULT NULL,
  `id_penduduk` int(10) DEFAULT NULL,
  `penentu_kematian` varchar(50) DEFAULT NULL,
  `tempat_kematian` varchar(100) DEFAULT NULL,
  `id_pelapor` int(10) DEFAULT NULL,
  `nama_pelapor` varchar(100) DEFAULT NULL,
  `hubungan_pelapor` varchar(100) DEFAULT NULL,
  `id_surat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int(10) NOT NULL,
  `url` text NOT NULL,
  `title` text NOT NULL,
  `content` blob NOT NULL,
  `updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `url`, `title`, `content`, `updated`) VALUES
(1, 'web/c_home/get_detail_berita/1', 'Wagub Perkenalkan Potensi Desa Ke Investor Cina', '', '2015-04-30 18:21:28'),
(2, 'web/c_home/get_detail_berita/2', 'Potensi Alam Gunung Kidul', '', '2015-04-30 18:19:54'),
(3, 'web/c_home/get_detail_berita/3', 'Menkominfo Lepas Keberangkatan Tenaga Pendamping TI SIDeka', '', '2015-04-30 18:20:09'),
(4, 'web/c_home/get_detail_berita/4', 'Panen Raya', '', '2015-04-30 18:22:20'),
(5, 'web/c_sejarah', 'Sejarah Desa', '', '2015-04-30 18:45:43'),
(6, 'web/c_demografi', 'Demografi Desa', '', '2015-04-30 18:46:27'),
(7, 'web/c_visimisi', 'Visi Misi Desa', '', '2015-04-30 18:47:23');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ped_perkebunan`
--

CREATE TABLE `tbl_ped_perkebunan` (
  `id_ped_perkebunan` int(4) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `penggarap` varchar(20) NOT NULL,
  `jumlah_penggarap` int(4) NOT NULL,
  `luas` float NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_dusun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ped_perkebunan`
--

INSERT INTO `tbl_ped_perkebunan` (`id_ped_perkebunan`, `deskripsi`, `penggarap`, `jumlah_penggarap`, `luas`, `lokasi`, `id_dusun`) VALUES
(1, 'Pohon Jarak', 'Pribadi', 10, 22, 'Utara Embung Tambakboyo', 0),
(2, 'Melon', 'Buruh', 14, 33, '-', 0),
(3, 'Salak', 'Buruh', 20, 15, '-', 0),
(4, 'Kopi', 'Pribadi', 20, 12, 'Selatan Kali Bayung', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ped_pertambakan`
--

CREATE TABLE `tbl_ped_pertambakan` (
  `id_ped_pertambakan` int(4) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `penggarap` varchar(20) NOT NULL,
  `jumlah_penggarap` int(4) NOT NULL,
  `luas` float NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_dusun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ped_pertambakan`
--

INSERT INTO `tbl_ped_pertambakan` (`id_ped_pertambakan`, `deskripsi`, `penggarap`, `jumlah_penggarap`, `luas`, `lokasi`, `id_dusun`) VALUES
(1, 'Lele', 'Pribadi', 17, 2, 'Belakang Rumah Pak Sukarjo', 0),
(2, 'Gurame', 'Pribadi', 2, 5, '-', 0),
(3, 'Nila', 'Buruh', 55, 23, '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ped_pertanian`
--

CREATE TABLE `tbl_ped_pertanian` (
  `id_ped_pertanian` int(4) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `penggarap` varchar(20) NOT NULL,
  `jumlah_penggarap` int(4) NOT NULL,
  `luas` float NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_dusun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ped_pertanian`
--

INSERT INTO `tbl_ped_pertanian` (`id_ped_pertanian`, `deskripsi`, `penggarap`, `jumlah_penggarap`, `luas`, `lokasi`, `id_dusun`) VALUES
(3, 'Padi', 'Buruh', 150, 23, 'Belakang Balai Desa, Utara Embung', 0),
(4, 'Kacang Tanah', 'Pribadi', 50, 34, 'Timur tanah kas desa', 0),
(5, 'Jagung', 'Pribadi', 100, 6, 'Selatan sungai Winongo', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ped_potensi_wisata`
--

CREATE TABLE `tbl_ped_potensi_wisata` (
  `id_ped_potensi_wisata` int(4) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_dusun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ped_potensi_wisata`
--

INSERT INTO `tbl_ped_potensi_wisata` (`id_ped_potensi_wisata`, `deskripsi`, `lokasi`, `id_dusun`) VALUES
(1, 'Pantai', '-', 0),
(2, 'Hutan Lindung', '-', 0),
(3, 'Air Terjun', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ped_sumber_air`
--

CREATE TABLE `tbl_ped_sumber_air` (
  `id_ped_sumber_air` int(4) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_dusun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ped_sumber_air`
--

INSERT INTO `tbl_ped_sumber_air` (`id_ped_sumber_air`, `deskripsi`, `lokasi`, `id_dusun`) VALUES
(1, 'Embung Sungai Winongo', 'Utara Kantor Lurah', 0),
(2, 'Danau', '-', 0),
(3, 'Embung', '-', 0),
(4, 'Air Terjun Cijerah', 'Dekat Hutan Pinus', 0),
(5, 'Water torrent utama dusun', 'Utara Kantor PKK', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ped_sumber_energi`
--

CREATE TABLE `tbl_ped_sumber_energi` (
  `id_ped_sumber_energi` int(4) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `id_dusun` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ped_sumber_energi`
--

INSERT INTO `tbl_ped_sumber_energi` (`id_ped_sumber_energi`, `deskripsi`, `lokasi`, `id_dusun`) VALUES
(1, 'Pembangkit Listrik Tenaga Matahari', 'Utara Sungai Winongo', 0),
(2, 'Pembangkit Listrik Kincir Angin', '-', 0),
(3, 'Pembangkit Listrik Mikrohidro', '-', 0),
(4, 'Pembangkit Listrik Tenaga Air Laut', '-', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penduduk`
--

CREATE TABLE `tbl_penduduk` (
  `id_penduduk` int(10) NOT NULL,
  `nik` varchar(25) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tempat_lahir` varchar(25) DEFAULT NULL,
  `tanggal_lahir` datetime DEFAULT NULL,
  `foto` varchar(50) DEFAULT 'uploads/defaultFotoPenduduk.jpg',
  `no_telp` char(15) DEFAULT 'Tidak Diketahui',
  `email` varchar(50) DEFAULT 'Tidak Diketahui',
  `no_kitas` varchar(25) DEFAULT 'Tidak Diketahui',
  `no_paspor` varchar(25) DEFAULT 'Tidak Diketahui',
  `is_sementara` enum('Y','N') NOT NULL DEFAULT 'Y',
  `id_rt` int(10) DEFAULT '0',
  `id_rw` int(10) DEFAULT '0',
  `id_dusun` int(10) DEFAULT '0',
  `id_pendidikan` int(10) DEFAULT '0',
  `is_bsm` enum('Y','N') NOT NULL DEFAULT 'N',
  `id_agama` int(10) DEFAULT '0',
  `id_goldar` int(10) DEFAULT '0',
  `id_pendidikan_terakhir` int(10) DEFAULT '0',
  `id_jen_kel` int(10) DEFAULT '0',
  `id_kewarganegaraan` int(10) DEFAULT '0',
  `id_pekerjaan` int(10) DEFAULT '0',
  `id_pekerjaan_ped` int(10) DEFAULT '0',
  `id_kompetensi` int(10) DEFAULT '0',
  `id_status_kawin` int(10) DEFAULT '0',
  `id_status_penduduk` int(10) DEFAULT '0',
  `id_status_tinggal` int(10) DEFAULT '0',
  `id_difabilitas` int(10) DEFAULT '0',
  `id_kontrasepsi` int(10) DEFAULT '0',
  `pendapatan_per_bulan` double DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penduduk`
--

INSERT INTO `tbl_penduduk` (`id_penduduk`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `foto`, `no_telp`, `email`, `no_kitas`, `no_paspor`, `is_sementara`, `id_rt`, `id_rw`, `id_dusun`, `id_pendidikan`, `is_bsm`, `id_agama`, `id_goldar`, `id_pendidikan_terakhir`, `id_jen_kel`, `id_kewarganegaraan`, `id_pekerjaan`, `id_pekerjaan_ped`, `id_kompetensi`, `id_status_kawin`, `id_status_penduduk`, `id_status_tinggal`, `id_difabilitas`, `id_kontrasepsi`, `pendapatan_per_bulan`) VALUES
(1, '647105.060693.0101', 'RACHEL', 'SEMARANG', '1935-06-06 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '089619256004', 'keluargafirman@gmail.com', '10001', '10001', 'N', 0, 0, 0, 8, 'N', 2, 4, 8, 2, 1, 2, 0, 1, 2, 1, 1, 1, 4, 0),
(2, '647105.060693.0102', 'FIRMANSYAH ABDUL', 'KLATEN', '1925-04-09 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '8999999', 'keluargafirman@gmail.com', '10001', '10001', 'N', 0, 0, 0, 8, 'N', 1, 3, 8, 1, 1, 4, 2, 2, 2, 1, 1, 1, 4, 0),
(3, '647105.060693.0103', 'GANY', 'SLEMAN', '1940-06-06 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '89619256004', 'keluargafirman@gmail.com', '10001', '10001', 'N', 0, 0, 0, 8, 'N', 5, 2, 8, 1, 1, 13, 0, 3, 1, 1, 1, 1, 0, 0),
(4, '647105.060693.0104', 'YOGA SAPUTRA', 'SLEMAN', '1939-06-06 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '89619256004', 'keluargafirman@gmail.com', '10001', '10001', 'N', 0, 0, 0, 10, 'N', 6, 4, 10, 1, 1, 16, 0, 4, 1, 1, 1, 1, 0, 0),
(5, '647105.060693.0105', 'YOHANES ERWIN DARI', 'TARAKAN', '1919-06-06 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '089619256003', 'yohaneserwin@gmail.com', '10002', '10002', 'N', 0, 0, 0, 17, 'N', 7, 10, 6, 1, 3, 36, 0, 2, 3, 1, 1, 1, 0, 0),
(6, '647105.060693.0106', 'MUHAMMAD YOGIE PALATINO', 'BALIKPAPAN', '1957-06-06 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '089619256004', 'yogiepalatino@gmail.com', '10003', '10003', 'N', 0, 0, 0, 17, 'N', 1, 7, 6, 1, 1, 44, 0, 2, 2, 1, 1, 1, 0, 0),
(7, '647105.060693.0107', 'LUCAS SANDY DUTA ARGA', 'GUNUNGKIDUL', '1993-10-31 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '089619256004', 'lucassandyda@gmail.com', '10004', '10004', 'N', 0, 0, 0, 9, 'N', 3, 2, 9, 1, 1, 15, 0, 4, 2, 1, 1, 1, 0, 0),
(8, '647105.060693.0108', 'DODI ALFREDO SITUMEANG', 'SIBOLGA', '1994-06-21 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '89619256004', 'lucassandyda@gmail.com', '10004', '10004', 'N', 0, 0, 0, 6, 'N', 8, 2, 6, 1, 1, 45, 0, 2, 2, 1, 1, 1, 0, 0),
(9, '647105.060693.0109', 'ROBERTUS MAHARDHI KUNCORO', 'BERAU', '1994-04-22 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '899977635377', 'yogiepalatino@gmail.com', '10003', '10003', 'N', 0, 0, 0, 6, 'N', 3, 7, 6, 1, 1, 42, 0, 4, 1, 1, 1, 1, 0, 0),
(10, '647105.060693.0110', 'KARINA ULFA HANDAYANI', 'BALI', '1997-04-08 00:00:00', 'uploads/647105.060693.0110.jpg', '8999999', 'yogiepalatino@gmail.com', '10003', '10003', 'N', 0, 0, 0, 15, 'Y', 4, 6, 5, 2, 1, 3, 0, 0, 1, 1, 1, 1, 0, 0),
(11, '647105.060693.0111', 'PAMELA SAFITRI', 'JAKARTA', '1985-04-16 00:00:00', 'uploads/defaultFotoPenduduk.jpg', '8999999', 'yogiepalatino@gmail.com', '10003', '10003', 'N', 0, 0, 0, 6, 'N', 1, 6, 6, 2, 1, 31, 0, 1, 2, 1, 1, 1, 5, 0),
(12, '3232323244', 'LISTANTO', 'MADIUN', '2017-06-15 00:00:00', 'uploads/3232323244.jpg', '081111111111', 'gdgdg@gmail.com', '3232', '3232', 'N', 0, 0, 0, 8, 'N', 3, 10, 17, 1, 1, 14, 2, 3, 2, 1, 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengguna`
--

CREATE TABLE `tbl_pengguna` (
  `id_pengguna` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telepon` varchar(20) NOT NULL,
  `role` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `is_delete` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pengguna`
--

INSERT INTO `tbl_pengguna` (`id_pengguna`, `nik`, `nama_pengguna`, `password`, `nama`, `no_telepon`, `role`, `foto`, `is_delete`) VALUES
(0, '', 'helpdesk-admin', '2ba1a6b1bcaf35adfcfe46a48bfddaea8f15632e', '', '', 'Administrator', '', 'Y'),
(1, '', 'helpdesk-pengelola', '2ba1a6b1bcaf35adfcfe46a48bfddaea8f15632e', '', '', 'Pengelola Data', '', 'Y'),
(2, '', 'sidekaadmin', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'Administrator', '', 'Y'),
(3, '', 'sidekapengelola', 'c4ca4238a0b923820dcc509a6f75849b', '', '', 'Pengelola Data', '', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perangkat`
--

CREATE TABLE `tbl_perangkat` (
  `id_perangkat` int(10) NOT NULL,
  `nip` varchar(25) NOT NULL,
  `niap` varchar(25) NOT NULL,
  `no_sk_angkat` varchar(50) NOT NULL,
  `tgl_angkat` datetime NOT NULL,
  `id_pangkat_gol` int(11) NOT NULL,
  `no_sk_berhenti` varchar(50) DEFAULT NULL,
  `tgl_berhenti` datetime DEFAULT NULL,
  `id_jabatan` int(10) NOT NULL,
  `id_penduduk` int(10) DEFAULT NULL,
  `is_aktif` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_peta`
--

CREATE TABLE `tbl_peta` (
  `id_peta` int(4) NOT NULL,
  `embed` blob NOT NULL,
  `id_desa` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_peta`
--

INSERT INTO `tbl_peta` (`id_peta`, `embed`, `id_desa`) VALUES
(1, 0x3c696672616d65207372633d2268747470733a2f2f7777772e676f6f676c652e636f6d2f6d6170732f642f656d6265643f6d69643d7a5f6f30717a586c6f4663632e6b68335379724c544a556e38222077696474683d2236343022206865696768743d22343830223e3c2f696672616d653e, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pindah_keluar`
--

CREATE TABLE `tbl_pindah_keluar` (
  `id_pindah_keluar` int(10) NOT NULL,
  `tgl_pindah_keluar` datetime NOT NULL,
  `no_kk` varchar(25) NOT NULL,
  `alamat_jalan` varchar(100) NOT NULL,
  `nomor_rt` varchar(5) NOT NULL,
  `nomor_rw` varchar(5) NOT NULL,
  `nama_dusun` varchar(30) NOT NULL,
  `nama_desa` varchar(30) NOT NULL,
  `nama_kecamatan` varchar(30) NOT NULL,
  `nama_kabkota` varchar(30) NOT NULL,
  `nama_provinsi` varchar(30) NOT NULL,
  `id_keluarga` int(10) NOT NULL,
  `id_penduduk` int(10) NOT NULL,
  `id_jenis_pindah` int(10) NOT NULL,
  `id_klasifikasi_pindah` int(10) NOT NULL,
  `id_alasan_pindah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pindah_masuk`
--

CREATE TABLE `tbl_pindah_masuk` (
  `id_pindah_masuk` int(10) NOT NULL,
  `tgl_pindah_masuk` datetime NOT NULL,
  `no_kk` varchar(25) NOT NULL,
  `alamat_jalan` varchar(100) NOT NULL,
  `id_rt` int(10) NOT NULL,
  `id_rw` int(10) NOT NULL,
  `id_dusun` int(10) NOT NULL,
  `id_desa` int(10) NOT NULL,
  `id_penduduk` int(10) NOT NULL,
  `id_keluarga` int(10) NOT NULL,
  `id_jenis_pindah` int(10) NOT NULL,
  `id_klasifikasi_pindah` int(10) NOT NULL,
  `id_alasan_pindah` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_regulasi`
--

CREATE TABLE `tbl_regulasi` (
  `id_regulasi` int(11) NOT NULL,
  `judul_regulasi` varchar(100) NOT NULL,
  `isi_regulasi` varchar(100) NOT NULL,
  `file_regulasi` varchar(100) NOT NULL,
  `id_desa` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_regulasi`
--

INSERT INTO `tbl_regulasi` (`id_regulasi`, `judul_regulasi`, `isi_regulasi`, `file_regulasi`, `id_desa`) VALUES
(1, 'UUD', 'Undang Undang Desa', 'uploads/files/UUD.zip', 1),
(2, 'Peraturan Menteri', 'Peraturan Menteri Dalam Negri thn 2014', 'uploads/files/sample.zip', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sejarah`
--

CREATE TABLE `tbl_sejarah` (
  `id_sejarah` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `isi_sejarah` blob NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sejarah`
--

INSERT INTO `tbl_sejarah` (`id_sejarah`, `id_pengguna`, `isi_sejarah`, `waktu`, `foto_banner`) VALUES
(1, 2, '', '2015-04-11 10:02:16', 'uploads/web/foto_banner_sejarah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider_beranda`
--

CREATE TABLE `tbl_slider_beranda` (
  `id_slider_beranda` int(11) NOT NULL,
  `konten_background` varchar(100) NOT NULL,
  `konten_logo` varchar(100) NOT NULL,
  `konten_teks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_slider_beranda`
--

INSERT INTO `tbl_slider_beranda` (`id_slider_beranda`, `konten_background`, `konten_logo`, `konten_teks`) VALUES
(1, 'uploads/web/slider_beranda/background_1d9.jpg', 'uploads/web/slider_beranda/logo_1d9.png', '[SISTEM INFORMASI DESA DAN KAWASAN]'),
(2, 'uploads/web/slider_beranda/background_355.jpg', 'uploads/web/slider_beranda/logo_355.png', 'SIDeKa');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_surat`
--

CREATE TABLE `tbl_surat` (
  `id_surat` int(10) NOT NULL,
  `nomor_surat` varchar(25) NOT NULL,
  `tgl_surat` datetime NOT NULL,
  `tgl_awal` datetime NOT NULL,
  `tgl_akhir` datetime NOT NULL,
  `nomor_registrasi` int(10) NOT NULL,
  `judul_surat` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `kata_penutup` text NOT NULL,
  `kode_surat` int(10) NOT NULL DEFAULT '0',
  `id_perangkat` int(10) NOT NULL,
  `id_penduduk` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_visi_misi`
--

CREATE TABLE `tbl_visi_misi` (
  `id_visi_misi` int(10) NOT NULL,
  `id_pengguna` int(10) NOT NULL,
  `isi_visi_misi` blob NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `foto_banner` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_visi_misi`
--

INSERT INTO `tbl_visi_misi` (`id_visi_misi`, `id_pengguna`, `isi_visi_misi`, `waktu`, `foto_banner`) VALUES
(1, 2, '', '2015-04-11 10:02:27', 'uploads/web/foto_banner_visimisi.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ref_agama`
--
ALTER TABLE `ref_agama`
  ADD PRIMARY KEY (`id_agama`);

--
-- Indexes for table `ref_alasan_pindah`
--
ALTER TABLE `ref_alasan_pindah`
  ADD PRIMARY KEY (`id_alasan_pindah`);

--
-- Indexes for table `ref_desa`
--
ALTER TABLE `ref_desa`
  ADD PRIMARY KEY (`id_desa`),
  ADD KEY `id_kecamatan` (`id_kecamatan`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `ref_difabilitas`
--
ALTER TABLE `ref_difabilitas`
  ADD PRIMARY KEY (`id_difabilitas`);

--
-- Indexes for table `ref_dusun`
--
ALTER TABLE `ref_dusun`
  ADD PRIMARY KEY (`id_dusun`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `ref_goldar`
--
ALTER TABLE `ref_goldar`
  ADD PRIMARY KEY (`id_goldar`);

--
-- Indexes for table `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `ref_jenis_pindah`
--
ALTER TABLE `ref_jenis_pindah`
  ADD PRIMARY KEY (`id_jenis_pindah`);

--
-- Indexes for table `ref_jen_kel`
--
ALTER TABLE `ref_jen_kel`
  ADD PRIMARY KEY (`id_jen_kel`);

--
-- Indexes for table `ref_kab_kota`
--
ALTER TABLE `ref_kab_kota`
  ADD PRIMARY KEY (`id_kab_kota`),
  ADD KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kab_kota` (`id_kab_kota`);

--
-- Indexes for table `ref_kelas_sosial`
--
ALTER TABLE `ref_kelas_sosial`
  ADD PRIMARY KEY (`id_kelas_sosial`);

--
-- Indexes for table `ref_kewarganegaraan`
--
ALTER TABLE `ref_kewarganegaraan`
  ADD PRIMARY KEY (`id_kewarganegaraan`);

--
-- Indexes for table `ref_klasifikasi_pindah`
--
ALTER TABLE `ref_klasifikasi_pindah`
  ADD PRIMARY KEY (`id_klasifikasi_pindah`);

--
-- Indexes for table `ref_kode_surat`
--
ALTER TABLE `ref_kode_surat`
  ADD PRIMARY KEY (`kode_surat`);

--
-- Indexes for table `ref_kompetensi`
--
ALTER TABLE `ref_kompetensi`
  ADD PRIMARY KEY (`id_kompetensi`);

--
-- Indexes for table `ref_kontrasepsi`
--
ALTER TABLE `ref_kontrasepsi`
  ADD PRIMARY KEY (`id_kontrasepsi`);

--
-- Indexes for table `ref_pangkat_gol`
--
ALTER TABLE `ref_pangkat_gol`
  ADD PRIMARY KEY (`id_pangkat_gol`);

--
-- Indexes for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `ref_pekerjaan_ped`
--
ALTER TABLE `ref_pekerjaan_ped`
  ADD PRIMARY KEY (`id_pekerjaan_ped`);

--
-- Indexes for table `ref_pelapor`
--
ALTER TABLE `ref_pelapor`
  ADD PRIMARY KEY (`id_pelapor`);

--
-- Indexes for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `ref_rt`
--
ALTER TABLE `ref_rt`
  ADD PRIMARY KEY (`id_rt`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_rw` (`id_rw`),
  ADD KEY `id_penduduk_2` (`id_penduduk`);

--
-- Indexes for table `ref_rw`
--
ALTER TABLE `ref_rw`
  ADD PRIMARY KEY (`id_rw`),
  ADD KEY `id_dusun` (`id_dusun`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `ref_status_kawin`
--
ALTER TABLE `ref_status_kawin`
  ADD PRIMARY KEY (`id_status_kawin`);

--
-- Indexes for table `ref_status_keluarga`
--
ALTER TABLE `ref_status_keluarga`
  ADD PRIMARY KEY (`id_status_keluarga`);

--
-- Indexes for table `ref_status_penduduk`
--
ALTER TABLE `ref_status_penduduk`
  ADD PRIMARY KEY (`id_status_penduduk`);

--
-- Indexes for table `ref_status_tinggal`
--
ALTER TABLE `ref_status_tinggal`
  ADD PRIMARY KEY (`id_status_tinggal`);

--
-- Indexes for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_demografi`
--
ALTER TABLE `tbl_demografi`
  ADD PRIMARY KEY (`id_demografi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_gizi_buruk`
--
ALTER TABLE `tbl_gizi_buruk`
  ADD PRIMARY KEY (`id_gizi_buruk`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `tbl_hub_kel`
--
ALTER TABLE `tbl_hub_kel`
  ADD PRIMARY KEY (`id_hub_kel`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_keluarga` (`id_keluarga`),
  ADD KEY `id_status_keluarga` (`id_status_keluarga`);

--
-- Indexes for table `tbl_ikut_pindah_keluar`
--
ALTER TABLE `tbl_ikut_pindah_keluar`
  ADD PRIMARY KEY (`id_ikut_pindah_keluar`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `tbl_ikut_pindah_masuk`
--
ALTER TABLE `tbl_ikut_pindah_masuk`
  ADD PRIMARY KEY (`id_ikut_pindah_masuk`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`),
  ADD KEY `id_ayah` (`id_keluarga`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD PRIMARY KEY (`id_keluarga`),
  ADD KEY `FK_keluarga_penduduk` (`id_kepala_keluarga`),
  ADD KEY `id_kelas_sosial` (`id_kelas_sosial`),
  ADD KEY `id_kepala_keluarga` (`id_kepala_keluarga`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rw` (`id_rw`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_kondisi_kehamilan`
--
ALTER TABLE `tbl_kondisi_kehamilan`
  ADD PRIMARY KEY (`id_kondisi_kehamilan`),
  ADD KEY `id_penduduk` (`id_penduduk`);

--
-- Indexes for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `tbl_lembaga_desa`
--
ALTER TABLE `tbl_lembaga_desa`
  ADD PRIMARY KEY (`id_lembaga_desa`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indexes for table `tbl_meninggal`
--
ALTER TABLE `tbl_meninggal`
  ADD PRIMARY KEY (`id_meninggal`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_pelapor` (`id_pelapor`),
  ADD KEY `id_surat` (`id_surat`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ped_perkebunan`
--
ALTER TABLE `tbl_ped_perkebunan`
  ADD PRIMARY KEY (`id_ped_perkebunan`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_ped_pertambakan`
--
ALTER TABLE `tbl_ped_pertambakan`
  ADD PRIMARY KEY (`id_ped_pertambakan`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_ped_pertanian`
--
ALTER TABLE `tbl_ped_pertanian`
  ADD PRIMARY KEY (`id_ped_pertanian`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_ped_potensi_wisata`
--
ALTER TABLE `tbl_ped_potensi_wisata`
  ADD PRIMARY KEY (`id_ped_potensi_wisata`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_ped_sumber_air`
--
ALTER TABLE `tbl_ped_sumber_air`
  ADD PRIMARY KEY (`id_ped_sumber_air`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_ped_sumber_energi`
--
ALTER TABLE `tbl_ped_sumber_energi`
  ADD PRIMARY KEY (`id_ped_sumber_energi`),
  ADD KEY `id_dusun` (`id_dusun`);

--
-- Indexes for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD PRIMARY KEY (`id_penduduk`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rw` (`id_rw`),
  ADD KEY `id_dusun` (`id_dusun`),
  ADD KEY `id_pendidikan` (`id_pendidikan`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_goldar` (`id_goldar`),
  ADD KEY `id_pendidikan_terakhir` (`id_pendidikan_terakhir`),
  ADD KEY `id_jen_kel` (`id_jen_kel`),
  ADD KEY `id_kewarganegaraan` (`id_kewarganegaraan`),
  ADD KEY `id_pekerjaan` (`id_pekerjaan`),
  ADD KEY `id_pekerjaan_ped` (`id_pekerjaan_ped`),
  ADD KEY `id_kompetensi` (`id_kompetensi`),
  ADD KEY `id_status_kawin` (`id_status_kawin`),
  ADD KEY `id_status_penduduk` (`id_status_penduduk`),
  ADD KEY `id_status_tinggal` (`id_status_tinggal`),
  ADD KEY `id_difabilitas` (`id_difabilitas`),
  ADD KEY `id_kontrasepsi` (`id_kontrasepsi`);

--
-- Indexes for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `tbl_perangkat`
--
ALTER TABLE `tbl_perangkat`
  ADD PRIMARY KEY (`id_perangkat`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_pangkat_gol` (`id_pangkat_gol`);

--
-- Indexes for table `tbl_peta`
--
ALTER TABLE `tbl_peta`
  ADD PRIMARY KEY (`id_peta`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `tbl_pindah_keluar`
--
ALTER TABLE `tbl_pindah_keluar`
  ADD PRIMARY KEY (`id_pindah_keluar`),
  ADD KEY `id_rt` (`nomor_rt`),
  ADD KEY `id_rw` (`nomor_rw`),
  ADD KEY `id_dusun` (`nama_dusun`),
  ADD KEY `id_desa` (`nama_desa`),
  ADD KEY `id_keluarga` (`id_keluarga`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_jenis_pindah` (`id_jenis_pindah`),
  ADD KEY `id_klasifikasi_pindah` (`id_klasifikasi_pindah`),
  ADD KEY `id_alasan_pindah` (`id_alasan_pindah`);

--
-- Indexes for table `tbl_pindah_masuk`
--
ALTER TABLE `tbl_pindah_masuk`
  ADD PRIMARY KEY (`id_pindah_masuk`),
  ADD KEY `id_rt` (`id_rt`),
  ADD KEY `id_rw` (`id_rw`),
  ADD KEY `id_dusun` (`id_dusun`),
  ADD KEY `id_desa` (`id_desa`),
  ADD KEY `id_penduduk` (`id_penduduk`),
  ADD KEY `id_keluarga` (`id_keluarga`),
  ADD KEY `id_jenis_pindah` (`id_jenis_pindah`),
  ADD KEY `id_klasifikasi_pindah` (`id_klasifikasi_pindah`),
  ADD KEY `id_alasan_pindah` (`id_alasan_pindah`);

--
-- Indexes for table `tbl_regulasi`
--
ALTER TABLE `tbl_regulasi`
  ADD PRIMARY KEY (`id_regulasi`),
  ADD KEY `id_desa` (`id_desa`);

--
-- Indexes for table `tbl_sejarah`
--
ALTER TABLE `tbl_sejarah`
  ADD PRIMARY KEY (`id_sejarah`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- Indexes for table `tbl_slider_beranda`
--
ALTER TABLE `tbl_slider_beranda`
  ADD PRIMARY KEY (`id_slider_beranda`);

--
-- Indexes for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD PRIMARY KEY (`id_surat`),
  ADD KEY `id_perangkat` (`id_perangkat`);

--
-- Indexes for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  ADD PRIMARY KEY (`id_visi_misi`),
  ADD KEY `id_pengguna` (`id_pengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ref_agama`
--
ALTER TABLE `ref_agama`
  MODIFY `id_agama` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `ref_alasan_pindah`
--
ALTER TABLE `ref_alasan_pindah`
  MODIFY `id_alasan_pindah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_desa`
--
ALTER TABLE `ref_desa`
  MODIFY `id_desa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_difabilitas`
--
ALTER TABLE `ref_difabilitas`
  MODIFY `id_difabilitas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_dusun`
--
ALTER TABLE `ref_dusun`
  MODIFY `id_dusun` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_goldar`
--
ALTER TABLE `ref_goldar`
  MODIFY `id_goldar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `ref_jabatan`
--
ALTER TABLE `ref_jabatan`
  MODIFY `id_jabatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_jenis_pindah`
--
ALTER TABLE `ref_jenis_pindah`
  MODIFY `id_jenis_pindah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_jen_kel`
--
ALTER TABLE `ref_jen_kel`
  MODIFY `id_jen_kel` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_kab_kota`
--
ALTER TABLE `ref_kab_kota`
  MODIFY `id_kab_kota` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  MODIFY `id_kecamatan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_kelas_sosial`
--
ALTER TABLE `ref_kelas_sosial`
  MODIFY `id_kelas_sosial` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_kewarganegaraan`
--
ALTER TABLE `ref_kewarganegaraan`
  MODIFY `id_kewarganegaraan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_klasifikasi_pindah`
--
ALTER TABLE `ref_klasifikasi_pindah`
  MODIFY `id_klasifikasi_pindah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_kode_surat`
--
ALTER TABLE `ref_kode_surat`
  MODIFY `kode_surat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `ref_kompetensi`
--
ALTER TABLE `ref_kompetensi`
  MODIFY `id_kompetensi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_kontrasepsi`
--
ALTER TABLE `ref_kontrasepsi`
  MODIFY `id_kontrasepsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ref_pangkat_gol`
--
ALTER TABLE `ref_pangkat_gol`
  MODIFY `id_pangkat_gol` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ref_pekerjaan`
--
ALTER TABLE `ref_pekerjaan`
  MODIFY `id_pekerjaan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- AUTO_INCREMENT for table `ref_pekerjaan_ped`
--
ALTER TABLE `ref_pekerjaan_ped`
  MODIFY `id_pekerjaan_ped` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `ref_pelapor`
--
ALTER TABLE `ref_pelapor`
  MODIFY `id_pelapor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `ref_pendidikan`
--
ALTER TABLE `ref_pendidikan`
  MODIFY `id_pendidikan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `ref_provinsi`
--
ALTER TABLE `ref_provinsi`
  MODIFY `id_provinsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `ref_rt`
--
ALTER TABLE `ref_rt`
  MODIFY `id_rt` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_rw`
--
ALTER TABLE `ref_rw`
  MODIFY `id_rw` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ref_status_kawin`
--
ALTER TABLE `ref_status_kawin`
  MODIFY `id_status_kawin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `ref_status_keluarga`
--
ALTER TABLE `ref_status_keluarga`
  MODIFY `id_status_keluarga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `ref_status_penduduk`
--
ALTER TABLE `ref_status_penduduk`
  MODIFY `id_status_penduduk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ref_status_tinggal`
--
ALTER TABLE `ref_status_tinggal`
  MODIFY `id_status_tinggal` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_demografi`
--
ALTER TABLE `tbl_demografi`
  MODIFY `id_demografi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_gizi_buruk`
--
ALTER TABLE `tbl_gizi_buruk`
  MODIFY `id_gizi_buruk` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_hub_kel`
--
ALTER TABLE `tbl_hub_kel`
  MODIFY `id_hub_kel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_ikut_pindah_keluar`
--
ALTER TABLE `tbl_ikut_pindah_keluar`
  MODIFY `id_ikut_pindah_keluar` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_ikut_pindah_masuk`
--
ALTER TABLE `tbl_ikut_pindah_masuk`
  MODIFY `id_ikut_pindah_masuk` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  MODIFY `id_kelahiran` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  MODIFY `id_keluarga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_kondisi_kehamilan`
--
ALTER TABLE `tbl_kondisi_kehamilan`
  MODIFY `id_kondisi_kehamilan` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_kontak`
--
ALTER TABLE `tbl_kontak`
  MODIFY `id_kontak` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_lembaga_desa`
--
ALTER TABLE `tbl_lembaga_desa`
  MODIFY `id_lembaga_desa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_log`
--
ALTER TABLE `tbl_log`
  MODIFY `id_log` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_logo`
--
ALTER TABLE `tbl_logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_meninggal`
--
ALTER TABLE `tbl_meninggal`
  MODIFY `id_meninggal` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_ped_perkebunan`
--
ALTER TABLE `tbl_ped_perkebunan`
  MODIFY `id_ped_perkebunan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_ped_pertambakan`
--
ALTER TABLE `tbl_ped_pertambakan`
  MODIFY `id_ped_pertambakan` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_ped_pertanian`
--
ALTER TABLE `tbl_ped_pertanian`
  MODIFY `id_ped_pertanian` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_ped_potensi_wisata`
--
ALTER TABLE `tbl_ped_potensi_wisata`
  MODIFY `id_ped_potensi_wisata` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_ped_sumber_air`
--
ALTER TABLE `tbl_ped_sumber_air`
  MODIFY `id_ped_sumber_air` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_ped_sumber_energi`
--
ALTER TABLE `tbl_ped_sumber_energi`
  MODIFY `id_ped_sumber_energi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  MODIFY `id_penduduk` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_pengguna`
--
ALTER TABLE `tbl_pengguna`
  MODIFY `id_pengguna` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_perangkat`
--
ALTER TABLE `tbl_perangkat`
  MODIFY `id_perangkat` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_peta`
--
ALTER TABLE `tbl_peta`
  MODIFY `id_peta` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_pindah_keluar`
--
ALTER TABLE `tbl_pindah_keluar`
  MODIFY `id_pindah_keluar` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pindah_masuk`
--
ALTER TABLE `tbl_pindah_masuk`
  MODIFY `id_pindah_masuk` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_regulasi`
--
ALTER TABLE `tbl_regulasi`
  MODIFY `id_regulasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_sejarah`
--
ALTER TABLE `tbl_sejarah`
  MODIFY `id_sejarah` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_slider_beranda`
--
ALTER TABLE `tbl_slider_beranda`
  MODIFY `id_slider_beranda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  MODIFY `id_surat` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  MODIFY `id_visi_misi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `ref_desa`
--
ALTER TABLE `ref_desa`
  ADD CONSTRAINT `ref_desa_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `ref_kecamatan` (`id_kecamatan`),
  ADD CONSTRAINT `ref_desa_ibfk_2` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `ref_dusun`
--
ALTER TABLE `ref_dusun`
  ADD CONSTRAINT `ref_dusun_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `ref_desa` (`id_desa`),
  ADD CONSTRAINT `ref_dusun_ibfk_2` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `ref_kab_kota`
--
ALTER TABLE `ref_kab_kota`
  ADD CONSTRAINT `ref_kab_kota_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `ref_provinsi` (`id_provinsi`);

--
-- Constraints for table `ref_kecamatan`
--
ALTER TABLE `ref_kecamatan`
  ADD CONSTRAINT `ref_kecamatan_ibfk_1` FOREIGN KEY (`id_kab_kota`) REFERENCES `ref_kab_kota` (`id_kab_kota`);

--
-- Constraints for table `ref_rt`
--
ALTER TABLE `ref_rt`
  ADD CONSTRAINT `ref_rt_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `ref_rt_ibfk_2` FOREIGN KEY (`id_rw`) REFERENCES `ref_rw` (`id_rw`);

--
-- Constraints for table `ref_rw`
--
ALTER TABLE `ref_rw`
  ADD CONSTRAINT `ref_rw_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`),
  ADD CONSTRAINT `ref_rw_ibfk_2` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `tbl_berita`
--
ALTER TABLE `tbl_berita`
  ADD CONSTRAINT `tbl_berita_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tbl_demografi`
--
ALTER TABLE `tbl_demografi`
  ADD CONSTRAINT `tbl_demografi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tbl_gizi_buruk`
--
ALTER TABLE `tbl_gizi_buruk`
  ADD CONSTRAINT `tbl_gizi_buruk_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `tbl_hub_kel`
--
ALTER TABLE `tbl_hub_kel`
  ADD CONSTRAINT `tbl_hub_kel_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `tbl_hub_kel_ibfk_2` FOREIGN KEY (`id_keluarga`) REFERENCES `tbl_keluarga` (`id_keluarga`),
  ADD CONSTRAINT `tbl_hub_kel_ibfk_3` FOREIGN KEY (`id_status_keluarga`) REFERENCES `ref_status_keluarga` (`id_status_keluarga`);

--
-- Constraints for table `tbl_ikut_pindah_keluar`
--
ALTER TABLE `tbl_ikut_pindah_keluar`
  ADD CONSTRAINT `tbl_ikut_pindah_keluar_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `tbl_ikut_pindah_masuk`
--
ALTER TABLE `tbl_ikut_pindah_masuk`
  ADD CONSTRAINT `tbl_ikut_pindah_masuk_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `tbl_kelahiran`
--
ALTER TABLE `tbl_kelahiran`
  ADD CONSTRAINT `tbl_kelahiran_ibfk_2` FOREIGN KEY (`id_keluarga`) REFERENCES `tbl_keluarga` (`id_keluarga`),
  ADD CONSTRAINT `tbl_kelahiran_ibfk_3` FOREIGN KEY (`id_pelapor`) REFERENCES `ref_pelapor` (`id_pelapor`),
  ADD CONSTRAINT `tbl_kelahiran_ibfk_4` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `tbl_kelahiran_ibfk_5` FOREIGN KEY (`id_surat`) REFERENCES `tbl_surat` (`id_surat`);

--
-- Constraints for table `tbl_keluarga`
--
ALTER TABLE `tbl_keluarga`
  ADD CONSTRAINT `tbl_keluarga_ibfk_1` FOREIGN KEY (`id_kelas_sosial`) REFERENCES `ref_kelas_sosial` (`id_kelas_sosial`),
  ADD CONSTRAINT `tbl_keluarga_ibfk_2` FOREIGN KEY (`id_rt`) REFERENCES `ref_rt` (`id_rt`),
  ADD CONSTRAINT `tbl_keluarga_ibfk_3` FOREIGN KEY (`id_rw`) REFERENCES `ref_rw` (`id_rw`),
  ADD CONSTRAINT `tbl_keluarga_ibfk_4` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`),
  ADD CONSTRAINT `tbl_keluarga_ibfk_5` FOREIGN KEY (`id_kepala_keluarga`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `tbl_kondisi_kehamilan`
--
ALTER TABLE `tbl_kondisi_kehamilan`
  ADD CONSTRAINT `tbl_kondisi_kehamilan_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`);

--
-- Constraints for table `tbl_lembaga_desa`
--
ALTER TABLE `tbl_lembaga_desa`
  ADD CONSTRAINT `tbl_lembaga_desa_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tbl_log`
--
ALTER TABLE `tbl_log`
  ADD CONSTRAINT `tbl_log_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tbl_meninggal`
--
ALTER TABLE `tbl_meninggal`
  ADD CONSTRAINT `tbl_meninggal_ibfk_1` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `tbl_meninggal_ibfk_2` FOREIGN KEY (`id_pelapor`) REFERENCES `ref_pelapor` (`id_pelapor`),
  ADD CONSTRAINT `tbl_meninggal_ibfk_3` FOREIGN KEY (`id_surat`) REFERENCES `tbl_surat` (`id_surat`);

--
-- Constraints for table `tbl_ped_perkebunan`
--
ALTER TABLE `tbl_ped_perkebunan`
  ADD CONSTRAINT `tbl_ped_perkebunan_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`);

--
-- Constraints for table `tbl_ped_pertambakan`
--
ALTER TABLE `tbl_ped_pertambakan`
  ADD CONSTRAINT `tbl_ped_pertambakan_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`);

--
-- Constraints for table `tbl_ped_pertanian`
--
ALTER TABLE `tbl_ped_pertanian`
  ADD CONSTRAINT `tbl_ped_pertanian_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`);

--
-- Constraints for table `tbl_ped_potensi_wisata`
--
ALTER TABLE `tbl_ped_potensi_wisata`
  ADD CONSTRAINT `tbl_ped_potensi_wisata_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`);

--
-- Constraints for table `tbl_ped_sumber_air`
--
ALTER TABLE `tbl_ped_sumber_air`
  ADD CONSTRAINT `tbl_ped_sumber_air_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`);

--
-- Constraints for table `tbl_ped_sumber_energi`
--
ALTER TABLE `tbl_ped_sumber_energi`
  ADD CONSTRAINT `tbl_ped_sumber_energi_ibfk_1` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`);

--
-- Constraints for table `tbl_penduduk`
--
ALTER TABLE `tbl_penduduk`
  ADD CONSTRAINT `tbl_penduduk_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `ref_rt` (`id_rt`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_10` FOREIGN KEY (`id_pekerjaan`) REFERENCES `ref_pekerjaan` (`id_pekerjaan`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_11` FOREIGN KEY (`id_pekerjaan_ped`) REFERENCES `ref_pekerjaan_ped` (`id_pekerjaan_ped`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_12` FOREIGN KEY (`id_kompetensi`) REFERENCES `ref_kompetensi` (`id_kompetensi`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_13` FOREIGN KEY (`id_status_kawin`) REFERENCES `ref_status_kawin` (`id_status_kawin`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_14` FOREIGN KEY (`id_status_penduduk`) REFERENCES `ref_status_penduduk` (`id_status_penduduk`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_15` FOREIGN KEY (`id_status_tinggal`) REFERENCES `ref_status_tinggal` (`id_status_tinggal`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_16` FOREIGN KEY (`id_difabilitas`) REFERENCES `ref_difabilitas` (`id_difabilitas`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_17` FOREIGN KEY (`id_kontrasepsi`) REFERENCES `ref_kontrasepsi` (`id_kontrasepsi`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_2` FOREIGN KEY (`id_rw`) REFERENCES `ref_rw` (`id_rw`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_3` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_4` FOREIGN KEY (`id_pendidikan`) REFERENCES `ref_pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_5` FOREIGN KEY (`id_agama`) REFERENCES `ref_agama` (`id_agama`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_6` FOREIGN KEY (`id_goldar`) REFERENCES `ref_goldar` (`id_goldar`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_7` FOREIGN KEY (`id_pendidikan_terakhir`) REFERENCES `ref_pendidikan` (`id_pendidikan`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_8` FOREIGN KEY (`id_jen_kel`) REFERENCES `ref_jen_kel` (`id_jen_kel`),
  ADD CONSTRAINT `tbl_penduduk_ibfk_9` FOREIGN KEY (`id_kewarganegaraan`) REFERENCES `ref_kewarganegaraan` (`id_kewarganegaraan`);

--
-- Constraints for table `tbl_perangkat`
--
ALTER TABLE `tbl_perangkat`
  ADD CONSTRAINT `tbl_perangkat_ibfk_1` FOREIGN KEY (`id_jabatan`) REFERENCES `ref_jabatan` (`id_jabatan`),
  ADD CONSTRAINT `tbl_perangkat_ibfk_2` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `tbl_perangkat_ibfk_3` FOREIGN KEY (`id_pangkat_gol`) REFERENCES `ref_pangkat_gol` (`id_pangkat_gol`);

--
-- Constraints for table `tbl_peta`
--
ALTER TABLE `tbl_peta`
  ADD CONSTRAINT `tbl_peta_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `ref_desa` (`id_desa`);

--
-- Constraints for table `tbl_pindah_keluar`
--
ALTER TABLE `tbl_pindah_keluar`
  ADD CONSTRAINT `tbl_pindah_keluar_ibfk_5` FOREIGN KEY (`id_keluarga`) REFERENCES `tbl_keluarga` (`id_keluarga`),
  ADD CONSTRAINT `tbl_pindah_keluar_ibfk_6` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `tbl_pindah_keluar_ibfk_7` FOREIGN KEY (`id_jenis_pindah`) REFERENCES `ref_jenis_pindah` (`id_jenis_pindah`),
  ADD CONSTRAINT `tbl_pindah_keluar_ibfk_8` FOREIGN KEY (`id_klasifikasi_pindah`) REFERENCES `ref_klasifikasi_pindah` (`id_klasifikasi_pindah`),
  ADD CONSTRAINT `tbl_pindah_keluar_ibfk_9` FOREIGN KEY (`id_alasan_pindah`) REFERENCES `ref_alasan_pindah` (`id_alasan_pindah`);

--
-- Constraints for table `tbl_pindah_masuk`
--
ALTER TABLE `tbl_pindah_masuk`
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_1` FOREIGN KEY (`id_rt`) REFERENCES `ref_rt` (`id_rt`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_2` FOREIGN KEY (`id_rw`) REFERENCES `ref_rw` (`id_rw`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_3` FOREIGN KEY (`id_dusun`) REFERENCES `ref_dusun` (`id_dusun`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_4` FOREIGN KEY (`id_desa`) REFERENCES `ref_desa` (`id_desa`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_5` FOREIGN KEY (`id_penduduk`) REFERENCES `tbl_penduduk` (`id_penduduk`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_6` FOREIGN KEY (`id_keluarga`) REFERENCES `tbl_keluarga` (`id_keluarga`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_7` FOREIGN KEY (`id_jenis_pindah`) REFERENCES `ref_jenis_pindah` (`id_jenis_pindah`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_8` FOREIGN KEY (`id_klasifikasi_pindah`) REFERENCES `ref_klasifikasi_pindah` (`id_klasifikasi_pindah`),
  ADD CONSTRAINT `tbl_pindah_masuk_ibfk_9` FOREIGN KEY (`id_alasan_pindah`) REFERENCES `ref_alasan_pindah` (`id_alasan_pindah`);

--
-- Constraints for table `tbl_regulasi`
--
ALTER TABLE `tbl_regulasi`
  ADD CONSTRAINT `tbl_regulasi_ibfk_1` FOREIGN KEY (`id_desa`) REFERENCES `ref_desa` (`id_desa`);

--
-- Constraints for table `tbl_sejarah`
--
ALTER TABLE `tbl_sejarah`
  ADD CONSTRAINT `tbl_sejarah_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

--
-- Constraints for table `tbl_surat`
--
ALTER TABLE `tbl_surat`
  ADD CONSTRAINT `tbl_surat_ibfk_1` FOREIGN KEY (`id_perangkat`) REFERENCES `tbl_perangkat` (`id_perangkat`);

--
-- Constraints for table `tbl_visi_misi`
--
ALTER TABLE `tbl_visi_misi`
  ADD CONSTRAINT `tbl_visi_misi_ibfk_1` FOREIGN KEY (`id_pengguna`) REFERENCES `tbl_pengguna` (`id_pengguna`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
