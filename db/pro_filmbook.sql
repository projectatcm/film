-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2017 at 10:16 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pro_filmbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE IF NOT EXISTS `bookings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `show_id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `date` text NOT NULL,
  `seats` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(2, 'action');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `type` text NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cot`
--

DROP TABLE IF EXISTS `cot`;
CREATE TABLE IF NOT EXISTS `cot` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cotseats`
--

DROP TABLE IF EXISTS `cotseats`;
CREATE TABLE IF NOT EXISTS `cotseats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theaterid` int(11) NOT NULL,
  `screenid` int(11) NOT NULL,
  `seats` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `crew`
--

DROP TABLE IF EXISTS `crew`;
CREATE TABLE IF NOT EXISTS `crew` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `crew`
--

INSERT INTO `crew` (`id`, `name`, `type`, `images`) VALUES
(2, 'Jayaram', 'actor', './images/crew/actor/58945940aaba83.80139715.png'),
(4, 'Vijay', 'actor', './images/crew/actor/589459cf451942.17459763.png'),
(5, 'Nayanthara', 'actress', './images/crew/actress/58945b6a436087.06850851.png'),
(7, 'Anushka', 'actress', './images/crew/actress/58945ba7d82538.17587688.png'),
(8, 'Thamanna', 'actress', './images/crew/actress/58945bb8f3c9b4.06165618.png'),
(9, 'Surya', 'actor', './images/crew/actor/58945bc8329dc7.46908319.png'),
(10, 'Ajith', 'actor', './images/crew/actor/58945bd6464f93.66941718.png'),
(12, 'Mohanlal', 'actor', './images/crew/actor/58945c70544829.63376787.png'),
(13, 'Mammooty ', 'actor', './images/crew/actor/58945c8441aa31.58549395.png'),
(14, 'Johnny Depp', 'actor', './images/crew/actor/58945d37ef7f85.54745478.png'),
(15, 'Leonardo Dicaprio', 'actor', './images/crew/actor/58945daec0d4b3.09562702.png'),
(16, 'Lal jose', 'directors', './images/crew/directors/58945ff9cf5aa5.72158966.png'),
(17, 'Antony perumbavoor', 'producers', './images/crew/producers/5894604bb0cdb2.19032505.png'),
(18, 'Ash iq abu', 'directors', './images/crew/directors/5894609257a207.10108692.png'),
(20, 'Anjali', 'directors', './images/crew/directors/589461a45cac86.47939917.png');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `language` text NOT NULL,
  `cast` text NOT NULL,
  `director` text NOT NULL,
  `producer` text NOT NULL,
  `poster` text NOT NULL,
  `releasedate` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `name`, `language`, `cast`, `director`, `producer`, `poster`, `releasedate`) VALUES
(1, 'theri', '5,7', '4,5,7,9,12,13,14,15', '18', '17', './images/films/58db4b494db4f9.33648945.jpg', '22-04-2017'),
(2, 'oru mexican aparatha', '2', '37', '16', '17', './images/films/58db4d09461537.12848404.jpg', '29-03-2017');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `language`) VALUES
(2, 'Malayalam'),
(3, 'Tamil'),
(4, 'Telugu'),
(5, 'Tulu'),
(6, 'English'),
(7, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login_date_time` text NOT NULL,
  `lst_login_ip` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `posters`
--

DROP TABLE IF EXISTS `posters`;
CREATE TABLE IF NOT EXISTS `posters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `seats`
--

DROP TABLE IF EXISTS `seats`;
CREATE TABLE IF NOT EXISTS `seats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theaterid` int(11) NOT NULL,
  `screenno` int(11) NOT NULL,
  `rows` int(11) NOT NULL,
  `cols` int(11) NOT NULL,
  `seats` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seats`
--

INSERT INTO `seats` (`id`, `theaterid`, `screenno`, `rows`, `cols`, `seats`) VALUES
(2, 22, 1, 2, 2, '20,20,10,10'),
(3, 23, 1, 5, 2, '35,73,70,32,94,13,32,20,16,20');

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

DROP TABLE IF EXISTS `show_times`;
CREATE TABLE IF NOT EXISTS `show_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theater_id` int(11) NOT NULL,
  `screen_no` int(11) NOT NULL,
  `firstshowtime` varchar(255) DEFAULT 'no show',
  `noonshowtime` varchar(255) DEFAULT 'no show',
  `matineeshowtime` varchar(255) DEFAULT 'no show',
  `secondshowtime` varchar(255) NOT NULL DEFAULT 'no show',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `show_times`
--

INSERT INTO `show_times` (`id`, `theater_id`, `screen_no`, `firstshowtime`, `noonshowtime`, `matineeshowtime`, `secondshowtime`) VALUES
(1, 22, 1, '4:22 AM', '2:11 pm', '9:52 PM', '8:31 PM'),
(2, 22, 2, '1:2 AM', '1:1 am', 'no show', '1:1 PM'),
(4, 23, 1, '10:16 AM', 'no show', '4:55 PM', '8:14 PM');

-- --------------------------------------------------------

--
-- Table structure for table `theaterfilms`
--

DROP TABLE IF EXISTS `theaterfilms`;
CREATE TABLE IF NOT EXISTS `theaterfilms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theaterid` int(11) NOT NULL,
  `screenid` int(11) NOT NULL,
  `showtime` text NOT NULL,
  `filmid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theaterfilms`
--

INSERT INTO `theaterfilms` (`id`, `theaterid`, `screenid`, `showtime`, `filmid`) VALUES
(4, 22, 1, 'noonshow', 2),
(5, 22, 1, 'firstshow', 2),
(9, 22, 1, 'matineeshow', 2),
(8, 22, 1, 'secondshow', 2),
(10, 23, 1, 'firstshow', 2);

-- --------------------------------------------------------

--
-- Table structure for table `theaters`
--

DROP TABLE IF EXISTS `theaters`;
CREATE TABLE IF NOT EXISTS `theaters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` text NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contact` text NOT NULL,
  `address` text NOT NULL,
  `location` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `latitude` text NOT NULL,
  `longitude` text NOT NULL,
  `proof` text NOT NULL,
  `buildingimage` text NOT NULL,
  `no_of_screens` int(11) NOT NULL,
  `status` text NOT NULL,
  `mailverification` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`id`, `name`, `email`, `password`, `contact`, `address`, `location`, `city`, `state`, `country`, `latitude`, `longitude`, `proof`, `buildingimage`, `no_of_screens`, `status`, `mailverification`) VALUES
