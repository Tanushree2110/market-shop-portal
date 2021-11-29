CREATE DATABASE  IF NOT EXISTS `marketshop` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `marketshop`;
-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: marketshop
-- ------------------------------------------------------
-- Server version	8.0.26

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `email` varchar(320) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`email`),
  KEY `idxadmin` (`email`),
  CONSTRAINT `check_email` CHECK ((not((`email` like _utf8mb4'^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$'))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES ('tanushree2102@gmail.com','7e105d3da21cdfd0788a9641af840829','2021-11-21 15:58:33','2021-11-21 17:53:35');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dues`
--

DROP TABLE IF EXISTS `dues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dues` (
  `dueID` int NOT NULL AUTO_INCREMENT,
  `shopID` varchar(30) NOT NULL,
  `dueAmount` double NOT NULL,
  `dueDate` date NOT NULL,
  `dueType` varchar(40) NOT NULL,
  `status` varchar(20) NOT NULL,
  PRIMARY KEY (`dueID`),
  KEY `shop_id_dues` (`shopID`),
  KEY `idxdues` (`dueID`),
  KEY `idxdues2` (`status`),
  CONSTRAINT `shop_id_dues` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  CONSTRAINT `check_status` CHECK ((`status` in (_utf8mb4'Paid',_utf8mb4'Pending')))
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dues`
--

LOCK TABLES `dues` WRITE;
/*!40000 ALTER TABLE `dues` DISABLE KEYS */;
INSERT INTO `dues` VALUES (1,'123FC01',5848.98,'2021-12-15','Electricity','Pending'),(2,'123FC02',9260.4,'2021-12-06','Rent','Paid'),(3,'123FC03',2900.19,'2022-01-08','Miscellaneous','Pending'),(4,'123FC04',7484.51,'2021-12-16','Water','Pending'),(5,'123FC05',8758.1,'2022-01-11','Electricity','Pending'),(6,'123FC06',3033.04,'2022-01-29','Rent','Pending'),(7,'123FC07',4574.24,'2021-12-09','Miscellaneous','Pending'),(8,'123FC08',6821.69,'2021-12-29','Water','Pending'),(9,'123FC09',1628.98,'2021-12-31','Electricity','Pending'),(10,'123FC01',4339.9,'2022-01-28','Rent','Pending'),(11,'123FC02',6716.61,'2022-01-15','Miscellaneous','Pending'),(12,'123FC03',1401.07,'2022-01-26','Water','Pending'),(13,'123FC04',4256.45,'2022-01-19','Electricity','Pending'),(14,'123FC05',4413.44,'2022-01-18','Rent','Pending'),(15,'123FC06',4149.77,'2021-12-08','Miscellaneous','Pending'),(16,'123FC07',8461.25,'2021-12-19','Water','Pending'),(17,'123FC08',4011.36,'2022-01-20','Electricity','Pending'),(18,'123FC09',6657.43,'2021-12-03','Rent','Paid'),(19,'123FC01',3655.44,'2022-01-02','Miscellaneous','Pending'),(20,'123FC02',8702.33,'2022-01-22','Water','Pending'),(21,'123FC03',6797.38,'2021-12-19','Electricity','Pending'),(22,'123FC04',5094.11,'2021-12-13','Rent','Paid'),(23,'123FC05',2647.51,'2021-12-21','Miscellaneous','Pending'),(24,'123FC06',7669.97,'2022-01-23','Water','Pending'),(25,'123FC07',7132.95,'2021-12-11','Electricity','Paid'),(26,'123FC08',2759.53,'2022-01-11','Rent','Pending'),(27,'123FC09',1512.22,'2021-12-11','Miscellaneous','Paid'),(28,'123FC01',7572.07,'2021-12-21','Water','Pending'),(29,'123FC02',2746.59,'2021-12-24','Electricity','Pending'),(30,'123FC03',4517.44,'2021-12-20','Rent','Pending'),(31,'123FC04',6330.78,'2022-01-05','Miscellaneous','Pending'),(32,'123FC05',4774.1,'2022-01-21','Water','Pending'),(33,'123FC06',7625.49,'2021-12-10','Electricity','Pending'),(34,'123FC07',8386.43,'2021-12-18','Rent','Pending'),(35,'123FC08',9411.76,'2022-01-27','Miscellaneous','Pending'),(36,'123FC09',5197.82,'2021-12-09','Water','Paid');
/*!40000 ALTER TABLE `dues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `feedbackID` int NOT NULL AUTO_INCREMENT,
  `shopID` varchar(30) NOT NULL,
  `availability` int NOT NULL,
  `services` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dof` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`feedbackID`),
  KEY `shop_id_feedback` (`shopID`),
  CONSTRAINT `shop_id_feedback` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  CONSTRAINT `check_rating` CHECK (((`services` in (0,1,2,3,4,5)) and (`availability` in (0,1,2,3,4,5))))
) ENGINE=InnoDB AUTO_INCREMENT=501 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES (1,'123FC01',2,3,'','2021-11-28 06:55:43'),(2,'123FC09',4,5,'good','2021-11-29 10:46:45'),(3,'123FC05',3,3,'good','2021-11-29 10:46:58'),(4,'123FC03',3,3,'good','2021-11-29 10:47:12'),(5,'123FC06',3,3,'bad','2021-11-29 10:47:44'),(6,'123FC02',4,4,'','2021-11-29 10:47:55'),(7,'123FC04',3,3,'good','2021-11-29 10:48:10'),(8,'123FC08',2,2,'','2021-11-29 10:48:48'),(9,'123FC09',4,3,'volutpat. Nulla','2021-11-19 18:30:00'),(10,'123FC01',2,2,'dui nec urna suscipit nonummy. Fusce','2021-08-16 18:30:00'),(11,'123FC02',1,0,'tellus justo','2021-04-28 18:30:00'),(12,'123FC03',2,2,'Sed neque. Sed eget lacus. Mauris non dui nec urna','2021-01-30 18:30:00'),(13,'123FC04',4,4,'nibh. Aliquam','2021-09-30 18:30:00'),(14,'123FC05',4,1,'Nulla facilisis. Suspendisse commodo tincidunt nibh. Phasellus nulla. Integer','2021-08-03 18:30:00'),(15,'123FC06',2,1,'convallis dolor. Quisque tincidunt pede ac urna. Ut tincidunt','2021-05-04 18:30:00'),(16,'123FC07',1,2,'semper. Nam tempor diam dictum','2021-04-11 18:30:00'),(17,'123FC08',1,4,'in felis. Nulla tempor augue','2021-10-24 18:30:00'),(18,'123FC09',4,3,'erat. Etiam vestibulum massa','2021-04-01 18:30:00'),(20,'123FC02',1,4,'Vestibulum ante ipsum primis in faucibus','2021-07-11 18:30:00'),(21,'123FC03',1,3,'Donec non justo. Proin non massa','2021-04-04 18:30:00'),(22,'123FC04',3,4,'risus.','2021-01-05 18:30:00'),(23,'123FC05',1,3,'ligula. Aliquam erat volutpat. Nulla','2020-12-04 18:30:00'),(26,'123FC08',2,1,'magna a neque.','2021-11-04 18:30:00'),(30,'123FC03',1,1,'urna et arcu imperdiet','2021-05-20 18:30:00'),(31,'123FC04',5,3,'augue ac ipsum. Phasellus vitae mauris sit amet lorem semper','2021-03-21 18:30:00'),(34,'123FC07',2,1,'imperdiet ullamcorper. Duis at lacus. Quisque purus','2021-03-24 18:30:00'),(37,'123FC01',4,4,'euismod urna. Nullam lobortis quam a felis ullamcorper viverra.','2021-01-22 18:30:00'),(38,'123FC02',5,2,'nascetur ridiculus','2021-08-27 18:30:00'),(39,'123FC03',4,5,'sit amet ante. Vivamus non lorem vitae odio','2021-02-11 18:30:00'),(40,'123FC04',2,4,'cursus','2021-03-26 18:30:00'),(42,'123FC06',1,3,'sollicitudin orci sem eget massa.','2021-07-05 18:30:00'),(43,'123FC07',2,2,'Morbi metus. Vivamus euismod urna.','2021-06-10 18:30:00'),(44,'123FC08',2,3,'imperdiet ornare. In faucibus. Morbi vehicula.','2021-03-27 18:30:00'),(45,'123FC09',3,0,'augue malesuada malesuada.','2021-03-10 18:30:00'),(46,'123FC01',2,3,'dolor sit','2021-10-03 18:30:00'),(48,'123FC03',3,2,'Donec egestas. Aliquam nec enim.','2021-11-10 18:30:00'),(49,'123FC04',1,2,'Integer tincidunt','2021-03-27 18:30:00'),(50,'123FC05',3,3,'erat. Vivamus nisi. Mauris nulla. Integer urna.','2021-06-05 18:30:00'),(53,'123FC08',3,0,'eget metus eu erat semper rutrum. Fusce dolor','2021-03-16 18:30:00'),(55,'123FC01',1,3,'vel sapien imperdiet ornare. In faucibus. Morbi vehicula.','2021-08-12 18:30:00'),(57,'123FC03',2,3,'feugiat metus sit amet ante.','2020-12-11 18:30:00'),(58,'123FC04',4,1,'Vestibulum ante ipsum primis in faucibus orci luctus','2020-12-28 18:30:00'),(59,'123FC05',3,2,'neque non quam. Pellentesque','2021-08-17 18:30:00'),(60,'123FC06',1,1,'faucibus orci luctus et ultrices posuere cubilia Curae Phasellus','2021-11-26 18:30:00'),(61,'123FC07',1,0,'quis urna. Nunc quis arcu vel quam dignissim pharetra.','2020-12-08 18:30:00'),(62,'123FC08',1,4,'Vestibulum ut eros non enim commodo','2021-10-19 18:30:00'),(63,'123FC09',2,3,'ipsum sodales','2021-08-10 18:30:00'),(66,'123FC03',0,5,'erat neque non quam. Pellentesque habitant morbi','2021-10-02 18:30:00'),(67,'123FC04',1,3,'diam. Duis','2021-09-19 18:30:00'),(68,'123FC05',3,5,'vitae odio sagittis semper. Nam tempor','2020-12-16 18:30:00'),(69,'123FC06',4,0,'eros turpis non enim. Mauris quis turpis','2021-09-12 18:30:00'),(76,'123FC04',5,1,'Cras convallis convallis dolor. Quisque tincidunt','2021-07-11 18:30:00'),(78,'123FC06',2,2,'et magnis','2021-02-24 18:30:00'),(80,'123FC08',0,1,'lacus. Etiam bibendum fermentum metus. Aenean sed pede nec','2021-02-03 18:30:00'),(81,'123FC09',3,2,'Proin velit.','2021-09-03 18:30:00'),(82,'123FC01',5,0,'vel arcu eu odio','2021-02-09 18:30:00'),(83,'123FC02',0,4,'ac libero nec ligula','2021-08-18 18:30:00'),(84,'123FC03',1,3,'nec urna et arcu imperdiet ullamcorper. Duis at lacus. Quisque','2021-02-13 18:30:00'),(85,'123FC04',4,3,'egestas. Aliquam nec enim.','2021-02-24 18:30:00'),(87,'123FC06',1,1,'litora torquent per conubia','2020-12-01 18:30:00'),(88,'123FC07',4,2,'vehicula. Pellentesque tincidunt tempus risus. Donec egestas. Duis ac','2021-09-18 18:30:00'),(90,'123FC09',4,3,'ipsum primis','2021-01-14 18:30:00'),(94,'123FC04',1,5,'Cras vehicula aliquet','2021-11-20 18:30:00'),(95,'123FC05',4,3,'eu nibh vulputate mauris sagittis placerat. Cras dictum','2021-02-01 18:30:00'),(96,'123FC06',4,3,'nec quam. Curabitur vel lectus. Cum','2021-01-04 18:30:00'),(98,'123FC08',3,1,'erat vitae','2020-12-10 18:30:00'),(99,'123FC09',5,0,'commodo auctor velit. Aliquam nisl. Nulla eu neque pellentesque','2021-04-28 18:30:00'),(100,'123FC01',1,4,'eu sem. Pellentesque ut ipsum ac mi eleifend egestas.','2021-08-15 18:30:00'),(101,'123FC02',3,2,'tortor. Nunc commodo auctor velit. Aliquam nisl. Nulla','2021-06-30 18:30:00'),(102,'123FC03',1,3,'luctus. Curabitur egestas','2021-07-05 18:30:00'),(104,'123FC05',1,1,'libero. Proin','2021-10-20 18:30:00'),(106,'123FC07',3,4,'tristique senectus et netus et malesuada','2021-07-06 18:30:00'),(107,'123FC08',1,4,'molestie sodales. Mauris blandit enim consequat purus.','2021-06-08 18:30:00'),(109,'123FC01',0,1,'luctus lobortis. Class aptent','2021-10-12 18:30:00'),(110,'123FC02',2,4,'Pellentesque habitant','2021-09-09 18:30:00'),(111,'123FC03',1,2,'eu elit. Nulla facilisi. Sed neque. Sed eget lacus. Mauris','2021-05-31 18:30:00'),(113,'123FC05',2,4,'mauris erat','2021-01-24 18:30:00'),(114,'123FC06',1,1,'Curae Phasellus ornare.','2021-11-21 18:30:00'),(115,'123FC07',3,3,'eu neque pellentesque massa lobortis ultrices. Vivamus rhoncus. Donec est.','2021-09-20 18:30:00'),(118,'123FC01',3,3,'Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In','2021-09-12 18:30:00'),(119,'123FC02',0,1,'orci. Ut semper pretium neque. Morbi quis urna. Nunc','2021-09-15 18:30:00'),(120,'123FC03',0,1,'est. Mauris eu turpis. Nulla aliquet.','2021-02-27 18:30:00'),(123,'123FC06',1,1,'enim nisl','2021-10-18 18:30:00'),(125,'123FC08',3,2,'neque. In ornare sagittis felis. Donec','2020-12-06 18:30:00'),(126,'123FC09',3,3,'felis purus ac tellus. Suspendisse','2021-01-12 18:30:00'),(128,'123FC02',0,4,'Etiam','2021-09-09 18:30:00'),(131,'123FC05',3,3,'dui','2020-12-15 18:30:00'),(133,'123FC07',4,4,'ipsum. Phasellus vitae mauris sit amet lorem semper auctor. Mauris','2021-06-10 18:30:00'),(134,'123FC08',3,0,'ligula. Nullam feugiat placerat velit. Quisque varius. Nam porttitor','2021-01-28 18:30:00'),(136,'123FC01',2,4,'Mauris non','2021-04-04 18:30:00'),(143,'123FC08',0,3,'Phasellus in felis.','2021-02-16 18:30:00'),(144,'123FC09',3,4,'hendrerit. Donec porttitor tellus non magna.','2021-09-06 18:30:00'),(145,'123FC01',5,1,'tellus. Suspendisse sed','2021-07-15 18:30:00'),(146,'123FC02',1,0,'Sed id risus','2021-05-29 18:30:00'),(149,'123FC05',1,3,'enim commodo hendrerit.','2021-08-09 18:30:00'),(150,'123FC06',1,4,'volutpat. Nulla dignissim. Maecenas ornare','2021-11-12 18:30:00'),(151,'123FC07',4,1,'Quisque ornare tortor','2021-08-15 18:30:00'),(152,'123FC08',4,2,'netus et malesuada fames','2021-10-27 18:30:00'),(153,'123FC09',0,3,'ac ipsum.','2021-04-25 18:30:00'),(160,'123FC07',0,1,'porttitor scelerisque neque. Nullam nisl. Maecenas','2021-09-17 18:30:00'),(161,'123FC08',3,1,'Sed malesuada augue ut lacus. Nulla','2021-05-05 18:30:00'),(163,'123FC01',2,4,'ac ipsum. Phasellus vitae mauris sit','2021-03-18 18:30:00'),(164,'123FC02',1,1,'Proin ultrices. Duis volutpat','2021-02-24 18:30:00'),(165,'123FC03',1,1,'Nulla eu neque','2021-06-21 18:30:00'),(166,'123FC04',3,0,'Aliquam rutrum lorem ac risus. Morbi metus. Vivamus','2021-01-21 18:30:00'),(169,'123FC07',2,3,'Donec non justo. Proin non massa non ante','2021-07-30 18:30:00'),(170,'123FC08',2,3,'nec tellus. Nunc lectus','2021-06-12 18:30:00'),(171,'123FC09',3,1,'neque sed sem egestas','2021-08-24 18:30:00'),(172,'123FC01',3,4,'nec mauris blandit','2021-09-20 18:30:00'),(176,'123FC05',3,5,'consequat dolor vitae dolor. Donec fringilla. Donec','2021-02-13 18:30:00'),(177,'123FC06',1,1,'neque pellentesque massa lobortis','2021-06-17 18:30:00'),(180,'123FC09',2,1,'mollis','2021-09-14 18:30:00'),(181,'123FC01',1,1,'Aliquam nisl. Nulla eu neque pellentesque massa','2021-09-21 18:30:00'),(182,'123FC02',2,2,'odio tristique','2021-10-21 18:30:00'),(184,'123FC04',1,3,'fringilla cursus purus. Nullam scelerisque neque sed sem','2021-05-13 18:30:00'),(185,'123FC05',3,5,'id magna et','2021-11-01 18:30:00'),(188,'123FC08',5,5,'Phasellus in felis. Nulla tempor augue ac','2021-02-14 18:30:00'),(190,'123FC01',0,0,'vel turpis. Aliquam adipiscing','2021-09-23 18:30:00'),(192,'123FC03',4,4,'egestas.','2020-12-20 18:30:00'),(194,'123FC05',5,1,'eget magna.','2021-09-10 18:30:00'),(195,'123FC06',1,4,'et pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus','2021-02-08 18:30:00'),(196,'123FC07',3,4,'Mauris quis turpis vitae purus gravida sagittis.','2021-04-21 18:30:00'),(197,'123FC08',2,2,'Morbi non sapien','2021-02-09 18:30:00'),(198,'123FC09',2,5,'nec mauris blandit mattis. Cras eget nisi dictum','2021-11-11 18:30:00'),(200,'123FC02',3,1,'vitae velit egestas','2021-11-22 18:30:00'),(203,'123FC05',1,1,'et ipsum cursus vestibulum. Mauris','2021-10-09 18:30:00'),(205,'123FC07',3,1,'sed pede. Cum sociis natoque penatibus et magnis dis','2021-02-16 18:30:00'),(207,'123FC09',4,3,'sagittis semper. Nam tempor diam dictum sapien. Aenean massa.','2021-06-05 18:30:00'),(209,'123FC02',2,0,'consectetuer','2021-11-07 18:30:00'),(210,'123FC03',1,2,'eu erat','2021-11-14 18:30:00'),(213,'123FC06',1,0,'sit','2021-08-06 18:30:00'),(214,'123FC07',5,2,'Integer urna. Vivamus molestie dapibus','2021-02-22 18:30:00'),(215,'123FC08',2,3,'sociis natoque penatibus et magnis dis parturient','2021-04-09 18:30:00'),(218,'123FC02',2,3,'scelerisque','2021-03-19 18:30:00'),(220,'123FC04',2,4,'sagittis placerat. Cras','2021-04-17 18:30:00'),(221,'123FC05',4,4,'magnis dis','2020-12-27 18:30:00'),(222,'123FC06',1,3,'scelerisque neque sed sem egestas blandit. Nam nulla','2021-08-22 18:30:00'),(225,'123FC09',4,0,'Integer urna.','2021-02-16 18:30:00'),(226,'123FC01',4,1,'nibh. Quisque nonummy ipsum non arcu. Vivamus sit amet risus.','2021-11-12 18:30:00'),(228,'123FC03',0,1,'interdum feugiat. Sed nec metus facilisis lorem tristique','2021-08-10 18:30:00'),(230,'123FC05',0,3,'Cum sociis natoque penatibus et magnis','2021-08-04 18:30:00'),(231,'123FC06',5,1,'sed pede nec ante','2021-08-04 18:30:00'),(232,'123FC07',2,3,'purus mauris a nunc. In at','2021-06-26 18:30:00'),(234,'123FC09',2,1,'Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem','2021-07-22 18:30:00'),(235,'123FC01',2,2,'ultrices sit','2021-05-21 18:30:00'),(237,'123FC03',0,4,'turpis egestas. Fusce aliquet magna','2021-11-13 18:30:00'),(239,'123FC05',2,4,'sed','2021-03-13 18:30:00'),(240,'123FC06',2,3,'Phasellus','2020-12-17 18:30:00'),(242,'123FC08',3,2,'arcu. Morbi','2021-06-16 18:30:00'),(244,'123FC01',0,1,'mus.','2021-11-17 18:30:00'),(247,'123FC04',2,3,'Aenean eget magna. Suspendisse tristique neque venenatis lacus. Etiam bibendum','2021-10-23 18:30:00'),(250,'123FC07',1,1,'nulla. In tincidunt congue turpis.','2021-03-19 18:30:00'),(253,'123FC01',1,4,'turpis. Aliquam adipiscing lobortis risus. In','2020-12-08 18:30:00'),(256,'123FC04',5,3,'lectus rutrum','2020-12-17 18:30:00'),(257,'123FC05',1,1,'magnis dis parturient','2021-11-02 18:30:00'),(258,'123FC06',2,2,'tristique','2021-05-23 18:30:00'),(259,'123FC07',4,0,'dolor dapibus gravida.','2021-05-05 18:30:00'),(260,'123FC08',3,5,'risus. Donec egestas. Aliquam nec enim. Nunc ut','2021-05-12 18:30:00'),(261,'123FC09',0,3,'Suspendisse ac metus vitae velit','2021-06-17 18:30:00'),(262,'123FC01',5,2,'Mauris eu turpis.','2021-01-22 18:30:00'),(264,'123FC03',4,3,'diam.','2021-06-01 18:30:00'),(265,'123FC04',4,4,'egestas. Aliquam fringilla cursus purus. Nullam scelerisque','2021-06-19 18:30:00'),(267,'123FC06',1,2,'ipsum dolor sit','2021-10-28 18:30:00'),(269,'123FC08',0,1,'vitae erat vel pede blandit','2020-12-27 18:30:00'),(272,'123FC02',4,1,'enim commodo hendrerit. Donec porttitor tellus non magna.','2021-01-15 18:30:00'),(273,'123FC03',5,1,'bibendum ullamcorper. Duis','2021-07-15 18:30:00'),(277,'123FC07',4,2,'in faucibus orci luctus et ultrices posuere cubilia','2021-11-05 18:30:00'),(278,'123FC08',4,0,'Integer mollis. Integer tincidunt','2021-09-25 18:30:00'),(279,'123FC09',1,4,'lacus. Etiam bibendum fermentum metus.','2021-05-21 18:30:00'),(280,'123FC01',0,5,'tincidunt aliquam arcu. Aliquam ultrices iaculis odio.','2021-09-30 18:30:00'),(281,'123FC02',1,2,'lacus. Cras interdum. Nunc sollicitudin commodo ipsum.','2021-08-03 18:30:00'),(282,'123FC03',4,3,'eu odio','2021-07-09 18:30:00'),(283,'123FC04',4,1,'purus gravida sagittis. Duis gravida. Praesent','2021-04-13 18:30:00'),(284,'123FC05',2,4,'penatibus et magnis dis parturient','2021-11-17 18:30:00'),(285,'123FC06',1,1,'amet ornare lectus justo eu','2021-05-25 18:30:00'),(288,'123FC09',2,1,'in lobortis tellus justo sit amet nulla. Donec non','2021-06-17 18:30:00'),(290,'123FC02',1,3,'Proin nisl','2021-03-13 18:30:00'),(291,'123FC03',5,4,'ligula consectetuer rhoncus. Nullam velit','2021-08-14 18:30:00'),(297,'123FC09',3,1,'libero et tristique','2021-11-18 18:30:00'),(299,'123FC02',3,4,'mollis. Integer tincidunt aliquam arcu. Aliquam ultrices iaculis','2021-10-10 18:30:00'),(300,'123FC03',1,2,'gravida molestie arcu. Sed','2021-11-16 18:30:00'),(301,'123FC04',1,1,'dignissim lacus. Aliquam','2021-11-19 18:30:00'),(303,'123FC06',3,3,'risus. Nulla eget metus eu erat semper rutrum.','2020-12-08 18:30:00'),(306,'123FC09',3,5,'Etiam vestibulum massa rutrum','2021-09-10 18:30:00'),(308,'123FC02',1,3,'Suspendisse non leo.','2021-06-23 18:30:00'),(309,'123FC03',1,5,'mauris a nunc.','2021-08-22 18:30:00'),(310,'123FC04',3,5,'enim. Mauris quis turpis vitae purus gravida sagittis.','2021-08-13 18:30:00'),(311,'123FC05',3,2,'nascetur ridiculus mus. Proin','2021-03-22 18:30:00'),(312,'123FC06',5,4,'velit. Aliquam nisl. Nulla eu neque pellentesque massa lobortis','2020-12-20 18:30:00'),(313,'123FC07',4,0,'Etiam bibendum fermentum','2021-03-13 18:30:00'),(315,'123FC09',3,3,'amet orci. Ut sagittis lobortis','2021-08-07 18:30:00'),(316,'123FC01',4,2,'quam. Pellentesque habitant morbi tristique senectus et','2021-06-06 18:30:00'),(318,'123FC03',2,5,'lobortis. Class aptent taciti sociosqu ad litora','2021-08-03 18:30:00'),(319,'123FC04',3,3,'sociis natoque penatibus et magnis dis','2021-01-19 18:30:00'),(321,'123FC06',3,4,'In condimentum. Donec at arcu.','2021-04-12 18:30:00'),(323,'123FC08',1,1,'nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet','2021-10-17 18:30:00'),(324,'123FC09',3,3,'Curae Phasellus ornare. Fusce','2020-12-24 18:30:00'),(327,'123FC03',2,4,'non nisi. Aenean eget metus.','2021-09-08 18:30:00'),(329,'123FC05',4,4,'arcu. Vestibulum ante ipsum primis in','2021-08-13 18:30:00'),(330,'123FC06',3,5,'sem. Nulla interdum. Curabitur','2020-12-14 18:30:00'),(333,'123FC09',0,5,'vestibulum. Mauris magna.','2021-08-26 18:30:00'),(334,'123FC01',4,3,'Sed molestie. Sed id risus quis diam','2021-07-21 18:30:00'),(335,'123FC02',2,3,'felis ullamcorper viverra. Maecenas iaculis','2021-09-16 18:30:00'),(336,'123FC03',2,3,'Curabitur','2021-05-23 18:30:00'),(337,'123FC04',0,1,'erat neque non quam. Pellentesque habitant','2021-05-08 18:30:00'),(338,'123FC05',1,5,'Sed id risus quis diam luctus lobortis. Class aptent','2021-10-04 18:30:00'),(339,'123FC06',2,3,'varius. Nam porttitor scelerisque neque. Nullam nisl. Maecenas','2021-09-05 18:30:00'),(341,'123FC08',1,3,'vehicula risus. Nulla eget metus','2021-10-09 18:30:00'),(342,'123FC09',1,1,'odio semper cursus. Integer','2021-05-13 18:30:00'),(345,'123FC03',2,1,'purus gravida sagittis.','2021-10-19 18:30:00'),(347,'123FC05',2,3,'senectus et','2021-04-14 18:30:00'),(349,'123FC07',3,4,'Curabitur egestas','2021-08-12 18:30:00'),(350,'123FC08',4,0,'gravida molestie arcu. Sed eu nibh','2021-11-27 18:30:00'),(351,'123FC09',1,1,'enim commodo hendrerit. Donec porttitor','2021-04-30 18:30:00'),(352,'123FC01',2,4,'euismod est','2021-06-04 18:30:00'),(353,'123FC02',0,4,'Donec dignissim magna','2020-12-27 18:30:00'),(354,'123FC03',3,2,'penatibus et magnis dis','2021-11-21 18:30:00'),(355,'123FC04',5,4,'Quisque nonummy','2021-08-05 18:30:00'),(356,'123FC05',4,0,'vitae mauris sit','2020-12-19 18:30:00'),(357,'123FC06',0,4,'Quisque tincidunt pede ac','2021-09-13 18:30:00'),(358,'123FC07',1,5,'aliquam eros turpis non enim. Mauris quis turpis','2021-02-19 18:30:00'),(359,'123FC08',5,2,'molestie. Sed id risus','2020-12-21 18:30:00'),(362,'123FC02',5,3,'nascetur ridiculus mus. Proin vel nisl. Quisque','2021-10-19 18:30:00'),(363,'123FC03',4,0,'libero. Proin mi. Aliquam gravida mauris','2021-02-06 18:30:00'),(364,'123FC04',3,4,'turpis egestas. Aliquam fringilla','2021-11-01 18:30:00'),(366,'123FC06',1,1,'risus. Donec egestas. Duis ac arcu.','2021-05-16 18:30:00'),(368,'123FC08',0,2,'morbi tristique','2021-08-29 18:30:00'),(369,'123FC09',4,2,'ultrices. Vivamus rhoncus.','2021-10-08 18:30:00'),(371,'123FC02',3,5,'orci. Donec nibh. Quisque nonummy ipsum','2021-05-31 18:30:00'),(372,'123FC03',2,4,'pellentesque. Sed dictum. Proin','2021-11-02 18:30:00'),(373,'123FC04',4,0,'tincidunt aliquam','2021-07-29 18:30:00'),(375,'123FC06',4,5,'tincidunt pede ac urna.','2021-03-14 18:30:00'),(378,'123FC09',1,1,'tempus risus. Donec egestas. Duis ac arcu.','2021-07-21 18:30:00'),(379,'123FC01',5,4,'molestie.','2021-03-09 18:30:00'),(380,'123FC02',1,0,'egestas ligula. Nullam feugiat placerat velit.','2021-03-09 18:30:00'),(382,'123FC04',2,2,'sapien molestie orci tincidunt adipiscing. Mauris molestie','2021-11-24 18:30:00'),(384,'123FC06',3,4,'felis. Nulla tempor augue ac','2021-10-28 18:30:00'),(386,'123FC08',1,3,'Curabitur sed tortor. Integer aliquam adipiscing lacus.','2021-06-12 18:30:00'),(387,'123FC09',4,1,'aliquet libero. Integer in magna.','2021-07-06 18:30:00'),(389,'123FC02',0,2,'dictum sapien. Aenean','2021-01-21 18:30:00'),(392,'123FC05',5,1,'mi','2021-07-24 18:30:00'),(393,'123FC06',5,4,'orci luctus et ultrices posuere','2021-01-09 18:30:00'),(396,'123FC09',3,4,'cursus purus. Nullam scelerisque neque sed sem egestas','2021-01-31 18:30:00'),(398,'123FC02',1,5,'Sed et libero. Proin mi. Aliquam gravida mauris','2021-06-09 18:30:00'),(399,'123FC03',3,4,'vehicula risus. Nulla eget metus eu erat','2021-04-26 18:30:00'),(401,'123FC05',2,2,'nascetur ridiculus mus.','2021-02-18 18:30:00'),(402,'123FC06',1,4,'ut lacus. Nulla','2021-04-02 18:30:00'),(403,'123FC07',5,4,'tempor augue ac ipsum. Phasellus vitae','2021-08-31 18:30:00'),(404,'123FC08',4,2,'porttitor scelerisque neque. Nullam','2021-03-17 18:30:00'),(405,'123FC09',2,3,'elit erat vitae risus. Duis','2021-10-25 18:30:00'),(408,'123FC03',3,2,'euismod urna. Nullam lobortis quam a felis','2020-11-30 18:30:00'),(410,'123FC05',4,1,'lorem vitae','2021-05-30 18:30:00'),(412,'123FC07',0,1,'vehicula aliquet libero. Integer in','2021-08-02 18:30:00'),(413,'123FC08',1,3,'Aliquam fringilla cursus purus. Nullam scelerisque','2021-11-03 18:30:00'),(416,'123FC02',1,1,'Nunc mauris. Morbi non sapien molestie orci tincidunt adipiscing.','2021-01-05 18:30:00'),(418,'123FC04',2,1,'natoque penatibus et magnis dis parturient','2021-11-07 18:30:00'),(420,'123FC06',1,5,'et pede. Nunc sed orci lobortis augue scelerisque','2021-10-13 18:30:00'),(421,'123FC07',5,2,'amet risus. Donec egestas. Aliquam nec enim. Nunc ut','2021-04-06 18:30:00'),(422,'123FC08',1,0,'tristique senectus et netus et malesuada fames ac turpis','2021-11-02 18:30:00'),(423,'123FC09',3,1,'adipiscing lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis','2021-11-22 18:30:00'),(425,'123FC02',4,3,'nibh vulputate mauris sagittis','2021-06-13 18:30:00'),(427,'123FC04',2,4,'neque sed dictum','2021-04-10 18:30:00'),(428,'123FC05',1,5,'mattis velit justo','2021-03-24 18:30:00'),(429,'123FC06',0,3,'dui. Cras pellentesque. Sed dictum. Proin eget','2021-02-09 18:30:00'),(430,'123FC07',1,3,'ac libero nec ligula','2021-11-11 18:30:00'),(431,'123FC08',0,2,'In','2021-08-20 18:30:00'),(434,'123FC02',2,3,'tellus eu','2021-02-09 18:30:00'),(435,'123FC03',5,3,'risus a','2021-08-11 18:30:00'),(436,'123FC04',5,5,'fames ac turpis','2021-10-18 18:30:00'),(439,'123FC07',5,5,'Nulla tempor augue','2021-03-22 18:30:00'),(440,'123FC08',1,4,'Proin eget odio. Aliquam','2021-08-01 18:30:00'),(441,'123FC09',5,1,'ligula. Aliquam erat volutpat. Nulla dignissim. Maecenas ornare egestas','2021-03-02 18:30:00'),(444,'123FC03',5,5,'augue ac ipsum. Phasellus vitae mauris','2021-05-16 18:30:00'),(445,'123FC04',1,0,'enim non nisi. Aenean eget metus. In nec','2021-08-13 18:30:00'),(447,'123FC06',4,5,'odio. Aliquam vulputate','2021-04-25 18:30:00'),(449,'123FC08',4,1,'dolor. Donec fringilla. Donec feugiat metus sit amet ante. Vivamus','2021-09-12 18:30:00'),(450,'123FC09',0,2,'nulla. In tincidunt congue turpis. In condimentum.','2021-02-24 18:30:00'),(451,'123FC01',2,4,'eget magna. Suspendisse','2021-10-26 18:30:00'),(453,'123FC03',5,0,'mattis. Cras eget nisi dictum augue malesuada malesuada. Integer','2021-07-18 18:30:00'),(454,'123FC04',5,4,'Aenean egestas hendrerit neque. In','2021-09-11 18:30:00'),(455,'123FC05',3,3,'sem magna nec quam.','2020-12-16 18:30:00'),(457,'123FC07',3,2,'pharetra. Nam ac nulla. In','2021-04-14 18:30:00'),(458,'123FC08',5,3,'Etiam','2021-04-12 18:30:00'),(459,'123FC09',1,1,'ipsum. Suspendisse non leo. Vivamus nibh','2021-09-27 18:30:00'),(460,'123FC01',3,1,'Pellentesque habitant morbi tristique senectus et netus','2021-10-12 18:30:00'),(462,'123FC03',2,4,'lacus. Ut nec urna et arcu imperdiet ullamcorper. Duis at','2021-04-15 18:30:00'),(463,'123FC04',4,1,'Integer aliquam adipiscing','2021-10-26 18:30:00'),(464,'123FC05',1,3,'Quisque ac','2021-01-24 18:30:00'),(465,'123FC06',4,5,'pede. Nunc sed orci lobortis augue scelerisque mollis. Phasellus','2021-08-15 18:30:00'),(466,'123FC07',2,4,'metus','2021-01-04 18:30:00'),(468,'123FC09',1,0,'Nullam','2021-09-24 18:30:00'),(469,'123FC01',2,4,'dui nec urna suscipit','2021-05-18 18:30:00'),(470,'123FC02',2,3,'Sed neque. Sed eget lacus.','2021-11-21 18:30:00'),(471,'123FC03',1,1,'ipsum ac mi eleifend','2021-07-06 18:30:00'),(473,'123FC05',4,1,'et ultrices posuere cubilia Curae Donec','2021-07-20 18:30:00'),(476,'123FC08',3,2,'nascetur ridiculus mus. Proin vel arcu eu odio tristique pharetra.','2021-03-07 18:30:00'),(477,'123FC09',1,0,'auctor. Mauris vel turpis. Aliquam adipiscing lobortis risus. In mi','2021-09-09 18:30:00'),(479,'123FC02',4,0,'euismod enim. Etiam gravida','2021-01-25 18:30:00'),(481,'123FC04',0,4,'Morbi quis urna. Nunc quis arcu vel','2021-03-25 18:30:00'),(482,'123FC05',3,0,'magna a neque. Nullam ut nisi a odio semper cursus.','2020-12-21 18:30:00'),(483,'123FC06',2,0,'sapien. Nunc pulvinar arcu et','2021-06-02 18:30:00'),(486,'123FC09',3,5,'libero. Proin sed turpis nec mauris','2020-12-15 18:30:00'),(489,'123FC03',0,0,'vitae diam. Proin dolor. Nulla','2021-03-11 18:30:00'),(490,'123FC04',4,1,'diam. Pellentesque habitant morbi tristique','2021-07-08 18:30:00'),(491,'123FC05',5,4,'Pellentesque tincidunt tempus','2021-07-10 18:30:00'),(492,'123FC06',3,2,'mi. Aliquam gravida mauris','2021-11-21 18:30:00'),(493,'123FC07',3,5,'Cras dictum ultricies','2021-02-26 18:30:00'),(494,'123FC08',3,3,'sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus','2021-04-30 18:30:00'),(495,'123FC09',4,2,'nunc. In at pede.','2021-05-13 18:30:00'),(496,'123FC01',3,5,'mus. Proin vel','2021-01-27 18:30:00'),(498,'123FC03',2,4,'neque. Nullam nisl.','2021-11-05 18:30:00'),(499,'123FC04',5,1,'augue porttitor','2021-06-09 18:30:00');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `PaymentID` int NOT NULL AUTO_INCREMENT,
  `dueID` int NOT NULL,
  `dop` date NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`PaymentID`,`dueID`),
  KEY `due_id_payment` (`dueID`),
  CONSTRAINT `due_id_payment` FOREIGN KEY (`dueID`) REFERENCES `dues` (`dueID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (3,18,'2021-11-29','Paid by the shop owner in cash.'),(4,36,'2021-11-29','paid in account'),(5,27,'2021-12-10',''),(6,22,'2021-12-01','paid by the shop owner in cash'),(7,25,'2021-12-09','Paid by the shop owner in IIT Patna account'),(8,2,'2021-12-04','');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `after_Insert_dues` AFTER INSERT ON `payment` FOR EACH ROW BEGIN
UPDATE dues SET status='Paid' where new.dueID=dueID;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `shop`
--

DROP TABLE IF EXISTS `shop`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shop` (
  `shopID` varchar(30) NOT NULL,
  `location` varchar(100) NOT NULL,
  `licVal` date NOT NULL,
  `licExt` decimal(4,2) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `shopName` varchar(30) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `licReq` varchar(25) NOT NULL DEFAULT 'Inactive',
  PRIMARY KEY (`shopID`),
  KEY `idxshop` (`shopID`),
  CONSTRAINT `check_contact` CHECK ((not((`contact` like _utf8mb4'%[^0-9]%'))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES ('123FC01','Food Court','2021-12-04',4.00,'7819177355','Amul','','Inactive'),('123FC02','Old girls hostel','2022-02-21',2.00,'9934071901','McDonalds\'','testing','Inactive'),('123FC03','Food Court','2025-03-21',3.00,'8172615509','KFC','','Active'),('123FC04','Academic block','2028-08-16',2.00,'7071288719','Nescafe 1','','Inactive'),('123FC05','Old boys hostel','2026-08-14',2.00,'7819177356','Nescafe 2','','Inactive'),('123FC06','Food Court','2028-02-21',3.00,'9934079303','Second wife','','Inactive'),('123FC07','Old girls hostel','2025-02-20',2.00,'7071271746','Mothers\' kitchen','','Inactive'),('123FC08','Food Court','2022-02-21',3.00,'9934078744','Stationery','test','Inactive'),('123FC09','Academic block','2022-02-21',2.00,'7071288787','Metro Plaza','test','Inactive');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `before_shop_delete` BEFORE DELETE ON `shop` FOR EACH ROW begin
		DELETE FROM shopkeeper WHERE shopID=old.shopID;
		DELETE FROM dues WHERE shopID=old.shopID;
		DELETE FROM feedback WHERE shopID=old.shopID;
 end */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `shopkeeper`
--

DROP TABLE IF EXISTS `shopkeeper`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shopkeeper` (
  `shopkeeperID` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `contact` varchar(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `shopID` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `role` varchar(15) NOT NULL,
  `secPassVal` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `secReq` varchar(25) NOT NULL DEFAULT 'Inactive',
  PRIMARY KEY (`shopkeeperID`),
  KEY `shop_id_employee` (`shopID`),
  KEY `idxshopkeeper` (`shopkeeperID`),
  CONSTRAINT `shop_id_employee` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  CONSTRAINT `check_contact_shopkeeper` CHECK ((not((`contact` like _utf8mb4'%[^0-9]%'))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopkeeper`
--

LOCK TABLES `shopkeeper` WRITE;
/*!40000 ALTER TABLE `shopkeeper` DISABLE KEYS */;
INSERT INTO `shopkeeper` VALUES ('1901SK01','Nezuko Kamado','7819177369','Kyoto','123FC01','Female','Shop owner','2025-12-01','fb0fceffb177a025aa8f9d52ea63e317','Inactive'),('1901SK02','Reed Franks','9312613715','Galway','123FC02','Male','Shop owner','2022-03-07','ss59gY3c','Inactive'),('1901SK03','Caleb Hester','8328572322','Adelaide','123FC03','Female','Shop employee','2023-05-16','tp74lG1v','Inactive'),('1901SK04','Dennis Eaton','8873278582','Sint-Joost-ten-Node','123FC04','Female','Shop employee','2022-01-08','fn84pC6s','Inactive'),('1901SK05','Lareina Vance','6716105041','Sichuan','123FC05','Other','Shop owner','2022-05-03','gf40eS7h','Inactive'),('1901SK06','Garth Harris','8827091658','Pondicherry','123FC06','Other','Shop owner','2023-07-20','sz33sU6v','Inactive'),('1901SK07','Phelan Baxter','7157415681','Sepino','123FC07','Prefer not to say','Shop employee','2022-02-05','vc84oF9c','Inactive'),('1901SK08','Jaquelyn Wilkerson','7138711635','Lipetsk','123FC08','Prefer not to say','Shop employee','2023-06-11','ks31dL3b','Inactive'),('1901SK09','Ryder Flowers','8181873516','Penrith','123FC09','Male','Shop owner','2022-09-28','sr22qM9m','Inactive'),('1901SK10','Ashely Benson','7553882514','Windermere','123FC01','Male','Shop owner','2023-10-15','nk49xH8n','Inactive'),('1901SK11','Cedric Burch','6621633871','Voronezh','123FC02','Female','Shop employee','2023-11-18','cn85uB4y','Inactive'),('1901SK12','Bree Burch','6337397224','Liaoning','123FC03','Female','Shop employee','2022-09-14','go92fB4e','Inactive'),('1901SK13','Ivory Nelson','8327146141','Falun','123FC04','Other','Shop owner','2022-04-03','os67cN2q','Inactive'),('1901SK14','Jade Phillips','7132648337','Morelia','123FC05','Other','Shop owner','2022-10-06','yi12kK2a','Inactive'),('1901SK15','Claudia Armstrong','7667996556','Warri','123FC06','Prefer not to say','Shop employee','2022-09-08','lq83jH1f','Inactive'),('1901SK16','Hedwig Nicholson','6841665234','Tonalá','123FC07','Prefer not to say','Shop employee','2022-11-22','vt64vK6f','Inactive'),('1901SK17','Tanisha Hartman','6643755180','Lafayette','123FC08','Male','Shop owner','2022-02-18','wh51dN3w','Inactive'),('1901SK18','Allen Rosales','9842270453','Tejar','123FC09','Male','Shop owner','2022-06-03','mv12zP7l','Inactive'),('1901SK19','Brody Higgins','7544259161','Cork','123FC01','Female','Shop employee','2022-02-06','it47nM9w','Inactive'),('1901SK20','Venus Hubbard','6481265581','Serik','123FC02','Female','Shop employee','2022-07-15','is05dC2i','Inactive'),('1901SK21','Judith Mclean','9806118683','Xuân Trường','123FC03','Other','Shop owner','2022-01-03','nf19iI2g','Inactive'),('1901SK22','Ignatius Maddox','8684801407','Kharmang','123FC04','Other','Shop owner','2022-03-26','nx03gV7l','Inactive'),('1901SK23','Oleg Stevens','8261560521','San Rafael','123FC05','Prefer not to say','Shop employee','2021-12-16','ry79dJ4d','Inactive'),('1901SK24','Prescott Richard','6263271458','Antalya','123FC06','Prefer not to say','Shop employee','2022-11-19','ec47eR0a','Inactive'),('1901SK25','Savannah Snider','6763047041','Cerchio','123FC07','Male','Shop owner','2022-05-26','ow17sI5t','Inactive'),('1901SK26','Ashton Floyd','8747616972','Wigtown','123FC08','Male','Shop owner','2022-08-30','tf61tT8v','Inactive'),('1901SK27','Josiah Anderson','6054974956','Huntingdon','123FC09','Female','Shop employee','2021-12-09','yj78pU1k','Inactive'),('1901SK28','Hayley Stanton','8148675932','Osan','123FC01','Female','Shop employee','2022-02-14','uy08sQ6g','Inactive'),('1901SK29','Quemby Strong','7694591476','Gumi','123FC02','Other','Shop owner','2022-05-11','hm56eU5y','Inactive'),('1901SK30','Amal Pena','9866599324','Dublin','123FC03','Other','Shop owner','2022-09-26','hy33jS5t','Inactive'),('1901SK31','Tate Stephenson','9643065496','Ereğli','123FC04','Prefer not to say','Shop employee','2022-03-10','cy64sD1i','Inactive'),('1901SK32','Elliott Curry','6156418322','Vetlanda','123FC05','Prefer not to say','Shop employee','2022-08-29','ep14wI3l','Inactive'),('1901SK33','Andrew Bernard','9534777466','Abeokuta','123FC06','Male','Shop owner','2022-07-17','rf13pC4f','Inactive'),('1901SK34','Daniel Myers','6615549803','Develi','123FC07','Male','Shop owner','2022-06-06','is47oP3m','Inactive'),('1901SK35','Chiquita Baird','8610373641','Besançon','123FC08','Female','Shop employee','2021-12-23','nj24vR1q','Inactive'),('1901SK36','Tanek Bradford','8877864313','Bottidda','123FC09','Female','Shop employee','2022-02-09','nm20aK4d','Inactive'),('1901SK37','Sydnee Acosta','7353923781','Tuxtla Gutiérrez','123FC01','Other','Shop owner','2021-11-30','yu69hC2k','Active'),('1901SK38','Catherine Pearson','7816828374','Sulzbach','123FC02','Other','Shop owner','2022-05-01','wp74rV9j','Inactive'),('1901SK39','Ashton Dillon','6343365733','Lelystad','123FC03','Prefer not to say','Shop employee','2022-08-23','dy87dS5p','Inactive'),('1901SK40','Carl Gordon','8361284451','Jaén','123FC04','Prefer not to say','Shop employee','2022-01-17','nb30pX3v','Inactive'),('1901SK41','Wynne Frank','7818816027','Hangu','123FC05','Male','Shop owner','2022-09-14','dw44rE3o','Inactive'),('1901SK42','Anne Olson','9622681515','Santander de Quilichao','123FC06','Male','Shop owner','2022-01-08','mr20oW1p','Inactive'),('1901SK43','Iris Rogers','9015301416','Srinagar','123FC07','Female','Shop employee','2022-09-01','ro84fV2v','Inactive'),('1901SK44','Gabriel Delacruz','9779597345','North Waziristan','123FC08','Female','Shop employee','2022-03-11','xn82oT8k','Inactive'),('1901SK45','Belle Woods','6873425377','Jeju','123FC09','Other','Shop owner','2021-10-07','oj31hC2n','Active'),('1901SK46','Kessie Zamora','8887189964','Oamaru','123FC01','Other','Shop owner','2022-05-04','ur71eF1v','Inactive'),('1901SK47','Rahim Elliott','7321357367','Soissons','123FC02','Prefer not to say','Shop employee','2022-08-26','jy81uK2u','Inactive'),('1901SK48','Imani Gilliam','6178654644','Lagos','123FC03','Prefer not to say','Shop employee','2022-10-29','yh67kX4y','Inactive'),('1901SK49','Owen Wilcox','7525278751','Rutigliano','123FC04','Male','Shop owner','2022-06-19','vi42hQ1c','Inactive'),('1901SK50','Aimee Trevino','7468536625','Bauchi','123FC05','Male','Shop owner','2022-04-18','qh23oA9y','Inactive'),('1901SK51','Regan Abbott','9251252816','Guápiles','123FC06','Female','Shop employee','2022-05-11','ks04xT6q','Inactive'),('1901SK52','Adria Stevens','8617720881','Agustín Codazzi','123FC07','Female','Shop employee','2022-09-21','no51vB1c','Inactive'),('1901SK53','Macy Levy','9752624267','Katsina','123FC08','Other','Shop owner','2022-10-17','qb97aZ8w','Inactive'),('1901SK54','Dora Todd','6416072456','Palopo','123FC09','Other','Shop owner','2022-07-11','ew87kG8j','Inactive'),('1901SK55','Nissim Kirby','9470332622','Smolensk','123FC01','Prefer not to say','Shop employee','2022-04-15','za72bA1n','Inactive'),('1901SK56','Justin Hyde','8343350161','Gasteiz','123FC02','Prefer not to say','Shop employee','2022-10-23','mx87rR6k','Inactive'),('1901SK57','Cadman Bird','6302738636','Chełm','123FC03','Male','Shop owner','2022-04-12','px07iO0n','Inactive'),('1901SK58','Ivan Koch','8113187655','Lauterach','123FC04','Male','Shop owner','2022-08-31','fh17vD1j','Inactive'),('1901SK59','Tasha Ellis','7918858070','Ch‰telineau','123FC05','Female','Shop employee','2022-05-02','bh97rT0f','Inactive'),('1901SK60','Bryar Wooten','9101177613','Quibdó','123FC06','Female','Shop employee','2022-06-17','vm02lT7e','Inactive');
/*!40000 ALTER TABLE `shopkeeper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'marketshop'
--

--
-- Dumping routines for database 'marketshop'
--
/*!50003 DROP FUNCTION IF EXISTS `calculateExtension` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = cp850 */ ;
/*!50003 SET character_set_results = cp850 */ ;
/*!50003 SET collation_connection  = cp850_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` FUNCTION `calculateExtension`(ext decimal(4,2), exp date) RETURNS date
    DETERMINISTIC
BEGIN
	DECLARE days int;
	RETURN DATE_ADD(exp, INTERVAL ext*365 DAY);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-30  0:09:43
