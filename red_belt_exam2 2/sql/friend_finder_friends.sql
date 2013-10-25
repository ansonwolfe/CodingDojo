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
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `friends` (
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (2,1,'0000-00-00 00:00:00'),(2,3,'0000-00-00 00:00:00'),(2,3,'0000-00-00 00:00:00'),(2,1,'0000-00-00 00:00:00'),(1,2,'0000-00-00 00:00:00'),(2,4,'0000-00-00 00:00:00'),(4,2,'0000-00-00 00:00:00'),(2,5,'0000-00-00 00:00:00'),(5,2,'0000-00-00 00:00:00'),(2,5,'0000-00-00 00:00:00'),(5,2,'0000-00-00 00:00:00'),(2,2,'0000-00-00 00:00:00'),(2,2,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(4,6,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(2,7,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(2,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(3,7,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(4,7,'0000-00-00 00:00:00'),(7,7,'0000-00-00 00:00:00'),(7,7,'0000-00-00 00:00:00'),(7,0,'0000-00-00 00:00:00'),(0,7,'0000-00-00 00:00:00'),(7,0,'0000-00-00 00:00:00'),(0,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,0,'0000-00-00 00:00:00'),(0,7,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(2,7,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(3,7,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(2,7,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(3,7,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(4,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(1,7,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(7,3,'0000-00-00 00:00:00'),(7,2,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,4,'0000-00-00 00:00:00'),(7,1,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(6,4,'0000-00-00 00:00:00'),(7,1,'2013-05-26 15:21:15'),(7,1,'2013-05-26 15:21:15'),(7,1,'2013-05-26 15:21:16'),(7,4,'2013-05-26 15:23:16'),(7,4,'2013-05-26 15:23:32'),(7,4,'2013-05-26 15:24:02'),(7,4,'2013-05-26 15:24:03'),(7,3,'2013-05-26 15:58:31'),(7,4,'2013-05-26 16:04:47'),(7,4,'2013-05-26 16:04:48'),(7,1,'2013-05-26 16:04:51'),(7,4,'2013-05-26 16:08:27'),(7,4,'2013-05-26 16:08:28'),(7,4,'2013-05-26 16:08:29'),(7,1,'2013-05-26 16:08:30'),(7,1,'2013-05-26 16:08:30'),(7,1,'2013-05-26 20:23:29'),(7,4,'2013-05-26 20:23:52'),(7,4,'2013-05-26 20:23:53'),(7,4,'2013-05-26 20:23:53'),(7,4,'2013-05-26 20:23:53'),(7,4,'2013-05-26 20:23:54'),(7,4,'2013-05-26 20:23:54'),(7,4,'2013-05-26 20:23:54'),(7,4,'2013-05-26 20:23:54'),(7,4,'2013-05-26 20:23:54');
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
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