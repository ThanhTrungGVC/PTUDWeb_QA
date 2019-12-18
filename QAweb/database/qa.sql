-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 24, 2019 lúc 07:52 AM
-- Phiên bản máy phục vụ: 10.4.6-MariaDB
-- Phiên bản PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qa`
--
CREATE DATABASE IF NOT EXISTS `qa` DEFAULT CHARACTER SET utf8 COLLATE utf8_vietnamese_ci;
USE `qa`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `cmt_id` int(11) NOT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`answer_id`, `question_id`, `cmt_id`) VALUES
(1, 2, 2),
(3, 1, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `cmt_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`cmt_id`, `question_id`, `user_id`, `content`, `create_date`, `likes`) VALUES
(2, 2, 3, 'Trên website môn học và trên internet', '2019-11-09 09:02:39', 0),
(15, 2, 6, 'w3school', '2019-11-09 09:24:11', 0),
(16, 4, 6, 'Làm web thôi', '2019-11-09 09:38:40', 0),
(17, 6, 6, '2222', '2019-11-09 09:40:04', 0),
(18, 1, 3, 'đam mê', '2019-11-09 09:42:18', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `ss_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `likes` int(11) NOT NULL,
  PRIMARY KEY (`question_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`question_id`, `ss_id`, `user_id`, `content`, `create_date`, `likes`) VALUES
(1, 9, 3, 'Học phát triển ứng dụng Web cần những yêu cầu gì?', '2019-11-09 08:59:56', 0),
(2, 9, 3, 'Tài liệu môn học tìm ở đâu?', '2019-11-09 09:00:01', 0),
(3, 9, 3, 'Ứng dụng môn học này là gì?', '2019-11-09 09:00:06', 0),
(4, 9, 5, 'Các vấn đề trọng tâm của môn học là gì?', '2019-11-09 09:01:20', 0),
(5, 13, 5, 'Môn học này bao nhiêu tín chỉ? Thời gian thực hành như thế nào?', '2019-11-09 09:00:18', 0),
(7, 10, 7, 'hiihih', '2019-11-09 09:44:47', 0),
(12, 9, 7, 'Cần làm gì để học tốt?', '2019-11-09 10:49:13', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(4) NOT NULL,
  `role_name` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  `note` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `note`) VALUES
(1, 'Admin', ''),
(2, 'Giáo viên', ''),
(3, 'Sinh viên', ''),
(4, 'Ẩn danh', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `ss_title` varchar(255) COLLATE utf8_vietnamese_ci NOT NULL,
  `ss_describe` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `time_start` datetime NOT NULL,
  `time_end` datetime NOT NULL,
  `ss_pass` varchar(30) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `ss_status` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`ss_id`, `user_id`, `ss_title`, `ss_describe`, `create_date`, `time_start`, `time_end`, `ss_pass`, `ss_status`) VALUES
(9, 3, 'Phát triển ứng dụng Web', 'int3306', '2019-11-24 06:51:35', '2019-11-01 07:05:00', '2019-11-30 00:00:00', '', 'action'),
(10, 3, 'Hệ thống thông tin', 'Phát triển hệ thống thông tin', '2019-11-02 11:33:42', '2019-11-02 17:00:00', '2019-11-02 17:30:00', 'httt', 'close'),
(11, 3, 'Tiêu đề 1', 'hihii', '2019-11-09 08:59:27', '2019-11-02 21:33:00', '2019-11-02 21:35:00', '12345', 'close'),
(12, 3, 'lập trình ', 'học lại', '2019-11-09 08:59:32', '2019-11-05 14:22:00', '2019-11-05 15:04:00', '123456', 'close'),
(13, 5, 'Phát triển ứng dụng Web - INT3306 UET', 'môn phát triển ứng dụng Web của Trường Đại học Công nghệ - Đại học Quốc gia Hà Nội', '2019-11-09 08:59:37', '2019-11-05 19:00:00', '2019-11-05 19:50:00', 'uet', 'close');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `survey`
--

DROP TABLE IF EXISTS `survey`;
CREATE TABLE IF NOT EXISTS `survey` (
  `survey_id` int(11) NOT NULL AUTO_INCREMENT,
  `ss_id` int(11) NOT NULL,
  `survey_describe` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `start_time_survey` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `close_time_survey` datetime NOT NULL,
  `survey_status` varchar(15) COLLATE utf8_vietnamese_ci NOT NULL,
  PRIMARY KEY (`survey_id`)
) ENGINE=InnoDB AUTO_INCREMENT=79 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `survey`
--

INSERT INTO `survey` (`survey_id`, `ss_id`, `survey_describe`, `start_time_survey`, `close_time_survey`, `survey_status`) VALUES
(77, 14, 'ahi1', '2019-11-20 07:59:17', '2019-11-20 14:59:17', 'action'),
(78, 9, 'ah2', '2019-11-20 07:59:43', '2019-11-20 14:59:43', 'action');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `survey_detail`
--

DROP TABLE IF EXISTS `survey_detail`;
CREATE TABLE IF NOT EXISTS `survey_detail` (
  `choose_id` int(11) NOT NULL AUTO_INCREMENT,
  `survey_id` int(11) NOT NULL,
  `choose_title` varchar(500) COLLATE utf8_vietnamese_ci NOT NULL,
  `num_choose` int(11) NOT NULL,
  PRIMARY KEY (`choose_id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `survey_detail`
--

INSERT INTO `survey_detail` (`choose_id`, `survey_id`, `choose_title`, `num_choose`) VALUES
(63, 77, '121', 0),
(64, 77, '313', 0),
(65, 78, 'đasad', 0),
(66, 78, 'đâsdas', 0),
(67, 78, 'ddddd', 0),
(68, 79, 'fgfdhfd', 0),
(69, 79, 'hfdhdfhd', 0),
(70, 79, 'hfdhdfhdf', 0),
(71, 79, 'hdfhdf', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(4) NOT NULL,
  `user_names` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `user_pass` varchar(30) COLLATE utf8_vietnamese_ci NOT NULL,
  `name` varchar(150) COLLATE utf8_vietnamese_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `user_status` varchar(100) COLLATE utf8_vietnamese_ci NOT NULL DEFAULT 'action',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `user_names`, `user_pass`, `name`, `create_date`, `user_status`) VALUES
(1, 1, 'admin', 'admin', 'Quản trị viên', '2019-11-09 00:00:00', 'action'),
(3, 2, 'gv1', '1234', 'Nguyễn Thành Trung', '2019-11-09 00:00:00', 'action'),
(5, 2, 'gv2', '1234', 'Nguyễn Trung Kiên', '2019-11-09 00:00:00', 'action'),
(6, 4, '', '', 'Người dùng ẩn danh', '2019-11-09 00:00:00', 'action'),
(7, 3, 'hs1', '1234', 'Nguyễn Văn Thành', '2019-11-09 00:00:00', 'action'),
(8, 3, 'hs2', '1234', 'Nguyễn Văn Trung', '2019-11-09 00:00:00', 'action');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_choose`
--

DROP TABLE IF EXISTS `user_choose`;
CREATE TABLE IF NOT EXISTS `user_choose` (
  `stt` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `survey_id` int(11) NOT NULL,
  `choose_id` int(11) NOT NULL,
  PRIMARY KEY (`stt`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
