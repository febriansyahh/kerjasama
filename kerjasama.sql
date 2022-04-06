-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2022 at 04:25 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kerjasama`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_mou`
--

CREATE TABLE `jenis_mou` (
  `id_mou` int(11) NOT NULL,
  `nama_mou` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_mou`
--

INSERT INTO `jenis_mou` (`id_mou`, `nama_mou`) VALUES
(1, 'MoA'),
(2, 'RKS/IA'),
(3, 'AR');

-- --------------------------------------------------------

--
-- Table structure for table `mst_unit`
--

CREATE TABLE `mst_unit` (
  `idUnit` int(11) NOT NULL,
  `nmUnit` varchar(200) NOT NULL,
  `idTingkat` int(11) NOT NULL,
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_unit`
--

INSERT INTO `mst_unit` (`idUnit`, `nmUnit`, `idTingkat`, `sysInput`) VALUES
(1, 'UPT-PSI', 3, '2022-04-05 16:04:56'),
(2, 'Fakultas Teknik', 4, '2022-04-06 15:38:52');

-- --------------------------------------------------------

--
-- Table structure for table `status_mou`
--

CREATE TABLE `status_mou` (
  `id_status` int(11) NOT NULL,
  `nama_status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status_mou`
--

INSERT INTO `status_mou` (`id_status`, `nama_status`) VALUES
(1, 'Status pengajuan surat permohonan dan drafting'),
(2, 'Pengajuan ke pihak mitra'),
(3, 'Acc, menunggu penandatanganan'),
(4, 'Proses pendaftaran'),
(5, 'Selesai');

-- --------------------------------------------------------

--
-- Table structure for table `tingkatan`
--

CREATE TABLE `tingkatan` (
  `idTingkatan` int(11) NOT NULL,
  `nmTingkatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tingkatan`
--

INSERT INTO `tingkatan` (`idTingkatan`, `nmTingkatan`) VALUES
(1, 'Program Studi'),
(3, 'Unit'),
(4, 'Fakultas'),
(5, 'Biro'),
(6, 'Lembaga'),
(7, 'UPT');

-- --------------------------------------------------------

--
-- Table structure for table `tr_ajuan`
--

CREATE TABLE `tr_ajuan` (
  `id_ajuan` int(11) NOT NULL,
  `nm_ajuan` varchar(200) NOT NULL,
  `id_mou` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `mitra` varchar(200) DEFAULT NULL,
  `file` varchar(150) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_history`
--

CREATE TABLE `tr_history` (
  `id_history` int(11) NOT NULL,
  `id_ajuan` int(11) NOT NULL,
  `id_status` int(11) NOT NULL,
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_kerjasama`
--

CREATE TABLE `tr_kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL,
  `id_ajuan` int(11) NOT NULL,
  `nm_kerjasama` varchar(200) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nmUser` varchar(200) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(200) NOT NULL,
  `idUnit` int(11) NOT NULL,
  `levelUser` int(11) NOT NULL,
  `is_view` int(11) NOT NULL DEFAULT '0',
  `is_download` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `nmUser`, `username`, `password`, `idUnit`, `levelUser`, `is_view`, `is_download`, `status`) VALUES
(1, 'UPT-PSI', 'psi', '6115baa419ebbdc15cb267c7bec45d26', 1, 3, 0, 0, 1),
(2, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 0, 1, 0, 0, 1),
(3, 'Fakultas Teknik', 'teknik', '58029eb6d2dd138b3da6ee4b2bb71d8c', 2, 2, 0, 0, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_mou`
--
ALTER TABLE `jenis_mou`
  ADD PRIMARY KEY (`id_mou`);

--
-- Indexes for table `mst_unit`
--
ALTER TABLE `mst_unit`
  ADD PRIMARY KEY (`idUnit`);

--
-- Indexes for table `status_mou`
--
ALTER TABLE `status_mou`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `tingkatan`
--
ALTER TABLE `tingkatan`
  ADD PRIMARY KEY (`idTingkatan`);

--
-- Indexes for table `tr_ajuan`
--
ALTER TABLE `tr_ajuan`
  ADD PRIMARY KEY (`id_ajuan`);

--
-- Indexes for table `tr_history`
--
ALTER TABLE `tr_history`
  ADD PRIMARY KEY (`id_history`);

--
-- Indexes for table `tr_kerjasama`
--
ALTER TABLE `tr_kerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_mou`
--
ALTER TABLE `jenis_mou`
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `mst_unit`
--
ALTER TABLE `mst_unit`
  MODIFY `idUnit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_mou`
--
ALTER TABLE `status_mou`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tingkatan`
--
ALTER TABLE `tingkatan`
  MODIFY `idTingkatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tr_ajuan`
--
ALTER TABLE `tr_ajuan`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_history`
--
ALTER TABLE `tr_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_kerjasama`
--
ALTER TABLE `tr_kerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
