-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2010 at 08:10 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prototypes`
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
-- Table structure for table `cake_sessions`
--

CREATE TABLE IF NOT EXISTS `cake_sessions` (
  `id` varchar(255) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `data` text COLLATE latin1_general_ci,
  `expires` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `cake_sessions`
--


-- --------------------------------------------------------

--
-- Table structure for table `hexagrams`
--

CREATE TABLE IF NOT EXISTS `hexagrams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `element` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `anneeTronc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `anneeBranche` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `moisTronc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `moisBranche` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `jourTronc` varchar(45) COLLATE latin1_general_ci NOT NULL,
  `jourBranche` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_hexagrams_questions1` (`question_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hexagrams`
--

INSERT INTO `hexagrams` (`id`, `question_id`, `element`, `created`, `anneeTronc`, `anneeBranche`, `moisTronc`, `moisBranche`, `jourTronc`, `jourBranche`) VALUES
(6, 2, 'Metal', '2010-12-04 19:17:49', 'Ding', 'Chou', 'Bing', 'Zi', 'Ding', 'Chou');

-- --------------------------------------------------------

--
-- Table structure for table `loops`
--

CREATE TABLE IF NOT EXISTS `loops` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `element` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `loops`
--


-- --------------------------------------------------------

--
-- Table structure for table `menucats`
--

CREATE TABLE IF NOT EXISTS `menucats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menucatField` varchar(150) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `menucats`
--

INSERT INTO `menucats` (`id`, `menucatField`) VALUES
(1, 'Questions'),
(2, 'Hexagrams');

-- --------------------------------------------------------

--
-- Table structure for table `menulinks`
--

CREATE TABLE IF NOT EXISTS `menulinks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menucat_id` int(11) NOT NULL,
  `title` varchar(150) COLLATE latin1_general_ci NOT NULL,
  `url` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `controller` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `action` varchar(150) COLLATE latin1_general_ci DEFAULT NULL,
  `idparam` int(11) DEFAULT NULL,
  `optionsarray` varchar(500) COLLATE latin1_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_menulinks_menucats1` (`menucat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `menulinks`
--

INSERT INTO `menulinks` (`id`, `menucat_id`, `title`, `url`, `controller`, `action`, `idparam`, `optionsarray`) VALUES
(1, 1, 'List Questions', '', 'Questions', 'index', NULL, ''),
(2, 2, 'List Hexagrams', '', 'Hexagrams', 'index', NULL, ''),
(3, 1, 'New Questions', '', 'Questions', 'add', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questionField` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `efficaceUtilitaire` varchar(45) COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `questionField`, `efficaceUtilitaire`) VALUES
(1, 'Is that a question ?', 'something'),
(2, 'Is that really a question ?', 'fire');

-- --------------------------------------------------------

--
-- Table structure for table `traits`
--

CREATE TABLE IF NOT EXISTS `traits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hexagram_id` int(11) NOT NULL,
  `traitValue` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_traits_hexagrams` (`hexagram_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci AUTO_INCREMENT=2 ;

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
-- Constraints for table `hexagrams`
--
ALTER TABLE `hexagrams`
  ADD CONSTRAINT `fk_hexagrams_questions1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `menulinks`
--
ALTER TABLE `menulinks`
  ADD CONSTRAINT `fk_menulinks_menucats1` FOREIGN KEY (`menucat_id`) REFERENCES `menucats` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `traits`
--
ALTER TABLE `traits`
  ADD CONSTRAINT `fk_traits_hexagrams` FOREIGN KEY (`hexagram_id`) REFERENCES `hexagrams` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
