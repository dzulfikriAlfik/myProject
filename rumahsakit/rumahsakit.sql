-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2020 at 01:32 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumahsakit`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dokter`
--

CREATE TABLE `tb_dokter` (
  `id_dokter` varchar(50) NOT NULL,
  `nama_dokter` varchar(80) NOT NULL,
  `spesialis` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dokter`
--

INSERT INTO `tb_dokter` (`id_dokter`, `nama_dokter`, `spesialis`, `alamat`, `no_telp`) VALUES
('75418ce5-03c1-451b-8577-ae171f431af5', 'Dr. Ippho Santosa', 'Penyakit Dalam', 'Bandung', '087542183457'),
('88695be1-76ba-4f89-b7e0-214733bddf0a', 'Dr. Ica Cahyani', 'Hati', 'Bandung', '089507436748'),
('a6d89cc7-a72d-4122-834f-66570c4da653', 'Dr. Dzulfikri Alkautsari, S.kom', 'Hati', 'Cianjur', '082121884879'),
('b2d78a3e-90e7-45e3-a8a4-8699360b3c59', 'Dr. Andri Wongso', 'Motivasi', 'Jakarta', '085214652333'),
('c97a5c4c-1ab1-46e8-a087-33fb92c10304', 'Dr. Indah Kusuma', 'Umum', 'Bandung', '081234575265');

-- --------------------------------------------------------

--
-- Table structure for table `tb_obat`
--

CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `ket_obat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_obat`
--

INSERT INTO `tb_obat` (`id_obat`, `nama_obat`, `ket_obat`) VALUES
('1068afce-6cce-413b-af13-34d884ecdbad', 'Oskadon', 'Sakit Kepala'),
('1e766461-25d8-4d67-8411-0c12526e8406', 'Insa', 'Demam dan Sakit Kepala'),
('27ee513c-65f5-4e18-b80f-cb3ff03f9f8c', 'Ranitidin', 'Maag'),
('40d4907d-ce34-4bac-9f15-7ad414ce4002', 'Aspirin', 'Demam'),
('728cd05c-32bc-4925-bb00-55d0cebc1e3b', 'Otem', 'Tetes Mata'),
('88b97256-05f8-4c49-bcb5-c907543849f9', 'CTM', 'Gatal-gatal / Alergi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `id_pasien` varchar(50) NOT NULL,
  `nomor_identitas` varchar(30) NOT NULL,
  `nama_pasien` varchar(80) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pasien`
--

INSERT INTO `tb_pasien` (`id_pasien`, `nomor_identitas`, `nama_pasien`, `jenis_kelamin`, `alamat`, `no_telp`) VALUES
('33662107-f366-4d8c-bced-42bcbff633d4', '3210031129960022', 'Ica Cahyani', 'P', 'Bandung', '082121884879'),
('4349a497-b152-4d87-999e-2bd8f633b133', '20191215116', 'Asep Supiandi', 'L', 'Jl. Cokro Cianjur', '087334563123'),
('58eca6c7-28a8-4ee2-9b26-f355088aae2b', '20191215110', 'Ahmad Daniel', 'L', 'Jl. Terusan Cikadu - Cianjur', '087654111232'),
('77419696-5314-4de5-af90-e9ee56f7ac58', '20191215114', 'Aang Khadafi', 'L', 'Jl. Terusan Cikadu - Cianjur', '087334563123'),
('848f204f-24cf-4856-ba66-d1ce2804b308', '20191215115', 'Cecep Arip', 'L', 'Jl. Raya Sukabumi No. 2', '089786564567'),
('966a908d-7537-4ddc-998f-6eab8c92e91b', '12345678900', 'Deni Sumargo', 'L', 'Jakarta', '088123456771'),
('a4455c01-3ed1-4aa7-9920-6bdf69c5fc2f', '20191215111', 'M. Fauzan Fikrulloh', 'L', 'Jl. Raya Sukabumi No. 2', '087324366612'),
('a6cd9443-a82a-4ff7-877a-be267c0cc753', '20191215117', 'Rani Anggraeni', 'P', 'Kota Sukabumi', '089786564567'),
('b8331ef6-c97a-43e7-9f7f-dba0f5480899', '20191215112', 'Amien Darmawan', 'L', 'Jl. Cokro Cianjur', '087334563123'),
('d2bddeb2-d10f-4d10-846c-fe5f9cbd36bb', '20191215113', 'Gina Raudhatul Jannah', 'P', 'Kota Sukabumi', '089786564567'),
('e88b1a50-8bc3-4bcb-ac59-a62952cb55aa', '3210031129950021', 'Dzulfikri Alkautsari', 'L', 'Majalengka', '089507436748'),
('fbe9160c-92a2-453d-bc32-ae87210e2dd8', '09876543212', 'Rizky Pebriana', 'L', 'Majalengka', '089111543123');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poliklinik`
--

CREATE TABLE `tb_poliklinik` (
  `id_poli` varchar(50) NOT NULL,
  `nama_poli` varchar(50) NOT NULL,
  `gedung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_poliklinik`
--

INSERT INTO `tb_poliklinik` (`id_poli`, `nama_poli`, `gedung`) VALUES
('12ae15f2-b40e-4152-9e34-5a0075cf2aef', 'Poli_Kandungan', 'Utama, Lt.1'),
('254b0c35-1ce5-11ea-a637-2047470a7e05', 'Poli_Gigi', 'Utama, Lt.2'),
('254b4923-1ce5-11ea-a637-2047470a7e05', 'Poli_Mata', 'Utama, Lt.3'),
('2746466a-d3fa-49b4-9459-50d2504a6724', 'Poli_Penyakit_Dalam', 'Utama, Lt.4'),
('48533edc-da37-45fb-aa1d-7775e55f544b', 'Poli_Umum', 'Belakang, Lt.1'),
('7bc0420b-400a-44e0-b6ac-82fdb14e3779', 'Laboratorium', 'Tengah, Lt.4'),
('90c51fec-e7c6-4343-84fb-1c811984dbb8', 'Poli_Jantung', 'Belakang, Lt.2'),
('cd85d816-63a7-4056-bc11-b3827700d89d', 'Poli_Radiologi', 'Tengah, Lt.3'),
('d05c9e4e-7b0b-477f-9720-d37977b502fe', 'Poli_Kejiwaan', 'Tengah, Lt.2'),
('d3e6af98-dad4-4e96-9b71-5edef6e24fd5', 'Poli_Hati', 'Belakang, Lt.3'),
('e44b6c36-7760-4c3d-bccc-39c07db9049d', 'Poli_Anak', 'Belakang, Lt.4'),
('f972bbf2-be82-4f9a-a554-3f543de7c037', 'Medichal, Checkup', 'Tengah, Lt.1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rekammedis`
--

CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_pasien` varchar(50) NOT NULL,
  `keluhan` text NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` text NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `tgl_periksa` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rekammedis`
--

INSERT INTO `tb_rekammedis` (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES
('61075a51-4ab9-48f4-ac32-0fd19700d971', '33662107-f366-4d8c-bced-42bcbff633d4', 'Resah. Gelisah', 'a6d89cc7-a72d-4122-834f-66570c4da653', 'Rindu', 'd3e6af98-dad4-4e96-9b71-5edef6e24fd5', '2020-01-09'),
('b6e408cf-6671-4c20-926d-e313187780ca', 'a6cd9443-a82a-4ff7-877a-be267c0cc753', 'Gak Bisa Tidur', 'a6d89cc7-a72d-4122-834f-66570c4da653', 'Kangen', 'd05c9e4e-7b0b-477f-9720-d37977b502fe', '2020-01-09');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rm_obat`
--

CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_rm_obat`
--

INSERT INTO `tb_rm_obat` (`id`, `id_rm`, `id_obat`) VALUES
(3, '61075a51-4ab9-48f4-ac32-0fd19700d971', '1e766461-25d8-4d67-8411-0c12526e8406'),
(4, '61075a51-4ab9-48f4-ac32-0fd19700d971', '40d4907d-ce34-4bac-9f15-7ad414ce4002'),
(5, '61075a51-4ab9-48f4-ac32-0fd19700d971', '728cd05c-32bc-4925-bb00-55d0cebc1e3b'),
(6, '61075a51-4ab9-48f4-ac32-0fd19700d971', '88b97256-05f8-4c49-bcb5-c907543849f9'),
(7, 'b6e408cf-6671-4c20-926d-e313187780ca', '1068afce-6cce-413b-af13-34d884ecdbad'),
(8, 'b6e408cf-6671-4c20-926d-e313187780ca', '1e766461-25d8-4d67-8411-0c12526e8406'),
(9, 'b6e408cf-6671-4c20-926d-e313187780ca', '88b97256-05f8-4c49-bcb5-c907543849f9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(50) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama_user`, `username`, `password`, `level`) VALUES
('9c705046-1aea-11ea-a201-2047470a7e05', 'Dzulfikri', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dokter`
--
ALTER TABLE `tb_dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indexes for table `tb_obat`
--
ALTER TABLE `tb_obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indexes for table `tb_poliklinik`
--
ALTER TABLE `tb_poliklinik`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD PRIMARY KEY (`id_rm`),
  ADD KEY `id_pasien` (`id_pasien`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rm` (`id_rm`),
  ADD KEY `id_obat` (`id_obat`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_rekammedis`
--
ALTER TABLE `tb_rekammedis`
  ADD CONSTRAINT `tb_rekammedis_ibfk_1` FOREIGN KEY (`id_pasien`) REFERENCES `tb_pasien` (`id_pasien`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_dokter`),
  ADD CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_poli`);

--
-- Constraints for table `tb_rm_obat`
--
ALTER TABLE `tb_rm_obat`
  ADD CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
