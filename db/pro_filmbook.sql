-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2017 at 04:58 AM
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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
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
-- Table structure for table `crew`
--

DROP TABLE IF EXISTS `crew`;
CREATE TABLE IF NOT EXISTS `crew` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `images` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

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
(20, 'Anjali', 'directors', './images/crew/directors/589461a45cac86.47939917.png'),
(35, 'Maryam Dalton', 'actor', './images/crew/actor/58a42aa0768e89.91882782.jpg'),
(36, 'Ursula Baker', 'producers', './images/crew/producers/58a42ac409a178.73537102.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
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
(1, 'Dahlia Casey', '2,4,5,6,7', '4,5,7,8,10,12,13,14,15', '20', '17', './images/films/58a409a45cace4.32147897.png', '05-04-1970'),
(2, 'Whoopi Elliott', '3,4,6,7', '4,7,9,14', '18', '36', './images/films/58a42cb565f453.64946021.jpg', '23-02-1987');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

DROP TABLE IF EXISTS `languages`;
CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

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
  `gold` text NOT NULL,
  `silver` text NOT NULL,
  `bronze` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `show_times`
--

DROP TABLE IF EXISTS `show_times`;
CREATE TABLE IF NOT EXISTS `show_times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theater_id` int(11) NOT NULL,
  `screen_no` int(11) NOT NULL,
  `show_times` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `theaters`
--

INSERT INTO `theaters` (`id`, `name`, `email`, `password`, `contact`, `address`, `location`, `city`, `state`, `country`, `latitude`, `longitude`, `proof`, `buildingimage`, `no_of_screens`, `status`) VALUES
(14, 'Gillian Gill', 'a@f.c', NULL, '720', 'Aperiam libero veritatis odio et in exercitationem autem possimus quibusdam sed rem dolor exercitation aut eum molestias nihil rem , Pariatur Ut cumque unde rerum nostrud enim aut sunt sed quia rerum', 'Assam, India', 'Assam', 'Assam', ' India', '26.2006043', '92.93757389999996', './images/theaters/proofs/58a42cd2094ce8.33792978.jpg', './images/theaters/theaterimage/58a42cd2098a59.39132170.jpg', 6, 'blocked'),
(10, 'Buffy Duncan', 'neduzy@gmail.com', '3f81f5', '651', 'Occaecat dolore do qui eum voluptatibus voluptatem , Ipsum architecto et ut aliquip', 'Andhra Pradesh, India', 'Andhra Pradesh', 'Andhra Pradesh', ' India', '15.9128998', '79.73998749999998', './images/theaters/proofs/589c69cfccad20.69051352.png', './images/theaters/theaterimage/589c69cfccdc22.94229998.png', 6, 'pending'),
(11, 'Zia Young', 'wekyvuh@hotmail.com', '6b8732', '800', 'Impedit qui enim tenetur ea odit duis eum maxime expedita molestiae voluptate mollit consequat Hic incididunt reprehenderit in porro , Ut dolor occaecat ut ex omnis cupiditate et veniam similique commodo eligendi qui itaque amet mollitia facilis doloremque', 'Andheri East, Mumbai, Maharashtra, India', ' Mumbai', ' Maharashtra', ' India', '19.1154908', '72.87269519999995', './images/theaters/proofs/589c6afdb8ee24.04449605.png', './images/theaters/theaterimage/589c6afdb91800.55307028.jpg', 1, 'blocked'),
(15, 'Brent Santana', 'diravub@yahoo.com', '', '704', 'Qui quo dolorum illo unde dolorem veniam dicta irure deserunt eius pariatur Rem , Ex exercitationem ipsum delectus est id qui culpa commodo qui qui iusto fugiat aut', 'Dombivli, Maharashtra, India', 'Dombivli', ' Maharashtra', ' India', '19.2094006', '73.09394829999997', './images/theaters/proofs/58a5a9a906df91.27505229.png', './images/theaters/theaterimage/58a5a9a9070228.89012451.png', 6, 'approved'),
(16, 'Ulysses Blevins', 'kuriwaruq@yahoo.com', 'kuriwaruq@yahoo.com', '968', 'Autem do autem ea quaerat voluptas quia porro , A esse amet at velit culpa illo qui commodi nostrum est inventore consequuntur quis facilis sit quo sit dignissimos', 'Assam, India', 'Assam', 'Assam', ' India', '26.2006043', '92.93757389999996', './images/theaters/proofs/58a5aa1715d617.50473936.jpg', './images/theaters/theaterimage/58a5aa1715f8d1.29035300.png', 2, 'approved'),
(17, 'Samson Curtis', 'xosipexeg@hotmail.com', 'xosipexeg@hotmail.com', '336', 'Nam iure ea ut at , Iure voluptatem eos necessitatibus tempore ex sit', 'Andheri East, Mumbai, Maharashtra, India', ' Mumbai', ' Maharashtra', ' India', '19.1154908', '72.87269519999995', './images/theaters/proofs/58a5aabd206a86.38841614.jpg', './images/theaters/theaterimage/58a5aabd208d33.54662009.jpg', 1, '2794b4');

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
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `email`, `password`, `profileimage`, `status`) VALUES
(2, 'Courtney Dotson', '+448-70-5432623', 'jeybin@gmail.com', '123456', NULL, 'verified'),
(3, 'Fleur Watson', '+856-71-5785947', 'muwaru@gmail.com', 'Pa$$w0rd!', NULL, 'f7fd9c');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
