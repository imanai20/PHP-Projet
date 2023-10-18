-- MariaDB dump 10.19-11.3.0-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: exercicephp
-- ------------------------------------------------------
-- Server version	11.3.0-MariaDB

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
-- Table structure for table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `joueur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `club` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `but` int(11) DEFAULT NULL,
  `pays` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `joueur`
--

LOCK TABLES `joueur` WRITE;
/*!40000 ALTER TABLE `joueur` DISABLE KEYS */;
INSERT INTO `joueur` VALUES
(2,'Messi','Paris Saint Germain',37,700,'Argentine','https://media.gettyimages.com/id/955410340/fr/photo/lionel-messi-of-barcelona-celebrates-after-scoring-his-sides-second-goal-during-the-la-liga.jpg?s=612x612&w=gi&k=20&c=-cXORYeR48L22AC4xfwtT4SC-bpPTYhQC4xmHyv_bT4='),
(3,'Ronaldo','Manchester United',37,780,'Portugal','https://imgresizer.eurosport.com/unsafe/1200x0/filters:format(jpeg)/origin-imgresizer.eurosport.com/2023/10/16/3804613-77382188-2560-1440.jpg'),
(4,'Griezmann','Atletico Madrid',31,230,'France','https://img.lemde.fr/2021/07/07/0/0/5479/3653/664/0/75/0/b6781ad_5167376-01-06.jpg'),
(5,'Kanté','Chelsea',31,30,'France','https://images.bfmtv.com/pUDOOeQmSvBacmJsaXDrefHItQc=/0x79:800x529/images/-823472.jpg'),
(6,'Pogba','Manchester United',28,40,'France','https://upload.wikimedia.org/wikipedia/commons/thumb/c/cc/FRA-ARG_%2811%29_-_Paul_Pogba_%28cropped_2%29.jpg/280px-FRA-ARG_%2811%29_-_Paul_Pogba_%28cropped_2%29.jpg'),
(7,'Pavard','Bayern de Munich',25,5,'France','https://assets.bundesliga.com/player/dfl-obj-0027g0-dfl-clu-00000g-dfl-sea-0001k7.png?fit=320,320');
/*!40000 ALTER TABLE `joueur` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-18  1:05:00
