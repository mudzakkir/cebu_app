-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2014 at 08:56 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cebu_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `post_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `body`, `user_id`, `post_id`) VALUES
(1, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'sdadsad', 0, 0),
(2, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'sdadsad', 0, 0),
(3, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'dsadasdsda', 0, 0),
(4, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'asdsdasdasdasdsd', 0, 0),
(5, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'dasdsdadasda', 0, 0),
(6, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'sdadadad', 0, 0),
(7, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'asdsadasddasdsad', 0, 0),
(8, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'dasdsddasdsa', 0, 0),
(9, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'sdsadaddsad', 0, 0),
(10, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'sdsadaddsad', 0, 0),
(11, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'dsadasdasdasd', 0, 0),
(12, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'dsadasdasdasd', 0, 0),
(13, 'acnesbestselfie', 'mudzakkirtoha@gmail.com', 'asdasdasdasdasdas', 0, 0),
(14, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'sdasdsadasdasdasdasdsadsa', 0, 0),
(15, 'acnesbestselfie', 'chameleon.rising@gmail.com', 'asdasdadasdsa', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_11_07_064217_create_contacts_table', 1),
('2014_11_07_064217_create_posts_table', 1),
('2014_11_07_064217_create_users_table', 1),
('2014_11_07_070755_create_contacts_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `readmore` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `category` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `rating` decimal(5,2) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `readmore`, `content`, `image`, `price`, `category`, `area`, `rating`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'First', 'readmore text ', 'content text', 'xxx', 2222, 'first', 'Solo', '5.00', 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
