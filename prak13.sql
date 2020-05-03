-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 03 Mei 2020 pada 09.40
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prak13`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_corona`
--

CREATE TABLE `tb_corona` (
  `negara` varchar(8) NOT NULL,
  `total_kasus` int(11) DEFAULT NULL,
  `kasus_baru` int(11) DEFAULT NULL,
  `total_kematian` int(11) DEFAULT NULL,
  `kematian_baru` int(11) DEFAULT NULL,
  `total_sembuh` int(11) DEFAULT NULL,
  `kasus_aktif` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_corona`
--

INSERT INTO `tb_corona` (`negara`, `total_kasus`, `kasus_baru`, `total_kematian`, `kematian_baru`, `total_sembuh`, `kasus_aktif`) VALUES
('China', 82836, 6, 4633, NULL, 77555, 648),
('France', 165911, 2638, 23660, 367, 46886, 95365),
('Germany', 159431, 673, 6215, 89, 117400, 35816),
('Iran', 92584, 1112, 5877, 71, 72439, 14268),
('Italy', 201505, 2091, 27359, 382, 68941, 1052015),
('Rusia', 93558, 6411, 867, 73, 8456, 84235),
('Spain', 232128, 2706, 23822, 301, 123903, 84403),
('Turkey', 114653, 2392, 2992, 92, 38809, 72852),
('UK', 161145, 3996, 21678, 586, NULL, 139123),
('USA', 1029878, 19522, 58640, 1843, 140138, 831100);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_corona`
--
ALTER TABLE `tb_corona`
  ADD PRIMARY KEY (`negara`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
