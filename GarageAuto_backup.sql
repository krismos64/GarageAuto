-- MySQL dump 10.13  Distrib 8.1.0, for macos13.3 (arm64)
--
-- Host: 127.0.0.1    Database: GarageAuto
-- ------------------------------------------------------
-- Server version	8.1.0

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `car`
--

DROP TABLE IF EXISTS `car`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car` (
  `id` int NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `km` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_773DE69DA76ED395` (`user_id`),
  CONSTRAINT `FK_773DE69DA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car`
--

LOCK TABLES `car` WRITE;
/*!40000 ALTER TABLE `car` DISABLE KEYS */;
INSERT INTO `car` VALUES (13,'Bmw','Sport Edition','2018','25700','35000','<div>La BMW édition sport était proposée en deux versions de carrosserie, comme modèle à trois et à cinq portes. Ce modèle à trois portes avec son concept d’espace variable, dispose d’un volume de presque 2000 litres lors du rabattement des sièges arrière et du siège du convoyeur. Ce grand volume résulte surtout de la construction spécifique de la grande hauteur de cette incroyable voiture.</div>','BMW SPORT EDITION BLANCHE TOIT OUVRANT',NULL),(14,'Volkswagen','Golf 7','2016','55700','11000','<div>Un moteur essence et un moteur électrique combinés. Passez d’un transport purement électrique, sans émissions de gaz d’échappement, à un mélange d’essence et d’électrique afin de réduire les émissions sur les longs trajets. La recharge électrique de votre PHEV se fait en toute simplicité depuis votre domicile ou sur votre lieu de destination.</div>','VOLKSWAGEN GOLF 7 BLANCHE',NULL),(15,'Peugeot','208','2015','85700','7500','La voiture parfaite ! Le confort est irréprochable, la finition le choix des matériaux \n        fait de cette voiture l’une des meilleures au monde. Idéale pour les longs trajets comme les plus courts.','PEUGEOT 208 BLEUE',NULL),(16,'Renault','Captur','2018','95100','8500','La voiture a été entretenue par nos soins depuis le début, elle est dans un état irreprochable !','RENAULT CAPTURE ORANGE',NULL),(17,'Renault','Clio 4','2017','65220','8100','La voiture a été révision chez nous, controle technique ok dépechez-vous!','RENAULT CLIO 4 BLANCHE',NULL),(18,'Volkswagen','Polo','2022','22422','14100','La voiture est en super état, controle technique ok première main comme neuve full options','VOLKSWAGEN POLO ROUGE',NULL),(20,'ferrari','F1 2019','2019','66000','15000','<div>bolide de fou furieux</div>','FERRARI',NULL),(21,'PEUGEOT','308','2020','18200','32000','<div>Voiture toutes options comme neuve</div>','PEUGEOT 308',NULL);
/*!40000 ALTER TABLE `car` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_image`
--

DROP TABLE IF EXISTS `car_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `car_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `car_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_1A968188C3C6F69F` (`car_id`),
  CONSTRAINT `FK_1A968188C3C6F69F` FOREIGN KEY (`car_id`) REFERENCES `car` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_image`
--

LOCK TABLES `car_image` WRITE;
/*!40000 ALTER TABLE `car_image` DISABLE KEYS */;
INSERT INTO `car_image` VALUES (29,13,'bmw-64b576fb6282b296177986.jpg','BMW SPORT BLANCHE'),(30,13,'bmw-interieur-64b576fb79185998642121.jpg','Intérieur BMW'),(31,14,'VolkswagenGolf-2.webp','VW Golf7 BLANCHE AVANT'),(32,14,'VolkswagenGolf-3.webp','VW Golf7 BLANCHE ARRIERE'),(33,15,'peugeot208-1.webp','PEUGEOT 208 BLEUE AVANT'),(34,15,'peugeot208-2.webp','PEUGEOT 208 BLEUE ARRIERE'),(35,15,'peugeot208-3.webp','PEUGEOT 208 BLEUE COTE'),(36,16,'RenaultCaptur-1.webp','RENAULT CAPTURE ORANGE COTE GAUCHE'),(37,16,'RenaultCaptur-2.webp','RENAULT CAPTURE ORANGE COTE DROIT'),(38,17,'RenaultClio-1.webp','RENAULT CLIO 4 BLANCHE AVANT'),(39,17,'RenaultClio-2.webp','RENAULT CLIO 4 BLANCHE COTE'),(40,17,'RenaultClio-3.webp','RENAULT CLIO 4 BLANCHE AVANT'),(41,18,'VolkswagenPolo-2.webp','VOLKSWAGEN POLO ROUGE DROITE'),(42,18,'VolkswagenPolo-3.webp','VOLKSWAGEN POLO ROUGE GAUCHE'),(43,20,'ferrari.jpg','ferrari rouge'),(44,21,'peugeot308-1.webp','peugot 308'),(45,21,'peugeot308-2.webp','peugot 308'),(46,21,'peugeot308-3.webp','peugot 308');
/*!40000 ALTER TABLE `car_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `doctrine_migration_versions`
--

DROP TABLE IF EXISTS `doctrine_migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `doctrine_migration_versions` (
  `version` varchar(191) COLLATE utf8mb3_unicode_ci NOT NULL,
  `executed_at` datetime DEFAULT NULL,
  `execution_time` int DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `doctrine_migration_versions`
--

LOCK TABLES `doctrine_migration_versions` WRITE;
/*!40000 ALTER TABLE `doctrine_migration_versions` DISABLE KEYS */;
INSERT INTO `doctrine_migration_versions` VALUES ('DoctrineMigrations\\Version20240226172533','2024-02-26 17:25:54',39),('DoctrineMigrations\\Version20240226202108','2024-02-26 20:21:25',106),('DoctrineMigrations\\Version20240311121418','2024-03-11 12:14:46',57);
/*!40000 ALTER TABLE `doctrine_migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `message` (
  `id` int NOT NULL AUTO_INCREMENT,
  `message` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `processed` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `IDX_B6BD307FA76ED395` (`user_id`),
  CONSTRAINT `FK_B6BD307FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (13,'rendez-vous d\'urgence appelez-moi',NULL,'c.mostefaoui@yahoo.fr','CHRISTOPHE','moss','+33679088845',1);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messenger_messages`
--

DROP TABLE IF EXISTS `messenger_messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `messenger_messages` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `body` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `headers` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue_name` varchar(190) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`id`),
  KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  KEY `IDX_75EA56E016BA31DB` (`delivered_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messenger_messages`
--

LOCK TABLES `messenger_messages` WRITE;
/*!40000 ALTER TABLE `messenger_messages` DISABLE KEYS */;
/*!40000 ALTER TABLE `messenger_messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rating` int NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `is_approved` tinyint(1) NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6970EB0FA76ED395` (`user_id`),
  CONSTRAINT `FK_6970EB0FA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` VALUES (24,5,'Au top ce garage !','2024-02-19 12:00:00',1,'Stacy','Moss',NULL),(25,5,'Je suis très satisfait, ma formule 1 avit un problème pour accélérer, Mr Parrot a su trouver le problème rapidement je recommande ce garage!','2023-11-14 11:00:00',1,'Esteban','Ocon',NULL),(26,4,'Génial, un point en moins pour la fermeture le dimanche !','2023-09-10 12:00:00',1,'Emilia','Clark',NULL),(27,5,'Le meilleur garage au monde !','2024-01-31 12:00:00',1,'Lebron','James',NULL),(28,5,'Ils ont pu réparer ma fusée en 5minutes, de vrais pro !','2024-11-05 12:00:00',1,'Elon','Musk',NULL),(29,4,'Sympathique mais locaux un peu petits...','2023-12-28 12:00:00',1,'Luc','Skywalker',NULL),(54,5,'super mega genial','2024-03-10 14:23:00',1,'CHRISTOPHE','MOSTEFAOUI',NULL),(55,1,'nul comme garage','2024-03-10 13:24:03',1,'Mohamed','MOSTEFAOUI',NULL);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schedules`
--

DROP TABLE IF EXISTS `schedules`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `schedules` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `closing_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_313BDC8EA76ED395` (`user_id`),
  CONSTRAINT `FK_313BDC8EA76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schedules`
--

LOCK TABLES `schedules` WRITE;
/*!40000 ALTER TABLE `schedules` DISABLE KEYS */;
INSERT INTO `schedules` VALUES (64,NULL,'Lundi','08:30','19:00'),(65,NULL,'Mardi','08:30','19:00'),(66,NULL,'Mercredi','08:30','19:00'),(67,NULL,'Jeudi','08:30','19:00'),(68,NULL,'Vendredi','08:00','17:30'),(69,NULL,'Samedi','08:00','12:00'),(70,NULL,'Dimanche','Fermé','');
/*!40000 ALTER TABLE `schedules` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_E19D9AD2A76ED395` (`user_id`),
  CONSTRAINT `FK_E19D9AD2A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (5,NULL,'Réparation mécanique','Une panne, une casse, un accident ? On s’occupe d’effectuer les diagnostics et les\n        réparations mécaniques et carrosseries de votre auto'),(6,NULL,'Entretien et révision','Nous vous accompagnons toute l’année pour la réparation et l’équipementde votre auto\n        afin de garantir votre mobilité au quotidien.'),(7,NULL,'Pare-brise et vitrage','Dès l’instant où vous repérez un dommage (impact ou fissure) sur votre pare-brise, \n        contactez notre garage. Un professionnel déterminera s’il faut le réparer ou le remplacer puis vous proposera \n        une solution adaptée.'),(8,NULL,'Pneumatique','Les pneus de votre auto sont essentiels à votre sécurité à bord ! Les pneumatiques \n        sont le lien direct entre votre voiture et le sol. Leur état influence en grande partie la tenue de route ainsi \n        que les distances de freinage de votre véhicule.'),(10,NULL,'Nettoyage','nettoyage de voiture complet'),(11,NULL,'freins','Changement plaquettes et disques');
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service_image`
--

DROP TABLE IF EXISTS `service_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `service_image` (
  `id` int NOT NULL AUTO_INCREMENT,
  `service_id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_6C4FE9B8ED5CA9E6` (`service_id`),
  CONSTRAINT `FK_6C4FE9B8ED5CA9E6` FOREIGN KEY (`service_id`) REFERENCES `service` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service_image`
--

LOCK TABLES `service_image` WRITE;
/*!40000 ALTER TABLE `service_image` DISABLE KEYS */;
INSERT INTO `service_image` VALUES (5,5,'amortisseur.jpg','Voiture noire en réparation'),(6,6,'vidange.jpg','Vidange huile'),(7,7,'pare-brise.jpg','Réparation pare-brise'),(8,8,'pneus.jpg','Changement Pneus'),(9,10,'nettoyage.jpg','Nettoyage de voiture'),(10,11,'freins.jpg','changement plaquettes');
/*!40000 ALTER TABLE `service_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (51,'v.parrot@gmail.com','[\"ROLE_SUPER_ADMIN\"]','$2y$13$D2lCuz6vCKpFt8nDbGKiiOXAu7J6F4V8rgLdmKYS0N35UT0ZGNLNK','Parrot','Vincent'),(52,'cmurcie18@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$4KFKbgALbGVfpIwzcQTQYuwHLIo1RRAFCbFrBDZIooxhe87JYcpYK','Murcie','Cyril'),(53,'festayre64@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$ZG2LYBR2ryIyS9JUNC1LsepUvUZI4Dk9WOF5j43WklbI6.TGOSjNi','Duval','Marc'),(54,'Raki457@yahoo.fr','[\"ROLE_ADMIN\"]','$2y$13$dFf8uKi5IyE9PPSl9YmZCu.5bvFMr7/yKmJ79amjFDwheMr7WOB9y','Raki','Chris'),(55,'rlegrand@gmail.com','[\"ROLE_ADMIN\"]','$2y$13$zdX1Rf4ICBWISptTWD8KXu0FvXbwsBc.hBGSj1BlnRB2pnsgZInxO','Legrand','Romain'),(56,'c.mostefaoui@yahoo.fr','[\"ROLE_SUPER_ADMIN\", \"ROLE_ADMIN\"]','$2y$13$nmmg6z7RQhuTGWCHpNrW5O9HXdW6LxWA9RMjcx4vgB8JizjBiLwH6','MOSTEFAOUI','CHRISTOPHE');
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

-- Dump completed on 2024-06-14 12:31:37
