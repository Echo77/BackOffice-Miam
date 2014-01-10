# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Hôte: 172.31.45.113 (MySQL 5.5.33)
# Base de données: miamdb
# Temps de génération: 2014-01-06 14:31:02 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table Commentaire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Commentaire`;

CREATE TABLE `Commentaire` (
  `id_Comment` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Consommateur` varchar(50) DEFAULT NULL,
  `texte` text,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id_Comment`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table Consommateur
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Consommateur`;

CREATE TABLE `Consommateur` (
  `id_Consommateur` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_Consommateur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table Horaire
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Horaire`;

CREATE TABLE `Horaire` (
  `id_Horaire` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `start` text,
  `end` text,
  PRIMARY KEY (`id_Horaire`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table HorairePlat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `HorairePlat`;

CREATE TABLE `HorairePlat` (
  `id_Plat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Horaire` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table Ingredient
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Ingredient`;

CREATE TABLE `Ingredient` (
  `id_Ingredient` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `regime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_Ingredient`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table MenuComposition
# ------------------------------------------------------------

DROP TABLE IF EXISTS `MenuComposition`;

CREATE TABLE `MenuComposition` (
  `id_Menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Plat` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table menus
# ------------------------------------------------------------

DROP TABLE IF EXISTS `menus`;

CREATE TABLE `menus` (
  `id_Menu` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prix` int(10) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_Menu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;

INSERT INTO `menus` (`id_Menu`, `prix`, `nom`, `description`)
VALUES
	(1,2,'Poulet','et mon cul c\'est du poulet ?'),
	(2,5,'test','test'),
	(3,5,'coucou','COUCOU'),
	(4,5,'test','test'),
	(5,42,'coucou','xoucou'),
	(6,200,'test','du test ! '),
	(7,400,'deuxieme test','zlkejrkzejr'),
	(8,2,'florian','ne vaut pas trÃ¨s cher'),
	(9,1,'Florian en sauce','ce n\'est pas trÃ¨s bon '),
	(15,0,'gdfg','fdgdfg');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table plats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plats`;

CREATE TABLE `plats` (
  `id_Plat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prix` int(10) DEFAULT NULL,
  `calorie` int(10) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id_Plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `plats` WRITE;
/*!40000 ALTER TABLE `plats` DISABLE KEYS */;

INSERT INTO `plats` (`id_Plat`, `prix`, `calorie`, `nom`, `categorie`, `photo`, `description`)
VALUES
	(1,32,0,'test','dsfsdf',NULL,'test');

/*!40000 ALTER TABLE `plats` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table Recette
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Recette`;

CREATE TABLE `Recette` (
  `id_Plat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Ingredient` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table Saison
# ------------------------------------------------------------

DROP TABLE IF EXISTS `Saison`;

CREATE TABLE `Saison` (
  `id_Saison` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `start` text,
  `end` text,
  PRIMARY KEY (`id_Saison`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table SaisonPlat
# ------------------------------------------------------------

DROP TABLE IF EXISTS `SaisonPlat`;

CREATE TABLE `SaisonPlat` (
  `id_Plat` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_Saison` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_Plat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Affichage de la table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
