-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2018 at 05:17 AM
-- Server version: 5.7.17
-- PHP Version: 7.1.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bdjeuvideo`
--
CREATE DATABASE IF NOT EXISTS `bdjeuvideo` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bdjeuvideo`;

DROP TABLE IF EXISTS `membres`;
CREATE TABLE `membres` (
  `idm` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `datnais` date DEFAULT NULL,
  `pseudo` varchar(50) COLLATE utf8_unicode_ci NOT NULL UNIQUE,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateinsc` date DEFAULT NULL,
  `status` 	 ENUM('activé','désactivé') DEFAULT 'activé',
  `role` 	   ENUM('ADMIN','UTILISATEUR') DEFAULT 'UTILISATEUR',
  PRIMARY KEY (`idm`)
  
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `membres`
--

INSERT INTO `membres` (`idm`, `nom`, `prenom`, `datnais`, `pseudo`, `avatar`, `dateinsc`, `status`, `role`) VALUES
(2, 'Durant', 'Alexandre', '1979-04-04', 'Alexi', '8e92551ccdd0b9799519af1fff9879973ca28a5b.jpg', '2018-04-10', 'activé', 'ADMIN'),
(3, 'Suzanne', 'Dubois', '1996-08-08', 'Suzy', '33efc5b4068499ca175a28a5642523910104c6bc.png', '2018-04-13', 'désactivé', 'UTILISATEUR'),
(8, 'pierrot', 'dumas', '2000-02-10', 'pierr', '0f2f7b016898dae2c1c3f48de7ec885df1d24f9a.jpg', '2018-04-30', 'activé', 'UTILISATEUR'),
(9, 'abcde', 'fgh', '2000-02-10', 'paul', '53318f543b25d33fdd496605327c16b14e89e86e.png', '2018-04-30', 'désactivé', 'UTILISATEUR'),
(11, 'aaa', 'bbb', '2001-01-01', 'ccc', 'efd115a6c0c3ed85dc24b8cf960803da3dadb96f.png', '2018-05-10', 'activé', 'UTILISATEUR'),
(13, 'jeanjean', 'jeanjean', '2001-01-01', 'valjean', '27b1db115a55ae99b2473d332ab2ef9bb0887eb4.jpg', '2018-05-13', 'activé', 'UTILISATEUR'),
(14, 'ronaldo', 'riri', '2001-01-01', 'roni', '7b21115bf546541e96e93cbaf82309466e7e1f96.png', '2018-05-13', 'activé', 'UTILISATEUR'),
(15, 'nicola', 'nick', '2010-01-01', 'nicolai', 'aaf0082fd52ab5aa59cfb61d0722b2a6c42549da.png', '2018-05-13', 'activé', 'UTILISATEUR'),
(16, 'lenn', 'lean', '2011-01-01', 'lenn', 'b71a3c0afa0bd5e86b92b6a2e8fc90abf8b88b26.png', '2018-05-13', 'activé', 'UTILISATEUR'),
(17, 'jaja', 'aaa', '2012-01-01', 'jajo', '3651ccb7fe9b0bd5d08007012019542803a9dacd.png', '2018-05-13', 'activé', 'UTILISATEUR');


DROP TABLE IF EXISTS `connexion`;

CREATE TABLE `connexion` (
  `idm` int(11) NOT NULL,
  `courriel` varchar(100) NOT NULL UNIQUE,
  `motdepasse` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `connexion`
  ADD CONSTRAINT `connexion_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`)
  ON DELETE CASCADE;

--
-- Déchargement des données de la table `connexion`
--

INSERT INTO `connexion` (`idm`, `courriel`, `motdepasse`) VALUES
(2, 'admin@gmail.com', 'ADMIN'),
(11, 'ddd@gmail.com', 'abc'),
(17, 'jajo@gmail.com', 'abc'),
(16, 'lenn@gmail.com', 'abc'),
(15, 'nicolai@gmail.com', 'abc'),
(9, 'paul@gmail.com', 'abc'),
(8, 'pierr@gmail.com', 'abc'),
(14, 'roni@gmail.com', 'abc'),
(3, 'suzannedubois@gmail.com', 'abc'),
(13, 'valjean@gmail.com', 'abc');

DROP TABLE IF EXISTS `jeux`;
CREATE TABLE `jeux` (
  `idj` int(11) NOT NULL AUTO_INCREMENT,
  `idm` int(11) NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idcatj` int(11) NOT NULL,
  `pochette` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `fichej` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nblike` int(11) NOT NULL,
  `nbdislike` int(11) NOT NULL,
   `descr` text COLLATE utf8_unicode_ci,
  `trailer` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
 `dateinsc` date DEFAULT NULL,
 `statusj` 	 ENUM('activé','désactivé') DEFAULT 'désactivé',
  PRIMARY KEY (`idj`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Déchargement des données de la table `jeux`
--

INSERT INTO `jeux` (`idj`, `idm`, `nom`, `idcatj`, `pochette`, `fichej`, `nblike`, `nbdislike`, `descr`, `trailer`, `dateinsc`, `statusj`) VALUES
(5, 2, 'Donkey Kong', 2, 'b015fa9f5ec328f5d4aa55826518ddf1c5433cf6.jpg', 'tester.exe', 0, 0, 'platform 2D', 'Donkey Kong', '2018-05-12', 'activé'),
(6, 2, 'Metroid', 3, 'fbc5891b4687f1b96d17546707de0c28e7eb37de.jpg', 'tester.exe', 0, 0, 'action platform 2d', 'Metroid', '2018-05-12', 'activé'),
(7, 2, 'Mario Kart', 4, '879a24e7ca268e19107328dd35eaa11c66b8b3f3.jpg', '879a24e7ca268e19107328dd35eaa11c66b8b3f3.EXE', 0, 0, 'Jeux de course 3D', 'Mario Kart', '2018-05-12', 'activé'),
(11, 2, 'Zelda', 2, '52990efb27a27eea72aa290275082fd8bd703918.png', '52990efb27a27eea72aa290275082fd8bd703918.exe', 0, 0, "Jeu vol d\'oiseau", 'Zelda', '2018-05-13', 'activé'),
(12, 8, 'blabla', 2, 'avatar.jpg', 'tester.exe', 0, 0, 'blibli', 'blabla', '2018-05-14', 'activé'),
(14, 13, 'Megaman', 3, '45a4742d843f47a1f22e3548dbb9945fd7f9d93c.jpg', '45a4742d843f47a1f22e3548dbb9945fd7f9d93c.EXE', 0, 0, 'Shooter platform 2D', 'Megaman', '2018-05-14', 'activé');


DROP TABLE IF EXISTS `categjeux`;
CREATE TABLE `categjeux` (
  `idcatj` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idcatj`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categjeux` (`idcatj`, `nom`) VALUES
(1, 'Arcade'),
(2, 'Aventure'),
(3, 'Action'),
(4, 'Sport');

DROP TABLE IF EXISTS `membres_jeux`;
CREATE TABLE `membres_jeux` (
  `idm` int(11) NOT NULL,
  `idj` int(11) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;;


ALTER TABLE `jeux`
  ADD CONSTRAINT `jeux_idcatj_FK` FOREIGN KEY (`idcatj`) REFERENCES `categjeux` (`idcatj`);

ALTER TABLE `jeux`
ADD CONSTRAINT `jeux_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`)
ON DELETE CASCADE;;


ALTER TABLE `membres_jeux`
ADD CONSTRAINT `membres_jeux_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`)
ON DELETE CASCADE;;

ALTER TABLE `membres_jeux`
ADD CONSTRAINT `membres_jeux_idj_FK` FOREIGN KEY (`idj`) REFERENCES `jeux` (`idj`);
COMMIT;


DROP TABLE IF EXISTS `messages`;
CREATE TABLE `messages` (
  `idmes` int(11) NOT NULL AUTO_INCREMENT,
  `idm` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `idcatm` int(11) NOT NULL,
   `datemes` date DEFAULT NULL,
  
  PRIMARY KEY (`idmes`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`idmes`, `idm`, `message`, `image`, `idcatm`, `datemes`) VALUES
(17, 2, 'testfinal', 'avatar.jpg', 4, '2018-05-04'),
(20, 2, 'console cool pour toi', 'acb8a1389bf2e5b791153cf0ea62e72ac25802cd.jpg', 2, '2018-05-12');

DROP TABLE IF EXISTS `categmes`;
CREATE TABLE `categmes` (
  `idcatm` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`idcatm`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `categmes` (`idcatm`, `nom`) VALUES
(1, 'Vente'),
(2, 'Echange'),
(3, 'Developpeurs'),
(4, 'Astuces'),
(5, 'Evenements'),
(6, 'Meilleurs jeux');

ALTER TABLE `messages`
  ADD CONSTRAINT `messages_idcatm_FK` FOREIGN KEY (`idcatm`) REFERENCES `categmes` (`idcatm`);
 

ALTER TABLE `messages`
  ADD CONSTRAINT `messages_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`)
  ON DELETE CASCADE;


DROP TABLE IF EXISTS `evenements`;
CREATE TABLE `evenements` (
  `idev` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dateev` date DEFAULT NULL,
  `descr` text COLLATE utf8_unicode_ci,
  `img1` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img2` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `img3` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  
  PRIMARY KEY (`idev`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Déchargement des données de la table `evenements`
--

INSERT INTO `evenements` (`idev`, `titre`, `dateev`, `descr`, `img1`, `img2`, `img3`) VALUES
(11, 'Soirée FEZ!!!', '2018-05-16', 'FEZ est un jeux vidéo indie-puzzle développée par polytron. Viens t`amuser le 11 juin, N`oublies pas d`inviter tes amis!!!', '18ea9e985e6dd10388fc0b57226281a0733192ee.jpg', '', ''),
(12, 'Team up!!!', '2018-05-16', 'L`événement Team up!!! MarioKart à eu lieu au pub LiveStage, c`etait vraiment cool et comme toujours dans nintendo 64 Josh à été le meilleur ;) ', '16fc02cfbf0be2e51e0afad8918619d297ea1160.jpg', 'd33c213add94a6f1ddc1bb70d3ebc08e5b313a77.jpg', '056cdbfdcd200c40aecaaa6b6611606fd39bf4a3.jpg'),
(13, 'SPEEDRUN!!!', '2018-05-16', 'DonkeyKong country 2! un de nos classiques favoris, probablement le meilleur speedrunner invité Séraphin Laurent!', '91b98dcdcdacb085a7a6bf71b5a87c030792695b.jpg', 'aebd2aa836ad8268dc5f22ff35662eba26e99ca4.jpg', '9d6c051481919760603917a9700b65cbde9bdabd.jpg');


DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `idcont` int(11) NOT NULL AUTO_INCREMENT,
  `idm` int(11) NOT NULL,
  `message` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `datecont` date DEFAULT NULL,
  
  PRIMARY KEY (`idcont`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_idm_FK` FOREIGN KEY (`idm`) REFERENCES `membres` (`idm`)
  ON DELETE CASCADE;