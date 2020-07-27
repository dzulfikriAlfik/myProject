-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2019 at 07:29 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simpadu`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelahiran`
--

CREATE TABLE `tb_kelahiran` (
  `kelahiran_id` int(11) NOT NULL,
  `kelahiran_nama` varchar(50) DEFAULT NULL,
  `kelahiran_date` date DEFAULT NULL,
  `kelahiran_jk` varchar(1) DEFAULT NULL,
  `kelahiran_alamat` varchar(100) DEFAULT NULL,
  `kelahiran_orangtua` varchar(50) DEFAULT NULL,
  `kelahiran_keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelahiran`
--

INSERT INTO `tb_kelahiran` (`kelahiran_id`, `kelahiran_nama`, `kelahiran_date`, `kelahiran_jk`, `kelahiran_alamat`, `kelahiran_orangtua`, `kelahiran_keterangan`) VALUES
(1, 'dd', '2019-01-15', 'L', 'dddddd', 'dddddd', 'ddddddd');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kematian`
--

CREATE TABLE `tb_kematian` (
  `kematian_id` int(11) NOT NULL,
  `kematian_nama` varchar(50) DEFAULT NULL,
  `kematian_umur` varchar(50) DEFAULT NULL,
  `kematian_date` varchar(50) DEFAULT NULL,
  `kematian_alamat` varchar(100) DEFAULT NULL,
  `kematian_alasan` varchar(100) DEFAULT NULL,
  `kematian_keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi`
--

CREATE TABLE `tb_mutasi` (
  `mutasi_id` int(11) NOT NULL,
  `mutasi_nama` varchar(50) DEFAULT NULL,
  `mutasi_kelahiran` varchar(50) DEFAULT NULL,
  `mutasi_birthday` date DEFAULT NULL,
  `mutasi_jk` varchar(1) DEFAULT NULL,
  `mutasi_kewarganegaraan` varchar(50) DEFAULT NULL,
  `mutasi_asal` varchar(50) DEFAULT NULL,
  `mutasi_tujuan` varchar(50) DEFAULT NULL,
  `mutasi_date` date DEFAULT NULL,
  `mutasi_keterangan` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `penduduk_id` int(11) NOT NULL,
  `penduduk_nokk` varchar(50) DEFAULT NULL,
  `penduduk_nik` varchar(50) DEFAULT NULL,
  `penduduk_nama` varchar(50) DEFAULT NULL,
  `penduduk_jk` varchar(1) DEFAULT NULL,
  `penduduk_alamat` varchar(50) DEFAULT NULL,
  `penduduk_kelahiran` varchar(50) DEFAULT NULL,
  `penduduk_birthday` date DEFAULT NULL,
  `penduduk_agama` varchar(50) DEFAULT NULL,
  `penduduk_pendidikan` varchar(50) DEFAULT NULL,
  `penduduk_pekerjaan` varchar(50) DEFAULT NULL,
  `penduduk_status` varchar(50) DEFAULT NULL,
  `penduduk_status_keluarga` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_penduduk`
--

INSERT INTO `tb_penduduk` (`penduduk_id`, `penduduk_nokk`, `penduduk_nik`, `penduduk_nama`, `penduduk_jk`, `penduduk_alamat`, `penduduk_kelahiran`, `penduduk_birthday`, `penduduk_agama`, `penduduk_pendidikan`, `penduduk_pekerjaan`, `penduduk_status`, `penduduk_status_keluarga`) VALUES
(2, '124', '3210060302960060', 'maman', 'P', 'maja', 'maja', '1970-12-03', 'is', 'Sd', 'perangkat desa', 'Pernah Kawin', 'bapa'),
(6, '123', '3210060302960061', 'iik musfik', 'L', 'maja', '', '2019-01-03', 'islam', 'sma', 'mahasiswa', 'Sudah Kawin', 'fff');

-- --------------------------------------------------------

--
-- Table structure for table `tb_profil`
--

CREATE TABLE `tb_profil` (
  `profil_id` int(11) DEFAULT NULL,
  `profil_nama` varchar(50) DEFAULT NULL,
  `profil_alamat` varchar(50) DEFAULT NULL,
  `profil_pemimpin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) DEFAULT NULL,
  `user_username` varchar(50) DEFAULT NULL,
  `user_password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_nama`, `user_username`, `user_password`) VALUES
(1, 'Admin', 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_kelahiran`
--
ALTER TABLE `tb_kelahiran`
  ADD PRIMARY KEY (`kelahiran_id`);

--
-- Indexes for table `tb_kematian`
--
ALTER TABLE `tb_kematian`
  ADD PRIMARY KEY (`kematian_id`);

--
-- Indexes for table `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  ADD PRIMARY KEY (`mutasi_id`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`penduduk_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_kelahiran`
--
ALTER TABLE `tb_kelahiran`
  MODIFY `kelahiran_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_kematian`
--
ALTER TABLE `tb_kematian`
  MODIFY `kematian_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_mutasi`
--
ALTER TABLE `tb_mutasi`
  MODIFY `mutasi_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  MODIFY `penduduk_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
