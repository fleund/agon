-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 31 Mai 2016 à 21:25
-- Version du serveur: 5.5.24-log
-- Version de PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `agon`
--

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

CREATE TABLE IF NOT EXISTS `inscrit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `date_naissance` date NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `mdp` varchar(40) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `nombre_groupe` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  `id_groupe` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=120 ;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `date_naissance`, `sexe`, `departement`, `email`, `mdp`, `sport`, `nombre_groupe`, `date_inscription`, `id_groupe`) VALUES
(1, 'dupont', 'pierrre', '1960-09-07', 'M', 'Lin', 'pierred@gmail;com', 'perroquet', 'football', 0, '0000-00-00', 0),
(2, 'piero', 'pierrre', '1960-09-10', 'M', 'Lin', 'ppo@hotmail.com', 'potoo', 'Basket-ball', 3, '2016-05-01', 0),
(3, 'popo', 'pierrre', '1960-09-07', 'M', 'Lin', 'popodu97@hotmail.com', 'perroquet', 'tennis', 1, '2015-05-25', 4);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
