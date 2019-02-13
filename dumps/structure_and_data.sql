CREATE DATABASE  IF NOT EXISTS `manufacture_furniture` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `manufacture_furniture`;
-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: 127.0.0.1    Database: manufacture_furniture
-- ------------------------------------------------------
-- Server version	5.5.61

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
-- Table structure for table `equipment`
--

DROP TABLE IF EXISTS `equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `equipment` (
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `equipment`
--

LOCK TABLES `equipment` WRITE;
/*!40000 ALTER TABLE `equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `furniture`
--

DROP TABLE IF EXISTS `furniture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `furniture` (
  `article` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `measure` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `type_detail` varchar(45) DEFAULT NULL,
  `purchasing_price` int(11) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `main_provider` varchar(255) NOT NULL,
  PRIMARY KEY (`article`,`main_provider`),
  KEY `fk_furniture_privider_idx` (`main_provider`),
  CONSTRAINT `fk_furniture_privider` FOREIGN KEY (`main_provider`) REFERENCES `provider` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `furniture`
--

LOCK TABLES `furniture` WRITE;
/*!40000 ALTER TABLE `furniture` DISABLE KEYS */;
/*!40000 ALTER TABLE `furniture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `name` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `material`
--

DROP TABLE IF EXISTS `material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `material` (
  `article` varchar(45) NOT NULL,
  `name` varchar(255) NOT NULL,
  `measure` varchar(45) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `main_provider` varchar(255) NOT NULL DEFAULT '',
  `image` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL,
  `purchasing_price` int(11) DEFAULT NULL,
  `length` int(11) DEFAULT NULL,
  `property` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`article`,`type`,`main_provider`),
  KEY `fk_material_provider_idx` (`main_provider`),
  CONSTRAINT `fk_material_provider` FOREIGN KEY (`main_provider`) REFERENCES `provider` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `material`
--

LOCK TABLES `material` WRITE;
/*!40000 ALTER TABLE `material` DISABLE KEYS */;
/*!40000 ALTER TABLE `material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order`
--

DROP TABLE IF EXISTS `order`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `price` int(11) NOT NULL,
  `date_end_plan` date DEFAULT NULL,
  `drawing` varchar(255) DEFAULT NULL,
  `item` varchar(255) NOT NULL,
  `customer` varchar(255) NOT NULL,
  `manager` varchar(255) NOT NULL,
  PRIMARY KEY (`id`,`date`,`customer`,`item`),
  KEY `fk_order_user_idx` (`customer`),
  KEY `fk_order_item_idx` (`item`),
  CONSTRAINT `fk_order_user` FOREIGN KEY (`customer`) REFERENCES `user` (`login`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_order_item` FOREIGN KEY (`item`) REFERENCES `item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order`
--

LOCK TABLES `order` WRITE;
/*!40000 ALTER TABLE `order` DISABLE KEYS */;
/*!40000 ALTER TABLE `order` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provider`
--

DROP TABLE IF EXISTS `provider`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provider` (
  `name` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `delivery_date` date NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provider`
--

LOCK TABLES `provider` WRITE;
/*!40000 ALTER TABLE `provider` DISABLE KEYS */;
/*!40000 ALTER TABLE `provider` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec_furniture`
--

DROP TABLE IF EXISTS `spec_furniture`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec_furniture` (
  `item` varchar(255) NOT NULL,
  `furniture` varchar(45) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`item`,`furniture`),
  KEY `fk_spec_furniture_furniture_idx` (`furniture`),
  CONSTRAINT `fk_spec_furniture_furniture` FOREIGN KEY (`furniture`) REFERENCES `furniture` (`article`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_spec_furniture_item` FOREIGN KEY (`item`) REFERENCES `item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec_furniture`
--

LOCK TABLES `spec_furniture` WRITE;
/*!40000 ALTER TABLE `spec_furniture` DISABLE KEYS */;
/*!40000 ALTER TABLE `spec_furniture` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec_item`
--

DROP TABLE IF EXISTS `spec_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec_item` (
  `item` varchar(255) NOT NULL,
  `detail` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  PRIMARY KEY (`item`,`detail`),
  CONSTRAINT `fk_spec_item_item` FOREIGN KEY (`item`) REFERENCES `item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec_item`
--

LOCK TABLES `spec_item` WRITE;
/*!40000 ALTER TABLE `spec_item` DISABLE KEYS */;
/*!40000 ALTER TABLE `spec_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec_material`
--

DROP TABLE IF EXISTS `spec_material`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec_material` (
  `item` varchar(255) NOT NULL,
  `amount` int(11) NOT NULL,
  `material` varchar(45) NOT NULL,
  PRIMARY KEY (`item`,`material`),
  KEY `fk_spec_material_material_idx` (`material`),
  CONSTRAINT `fk_spec_material_material` FOREIGN KEY (`material`) REFERENCES `material` (`article`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_spec_material_item` FOREIGN KEY (`item`) REFERENCES `item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec_material`
--

LOCK TABLES `spec_material` WRITE;
/*!40000 ALTER TABLE `spec_material` DISABLE KEYS */;
/*!40000 ALTER TABLE `spec_material` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec_operation`
--

DROP TABLE IF EXISTS `spec_operation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec_operation` (
  `item` varchar(255) NOT NULL,
  `operation` varchar(255) NOT NULL,
  `number` int(11) NOT NULL,
  `type_equipment` varchar(255) DEFAULT NULL,
  `time_operation` date DEFAULT NULL,
  PRIMARY KEY (`item`,`operation`,`number`),
  CONSTRAINT `fk_spec_operation_item` FOREIGN KEY (`item`) REFERENCES `item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec_operation`
--

LOCK TABLES `spec_operation` WRITE;
/*!40000 ALTER TABLE `spec_operation` DISABLE KEYS */;
/*!40000 ALTER TABLE `spec_operation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `type_equipment`
--

DROP TABLE IF EXISTS `type_equipment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `type_equipment` (
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`type`),
  CONSTRAINT `fk_type_equipment_spec_operation` FOREIGN KEY (`type`) REFERENCES `spec_operation` (`item`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_type_equipment_equipment` FOREIGN KEY (`type`) REFERENCES `equipment` (`type`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `type_equipment`
--

LOCK TABLES `type_equipment` WRITE;
/*!40000 ALTER TABLE `type_equipment` DISABLE KEYS */;
/*!40000 ALTER TABLE `type_equipment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`login`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
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

-- Dump completed on 2019-02-13 19:24:22
