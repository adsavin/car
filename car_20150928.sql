-- MySQL dump 10.13  Distrib 5.5.42, for osx10.6 (i386)
--
-- Host: localhost    Database: car
-- ------------------------------------------------------
-- Server version	5.5.42

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
-- Current Database: `car`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `car` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `car`;

--
-- Table structure for table `auth_assignment`
--

DROP TABLE IF EXISTS `auth_assignment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_assignment`
--

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;
INSERT INTO `auth_assignment` VALUES ('Administrator','1',1443083931),('user-role','3',1443091302);
/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item`
--

DROP TABLE IF EXISTS `auth_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `idx-auth_item-type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item`
--

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;
INSERT INTO `auth_item` VALUES ('/admin/*',2,NULL,NULL,NULL,1443083104,1443083104),('/product-category/*',2,NULL,NULL,NULL,1443278162,1443278162),('/product-category/create',2,NULL,NULL,NULL,1443278256,1443278256),('/product-category/delete',2,NULL,NULL,NULL,1443278256,1443278256),('/product-category/index',2,NULL,NULL,NULL,1443278256,1443278256),('/product-category/list-modal',2,NULL,NULL,NULL,1443325306,1443325306),('/product-category/update',2,NULL,NULL,NULL,1443278256,1443278256),('/product-category/view',2,NULL,NULL,NULL,1443278256,1443278256),('/product-group/*',2,NULL,NULL,NULL,1443278171,1443278171),('/product-group/create',2,NULL,NULL,NULL,1443278256,1443278256),('/product-group/delete',2,NULL,NULL,NULL,1443278256,1443278256),('/product-group/index',2,NULL,NULL,NULL,1443278256,1443278256),('/product-group/update',2,NULL,NULL,NULL,1443278256,1443278256),('/product-group/view',2,NULL,NULL,NULL,1443278256,1443278256),('/product-image/*',2,NULL,NULL,NULL,1443278171,1443278171),('/product-image/create',2,NULL,NULL,NULL,1443278256,1443278256),('/product-image/delete',2,NULL,NULL,NULL,1443278256,1443278256),('/product-image/index',2,NULL,NULL,NULL,1443278256,1443278256),('/product-image/update',2,NULL,NULL,NULL,1443278256,1443278256),('/product-image/view',2,NULL,NULL,NULL,1443278256,1443278256),('/product-serial/*',2,NULL,NULL,NULL,1443278171,1443278171),('/product-serial/create',2,NULL,NULL,NULL,1443278256,1443278256),('/product-serial/delete',2,NULL,NULL,NULL,1443278256,1443278256),('/product-serial/index',2,NULL,NULL,NULL,1443278256,1443278256),('/product-serial/update',2,NULL,NULL,NULL,1443278256,1443278256),('/product-serial/view',2,NULL,NULL,NULL,1443278256,1443278256),('/product/*',2,NULL,NULL,NULL,1443278165,1443278165),('/product/create',2,NULL,NULL,NULL,1443278256,1443278256),('/product/delete',2,NULL,NULL,NULL,1443278256,1443278256),('/product/index',2,NULL,NULL,NULL,1443278256,1443278256),('/product/update',2,NULL,NULL,NULL,1443278256,1443278256),('/product/view',2,NULL,NULL,NULL,1443278256,1443278256),('/source-message/*',2,NULL,NULL,NULL,1443107506,1443107506),('/translate/*',2,NULL,NULL,NULL,1443093208,1443093208),('/translate/create',2,NULL,NULL,NULL,1443093260,1443093260),('/translate/delete',2,NULL,NULL,NULL,1443093260,1443093260),('/translate/index',2,NULL,NULL,NULL,1443093260,1443093260),('/translate/update',2,NULL,NULL,NULL,1443093260,1443093260),('/translate/view',2,NULL,NULL,NULL,1443093260,1443093260),('/user/admin/*',2,NULL,NULL,NULL,1443083141,1443083141),('/user/profile/*',2,NULL,NULL,NULL,1443083153,1443083153),('/user/recovery/*',2,NULL,NULL,NULL,1443083147,1443083147),('/user/security/*',2,NULL,NULL,NULL,1443083168,1443083168),('/user/settings/*',2,NULL,NULL,NULL,1443083176,1443083176),('admin-permission',2,'admin-permission',NULL,NULL,1443083797,1443083797),('Administrator',1,'Administrator',NULL,NULL,1443083257,1443083257),('manage-user',2,'manage-user',NULL,NULL,1443083858,1443083858),('user-role',1,'user-role',NULL,NULL,1443083902,1443091257);
/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_item_child`
--

DROP TABLE IF EXISTS `auth_item_child`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_item_child`
--

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;
INSERT INTO `auth_item_child` VALUES ('admin-permission','/admin/*'),('Administrator','/admin/*'),('Administrator','/product-category/*'),('Administrator','/product-category/create'),('Administrator','/product-category/delete'),('Administrator','/product-category/index'),('Administrator','/product-category/list-modal'),('Administrator','/product-category/update'),('Administrator','/product-category/view'),('Administrator','/product-group/*'),('Administrator','/product-group/create'),('Administrator','/product-group/delete'),('Administrator','/product-group/index'),('Administrator','/product-group/update'),('Administrator','/product-group/view'),('Administrator','/product-image/*'),('Administrator','/product-image/create'),('Administrator','/product-image/delete'),('Administrator','/product-image/index'),('Administrator','/product-image/update'),('Administrator','/product-image/view'),('Administrator','/product-serial/*'),('Administrator','/product-serial/create'),('Administrator','/product-serial/delete'),('Administrator','/product-serial/index'),('Administrator','/product-serial/update'),('Administrator','/product-serial/view'),('Administrator','/product/*'),('Administrator','/product/create'),('Administrator','/product/delete'),('Administrator','/product/index'),('Administrator','/product/update'),('Administrator','/product/view'),('Administrator','/source-message/*'),('user-role','/source-message/*'),('Administrator','/translate/*'),('user-role','/translate/*'),('Administrator','/translate/create'),('user-role','/translate/create'),('Administrator','/translate/delete'),('user-role','/translate/delete'),('Administrator','/translate/index'),('user-role','/translate/index'),('Administrator','/translate/update'),('user-role','/translate/update'),('Administrator','/translate/view'),('user-role','/translate/view'),('Administrator','/user/admin/*'),('manage-user','/user/admin/*'),('Administrator','/user/profile/*'),('manage-user','/user/profile/*'),('user-role','/user/profile/*'),('Administrator','/user/recovery/*'),('manage-user','/user/recovery/*'),('user-role','/user/recovery/*'),('Administrator','/user/security/*'),('manage-user','/user/security/*'),('user-role','/user/security/*'),('Administrator','/user/settings/*'),('manage-user','/user/settings/*'),('user-role','/user/settings/*'),('Administrator','admin-permission'),('Administrator','manage-user'),('Administrator','user-role');
/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_rule`
--

DROP TABLE IF EXISTS `auth_rule`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_rule`
--

