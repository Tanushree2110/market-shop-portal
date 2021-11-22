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
  CONSTRAINT `check_email` CHECK ((not((`email` like _cp850'^[a-zA-Z0-9+_.-]+@[a-zA-Z0-9.-]+$'))))
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
  CONSTRAINT `shop_id_dues` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  CONSTRAINT `check_status` CHECK ((`status` in (_cp850'Paid',_cp850'Pending')))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dues`
--

LOCK TABLES `dues` WRITE;
/*!40000 ALTER TABLE `dues` DISABLE KEYS */;
INSERT INTO `dues` VALUES (1,'123FC01',10234.2,'2024-02-21','License renewal','Paid'),(2,'123FC01',1234.2,'2021-12-21','Rent','Paid'),(3,'123FC01',10000,'2021-12-21','Rent','Pending'),(4,'123FC01',2300,'2022-02-21','Water','Pending'),(5,'123FC01',12000,'2024-02-21','License renewal','Pending');
/*!40000 ALTER TABLE `dues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `feedback` (
  `shopID` varchar(30) NOT NULL,
  `availability` int NOT NULL,
  `services` int NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `dof` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  KEY `shop_id_feedback` (`shopID`),
  CONSTRAINT `shop_id_feedback` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  CONSTRAINT `check_rating` CHECK (((`services` in (0,1,2,3,4,5)) and (`availability` in (0,1,2,3,4,5))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `feedback`
--

LOCK TABLES `feedback` WRITE;
/*!40000 ALTER TABLE `feedback` DISABLE KEYS */;
INSERT INTO `feedback` VALUES ('123FC01',4,4,'TEST','2021-11-21 18:37:35');
/*!40000 ALTER TABLE `feedback` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment`
--

DROP TABLE IF EXISTS `payment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment` (
  `dueID` int NOT NULL,
  `dop` date NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  KEY `due_id_payment` (`dueID`),
  CONSTRAINT `due_id_payment` FOREIGN KEY (`dueID`) REFERENCES `dues` (`dueID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment`
--

LOCK TABLES `payment` WRITE;
/*!40000 ALTER TABLE `payment` DISABLE KEYS */;
INSERT INTO `payment` VALUES (1,'2023-12-21',''),(2,'2021-12-07','test');
/*!40000 ALTER TABLE `payment` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`shopID`),
  CONSTRAINT `check_contact` CHECK ((not((`contact` like _utf8mb4'%[^0-9]%'))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shop`
--

LOCK TABLES `shop` WRITE;
/*!40000 ALTER TABLE `shop` DISABLE KEYS */;
INSERT INTO `shop` VALUES ('123FC01','Food Court','2024-02-21',4.00,'7819177355','Amul',''),('123FC02','Academic block','2024-02-21',2.50,'7812348819','McDonalds\'','');
/*!40000 ALTER TABLE `shop` ENABLE KEYS */;
UNLOCK TABLES;

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
  PRIMARY KEY (`shopkeeperID`),
  KEY `shop_id_employee` (`shopID`),
  CONSTRAINT `shop_id_employee` FOREIGN KEY (`shopID`) REFERENCES `shop` (`shopID`),
  CONSTRAINT `check_contact_shopkeeper` CHECK ((not((`contact` like _utf8mb4'%[^0-9]%'))))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shopkeeper`
--

LOCK TABLES `shopkeeper` WRITE;
/*!40000 ALTER TABLE `shopkeeper` DISABLE KEYS */;
INSERT INTO `shopkeeper` VALUES ('1901SK01','Nezuko Kamado','7073188723','Kyoto','123FC01','Female','Shop owner','2024-02-21','0439785ef33bad4b96f4c6ccd17d7274');
/*!40000 ALTER TABLE `shopkeeper` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'marketshop'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-11-22 14:35:53
