-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2025 pada 04.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukl coinomy`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `crud for admin`
--

CREATE TABLE `admin` (
  `US_ID` int(255) NOT NULL,
  `US_NAME` varchar(255) NOT NULL,
  `US_EMAIL` varchar(255) NOT NULL,
  `FILE_KTP` varchar(255) NOT NULL,
  `FILE_PHOTO` varchar(255) NOT NULL,
  `US_REKENING` int(255) NOT NULL,
  `US_DATE` date NOT NULL,
  `US_No.hp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian_aset`
--

CREATE TABLE `pembelian_aset` (
  `ID_Pembelian` int(11) NOT NULL,
  `ID_Penjualan` int(11) NOT NULL,
  `ID_Portofolio` int(11) NOT NULL,
  `Jumlah_Aset_Dibeli` varchar(100) NOT NULL,
  `Jumlah_Uang_Dikeluarkan` varchar(100) NOT NULL,
  `No_Antrian` int(11) NOT NULL,
  `Total_Pembelian` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_Pendaftaran` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Nohp` varchar(20) NOT NULL,
  `Born` date NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_Pendaftaran`, `ID_User`, `Nohp`, `Born`, `Email`, `Password`) VALUES
(6, 1110, '085230248878', '2025-01-15', 'AyoaMasBama@gmail.com', 'bama666'),
(7, 1111, '089897656646', '2025-01-15', 'LinukAbiez@gmail.com', 'linuks1234'),
(8, 1112, '083588771469', '2025-01-15', 'EnakEmail@gmail.com', 'CssStyleSheets9'),
(9, 1113, '081230568182', '2025-01-15', 'AsikinCodingnya@gmail.com', 'AsikBangetCoding777'),
(10, 2224, '089122456781', '2025-01-15', 'IndonesiaMaju@gmail.com', 'BasmiPerdukunan123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan_aset`
--

CREATE TABLE `penjualan_aset` (
  `ID_Penjualan` int(11) NOT NULL,
  `ID_Pembelian` int(11) NOT NULL,
  `ID_Portofolio` int(11) NOT NULL,
  `Jumlah_Aset_Dijual` varchar(100) NOT NULL,
  `Jumlah_Uang_Diperoleh` varchar(100) NOT NULL,
  `No_Antrian` int(11) NOT NULL,
  `Total_Penjualan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `portofolio_investasi`
--

CREATE TABLE `portofolio_investasi` (
  `ID_Portofolio` int(11) NOT NULL,
  `ID_User` int(11) NOT NULL,
  `Saham` varchar(100) NOT NULL,
  `Obligasi` varchar(100) NOT NULL,
  `Reksadana` varchar(100) NOT NULL,
  `Gold` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `ID_User` int(11) NOT NULL,
  `ID_Pendaftaran` int(11) NOT NULL,
  `Nickname` varchar(225) NOT NULL,
  `Description` text NOT NULL,
  `Profil_picture` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`ID_User`, `ID_Pendaftaran`, `Nickname`, `Description`, `Profil_picture`) VALUES
(3, 1020, 'Mas Bama', 'Hajinya mana?', 1),
(8, 1120, 'Abah Ezzar', 'Judol itu sesat', 2),
(9, 1220, 'Vegachor Poju', 'Yang sudah boleh pulang', 3),
(10, 1320, 'Asep', 'Tadi asep lihat asep bertebaran di sekolah', 4),
(11, 1420, 'Ghulam Nawap', 'Hidup itu indah karena islam itu indah allhamdulillah', 5);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `crud for admin`
--
ALTER TABLE `crud for admin`
  ADD PRIMARY KEY (`US_ID`);

--
-- Indeks untuk tabel `pembelian_aset`
--
ALTER TABLE `pembelian_aset`
  ADD PRIMARY KEY (`ID_Pembelian`),
  ADD KEY `fk_penjualan_pembelian` (`ID_Penjualan`),
  ADD KEY `fk_portofolio_pembelian` (`ID_Portofolio`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_Pendaftaran`),
  ADD KEY `fk_user_pendaftaran` (`ID_User`);

--
-- Indeks untuk tabel `penjualan_aset`
--
ALTER TABLE `penjualan_aset`
  ADD PRIMARY KEY (`ID_Penjualan`),
  ADD KEY `fk_pembelian_penjualan` (`ID_Pembelian`),
  ADD KEY `fk_portofolio_penjualan` (`ID_Portofolio`);

--
-- Indeks untuk tabel `portofolio_investasi`
--
ALTER TABLE `portofolio_investasi`
  ADD PRIMARY KEY (`ID_Portofolio`),
  ADD KEY `fk_user_portofolio` (`ID_User`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`ID_User`),
  ADD KEY `fk_pendaftaran_profil` (`ID_Pendaftaran`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `crud for admin`
--
ALTER TABLE `crud for admin`
  MODIFY `US_ID` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pembelian_aset`
--
ALTER TABLE `pembelian_aset`
  MODIFY `ID_Pembelian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `ID_Pendaftaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `penjualan_aset`
--
ALTER TABLE `penjualan_aset`
  MODIFY `ID_Penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `portofolio_investasi`
--
ALTER TABLE `portofolio_investasi`
  MODIFY `ID_Portofolio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `profil`
--
ALTER TABLE `profil`
  MODIFY `ID_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pembelian_aset`
--
ALTER TABLE `pembelian_aset`
  ADD CONSTRAINT `fk_penjualan_pembelian` FOREIGN KEY (`ID_Penjualan`) REFERENCES `penjualan_aset` (`ID_Penjualan`),
  ADD CONSTRAINT `fk_portofolio_pembelian` FOREIGN KEY (`ID_Portofolio`) REFERENCES `portofolio_investasi` (`ID_Portofolio`);

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `fk_user_pendaftaran` FOREIGN KEY (`ID_User`) REFERENCES `profil` (`ID_User`),
  ADD CONSTRAINT `fk_user_profil` FOREIGN KEY (`ID_User`) REFERENCES `profil` (`ID_User`);

--
-- Ketidakleluasaan untuk tabel `penjualan_aset`
--
ALTER TABLE `penjualan_aset`
  ADD CONSTRAINT `fk_pembelian_penjualan` FOREIGN KEY (`ID_Pembelian`) REFERENCES `pembelian_aset` (`ID_Pembelian`),
  ADD CONSTRAINT `fk_portofolio_penjualan` FOREIGN KEY (`ID_Portofolio`) REFERENCES `portofolio_investasi` (`ID_Portofolio`);

--
-- Ketidakleluasaan untuk tabel `portofolio_investasi`
--
ALTER TABLE `portofolio_investasi`
  ADD CONSTRAINT `fk_user_portofolio` FOREIGN KEY (`ID_User`) REFERENCES `profil` (`ID_User`);

--
-- Ketidakleluasaan untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `fk_pendaftaran` FOREIGN KEY (`ID_Pendaftaran`) REFERENCES `pendaftaran` (`ID_Pendaftaran`),
  ADD CONSTRAINT `fk_pendaftaran_profil` FOREIGN KEY (`ID_Pendaftaran`) REFERENCES `pendaftaran` (`ID_Pendaftaran`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
