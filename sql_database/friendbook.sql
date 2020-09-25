-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 24, 2020 at 06:47 PM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `friendbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(70) COLLATE utf8mb4_bin NOT NULL,
  `admin_email` varchar(70) COLLATE utf8mb4_bin NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `admin_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `admin_password`, `admin_timestamp`) VALUES
(1, 'Asmit Sirohi', 'asmitsirohi9761@gmail.com', ' 891e783d0c1216a5b8de099bcc8cac59', '2020-08-25 00:12:17');

-- --------------------------------------------------------

--
-- Table structure for table `admin_entry`
--

DROP TABLE IF EXISTS `admin_entry`;
CREATE TABLE IF NOT EXISTS `admin_entry` (
  `entry_id` int(11) NOT NULL AUTO_INCREMENT,
  `entry_password` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `entery_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`entry_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `admin_entry`
--

INSERT INTO `admin_entry` (`entry_id`, `entry_password`, `entery_timestamp`) VALUES
(1, 'efe2fead03141199b08231cd722abae1', '2020-08-22 18:39:52');

-- --------------------------------------------------------

--
-- Table structure for table `chatbox`
--

DROP TABLE IF EXISTS `chatbox`;
CREATE TABLE IF NOT EXISTS `chatbox` (
  `chat_id` int(111) NOT NULL AUTO_INCREMENT,
  `chat_from` int(111) NOT NULL,
  `chat_to` int(111) NOT NULL,
  `chat_message` text COLLATE utf8mb4_bin NOT NULL,
  `chat_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`chat_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(111) NOT NULL AUTO_INCREMENT,
  `comment_description` text COLLATE utf8mb4_bin NOT NULL,
  `comment_post_id` int(111) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `friendrequests`
--

DROP TABLE IF EXISTS `friendrequests`;
CREATE TABLE IF NOT EXISTS `friendrequests` (
  `friendRequest_id` int(11) NOT NULL AUTO_INCREMENT,
  `friendRequest_from` int(11) NOT NULL,
  `friendRequest_to` int(11) NOT NULL,
  `friendRequest_sent` int(11) NOT NULL,
  `friendRequest_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`friendRequest_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

DROP TABLE IF EXISTS `friends`;
CREATE TABLE IF NOT EXISTS `friends` (
  `friend_id` int(11) NOT NULL AUTO_INCREMENT,
  `friend_from` int(111) NOT NULL,
  `friend_to` int(111) NOT NULL,
  `friend_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`friend_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `onlinestatus`
--

DROP TABLE IF EXISTS `onlinestatus`;
CREATE TABLE IF NOT EXISTS `onlinestatus` (
  `online_id` int(111) NOT NULL AUTO_INCREMENT,
  `online_user_id` int(111) NOT NULL,
  `online_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`online_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `onlinestatus`
--

INSERT INTO `onlinestatus` (`online_id`, `online_user_id`, `online_timestamp`) VALUES
(1, 1, '2020-08-25 00:14:51');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(111) NOT NULL AUTO_INCREMENT,
  `post_text` text COLLATE utf8mb4_bin NOT NULL,
  `post_photo` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `post_user_id` int(11) NOT NULL,
  `post_like_id` int(111) NOT NULL,
  `post_timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`post_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `gender` varchar(15) COLLATE utf8mb4_bin NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `email`, `pass`, `gender`, `profile_pic`, `created`) VALUES
(1, 'Friend', 'Book', 'FriendBook', 'friendbookhelp@gmail.com', 'efe2fead03141199b08231cd722abae1', 'male', 'assests/1.jpg', '2020-08-25 00:14:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users` ADD FULLTEXT KEY `fname` (`fname`,`lname`,`username`,`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
