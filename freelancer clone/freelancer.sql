-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 28, 2015 at 10:28 AM
-- Server version: 5.5.44-MariaDB-1ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freelancer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE IF NOT EXISTS `admin_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(250) NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `email`, `password`) VALUES
(5, 'admin@example.com', 'bab352abb6ea4c7d7fc8019fed33f852c8cc018a7730f6587044a3da04d50b8b');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `value` (`value`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `value`) VALUES
(4, '.net'),
(10, 'a'),
(3, 'ASP'),
(9, 'Don''t'),
(2, 'JAVA'),
(6, 'New Category'),
(1, 'PHP'),
(5, 'test'),
(7, 'testtttttt');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `msg_from` int(11) NOT NULL,
  `msg_to` int(11) NOT NULL,
  `is_unread` enum('0','1') NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `msg_from`, `msg_to`, `is_unread`, `subject`, `message`, `time`) VALUES
(1, 20, 17, '1', 'Test Message 1', 'This is a dummy text for test message', '2015-06-22 03:02:00'),
(2, 20, 18, '0', 'Sent Message 1', 'Test', '2015-06-22 05:00:00'),
(3, 20, 17, '1', 'Test Message 2', 'Test message 2 text', '2015-06-22 07:00:00'),
(4, 17, 20, '1', 'Hi', 'This is reply', '2015-06-22 07:52:54'),
(5, 20, 17, '1', 'Reply', 'Reply Text', '2015-06-22 07:53:56'),
(6, 18, 17, '1', 'Project 17 Update', 'Hi, \r\n\r\nThis is a test message', '2015-06-22 08:00:08'),
(7, 18, 17, '0', 'test', 'test', '2015-06-22 08:01:32'),
(12, 18, 17, '1', 't1', 't1', '2015-06-23 07:51:39'),
(13, 17, 18, '0', 't11', '', '2015-06-25 10:45:59'),
(14, 17, 18, '0', 't11', '', '2015-06-25 10:46:02'),
(15, 17, 18, '0', 't11', '', '2015-06-25 10:46:04'),
(16, 17, 18, '0', 't11', '', '2015-06-25 10:46:05'),
(17, 17, 18, '1', 't11', '', '2015-06-25 10:46:06'),
(18, 17, 18, '0', 't11', '', '2015-06-25 10:46:07'),
(19, 17, 18, '1', 't11', '', '2015-06-25 10:46:08'),
(20, 17, 18, '1', 't11', '', '2015-06-25 10:46:09'),
(21, 17, 18, '1', 't11', '', '2015-06-25 10:46:10'),
(22, 17, 18, '1', 't11', '', '2015-06-25 10:46:11'),
(23, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:52'),
(24, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:54'),
(25, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:55'),
(26, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:56'),
(27, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:56'),
(28, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:57'),
(29, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:58'),
(30, 18, 17, '0', 're: t1', '', '2015-06-25 10:46:59'),
(31, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:00'),
(32, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:00'),
(33, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:01'),
(34, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:02'),
(35, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:02'),
(36, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:03'),
(37, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:04'),
(38, 18, 17, '0', 're: t1', '', '2015-06-25 10:47:05'),
(39, 18, 17, '0', 'asdf', 'asdf', '2015-06-28 19:43:50'),
(40, 18, 17, '0', 'a3', 'a4', '2015-06-28 20:09:58');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE IF NOT EXISTS `project` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `catid` text NOT NULL,
  `userid` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text,
  `budget` text,
  `timeframe` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `catid`, `userid`, `title`, `description`, `budget`, `timeframe`, `date`, `status`) VALUES
(18, '1', 18, 'Test 1', 'Test again', '1-2$', '1hour', '2015-06-23 07:37:00', '0'),
(19, '1', 18, 'Test 1', 'Test again', '1-2$', '1hour', '2015-06-23 07:37:19', '0'),
(20, '4', 18, '.Net Project 1', 'Test project', 'NIL', 'NIL', '2015-06-23 08:09:10', '1'),
(21, '1', 18, 'PHP Project 1', '', '', '', '2015-06-25 09:46:53', '0'),
(22, '1', 18, 'PHP Project 2', '', '', '', '2015-06-25 09:47:04', '0'),
(23, '1', 18, 'PHP Project 3', '', '', '', '2015-06-25 09:47:14', '0'),
(24, '1', 18, 'PHP Project 4', '', '', '', '2015-06-25 09:47:27', '0'),
(25, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:37', '0'),
(26, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:40', '0'),
(27, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:44', '0'),
(28, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:47', '0'),
(29, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:49', '0'),
(30, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:52', '0'),
(31, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:53', '0'),
(32, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:54', '0'),
(33, '1', 18, 'PHP Project', '', '', '', '2015-06-25 09:47:55', '0'),
(34, '1', 18, 'testasdf', 'teasdf', 'a', 'asdf', '2015-06-28 19:32:36', '0'),
(35, '1', 18, 'testasdf', 'teasdf', 'a', 'asdf', '2015-06-28 19:33:16', '0'),
(36, '1', 18, 'testasdf', 'teasdf', 'a', 'asdf', '2015-06-28 19:35:29', '0'),
(37, '1', 18, 'testasdf', 'teasdf', 'a', 'asdf', '2015-06-28 19:35:57', '0'),
(38, '1', 18, 'tasdf', 'asdw34trfvsdag', 'asdf', '245', '2015-06-28 19:50:35', '0'),
(39, '1', 18, 't2456', 'dsfg', 'asdf', 'asd', '2015-06-28 20:49:44', '1'),
(40, '1', 18, 'k14r', 'sadfkjgpoaurtlkfvdg`', 'lksajoi34 g/tn', 'oiu3po5t nv', '2015-06-28 21:06:55', '1');

