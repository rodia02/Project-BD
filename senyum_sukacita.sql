-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 02:02 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `senyum_sukacita`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_produk` int(8) NOT NULL,
  `rincian_barang` varchar(100) NOT NULL,
  `jenis_barang` enum('Kendaraan','Elektronik') NOT NULL,
  `taksiran` int(8) NOT NULL,
  `label_barang` enum('Gadai','Lelang') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_produk`, `rincian_barang`, `jenis_barang`, `taksiran`, `label_barang`) VALUES
(1, 'laptop lenovo legion', 'Elektronik', 1400000, 'Gadai'),
(2, 'laptop lenovo legion', 'Elektronik', 1400000, 'Gadai'),
(3, 'Iphone', 'Elektronik', 14000000, 'Gadai');

-- --------------------------------------------------------

--
-- Table structure for table `detail_data_karyawan`
--

CREATE TABLE `detail_data_karyawan` (
  `nama` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_data_karyawan`
--

INSERT INTO `detail_data_karyawan` (`nama`, `password`, `nik`, `alamat`, `jenis_kelamin`) VALUES
('Rodiatul', '211401038', '12214', 'medan', 'Perempuan');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_pegawai` int(8) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `gaji` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_pegawai`, `no_hp`, `gaji`, `nik`) VALUES
(19001, '087805141217', 3000000, '12214');

-- --------------------------------------------------------

--
-- Table structure for table `pembeli_lelang`
--

CREATE TABLE `pembeli_lelang` (
  `id_produk` int(8) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `no_hp` varchar(14) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penggadai`
--

CREATE TABLE `penggadai` (
  `id_penggadai` int(11) NOT NULL,
  `id_produk` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggadai`
--

INSERT INTO `penggadai` (`id_penggadai`, `id_produk`, `nama`, `nik`, `tanggal_lahir`, `alamat`, `no_hp`) VALUES
(3, 3, 'nawu', '1234567889', '2023-01-24', 'medan', '1234567'),
(2, 2, 'Johana', '15645465', '2003-03-12', 'medan', '08365656'),
(1, 1, 'rodia', '21140103855', '2003-08-01', 'Medan', '087805141217');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `no_kwitansi` int(5) NOT NULL,
  `jlh_pinjaman` int(8) NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL,
  `id_produk` int(8) NOT NULL,
  `id_pegawai` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`no_kwitansi`, `jlh_pinjaman`, `tgl_jatuh_tempo`, `id_produk`, `id_pegawai`) VALUES
(23001, 5000000, '2023-03-11', 1, 19001),
(23006, 3000000, '2023-03-09', 2, 19001),
(23007, 10000000, '2023-01-04', 3, 19001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `detail_data_karyawan`
--
ALTER TABLE `detail_data_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `nik` (`nik`);

--
-- Indexes for table `pembeli_lelang`
--
ALTER TABLE `pembeli_lelang`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nomor` (`id_produk`);

--
-- Indexes for table `penggadai`
--
ALTER TABLE `penggadai`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nomor` (`id_produk`),
  ADD KEY `index` (`id_penggadai`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`no_kwitansi`),
  ADD KEY `id_produk` (`id_produk`) USING BTREE,
  ADD KEY `id_pegawai` (`id_pegawai`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_pegawai` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19002;

--
-- AUTO_INCREMENT for table `pembeli_lelang`
--
ALTER TABLE `pembeli_lelang`
  MODIFY `id_produk` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penggadai`
--
ALTER TABLE `penggadai`
  MODIFY `id_penggadai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `no_kwitansi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23008;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `karyawan_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `detail_data_karyawan` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembeli_lelang`
--
ALTER TABLE `pembeli_lelang`
  ADD CONSTRAINT `pembeli_lelang_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `barang` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggadai`
--
ALTER TABLE `penggadai`
  ADD CONSTRAINT `penggadai_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `barang` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_produk`) REFERENCES `barang` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_pegawai`) REFERENCES `karyawan` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
