-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 05, 2019 lúc 03:29 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET FOREIGN_KEY_CHECKS=0;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`cmt_id`, `question_id`, `user_id`, `content`, `create_date`, `likes`) VALUES
(2, 2, 2, 'Trên website môn học và trên internet', '2019-11-05 13:59:30', 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`question_id`, `ss_id`, `user_id`, `content`, `create_date`, `likes`) VALUES
(1, 9, 2, 'Học phát triển ứng dụng Web cần những yêu cầu gì?', '2019-11-05 10:44:47', 0),
(2, 9, 2, 'Tài liệu môn học tìm ở đâu?', '2019-11-05 11:32:22', 0),
(3, 9, 2, 'Ứng dụng môn học này là gì?', '2019-11-05 11:35:50', 0),
(4, 9, 2, 'Các vấn đề trọng tâm của môn học là gì?', '2019-11-05 11:36:18', 0),
(5, 13, 2, 'Môn học này bao nhiêu tín chỉ? Thời gian thực hành như thế nào?', '2019-11-05 12:48:38', 0);

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
(3, 'Sinh viên', '');

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
(9, 2, 'Phat trien ud web', 'int3306', '2019-11-02 10:11:02', '2019-11-01 07:05:00', '2019-11-12 00:00:00', '', 'action'),
(10, 3, 'Hệ thống thông tin', 'Phát triển hệ thống thông tin', '2019-11-02 11:33:42', '2019-11-02 17:00:00', '2019-11-02 17:30:00', 'httt', 'close'),
(11, 2, 'Tiêu đề 1', 'hihii', '2019-11-02 14:36:14', '2019-11-02 21:33:00', '2019-11-02 21:35:00', '12345', 'close'),
(12, 2, 'lập trình ', 'học lại', '2019-11-05 08:27:15', '2019-11-05 14:22:00', '2019-11-05 15:04:00', '123456', 'close'),
(13, 2, 'Phát triển ứng dụng Web - INT3306 UET', 'môn phát triển ứng dụng Web của Trường Đại học Công nghệ - Đại học Quốc gia Hà Nội', '2019-11-05 12:53:27', '2019-11-05 19:00:00', '2019-11-05 19:50:00', 'uet', 'close');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `user_names`, `user_pass`, `name`, `create_date`, `user_status`) VALUES
(1, 1, 'admin', 'admin', 'Quản trị viên', '2019-10-31 06:18:23', 'action'),
(2, 2, 'gv1', '1234', 'Nguyễn Văn A', '2019-10-31 11:40:38', 'action'),
(3, 2, 'gv2', '1234', 'Nguyễn Văn B', '2019-10-31 23:52:32', 'action'),
(4, 3, 'hs1', '1234', 'Nguyễn Văn C', '2019-10-31 23:52:32', 'action'),
(5, 3, 'hs2', '1234', 'Nguyễn Văn D', '2019-10-31 23:52:32', 'banning');
SET FOREIGN_KEY_CHECKS=1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
