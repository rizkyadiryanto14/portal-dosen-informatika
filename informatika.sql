-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 09, 2023 at 04:57 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `informatika`
--

-- --------------------------------------------------------

--
-- Table structure for table `bkd`
--

CREATE TABLE `bkd` (
  `id` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `tahun_ajaran` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `bukti_pendidikan` varchar(255) NOT NULL,
  `bukti_penelitian` varchar(255) NOT NULL,
  `bukti_pengabdian` varchar(255) NOT NULL,
  `penunjang` varchar(255) NOT NULL,
  `print_sister` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bkd`
--

INSERT INTO `bkd` (`id`, `id_dosen`, `tahun_ajaran`, `semester`, `bukti_pendidikan`, `bukti_penelitian`, `bukti_pengabdian`, `penunjang`, `print_sister`) VALUES
(7, 1, '2023', '3', 'contoh.pdf', 'contoh.pdf', 'contoh.pdf', 'contoh.pdf', 'contoh.pdf'),
(32, 2, '2022', '2', 'frs1.png', 'footer11.png', 'Informatika1.png', 'footer.jpg', 'download.png'),
(34, 6, '2022', '3', 'Informatika3.png', 'foto_blur2.png', 'footer2.jpg', 'foto_(1).png', 'frs2.png'),
(37, 3, '2022', '2', 'Upload_File2.png', 'footer3.jpg', 'Informatika6.png', 'download3.png', 'footer12.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL COMMENT '1 = admin, 2 =dosen, 3 = subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `image`, `email`, `role_id`) VALUES
(1, 'admin', '$2y$10$SSjLxxlobT2eGSLq3mdqwe2W7n1f1tc2sVGcSu1QqWpPPSAqDkFEe', 'superadmin', 'default.png', 'admin@gmail.com', 1),
(2, 'dosen', '$2y$10$DsiOKm2jeqiPdai7CWCkVe/S2nUczUSpqqZ3paD82cpHk7490jUre', 'dosen', 'default.jpg', 'dosen@gmail.com', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bkd`
--
ALTER TABLE `bkd`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_dosen` (`id_dosen`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bkd`
--
ALTER TABLE `bkd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
