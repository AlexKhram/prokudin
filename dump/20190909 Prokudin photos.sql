CREATE DATABASE  IF NOT EXISTS `prokudin` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `prokudin`;
-- MySQL dump 10.13  Distrib 5.5.50, for debian-linux-gnu (x86_64)
--
-- Host: 127.0.0.1    Database: prokudin
-- ------------------------------------------------------
-- Server version	5.5.50-0ubuntu0.14.04.1

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
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_ru` varchar(120) NOT NULL,
  `description_ru` varchar(200) DEFAULT NULL,
  `name_en` varchar(120) DEFAULT NULL,
  `description_en` varchar(200) DEFAULT NULL,
  `year` year(4) DEFAULT NULL,
  `active` smallint(1) DEFAULT NULL,
  `path_image` varchar(120) NOT NULL,
  `path_hirez` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name_UNIQUE` (`name_ru`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COMMENT='Photos';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
INSERT INTO `photos` VALUES (1,'Машинный зал Гиндукушской ГЭС на реке Мургаб','Машинный зал крупнейшей в дореволюц. России Гиндукушской ГЭС мощностью 1,35 Мвт (1350 кет) на р. Мургаб (Туркмения). Её строительство завершилось в 1909','Alternators made in Budapest, Hungary, in the power generating hall of a hydroelectric station in Iolotan on the Murghab','This was the Hindu Kush Hydro Power Plant, in today\'s Turkmenistan, the largest hydro power plant of Russian Empire (built 1909)',1911,1,'alternators_in_the_power_generating_hall_of_a_hydroelectric_station_in_Iolotan_on_the_murghab.jpg','alternators_in_the_power_generating_hall_of_a_hydroelectric_station_in_Iolotan_on_the_murghab-hr.jpg'),(2,'Автопортрет Сергея Михайловича Прокудина-Горского','Ранняя цветная фотография, сделанная русским фотографом Сергеем Прокудиным-Горским как часть его работы по запечтлению в фотографиях Российской Империи 1904-1916 годов','Self-portrait of Sergei Mikhailovich Prokudin-Gorskii',' Early color photograph from Russia, created by Sergei Mikhailovich Prokudin-Gorskii as part of his work to document the Russian Empire from 1904 to 1916',1912,1,'self_portrait_of_sergei_mikhailovich_prokudin_gorskii.jpg','self_portrait_of_sergei_mikhailovich_prokudin_gorskii-hr.jpg'),(3,'Чудотворная икона Божьей Матери-Одигитрии в Богоматеринском храме',NULL,'Miraculous icon of Mother of God-Odigitria in the Church of the Assumption of the Virgin',NULL,1912,1,'miraculous_icon_of_mother_of_god_odigitria_in_the_church_of_the_assumption_of_the_virgin.jpg','miraculous_icon_of_mother_of_god_odigitria_in_the_church_of_the_assumption_of_the_virgin-hr.jpg'),(4,'Нило-Столобенская пустынь на озере Селигер',NULL,'The Monastery of St. Nil on Stolobnyi Island in Lake Seliger in Tver Province',NULL,1910,1,'the_monastery_of_st_nil_on_tolobnyi_Island_in_lake_seliger_in_tver_province.jpg','the_monastery_of_st_nil_on_tolobnyi_Island_in_lake_seliger_in_tver_province-hr.jpg'),(5,'Три молодые крестьянки возле избы','Молодые русские крестьянки на фоне традиционного деревянного дома вдоль реки Шексна в деревне Горицы недалеко от небольшого города Кириллов','Three peasant girls near izba','Three young women offer berries to visitors to their izba, a traditional wooden house, in a rural area along the Sheksna River, near the town of Kirillov.',1909,1,'three_peasant_girls_near_izba.jpg','three_peasant_girls_near_izba-hr.jpg'),(6,'Алим-хан, эмир Бухары',NULL,'Mohammed Alim Khan, Emir of Bukhara',NULL,1911,1,'mohammed_alim_khan_emir_of_bukhara.jpg','mohammed_alim_khan_emir_of_bukhara-hr.jpg'),(7,'Военнопленные австрийцы у барака',NULL,'Austrian prisoners of war near a barrack',NULL,1915,1,'austrian_prisoners_of_war_near_a_barrack.jpg','austrian_prisoners_of_war_near_a_barrack-hr.jpg');
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-09-09 20:52:00
