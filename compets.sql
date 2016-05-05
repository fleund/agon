-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Mai 2016 à 20:27
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

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
-- Structure de la table `compets`
--

DROP TABLE IF EXISTS `compets`;
CREATE TABLE IF NOT EXISTS `compets` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(150) NOT NULL,
  `groupe` varchar(50) NOT NULL,
  `sport` varchar(50) NOT NULL,
  `places_restantes` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nom` (`nom`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin7;

--
-- Contenu de la table `compets`
--

INSERT INTO `compets` (`ID`, `nom`, `date`, `lieu`, `groupe`, `sport`, `places_restantes`) VALUES
(1, 'sdfsdfsd', '2016-05-10', 'dsfsdf', 'sdfsdf', '', 2000),
(2, 'dfsfsd', '2016-05-10', 'dsfsdf', 'sdfdfs', '', 2000),
(3, 'sdfdsfs', '2016-05-20', 'sfddsfd', 'sdfsdf', '', 300),
(4, 'fdssf', '2016-05-18', 'sdfsd', 'sdfsdf', '', 22),
(5, 'dfdsf', '2016-05-19', 'sdfsdfsdfsdf', 'sdfsdfs', 'Basketball', 21);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
