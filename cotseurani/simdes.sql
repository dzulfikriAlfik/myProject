-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 16. Maret 2016 jam 17:35
-- Versi Server: 5.5.16
-- Versi PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simdes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(1) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku_tamu`
--

CREATE TABLE IF NOT EXISTS `buku_tamu` (
  `id_tamu` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `jk` varchar(2) NOT NULL,
  `komentar` varchar(200) NOT NULL,
  PRIMARY KEY (`id_tamu`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `buku_tamu`
--

INSERT INTO `buku_tamu` (`id_tamu`, `nama`, `email`, `jk`, `komentar`) VALUES
(2, 'munar', 'munar@yahoo.com', 'LK', 'Bgus Sekali'),
(3, 'Azman', 'azma@gmail.com', 'LK', 'Tesssss'),
(4, 'Kuch', 'samm@gmail.com', 'LK', 'Bagusss Banget');

-- --------------------------------------------------------

--
-- Struktur dari tabel `det_keluarga`
--

CREATE TABLE IF NOT EXISTS `det_keluarga` (
  `id_keluarga` varchar(20) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  KEY `id_warga` (`no_ktp`,`id_keluarga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `det_keluarga`
--

INSERT INTO `det_keluarga` (`id_keluarga`, `no_ktp`) VALUES
('90', '198988'),
('8999', '42434'),
('56', '5362772'),
('90909', '56644'),
('88888', '777788'),
('788', '7878');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE IF NOT EXISTS `download` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal_upload` date NOT NULL,
  `nama_file` varchar(100) NOT NULL,
  `tipe_file` varchar(10) NOT NULL,
  `ukuran_file` varchar(20) NOT NULL,
  `file` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data untuk tabel `download`
--

INSERT INTO `download` (`id`, `tanggal_upload`, `nama_file`, `tipe_file`, `ukuran_file`, `file`) VALUES
(6, '2014-12-21', 'Panduan Penulisan Skripsi / TA', 'pdf', '358168', 'files/Panduan Penulisan Skripsi / TA.pdf'),
(13, '2015-03-02', 'Surat Keterangan Calon Imum', 'docx', '16543', 'files/Surat Keterangan Calon Imum.docx'),
(14, '2015-03-02', 'Surat Keterangan Panggilan', 'docx', '19321', 'files/Surat Keterangan Panggilan.docx');

-- --------------------------------------------------------

--
-- Struktur dari tabel `inventaris`
--

CREATE TABLE IF NOT EXISTS `inventaris` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `jns_inventaris` varchar(30) NOT NULL,
  `nm_inventaris` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `inventaris`
--

INSERT INTO `inventaris` (`id`, `jns_inventaris`, `nm_inventaris`) VALUES
(1, 'Sarana', 'Gedung Kepdes'),
(2, 'dffg', 'dghh'),
(3, 'hjh', 'yi'),
(4, 'y', 'uki');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelahiran`
--

