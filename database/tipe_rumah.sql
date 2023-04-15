-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 15, 2023 at 11:52 AM
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
-- Table structure for table `tipe_rumah`
--

CREATE TABLE `tipe_rumah` (
  `id_tipe_rumah` int(12) NOT NULL,
  `id_rumah` int(11) DEFAULT NULL,
  `jenis_tr` varchar(50) NOT NULL,
  `luas_bangunan_tr` int(12) DEFAULT NULL,
  `kmr_mandi_tr` int(3) NOT NULL,
  `kmr_tidur_tr` int(3) NOT NULL,
  `img_tr` varchar(200) DEFAULT NULL,
  `harga_tr` bigint(40) DEFAULT NULL,
  `harga_text_tr` varchar(200) DEFAULT NULL,
  `pondasi_tr` varchar(200) DEFAULT NULL,
  `struktur_tr` varchar(200) DEFAULT NULL,
  `dinding_dlm_tr` varchar(200) DEFAULT NULL,
  `dinding_luar_tr` varchar(200) DEFAULT NULL,
  `dinding_kmr_mnd_tr` varchar(200) DEFAULT NULL,
  `rangka_atap_tr` varchar(200) DEFAULT NULL,
  `penutup_atap_tr` varchar(200) DEFAULT NULL,
  `plafon_dlm_tr` varchar(200) DEFAULT NULL,
  `plafon_luar_tr` varchar(200) DEFAULT NULL,
  `lantai_ru_tr` varchar(200) DEFAULT NULL,
  `tgl_input_tr` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_update_tr` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tipe_rumah`
--

INSERT INTO `tipe_rumah` (`id_tipe_rumah`, `id_rumah`, `jenis_tr`, `luas_bangunan_tr`, `kmr_mandi_tr`, `kmr_tidur_tr`, `img_tr`, `harga_tr`, `harga_text_tr`, `pondasi_tr`, `struktur_tr`, `dinding_dlm_tr`, `dinding_luar_tr`, `dinding_kmr_mnd_tr`, `rangka_atap_tr`, `penutup_atap_tr`, `plafon_dlm_tr`, `plafon_luar_tr`, `lantai_ru_tr`, `tgl_input_tr`, `tgl_update_tr`) VALUES
(1, 0, '150', NULL, 2, 1, 'tipe_150.jpg', 975000000, '975 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 22:01:42', NULL),
(2, 0, '145', NULL, 2, 1, 'tipe_145.jpg', 750000000, '750 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 22:01:42', NULL),
(3, 0, '135', NULL, 2, 1, 'tipe_135.jpg', 575000000, '575 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 22:01:42', NULL),
(4, 0, '80', NULL, 2, 1, 'tipe_80.jpg', 360000000, '360 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 22:01:42', NULL),
(5, 0, '65', NULL, 2, 1, 'tipe_65.jpg', 300000000, '300 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 22:01:42', NULL),
(6, 0, '55', NULL, 2, 1, 'tipe_55.jpg', 274000000, '274 Juta', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-02-10 22:01:42', NULL),
(7, 646, '77', NULL, 1, 2, 'tipe_55.jpg', 1513000000, '1.513 Jt', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-17 10:09:18', NULL),
(8, 646, '92', NULL, 1, 2, 'tipe_55.jpg', 1655000000, '1.655 Jt', 'batu kali', 'batu kali', 'batu kali', 'batu kali', 'batu kali', 'batu kali', 'batu kali', 'batu kali', 'batu kali', 'batu kali', '2023-03-17 10:09:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  ADD PRIMARY KEY (`id_tipe_rumah`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tipe_rumah`
--
ALTER TABLE `tipe_rumah`
  MODIFY `id_tipe_rumah` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
