-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  sam. 07 mars 2020 à 17:05
-- Version du serveur :  10.1.34-MariaDB
-- Version de PHP :  7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `GoogleFormLike`
--
CREATE DATABASE IF NOT EXISTS `GoogleFormLike` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `GoogleFormLike`;

-- --------------------------------------------------------

--
-- Structure de la table `Formulaire_Utilisateur`
--

CREATE TABLE `Formulaire_Utilisateur` (
  `cleform` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fu_id_utilisateur` int(11) NOT NULL,
  `titre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `etatformulaire` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Question`
--

CREATE TABLE `Question` (
  `numquest` int(11) NOT NULL,
  `cleform` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `intitule` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aide` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Reponse`
--

CREATE TABLE `Reponse` (
  `id_rep` int(11) NOT NULL,
  `rep_cleform` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rep_numquest` int(11) NOT NULL,
  `intitule_reponse` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `ResultatPublic`
--

CREATE TABLE `ResultatPublic` (
  `id_res` int(11) NOT NULL,
  `cleform` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numquest` int(11) NOT NULL,
  `numreponse` int(11) NOT NULL,
  `resultat` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `Utilisateur`
--

CREATE TABLE `Utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `mdp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pseudo_utilisateur` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `Formulaire_Utilisateur`
--
ALTER TABLE `Formulaire_Utilisateur`
  ADD PRIMARY KEY (`cleform`),
  ADD KEY `fu_id_utilisateur` (`fu_id_utilisateur`);

--
-- Index pour la table `Question`
--
ALTER TABLE `Question`
  ADD PRIMARY KEY (`numquest`,`cleform`),
  ADD KEY `cleform` (`cleform`);

--
-- Index pour la table `Reponse`
--
ALTER TABLE `Reponse`
  ADD PRIMARY KEY (`id_rep`);

--
-- Index pour la table `ResultatPublic`
--
ALTER TABLE `ResultatPublic`
  ADD PRIMARY KEY (`id_res`);

--
-- Index pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `Reponse`
--
ALTER TABLE `Reponse`
  MODIFY `id_rep` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `ResultatPublic`
--
ALTER TABLE `ResultatPublic`
  MODIFY `id_res` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `Utilisateur`
--
ALTER TABLE `Utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `Formulaire_Utilisateur`
--
ALTER TABLE `Formulaire_Utilisateur`
  ADD CONSTRAINT `Formulaire_Utilisateur_ibfk_1` FOREIGN KEY (`fu_id_utilisateur`) REFERENCES `Utilisateur` (`id_utilisateur`);

--
-- Contraintes pour la table `Question`
--
ALTER TABLE `Question`
  ADD CONSTRAINT `Question_ibfk_1` FOREIGN KEY (`cleform`) REFERENCES `Formulaire_Utilisateur` (`cleform`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
