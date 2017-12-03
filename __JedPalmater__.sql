CREATE DATABASE  IF NOT EXISTS `fa-jedpalmater` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `fa-jedpalmater`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: fa-jedpalmater
-- ------------------------------------------------------
-- Server version	5.7.19

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
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (192,'adsfasdfweef','2017-12-03 19:11:27','108'),(181,'test','2017-12-03 18:49:21','90'),(182,'test','2017-12-03 18:49:32','90'),(183,'test','2017-12-03 18:49:40','90'),(190,'asdfasdfasd','2017-12-03 19:10:40','108'),(194,'11111111111111111111','2017-12-03 19:11:53','108'),(195,'asdfasdfasdf','2017-12-03 19:13:10','90');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `day`
--

LOCK TABLES `day` WRITE;
/*!40000 ALTER TABLE `day` DISABLE KEYS */;
INSERT INTO `day` VALUES (1,1),(2,2),(3,3),(4,4),(5,5),(6,6),(7,7),(8,8),(9,9),(10,10),(11,11),(12,12),(13,13),(14,14),(15,15),(16,16),(17,17),(18,18),(19,19),(20,20),(21,21),(22,22),(23,23),(24,24),(25,25),(26,26),(27,27),(28,28),(29,29),(30,30),(31,31);
/*!40000 ALTER TABLE `day` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `friends`
--

LOCK TABLES `friends` WRITE;
/*!40000 ALTER TABLE `friends` DISABLE KEYS */;
INSERT INTO `friends` VALUES (90,'2017-12-03 14:34:29','conf',108),(108,'2017-12-03 14:48:09','unconf',129),(90,'2017-12-03 14:54:45','unconf',129),(108,'2017-12-03 15:14:07','conf',90);
/*!40000 ALTER TABLE `friends` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `likes`
--

LOCK TABLES `likes` WRITE;
/*!40000 ALTER TABLE `likes` DISABLE KEYS */;
/*!40000 ALTER TABLE `likes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `members`
--

LOCK TABLES `members` WRITE;
/*!40000 ALTER TABLE `members` DISABLE KEYS */;
INSERT INTO `members` VALUES (90,'jed','$2y$10$8xst7YGWM41W.QvXuvfDa.j0cwqfliUhahhfTEzMvtLzd.owtqlDe','Jed','Palmater','26 Duffie Drive Fredericton','AB','T1A 1A1','5062628888','jed@palmater.ca','06/29/1990','Male','2017-09-27 18:47:44','Upload/car_smile.jpg','Fredericton NB','Fredericton','Female','English','NBCC','FHS','TEST','AAAAAAAAAAAAAAAAA',NULL,NULL,NULL,NULL),(108,'chris','$2y$10$y04LQoIVchI83z8tnKDc9OXTUcsfZh9Ps5XsYuuurWvv06rHmfWhS','Chris','Pickard','my house',NULL,NULL,'5065554444','chris@pickard.ca','10/16/1998','Female','2017-10-16 20:34:06','Upload/Photo 2012-04-03, 3 16 23 PM.jpg','Freddy','Moms','Male','English','NUN','SUM','I did things once..........','I like pointy things!',NULL,NULL,NULL,NULL),(129,'jeddy','$2y$10$5v6OlFmcaSjOAlDqrLLRi.CowecNYIMNvRXGft3MmpKR0.QBiosQ.','jeddy','Palmater','19 Greystone Court','NB','E3B 6R5','50655544444','jed@p.ca','04/20/1988','Male','2017-11-13 15:42:41',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(124,'Voluptates','$2y$10$IzSJHBK1PhcJfTWnLSxbFu.5ZVAP010HOhMJzaAjAQ0H258wnhHyW','Haviva Cain','Stacey Jarvis','Et accusantium eaque aliquid ad quaerat laborum','SK','A2P 3N7','887-558-5433','jack@yahoo.com','11/19/1968','Male','2017-11-05 15:16:30',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(113,'megful','$2y$10$HqZ5l9nrLIHHcON3WZWnSO5aBJ/ijI3o5K0sg4co3mxWOnWsn8Pku','meg','ful','123','NB',NULL,'5062624444','me@you.ca','11/14/1967','Female','2017-11-01 17:35:47',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(128,'ChrisMeg','$2y$10$7uJ92JOSFaxV6AUimIzeS.9xWMiqxwClVogmewvChy76.KIzfcFL.','Christina','Megleana','555 Your street','AB','E3K 2k2','5554443333','chris@meg.ca','11/08/1976','Female','2017-11-12 17:17:59',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(125,'Rerum','$2y$10$Gqrl/FGYqbFXuzKfoqauxOHm1lQO38WRknLlX4RHxpon0Ydjtm8Am','Demetrius Horton','Cole Dean','Aliquip non facere corrupti voluptatem quis soluta aliquam in id quae qui','NT','S7K8C6','863-322-8907','jack@gmail.com','11/19/1970','Male','2017-11-05 15:18:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(118,'newTester','$2y$10$eiZv6Yks.P53mjUwCjIaZudAIKeHmMhRWlTC6f9zFN/QxYQDNagk2','tester','McTest','123 Test Dr','MB','E3B 9K2','506-262-9999','2@2','01/12/1970','Female','2017-11-01 19:29:41',NULL,'','','Male','English','','','','',NULL,NULL,NULL,NULL),(130,'jedp2','$2y$10$I7LsPsN1Sb.UMywWWUzq6eqLaiNhtPnr76s3dLvTbbUp/UX4Fv3TS','Jed','Palmater','19 Greystone Crt','AB','E3B 1S4','5062223333','jed@pal.ca','11/08/1978','Female','2017-11-14 15:53:14',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(131,'jedp22','$2y$10$CQF75gP24anRm9HwsvWe.eyq8d7I93DO7rpXVvFngUkE3SRpFDfjm','Jed','Palmater','19 Greystone Crt','NB','E3B 1S4','5062223333','jed2@pal.ca','11/08/1978','Female','2017-11-14 15:53:59',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(132,'Abconsecteturexer','$2y$10$.Th3PSZUvmvXbjh6FKKVAeSf5mjtIw50h6FFrHf699kHlAtaUzKUy','Melanie Morrison','Fitzgerald Campos','Cupiditate qui adipisicing velit beatae ut sint unde aut quas dolor delect','AB','T1A1A1','5062223333','ropemaja@hotmail.com','11/02/1971','Female','2017-11-18 11:12:32',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(134,'Nisoi','$2y$10$jK5TXa.aHfuaZLslKmZpBOLGxngs1Jjo2egrjEcGFvg674EnNGdFS','Autumn Talley','Gage Owen','Itaque sint ut qui rerum consequat Sint velit incididunt maxime adipisic','AB','T1A1A1','9728955432','sesozabat@hotmail.com','11/09/1982','Female','2017-11-18 11:15:56',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(135,'Autasdf','$2y$10$xpfo31CUYhCHan9pTYM0N.QQ1j1WkxzAHjVkxfyQ5F93C2PPStxbu','Theodore Hall','Shea Lawrence','In sunt aut doloribus consequat Laboris amet quos eligendi quae voluptas ','PE','Obcaeca','6058554433','rybixe@hotmail.com','11/14/1972','Male','2017-11-18 11:16:25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(136,'Doloremquibusdam','$2y$10$ic68vvgaxVnsnl/Xt0fcMOD0TFqCgFPO3cIx9mToeZdktJLbLbf2W','Melodie Navarro','Omar Griffith','Do quis duis dolor pariatur Et tempora possimus est dolore itaque consequ','AB','Suscipi','4005052436','hubyfym@yahoo.com','11/11/1987','Male','2017-11-18 11:17:31',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(137,'Voluptasteneturh','$2y$10$bJu3fBptHY.Y2bT/7bbuteHxRa/33Qj7vF4zl2YnQEMa0fK9AApx6','Emerson Holloway','Lucian Gould','Tempore voluptates inventore voluptatem Duis eveniet irure','NB','Et laud','5068995432','texaqekir@hotmail.com','11/22/1978','Female','2017-11-18 11:19:02',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(138,'Magnieligendi','$2y$10$dgWGy3C6712AdWHYqNe7U.TStgB4Qk1PZkdynx1ZUFsY4c7tal57m','Ulysses Luna','Sydney Sullivan','Quis sit incidunt sunt dolor inventore illo sit occaecat occaecat sit au','','','9715554321','syhamy@hotmail.com','11/07/1969','Male','2017-11-18 14:52:25',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(139,'Fugiatullam','$2y$10$9wl/pEibhrJXfFKWCpsyFuBgczt/x9DnlzEj/PcGLaId7bILVoAGq','Suki Vang','Alexandra Lynch','Voluptatem Sed ut vel sit occaecat ullamco dolorum','','','7435554321','cesocywam@gmail.com','11/17/1970','Male','2017-11-18 14:53:34',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(140,'Cupiditate','$2y$10$Z33KBn.neGjUJzq.AZJp3ebb1qrbMFe7Rk6EIkmBTlzqabHuVt8Zi','Ahmed Bryant','Melodie Rosales','Non sed eveniet at corporis nulla tempora dolor in ad animi voluptatum eu','','','2165554444','guqeke@hotmail.com','11/03/1982','Male','2017-11-24 21:41:39',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(141,'Veniampraes','$2y$10$zp0/EuYjnzxDbP.v/fj0P.uqnE5q3/nVfSBr7rcmzHabmGgk7J1jC','Alice Barber','Sonia Cummings','Id et inventore quisquam qui sed optio est sunt eligendi','AB','T1A 1A1','5405554321','bika@hotmail.com','05/18/1981','Female','2017-11-24 21:46:31',NULL,'','','Select','English','','','','',NULL,NULL,NULL,NULL),(142,'Cillum','$2y$10$4N2h07Dy.ae654zPnFdGTO1wamLzlwahII5z4ZBZO83NRe6TErnrS','Tamara Miranda','Lucian Sharpe','Quaerat sint esse ut architecto voluptatem Fugiat non doloremque laudanti','AB','T1A 1A1','6638544321','botyh@hotmail.com','11/10/1977','Male','2017-11-30 14:22:35',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `members` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `month`
--

LOCK TABLES `month` WRITE;
/*!40000 ALTER TABLE `month` DISABLE KEYS */;
INSERT INTO `month` VALUES (1,'January'),(2,'February'),(3,'March'),(4,'April'),(5,'May'),(6,'June'),(7,'July'),(8,'August'),(9,'September'),(10,'October'),(11,'November'),(12,'December');
/*!40000 ALTER TABLE `month` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (93,'Upload/ca95443591fc264303a3cf79915216c8.jpg',90),(70,'Upload/Photo 2015-04-27, 3 35 24 PM.jpg',108),(71,'Upload/eagle.png',112),(72,'Upload/meg_seddy.jpg',112),(73,'Upload/neph_puppy.jpg',112),(94,'Upload/2013-08-06 20.46.45.jpg',90),(95,'Upload/laceplaidandtattoos-648435.jpeg',108);
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `postcomment`
--

LOCK TABLES `postcomment` WRITE;
/*!40000 ALTER TABLE `postcomment` DISABLE KEYS */;
INSERT INTO `postcomment` VALUES (32,'sdfasdf','Jed Palmater','Upload/car_smile.jpg',90,'2017-12-03 16:04:59'),(33,'asdfasdf','Chris ','',108,'2017-12-03 16:06:10');
/*!40000 ALTER TABLE `postcomment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `year`
--

LOCK TABLES `year` WRITE;
/*!40000 ALTER TABLE `year` DISABLE KEYS */;
INSERT INTO `year` VALUES (30,1983),(29,1984),(28,1985),(27,1986),(26,1987),(25,1988),(24,1989),(23,1990),(22,1991),(21,1992),(20,1993),(19,1994),(18,1995),(17,1996),(16,1997),(15,1998),(14,1999),(13,2000),(12,2001),(11,2002),(10,2003),(9,2004),(8,2005),(7,2006),(6,2007),(5,2008),(4,2009),(3,2010),(2,2011),(1,2012),(43,1970),(42,1971),(41,1972),(40,1973),(39,1974),(38,1975),(37,1976),(36,1977),(35,1978),(34,1979),(33,1980),(32,1981),(31,1982);
/*!40000 ALTER TABLE `year` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'fa-jedpalmater'
--

--
-- Dumping routines for database 'fa-jedpalmater'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-12-03 19:25:45
