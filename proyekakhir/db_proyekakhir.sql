-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2018 at 11:11 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_proyekakhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `datawarga`
--

CREATE TABLE `datawarga` (
  `nik` int(16) NOT NULL,
  `no_kk` int(16) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `rt` int(11) NOT NULL,
  `rw` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  `hubungan_keluarga` varchar(20) NOT NULL,
  `scan` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datawarga`
--

INSERT INTO `datawarga` (`nik`, `no_kk`, `nama_lengkap`, `alamat`, `rt`, `rw`, `jenis_kelamin`, `tempat_tanggal_lahir`, `no_telp`, `agama`, `pendidikan`, `pekerjaan`, `status`, `hubungan_keluarga`, `scan`, `ket`) VALUES
(87678, 8391, 'jdfkq', 'fsjl', 12, 8, 'dhjfklq', 'hfwjkd', '7896', 'djw', 'hjdw', 'dfjkb', 'hjd', 'jwk', '6701154160_Nadia Salsabila.docx', '');

-- --------------------------------------------------------

--
-- Table structure for table `domisili`
--

CREATE TABLE `domisili` (
  `nama_warga` varchar(100) NOT NULL,
  `nik` int(100) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `tempat_tgl_lahir` varchar(50) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `kewarganegaraan` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `pendidikan` varchar(100) NOT NULL,
  `alamat_asal` varchar(100) NOT NULL,
  `pindah_ke` varchar(100) NOT NULL,
  `alasan_pindah` varchar(100) NOT NULL,
  `pengikut` varchar(50) NOT NULL,
  `tgl_surat_dibuat` date NOT NULL,
  `tgl_surat_masuk` date NOT NULL,
  `keterangan` varchar(100) NOT NULL,
  `scan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kepaladesa`
--

CREATE TABLE `kepaladesa` (
  `id_kepdes` int(11) NOT NULL,
  `nama_lengkap` int(11) NOT NULL,
  `alamat` int(11) NOT NULL,
  `tempat_tanggal_lahir` int(11) NOT NULL,
  `no_telp` int(11) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kepaladesa`
--

INSERT INTO `kepaladesa` (`id_kepdes`, `nama_lengkap`, `alamat`, `tempat_tanggal_lahir`, `no_telp`, `jenis_kelamin`, `agama`, `status`, `username`, `password`) VALUES
(1, 0, 0, 0, 754, 'jgx', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `laporan`
--

CREATE TABLE `laporan` (
  `id_laporan` int(11) NOT NULL,
  `data_warga` varchar(1000) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `laporan`
--

INSERT INTO `laporan` (`id_laporan`, `data_warga`, `keterangan`) VALUES
(1, 'CV__AAA.docx', 'ghdhh');

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notif` int(11) NOT NULL,
  `pesan` varchar(100) NOT NULL,
  `event` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_pelayanan` int(11) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tempat_tanggal_lahir` varchar(50) NOT NULL,
  `no_telp` int(15) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `agama` varchar(15) NOT NULL,
  `status` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `role`) VALUES
('admin', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin'),
('kepaladesa', '827ccb0eea8a706c4c34a16891f84e7b', 'Kepala Desa'),
('pelayanan', '01cfcd4f6b8770febfb40cb906715822', 'Bagian Pelayanan'),
('sekdes', '827ccb0eea8a706c4c34a16891f84e7b', 'sekdes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `datawarga`
--
ALTER TABLE `datawarga`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `domisili`
--
ALTER TABLE `domisili`
  ADD PRIMARY KEY (`nama_warga`,`nik`,`jenis_kelamin`,`tempat_tgl_lahir`);

--
-- Indexes for table `kepaladesa`
--
ALTER TABLE `kepaladesa`
  ADD PRIMARY KEY (`id_kepdes`);

--
-- Indexes for table `laporan`
--
ALTER TABLE `laporan`
  ADD PRIMARY KEY (`id_laporan`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notif`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kepaladesa`
--
ALTER TABLE `kepaladesa`
  MODIFY `id_kepdes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `laporan`
--
ALTER TABLE `laporan`
  MODIFY `id_laporan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
