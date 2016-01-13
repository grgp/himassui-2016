-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 13 Jan 2016 pada 15.27
-- Versi Server: 10.0.17-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `himassui_to2016`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `peserta`
--

CREATE TABLE `peserta` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `asal` varchar(50) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hp` varchar(15) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `bukti` varchar(50) NOT NULL,
  `nomorujian` int(30) NOT NULL,
  `tipesoal` int(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peserta`
--

INSERT INTO `peserta` (`id`, `username`, `password`, `nama`, `asal`, `jurusan`, `email`, `hp`, `status`, `bukti`, `nomorujian`, `tipesoal`) VALUES
(1, 'master', 'master', 'master akbar', 'master akbar', 'Soshum', 'master', '8', 0, '', 1003, 2),
(2, 'himassui', 'kobinasi11', 'A', 'asalbaru', 'Saintek', 'emailbaru@gmail.com', '2147483647', 0, '', 1004, 1),
(3, 'himassuijancog', 'kobinasi121', 'nama', 'asalbaru', 'Saintek', 'emailbaru@gmail.com', '2147483647', 0, '', 1001, 2),
(4, 'akbar', 'pass', 'akabrz', 'asalz', 'Soshum', 'email@gmail.com', '08121444495', 0, '', 1002, 1),
(5, 'akbar2', 'akbar', 'akbar', 'SMA 1 Pemali', 'Saintek', 'septriyan.akbar@gmail.com', '08121444499', 1, '', 1005, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
