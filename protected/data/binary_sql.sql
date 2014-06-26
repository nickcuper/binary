-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 26, 2014 at 10:06 AM
-- Server version: 5.5.37-0ubuntu0.12.10.1
-- PHP Version: 5.4.6-1ubuntu1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `binary_sql`
--

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `employee_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `root` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rgt` int(11) NOT NULL,
  `first_name` varchar(64) NOT NULL,
  `last_name` varchar(64) NOT NULL,
  `positions` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `notes` text NOT NULL,
  `date_register` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`employee_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `root`, `level`, `lft`, `rgt`, `first_name`, `last_name`, `positions`, `email`, `phone`, `notes`, `date_register`) VALUES
(5, 5, 1, 1, 8, 'FirstEmployee5', 'LastEmployee5', '', 'email5@gmail.com', '111115', '', 1403728163),
(6, 5, 2, 4, 7, 'FirstEmployee6', 'LastEmployee6', '', 'email6@gmail.com', '111116', '', 1403728163),
(7, 5, 2, 2, 3, 'FirstEmployee7', 'LastEmployee7', '', 'email7@gmail.com', '111117', '', 1403728163),
(8, 5, 3, 5, 6, 'FirstEmployee8', 'LastEmployee8', '', 'email8@gmail.com', '111118', '', 1403728163),
(9, 9, 1, 1, 2, 'FirstEmployee9', 'LastEmployee9', '', 'email9@gmail.com', '111119', '', 1403728163),
(10, 10, 1, 1, 2, 'FirstEmployee10', 'LastEmployee10', '', 'email10@gmail.com', '1111110', '', 1403728163),
(11, 11, 1, 1, 2, 'FirstEmployee11', 'LastEmployee11', '', 'email11@gmail.com', '1111111', '', 1403728163),
(12, 12, 1, 1, 2, 'FirstEmployee12', 'LastEmployee12', '', 'email12@gmail.com', '1111112', '', 1403728164),
(13, 13, 1, 1, 2, 'FirstEmployee13', 'LastEmployee13', '', 'email13@gmail.com', '1111113', '', 1403728164),
(14, 14, 1, 1, 2, 'FirstEmployee14', 'LastEmployee14', '', 'email14@gmail.com', '1111114', '', 1403728164),
(15, 15, 1, 1, 2, 'FirstEmployee15', 'LastEmployee15', '', 'email15@gmail.com', '1111115', '', 1403728164),
(16, 16, 1, 1, 2, 'FirstEmployee16', 'LastEmployee16', '', 'email16@gmail.com', '1111116', '', 1403728164),
(17, 17, 1, 1, 2, 'FirstEmployee17', 'LastEmployee17', '', 'email17@gmail.com', '1111117', '', 1403728164),
(18, 18, 1, 1, 2, 'FirstEmployee18', 'LastEmployee18', '', 'email18@gmail.com', '1111118', '', 1403728164),
(19, 19, 1, 1, 2, 'FirstEmployee19', 'LastEmployee19', '', 'email19@gmail.com', '1111119', '', 1403728164),
(20, 20, 1, 1, 2, 'FirstEmployee20', 'LastEmployee20', '', 'email20@gmail.com', '1111120', '', 1403728164),
(21, 21, 1, 1, 2, 'FirstEmployee21', 'LastEmployee21', '', 'email21@gmail.com', '1111121', '', 1403728164),
(22, 22, 1, 1, 2, 'FirstEmployee22', 'LastEmployee22', '', 'email22@gmail.com', '1111122', '', 1403728164),
(23, 23, 1, 1, 2, 'FirstEmployee23', 'LastEmployee23', '', 'email23@gmail.com', '1111123', '', 1403728164),
(24, 24, 1, 1, 2, 'FirstEmployee24', 'LastEmployee24', '', 'email24@gmail.com', '1111124', '', 1403728164),
(25, 25, 1, 1, 2, 'FirstEmployee25', 'LastEmployee25', '', 'email25@gmail.com', '1111125', '', 1403728164),
(26, 26, 1, 1, 2, 'FirstEmployee26', 'LastEmployee26', '', 'email26@gmail.com', '1111126', '', 1403728164),
(27, 27, 1, 1, 2, 'FirstEmployee27', 'LastEmployee27', '', 'email27@gmail.com', '1111127', '', 1403728164),
(28, 28, 1, 1, 2, 'FirstEmployee28', 'LastEmployee28', '', 'email28@gmail.com', '1111128', '', 1403728164),
(29, 29, 1, 1, 2, 'FirstEmployee29', 'LastEmployee29', '', 'email29@gmail.com', '1111129', '', 1403728164),
(30, 30, 1, 1, 2, 'FirstEmployee30', 'LastEmployee30', '', 'email30@gmail.com', '1111130', '', 1403728164),
(31, 31, 1, 1, 2, 'FirstEmployee31', 'LastEmployee31', '', 'email31@gmail.com', '1111131', '', 1403728164),
(32, 32, 1, 1, 2, 'FirstEmployee32', 'LastEmployee32', '', 'email32@gmail.com', '1111132', '', 1403728164),
(33, 33, 1, 1, 2, 'FirstEmployee33', 'LastEmployee33', '', 'email33@gmail.com', '1111133', '', 1403728164),
(34, 34, 1, 1, 2, 'FirstEmployee34', 'LastEmployee34', '', 'email34@gmail.com', '1111134', '', 1403728165),
(35, 35, 1, 1, 2, 'FirstEmployee35', 'LastEmployee35', '', 'email35@gmail.com', '1111135', '', 1403728165),
(36, 36, 1, 1, 2, 'FirstEmployee36', 'LastEmployee36', '', 'email36@gmail.com', '1111136', '', 1403728165),
(37, 37, 1, 1, 2, 'FirstEmployee37', 'LastEmployee37', '', 'email37@gmail.com', '1111137', '', 1403728165),
(38, 38, 1, 1, 2, 'FirstEmployee38', 'LastEmployee38', '', 'email38@gmail.com', '1111138', '', 1403728165),
(39, 39, 1, 1, 2, 'FirstEmployee39', 'LastEmployee39', '', 'email39@gmail.com', '1111139', '', 1403728165),
(40, 40, 1, 1, 2, 'FirstEmployee40', 'LastEmployee40', '', 'email40@gmail.com', '1111140', '', 1403728165),
(41, 41, 1, 1, 2, 'FirstEmployee41', 'LastEmployee41', '', 'email41@gmail.com', '1111141', '', 1403728165),
(42, 42, 1, 1, 2, 'FirstEmployee42', 'LastEmployee42', '', 'email42@gmail.com', '1111142', '', 1403728165),
(43, 43, 1, 1, 2, 'FirstEmployee43', 'LastEmployee43', '', 'email43@gmail.com', '1111143', '', 1403728165),
(44, 44, 1, 1, 2, 'FirstEmployee44', 'LastEmployee44', '', 'email44@gmail.com', '1111144', '', 1403728165),
(45, 45, 1, 1, 2, 'FirstEmployee45', 'LastEmployee45', '', 'email45@gmail.com', '1111145', '', 1403728165),
(46, 46, 1, 1, 2, 'FirstEmployee46', 'LastEmployee46', '', 'email46@gmail.com', '1111146', '', 1403728165),
(47, 47, 1, 1, 2, 'FirstEmployee47', 'LastEmployee47', '', 'email47@gmail.com', '1111147', '', 1403728165),
(48, 48, 1, 1, 2, 'FirstEmployee48', 'LastEmployee48', '', 'email48@gmail.com', '1111148', '', 1403728165),
(49, 49, 1, 1, 2, 'FirstEmployee49', 'LastEmployee49', '', 'email49@gmail.com', '1111149', '', 1403728165),
(50, 50, 1, 1, 2, 'FirstEmployee50', 'LastEmployee50', '', 'email50@gmail.com', '1111150', '', 1403728165),
(51, 51, 1, 1, 2, 'FirstEmployee51', 'LastEmployee51', '', 'email51@gmail.com', '1111151', '', 1403728165),
(52, 52, 1, 1, 2, 'FirstEmployee52', 'LastEmployee52', '', 'email52@gmail.com', '1111152', '', 1403728165),
(53, 53, 1, 1, 2, 'FirstEmployee53', 'LastEmployee53', '', 'email53@gmail.com', '1111153', '', 1403728165),
(54, 54, 1, 1, 2, 'FirstEmployee54', 'LastEmployee54', '', 'email54@gmail.com', '1111154', '', 1403728165),
(55, 55, 1, 1, 2, 'FirstEmployee55', 'LastEmployee55', '', 'email55@gmail.com', '1111155', '', 1403728165),
(56, 56, 1, 1, 2, 'FirstEmployee56', 'LastEmployee56', '', 'email56@gmail.com', '1111156', '', 1403728165),
(57, 57, 1, 1, 2, 'FirstEmployee57', 'LastEmployee57', '', 'email57@gmail.com', '1111157', '', 1403728166),
(58, 58, 1, 1, 2, 'FirstEmployee58', 'LastEmployee58', '', 'email58@gmail.com', '1111158', '', 1403728166),
(59, 59, 1, 1, 2, 'FirstEmployee59', 'LastEmployee59', '', 'email59@gmail.com', '1111159', '', 1403728166),
(60, 60, 1, 1, 2, 'FirstEmployee60', 'LastEmployee60', '', 'email60@gmail.com', '1111160', '', 1403728166),
(61, 61, 1, 1, 2, 'FirstEmployee61', 'LastEmployee61', '', 'email61@gmail.com', '1111161', '', 1403728166),
(62, 62, 1, 1, 2, 'FirstEmployee62', 'LastEmployee62', '', 'email62@gmail.com', '1111162', '', 1403728166),
(63, 63, 1, 1, 2, 'FirstEmployee63', 'LastEmployee63', '', 'email63@gmail.com', '1111163', '', 1403728166),
(64, 64, 1, 1, 2, 'FirstEmployee64', 'LastEmployee64', '', 'email64@gmail.com', '1111164', '', 1403728166),
(65, 65, 1, 1, 2, 'FirstEmployee65', 'LastEmployee65', '', 'email65@gmail.com', '1111165', '', 1403728166),
(66, 66, 1, 1, 2, 'FirstEmployee66', 'LastEmployee66', '', 'email66@gmail.com', '1111166', '', 1403728166),
(67, 67, 1, 1, 2, 'FirstEmployee67', 'LastEmployee67', '', 'email67@gmail.com', '1111167', '', 1403728166),
(68, 68, 1, 1, 2, 'FirstEmployee68', 'LastEmployee68', '', 'email68@gmail.com', '1111168', '', 1403728166),
(69, 69, 1, 1, 2, 'FirstEmployee69', 'LastEmployee69', '', 'email69@gmail.com', '1111169', '', 1403728166),
(70, 70, 1, 1, 2, 'FirstEmployee70', 'LastEmployee70', '', 'email70@gmail.com', '1111170', '', 1403728166),
(71, 71, 1, 1, 2, 'FirstEmployee71', 'LastEmployee71', '', 'email71@gmail.com', '1111171', '', 1403728166),
(72, 72, 1, 1, 2, 'FirstEmployee72', 'LastEmployee72', '', 'email72@gmail.com', '1111172', '', 1403728166),
(73, 73, 1, 1, 2, 'FirstEmployee73', 'LastEmployee73', '', 'email73@gmail.com', '1111173', '', 1403728166),
(74, 74, 1, 1, 2, 'FirstEmployee74', 'LastEmployee74', '', 'email74@gmail.com', '1111174', '', 1403728166),
(75, 75, 1, 1, 2, 'FirstEmployee75', 'LastEmployee75', '', 'email75@gmail.com', '1111175', '', 1403728166),
(76, 76, 1, 1, 2, 'FirstEmployee76', 'LastEmployee76', '', 'email76@gmail.com', '1111176', '', 1403728166),
(77, 77, 1, 1, 2, 'FirstEmployee77', 'LastEmployee77', '', 'email77@gmail.com', '1111177', '', 1403728166),
(78, 78, 1, 1, 2, 'FirstEmployee78', 'LastEmployee78', '', 'email78@gmail.com', '1111178', '', 1403728166),
(79, 79, 1, 1, 2, 'FirstEmployee79', 'LastEmployee79', '', 'email79@gmail.com', '1111179', '', 1403728166),
(80, 80, 1, 1, 2, 'FirstEmployee80', 'LastEmployee80', '', 'email80@gmail.com', '1111180', '', 1403728167),
(81, 81, 1, 1, 2, 'FirstEmployee81', 'LastEmployee81', '', 'email81@gmail.com', '1111181', '', 1403728167),
(82, 82, 1, 1, 2, 'FirstEmployee82', 'LastEmployee82', '', 'email82@gmail.com', '1111182', '', 1403728167),
(83, 83, 1, 1, 2, 'FirstEmployee83', 'LastEmployee83', '', 'email83@gmail.com', '1111183', '', 1403728167),
(84, 84, 1, 1, 2, 'FirstEmployee84', 'LastEmployee84', '', 'email84@gmail.com', '1111184', '', 1403728167),
(85, 85, 1, 1, 2, 'FirstEmployee85', 'LastEmployee85', '', 'email85@gmail.com', '1111185', '', 1403728167),
(86, 86, 1, 1, 2, 'FirstEmployee86', 'LastEmployee86', '', 'email86@gmail.com', '1111186', '', 1403728167),
(87, 87, 1, 1, 2, 'FirstEmployee87', 'LastEmployee87', '', 'email87@gmail.com', '1111187', '', 1403728167),
(88, 88, 1, 1, 2, 'FirstEmployee88', 'LastEmployee88', '', 'email88@gmail.com', '1111188', '', 1403728167),
(89, 89, 1, 1, 2, 'FirstEmployee89', 'LastEmployee89', '', 'email89@gmail.com', '1111189', '', 1403728167),
(90, 90, 1, 1, 2, 'FirstEmployee90', 'LastEmployee90', '', 'email90@gmail.com', '1111190', '', 1403728167),
(91, 91, 1, 1, 2, 'FirstEmployee91', 'LastEmployee91', '', 'email91@gmail.com', '1111191', '', 1403728167),
(92, 92, 1, 1, 2, 'FirstEmployee92', 'LastEmployee92', '', 'email92@gmail.com', '1111192', '', 1403728167),
(93, 93, 1, 1, 2, 'FirstEmployee93', 'LastEmployee93', '', 'email93@gmail.com', '1111193', '', 1403728167),
(94, 94, 1, 1, 2, 'FirstEmployee94', 'LastEmployee94', '', 'email94@gmail.com', '1111194', '', 1403728167),
(95, 95, 1, 1, 2, 'FirstEmployee95', 'LastEmployee95', '', 'email95@gmail.com', '1111195', '', 1403728167),
(96, 96, 1, 1, 2, 'FirstEmployee96', 'LastEmployee96', '', 'email96@gmail.com', '1111196', '', 1403728167),
(97, 97, 1, 1, 2, 'FirstEmployee97', 'LastEmployee97', '', 'email97@gmail.com', '1111197', '', 1403728167),
(98, 98, 1, 1, 2, 'FirstEmployee98', 'LastEmployee98', '', 'email98@gmail.com', '1111198', '', 1403728167),
(99, 99, 1, 1, 2, 'FirstEmployee99', 'LastEmployee99', '', 'email99@gmail.com', '1111199', '', 1403728167);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `date_register` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `login` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `date_register`) VALUES
(1, 'demo', '$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC', 'webmaster@example.com', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
