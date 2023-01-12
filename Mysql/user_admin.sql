-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 08:42 AM
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
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id_user_admin` int(10) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `username_ua` varchar(200) NOT NULL,
  `password_ua` varchar(150) NOT NULL,
  `pin_ua` varchar(6) NOT NULL,
  `nama_ua` varchar(250) NOT NULL,
  `email_ua` varchar(250) DEFAULT NULL,
  `no_tlp_ua` varchar(30) DEFAULT NULL,
  `alamat_ua` text DEFAULT NULL,
  `status_ua` enum('Nonaktif','Aktif') NOT NULL,
  `foto_ua` varchar(200) DEFAULT 'default.png',
  `tgl_input_ua` timestamp NOT NULL DEFAULT current_timestamp(),
  `last_login` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id_user_admin`, `id_kategori`, `username_ua`, `password_ua`, `pin_ua`, `nama_ua`, `email_ua`, `no_tlp_ua`, `alamat_ua`, `status_ua`, `foto_ua`, `tgl_input_ua`, `last_login`) VALUES
(1, 1, 'arsitek', 'd0970714757783e6cf17b26fb8e2298f', '', 'arsitek', 'arsitek@gmail.com', NULL, NULL, 'Aktif', NULL, '2020-02-10 03:25:32', NULL),
(2, 2, 'Wawan', '7fcf72aff903c9ed72b4d9295b206604', '', 'adminSales', NULL, NULL, NULL, 'Aktif', NULL, '2020-03-30 02:52:48', NULL),
(4, 4, 'David', '9d6a90e3d965a61272c625794186f067', '', 'David', 'davidsuryanata8@gmail.com', '085230065007', NULL, 'Aktif', 'David.jpeg', '2020-06-05 08:58:35', NULL),
(6, 4, 'Nining', 'd0970714757783e6cf17b26fb8e2298f', '', 'Nining', 'Nining@gmail.com', '081937003001', NULL, 'Aktif', 'Nining.jpeg', '2020-06-16 07:30:07', NULL),
(8, 2, 'AswinAdmin', '5f072678fa6390c646cf40b40056d9a9', '', 'Nurcahyo Aswin Damasworo', 'aswin.reint@gmail.com', '085234143953', NULL, 'Aktif', 'ok.jpg', '2020-07-02 02:09:46', NULL),
(13, 5, 'Agents', 'd0970714757783e6cf17b26fb8e2298f', '', 'Brington Manyar', NULL, NULL, NULL, 'Aktif', NULL, '2020-08-05 02:42:50', NULL),
(14, 5, 'BrightonMalang', '999c54cb7725312cb38324ba86aef2c1', '', 'Brighton Malang', NULL, NULL, NULL, 'Nonaktif', NULL, '2020-08-05 02:42:50', NULL),
(15, 2, 'Bangun', 'f354d2fdd84ff7cc3da1dd82859d8429', '', 'Bangun', NULL, NULL, NULL, 'Aktif', NULL, '2020-08-05 03:54:45', NULL),
(16, 7, 'Andre', 'd0970714757783e6cf17b26fb8e2298f', '', 'Andreas W.', NULL, NULL, NULL, 'Aktif', NULL, '2020-08-06 03:47:02', NULL),
(17, 2, 'Gilbert', 'd0970714757783e6cf17b26fb8e2298f', '', 'Gilbert', NULL, NULL, NULL, 'Aktif', NULL, '2020-08-24 07:31:41', NULL),
(18, 3, 'teteh', 'd0970714757783e6cf17b26fb8e2298f', '', 'teteh', NULL, NULL, NULL, 'Aktif', NULL, '2020-11-02 04:07:33', NULL),
(19, 3, 'adminADV', 'd0970714757783e6cf17b26fb8e2298f', '', 'AdminADV', NULL, NULL, NULL, 'Aktif', NULL, '2020-11-04 02:10:04', NULL),
(20, 6, 'AdminTeknik', 'd0970714757783e6cf17b26fb8e2298f', '', 'Admin Teknik1', 'greenlandteknik01@gmail.com', '085258719432', NULL, 'Aktif', NULL, '2020-11-25 06:30:21', NULL),
(21, 8, 'Pendamping', 'd0970714757783e6cf17b26fb8e2298f', '', 'Pendamping', NULL, NULL, NULL, 'Aktif', NULL, '2020-11-25 06:30:21', NULL),
(22, 9, 'riski_46', 'd0970714757783e6cf17b26fb8e2298f', '', 'Rizki A. F', 'riskiafgreenland@gmail.com', '082337670707', NULL, 'Aktif', NULL, '2020-11-25 06:30:21', NULL),
(23, 7, 'AswinAcc', 'd0970714757783e6cf17b26fb8e2298f', '', 'Aswin(Accounting)', NULL, NULL, NULL, 'Aktif', 'ok.jpg', '2020-11-30 03:29:22', NULL),
(25, 8, 'sunyoto69', 'd0970714757783e6cf17b26fb8e2298f', '112233', 'Sunyoto', 'sandrinasunyoto@gmail.com', '0937210937', NULL, 'Aktif', NULL, '2021-01-07 06:48:53', NULL),
(26, 6, 'AdminTeknik', 'd0970714757783e6cf17b26fb8e2298f', '', 'AdminTeknik', NULL, NULL, NULL, 'Aktif', NULL, '2021-01-07 06:48:53', NULL),
(28, 9, 'sumbogo', 'd0970714757783e6cf17b26fb8e2298f', '', 'Sumbogo', 'muntikmuntik91379@gmail.com', '085648747822', NULL, 'Aktif', NULL, '2021-01-07 06:48:53', NULL),
(29, 3, 'AswinADV', '5f072678fa6390c646cf40b40056d9a9', '', 'Aswin ADV', NULL, NULL, NULL, 'Aktif', 'ok.jpg', '2021-01-15 01:54:43', NULL),
(30, 2, 'AndreMap', 'd0970714757783e6cf17b26fb8e2298f', '', 'Pak Andre ', NULL, NULL, NULL, 'Aktif', NULL, '2021-01-15 03:27:56', NULL),
(31, 10, 'AswinREM', '5f072678fa6390c646cf40b40056d9a9', '', 'Aswin REM', NULL, NULL, NULL, 'Aktif', NULL, '2021-01-27 04:06:22', NULL),
(32, 2, 'AyuADV', '53b7fceeeeb69015c416570fcc8328b5', '', 'Ayu ADV', NULL, NULL, NULL, 'Nonaktif', NULL, '2021-02-01 02:10:07', '2021-02-01'),
(33, 10, 'deniREM', 'd0970714757783e6cf17b26fb8e2298f', '', 'deniREM', NULL, NULL, NULL, 'Aktif', NULL, '2021-02-05 03:39:03', NULL),
(34, 11, 'Legal', 'd0970714757783e6cf17b26fb8e2298f', '', 'Ibu Dian', NULL, NULL, NULL, 'Aktif', NULL, '2021-03-12 10:05:51', NULL),
(36, 10, 'remgreenland', 'a7414a6e78a8f6fac056825e370c364a', '', 'Admin REM', 'greenland93@gmail.com', NULL, NULL, 'Aktif', NULL, '2021-03-15 07:09:25', NULL),
(37, 11, 'AswinL', '5f072678fa6390c646cf40b40056d9a9', '', 'Aswin Legal', NULL, NULL, NULL, 'Aktif', NULL, '2021-03-29 06:26:23', NULL),
(38, 18, 'Vina', 'd0970714757783e6cf17b26fb8e2298f', '', 'Accounting', NULL, NULL, NULL, 'Aktif', NULL, '2021-03-31 07:41:28', NULL),
(40, 17, 'rusnanto', '8d6841beb14b69dcc38afe3bf672c77d', '', 'staf REM', NULL, NULL, NULL, 'Aktif', NULL, '2021-04-01 07:24:25', NULL),
(41, 15, 'budi', 'f7789394a7145c5ae84c119d31c168c0', '', 'Staf Taman REM', NULL, NULL, NULL, 'Aktif', NULL, '2021-04-01 07:24:25', NULL),
(42, 16, 'arif', 'fc94ac1a0a784f086021c6f763cd924d', '', 'Staf electrical REM', NULL, NULL, NULL, 'Aktif', NULL, '2021-04-01 07:24:25', NULL),
(44, 7, 'aswinAcc', '5f072678fa6390c646cf40b40056d9a9', '', 'Aswin Accounting', NULL, NULL, NULL, 'Aktif', NULL, '2021-04-23 08:44:40', NULL),
(45, 18, 'aswinSACC', '5f072678fa6390c646cf40b40056d9a9', '', 'Aswin Staff Accounting', NULL, NULL, NULL, 'Aktif', NULL, '2021-04-29 05:35:26', NULL),
(46, 19, 'AswinBantu', 'd0970714757783e6cf17b26fb8e2298f', '', 'Sekretaris posisi', NULL, NULL, NULL, 'Aktif', NULL, '2021-04-29 06:02:28', NULL),
(47, 19, 'Madu', 'd0970714757783e6cf17b26fb8e2298f', '', 'Madu Sekretaris', NULL, NULL, NULL, 'Aktif', NULL, '2021-05-07 03:08:26', NULL),
(48, 16, 'DeniLHR', 'd0970714757783e6cf17b26fb8e2298f', '', 'DeniLHR', NULL, NULL, NULL, 'Aktif', NULL, '2021-08-02 03:36:49', NULL),
(49, 16, 'aswinlhr', '5f072678fa6390c646cf40b40056d9a9', '', 'aswin staf lhr acc', NULL, NULL, NULL, 'Aktif', NULL, '2021-08-02 06:07:22', NULL),
(50, 21, 'AswinAr', '5f072678fa6390c646cf40b40056d9a9', '', 'Aswin Arsitek', NULL, NULL, NULL, 'Aktif', 'ok.jpg', '2021-08-05 06:36:50', NULL),
(51, 21, 'arsitek', 'd0970714757783e6cf17b26fb8e2298f', '', 'arsitek', NULL, NULL, NULL, 'Aktif', NULL, '2021-08-05 07:05:45', NULL),
(52, 23, 'markom', 'd0970714757783e6cf17b26fb8e2298f', '', 'markom', NULL, NULL, NULL, 'Aktif', NULL, '2021-08-05 07:05:45', NULL),
(53, 22, 'kepalateknik', 'd0970714757783e6cf17b26fb8e2298f', '', 'kepala teknik', NULL, NULL, NULL, 'Aktif', NULL, '2021-08-05 07:05:45', NULL),
(54, 7, 'dummyacc', '851fdee206c1eec10cee5ec8e8962af2', '', '', NULL, NULL, NULL, 'Aktif', NULL, '2021-09-13 09:42:11', NULL),
(55, 11, 'dummylegal', '851fdee206c1eec10cee5ec8e8962af2', '', '', NULL, NULL, NULL, 'Aktif', NULL, '2021-09-13 09:42:11', NULL),
(56, 10, 'dummyrem', '851fdee206c1eec10cee5ec8e8962af2', '', '', NULL, NULL, NULL, 'Aktif', NULL, '2021-09-13 09:42:11', NULL),
(57, 2, 'dummysales', '851fdee206c1eec10cee5ec8e8962af2', '', '', NULL, NULL, NULL, 'Aktif', NULL, '2021-09-13 09:42:11', NULL),
(58, 6, 'dummyteknik', '851fdee206c1eec10cee5ec8e8962af2', '', '', NULL, NULL, NULL, 'Aktif', NULL, '2021-09-13 09:42:11', NULL),
(59, 18, 'dummystafac', '851fdee206c1eec10cee5ec8e8962af2', '', '', NULL, NULL, NULL, 'Aktif', NULL, '2021-09-13 09:45:16', NULL),
(60, 5, 'AndreasW', 'd0970714757783e6cf17b26fb8e2298f', '', 'Andreas Wibisono', NULL, NULL, NULL, 'Aktif', 'default.png', '2021-10-19 10:55:26', NULL),
(61, 2, 'martin', 'f9fa348c5a9af8ad1b72ddde2508cb1f', '', '', NULL, NULL, NULL, '', 'default.png', '2022-03-19 03:17:43', NULL),
(62, 1, 'arsiuser', 'd0970714757783e6cf17b26fb8e2298f', '', 'arsi', 'arsi@gmai.com', NULL, NULL, 'Aktif', 'default.png', '2022-03-29 07:02:35', NULL),
(63, 6, 'aswinTek', '5f072678fa6390c646cf40b40056d9a9', '', '', NULL, NULL, NULL, '', 'default.png', '2022-03-31 06:49:46', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id_user_admin`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id_user_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