LOCK TABLES `auth_rule` WRITE;
/*!40000 ALTER TABLE `auth_rule` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_rule` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `route` varchar(256) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  KEY `parent` (`parent`),
  CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `menu` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Setting',NULL,NULL,NULL,NULL),(2,'Product',1,'/product/index',1,NULL);
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text,
  PRIMARY KEY (`id`,`language`),
  CONSTRAINT `fk_message_source_message` FOREIGN KEY (`id`) REFERENCES `source_message` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `message`
--

LOCK TABLES `message` WRITE;
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` VALUES (1,'lo','ໜ້າຫຼັກ'),(1,'th','หน้าหลัก'),(2,'lo','ເຂົ້າສູ່ລະບົບ'),(2,'th','เข้าสู่ระบบ'),(3,'lo','ໂປຣຟາຍ'),(4,'lo','ອອກຈາກລະບົບ'),(5,'lo','ລົງທະບຽນ'),(6,'lo','ກ່ຽວກັບ'),(6,'th','เกี่ยวกับ'),(7,'lo','ຕິດຕໍ່'),(7,'th','ติดต่อ'),(8,'lo','ລະຫັດ'),(9,'lo','ພາສາ'),(9,'th','พาษา'),(10,'th','การแปล'),(11,'lo','ສິດຜູ້ໃຊ້'),(11,'th','หน้าที่ผู้ใช้'),(14,'lo','ແປພາສາ'),(14,'th','แปล'),(15,'lo','ຂາດຫາຍ'),(16,'lo','ແກ້ໄຂ'),(16,'th','แก้ไข'),(17,'th','สร้าง'),(19,'lo','ອັບເດດ'),(20,'lo','ລຶບ'),(20,'th','ลบ'),(28,'lo','ເມນູ'),(28,'th','เมนู'),(30,'lo','ຜູ້ໃຊ້'),(30,'th','ผู้ใช้'),(45,'lo','ການຕັ້ງຄ່າ');
/*!40000 ALTER TABLE `message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1443078844),('m140209_132017_init',1443079143),('m140403_174025_create_account_table',1443079143),('m140504_113157_update_tables',1443079144),('m140504_130429_create_token_table',1443079144),('m140506_102106_rbac_init',1443078883),('m140602_111327_create_menu_table',1443078846),('m140830_171933_fix_ip_field',1443079144),('m140830_172703_change_account_table_name',1443079144),('m141222_110026_update_ip_field',1443079144);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_log`
--

DROP TABLE IF EXISTS `price_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `price` double NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_type_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_price_log_product1_idx` (`product_id`),
  KEY `fk_price_log_user1_idx` (`user_id`),
  KEY `fk_price_log_price_type1_idx` (`price_type_id`),
  CONSTRAINT `fk_price_log_price_type1` FOREIGN KEY (`price_type_id`) REFERENCES `price_type` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_price_log_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_price_log_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_log`
--

LOCK TABLES `price_log` WRITE;
/*!40000 ALTER TABLE `price_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `price_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `price_type`
--

DROP TABLE IF EXISTS `price_type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `price_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_for_sell` int(11) NOT NULL COMMENT '0 no, 1 yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `price_type`
--

LOCK TABLES `price_type` WRITE;
/*!40000 ALTER TABLE `price_type` DISABLE KEYS */;
/*!40000 ALTER TABLE `price_type` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `product_group_id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `detail` text,
  `created_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_unit_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_product_product_group1_idx` (`product_group_id`),
  KEY `fk_product_user1_idx` (`user_id`),
  KEY `fk_product_product_unit1_idx` (`product_unit_id`),
  CONSTRAINT `fk_product_product_group1` FOREIGN KEY (`product_group_id`) REFERENCES `product_group` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_product_unit1` FOREIGN KEY (`product_unit_id`) REFERENCES `product_unit` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_product_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `detail` text,
  `created_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,'Car','001','Carss','2015-09-26 16:52:52','2015-09-26 19:05:49'),(2,'Motorbike','002','Motorbikes','2015-09-26 18:46:01','2015-09-26 18:47:44');
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_group`
--

DROP TABLE IF EXISTS `product_group`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `code` varchar(50) NOT NULL,
  `detail` text,
  `created_time` datetime NOT NULL,
  `last_update` datetime NOT NULL,
  `product_category_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`),
  KEY `fk_product_group_product_category1_idx` (`product_category_id`),
  CONSTRAINT `fk_product_group_product_category1` FOREIGN KEY (`product_category_id`) REFERENCES `product_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_group`
--

LOCK TABLES `product_group` WRITE;
/*!40000 ALTER TABLE `product_group` DISABLE KEYS */;
INSERT INTO `product_group` VALUES (1,'afasf','12312','afasf','2015-09-27 18:15:19','2015-09-27 18:15:19',1);
/*!40000 ALTER TABLE `product_group` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_image`
--

DROP TABLE IF EXISTS `product_image`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_image` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_update` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name`),
  KEY `fk_product_image_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_image_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_image`
--

LOCK TABLES `product_image` WRITE;
/*!40000 ALTER TABLE `product_image` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_image` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_serial`
--

DROP TABLE IF EXISTS `product_serial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_serial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `serial_no` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` double NOT NULL COMMENT 'if not set price here, price log will be used',
  PRIMARY KEY (`id`),
  UNIQUE KEY `serial_no_UNIQUE` (`serial_no`),
  KEY `fk_product_serial_product1_idx` (`product_id`),
  CONSTRAINT `fk_product_serial_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_serial`
--

LOCK TABLES `product_serial` WRITE;
/*!40000 ALTER TABLE `product_serial` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_serial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_unit`
--

DROP TABLE IF EXISTS `product_unit`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_unit` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code_UNIQUE` (`code`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_unit`
--

LOCK TABLES `product_unit` WRITE;
/*!40000 ALTER TABLE `product_unit` DISABLE KEYS */;
/*!40000 ALTER TABLE `product_unit` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `profile` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `public_email` varchar(255) DEFAULT NULL,
  `gravatar_email` varchar(255) DEFAULT NULL,
  `gravatar_id` varchar(32) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `bio` text,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_user_profile` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'Adsavin','adsavin@live.com','admin@mail.com','edb0e96701c209ab4b50211c856c50c4','Laos','http://www.adsavin.net78.net',''),(2,NULL,NULL,'advin@mail.com','09d51bd09df7eb55d3c566a6323d478b',NULL,NULL,NULL),(3,NULL,NULL,'user1@mail.com','73dbb4ed51752f4d60afaeec8c9733e8',NULL,NULL,NULL);
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social_account`
--

DROP TABLE IF EXISTS `social_account`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `social_account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider` varchar(255) NOT NULL,
  `client_id` varchar(255) NOT NULL,
  `data` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `account_unique` (`provider`,`client_id`),
  KEY `fk_user_account` (`user_id`),
  CONSTRAINT `fk_user_account` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social_account`
--

LOCK TABLES `social_account` WRITE;
/*!40000 ALTER TABLE `social_account` DISABLE KEYS */;
/*!40000 ALTER TABLE `social_account` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `source_message`
--

DROP TABLE IF EXISTS `source_message`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `source_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(32) DEFAULT NULL,
  `message` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `source_message`
--

LOCK TABLES `source_message` WRITE;
/*!40000 ALTER TABLE `source_message` DISABLE KEYS */;
INSERT INTO `source_message` VALUES (1,'app','Home'),(2,'app','Login'),(3,'app','Profile'),(4,'app','Logout'),(5,'app','Register'),(6,'app','About'),(7,'app','Contact'),(8,'app','ID'),(9,'app','Language'),(10,'app','Translation'),(11,'app','Roles'),(12,'app','Messages'),(13,'app','Create Message'),(14,'app','Translate'),(15,'app','Missing'),(16,'app','Edit'),(17,'app','Create'),(18,'app','Update {modelClass}: '),(19,'app','Update'),(20,'app','Delete'),(21,'app','Are you sure you want to delete this item?'),(22,'app','Category'),(23,'app','Message'),(24,'app','Source Messages'),(25,'app','Create Source Message'),(26,'app','Translate Missing'),(27,'app','Translation List'),(28,'app','Menu'),(29,'app','Welcome'),(30,'app','Users'),(31,'app','Name'),(32,'app','Product Group ID'),(33,'app','Code'),(34,'app','Detail'),(35,'app','Created Time'),(36,'app','Last Update'),(37,'app','User ID'),(38,'app','Product Unit ID'),(39,'app','Product Category ID'),(40,'app','Product ID'),(41,'app','Serial No'),(42,'app','Price'),(43,'app','Products'),(44,'app','Create Product'),(45,'app','Setting'),(46,'app','Products Category'),(47,'app','Products Group'),(48,'app','Products Serial'),(49,'app','Product Categories'),(50,'app','Create Product Category'),(51,'app','Completed'),(52,'app','Product Groups'),(53,'app','Create Product Group'),(54,'app','Product Category'),(55,'app','Select Category'),(56,'app','Select'),(57,'app','Error');
/*!40000 ALTER TABLE `source_message` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `token`
--

DROP TABLE IF EXISTS `token`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `token` (
  `user_id` int(11) NOT NULL,
  `code` varchar(32) NOT NULL,
  `created_at` int(11) NOT NULL,
  `type` smallint(6) NOT NULL,
  UNIQUE KEY `token_unique` (`user_id`,`code`,`type`),
  CONSTRAINT `fk_user_token` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `token`
--

LOCK TABLES `token` WRITE;
/*!40000 ALTER TABLE `token` DISABLE KEYS */;
INSERT INTO `token` VALUES (2,'rPbnB0A2x7l0glsT5yAg0Sbd5xFT_S_O',1443085502,0),(3,'VIZNwlxcVFqwwFqd5TkYWVwnVO4OciJV',1443087924,0);
/*!40000 ALTER TABLE `token` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `auth_key` varchar(32) NOT NULL,
  `confirmed_at` int(11) DEFAULT NULL,
  `unconfirmed_email` varchar(255) DEFAULT NULL,
  `blocked_at` int(11) DEFAULT NULL,
  `registration_ip` varchar(45) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `flags` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_unique_username` (`username`),
  UNIQUE KEY `user_unique_email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin@mail.com','$2y$12$S6MzgbUySNHIoKzFl9ok0OujXtvCdjRp.SX2Jy5tYRyZreKlGuDkS','U4a4pLQlJHBUg3qI0f2BX7sx7MmYt2rt',1443079888,NULL,NULL,'::1',1443079783,1443079888,0),(2,'advin','advin@mail.com','$2y$12$nxxn2NAtz7QVgkQiwb1N2u.hEVZG4O8WNIWrEvvsp3x8rftQTA01y','3iuJwyl1zZ7wVKDj6VNA9oIwG1vsudyi',NULL,NULL,NULL,'::1',1443085502,1443085502,0),(3,'user1','user1@mail.com','$2y$12$wKLVO5jUw06pDu1xICbjx.buFXd3hxacKX3DJKbRDEBBvPzBZ8JJi','Q5lioLjfI0uFSqjJHc6Myhu5_od93wi8',NULL,NULL,NULL,'::1',1443087924,1443087924,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'car'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-09-28 13:12:31
