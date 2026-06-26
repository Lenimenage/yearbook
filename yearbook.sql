-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 12, 2026 at 01:39 PM
-- Server version: 8.4.7
-- PHP Version: 8.5.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookyear`
--

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

DROP TABLE IF EXISTS `etudiants`;
CREATE TABLE IF NOT EXISTS `etudiants` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filiaire_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `etudiants_filiaires_id_filiaires_id` (`filiaire_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id`, `nom`, `photo`, `prenom`, `email`, `filiaire_id`) VALUES
(1, 'Menage', '', 'Léni', 'leni.menage@outlook.fr', 1),
(2, 'cheubon', '', 'mirande', 'mimi.chebon@hotmail.fr', 1),
(3, 'letourno', '', 'timoti', 'titi.lele@gmouil.com', 1),
(4, 'hussein', '', 'gewayriya', 'gege@gmouil.com', 1),
(5, 'lecompte', '', 'mael', 'mael.lele@gmail.com', 1),
(6, 'hiron', '', 'thomas', 'toto.hihi@gmail.com', 1),
(7, 'tata', '', 'tata', 'tata@gmail.com', 2),
(8, 'titi', '', 'titi', 'titi@titi.com', 2),
(9, 'tutu', '', 'tutu', 'tutu@tutu.com', 2),
(10, 'toutou', '', 'toutou', 'toutou@tou.com', 2),
(11, 'riri', '', 'riri', 'riri@riri.com', 2),
(12, 'fifi', '', 'fifi', 'fifi@fifi.com', 2),
(13, 'loulou', '', 'loulou', 'loulou@loulou.fr', 2);

-- --------------------------------------------------------

--
-- Table structure for table `filiaires`
--

DROP TABLE IF EXISTS `filiaires`;
CREATE TABLE IF NOT EXISTS `filiaires` (
  `id` int NOT NULL AUTO_INCREMENT,
  `annee` int NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `titre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `filiaires`
--

INSERT INTO `filiaires` (`id`, `annee`, `description`, `titre`) VALUES
(1, 2025, 'SIO', 'BTS SIO'),
(2, 2025, 'CIEL', 'BTS CIEL');

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

DROP TABLE IF EXISTS `registers`;
CREATE TABLE IF NOT EXISTS `registers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mdp` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_filiaires_id_filiaires_id` FOREIGN KEY (`filiaire_id`) REFERENCES `filiaires` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
