-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jan 2025 pada 03.44
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
-- Database: `kontrak_am`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `accountmanager`
--

CREATE TABLE `accountmanager` (
  `NIKAM` int(11) NOT NULL,
  `NamaAM` varchar(255) DEFAULT NULL,
  `IdSegmen` int(11) DEFAULT NULL,
  `NoHP` int(11) DEFAULT NULL,
  `Email` varchar(55) DEFAULT NULL,
  `IdTelegram` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `accountmanager`
--

INSERT INTO `accountmanager` (`NIKAM`, `NamaAM`, `IdSegmen`, `NoHP`, `Email`, `IdTelegram`) VALUES
(1, 'Quinlan', 1, 812345678, 'quinlan00@gmail.com', 'quinlanaja');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datacustomer`
--

CREATE TABLE `datacustomer` (
  `NamaCust` varchar(255) DEFAULT NULL,
  `NoBilling` int(11) NOT NULL,
  `NIPNAS` int(11) DEFAULT NULL,
  `AlamatCust` varchar(255) DEFAULT NULL,
  `NamaPIC` varchar(255) DEFAULT NULL,
  `NoHPPIC` varchar(20) DEFAULT NULL,
  `NIKAM` int(11) DEFAULT NULL,
  `EmailCust` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `datacustomer`
--

INSERT INTO `datacustomer` (`NamaCust`, `NoBilling`, `NIPNAS`, `AlamatCust`, `NamaPIC`, `NoHPPIC`, `NIKAM`, `EmailCust`) VALUES
('Imran', 123123, 1, 'Jl. DI Panjaitan No.128, Karangreja, Purwokerto Kidul, Kec. Purwokerto Sel., Kabupaten Banyumas, Jawa Tengah 53147', 'Zakhaev', '08123123', 1, 'imran@example.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontrak`
--

CREATE TABLE `kontrak` (
  `Id` int(11) NOT NULL,
  `NoKontrak` varchar(50) DEFAULT NULL,
  `NoBilling` int(11) DEFAULT NULL,
  `FirstDate` date DEFAULT NULL,
  `EndDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kontrak`
--

INSERT INTO `kontrak` (`Id`, `NoKontrak`, `NoBilling`, `FirstDate`, `EndDate`) VALUES
(1, '16661', 123123, '2025-01-15', '2025-02-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `layanan`
--

CREATE TABLE `layanan` (
  `NoBilling` int(11) DEFAULT NULL,
  `SID` varchar(100) NOT NULL,
  `ProdName` varchar(100) DEFAULT NULL,
  `Bandwidth` varchar(10) DEFAULT NULL,
  `Satuan` varchar(10) DEFAULT NULL,
  `NilaiLayanan` decimal(15,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `layanan`
--

INSERT INTO `layanan` (`NoBilling`, `SID`, `ProdName`, `Bandwidth`, `Satuan`, `NilaiLayanan`) VALUES
(123123, '991991', 'Zakhaev', '100', 'mb', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `segmen`
--

CREATE TABLE `segmen` (
  `IdSegmen` int(11) NOT NULL,
  `NamaSegmen` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `segmen`
--

INSERT INTO `segmen` (`IdSegmen`, `NamaSegmen`) VALUES
(1, 'PWT');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewcustomerdetails`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewcustomerdetails` (
`NamaCust` varchar(255)
,`NoBilling` int(11)
,`NIPNAS` int(11)
,`AlamatCust` varchar(255)
,`NamaPIC` varchar(255)
,`NoHPPIC` varchar(20)
,`EmailCust` varchar(55)
,`NamaAM` varchar(255)
,`NoHPTelegram` int(11)
,`EmailAM` varchar(55)
,`IdTelegram` varchar(55)
,`NamaSegmen` varchar(3)
,`SID` varchar(100)
,`ProdName` varchar(100)
,`Bandwidth` varchar(10)
,`Satuan` varchar(10)
,`NilaiLayanan` decimal(15,0)
,`NoKontrak` varchar(50)
,`FirstDate` date
,`EndDate` date
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewcustomerdetails`
--
DROP TABLE IF EXISTS `viewcustomerdetails`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewcustomerdetails`  AS SELECT `datacustomer`.`NamaCust` AS `NamaCust`, `datacustomer`.`NoBilling` AS `NoBilling`, `datacustomer`.`NIPNAS` AS `NIPNAS`, `datacustomer`.`AlamatCust` AS `AlamatCust`, `datacustomer`.`NamaPIC` AS `NamaPIC`, `datacustomer`.`NoHPPIC` AS `NoHPPIC`, `datacustomer`.`EmailCust` AS `EmailCust`, `accountmanager`.`NamaAM` AS `NamaAM`, `accountmanager`.`NoHP` AS `NoHPTelegram`, `accountmanager`.`Email` AS `EmailAM`, `accountmanager`.`IdTelegram` AS `IdTelegram`, `segmen`.`NamaSegmen` AS `NamaSegmen`, `layanan`.`SID` AS `SID`, `layanan`.`ProdName` AS `ProdName`, `layanan`.`Bandwidth` AS `Bandwidth`, `layanan`.`Satuan` AS `Satuan`, `layanan`.`NilaiLayanan` AS `NilaiLayanan`, `kontrak`.`NoKontrak` AS `NoKontrak`, `kontrak`.`FirstDate` AS `FirstDate`, `kontrak`.`EndDate` AS `EndDate` FROM ((((`datacustomer` join `accountmanager` on(`datacustomer`.`NIKAM` = `accountmanager`.`NIKAM`)) join `segmen` on(`accountmanager`.`IdSegmen` = `segmen`.`IdSegmen`)) join `layanan` on(`datacustomer`.`NoBilling` = `layanan`.`NoBilling`)) join `kontrak` on(`datacustomer`.`NoBilling` = `kontrak`.`NoBilling`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `accountmanager`
--
ALTER TABLE `accountmanager`
  ADD PRIMARY KEY (`NIKAM`),
  ADD KEY `IdSegmen` (`IdSegmen`);

--
-- Indeks untuk tabel `datacustomer`
--
ALTER TABLE `datacustomer`
  ADD PRIMARY KEY (`NoBilling`),
  ADD KEY `NIKAM` (`NIKAM`);

--
-- Indeks untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `NoBilling` (`NoBilling`);

--
-- Indeks untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD PRIMARY KEY (`SID`),
  ADD KEY `NoBilling` (`NoBilling`);

--
-- Indeks untuk tabel `segmen`
--
ALTER TABLE `segmen`
  ADD PRIMARY KEY (`IdSegmen`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `accountmanager`
--
ALTER TABLE `accountmanager`
  ADD CONSTRAINT `accountmanager_ibfk_1` FOREIGN KEY (`IdSegmen`) REFERENCES `segmen` (`IdSegmen`);

--
-- Ketidakleluasaan untuk tabel `datacustomer`
--
ALTER TABLE `datacustomer`
  ADD CONSTRAINT `datacustomer_ibfk_1` FOREIGN KEY (`NIKAM`) REFERENCES `accountmanager` (`NIKAM`);

--
-- Ketidakleluasaan untuk tabel `kontrak`
--
ALTER TABLE `kontrak`
  ADD CONSTRAINT `kontrak_ibfk_1` FOREIGN KEY (`NoBilling`) REFERENCES `datacustomer` (`NoBilling`);

--
-- Ketidakleluasaan untuk tabel `layanan`
--
ALTER TABLE `layanan`
  ADD CONSTRAINT `layanan_ibfk_1` FOREIGN KEY (`NoBilling`) REFERENCES `datacustomer` (`NoBilling`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
