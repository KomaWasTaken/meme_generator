-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 13 juin 2018 à 14:29
-- Version du serveur :  5.7.19
-- Version de PHP :  7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `project_memes`
--

-- --------------------------------------------------------

--
-- Structure de la table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `id_gallery` int(11) NOT NULL AUTO_INCREMENT,
  `gal_image` varchar(255) NOT NULL,
  `gal_user_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_gallery`),
  UNIQUE KEY `idgallery_UNIQUE` (`id_gallery`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `gal_image`, `gal_user_image`) VALUES
(1, 'alien.jpg', ''),
(2, 'batman.jpg', ''),
(3, 'bob.jpg', ''),
(4, 'doge.jpg', ''),
(5, 'futurama.jpg', ''),
(6, 'grumpy.jpg', ''),
(7, 'onlyone.jpg', ''),
(8, 'puppet.jpg', ''),
(9, 'victorykid.jpg', ''),
(10, 'yoda.jpg', ''),
(11, 'yuno.jpg', '');

-- --------------------------------------------------------

--
-- Structure de la table `meme_genere`
--

DROP TABLE IF EXISTS `meme_genere`;
CREATE TABLE IF NOT EXISTS `meme_genere` (
  `id_meme_genere` int(11) NOT NULL AUTO_INCREMENT,
  `mem_image` varchar(255) NOT NULL,
  PRIMARY KEY (`id_meme_genere`),
  UNIQUE KEY `id_meme_genere_UNIQUE` (`id_meme_genere`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
