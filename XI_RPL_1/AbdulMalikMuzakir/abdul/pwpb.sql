-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2022 at 10:52 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwpb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dataortu`
--

CREATE TABLE `dataortu` (
  `id_ortu` int(11) NOT NULL,
  `nama_ortu` varchar(50) NOT NULL,
  `pekerjaan_ortu` enum('PNS','TNI','POLRI','LAINNYA') NOT NULL,
  `hp_ortu` varchar(13) NOT NULL,
  `alamat_ortu` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dataortu`
--

INSERT INTO `dataortu` (`id_ortu`, `nama_ortu`, `pekerjaan_ortu`, `hp_ortu`, `alamat_ortu`) VALUES
(1, 'Nama Ortu Saya', 'PNS', '085727721682', 'Kp.Waspada RT04 RW09 Kec.Banjaran Kab.Bandung');

-- --------------------------------------------------------

--
-- Table structure for table `datasekolah`
--

CREATE TABLE `datasekolah` (
  `id` int(11) NOT NULL,
  `nis` int(15) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `jk` enum('laki-laki','perempuan') NOT NULL,
  `ttl` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datasekolah`
--

INSERT INTO `datasekolah` (`id`, `nis`, `nama`, `alamat`, `jk`, `ttl`) VALUES
(1, 202110469, 'Abdul Malik Muzakir', 'Kp.Waspada RT04 RW09 Kec.Banjaran Kab,Bandung', 'laki-laki', '1/Juni/2004'),
(2, 2021098, 'Mark Zukerberd', 'US Amerika', 'laki-laki', '2/Mei/1967'),
(3, 2021987, 'Bill Gates', 'Amerika', 'laki-laki', '10/November/1972'),
(4, 2021435, 'Elon Mark', 'Amerika', 'laki-laki', '6/Januari/1960'),
(5, 202113333, 'Sabik Akma Fadila', 'Bandung', 'laki-laki', '1/Februari/2010'),
(6, 202134343, 'Alvin Kurniawan', 'Katapang', 'laki-laki', '22/Oktober/1965'),
(7, 202156789, 'Ridwan Setiawan', 'Katapang', 'laki-laki', '10/Oktober/2007'),
(8, 202113456, 'Erick', 'Inggris', 'laki-laki', '15/Agustus/2009'),
(9, 20217678, 'Reyhan Aditya', 'Banjaran', 'laki-laki', '23/Desember/2007'),
(10, 20215578, 'kaby lame', 'afrika', 'laki-laki', '6/Juni/1999'),
(11, 2021478, 'william henry', 'amerika', 'laki-laki', '13/Oktober/1979'),
(12, 2021884, 'ilham', 'soreang', 'laki-laki', '12/Desember/2012');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dataortu`
--
ALTER TABLE `dataortu`
  ADD PRIMARY KEY (`id_ortu`);

--
-- Indexes for table `datasekolah`
--
ALTER TABLE `datasekolah`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dataortu`
--
ALTER TABLE `dataortu`
  MODIFY `id_ortu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `datasekolah`
--
ALTER TABLE `datasekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
