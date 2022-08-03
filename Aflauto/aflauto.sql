-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 août 2022 à 02:02
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
  `adresse_user` longtext,
  `password_user` varchar(350) NOT NULL,
  `type` varchar(15) NOT NULL,
  `pwdExp_user` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id_user`, `civilite_user`, `nom_user`, `prenom_user`, `telephone_user`, `email_user`, `adresse_user`, `password_user`, `type`, `pwdExp_user`, `created_date`, `hash`) VALUES
(3, 'Mr', 'a', 'a', 6, 'a@a.a', NULL, '$2y$10$KvTNiwBVeMtF7LJjKWrfnei/YhGYTOqJCz24.YX57bja52U4Wmtx2', 'technicien', '2022-08-03 00:00:00', '2022-08-02 14:51:04', 'T4iFmLl3PH0$tGx#elyCj#Z!bwvClp'),
(4, '', 'a', 'a', 645656585, 'q@q.qq', 'Resd', '$2y$10$RRY41g7RB1GQIbgTz1NKBuiC8VfmTKqjn6U0hLYb63bqfgEBtFMxe', 'client', '2022-08-04 00:00:00', '2022-08-02 19:06:32', '$gbhxXbRS6e8ZOmey%?gmm0Uugih4q'),
(5, 'Mr', 'z', 'z', 6, 'a@a.aaz', NULL, '$2y$10$FABwgJuv1jZdZokwFinkJ.lCw1xSnmROcZ6jO9ImsdG4nX9sGCPii', 'client', '2022-08-03 00:00:00', '2022-08-02 19:06:56', '1wNZfe9d6XksqwSvj5LAHDXb89I$K$'),
(6, 'option2', 'Geronimi', 'Jean Marie', 616506212, 'a@a.aa', NULL, '$2y$10$FB2svga/MK.mYOe/2cQSQ.6tdqKPY6JdOTlQatiu7/KiddO9ieZtG', 'temp', NULL, '2022-08-02 23:52:48', ''),
(7, 'Mr', 'Geronimi', 'Jean Marie', 616506212, 'a@a.aa', NULL, '$2y$10$iota1P8Dq5so1X6BE1al2eMavYCgDS62bp4whmxqO5htyuwM0cTIe', 'temp', '2022-08-03 00:00:00', '2022-08-02 23:58:06', ''),
(8, 'Mme', 'Geronimi', 'Jean Marie', 616506212, 'a@a.aa', NULL, '$2y$10$.vb5vhVGuz1XnkrPTcoIpOV/RM82BmgBnusKhUDdcfhTk.hELvAAy', 'temp', '2022-08-04 00:00:00', '2022-08-03 00:08:44', ''),
(9, 'Mlle', 'Geronimi', 'Jean Marie', 616506212, 'q@q.qq', NULL, '$2y$10$QqCYZjXQ8Cvh3XW3ImEgU.WTztt6XuTX96dhFIg0qSuBSFe6GC0zS', 'temp', '2022-08-04 00:00:00', '2022-08-03 00:15:36', ''),
(10, 'Mme', 'e', 'e', 645, 'e@e.e', NULL, '$2y$10$Vv0lwit31Jnh1EuqaM7RG.IuBXaP34eAk11so/7Bpl9JzWeRGSPM.', 'client', '2022-08-04 00:00:00', '2022-08-03 01:53:44', 'hVyX6xiYV2va5mV0VEOhOoHDccQoTV');

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
  `compte_rendu` longtext,
  PRIMARY KEY (`id_controle`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `controle_tech`
--

INSERT INTO `controle_tech` (`id_controle`, `id_tech`, `id_user`, `id_vehicule`, `id_time_slot`, `booked_date`, `state`, `compte_rendu`) VALUES
(30, 12, 10, 49, 1659506400, '2022-08-03 00:08:44', 3, NULL),
(31, NULL, 10, 50, 1659510000, '2022-08-03 00:15:36', 0, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `error`
--

DROP TABLE IF EXISTS `error`;
CREATE TABLE IF NOT EXISTS `error` (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(15) NOT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `error`
--

INSERT INTO `error` (`id`, `id_user`, `date`) VALUES
(13, 3, '2022-08-02 15:42:30'),
(14, 3, '2022-08-02 15:42:31'),
(15, 3, '2022-08-02 15:42:32'),
(16, 3, '2022-08-02 15:45:18'),
(17, 4, '2022-08-02 22:04:12'),
(18, 5, '2022-08-03 01:50:21');

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
-- Structure de la table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `hash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Structure de la table `sms`
--

