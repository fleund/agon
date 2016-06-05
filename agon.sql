-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Dim 05 Juin 2016 à 19:43
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
-- Structure de la table `faq`
--

DROP TABLE IF EXISTS `faq`;
CREATE TABLE IF NOT EXISTS `faq` (
  `question` text NOT NULL,
  `reponse` text NOT NULL,
  `id_faq` int(6) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_faq`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `faq`
--

INSERT INTO `faq` (`question`, `reponse`, `id_faq`) VALUES
('LKJN', 'MJKLN?', 30),
('LKJN', 'MJKLN?', 31),
('qsd', 'qsd', 32),
('LKJN', 'MJKLN?', 29),
('IJKN', 'LKJN', 28),
('PMKJ', 'PONK7', 27),
('kjn', 'LKJN', 26);

-- --------------------------------------------------------

--
-- Structure de la table `forum_reponses`
--

DROP TABLE IF EXISTS `forum_reponses`;
CREATE TABLE IF NOT EXISTS `forum_reponses` (
  `id_reponse` int(6) NOT NULL AUTO_INCREMENT,
  `prenom_repondant` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `nom_repondant` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date_reponse` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `correspondance_sujet` int(6) NOT NULL,
  PRIMARY KEY (`id_reponse`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `forum_reponses`
--

INSERT INTO `forum_reponses` (`id_reponse`, `prenom_repondant`, `nom_repondant`, `message`, `date_reponse`, `correspondance_sujet`) VALUES
(9, 'sdfff', 'fffff', 'ffff', '2016-06-02 23:57:14', 8),
(8, 'côme', 'COthenet', 'non je ne suis pas d''accord', '2016-06-02 23:23:55', 8),
(7, '2', '2', '2', '2016-06-02 23:13:34', 7),
(6, 'Prenom repondant', 'Nom répondant', 'Message répondant', '2016-06-02 23:10:03', 6),
(10, 'sdfsdf', 'sdfdk', 'lk,', '2016-06-02 23:58:22', 8),
(11, 'sqdsq', 'sqdsdq', 'dsqdq', '2016-06-02 23:59:09', 8),
(12, 'Côme', 'Cothenet', 'message de réponse 03/06/2016', '2016-06-03 10:46:12', 8),
(13, 'dftrdtfcg', 'gfdgdf', 'dfc', '2016-06-03 13:37:14', 8);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `groupe`
--

INSERT INTO `groupe` (`id`, `nom`, `description`, `sport`, `statut`, `departement`, `image`, `inscrits`, `membres_max`) VALUES
(1, 'Groupe de natation d''Évry', 'Groupe de natation qui organise régulièrement des compétitions de natation pour les jeunes de 14 à 18 ans. ', 'Natation', '', '91 - Essonne', '', 5, 40),
(2, 'Groupe de foot de l''Essonne', 'Groupe de football qui organise régulièrement des matches pour les jeunes de 12 à 16 ans. ', 'Football', '', '91 - Essonne', '', 10, 50),
(3, 'Natation Bobigny', '', 'Natation', '', '93 - Seine-Saint-Denis', '', 8, 50),
(4, 'Courir à Saint-Denis', '', 'Footing', '', '93 - Seine-Saint-Denis', '', 38, 40),
(5, 'Cothenet', 'azerty', 'Athlétisme', 'Privé', '02 - Aisne', 'http://img11.hostingpics.net/pics/356018groupejabbericone6297961.png', 1, 200);

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
  `nombre_groupe` int(11) NOT NULL,
  `date_inscription` date NOT NULL,
  `id_groupe` int(11) NOT NULL,
  `num_tel` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscrit`
--

INSERT INTO `inscrit` (`id`, `nom`, `prenom`, `date_naissance`, `sexe`, `departement`, `email`, `mdp`, `sport`, `nombre_groupe`, `date_inscription`, `id_groupe`, `num_tel`) VALUES
(1, 'Admin', '', '2016-06-03', '', '', 'nicolas_881@hotmail.fr', 'admin', '', 0, '2016-06-03', 0, 0),
(137, 'Tyssandier', 'Nicolas', '1900-01-01', '', '', 'tyssandiernicolas@gmail.com', 'abc', 'Badminton', 0, '0000-00-00', 0, 0),
(138, 'Cothenet', 'Côme', '1900-01-01', '', '', 'moche@gmail.com', 'jesuisleplusmoche', 'Danse', 0, '0000-00-00', 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

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
('Basketball', 17),
('Handball', 12),
('Hockey', 1),
('Golf', 0),
('Badminton', 12),
('Water-polo', 3),
('Marathon', 9),
('Course à pied', 14),
('Danse', 8),
('Athlétisme', 14),
('Escalade', 7);

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
  PRIMARY KEY (`id_topic`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin7;

--
-- Contenu de la table `topic`
--

INSERT INTO `topic` (`nom_topic`, `description_topic`, `sport`, `id_topic`, `date_last_post`, `prenom_auteur`, `nom_auteur`, `premier_message`, `nombre_reponses`) VALUES
('fdgfdf', 'sds', 'Danse', 3, '2016-06-02 19:16:21', 'Csdcsd', 'csdcs', 'cssdc', 1),
('dssdfs', 'ffsdfs', 'Athlétisme', 4, '2016-06-02 19:28:38', 'fsdfdsfs', 'fsfsdf', 'sfsdf', 0),
('zerzer', 'zerrezrezezr', 'Badminton', 5, '2016-06-02 19:30:49', 'rzerzrz', 'rzerzer', 'zrzerzer', 1),
('Nom sujet', 'Description sujet', 'Athlétisme', 6, '2016-06-02 22:59:13', 'Prénom sujet', 'Nom sujet', 'Message sujet', 5),
('1', '1', 'Athlétisme', 7, '2016-06-02 23:10:49', '1', '1', '1', 1),
('Nodf^sdo', 'pijnpijn', 'Natation', 8, '2016-06-02 23:23:33', 'lijnpij', 'npijn', 'pioun', 6),
('qsd', 'doiy', 'Golf', 9, '2016-06-03 16:12:01', 'gouygsdouy', 'giuvfouy', '_ygouvfo', 0),
('qsd', 'doiy', 'Golf', 10, '2016-06-03 16:12:01', 'gouygsdouy', 'giuvfouy', '_ygouvfo', 0),
('qsd', 'doiy', 'Golf', 11, '2016-06-03 16:13:34', 'gouygsdouy', 'giuvfouy', '_ygouvfo', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
