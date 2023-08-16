-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 04:56 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(12) NOT NULL,
  `menu` varchar(200) DEFAULT NULL,
  `nama_menu` varchar(200) DEFAULT NULL,
  `status_menu` enum('fitur','extend') DEFAULT NULL,
  `url_menu` varchar(200) DEFAULT NULL,
  `icon_menu` varchar(100) DEFAULT NULL,
  `tgl_input_menu` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `menu`, `nama_menu`, `status_menu`, `url_menu`, `icon_menu`, `tgl_input_menu`) VALUES
(1, 'Dashboard', 'dashboard.admin', 'fitur', 'dashboard-admin', 'bi bi-speedometer2', '2023-08-15 13:22:27'),
(2, 'Rumah', 'rumah.admin', 'fitur', 'rumah-admin', 'bi bi-house', '2023-08-15 13:22:27'),
(3, 'Pemesanan', 'suratPemesananRumah.admin', 'fitur', 'surat-pemesanan-rumah-admin', 'bi bi-file-earmark-text', '2023-08-15 13:22:27'),
(4, 'Pre Order', 'preOrder.admin', 'fitur', 'pre-order-admin', 'bi bi-journal-bookmark-fill', '2023-08-15 14:36:00'),
(5, 'Add Rumah', 'postRumah.admin', 'extend', 'tambah-rumah-admin', NULL, '2023-08-15 16:47:25'),
(6, 'Edit Rumah', 'updateRumah.admin', 'extend', 'ubah-rumah-admin', NULL, '2023-08-15 16:47:25'),
(7, 'Add Tipe Rumah', 'postTipeRumah', 'extend', 'tambah-tipe-rumah', NULL, '2023-08-15 16:49:43'),
(8, 'Tipe Rumah', 'tipeRumah.admin', 'extend', 'tipe-rumah-admin', NULL, '2023-08-15 16:49:43'),
(9, 'Edit Tipe Rumah', 'updateTipeRumah.admin', 'extend', 'ubah-tipe-rumah-admin', NULL, '2023-08-16 09:26:38'),
(10, 'Edit Surat Pemesanan Rumah', 'editSuratPemesananRumah.admin', 'extend', 'ubah-surat-pemesanan-rumah', NULL, '2023-08-16 09:30:46'),
(11, 'Edit Pembayaran Rumah', 'editPembayaranRumah.admin', 'extend', 'ubah-pembayaran-rumah-admin', NULL, '2023-08-16 09:30:46'),
(12, 'Pembayaran Rumah', 'pembayaranRumah.Admin', 'extend', 'pembayaran-rumah', NULL, '2023-08-16 09:30:46'),
(13, 'Pre Order', 'preOrder.admin', 'extend', 'pre-order-admin', NULL, '2023-08-16 09:31:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
