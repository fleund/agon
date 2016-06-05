-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2016 at 11:55 PM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agon`
--

-- --------------------------------------------------------

--
-- Table structure for table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `sport` varchar(80) NOT NULL,
  `statut` varchar(6) NOT NULL,
  `departement` varchar(80) NOT NULL,
  `image` text NOT NULL,
  `inscrits` int(11) NOT NULL,
  `membres_max` int(11) NOT NULL,
  `id_leader` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `sport`, `statut`, `departement`, `image`, `inscrits`, `membres_max`, `id_leader`) VALUES
(1, 'Groupe de natation d''Évry', 'Groupe de natation qui organise régulièrement des compétitions de natation pour les jeunes de 14 à 18 ans. ', 'Natation', '', '91 - Essonne', '', 5, 40, 137),
(2, 'Groupe de foot de l''Essonne', 'Groupe de football qui organise régulièrement des matches pour les jeunes de 12 à 16 ans. ', 'Football', '', '91 - Essonne', '', 10, 50, 0),
(3, 'Natation Bobigny', '', 'Natation', '', '93 - Seine-Saint-Denis', '', 8, 50, 0),
(4, 'Courir à Saint-Denis', '', 'Footing', '', '93 - Seine-Saint-Denis', '', 38, 40, 0),
(5, 'Cothenet', 'azerty', 'Athlétisme', 'Privé', '02 - Aisne', 'http://img11.hostingpics.net/pics/356018groupejabbericone6297961.png', 1, 200, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
