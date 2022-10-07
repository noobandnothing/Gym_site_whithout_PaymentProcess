-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: GymDB
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Admin_GYM`
--

DROP TABLE IF EXISTS `Admin_GYM`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admin_GYM` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_username` varchar(50) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `admin_username` (`admin_username`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admin_GYM`
--

LOCK TABLES `Admin_GYM` WRITE;
/*!40000 ALTER TABLE `Admin_GYM` DISABLE KEYS */;
INSERT INTO `Admin_GYM` VALUES (1,'admin','admin','admin');
/*!40000 ALTER TABLE `Admin_GYM` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Branch_info`
--

DROP TABLE IF EXISTS `Branch_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Branch_info` (
  `Bra_id` int(11) NOT NULL AUTO_INCREMENT,
  `Bra_Name` varchar(50) NOT NULL,
  `Bra_Phone` varchar(70) NOT NULL,
  `Bra_Describe` varchar(300) NOT NULL,
  `pic_id` int(11) NOT NULL,
  `GW_id` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`Bra_id`),
  UNIQUE KEY `Bra_Phone` (`Bra_Phone`),
  UNIQUE KEY `Bra_Name` (`Bra_Name`),
  KEY `pic_id` (`pic_id`),
  KEY `GW_id` (`GW_id`),
  CONSTRAINT `Branch_info_ibfk_1` FOREIGN KEY (`pic_id`) REFERENCES `picture` (`id`),
  CONSTRAINT `Branch_info_ibfk_2` FOREIGN KEY (`GW_id`) REFERENCES `Gym_website` (`GW_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Branch_info`
--

LOCK TABLES `Branch_info` WRITE;
/*!40000 ALTER TABLE `Branch_info` DISABLE KEYS */;
INSERT INTO `Branch_info` VALUES (9,'POPO','19991',' branch welcome',140,1),(17,'AA ','2642','This is the aww branch.',174,1);
/*!40000 ALTER TABLE `Branch_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Class`
--

DROP TABLE IF EXISTS `Class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Class` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(70) NOT NULL,
  `class_describe` varchar(300) NOT NULL,
  `class_start` varchar(20) NOT NULL,
  `class_end` varchar(20) NOT NULL,
  `class_Day` varchar(20) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `pic_id` int(11) NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_name` (`class_start`,`class_end`,`class_name`,`branch_id`,`class_Day`) USING BTREE,
  KEY `branch_id` (`branch_id`),
  KEY `pic_fk` (`pic_id`),
  CONSTRAINT `Class_ibfk_1` FOREIGN KEY (`branch_id`) REFERENCES `Branch_info` (`Bra_id`),
  CONSTRAINT `pic_fk` FOREIGN KEY (`pic_id`) REFERENCES `picture` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Class`
--

LOCK TABLES `Class` WRITE;
/*!40000 ALTER TABLE `Class` DISABLE KEYS */;
INSERT INTO `Class` VALUES (7,'crossFit ','CrossFit is a branded fitness regimen that involves constantly varied functional movements performed at high intensity','19:00','20:00','Sunday',9,142),(8,'Aerobics','Set to music and led by a qualified instructor who takes you through a variety of structured movements that raise your heart rate and get blood and oxygen flowing more quickly.','15:03','16:00','Monday',9,143),(9,'Yoga ','This class incorporates yoga postures, gentle movement sequences, breath work, supported silent meditation, and guided relaxation to support increased awareness and mindfulness of the breath and body, and quieting of the nervous system.','17:00','18:00','Thursday',9,144);
/*!40000 ALTER TABLE `Class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Customer`
--

DROP TABLE IF EXISTS `Customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Customer` (
  `cust_id` int(11) NOT NULL AUTO_INCREMENT,
  `cust_birth_date` date NOT NULL,
  `cust_Phone_num` varchar(100) NOT NULL,
  `cust_FirstName` varchar(50) NOT NULL,
  `cust_LastName` varchar(50) NOT NULL,
  `cust_username` varchar(50) NOT NULL,
  `cust_pass` varchar(250) NOT NULL,
  `GW_id` int(11) NOT NULL DEFAULT 1,
  `Mem_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cust_id`),
  UNIQUE KEY `cust_username` (`cust_username`),
  UNIQUE KEY `cust_Phone_num` (`cust_Phone_num`),
  UNIQUE KEY `my_uniq_id` (`cust_id`,`Mem_id`),
  KEY `GW_id` (`GW_id`),
  KEY `Mem_id` (`Mem_id`),
  CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`GW_id`) REFERENCES `Gym_website` (`GW_id`),
  CONSTRAINT `Customer_ibfk_2` FOREIGN KEY (`Mem_id`) REFERENCES `Membership` (`Mem_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Customer`
--

LOCK TABLES `Customer` WRITE;
/*!40000 ALTER TABLE `Customer` DISABLE KEYS */;
INSERT INTO `Customer` VALUES (11,'2001-04-05','07775000','Mohamed ','omar','mr hamada','123',1,NULL),(12,'2002-05-01','01545486654','ahmed','mohamed','hamada2','123',1,NULL),(13,'2003-03-03','012345678910','Mohamed','Omar','MenoobSir','123',1,NULL);
/*!40000 ALTER TABLE `Customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Gym_website`
--

DROP TABLE IF EXISTS `Gym_website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Gym_website` (
  `GW_id` int(11) NOT NULL AUTO_INCREMENT,
  `GW_name` varchar(50) NOT NULL,
  PRIMARY KEY (`GW_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Gym_website`
--

LOCK TABLES `Gym_website` WRITE;
/*!40000 ALTER TABLE `Gym_website` DISABLE KEYS */;
INSERT INTO `Gym_website` VALUES (1,'GSP');
/*!40000 ALTER TABLE `Gym_website` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Ins_Class`
--

DROP TABLE IF EXISTS `Ins_Class`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ins_Class` (
  `Ins_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  PRIMARY KEY (`Ins_id`,`class_id`),
  KEY `class_id` (`class_id`),
  CONSTRAINT `Ins_Class_ibfk_1` FOREIGN KEY (`Ins_id`) REFERENCES `Instructor` (`Ins_id`),
  CONSTRAINT `Ins_Class_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ins_Class`
--

LOCK TABLES `Ins_Class` WRITE;
/*!40000 ALTER TABLE `Ins_Class` DISABLE KEYS */;
INSERT INTO `Ins_Class` VALUES (30,7),(39,7),(40,8);
/*!40000 ALTER TABLE `Ins_Class` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Instructor`
--

DROP TABLE IF EXISTS `Instructor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Instructor` (
  `Ins_id` int(11) NOT NULL AUTO_INCREMENT,
  `Ins_Description` varchar(300) NOT NULL,
  `Ins_Phone` varchar(100) NOT NULL,
  `Ins_Firstname` varchar(50) NOT NULL,
  `Ins_Lastname` varchar(50) NOT NULL,
  `Ins_pic` int(11) NOT NULL,
  PRIMARY KEY (`Ins_id`),
  UNIQUE KEY `Ins_Firstname` (`Ins_Firstname`,`Ins_Lastname`),
  UNIQUE KEY `Ins_Phone` (`Ins_Phone`),
  KEY `Ins_pic` (`Ins_pic`),
  CONSTRAINT `Instructor_ibfk_1` FOREIGN KEY (`Ins_pic`) REFERENCES `picture` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Instructor`
--

LOCK TABLES `Instructor` WRITE;
/*!40000 ALTER TABLE `Instructor` DISABLE KEYS */;
INSERT INTO `Instructor` VALUES (30,'This the most amazing coach you will ever have','09584984','aasd','ss',141),(39,'Mamdouh Mohammed Hassan Elssbiay  born 16 September 1984), better known as Big Ramy, is an Egyptian IFBB professional bodybuilder.He is the 2020 and 2021 reigning and defending Mr. Olympia bodybuilding champion','012345678910','Big','Ramy',173),(40,'the most famous body builder in egypt','015545885','Big','yasmeen',175);
/*!40000 ALTER TABLE `Instructor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Membership`
--

DROP TABLE IF EXISTS `Membership`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Membership` (
  `Mem_id` int(11) NOT NULL AUTO_INCREMENT,
  `Mem_Price` int(11) NOT NULL,
  `Mem_ED` date NOT NULL,
  `Mem_type` varchar(20) NOT NULL,
  `cust_id` int(11) NOT NULL,
  PRIMARY KEY (`Mem_id`),
  KEY `fk_cust_id` (`cust_id`),
  CONSTRAINT `fk_cust_id` FOREIGN KEY (`cust_id`) REFERENCES `Customer` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Membership`
--

LOCK TABLES `Membership` WRITE;
/*!40000 ALTER TABLE `Membership` DISABLE KEYS */;
/*!40000 ALTER TABLE `Membership` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `picture`
--

DROP TABLE IF EXISTS `picture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `picture` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `picture`
--

LOCK TABLES `picture` WRITE;
/*!40000 ALTER TABLE `picture` DISABLE KEYS */;
INSERT INTO `picture` VALUES (139,'1.jpg'),(140,'140.jpg'),(141,'141.jpg'),(142,'142.jpg'),(143,'143.jpg'),(144,'144.jpg'),(145,'145.jpeg'),(146,'146.png'),(147,'147.png'),(148,'148.png'),(149,'149.png'),(150,'150.jpeg'),(151,'151.jpeg'),(152,'152.jpeg'),(153,'153.png'),(154,'154.png'),(155,'155.png'),(156,'156.jpeg'),(157,'157.png'),(158,'158.png'),(159,'159.png'),(160,'160.png'),(161,'161.jpeg'),(162,'162.png'),(163,'163.png'),(164,'164.png'),(165,'165.png'),(166,'166.png'),(167,'167.png'),(168,'168.png'),(169,'169.png'),(170,'170.png'),(171,'171.png'),(172,'172.png'),(173,'173.jpeg'),(174,'174.jpeg'),(175,'175.jpeg');
/*!40000 ALTER TABLE `picture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subscription`
--

DROP TABLE IF EXISTS `subscription`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subscription` (
  `class_id` int(11) NOT NULL,
  `cust_id` int(11) NOT NULL,
  `Sub_date` date NOT NULL,
  PRIMARY KEY (`class_id`,`cust_id`),
  UNIQUE KEY `my_uniq_id` (`class_id`,`cust_id`,`Sub_date`),
  KEY `cust_id` (`cust_id`),
  CONSTRAINT `subscription_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `Class` (`class_id`),
  CONSTRAINT `subscription_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `Customer` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subscription`
--

LOCK TABLES `subscription` WRITE;
/*!40000 ALTER TABLE `subscription` DISABLE KEYS */;
INSERT INTO `subscription` VALUES (7,12,'2022-06-08'),(7,13,'2022-06-08');
/*!40000 ALTER TABLE `subscription` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-08 14:30:14
