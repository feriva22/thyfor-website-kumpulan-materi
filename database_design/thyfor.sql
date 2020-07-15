-- MySQL dump 10.13  Distrib 5.7.28, for Linux (x86_64)
--
-- Host: localhost    Database: thyfor
-- ------------------------------------------------------
-- Server version	5.7.28

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
-- Table structure for table `materi`
--

DROP TABLE IF EXISTS `materi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materi` (
  `mtr_id` int(11) NOT NULL AUTO_INCREMENT,
  `mtr_nama` varchar(45) DEFAULT NULL,
  `mtr_deskripsi` tinytext,
  `mtr_created` timestamp NULL DEFAULT NULL,
  `mtr_updated` timestamp NULL DEFAULT NULL,
  `mtr_subtopic` int(11) NOT NULL,
  `mtr_author` int(11) NOT NULL,
  `mtr_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`mtr_id`),
  KEY `fk_materi_subtopic1_idx` (`mtr_subtopic`),
  KEY `fk_materi_user1_idx` (`mtr_author`),
  CONSTRAINT `fk_materi_subtopic1` FOREIGN KEY (`mtr_subtopic`) REFERENCES `subtopic` (`spc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_materi_user1` FOREIGN KEY (`mtr_author`) REFERENCES `user` (`usr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materi`
--

LOCK TABLES `materi` WRITE;
/*!40000 ALTER TABLE `materi` DISABLE KEYS */;
INSERT INTO `materi` VALUES (1,'Belajar materi jquery','Belajar php dengan beberapa materi terbaik','2020-01-07 09:18:06','2020-01-07 09:18:06',1,1,1),(2,'Tes','Tes','2020-01-07 09:24:33','2020-01-07 09:24:33',3,1,1);
/*!40000 ALTER TABLE `materi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `media`
--

DROP TABLE IF EXISTS `media`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `media` (
  `mda_id` int(11) NOT NULL AUTO_INCREMENT,
  `mda_nama` varchar(255) DEFAULT NULL,
  `mda_source` varchar(255) DEFAULT NULL,
  `mda_materi` int(11) NOT NULL,
  `mda_size` int(20) DEFAULT NULL,
  `mda_created` timestamp NULL DEFAULT NULL,
  `mda_updated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`mda_id`),
  KEY `fk_media_materi1_idx` (`mda_materi`),
  CONSTRAINT `fk_media_materi1` FOREIGN KEY (`mda_materi`) REFERENCES `materi` (`mtr_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `media`
--

LOCK TABLES `media` WRITE;
/*!40000 ALTER TABLE `media` DISABLE KEYS */;
INSERT INTO `media` VALUES (1,'star(1)-resync-resync-resync.srt','9d535c6ccd59136801747e3a2f08a012.srt',1,72367,'2020-01-07 09:18:06','2020-01-07 09:18:06'),(2,'star(1)-resync-resync.srt','643e4af5d9d1bd397d937f0f0c93aef6.srt',1,72367,'2020-01-07 09:18:06','2020-01-07 09:18:06'),(3,'star(1)-resync.srt','cb7ef3b71a0ff0b9f55ecd1f6dad88ce.srt',1,72367,'2020-01-07 09:18:06','2020-01-07 09:18:06'),(4,'Invoice-108871.pdf','6ac522b2cda1b7dadf55644c5616a2e8.pdf',2,16626,'2020-01-07 09:24:33','2020-01-07 09:24:33');
/*!40000 ALTER TABLE `media` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subtopic`
--

DROP TABLE IF EXISTS `subtopic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subtopic` (
  `spc_id` int(11) NOT NULL AUTO_INCREMENT,
  `spc_nama` varchar(45) DEFAULT NULL,
  `spc_deskripsi` varchar(45) DEFAULT NULL,
  `spc_topic` int(11) NOT NULL,
  `spc_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`spc_id`),
  KEY `fk_subtopic_topic_idx` (`spc_topic`),
  CONSTRAINT `fk_subtopic_topic` FOREIGN KEY (`spc_topic`) REFERENCES `topic` (`tpc_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subtopic`
--

LOCK TABLES `subtopic` WRITE;
/*!40000 ALTER TABLE `subtopic` DISABLE KEYS */;
INSERT INTO `subtopic` VALUES (1,'HTML basic','belajar web html',1,1),(2,'Web dinamis','belajar web dinamis PHP',1,1),(3,'PHP basic','php basic cuy',1,1),(4,'Jquery Basic','Jquery mantap',1,1);
/*!40000 ALTER TABLE `subtopic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `topic` (
  `tpc_id` int(11) NOT NULL AUTO_INCREMENT,
  `tpc_nama` varchar(45) DEFAULT NULL,
  `tpc_deskripsi` varchar(45) DEFAULT NULL,
  `tpc_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`tpc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic`
--

LOCK TABLES `topic` WRITE;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` VALUES (1,'Pemrograman web','materi terkait pemrograman web',1),(2,'Manajemen basis Data','materi untuk basis data',1);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `usr_id` int(11) NOT NULL AUTO_INCREMENT,
  `usr_nama` varchar(45) DEFAULT NULL,
  `usr_email` varchar(45) DEFAULT NULL,
  `usr_photo` varchar(255) DEFAULT NULL,
  `usr_tipe` tinyint(1) DEFAULT NULL,
  `usr_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`usr_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'ferico deno vandra','ferico.vandra17@student.uisi.ac.id','sdf',0,1),(7,'ferico deva','fericodeva69@gmail.com',NULL,2,1);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-01  5:31:35
