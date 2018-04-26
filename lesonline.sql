-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 07:28 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lesonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `idGuru` int(11) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `noKTP` int(11) NOT NULL,
  `pendidikanTerakhir` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`idGuru`, `userName`, `noKTP`, `pendidikanTerakhir`) VALUES
(1, 'JL', 1234, 'SMA');

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idKecamatan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kecamatan`
--

INSERT INTO `kecamatan` (`idKecamatan`, `nama`) VALUES
(1, 'Andir'),
(2, 'Antapani'),
(3, 'Arcamanik'),
(4, 'Babakan Ciparay'),
(5, 'Gunung Kidul'),
(6, 'Bandung Kidul'),
(7, 'Bandung Kaler'),
(8, 'Astana anyar'),
(9, 'Bojongloa Kidul'),
(10, 'Bojongloa Kaler'),
(11, 'Batununggal');

-- --------------------------------------------------------

--
-- Table structure for table `kelurahan`
--

CREATE TABLE `kelurahan` (
  `idKelurahan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kelurahan`
--

INSERT INTO `kelurahan` (`idKelurahan`, `nama`) VALUES
(1, 'Ciroyom'),
(2, 'Garuda'),
(3, 'Maleber'),
(4, 'Kebon Jeruk'),
(5, 'Caringin'),
(6, 'Cigonewa'),
(7, 'Cijerah'),
(8, 'Gempol Asri'),
(9, 'Dago'),
(10, 'Sekeloa');

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `kelas` int(11) NOT NULL,
  `namaSekolah` varchar(50) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `idMurid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `nama` varchar(50) NOT NULL,
  `userName` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `idKecamatan` int(11) NOT NULL,
  `idKelurahan` int(11) NOT NULL,
  `pass` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`nama`, `userName`, `alamat`, `jenisKelamin`, `idKecamatan`, `idKelurahan`, `pass`) VALUES
('Joshua Laurich', 'JL', 'Jl.Elang', 'laki-laki', 4, 3, 'e10adc3949ba59abbe56e057f20f883e'),
('Jason', 'jy', 'jl Pasadena', 'laki-laki', 1, 1, '25f9e794323b453885f5181f1b624d0b'),
('Yehezkiel', 'kikil', 'Jl kopo no 341', 'laki-laki', 1, 1, '41d96a32a1ba29a6b996e0ae515c4c60');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idKecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`idKelurahan`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`idMurid`),
  ADD KEY `idMurid` (`idMurid`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`),
  ADD KEY `idKulurahan` (`idKelurahan`),
  ADD KEY `idKecamatan` (`idKecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idKecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `idKelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `idMurid` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `userName` FOREIGN KEY (`userName`) REFERENCES `user` (`userName`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `idKecamatan` FOREIGN KEY (`idKecamatan`) REFERENCES `kecamatan` (`idKecamatan`),
  ADD CONSTRAINT `idKelurahan` FOREIGN KEY (`idKelurahan`) REFERENCES `kelurahan` (`idKelurahan`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
