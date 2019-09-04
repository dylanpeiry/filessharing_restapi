CREATE DATABASE  IF NOT EXISTS `filessharing` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `filessharing`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: filessharing
-- ------------------------------------------------------
-- Server version	5.7.19-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `files` (
  `idFile` int(11) NOT NULL AUTO_INCREMENT,
  `storedFileName` varchar(200) NOT NULL COMMENT 'FileName rendu unique pour faciliter les doublons en base de données.\n',
  `fileName` varchar(100) NOT NULL COMMENT 'Filename défini par l''utilisateur et affiché sur l''application web\n',
  `size` float NOT NULL COMMENT 'size en MO\n',
  `type` varchar(20) NOT NULL COMMENT 'Extension du fichier\n',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date de création\n',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 = private\n1 = public\n2 = shared\n',
  `idOwner` int(11) NOT NULL,
  PRIMARY KEY (`idFile`),
  KEY `fk_FILES_USERS1_idx` (`idOwner`),
  CONSTRAINT `fk_FILES_USERS1` FOREIGN KEY (`idOwner`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `files`
--

LOCK TABLES `files` WRITE;
/*!40000 ALTER TABLE `files` DISABLE KEYS */;
/*!40000 ALTER TABLE `files` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `idRole` int(11) NOT NULL AUTO_INCREMENT,
  `labelRole` varchar(45) NOT NULL COMMENT 'Administrateur, Utilisateur.\n',
  PRIMARY KEY (`idRole`),
  UNIQUE KEY `labelRole_UNIQUE` (`labelRole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Administrateur'),(2,'Utilisateur');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--



--
-- Table structure for table `users_shares_files`
--

DROP TABLE IF EXISTS `users_shares_files`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_shares_files` (
  `idFile` int(11) NOT NULL COMMENT 'Fichier partagé, pas ebsoin de spécifier l''utilisateur du fichier dans cette table vu qu''on pourra récupérer le propriétaire du fichier partagé\n',
  `idToUser` int(11) NOT NULL COMMENT 'Fichier partagé à l''utilisateur ..\n',
  `sharedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Date du partage\n',
  PRIMARY KEY (`idFile`,`idToUser`),
  KEY `fk_FILES_has_USERS_USERS1_idx` (`idToUser`),
  KEY `fk_FILES_has_USERS_FILES1_idx` (`idFile`),
  CONSTRAINT `fk_FILES_has_USERS_FILES1` FOREIGN KEY (`idFile`) REFERENCES `files` (`idFile`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_FILES_has_USERS_USERS1` FOREIGN KEY (`idToUser`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_shares_files`
--

LOCK TABLES `users_shares_files` WRITE;
/*!40000 ALTER TABLE `users_shares_files` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_shares_files` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-24 10:41:31
