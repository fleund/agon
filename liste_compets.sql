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
-- Structure de la table `liste_compets`
--

DROP TABLE IF EXISTS `liste_compets`;
CREATE TABLE IF NOT EXISTS `liste_compets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `lieu` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  `places_total` int(11) NOT NULL,
  `inscrits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_compets`
--

INSERT INTO `liste_compets` (`id`, `nom`, `sport`, `date`, `lieu`, `departement`, `groupe`, `places_total`, `inscrits`) VALUES
(1, 'Coupe de foot', 'Football', '2016-05-18', 'Terrain de football de Wissous', '91 - Essonne', 'groupe', 50, 0),
(2, 'Tournoi de Badminton', 'Badminton', '2016-06-01', 'Club de badminton de Metz', '57 - Moselle', 'groupe', 35, 0),
(3, 'Compétition annuelle de pétanque de Marseille', 'Pétanque', '2016-05-20', 'Terrain de pétanque de la calanque de Morgiou', '13 - Bouches-du-Rhône', 'groupe', 20, 0),
(4, 'Marathon de Paris', 'Marathon', '2017-04-09', 'Départ : avenue des Champs Élysées', '75 - Paris', 'groupe', 50000, 0),
(5, 'a', 'Athlétisme', '1999-01-01', 'a', '01 - Ain', 'groupe', 50, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
