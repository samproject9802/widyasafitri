-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2021 at 07:54 PM
-- Server version: 10.3.30-MariaDB-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adry2296_widya`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbloginmhs`
--

CREATE TABLE `tbloginmhs` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbloginmhs`
--

INSERT INTO `tbloginmhs` (`id_user`, `username`, `password`) VALUES
(1, '2020010199', '978d76676f5e7918f81d28e7d092ca0d'),
(2, '2020010188', 'd3a7f48c12e697d50c8a7ae7684644ef'),
(3, '2020010177', '819e3d6c1381eac87c17617e5165f38c'),
(4, '2020010166', '6f4920ea25403ec77bee9efce43ea25e'),
(5, '2020010155', '9afefc52942cb83c7c1f14b2139b09ba'),
(6, '2018010199', '6be5336db2c119736cf48f475e051bfe'),
(7, '2018010188', '2d1b2a5ff364606ff041650887723470'),
(8, ' 2018010199', '6be5336db2c119736cf48f475e051bfe'),
(9, '2018010177', 'f31b20466ae89669f9741e047487eb37'),
(10, '2018010166', '19de10adbaa1b2ee13f77f679fa1483a'),
(11, '2018010092', 'ca460332316d6da84b08b9bcf39b687b'),
(12, '2020110101', 'd0fb963ff976f9c37fc81fe03c21ea7b'),
(13, '2020110102', '4ba29b9f9e5732ed33761840f4ba6c53'),
(14, '2020110103', 'a591024321c5e2bdbd23ed35f0574dde'),
(15, '2020110104', 'b8b4b727d6f5d1b61fff7be687f7970f');

-- --------------------------------------------------------

--
-- Table structure for table `tbloginprodi`
--

CREATE TABLE `tbloginprodi` (
  `id_user` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbloginprodi`
--

INSERT INTO `tbloginprodi` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbpendaftaranmhs`
--

CREATE TABLE `tbpendaftaranmhs` (
  `noreg` int(20) NOT NULL,
  `nirm` varchar(20) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `nohp` text NOT NULL,
  `bidangppkm` varchar(50) NOT NULL,
  `spermohonan` varchar(64) DEFAULT NULL,
  `kwitansippkm` varchar(64) DEFAULT NULL,
  `ukt` varchar(64) DEFAULT NULL,
  `kk` varchar(64) DEFAULT NULL,
  `dns` varchar(64) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpendaftaranmhs`
--

