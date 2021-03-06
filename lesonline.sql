-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2018 at 06:20 AM
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
(2, 'MIBD', 1234, 'S3'),
(3, 'JL', 12345, 'SMA'),
(4, 'ganteng', 32145, 'SD');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `idJadwal` int(11) NOT NULL,
  `idGuru` int(11) NOT NULL,
  `jam` varchar(12) NOT NULL,
  `idPelajaran` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `hari` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`idJadwal`, `idGuru`, `jam`, `idPelajaran`, `available`, `hari`) VALUES
(4, 3, '15.00-16.00', 4, 0, 'Jumat'),
(5, 2, '14.00-15.00', 2, 1, 'Senin'),
(6, 2, '13.00-14.00', 1, 1, 'Senin'),
(7, 2, '14.00-15.00', 4, 1, 'Senin');

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
(8, 'Astana anyar');

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
-- Table structure for table `les`
--

CREATE TABLE `les` (
  `idLes` int(11) NOT NULL,
  `idJadwal` int(11) NOT NULL,
  `idMurid` int(11) NOT NULL,
  `tanggalOrder` date NOT NULL,
  `tanggalLes` date DEFAULT NULL,
  `statusLes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `les`
--

INSERT INTO `les` (`idLes`, `idJadwal`, `idMurid`, `tanggalOrder`, `tanggalLes`, `statusLes`) VALUES
(20, 6, 1, '2018-04-29', '2018-04-29', 0),
(21, 5, 1, '2018-04-29', '2018-04-29', 0),
(22, 5, 1, '2018-04-29', '2018-04-29', 0),
(23, 5, 1, '2018-04-29', '2018-04-29', 0),
(24, 6, 1, '2018-04-29', '2018-04-29', 0),
(26, 4, 2, '2018-04-29', '2018-04-29', 0),
(27, 6, 1, '2018-04-29', '2018-04-29', 0),
(28, 5, 1, '2018-04-29', '2018-04-29', 0),
(29, 5, 2, '2018-04-29', '2018-04-29', 0),
(30, 4, 2, '2018-04-29', NULL, 1);

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

--
-- Dumping data for table `murid`
--

INSERT INTO `murid` (`kelas`, `namaSekolah`, `userName`, `idMurid`) VALUES
(4, 'SDK', 'fer', 1),
(4, 'graci', 'jely', 2),
(4, 'SDK 6 BPK Penabur', 'cah', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `idPelajaran` int(11) NOT NULL,
  `mataPelajaran` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`idPelajaran`, `mataPelajaran`) VALUES
(1, 'Matematika'),
(2, 'Inggris'),
(3, 'B Indonesia'),
(4, 'Menggambar'),
(5, 'Mandarin');

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
('ganas', '', 'bandung', 'perempuan', 6, 7, '827ccb0eea8a706c4c34a16891f84e7b'),
('Cahyadi', 'cah', 'maleber', 'laki-laki', 6, 4, '68053af2923e00204c3ca7c6a3150cf7'),
('Ferdian', 'fer', 'pelosok', 'laki-laki', 1, 1, '827ccb0eea8a706c4c34a16891f84e7b'),
('Gery', 'ganteng', 'muara', 'laki-laki', 1, 1, '4dd39f49f898c062283963c187532af8'),
('Jely', 'jely', 'pelosok', 'laki-laki', 8, 6, 'df6d2338b2b8fce1ec2f6dda0a630eb0'),
('Jason', 'jy', 'jl Pasadena', 'laki-laki', 1, 1, '25f9e794323b453885f5181f1b624d0b'),
('Yehezkiel', 'kikil', 'Jl kopo no 341', 'laki-laki', 1, 1, '41d96a32a1ba29a6b996e0ae515c4c60'),
('Joshua', 'laurich', 'gatau', 'laki-laki', 1, 1, 'caf1a3dfb505ffed0d024130f58c5cfa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`idGuru`),
  ADD KEY `userName` (`userName`),
  ADD KEY `idGuru` (`idGuru`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`idJadwal`),
  ADD KEY `idPelajaran` (`idPelajaran`);

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
-- Indexes for table `les`
--
ALTER TABLE `les`
  ADD PRIMARY KEY (`idLes`),
  ADD KEY `idJadwal` (`idJadwal`);

--
-- Indexes for table `murid`
--
ALTER TABLE `murid`
  ADD PRIMARY KEY (`idMurid`),
  ADD KEY `idMurid` (`idMurid`),
  ADD KEY `userName` (`userName`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`idPelajaran`);

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
  MODIFY `idGuru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `idJadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
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
-- AUTO_INCREMENT for table `les`
--
ALTER TABLE `les`
  MODIFY `idLes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `murid`
--
ALTER TABLE `murid`
  MODIFY `idMurid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `idPelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `idPelajaran` FOREIGN KEY (`idPelajaran`) REFERENCES `pelajaran` (`idPelajaran`);

--
-- Constraints for table `les`
--
ALTER TABLE `les`
  ADD CONSTRAINT `idJadwal` FOREIGN KEY (`idJadwal`) REFERENCES `jadwal` (`idJadwal`);

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
