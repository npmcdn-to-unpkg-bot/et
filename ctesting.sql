-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2016 at 12:37 PM
-- Server version: 5.6.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ctesting`
--
CREATE DATABASE IF NOT EXISTS `ctesting` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ctesting`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questions_id` int(11) NOT NULL,
  `answer_description` text,
  `answer_explanation` text,
  `answer_isright` tinyint(1) DEFAULT NULL,
  `answer_position` int(11) DEFAULT NULL,
  `active_flg` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `questions_id`, `answer_description`, `answer_explanation`, `answer_isright`, `answer_position`, `active_flg`, `created_at`, `updated_at`) VALUES
(1, 1, '1 cái', '', 1, NULL, NULL, NULL, NULL),
(2, 1, '2 cái', '', 0, NULL, NULL, NULL, NULL),
(3, 1, '3 cái', '', 0, NULL, NULL, NULL, NULL),
(4, 1, 'không còn cái nào', '', 0, NULL, NULL, NULL, NULL),
(5, 2, '1', '', 0, NULL, NULL, NULL, NULL),
(6, 2, '2', '', 0, NULL, NULL, NULL, NULL),
(7, 2, '10', '', 0, NULL, NULL, NULL, NULL),
(8, 2, '15', '', 1, NULL, NULL, NULL, NULL),
(9, 2, 'Hư cấu', '', 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balances`
--

CREATE TABLE IF NOT EXISTS `balances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `previous_balance` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`,`users_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cashflows`
--

CREATE TABLE IF NOT EXISTS `cashflows` (
  `id` varchar(50) NOT NULL,
  `users_id` int(11) NOT NULL COMMENT 'Nguoi nhan giao dich phat sinh nay',
  `amount` double DEFAULT NULL,
  `cashflow_type` int(11) DEFAULT NULL COMMENT '1: Deposit, 2:cost pay for test',
  `source_id` varchar(255) DEFAULT NULL COMMENT 'la source sinh ra transaction, voi deposit thi  la deposit_id, voi test thi la test_id',
  `active_flg` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE IF NOT EXISTS `chapters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chapter_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`, `created_at`, `updated_at`) VALUES
(9, 'Chương 1', NULL, NULL),
(10, 'Chương 2', NULL, NULL),
(11, 'Chương 3', NULL, NULL),
(12, 'Chương 4', NULL, NULL),
(13, 'Chương 5', NULL, NULL),
(14, 'Chương 6', NULL, NULL),
(15, 'Chương 7', NULL, NULL),
(16, 'Chương 8', NULL, NULL),
(17, 'Chương 9', NULL, NULL),
(18, 'Chương 10', NULL, '2016-06-02 03:15:32'),
(19, 'Chương 11', NULL, NULL),
(20, 'Chương 12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_name` varchar(255) DEFAULT NULL,
  `class_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_description`, `created_at`, `updated_at`) VALUES
