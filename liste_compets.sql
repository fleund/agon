-- A IMPORTER DEPUIS PHPMYADMIN


-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 28 Avril 2016 à 23:48
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
-- Structure de la table `liste_compets`
--

DROP TABLE IF EXISTS `liste_compets`;
CREATE TABLE IF NOT EXISTS `liste_compets` (
  `nom` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_compets`
--

INSERT INTO `liste_compets` (`nom`, `ID`) VALUES
('', 1),
('', 2),
('', 3),
('', 4),
('', 5),
('', 6),
('', 7),
('', 8),
('', 9),
('', 10),
('', 11),
('', 12),
('', 13),
('', 14),
('', 15),
('', 16);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
