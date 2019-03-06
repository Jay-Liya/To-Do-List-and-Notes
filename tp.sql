-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 06, 2019 at 03:17 AM
-- Server version: 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp`
--

-- --------------------------------------------------------

--
-- Table structure for table `tp_notes`
--

DROP TABLE IF EXISTS `tp_notes`;
CREATE TABLE IF NOT EXISTS `tp_notes` (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `note` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tp_notes`
--

INSERT INTO `tp_notes` (`id`, `note`, `username`) VALUES
(2, 'Test 2', 'jay'),
(4, 'Test 4', 'jay'),
(10, 'Test 7', 'tpuser'),
(11, 'Test 3', 'tpuser');

-- --------------------------------------------------------

--
-- Table structure for table `tp_todo`
--

DROP TABLE IF EXISTS `tp_todo`;
CREATE TABLE IF NOT EXISTS `tp_todo` (
  `id` int(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `task` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'INCOMPLETE',
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tp_todo`
--

INSERT INTO `tp_todo` (`id`, `task`, `status`, `username`) VALUES
(32, 'task 2', 'INCOMPLETE', 'jay'),
(30, 'task 11', 'COMPLETE', 'jay'),
(25, 'text33', 'COMPLETE', 'tpuser'),
(29, 'text11', 'INCOMPLETE', 'tpuser'),
(31, 'task 3', 'INCOMPLETE', 'jay');

-- --------------------------------------------------------

--
-- Table structure for table `tp_users`
--

DROP TABLE IF EXISTS `tp_users`;
CREATE TABLE IF NOT EXISTS `tp_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=ucs2;

--
-- Dumping data for table `tp_users`
--

INSERT INTO `tp_users` (`id`, `username`, `password`) VALUES
(2, 'tpuser', '098f6bcd4621d373cade4e832627b4f6'),
(3, 'tpuser1', '098f6bcd4621d373cade4e832627b4f6'),
(4, 'jay', '202cb962ac59075b964b07152d234b70'),
(5, 'user1', '202cb962ac59075b964b07152d234b70');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