-- --------------------------------------------------------

--
-- Table structure for table `project_bid`
--

CREATE TABLE IF NOT EXISTS `project_bid` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `projectid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `message` text NOT NULL,
  `timeframe` varchar(200) NOT NULL,
  `date` datetime NOT NULL,
  `amount` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `project_bid`
--

INSERT INTO `project_bid` (`id`, `projectid`, `userid`, `message`, `timeframe`, `date`, `amount`) VALUES
(9, 19, 17, 'asdf', '1 Weeks', '2015-06-23 12:50:31', '1'),
(10, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:19', '1'),
(11, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:22', '1'),
(12, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:23', '1'),
(13, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:24', '1'),
(14, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:25', '1'),
(15, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:25', '1'),
(16, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:26', '1'),
(17, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:27', '1'),
(18, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:28', '1'),
(19, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:29', '1'),
(20, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:30', '1'),
(21, 19, 17, 'test', '1 Weeks', '2015-06-25 11:02:31', '1'),
(22, 33, 17, 'a', 'a', '2015-06-27 16:34:16', 'a'),
(23, 33, 17, 'a', 'a', '2015-06-27 16:35:42', 'a'),
(24, 33, 17, 'a', 'a', '2015-06-27 16:35:44', 'a'),
(25, 33, 17, 'a', 'a', '2015-06-27 16:35:45', 'a'),
(26, 33, 17, 'a', 'a', '2015-06-27 16:35:45', 'a'),
(27, 33, 17, 'a', 'a', '2015-06-27 16:35:46', 'a'),
(28, 33, 17, 'a', 'a', '2015-06-27 16:35:47', 'a'),
(29, 33, 17, 'a', 'a', '2015-06-27 16:35:48', 'a'),
(30, 33, 17, 'a', 'a', '2015-06-27 16:35:48', 'a'),
(31, 33, 17, 'a', 'a', '2015-06-27 16:35:49', 'a'),
(32, 33, 17, 'a', 'a', '2015-06-27 16:35:50', 'a'),
(33, 33, 17, 'a', 'a', '2015-06-27 16:35:50', 'a'),
(34, 33, 17, 'a', 'a', '2015-06-27 16:35:51', 'a'),
(35, 33, 17, 'a', 'a', '2015-06-27 16:35:52', 'a'),
(36, 33, 17, 'a', 'a', '2015-06-27 16:35:53', 'a'),
(37, 33, 17, 'a', 'a', '2015-06-27 16:35:53', 'a'),
(38, 33, 17, 'a', 'a', '2015-06-27 16:35:54', 'a'),
(39, 33, 17, 'a', 'a', '2015-06-27 16:35:55', 'a'),
(40, 39, 17, 'asdf', 'asdf', '2015-06-28 20:50:04', 'asdf');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` text,
  `hash` text,
  `active` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  `full_name` varchar(250) NOT NULL,
  `skills` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(200) NOT NULL,
  `country` varchar(150) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `hash`, `active`, `type`, `full_name`, `skills`, `address`, `city`, `country`, `pincode`) VALUES
