-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2010 at 06:09 PM
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
(14),
(15),
(16),
(17),
(18),
(19),
(20),
(21),
(22),
(23),
(24),
(25),
(26),
(27),
(28),
(29),
(30),
(31),
(32),
(33),
(34),
(35),
(36),
(37),
(38),
(39),
(40),
(41),
(42),
(43),
(44),
(45),
(46),
(47),
(48),
(49),
(50),
(51),
(52),
(53),
(54),
(55),
(56),
(57),
(58),
(59),
(60),
(61),
(62),
(63),
(64),
(65),
(66),
(67),
(68),
(69),
(70),
(71),
(72),
(73),
(74),
(75),
(76),
(77),
(78),
(79),
(80),
(81),
(82),
(83),
(84),
(85),
(86),
(87),
(88),
(89),
(90),
(91),
(92),
(93),
(94),
(95),
(96),
(97),
(98),
(99),
(100),
(101),
(102),
(103),
(104),
(105),
(106),
(107),
(108),
(109),
(110),
(111),
(112),
(113),
(114),
(115),
(116),
(117),
(118),
(119),
(120),
(121),
(122),
(123),
(124),
(125),
(126),
(127),
(128),
(129),
(130),
(131),
(132),
(133),
(134),
(135),
(136),
(137),
(138),
(139),
(140),
(141),
(142),
(143),
(144),
(145),
(146),
(147),
(148),
(149),
(150),
(151),
(152),
(153),
(154),
(155),
(156),
(157),
(158),
(159),
(160),
(161),
(162),
(163),
(164),
(165),
(166),
(167),
(168),
(169),
(170),
(171),
(172),
(173),
(174),
(175),
(176),
(177),
(178),
(179),
(180),
(181),
(182),
(183),
(184),
(185),
(186),
(187);

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
  `title` varchar(500) DEFAULT NULL,
  `type` enum('ltp','stp','pst') DEFAULT NULL,
  `description` text,
  `tracks_id` int(10) unsigned NOT NULL,
  `chairperson_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`,`tracks_id`,`chairperson_id`),
  KEY `fk_paper_tracks1` (`tracks_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `title`, `type`, `description`, `tracks_id`, `chairperson_id`) VALUES
(1, 'Template Matching Using Sum and Difference in Pixel Intensities', NULL, NULL, 1, 0),
(2, 'Constructing Minimum Connected Dominating set: Algorithmic Approach', NULL, NULL, 1, 0),
(3, 'An Integrated High-Performance Distributed File System Implementation on Existing Local Network', NULL, NULL, 1, 0),
(4, 'Novel Algorithm for Iriscode Organization and Adaptive Searching for IRIS code Similarity', NULL, NULL, 1, 0),
(5, 'Dynamic Call Management for Congestion control in Cellular Networks', NULL, NULL, 1, 0),
(6, 'On some security issuses in cloud computing environment', NULL, NULL, 1, 0),
(7, 'Digital Image Processing Techniques Based on Edge Feature Extraction', NULL, NULL, 1, 0),
(8, 'Synthetic Biology : Apoptosis and Cancer', NULL, NULL, 1, 0),
(9, 'Medical Image Segmentation for Brain Tumor Detection', NULL, NULL, 1, 0),
(10, 'Modeling and Simulation of 2-D GaAs MESFET under Illumination', NULL, NULL, 1, 0),
(11, 'FPGA Based GPS System Design', NULL, NULL, 1, 0),
(12, 'An Efficient Character Recognition System for Combinational Malayalam Handwritten Characters', NULL, NULL, 1, 0),
(13, 'AIRCRAFT TARGET TRACKING', NULL, NULL, 1, 0),
(14, 'Nano-technology an Innovations for Non Conventional Energy Sources', NULL, NULL, 1, 0),
(15, 'Reduction of adjacent channel interference using OFDM', NULL, NULL, 1, 0),
(16, 'WAVELETS FOR MOVING VEHICLES DETECTION AND TRACKING IN TRAFFIC MONITORING SYSTEMS', NULL, NULL, 1, 0),
(17, 'Normal Mode to Axial Mode Conversion of Helical Antenna by Using Cavity', NULL, NULL, 1, 0),
(18, 'Statistically Computed Signal Analysis in Antenna Array', NULL, NULL, 1, 0),
(19, 'REVIEW ON IMPULSE RADIATING ANTENNAS', NULL, NULL, 1, 0),
(20, 'Probabilistic Approach in Video Based Face Recognition', NULL, NULL, 1, 0),
(21, 'Error correction over wireless channels using symmetric cryptography', NULL, NULL, 1, 0),
(22, 'Consensus based Dynamic Load Balancing for a Network of Heterogeneous Workstations', NULL, NULL, 1, 0),
(23, 'Data Mining: A Perspective', NULL, NULL, 1, 0),
(24, 'Improved Dynamic Model for Policy Based Access Control', NULL, NULL, 1, 0),
(25, 'Online monitoring system of Temperature', NULL, NULL, 1, 0),
(26, 'Neural Network Based Sensor Drift Compensation of Induction Motor', NULL, NULL, 1, 0),
(27, 'Device Control Using Speech Recognition', NULL, NULL, 1, 0),
(28, 'Resource Optimization in a LAN Environment Using SMIG-Shared Memory Integrated with Grid', NULL, NULL, 1, 0),
(30, 'Broadband over powerline communication', NULL, NULL, 1, 0),
(31, 'Dynamic Interplay as a search operation using ‘Natural user interfaces’ and ‘Rich presentation''', NULL, NULL, 1, 0),
(32, 'ASSIST - Automated System for Surgical Instrument and Sponge Tracking', NULL, NULL, 1, 0),
(33, 'HawkEye Solutions: A Network Intrusion Detection System', NULL, NULL, 1, 0),
(34, 'Focused Cralwler with revisit policy', NULL, NULL, 1, 0),
(35, 'Statistical Texture Analysis for Automated Leukemia Detection in Blood Microscopic Images', NULL, NULL, 1, 0),
(36, 'SPWM BASED Z-SOURCE INVERTER FOR INDUCTION MOTOR', NULL, NULL, 1, 0),
(37, 'Comparison of Different CBIR Techniques', NULL, NULL, 1, 0),
(38, 'Implementation of Incremental Encoder based Position and Velocity Measurement Chip', NULL, NULL, 1, 0),
(39, 'Named Entity Recognition: Case Study', NULL, NULL, 1, 0),
(40, 'Hidden Markov Model: Case Study', NULL, NULL, 1, 0),
(41, 'VIVACE (vortex induced vibrations for aquatic clean energy)', NULL, NULL, 1, 0),
(42, 'ID Based Public Key Cryptography for Heterogeneous Wireless Sensor Networks', NULL, NULL, 1, 0),
(43, 'MODELING LATENCY FOR 3G MOBILE NETWORK', NULL, NULL, 1, 0),
(44, 'ANALYSIS OF BACK GATE AND GATE ALL AROUND CNTFET STRUCTURE', NULL, NULL, 1, 0),
(45, 'Enhancement in the properties of CNTFET by the use of high-k dielectric, HfO2', NULL, NULL, 1, 0),
(46, 'APPLICATION OF EXPERT SYSTEM FOR ARRHYTHMIA ANALYSIS', NULL, NULL, 1, 0),
(47, 'Mitigating Denial of Service attack using CAPTCHA mechanism', NULL, NULL, 1, 0),
(48, 'Secure Authentication using Dynamic Virtual Keyboard Layout', NULL, NULL, 1, 0),
(49, 'A New data encryption & decryption Algorithm(PSZ proposed):A Comparison with RSA', NULL, NULL, 1, 0),
(50, 'Freshness Tuning in Focused Crawler', NULL, NULL, 1, 0),
(51, 'Understanding The Spatial Database Concept By Developing City Map With The Help Of Oracle Spatial', NULL, NULL, 1, 0),
(52, 'Oxidised Macro Porous Silicon Based thermal isolation in the design of Microheater for MEMS based gas sensors', NULL, NULL, 1, 0),
(53, 'An Explicit Approach for Delay Evaluation for On- Chip RC Interconnects using Beta Distribution Function using Three Moments', NULL, NULL, 1, 0),
(54, 'A Novel Multialgorithmic Approach for Improving Accuracy of Iris Recognition using Haar, Multiresolution and New Block Sum Method', NULL, NULL, 1, 0),
(55, 'IMPACT OF ERP ON CORPORATE PERFORMANCE', NULL, NULL, 1, 0),
(56, '“Phishing Email-A Type of Mass Attack used by Fradulents”', NULL, NULL, 1, 0),
(57, 'Performance Analysis of (AIMM-I46) Addressing, Inter-Mobility and Interoperability Management Architecture between IPv4 and IPv6 Networks', NULL, NULL, 1, 0),
(58, 'Congestion Control In Wireless Communication System', NULL, NULL, 1, 0),
(59, 'A Survey : Cloud Computing An Uber Technology', NULL, NULL, 1, 0),
(60, 'optical Wireless Communication System for Atmospheric Turbulence', NULL, NULL, 1, 0),
(61, 'Virtual Mannequin: 3D Parameterized Human Modeling', NULL, NULL, 1, 0),
(62, 'Steps to Reduce Global warming – Power management in LAN by Java LAN Controller', NULL, NULL, 1, 0),
(63, 'Reconstruction of Lost Image Blocks In Wireless Transmission & Compression Using Structure and Texture Filling-in', NULL, NULL, 1, 0),
(64, 'AN ADAPTIVE CURRENT CONTROLLER FOR REDUCTION OF COMMUTATION TORQUE RIPPLE IN A SENSORLESS BLDC DRIVE', NULL, NULL, 1, 0),
(66, 'Honeypot: A Survey of Technologies, Tools and Deployment', NULL, NULL, 1, 0),
(67, 'SUBSTRATE INTEGRATED CIRCUITS - A NEW ERA IN MILLIMETER RANGE CIRCUITS', NULL, NULL, 1, 0),
(68, 'A Novel OTA and FVF based Second Generation Current Conveyor', NULL, NULL, 1, 0),
(69, 'Full DST Sectorization for Feature Vector Generation in Content Based Image Retrieval', NULL, NULL, 1, 0),
(70, 'VIEW BASED APPROACH FOR RECOGNITION OF HUMAN MOVEMENT', NULL, NULL, 1, 0),
(71, 'Design of File size and Type of Access Based Replication Algorithm for Data Grid', NULL, NULL, 1, 0),
(72, 'A Survey of Issues of Query Optimization in parallel databases', NULL, NULL, 1, 0),
(73, 'Offline Signature Verification System Based On Discrete Cosine Transform', NULL, NULL, 1, 0),
(74, 'ROBUST SPEECH TRANSFORM FOR CUE-SYMBOL GENERATION', NULL, NULL, 1, 0),
(75, 'Multimedia Resource Library Using Video Streaming', NULL, NULL, 1, 0),
(76, 'Speech Activated Navigator with Virtual Interface', NULL, NULL, 1, 0),
(77, 'Study of Variation of Total Harmonic Distortion in Diode Clamped Multilevel Inverter with Modulation Index', NULL, NULL, 1, 0),
(79, 'Performance of IRLS Algorithm in Compressive Sensing', NULL, NULL, 1, 0),
(80, 'Data Mining: A perspective', NULL, NULL, 1, 0),
(81, 'A Novel Approach For Research Paper Abstracts Summarization Using Cluster Based Sentence Extraction', NULL, NULL, 1, 0),
(82, 'Performance analysis of AWG Demux for Optical network', NULL, NULL, 1, 0),
(83, 'Design of 1 V CMOS VCO followed by Proposed Source Degeneration based CML Flip-Flops for 2.4 GHz Short Range Wireless Applications.', NULL, NULL, 1, 0),
(84, 'Enhancement of Fault Tolerance of Intrusion Detection System using AES and DES based Heart Beat Events', NULL, NULL, 1, 0),
(85, 'IPv6: Issues and Migration Status In India', NULL, NULL, 1, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `tracks`
--

INSERT INTO `tracks` (`id`, `name`, `managers_id`) VALUES
(1, 'Intelligent Systems', 9),
(2, 'Communication Engineering', 8),
(3, 'Advanced Computer Application', 6),
(4, 'Database Engineering', 2),
(5, 'Biomedical, Bio-Informatics & Biotechnology', 9),
(6, 'Electronic, Microwave Devices & Circuits', 6),
(14, 'Green Technology & Environmental Science', 9),
(15, 'Software Engineering', 9),
(16, 'Algorithms', 9),
(17, 'Embedded Systems and Applications ', 9);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=188 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `home_institute`, `phone`, `street`, `city`, `pincode`, `state`, `country`) VALUES
(1, 'admin', '2783cc934301698bf1abf85e693f46445f4def40', 'Administrator', '', 0, '', '', '', '', '', ''),
(2, 'manager', '56e5f73ca475381791b107483a4d578a38c93c18', 'Manager', '', 0, '', '', '', '', '', ''),
(3, 'entry', '230eb2bdf770ab658a74b7b35f88508ee6844703', 'Entry', '', 0, '', '', '', '', '', ''),
(4, 'author', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author', 'dhruvbaldawa@gmail.com', 1, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(5, 'chairperson', '56625fa95bb4d15cfe294da2df8c28f0d2692619', 'Chairperson', '', 0, '', '', '', '', '', ''),
(6, 'author1', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 1', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(7, 'author2', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 2', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(8, 'author3', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 3', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(9, 'author4', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 4', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(10, 'author5', '65cb0d6c2e090e6f68305eea9b376b2595174ff0', 'Author 5', 'dhruvbaldawa@gmail.com', 0, '9323321233', '10/85,Unnat Nagar-1,Goregaon(W)', 'Mumbai', '400062', 'Maharashtra', 'India'),
(11, 'tcet', '29a175de1b4793adedcc5f549498a339f6f95d27', 'Rekha', 'tcet', 1, 'tcettcet', 'tcet', 'tcet', 'tcet', 'tcet', 'tcet'),
(12, 'asd', '8e9da39067b733e9cd252e6adc93f665b3084b5b', 'zc', '1', 1, '1', '1', '1', '1', '1', '1'),
(13, 'a', 'eebe457be2d0a33914e98cbf215e72c8a9af6b79', 'a', 'a', 0, 'a', 'a', 'a', 'a', 'a', 'a'),
(14, NULL, NULL, 'Kishor Honwadkar', '', 0, '', '', '', '', '', ''),
(15, NULL, NULL, 'Anirban Mitra', '', 0, '', '', '', '', '', ''),
(16, NULL, NULL, 'David Solomon Raju', '', 0, '', '', '', '', '', ''),
(17, NULL, NULL, 'Dwarkoba Gaikwad', '', 0, '', '', '', '', '', ''),
(18, NULL, NULL, 'Seema Shah', '', 0, '', '', '', '', '', ''),
(19, NULL, NULL, 'Indraneel Mukhopadhyay', '', 0, '', '', '', '', '', ''),
(20, NULL, NULL, 'Subrajeet Mohapatra', '', 0, '', '', '', '', '', ''),
(21, NULL, NULL, 'Sonali Bhadoria', '', 0, '', '', '', '', '', ''),
(22, NULL, NULL, 'Kriti Gupta', '', 0, '', '', '', '', '', ''),
(23, NULL, NULL, 'Mahendra Mehra', '', 0, '', '', '', '', '', ''),
(24, NULL, NULL, 'Mayank Agarwal', '', 0, '', '', '', '', '', ''),
(25, NULL, NULL, 'Shamal Firake', '', 0, '', '', '', '', '', ''),
(26, NULL, NULL, 'Sneha Patil', '', 0, '', '', '', '', '', ''),
(27, NULL, NULL, 'Amit Prakash', '', 0, '', '', '', '', '', ''),
(28, NULL, NULL, 'Tamilkodi Ramachandran', '', 0, '', '', '', '', '', ''),
(29, NULL, NULL, 'Anita Borkar', '', 0, '', '', '', '', '', ''),
(30, NULL, NULL, 'Vidya Hulsure', '', 0, '', '', '', '', '', ''),
(31, NULL, NULL, 'Sanjay Waykar', '', 0, '', '', '', '', '', ''),
(32, NULL, NULL, 'Perminder Kaur', '', 0, '', '', '', '', '', ''),
(33, NULL, NULL, 'Abdul Rahiman M', '', 0, '', '', '', '', '', ''),
(34, NULL, NULL, 'Asha Rawat', '', 0, '', '', '', '', '', ''),
(35, NULL, NULL, 'Janhavi Baikerikar', '', 0, '', '', '', '', '', ''),
(36, NULL, NULL, 'H.B. Kekre', '', 0, '', '', '', '', '', ''),
(37, NULL, NULL, 'Kavita Jain', '', 0, '', '', '', '', '', ''),
(38, NULL, NULL, 'Madhuparna Chakraborty', '', 0, '', '', '', '', '', ''),
(39, NULL, NULL, 'Shruti Jain', '', 0, '', '', '', '', '', ''),
(40, NULL, NULL, 'Mr.Shivanand Konade', '', 0, '', '', '', '', '', ''),
(41, NULL, NULL, 'Gajanan Dhok', '', 0, '', '', '', '', '', ''),
(42, NULL, NULL, 'Usha Sharma', '', 0, '', '', '', '', '', ''),
(43, NULL, NULL, 'Tilottama Dhake', '', 0, '', '', '', '', '', ''),
(44, NULL, NULL, 'Mr.Arun Kachare', '', 0, '', '', '', '', '', ''),
(45, NULL, NULL, 'Praveen Malik', '', 0, '', '', '', '', '', ''),
(46, NULL, NULL, 'Rakhi Muley', '', 0, '', '', '', '', '', ''),
(47, NULL, NULL, 'Anita Purushotham', '', 0, '', '', '', '', '', ''),
(48, NULL, NULL, 'Umesh Kulkarni', '', 0, '', '', '', '', '', ''),
(49, NULL, NULL, 'Sheetal Jagtap', '', 0, '', '', '', '', '', ''),
(50, NULL, NULL, 'Anil Hingmire', '', 0, '', '', '', '', '', ''),
(51, NULL, NULL, 'Gnana Jayanthi Joshi', '', 0, '', '', '', '', '', ''),
(52, NULL, NULL, 'Nandkishor Karlekar', '', 0, '', '', '', '', '', ''),
(53, NULL, NULL, 'Ibrahim Patel', '', 0, '', '', '', '', '', ''),
(54, NULL, NULL, 'Jyothi Digge', '', 0, '', '', '', '', '', ''),
(55, NULL, NULL, 'Suresh Limkar', '', 0, '', '', '', '', '', ''),
(56, NULL, NULL, 'Pankaj Agarkar', '', 0, '', '', '', '', '', ''),
(57, NULL, NULL, 'Prachitee Shekhawat', '', 0, '', '', '', '', '', ''),
(58, NULL, NULL, 'Swati Mali', '', 0, '', '', '', '', '', ''),
(59, NULL, NULL, 'Smita Dange', '', 0, '', '', '', '', '', ''),
(60, NULL, NULL, 'Sunita Mahajan', '', 0, '', '', '', '', '', ''),
(61, NULL, NULL, 'Dr. B. K. Mishra', '', 0, '', '', '', '', '', ''),
(62, NULL, NULL, 'Vinitkumar Dongre', '', 0, '', '', '', '', '', ''),
(63, NULL, NULL, 'Tusharika Sinha Banerjee', '', 0, '', '', '', '', '', ''),
(64, NULL, NULL, 'Ketki Deshmukh', '', 0, '', '', '', '', '', ''),
(65, NULL, NULL, 'Sonali Nade', '', 0, '', '', '', '', '', ''),
(66, NULL, NULL, 'Divya Patil', '', 0, '', '', '', '', '', ''),
(67, NULL, NULL, 'Mondit Mahanta', '', 0, '', '', '', '', '', ''),
(68, NULL, NULL, 'Rajib Kar', '', 0, '', '', '', '', '', ''),
(69, NULL, NULL, 'Adil Siddiqui', '', 0, '', '', '', '', '', ''),
(70, NULL, NULL, 'Amisha Naik', '', 0, '', '', '', '', '', ''),
(71, NULL, NULL, 'Arivazhagan Perumal', '', 0, '', '', '', '', '', ''),
(72, NULL, NULL, 'Subha Subramaniam', '', 0, '', '', '', '', '', ''),
(73, NULL, NULL, 'Suggala Ram Prasad', '', 0, '', '', '', '', '', ''),
(74, NULL, NULL, 'Nishath Anjum', '', 0, '', '', '', '', '', ''),
(75, NULL, NULL, 'Ajitha S', '', 0, '', '', '', '', '', ''),
(76, NULL, NULL, 'Mahesh Babu Basam', '', 0, '', '', '', '', '', ''),
(77, NULL, NULL, 'Deepthi Janyavula', '', 0, '', '', '', '', '', ''),
(78, NULL, NULL, 'Kamal Raj', '', 0, '', '', '', '', '', ''),
(79, NULL, NULL, 'Nilima Zade', '', 0, '', '', '', '', '', ''),
(80, NULL, NULL, 'uthra R', '', 0, '', '', '', '', '', ''),
(81, NULL, NULL, 'Yogi Joshi', '', 0, '', '', '', '', '', ''),
(82, NULL, NULL, 'Ujwalla Gawande', '', 0, '', '', '', '', '', ''),
(83, NULL, NULL, 'Sonali Jadhav', '', 0, '', '', '', '', '', ''),
(84, NULL, NULL, 'Pallavi Mhatre', '', 0, '', '', '', '', '', ''),
(85, NULL, NULL, 'Sunita Patil', '', 0, '', '', '', '', '', ''),
(86, NULL, NULL, 'Mr.Vilas Moon', '', 0, '', '', '', '', '', ''),
(87, NULL, NULL, 'Pankaj Mudholkar', '', 0, '', '', '', '', '', ''),
(88, NULL, NULL, 'Dr. T. R. Sontakke', '', 0, '', '', '', '', '', ''),
(89, NULL, NULL, 'Arjun Chandran', '', 0, '', '', '', '', '', ''),
(90, NULL, NULL, 'Krishna Reddy', '', 0, '', '', '', '', '', ''),
(91, NULL, NULL, 'Prashant Abyhan', '', 0, '', '', '', '', '', ''),
(92, NULL, NULL, 'Swarna Kumary', '', 0, '', '', '', '', '', ''),
(93, NULL, NULL, 'Prasanna Kr Reddy', '', 0, '', '', '', '', '', ''),
(94, NULL, NULL, 'Mohuya Chakraborty', '', 0, '', '', '', '', '', ''),
(95, NULL, NULL, 'Dipti Patra', '', 0, '', '', '', '', '', ''),
(96, NULL, NULL, 'Swarna Kumary K', '', 0, '', '', '', '', '', ''),
(97, NULL, NULL, 'Pravin Soni', '', 0, '', '', '', '', '', ''),
(98, NULL, NULL, 'Rohini Sonawane', '', 0, '', '', '', '', '', ''),
(99, NULL, NULL, 'Valli Madhavi', '', 0, '', '', '', '', '', ''),
(100, NULL, NULL, 'Akshaya Salunke', '', 0, '', '', '', '', '', ''),
(101, NULL, NULL, 'Swapnil Gamare', '', 0, '', '', '', '', '', ''),
(102, NULL, NULL, 'Dhavleesh Rattan', '', 0, '', '', '', '', '', ''),
(103, NULL, NULL, 'Dhirendra Mishra', '', 0, '', '', '', '', '', ''),
(104, NULL, NULL, 'Varsha Wangikar', '', 0, '', '', '', '', '', ''),
(105, NULL, NULL, 'Ravinder Nath', '', 0, '', '', '', '', '', ''),
(106, NULL, NULL, 'Pradeep Naik', '', 0, '', '', '', '', '', ''),
(107, NULL, NULL, 'Prof.Mrs.Shashi Prabha', '', 0, '', '', '', '', '', ''),
(108, NULL, NULL, 'S.A Ladhake', '', 0, '', '', '', '', '', ''),
(109, NULL, NULL, 'G.N. Purohit', '', 0, '', '', '', '', '', ''),
(110, NULL, NULL, 'R D Patane', '', 0, '', '', '', '', '', ''),
(111, NULL, NULL, 'Mr.R.D. Patane', '', 0, '', '', '', '', '', ''),
(112, NULL, NULL, 'Madhumita Chatterjee', '', 0, '', '', '', '', '', ''),
(113, NULL, NULL, 'Prachi Dhannawat', '', 0, '', '', '', '', '', ''),
(114, NULL, NULL, 'Shrihari Joshi', '', 0, '', '', '', '', '', ''),
(115, NULL, NULL, 'Nilkantha Killarikar', '', 0, '', '', '', '', '', ''),
(116, NULL, NULL, 'Dada Ingle', '', 0, '', '', '', '', '', ''),
(117, NULL, NULL, 'Piyush Chavan', '', 0, '', '', '', '', '', ''),
(118, NULL, NULL, 'Dr.Y.Srinivasa Rao', '', 0, '', '', '', '', '', ''),
(119, NULL, NULL, 'Santosh.K Narayankhedkar', '', 0, '', '', '', '', '', ''),
(120, NULL, NULL, 'Rakesh Kumar Jha', '', 0, '', '', '', '', '', ''),
(121, NULL, NULL, 'Sanjay Talbar', '', 0, '', '', '', '', '', ''),
(122, NULL, NULL, 'Prof. Sheetal S. Dhande', '', 0, '', '', '', '', '', ''),
(123, NULL, NULL, 'Bandu Meshram', '', 0, '', '', '', '', '', ''),
(124, NULL, NULL, 'B B Meshram', '', 0, '', '', '', '', '', ''),
(125, NULL, NULL, 'Vaibhav Chunekar', '', 0, '', '', '', '', '', ''),
(126, NULL, NULL, 'Vaishali Jadhav', '', 0, '', '', '', '', '', ''),
(127, NULL, NULL, 'Lochan Jolly', '', 0, '', '', '', '', '', ''),
(128, NULL, NULL, 'Brij Kishore Mishra', '', 0, '', '', '', '', '', ''),
(129, NULL, NULL, 'Chorosree Roychoudhury', '', 0, '', '', '', '', '', ''),
(130, NULL, NULL, 'Dr. A. K. Bhattacharjee', '', 0, '', '', '', '', '', ''),
(131, NULL, NULL, 'Mayuri Tambekar', '', 0, '', '', '', '', '', ''),
(132, NULL, NULL, 'Vibha Menon', '', 0, '', '', '', '', '', ''),
(133, NULL, NULL, 'Papeeya Phukan', '', 0, '', '', '', '', '', ''),
(134, NULL, NULL, 'Vikas Maheshwari', '', 0, '', '', '', '', '', ''),
(135, NULL, NULL, 'Meenakshi Sharma', '', 0, '', '', '', '', '', ''),
(136, NULL, NULL, 'Niranjan Devashrayee', '', 0, '', '', '', '', '', ''),
(137, NULL, NULL, 'Tarun Kanti Bhattacharyya', '', 0, '', '', '', '', '', ''),
(138, NULL, NULL, 'Hiranmoy Saha', '', 0, '', '', '', '', '', ''),
(139, NULL, NULL, 'Biplob Mondal', '', 0, '', '', '', '', '', ''),
(140, NULL, NULL, 'Kalaiarasi N', '', 0, '', '', '', '', '', ''),
(141, NULL, NULL, 'Ajitha Sakthees', '', 0, '', '', '', '', '', ''),
(142, NULL, NULL, 'Saxena Satyendra', '', 0, '', '', '', '', '', ''),
(143, NULL, NULL, 'Sachin Bojewar', '', 0, '', '', '', '', '', ''),
(144, NULL, NULL, 'Abhijit Patankar', '', 0, '', '', '', '', '', ''),
(145, NULL, NULL, 'Mukesh Zaveri', '', 0, '', '', '', '', '', ''),
(146, NULL, NULL, 'M.B. Limkar', '', 0, '', '', '', '', '', ''),
(147, NULL, NULL, 'M. Maniroja', '', 0, '', '', '', '', '', ''),
(148, NULL, NULL, 'Assist.Prof.D.V. Thombre', '', 0, '', '', '', '', '', ''),
(149, NULL, NULL, 'Dhanesh Narvekar', '', 0, '', '', '', '', '', ''),
(150, NULL, NULL, 'Prachi Bedekar', '', 0, '', '', '', '', '', ''),
(151, NULL, NULL, 'Satyajit Chakrabarti', '', 0, '', '', '', '', '', ''),
(152, NULL, NULL, 'Deven Shah', '', 0, '', '', '', '', '', ''),
(153, NULL, NULL, 'Dipika Rokade', '', 0, '', '', '', '', '', ''),
(154, NULL, NULL, 'Alok Bhushan', '', 0, '', '', '', '', '', ''),
(155, NULL, NULL, 'Jayasudha Koti', '', 0, '', '', '', '', '', ''),
(156, NULL, NULL, 'Ankita Barabde', '', 0, '', '', '', '', '', ''),
(157, NULL, NULL, 'Vijay Bhosale', '', 0, '', '', '', '', '', ''),
(158, NULL, NULL, 'Ajinkya Ghadigaonkar', '', 0, '', '', '', '', '', ''),
(159, NULL, NULL, 'Amit Kumar Bhardwaj', '', 0, '', '', '', '', '', ''),
(160, NULL, NULL, 'Vijay Bhosle', '', 0, '', '', '', '', '', ''),
(161, NULL, NULL, 'Sunil Bhooshan', '', 0, '', '', '', '', '', ''),
(162, NULL, NULL, 'Rahul Khokale', '', 0, '', '', '', '', '', ''),
(163, NULL, NULL, 'Mrs.Jyothi Digge', '', 0, '', '', '', '', '', ''),
(164, NULL, NULL, 'K.T Talele', '', 0, '', '', '', '', '', ''),
(165, NULL, NULL, 'Rahul Ambekar', '', 0, '', '', '', '', '', ''),
(166, NULL, NULL, 'Hitesh Kotian', '', 0, '', '', '', '', '', ''),
(167, NULL, NULL, 'S.V Dudal', '', 0, '', '', '', '', '', ''),
(168, NULL, NULL, 'Kirtikumar Dupare', '', 0, '', '', '', '', '', ''),
(169, NULL, NULL, 'Suman Ninoriya', '', 0, '', '', '', '', '', ''),
(170, NULL, NULL, 'Kalawati Patil', '', 0, '', '', '', '', '', ''),
(171, NULL, NULL, 'Ashwini Gajarushi', '', 0, '', '', '', '', '', ''),
(172, NULL, NULL, 'Anupam Nath', '', 0, '', '', '', '', '', ''),
(173, NULL, NULL, 'Sumit Pathak', '', 0, '', '', '', '', '', ''),
(174, NULL, NULL, 'Annu Karir', '', 0, '', '', '', '', '', ''),
(175, NULL, NULL, 'Grandhi Naresh kumar', '', 0, '', '', '', '', '', ''),
(176, NULL, NULL, 'Rathinam A', '', 0, '', '', '', '', '', ''),
(177, NULL, NULL, 'Avichal Kapur', '', 0, '', '', '', '', '', ''),
(178, NULL, NULL, 'Prof.Mrs.Savita Bhosale', '', 0, '', '', '', '', '', ''),
(179, NULL, NULL, 'Abhijeet Mane', '', 0, '', '', '', '', '', ''),
(180, NULL, NULL, 'Ankur Bordoloi', '', 0, '', '', '', '', '', ''),
(181, NULL, NULL, 'Ashis Kumar Mal', '', 0, '', '', '', '', '', ''),
(182, NULL, NULL, 'Hidayatullah Choudhry', '', 0, '', '', '', '', '', ''),
(183, NULL, NULL, 'Renuka Pawar', '', 0, '', '', '', '', '', ''),
(184, NULL, NULL, 'Santosh Kr pandey', '', 0, '', '', '', '', '', ''),
(185, NULL, NULL, 'Alankar Kambli', '', 0, '', '', '', '', '', ''),
(186, NULL, NULL, 'Sangita Chaudhari', '', 0, '', '', '', '', '', ''),
(187, NULL, NULL, 'Vishnupriya Mallela', '', 0, '', '', '', '', '', '');

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
