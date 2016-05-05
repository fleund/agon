-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Mai 2016 à 20:19
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `agon`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `descriptif` text NOT NULL,
  `sport` varchar(80) NOT NULL,
  `departement` varchar(80) NOT NULL,
  `clubs` text NOT NULL,
  `photo` text NOT NULL,
  `planning` text NOT NULL,
  `participants` int(11) NOT NULL,
  `participants_max` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `descriptif`, `sport`, `departement`, `clubs`, `photo`, `planning`, `participants`, `participants_max`) VALUES
(1, 'Club de natation d''Évry', 'Groupe de natation qui organise régulièrement des compétitions de natation pour les jeunes de 14 à 18 ans. ', 'Natation', 'Essonne', '', '', '', 5, 40),
(2, 'Groupe de foot de l''Essonne', 'Groupe de football qui organise régulièrement des matches pour les jeunes de 12 à 16 ans. ', 'Football', 'Essonne', '', '', '', 10, 50),
(3, 'Natation Bobigny', '', 'Natation', 'Seine-Saint-Denis', '', '', '', 8, 50),
(4, 'Courir à Saint-Denis', '', 'Footing', 'Seine-Saint-Denis', '', '', '', 38, 40);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
