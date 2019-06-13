-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 68.178.217.52    Database: marauto
-- ------------------------------------------------------
-- Server version	5.5.43-37.2-log

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
-- Table structure for table `Todcharges`
--

DROP TABLE IF EXISTS `Todcharges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Todcharges` (
  `TodId` int(11) NOT NULL,
  `tariffid` int(11) NOT NULL,
  `onpeak` float DEFAULT NULL,
  `offpeak` float DEFAULT NULL,
  `onpeaktime` varchar(20) DEFAULT NULL,
  `offpeaktime` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`TodId`),
  KEY `tariffid` (`tariffid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Todcharges`
--

LOCK TABLES `Todcharges` WRITE;
/*!40000 ALTER TABLE `Todcharges` DISABLE KEYS */;
INSERT INTO `Todcharges` VALUES (1,1,7.77,NULL,'6pm to 10pm',NULL),(2,2,8.03,NULL,'6pm to 10pm',NULL),(3,3,8.71,NULL,'6pm to 10pm',NULL),(4,4,7.77,NULL,NULL,NULL),(5,5,8.03,NULL,NULL,NULL),(6,6,8.71,NULL,NULL,NULL),(7,7,NULL,NULL,NULL,NULL),(8,8,NULL,NULL,NULL,NULL),(9,9,NULL,9.85,NULL,'11pm to 6am'),(10,10,12.15,NULL,'9am to 12pm',NULL),(11,11,12.45,NULL,'6pm to 11pm',NULL),(12,12,NULL,NULL,NULL,NULL),(13,13,NULL,NULL,NULL,NULL),(14,14,NULL,NULL,NULL,NULL),(15,18,NULL,4.25,NULL,'7am to 11pm and 6pm '),(16,0,NULL,NULL,NULL,NULL),(17,20,NULL,4.95,NULL,'7am to 11am and 6pm '),(18,24,NULL,4.45,NULL,'7am to 11am and 6pm '),(19,25,NULL,5.05,NULL,'7am to 11am and 6pm '),(20,26,NULL,5.15,NULL,'7am to 11am and 6pm '),(21,30,NULL,4.45,NULL,'7am to 11am and 6pm '),(22,31,NULL,5.05,NULL,'7am to 11am and 6pm '),(23,32,NULL,5.15,NULL,'7am to 11am and 6pm '),(24,36,NULL,4.45,NULL,'7am to 11am and 6pm '),(25,37,NULL,5.05,NULL,'7am to 11am and 6pm '),(26,38,NULL,5.15,NULL,'7am to 11am and 6pm '),(27,39,8.8,6.8,'06.00 Hrs to 10.00 H','22.00 Hrs to 06.00 H'),(28,40,8.7,6.7,'06.00 Hrs to 10.00 H','22.00 Hrs to 06.00 H'),(29,41,7.6525,NULL,'6am to 5pm',NULL),(30,41,7.9965,NULL,'5pm to 11pm',NULL),(31,41,7.439,NULL,'11pm to 6am',NULL),(32,42,7.1575,NULL,'6am to 5pm',NULL),(33,42,7.5015,NULL,'5pm to 11pm',NULL),(34,42,6.944,NULL,'11pm to 6am',NULL),(35,43,NULL,NULL,NULL,NULL),(36,44,NULL,NULL,NULL,NULL),(37,45,NULL,NULL,NULL,NULL),(38,46,NULL,NULL,NULL,NULL),(39,47,NULL,NULL,NULL,NULL),(40,48,NULL,NULL,NULL,NULL),(41,49,9.772,4.188,'5pm to 11pm','11pm to 5am'),(42,50,3.245,2.655,'6am-8am & 6pm-10pm','11pm to 5am'),(43,51,3.146,2.574,'6am-8am & 6pm-10pm','11pm to 5am'),(44,52,8.5,6.95,'17:00 to 22:00','22:00 to 6:00hrs'),(45,53,8.3,7.05,'17:00 to 22:00','22:00 to 6:00hrs'),(46,54,9.27,7.45,'17:00 to 22:00','22:00 to 6:00hrs'),(47,55,9.5,7.35,'17:00 to 22:00','22:00 to 6:00hrs'),(48,56,7.092,4.4325,'06:00pm to 11:00 pm','06:00pm to 11:00 pm'),(49,57,7.212,4.5075,'06:00pm to 11:00 pm','11:00 pm to 05:00am'),(50,58,7.632,4.77,'06:00pm to 11:00 pm','11:00 pm to 05:00am'),(51,59,8.052,5.0325,'06:00pm to 11:00 pm','11:00 pm to 05:00am'),(52,60,5.16,3.87,'6pm to 11pm','11pm to 7 am'),(53,61,5.16,3.87,'6pm to 11pm','11pm to 7 am'),(54,62,5.04,3.78,'6pm to 11pm','11pm to 7 am'),(55,63,NULL,NULL,NULL,NULL),(56,64,NULL,NULL,NULL,NULL),(57,65,NULL,NULL,NULL,NULL),(58,66,NULL,NULL,NULL,NULL),(59,67,NULL,NULL,NULL,NULL),(60,68,NULL,NULL,NULL,NULL),(61,69,NULL,NULL,NULL,NULL),(62,70,NULL,NULL,NULL,NULL),(63,71,NULL,NULL,NULL,NULL),(64,72,7.5,5,'5pm to 11pm','11pm to 6am'),(65,73,9.6,6.4,'13:00 to 17:00 & 21:','3:00 to 9:00'),(66,74,9.6,6.4,'13:00 to 17:00 & 21:','3:00 to 9:00'),(67,75,NULL,NULL,NULL,NULL),(68,76,8.6,6.1,'5pm to 11pm','10pm to 6am'),(69,77,NULL,NULL,NULL,NULL),(70,78,7.9135,5.6525,'6:30 pm to 10 pm','10 pm to 5:30 am '),(71,79,7.8064,5.576,'6:30 pm to 10 pm','10 pm to 5:30 am '),(72,80,7.6755,5.4825,'6:30 pm to 10 pm','10 pm to 5:30 am '),(73,81,7.5565,5.3975,'6:30 pm to 10 pm','10 pm to 5:30 am '),(74,82,7.4375,5.3125,'6:30 pm to 10 pm','10 pm to 5:30 am '),(75,83,6.53,3.53,'18:00 to 22:00 hrs','22:00 to 06:00'),(76,84,6.53,3.53,'18:00 to 22:00 hrs','22:00 to 06:00'),(77,85,8.12,6,'6pm to 10pm','10pm to 6am');
/*!40000 ALTER TABLE `Todcharges` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-11 11:18:32
