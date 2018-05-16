-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: pokedex
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

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
-- Table structure for table `accepted_request`
--

DROP TABLE IF EXISTS `accepted_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `accepted_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `edit_id` int(50) DEFAULT NULL,
  `poke_id` int(50) DEFAULT NULL,
  `request_from` varchar(50) DEFAULT NULL,
  `edit_type` varchar(50) DEFAULT NULL,
  `pre_edit` text,
  `edit` text,
  `time_stamp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accepted_request`
--

LOCK TABLES `accepted_request` WRITE;
/*!40000 ALTER TABLE `accepted_request` DISABLE KEYS */;
INSERT INTO `accepted_request` VALUES (1,14,1,'tar@gmail.com',NULL,'blastoise','blaster','2018-03-29 20:36:25.944636'),(2,15,1,'tar@gmail.com',NULL,'blaster','blastoise','2018-03-29 20:56:39.276603'),(3,16,1,'tar@gmail.com','type','water','fire','2018-03-29 21:02:08.116393'),(4,17,1,'tar@gmail.com','type','fire','water','2018-03-29 21:03:23.010161'),(5,13,8,'tar@gmail.com','name','venasaur','venusaur','2018-05-15 19:08:01.096626');
/*!40000 ALTER TABLE `accepted_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `declined_request`
--

DROP TABLE IF EXISTS `declined_request`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `declined_request` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `edit_id` int(50) DEFAULT NULL,
  `poke_id` int(50) DEFAULT NULL,
  `request_from` varchar(50) DEFAULT NULL,
  `edit_type` varchar(50) DEFAULT NULL,
  `pre_edit` text,
  `edit` text,
  `time_stamp` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `declined_request`
--

LOCK TABLES `declined_request` WRITE;
/*!40000 ALTER TABLE `declined_request` DISABLE KEYS */;
INSERT INTO `declined_request` VALUES (1,13,1,'','weight_in_kg','85.5','dvscs','2018-03-22 21:27:46.850370'),(2,18,2,'tar@gmail.com','name','Bulbasaur','blahblahblah','2018-03-29 21:10:51.122209'),(3,13,1,'tarun.goenka12@gmail.com','name','blastoise','blaaaaaaaaaaastoise','2018-05-03 21:27:02.349494'),(4,14,1,'tarun.goenka12@gmail.com','name','blastoise','blowhard','2018-05-03 21:36:25.438186');
/*!40000 ALTER TABLE `declined_request` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edit`
--

DROP TABLE IF EXISTS `edit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit` (
  `edit_id` int(50) NOT NULL AUTO_INCREMENT,
  `poke_id` int(50) DEFAULT NULL,
  `request_from` varchar(50) DEFAULT NULL,
  `edit_type` varchar(50) DEFAULT NULL,
  `edit` text,
  `pre_edit` text,
  `time_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`edit_id`),
  KEY `poke_id` (`poke_id`),
  CONSTRAINT `edit_ibfk_1` FOREIGN KEY (`poke_id`) REFERENCES `pokemons` (`poke_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edit`
--

LOCK TABLES `edit` WRITE;
/*!40000 ALTER TABLE `edit` DISABLE KEYS */;
INSERT INTO `edit` VALUES (2,6,NULL,'name','Pichu','pikachu','2018-03-22 06:08:44.434631'),(9,2,NULL,'type','water','grass','2018-03-22 08:29:30.699393'),(11,1,NULL,'weight_in_kg','esafasd','85.5','2018-03-22 15:55:16.843740'),(12,1,NULL,'name','daasd','blastoise','2018-03-22 15:56:42.436560');
/*!40000 ALTER TABLE `edit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `edit_record`
--

DROP TABLE IF EXISTS `edit_record`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `edit_record` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `edit_id` varchar(50) DEFAULT NULL,
  `poke_id` varchar(50) DEFAULT NULL,
  `edit` varchar(50) DEFAULT NULL,
  `request_from` varchar(50) DEFAULT NULL,
  `action` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `edit_record`
--

LOCK TABLES `edit_record` WRITE;
/*!40000 ALTER TABLE `edit_record` DISABLE KEYS */;
INSERT INTO `edit_record` VALUES (1,'14','1','blowhard','tarun.goenka12@gmail.com','DECLD'),(2,'13','8','venusaur','tar@gmail.com','ACPTD');
/*!40000 ALTER TABLE `edit_record` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_replies`
--

DROP TABLE IF EXISTS `forum_replies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_replies` (
  `comment_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_id` int(10) DEFAULT NULL,
  `comment` text,
  `commented_by` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`comment_id`),
  KEY `topic_id` (`topic_id`),
  KEY `commented_by` (`commented_by`),
  CONSTRAINT `forum_replies_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `forum_topics` (`topic_id`) ON DELETE CASCADE,
  CONSTRAINT `forum_replies_ibfk_2` FOREIGN KEY (`commented_by`) REFERENCES `login` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_replies`
--

LOCK TABLES `forum_replies` WRITE;
/*!40000 ALTER TABLE `forum_replies` DISABLE KEYS */;
/*!40000 ALTER TABLE `forum_replies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `forum_topics`
--

DROP TABLE IF EXISTS `forum_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `forum_topics` (
  `topic_id` int(10) NOT NULL AUTO_INCREMENT,
  `topic_name` varchar(50) DEFAULT NULL,
  `starting_text` text,
  `created_by` varchar(50) DEFAULT NULL,
  `time_stamp` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  PRIMARY KEY (`topic_id`),
  KEY `created_by` (`created_by`),
  CONSTRAINT `forum_topics_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `login` (`email`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `forum_topics`
--

LOCK TABLES `forum_topics` WRITE;
/*!40000 ALTER TABLE `forum_topics` DISABLE KEYS */;
INSERT INTO `forum_topics` VALUES (1,'testing','this is to test','tarun.goenka12@gmail.com','2018-05-16 08:54:42.334016'),(2,'testing2','hi','tarun.goenka12@gmail.com','2018-05-16 08:54:58.799286');
/*!40000 ALTER TABLE `forum_topics` ENABLE KEYS */;
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
INSERT INTO `login` VALUES ('tarun.goenka12@gmail.com','123','user'),('tar@gmail.com','123','admin');
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
  KEY `edit_id` (`edit_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pokemons`
--

LOCK TABLES `pokemons` WRITE;
/*!40000 ALTER TABLE `pokemons` DISABLE KEYS */;
INSERT INTO `pokemons` VALUES (1,'blastoise','The jets of water it spouts from the rocket cannons on its shell can punch through thick steel.','Tackle,Tail whip,Bubble,Water gun',85.5,1.6,'none','wartortle','water','blastoise.png',17),(2,'Bulbasaur','For some time after its birth, it grows by gaining nourishment from the seed on its back.','tackle,growl,leechseed,synthesis',6.9,0.7,'ivysaur,venusaur','none','grass','Bulbasaur.png',19),(3,'charizard','It is said that Charizards fire burns hotter if it has experienced harsh battles.','heatwave,seismictoss,dragonrage,flamethrower',90.5,1.7,'none','charmeleon','fire','charizard.png',NULL),(4,'charmander','The fire on the tip of its tail is a measure of its life. If healthy, its tail burns intensely.','smokescreen,firefang,ember,scratch',8.5,0.6,'charmeleon,charizard','none','fire','charmander.png',NULL),(5,'ivysaur','When the bud on its back starts swelling, a sweet aroma wafts to indicate the flowers coming bloom.','vinewhip,takedown,leechseed,synthesis',13,1,'venusaur','bulbasaur','grass','ivysaur.png',NULL),(6,'pikachu','It occasionally uses an electric shock to recharge a fellow Pikachu that is in a weakened state.','thundershock,electroball,sparkle,nuzzle',6,0.4,'raichu','pichu','electric','pikachu.png',NULL),(7,'squirtle','It shelters itself in its shell then strikes back with spouts of water at every opportunity.','tackle,taiwhip,watergun,bubble',9,0.5,'wartortle,blastoise','none','water','squirtle.png',NULL),(8,'venusaur','After a rainy day, the flower on its back smells stronger. The scent attracts other Pokemon','vinewhip,takedown,leechseed,synthesis',100,2,'none','ivysaur','grass','venasaur.png',13),(9,'wartortle','It is said to live 10,000 years. Its furry tail is popular as a symbol of longevity.','hydropump,aquapulse,watergun,bubble',22.5,1,'blastoise','squirtle','water','wartortle.png',NULL),(10,'Charmeleon','In the rocky mountains where Charmeleon live, their fiery tails shine at night like stars.','Scratch,Growl,Ember,Smokescreen',19,1.1,'charizard','charmander','fire','Charmeleon.png',NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `register`
--

LOCK TABLES `register` WRITE;
/*!40000 ALTER TABLE `register` DISABLE KEYS */;
INSERT INTO `register` VALUES (3,'tarun','goenka','tarun.goenka12@gmail.com','123','user'),(4,'tarun','goenka','tar@gmail.com','123','admin');
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

-- Dump completed on 2018-05-16 16:39:11
