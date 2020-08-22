-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 22, 2020 at 09:40 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talktogether`
--

-- --------------------------------------------------------

--
-- Table structure for table `msgs`
--

DROP TABLE IF EXISTS `msgs`;
CREATE TABLE IF NOT EXISTS `msgs` (
  `sno` int(11) NOT NULL AUTO_INCREMENT,
  `msg` text NOT NULL,
  `room` text NOT NULL,
  `ip` text NOT NULL,
  `stime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `msgs`
--

INSERT INTO `msgs` (`sno`, `msg`, `room`, `ip`, `stime`) VALUES
(64, 'kljsdfkljs', 'hum', '::1', '2020-08-22 14:08:32'),
(65, 'jkhjhj', 'hum', '::1', '2020-08-22 14:15:53'),
(66, 'lyok', 'hum', '::1', '2020-08-22 14:16:09'),
(67, 'hiii', 'roo', '::1', '2020-08-22 14:29:06'),
(68, 'hiiii', 'roo', '::1', '2020-08-22 14:30:19'),
(69, 'lkjsflksd', 'roo', '::1', '2020-08-22 14:31:12'),
(70, 'lkjsdld', 'roooom', '::1', '2020-08-22 14:44:50'),
(71, 'hiii', 'roooom', '::1', '2020-08-22 14:44:58'),
(72, 'hiiii', 'roooom', '::1', '2020-08-22 14:46:51'),
(73, 'jksdfkls', 'roooom', '::1', '2020-08-22 14:47:23'),
(74, 'tushar', 'roooom', '::1', '2020-08-22 14:50:04'),
(75, 'hiiiiiiiiiiiiiiiiiiiiii', 'roooom', '::1', '2020-08-22 14:51:47'),
(76, 'fskldjfl;s', 'roooom', '::1', '2020-08-22 14:58:12'),
(77, 'hhi', 'roooom', '::1', '2020-08-22 15:04:53'),
(78, 'hii', 'kkkk', '::1', '2020-08-22 15:05:40');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
