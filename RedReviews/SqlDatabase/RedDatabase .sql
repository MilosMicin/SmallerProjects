-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2015 at 02:25 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `baza`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(10) NOT NULL,
  `admin_user` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `admin_pass` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `uloga` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_user`, `admin_pass`, `uloga`) VALUES
(1, 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
`id_anketa` int(10) NOT NULL,
  `broj_ocena` int(10) NOT NULL,
  `zbir_ocena` int(10) NOT NULL,
  `$prosek` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `broj_ocena`, `zbir_ocena`, `$prosek`) VALUES
(1, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `galerija`
--

CREATE TABLE IF NOT EXISTS `galerija` (
`id_galerija` int(10) NOT NULL,
  `naziv_galerije` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galerija`
--

INSERT INTO `galerija` (`id_galerija`, `naziv_galerije`) VALUES
(1, 'Samsung Galaxy S6'),
(2, 'Samsung Galaxy Edge'),
(3, 'Apple iPhone 6'),
(4, 'Nokia Lumia 920'),
(5, 'Sony Experya Z1');

-- --------------------------------------------------------

--
-- Table structure for table `linkovi`
--

CREATE TABLE IF NOT EXISTS `linkovi` (
`id_link` int(5) NOT NULL,
  `link_ime` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link_putanja` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `link_roditelj` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `linkovi`
--

INSERT INTO `linkovi` (`id_link`, `link_ime`, `link_putanja`, `link_roditelj`) VALUES
(1, 'FORMULAR', 'forma.php', 0),
(2, 'REGISTRACIJA', 'registracija.php', 0),
(3, 'LOGOVANJE', 'logovanje.php', 0),
(4, 'ANKETA', 'anketa.php', 0),
(5, 'GALERIJA', 'galerija.php', 0);

-- --------------------------------------------------------

--
-- Table structure for table `linkovi2`
--

CREATE TABLE IF NOT EXISTS `linkovi2` (
`id_link2` int(10) NOT NULL,
  `link2_ime` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link2_putanja` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link2_dogadjaj` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link2_roditelj` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `linkovi2`
--

INSERT INTO `linkovi2` (`id_link2`, `link2_ime`, `link2_putanja`, `link2_dogadjaj`, `link2_roditelj`) VALUES
(1, 'Samsung Galaxy S6', '#', '"telefon1(this.value);"', 0),
(2, 'Samsung Galaxy Edge', '#', 'telefon2(this.value);', 0),
(3, 'Apple iPhone 6', '#', 'telefon3(this.value);', 0),
(4, 'Nokia Lumia 920', '#', 'telefon4(this.value);', 0),
(5, 'Sony Experia Z1', '#', 'telefon5(this.value);', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE IF NOT EXISTS `marka` (
`id_marka` int(5) NOT NULL,
  `ime_marke` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marka`
--

INSERT INTO `marka` (`id_marka`, `ime_marke`) VALUES
(1, 'Apple'),
(2, 'LG'),
(3, 'Nokia'),
(4, 'Samsung'),
(5, 'Sony');

-- --------------------------------------------------------

--
-- Table structure for table `prijava`
--

CREATE TABLE IF NOT EXISTS `prijava` (
`id_forma` int(5) NOT NULL,
  `ime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pol` int(1) NOT NULL,
  `marka` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prijava`
--

INSERT INTO `prijava` (`id_forma`, `ime`, `prezime`, `mail`, `pol`, `marka`) VALUES
(1, 'Milos', 'Micin', 'milos@gmail.com', 0, '3'),
(2, 'Milos', 'Micin', 'milos@gmail.com', 0, '5');

-- --------------------------------------------------------

--
-- Table structure for table `registracija`
--

CREATE TABLE IF NOT EXISTS `registracija` (
`id_registracija` int(10) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `registracija`
--

INSERT INTO `registracija` (`id_registracija`, `username`, `password`) VALUES
(1, 'milos', 'milos'),
(2, 'milos', 'milos');

-- --------------------------------------------------------

--
-- Table structure for table `slika`
--

CREATE TABLE IF NOT EXISTS `slika` (
`id_slike` int(10) NOT NULL,
  `id_galerija` int(10) NOT NULL,
  `naziv` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fajl` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slika`
--

INSERT INTO `slika` (`id_slike`, `id_galerija`, `naziv`, `fajl`) VALUES
(1, 1, '', '1.jpg'),
(2, 1, '', '4.jpg'),
(3, 1, '', '9.jpg'),
(4, 1, '', '13.jpg'),
(5, 1, '', '26.jpg'),
(6, 1, '', '28.jpg'),
(7, 1, '', '30.jpg'),
(8, 1, '', '34.jpg'),
(9, 2, '', '1 (1).jpg'),
(10, 2, '', '3.jpg'),
(11, 2, '', '5.jpg'),
(12, 2, '', '14.jpg'),
(13, 2, '', '26.jpg'),
(14, 2, '', '30.jpg'),
(15, 2, '', '31.jpg'),
(16, 2, '', '38.jpg'),
(17, 3, '', '1.jpg'),
(18, 3, '', '13.jpg'),
(19, 3, '', '21.jpg'),
(20, 3, '', '25.jpg'),
(21, 3, '', '52.jpg'),
(22, 3, '', '56.jpg'),
(23, 3, '', '57.jpg'),
(24, 3, '', '64.jpg'),
(25, 4, '', '1 (1).jpg'),
(26, 4, '', '2.jpg'),
(27, 4, '', '3.jpg'),
(28, 4, '', '10.jpg'),
(29, 4, '', '14.jpg'),
(30, 4, '', '17.jpg'),
(31, 4, '', '18.jpg'),
(32, 5, '', '1.jpg'),
(33, 5, '', '2.jpg'),
(34, 5, '', '3.jpg'),
(35, 5, '', '4.jpg'),
(36, 5, '', '5.jpg'),
(37, 5, '', '9.jpg'),
(38, 5, '', '12.jpg'),
(39, 5, '', '13.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anketa`
--
ALTER TABLE `anketa`
 ADD PRIMARY KEY (`id_anketa`);

--
-- Indexes for table `galerija`
--
ALTER TABLE `galerija`
 ADD PRIMARY KEY (`id_galerija`);

--
-- Indexes for table `linkovi`
--
ALTER TABLE `linkovi`
 ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `linkovi2`
--
ALTER TABLE `linkovi2`
 ADD PRIMARY KEY (`id_link2`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
 ADD PRIMARY KEY (`id_marka`);

--
-- Indexes for table `prijava`
--
ALTER TABLE `prijava`
 ADD PRIMARY KEY (`id_forma`);

--
-- Indexes for table `registracija`
--
ALTER TABLE `registracija`
 ADD PRIMARY KEY (`id_registracija`);

--
-- Indexes for table `slika`
--
ALTER TABLE `slika`
 ADD PRIMARY KEY (`id_slike`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
MODIFY `id_anketa` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `galerija`
--
ALTER TABLE `galerija`
MODIFY `id_galerija` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `linkovi`
--
ALTER TABLE `linkovi`
MODIFY `id_link` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `linkovi2`
--
ALTER TABLE `linkovi2`
MODIFY `id_link2` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
MODIFY `id_marka` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `prijava`
--
ALTER TABLE `prijava`
MODIFY `id_forma` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `registracija`
--
ALTER TABLE `registracija`
MODIFY `id_registracija` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slika`
--
ALTER TABLE `slika`
MODIFY `id_slike` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
