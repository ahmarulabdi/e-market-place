-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 19, 2017 at 09:34 
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi_proyek`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_aplikasi`
--

CREATE TABLE `data_aplikasi` (
  `id_aplikasi` int(5) NOT NULL,
  `nama_aplikasi` tinytext,
  `kontraktor` tinytext,
  `lokasi` tinytext,
  `tanggal_mulai` date DEFAULT NULL,
  `id_user` int(5) DEFAULT NULL,
  `gambar_aplikasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_aplikasi`
--

INSERT INTO `data_aplikasi` (`id_aplikasi`, `nama_aplikasi`, `kontraktor`, `lokasi`, `tanggal_mulai`, `id_user`, `gambar_aplikasi`) VALUES
(1, 'sistem pegawai', 'dinas pegawai', 'jln sudirman', '2017-05-15', 13, ''),
(11, 'asda', 'asdasd', 'asdasd', '2017-05-16', 13, ''),
(14, 'hurricane', 'ashalp', 'road balam', '0000-00-00', 8, '3.jpg ');

-- --------------------------------------------------------

--
-- Table structure for table `data_pekerjaan`
--

CREATE TABLE `data_pekerjaan` (
  `id_kerja` int(5) NOT NULL,
  `nama_kerja` text,
  `bobot` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_pekerjaan`
--

INSERT INTO `data_pekerjaan` (`id_kerja`, `nama_kerja`, `bobot`) VALUES
(1, 'core programming', '8');

-- --------------------------------------------------------

--
-- Table structure for table `data_prkb_aplikasi_proyek`
--

CREATE TABLE `data_prkb_aplikasi_proyek` (
  `id_aplikasi` int(5) DEFAULT NULL,
  `id_kerja` int(5) DEFAULT NULL,
  `id_subkerja` int(5) DEFAULT NULL,
  `id_perkembangan` int(5) NOT NULL,
  `tanggal` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tahap` int(5) DEFAULT NULL,
  `target` enum('y','n') DEFAULT NULL,
  `jenis_aplikasi` tinytext,
  `realisasi` double DEFAULT NULL,
  `jdwl_masuk` tinytext,
  `jdwl_keluar` tinytext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_prkb_aplikasi_proyek`
--

INSERT INTO `data_prkb_aplikasi_proyek` (`id_aplikasi`, `id_kerja`, `id_subkerja`, `id_perkembangan`, `tanggal`, `tanggal_update`, `tahap`, `target`, `jenis_aplikasi`, `realisasi`, `jdwl_masuk`, `jdwl_keluar`) VALUES
(1, 1, 1, 3, '2017-05-18 04:39:27', '2017-05-18 05:03:40', 4, 'n', 'aplikasi web', 8, 'hari senin', 'hari sabtu');

-- --------------------------------------------------------

--
-- Table structure for table `data_subpekerjaan`
--

CREATE TABLE `data_subpekerjaan` (
  `id_subkerja` int(5) NOT NULL,
  `nama_subkerja` text NOT NULL,
  `bobot` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_subpekerjaan`
--

INSERT INTO `data_subpekerjaan` (`id_subkerja`, `nama_subkerja`, `bobot`) VALUES
(1, 'core programming pada bagian pegawai', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tindak_tt`
--

CREATE TABLE `tindak_tt` (
  `id_aplikasi` int(5) DEFAULT NULL,
  `id_ttt` int(5) NOT NULL,
  `tgl` date DEFAULT NULL,
  `persoalan` tinytext,
  `tindakan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tindak_tt`
--

INSERT INTO `tindak_tt` (`id_aplikasi`, `id_ttt`, `tgl`, `persoalan`, `tindakan`) VALUES
(1, 2, '2017-05-17', 'bug pada data penggajian pegawai', 'perbaikan ulang struktur table di penggajian');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` enum('administrator','member','programmer','analis','manager_marketing','direktur') NOT NULL,
  `nama_user` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `email`, `hak_akses`, `nama_user`) VALUES
(1, 'admin', '0192023a7bbd73250516f069df18b500', '', 'administrator', 'abdi'),
(6, 'manager', '0795151defba7a4b5dfa89170de46277', '', 'manager_marketing', 'alexis'),
(8, 'member', 'a510166163833c79aa703646f59c04bb', '', 'member', 'adesyade'),
(10, 'direktur', 'e56c0d6857d7acbd5bce85e1ffa28e34', '', 'direktur', 'gery andrika'),
(11, 'analis', '50c7ac9abd28c21c1449e50379e16431', '', 'analis', 'anelisa'),
(12, 'programmer', '1c515581917ffb0fdff67766cbd79bad', '', 'programmer', 'progeria'),
(13, 'random', '332b3091416bc4687821c4653f1c6eb1', '', 'member', 'randomjack'),
(14, 'rade', '90178ca8dea46e997df3378757489f34', '', 'member', 'radeandre'),
(15, 'rizal', '150fb021c56c33f82eef99253eb36ee1', '', 'member', 'rizal'),
(16, '1', 'c4ca4238a0b923820dcc509a6f75849b', '', 'member', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data_aplikasi`
--
ALTER TABLE `data_aplikasi`
  ADD PRIMARY KEY (`id_aplikasi`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  ADD PRIMARY KEY (`id_kerja`);

--
-- Indexes for table `data_prkb_aplikasi_proyek`
--
ALTER TABLE `data_prkb_aplikasi_proyek`
  ADD PRIMARY KEY (`id_perkembangan`),
  ADD KEY `id_aplikasi` (`id_aplikasi`),
  ADD KEY `id_kerja` (`id_kerja`),
  ADD KEY `id_subkerja` (`id_subkerja`);

--
-- Indexes for table `data_subpekerjaan`
--
ALTER TABLE `data_subpekerjaan`
  ADD PRIMARY KEY (`id_subkerja`);

--
-- Indexes for table `tindak_tt`
--
ALTER TABLE `tindak_tt`
  ADD PRIMARY KEY (`id_ttt`),
  ADD KEY `id_aplikasi` (`id_aplikasi`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data_aplikasi`
--
ALTER TABLE `data_aplikasi`
  MODIFY `id_aplikasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `data_pekerjaan`
--
ALTER TABLE `data_pekerjaan`
  MODIFY `id_kerja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `data_prkb_aplikasi_proyek`
--
ALTER TABLE `data_prkb_aplikasi_proyek`
  MODIFY `id_perkembangan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_subpekerjaan`
--
ALTER TABLE `data_subpekerjaan`
  MODIFY `id_subkerja` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tindak_tt`
--
ALTER TABLE `tindak_tt`
  MODIFY `id_ttt` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_aplikasi`
--
ALTER TABLE `data_aplikasi`
  ADD CONSTRAINT `data_aplikasi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `data_prkb_aplikasi_proyek`
--
ALTER TABLE `data_prkb_aplikasi_proyek`
  ADD CONSTRAINT `data_prkb_aplikasi_proyek_ibfk_1` FOREIGN KEY (`id_aplikasi`) REFERENCES `data_aplikasi` (`id_aplikasi`),
  ADD CONSTRAINT `data_prkb_aplikasi_proyek_ibfk_2` FOREIGN KEY (`id_kerja`) REFERENCES `data_pekerjaan` (`id_kerja`),
  ADD CONSTRAINT `data_prkb_aplikasi_proyek_ibfk_3` FOREIGN KEY (`id_subkerja`) REFERENCES `data_subpekerjaan` (`id_subkerja`);

--
-- Constraints for table `tindak_tt`
--
ALTER TABLE `tindak_tt`
  ADD CONSTRAINT `tindak_tt_ibfk_1` FOREIGN KEY (`id_aplikasi`) REFERENCES `data_aplikasi` (`id_aplikasi`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
