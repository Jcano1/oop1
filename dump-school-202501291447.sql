-- MariaDB dump 10.19  Distrib 10.11.6-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: school
-- ------------------------------------------------------
-- Server version	10.11.6-MariaDB-0+deb12u1

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
-- Table structure for table `courses`
--
CREATE TABLE school;

USE school;

DROP TABLE IF EXISTS `courses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `degree_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `degree_id` (`degree_id`),
  CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`degree_id`) REFERENCES `degrees` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `courses`
--

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;
INSERT INTO `courses` VALUES
(0,'no asignado',1),
(1,'DAW1',1),
(2,'DAW2',1),
(3,'ASIX1',2),
(4,'ASIX2',2);
/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `degrees`
--

DROP TABLE IF EXISTS `degrees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `degrees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `duration_years` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `degrees`
--

LOCK TABLES `degrees` WRITE;
/*!40000 ALTER TABLE `degrees` DISABLE KEYS */;
INSERT INTO `degrees` VALUES
(1,'Desarrollo de Aplicaciones Web',2),
(2,'Administración de Sistemas Informáticos',2);
/*!40000 ALTER TABLE `degrees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES
(0,'No asignado'),
(1,'Matemáticas'),
(2,'Ciencias'),
(3,'Literatura'),
(4,'Historia'),
(5,'Ingeniería'),
(6,'Arte');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `enrollments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `enrollment_date` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `enrollments`
--

LOCK TABLES `enrollments` WRITE;
/*!40000 ALTER TABLE `enrollments` DISABLE KEYS */;
INSERT INTO `enrollments` VALUES
(35,1,7,'2025-01-28 20:44:11'),
(36,1,8,'2025-01-28 20:44:11'),
(39,7,1,'2025-01-28 20:44:27'),
(40,7,2,'2025-01-28 20:44:27'),
(41,8,3,'2025-01-28 20:45:20'),
(42,8,4,'2025-01-28 20:45:20'),
(47,2,5,'2025-01-28 20:47:33'),
(48,2,6,'2025-01-28 20:47:33'),
(49,3,1,'2025-01-28 21:05:21'),
(50,3,2,'2025-01-28 21:05:22'),
(51,9,5,'2025-01-28 21:05:43'),
(52,9,6,'2025-01-28 21:05:43');
/*!40000 ALTER TABLE `enrollments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `exams`
--

DROP TABLE IF EXISTS `exams`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `exam_date` date NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `exams`
--

LOCK TABLES `exams` WRITE;
/*!40000 ALTER TABLE `exams` DISABLE KEYS */;
/*!40000 ALTER TABLE `exams` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `dni` varchar(20) NOT NULL,
  `enrollment_year` year(4) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `dni` (`dni`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `students_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES
(1,3,'alsjkdhakjsd',2025),
(2,4,'asjdhakjsd',2025),
(3,6,'asd',2025),
(5,10,'asdasdasdasdasda',2025),
(6,16,'asdwasdwasd',2025),
(7,18,'sdfsdf',2025),
(8,19,'asd123',2025),
(9,20,'123123',2025);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `course_id` (`course_id`),
  CONSTRAINT `subjects_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES
(1,1,'Programación Web'),
(2,1,'Bases de Datos'),
(3,2,'Aplicaciones en Servidor'),
(4,2,'Diseño de Interfaces'),
(5,3,'Seguridad Informática Básica'),
(6,3,'Redes Locales'),
(7,4,'Virtualización y Contenedores'),
(8,4,'Administración Avanzada de Sistemas');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `teachers`
--

DROP TABLE IF EXISTS `teachers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `department_id` (`department_id`),
  CONSTRAINT `teachers_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `teachers_ibfk_2` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` VALUES
(3,13,4),
(4,14,0),
(5,15,0),
(6,21,5);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uuid` varchar(36) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_type` enum('student','teacher','admin') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES
(1,'490','javier','cano','javier.cano2004@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$VGpHQTBtZU5SaTNZV2NYTg$CKeEuV+9K2Y+X8JgqjNgmy1OpfXU9YTOGyItA0zxf6I','2025-01-27 18:03:16','2025-01-27 18:03:16','teacher'),
(3,'887','javier','cano','javier.cano2005@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$aUZ2NGNiekMzSWZ1M29kTw$GNVVVhE0cm+kbgjfAPaTIlrVjqPoGGBXsM5l0kQwg+Q','2025-01-27 18:10:35','2025-01-27 18:10:35','student'),
(4,'115','javier','cano','javier.cano2006@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$Qmduc0ZsUUlSZzBLNnVhRA$Aiw969wbfuPV82otil4waENjxIJfvs+OQRv8Xd8iBhI','2025-01-27 18:28:26','2025-01-27 18:28:26','student'),
(6,'801','asd','asd','asd@gamil.com','$argon2i$v=19$m=65536,t=4,p=1$L2IyUk5BRUw1Ly85MWpNNw$vUsVtXdsc2zOzuC6E760hk64ukIfolzTtb7vdvHO54U','2025-01-27 18:36:45','2025-01-27 18:36:45','student'),
(8,'50','asd','asd','asdwasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$cFppS0dhYlpZNktkRE5PYw$Ho46SoapAeShoNjJS6LWfthqKwX4Tx2YNbV14EXuZuc','2025-01-27 18:42:58','2025-01-27 18:42:58','student'),
(10,'123','asd','asd','asdwasasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$ZjZ4RW03aUlRS3hTaGQ4bQ$7G2ERT+obyzdicEQbPd8inuEA7so61qgRsoC/lYHTUg','2025-01-27 18:43:25','2025-01-27 18:43:25','student'),
(11,'196','javier','cano','javier.caano2010@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$M0U3VGdlOUdoOW9YcHI2bw$kgra+Hja5+ZcCCvLY6AwNDtGYXWRYpm/47YCAHfYFJE','2025-01-27 18:49:54','2025-01-27 18:49:54','teacher'),
(13,'244','asdasd','asdasd','asdwasasdasdasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$dUdQNVZXYjNuRllSS0svbA$t3jPrY8MmQiGt9k2V+1XhA0tCczwjL0V28vb3Q25WSc','2025-01-27 18:51:29','2025-01-27 18:51:29','teacher'),
(14,'425','javier','asd','asdasdasdwasasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$ZS5nVnV1ckRKRmo4NWluOQ$qCKUI3gmxegbqdIoUE88qZVMcFzRH/LoHsfJ40RlNeY','2025-01-27 18:52:20','2025-01-27 18:52:20','teacher'),
(15,'968','asd','asd','asdwaasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$OExKbkM4bXVMWUk0UUpQZw$nYtXItI3K+IuuCqTNV51aZGSBAAruAnumSSVBqhHDCU','2025-01-27 18:53:22','2025-01-27 18:53:22','teacher'),
(16,'810','asdasd','asdasd','asdwaasdassasdw@gmail.coma','$argon2i$v=19$m=65536,t=4,p=1$NkRobnpHM0loZkgxdXNGdg$eeNgOMMT6hEiyk41i/hl+s9q6e0/om1DeV8dexiXOrc','2025-01-27 18:55:57','2025-01-27 18:55:57','student'),
(17,'601','asdasd','asdasd','wwwwasdwasasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$cGZweUpuY2EuUUFLVks2Nw$b8C5AzVrxu3wbjHOl9I2aQw1DRUoMmPyaRWDrJ7fkUc','2025-01-27 18:56:22','2025-01-27 18:56:22','student'),
(18,'82','asdwasdw','asdwasdw','asdwasasasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$QXc4RDl3Ny5JbG5Pd2I0aQ$CCel9Eq4ypsQBVi3ILhLT5sSVnYuMZnY5YsL7gskK2w','2025-01-27 18:56:49','2025-01-27 18:56:49','student'),
(19,'26','javier','cano','asdwaaswsdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$REtYV1hpUTRwTDRmSnJSRA$2he4KdhgoVJaACAmSrWLmQbFOrgNrtDVKIrcy2DOYQQ','2025-01-28 21:45:15','2025-01-28 21:45:15','student'),
(20,'352','nuevo','estudiante','asdsasdwasasdw@gmail.com','$argon2i$v=19$m=65536,t=4,p=1$QWYuQ1c3ckRXVU96aHNjVA$PtJbtSFy6Pr46AMhCIpmsytv+f0g77dB6/Z1ghFr1j0','2025-01-28 22:05:37','2025-01-28 22:05:37','student'),
(21,'914','toni','hernandez','asdws@gmai.com','$argon2i$v=19$m=65536,t=4,p=1$UGNsWkcvNnRzaUV5cEJkYQ$8Qr4kWOMpYwP9CPoz/9ElZrNhPecPmILoU0Jj24/aBQ','2025-01-28 22:06:07','2025-01-28 22:06:07','teacher');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'school'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-29 14:47:47
