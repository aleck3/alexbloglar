-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: alexblog
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author_email` varchar(45) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `post_id` int(11) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_comment_post_1` (`post_id`),
  CONSTRAINT `fk_comment_post_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (4,'comment1@comment.com','Bacon ipsum dolor amet bacon chuck brisket, prosciutto frankfurter doner pork chop swine alcatra short loin ball tip pastrami meatball shankle. Picanha bacon ham, meatball meatloaf sirloin biltong kevin sausage shank. ',4,'2016-11-13 15:21:26'),(5,'comment2@comment2.com','Burgdoggen picanha tri-tip sausage. Pig andouille frankfurter, beef short ribs spare ribs t-bone turducken tenderloin landjaeger corned beef pastrami ham kevin. ',5,'2016-11-13 15:21:26'),(6,'comment3@comment3.com','Turducken shankle pancetta, spare ribs chuck rump tongue tenderloin capicola hamburger short ribs alcatra. Bresaola alcatra jowl drumstick, pork belly biltong flank fatback beef ribs venison filet ',5,'2016-11-13 18:00:42'),(7,'comment4@comment4.com','Ribeye pork jerky cow prosciutto pancetta spare ribs biltong kielbasa. Beef ribs chuck shoulder, pork belly turducken jerky pork loin pig ham.',6,'2016-11-13 18:03:02'),(8,'guest@guest.com','Landjaeger cow porchetta, chicken alcatra shankle pork chop jowl sausage leberkas pork belly pig flank chuck meatball.',5,'2016-11-15 08:28:41'),(9,'guest2@guest.com','Pork belly flank chuck ribeye t-bone pork tri-tip filet mignon.',4,'2016-11-15 08:29:18'),(10,'guest22@guest.com','Turducken shankle pancetta, spare ribs chuck rump tongue tenderloin capicola hamburger short ribs alcatra.',6,'2016-11-15 08:29:56'),(11,'qwdqwe@bubu.com','Turducken shankle pancetta, spare ribs chuck rump tongue tenderloin capicola hamburger short ribs alcatra.',4,'2016-11-17 15:04:55'),(12,'guest@guest.com',' Bresaola alcatra jowl drumstick, pork belly biltong flank fatback beef ribs venison filet mignon swine doner pork loin.',6,'2016-11-17 15:06:10'),(13,'guest@guest.com','Curabitur velit dui, euismod a euismod in, rhoncus sed ante. Sed a purus et dolor pharetra sodales a eu augue.',7,'2016-11-17 15:43:29'),(14,'guest2@guest.com','Sed in metus non justo tempus imperdiet eget ac ligula.',8,'2016-11-17 15:44:01'),(15,'guest22@guest.com','Pellentesque posuere nulla magna, eu lobortis tortor gravida in.',10,'2016-11-17 15:44:53');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `file`
--

DROP TABLE IF EXISTS `file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `file` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `type` varchar(45) NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_file_user_1` (`user_id`),
  CONSTRAINT `fk_file_user_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `file`
--