(23, 'ashoka', 'ashokatheater@gmail.com', '555', '0480 280 2543', ' National Highway 17, Kodungallur, Kerala 680664 ,  National Highway 17, Kodungallur, Kerala 680664', 'Kodungallur, Kerala, India', 'Kodungallur', ' Kerala', ' India', '10.2244299', '76.19777369999997', './images/theaters/proofs/58db49a321cad5.60904026.png', './images/theaters/theaterimage/58db49a321f373.80917996.png', 1, 'approved', 'verified'),
(24, 'ashoka', 'ashokatheater123@gmail.com', '6a6be7', '0480 280 2543', ' National Highway 17, Kodungallur, Kerala 680664 ,  National Highway 17, Kodungallur, Kerala 680664', 'Kodungallur, Kerala, India', 'Kodungallur', ' Kerala', ' India', '10.2244299', '76.19777369999997', './images/theaters/proofs/58db49c62285c2.60632733.png', './images/theaters/theaterimage/58db49c622abd7.32564246.png', 1, 'approved', 'not verified'),
(25, 'D Cinemaas', 'dcinems@gmail.com', '98eb21', '0480 320 1111', 'South Junction, Chalakudy, Kerala 680307 , South Junction, Chalakudy, Kerala 680307', 'South Junction, Chalakudy, Kerala 680307, India', ' Chalakudy', ' Kerala 680307', ' India', '10.3006127', '76.33748289999994', './images/theaters/proofs/58db4aa8424454.40402513.jpg', './images/theaters/theaterimage/58db4aa8426a67.19736568.jpg', 4, 'approved', 'not verified');

-- --------------------------------------------------------

--
-- Table structure for table `theaterseats`
--

DROP TABLE IF EXISTS `theaterseats`;
CREATE TABLE IF NOT EXISTS `theaterseats` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theaterid` int(11) NOT NULL,
  `seats` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `email` text,
  `password` text NOT NULL,
  `profileimage` text,
  `status` text NOT NULL,
  `mailverification` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `profileimage`, `status`, `mailverification`) VALUES
(2, 'Courtney Dotson', '+448-70-5432623', 'jeybin@gmail.com', '000', NULL, 'approved', 'verified'),
(3, 'Fleur Watson', '+856-71-5785947', 'muwaru@gmail.com', 'Pa$$w0rd!', NULL, 'f7fd9c', ''),
(4, 'Demetria Howell', '+279-27-6604734', 'kotalup@hotmail.com', '2603ae', NULL, 'pending', 'not verified'),
(5, 'Upton Kemp', '+455-69-2251816', 'qyxapa@gmail.com', 'fe348f', NULL, 'pending', 'not verified'),
(6, 'Axel Kelley', '+398-40-7983035', 'lyfihafy@yahoo.com', 'fd0609', NULL, 'pending', 'not verified'),
(7, 'Karly Dennis', '+844-97-7780720', 'hytuke@hotmail.com', '6ffde6', NULL, 'pending', 'not verified');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
