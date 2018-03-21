-- MySQL dump 10.10
--
-- Host: localhost    Database: poke
-- ------------------------------------------------------
-- Server version	5.0.27-community-nt

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
-- Table structure for table `pokedex`
--

DROP TABLE IF EXISTS `pokedex`;
CREATE TABLE `pokedex` (
  `Poke_ID` varchar(20) NOT NULL,
  `Name` varchar(20) default NULL,
  `Moves` varchar(50) default NULL,
  `Weight` float default NULL,
  `Height` float default NULL,
  `Evolution_Forms` varchar(20) default NULL,
  `Pre_evolution_Forms` varchar(20) default NULL,
  `Type` varchar(20) default NULL,
  `Image` tinytext,
  PRIMARY KEY  (`Poke_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pokedex`
--

LOCK TABLES `pokedex` WRITE;
/*!40000 ALTER TABLE `pokedex` DISABLE KEYS */;
INSERT INTO `pokedex` VALUES ('1','Bulbasaur','Tackle,Growl,Leechseed,Synthesis',6.9,0.7,'Ivysaur,Venasaur','None','Grass','C:Users	nambDocumentsGitHubPok-dexassetsimga1.png'),('10','Pikachu','ThunderShock,ElectroBall,Spark,Nuzzle',6,0.4,'Raichu','None','Electric','C:Users	nambDocumentsGitHubPok-dexassetsimgpika.png'),('2','Ivysaur','VineWhip,TakeDown,Leechseed,Synthesis',13,1,'Venusaur','Venusaur','Grass','C:Users	nambDocumentsGitHubPok-dexassetsimga2.png'),('3','Venusaur','VineWhip,TakeDown,Leechseed,Synthesis',100,2,'None','Ivysaur','Grass','C:Users	nambDocumentsGitHubPok-dexassetsimga3.png'),('4','Squirtle','Tackle,TailWhip,WaterGun,Bubble',9,0.5,'Wartortle,Blastoise','None','Water','C:Users	nambDocumentsGitHubPok-dexassetsimg1.png'),('5','Wartortle','HydroPump,AquaPulse,WaterGun,Bubble',22.5,1,'Blastoise','Squirtle','Water','C:Users	nambDocumentsGitHubPok-dexassetsimg2.png'),('6','Blastoise','HydroPump,AquaPulse,WaterGun,SkullBash',85.5,1.6,'None','Ivysaur','Water','C:Users	nambDocumentsGitHubPok-dexassetsimg3.png'),('7','Charmander','SmokeScreen,FireFang,Ember,Scratch',8.5,0.6,'Charmelion,Charizard','None','Fire','C:Users	nambDocumentsGitHubPok-dexassetsimgc1.png'),('8','Charmelion','Inferno,FireFang,Ember,FlameThrower',19,1.1,'Charizard','Charmander','Fire','C:Users	nambDocumentsGitHubPok-dexassetsimgc2.png'),('9','Charizard','HeatWave,SeismicToss,DragonRage,FlameThrower',90.5,1.7,'None','Charmelion','Fire','C:Users	nambDocumentsGitHubPok-dexassetsimgc3.png');
/*!40000 ALTER TABLE `pokedex` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-21 14:14:56
