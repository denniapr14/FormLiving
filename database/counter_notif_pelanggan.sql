-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2024 at 04:14 PM
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
-- Table structure for table `counter_notif_pelanggan`
--

CREATE TABLE `counter_notif_pelanggan` (
  `id_counter_notif_pelanggan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `unread_notif` int(11) NOT NULL,
  `read_notif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter_notif_pelanggan`
--

INSERT INTO `counter_notif_pelanggan` (`id_counter_notif_pelanggan`, `id_pelanggan`, `unread_notif`, `read_notif`) VALUES
(1, 1, 1, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `counter_notif_pelanggan`
--
ALTER TABLE `counter_notif_pelanggan`
  ADD PRIMARY KEY (`id_counter_notif_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `counter_notif_pelanggan`
--
ALTER TABLE `counter_notif_pelanggan`
  MODIFY `id_counter_notif_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
