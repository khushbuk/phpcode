-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2013 at 04:25 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `blogdemo`
--

-- --------------------------------------------------------

--
-- Table structure for table `demo`
--

CREATE TABLE IF NOT EXISTS `demo` (
  `U_ID` bigint(20) NOT NULL AUTO_INCREMENT,
  `U_NAME` varchar(500) NOT NULL,
  `U_ADDRESS` varchar(500) NOT NULL,
  `U_PHONE` varchar(20) NOT NULL,
  `U_CREATED_DATE` varchar(30) NOT NULL,
  PRIMARY KEY (`U_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `demo`
--

INSERT INTO `demo` (`U_ID`, `U_NAME`, `U_ADDRESS`, `U_PHONE`, `U_CREATED_DATE`) VALUES
(1, 'khushbu', 'ahmedabad', '7878787878', '1234569'),
(2, 'khushbu', 'ahmedabad', '123456789', '1368793345'),
(3, 'khushbu', 'ahmedabad', '7878787878', '1368798151'),
(4, 'khushbu', 'ahmedabad', 'ahmedabad', '1368798241');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
