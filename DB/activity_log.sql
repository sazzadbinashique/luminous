-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 09, 2020 at 06:54 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `luminous`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `weak_of_year` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `ip` varchar(45) NOT NULL,
  `path` varchar(255) NOT NULL,
  `search` varchar(255) DEFAULT NULL,
  `ref` varchar(255) DEFAULT NULL,
  `os` varchar(255) NOT NULL,
  `browser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `date`, `time`, `weak_of_year`, `user_id`, `ip`, `path`, `search`, `ref`, `os`, `browser`) VALUES
(1, '2020-12-09', '22:23:52', 50, NULL, '::1', '/luminous/post?p_id=2', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(2, '2020-12-09', '22:40:38', 50, NULL, '::1', '/luminous/post?p_id=2', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(3, '2020-12-09', '23:02:31', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(4, '2020-12-09', '23:03:00', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(5, '2020-12-09', '23:05:35', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(6, '2020-12-09', '23:06:21', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(7, '2020-12-09', '23:08:25', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(8, '2020-12-09', '23:08:27', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(9, '2020-12-09', '23:08:27', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(10, '2020-12-09', '23:08:28', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(11, '2020-12-09', '23:08:29', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(12, '2020-12-09', '23:08:32', 50, NULL, '::1', '/luminous/', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(13, '2020-12-09', '23:08:34', 50, NULL, '::1', '/luminous/category?category=%201', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(14, '2020-12-09', '23:08:36', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(15, '2020-12-09', '23:08:54', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(16, '2020-12-09', '23:08:55', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(17, '2020-12-09', '23:09:40', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(18, '2020-12-09', '23:09:41', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(19, '2020-12-09', '23:10:50', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(20, '2020-12-09', '23:11:38', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(21, '2020-12-09', '23:11:40', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(22, '2020-12-09', '23:11:40', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(23, '2020-12-09', '23:11:40', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(24, '2020-12-09', '23:11:44', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(25, '2020-12-09', '23:12:02', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(26, '2020-12-09', '23:13:07', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(27, '2020-12-09', '23:14:01', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(28, '2020-12-09', '23:14:02', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(29, '2020-12-09', '23:14:03', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(30, '2020-12-09', '23:14:05', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/category?category=%202', 'Linux', 'Google Chrome'),
(31, '2020-12-09', '23:14:08', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(32, '2020-12-09', '23:15:22', 50, NULL, '::1', '/luminous/index.php', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(33, '2020-12-09', '23:15:25', 50, NULL, '::1', '/luminous/registration', NULL, 'http://localhost/luminous/index.php', 'Linux', 'Google Chrome'),
(34, '2020-12-09', '23:15:32', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/registration', 'Linux', 'Google Chrome'),
(35, '2020-12-09', '23:15:34', 50, NULL, '::1', '/luminous/category?category=%201', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(36, '2020-12-09', '23:15:35', 50, NULL, '::1', '/luminous/category?category=%202', NULL, 'http://localhost/luminous/category?category=%201', 'Linux', 'Google Chrome'),
(37, '2020-12-09', '23:15:36', 50, NULL, '::1', '/luminous/category?category=%2010', NULL, 'http://localhost/luminous/category?category=%202', 'Linux', 'Google Chrome'),
(38, '2020-12-09', '23:15:37', 50, NULL, '::1', '/luminous/category?category=%2016', NULL, 'http://localhost/luminous/category?category=%2010', 'Linux', 'Google Chrome'),
(39, '2020-12-09', '23:15:40', 50, NULL, '::1', '/luminous/post?p_id=%202', NULL, 'http://localhost/luminous/category?category=%2016', 'Linux', 'Google Chrome'),
(40, '2020-12-09', '23:15:43', 50, NULL, '::1', '/luminous/post?p_id=%203', NULL, 'http://localhost/luminous/post?p_id=%202', 'Linux', 'Google Chrome'),
(41, '2020-12-09', '23:15:44', 50, NULL, '::1', '/luminous/post?p_id=%205', NULL, 'http://localhost/luminous/post?p_id=%203', 'Linux', 'Google Chrome'),
(42, '2020-12-09', '23:15:48', 50, NULL, '::1', '/luminous/', NULL, 'http://localhost/luminous/post?p_id=%205', 'Linux', 'Google Chrome'),
(43, '2020-12-09', '23:19:48', 50, NULL, '::1', '/luminous/', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(44, '2020-12-09', '23:19:52', 50, NULL, '::1', '/luminous/', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(45, '2020-12-09', '23:19:55', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(46, '2020-12-09', '23:19:57', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(47, '2020-12-09', '23:20:20', 50, NULL, '::1', '/luminous/', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(48, '2020-12-09', '23:20:26', 50, NULL, '::1', '/luminous/post?p_id=%205', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(49, '2020-12-09', '23:26:02', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(50, '2020-12-09', '23:27:00', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(51, '2020-12-09', '23:27:19', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(52, '2020-12-09', '23:27:45', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(53, '2020-12-09', '23:28:29', 50, NULL, '::1', '/luminous/', NULL, '', 'Linux', 'Google Chrome'),
(54, '2020-12-09', '23:28:37', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(55, '2020-12-09', '23:28:38', 50, NULL, '::1', '/luminous/login', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(56, '2020-12-09', '23:28:40', 50, NULL, '::1', '/luminous/', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(57, '2020-12-09', '23:31:01', 50, 1, '::1', '/luminous/', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(58, '2020-12-09', '23:31:05', 50, 1, '::1', '/luminous/post?p_id=2', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(59, '2020-12-09', '23:31:21', 50, 1, '::1', '/luminous/index.php', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(60, '2020-12-09', '23:31:23', 50, 1, '::1', '/luminous/post?p_id=2', NULL, 'http://localhost/luminous/index.php', 'Linux', 'Google Chrome'),
(61, '2020-12-09', '23:31:34', 50, 1, '::1', '/luminous/post?p_id=2', NULL, 'http://localhost/luminous/index.php', 'Linux', 'Google Chrome'),
(62, '2020-12-09', '23:31:41', 50, 1, '::1', '/luminous/category?category=%201', NULL, 'http://localhost/luminous/post?p_id=2', 'Linux', 'Google Chrome'),
(63, '2020-12-09', '23:32:46', 50, 1, '::1', '/luminous/', NULL, 'http://localhost/luminous/post?p_id=2', 'Linux', 'Google Chrome'),
(64, '2020-12-09', '23:32:47', 50, 1, '::1', '/luminous/login', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(65, '2020-12-09', '23:32:49', 50, 1, '::1', '/luminous/login', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(66, '2020-12-09', '23:32:53', 50, 1, '::1', '/luminous/category?category=%201', NULL, 'http://localhost/luminous/post?p_id=2', 'Linux', 'Google Chrome'),
(67, '2020-12-09', '23:37:11', 50, 0, '::1', '/luminous/index.php', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(68, '2020-12-09', '23:43:38', 50, 0, '::1', '/luminous/login', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(69, '2020-12-09', '23:43:39', 50, 0, '::1', '/luminous/login', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(70, '2020-12-09', '23:51:16', 50, 1, '::1', '/luminous/admin/', NULL, 'http://localhost/luminous/login', 'Linux', 'Google Chrome'),
(71, '2020-12-09', '23:51:26', 50, 1, '::1', '/luminous/', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(72, '2020-12-09', '23:51:28', 50, 1, '::1', '/luminous/admin/', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(73, '2020-12-09', '23:51:30', 50, 1, '::1', '/luminous/admin/post', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(74, '2020-12-09', '23:51:51', 50, 1, '::1', '/luminous/admin/categories', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(75, '2020-12-09', '23:52:14', 50, 1, '::1', '/luminous/admin/categories', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(76, '2020-12-09', '23:52:21', 50, 1, '::1', '/luminous/admin/categories', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(77, '2020-12-09', '23:52:42', 50, 1, '::1', '/luminous/', NULL, 'http://localhost/luminous/index.php', 'Linux', 'Google Chrome'),
(78, '2020-12-09', '23:52:46', 50, 1, '::1', '/luminous/admin/', NULL, 'http://localhost/luminous/', 'Linux', 'Google Chrome'),
(79, '2020-12-09', '23:52:48', 50, 1, '::1', '/luminous/admin/profile', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome'),
(80, '2020-12-09', '23:53:23', 50, 0, '::1', '/luminous/index.php', NULL, 'http://localhost/luminous/admin/profile', 'Linux', 'Google Chrome'),
(81, '2020-12-09', '23:53:26', 50, 0, '::1', '/luminous/contact', NULL, 'http://localhost/luminous/index.php', 'Linux', 'Google Chrome'),
(82, '2020-12-09', '23:53:35', 50, 0, '::1', '/luminous/', NULL, 'http://localhost/luminous/contact', 'Linux', 'Google Chrome'),
(83, '2020-12-09', '23:54:12', 50, 0, '::1', '/luminous/', NULL, 'http://localhost/luminous/admin/categories', 'Linux', 'Google Chrome'),
(84, '2020-12-09', '23:54:18', 50, 0, '::1', '/luminous/', NULL, 'http://localhost/luminous/admin/', 'Linux', 'Google Chrome');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