(9, 'Lớp 1', 'Lớp 1', NULL, '2016-06-02 03:11:41'),
(10, 'Lớp 2', 'Lớp 2', NULL, '2016-06-02 03:11:52'),
(11, 'Lớp 3', 'Lớp 3', NULL, NULL),
(12, 'Lớp 4', 'Lớp 4', NULL, NULL),
(13, 'Lớp 5', 'Lớp 5', NULL, NULL),
(14, 'Lớp 6', 'Lớp 6', NULL, NULL),
(15, 'Lớp 7', 'Lớp 7', NULL, NULL),
(16, 'Lớp 8', 'Lớp 8', NULL, NULL),
(17, 'Lớp 9', 'Lớp 9', NULL, NULL),
(18, 'Lớp 10', 'Lớp 10', NULL, NULL),
(19, 'Lớp 11', 'Lớp 11', NULL, NULL),
(20, 'Lớp 12', 'Lớp 12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `deposits`
--

CREATE TABLE IF NOT EXISTS `deposits` (
  `id` varchar(50) NOT NULL COMMENT '''ID is generated by procedure''',
  `users_id` int(11) NOT NULL,
  `deposit_amount` double DEFAULT NULL,
  `deposit_source` varchar(45) DEFAULT NULL,
  `deposit_type` int(11) DEFAULT NULL COMMENT '1: Client deposit\n2: Admin deposit',
  `deposit_status` int(11) DEFAULT NULL COMMENT '0 : Requesting\n1 : Finished successfull\n2 : Inprogress ( có vấn đề cần check)\n3 : Cancel\n4 : Force Cancel\n5 : Force Finish ',
  `deposit_method` int(11) DEFAULT NULL COMMENT '1 : ATM Cards\n2 : Credit Cards (Visa, master, amex)\n3 : Phone Cards (Viettel, Vinaphone, MobilePhone)',
  `gateway_name` varchar(255) DEFAULT NULL,
  `gateway_id` int(11) DEFAULT NULL,
  `error_reason` text,
  `error_code` varchar(255) DEFAULT NULL,
  `deposit_log` text COMMENT 'save lai toan bo thao tac deposit, cac buoc theo tac voi gateway, vi du:\n\n1. Send request deposit to 1pay\n2. Received response: .....\n3. Redirect to 1pay\n4. Received deposit result: ..\n5. Deposit successfully',
  `active_flg` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `domains`
--

CREATE TABLE IF NOT EXISTS `domains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain_name` varchar(255) NOT NULL,
  `domain_description` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `domains`
--

INSERT INTO `domains` (`id`, `domain_name`, `domain_description`, `created_at`, `updated_at`) VALUES
(22, 'Toán học', 'Lĩnh vực toán học', NULL, NULL),
(23, 'Văn học', 'Lĩnh vực văn học', NULL, NULL),
(24, 'Ngoại ngữ', 'Lĩnh vực ngoại ngữ', NULL, NULL),
(25, 'Tin học', 'Lĩnh vực tin học', NULL, NULL),
(26, 'Hóa học', 'Lĩnh vực hóa học', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `levels`
--

CREATE TABLE IF NOT EXISTS `levels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `levels`
--

INSERT INTO `levels` (`id`, `level_name`, `created_at`, `updated_at`) VALUES
(7, 'Cấp độ dễ', NULL, NULL),
(8, 'Cấp độ trung bình', NULL, NULL),
(9, 'Cấp độ trung bình - khó', NULL, '2016-06-02 03:16:22'),
(10, 'Cấp độ khó', NULL, '2016-06-02 03:16:28'),
(11, 'Cấp độ rất khó', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `question_description` text NOT NULL,
  `question_explaination` text,
  `chapters_id` int(11) DEFAULT NULL,
  `levels_id` int(11) DEFAULT NULL,
  `classes_id` int(11) DEFAULT NULL,
  `domains_id` int(11) DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  `active_flg` decimal(10,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_description`, `question_explaination`, `chapters_id`, `levels_id`, `classes_id`, `domains_id`, `users_id`, `active_flg`, `created_at`, `updated_at`) VALUES
(1, 'Mẹ cho bé 1 cái kẹo, sau đó bé lấy trộm 1 cái rồi bé ăn 2 cái kẹo hỏi bé còn mấu cái ?', 'Cán bộ coi thi không giải thích gì thêm', 15, 7, 9, 22, 0, NULL, NULL, NULL),
(2, '6 + 9 =?', 'no', 9, 7, 9, 22, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `active_flg` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_operations`
--

CREATE TABLE IF NOT EXISTS `sys_operations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL COMMENT 'Default: 1\n',
  `operation_fullname` varchar(255) DEFAULT NULL,
  `mail_address` varchar(255) DEFAULT NULL,
  `login_id` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `active_flg` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE IF NOT EXISTS `tests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `test_type` int(11) DEFAULT NULL,
  `test_timer` int(11) DEFAULT NULL COMMENT 'Test minutes',
  `test_name` text,
  `test_description` text,
  `test_begin_time` timestamp NULL DEFAULT NULL,
  `test_end_time` timestamp NULL DEFAULT NULL,
  `test_point` int(11) DEFAULT NULL,
  `test_token` varchar(255) DEFAULT 'Su dung cho free test only',
  `test_parameters` text,
  `is_send_mail_after_test` tinyint(1) DEFAULT NULL,
  `active_flg` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_user_answers`
--

CREATE TABLE IF NOT EXISTS `test_user_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tests_id` int(11) NOT NULL,
  `answers_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `classes_id` int(11) NOT NULL,
  `user_type` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0: user\n1: admin',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) NOT NULL,
  `birth_date` date DEFAULT NULL,
  `is_allow_login` tinyint(1) DEFAULT NULL,
  `school_name` varchar(255) DEFAULT NULL,
  `remember_token` varchar(105) DEFAULT NULL,
  `user_ip` varchar(45) DEFAULT NULL,
  `active_flg` tinyint(1) NOT NULL DEFAULT '0',
  `active_code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COMMENT='	';

/*!40101 SET character_set_client = @saved_cs_client */;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
