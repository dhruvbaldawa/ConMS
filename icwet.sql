-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 06, 2010 at 10:21 PM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `icwet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_admin_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`) VALUES
(1);

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_author_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`) VALUES
(4),
(6),
(7),
(8),
(9),
(10);

-- --------------------------------------------------------

--
-- Table structure for table `author_paper`
--

CREATE TABLE IF NOT EXISTS `author_paper` (
  `authors_id` int(10) unsigned NOT NULL,
  `paper_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`authors_id`,`paper_id`),
  KEY `fk_authors_has_paper_paper1` (`paper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `author_paper`
--

INSERT INTO `author_paper` (`authors_id`, `paper_id`) VALUES
(6, 1),
(7, 2),
(10, 3),
(9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `chairperson`
--

CREATE TABLE IF NOT EXISTS `chairperson` (
  `id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_chairperson_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chairperson`
--

INSERT INTO `chairperson` (`id`) VALUES
(1),
(2),
(5),
(6),
(9);

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE IF NOT EXISTS `entry` (
  `id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_entry_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`id`) VALUES
(3);

-- --------------------------------------------------------

--
-- Table structure for table `managers`
--

CREATE TABLE IF NOT EXISTS `managers` (
  `id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_manager_users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `managers`
--

INSERT INTO `managers` (`id`) VALUES
(2),
(6),
(7),
(8),
(9);

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE IF NOT EXISTS `paper` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(300) DEFAULT NULL,
  `type` enum('ltp','stp','pst') DEFAULT NULL,
  `description` text,
  `tracks_id` int(10) unsigned NOT NULL,
  `chairperson_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`tracks_id`,`chairperson_id`),
  KEY `fk_paper_tracks1` (`tracks_id`),
  KEY `fk_paper_chairperson1` (`chairperson_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `title`, `type`, `description`, `tracks_id`, `chairperson_id`) VALUES
(1, 'Paper1', 'ltp', 'It is Paper 1. It is going to have a very long long and long description.\r\n\r\nDescription is still going on and on and on and on.', 1, 9),
(2, 'Paper 2', 'stp', 'It is Paper 2', 2, 6),
(3, 'Paper 3', 'pst', 'It is Paper 3', 4, 2),
(4, 'Paper 4', 'ltp', 'It is Paper 4', 3, 5);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `author_id` int(10) unsigned NOT NULL,
  `paper_id` int(10) unsigned NOT NULL,
  `total` int(11) DEFAULT NULL,
  `remaining` int(11) DEFAULT NULL,
  `details` text,
  PRIMARY KEY (`id`,`author_id`,`paper_id`),
  UNIQUE KEY `author_paper_authors_id_UNIQUE` (`author_id`),
  UNIQUE KEY `author_paper_paper_id_UNIQUE` (`paper_id`),
  KEY `fk_payments_author_paper1` (`author_id`,`paper_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `payments`
--


-- --------------------------------------------------------

--
-- Table structure for table `tracks`
--

CREATE TABLE IF NOT EXISTS `tracks` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `managers_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`managers_id`),
  KEY `fk_tracks_managers1` (`managers_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `managers_id`) VALUES
(1, 'Track 1', 9),
(2, 'Track 2', 8),
(3, 'Track 3', 6),
(4, 'Track 4', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(256) DEFAULT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `home_institute` tinyint(1) NOT NULL DEFAULT '0',
  `phone` varchar(12) NOT NULL,
  `street` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `state` varchar(50) NOT NULL,
  `country` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `home_institute`, `phone`, `street`, `city`, `pincode`, `state`, `country`) VALUES
(1, 'admin', '2783cc934301698bf1abf85e693f46445f4def40', 'Administrator', '', 0, '', '', '', '', '', ''),
(2, 'manager', '56e5f73ca475381791b107483a4d578a38c93c18', 'Manager', '', 0, '', '', '', '', '', ''),
(3, 'entry', '230eb2bdf770ab658a74b7b35f88508ee6844703', 'Entry', '', 0, '', '', '', '', '', ''),
(4, 'author', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(5, 'chairperson', '56625fa95bb4d15cfe294da2df8c28f0d2692619', 'Chairperson', '', 0, '', '', '', '', '', ''),
(6, 'author1', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 1', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(7, 'author2', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 2', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(8, 'author3', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 3', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(9, 'author4', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 4', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(10, 'author5', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 5', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `fk_admin_users` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `authors`
--
ALTER TABLE `authors`
  ADD CONSTRAINT `fk_admin_users02` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `author_paper`
--
ALTER TABLE `author_paper`
  ADD CONSTRAINT `fk_authors_has_paper_authors1` FOREIGN KEY (`authors_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_authors_has_paper_paper1` FOREIGN KEY (`paper_id`) REFERENCES `paper` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `chairperson`
--
ALTER TABLE `chairperson`
  ADD CONSTRAINT `fk_admin_users00` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `entry`
--
ALTER TABLE `entry`
  ADD CONSTRAINT `fk_admin_users0` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `managers`
--
ALTER TABLE `managers`
  ADD CONSTRAINT `fk_admin_users01` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `paper`
--
ALTER TABLE `paper`
  ADD CONSTRAINT `fk_paper_chairperson1` FOREIGN KEY (`chairperson_id`) REFERENCES `chairperson` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_paper_tracks1` FOREIGN KEY (`tracks_id`) REFERENCES `tracks` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_author_paper1` FOREIGN KEY (`author_id`, `paper_id`) REFERENCES `author_paper` (`authors_id`, `paper_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tracks`
--
ALTER TABLE `tracks`
  ADD CONSTRAINT `fk_tracks_managers1` FOREIGN KEY (`managers_id`) REFERENCES `managers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
