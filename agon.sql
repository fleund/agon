-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 31 Mai 2016 à 23:35
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
-- Structure de la table `clubs`
--

DROP TABLE IF EXISTS `clubs`;
CREATE TABLE IF NOT EXISTS `clubs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `sport` varchar(255) NOT NULL,
  `departement` varchar(255) NOT NULL,
  `inscrits` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `clubs`
--

INSERT INTO `clubs` (`id`, `nom`, `sport`, `departement`, `inscrits`) VALUES
(1, 'Club', 'Football', '91 - Essonne', 12),
(2, 'Club', 'Basketball', '92 - Hauts-de-Seine', 5),
(3, 'Club', 'Golf', '01 - Ain', 10),
(4, 'Club', 'Natation', '75 - Paris', 0);

-- --------------------------------------------------------

--
-- Structure de la table `departement`
--

DROP TABLE IF EXISTS `departement`;
CREATE TABLE IF NOT EXISTS `departement` (
  `nom` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  KEY `numero` (`numero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `departement`
--

INSERT INTO `departement` (`nom`, `numero`) VALUES
('Ain', '01'),
('Aisne', '02'),
('Allier', '03'),
('Alpes-de-Haute-Provence', '04'),
('Hautes-Alpes', '05'),
('Alpes-Maritimes', '06'),
('Ardèche', '07'),
('Ardennes', '08'),
('Ariège', '09'),
('Aube', '10'),
('Aude', '11'),
('Aveyron', '12'),
('Bouches-du-Rhône', '13'),
('Calvados', '14'),
('Cantal', '15'),
('Charente', '16'),
('Charente-Maritime', '17'),
('Cher', '18'),
('Corrèze', '19'),
('Corse', '20'),
('Côte-d''Or', '21'),
('Côtes d''Armor', '22'),
('Creuse', '23'),
('Dordogne', '24'),
('Doubs', '25'),
('Drôme', '26'),
('Eure', '27'),
('Eure-et-Loire', '28'),
('Finistère', '29'),
('Gard', '30'),
('Haute-Garonne', '31'),
('Gers', '32'),
('Gironde', '33'),
('Hérault', '34'),
('Ille-et-Vilaine', '35'),
('Indre', '36'),
('Indre-et-Loire', '37'),
('Isère', '38'),
('Jura', '39'),
('Landes', '40'),
('Loir-et-Cher', '41'),
('Loire', '42'),
('Haute-Loire', '43'),
('Loire-Atlantique', '44'),
('Loiret', '45'),
('Lot', '46'),
('Lot-et-Garonne', '47'),
('Lozère', '48'),
('Maine-et-Loire', '49'),
('Manche', '50'),
('Marne', '51'),
('Haute-Marne', '52'),
('Mayenne', '53'),
('Meurthe-et-Moselle', '54'),
('Meuse', '55'),
('Morbihan', '56'),
('Moselle', '57'),
('Nièvre', '58'),
('Nord', '59'),
('Oise', '60'),
('Orne', '61'),
('Pas-de-Calais', '62'),
('Puy-de-Dôme', '63'),
('Pyrénées-Atlantiques', '64'),
('Hautes-Pyrénées', '65'),
('Pyrénées-Orientales', '66'),
('Bas-Rhin', '67'),
('Haut-Rhin', '68'),
('Rhône', '69'),
('Haute-Saône', '70'),
('Saône-et-Loire', '71'),
('Sarthe', '72'),
('Savoie', '73'),
('Haute-Savoie', '74'),
('Paris', '75'),
('Seine-Maritime', '76'),
('Seine-et-Marne', '77'),
('Yvelines', '78'),
('Deux-Sèvres', '79'),
('Somme', '80'),
('Tarn', '81'),
('Tarn-et-Garonne', '82'),
('Var', '83'),
('Vaucluse', '84'),
('Vendée', '85'),
('Vienne', '86'),
('Haute-Vienne', '87'),
('Vosges', '88'),
('Yonne', '89'),
('Territoire de Belfort', '90'),
('Essonne', '91'),
('Hauts-de-Seine', '92'),
('Seine-Saint-Denis', '93'),
('Val-de-Marne', '94'),
('Val-d''Oise', '95'),
('Guadeloupe', '971'),
('Martinique', '972'),
('Guyane', '973'),
('La Réunion', '974'),
('Mayotte', '976');

-- --------------------------------------------------------

--
-- Structure de la table `groupe`
--

DROP TABLE IF EXISTS `groupe`;
CREATE TABLE IF NOT EXISTS `groupe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(80) NOT NULL,
  `description` text NOT NULL,
  `sport` varchar(80) NOT NULL,
  `statut` varchar(6) NOT NULL,
  `departement` varchar(80) NOT NULL,
  `image` text NOT NULL,
  `inscrits` int(11) NOT NULL,
  `membres_max` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `sport`, `statut`, `departement`, `image`, `inscrits`, `membres_max`) VALUES
(1, 'Groupe de natation d''Évry', 'Groupe de natation qui organise régulièrement des compétitions de natation pour les jeunes de 14 à 18 ans. ', 'Natation', '', '91 - Essonne', '', 5, 40),
(2, 'Groupe de foot de l''Essonne', 'Groupe de football qui organise régulièrement des matches pour les jeunes de 12 à 16 ans. ', 'Football', '', '91 - Essonne', '', 10, 50),
(3, 'Natation Bobigny', '', 'Natation', '', '93 - Seine-Saint-Denis', '', 8, 50),
(4, 'Courir à Saint-Denis', '', 'Footing', '', '93 - Seine-Saint-Denis', '', 38, 40);

-- --------------------------------------------------------

--
-- Structure de la table `inscrit`
--

DROP TABLE IF EXISTS `inscrit`;
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `date_naissance`, `sexe`, `departement`, `email`, `mdp`, `sport`) VALUES
(137, 'Tyssandier', 'Nicolas', '1900-01-01', '', '', 'tyssandiernicolas@gmail.com', 'abc', 'Badminton');

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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_compets`
--

INSERT INTO `liste_compets` (`id`, `nom`, `sport`, `date`, `lieu`, `departement`, `groupe`, `places_total`, `inscrits`) VALUES
(1, 'Coupe de foot', 'Football', '2016-05-18', 'Terrain de football de Wissous', '91 - Essonne', 'groupe', 50, 0),
(2, 'Tournoi de Badminton', 'Badminton', '2016-06-01', 'Club de badminton de Metz', '57 - Moselle', 'groupe', 35, 0),
(3, 'Compétition annuelle de pétanque de Marseille', 'Pétanque', '2016-05-20', 'Terrain de pétanque de la calanque de Morgiou', '13 - Bouches-du-Rhône', 'groupe', 20, 0),
(4, 'Marathon de Paris', 'Marathon', '2017-04-09', 'Départ : avenue des Champs Élysées', '75 - Paris', 'groupe', 50000, 0);

-- --------------------------------------------------------

--
-- Structure de la table `liste_photos`
--

DROP TABLE IF EXISTS `liste_photos`;
CREATE TABLE IF NOT EXISTS `liste_photos` (
  `nom` varchar(255) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `liste_photos`
--

INSERT INTO `liste_photos` (`nom`, `ID`) VALUES
('', 1),
('', 2),
('', 3),
('', 4),
('', 5),
('', 6),
('', 7),
('', 8),
('', 9),
('', 10);

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
('Football', 25),
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
('Badminton', 11),
('Water-polo', 3),
('Marathon', 9),
('Course à pied', 12),
('Danse', 6),
('Athlétisme', 12),
('Escalade', 7);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
