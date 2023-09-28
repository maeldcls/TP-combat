-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 25 août 2023 à 14:00
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `combat`
--

-- --------------------------------------------------------

--
-- Structure de la table `archer`
--

DROP TABLE IF EXISTS `archer`;
CREATE TABLE IF NOT EXISTS `archer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `attack_spe` varchar(100) NOT NULL,
  `idHeroes` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `archer`
--

INSERT INTO `archer` (`id`, `attack_spe`, `idHeroes`) VALUES
(2, 'pluie de flèches', 87),
(3, 'pluie de flèches', 88),
(4, 'pluie de flèches', 109),
(5, 'pluie de flèches', 111);

-- --------------------------------------------------------

--
-- Structure de la table `heroes`
--

DROP TABLE IF EXISTS `heroes`;
CREATE TABLE IF NOT EXISTS `heroes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `health_point` int NOT NULL DEFAULT '100',
  `picture` varchar(255) NOT NULL,
  `icon` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `heroes`
--

INSERT INTO `heroes` (`id`, `name`, `health_point`, `picture`, `icon`) VALUES
(93, 'raegan', 0, 'img/heroes/raegan.png', 'img/icon/raegan-icon.png'),
(98, 'cloud', 3730, 'img/heroes/cloud.png', 'img/icon/cloud-icon.png'),
(112, 'Raegan', 56, 'img/heroes/raegan.png', 'img/icon/raegan-icon.png'),
(104, 'ccccc', 0, 'img/heroes/cloud.png', 'img/icon/cloud-icon.png'),
(105, 'sdfsdgsg', 0, 'img/heroes/raegan.png', 'img/icon/raegan-icon.png'),
(106, 'sdfdsfsdf', 100, 'img/heroes/cloud.png', 'img/icon/cloud-icon.png'),
(107, 'sdfdsfsdf', 0, 'img/heroes/cloud.png', 'img/icon/cloud-icon.png'),
(108, 'Tifa', 0, 'img/heroes/tifa.png', 'img/icon/tifa-icon.png'),
(109, 'ouistiti', 0, 'img/heroes/raegan.png', 'img/icon/raegan-icon.png'),
(110, 'yaaaaaas', 0, 'img/heroes/tifa.png', 'img/icon/tifa-icon.png'),
(111, 'sqdqsdq', 150, 'img/heroes/cloud.png', 'img/icon/cloud-icon.png');

-- --------------------------------------------------------

--
-- Structure de la table `mage`
--

DROP TABLE IF EXISTS `mage`;
CREATE TABLE IF NOT EXISTS `mage` (
  `id` int NOT NULL AUTO_INCREMENT,
  `attack_spe` varchar(50) NOT NULL,
  `idHeroes` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `mage`
--

INSERT INTO `mage` (`id`, `attack_spe`, `idHeroes`) VALUES
(6, 'boule de feu', 90),
(5, 'boule de feu', 89),
(7, 'boule de feu', 91),
(8, 'boule de feu', 92),
(9, 'boule de feu', 94),
(10, 'boule de feu', 95),
(11, 'boule de feu', 96),
(12, 'boule de feu', 97),
(13, 'boule de feu', 99),
(14, 'boule de feu', 102),
(15, 'boule de feu', 103),
(16, 'boule de feu', 104),
(17, 'boule de feu', 106),
(18, 'boule de feu', 107),
(19, 'boule de feu', 108),
(20, 'boule de feu', 112);

-- --------------------------------------------------------

--
-- Structure de la table `monsters`
--

DROP TABLE IF EXISTS `monsters`;
CREATE TABLE IF NOT EXISTS `monsters` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `health_point` int NOT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `icon` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `monsters`
--

INSERT INTO `monsters` (`id`, `name`, `health_point`, `picture`, `icon`) VALUES
(1, 'Boss1', 100, 'img/monsters/boss1.png', 'img/icon/boss1-icon.png'),
(2, 'Boss2', 100, 'img/monsters/boss2.png', 'img/icon/boss2-icon.png'),
(3, 'boss3', 150, 'img/monsters/boss3.png', 'img/icon/boss3-icon.png');

-- --------------------------------------------------------

--
-- Structure de la table `warrior`
--

DROP TABLE IF EXISTS `warrior`;
CREATE TABLE IF NOT EXISTS `warrior` (
  `id` int NOT NULL AUTO_INCREMENT,
  `attack_spe` varchar(100) NOT NULL,
  `idHeroes` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `warrior`
--

INSERT INTO `warrior` (`id`, `attack_spe`, `idHeroes`) VALUES
(8, 'coup de pommeau', 100),
(7, 'coup de pommeau', 93),
(6, 'coup de pommeau', 86),
(9, 'coup de pommeau', 101),
(10, 'coup de pommeau', 105),
(11, 'coup de pommeau', 110);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
