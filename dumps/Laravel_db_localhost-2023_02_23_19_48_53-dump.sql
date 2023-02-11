-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: Laravel_db
-- ------------------------------------------------------
-- Server version	8.0.31

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `color` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`, `color`, `image`) VALUES (1,'Mobile','2022-12-01 18:50:23','2022-12-01 18:50:23',NULL,'#d1e250','public/images/category/mobilnye_telefony_1669913423.jpg'),(2,'Television','2022-12-01 18:51:26','2022-12-01 18:51:26',NULL,'#16e407','public/images/category/tv_1668951806_1669913486.jpg'),(3,'Adapter','2022-12-01 19:16:01','2022-12-01 19:16:01',NULL,'#578acb','public/images/category/444_1669048573_1669914961.jpg');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galleries`
--

DROP TABLE IF EXISTS `galleries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galleries` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned DEFAULT NULL,
  `photos` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `galleries_product_id_foreign` (`product_id`),
  CONSTRAINT `galleries_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galleries`
--

LOCK TABLES `galleries` WRITE;
/*!40000 ALTER TABLE `galleries` DISABLE KEYS */;
INSERT INTO `galleries` (`id`, `product_id`, `photos`, `created_at`, `updated_at`) VALUES (13,5,'public/images/product/tv_2_002_1669918913.jpg','2022-12-01 20:21:53','2022-12-01 20:21:53'),(14,5,'public/images/product/tv_2_003_1669918913.jpg','2022-12-01 20:21:53','2022-12-01 20:21:53'),(15,5,'public/images/product/tv_2_004_1669918913.jpg','2022-12-01 20:21:53','2022-12-01 20:21:53'),(16,6,'public/images/product/phone_1_002_1669919687.jpg','2022-12-01 20:34:47','2022-12-01 20:34:47'),(17,6,'public/images/product/phone_1_003_1669919687.jpg','2022-12-01 20:34:47','2022-12-01 20:34:47'),(18,6,'public/images/product/phone_1_004_1669919687.jpg','2022-12-01 20:34:47','2022-12-01 20:34:47'),(19,7,'public/images/product/111_1669919880.jpg','2022-12-01 20:38:00','2022-12-01 20:38:00'),(20,7,'public/images/product/222_1669919880.jpg','2022-12-01 20:38:00','2022-12-01 20:38:00'),(21,7,'public/images/product/333_1669919880.jpg','2022-12-01 20:38:00','2022-12-01 20:38:00'),(22,7,'public/images/product/444_1669919880.jpg','2022-12-01 20:38:00','2022-12-01 20:38:00'),(23,17,'public/images/product/tv_3_001_1674490533.jpg','2023-01-23 18:15:33','2023-01-23 18:15:33'),(24,17,'public/images/product/tv_3_002_1674490533.jpg','2023-01-23 18:15:33','2023-01-23 18:15:33'),(25,17,'public/images/product/tv_3_003_1674490533.jpg','2023-01-23 18:15:33','2023-01-23 18:15:33'),(26,17,'public/images/product/tv_3_004_1674490533.jpg','2023-01-23 18:15:33','2023-01-23 18:15:33'),(27,18,'public/images/product/zu_1_001_1674501865.jpg','2023-01-23 21:24:25','2023-01-23 21:24:25'),(28,18,'public/images/product/zu_1_002_1674501865.jpg','2023-01-23 21:24:25','2023-01-23 21:24:25'),(29,18,'public/images/product/zu_1_003_1674501865.jpg','2023-01-23 21:24:25','2023-01-23 21:24:25'),(30,18,'public/images/product/zu_1_004_1674501865.jpg','2023-01-23 21:24:25','2023-01-23 21:24:25'),(31,18,'public/images/product/zu_1_005_1674501865.jpg','2023-01-23 21:24:25','2023-01-23 21:24:25'),(32,19,'public/images/product/tv_4_001_1675550753.jpg','2023-01-23 21:26:56','2023-01-23 21:26:56'),(33,19,'public/images/product/tv_4_002_1675550753.jpg','2023-01-23 21:26:56','2023-01-23 21:26:56'),(34,19,'public/images/product/tv_4_003_1675550753.jpg','2023-01-23 21:26:56','2023-01-23 21:26:56'),(35,19,'public/images/product/tv_4_004_1675550753.jpg','2023-01-23 21:26:56','2023-01-23 21:26:56'),(36,20,'public/images/product/phone_2_001_1674504243.jpg','2023-01-23 22:04:03','2023-01-23 22:04:03'),(37,20,'public/images/product/phone_2_002_1674504243.jpg','2023-01-23 22:04:03','2023-01-23 22:04:03'),(38,20,'public/images/product/phone_2_003_1674504243.jpg','2023-01-23 22:04:03','2023-01-23 22:04:03');
/*!40000 ALTER TABLE `galleries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `manufacturs`
--

DROP TABLE IF EXISTS `manufacturs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `manufacturs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `country` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `image` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `manufacturs`
--

LOCK TABLES `manufacturs` WRITE;
/*!40000 ALTER TABLE `manufacturs` DISABLE KEYS */;
INSERT INTO `manufacturs` (`id`, `country`, `name`, `image`) VALUES (1,'Republic of Korea','Samsung','public/images/manufactur/samsung_logo_1674855221.png'),(2,'Nokia Oyj','Nokia','public/images/manufactur/nokia_logo_1674846972.jpg'),(3,'Китай','Voltrip Duo','public/images/manufactur/voltrip_duo_logo _1674855165.jpeg'),(4,'Япония','Toshiba','public/images/manufactur/toshiba_logo_1674845553.jpg'),(5,'Нидерланды','Philips','public/images/manufactur/philips_logo_1674847862.jpg');
/*!40000 ALTER TABLE `manufacturs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_permissions`
--

LOCK TABLES `model_has_permissions` WRITE;
/*!40000 ALTER TABLE `model_has_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `model_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `model_has_roles` (
  `role_id` bigint unsigned NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`),
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `model_has_roles`
--

LOCK TABLES `model_has_roles` WRITE;
/*!40000 ALTER TABLE `model_has_roles` DISABLE KEYS */;
INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES (1,'App\\Models\\User',1),(2,'App\\Models\\User',2),(3,'App\\Models\\User',3),(3,'App\\Models\\User',58),(3,'App\\Models\\User',59),(3,'App\\Models\\User',61),(3,'App\\Models\\User',62),(3,'App\\Models\\User',63),(3,'App\\Models\\User',64),(3,'App\\Models\\User',65),(3,'App\\Models\\User',66),(3,'App\\Models\\User',67),(3,'App\\Models\\User',68),(3,'App\\Models\\User',69),(3,'App\\Models\\User',70),(3,'App\\Models\\User',71),(3,'App\\Models\\User',72),(3,'App\\Models\\User',73),(3,'App\\Models\\User',74),(3,'App\\Models\\User',75),(3,'App\\Models\\User',76),(3,'App\\Models\\User',77),(3,'App\\Models\\User',78),(3,'App\\Models\\User',79),(3,'App\\Models\\User',80),(3,'App\\Models\\User',81),(3,'App\\Models\\User',82),(3,'App\\Models\\User',83),(3,'App\\Models\\User',84),(3,'App\\Models\\User',85),(3,'App\\Models\\User',86),(3,'App\\Models\\User',87),(3,'App\\Models\\User',88),(3,'App\\Models\\User',89),(3,'App\\Models\\User',90),(3,'App\\Models\\User',91),(3,'App\\Models\\User',92),(3,'App\\Models\\User',93),(3,'App\\Models\\User',94),(3,'App\\Models\\User',95),(3,'App\\Models\\User',96),(3,'App\\Models\\User',97),(3,'App\\Models\\User',98),(3,'App\\Models\\User',99),(3,'App\\Models\\User',100),(3,'App\\Models\\User',101),(3,'App\\Models\\User',102),(3,'App\\Models\\User',103),(3,'App\\Models\\User',104);
/*!40000 ALTER TABLE `model_has_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my`
--

DROP TABLE IF EXISTS `my`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `my` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  UNIQUE KEY `password_UNIQUE` (`password`),
  UNIQUE KEY `name_UNIQUE` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my`
--

LOCK TABLES `my` WRITE;
/*!40000 ALTER TABLE `my` DISABLE KEYS */;
INSERT INTO `my` (`id`, `name`, `password`) VALUES (1,'Lena','11111'),(2,'Hero!!','22222'),(3,'Luna','33333'),(4,'Luig','1234');
/*!40000 ALTER TABLE `my` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `my2`
--

DROP TABLE IF EXISTS `my2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `my2` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(45) DEFAULT NULL,
  `order_id` varchar(45) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `my2`
--

LOCK TABLES `my2` WRITE;
/*!40000 ALTER TABLE `my2` DISABLE KEYS */;
INSERT INTO `my2` (`id`, `email`, `order_id`, `name`) VALUES (1,'Lena@com','1','Lena'),(2,'Lada@ua','2','Lada'),(3,'Luna@net','3','Luna');
/*!40000 ALTER TABLE `my2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `quantity` int DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `order_id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_order_item_orders1_idx` (`order_id`)
) ENGINE=InnoDB AUTO_INCREMENT=127 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` (`id`, `quantity`, `price`, `product_id`, `order_id`) VALUES (124,5,31999.00,5,63),(125,5,346.00,7,63),(126,1,4670.00,6,63);
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `customerName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerLastName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerEmail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerPhone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customerAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci,
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_orders_users1_idx` (`user_id`),
  CONSTRAINT `fk_orders_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` (`id`, `customerName`, `customerLastName`, `customerEmail`, `customerPhone`, `customerAddress`, `comment`, `total`, `created_at`, `updated_at`, `user_id`) VALUES (63,'admin','ddd','admin@gmail.com','3456789','sss','qwerttt',166395.00,'2022-12-04 01:46:41','2022-12-04 01:46:41',1);
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1,'show','web','2022-11-30 17:05:34','2022-11-30 17:05:34'),(2,'add','web','2022-11-30 17:05:34','2022-11-30 17:05:34'),(3,'edit','web','2022-11-30 17:05:34','2022-11-30 17:05:34'),(4,'delete','web','2022-11-30 17:05:34','2022-11-30 17:05:34');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(80) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `barcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'https://via.placeholder.com/640x480',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `category_id` int unsigned NOT NULL,
  `manufactur_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories1_idx` (`category_id`),
  KEY `fk_products_manufacturs1_idx` (`manufactur_id`),
  CONSTRAINT `fk_products_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `fk_products_manufacturs1` FOREIGN KEY (`manufactur_id`) REFERENCES `manufacturs` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` (`id`, `title`, `slug`, `description`, `image`, `price`, `barcode`, `stock`, `cover`, `created_at`, `updated_at`, `deleted_at`, `category_id`, `manufactur_id`) VALUES (5,'Телевизор Samsung QE55Q60BAUXUA','televizor-samsung-qe55q60bauxua','Миллиард оттенков цвета благодаря технологии квантовых точек\r\n100% цветовой объем благодаря технологии квантовых точек\r\nТехнология квантовых точек обеспечивает очень высокое качество изображения. Благодаря 100% объему цвета, технология квантовых точек преобразует свет в потрясающую цветовую палитру, качество цветопередачи при этом остается высоким при любом уровне яркости.\r\n\r\nОптимизированная подсветка для повышения контрастности\r\nТехнология двойной подсветки Dual LED\r\nИнновационная технология подсветки обеспечивает более четкую и точную контрастность за счет оптимизации цветового тона подсветки в соответствии с типом просматриваемого контента.\r\n\r\nБолее широкий диапазон контрастности\r\nТехнология Quantum HDR\r\nТехнология Quantum HDR позволяет выявить мельчайшие детали изображения и обеспечить оптимальную контрастность, чтобы вы получили максимальное удовольствие от просмотра каждой сцены. Технология динамического мэппинга HDR10+, характеристики которого превышают требования обычных стандартов, позволяет создавать более глубокие оттенки черного, более естественную цветопередачу и улучшенную детализацию.','public/images/product/tv_2_001_1669918913.jpg',31999.00,'1',125,'https://via.placeholder.com/640x480','2022-12-01 20:08:15','2022-12-01 20:22:15',NULL,2,1),(6,'Мобильный телефон Nokia С21 Plus 3/32 Dark Cyan','mobilnyi-telefon-nokia-s21-plus-332-dark-cyan','Экран (6.517\", IPS, 1600x720) / Unisoc SC9863A (1.6 ГГц + 1.2 ГГц) / двойная основная камера: 13 Мп + 2 Мп, фронтальная 5 Мп / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD (до 256 ГБ) / 3G / LTE / GPS / поддержка 2х SIM-карт (Nano-SIM) / Android 11 / 4000 мА*ч','public/images/product/phone_1_001_1669919687.jpg',4670.00,'2',1001,'https://via.placeholder.com/640x480','2022-12-01 20:34:47','2022-12-01 20:34:47',NULL,1,2),(7,'Зарядное устройство Promate Voltrip-Duo 17 Вт 2 USB','zariadnoe-ustroistvo-promate-voltrip-duo-17-vt-2-usb','Voltrip-Duo – идеальное решение для тех, кто не использует Quick Charge, но хочет заряжать свой гаджет максимально быстро и эффективно в автомобиле.\r\n\r\nОсобенности:\r\n\r\n2 через 1: Заряжай 2 устройства одновременно на суммарной мощности до 17 Вт (5 В, 3.4 А).\r\nUSB 2.4A: Гарантирует максимальную скорость зарядки для устройств, не оборудованных технологией Quick Charge 3.0.\r\nТехнология адаптивной зарядки: Автоматически подберет оптимальный и безопасный уровень мощности, в зависимости от вашего устройства.\r\nБезопасность: Voltrip-Duo оснащен чипом Smart IC, который защищает от перегрева, скачков напряжения, короткого замыкания и чрезмерной зарядки вашего гаджета.\r\nНадёжная фиксация: В прикуривателях разных типов, благодаря пружинным фиксаторам на корпусе.\r\nЛаконичный дизайн: Компактный размер и корпус под карбон, устройство займет минимум места и с легкостью впишется в интерьер вашего авто.','public/images/product/111_1669919880.jpg',346.00,'3',23,'https://via.placeholder.com/640x480','2022-12-01 20:38:00','2022-12-01 23:10:52',NULL,3,3),(17,'Телевизор Toshiba 32WA2063DG','televizor-toshiba-32wa2063dg','Отличное изображение\r\nФормат поддерживаемый телевизором, подарит вам отличную детализацию и четкость картинки. Получите новые ощущения от просмотра ваших любимых телепередач и кинофильмов.\r\n\r\nHDMI\r\nСовременный мультемедийный интерфейс HDMI для передачи несжатого потока аудио и видео данных. По одному кабелю возможна передача несжатого цифрового видео и многоканального звука со скоростью намного выше, чем позволяли все предыдущие варианты подключения. Одиночный кабель значительно упрощает процесс установки домашних развлекательных систем и гарантирует наилучшее качество изображения и воспроизведения звука.','public/images/product/tv_3_001_1674490533.jpg',8001.00,'123',1234,'https://via.placeholder.com/640x480','2023-01-23 17:36:08','2023-01-23 20:04:06',NULL,2,4),(18,'Зарядное устройство Grand-X CH-15B','zariadnoe-ustroistvo-grand-x-ch-15b','Зарядное устройство Grand-X 5V 2.1A USB Black (CH-15) с защитой от перегрузки\r\n\r\nXарактеристики:\r\n\r\nВходное напряжение: 220 В\r\nВыходное напряжение: 5 В\r\nВыходной ток: 2.1A\r\nРазмер: 85 х 35 х 22 мм\r\nВес: 35 г','public/images/product/zu_1_001_1674501865.jpg',135.00,'14',11,'https://via.placeholder.com/640x480','2023-01-23 20:29:32','2023-01-23 21:24:25',NULL,3,1),(19,'Телевизор Philips 32PFS6805/12','televizor-philips-32pfs680512','Philips предлагает качественное изображение в совокупности с такими преимуществами как насыщенность цвета, яркость и четкость. Благодаря отличной картинке ваши любимые телепрограммы и фильмы предстанут перед в совершенно новом свете. Все это заключено в элегантный тонкий корпус. Сядьте поудобнее, расслабьтесь и смотрите телевизор с наилучшим качеством изображения.','public/images/product/tv_4_001_1674503986.jpg',8999.00,'16',17,'https://via.placeholder.com/640x480','2023-01-23 21:26:56','2023-01-23 21:59:46',NULL,2,1),(20,'Мобильный телефон Nokia G10 3/32GB','mobilnyi-telefon-nokia-g10-332gb','Экран (6.5\", IPS 1600x720) / MediaTek Helio G25 (2.0 ГГц) / тройная основная камера: 13 Мп + 2 Мп + 2 Мп, фронтальная 8 Мп / RAM 3 ГБ / 32 ГБ встроенной памяти + microSD (до 512 ГБ) / 3G / LTE / GPS / поддержка 2х SIM-карт (Nano-SIM) / Android 11 / 5050 мА*ч','public/images/product/phone_2_001_1674504243.jpg',4499.00,'1',12,'https://via.placeholder.com/640x480','2023-01-23 22:04:03','2023-01-23 22:04:03',NULL,1,2);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `avatar` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `status` int DEFAULT NULL,
  `user_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reviews_users1_idx` (`user_id`),
  CONSTRAINT `fk_reviews_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
INSERT INTO `reviews` (`id`, `name`, `subject`, `review`, `email`, `created_at`, `updated_at`, `avatar`, `product_id`, `status`, `user_id`) VALUES (29,'admin','team','All right!!','admin@gmail.com','2022-12-01 20:31:49','2022-12-01 20:31:49',NULL,5,4,1),(30,'admin','sdfdf','asdfsdf','admin@gmail.com','2022-12-04 00:35:02','2022-12-04 00:35:02',NULL,5,NULL,1),(31,'admin','issue','How it\'s work?','admin@gmail.com','2022-12-04 00:35:37','2022-12-04 00:35:37',NULL,5,5,1),(32,'admin','tema','heelloo!!','admin@gmail.com','2022-12-04 00:56:29','2022-12-04 00:56:29',NULL,7,3,1),(33,'tttolll','news','Hello . All rigth!','tttolll@rambler.ru','2022-12-21 19:03:05','2022-12-21 19:03:05',NULL,6,NULL,2),(34,'tttolll','news','Hello . All rigth!','tttolll@rambler.ru','2022-12-21 19:03:15','2022-12-21 19:03:15',NULL,6,3,2),(35,'tttolll','news','dddddddd','tttolll@rambler.ru','2022-12-21 22:19:09','2022-12-21 22:19:09',NULL,5,3,2),(36,'admin','tema','Query!!!!','admin@gmail.com','2023-01-04 20:31:29','2023-01-04 20:31:29',NULL,5,4,1),(37,'admin','qwer','viva','admin@gmail.com','2023-01-27 12:00:36','2023-01-27 12:00:36',NULL,5,4,1);
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_has_permissions` (
  `permission_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`),
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_has_permissions`
--

LOCK TABLES `role_has_permissions` WRITE;
/*!40000 ALTER TABLE `role_has_permissions` DISABLE KEYS */;
INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES (1,1),(2,1),(3,1),(4,1),(1,2),(2,2),(3,2),(1,3),(2,3);
/*!40000 ALTER TABLE `role_has_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES (1,'admin','web','2022-11-30 15:52:37','2022-11-30 15:52:37'),(2,'manager','web','2022-11-30 15:53:53','2022-11-30 15:53:53'),(3,'user','web','2022-11-30 15:54:01','2022-11-30 15:54:01');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `access_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` smallint NOT NULL DEFAULT '9',
  `verify_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `address` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_verify_token_unique` (`verify_token`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `avatar`, `provider`, `provider_id`, `access_token`, `remember_token`, `status`, `verify_token`, `created_at`, `updated_at`, `phone`, `address`, `lastname`) VALUES (1,'admin','admin@gmail.com','2022-11-30 21:00:55','$2y$10$HkF8lerKcuI43dceyIcGjO2..sSJlSg/tkw/nhLYjXEolmsAlyDrK','public/avatar/JMTyBQGig8ITG3Xu3KeDC9YCRtObrERxPY5nvzuu_1670535169.png',NULL,NULL,NULL,'W9JWtW9ffH9ARfwEr2Vf1G9cHnvuypLoEkt4lv9QZYltmpqKVgoYuEOMdpRz',2,NULL,'2022-11-30 17:31:32','2022-12-08 23:32:49',NULL,NULL,NULL),(2,'tttolll','tttolll@rambler.ru','2022-11-30 21:00:58','$2y$10$hCS1R2i4J7ktSi.iPiZMq.PZjB27gBMa3GP1F/tzYWTFoZ6caJq5u','public/avatar/yMzZlVv3dUiqczoebTCIysULmWvCsj4FeW5UzrTU_1670535191.jpg',NULL,NULL,NULL,'VkR2kNwblCIz2v2quqIpFuutYidIMjty5n6Jl4hHr6EVNmkTpoEM1eWfTPGQ',2,NULL,'2022-11-30 17:38:00','2022-12-08 23:33:11',NULL,NULL,NULL),(3,'Vladik','vladik@vladik.com','2022-11-30 21:01:00','$2y$10$Ra1BhqPiKtEDDwTaKrpUtebzf2sAFX/nRpNNUc5bpBeF23cNA.tie','public/avatar/mZT09nHOsTjatXK4FnPhlleEgNudXHvGv06ikOMW_1670535210.jpg',NULL,NULL,NULL,'fYht1JgWrSjTa9APIAgzQbvymGvSqs10sZ1VE6p8Hg6znbb8OWJv2ukFyLOw',2,NULL,'2022-11-30 17:40:18','2022-12-08 23:33:30',NULL,NULL,NULL);
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

-- Dump completed on 2023-02-23 19:48:53
