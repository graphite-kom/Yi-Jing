-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2010 at 11:38 AM
-- Server version: 5.1.47
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `deepblu9_yijingDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE IF NOT EXISTS `branches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branche` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=13 ;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branche`) VALUES
(1, 'Xu'),
(2, 'Hai'),
(3, 'Zi'),
(4, 'Chou'),
(5, 'Yin'),
(6, 'Mao'),
(7, 'Chen'),
(8, 'Si'),
(9, 'Wu'),
(10, 'Wei'),
(11, 'Shen'),
(12, 'You');

-- --------------------------------------------------------

--
-- Table structure for table `child`
--

CREATE TABLE IF NOT EXISTS `child` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `childField` varchar(45) NOT NULL,
  PRIMARY KEY (`id`,`parent_id`),
  KEY `fk_child_parent1` (`parent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `child`
--


-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionsComment_id` int(11) NOT NULL,
  `commentText` text COLLATE latin1_general_ci NOT NULL,
  `commentDate` datetime NOT NULL,
  PRIMARY KEY (`id`,`questionsComment_id`),
  KEY `fk_comments_questions1` (`questionsComment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `comments`
--


-- --------------------------------------------------------

--
-- Table structure for table `hexagrams`
--

CREATE TABLE IF NOT EXISTS `hexagrams` (
  `id` int(11) NOT NULL,
  `questions_id` int(11) NOT NULL,
  `isMutationOf` int(11) NOT NULL,
  `element` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`questions_id`),
  KEY `fk_hexagrams_questions1` (`questions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hexagrams`
--


-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(125) COLLATE latin1_general_ci NOT NULL,
  `linkurl` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `target` varchar(50) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `menu`, `linkurl`, `target`) VALUES
(1, 'Home', 'http://www.youtube.com/', '_blank'),
(2, 'Articles', 'http://www.google.com', '_blank'),
(3, 'Stuff', 'http://www.youtube.com/', '_blank'),
(4, 'Mo'' Stuff', 'http://www.google.com', '_blank');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentField` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `parent`
--


-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionField` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `efficaceUtilitaire` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `date` datetime NOT NULL,
  `jour` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `Mois` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `annee` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `questions`
--


-- --------------------------------------------------------

--
-- Table structure for table `reference-hexagram-table`
--

CREATE TABLE IF NOT EXISTS `reference-hexagram-table` (
  `id-ref-hex` int(11) NOT NULL AUTO_INCREMENT,
  `ref-hex-number` tinyint(4) NOT NULL,
  `ref-hex-array` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ref-hex-branches` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `ref-hex-self` tinyint(4) NOT NULL,
  `ref-hex-element` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id-ref-hex`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `reference-hexagram-table`
--


-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE IF NOT EXISTS `relationship` (
  `id` int(11) NOT NULL,
  `traits_id` int(11) NOT NULL,
  `traits_hexagrams_id` int(11) NOT NULL,
  `traits_hexagrams_questions_id` int(11) NOT NULL,
  `type` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `first` int(11) NOT NULL,
  `second` int(11) NOT NULL,
  PRIMARY KEY (`id`,`traits_id`,`traits_hexagrams_id`,`traits_hexagrams_questions_id`),
  KEY `fk_relationship_traits1` (`traits_id`,`traits_hexagrams_id`,`traits_hexagrams_questions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `relationship`
--


-- --------------------------------------------------------

--
-- Table structure for table `traits`
--

CREATE TABLE IF NOT EXISTS `traits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hexagrams_id` int(11) NOT NULL,
  `hexagrams_questions_id` int(11) NOT NULL,
  `traitNumber` tinyint(4) NOT NULL,
  `traitValue` tinyint(4) NOT NULL,
  `isSelf` tinyint(4) NOT NULL,
  `isOther` tinyint(4) NOT NULL,
  `animal` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `branche` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `element` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `parente` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `isEffUtil` tinyint(4) NOT NULL,
  `trouNoirJour` tinyint(4) NOT NULL,
  `trouNoirMois` tinyint(4) NOT NULL,
  `trouNoirAnnee` tinyint(4) NOT NULL,
  `isMaus` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`,`hexagrams_id`,`hexagrams_questions_id`),
  KEY `fk_traits_hexagrams1` (`hexagrams_id`,`hexagrams_questions_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `traits`
--


-- --------------------------------------------------------

--
-- Table structure for table `troncs`
--

CREATE TABLE IF NOT EXISTS `troncs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tronc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=11 ;

--
-- Dumping data for table `troncs`
--

INSERT INTO `troncs` (`id`, `tronc`) VALUES
(1, 'JIA'),
(2, 'Yi'),
(3, 'Bing'),
(4, 'Ding'),
(5, 'Whu'),
(6, 'Ji'),
(7, 'Geng'),
(8, 'Xin'),
(9, 'Ren'),
(10, 'Gui');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `child`
--
ALTER TABLE `child`
  ADD CONSTRAINT `fk_child_parent1` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_comments_questions1` FOREIGN KEY (`questionsComment_id`) REFERENCES `questions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `traits`
--
ALTER TABLE `traits`
  ADD CONSTRAINT `fk_traits_hexagrams1` FOREIGN KEY (`hexagrams_id`, `hexagrams_questions_id`) REFERENCES `hexagrams` (`id`, `questions_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
