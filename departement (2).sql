-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Ven 29 Avril 2016 à 00:01
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
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `numero` int(101) NOT NULL,
  KEY `numero` (`numero`)
) ENGINE=MyISAM DEFAULT CHARSET=latin7;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`nom`, `numero`) VALUES
('Ain', 1),
('Aisne', 2),
('Allier', 3),
('Alpes-de-Haute-Provence', 4),
('Hautes-Alpes', 5),
('Alpes-Maritimes', 6),
('ArdÞche', 7),
('Ardennes', 8),
('AriÞge', 9),
('Aube', 10),
('Aude', 11),
('Aveyron', 12),
('Bouches-du-Rh¶ne', 13),
('Calvados', 14),
('Cantal', 15),
('Charente', 16),
('Charente-Maritime', 17),
('Cher', 18),
('CorrÞze', 19),
('Corse', 20),
('C¶te-d''Or', 21),
('C¶tes d''Armor', 22),
('Creuse', 23),
('Dordogne', 24),
('Doubs', 25),
('Dr¶me', 26),
('Eure', 27),
('Eure-et-Loire', 28),
('FinistÞre', 29),
('Gard', 30),
('Haute-Garonne', 31),
('Gers', 32),
('Gironde', 33),
('HÚrault', 34),
('Ille-et-Vilaine', 35),
('Indre', 36),
('Indre-et-Loire', 37),
('IsÞre', 38),
('Jura', 39),
('Landes', 40),
('Loir-et-Cher', 41),
('Loire', 42),
('Haute-Loire', 43),
('Loire-Atlantique', 44),
('Loiret', 45),
('Lot', 46),
('Lot-et-Garonne', 47),
('LozÞre', 48),
('Maine-et-Loire', 49),
('Manche', 50),
('Marne', 51),
('Haute-Marne', 52),
('Mayenne', 53),
('Meurthe-et-Moselle', 54),
('Meuse', 55),
('Morbihan', 56),
('Moselle', 57),
('NiÞvre', 58),
('Nord', 59),
('Oise', 60),
('Orne', 61),
('Pas-de-Calais', 62),
('Puy-de-D¶me', 63),
('PyrÚnÚes-Atlantiques', 64),
('Hautes-PyrÚnÚes', 65),
('PyrÚnÚes-Orientales', 66),
('Bas-Rhin', 67),
('Haut-Rhin', 68),
('Rh¶ne', 69),
('Haute-Sa¶ne', 70),
('Sa¶ne-et-Loire', 71),
('Sarthe', 72),
('Savoie', 73),
('Haute-Savoie', 74),
('Paris', 75),
('Seine-Maritime', 76),
('Seine-et-Marne', 77),
('Yvelines', 78),
('Deux-SÞvres', 79),
('Somme', 80),
('Tarn', 81),
('Tarn-et-Garonne', 82),
('Var', 83),
('Vaucluse', 84),
('VendÚe', 85),
('Vienne', 86),
('Haute-Vienne', 87),
('Vosges', 88),
('Yonne', 89),
('Territoire de Belfort', 90),
('Essonne', 91),
('Hauts-de-Seine', 92),
('Seine-Saint-Denis', 93),
('Val-de-Marne', 94),
('Val-d''Oise', 95),
('Guadeloupe', 971),
('Martinique', 972),
('Guyane', 973),
('La RÚunion', 974),
('Mayotte', 976);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
