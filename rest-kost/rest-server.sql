-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2020 at 07:29 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rest-server`
--

-- --------------------------------------------------------

--
-- Table structure for table `kost`
--

CREATE TABLE `kost` (
  `idkost` int(10) NOT NULL,
  `harga` int(20) NOT NULL,
  `keterangan` enum('Sold','Available','','') NOT NULL,
  `gambar` text NOT NULL,
  `namakost` varchar(225) NOT NULL,
  `kota` enum('Yogyakarta','Malang','Jakarta','Surabaya','Bandung') NOT NULL,
  `type` enum('Mahasiswa','Keluarga','Eksklusif','Wanita') NOT NULL,
  `Alamat` varchar(125) NOT NULL,
  `kecamatan` varchar(20) NOT NULL,
  `diskripsi` text NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kost`
--

INSERT INTO `kost` (`idkost`, `harga`, `keterangan`, `gambar`, `namakost`, `kota`, `type`, `Alamat`, `kecamatan`, `diskripsi`, `fasilitas`) VALUES
(0, 800000, 'Sold', 'Kost_Jenaka_Wanita_JW1.jpg', 'Kost Jenaka Wanita JW1', 'Yogyakarta', 'Mahasiswa', 'Jl senowangu', 'Jambitan', 'sdasdas', 'KMD,KD,KASUR,AC,WIFI,,,'),
(11, 1200000, 'Sold', 'Kost_Sabirin_Eksklusif_S1.jpg', 'Kost Sabirin Eksklusif S1', 'Yogyakarta', 'Eksklusif', 'Jl Senoparti', 'Banguntapan', 'Kos yang sangat strategis, dekat dengan : Universitas Gadjah Mada (2.6 km) • Universitas Negri Yogyakarta (3.0 km) • Universitas Sanata Dharma (3.7 km) • Universitas Teknologi Yogyakarya (4.5 km) • RSUP Dr. Sardjito (210 m) • RSU Sakina Idaman (2.1 km) • RSGM Prof. Soedomo (1.6 km) • RS Panti Rapih (2.8 km) • RS Bethesda Yogyakarta (4.1 km) • Jogja Internasional Hospital (4.9 km) • Mirota Kampus Simanjuntak (2.7 km) • Jogja City Mall (3.2 km) • Apotek UGM (2.7 km) • Radio Swaragama fm (2.1 km) • Pos Polisi Bulaksumur (1.7 km) • Gramedia Sudirman (3.4 km) • Monumen Jogja Kembali (4.4 km)', 'AC,TV,WIFI,LOUNDRY'),
(12, 1300000, 'Sold', 'Kost_Sabirin_Eksklusif_S2.jpg', 'Kost Sabirin Eksklusif S2', 'Malang', 'Eksklusif', 'Malang', 'Malang', 'Malang', ',,,,,,,'),
(13, 1300000, 'Sold', 'Kost_Sabirin_Eksklusif_S3_.jpg', 'Kost Sabirin Eksklusif S3	', 'Yogyakarta', 'Eksklusif', 'Jl Margomulyo no 10', 'Sleman', 'Kos yang sangat strategis, dekat dengan : Universitas Gadjah Mada (2.6 km) • Universitas Negri Yogyakarta (3.0 km) • Universitas Sanata Dharma (3.7 km) • Universitas Teknologi Yogyakarya (4.5 km) • RSUP Dr. Sardjito (210 m) • RSU Sakina Idaman (2.1 km) • RSGM Prof. Soedomo (1.6 km) • RS Panti Rapih (2.8 km) • RS Bethesda Yogyakarta (4.1 km) • Jogja Internasional Hospital (4.9 km) • Mirota Kampus Simanjuntak (2.7 km) • Jogja City Mall (3.2 km) • Apotek UGM (2.7 km) • Radio Swaragama fm (2.1 km) • Pos Polisi Bulaksumur (1.7 km) • Gramedia Sudirman (3.4 km) • Monumen Jogja Kembali (4.4 km) ', 'KMD,KD,KASUR,AC,WIFI,24JAM,LOUNDRY,TV'),
(14, 1200000, 'Available', 'Kost_Sabirin_Eksklusif_S1_.jpg', 'Kost Sabirin Eksklusif S1		', 'Yogyakarta', 'Eksklusif', 'hgjhlkgq', 'fhjkfgjh', 'gvhjkl,g', 'KMD,,KASUR,AC,WIFI,,LOUNDRY,'),
(16, 800000, 'Sold', 'Kost_Mawar_Wanita_M1_Yogya.jpg', 'Kost Mawar Wanita M1 Yogya', 'Yogyakarta', 'Mahasiswa', 'Jl senowangu', 'Jambitan', 'sadasdsad', ',,KASUR,AC,WIFI,,LOUNDRY,TV'),
(18, 2000000, 'Available', 'Kost_Mewah_Platinum.jpg', 'Kost Mewah Platinum', 'Jakarta', 'Eksklusif', 'Jl senowangu', 'Jakarta utara', 'Dekat warung dekat mol dekat pantai', 'KMD,KD,KASUR,AC,WIFI,24JAM,LOUNDRY,TV');

-- --------------------------------------------------------

--
-- Table structure for table `sewa`
--

CREATE TABLE `sewa` (
  `id` int(11) NOT NULL,
  `idkost` int(11) NOT NULL,
  `idsewa` int(11) NOT NULL,
  `cekin` date NOT NULL,
  `cekout` date NOT NULL,
  `kekurangan` int(20) NOT NULL,
  `kelebihan` int(20) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sewa`
--

INSERT INTO `sewa` (`id`, `idkost`, `idsewa`, `cekin`, `cekout`, `kekurangan`, `kelebihan`, `total`) VALUES
(2, 11, 1, '2020-03-24', '2020-04-24', 400000, 0, 800000),
(1, 13, 2, '2020-03-24', '2020-04-24', 0, 0, 1300000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `nama`, `alamat`, `jenis_kelamin`, `role_id`) VALUES
(1, 'bnagantara', 'saddan11', 's bima nagantara', 'rejokusuman, tamanan, banguntapan', 'L', 2),
(2, 'agungdp', 'agung123', 'Agung Dwi Cahyo', 'Jl margangsan No 100', 'L', 2),
(3, 'admin', 'admin123', 'admin', '', 'L', 1),
(4, 'birowo', '123', 'birowo', '', 'P', 2),
(5, 'bagus', 'bagus123', 'bagus', '', 'L', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kost`
--
ALTER TABLE `kost`
  ADD PRIMARY KEY (`idkost`);

--
-- Indexes for table `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`idsewa`),
  ADD KEY `username` (`id`,`idkost`),
  ADD KEY `idkost` (`idkost`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kost`
--
ALTER TABLE `kost`
  MODIFY `idkost` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `sewa`
--
ALTER TABLE `sewa`
  MODIFY `idsewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sewa`
--
ALTER TABLE `sewa`
  ADD CONSTRAINT `sewa_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `sewa_ibfk_2` FOREIGN KEY (`idkost`) REFERENCES `kost` (`idkost`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
