-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 24, 2025 at 06:19 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_drive`
--

-- --------------------------------------------------------

--
-- Table structure for table `testdrive_request`
--

DROP TABLE IF EXISTS `testdrive_request`;
CREATE TABLE IF NOT EXISTS `testdrive_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `last_name` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `brand` varchar(50) NOT NULL,
  `model` varchar(50) NOT NULL,
  `request_date` date NOT NULL,
  `request_time` varchar(10) NOT NULL,
  `comments` text,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `testdrive_request`
--

INSERT INTO `testdrive_request` (`id`, `last_name`, `first_name`, `email`, `phone`, `brand`, `model`, `request_date`, `request_time`, `comments`, `status`) VALUES
(4, 'yom', 'nn', 'john@gmail.com', '+230 2222 2222', 'Porsche', '911 turbo s', '2025-03-16', '10:00', 'hi', 'approved'),
(3, 'Tikoulou', 'Tom', 'shalemomo@gmail.com', '+230 1111 1111', 'Maserati', 'MC20 Cielo', '2025-03-08', '13:00', 'jo', 'denied'),
(5, 'Squarepants', 'Bob', 'bobo@sqp.com', '+230 69696969', 'Aston Martin', 'DBX', '2025-03-13', '10:00', 'cas', 'pending'),
(6, 'Casper', 'Jack', 'sim@son.com', '5475779', 'Maserati', 'Ghibli', '2025-03-16', '15:00', 'Bonjour', 'completed'),
(7, 'Star', 'Bob', 'sim@son.com', '+230 69696969', 'Maserati', 'Ghibli', '2025-03-19', '16:00', 'pop', 'approved'),
(8, 'Squarepants', 'Bob', 'sim@son.com', '+230 69696969', 'Maserati', 'Ghibli', '2025-03-15', '16:00', 'I want car', 'approved'),
(9, 'Squarepants', 'Simon', 'sim@son.com', '+230 22222222', 'Aston Martin', 'Vanquish', '2025-03-16', '15:00', 'I wanna drive', 'pending'),
(10, 'Vergara', 'Sophia', 'star@patpat.com', '+230 69696969', 'Maserati', 'GT2 Stradale', '2025-03-15', '14:00', 'Je veux maserati', 'pending'),
(11, 'Caesar', 'Julius', 'doe@gmail.com', '+230 69696969', 'Porsche', 'Vanquish', '2025-04-17', '15:00', 'salut', 'pending'),
(12, 'Caesar', 'Julius', 'doe@gmail.com', '+230 69696969', 'Aston Martin', 'DBX', '2025-04-25', '12:00', 'Salut', 'denied'),
(13, 'Caesar', 'Julius', 'doe@gmail.com', '+230 69696969', 'Maserati', 'GT2 Stradale', '2025-04-17', '14:00', '', 'completed'),
(14, 'non', 'Jon', 'jon@gmail.com', '5555 5555', 'Aston Martin', 'DB12 Volante', '2025-05-16', '15:00', '', ''),
(15, 'jon', 'jean', 'hello@gmail.com', '5555 5555', 'Porsche', '911 GT3 RS', '2025-05-15', '13:00', 'hi', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
