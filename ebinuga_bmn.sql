-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 06, 2022 at 07:45 AM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ebinuga_bmn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `created`) VALUES
(2, 'Admin', 'admin@admin.com', '$2y$10$FJhWen/HFWQjG8IKfu4bgeVnAv8rrO00L5bpbnh.Yp/yZLZFpJyzW', '2022-05-04 16:16:12');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=465 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crypto_debits`
--

DROP TABLE IF EXISTS `crypto_debits`;
CREATE TABLE IF NOT EXISTS `crypto_debits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transaction_id` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fee` varchar(255) NOT NULL,
  `from_address` varchar(255) NOT NULL,
  `to_address` varchar(255) NOT NULL,
  `confirmations` enum('0','1','2','3','4') NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crypto_debits`
--

INSERT INTO `crypto_debits` (`id`, `transaction_id`, `amount`, `email`, `fee`, `from_address`, `to_address`, `confirmations`, `user_id`, `created`) VALUES
(2, 'ertvcqo5ys9fyxd9s0xk', '500', '', '65 USD', '1NMKxpAZKGhvcSvpNZGU3iK9QHfrvqssdF', 'LiEG8wwwrkLg2wgYFRH1z7xiiKuxwgp6TA', '4', 'Matthew Rivers', '2021-10-12 08:19:37'),
(3, 'cdrk0jxw50vh9ry2sd3m', '1000', '', '65 USD', '1NMKxpAZKGhvcSvpNZGU3iK9QHfrvqssdF', 'jhdkdihih7484jrk885i95i94ijmd', '1', 'Mary Linda', '2021-10-13 15:18:46'),
(4, 'tsxck39wy0f5q0dorygc', '500', 'junnytracy@gmail.com', '65 USD', '1NMKxpAZKGhvcSvpNZGU3iK9QHfrvqssdF', 'hdkidiuejdojs749jduhdbjdhidh', '0', 'Mary Linda', '2021-10-13 20:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `debits`
--

DROP TABLE IF EXISTS `debits`;
CREATE TABLE IF NOT EXISTS `debits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acc_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_addrs` varchar(255) NOT NULL,
  `swift` varchar(255) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `trac_type` varchar(255) NOT NULL,
  `account_type` varchar(255) NOT NULL,
  `reference` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('0','1','2') NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `debits`
--

INSERT INTO `debits` (`id`, `acc_name`, `email`, `bank_name`, `bank_addrs`, `swift`, `account_no`, `amount`, `trac_type`, `account_type`, `reference`, `user_id`, `status`, `created`) VALUES
(28, 'Bitmine investment', 'mattg1332@gmail.com', 'Santander Bank', '63460 Rempel Place Girard, GA 30426', 'FIB9987E1TCD', '1498913583', '400000', 'Credit', 'Offshore_Business', '368945', 'Matthew Garry', '1', '2022-05-05 09:57:25'),
(29, 'Tina woods', 'mattg332@gmail.com', 'TBA', '44 wilson streen, wp estate', 'HDJK7893', '78303893893', '30000', 'Debit', 'Offshore_Business', '425319', 'Matthew Garry', '1', '2022-05-05 15:00:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kycdoc`
--

INSERT INTO `kycdoc` (`id`, `identity_doc`, `user_id`, `status`) VALUES
(9, 'client-1.jpg', '9', '1');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

DROP TABLE IF EXISTS `loan`;
CREATE TABLE IF NOT EXISTS `loan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`id`, `name`, `email`, `mobile`, `gender`, `dob`, `marital_status`, `purpose`, `country`, `amount`, `term`, `status`, `created`) VALUES
(3, 'Stephanie Willis Hoyt-Trapp', 'hanna@gmail.com', '67984408777', 'Female', '2010-06-10', '', 'for housing', 'Nigeria', '25,000 - 50,000', '5 months', 1, '2022-04-01 07:34:59'),
(4, 'Stephanie ', 'hanna@gmail.com', '67984408777', 'Female', '2008-06-11', 'Unmarried', 'for housing', 'Nigeria', '70,000 - 80,000', '9 months', 1, '2022-04-01 07:37:35');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `department` text NOT NULL,
  `message` text NOT NULL,
  `user_id` varchar(111) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`message_id`, `subject`, `department`, `message`, `user_id`, `status`, `date`) VALUES
(1, 'IMF:code', 'Customer Care', 'We advice that you use the savings but the checking have some little charges', '1', 1, '2022-02-28 09:17:19'),
(2, 'IMF cost', 'Customer Care', 'It cost 20000 USD to retrieve ', '1', 1, '2022-02-28 09:51:14'),
(3, 'cost', 'Customer Care', 'The cost is just $5000 USD', '9', 1, '2022-05-05 15:10:10');

-- --------------------------------------------------------

--
-- Table structure for table `payment1`
--

DROP TABLE IF EXISTS `payment1`;
CREATE TABLE IF NOT EXISTS `payment1` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `imf` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment1`
--

INSERT INTO `payment1` (`id`, `imf`) VALUES
(4, '09464'),
(5, '39925');

-- --------------------------------------------------------

--
-- Table structure for table `payment2`
--

DROP TABLE IF EXISTS `payment2`;
CREATE TABLE IF NOT EXISTS `payment2` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ipn` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment2`
--

INSERT INTO `payment2` (`id`, `ipn`) VALUES
(3, '43684'),
(4, '28165');

-- --------------------------------------------------------

--
-- Table structure for table `payment3`
--

DROP TABLE IF EXISTS `payment3`;
CREATE TABLE IF NOT EXISTS `payment3` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `cot` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment3`
--

INSERT INTO `payment3` (`id`, `cot`) VALUES
(3, '28156'),
(5, '31182'),
(6, '89342');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

DROP TABLE IF EXISTS `ticket`;
CREATE TABLE IF NOT EXISTS `ticket` (
  `ticket_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `status` enum('0','1') NOT NULL,
  `subject_id` varchar(50) NOT NULL,
  `attachment` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ticket_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `subject`, `message`, `user_id`, `status`, `subject_id`, `attachment`, `date`) VALUES
(7, 'IMF:code', 'what is the cost of the imf code ', '9', '1', '3', '', '2022-05-05 15:08:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `marital_status` varchar(255) NOT NULL,
  `address` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `zip` varchar(50) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `savings_balance` varchar(255) NOT NULL,
  `checking_balance` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_image` varchar(50) NOT NULL,
  `gender` varchar(50) CHARACTER SET latin1 NOT NULL,
  `acc_type` varchar(50) NOT NULL,
  `acc_pin` varchar(255) NOT NULL,
  `is_active` int(1) NOT NULL,
  `otp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `lastactivity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `dob`, `marital_status`, `address`, `country`, `zip`, `account_no`, `savings_balance`, `checking_balance`, `username`, `user_image`, `gender`, `acc_type`, `acc_pin`, `is_active`, `otp`, `password`, `created`, `lastactivity`) VALUES
(9, 'Matthew Garry', 'mattg1332@gmail.com', '17389003034', '1970-04-06', 'Single', '123 cook road usa', 'United States of America', '23456', '3773561477', '2000', '370000', 'matty9090', 'IMG-20220213-WA0015.jpg', 'Male', 'MERGE', '32600', 1, '9731', '$2y$10$K1.IP.OEIaZcXfcxjsyTw.umZeIwYGIv.Fbq1CE5lhTmwK04rlVie', '2022-05-05 15:02:01', '2022-05-04 16:26:24');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
