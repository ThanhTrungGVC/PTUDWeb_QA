-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 02, 2019 lúc 12:40 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`ss_id`, `user_id`, `ss_title`, `ss_describe`, `create_date`, `time_start`, `time_end`, `ss_pass`, `ss_status`) VALUES
(9, 2, 'Phat trien ud web', 'int3306', '2019-11-02 10:11:02', '2019-11-01 07:05:00', '2019-11-12 00:00:00', '', 'action'),
(10, 3, 'Hệ thống thông tin', 'Phát triển hệ thống thông tin', '2019-11-02 11:33:42', '2019-11-02 17:00:00', '2019-11-02 17:30:00', 'httt', 'close');

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
