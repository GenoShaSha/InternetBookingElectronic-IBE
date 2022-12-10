-- MySQL dump 10.13  Distrib 8.0.27, for Win64 (x86_64)
--
-- Host: localhost    Database: ibas
-- ------------------------------------------------------
-- Server version	8.0.27

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
-- Table structure for table `flight_person`
--

DROP TABLE IF EXISTS `flight_person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `flight_person` (
  `flight_person_id` int NOT NULL AUTO_INCREMENT,
  `flight_id` int NOT NULL,
  `person_id` int NOT NULL,
  `check_in` tinyint NOT NULL,
  PRIMARY KEY (`flight_person_id`),
  UNIQUE KEY `flight_person_id_UNIQUE` (`flight_person_id`),
  KEY `flight_pf_idx` (`flight_id`),
  KEY `bookingperson_pf_idx` (`person_id`),
  CONSTRAINT `bookingflight_pf` FOREIGN KEY (`flight_id`) REFERENCES `booking_flight` (`flight_id`),
  CONSTRAINT `bookingperson_pf` FOREIGN KEY (`person_id`) REFERENCES `booking_person` (`person_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flight_person`
--

LOCK TABLES `flight_person` WRITE;
/*!40000 ALTER TABLE `flight_person` DISABLE KEYS */;
INSERT INTO `flight_person` VALUES (1,26,102,0),(2,28,102,0),(3,26,103,1),(4,26,104,0),(5,28,103,1),(6,28,104,1),(7,29,105,0),(8,29,106,0),(9,26,107,0);
/*!40000 ALTER TABLE `flight_person` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-12-10 13:19:21
