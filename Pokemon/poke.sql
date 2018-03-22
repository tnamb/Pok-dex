-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: pokedex
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

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
-- Table structure for table `edit`
--

DROP TABLE IF EXISTS `edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit` (
  `edit_id` int(50) NOT NULL AUTO_INCREMENT,
  `edit_type` varchar(50) DEFAULT NULL,
  `edit` text,
  `pre_edit` text,
  `time_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`edit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edit`
--

LOCK TABLES `edit` WRITE;
/*!40000 ALTER TABLE `edit` DISABLE KEYS */;
/*!40000 ALTER TABLE `edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  KEY `email` (`email`),
  CONSTRAINT `login_ibfk_1` FOREIGN KEY (`email`) REFERENCES `register` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES ('tarun.goenka12@gmail.com','123','user');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pokemons`
--

DROP TABLE IF EXISTS `pokemons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pokemons` (
  `poke_id` int(50) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` text,
  `moves` varchar(100) DEFAULT NULL,
  `weight_in_kg` float DEFAULT NULL,
  `height_in_m` float DEFAULT NULL,
  `evolution_form` varchar(50) DEFAULT NULL,
  `pre_evolution_form` varchar(50) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `image` text,
  `edit_id` int(50) DEFAULT NULL,
  PRIMARY KEY (`poke_id`),
  UNIQUE KEY `name` (`name`),
  KEY `edit_id` (`edit_id`),
  CONSTRAINT `pokemons_ibfk_1` FOREIGN KEY (`edit_id`) REFERENCES `edit` (`edit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokemons`
--

LOCK TABLES `pokemons` WRITE;
/*!40000 ALTER TABLE `pokemons` DISABLE KEYS */;
INSERT INTO `pokemons` VALUES (1,'blastoise','The jets of water it spouts from the rocket cannons on its shell can punch through thick steel.','Tackle,Tail whip,Bubble,Water gun',85.5,1.6,'none','wartortle','water','blastoise.png',NULL),(2,'Bulbasaur',NULL,'tackle,growl,leechseed,synthesis',6.9,0.7,'ivysaur,venasaur','none','grass','Bulbasaur.png',NULL),(3,'charizard',NULL,'heatwave,seismictoss,dragonrage,flamethrower',90.5,1.7,'none','charmelion','fire','charizard.png',NULL),(4,'charmander',NULL,'smokescreen,firefang,ember,scratch',8.5,0.6,'charmelion,charizard','none','fire','charmander.png',NULL),(5,'ivysaur',NULL,'vinewhip,takedown,leechseed,synthesis',13,1,'venasaur','bulbasaur','grass','ivysaur.png',NULL),(6,'pikachu',NULL,'thundershock,electroball,sparkle,nuzzle',6,0.4,'raichu','pichu','electric','pikachu.png',NULL),(7,'squirtle',NULL,'tackle,taiwhip,watergun,bubble',9,0.5,'wartortle,blastoise','none','water','squirtle.png',NULL),(8,'venasaur',NULL,'vinewhip,takedown,leechseed,synthesis',100,2,'none','ivysaur','grass','venasaur.png',NULL),(9,'wartortle',NULL,'hydropump,aquapulse,watergun,bubble',22.5,1,'blastoise','squirtle','water','wartortle.png',NULL);
/*!40000 ALTER TABLE `pokemons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `register`
--

DROP TABLE IF EXISTS `register`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `register` (
  `reg_id` int(50) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`reg_id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (3,'tarun','goenka','tarun.goenka12@gmail.com','123','user');
/*!40000 ALTER TABLE `register` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-22 10:40:16
