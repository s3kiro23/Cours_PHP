-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 01 août 2022 à 23:12
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `aflauto`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `civilite_user` varchar(15) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `telephone_user` int(15) NOT NULL,
  `email_user` varchar(50) NOT NULL,
  `adresse_user` longtext NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `controle_tech`
--

DROP TABLE IF EXISTS `controle_tech`;
CREATE TABLE IF NOT EXISTS `controle_tech` (
  `id_controle` int(11) NOT NULL AUTO_INCREMENT,
  `id_tech` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_vehicule` int(11) NOT NULL,
  `id_time_slot` int(11) NOT NULL,
  `booked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `state` int(11) NOT NULL,
  PRIMARY KEY (`id_controle`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controle_tech`
--

INSERT INTO `controle_tech` (`id_controle`, `id_tech`, `id_user`, `id_vehicule`, `id_time_slot`, `booked_date`, `state`) VALUES
(10, NULL, NULL, 18, 1659333600, '2022-08-01 23:05:05', 0),
(11, NULL, NULL, 19, 1659369600, '2022-08-01 23:05:08', 0),
(12, NULL, NULL, 20, 1659430800, '2022-08-01 23:05:51', 0),
(13, NULL, NULL, 21, 1659434400, '2022-08-01 23:05:53', 0);

-- --------------------------------------------------------

--
-- Structure de la table `marques`
--

DROP TABLE IF EXISTS `marques`;
CREATE TABLE IF NOT EXISTS `marques` (
  `id_marque` int(11) NOT NULL AUTO_INCREMENT,
  `nom_marque` varchar(255) NOT NULL,
  PRIMARY KEY (`id_marque`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `marques`
--

INSERT INTO `marques` (`id_marque`, `nom_marque`) VALUES
(5, 'Ford'),
(6, 'Honda'),
(7, 'Renault'),
(8, 'Nissan'),
(9, 'Alfa'),
(10, 'Volkswagen'),
(11, 'Toyota');

-- --------------------------------------------------------

--
-- Structure de la table `modeles`
--

DROP TABLE IF EXISTS `modeles`;
CREATE TABLE IF NOT EXISTS `modeles` (
  `id_modele` int(11) NOT NULL AUTO_INCREMENT,
  `id_marque` int(11) NOT NULL,
  `nom_modele` varchar(255) NOT NULL,
  PRIMARY KEY (`id_modele`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `modeles`
--

INSERT INTO `modeles` (`id_modele`, `id_marque`, `nom_modele`) VALUES
(26, 5, 'Raptor'),
(27, 5, 'Mustang'),
(28, 5, 'Focus'),
(29, 5, 'Fiesta'),
(30, 6, 'Civic'),
(31, 6, 'Jazz'),
(32, 6, 'Prelude'),
(33, 6, 'HR-V'),
(34, 7, 'Clio'),
(35, 7, 'Laguna'),
(36, 7, 'Megane'),
(37, 7, 'Zoe'),
(38, 8, 'Leaf'),
(39, 8, 'GT-R'),
(40, 8, 'Qashqai'),
(41, 8, 'Micra'),
(42, 9, 'Giulietta'),
(43, 9, '147'),
(44, 9, '159'),
(45, 9, 'Giulia'),
(46, 10, 'Golf'),
(47, 10, 'Polo'),
(48, 10, 'Tiguan'),
(49, 10, 'Sirocco'),
(50, 11, 'Yaris'),
(51, 11, 'Supra'),
(52, 11, 'Prius'),
(53, 11, 'Corolla');

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id_settings` int(11) NOT NULL AUTO_INCREMENT,
  `slot_interval` int(35) DEFAULT NULL,
  `start_time_am` int(35) DEFAULT NULL,
  `end_time_am` int(35) DEFAULT NULL,
  `start_time_pm` int(35) DEFAULT NULL,
  `end_time_pm` int(35) DEFAULT NULL,
  PRIMARY KEY (`id_settings`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id_settings`, `slot_interval`, `start_time_am`, `end_time_am`, `start_time_pm`, `end_time_pm`) VALUES
(1, 3600, 28800, NULL, NULL, 64800);

-- --------------------------------------------------------

--
-- Structure de la table `techniciens`
--

DROP TABLE IF EXISTS `techniciens`;
CREATE TABLE IF NOT EXISTS `techniciens` (
  `id_tech` int(11) NOT NULL AUTO_INCREMENT,
  `nom_tech` varchar(255) NOT NULL,
  `prenom_tech` int(255) NOT NULL,
  PRIMARY KEY (`id_tech`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `id_upload` int(11) NOT NULL AUTO_INCREMENT,
  `nom_upload` varchar(255) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `submitted_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_upload`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

DROP TABLE IF EXISTS `vehicules`;
CREATE TABLE IF NOT EXISTS `vehicules` (
  `id_vehicule` int(11) NOT NULL AUTO_INCREMENT,
  `id_marque` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  `immat_vehicule` varchar(11) NOT NULL,
  `annee_vehicule` int(4) NOT NULL,
  `carburant_vehicule` varchar(35) NOT NULL,
  `infos_vehicule` longtext,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_vehicule`, `id_marque`, `id_modele`, `immat_vehicule`, `annee_vehicule`, `carburant_vehicule`, `infos_vehicule`) VALUES
(18, 5, 26, 'az-845-az', 2002, 'Essence', NULL),
(19, 5, 26, 'az-845-az', 2002, 'Essence', NULL),
(20, 7, 35, 'az-845-az', 2020, 'Diesel', NULL),
(21, 7, 35, 'az-845-az', 2020, 'Diesel', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