CREATE TABLE IF NOT EXISTS `kelahiran` (
  `id_kelahiran` int(5) NOT NULL AUTO_INCREMENT,
  `no_suratlahir` varchar(15) NOT NULL,
  `no_kk` varchar(15) NOT NULL,
  `anak` varchar(15) NOT NULL,
  `tgl_lahir` varchar(15) NOT NULL,
  PRIMARY KEY (`id_kelahiran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `kelahiran`
--

INSERT INTO `kelahiran` (`id_kelahiran`, `no_suratlahir`, `no_kk`, `anak`, `tgl_lahir`) VALUES
(13, '001', '788', '3', '2015-06-16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keluarga`
--

CREATE TABLE IF NOT EXISTS `keluarga` (
  `id_keluarga` varchar(20) NOT NULL,
  `kepala_keluarga` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `dusun` varchar(30) NOT NULL,
  `rt` varchar(2) DEFAULT NULL,
  `rw` varchar(2) DEFAULT NULL,
  `ekonomi` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_keluarga`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keluarga`
--

INSERT INTO `keluarga` (`id_keluarga`, `kepala_keluarga`, `alamat`, `dusun`, `rt`, `rw`, `ekonomi`) VALUES
('8999', 'Arul', 'cot seurani', 'Klagen', '01', '02', 'Sangat_Kaya'),
('90909', 'shaljan', 'cot seurani', 'Ngembung', '02', '03', 'Sangat_Kaya'),
('788', 'Azman Abdul Wahid', 'cot seurani', 'Cot', '01', '01', 'Kaya'),
('88888', 'Putri', 'cot seurani', 'Balee', '02', '02', 'Sangat_Kaya'),
('90', 'Rinda Renggali Putri', 'cot seurani', 'Balee', '01', '02', 'Kaya'),
('56', 'aidi safarah', 'cot seurani', 'Balee', '03', '03', 'Miskin');

--
-- Trigger `keluarga`
--
DROP TRIGGER IF EXISTS `hapus_detail_klg`;
DELIMITER //
CREATE TRIGGER `hapus_detail_klg` AFTER DELETE ON `keluarga`
 FOR EACH ROW begin

delete  from det_keluarga where det_keluarga.id_keluarga = old.id_keluarga;

end
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kematian`
--

CREATE TABLE IF NOT EXISTS `kematian` (
  `id_kematian` int(5) NOT NULL AUTO_INCREMENT,
  `no_suratkematian` varchar(15) NOT NULL,
  `no_kk` varchar(15) NOT NULL,
  `tgl_meninggal` varchar(15) NOT NULL,
  `jam_meninggal` varchar(15) NOT NULL,
  `tempat_meninggal` varchar(30) NOT NULL,
  `sebab_meninggal` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kematian`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `kematian`
--

INSERT INTO `kematian` (`id_kematian`, `no_suratkematian`, `no_kk`, `tgl_meninggal`, `jam_meninggal`, `tempat_meninggal`, `sebab_meninggal`) VALUES
(1, '111', '788', '2015-06-09', 't', 'ryt', 'ryt');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mutasi_warga`
--

CREATE TABLE IF NOT EXISTS `mutasi_warga` (
  `id_mutasi` mediumint(9) NOT NULL AUTO_INCREMENT,
  `id_warga` varchar(20) NOT NULL,
  `jenis_mutasi` varchar(15) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` text,
  PRIMARY KEY (`id_mutasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE IF NOT EXISTS `profil` (
  `id_profil` int(1) NOT NULL AUTO_INCREMENT,
  `isi_profil` text NOT NULL,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`id_profil`, `isi_profil`) VALUES
(8, 'Dinamika pembangunan masyarakat desa Paya Cut  menunjukan pertumbuhan yang positif, ditandai keberhasilan pembangunan yang mengalami peningkatan dari tahun ke tahun. Memasuki era globalisasi dan seiring dengan semakin meningkatnya pengetahuan masyarakat akan hak-haknya, serta meningkatnya kebutuhan semakin kompleks merupakan tantangan bagi pemerintah daerah untuk meningkatkan capaian hasil pembangunan. Untuk mengantisipasi berbagai permasalahan, tantangan serta perkembangan di masa kini dan masa depan diperlukan perencanaan yang jelas terarah dan partisipatif.\r\nKondisi yang diharapkan di masa depan tidak terlepas dari pencapaian sasaran-sasaran dan tujuan-tujuan pembangunan secara efektif. Seiring dengan itu, upaya secara terus menrus tetap diarahkan untuk mengatasi tantangan dan hambatan pembangunan desa guna mewujudkan kondisi yang diharapkan dan kondisi saat ini merupakan modal dasar atau bahan untuk perencanaan yang akan menentukan keberhasilan.\r\n'),
(9, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `surat`
--

CREATE TABLE IF NOT EXISTS `surat` (
  `id_surat` int(8) NOT NULL AUTO_INCREMENT,
  `jenis_surat` varchar(4) NOT NULL,
  `no_surat` varchar(50) NOT NULL,
  `nama_surat` varchar(50) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `isi_surat` text,
  `tanda_tangan` varchar(50) NOT NULL,
  `id_warga` varchar(20) NOT NULL,
  `nama_warga` varchar(50) NOT NULL,
  PRIMARY KEY (`id_surat`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `surat`
--

INSERT INTO `surat` (`id_surat`, `jenis_surat`, `no_surat`, `nama_surat`, `tanggal`, `isi_surat`, `tanda_tangan`, `id_warga`, `nama_warga`) VALUES
(3, 'SK', '470/4/437.105.08/2015', 'Surat Keterangan ', '2015-06-28', '{"nama":"azman","t_lahir":"cs,  08-06-2015","j_kel":"Laki - laki","w_negara":"jn","pendidikan":"jl","agama":"Islam","pekerjaan":"jh","s_nikah":"belum_nikah","no_ktp":"7878","alamat":"hhj RT 01 RW 02 Dusun Klagen","ket":"eeh5tntntnjtntnh"}', '{"pejabat":"Munawar","nip":""}', '7878', 'azman'),
(4, 'SK', '470/5/437.105.08/2016', 'Surat Keterangan ', '2016-01-13', '{"nama":"5362772","t_lahir":"qer","j_kel":"l","w_negara":"indi","pendidikan":"fgjuy","agama":"tyujyu","pekerjaan":"yjjy","s_nikah":"yjuj","no_ktp":"y1132424","alamat":"gjhk\\r\\ntguk7uk","ket":"etryj6jj\\r\\n\\r\\n\\r\\n\\r\\n\\r\\n"}', '{"pejabat":"Munawar","nip":""}', 'y1132424', '5362772'),
(5, 'SK', '470/6/437.105.08/2016', 'Surat Keterangan ', '2016-01-13', '{"nama":"AAN Safwadi","t_lahir":"hghg,  10-06-2015","j_kel":"Wanita","w_negara":"gg","pendidikan":"gg","agama":"Islam","pekerjaan":"gg","s_nikah":"belum_nikah","no_ktp":"5362772","alamat":"cot seurani RT 03 RW 03 Dusun Balee","ket":"belum menikah"}', '{"pejabat":"Saimuddin Hasan","nip":""}', '5362772', 'AAN Safwadi'),
(6, 'SKP', '475/1/437.105.08/2016', 'Surat Keterangan Pindah', '2016-01-13', '{"nama":"AAN Safwadi","t_lahir":"hghg,  10-06-2015","j_kel":"Wanita","w_negara":"gg","pendidikan":"gg","agama":"Islam","pekerjaan":"gg","s_nikah":"belum_nikah","no_ktp":"5362772","alamat":"cot seurani RT 03 RW 03 Dusun Balee","pindah_ke":"Lhok Nga","alasan":"Kerja","tgl_pindah":"12-09-2015","jum_pengikut":"0"}', '{"pejabat":"Saimuddin Hasan","nip":""}', '5362772', 'AAN Safwadi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_berita`
--

CREATE TABLE IF NOT EXISTS `tabel_berita` (
  `nomor` int(5) NOT NULL AUTO_INCREMENT,
  `user_nomor` int(5) NOT NULL,
  `waktu` datetime NOT NULL,
  `berita` tinytext NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data untuk tabel `tabel_berita`
--

INSERT INTO `tabel_berita` (`nomor`, `user_nomor`, `waktu`, `berita`) VALUES
(1, 1, '2010-11-12 10:50:01', 'hallo selamat pagi semua...!!'),
(2, 2, '2010-11-12 10:50:32', 'mari kita berdoa dan lakukan apa yang bisa lakukan untuk Indonesia'),
(3, 3, '2010-11-13 10:51:02', 'Lagi download wampserver nih...'),
(4, 4, '2010-11-13 10:51:30', 'great articel at blog.codingwear.com'),
(5, 5, '2010-11-13 11:24:31', 'Oke mantap akhirnya jalan juga seperti twitter'),
(6, 1, '2010-11-13 12:08:58', 'Oke mantap..mainkan'),
(7, 4, '2015-03-03 03:20:05', 'ssss');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_user`
--

CREATE TABLE IF NOT EXISTS `tabel_user` (
  `nomor` int(5) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `photo` varchar(50) NOT NULL,
  PRIMARY KEY (`nomor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `tabel_user`
--

INSERT INTO `tabel_user` (`nomor`, `userid`, `password`, `nama`, `email`, `photo`) VALUES
(1, 'alex', 'alex', 'alex', 'alex@yahoo.com', 'photo/1.jpg'),
(2, 'budi', 'budi', 'budi', 'budi@yahoo.com', 'photo/2.jpg'),
(3, 'Mitha', 'mitha', 'mitha', 'mitha@yahoo.com', 'photo/3.jpg'),
(4, 'bagas', 'bagas', 'bagas', 'bagas', 'photo/4.jpg'),
(5, 'Luthor', 'Luthor', 'Luthor', 'Luthor@yahoo.com', 'photo/5.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_detail_warga`
--
CREATE TABLE IF NOT EXISTS `v_detail_warga` (
`id_keluarga` varchar(20)
,`no_ktp` varchar(20)
,`nama` varchar(50)
,`agama` varchar(20)
,`t_lahir` varchar(20)
,`tgl_lahir` varchar(10)
,`j_kel` varchar(11)
,`gol_darah` varchar(2)
,`w_negara` varchar(20)
,`pendidikan` varchar(10)
,`pekerjaan` varchar(30)
,`s_nikah` varchar(20)
,`alamat` text
,`rt` varchar(2)
,`rw` varchar(2)
,`dusun` varchar(30)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `v_mutasi_warga`
--
CREATE TABLE IF NOT EXISTS `v_mutasi_warga` (
`id_warga` varchar(20)
,`j_kel` enum('L','W')
,`jenis_mutasi` varchar(15)
,`periode` varchar(7)
,`keterangan` text
);
-- --------------------------------------------------------

--
-- Struktur dari tabel `warga`
--

CREATE TABLE IF NOT EXISTS `warga` (
  `no_ktp` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `t_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `j_kel` enum('L','W') NOT NULL,
  `gol_darah` varchar(2) NOT NULL,
  `w_negara` varchar(20) NOT NULL,
  `pendidikan` varchar(10) DEFAULT NULL,
  `pekerjaan` varchar(30) NOT NULL,
  `s_nikah` varchar(20) DEFAULT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  PRIMARY KEY (`no_ktp`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `warga`
--

INSERT INTO `warga` (`no_ktp`, `nama`, `agama`, `t_lahir`, `tgl_lahir`, `j_kel`, `gol_darah`, `w_negara`, `pendidikan`, `pekerjaan`, `s_nikah`, `status`) VALUES
('98989', 'Habil', 'Islam', 'cs', '1998-04-07', 'L', 'AB', 'hbh', 'jn', 'jij', 'belum_nikah', '1'),
('878748', 'Azkia', 'Islam', 'leubu', '2015-06-17', 'L', 'AB', 'kjkjhj', 'jkj', 'kjk', 'belum_nikah', '1'),
('777788', 'Putri', 'Islam', 'jgug', '2015-06-11', 'W', 'O', 'klk', 'klkl', 'klk', 'belum_nikah', '1'),
('65644', 'asyrafi', 'Islam', 'Paya Cut', '2015-06-25', 'L', 'O', 'IND', 'S1', 'PNS', 'belum_nikah', '1'),
('5362772', 'AAN Safwadi', 'Islam', 'Paya Cut', '2015-06-10', 'W', 'A', 'IND', 'SMA', 'Tani', 'belum_nikah', '1');

-- --------------------------------------------------------

--
-- Structure for view `v_detail_warga`
--
DROP TABLE IF EXISTS `v_detail_warga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_detail_warga` AS select `a`.`id_keluarga` AS `id_keluarga`,`c`.`no_ktp` AS `no_ktp`,`c`.`nama` AS `nama`,`c`.`agama` AS `agama`,`c`.`t_lahir` AS `t_lahir`,date_format(`c`.`tgl_lahir`,'%d-%m-%Y') AS `tgl_lahir`,if((`c`.`j_kel` = 'L'),'Laki - laki','Wanita') AS `j_kel`,`c`.`gol_darah` AS `gol_darah`,`c`.`w_negara` AS `w_negara`,`c`.`pendidikan` AS `pendidikan`,`c`.`pekerjaan` AS `pekerjaan`,`c`.`s_nikah` AS `s_nikah`,`a`.`alamat` AS `alamat`,`a`.`rt` AS `rt`,`a`.`rw` AS `rw`,`a`.`dusun` AS `dusun` from ((`keluarga` `a` join `det_keluarga` `b`) join `warga` `c`) where ((`a`.`id_keluarga` = `b`.`id_keluarga`) and (`b`.`no_ktp` = `c`.`no_ktp`) and (`c`.`status` = '1'));

-- --------------------------------------------------------

--
-- Structure for view `v_mutasi_warga`
--
DROP TABLE IF EXISTS `v_mutasi_warga`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_mutasi_warga` AS select `mutasi_warga`.`id_warga` AS `id_warga`,`warga`.`j_kel` AS `j_kel`,`mutasi_warga`.`jenis_mutasi` AS `jenis_mutasi`,date_format(`mutasi_warga`.`tanggal`,'%m-%Y') AS `periode`,`mutasi_warga`.`keterangan` AS `keterangan` from (`mutasi_warga` join `warga` on((`warga`.`no_ktp` = `mutasi_warga`.`id_warga`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
