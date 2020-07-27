CREATE TABLE IF NOT EXISTS `karyawan` (
  `id_karyawan` int(2) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `jk` enum('Pria','Wanita') NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `penempatan` varchar(255) NOT NULL,
  PRIMARY KEY (`id_karyawan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `nama`, `jk`, `jabatan`, `penempatan`) VALUES
(1, 'Ahmad Haris', 'Pria', 'CEO', 'Medan'),
(2, 'Amanda Rizka', 'Wanita', 'Akuntan', 'Jakarta'),
(3, 'Budi', 'Pria', 'Software Engineer', 'Medan'),
(4, 'Cika', 'Wanita', 'Web Designer', 'Medan'),
(5, 'Jimmy', 'Pria', 'Sales', 'Bandung'),
(6, 'Debby', 'Wanita', 'Web Programmer', 'Bandung');
