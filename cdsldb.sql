-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cdsldb
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Table structure for table `course_subjects`
--

DROP TABLE IF EXISTS `course_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_subjects` (
  `cs_id` int(200) NOT NULL,
  `course_id` int(200) NOT NULL,
  `sub_code` varchar(200) NOT NULL,
  `year_id` int(200) NOT NULL,
  `semester` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_subjects`
--

LOCK TABLES `course_subjects` WRITE;
/*!40000 ALTER TABLE `course_subjects` DISABLE KEYS */;
INSERT INTO `course_subjects` VALUES (30,1,'AdGE',2,'Second Semerter'),(35,1,'CA1',2,'Second Semerter'),(52,1,'CA2',3,'Second Semerter'),(59,1,'CA3',4,'First Semerter'),(26,1,'CDI1',2,'First Semerter'),(34,1,'CDI2',2,'Second Semerter'),(43,1,'CDI3',3,'First Semerter'),(44,1,'CDI4',3,'First Semerter'),(50,1,'CDI5',3,'Second Semerter'),(51,1,'CDI6',3,'Second Semerter'),(56,1,'CDI7',4,'First Semerter'),(57,1,'CDI8',4,'First Semerter'),(58,1,'CDI9',4,'First Semerter'),(9,1,'CFLM1',1,'First Semerter'),(17,1,'CFLM2',1,'Second Semerter'),(38,1,'CJ3',3,'First Semerter'),(15,1,'CLJ1',1,'Second Semerter'),(31,1,'CLJ2',2,'Second Semerter'),(45,1,'CLJ4',3,'Second Semerter'),(53,1,'CLJ5',4,'First Semerter'),(60,1,'CLJ6',4,'First Semerter'),(62,1,'CPRAC',4,'Second Semerter'),(8,1,'CRIM1',1,'First Semerter'),(16,1,'CRIM2',1,'Second Semerter'),(39,1,'CRIM3',3,'First Semerter'),(40,1,'CRIM4',3,'First Semerter'),(46,1,'CRIM5',3,'Second Semerter'),(47,1,'CRIM6',3,'Second Semerter'),(54,1,'CRIM7',4,'First Semerter'),(61,1,'CRIM8',4,'Second Semerter'),(14,1,'ELP',1,'Second Semerter'),(25,1,'FRNSC1',2,'First Semerter'),(33,1,'FRNSC2',2,'Second Semerter'),(42,1,'FRNSC3',3,'First Semerter'),(48,1,'FRNSC4',3,'Second Semerter'),(49,1,'FRNSC5',3,'Second Semerter'),(55,1,'FRNSC6',4,'First Semerter'),(4,1,'GEC1',1,'First Semerter'),(5,1,'GEC2',1,'First Semerter'),(6,1,'GEC3',1,'First Semerter'),(7,1,'GEC4',1,'First Semerter'),(12,1,'GEC5',1,'Second Semerter'),(13,1,'GEC6',1,'Second Semerter'),(20,1,'GEC7',2,'First Semerter'),(28,1,'GEC8',2,'Second Semerter'),(21,1,'GEE1',2,'First Semerter'),(29,1,'GEE2',2,'Second Semerter'),(37,1,'GEE3',3,'First Semerter'),(63,1,'IRVW',4,'Second Semerter'),(23,1,'LEA1',2,'First Semerter'),(24,1,'LEA2',2,'First Semerter'),(32,1,'LEA3',2,'Second Semerter'),(41,1,'LEA4',3,'First Semerter'),(11,1,'NSTP1',1,'First Semerter'),(19,1,'NSTP2',1,'Second Semerter'),(22,1,'PC1',2,'First Semerter'),(10,1,'PE1',1,'First Semerter'),(18,1,'PE2',1,'Second Semerter'),(27,1,'PE3',2,'First Semerter'),(36,1,'PE4',2,'Second Semerter');
/*!40000 ALTER TABLE `course_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `education_bg`
--

DROP TABLE IF EXISTS `education_bg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `education_bg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `primary_educ` varchar(100) NOT NULL,
  `year_educ` varchar(100) NOT NULL,
  `secondary_educ` varchar(100) NOT NULL,
  `year_educs` varchar(100) NOT NULL,
  `tertiary_educ` varchar(100) NOT NULL,
  `year_educt` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `education_bg`
--

LOCK TABLES `education_bg` WRITE;
/*!40000 ALTER TABLE `education_bg` DISABLE KEYS */;
INSERT INTO `education_bg` VALUES (10,29,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(11,30,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(13,31,'','','','','',''),(14,32,'','','','','',''),(15,33,'','','','','',''),(16,34,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(17,35,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(18,36,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(19,37,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(20,38,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(21,39,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(22,40,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(23,41,'Tabuating Elem School','2008','Magpapayok NHS','2018','Magpapayok NHS','2020'),(24,42,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(25,6814,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(26,6814,'gvfd','5','df','2012','df','2018'),(27,6815,'sd','fsd','sfd','sdf','fsd','sfd'),(28,6816,'','','','','',''),(29,6817,'hfg','fgh','hfg','ghf','fgh','hgf'),(30,6818,'ds','vs','sdv','vsd','sdv','vsd'),(31,6819,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(32,6820,'hj','jh','jh','jmh','jmh','hj'),(33,22,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(34,23,'Tambo North Elematry','2007','Magpapalayoc','2012','Magpapalayoc','2018'),(35,24,'gdf','2007','dgf','2012','gdf','2018'),(36,25,'ghf','6765','hfg','67675','hfg','5656'),(37,26,'doms','32','doms','32','doms','32'),(38,27,'kimberly','1234','kimberly','123','kimberly','123'),(39,28,'kenneth','435','kenneth','435','kenneth','435'),(40,29,'Kingnnn','','Kingnnn','2021','Kingnnn','2017'),(41,30,'Sassdad','','Sassdad','2015','Sassdad','2008'),(42,31,'Wisely','','Wisely','2011','Wisely','2008'),(43,32,'Rabnuih','','Rabnuih','2016','Rabnuih','2015'),(44,33,'Rinaaa','','Rinaaa','2022','Rinaaa','2013'),(45,34,'Ashleyy','','Ashleyy','2009','Ashleyy','2006'),(46,35,'BengBeng','','BengBeng','2024','BengBeng','2024'),(47,36,'Vanni','','Vanni','2012','Vanni','2007'),(48,37,'CraaarCraaar','','CraaarCraaar','2022','Craaar','2019'),(49,38,'Wiselyyy','','Wiselyyy','2010','Wiselyyy','2006'),(50,39,'Alizaa','','Alizaa','2021','Alizaa','2014'),(51,40,'Eunic','','Eunic','2025','Eunic','2025'),(52,41,'diewhemn','','diewhemn','2024','diewhemn','2019'),(53,42,'Selenma','','Selenma','2025','Selenma','2025'),(54,43,'Selenma','','Selenma','2025','Selenma','2025'),(55,44,'Patrivk','','Patrivk','2025','Patrivk','2025'),(56,45,'Tambo North Elematry','','Magpapalayoc','2005','Magpapalayoc','2016'),(57,46,'prince','','prince','2025','prince','2025'),(58,50,'Bahay','','BahayBahay','2025','Bahay','2025'),(59,51,'Manddi','','Manddi','2015','Manddi','2014'),(60,52,'Analyn','','Analyn','2023','Analyn','2025'),(61,53,'Mjifdjef','','Mjifdjef','2024','Mjifdjef','2024'),(62,54,'Rasshh','','Rasshh','2019','Rasshh','2014'),(63,55,'ingir','','ingir','2021','ingir','2022'),(64,56,'Dylan','','Dylan','2014','Dylan','2011');
/*!40000 ALTER TABLE `education_bg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollment`
--

DROP TABLE IF EXISTS `enrollment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollment` (
  `student_id` varchar(200) NOT NULL,
  `date_enrolled` date NOT NULL,
  `course_id` int(200) NOT NULL,
  `midterm_grade` int(200) NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollment`
--

LOCK TABLES `enrollment` WRITE;
/*!40000 ALTER TABLE `enrollment` DISABLE KEYS */;
/*!40000 ALTER TABLE `enrollment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrrol_subject`
--

DROP TABLE IF EXISTS `enrrol_subject`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrrol_subject` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `sub_code` varchar(30) NOT NULL,
  `student_id` int(50) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrrol_subject`
--

LOCK TABLES `enrrol_subject` WRITE;
/*!40000 ALTER TABLE `enrrol_subject` DISABLE KEYS */;
INSERT INTO `enrrol_subject` VALUES (1,'CFLM1',2,'enroll'),(2,'CFLM1',3,'enroll'),(3,'CFLM1',4,'enroll'),(4,'CFLM1',5,'enroll'),(5,'CFLM2',4,'enroll'),(6,'CFLM2',5,'enroll'),(7,'CFLM2',1,'enroll'),(8,'CFLM2',2,'enroll'),(9,'CLJ2',4,'enroll'),(10,'CLJ2',5,'enroll'),(11,'CLJ2',1,'enroll'),(12,'CLJ2',2,'enroll'),(13,'CFLM1',50,''),(14,'CFLM2',50,''),(15,'CLJ1',50,''),(16,'CRIM1',50,''),(17,'CC-100',56,''),(18,'CFLM1',56,''),(19,'CFLM2',56,''),(20,'CLJ1',56,''),(21,'CRIM1',56,''),(22,'CRIM2',56,''),(23,'ELP',56,''),(24,'GEC1',56,''),(25,'GEC2',56,''),(26,'GEC3',56,''),(27,'GEC4',56,''),(28,'GEC5',56,''),(29,'GEC6',56,''),(30,'NSTP1',56,''),(31,'NSTP2',56,''),(32,'PE2',56,'');
/*!40000 ALTER TABLE `enrrol_subject` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `family_info`
--

DROP TABLE IF EXISTS `family_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `family_info` (
  `id` int(50) NOT NULL,
  `student_id` int(50) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `occupaion_f` varchar(50) NOT NULL,
  `mothers_name` varchar(50) NOT NULL,
  `occupaion_m` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `relation` varchar(50) NOT NULL,
  `g_address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `family_info`
--

LOCK TABLES `family_info` WRITE;
/*!40000 ALTER TABLE `family_info` DISABLE KEYS */;
INSERT INTO `family_info` VALUES (0,27,'','','','','','',''),(0,28,'','','','','','',''),(0,30,'Cesar','Operator','Mary Jane','House Wife','Mary Jane','Mother',''),(0,31,'','','','','','',''),(0,32,'','','','','','',''),(0,33,'','','','','','',''),(0,34,'Cesar Domingo','Operator','Mary Jane Domingo','None','Mary Jane Domingo','Mother',''),(0,35,'Cesar Domingo','Operator','Mary Jane Domingo','None','Mary Jane Domingo','Mother',''),(0,36,'Cesar Domingo','Operator','Mary Jane Domingo','None','Mary Jane Domingo','Mother',''),(0,37,'Cesar Domingo','Operator','Mary Jane Domingo','None','Mary Jane Domingo','Mother',''),(0,38,'Cesar Domingo','Operator','Mary Jane Domingo','None','Mary Jane Domingo','Mother',''),(0,39,'','','','','','',''),(0,40,'Cesar Domingo','Operator','Mary Jane Domingo','None','Mary Jane Domingo','Mother',''),(0,41,'Hans The Great','Operator','Hasel The Great','None','Hasel The Great','Mother',''),(0,42,'gdfgdf','gfdggdf','gdfg','gfdg','dfgdf','gfdg',''),(0,6814,'dfs','gdfgfdghfdfg','sdf','sd','dsf','sd',''),(0,6814,'dsa','sda','sda','das','dsa','sad',''),(0,6815,'sdf','fds','fds','fsd','sfd','sd',''),(0,6816,'hg','gj','gh','hg','jg','gh',''),(0,6817,'ftgh','fgh','hf','hgf','hfg','hgf',''),(0,6818,'gfb','b','gbf','fgb','gfb','fgb',''),(0,6819,'Cesar Domingo','Operator','Mary Jane Domingo','o','Mary Jane Domingo','o',''),(0,6820,'jh','Operator','j','m','g','Mother',''),(0,22,'Cesar Domingo','Operator','Mary Jane Domingo','House Wife','Mary Jane Domingo','n',''),(0,23,'ghj','jk','jkl','jkl','jkl','jkl',''),(0,26,'doms','doms','doms','doms','doms','doms',''),(0,27,'kimberly','kimberly','kimberly','kimberly','kimberly','kimberly',''),(0,28,'kenneth','kenneth','kenneth','kenneth','kenneth','kenneth',''),(0,29,'Kingnnn','Kingnnn','Kingnnn','Kingnnn','Kingnnn','Kingnnn',''),(0,30,'Sassdad','Sassdad','Sassdad','Sassdad','Sassdad','Sassdad',''),(0,31,'Wisely','Wisely','Wisely','Wisely','Wisely','Wisely',''),(0,32,'Rabnuih','Rabnuih','Rabnuih','Rabnuih','Rabnuih','Rabnuih',''),(0,33,'Rinaaa','Rinaaa','Rinaaa','Rinaaa','Rinaaa','Rinaaa',''),(0,34,'Ashleyy','Ashleyy','Ashleyy','Ashleyy','Ashleyy','Ashleyy',''),(0,35,'BengBeng','BengBeng','BengBeng','BengBeng','BengBeng','BengBeng',''),(0,36,'Vanni','Vanni','Vanni','Vanni','Vanni','Vanni',''),(0,37,'Craaar','Craaar','Craaar','Craaar','Craaar','Craaar',''),(0,38,'Wiselyyy','Wiselyyy','Wiselyyy','Wiselyyy','Wiselyyy','Wiselyyy',''),(0,39,'Alizaa','Alizaa','Alizaa','Alizaa','Alizaa','Alizaa',''),(0,40,'Eunic','Eunic','Eunic','Eunic','Eunic','Eunic',''),(0,41,'diewhemn','diewhemn','diewhemn','diewhemn','diewhemn','diewhemn',''),(0,42,'Selenma','Selenma','Selenma','Selenma','Selenma','Selenma',''),(0,43,'Selenma','Selenma','Selenma','SelenmaSelenma','Selenma','Selenma',''),(0,44,'Patrivk','Patrivk','Patrivk','Patrivk','Patrivk','Patrivk',''),(0,45,'Lito Dela Cruz','Junk Shop','Milene Dela Cruz','Magnoloia','Mailne','Mother',''),(0,46,'prince','prince','prince','prince','prince','prince',''),(0,50,'Tony','Bahay','Presita','Bahay','Presita','Bahay',''),(0,51,'Manddi','Manddi','Manddi','Manddi','Manddi','Manddi',''),(0,52,'AnalynAnalyn','Analyn','Analyn','Analyn','Analyn','Analyn',''),(0,53,'Mjifdjef','Mjifdjef','Mjifdjef','Mjifdjef','Mjifdjef','Mjifdjef',''),(0,54,'Rasshh','Rasshh','Rasshh','Rasshh','Rasshh','Rasshh',''),(0,55,'ingir','ingir','ingir','ingir','ingir','ingir',''),(0,56,'Dylan','Dylan','Dylan','Dylan','Dylan','Dylan','');
/*!40000 ALTER TABLE `family_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sections`
--

DROP TABLE IF EXISTS `sections`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `section_id` int(200) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(200) NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` VALUES (1,'A'),(2,'B'),(3,'C'),(4,'D');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_addres`
--

DROP TABLE IF EXISTS `student_addres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_addres` (
  `addres_id` int(20) NOT NULL AUTO_INCREMENT,
  `student_id` int(50) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `municipality` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  PRIMARY KEY (`addres_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_addres`
--

LOCK TABLES `student_addres` WRITE;
/*!40000 ALTER TABLE `student_addres` DISABLE KEYS */;
INSERT INTO `student_addres` VALUES (1,0,'Tabuating','San Leonardo ','Nueva Ecija'),(2,0,'Diversion','San Leonardo','Nueva Ecija'),(3,0,'Nieves','San Leonardo','Nueva Ecija'),(4,0,'Mambangnan','San Leonardo','Nueva Ecija'),(5,0,'Bonifacio','Sta Rosa','Nueva Ecija');
/*!40000 ALTER TABLE `student_addres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_course`
--

DROP TABLE IF EXISTS `student_course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_course` (
  `course_id` int(30) NOT NULL,
  `course_name` varchar(70) NOT NULL,
  `course_init` varchar(20) NOT NULL,
  PRIMARY KEY (`course_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_course`
--

LOCK TABLES `student_course` WRITE;
/*!40000 ALTER TABLE `student_course` DISABLE KEYS */;
INSERT INTO `student_course` VALUES (1,'Bachelor of Science in Business Adminstration','BSEnt'),(2,'Bachelor of Science in Criminology','BSCRIM'),(3,'Bachelor of Secondary Education','BSPsy'),(4,'Bachelor of Science in Hospitality Management','BSTM');
/*!40000 ALTER TABLE `student_course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_history`
--

DROP TABLE IF EXISTS `student_history`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_history` (
  `history_id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(30) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `course_id` varchar(50) NOT NULL,
  `year_id` int(20) NOT NULL,
  `grade` decimal(5,2) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_history`
--

LOCK TABLES `student_history` WRITE;
/*!40000 ALTER TABLE `student_history` DISABLE KEYS */;
INSERT INTO `student_history` VALUES (1,2,'CRIM1','2',2,1.00,'1',''),(2,2,'CFLM1','2',2,2.00,'1',''),(4,2,'CFLM2','2',3,1.00,'2',''),(5,2,'CLJ1','2',3,1.00,'1',''),(6,2,'CRIM2','2',1,3.00,'1',''),(7,2,'AdGE','2',4,1.00,'2',''),(8,2,'CA1','6',4,2.00,'2',''),(9,2,'CDI5','2',1,1.00,'2',''),(10,2,'CA2','3',1,1.00,'2',''),(11,2,'CDI6','2',1,1.00,'1',''),(12,2,'CPRAC','2',4,1.00,'2',''),(13,2,'CDI1','2',4,3.00,'1',''),(14,2,'CDI4','3',1,1.00,'2',''),(15,2,'CJ3','2',1,1.00,'1',''),(16,2,'CDI8','2',4,1.00,'2',''),(17,2,'CDI7','2',4,3.00,'1',''),(18,3,'CRIM1','2',2,1.00,'1',''),(19,3,'CFLM1','2',2,2.00,'1',''),(20,3,'CFLM2','2',3,1.00,'2',''),(21,3,'CLJ1','2',3,1.00,'1',''),(22,3,'CRIM2','2',1,3.00,'1',''),(23,3,'AdGE','2',4,1.00,'2',''),(24,3,'CA1','6',4,2.00,'2',''),(25,3,'CDI5','2',1,1.00,'2',''),(26,3,'CA2','3',1,1.00,'2',''),(27,3,'CDI6','2',1,1.00,'1',''),(28,3,'CPRAC','2',4,1.00,'2',''),(29,3,'CDI1','2',4,3.00,'1',''),(30,3,'CDI4','3',1,1.00,'2',''),(31,3,'CJ3','2',1,1.00,'1',''),(32,3,'CDI8','2',4,1.00,'2',''),(41,2,'CFLM1','',0,1.50,'',''),(42,3,'CFLM1','',0,3.00,'',''),(43,4,'CFLM1','',0,2.00,'',''),(44,5,'CFLM1','',0,1.00,'',''),(45,2,'CFLM1','',0,1.50,'',''),(46,3,'CFLM1','',0,1.25,'',''),(47,4,'CFLM1','',0,1.50,'',''),(48,5,'CFLM1','',0,2.25,'',''),(49,2,'CFLM1','',0,1.00,'',''),(50,3,'CFLM1','',0,1.00,'',''),(51,4,'CFLM1','',0,1.00,'',''),(52,5,'CFLM1','',0,1.00,'','');
/*!40000 ALTER TABLE `student_history` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_img`
--

DROP TABLE IF EXISTS `student_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_img` (
  `img_id` int(50) NOT NULL AUTO_INCREMENT,
  `student_id` int(50) NOT NULL,
  `student_pic` varchar(250) DEFAULT NULL,
  `form_137` varchar(250) DEFAULT NULL,
  `card` varchar(250) DEFAULT NULL,
  `psa` varchar(250) DEFAULT NULL,
  `good_moral` varchar(250) DEFAULT NULL,
  `registration_date` date DEFAULT NULL,
  `card_img` longblob DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_img`
--

LOCK TABLES `student_img` WRITE;
/*!40000 ALTER TABLE `student_img` DISABLE KEYS */;
INSERT INTO `student_img` VALUES (3,2,'sign.jpeg','form_137_684945c2d55ce.jpg','card_684945c2d5c3a.pdf','psa_68494d73515eb.pdf','good_moral_686a465a31c20.pdf','0000-00-00','',''),(4,1,'received_276055101988651.jpeg','form_137_684a677094a98.jpg','','','','0000-00-00','',''),(5,0,'Report-Card.jpg','','','','','0000-00-00','',''),(6,0,'Untitled.jpg','','','','','0000-00-00','',''),(7,0,'Untitled.jpg','','','','','0000-00-00','',''),(8,0,'Untitled.jpg','','','','','0000-00-00','',''),(9,32,'','','','Untitled.jpg','','0000-00-00','',''),(10,33,'','Untitled.jpg','Report-Card.jpg','Untitled.png','sign.jpeg','0000-00-00','',''),(11,34,'','form_137.jpg','Report-Card.jpg','sign.jpeg','1_AwC0BumWsRG9BsCZUhhNcA.png','0000-00-00','',''),(12,35,'','form_137.jpg','received_276055101988651.jpeg','Report-Card.jpg','sign.jpeg','0000-00-00','',''),(13,0,'','Untitled.jpg','Untitled.jpg','Untitled.jpg','Untitled.jpg','0000-00-00','',''),(14,36,'','Untitled.jpg','Untitled.jpg','Untitled.jpg','Untitled.jpg','0000-00-00','',''),(15,37,'','Untitled.jpg','Untitled.jpg','Untitled.jpg','Untitled.jpg','0000-00-00','',''),(16,38,'','Report-Card.jpg','Untitled.jpg','sign.jpeg','sign.jpeg','0000-00-00','',''),(17,0,'','','','','','0000-00-00','',''),(18,39,'','Report-Card.jpg','Report-Card.jpg','Report-Card.jpg','Report-Card.jpg','0000-00-00','',''),(19,44,NULL,'form_137_6849408e4c173.jpg',NULL,NULL,NULL,'2025-06-12',NULL,NULL),(20,45,NULL,'form_137_684a3d96aaa87.jpg',NULL,NULL,NULL,NULL,NULL,NULL),(21,46,'h',NULL,NULL,NULL,NULL,'0000-00-00',NULL,NULL),(22,56,NULL,NULL,'card_68736c1e2b335.jpg',NULL,NULL,'2025-07-13',NULL,NULL);
/*!40000 ALTER TABLE `student_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_infoo`
--

DROP TABLE IF EXISTS `student_infoo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_infoo` (
  `id` varchar(50) NOT NULL,
  `school_year` int(50) NOT NULL,
  `end_year` varchar(200) NOT NULL,
  `student_id` int(20) NOT NULL AUTO_INCREMENT,
  `student_fname` varchar(30) NOT NULL,
  `student_mname` varchar(100) NOT NULL,
  `student_lname` varchar(100) NOT NULL,
  `birth_date` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(40) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `reg_number` int(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `course_id` int(30) NOT NULL,
  `year_id` int(20) NOT NULL,
  `requirements` text NOT NULL,
  `type_student` varchar(100) NOT NULL,
  `section_id` int(11) NOT NULL,
  `img_id` varchar(250) NOT NULL,
  `is_archived` tinyint(1) DEFAULT 0,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_infoo`
--

LOCK TABLES `student_infoo` WRITE;
/*!40000 ALTER TABLE `student_infoo` DISABLE KEYS */;
INSERT INTO `student_infoo` VALUES ('CDSL',2025,'',1,'John Rey','0','Reyes','2005-01-12','','johnivan369@gmail.com','rey@gmail.com','r3yjo4h',1,'Male','0856984',4,4,'','',1,'0',0),('CDSL',2025,'',2,'King Ivan ','0','Domingo ','2003-11-19','','domingokingivan7@gmail.com','yana','yana',2,'Male','077462756',1,2,'Form 137,Card,PSA,Good Moral','',2,'2',0),('CDSL',2025,'',3,'Norvie','0','Cunanan','2016-03-23','','norvie@gmail.com','norvie@gmail.com','norvie_21',3,'Female','0962343454647',1,2,'','',2,'0',0),('CDSL',2025,'',4,'Mark Agustin','0','Untalan','2007-02-16','','Agustin@gmail.com','Agustin@gmail.com','4gustin',4,'Male','0953647453',4,1,'','',4,'0',0),('CDSL',2025,'',5,'norvie','0','','2007-03-10','','king@gmail.com','','',0,'Male','0978432756',0,2,'','',1,'0',0),('CDSL',2025,'',6,'John Ivan','0','','2008-04-09','','johnivan369@gmail.com','johnivan369@gmail.com','',0,'Female','09536274744',0,1,'','',2,'0',0),('CDSL',2025,'',7,'','0','','2003-05-27','','king@gmail.com','','',0,'Male','',0,3,'','',3,'0',0),('CDSL',2025,'',8,'Ivan Dgreat','0','','2003-05-26','','king@gmail.com','','',0,'Male','09646274744',4,4,'','',3,'0',0),('CDSL',2025,'',9,'Agus','0','','2005-01-26','','king@gmail.com','','',0,'Female','097843356',1,1,'','',4,'0',0),('CDSL',2025,'',10,'Dgreat','0','','2003-12-24','','king@gmail.com','','',0,'Male','09646274744',3,4,'','',0,'0',0),('0',0,'',11,'yeyz','0','','2015-01-13','','yeyz@gmail.com','','',0,'Male','09742657884',1,1,'','',0,'0',0),('0',0,'',12,'Yasy','0','','2009-03-12','','yeyz@gmail.com','','',0,'Female','09636576633',2,2,'','',0,'0',0),('0',0,'',13,'Zy','0','','2015-05-13','','Zyz@gmail.com','','',0,'Female','09742237884',3,3,'','',0,'0',0),('0',0,'',14,'Kyy','0','','2002-03-12','','kyy@gmail.com','','',0,'Male','09636236633',4,2,'','',0,'0',0),('0',0,'',15,'Jing','0','','2011-01-13','','Jing@gmail.com','','',0,'Male','09213657884',1,1,'','',0,'0',0),('0',0,'',16,'Yayu','0','','2003-03-12','','yayu@gmail.com','','',0,'Female','09635326633',2,2,'','',0,'0',0),('0',0,'',17,'Ling','0','','2012-01-13','','ling@gmail.com','','',0,'Male','09742657884',3,3,'','',0,'0',0),('0',0,'',18,'Ruby','0','','2001-03-12','','by@gmail.com','','',0,'Female','09132476633',4,4,'','',0,'0',0),('CDSL',2025,'',19,'Sophia','Bae',' Domingo','2025-01-01','Nueva Ecija, San Leonardo , Diversion','benson@gmail.com','','',0,'','09227736633',4,1,'Card,PSA','',0,'0',0),('CDSL',2025,'',20,'Father','Pusod',' Espirito','2025-01-01','Nueva Ecija, Sta Rosa, Bonifacio','father@gmail.com','','',0,'','094765336666',1,1,'','',0,'0',0),('CDSL',2025,'',21,'Sofhia','Bae',' Domingo','2016-06-04','Nueva Ecija, San Leonardo , Mambangnan','gfddg','','',0,'','45353',2,1,'Card,PSA','',0,'0',0),('CDSL',2029,'',22,'Ariana','Bae',' Diche','2007-10-24','Nueva Ecija, San Leonardo , Tabuating','ariana@gmail.com','','',0,'','00887766666',1,1,'PSA,Good Moral','',0,'0',0),('CDSL',2029,'',23,'eqw','weq',' ewq','2025-01-01','Nueva Ecija, San Leonardo , Mambangnan','k@gmail.com','','',0,'','43',1,2,'Form 137,Card','',0,'0',0),('CDSL',2029,'',24,'fesrdfdfs','fdss',' rfew','2013-01-01','Nueva Ecija, San Leonardo , Mambangnan','kdfh@gmail.com','','',0,'','8678658',1,1,'','',0,'0',0),('CDSL',2029,'',25,'gdfgfd','gfd',' gdfrg','2025-01-01','Nueva Ecija, Sta Rosa, Bonifacio','kdfh@gmail.comhgf','','',0,'','0897',2,1,'','',0,'0',0),('CDSL',2029,'',26,'doms','doms',' doms','2025-12-01','Nueva Ecija, San Leonardo , Diversion','doms@gmail.com','','',0,'','098765434',1,1,'','',0,'0',0),('CDSL',2029,'',27,'kimberly','kimberly',' kimberly','2025-01-01','Nueva Ecija, San Leonardo , Nieves','kimberlys@gmail.com','','',0,'','08976542',1,2,'','',0,'0',0),('CDSL',2029,'',28,'kenneth','kenneth',' kenneth','2013-01-01','Nueva Ecija, Sta Rosa, Bonifacio','kenneth@gmail.com','','',0,'','09876543211',2,1,'','',0,'0',0),('CDSL',2025,'',29,'Kingnnn','Kingnnn',' Kingnnn','2009-07-09','Nueva Ecija, Sta Rosa, Bonifacio','kf@gmail.com','','',0,'','09876543545',1,1,'','',0,'0',0),('CDSL',2025,'2029',30,'Sassdad','Sassdad',' Sassdad','2009-01-01','Nueva Ecija, Sta Rosa, Bonifacio','Sassdad@gmail.com','','',0,'Male','00976666666',3,2,'Form 137','New Student',1,'0',0),('0',2025,'2029',38,'Wiselyyy','Wiselyyy','Wiselyyy','2011-01-01','Nueva Ecija, San Leonardo , Nieves','Wiselyyy@gmail.com','','',0,'Male','97877654646',1,1,'Card,PSA','New Student',2,'',0),('0',2025,'2029',39,'Alizaa','Alizaa','Alizaa','2000-01-01','Nueva Ecija, San Leonardo , Nieves','Alizaa@gmail.com','ally','ally',0,'Female','09894789563',1,1,'Form 137,Card,PSA,Good Moral','New Student',1,'',0),('0',2025,'2029',40,'Eunic','Eunic','Eunic','1991-05-06','Nueva Ecija, San Leonardo , Diversion','Eunic@gmail.com','','',0,'Male','09545545641',1,1,'Form 137,Card,PSA','New Student',3,'',0),('0',2025,'2029',41,'diewhemn','diewhemn','diewhemn','2025-01-01','Nueva Ecija, San Leonardo , Mambangnan','kh@gmail.com','','',0,'Male','0956464874',3,2,'Form 137','New Student',1,'',0),('0',2025,'2029',42,'Selenma','Selenma','Selenma','2021-01-01','Nueva Ecija, San Leonardo , Diversion','kch@gmail.com','','',0,'Male','09093859732',2,3,'Form 137','New Student',1,'',0),('0',2025,'2029',43,'Selenma','Selenma','Selenma','2024-01-01','Nueva Ecija, San Leonardo , Mambangnan','kcch@gmail.com','','',0,'Female','09048937257',2,2,'','',2,'',0),('0',2025,'2029',44,'Patrivk','Patrivk','Patrivk','2023-01-01','Nueva Ecija, San Leonardo , Mambangnan','Patrivk@gmail.com','','',0,'Male','09039847346',2,2,'Form 137','New Student',1,'',0),('0',2025,'2029',45,'Kent','Bae','Dela Cruz','2005-01-01','Nueva Ecija, San Leonardo , Mambangnan','kent@gmail.com','','',0,'Male','09089273578',1,1,'','New Student',2,'',0),('0',2025,'2029',46,'prince','prince','prince','2017-01-01','Nueva Ecija, San Leonardo , Diversion','prince@gmail.com','','',0,'Male','00987666665',1,3,'Form 137,Card','New Student',2,'',0),('0',2025,'2029',47,'Aliza Jade','Par','Perez','2025-05-04','Nueva Ecija, San Leonardo , Diversion','aliza@gmail.com','','',0,'Female','09948797324',1,1,'','New Student',1,'',0),('0',2025,'2029',48,'Genesis','Duarte','Mangulabnan','1990-11-07','Nueva Ecija, San Leonardo , Mambangnan','genesis@gmail.com','','',0,'','09096898756',2,1,'','New Student',1,'',0),('0',2025,'2029',49,'Maria','Bae','Umali','2018-09-03','Nueva Ecija, San Leonardo , Diversion','maria@gmail.com','','',0,'Female','0859074987',2,1,'','New Student',1,'',0),('0',2025,'2029',50,'Ian','Mangulabnan','Santos','2010-06-01','Nueva Ecija, San Leonardo , Mambangnan','Ian@gmail.com','','',0,'Male','09890854738',2,1,'','New Student',1,'',0),('0',2025,'2029',51,'Kyle','Manddi','Buse','2012-01-01','Nueva Ecija, San Leonardo , Mambangnan','Manddi@gmail.com','','',0,'Male','89975893756',1,1,'','New Student',1,'',0),('0',2025,'2029',52,'Analyn','mangulabanan','Bae','2018-01-01','Nueva Ecija, San Leonardo , Mambangnan','Analyn@gmail.com','','',0,'Female','97854897398',1,1,'','New Student',1,'',0),('0',2025,'2029',53,'Kiri','Mam','Kirs','2020-01-01','Nueva Ecija, San Leonardo , Mambangnan','kira@gmail.com','','',0,'Male','09083475934',1,1,'','New Student',1,'',0),('0',2025,'2029',54,'Rasshh','Rasshh','Rasshh','2015-01-01','Nueva Ecija, San Leonardo , Mambangnan','Rasshh@gmail.com','','',0,'Female','09096898756',1,1,'','New Student',1,'',0),('0',2025,'2029',55,'ingir','ingir','ingir','2013-01-01','Nueva Ecija, San Leonardo , Nieves','ingiraa1@gmail.com','','',0,'Female','9878686867',1,3,'','New Student',2,'',0),('0',2025,'2029',56,'Dylan','Dylan','Dylan','2013-01-01','Nueva Ecija, San Leonardo , Mambangnan','Dylan@gmail.com','','',0,'Female','09058409530',2,1,'','New Student',2,'',0);
/*!40000 ALTER TABLE `student_infoo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_year`
--

DROP TABLE IF EXISTS `student_year`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_year` (
  `year_id` int(20) NOT NULL,
  `year_name` varchar(20) NOT NULL,
  `course_id` int(20) NOT NULL,
  PRIMARY KEY (`year_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_year`
--

LOCK TABLES `student_year` WRITE;
/*!40000 ALTER TABLE `student_year` DISABLE KEYS */;
INSERT INTO `student_year` VALUES (1,'1st Year',1),(2,'2nd Year',2),(3,'3rd Year',3),(4,'4th Year',4);
/*!40000 ALTER TABLE `student_year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `subject_id` int(20) NOT NULL,
  `sub_code` varchar(20) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `sub_unit` int(20) NOT NULL,
  `lec_hrs` int(20) NOT NULL,
  `lab_hrs` int(11) NOT NULL,
  `prerequisite` varchar(200) NOT NULL,
  `year_id` int(20) NOT NULL,
  `course_id` varchar(20) NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `semester` varchar(50) NOT NULL,
  PRIMARY KEY (`sub_code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'AdGE','General Chemistry (Organic)',3,2,1,'None',2,'2','','2nd Semester'),(2,'CA1','Institutional Corrections',3,3,0,'None',2,'2','','2nd Semester'),(3,'CA2','Non-Institutional Corrections',3,3,0,'CA1',3,'2','','2nd Semester'),(4,'CC-100','(90083)- Intruduction to Computing',3,0,3,'6',1,'2','',''),(5,'CC-101','(90084) - Computer Programming 1, Fundamentals',3,3,2,'4',0,'2','',''),(6,'CDI1','Fundamentals of Criminal Investigation and Intelligence',4,4,0,'NONE',2,'2','','1st Semester'),(7,'CDI2','Specialized Crime Investigation 1 with Legal Medicine',3,3,0,'CDI1',2,'2','','2nd Semester'),(8,'CDI3','Specialized Crime Investigation 2 with Simulation on Interrogation and Interview',3,3,0,'CDI2',3,'2','','1st Semester'),(9,'CDI4','Traffic Management and Accident Investigation with Driving',3,3,0,'CDI1',3,'2','','1st Semester'),(10,'CDI5','Technical English 1 (Investigative Report Writing and Presentation)',3,3,0,'CDI1',3,'2','','2nd Semester'),(11,'CDI6','Fire Protection and Arson Investigation',3,3,0,'CDI1',3,'2','','2nd Semester'),(12,'CFLM1','Character Formation 1-Nationalism and Patriotism',3,3,0,'NONE',1,'2','','1st Semester'),(13,'CFLM2','Character Formation 2-Leadership, Decision Making, Management and Adminstration',3,3,0,'NONE',1,'2','BSENT','2nd Semester'),(14,'CLJ1','Introduction to Philippine Criminal Justice System',3,3,0,'None',1,'2','BSENT','2nd Semester'),(15,'CLJ2','Human Rights Education',4,4,0,'None',2,'2','','2nd Semester'),(16,'CLJ3','Criminal Law (Book 1)',3,3,0,'CLJ1',3,'2','','1st Semester'),(17,'CLJ4','Criminal Law (Book 2)',4,4,0,'CLJ3',3,'2','','2nd Semester'),(18,'CRIM1','Introduction to Criminology',3,3,0,'NONE',1,'2','','1st Semester'),(19,'CRIM2','Theories of Crime Causation',3,3,0,'CRIM1',1,'2','','2nd Semester'),(20,'CRIM3','Human Behavior & Victimology',3,3,0,'CRIM2',3,'2','','1st Semester'),(21,'CRIM4','Professional Conduct and Ethical Standards',3,3,0,'CRIM1',3,'2','','1st Semester'),(22,'CRIM5','Juvenile Delinquency and Juvenile Justice System',3,3,0,'CRIM2',3,'2','','2nd Semester'),(23,'CRIM6','Dispute Resolution and Crises/Incidents Management',3,3,0,'CRIM3',3,'2','','2nd Semester'),(0,'ELP','English Language Proficiency',3,3,0,'None',1,'2','','2nd Semester'),(25,'FIL 1','(90094) -Kontekswalisadong komunikasyon sa Filipino (KOMFIL) ',3,0,3,'6',0,'','',''),(26,'FRNSC1','Forensic Photography',3,2,1,'None',2,'2','','1st Semester'),(27,'FRNSC2','Personal Identification Techniques',3,2,1,'None',2,'2','','2nd Semester'),(28,'FRNSC3','Forensic Chemistry and Toxicology',5,3,2,'AdGE',0,'','',''),(29,'FRNSC4','Questioned Documents Examination',3,2,1,'None',3,'2','','2nd Semester'),(30,'FRNSC5','Lie Detection Techniques',2,1,3,'None',3,'2','','2nd Semester'),(31,'GE 04','(90091) - Mathematics in the Modern World',3,0,3,'4',0,'','',''),(32,'GE 05','(90093) - Purposive Communication',3,0,3,'6',0,'','',''),(33,'GE 07','(90095) - Science, Technology and Society',3,0,3,'6',0,'','',''),(34,'GEC1','Understanding the Self (with Gender and Development, HIV and Population Education)',3,3,0,'NONE',1,'2','','1st Semester'),(35,'GEC2','Readings in Philippine History',3,3,0,'NONE',1,'2','','1st Semester'),(36,'GEC3','The Contemporary World)',3,3,0,'NONE',1,'2','','1st Semester'),(37,'GEC4','Mathematics in the Modern World',3,3,0,'NONE',1,'2','','1st Semester'),(38,'GEC5','Purposive Communication)',3,3,0,'None',1,'2','','2nd Semester'),(39,'GEC6','Art Appreciation',3,3,0,'NONE',1,'2','','2nd Semester'),(40,'GEC7','Ethics',3,3,0,'None',2,'2','','1st Semester'),(41,'GEC8','Science, Technology and Society',3,3,0,'None',2,'2','','2nd Semester'),(42,'GEE1','Environmental Science',3,3,0,'NONE',2,'2','','1st Semester'),(43,'GEE2','Living in the IT Era',3,3,0,'None',2,'2','','2nd Semester'),(44,'GEE3','Forensic Psychology',3,3,0,'None',3,'2','','1st Semester'),(45,'IT-NET01','(90086)- Network 1, Fundamentals',3,3,2,'4',0,'','',''),(46,'LEA1','Law Enforcement Organization and Administration',4,4,0,'None',2,'2','','1st Semester'),(47,'LEA2','Comparative Models in Policing',3,3,0,'None',2,'2','','1st Semester'),(48,'LEA3','Introduction to Industrial Security Concepts',3,3,0,'None',2,'2','','2nd Semester'),(49,'LEA4','Law Enforcement Operations and Planning with Crime Mapping',3,3,0,'LEA2',3,'2','','1st Semester'),(50,'NSTP 11','(90099) - National Service Training Program 1',3,0,3,'6',0,'','',''),(51,'NSTP1','National Service Training Program 1',3,3,0,'NONE',1,'2','','1st Semester'),(52,'NSTP2','National Service Training Program 2',3,3,0,'NSTP1',1,'2','','2nd Semester'),(53,'PC1','Life and Works of Rizal',3,3,0,'',2,'2','','1st Semester'),(54,'PE 1','(90097) - Advanced Gymnastics',2,0,0,'0',0,'','',''),(55,'PE1','Fundamentals of Martial Ars',3,3,0,'NONE',1,'','','1st Semester'),(56,'PE2','Arnis and Disarming Technique',3,3,0,'NONE',1,'2','','2nd Semester'),(57,'PE3','First Aid and Water Safety',2,2,0,'None',2,'2','','1st Semester'),(58,'PE4','Fundamentals of Marksmanship',2,2,0,'None',2,'2','','2nd Semester');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_account`
--

DROP TABLE IF EXISTS `user_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_account`
--

LOCK TABLES `user_account` WRITE;
/*!40000 ALTER TABLE `user_account` DISABLE KEYS */;
INSERT INTO `user_account` VALUES (9,'admin','$2y$10$5w55Y/Z4p3r78ECWMTessO8vNpJOM4qYMs0RgnRttuf',''),(10,'king','$2y$10$QRKUBppa0vP4AKimqOxxGOJZ1O6aiuT3LEVTd.LpKILyM6qYXxyBW',''),(11,'KingIvan','$2y$10$NlSqtO58WIVfk8SHE/s6d.7pJlY8l5oF487HJJ7LwURzLs.gVH44K','');
/*!40000 ALTER TABLE `user_account` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-13 16:37:40
