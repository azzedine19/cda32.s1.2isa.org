-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  lun. 29 juin 2020 à 12:30
-- Version du serveur :  5.5.55-0+deb8u1
-- Version de PHP :  7.3.0-2+0~20181217092615.24+jessie~1.gbp54e52f

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `cda03_bd1`
--

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `IdActivite` int(11) NOT NULL,
  `IntituleActivite` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DDebut` date DEFAULT NULL,
  `DFin` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Description` text CHARACTER SET utf8mb4,
  `TarifAdherent` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `TarifInvite` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `DLimite` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `IdAdherent` int(11) NOT NULL,
  `IdType` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `IdAdherent` int(11) NOT NULL,
  `Nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `Prenom` varchar(50) COLLATE utf8_bin NOT NULL,
  `DNaiss` date NOT NULL,
  `Adresse1` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `Adresse2` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `CdPost` varchar(5) COLLATE utf8_bin NOT NULL,
  `Ville` varchar(30) COLLATE utf8_bin NOT NULL,
  `Email` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `Tel` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `DAdhesion` date NOT NULL,
  `Organisateur` tinyint(1) DEFAULT NULL,
  `Login` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Password` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `certificat` varchar(50) COLLATE utf8_bin NOT NULL,
  `droit_image` tinyint(1) NOT NULL DEFAULT '0',
  `cylindree` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `adherent`
--

INSERT INTO `adherent` (`IdAdherent`, `Nom`, `Prenom`, `DNaiss`, `Adresse1`, `Adresse2`, `CdPost`, `Ville`, `Email`, `Tel`, `DAdhesion`, `Organisateur`, `Login`, `Password`, `certificat`, `droit_image`, `cylindree`) VALUES
(0, 'test nom', 'test prenom', '1980-01-22', 'test adresse', NULL, 'Test ', 'test ville', 'test@test.com', 'test tel', '0000-00-00', NULL, 'test identifiant', 'test password', '1', 1, '250 cm3');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE `inscription` (
  `IdInscription` int(11) NOT NULL,
  `DInscription` date DEFAULT NULL,
  `NbInvités` int(11) DEFAULT NULL,
  `IdAdherent` int(11) NOT NULL,
  `IdActivite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `nouvelle`
--

CREATE TABLE `nouvelle` (
  `IdNouvelle` int(11) NOT NULL,
  `Titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `Texte` varchar(200) COLLATE utf8_bin DEFAULT NULL,
  `DPubli` date NOT NULL,
  `Diffusion` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `Fichier` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `page`
--

CREATE TABLE `page` (
  `id_page` smallint(4) NOT NULL COMMENT 'ID de page',
  `key_file` varchar(30) NOT NULL,
  `metatitle` varchar(100) NOT NULL,
  `metadescription` varchar(255) NOT NULL,
  `keywords` varchar(255) NOT NULL,
  `h1` varchar(250) NOT NULL,
  `menu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `page`
--

INSERT INTO `page` (`id_page`, `key_file`, `metatitle`, `metadescription`, `keywords`, `h1`, `menu`) VALUES
(1, 'accueil', 'Moto Club Millau Passion | Accueil', 'Moto Club Millau Passion | Association de loisir autour de la moto !', 'Moto, Plaisir, Club, Millau, Passion, Accueil', 'Accueil', 'Accueil'),
(2, 'activites', 'Moto Club Millau Passion | Nos activités', 'Les activités de l\'association Moto Club Millau Passion', 'Activtés, Tarn, Deux roues, Millau, Passion, Accueil', 'Activités', 'Activités'),
(3, 'contact', 'Moto Club Millau Passion | Nous contacter', 'Les activités de l\'association Moto Club Millau Passion', '', 'Contact', 'Contact'),
(4, 'galerie', 'Moto Club Millau Passion | Notre Galerie Photo', 'Les activités de l\'association Moto Club Millau Passion', '', 'Galerie', 'Galerie Photo'),
(5, 'informations', 'Moto Club Millau Passion | Les informations de l\'association', '', '', 'Informations', 'Informations'),
(6, 'presentation', 'Moto Club Millau Passion | Présentation et histoire de l\'association', '', '', 'Présentation', 'Présentation'),
(7, 'inscription', 'Moto Club Millau Passion | Inscription', 'description de la page', '', 'Inscription', 'Inscription');
-- --------------------------------------------------------
--
-- Structure de la table `photo`
--
CREATE TABLE `photo` (
  `IdPhoto` int(11) NOT NULL,
  `Titre` varchar(50) COLLATE utf8_bin NOT NULL,
  `DPhoto` date DEFAULT NULL,
  `Fichier` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `IdAdherent` int(11) NOT NULL,
  `IdActivite` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
-- --------------------------------------------------------
--
-- Structure de la table `type_activite`
--
CREATE TABLE `type_activite` (
  `IdType` int(11) NOT NULL,
  `IntituleType` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
--
-- Index pour les tables déchargées
--
--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`IdActivite`),
  ADD KEY `IdAdherent` (`IdAdherent`),
  ADD KEY `IdType` (`IdType`);
--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`IdAdherent`);
--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD PRIMARY KEY (`IdInscription`),
  ADD KEY `IdAdherent` (`IdAdherent`),
  ADD KEY `IdActivite` (`IdActivite`);
--
-- Index pour la table `nouvelle`
--
ALTER TABLE `nouvelle`
  ADD PRIMARY KEY (`IdNouvelle`);
--
-- Index pour la table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id_page`);
--
-- Index pour la table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`IdPhoto`),
  ADD KEY `IdAdherent` (`IdAdherent`),
  ADD KEY `IdActivite` (`IdActivite`);
--
-- Index pour la table `type_activite`
--
ALTER TABLE `type_activite`
  ADD PRIMARY KEY (`IdType`);
--
-- AUTO_INCREMENT pour les tables déchargées
--
--
-- AUTO_INCREMENT pour la table `page`
--
ALTER TABLE `page`
  MODIFY `id_page` smallint(4) NOT NULL AUTO_INCREMENT COMMENT 'ID de page', AUTO_INCREMENT=8;
--
-- Contraintes pour les tables déchargées
--
--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`IdAdherent`) REFERENCES `adherent` (`IdAdherent`),
  ADD CONSTRAINT `activite_ibfk_2` FOREIGN KEY (`IdType`) REFERENCES `type_activite` (`IdType`);
--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_ibfk_1` FOREIGN KEY (`IdAdherent`) REFERENCES `adherent` (`IdAdherent`),
  ADD CONSTRAINT `inscription_ibfk_2` FOREIGN KEY (`IdActivite`) REFERENCES `activite` (`IdActivite`);
--
-- Contraintes pour la table `photo`
--
ALTER TABLE `photo`
  ADD CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`IdAdherent`) REFERENCES `adherent` (`IdAdherent`),
  ADD CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`IdActivite`) REFERENCES `activite` (`IdActivite`);
COMMIT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;