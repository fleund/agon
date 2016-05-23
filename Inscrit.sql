-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Lun 23 Mai 2016 à 15:16
-- Version du serveur :  5.5.42
-- Version de PHP :  5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `agon`
--

-- --------------------------------------------------------

--
-- Structure de la table `Inscrit`
--

CREATE TABLE `Inscrit` (
  `id` int(11) NOT NULL,
  `nom_user` varchar(20) NOT NULL,
  `prenom_user` varchar(20) NOT NULL,
  `date_de_naissance` varchar(60) NOT NULL,
  `sexe` varchar(50) NOT NULL,
  `departement` varchar(50) NOT NULL,
  `email` varchar(60) NOT NULL,
  `pseudo` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `Inscrit`
--
ALTER TABLE `Inscrit`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `Inscrit`
--
ALTER TABLE `Inscrit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
