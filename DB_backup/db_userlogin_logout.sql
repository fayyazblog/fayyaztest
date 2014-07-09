-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 19, 2014 at 12:12 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_userlogin_logout`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `country_id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `country_id`, `name`) VALUES
(4, 1, 'Lahore'),
(5, 1, 'karachi'),
(6, 1, 'bahawalpur'),
(7, 1, 'Islamabad'),
(8, 2, 'indiaCity1'),
(9, 2, 'indiaCity2'),
(10, 8, 'SrilankaCity1'),
(11, 8, 'SrilankaCity2'),
(12, 13, 'UAE1');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(256) NOT NULL,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `label`, `name`) VALUES
(1, '', 'Pakistan'),
(2, '', 'India'),
(8, '', 'Srilanka'),
(13, '', 'United Arab Emirates');

-- --------------------------------------------------------

--
-- Table structure for table `profession`
--

CREATE TABLE IF NOT EXISTS `profession` (
  `profession_id` int(11) NOT NULL AUTO_INCREMENT,
  `profession_name` varchar(256) NOT NULL,
  PRIMARY KEY (`profession_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `profession`
--


-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(128) DEFAULT NULL,
  `country_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `wish_id` int(11) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `role` varchar(64) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `country_id`, `city_id`, `photo`, `wish_id`, `password`, `email`, `role`, `created`, `modified`, `status`) VALUES
(1, 'zaibfridi', 1, 4, '', 3, '39911a83514ac70c73e863fffa82e3bfa3f84784', 'zaibfridi@gmail.com', 'king', '2014-06-03 13:25:23', '2014-06-03 13:26:58', 1),
(2, 'zaibfridi2', 1, 7, '', 1, 'bc557aaf5336462abb404f4e70a073f94db40e21', 'zaibfridi2@gmail.com', 'king', '2014-06-03 13:26:27', '2014-06-05 11:30:15', 1),
(3, 'zaibfridi3', 1, 6, '', 3, 'bc557aaf5336462abb404f4e70a073f94db40e21', 'zaibfridi3@gmail.com', 'king', '2014-06-03 14:28:40', '2014-06-03 14:28:40', 1),
(4, 'zaibfridi5', 2, 8, '', 1, '39911a83514ac70c73e863fffa82e3bfa3f84784', 'zaibfridi5@gmail.com', 'king', '2014-06-04 06:28:09', '2014-06-05 12:33:18', 1),
(5, 'zaibfridi6', 2, 9, '', 5, 'bc557aaf5336462abb404f4e70a073f94db40e21', 'zaibfridi6@gmail.com', 'king', '2014-06-05 09:09:23', '2014-06-05 09:09:23', 1),
(6, 'zaibfridi8', 8, 11, '', 5, 'bc557aaf5336462abb404f4e70a073f94db40e21', 'zaibfridi8@gmail.com', 'king', '2014-06-05 12:24:30', '2014-06-05 12:24:30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `wishes`
--

CREATE TABLE IF NOT EXISTS `wishes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wish` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `wishes`
--

INSERT INTO `wishes` (`id`, `wish`) VALUES
(1, 'wish1'),
(3, 'wish2'),
(4, 'wish3'),
(5, 'wish4');
