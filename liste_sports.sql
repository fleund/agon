-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 30 Mai 2016 à 14:25
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
-- Structure de la table `liste_sports`
--

DROP TABLE IF EXISTS `liste_sports`;
CREATE TABLE IF NOT EXISTS `liste_sports` (
  `nom` varchar(255) NOT NULL,
  `nb_membres` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_sports`
--

INSERT INTO `liste_sports` (`nom`, `nb_membres`) VALUES
('Football', 24),
('Volleyball', 5),
('Rugby', 8),
('Footing', 10),
('Pétanque', 2),
('Judo', 4),
('Boxe', 3),
('Karaté', 2),
('Natation', 16),
('Marche', 4),
('Basketball', 15),
('Handball', 12),
('Hockey', 1),
('Golf', 0),
('Badminton', 10),
('Athlétisme', 39),
('Water-polo', 3),
('Marathon', 9),
('Course à pied', 12),
('Danse', 6);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
