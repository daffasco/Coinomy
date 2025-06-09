-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2025 at 01:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukl_coinomy`
--

-- --------------------------------------------------------

--
-- Table structure for table `kelasonline`
--

CREATE TABLE `kelasonline` (
  `ID_Kelas` int(11) NOT NULL,
  `Nama` varchar(255) NOT NULL,
  `Harga` decimal(65,0) NOT NULL,
  `img` varchar(255) NOT NULL DEFAULT 'image.png',
  `Deskripsi` varchar(255) NOT NULL,
  `detail` text NOT NULL DEFAULT 'Ini adalah kelas',
  `Materi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelasonline`
--

INSERT INTO `kelasonline` (`ID_Kelas`, `Nama`, `Harga`, `img`, `Deskripsi`, `detail`, `Materi`) VALUES
(11, 'Belajar Obligasi FR Panduan Lengkap untuk Pemula (by Dr. Ezzarine)', 150000, '45fc56fb51d99d887e2011645d430cf5.png', 'INI DESKRIPSI SINGKAT', 'DETAIL PANJANGGGGGGGGGGGGGGGGGGGG', NULL),
(12, 'Kelas Web', 50000, 'bc247ccc0d97375fd5f934cff689e627.png', 'INI DESKRIPSI ALWKAKWAKLWALWA', 'Asklajsk jajskaj slkajskajs kajslkaja ksjakjskaj sjlskjqwdwqdjqwkjdqkdjqjlkjdk kjdkqjdk qwkdjkjlkoqw iej ikhaidyuuh jkhdjuiv xzluovkhiash joh hh i ahfoh hh jhjzhxj iuijdkja shj oih wjeh iojamsdj ijoiksakjdklqwie mlnmjashdk', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `materi`
--

CREATE TABLE `materi` (
  `ID_Materi` int(11) NOT NULL,
  `ID_Kelas` int(11) NOT NULL,
  `File_materi` varchar(255) DEFAULT NULL,
  `Video_materi` text DEFAULT NULL,
  `Pertemuan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `materi`
--

INSERT INTO `materi` (`ID_Materi`, `ID_Kelas`, `File_materi`, `Video_materi`, `Pertemuan`) VALUES
(6, 11, '2710b8fc64539daca9a95b55176e34c8.pdf', '', 1),
(7, 11, 'd5f95c1595e263ae03cd897d333fbfb5.pdf', '', 2),
(8, 11, 'a7406ebbe5c87a58f62e0a86eac98851.pdf', '', 3),
(9, 11, '', 'https://google.com', 4),
(10, 11, '', 'https://instagram.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `ID_Transaksi` int(11) NOT NULL,
  `US_ID` int(255) NOT NULL,
  `ID_kelas` int(11) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Waktu` date NOT NULL DEFAULT current_timestamp(),
  `Pesan` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`ID_Transaksi`, `US_ID`, `ID_kelas`, `Harga`, `Waktu`, `Pesan`) VALUES
(1, 35, 12, 2147483647, '2025-05-28', 'Sayang admin'),
(2, 35, 12, 2147483647, '2025-05-28', 'Sayang admin'),
(3, 35, 11, 150000, '2025-06-02', 'mantap');

-- --------------------------------------------------------

--
-- Table structure for table `ulasan`
--

CREATE TABLE `ulasan` (
  `ID_Ulasan` int(11) NOT NULL,
  `US_ID` int(11) NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `komentar` text DEFAULT NULL,
  `tanggal_ulasan` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `US_ID` int(255) NOT NULL,
  `US_NAME` varchar(255) NOT NULL,
  `US_EMAIL` varchar(255) NOT NULL,
  `Jenis_Kelamin` varchar(255) NOT NULL,
  `FILE_KTP` varchar(255) NOT NULL,
  `FILE_PHOTO` varchar(255) NOT NULL,
  `US_Password` varchar(255) NOT NULL,
  `US_No.hp` varchar(255) NOT NULL,
  `US_STAT` varchar(255) NOT NULL DEFAULT 'USER'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`US_ID`, `US_NAME`, `US_EMAIL`, `Jenis_Kelamin`, `FILE_KTP`, `FILE_PHOTO`, `US_Password`, `US_No.hp`, `US_STAT`) VALUES
(33, 'Daffa Ronalvianto Pratama', 'm.daffa07112008@gmail.com', 'Laki-laki', 'uploads/WhatsApp Image 2024-07-15 at 10.25.29_a6b948cc.jpg', '', '112233', '085230248063', 'ADMIN'),
(34, 'GhulamHimawal', 'UserGhulam@gmail.com', 'Laki-laki', 'uploads/WIN_20241028_14_28_20_Pro.jpg', '', '112233', '082230224000', 'USER'),
(35, 'Muhammad Naufal Rafa Al Asad', 'falrafa@gmail.com', 'Laki-laki', 'uploads/WIN_20240917_12_41_18_Pro.jpg', '', 'n4uf4lr4f4', '082335241416', 'USER');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kelasonline`
--
ALTER TABLE `kelasonline`
  ADD PRIMARY KEY (`ID_Kelas`);

--
-- Indexes for table `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`ID_Materi`),
  ADD KEY `materi_ibfk_1` (`ID_Kelas`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`ID_Transaksi`),
  ADD KEY `US_ID` (`US_ID`),
  ADD KEY `ID_kelas` (`ID_kelas`);

--
-- Indexes for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD PRIMARY KEY (`ID_Ulasan`),
  ADD KEY `US_ID` (`US_ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`US_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kelasonline`
--
ALTER TABLE `kelasonline`
  MODIFY `ID_Kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `materi`
--
ALTER TABLE `materi`
  MODIFY `ID_Materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `ID_Transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ulasan`
--
ALTER TABLE `ulasan`
  MODIFY `ID_Ulasan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `US_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `materi`
--
ALTER TABLE `materi`
  ADD CONSTRAINT `materi_ibfk_1` FOREIGN KEY (`ID_Kelas`) REFERENCES `kelasonline` (`ID_Kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `ID_kelas` FOREIGN KEY (`ID_kelas`) REFERENCES `kelasonline` (`ID_Kelas`),
  ADD CONSTRAINT `US_ID` FOREIGN KEY (`US_ID`) REFERENCES `users` (`US_ID`);

--
-- Constraints for table `ulasan`
--
ALTER TABLE `ulasan`
  ADD CONSTRAINT `ulasan_ibfk_1` FOREIGN KEY (`US_ID`) REFERENCES `users` (`US_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