DROP TABLE IF EXISTS `sms`;
CREATE TABLE IF NOT EXISTS `sms` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `code` int(5) NOT NULL,
  `state` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `sms`
--

INSERT INTO `sms` (`id`, `id_user`, `code`, `state`) VALUES
(31, 4, 9855, 1),
(32, 4, 3891, 1),
(33, 4, 2485, 1),
(34, 3, 4950, 1),
(36, 3, 4720, 1),
(37, 3, 6788, 1),
(38, 4, 8513, 1),
(39, 3, 9257, 1),
(40, 3, 8070, 1),
(41, 3, 1604, 1),
(42, 3, 1510, 1),
(43, 3, 1405, 1),
(44, 3, 8063, 1),
(45, 3, 3916, 1),
(46, 3, 9310, 1),
(47, 4, 3983, 1),
(48, 10, 4443, 1),
(49, 4, 2258, 1),
(50, 10, 8635, 1);

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
  `id_user` int(8) DEFAULT NULL,
  `id_marque` int(11) NOT NULL,
  `id_modele` int(11) NOT NULL,
  `immat_vehicule` varchar(11) NOT NULL,
  `annee_vehicule` int(4) NOT NULL,
  `carburant_vehicule` varchar(35) NOT NULL,
  `infos_vehicule` longtext,
  PRIMARY KEY (`id_vehicule`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_vehicule`, `id_user`, `id_marque`, `id_modele`, `immat_vehicule`, `annee_vehicule`, `carburant_vehicule`, `infos_vehicule`) VALUES
(28, 4, 7, 35, 'AZ-123-AZ', 2442, 'Essence', NULL),
(29, 4, 7, 35, 'AZ-123-AZ', 2442, 'Essence', NULL),
(30, 4, 5, 27, 'AZ-123-AZ', 2022, 'Essence', NULL),
(31, 10, 5, 27, 'AZ-123-AZ', 2022, 'Essence', NULL),
(32, 10, 5, 27, 'AZ-123-AZ', 2022, 'Essence', NULL),
(33, 10, 5, 27, 'AZ-123-AZ', 2022, 'Essence', NULL),
(34, NULL, 6, 31, 'FD-123-DG', 2332, 'Essence', NULL),
(35, NULL, 5, 26, 'ZA-123-AZ', 2022, 'Diesel', NULL),
(36, NULL, 6, 31, 'ET-345-ER', 2333, 'Diesel', NULL),
(37, NULL, 5, 29, 'ER-789-ER', 2001, 'Essence', NULL),
(38, NULL, 6, 31, 'ER-789-ER', 2001, 'Essence', NULL),
(39, NULL, 5, 26, 'ER-789-ER', 2001, 'Essence', NULL),
(40, NULL, 7, 36, 'ER-789-ER', 2012, 'Essence', NULL),
(41, NULL, 7, 35, 'ER-789-ER', 2012, 'Diesel', NULL),
(42, NULL, 8, 40, 'ER-789-ER', 1452, 'Electrique', NULL),
(43, NULL, 8, 40, 'ER-789-ER', 1452, 'Electrique', NULL),
(44, NULL, 8, 40, 'ER-789-ER', 1452, 'Electrique', NULL),
(45, NULL, 8, 40, 'ER-789-ER', 1452, 'Electrique', NULL),
(46, NULL, 8, 40, 'ER-789-ER', 2012, 'Essence', NULL),
(47, NULL, 8, 40, 'ER-789-ER', 2012, 'Essence', NULL),
(48, NULL, 8, 40, 'ER-789-ER', 2012, 'Essence', NULL),
(49, NULL, 8, 39, 'ER-789-ER', 2022, 'Essence', NULL),
(50, NULL, 7, 36, 'AZ-845-AZ', 2012, 'Diesel', NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
