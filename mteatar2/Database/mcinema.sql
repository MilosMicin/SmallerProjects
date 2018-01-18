-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2018 at 10:54 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mcinema`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`id_admin` int(11) NOT NULL,
  `naziv_admin` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `vreme_rada` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_uloga` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `naziv_admin`, `lozinka`, `email`, `vreme_rada`, `id_uloga`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@test.com', '2017-03-13 23:00:00', 1),
(2, 'korisnik', '716b64c0f6bad9ac405aab3f00958dd1', 'korisnik@test.com', '2017-03-13 23:00:00', 2),
(3, 'marko', 'c28aa76990994587b0e907683792297c', 'marko@test.com', '2017-03-13 23:00:00', 2),
(7, 'pera', 'd8795f0d07280328f80e59b1e8414c49', 'pera@gmail.com', '2017-03-14 17:17:01', 2),
(10, 'zika', '300aabd4e3e0f7db7c76ae50e370d96f', 'zika@snail.com', '2017-03-13 23:00:00', 2),
(11, 'pericaa', 'd17249b67839effab5abdd6a28ae6988', 'pericaa@gmail.com', '2017-03-14 17:17:24', 0),
(12, 'jovica', '48073418e34760a5dd2de9be2efae468', 'jovica@gmail.com', '2017-03-14 17:17:35', 0);

-- --------------------------------------------------------

--
-- Table structure for table `anketa`
--