LOCK TABLES `file` WRITE;
/*!40000 ALTER TABLE `file` DISABLE KEYS */;
/*!40000 ALTER TABLE `file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` varchar(45) DEFAULT NULL,
  `content` longtext NOT NULL,
  `date_published` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_post_user_1` (`author`),
  CONSTRAINT `fk_post_user_1` FOREIGN KEY (`author`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (4,3,'Post1dfgrethgreg',NULL,'sdfsdfsdfsdf.picanha rump turkey. Alcatra pancetta jowl, flank tenderloin kielbasa pork chop doner corned beef chuck ribeye tongue drumstick. Pork loin landjaeger venison swine burgdoggen turducken cupim pancetta spare ribs salami hamburger. Turducken shankle pancetta, spare ribs chuck rump tongue tenderloin capicola hamburger short ribs alcatra. Bresaola alcatra jowl drumstick, pork belly biltong flank fatback beef ribs venison filet mignon swine doner pork loin. Pork belly flank chuck ribeye t-bone pork tri-tip filet mignon.','2016-11-13 15:16:33','2016-11-13 15:16:33'),(5,3,'Post2 333',NULL,'333!!! Sausage cupim pork chuck porchetta meatball beef prosciutto picanha frankfurter ham hock alcatra pancetta corned beef. Landjaeger cow porchetta, chicken alcatra shankle pork chop jowl sausage leberkas pork belly pig flank chuck meatball. T-bone picanha ham cow spare ribs kielbasa. Ribeye pork jerky cow prosciutto pancetta spare ribs biltong kielbasa. Beef ribs chuck shoulder, pork belly turducken jerky pork loin pig ham. Cupim turducken strip steak, burgdoggen drumstick tri-tip ham hock alcatra.','2016-11-13 15:19:16','2016-11-13 15:19:16'),(6,4,'Post3',NULL,'Shank picanha rump turkey. Alcatra pancetta jowl, flank tenderloin kielbasa pork chop doner corned beef chuck ribeye tongue drumstick. Pork loin landjaeger venison swine burgdoggen turducken cupim pancetta spare ribs salami hamburger. Turducken shankle pancetta, spare ribs chuck rump tongue tenderloin capicola hamburger short ribs alcatra. Bresaola alcatra jowl drumstick, pork belly biltong flank fatback beef ribs venison filet mignon swine doner pork loin. Pork belly flank chuck ribeye t-bone pork tri-tip filet mignon.','2016-11-13 15:19:16','2016-11-13 15:19:16'),(7,3,'my New Post',NULL,'ac suscipit fringilla. Donec aliquam porta leo at luctus. Sed consequat sapien ut purus dapibus, in tempus ex iaculis. Sed lacinia augue a est vestibulum, in faucibus tellus venenatis. Sed at fringilla ante. Curabitur vel maximus nibh. Nunc finibus metus et lorem commodo, eu imperdiet enim pulvinar. Curabitur velit dui, euismod a euismod in, rhoncus sed ante. Sed a purus et dolor pharetra sodales a eu augue. Duis ut lacus id mauris feugiat suscipit at ut tellus. Nam blandit consequat sapien, eget rutrum risus pellentesque in. Aliquam in sollicitudin odio. Sed in metus non justo tempus imperdiet eget ac ligula.','2016-11-17 14:51:08','2016-11-17 14:51:08'),(8,3,'my New Post2',NULL,'. Curabitur velit dui, euismod a euismod in, rhoncus sed ante. Sed a purus et dolor pharetra sodales a eu augue. Duis ut lacus id mauris feugiat suscipit at ut tellus. Nam blandit consequat sapien, eget rutrum risus pellentesque in. Aliquam in sollicitudin odio. Sed in metus non justo tempus imperdiet eget ac ligula.','2016-11-17 14:56:21','2016-11-17 14:56:21'),(9,3,'my New Post3',NULL,'Nullam convallis risus fermentum gravida condimentum. Sed in massa nisl. Aenean facilisis tortor a diam convallis ornare. Curabitur vel lorem malesuada, mollis dolor eget, eleifend massa. Duis tincidunt neque id erat vulputate, non congue neque dapibus. Morbi cursus posuere mi eu condimentum. Curabitur sagittis enim sapien, non malesuada urna fermentum eget. Aliquam aliquet risus mi, id hendrerit lectus luctus quis. Proin ultricies sed nulla et tincidunt. Donec feugiat risus sem, sit amet tincidunt tellus tempus vitae. Donec id viverra diam.','2016-11-17 15:06:31','2016-11-17 15:06:31'),(10,3,'my New Post777',NULL,'Nulla et dapibus dui. Sed a viverra risus. Proin pretium sapien ut quam consequat vulputate. Donec purus orci, cursus a orci sed, elementum tempor est. Integer aliquam tellus eu massa condimentum placerat. Proin sit amet erat tellus. Donec egestas venenatis enim, vel iaculis nulla tincidunt quis. Nunc iaculis nisi ac tempus iaculis. Curabitur justo turpis, porta eget nulla vitae, auctor dapibus lectus. Maecenas quis nibh mollis tortor sollicitudin consectetur eu vitae odio. Pellentesque posuere nulla magna, eu lobortis tortor gravida in.','2016-11-17 15:44:40','2016-11-17 15:44:40'),(11,3,'Post1 upgraded',NULL,'Upgraded!!! Shank picanha rump turkey. Alcatra pancetta jowl, flank tenderloin kielbasa pork chop doner corned beef chuck ribeye tongue drumstick. Pork loin landjaeger venison swine burgdoggen turducken cupim pancetta spare ribs salami hamburger. Turducken shankle pancetta, spare ribs chuck rump tongue tenderloin capicola hamburger short ribs alcatra. Bresaola alcatra jowl drumstick, pork belly biltong flank fatback beef ribs venison filet mignon swine doner pork loin. Pork belly flank chuck ribeye t-bone pork tri-tip filet mignon.','2016-11-18 14:02:09','2016-11-18 14:02:09'),(12,3,'my New Post777 updated',NULL,'Updated!!! Nulla et dapibus dui. Sed a viverra risus. Proin pretium sapien ut quam consequat vulputate. Donec purus orci, cursus a orci sed, elementum tempor est. Integer aliquam tellus eu massa condimentum placerat. Proin sit amet erat tellus. Donec egestas venenatis enim, vel iaculis nulla tincidunt quis. Nunc iaculis nisi ac tempus iaculis. Curabitur justo turpis, porta eget nulla vitae, auctor dapibus lectus. Maecenas quis nibh mollis tortor sollicitudin consectetur eu vitae odio. Pellentesque posuere nulla magna, eu lobortis tortor gravida in.','2016-11-18 14:18:47','2016-11-18 14:18:47');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_has_file`
--

DROP TABLE IF EXISTS `post_has_file`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post_has_file` (
  `post_id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  KEY `fk_post_has_file_post_1` (`post_id`),
  KEY `fk_post_has_file_file_1` (`file_id`),
  CONSTRAINT `fk_post_has_file_file_1` FOREIGN KEY (`file_id`) REFERENCES `file` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_post_has_file_post_1` FOREIGN KEY (`post_id`) REFERENCES `post` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_has_file`
--

LOCK TABLES `post_has_file` WRITE;
/*!40000 ALTER TABLE `post_has_file` DISABLE KEYS */;
/*!40000 ALTER TABLE `post_has_file` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `type` tinyint(10) DEFAULT NULL,
  `date_entered` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username_unique` (`username`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'admin','111','admin@admin.com',1,'2016-11-13 15:15:54'),(4,'guest1','222','guest1@guest1.com',2,'2016-11-13 15:18:01'),(5,'guest2','222','guest2@guest2.com',2,'2016-11-13 15:18:01');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_deteils`
--

DROP TABLE IF EXISTS `user_deteils`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_deteils` (
  `user_id` int(11) NOT NULL,
  `avatar` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  KEY `fk_user_deteils_user_1` (`user_id`),
  CONSTRAINT `fk_user_deteils_user_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_deteils`
--

LOCK TABLES `user_deteils` WRITE;
/*!40000 ALTER TABLE `user_deteils` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_deteils` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-21 10:46:26
