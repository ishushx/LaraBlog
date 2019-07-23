-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: localhost    Database: laravel-blog
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Dumping data for table `admin_menu`
--

LOCK TABLES `admin_menu` WRITE;
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` VALUES (1,0,1,'后台首页','fa-bar-chart','/',NULL,NULL,'2019-07-21 17:44:56'),(2,0,8,'后台管理','fa-tasks',NULL,NULL,NULL,'2019-07-22 14:26:30'),(3,2,9,'Users','fa-users','auth/users',NULL,NULL,'2019-07-22 14:26:30'),(4,2,10,'Roles','fa-user','auth/roles',NULL,NULL,'2019-07-22 14:26:30'),(5,2,11,'Permission','fa-ban','auth/permissions',NULL,NULL,'2019-07-22 14:26:30'),(6,2,12,'Menu','fa-bars','auth/menu',NULL,NULL,'2019-07-22 14:26:30'),(7,2,13,'Operation log','fa-history','auth/logs',NULL,NULL,'2019-07-22 14:26:30'),(8,0,2,'分类管理','fa-folder-open','/categories',NULL,'2019-07-19 21:36:03','2019-07-19 21:36:44'),(9,0,3,'文章管理','fa-book','/posts',NULL,'2019-07-19 21:36:36','2019-07-19 21:36:44'),(10,0,4,'评论管理','fa-reply','/replies',NULL,'2019-07-21 17:44:10','2019-07-21 17:44:16'),(11,0,5,'标签管理','fa-bookmark','/tags',NULL,'2019-07-21 18:30:41','2019-07-21 18:30:47'),(12,0,6,'队列 Horizon','fa-hourglass-2','http://blog.test/admin/horizon',NULL,'2019-07-22 10:25:46','2019-07-22 10:27:35'),(13,0,7,'站点配置','fa-toggle-on','config',NULL,'2019-07-22 14:25:38','2019-07-22 14:26:30');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_permissions`
--

LOCK TABLES `admin_permissions` WRITE;
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` VALUES (1,'All permission','*','','*',NULL,NULL),(2,'Dashboard','dashboard','GET','/',NULL,NULL),(3,'Login','auth.login','','/auth/login\r\n/auth/logout',NULL,NULL),(4,'User setting','auth.setting','GET,PUT','/auth/setting',NULL,NULL),(5,'Auth management','auth.management','','/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs',NULL,NULL),(6,'horizon','horizon','','/horizon','2019-07-19 11:58:10','2019-07-19 11:58:10'),(7,'Admin Config','ext.config',NULL,'/config*','2019-07-22 14:25:38','2019-07-22 14:25:38'),(8,'Admin Configx','ext.configx',NULL,'/configx/*','2019-07-22 14:32:04','2019-07-22 14:32:04');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_menu`
--

LOCK TABLES `admin_role_menu` WRITE;
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` VALUES (1,2,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_permissions`
--

LOCK TABLES `admin_role_permissions` WRITE;
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_role_users`
--

LOCK TABLES `admin_role_users` WRITE;
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` VALUES (1,1,NULL,NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_roles`
--

LOCK TABLES `admin_roles` WRITE;
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` VALUES (1,'Administrator','administrator','2019-07-18 00:35:57','2019-07-18 00:35:57');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_user_permissions`
--

LOCK TABLES `admin_user_permissions` WRITE;
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_users`
--

LOCK TABLES `admin_users` WRITE;
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` VALUES (1,'admin','$2y$10$T7T9izvX7f7EvRTovNcgCuX5XAIop6I9yeRANMsvxdAjTuV8j63bq','Administrator',NULL,'2x6RwGClWhzjuvCra5cqWGtU0LbSw1UvBnivXdfl4pp9LRUAS1070d8ny5Pr','2019-07-18 00:35:57','2019-07-18 00:35:57');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping data for table `admin_config`
--

LOCK TABLES `admin_config` WRITE;
/*!40000 ALTER TABLE `admin_config` DISABLE KEYS */;
INSERT INTO `admin_config` VALUES (1,'name','ishushx','姓名','2019-07-22 14:38:19','2019-07-22 14:38:19'),(5,'email_address','ishushx@gmail.com','邮箱地址','2019-07-22 14:50:22','2019-07-22 14:50:22'),(6,'github_address','https://github.com/ishushx','github','2019-07-22 14:55:32','2019-07-22 14:55:32'),(7,'beian_address','湘ICP备19003372号-1','备案地址','2019-07-23 09:26:27','2019-07-23 09:27:38'),(8,'weixin_img','http://qiniu.larahsx.com/F473A58C91BD3471EA14B3B95AB37ECC.jpg','微信','2019-07-23 09:40:43','2019-07-23 09:40:43'),(9,'gravatar','https://s.gravatar.com/avatar/bab9bca41993335dec729696223b5c91?s=80','gravatar','2019-07-23 09:43:17','2019-07-23 09:43:17'),(10,'web_title','LaraBlog','网站名称','2019-07-23 09:44:51','2019-07-23 09:45:13'),(11,'description','ishushx 的个人小站，laravel PHP 学习资料分享。','网站 description','2019-07-23 09:49:00','2019-07-23 09:49:00');
/*!40000 ALTER TABLE `admin_config` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-07-23  1:57:47
