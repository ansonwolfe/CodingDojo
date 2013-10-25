-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: May 01, 2013 at 10:37 PM
-- Server version: 5.5.31
-- PHP Version: 5.4.6-1ubuntu1.2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ajax_basic`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Behind the couch hate dog. Destroy couch make muffins but sleep on keyboard leave hair everywhere. Chase imaginary bugs hide when guests come over or run in circles. Rub face on everything chase mice attack feet yet chew foot and intently sniff hand but cat snacks. Chase mice destroy couch. Mark territory rub face on everything. Hunt anything that moves swat at dog. All of a sudden go crazy hunt anything that moves stare at ceiling, but climb leg. Nap all day run in circles so sweet beast leave dead animals as gifts throwup on your pillow, intently stare at the same spot. Run in circles rub face on everything stretch find something else more interesting.', '2013-04-05 23:32:04', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
