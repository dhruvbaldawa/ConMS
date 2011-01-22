-- phpMyAdmin SQL Dump
-- version 3.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2011 at 01:54 PM
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
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `name` varchar(100) NOT NULL,
  `value` varchar(100) NOT NULL,
  `text` varchar(100) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`name`, `value`, `text`, `description`) VALUES
('fees_outhouse_conf_early', '4000', 'Fees for UG/PG Students, Faculty for Academic Institutions (early)', 'For Conference'),
('fees_outhouse_conf_work_early', '4500', 'Fees for UG/PG Students, Faculty for Academic Institutions (early)', 'For Conference and Workshop'),
('fees_outhouse_conf_late', '4500', 'Fees for UG/PG Students, Faculty for Academic Institutions (late)', 'For Conference'),
('fees_outhouse_conf_work_late', '5000', 'Fees for UG/PG Students, Faculty for Academic Institutions (late)', 'For Conference and Workshop'),
('fees_company_conf_early', '5000', 'Fees for Company Sponsored Delegates (early)', 'For Conference'),
('fees_company_conf_work_early', '5500', 'Fees for Company Sponsored Delegates (early)', 'For Conference and Workshop'),
('fees_company_conf_late', '5500', 'Fees for Company Sponsored Delegates (late)', 'For Conference'),
('fees_company_conf_work_late', '6000', 'Fees for Company Sponsored Delegates (late)', 'For Conference and Workshop'),
('fees_inhouse_fac_conf_early', '2000', 'Fees for TEG Faculty Members(early)', 'For Conference'),
('fees_inhouse_fac_conf_work_early', '2500', 'Fees for TEG Faculty Members(early)', 'For Conference and Workshop'),
('fees_inhouse_fac_conf_late', '4000', 'Fees for TEG Faculty Members(late)', 'For Conference'),
('fees_inhouse_fac_conf_work_late', '4500', 'Fees for TEG Faculty Members(late)', 'For Conference and Workshop'),
('fees_inhouse_stud_conf_work_early', '1000', 'UG Student Registration for Workshop only (early)', 'for students of Thakur College'),
('fees_inhouse_stud_conf_work_late', '1500', 'UG Student Registration for Workshop only (late)', 'for students of Thakur College'),
('fees_outhouse_stud_conf_work_early', '1250', 'UG Student Registration for Workshop only (early)', 'for students of Other Colleges'),
('fees_outhouse_stud_conf_work_late', '1750', 'UG Student Registration for Workshop only (late)', 'for students of Other Colleges'),
('threshold_date', '15/12/2010', 'Deadline date', '');
