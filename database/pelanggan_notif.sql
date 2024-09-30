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
-- Table structure for table `pelanggan_notif`
--

CREATE TABLE `pelanggan_notif` (
  `id_notif` int(11) NOT NULL,
  `id_pelanggan` int(10) DEFAULT NULL,
  `from_pelanggan_notif` varchar(50) DEFAULT NULL,
  `icon_pelanggan_notif` varchar(100) DEFAULT NULL,
  `title_pelanggan_notif` varchar(100) DEFAULT NULL,
  `function` varchar(50) DEFAULT NULL,
  `msg_code` int(10) DEFAULT NULL,
  `msg_notif` text DEFAULT NULL,
  `tgl_notif` timestamp NOT NULL DEFAULT current_timestamp(),
  `status_notif` enum('unread','read') DEFAULT NULL,
  `url_notif` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan_notif`
--

INSERT INTO `pelanggan_notif` (`id_notif`, `id_pelanggan`, `from_pelanggan_notif`, `icon_pelanggan_notif`, `title_pelanggan_notif`, `function`, `msg_code`, `msg_notif`, `tgl_notif`, `status_notif`, `url_notif`) VALUES
(1, 1, 'Teknik', 'fa fa-building', 'Pembangunan Rumah BB - 02', NULL, NULL, 'pengawas 1 telah mengupdate sesuatu', '2024-09-24 02:47:08', 'unread', NULL),
(2, 1, 'Teknik', 'fa fa-building', 'Pembangunan Rumah AA-11', NULL, NULL, 'pengawas 1 telah mengupdate sesuatu', '2024-09-24 02:47:17', 'read', NULL);

--
-- Triggers `pelanggan_notif`
--
DELIMITER $$
CREATE TRIGGER `insert_counter_notif_pelanggan` AFTER INSERT ON `pelanggan_notif` FOR EACH ROW BEGIN
    -- Periksa apakah id_pelanggan sudah ada di counter_notif_pelanggan
    IF EXISTS (SELECT 1 FROM counter_notif_pelanggan WHERE id_pelanggan = NEW.id_pelanggan) THEN
        -- Update unread_notif untuk id_pelanggan yang sudah ada
        UPDATE counter_notif_pelanggan 
        SET unread_notif = unread_notif + 1
        WHERE id_pelanggan = NEW.id_pelanggan;
    ELSE
        -- Insert baris baru jika id_pelanggan belum ada
        INSERT INTO counter_notif_pelanggan (id_pelanggan, unread_notif, read_notif)
        VALUES (NEW.id_pelanggan, 1, 0);
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_counter_on_read` AFTER UPDATE ON `pelanggan_notif` FOR EACH ROW BEGIN
    -- Periksa apakah status_notif berubah menjadi 'read'
    IF NEW.status_notif = 'read' AND OLD.status_notif != 'read' THEN
        -- Update counter_notif_pelanggan untuk mengurangi unread_notif dan menambah read_notif
        UPDATE counter_notif_pelanggan 
        SET unread_notif = unread_notif - 1,
            read_notif = read_notif + 1
        WHERE id_pelanggan = NEW.id_pelanggan;
    END IF;
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelanggan_notif`
--
ALTER TABLE `pelanggan_notif`
  ADD PRIMARY KEY (`id_notif`),
  ADD KEY `id_user_admin` (`id_pelanggan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelanggan_notif`
--
ALTER TABLE `pelanggan_notif`
  MODIFY `id_notif` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
