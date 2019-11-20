-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2019 at 10:02 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qa`
--
CREATE DATABASE IF NOT EXISTS `qa` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `qa`;

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `cmt_id`) VALUES
(1, 2, 2),
(3, 1, 8),
(7, 19, 25),
(8, 2, 15),
(9, 2, 27);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cmt_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cmt_id`, `question_id`, `user_id`, `content`, `create_date`, `likes`) VALUES
(2, 2, 3, 'Trên website môn học và trên internet', '2019-11-09 02:02:39', 0),
(15, 2, 6, 'w3school', '2019-11-09 02:24:11', 0),
(16, 4, 6, 'Làm web thôi', '2019-11-09 02:38:40', 0),
(17, 6, 6, '2222', '2019-11-09 02:40:04', 0),
(18, 1, 3, 'đam mê', '2019-11-09 02:42:18', 0),
(20, 1, 6, 'ffdgfdg', '2019-11-20 08:44:58', 0),
(21, 14, 7, 'ok baby', '2019-11-20 08:50:03', 0),
(23, 14, 3, 'tren cac trang web', '2019-11-20 08:51:53', 0),
(24, 19, 3, 'gfgd', '2019-11-20 08:57:53', 0),
(25, 19, 3, 'gsdg', '2019-11-20 08:57:57', 0),
(26, 2, 3, 'tren cac trang web', '2019-11-20 08:58:44', 0),
(27, 2, 3, 'ok baby', '2019-11-20 08:58:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `ss_id`, `user_id`, `content`, `create_date`, `likes`) VALUES
(1, 9, 3, 'Học phát triển ứng dụng Web cần những yêu cầu gì?', '2019-11-09 01:59:56', 0),
(2, 9, 3, 'Tài liệu môn học tìm ở đâu?', '2019-11-09 02:00:01', 0),
(3, 9, 3, 'Ứng dụng môn học này là gì?', '2019-11-09 02:00:06', 0),
(4, 9, 5, 'Các vấn đề trọng tâm của môn học là gì?', '2019-11-09 02:01:20', 0),
(5, 13, 5, 'Môn học này bao nhiêu tín chỉ? Thời gian thực hành như thế nào?', '2019-11-09 02:00:18', 0),
(7, 10, 7, 'hiihih', '2019-11-09 02:44:47', 0),
(12, 9, 7, 'Cần làm gì để học tốt?', '2019-11-09 03:49:13', 0),
(13, 9, 6, 'vvxcvcx', '2019-11-20 08:45:16', 0),
(14, 9, 6, 'Co can hoc tot web', '2019-11-20 08:47:56', 0),
(17, 9, 3, 'ahihi', '2019-11-20 08:54:27', 0),
(18, 9, 3, 'trung chó', '2019-11-20 08:56:34', 0),
(19, 14, 3, 'Co can hoc tot web', '2019-11-20 08:57:49', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(4) NOT NULL,
  `role_name` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `note`) VALUES
(1, 'Admin', ''),
(2, 'Giáo viên', ''),
(3, 'Sinh viên', '');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `ss_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ss_title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ss_describe` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `ss_pass` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ss_status` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`ss_id`, `user_id`, `ss_title`, `ss_describe`, `create_date`, `time_start`, `time_end`, `ss_pass`, `ss_status`) VALUES
(9, 3, 'Phát triển ứng dụng Web', 'int3306', '2019-11-20 07:56:00', '2019-11-01 07:05:00', '2019-11-30 00:00:00', '', 'action'),
(10, 3, 'Hệ thống thông tin', 'Phát triển hệ thống thông tin', '2019-11-02 04:33:42', '2019-11-02 17:00:00', '2019-11-02 17:30:00', 'httt', 'close'),
(11, 3, 'Tiêu đề 1', 'hihii', '2019-11-09 01:59:27', '2019-11-02 21:33:00', '2019-11-02 21:35:00', '12345', 'close'),
(12, 3, 'lập trình ', 'học lại', '2019-11-09 01:59:32', '2019-11-05 14:22:00', '2019-11-05 15:04:00', '123456', 'close'),
(13, 5, 'Phát triển ứng dụng Web - INT3306 UET', 'môn phát triển ứng dụng Web của Trường Đại học Công nghệ - Đại học Quốc gia Hà Nội', '2019-11-09 01:59:37', '2019-11-05 19:00:00', '2019-11-05 19:50:00', 'uet', 'close'),
(14, 3, 'an toàn và an ninh mạng', 'oki google', '2019-11-20 07:58:39', '2019-11-20 00:09:00', '2019-11-30 11:10:00', '', 'action');

-- --------------------------------------------------------

--
-- Table structure for table `survey`
--

CREATE TABLE `survey` (
  `survey_id` int(11) NOT NULL,
  `ss_id` int(11) NOT NULL,
  `survey_describe` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `start_time_survey` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `close_time_survey` datetime NOT NULL,
  `survey_status` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `survey`
--

INSERT INTO `survey` (`survey_id`, `ss_id`, `survey_describe`, `start_time_survey`, `close_time_survey`, `survey_status`) VALUES
(77, 14, 'ahi1', '2019-11-20 07:59:17', '2019-11-20 14:59:17', 'action'),
(78, 9, 'ah2', '2019-11-20 07:59:43', '2019-11-20 14:59:43', 'action');

-- --------------------------------------------------------

--
-- Table structure for table `survey_detail`
--

CREATE TABLE `survey_detail` (
  `choose_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `choose_title` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `num_choose` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `survey_detail`
--

INSERT INTO `survey_detail` (`choose_id`, `survey_id`, `choose_title`, `num_choose`) VALUES
(63, 77, '121', 0),
(64, 77, '313', 0),
(65, 78, 'đasad', 0),
(66, 78, 'đâsdas', 0),
(67, 78, 'ddddd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(4) NOT NULL,
  `user_names` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_pass` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `user_status` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'action'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `user_names`, `user_pass`, `name`, `create_date`, `user_status`) VALUES
(1, 1, 'admin', 'admin', 'Quản trị viên', '2019-11-09 00:00:00', 'action'),
(3, 2, 'gv1', '1234', 'Nguyễn Thành Trung', '2019-11-09 00:00:00', 'action'),
(5, 2, 'gv2', '1234', 'Nguyễn Trung Kiên', '2019-11-09 00:00:00', 'action'),
(6, 3, '', '', 'Người dùng ẩn danh', '2019-11-09 00:00:00', 'action'),
(7, 3, 'hs1', '1234', 'Nguyễn Văn Thành', '2019-11-09 00:00:00', 'action'),
(8, 3, 'hs2', '1234', 'Nguyễn Văn Trung', '2019-11-09 00:00:00', 'action');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answer_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cmt_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`ss_id`);

--
-- Indexes for table `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`survey_id`);

--
-- Indexes for table `survey_detail`
--
ALTER TABLE `survey_detail`
  ADD PRIMARY KEY (`choose_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `answer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cmt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `ss_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `survey`
--
ALTER TABLE `survey`
  MODIFY `survey_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `survey_detail`
--
ALTER TABLE `survey_detail`
  MODIFY `choose_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
