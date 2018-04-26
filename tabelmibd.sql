-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2018 at 12:22 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mibdbusuq`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `username` varchar(20) NOT NULL,
  `idGuru` int(11) NOT NULL,
  `pendidikanTerakhir` varchar(10) NOT NULL,
  `noKTP` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `idGuru` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `idPelajaran` int(11) NOT NULL,
  `available` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kecamatan`
--

CREATE TABLE `kecamatan` (
  `idKecamatan` int(11) NOT NULL,
  `namaKecamatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kecamatan` (`idKecamatan`, `namaKecamatan`) VALUES
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
  `namaKelurahan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `kelurahan` (`idKelurahan`, `namaKelurahan`) VALUES
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
-- Table structure for table `les`
--

CREATE TABLE `les` (
  `idLes` int(11) NOT NULL,
  `idJadwal` int(11) NOT NULL,
  `idMurid` int(11) NOT NULL,
  `pelajaran` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `murid`
--

CREATE TABLE `murid` (
  `username` varchar(20) NOT NULL,
  `idMurid` int(11) NOT NULL,
  `kelas` int(11) NOT NULL,
  `namaSekolah` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `idPelajaran` int(11) NOT NULL,
  `mataPelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `jenisKelamin` varchar(10) NOT NULL,
  `kelurahan` int(11) NOT NULL,
  `kecamatan` int(11) NOT NULL,
  `pass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `user` (`nama`, `userName`, `alamat`, `jenisKelamin`, `kecamatan`, `kelurahan`, `pass`) VALUES
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
  ADD KEY `username` (`username`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `FK_guru_les` (`idGuru`);

--
-- Indexes for table `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`idKecamatan`);

--
-- Indexes for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`idKelurahan`),

--
-- Indexes for table `les`
--
ALTER TABLE `les`
  ADD PRIMARY KEY (`idLes`),
  ADD KEY `idJadwal` (`idJadwal`),
  ADD KEY `idMurid` (`idMurid`),
  ADD KEY `pelajaran` (`pelajaran`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`idMurid`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`idPelajaran`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`username`),
  ADD KEY `FK_kelurahan` (`kelurahan`);
  ADD KEY `FK_kecamatan` (`kecamatan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `idGuru` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `idKecamatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `idKelurahan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `idMurid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `idPelajaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `guru`
--
ALTER TABLE `guru`
  ADD CONSTRAINT `guru_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`);

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `FK_guru_les` FOREIGN KEY (`idGuru`) REFERENCES `guru` (`idGuru`);

--
-- Constraints for table `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `FK_kecamatan` FOREIGN KEY (`kecamatan`) REFERENCES `kecamatan` (`idKecamatan`);

--
-- Constraints for table `les`
--
ALTER TABLE `les`
  ADD CONSTRAINT `les_ibfk_1` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`),
  ADD CONSTRAINT `les_ibfk_2` FOREIGN KEY (`idMurid`) REFERENCES `murid` (`idMurid`),
  ADD CONSTRAINT `les_ibfk_3` FOREIGN KEY (`pelajaran`) REFERENCES `pelajaran` (`idPelajaran`);

--
-- Constraints for table `murid`
--
ALTER TABLE `murid`
  ADD CONSTRAINT `murid_ibfk_1` FOREIGN KEY (`username`) REFERENCES `pengguna` (`username`);

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `FK_kelurahan` FOREIGN KEY (`kelurahan`) REFERENCES `kelurahan` (`idKelurahan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
