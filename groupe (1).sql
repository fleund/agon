-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- GÃ©nÃ©rÃ© le :  Mar 03 Mai 2016 Ã  14:11
-- Version du serveur :  5.7.9
-- Version de PHP :  5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de donnÃ©es :  `agon`
--

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `nom_groupe` varchar(50) NOT NULL,
  `description_groupe` text,
  `nombre_max_membres` int(11) NOT NULL DEFAULT '100',
  `statut` varchar(6) NOT NULL DEFAULT 'public' COMMENT 'public=0 privÃ©=1',
  `image_groupe` varchar(100) DEFAULT NULL COMMENT 'lien de l''image du groupe',
  `id_groupe` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_groupe`),
  UNIQUE KEY `nom_groupe` (`nom_groupe`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin7;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`nom_groupe`, `description_groupe`, `nombre_max_membres`, `statut`, `image_groupe`, `id_groupe`) VALUES
('nom ici', 'Description du groupe ici ', 140, 'public', NULL, 1),
('nom groupe privÃ© 2', 'ici c''est un groupe privÃ©', 25, 'prive', NULL, 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

