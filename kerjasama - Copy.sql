-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2022 at 04:25 AM
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
(1, 'MoU'),
(2, 'MoA'),
(3, 'RIKS/IA'),
(4, 'AR');

-- --------------------------------------------------------

--
-- Table structure for table `mst_unit`
--

CREATE TABLE `mst_unit` (
  `idUnit` int(11) NOT NULL,
  `nmUnit` varchar(200) NOT NULL,
  `parentUnit` int(11) NOT NULL DEFAULT '0',
  `idTingkat` int(11) NOT NULL,
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_unit`
--

INSERT INTO `mst_unit` (`idUnit`, `nmUnit`, `parentUnit`, `idTingkat`, `sysInput`) VALUES
(1, 'Fakultas Teknik', 0, 4, '2022-04-11 03:32:19'),
(2, 'UPT-PSI', 0, 1, '2022-04-11 03:32:50'),
(3, 'Progdi Sistem Informasi', 1, 1, '2022-04-13 04:53:04'),
(4, 'Linfokom', 1, 6, '2022-04-19 03:05:49');

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
  `file` varchar(200) NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_ajuan`
--

INSERT INTO `tr_ajuan` (`id_ajuan`, `nm_ajuan`, `id_mou`, `id_unit`, `mitra`, `file`, `id_status`, `tgl_mulai`, `tgl_selesai`, `sysInput`) VALUES
(1, 'Ajuan Kerjasama', 1, 3, 'Omah Data Center', 'Ajuan_Ajuan_Kerjasama_Progdi_Sistem_Informasi.pdf', 5, '2022-01-01', '2022-12-31', '2022-04-21 05:24:18'),
(2, 'Ajuan Kerjasama Jaringan', 1, 1, 'Jala Lintas Media', 'Ajuan_Ajuan_Kerjasama_kedua_UPT-PSI.pdf', 5, '2022-01-01', '2022-12-30', '2022-04-23 05:07:01');

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

--
-- Dumping data for table `tr_history`
--

INSERT INTO `tr_history` (`id_history`, `id_ajuan`, `id_status`, `sysInput`) VALUES
(1, 1, 1, '2022-04-21 05:24:18'),
(2, 1, 2, '2022-04-21 05:28:02'),
(3, 1, 3, '2022-04-21 05:28:06'),
(4, 1, 4, '2022-04-21 05:29:05'),
(5, 1, 5, '2022-04-21 05:29:08'),
(6, 2, 1, '2022-04-23 05:07:01'),
(7, 2, 2, '2022-04-23 05:07:07'),
(8, 2, 3, '2022-04-23 05:07:11'),
(9, 2, 4, '2022-04-23 05:07:14'),
(10, 2, 5, '2022-04-23 05:07:17');

-- --------------------------------------------------------

--
-- Table structure for table `tr_kerjasama`
--

CREATE TABLE `tr_kerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL DEFAULT '0',
  `id_ajuan` int(11) NOT NULL,
  `is_mou` int(11) DEFAULT '0',
  `nm_kerjasama` varchar(200) DEFAULT NULL,
  `id_unit` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_group` int(11) NOT NULL DEFAULT '0',
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_kerjasama`
--

INSERT INTO `tr_kerjasama` (`id_kerjasama`, `id_mou`, `id_ajuan`, `is_mou`, `nm_kerjasama`, `id_unit`, `file`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status`, `parent`, `is_group`, `sysInput`) VALUES
(1, 2, 1, 0, 'Kerjasama MOA', 3, 'Kerjasama_Kerjasama_MOA_Progdi_Sistem_Informasi.pdf', '2022-01-01', '2022-12-30', 'kerjasama moa pertama', 1, 0, 1, '2022-04-21 06:25:22'),
(2, 3, 1, 1, 'Pengajuan RIKS pertama pada moa', 3, 'Kerjasama_Pengajuan_RIKS_pertama_pada_moa_Progdi_Sistem_Informasi.pdf', '2022-01-01', '2022-12-31', 'melakukan riks', 1, 1, 1, '2022-04-21 06:38:00'),
(3, 4, 1, 2, 'Kerjasama AR', 3, 'Kerjasama_Kerjasama_AR_Progdi_Sistem_Informasi.pdf', '2022-01-01', '2022-12-30', 'Ini adalah AR dari ajuan kerjasama mou', 1, 2, 1, '2022-04-21 07:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `tr_kerjasama_duo`
--

CREATE TABLE `tr_kerjasama_duo` (
  `id_kerjasama` int(11) NOT NULL,
  `id_mou` int(11) NOT NULL DEFAULT '0',
  `id_ajuan` int(11) NOT NULL,
  `is_mou` int(11) DEFAULT '0',
  `nm_kerjasama` varchar(200) DEFAULT NULL,
  `id_unit` int(11) NOT NULL,
  `file` varchar(200) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `keterangan` text NOT NULL,
  `status` int(11) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `is_group` int(11) NOT NULL DEFAULT '0',
  `sysInput` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_kerjasama_duo`
--

INSERT INTO `tr_kerjasama_duo` (`id_kerjasama`, `id_mou`, `id_ajuan`, `is_mou`, `nm_kerjasama`, `id_unit`, `file`, `tgl_mulai`, `tgl_selesai`, `keterangan`, `status`, `parent`, `is_group`, `sysInput`) VALUES
(1, 1, 1, 0, 'Kerjasama', 2, 'Kerjasama_Kerjasama_UPT-PSI.pdf', '2022-01-01', '2022-12-31', 'ya begitulah kadang kadang', 1, 0, 0, '2022-04-11 04:26:06'),
(2, 2, 2, 1, 'Kerjasama RIKS', 2, 'Kerjasama_Kerjasama_RIKS_UPT-PSI.pdf', '2022-01-01', '2022-12-31', 'seada adanya nyo', 1, 1, 1, '2022-04-11 07:48:44'),
(3, 3, 3, 2, 'AR PT Jala Lintas Media', 2, 'Kerjasama_AR_PT_Jala_Lintas_Media_.pdf', '2022-01-01', '2022-12-30', 'yayayaya', 1, 2, 1, '2022-04-11 08:35:32'),
(11, 2, 5, 1, 'RIKS JLM Kedua', 3, 'Kerjasama_RIKS_JLM_Kedua_Progdi_Sistem_Informasi.pdf', '2022-04-01', '2022-04-29', 'yayaayya', 1, 1, 1, '2022-04-14 08:39:06'),
(12, 3, 6, 11, 'AR PT Jala Lintas Media Dua', 3, 'Kerjasama_AR_PT_Jala_Lintas_Media_Dua_Progdi_Sistem_Informasi.pdf', '2022-04-01', '2022-04-30', 'YAYAYYAA', 1, 2, 1, '2022-04-14 08:39:51');

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
(1, 'UPT-PSI', 'psi', '6115baa419ebbdc15cb267c7bec45d26', 2, 3, 1, 0, 1),
(2, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 0, 1, 1, 1, 1),
(3, 'Fakultas Teknik', 'teknik', '58029eb6d2dd138b3da6ee4b2bb71d8c', 1, 2, 1, 0, 1),
(4, 'Progdi Sistem Informasi', 'progsi', '0665c8ca621a7bf8bb06a96c95fae29a', 3, 3, 1, 0, 1),
(5, 'Linfokom', 'linfokom', '202cb962ac59075b964b07152d234b70', 4, 2, 1, 1, 1);

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
-- Indexes for table `tr_kerjasama_duo`
--
ALTER TABLE `tr_kerjasama_duo`
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
  MODIFY `id_mou` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mst_unit`
--
ALTER TABLE `mst_unit`
  MODIFY `idUnit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tr_history`
--
ALTER TABLE `tr_history`
  MODIFY `id_history` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tr_kerjasama`
--
ALTER TABLE `tr_kerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_kerjasama_duo`
--
ALTER TABLE `tr_kerjasama_duo`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
