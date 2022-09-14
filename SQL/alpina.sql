-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: alpina_desarrollo
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `pedido`
--

CREATE DATABASE alpina_desarrollo;
USE alpina_desarrollo;

DROP TABLE IF EXISTS `pedido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `estado` varchar(20) NOT NULL,
  `no_venta` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `no_venta` (`no_venta`),
  CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`no_venta`) REFERENCES `venta` (`no_venta`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido`
--

LOCK TABLES `pedido` WRITE;
/*!40000 ALTER TABLE `pedido` DISABLE KEYS */;
INSERT INTO `pedido` VALUES (18,'Daniel Hinojosa Ramirez','2147483647','sur','pagado',25,252735),(19,'Daniel Hinojosa Ramirez','2147483647','centro','listo',26,264122),(20,'Juan Sarmiento','78182851','este','pagado',28,281724),(21,'Juan Sarmiento','78182851','oeste','pendiente',32,322952),(22,'Juan Sarmiento','78182851','norte','listo',33,333719);
/*!40000 ALTER TABLE `pedido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `id_prod` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio_u` decimal(10,2) NOT NULL,
  `precio_m` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  PRIMARY KEY (`id_prod`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (11,'Yogurt','oferta',2000.90,1800.00,100,'/img/oferta/yogurt.png'),(19,'Queso Crema x 200g','cremeria',2999.10,3000.10,500,'/img/cremeria/queso.png'),(21,'Crema De Leche Alpina Finesse Caja x 200 Ml','cremeria',3993.60,4005.99,200,'/img/cremeria/queso2.jpg'),(38,'Yogurt ALPINA yox con defensis melocotón x100 g','oferta',5000.00,5200.00,150,'/img/oferta/yox.jpg'),(39,'Yogurt Alpina Mora x 1750g','oferta',11000.00,11200.00,80,'/img/oferta/yogurtGrande.png'),(46,'Crema de leche','cremeria',2700.00,2300.00,900,'/img/abarrotes/7702001161096.png'),(50,'Regenerix','oferta',14000.00,13000.00,599,'/img/oferta/regenerix.png');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id_usr` int(11) NOT NULL AUTO_INCREMENT,
  `usr` varchar(100) NOT NULL,
  `pw` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `telefono` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `tipo_usr` varchar(100) NOT NULL,
  `usr_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usr`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'adm','adm','Jose ','Ramirez Hinojosa',2147483647,'mxdestructive@gmail.com','adm','/img/usr/destructive.jpg'),(2,'usr','usr','Daniel','Hinojosa Ramirez',2147483647,'osmaritur@gmail.com','usr','/img/usr/especial-1.jpeg'),(11,'emp','emp','Jose Daniel','Ramirez Hinojosa',456789,'ejemplo@ejemplo','emp','/img/usr/tipos-de-plataforma-de-trailers-710x350.jpg'),(15,'juan','1234567','Juan','Sarmiento',78182851,'nopiquesalv009@gmail.com','usr','/img/usr/yogurtGrande.png'),(16,'carlos','1212','carlos','osorio',8478425,'carlo@test.com','','/img/usr/580b57fcd9996e24bc43c543.png'),(17,'carloss','1212','carlos','osorio',898898,'carlos@gmail.com','emp','/img/usr/580b57fcd9996e24bc43c543.png'),(18,'sr','12','sr','sr',874849,'sr@gmail.com','emp','/img/usr/580b57fcd9996e24bc43c543.png'),(19,'michael','123','michel','puentes',12121312,'michael@gmail.com','usr','/img/usr/yox.jpg');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `no_venta` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` varchar(40) NOT NULL,
  `id_usr` int(11) NOT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `codigo` varchar(50) NOT NULL,
  PRIMARY KEY (`no_venta`),
  KEY `id_usr` (`id_usr`),
  CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id_usr`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (25,'15/7/2020',2,2155.00,'253127'),(26,'15/7/2020',2,200.00,'261141'),(27,'28/8/2022',15,1405.00,'275348'),(28,'28/8/2022',15,1405.00,'283057'),(32,'29/8/2022',15,18000.90,'322328'),(33,'29/8/2022',15,40600.90,'330537');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventadetalle`
--

DROP TABLE IF EXISTS `ventadetalle`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventadetalle` (
  `id_vd` int(11) NOT NULL AUTO_INCREMENT,
  `id_prod` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(19,2) NOT NULL,
  `sub_total` decimal(19,2) NOT NULL,
  PRIMARY KEY (`id_vd`),
  KEY `id_prod` (`id_prod`),
  KEY `id_venta` (`id_venta`),
  CONSTRAINT `ventadetalle_ibfk_1` FOREIGN KEY (`id_prod`) REFERENCES `productos` (`id_prod`) ON DELETE CASCADE,
  CONSTRAINT `ventadetalle_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `venta` (`no_venta`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventadetalle`
--

LOCK TABLES `ventadetalle` WRITE;
/*!40000 ALTER TABLE `ventadetalle` DISABLE KEYS */;
INSERT INTO `ventadetalle` VALUES (59,38,25,'Caja 24 Frutsi 250ml',10,95.00,950.00),(60,39,25,'Azucar Zuramex 50Kg',1,1205.00,1205.00),(61,38,26,'Caja 24 Frutsi 250ml',1,100.00,100.00),(63,38,27,'Caja 24 Frutsi 250ml',1,100.00,100.00),(64,39,27,'Azucar Zuramex 50Kg',1,1205.00,1205.00),(66,38,28,'Caja 24 Frutsi 250ml',1,100.00,100.00),(67,39,28,'Azucar Zuramex 50Kg',1,1205.00,1205.00),(69,39,32,'Yogurt Alpina Mora x 1750g',1,11000.00,11000.00),(70,38,32,'Yogurt ALPINA yox con defensis melocotón x100 g',1,5000.00,5000.00),(71,11,32,'Yogurt',1,2000.90,2000.90),(72,39,33,'Yogurt Alpina Mora x 1750g',3,11200.00,33600.00),(73,38,33,'Yogurt ALPINA yox con defensis melocotón x100 g',1,5000.00,5000.00),(74,11,33,'Yogurt',1,2000.90,2000.90);
/*!40000 ALTER TABLE `ventadetalle` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-28 21:58:50
