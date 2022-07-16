-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 16 juil. 2022 à 04:47
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
-- Base de données : `user_aflokkat`
--

-- --------------------------------------------------------

--
-- Structure de la table `command`
--

DROP TABLE IF EXISTS `command`;
CREATE TABLE IF NOT EXISTS `command` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(35) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=239 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `command`
--

INSERT INTO `command` (`id`, `title`, `label`, `type`, `payment`, `date`, `user_id`) VALUES
(69, 'az', 'azaz', '', '', '2022-07-14 16:48:41', 58),
(68, 'az', 'azaz', '', '', '2022-07-14 16:48:41', 58),
(67, 'az', 'azaz', '', '', '2022-07-14 16:48:41', 58),
(66, 'az', 'azaz', '', '', '2022-07-14 16:48:41', 58),
(65, 'az', 'azaz', '', '', '2022-07-14 16:48:41', 58),
(64, 'az', 'azaz', '', '', '2022-07-14 16:48:41', 58),
(63, 'az', 'azeaze', '', '', '2022-07-14 13:04:20', 58),
(62, 'az', 'azeaze', '', '', '2022-07-14 13:04:20', 58),
(11, 'zeaag', 'aze', '', '', '2022-07-12 18:57:31', 58),
(12, 'zeaag', 'aeaze', '', '', '2022-07-12 18:57:33', 58),
(13, 'aze', 'aa', '', '', '2022-07-12 19:07:26', 58),
(14, 'aaz', 'azaaaa', '', '', '2022-07-12 19:09:13', 59),
(15, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:15', 59),
(16, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:16', 59),
(17, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:17', 59),
(18, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:17', 59),
(19, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:17', 59),
(20, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:18', 59),
(21, 'aazzae', 'azaaaa', '', '', '2022-07-12 19:09:18', 59),
(22, 'uu', 'uu', '', '', '2022-07-12 19:10:43', 59),
(23, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:23', 58),
(24, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:23', 58),
(25, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(26, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(27, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(28, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(29, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(30, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(31, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:24', 58),
(32, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:25', 58),
(33, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:25', 58),
(34, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:25', 58),
(35, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:25', 58),
(36, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:25', 58),
(37, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:25', 58),
(38, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:26', 58),
(39, 'azeaze', 'zaeaz', '', '', '2022-07-13 22:07:26', 58),
(61, 'az', 'azeaze', '', '', '2022-07-14 13:04:20', 58),
(60, 'az', 'azeaze', '', '', '2022-07-14 13:04:20', 58),
(59, 'az', 'azeaze', '', '', '2022-07-14 13:04:20', 58),
(58, 'az', 'azeaze', '', '', '2022-07-14 13:04:20', 58),
(57, 'aze', 'aze', '', '', '2022-07-14 11:54:20', 58),
(56, 'azeaze', 'aze', '', '', '2022-07-14 11:20:28', 58),
(55, 'azzae', 'azeaze', '', '', '2022-07-14 11:20:03', 58),
(54, 'azzae', 'azeaze', '', '', '2022-07-14 11:19:58', 58),
(53, 'azzae', 'azeaze', '', '', '2022-07-14 11:19:08', 58),
(52, 'azzae', 'azeaze', '', '', '2022-07-14 11:18:13', 58),
(51, 'azzae', 'azeaze', '', '', '2022-07-14 11:14:22', 58),
(70, 'az', 'azaz', '', '', '2022-07-14 16:48:42', 58),
(71, 'az', 'azaz', '', '', '2022-07-14 16:48:42', 58),
(72, 'az', 'azaz', '', '', '2022-07-14 16:48:42', 58),
(73, 'az', 'azaz', '', '', '2022-07-14 16:48:42', 58),
(74, 'az', 'azaz', '', '', '2022-07-14 16:48:42', 58),
(75, 'az', 'azaz', '', '', '2022-07-14 16:48:42', 58),
(76, 'az', 'azaz', '', '', '2022-07-14 16:48:43', 58),
(77, 'az', 'azaz', '', '', '2022-07-14 16:48:43', 58),
(78, 'az', 'azaz', '', '', '2022-07-14 16:48:43', 58),
(79, 'az', 'azaz', '', '', '2022-07-14 16:48:43', 58),
(80, 'az', 'azaz', '', '', '2022-07-14 16:48:43', 58),
(81, 'az', 'azaz', '', '', '2022-07-14 16:48:43', 58),
(82, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(83, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(84, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(85, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(86, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(87, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(88, 'az', 'azaz', '', '', '2022-07-14 16:48:44', 58),
(89, 'az', 'azaz', '', '', '2022-07-14 16:48:45', 58),
(90, 'az', 'azaz', '', '', '2022-07-14 16:48:45', 58),
(91, 'az', 'azaz', '', '', '2022-07-14 16:48:45', 58),
(92, 'az', 'azaz', '', '', '2022-07-14 16:48:45', 58),
(93, 'az', 'azaz', '', '', '2022-07-14 16:48:45', 58),
(94, 'az', 'azaz', '', '', '2022-07-14 16:48:45', 58),
(95, 'az', 'azaz', '', '', '2022-07-14 16:48:46', 58),
(96, 'az', 'azaz', '', '', '2022-07-14 16:48:46', 58),
(97, 'az', 'azaz', '', '', '2022-07-14 16:48:46', 58),
(98, 'az', 'azaz', '', '', '2022-07-14 16:48:46', 58),
(99, 'az', 'azaz', '', '', '2022-07-14 16:48:46', 58),
(100, 'az', 'azaz', '', '', '2022-07-14 16:48:46', 58),
(101, 'az', 'azaz', '', '', '2022-07-14 16:48:47', 58),
(102, 'az', 'azaz', '', '', '2022-07-14 16:48:47', 58),
(103, 'az', 'azaz', '', '', '2022-07-14 16:48:47', 58),
(104, 'az', 'azaz', '', '', '2022-07-14 16:48:47', 58),
(105, 'az', 'azaz', '', '', '2022-07-14 16:48:47', 58),
(106, 'az', 'azaz', '', '', '2022-07-14 16:48:47', 58),
(107, 'az', 'azaz', '', '', '2022-07-14 16:48:48', 58),
(108, 'az', 'azaz', '', '', '2022-07-14 16:48:48', 58),
(109, 'az', 'azaz', '', '', '2022-07-14 16:48:48', 58),
(110, 'az', 'azaz', '', '', '2022-07-14 16:48:48', 58),
(111, 'az', 'azaz', '', '', '2022-07-14 16:48:48', 58),
(112, 'az', 'azaz', '', '', '2022-07-14 16:48:48', 58),
(113, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(114, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(115, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(116, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(117, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(118, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(119, 'az', 'azaz', '', '', '2022-07-14 16:48:49', 58),
(120, 'az', 'azaz', '', '', '2022-07-14 16:48:50', 58),
(121, 'az', 'azaz', '', '', '2022-07-14 16:48:50', 58),
(122, 'az', 'azaz', '', '', '2022-07-14 16:48:50', 58),
(123, 'az', 'azaz', '', '', '2022-07-14 16:48:50', 58),
(124, 'az', 'azaz', '', '', '2022-07-14 16:48:50', 58),
(125, 'az', 'azaz', '', '', '2022-07-14 16:48:50', 58),
(126, 'az', 'azaz', '', '', '2022-07-14 16:48:51', 58),
(127, 'az', 'azaz', '', '', '2022-07-14 16:48:51', 58),
(128, 'az', 'azaz', '', '', '2022-07-14 16:48:51', 58),
(129, 'az', 'azaz', '', '', '2022-07-14 16:48:51', 58),
(130, 'az', 'azaz', '', '', '2022-07-14 16:48:52', 58),
(131, 'aze', 'azaaa', '', '', '2022-07-14 17:22:41', 58),
(132, 'aze', 'azaaa', '', '', '2022-07-14 17:22:41', 58),
(133, 'aze', 'azaaa', '', '', '2022-07-14 17:22:41', 58),
(134, 'aze', 'azaaa', '', '', '2022-07-14 17:22:41', 58),
(135, 'aze', 'azaaa', '', '', '2022-07-14 17:22:41', 58),
(136, 'aze', 'azaaa', '', '', '2022-07-14 17:22:42', 58),
(137, 'aze', 'azaaa', '', '', '2022-07-14 17:22:42', 58),
(138, 'aze', 'azaaa', '', '', '2022-07-14 17:22:42', 58),
(139, 'aze', 'azaaa', '', '', '2022-07-14 17:22:42', 58),
(140, 'aze', 'azaaa', '', '', '2022-07-14 17:22:42', 58),
(141, 'aze', 'azaaa', '', '', '2022-07-14 17:22:43', 58),
(142, 'aze', 'azaaa', '', '', '2022-07-14 17:22:43', 58),
(143, 'aze', 'azaaa', '', '', '2022-07-14 17:22:43', 58),
(144, 'aze', 'azaaa', '', '', '2022-07-14 17:22:43', 58),
(145, 'aze', 'azaaa', '', '', '2022-07-14 17:22:43', 58),
(146, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(147, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(148, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(149, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(150, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(151, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(152, 'aze', 'azaaa', '', '', '2022-07-14 17:22:44', 58),
(153, 'aze', 'azaaa', '', '', '2022-07-14 17:22:45', 58),
(154, 'aze', 'azaaa', '', '', '2022-07-14 17:22:45', 58),
(155, 'aze', 'azaaa', '', '', '2022-07-14 17:22:45', 58),
(156, 'aze', 'azaaa', '', '', '2022-07-14 17:22:45', 58),
(157, 'aze', 'azaaa', '', '', '2022-07-14 17:22:45', 58),
(158, 'aze', 'azaaa', '', '', '2022-07-14 17:22:45', 58),
(159, 'aze', 'azaaa', '', '', '2022-07-14 17:22:46', 58),
(160, 'aze', 'azaaa', '', '', '2022-07-14 17:22:46', 58),
(161, 'aze', 'azaaa', '', '', '2022-07-14 17:22:46', 58),
(162, 'aze', 'azaaa', '', '', '2022-07-14 17:22:46', 58),
(163, 'aze', 'azaaa', '', '', '2022-07-14 17:22:46', 58),
(164, 'aze', 'azaaa', '', '', '2022-07-14 17:22:46', 58),
(165, 'aze', 'azaaa', '', '', '2022-07-14 17:22:47', 58),
(166, 'aze', 'azaaa', '', '', '2022-07-14 17:22:47', 58),
(167, 'aze', 'azaaa', '', '', '2022-07-14 17:22:47', 58),
(168, 'aze', 'azaaa', '', '', '2022-07-14 17:22:47', 58),
(169, 'aze', 'azaaa', '', '', '2022-07-14 17:22:47', 58),
(170, 'aze', 'azaaa', '', '', '2022-07-14 17:22:47', 58),
(171, 'aze', 'azaaa', '', '', '2022-07-14 17:22:48', 58),
(172, 'aze', 'az', '', '', '2022-07-14 17:23:05', 58),
(173, 'aze', 'az', '', '', '2022-07-14 17:23:05', 58),
(174, 'aze', 'az', '', '', '2022-07-14 17:23:05', 58),
(175, 'aze', 'az', '', '', '2022-07-14 17:23:06', 58),
(176, 'aze', 'az', '', '', '2022-07-14 17:23:06', 58),
(177, 'aze', 'az', '', '', '2022-07-14 17:23:06', 58),
(178, 'aze', 'az', '', '', '2022-07-14 17:23:06', 58),
(179, 'aze', 'az', '', '', '2022-07-14 17:23:06', 58),
(180, 'aze', 'az', '', '', '2022-07-14 17:23:06', 58),
(181, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(182, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(183, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(184, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(185, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(186, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(187, 'aze', 'az', '', '', '2022-07-14 17:23:07', 58),
(188, 'aze', 'az', '', '', '2022-07-14 17:23:08', 58),
(189, 'aze', 'az', '', '', '2022-07-14 17:23:08', 58),
(190, 'aze', 'az', '', '', '2022-07-14 17:23:08', 58),
(191, 'aze', 'az', '', '', '2022-07-14 17:23:08', 58),
(192, 'aze', 'az', '', '', '2022-07-14 17:23:08', 58),
(193, 'aze', 'az', '', '', '2022-07-14 17:23:08', 58),
(194, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(195, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(196, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(197, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(198, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(199, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(200, 'aze', 'az', '', '', '2022-07-14 17:23:09', 58),
(201, 'aze', 'az', '', '', '2022-07-14 17:23:10', 58),
(202, 'aze', 'az', '', '', '2022-07-14 17:23:10', 58),
(203, 'aze', 'az', '', '', '2022-07-14 17:23:10', 58),
(204, 'aze', 'az', '', '', '2022-07-14 17:23:10', 58),
(205, 'aze', 'az', '', '', '2022-07-14 17:23:10', 58),
(206, 'aze', 'az', '', '', '2022-07-14 17:23:10', 58),
(207, 'aze', 'az', '', '', '2022-07-14 17:23:11', 58),
(208, 'aze', 'az', '', '', '2022-07-14 17:23:11', 58),
(209, 'aze', 'az', '', '', '2022-07-14 17:23:23', 58),
(210, 'aze', 'az', '', '', '2022-07-14 17:23:23', 58),
(211, 'aze', 'az', '', '', '2022-07-14 17:23:23', 58),
(212, 'aze', 'az', '', '', '2022-07-14 17:23:23', 58),
(213, 'aze', 'az', '', '', '2022-07-14 17:23:23', 58),
(214, 'aze', 'az', '', '', '2022-07-14 17:23:24', 58),
(215, 'aze', 'az', '', '', '2022-07-14 17:23:24', 58),
(216, 'aze', 'az', '', '', '2022-07-14 17:23:24', 58),
(217, 'aze', 'az', '', '', '2022-07-14 17:23:24', 58),
(218, 'aze', 'az', '', '', '2022-07-14 17:23:24', 58),
(219, 'aze', 'az', '', '', '2022-07-14 17:23:24', 58),
(220, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(221, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(222, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(223, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(224, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(225, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(226, 'aze', 'az', '', '', '2022-07-14 17:23:25', 58),
(227, 'aze', 'az', '', '', '2022-07-14 17:23:26', 58),
(228, 'aze', 'az', '', '', '2022-07-14 17:23:26', 58),
(229, 'aze', 'az', '', '', '2022-07-14 17:23:26', 58),
(230, 'aze', 'az', '', '', '2022-07-14 17:23:26', 58),
(231, 'aze', 'az', '', '', '2022-07-14 17:23:26', 58),
(232, 'aze', 'az', '', '', '2022-07-14 17:23:26', 58),
(233, 'aze', 'az', '', '', '2022-07-14 17:23:27', 58),
(234, 'aze', 'az', '', '', '2022-07-14 17:23:27', 58),
(235, 'az', 'a', '', '', '2022-07-14 17:49:15', 58),
(236, 'aaz', 'aaz', 'sur-place', '[\"CB\"]', '2022-07-16 00:15:35', 58),
(237, 'az', 'az', 'a-emporter', '[\"CB\",\"ESPECES\",\"CHEQUES\"]', '2022-07-16 01:04:43', 58),
(238, 'a', 'a', 'a-emporter', '[\"CB\"]', '2022-07-16 03:05:10', 58);

-- --------------------------------------------------------

--
-- Structure de la table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `log_id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(15) NOT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `log_sms`
--

DROP TABLE IF EXISTS `log_sms`;
CREATE TABLE IF NOT EXISTS `log_sms` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `code` int(5) NOT NULL,
  `state` int(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=70 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `log_sms`
--

INSERT INTO `log_sms` (`id`, `user_id`, `code`, `state`) VALUES
(69, 58, 4275, 1),
(68, 58, 5702, 1);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

DROP TABLE IF EXISTS `rdv`;
CREATE TABLE IF NOT EXISTS `rdv` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expert_id` int(8) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time_slot_id` int(8) NOT NULL,
  `booked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`id`, `expert_id`, `user_id`, `time_slot_id`, `booked_date`) VALUES
(1, 134, 58, 2, '2022-07-16 02:45:20'),
(2, 134, 58, 2, '2022-07-16 02:45:57'),
(3, 134, 58, 2, '2022-07-16 02:46:32'),
(4, 54, 58, 1, '2022-07-16 02:47:26'),
(5, 54, 58, 1, '2022-07-16 02:48:10'),
(6, 12, 58, 23, '2022-07-16 02:53:21'),
(7, 12, 58, 23, '2022-07-16 02:54:45'),
(8, 12, 58, 23, '2022-07-16 02:57:14'),
(9, 1, 58, 2, '2022-07-16 03:01:55'),
(10, 23, 58, 1, '2022-07-16 04:08:40'),
(11, 2312, 58, 545, '2022-07-16 04:10:24');

-- --------------------------------------------------------

--
-- Structure de la table `request`
--

DROP TABLE IF EXISTS `request`;
CREATE TABLE IF NOT EXISTS `request` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `hash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `request`
--

INSERT INTO `request` (`id`, `user_id`, `hash`, `state`) VALUES
(29, 52, 'Ios1g%D50F780Bz$dKZjCaje0T1DnN', 1),
(28, 52, 'Zspp12jHf2Tz39JYaV2gD!YPA!NaBT', 1),
(27, 52, 'sPWKHJTg78XWu1DPhm9wSkalQx26JH', 1),
(26, 52, 'e@q8eh@t9$Oi578dKkJ@OO@444mNgW', 1),
(25, 52, 'I$ZP4R9p%JTKx?lIE6DL@9UrQh0y6z', 1),
(24, 52, 'tWvnFh$i0t1HMClylOrJxD6NFEWYt1', 1),
(23, 52, 'g3Zc4zyv8C@egSz7XdTI9K?aY9!2Yr', 1),
(22, 52, 'B1zYiYY7MHfn?CEnr9yfORBy@z0ZmN', 1),
(21, 52, 'NL8vA$FnI97@Y!cmF08JZpq8ZGNdht', 1),
(20, 52, 'TM15fqcKT%25DY2ah4Xqrb9Q?8wflx', 1),
(19, 52, 'bP58Kw0waSXAdd2K3egs0ORZ5kuOTu', 1),
(18, 52, '$9Yg$#0K1$Gd1WoHGzh8a2y%QUi6xu', 1),
(30, 52, '0?4pw?UaRGBI3pHkpoS?N%Q8Mf3HA%', 1),
(31, 54, 'ivm3nM7EZMh4!C9I2$vH!uX8K014GK', 1),
(32, 54, 'hZGShvGcfTi?DMuP7!vSJkMdD7q!?O', 1),
(33, 54, 'D?s6fY5e@1uYSLxLpWlvuIXPxCX0Ab', 1),
(34, 54, 'z4HXs%TY1WWsBxvNGD8ZsydyqOEV1b', 1),
(35, 54, '77%mIoG$Zindu?jiydO!H8BGhsjuyf', 1),
(36, 52, 'N5EpB$Gnnt9gPucf@K$!K4rnYB$dTm', 1),
(37, 54, 'sKOGam?NQLCD5TTk7IYEVlDhKhKaMU', 1),
(38, 54, '!GLjjVH3Cb$um1bRGc$nXD6js?wMUc', 1),
(39, 54, 'R9uC?wpNJI7Td233HuyxP@x?NQkehd', 1),
(40, 54, 'S51@c12Bek!BG5oy6z0eziFanQCGea', 1),
(41, 58, 'BfXxqTpN3OrhBoGoFjIAXSaBrXQ0Qc', 1),
(42, 58, 'ttyyiS37v4euZl7qsLJMAhruPByZVn', 1);

-- --------------------------------------------------------

--
-- Structure de la table `time_slot`
--

DROP TABLE IF EXISTS `time_slot`;
CREATE TABLE IF NOT EXISTS `time_slot` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `weekday` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hour` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `time_slot`
--

INSERT INTO `time_slot` (`id`, `weekday`, `hour`) VALUES
(1, 'monday', '2000-01-20 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwdExp` datetime DEFAULT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hash` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `login`, `nom`, `prenom`, `type`, `password`, `pwdExp`, `created_date`, `hash`) VALUES
(58, 'a@a.a', 's', 'a', 'emporter', '$2y$10$O8q1Hl9M5qWuo8NXv5kHU.ZQuNkFCZnKmoFJTaFMYJv4pUUj3eTSK', '2022-07-17 00:00:00', '2022-07-11 20:12:41', '!BjyOz1DMl5D9pMtIiV6@QZfhmOPnJ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
