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
-- Table structure for table `State`
--

DROP TABLE IF EXISTS `State`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `State` (
  `DisNo` int(11) NOT NULL,
  `statename` varchar(45) NOT NULL,
  `disname` varchar(45) NOT NULL,
  PRIMARY KEY (`DisNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `State`
--

LOCK TABLES `State` WRITE;
/*!40000 ALTER TABLE `State` DISABLE KEYS */;
INSERT INTO `State` VALUES (1,'Andhra Pradesh','APEPDCL'),(2,'Andhra Pradesh','APSPDCL'),(3,'Orissa','WESCO'),(4,'Maharastra','MSEDCL'),(5,'Madhya Pradesh','MKVVCL'),(6,'Gujarat','UGVCL'),(7,'Gujarat','MGVCL'),(8,'Gujarat','PGVCL'),(9,'Gujarat','DGVCL'),(10,'Karnataka','BESCOM'),(11,'Karnataka','GESCOM'),(12,'Karnataka','CESCL'),(13,'Kerala','KSEBL'),(14,'Himachal Pradesh','HPSEBL'),(15,'Tripura','TSECL'),(16,'Jammu and Kashmir','PDD'),(17,'Uttar Pradesh','PAVVNL'),(18,'Uttar Pradesh','PUVVNL'),(19,'Chattisgarh','CSPDCL'),(20,'Goa','E.DEPT'),(21,'Rajasthan','JVVNL'),(22,'Rajasthan','JDVVNL'),(23,'Rajasthan','AVVNL'),(24,'Bihar','NBPDCL'),(25,'Bihar','SBPDCL'),(26,'Meghalaya','MEDCL'),(27,'Delhi','BRPL'),(28,'Delhi','TPDLL'),(29,'Mizoram','P&E DEPT'),(30,'Assam','APDCL'),(31,'Haryana','DHBVN'),(32,'Haryana','UHBVN'),(33,'Uttarakhand','UPCL'),(34,'Punjab','PSPCL');
/*!40000 ALTER TABLE `State` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-11 11:18:37
