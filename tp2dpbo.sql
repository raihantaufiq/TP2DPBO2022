-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 19, 2022 at 06:35 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp2dpbo`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_divisi`
--

CREATE TABLE `bidang_divisi` (
  `id_bidang` int(3) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `id_divisi` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bidang_divisi`
--

INSERT INTO `bidang_divisi` (`id_bidang`, `jabatan`, `id_divisi`) VALUES
(1, 'Ketua', 1),
(2, 'Sekretaris', 1),
(3, 'Bendahara', 1),
(4, 'Staff', 1),
(5, 'Ketua', 2),
(6, 'Sekretaris', 2),
(7, 'Bendahara', 2),
(8, 'Staff', 2),
(9, 'Ketua', 3),
(10, 'Sekretaris', 3),
(11, 'Bendahara', 3),
(12, 'Staff', 3),
(13, 'Ketua', 4),
(14, 'Sekretaris', 4),
(15, 'Bendahara', 4),
(16, 'Staff', 4),
(17, 'Ketua', 5),
(18, 'Sekretaris', 5),
(19, 'Bendahara', 5),
(20, 'Staff', 5),
(21, 'Ketua', 7),
(22, 'Sekretaris', 7),
(23, 'Bendahara', 7),
(24, 'Staff', 7);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id_divisi` int(3) NOT NULL,
  `nama_divisi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Divisi Pengembangan Organisasi'),
(2, 'Divisi Komunikasi Teknologi dan Informasi'),
(3, 'Divisi Kerohanian'),
(4, 'Divisi Advokasi Sosial dan Politik'),
(5, 'Divisi Pendidikan dan Kepelatihan'),
(7, 'Divisi Pengembangan Minat dan Bakat');

-- --------------------------------------------------------

--
-- Table structure for table `pengurus`
--

CREATE TABLE `pengurus` (
  `nim` int(7) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `semester` int(3) NOT NULL,
  `id_bidang` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengurus`
--

INSERT INTO `pengurus` (`nim`, `nama`, `semester`, `id_bidang`) VALUES
(1234567, 'RT', 2, 24),
(2000123, 'Kruger', 6, 1),
(2100322, 'Helian', 4, 2),
(2201555, 'SHK', 2, 17),
(2202334, 'Kalina', 2, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD PRIMARY KEY (`id_bidang`),
  ADD KEY `id_divisi` (`id_divisi`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id_divisi`);

--
-- Indexes for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `id_bidang` (`id_bidang`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  MODIFY `id_bidang` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id_divisi` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bidang_divisi`
--
ALTER TABLE `bidang_divisi`
  ADD CONSTRAINT `bidang_divisi_ibfk_1` FOREIGN KEY (`id_divisi`) REFERENCES `divisi` (`id_divisi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengurus`
--
ALTER TABLE `pengurus`
  ADD CONSTRAINT `pengurus_ibfk_1` FOREIGN KEY (`id_bidang`) REFERENCES `bidang_divisi` (`id_bidang`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
