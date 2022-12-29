-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 01:35 PM
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
-- Table structure for table `lelang`
--

CREATE TABLE `lelang` (
  `nomor` int(100) NOT NULL,
  `Rincian_Barang` varchar(100) NOT NULL,
  `taksiran` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penggadai`
--

CREATE TABLE `penggadai` (
  `nomor` int(100) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `nik` int(11) NOT NULL,
  `Rincian_Barang` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `taksiran` int(100) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `jlh_pinjaman` int(100) NOT NULL,
  `tanggal_jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penggadai`
--

INSERT INTO `penggadai` (`nomor`, `nama`, `nik`, `Rincian_Barang`, `tanggal_lahir`, `alamat`, `taksiran`, `no_telp`, `jlh_pinjaman`, `tanggal_jatuh_tempo`) VALUES
(4, 'diaa', 21145563, 'laptop legion', '2004-06-08', 'Medan', 15000000, '087805141218', 8000000, '2023-01-07'),
(5, 'rodia', 21456333, 'shkgda', '2022-11-28', 'medan', 12000000, '087805141218', 8000000, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pengguna` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `pengguna`) VALUES
('user1', '827ccb0eea8a706c4c34a16891f84e7b', 'Rodiatul', 'user'),
('admin1', '827ccb0eea8a706c4c34a16891f84e7b', 'Sammytha', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lelang`
--
ALTER TABLE `lelang`
  ADD UNIQUE KEY `nomor` (`nomor`);

--
-- Indexes for table `penggadai`
--
ALTER TABLE `penggadai`
  ADD PRIMARY KEY (`nik`),
  ADD UNIQUE KEY `nomor` (`nomor`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lelang`
--
ALTER TABLE `lelang`
  MODIFY `nomor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penggadai`
--
ALTER TABLE `penggadai`
  MODIFY `nomor` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
