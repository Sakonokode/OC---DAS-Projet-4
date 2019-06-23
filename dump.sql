-- MySQL dump 10.13  Distrib 5.7.26, for Linux (x86_64)
--
-- Host: localhost    Database: expressfood
-- ------------------------------------------------------
-- Server version	5.7.26-0ubuntu0.18.04.1

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
-- Table structure for table `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart_item` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`cart_id`,`item_id`),
  KEY `IDX_F0FE25271AD5CDBF` (`cart_id`),
  KEY `IDX_F0FE2527126F525E` (`item_id`),
  CONSTRAINT `FK_F0FE2527126F525E` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_F0FE25271AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart_item`
--

LOCK TABLES `cart_item` WRITE;
/*!40000 ALTER TABLE `cart_item` DISABLE KEYS */;
INSERT INTO `cart_item` VALUES (1,1),(1,3),(2,2),(2,4),(3,1),(3,2),(4,1),(4,4),(5,2),(5,3),(6,1),(6,2);
/*!40000 ALTER TABLE `cart_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carts`
--

DROP TABLE IF EXISTS `carts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carts`
--

LOCK TABLES `carts` WRITE;
/*!40000 ALTER TABLE `carts` DISABLE KEYS */;
INSERT INTO `carts` VALUES (1,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(2,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(3,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(4,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(5,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(6,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL);
/*!40000 ALTER TABLE `carts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `item`
--

DROP TABLE IF EXISTS `item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1F1B251E4584665A` (`product_id`),
  CONSTRAINT `FK_1F1B251E4584665A` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `item`
--

LOCK TABLES `item` WRITE;
/*!40000 ALTER TABLE `item` DISABLE KEYS */;
INSERT INTO `item` VALUES (1,1,3,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(2,2,4,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(3,3,1,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(4,4,2,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL);
/*!40000 ALTER TABLE `item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `delivery_man_id` int(11) DEFAULT NULL,
  `payment_id` int(11) DEFAULT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_E52FFDEE4C3A3BB` (`payment_id`),
  UNIQUE KEY `UNIQ_E52FFDEE1AD5CDBF` (`cart_id`),
  KEY `IDX_E52FFDEEA76ED395` (`user_id`),
  KEY `IDX_E52FFDEEFD128646` (`delivery_man_id`),
  CONSTRAINT `FK_E52FFDEE1AD5CDBF` FOREIGN KEY (`cart_id`) REFERENCES `carts` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_E52FFDEE4C3A3BB` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE SET NULL,
  CONSTRAINT `FK_E52FFDEEA76ED395` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `FK_E52FFDEEFD128646` FOREIGN KEY (`delivery_man_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,3,1,1,'119 Avenue de Clichy, 75017 Paris','Order Complete','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(2,2,5,2,2,'23 Rue Damrémont, 75018 Paris','Order Complete','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(3,2,5,3,3,'2 Rue Ronsard, 75018 Paris','Order Complete','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(4,4,3,4,4,'12 Rue de la Fidélité, 75010 Paris','Order Complete','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(5,4,3,5,5,'1 Boulevard de Strasbourg, 75010 Paris','Order Complete','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(6,4,3,6,6,'10 Rue Hérold, 75001 Paris','Order Complete','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total` double DEFAULT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` VALUES (1,35,'Success','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(2,50,'Success','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(3,50,'Success','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(4,40,'Success','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(5,45,'Success','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(6,55,'Success','2019-06-23 14:36:46','2019-06-23 14:36:46',NULL);
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chef_id` int(11) DEFAULT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `price` double NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_B3BA5A5A150A48F1` (`chef_id`),
  CONSTRAINT `FK_B3BA5A5A150A48F1` FOREIGN KEY (`chef_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'dish','Salade froide de quinoa au céleri','J\'adore cette recette toute simple et l\'alliance du céleri, du persil, du miel et du bouillon de poule. A essayer !',10,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(2,1,'dish','Haricots plats (coco) pimentés','A servir avec du riz, ou du poisson, ou les deux. Attention, les piments oiseaux sont forts et plus on les cuit plus ils sont forts.',10,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(3,1,'dessert','Verrines trois chocolats','Imaginez, 3 chocolats, 3 couches, 3 textures... 3 formes de rêves qui se superposent pour former la gourmandise suprême.',5,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(4,1,'dessert','Tarte poire-chocolat','Un dessert facile facile mais trop trop delicieux.',5,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `dish_current_stock` int(11) DEFAULT NULL,
  `dish_total_stock` int(11) DEFAULT NULL,
  `dessert_current_stock` int(11) DEFAULT NULL,
  `dessert_total_stock` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  `deleted` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_1483A5E9E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,NULL,NULL,'chef-1@gmail.com','$2y$13$VVsnImRr9m7EMvEXIqfHfeH.ap/e7eX9oDqy4oceCXcru84Djzu1.','[\"ROLE_USER\", \"ROLE_CHEF\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-06-23 14:36:44','2019-06-23 14:36:44',NULL),(2,NULL,NULL,'user-1@gmail.com','$2y$13$abtYu4wqgFtJMR7GSzP35O3IYR5BM4YY0ofwkialo/is18PBIgNq.','[\"ROLE_USER\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-06-23 14:36:44','2019-06-23 14:36:44',NULL),(3,NULL,NULL,'delivery-man-1@gmail.com','$2y$13$jysKYyPeoFH.AcneENWmqex8RgDxk6eZmDFZKk0vNX6XolX1NpgJm','[\"ROLE_USER\", \"ROLE_DELIVERY_MAN\"]','available',48.867598,2.38246,2,6,3,6,'2019-06-23 14:36:45','2019-06-23 14:36:45',NULL),(4,NULL,NULL,'user-2@gmail.com','$2y$13$wT8fjj5D40k17Cvyl4jon.dAkrXEegKe4SR1nnlNcUuo2RTkArUxK','[\"ROLE_USER\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-06-23 14:36:45','2019-06-23 14:36:45',NULL),(5,NULL,NULL,'delivery-man-2@gmail.com','$2y$13$ZueLJzBmMj5mdeaBfVMR8.I2YHazp8qlczp7MmlRfwEhGGZnXrQl6','[\"ROLE_USER\", \"ROLE_DELIVERY_MAN\"]','available',48.866127,2.339571,2,5,2,5,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL),(6,NULL,NULL,'admin@gmail.com','$2y$13$nRehh3kFNTCXDycbTWxqkOg82H7S.3U0V7D.siVRBodnQ2XJu0vkS','[\"ROLE_ADMIN\"]',NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-06-23 14:36:46','2019-06-23 14:36:46',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-06-23 14:38:53
