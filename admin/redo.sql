-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 09, 2021 at 12:29 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grains`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_pin`
--

DROP TABLE IF EXISTS `account_pin`;
CREATE TABLE IF NOT EXISTS `account_pin` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `transfer_pin` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `created`) VALUES
(16, 'Admin', 'Admin', '$2y$10$NOkngkFSEFOFxC9nGevr0eMOXLJB.dIp3slUbGcSUq4Su6RBDOi8y', '2021-08-16 19:55:30');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

DROP TABLE IF EXISTS `debits`;
CREATE TABLE IF NOT EXISTS `debits` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_addrs` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL,
  `iban` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `trac_type` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kycdoc`
--

DROP TABLE IF EXISTS `kycdoc`;
CREATE TABLE IF NOT EXISTS `kycdoc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identity_doc` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(255) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `department` text NOT NULL,
  `message` text NOT NULL,
  `user_id` varchar(111) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment1`
--

DROP TABLE IF EXISTS `payment1`;
CREATE TABLE IF NOT EXISTS `payment1` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `imf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment2`
--

DROP TABLE IF EXISTS `payment2`;
CREATE TABLE IF NOT EXISTS `payment2` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ipn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment3`
--

DROP TABLE IF EXISTS `payment3`;
CREATE TABLE IF NOT EXISTS `payment3` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cot` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(255) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `subject_id` varchar(50) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `account_bal` varchar(255) NOT NULL,
  `accountBals` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `gender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `visible` tinyint(4) NOT NULL,
  `acc_type` varchar(50) NOT NULL,
  `is_active` enum('0','1') NOT NULL,
  `verify_token` varchar(50) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