INSERT INTO `tbpendaftaranmhs` (`noreg`, `nirm`, `nama`, `jurusan`, `nohp`, `bidangppkm`, `spermohonan`, `kwitansippkm`, `ukt`, `kk`, `dns`) VALUES
(1, '2020010199', 'tata', 'S1-SK', '08111111', 'PKM-PM', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanjasukses.png'),
(2, '2020010188', 'titi', 'S1-SK', '12121141', 'PKM-PM', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanjasukses.png'),
(3, '2020010177', 'tutu', 'S1-SK', '12121256', 'PKM-PM', 'gmbr_bagianbelanjasukses.png', 'gmbr_bagianbelanja.png', 'Code_Menampilkan_Laporan.jpg.png', 'Code_Cari.jpg.png', 'Cari_ID.jpg.png'),
(4, '2020010166', 'toto', 'S1-SK', '12121209', 'PKM-PM', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanja.png'),
(5, '2020010155', 'trueka', 'S1-SK', '121212098', 'PKM-PM', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanjasukses.png'),
(6, '2018010199', 'qaqa', 'D3-MI', '09099', 'PKM-PT', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanja.png'),
(7, '2018010188', 'qiqi', 'D3-MI', '0987878', 'PKM-PT', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanja.png'),
(8, '2018010177', 'ququ', 'D3-MI', '09654888', 'PKM-PT', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanjasukses.png'),
(9, '2018010166', 'qoqo', 'D3-MI', '098765343', 'PKM-PT', 'Cari_ID.jpg.png', 'Cari_Nama.jpg.png', 'Code_Cari.jpg.png', 'Code_Menampilkan_Laporan.jpg.png', 'gmbr_bagianbelanja.png'),
(10, '2018010092', 'Widya', 'D3-TK', '00000000', 'PKM-PT', '1.jpg', '1jpg.jpg', '2.jpg', '11.jpg', '84a8615f-e319-46b4-a3a5-0d39f7f92d0c.jpg'),
(11, '2020110101', 'eunwo', 'S1-SK', '00000000', 'PKM-K', '1.jpg', '1jpg.jpg', '2.jpg', '22.jpg', '11.jpg'),
(12, '2020110102', 'Eunwi', 'S1-SK', '1111111111', 'PKM-K', '1.jpg', '1jpg.jpg', '222.jpg', '2.jpg', '11.jpg'),
(13, '2020110103', 'eunwa', 'S1-SK', '12222222', 'PKM-K', '1.jpg', '222.jpg', '22.jpg', '11.jpg', '2.jpg'),
(14, '2020110104', 'Eunwu', 'S1-SK', '1344444444', 'PKM-K', '222.jpg', '84a8615f-e319-46b4-a3a5-0d39f7f92d0c.jpg', '22.jpg', '11.jpg', '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbpengajuankelompok`
--

CREATE TABLE `tbpengajuankelompok` (
  `id_kelompok` int(11) NOT NULL,
  `noreg1` varchar(255) NOT NULL,
  `nirm1` varchar(255) NOT NULL,
  `nama1` varchar(255) NOT NULL,
  `noreg2` varchar(255) NOT NULL,
  `nirm2` varchar(255) NOT NULL,
  `nama2` varchar(255) NOT NULL,
  `noreg3` varchar(255) NOT NULL,
  `nirm3` varchar(255) NOT NULL,
  `nama3` varchar(255) NOT NULL,
  `noreg4` varchar(255) NOT NULL,
  `nirm4` varchar(255) NOT NULL,
  `nama4` varchar(255) NOT NULL,
  `noreg5` varchar(255) DEFAULT NULL,
  `nirm5` varchar(255) DEFAULT NULL,
  `nama5` varchar(255) DEFAULT NULL,
  `bidangppkm` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `nama_dosen` varchar(64) DEFAULT NULL,
  `status` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbpengajuankelompok`
--

INSERT INTO `tbpengajuankelompok` (`id_kelompok`, `noreg1`, `nirm1`, `nama1`, `noreg2`, `nirm2`, `nama2`, `noreg3`, `nirm3`, `nama3`, `noreg4`, `nirm4`, `nama4`, `noreg5`, `nirm5`, `nama5`, `bidangppkm`, `judul`, `nama_dosen`, `status`) VALUES
(1, 'PKM-PM/2021/1', '2020010199', 'tata', 'PKM-PM/2021/2', '2020010188', 'titi', 'PKM-PM/2021/3', '2020010177', 'tutu', 'PKM-PM/2021/4', '2020010166', 'toto', 'PKM-PM/2021/5', '2020010155', 'trueka', 'PKM-PM', 'Sistem Informasi Pendaftaran  Pasian RS Permata Bunda', 'Zaimah Panjaitan, S.Kom., M.Kom.', 'Valid'),
(2, 'PKM-K/2021/11', '2020110101', 'eunwo', 'PKM-K/2021/12', '2020110102', 'Eunwi', 'PKM-K/2021/13', '2020110103', 'eunwa', 'PKM-K/2021/14', '2020110104', 'Eunwu', NULL, NULL, NULL, 'PKM-K', 'sistem informasi pendaftaran pasien rawat jalan ', 'Zoya Nadapdap', 'Valid');

-- --------------------------------------------------------

--
-- Table structure for table `tbstatusmhs`
--

CREATE TABLE `tbstatusmhs` (
  `username` varchar(64) NOT NULL,
  `status_pendaftaran` varchar(64) NOT NULL,
  `status_pengajuan` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbstatusmhs`
--

INSERT INTO `tbstatusmhs` (`username`, `status_pendaftaran`, `status_pengajuan`) VALUES
('2018010092', 'Sudah Mengisi', ''),
('2018010166', 'Sudah Mengisi', ''),
('2018010177', 'Sudah Mengisi', ''),
('2018010188', 'Sudah Mengisi', ''),
('2018010199', 'Sudah Mengisi', ''),
('2020010155', 'Sudah Mengisi', 'Sudah Mengisi'),
('2020010166', 'Sudah Mengisi', 'Sudah Mengisi'),
('2020010177', 'Sudah Mengisi', 'Sudah Mengisi'),
('2020010188', 'Sudah Mengisi', 'Sudah Mengisi'),
('2020010199', 'Sudah Mengisi', ''),
('2020110101', 'Sudah Mengisi', ''),
('2020110102', 'Sudah Mengisi', 'Sudah Mengisi'),
('2020110103', 'Sudah Mengisi', 'Sudah Mengisi'),
('2020110104', 'Sudah Mengisi', 'Sudah Mengisi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbloginmhs`
--
ALTER TABLE `tbloginmhs`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbloginprodi`
--
ALTER TABLE `tbloginprodi`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tbpendaftaranmhs`
--
ALTER TABLE `tbpendaftaranmhs`
  ADD PRIMARY KEY (`noreg`);

--
-- Indexes for table `tbpengajuankelompok`
--
ALTER TABLE `tbpengajuankelompok`
  ADD PRIMARY KEY (`id_kelompok`);

--
-- Indexes for table `tbstatusmhs`
--
ALTER TABLE `tbstatusmhs`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbloginmhs`
--
ALTER TABLE `tbloginmhs`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbloginprodi`
--
ALTER TABLE `tbloginprodi`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbpendaftaranmhs`
--
ALTER TABLE `tbpendaftaranmhs`
  MODIFY `noreg` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbpengajuankelompok`
--
ALTER TABLE `tbpengajuankelompok`
  MODIFY `id_kelompok` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
