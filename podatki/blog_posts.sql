-- MySQL dump 10.13  Distrib 5.7.9, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: blog
-- ------------------------------------------------------
-- Server version	5.7.10

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
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `date_published` date NOT NULL DEFAULT '2016-03-20',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Petkova Blog objava','Tale bojava mora biti v testing kategoriji igračke :)\r\n                \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    \r\n                    ','2016-03-04 13:23:01','2016-03-04 17:28:27','2016-03-20'),(2,'Večerna objava',' to je ena kratka večerna objava Da vidim kako delujejo nove pridobitve :)\r\nUpam da bo :) moja sprememba\r\n                \r\n                    ','2016-03-04 17:32:36','2016-03-04 17:58:00','2016-03-20'),(3,'Zadnji test','to je zadnji test nocoj\r\n                ','2016-03-04 19:23:41','2016-03-04 19:23:41','2016-03-20'),(4,'Sobota','Živo eno super soboto želim :) \r\n                ','2016-03-05 07:07:27','2016-03-05 07:07:27','2016-03-20'),(5,'To je moja objava','Kar dobro napreduje lepo poačsi sicer ampak bo:) \r\n                ','2016-03-05 10:00:56','2016-03-05 10:00:56','2016-03-20'),(6,'To je nedeljski test','Živjo Janko to je nedeljski test delovanja mojega bloga Če bo vse OK se bo to sporočilo pojavilo čisto na vrhu in na prvi strani bodo 3 sporočila :) \r\n                ','2016-03-20 07:25:22','2016-03-20 07:25:22','2016-03-20'),(7,'Delovanje datuma objave','Ojla to je test delovanja datuma objave, ki ga lepo izbereš spodaj \r\nUpam da bo delovalo :)\r\n                ','2016-03-20 08:46:00','2016-03-20 08:46:00','2013-03-20'),(8,'Date published ali deluje','Ali deluje date publihed bomo videli prav kmalu :) \r\n                ','2016-03-20 08:54:19','2016-03-20 08:54:19','2016-03-21'),(9,'Planica 2016','To pa je res nekaj neverjetnega res super to moraš prav doživitei :) \r\nVčeraj je bil en super dan skupaj z  DPM  Škofja Loka :) \r\n                ','2016-03-20 09:11:34','2016-03-20 09:11:34','2016-03-19'),(10,'Nedelja popoldan','Eno mirno nedeljsko popoldne  urejam blog da bo malo lepši  upam da bo ura tega posta zdaj prava :) \r\n                ','2016-03-20 15:31:33','2016-03-20 15:31:33','2016-03-20'),(11,'Nedeljski test III','To je še en dodatni test delovanja točnega časa :) \r\n                ','2016-03-20 15:36:40','2016-03-20 15:36:40','2016-03-20'),(12,'Kratek test','To je kratek test delovanja :) \r\n                ','2016-03-20 15:41:14','2016-03-20 15:41:14','2016-03-20'),(13,'test autocomplete naslov','                        Če je ta test viden na prvi strani potem pomeni da autocomplete v naslovu deluje dobro :) Res je delujea ampak bo še za dodelat :) \r\n                \r\n                    ','2016-03-20 18:43:30','2016-03-21 08:57:14','2016-03-20'),(14,'test delovanja ','Test delovanja objava nedelja zvečer :) ','2016-03-20 20:42:45','2016-03-20 20:42:45','2016-03-20'),(15,'Kratek ponedeljkov test ','Malo sem urejal podrobnosti če je vse ok bi moral dobiti sporočilo ko sme objava shrani \r\n                ','2016-03-21 08:52:03','2016-03-21 08:52:03','2016-03-21'),(16,'Kratek ponedeljkov test ','Malo sem urejal podrobnosti če je vse ok bi moral dobiti sporočilo ko sme objava shrani \r\n                ','2016-03-21 08:52:24','2016-03-21 08:52:24','2016-03-21');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-03-21 11:13:13
