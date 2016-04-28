-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 28 Avril 2016 à 23:50
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
-- Structure de la table `sports_en_tete`
--

DROP TABLE IF EXISTS `sports_en_tete`;
CREATE TABLE IF NOT EXISTS `sports_en_tete` (
  `nom` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `sports_en_tete`
--

INSERT INTO `sports_en_tete` (`nom`, `ID`) VALUES
('Football', 1),
('Basketball', 2),
('Volleyball', 3),
('Rugby', 4),
('Footing', 5),
('Badminton', 6),
('Judo', 7),
('Boxe', 8),
('Karaté', 9),
('Natation', 10),
('Athlétisme', 11),
('Marche', 12),
('Handball', 13),
('Hockey', 14),
('Golf', 15),
('Danse', 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
