-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jun 2022 pada 14.46
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harvard_university_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa_harvard`
--

CREATE TABLE `mahasiswa_harvard` (
  `nim_mhs` int(16) NOT NULL,
  `nama_mhs` varchar(128) NOT NULL,
  `mhs_ang` int(16) NOT NULL,
  `progstud_mhs` varchar(128) NOT NULL,
  `nik_mhs` varchar(255) NOT NULL,
  `nohp_mhs` varchar(128) NOT NULL,
  `tmptlhr_mhs` varchar(128) NOT NULL,
  `tglhr_mhs` date NOT NULL,
  `foto_mhs` varchar(128) NOT NULL,
  `email_mhs` varchar(128) NOT NULL,
  `alamat_mhs` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa_harvard`
--

INSERT INTO `mahasiswa_harvard` (`nim_mhs`, `nama_mhs`, `mhs_ang`, `progstud_mhs`, `nik_mhs`, `nohp_mhs`, `tmptlhr_mhs`, `tglhr_mhs`, `foto_mhs`, `email_mhs`, `alamat_mhs`) VALUES
(195111001, 'Rich Brian', 2019, 'Manajemen Informatika', '126120108990009', '082159238882', 'Batam', '1999-08-01', '195111002.jpg', 'Richbbriannn@gmail.com', 'Jl. Mana Aja Pun Gapapa'),
(205112022, 'Rudi Piwdipai', 2020, 'Teknik Sipil', '1261212209990009', '082291882881', 'Jakarta', '1999-09-22', '205112022.jpg', 'Rudipiwdipai@gmail.com', 'Jl. Perkasa No. 2'),
(1905112011, 'Frans Aditia S.', 2019, 'Teknik Komputer', '1271210108010003', '081260222019', 'Medan', '2001-08-01', '1905112011.jpg', 'Frnssmmr@gmail.com', 'Jl. Bunga Raya Asam Kumbang Gg. Saudara');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa_harvard`
--
ALTER TABLE `mahasiswa_harvard`
  ADD PRIMARY KEY (`nim_mhs`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