(17, 'kunalgautam', 'kunal@ikunal.in', 'e90c39c2cff6eefa186312be05f1e6579734d9520f23d48eefffbb900d35506f', 'e90c39c2cff6eefa186312be05f1e6579734d9520f23d48eefffbb900d35506f', 1, 1, 'Kunal Gautam', 'a:1:{i:0;s:3:"PHP";}', 'No Address', 'Pune', 'India', '411014'),
(18, 'kunalgautama', 'kunal@ikunal.ina', 'e90c39c2cff6eefa186312be05f1e6579734d9520f23d48eefffbb900d35506f', 'e90c39c2cff6eefa186312be05f1e6579734d9520f23d48eefffbb900d35506f', 1, 2, 'Kunal Gautam', '', 'test', 'nil', 'nil', '123'),
(19, 'test', 'test@example.com', 'd5b41299c7edaddb405420983468df143e6fcb96369bffc993ee217872eb8293', 'd5b41299c7edaddb405420983468df143e6fcb96369bffc993ee217872eb8293', 1, 1, 'Test User', 'a:4:{i:0;s:4:".net";i:1;s:3:"ASP";i:2;s:4:"JAVA";i:3;s:3:"PHP";}', '', '', '', ''),
(20, 'Epl', 'employer@example.com', 'd5b41299c7edaddb405420983468df143e6fcb96369bffc993ee217872eb8293', 'd5b41299c7edaddb405420983468df143e6fcb96369bffc993ee217872eb8293', 1, 2, '', '', '', '', '', ''),
(23, 'tt', 't@t.i', 'e90c39c2cff6eefa186312be05f1e6579734d9520f23d48eefffbb900d35506f', '612124cbb891601a3ab39d73ff53d3a57613d43314211d3f2a20ee23fc8bad19', 1, 1, '', '', '', '', '', ''),
(26, 'a', 'a@ikunal.in', 'd239bf45e549b4d8e7f4f0937825d981bc6db333239f221f70e9b351803cd356', '729686981ba1cfee970a4035845a7314', 1, 1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `website_config`
--

CREATE TABLE IF NOT EXISTS `website_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `config` varchar(200) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `config` (`config`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Dumping data for table `website_config`
--

INSERT INTO `website_config` (`id`, `config`, `value`) VALUES
(1, 'title', 'Freelancer Website Clone''d'),
(2, 'url', 'http://localhost/free'),
(3, 'nologin_login_email', 'Enter Email or Username'),
(9, 'nologin_login_password', 'Enter Password'),
(10, 'nologin_login_forgotpass_text', 'Forgot Password'),
(11, 'nologin_login_button_text', 'Log In'),
(12, 'register_email', 'Please Enter Your Email Address'),
(13, 'register_username', 'Please Enter a Unique Username'),
(14, 'register_password', 'Enter a Password'),
(15, 'register_role', 'Register as'),
(16, 'register_button_text', 'Sign Up'),
(17, 'pass_reset_enter', 'Enter new Password'),
(18, 'pass_reset_confirm', 'Confirm your new password'),
(19, 'pass_reset_button', 'Reset Password'),
(20, 'forgot_pass', 'Enter Username or Email'),
(21, 'forgot_pass_button', 'Reset Password'),
(22, 'profile_fullname', 'Full Name'),
(23, 'profile_address', 'Address'),
(24, 'profile_city', 'City'),
(25, 'profile_zip', 'Zip or Pincode'),
(26, 'profile_country', 'Country'),
(27, 'profile_skill', 'Skill Sets'),
(28, 'profile_change_pass_button', 'Change Password'),
(29, 'profile_save_profile_button', 'Update Profile'),
(30, 'change_pass_old', 'Enter your old password'),
(31, 'change_pass_new', 'Enter New Password'),
(32, 'change_pass_new_confirm', 'Confirm your new password'),
(33, 'change_pass_button', 'Update Password'),
(34, 'bid_amount', 'Enter a Bidding Amount (Eg. $100)'),
(35, 'bid_timeframe', 'Enter a timeframe (Eg. 1Week)'),
(36, 'bid_message', 'Enter message'),
(37, 'bid_button', 'Bid Now!!'),
(38, 'compose_subject', 'Subject'),
(39, 'compose_message', 'Enter message to send.................................'),
(40, 'compose_button', 'Send Message'),
(41, 'emp_post_title', 'Enter Project Title'),
(43, 'emp_post_desc', 'Enter Project Details'),
(44, 'emp_post_budget', 'Project Budget'),
(45, 'emp_post_time', 'Timeframe for Project'),
(46, 'emp_post_category', 'Select Project Category'),
(47, 'emp_post_button', 'Post Project'),
(48, 'a', 'a'),
(53, 'aa', 'aa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
