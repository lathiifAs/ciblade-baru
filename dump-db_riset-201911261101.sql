-- MySQL dump 10.16  Distrib 10.1.37-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: db_riset
-- ------------------------------------------------------
-- Server version	10.1.37-MariaDB

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
-- Table structure for table `com_group`
--

DROP TABLE IF EXISTS `com_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_group` (
  `group_id` varchar(2) NOT NULL,
  `group_name` varchar(50) DEFAULT NULL,
  `group_desc` varchar(100) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(40) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_group`
--

LOCK TABLES `com_group` WRITE;
/*!40000 ALTER TABLE `com_group` DISABLE KEYS */;
INSERT INTO `com_group` VALUES ('1','Developer web','Group developer website','1911130001',NULL,'2019-11-22 09:44:11'),('2','Operator','Admin Operator','1911130001',NULL,'2019-11-22 09:47:26');
/*!40000 ALTER TABLE `com_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_menu`
--

DROP TABLE IF EXISTS `com_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_menu` (
  `nav_id` int(11) NOT NULL,
  `parent_id` varchar(10) DEFAULT NULL,
  `nav_title` varchar(50) DEFAULT NULL,
  `nav_desc` varchar(100) DEFAULT NULL,
  `nav_url` varchar(100) DEFAULT NULL,
  `nav_no` int(11) unsigned DEFAULT NULL,
  `client_st` enum('1','0') DEFAULT '0',
  `active_st` enum('1','0') DEFAULT '1',
  `display_st` enum('1','0') DEFAULT '1',
  `nav_icon` varchar(50) DEFAULT NULL,
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_menu`
--

LOCK TABLES `com_menu` WRITE;
/*!40000 ALTER TABLE `com_menu` DISABLE KEYS */;
INSERT INTO `com_menu` VALUES (2,'0','Master Data','','#',20,'0','1','1','ti-harddrives','1911130001','admin','2019-11-22 04:05:43'),(3,'2','User','menu user','master/user',1,'0','1','1','','1911130001','admin','2019-11-22 04:06:47'),(4,'0','Sistem','','#',21,'0','1','1','ti-settings','1911130001','admin','2019-11-22 04:06:08'),(5,'4','Menu Navigasi','navigasi','sistem/navigation',1,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:30:53'),(6,'4','Role','master role','sistem/role',3,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:31:23'),(7,'4','Group','group role','sistem/group',2,'0','1','1',NULL,'1911130001','admin','2019-11-21 17:32:32'),(8,'0','Logout','logout','sistem/login/logout',100,'0','1','1','ti-close','1911130001','admin','2019-11-22 04:06:36'),(9,'0','Beranda','Link to beranda','client/beranda',99,'0','1','1','ti-home','1911130001','admin','2019-11-22 04:06:20'),(10,'0','Dashboard','','#',1,'0','1','1','ti-home','1911130001','admin','2019-11-22 04:54:22'),(11,'10','Dashboard','dashboard content','welcome',1,'0','1','1','','1911130001','admin','2019-11-22 04:58:30'),(12,'4','Permission','Hak akses user','sistem/permission',4,'0','1','1','','1911130001','admin','2019-11-22 08:03:16');
/*!40000 ALTER TABLE `com_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_reset_pass`
--

DROP TABLE IF EXISTS `com_reset_pass`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_reset_pass` (
  `data_id` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `nomor_telepon` varchar(50) DEFAULT NULL,
  `nama_lengkap` varchar(50) DEFAULT NULL,
  `jabatan` varchar(50) DEFAULT NULL,
  `request_date` datetime DEFAULT NULL,
  `request_st` enum('1','0','2') DEFAULT '0',
  `response_by` varchar(10) DEFAULT NULL,
  `response_date` datetime DEFAULT NULL,
  `response_notes` varchar(100) DEFAULT NULL,
  `request_expired` datetime DEFAULT NULL,
  `request_key` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`data_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_reset_pass`
--

LOCK TABLES `com_reset_pass` WRITE;
/*!40000 ALTER TABLE `com_reset_pass` DISABLE KEYS */;
/*!40000 ALTER TABLE `com_reset_pass` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_role`
--

DROP TABLE IF EXISTS `com_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_role` (
  `role_id` varchar(5) NOT NULL,
  `group_id` varchar(2) DEFAULT NULL,
  `role_nm` varchar(100) DEFAULT NULL,
  `role_desc` varchar(100) DEFAULT NULL,
  `mdb` varchar(50) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`role_id`),
  KEY `group_id` (`group_id`),
  CONSTRAINT `com_role_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `com_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_role`
--

LOCK TABLES `com_role` WRITE;
/*!40000 ALTER TABLE `com_role` DISABLE KEYS */;
INSERT INTO `com_role` VALUES ('1','1','Developer','Web developer','1911130001',NULL,'2019-11-22 09:45:00'),('2','2','Administrator','Admin Website','admin',NULL,'2019-11-13 07:49:08');
/*!40000 ALTER TABLE `com_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_role_menu`
--

DROP TABLE IF EXISTS `com_role_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_role_menu` (
  `role_id` varchar(5) NOT NULL,
  `nav_id` varchar(10) NOT NULL,
  `role_tp` varchar(4) NOT NULL DEFAULT '1111',
  PRIMARY KEY (`nav_id`,`role_id`),
  KEY `role_id` (`role_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_role_menu`
--

LOCK TABLES `com_role_menu` WRITE;
/*!40000 ALTER TABLE `com_role_menu` DISABLE KEYS */;
INSERT INTO `com_role_menu` VALUES ('1','10','1111'),('2','10','1111'),('1','11','1111'),('2','11','1111'),('1','12','1111'),('1','2','1111'),('1','3','1111'),('1','4','1111'),('1','5','1111'),('1','6','1111'),('1','7','1111'),('1','8','1111'),('2','8','1111'),('1','9','1111');
/*!40000 ALTER TABLE `com_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_role_user`
--

DROP TABLE IF EXISTS `com_role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_role_user` (
  `user_id` varchar(10) NOT NULL,
  `role_id` varchar(5) NOT NULL,
  `role_default` enum('1','2') DEFAULT '2',
  `role_display` enum('1','0') DEFAULT '1',
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `com_role_user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `com_role_user_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `com_role` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_role_user`
--

LOCK TABLES `com_role_user` WRITE;
/*!40000 ALTER TABLE `com_role_user` DISABLE KEYS */;
INSERT INTO `com_role_user` VALUES ('1911130001','1','2','1'),('1911260001','2','2','1');
/*!40000 ALTER TABLE `com_role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_user`
--

DROP TABLE IF EXISTS `com_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_user` (
  `user_id` varchar(10) NOT NULL,
  `user_name` varchar(50) DEFAULT NULL,
  `user_pass` varchar(255) DEFAULT NULL,
  `user_key` varchar(50) DEFAULT NULL,
  `user_mail` varchar(50) DEFAULT NULL,
  `user_st` enum('1','0','2') DEFAULT NULL,
  `examiner_number` varchar(50) DEFAULT NULL COMMENT 'Medex - Nomor Penunjukan Penguji',
  `mdb` varchar(10) DEFAULT NULL,
  `mdb_name` varchar(50) DEFAULT NULL,
  `mdd` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_user`
--

LOCK TABLES `com_user` WRITE;
/*!40000 ALTER TABLE `com_user` DISABLE KEYS */;
INSERT INTO `com_user` VALUES ('1911130001','admin','wyfQcbk+WwSzsPR7hUspxC2FJuqTTAXXgcxtcH5OeWFY0EeW04RxVFo1+vjcTx5Nkfrn4beQSewYWzj58egKGw==','2282622326','adminadmin@gmail.com','1',NULL,'',NULL,'2019-11-13 04:30:11'),('1911260001','operator','ObruB8N5PI7qZkNiEOZnRZTRhvC/dnZgRM+Pc91rYx4+kEik8CCzt+go80zQzPJFQ0LjIX+UueRDbg2J00BETA==','3618023297','op@gmail.com','1',NULL,'1911130001','admin','2019-11-26 03:51:55');
/*!40000 ALTER TABLE `com_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_user_login`
--

DROP TABLE IF EXISTS `com_user_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_user_login` (
  `user_id` varchar(10) NOT NULL,
  `login_date` datetime NOT NULL,
  `logout_date` datetime DEFAULT NULL,
  `ip_address` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`login_date`),
  CONSTRAINT `com_user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_user_login`
--

LOCK TABLES `com_user_login` WRITE;
/*!40000 ALTER TABLE `com_user_login` DISABLE KEYS */;
/*!40000 ALTER TABLE `com_user_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `com_user_super`
--

DROP TABLE IF EXISTS `com_user_super`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `com_user_super` (
  `user_id` varchar(10) NOT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `com_user_super_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `com_user_super`
--

LOCK TABLES `com_user_super` WRITE;
/*!40000 ALTER TABLE `com_user_super` DISABLE KEYS */;
INSERT INTO `com_user_super` VALUES ('1911130001');
/*!40000 ALTER TABLE `com_user_super` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `user_id` char(10) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `alamat` text,
  `user_img` text,
  `jns_kelamin` enum('L','P') DEFAULT NULL,
  `hp` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `com_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES ('1911130001','admin','indramayu',NULL,'L',NULL),('1911260001','operator','',NULL,'L',NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'db_riset'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-11-26 11:01:25
