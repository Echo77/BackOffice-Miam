# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# H�te: localhost (MySQL 5.5.34)
# Base de donn�es: miamdb
# Temps de g�n�ration: 2014-01-10 12:59:11 +0000
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



# Affichage de la table ingredients
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredients`;

CREATE TABLE `ingredients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `pays` varchar(255) DEFAULT NULL,
  `region` varchar(255) DEFAULT NULL,
  `description` text,
  `photo` varchar(255) DEFAULT NULL,
  `regime` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ingredients` WRITE;
/*!40000 ALTER TABLE `ingredients` DISABLE KEYS */;

INSERT INTO `ingredients` (`id`, `nom`, `pays`, `region`, `description`, `photo`, `regime`)
VALUES
	(10,'Patate','France','Poitou-charente','La patate du Poitou hummm y\'a bon ! ',NULL,'gourmand'),
	(11,'Carotte','France','Auvergne','Bark, vraiment que des mauvaises choses la bas',NULL,'Leger'),
	(12,'piment d\'espelette','Mexique','prout','Ã§a pique !',NULL,'Leger'),
	(13,'Chou','France','Limousin','fais pÃ©ter ! ',NULL,'Leger'),
	(14,'Tomate','Espagne','Catalane','C\'est rouge',NULL,'Leger');

/*!40000 ALTER TABLE `ingredients` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table ingredients_plats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `ingredients_plats`;

CREATE TABLE `ingredients_plats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plat_id` int(10) unsigned NOT NULL,
  `ingredient_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `ingredients_plats` WRITE;
/*!40000 ALTER TABLE `ingredients_plats` DISABLE KEYS */;

INSERT INTO `ingredients_plats` (`id`, `plat_id`, `ingredient_id`)
VALUES
	(6,55,10),
	(7,55,11),
	(8,55,12),
	(9,56,10),
	(10,56,12),
	(11,56,13),
	(12,57,12),
	(13,57,13);

/*!40000 ALTER TABLE `ingredients_plats` ENABLE KEYS */;
UNLOCK TABLES;


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
	(15,0,'gdfg','fdgdfg'),
	(16,13,'Coucou menu','coucoumenunuuuu');

/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table plats
# ------------------------------------------------------------

DROP TABLE IF EXISTS `plats`;

CREATE TABLE `plats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `prix` int(10) DEFAULT NULL,
  `calorie` int(10) DEFAULT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `categorie` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `plats` WRITE;
/*!40000 ALTER TABLE `plats` DISABLE KEYS */;

INSERT INTO `plats` (`id`, `prix`, `calorie`, `nom`, `categorie`, `photo`, `description`)
VALUES
	(5,23,0,'test','Entrees froides',NULL,'test'),
	(6,34,0,'prout bis','Entrees froides',NULL,'prout'),
	(7,0,34,'prout','Entrees chaude',NULL,'tprout'),
	(8,0,0,'zer','Salade',NULL,'ztzet'),
	(9,0,0,'coucou','Entrees froides',NULL,'coucou'),
	(10,0,0,'zer','Beignets',NULL,'ezr'),
	(11,0,0,'zer','Entrees chaude',NULL,'zer'),
	(12,0,0,'azer','Assiette',NULL,'azer'),
	(13,0,23,'licorne','Salade',NULL,'licorne'),
	(14,34,34,'hello','Entrees chaude',NULL,'hello'),
	(15,0,0,'coucou','Entrees chaude',NULL,'coucou'),
	(16,0,34,'test','Beignets',NULL,'test'),
	(17,34,23,'essai','Entrees froides',NULL,'essai'),
	(18,0,0,'azer','Entrees froides',NULL,'zearzer'),
	(19,0,0,'zer','Entrees froides',NULL,'zaerazer'),
	(56,20000,10000,'Constance Royal','Entrees chaude',NULL,'C\'est si bon !'),
	(57,1,3000,'Etienne en sauce','Beignets',NULL,'c\'est pas trÃ¨s bon ');

/*!40000 ALTER TABLE `plats` ENABLE KEYS */;
UNLOCK TABLES;


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
