CREATE DATABASE  IF NOT EXISTS `friend_finder` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `friend_finder`;
-- MySQL dump 10.13  Distrib 5.5.24, for osx10.5 (i386)
--
-- Host: 127.0.0.1    Database: friend_finder
-- ------------------------------------------------------
-- Server version	5.5.29

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
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `last_login` datetime NOT NULL,
  `alias` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'alpha','dog','alpha_dog@dog.com','4297f44b13955235245b2497399d7a93','2013-05-08 19:14:38','0000-00-00 00:00:00','0000-00-00 00:00:00','AD'),(2,'Mickey','Mouse','m.m@disney.com','4297f44b13955235245b2497399d7a93','2013-05-08 19:15:19','0000-00-00 00:00:00','0000-00-00 00:00:00','Mickey'),(3,'Minnie','Mouse','mmm@disney.com','4297f44b13955235245b2497399d7a93','2013-05-08 19:15:39','0000-00-00 00:00:00','0000-00-00 00:00:00','Minnie'),(4,'Donald ','Duck','d.d@disney.com','4297f44b13955235245b2497399d7a93','2013-05-08 19:15:59','0000-00-00 00:00:00','0000-00-00 00:00:00','Don'),(5,'eylem','ozaslan','eylem.ozaslan@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','2013-05-09 13:00:40','0000-00-00 00:00:00','0000-00-00 00:00:00','Eylem'),(6,'Tall ','Guy','tallguy@tall.com','4297f44b13955235245b2497399d7a93','2013-05-13 13:51:51','0000-00-00 00:00:00','2013-05-26 15:14:54','Sticks'),(7,'alpha','dog','me@postalmeme.com','4297f44b13955235245b2497399d7a93','2013-05-24 14:45:57','0000-00-00 00:00:00','2013-05-26 15:14:23','Big Dog');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-05-26 20:26:36