CREATE TABLE IF NOT EXISTS `anketa` (
`id_anketa` int(11) NOT NULL,
  `pitanje` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `aktivna` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `anketa`
--

INSERT INTO `anketa` (`id_anketa`, `pitanje`, `aktivna`) VALUES
(1, 'Svidja li vam se sajt?', 1),
(2, 'Svidja li vam se dizajn', 0),
(3, 'Neka drugo pitanje', 0);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE IF NOT EXISTS `korisnik` (
`id_korisnik` int(11) NOT NULL,
  `ime` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `id_pozoriste` int(11) NOT NULL,
  `id_predstava` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id_korisnik`, `ime`, `email`, `id_pozoriste`, `id_predstava`) VALUES
(0, 'Djuro', 'djuro@test.com', 2, 5),
(2, 'Marina', 'marina@test.com', 1, 4),
(3, 'Jovica', 'Jovic', 1, 4),
(6, 'korisnik', 'korisnik@test.com', 2, 5),
(9, 'korisnik', 'korisnik@test.com', 0, 0),
(10, 'korisnik', 'korisnik@test.com', 0, 0),
(11, 'korisnik', 'korisnik@test.com', 0, 0),
(12, 'korisnik', 'korisnik@test.com', 1, 7),
(13, 'korisnik', 'korisnik@test.com', 4, 15),
(14, 'korisnik', 'korisnik@test.com', 3, 13);

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE IF NOT EXISTS `meni` (
`id_meni` int(11) NOT NULL,
  `naziv` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `putanja` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`id_meni`, `naziv`, `putanja`) VALUES
(1, 'Pocetna', 'pocetna'),
(2, 'Rezervacija', 'pocetna/rezervacije'),
(3, 'Repertoar', 'pocetna/repertoar');

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE IF NOT EXISTS `odgovori` (
`id_odgovori` int(11) NOT NULL,
  `id_anketa` int(11) NOT NULL,
  `odgovori` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id_odgovori`, `id_anketa`, `odgovori`) VALUES
(1, 1, 'Da'),
(2, 1, 'Ne');

-- --------------------------------------------------------

--
-- Table structure for table `poziriste`
--

CREATE TABLE IF NOT EXISTS `poziriste` (
`id_pozoriste` int(11) NOT NULL,
  `naziv_pozoriste` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `poziriste`
--

INSERT INTO `poziriste` (`id_pozoriste`, `naziv_pozoriste`) VALUES
(1, 'Srpsko narodno pozoriste'),
(2, 'Atelje 212'),
(3, 'Pozoriste na terazijama'),
(4, 'Pozoriste Bosko Buhaa');

-- --------------------------------------------------------

--
-- Table structure for table `predstava`
--

CREATE TABLE IF NOT EXISTS `predstava` (
`id_predstava` int(11) NOT NULL,
  `naziv_predstava` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `opis` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `slika` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_pozoriste` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `predstava`
--

INSERT INTO `predstava` (`id_predstava`, `naziv_predstava`, `opis`, `slika`, `id_pozoriste`) VALUES
(4, 'Autobiografija', '<p>Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava Ovo je jedna lepa predstava</p>', 'images/predstave/autobiografij.jpg', 1),
(5, 'Bog nas pogledo', '<p>Bog nas pogledo Bog nas pogledo Bog nas pogledo Bog nas pogledo Bog nas pogledo Bog nas pogledo Bog nas pogledo Bog nas pogledo Bog nas pogledo</p>', 'images/predstave/bog-nas-pogledo.jpg', 2),
(7, 'Bogojavljenska noc', 'Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc Bogojavljenska noc', 'images/predstave/predstava-bogojavljenska-noc.jpg', 1),
(8, 'Dragi moj lazljivce', 'Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivcev Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce Dragi moj lazljivce', 'images/predstave/predstava-dragi-moj-lazljivce.jpg', 1),
(9, 'Galeb', 'Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava Galeb je jako lepa predstava', 'images/predstave/predstava-galeb.jpg', 2),
(12, 'Gospodja ministarka', 'Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka Gospodja ministarka', 'images/predstave/predstava-gospodja-ministarka.jpg', 3),
(13, 'Ivona', 'Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstavaIvona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava Ivona je jedna jako lepa predstava', 'images/predstave/predstava-ivona.jpg', 3),
(14, 'Mizantrop', 'Opis ove predstave nepostoji', 'images/predstave/predstava-mizantrop.jpg', 1),
(15, 'KKK', 'KKKKKKKKKKKKKKKKKKKKK', 'images/predstave/Penguins.jpg', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rezultat`
--

CREATE TABLE IF NOT EXISTS `rezultat` (
`id_rezultat` int(11) NOT NULL,
  `id_anketa` int(11) NOT NULL,
  `id_odgovor` int(11) NOT NULL,
  `rezultat` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `rezultat`
--

INSERT INTO `rezultat` (`id_rezultat`, `id_anketa`, `id_odgovor`, `rezultat`) VALUES
(1, 1, 1, 2),
(3, 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `uloga`
--

CREATE TABLE IF NOT EXISTS `uloga` (
`id_uloga` int(11) NOT NULL,
  `naziv_uloga` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloga`
--

INSERT INTO `uloga` (`id_uloga`, `naziv_uloga`) VALUES
(1, 'admin'),
(2, 'korisnik');

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
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
 ADD PRIMARY KEY (`id_korisnik`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
 ADD PRIMARY KEY (`id_meni`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
 ADD PRIMARY KEY (`id_odgovori`);

--
-- Indexes for table `poziriste`
--
ALTER TABLE `poziriste`
 ADD PRIMARY KEY (`id_pozoriste`);

--
-- Indexes for table `predstava`
--
ALTER TABLE `predstava`
 ADD PRIMARY KEY (`id_predstava`);

--
-- Indexes for table `rezultat`
--
ALTER TABLE `rezultat`
 ADD PRIMARY KEY (`id_rezultat`);

--
-- Indexes for table `uloga`
--
ALTER TABLE `uloga`
 ADD PRIMARY KEY (`id_uloga`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `anketa`
--
ALTER TABLE `anketa`
MODIFY `id_anketa` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
MODIFY `id_korisnik` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
MODIFY `id_meni` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
MODIFY `id_odgovori` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `poziriste`
--
ALTER TABLE `poziriste`
MODIFY `id_pozoriste` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `predstava`
--
ALTER TABLE `predstava`
MODIFY `id_predstava` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rezultat`
--
ALTER TABLE `rezultat`
MODIFY `id_rezultat` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `uloga`
--
ALTER TABLE `uloga`
MODIFY `id_uloga` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
