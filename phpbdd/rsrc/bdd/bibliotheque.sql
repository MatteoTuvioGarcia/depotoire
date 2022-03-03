-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le : Jeu 30 Octobre 2014 à 10:11
-- Version du serveur: 5.5.20
-- Version de PHP: 5.3.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id_auteur` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Identifiant de la table auteur',
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Nom de l''auteur',
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT 'Prénom de l''auteur',
  `date_naissance` int(4) DEFAULT NULL COMMENT 'DAte de naissance de l''auteur',
  PRIMARY KEY (`id_auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=17 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id_auteur`, `nom`, `prenom`, `date_naissance`) VALUES
(2, 'De Sablé', 'Madeleine', 1599),
(3, 'Corneille', 'Pierre ', 1606),
(4, 'Scaron', 'Paul', 1610),
(5, 'Perrault ', 'Charles', 1628),
(6, 'Piron', 'Alexis', 1689),
(7, 'Arouet, dit Voltaire', 'François-Marie', 1694),
(8, 'Rousseau', 'Jean-Jacques', 1712),
(9, 'Casanova', 'Giacomo', 1725),
(10, 'De Staël', 'Germaine ', 1765),
(11, 'Vidocq', 'Eugène-François', 1775),
(12, 'Descartes', 'René', 1596),
(13, 'Hugo', 'Victor', 1802),
(14, 'Dumas', 'Alexandre', 1802),
(15, 'Mérimée', 'Prosper ', 1803),
(16, 'Ancelot', 'Virginie', 1793);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
