-- A IMPORTER DEPUIS PHPMYADMIN


-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 05 Mai 2016 à 20:20
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
  `ID` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `departement` varchar(255) NOT NULL,
  `groupe` varchar(255) NOT NULL,
  `places_restantes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_compets`
--

INSERT INTO `liste_compets` (`ID`, `nom`, `sport`, `date`, `departement`, `groupe`, `places_restantes`) VALUES
(1, 'Coupe de foot', 'Football', '2016-05-18', 'Essonne', 'Groupe de foot de l''Essonne', 1),
(2, 'Tournoi de Badminton', 'Badminton', '2016-06-01', 'Moselle', 'Club de badminton de Metz', 7),
(3, 'Compétition annuelle de pétanque de Marseille', '', '2016-05-20', 'Bouches-du-Rhône', 'Les fanas de pétanque', 3),
(4, 'Marathon de Paris', 'Marathon', '2016-06-10', 'Paris', 'Groupe officiel des marathoniens de Paris', 58),
(5, '', '', '0000-00-00', '', '', 0),
(6, '', '', '0000-00-00', '', '', 0),
(7, '', '', '0000-00-00', '', '', 0),
(8, '', '', '0000-00-00', '', '', 0),
(9, '', '', '0000-00-00', '', '', 0),
(10, '', '', '0000-00-00', '', '', 0),
(11, '', '', '0000-00-00', '', '', 0),
(12, '', '', '0000-00-00', '', '', 0),
(13, '', '', '0000-00-00', '', '', 0),
(14, '', '', '0000-00-00', '', '', 0),
(15, '', '', '0000-00-00', '', '', 0),
(16, '', '', '0000-00-00', '', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
