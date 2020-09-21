-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 23, 2019 at 12:01 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11686485_jpunma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `username`, `password`) VALUES
(4, 'Dzulfikri', 'admin', 'M2NmMTA4YTRlMGE0OTgzNDdhNWE3NWE3OTJmMjMyMTI='),
(5, 'ADMIN', 'alfik', 'M2NmMTA4YTRlMGE0OTgzNDdhNWE3NWE3OTJmMjMyMTI=');

-- --------------------------------------------------------

--
-- Table structure for table `alumni`
--

CREATE TABLE `alumni` (
  `id_user` int(11) NOT NULL,
  `namadepan` varchar(255) NOT NULL,
  `namabelakang` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `tanggallahir` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `nomorkontak` varchar(15) DEFAULT NULL,
  `pekerjaan` varchar(255) DEFAULT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `tahunmasuk` varchar(255) DEFAULT NULL,
  `tahunlulus` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumni`
--

INSERT INTO `alumni` (`id_user`, `namadepan`, `namabelakang`, `npm`, `email`, `password`, `tanggallahir`, `alamat`, `kota`, `provinsi`, `nomorkontak`, `pekerjaan`, `cv`, `jurusan`, `tahunmasuk`, `tahunlulus`) VALUES
(4, 'Muhammad', 'Deni', '123456', 'deni@gmail.com', 'ZTAzM2Q2NTQ5NzdiNDk4NmU2OWMxZmJjZTY5NjUxODc=', '11/05/1994', 'Majalengka', 'Majalengka', 'Jawa Barat', '1234567890', NULL, NULL, 'Teknik Informatika', '05/11/2019', '21/11/2019'),
(5, 'bambang', 'sukrisno', '654321', NULL, 'ZTAzM2Q2NTQ5NzdiNDk4NmU2OWMxZmJjZTY5NjUxODc=', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 'Tes', '3', '112233', 'admin@admin.com', 'Zjg5MjJlOGJmNjJiNzFmYzZlMzg3NzU3NDE3MDc5MGQ=', '23/11/2019', 'Tes3', 'Majalengka', 'Jawa barat', '098668', NULL, NULL, 'S1', '23/11/2019', '23/11/2019');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id_company` int(11) NOT NULL,
  `namacompany` varchar(255) DEFAULT NULL,
  `namahired` varchar(255) NOT NULL,
  `posisi` varchar(255) NOT NULL,
  `nomortelepon` varchar(15) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `provinsi` varchar(255) DEFAULT NULL,
  `kota` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id_company`, `namacompany`, `namahired`, `posisi`, `nomortelepon`, `email`, `password`, `alamat`, `provinsi`, `kota`) VALUES
(1, 'Bank Jabar banten', 'Dzulfikri', 'Direktur', '089507436748', 'bjbpusat@gmail.com', 'Yjk0ODU3ZjZhOTA1Y2NkMDI4MzI5YjBhODMyNGFjNGM=', 'Cikijing', 'Jawa Barat', 'Majalengka'),
(2, 'inatel', 'Fikri', 'SM', '082121884879', 'inatel@gmail.com', 'ZTAzM2Q2NTQ5NzdiNDk4NmU2OWMxZmJjZTY5NjUxODc=', 'cianjur', 'Jawa Barat', 'Cianjur'),
(3, 'Uptd', 'Tes2', 'Tes3', '098664600001', 'admin@admin.com', 'ZTAzM2Q2NTQ5NzdiNDk4NmU2OWMxZmJjZTY5NjUxODc=', 'Tes ini adalah contoh', 'Jawa barat', 'Majalengka');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `id_job` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `namajob` varchar(255) NOT NULL,
  `bidangjob` varchar(255) NOT NULL,
  `gajiminimal` varchar(255) NOT NULL,
  `gajimaksimal` varchar(255) NOT NULL,
  `kotajob` varchar(255) NOT NULL,
  `desjob` text NOT NULL,
  `syarat` text NOT NULL,
  `emailcompany` varchar(255) NOT NULL,
  `tanggalterbit` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`id_job`, `id_company`, `namajob`, `bidangjob`, `gajiminimal`, `gajimaksimal`, `kotajob`, `desjob`, `syarat`, `emailcompany`, `tanggalterbit`) VALUES
(1, 1, 'Assistant Manager', 'Management', '10.000.000', '20.000.000', 'Majalengka', '1.\r\n2.\r\n3.\r\n4.\r\n5.\r\n6.\r\n7.\r\n8.\r\n9.\r\n10.', '1.\r\n2.\r\n3.\r\n4.\r\n5.\r\n6.\r\n7.\r\n8.\r\n9.\r\n10.', 'fikriallfik@gmail.com', '2018-08-16 04:19:04'),
(2, 1, 'Mengaduk Semen 1', 'Bangunan 1', '3', '4', '5', 'tolak-pelamar.php', 'tolak-pelamar.php', '8', '2018-08-16 11:21:04'),
(3, 2, 'Area Manager asd', 'Managing', '10000000', '20000000', 'Cianjur', 'asd', 'asd', 'inatel@gmail.com', '2019-11-22 16:57:28');

-- --------------------------------------------------------

--
-- Table structure for table `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id_label` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `dp_nama` varchar(255) NOT NULL,
  `dp_npm` varchar(255) NOT NULL,
  `dp_jk` varchar(255) NOT NULL,
  `dp_jurusan` varchar(255) NOT NULL,
  `dp_tahunmasuk` varchar(255) NOT NULL,
  `dp_tahunlulus` varchar(255) NOT NULL,
  `dp_alamat` varchar(255) NOT NULL,
  `dp_kota` varchar(255) NOT NULL,
  `dp_provinsi` varchar(255) NOT NULL,
  `dp_kodepos` varchar(255) NOT NULL,
  `dp_tanggallahir` varchar(255) NOT NULL,
  `dp_kontak` varchar(255) NOT NULL,
  `dp_email` varchar(255) NOT NULL,
  `b1` varchar(255) NOT NULL,
  `b2` varchar(255) NOT NULL,
  `alasanb2` text NOT NULL,
  `b3` varchar(255) NOT NULL,
  `alasanb3` text NOT NULL,
  `b4` varchar(255) NOT NULL,
  `b5` varchar(255) NOT NULL,
  `b6` varchar(255) NOT NULL,
  `b7` varchar(255) NOT NULL,
  `b8` varchar(255) NOT NULL,
  `b9` varchar(255) NOT NULL,
  `b10` varchar(255) NOT NULL,
  `b11` varchar(255) NOT NULL,
  `b12` varchar(255) NOT NULL,
  `b13` varchar(255) NOT NULL,
  `c1` varchar(255) NOT NULL,
  `c2` varchar(255) NOT NULL,
  `c3` varchar(255) NOT NULL,
  `c4` varchar(255) NOT NULL,
  `c5` varchar(255) NOT NULL,
  `c6` varchar(255) NOT NULL,
  `c7` varchar(255) NOT NULL,
  `c8` varchar(255) NOT NULL,
  `c9` varchar(255) NOT NULL,
  `c10` varchar(255) NOT NULL,
  `c11` varchar(255) NOT NULL,
  `c12` varchar(255) NOT NULL,
  `c13` varchar(255) NOT NULL,
  `c14` varchar(255) NOT NULL,
  `c15` varchar(255) NOT NULL,
  `c16` varchar(255) NOT NULL,
  `c17` varchar(255) NOT NULL,
  `c18` varchar(255) NOT NULL,
  `c19` varchar(255) NOT NULL,
  `c20` varchar(255) NOT NULL,
  `c21` varchar(255) NOT NULL,
  `c22` varchar(255) NOT NULL,
  `c23` varchar(255) NOT NULL,
  `c24` varchar(255) NOT NULL,
  `c25` varchar(255) NOT NULL,
  `c26` varchar(255) NOT NULL,
  `d1` text NOT NULL,
  `d2` text NOT NULL,
  `d4` text NOT NULL,
  `d5` text NOT NULL,
  `d6` text NOT NULL,
  `d7` text NOT NULL,
  `d8` text NOT NULL,
  `d9` text NOT NULL,
  `d10` text NOT NULL,
  `d11` text NOT NULL,
  `d12` text NOT NULL,
  `d14` text NOT NULL,
  `d15` text NOT NULL,
  `d16` text NOT NULL,
  `d17` text NOT NULL,
  `d18` text NOT NULL,
  `d19` text NOT NULL,
  `d20` text NOT NULL,
  `d21` text NOT NULL,
  `d22` text NOT NULL,
  `d23` text NOT NULL,
  `d24` text NOT NULL,
  `d25` text NOT NULL,
  `e2` text NOT NULL,
  `e3` text NOT NULL,
  `e4` text NOT NULL,
  `e5` text NOT NULL,
  `e6` text NOT NULL,
  `e7` text NOT NULL,
  `e8` text NOT NULL,
  `e9` text NOT NULL,
  `e10` text NOT NULL,
  `e11` text NOT NULL,
  `e12` text NOT NULL,
  `e13` text NOT NULL,
  `e14` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kuesioner`
--

INSERT INTO `kuesioner` (`id_label`, `id_user`, `dp_nama`, `dp_npm`, `dp_jk`, `dp_jurusan`, `dp_tahunmasuk`, `dp_tahunlulus`, `dp_alamat`, `dp_kota`, `dp_provinsi`, `dp_kodepos`, `dp_tanggallahir`, `dp_kontak`, `dp_email`, `b1`, `b2`, `alasanb2`, `b3`, `alasanb3`, `b4`, `b5`, `b6`, `b7`, `b8`, `b9`, `b10`, `b11`, `b12`, `b13`, `c1`, `c2`, `c3`, `c4`, `c5`, `c6`, `c7`, `c8`, `c9`, `c10`, `c11`, `c12`, `c13`, `c14`, `c15`, `c16`, `c17`, `c18`, `c19`, `c20`, `c21`, `c22`, `c23`, `c24`, `c25`, `c26`, `d1`, `d2`, `d4`, `d5`, `d6`, `d7`, `d8`, `d9`, `d10`, `d11`, `d12`, `d14`, `d15`, `d16`, `d17`, `d18`, `d19`, `d20`, `d21`, `d22`, `d23`, `d24`, `d25`, `e2`, `e3`, `e4`, `e5`, `e6`, `e7`, `e8`, `e9`, `e10`, `e11`, `e12`, `e13`, `e14`) VALUES
(4, 4, 'Muhammad Deni', '123456', 'Laki-laki', 'Informatika', '04/11/2019', '15/11/2019', 'Majalengka', 'Majalengka', 'Jawa Barat', '1234', '11/05/1994', '1234567890', 'deni@gmail.com', 'Tiga', '', 'asd', '', 'asd', 'asd', 'Kurang yakin bila hanya di bidang ini saja', 'Wiraswasta', 'Tidak', 'Tidak', 'Setelah lulus', 'Tidak', 'Setelah lulus', '123', 'Tidak', 'asd', 'Wiraswasta', 'asd', '30/10/2019', '28/11/2019', '', 'Info lowongan kemahasiswaan', '$8c', 'Tidak puas', '', 'Lebih dari Rp. 7.500.000 - Rp. 10.000.000', 'Tidak', 'Sangat Rendah', 'Tidak', 'Lebih dari tiga kali', 'Tidak', 'asd', 'asd', '13/11/2019', '31/10/2019', '', 'PKMA (Pengembangan Karir Mahasiswa dan Alumni Universitas Majalengka)', 'Tidak Sesuai harapan', 'Tidak', '', 'Tidak', 'Tidak', 'asd', 'Tidak Penting', 'Tidak Penting', 'Tidak Penting', 'Tidak Penting', 'Tidak Penting', 'Tidak Penting', 'Tidak Penting', 'Mampu', 'Generik', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Tidak Menguasai', 'Sangat dibutuhkan', '', '', 'Kurang dibutuhkan', 'Dibutuhkan', 'Sangat dibutuhkan', 'Sangat dibutuhkan', 'Sangat dibutuhkan', 'Kurang dibutuhkan', 'Dibutuhkan', '', 'Kurang dibutuhkan', 'Masukan');

-- --------------------------------------------------------

--
-- Table structure for table `lamar_kerja`
--

CREATE TABLE `lamar_kerja` (
  `id_lamar` int(11) NOT NULL,
  `id_job` int(11) NOT NULL,
  `id_company` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lamar_kerja`
--

INSERT INTO `lamar_kerja` (`id_lamar`, `id_job`, `id_company`, `id_user`, `status`) VALUES
(5, 1, 1, 1, 0),
(6, 1, 1, 3, 0),
(8, 3, 2, 4, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `alumni`
--
ALTER TABLE `alumni`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `npm` (`npm`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id_company`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`id_job`);

--
-- Indexes for table `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id_label`);

--
-- Indexes for table `lamar_kerja`
--
ALTER TABLE `lamar_kerja`
  ADD PRIMARY KEY (`id_lamar`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `alumni`
--
ALTER TABLE `alumni`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id_company` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id_label` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `lamar_kerja`
--
ALTER TABLE `lamar_kerja`
  MODIFY `id_lamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
