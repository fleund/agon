-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Juin 2016 à 21:51
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
-- Structure de la table `topic`
--

DROP TABLE IF EXISTS `topic`;
CREATE TABLE IF NOT EXISTS `topic` (
  `nom_topic` varchar(50) NOT NULL,
  `description_topic` text NOT NULL,
  `sport` varchar(50) NOT NULL,
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `date_last_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prenom_auteur` varchar(50) CHARACTER SET utf8 NOT NULL,
  `nom_auteur` varchar(100) NOT NULL,
  `premier_message` text NOT NULL,
  `nombre_reponses` int(11) NOT NULL DEFAULT '0',
  `id_auteur` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin7;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
