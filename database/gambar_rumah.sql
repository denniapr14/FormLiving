-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 11:54 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `one`
--

-- --------------------------------------------------------

--
-- Table structure for table `gambar_rumah`
--

CREATE TABLE `gambar_rumah` (
  `id_gambar_rumah` int(12) NOT NULL,
  `id_rumah` int(12) DEFAULT NULL,
  `id_tipe` int(12) DEFAULT NULL,
  `img_rumah` varchar(200) DEFAULT NULL,
  `status_gr` enum('aktif','nonaktif') NOT NULL DEFAULT 'aktif',
  `jenis_img` enum('denah','gambar') NOT NULL DEFAULT 'gambar',
  `tgl_input` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar_rumah`
--

INSERT INTO `gambar_rumah` (`id_gambar_rumah`, `id_rumah`, `id_tipe`, `img_rumah`, `status_gr`, `jenis_img`, `tgl_input`) VALUES
(1, 646, 8, 'A-11.jpg', 'aktif', 'gambar', '2023-03-23'),
(2, 646, 8, 'AC-18.jpg', 'aktif', 'gambar', '2023-03-23'),
(3, 646, 8, 'A-11.jpg', 'aktif', 'gambar', '2023-03-23'),
(4, 646, 8, 'AC-18.jpg', 'aktif', 'gambar', '2023-03-23'),
(5, 646, 8, 'AC-18.jpg', 'aktif', 'gambar', '2023-03-23'),
(6, 646, 8, 'img-denah.png', 'aktif', 'denah', '2023-04-15'),
(7, 646, 8, 'img-denah.png', 'aktif', 'denah', '2023-04-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gambar_rumah`
--
ALTER TABLE `gambar_rumah`
  ADD PRIMARY KEY (`id_gambar_rumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gambar_rumah`
--
ALTER TABLE `gambar_rumah`
  MODIFY `id_gambar_rumah` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
