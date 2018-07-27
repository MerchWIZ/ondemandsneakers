-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 13, 2017 at 02:42 PM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 5.6.30-7+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hammerfit`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `country` int(11) NOT NULL,
  `state` varchar(30) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `deleted` int(2) DEFAULT '0',
  `addressType` varchar(25) DEFAULT 'billing',
  `order_id` int(11) DEFAULT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`id`, `user_id`, `phone`, `country`, `state`, `city`, `address`, `zip`, `created_at`, `updated_at`, `status`, `deleted`, `addressType`, `order_id`, `address2`, `mobile`) VALUES
(1, 1, '923337191695', 0, 'AL', 'ny', '502  wind song palace', '74550', '2016-10-04 12:18:01', '2017-01-05 14:00:42', 1, 0, 'billing', NULL, NULL, NULL),
(3, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 11:40:19', '2016-11-23 11:40:19', 1, 0, 'billing', 2, '', NULL),
(4, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 11:56:37', '2016-11-23 11:56:37', 1, 0, 'billing', 3, '', NULL),
(5, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:14:53', '2016-11-23 12:14:53', 1, 0, 'billing', 4, '', NULL),
(6, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:26:39', '2016-11-23 12:26:39', 1, 0, 'billing', 5, '', NULL),
(7, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:26:47', '2016-11-23 12:26:47', 1, 0, 'billing', 6, '', NULL),
(8, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:29:59', '2016-11-23 12:29:59', 1, 0, 'billing', 7, '', NULL),
(9, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:30:33', '2016-11-23 12:30:33', 1, 0, 'billing', 8, '', NULL),
(10, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:30:52', '2016-11-23 12:30:52', 1, 0, 'billing', 9, '', NULL),
(11, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:31:10', '2016-11-23 12:31:10', 1, 0, 'billing', 10, '', NULL),
(12, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:31:42', '2016-11-23 12:31:42', 1, 0, 'billing', 11, '', NULL),
(13, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:32:35', '2016-11-23 12:32:35', 1, 0, 'billing', 12, '', NULL),
(14, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:33:08', '2016-11-23 12:33:08', 1, 0, 'billing', 13, '', NULL),
(15, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:33:58', '2016-11-23 12:33:58', 1, 0, 'billing', 14, '', NULL),
(16, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:34:10', '2016-11-23 12:34:10', 1, 0, 'billing', 15, '', NULL),
(17, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:34:52', '2016-11-23 12:34:52', 1, 0, 'billing', 16, '', NULL),
(18, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:35:47', '2016-11-23 12:35:47', 1, 0, 'billing', 17, '', NULL),
(19, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 12:36:36', '2016-11-23 12:36:36', 1, 0, 'billing', 18, '', NULL),
(20, 30, '3337191695', 230, 'AK', 'Karachi', 'sana classic', '74550', '2016-11-23 14:16:55', '2016-11-23 14:16:55', 1, 0, 'billing', NULL, NULL, NULL),
(21, 30, '3337191695', 230, 'AK', 'Karachi', 'sana classic', '74550', '2016-11-23 14:18:02', '2016-11-23 14:18:02', 1, 0, 'billing', 19, '', NULL),
(22, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-23 15:57:53', '2016-11-23 15:57:53', 1, 0, 'billing', 20, '', NULL),
(23, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-28 09:13:56', '2016-11-28 09:13:56', 1, 0, 'billing', 21, '', NULL),
(24, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-28 09:13:56', '2016-11-28 09:13:56', 1, 0, 'billing', 22, '', NULL),
(25, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-29 17:35:45', '2016-11-29 17:35:45', 1, 0, 'billing', 23, '', NULL),
(26, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2016-11-29 17:36:00', '2016-11-29 17:36:00', 1, 0, 'billing', 24, '', NULL),
(27, 31, '5033347536', 230, 'OR', 'Lake Oswego', '5200 SW Meadows Rd', '97035', '2016-12-01 18:17:21', '2016-12-01 18:17:21', 1, 0, 'billing', NULL, NULL, NULL),
(28, 32, '9897175523', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-05 20:52:30', '2016-12-05 20:52:30', 1, 0, 'billing', NULL, NULL, NULL),
(29, 32, '9897175523', 230, 'MI', 'Midland', '123', '48642', '2016-12-05 20:54:31', '2016-12-05 20:54:31', 1, 0, 'billing', 25, '', NULL),
(30, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-16 15:05:28', '2016-12-16 15:05:28', 1, 0, 'billing', NULL, NULL, NULL),
(31, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-16 15:07:39', '2016-12-16 15:07:39', 1, 0, 'billing', 26, '', NULL),
(32, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-20 17:50:04', '2016-12-20 17:50:04', 1, 0, 'billing', 27, '', NULL),
(33, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-20 17:57:18', '2016-12-20 17:57:18', 1, 0, 'billing', 28, '', NULL),
(34, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-20 17:57:20', '2016-12-20 17:57:20', 1, 0, 'billing', 29, '', NULL),
(35, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-20 17:57:41', '2016-12-20 17:57:41', 1, 0, 'billing', 30, '', NULL),
(36, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-20 17:58:58', '2016-12-20 17:58:58', 1, 0, 'billing', 31, '', NULL),
(37, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-20 18:27:28', '2016-12-20 18:27:28', 1, 0, 'billing', 32, '', NULL),
(38, 33, '9897175522', 230, 'MI', 'Midland', '850 Joe Mann Blvd, 203', '48642', '2016-12-21 18:34:44', '2016-12-21 18:34:44', 1, 0, 'billing', 33, '', NULL),
(39, 1, '923337191695', 167, 'Sindh', 'Karachi', 'sana classic', '74550', '2017-01-03 17:40:25', '2017-01-03 17:40:25', 1, 0, 'billing', 34, '', NULL),
(40, 34, '44444444444444', 230, 'State *', 'asd', 'sad', '74550', '2017-01-04 14:35:06', '2017-01-04 14:35:06', 1, 0, 'billing', NULL, NULL, NULL),
(60, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-10 16:15:52', '2017-01-10 16:15:52', 1, 0, 'billing', 54, '', NULL),
(61, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-10 16:38:27', '2017-01-10 16:38:27', 1, 0, 'billing', 55, '', NULL),
(62, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-11 08:04:12', '2017-01-11 08:04:12', 1, 0, 'billing', 1, '', NULL),
(63, 35, '44444444444444', 230, 'State *', 'ny', '502  wind song palace', '74550', '2017-01-11 15:47:58', '2017-01-11 15:47:58', 1, 0, 'billing', NULL, NULL, NULL),
(64, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 08:58:41', '2017-01-12 08:58:41', 1, 0, 'patient', 2, '', NULL),
(65, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 14:32:49', '2017-01-12 14:32:49', 1, 0, 'patient', 3, '', NULL),
(66, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 14:56:33', '2017-01-12 14:56:33', 1, 0, 'patient', 4, '', NULL),
(67, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 14:58:17', '2017-01-12 14:58:17', 1, 0, 'patient', 5, '', NULL),
(68, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 14:59:40', '2017-01-12 14:59:40', 1, 0, 'patient', 6, '', NULL),
(69, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 15:00:25', '2017-01-12 15:00:25', 1, 0, 'patient', 7, '', NULL),
(70, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 15:06:19', '2017-01-12 15:06:19', 1, 0, 'patient', 8, '', NULL),
(71, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 15:08:44', '2017-01-12 15:08:44', 1, 0, 'patient', 9, '', NULL),
(72, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 15:08:49', '2017-01-12 15:08:49', 1, 0, 'patient', 10, '', NULL),
(73, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-12 15:09:56', '2017-01-12 15:09:56', 1, 0, 'patient', 11, '', NULL),
(74, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 08:10:00', '2017-01-13 08:10:00', 1, 0, 'patient', 12, '', NULL),
(75, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 08:10:37', '2017-01-13 08:10:37', 1, 0, 'patient', 13, '', NULL),
(76, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 08:10:42', '2017-01-13 08:10:42', 1, 0, 'patient', 14, '', NULL),
(77, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 08:10:49', '2017-01-13 08:10:49', 1, 0, 'patient', 15, '', NULL),
(78, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 09:53:00', '2017-01-13 09:53:00', 1, 0, 'patient', 16, '', NULL),
(79, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 09:57:08', '2017-01-13 09:57:08', 1, 0, 'patient', 17, '', NULL),
(80, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-13 10:08:22', '2017-01-13 10:08:22', 1, 0, 'patient', 18, '', NULL),
(81, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:17:26', '2017-01-16 08:17:26', 1, 0, 'patient', 19, '', NULL),
(82, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:33:55', '2017-01-16 08:33:55', 1, 0, 'patient', 20, '', NULL),
(83, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:34:01', '2017-01-16 08:34:01', 1, 0, 'patient', 21, '', NULL),
(84, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:34:33', '2017-01-16 08:34:33', 1, 0, 'patient', 22, '', NULL),
(85, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:35:04', '2017-01-16 08:35:04', 1, 0, 'patient', 23, '', NULL),
(86, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:36:47', '2017-01-16 08:36:47', 1, 0, 'patient', 24, '', NULL),
(87, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:38:12', '2017-01-16 08:38:12', 1, 0, 'patient', 25, '', NULL),
(88, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:38:53', '2017-01-16 08:38:53', 1, 0, 'patient', 26, '', NULL),
(89, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:55:08', '2017-01-16 08:55:08', 1, 0, 'patient', 27, '', NULL),
(90, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:55:18', '2017-01-16 08:55:18', 1, 0, 'patient', 28, '', NULL),
(91, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:55:27', '2017-01-16 08:55:27', 1, 0, 'patient', 29, '', NULL),
(92, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:55:35', '2017-01-16 08:55:35', 1, 0, 'patient', 30, '', NULL),
(93, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:58:15', '2017-01-16 08:58:15', 1, 0, 'patient', 31, '', NULL),
(94, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:58:23', '2017-01-16 08:58:23', 1, 0, 'patient', 32, '', NULL),
(95, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 08:58:50', '2017-01-16 08:58:50', 1, 0, 'patient', 33, '', NULL),
(96, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 09:01:14', '2017-01-16 09:01:14', 1, 0, 'patient', 34, '', NULL),
(97, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 09:22:39', '2017-01-16 09:22:39', 1, 0, 'patient', 35, '', NULL),
(98, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 09:28:59', '2017-01-16 09:28:59', 1, 0, 'patient', 36, '', NULL),
(99, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 09:31:24', '2017-01-16 09:31:24', 1, 0, 'patient', 37, '', NULL),
(100, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 09:33:24', '2017-01-16 09:33:24', 1, 0, 'patient', 38, '', NULL),
(101, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-16 09:33:51', '2017-01-16 09:33:51', 1, 0, 'patient', 39, '', NULL),
(102, 35, '44444444444444', 230, 'State *', 'ny', '502  wind song palace', '74550', '2017-01-17 14:18:03', '2017-01-17 14:18:03', 1, 0, 'patient', 40, '', NULL),
(103, 35, '44444444444444', 230, 'State *', 'ny', '502  wind song palace', '74550', '2017-01-17 15:13:48', '2017-01-17 15:13:48', 1, 0, 'patient', 41, '', NULL),
(105, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 08:47:43', '2017-01-18 08:47:43', 1, 0, 'patient', 43, '', NULL),
(106, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:16:02', '2017-01-18 09:16:02', 1, 0, 'patient', 44, '', NULL),
(107, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:43:59', '2017-01-18 09:43:59', 1, 0, 'patient', 45, '', NULL),
(108, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:46:20', '2017-01-18 09:46:20', 1, 0, 'patient', 46, '', NULL),
(109, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:48:21', '2017-01-18 09:48:21', 1, 0, 'patient', 47, '', NULL),
(110, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:50:05', '2017-01-18 09:50:05', 1, 0, 'patient', 48, '', NULL),
(111, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:51:36', '2017-01-18 09:51:36', 1, 0, 'patient', 49, '', NULL),
(113, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:55:15', '2017-01-18 09:55:15', 1, 0, 'patient', 51, '', NULL),
(114, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:57:33', '2017-01-18 09:57:33', 1, 0, 'patient', 52, '', NULL),
(115, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 09:58:21', '2017-01-18 09:58:21', 1, 0, 'patient', 53, '', NULL),
(116, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 10:11:32', '2017-01-18 10:11:32', 1, 0, 'patient', 54, '', NULL),
(119, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 11:23:13', '2017-01-18 11:23:13', 1, 0, 'patient', 57, '', NULL),
(120, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 11:26:22', '2017-01-18 11:26:22', 1, 0, 'patient', 58, '', NULL),
(121, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 12:17:45', '2017-01-18 12:17:45', 1, 0, 'patient', 59, '', NULL),
(122, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 12:19:42', '2017-01-18 12:19:42', 1, 0, 'patient', 60, '', NULL),
(124, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 12:34:10', '2017-01-18 12:34:10', 1, 0, 'patient', 62, '', NULL),
(125, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 12:46:08', '2017-01-18 12:46:08', 1, 0, 'patient', 63, '', NULL),
(128, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 12:55:44', '2017-01-18 12:55:44', 1, 0, 'patient', 66, '', NULL),
(131, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 13:30:06', '2017-01-18 13:30:06', 1, 0, 'patient', 69, '', NULL),
(132, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 13:34:21', '2017-01-18 13:34:21', 1, 0, 'patient', 70, '', NULL),
(151, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-18 15:56:52', '2017-01-18 15:56:52', 1, 0, 'patient', 89, '', NULL),
(152, 35, '44444444444444', 230, 'State *', 'ny', '502  wind song palace', '74550', '2017-01-18 16:44:07', '2017-01-18 16:44:07', 1, 0, 'patient', 90, '', NULL),
(153, 35, '44444444444444', 230, 'State *', 'ny', '502  wind song palace', '74550', '2017-01-18 16:52:17', '2017-01-18 16:52:17', 1, 0, 'patient', 91, '', NULL),
(154, 36, '5033347536', 230, 'OR', 'Lake Oswego', '909 Lee st ', '97034', '2017-01-19 02:10:55', '2017-01-19 02:10:55', 1, 0, 'billing', NULL, NULL, NULL),
(155, 36, '5033347536', 230, 'OR', 'Lake Oswego', '909 Lee st ', '97034', '2017-01-19 02:13:39', '2017-01-19 02:13:39', 1, 0, 'patient', 92, '', NULL),
(156, 36, '5033347536', 230, 'OR', 'Lake Oswego', '909 Lee st ', '97034', '2017-01-19 02:13:40', '2017-01-19 02:13:40', 1, 0, 'patient', 93, '', NULL),
(157, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-19 14:00:42', '2017-01-19 14:00:42', 1, 0, 'patient', 94, '', NULL),
(158, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-19 14:00:44', '2017-01-19 14:00:44', 1, 0, 'patient', 95, '', NULL),
(159, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-19 15:32:53', '2017-01-19 15:32:53', 1, 0, 'patient', 96, '', NULL),
(160, 1, '923337191695', 1, 'AL', 'ny', '502  wind song palace', '74550', '2017-01-19 15:37:11', '2017-01-19 15:37:11', 1, 0, 'patient', 97, '', NULL),
(162, 36, '5033347536', 230, 'OR', 'Lake Oswego', '909 Lee st ', '97034', '2017-01-19 17:50:59', '2017-01-19 17:50:59', 1, 0, 'patient', 99, '', NULL),
(163, 37, '222242224', 230, 'New York', 'New York City', 'address 1', '664421', '2017-03-08 08:30:38', '2017-03-08 08:30:38', 1, 0, 'billing', NULL, 'address 2', NULL),
(164, 38, '222242224', 230, 'New York', 'New York City', 'address 1', '664421', '2017-03-08 09:37:56', '2017-03-08 09:37:56', 1, 0, 'billing', NULL, 'address 2', NULL),
(165, 39, '222242224', 230, 'New York', 'New York City', 'address 1', '664421', '2017-03-08 09:44:37', '2017-03-08 09:44:37', 1, 0, 'billing', NULL, 'address 2', NULL),
(166, 40, '222242224', 230, 'New York', 'New York City', 'address 1', '664421', '2017-03-08 09:50:48', '2017-03-08 09:50:48', 1, 0, 'billing', NULL, 'address 2', NULL),
(167, 41, '222242224', 230, 'New York', 'New York City', 'address 1', '664421', '2017-03-08 09:55:21', '2017-03-08 09:55:21', 1, 0, 'billing', NULL, 'address 2', NULL),
(168, 42, '222242224', 230, 'New York', 'New York City', 'address 1', '664421', '2017-03-08 13:07:03', '2017-03-08 13:07:03', 1, 0, 'billing', NULL, 'address 2', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(190) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(12) DEFAULT 'text',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sortOrder` int(11) NOT NULL DEFAULT '0',
  `code` varchar(10) NOT NULL,
  `canDelete` int(2) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `type`, `created_at`, `updated_at`, `sortOrder`, `code`, `canDelete`) VALUES
(2, 'Sleeve Length', 'dropdown', '2016-02-09 09:35:42', '2016-02-09 10:17:01', 0, '', 1),
(3, 'Onesie or Shirt Size', 'dropdown', '2016-02-09 09:47:51', '2016-02-09 09:48:01', 0, '', 1),
(4, 'Onesie or Shirt Color', 'dropdown', '2016-02-09 09:48:50', '2016-02-09 10:16:50', 0, '', 1),
(5, 'Add Matching Diaper Cover?', 'dropdown', '2016-02-09 13:21:40', '2016-02-12 07:49:10', 0, '', 1),
(6, 'Age', 'dropdown', '2016-02-12 07:50:56', '2016-02-12 07:50:56', 0, '', 1),
(7, 'Tutu Length', 'dropdown', '2016-02-12 07:53:49', '2016-02-12 07:53:49', 0, '', 1),
(8, 'Hair Option', 'dropdown', '2016-02-12 09:50:24', '2016-02-12 09:50:24', 0, '', 1),
(9, 'Type Name or Text', 'textfield', '2016-02-12 09:51:42', '2016-02-12 09:51:42', 0, '', 1),
(10, 'Any Color Change?', 'textfield', '2016-02-12 09:52:47', '2016-02-12 09:52:47', 0, '', 1),
(11, 'ADD CRYSTALS TO TOP?', 'dropdown', '2016-02-12 09:52:59', '2016-02-12 09:52:59', 0, '', 1),
(12, 'COMMENT BOX', 'textfield', '2016-02-12 09:55:36', '2016-02-12 09:55:36', 0, '', 1),
(14, 'Colors', 'dropdown', '2016-04-11 11:15:22', '2016-04-11 11:15:22', 0, 'color', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attributes_values`
--

CREATE TABLE `attributes_values` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `price` float DEFAULT '0',
  `sortOrder` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attributes_values`
--

INSERT INTO `attributes_values` (`id`, `name`, `attribute_id`, `created_at`, `updated_at`, `price`, `sortOrder`) VALUES
(1, 'White', 4, '2016-02-09 09:35:42', '2016-02-12 07:47:13', 0, 0),
(2, 'Black', 4, '2016-02-09 13:31:09', '2016-02-12 07:48:10', 0, 0),
(3, 'NO, THANK YOU', 5, '2016-02-10 08:37:08', '2016-02-12 07:49:25', 0, 0),
(4, 'Short Sleeves Standard', 2, '2016-02-12 07:32:57', '2016-02-12 07:39:28', 0, 0),
(5, 'Short Sleeves (PUFF) add $5.00', 2, '2016-02-12 07:33:03', '2016-02-12 07:39:49', 5, 0),
(6, 'Long Sleeves', 2, '2016-02-12 07:33:11', '2016-02-12 07:39:57', 0, 0),
(8, '6-12 months', 3, '2016-02-12 07:34:18', '2016-02-12 07:46:38', 0, 0),
(9, '12-18 months', 3, '2016-02-12 07:34:28', '2016-02-12 07:42:40', 0, 0),
(10, '18-24 months', 3, '2016-02-12 07:34:42', '2016-02-12 07:42:46', 0, 0),
(11, '2 tee shirt', 3, '2016-02-12 07:34:52', '2016-02-12 07:42:53', 0, 0),
(12, '4 tee shirt', 3, '2016-02-12 07:42:59', '2016-02-12 07:42:59', 0, 0),
(13, '6 tee shirt', 3, '2016-02-12 07:43:05', '2016-02-12 07:43:05', 0, 0),
(14, '8 Tee Shirt', 3, '2016-02-12 07:43:11', '2016-02-12 07:43:11', 0, 0),
(15, '10-12 Tee Shirt', 3, '2016-02-12 07:43:17', '2016-02-12 07:43:17', 0, 0),
(16, '14-16 Tee Shirt', 3, '2016-02-12 07:43:27', '2016-02-12 07:43:27', 0, 0),
(17, 'Pink add $5.00', 4, '2016-02-12 07:48:30', '2016-02-12 07:48:30', 5, 0),
(18, 'Hot Pink add $5.00', 4, '2016-02-12 07:48:47', '2016-02-12 07:48:47', 5, 0),
(19, '6-12 Months add $21.00', 5, '2016-02-12 07:49:38', '2016-02-12 07:49:38', 21, 0),
(20, '12-18 Months add $21.00', 5, '2016-02-12 07:49:53', '2016-02-12 07:49:53', 21, 0),
(21, '18-24 Months add $21.00', 5, '2016-02-12 07:50:04', '2016-02-12 07:50:04', 21, 0),
(22, '3 add $23.00', 5, '2016-02-12 07:50:16', '2016-02-12 07:50:16', 23, 0),
(23, '4 add $23.00', 5, '2016-02-12 07:50:30', '2016-02-12 07:50:30', 23, 0),
(24, 'No Age', 6, '2016-02-12 07:51:22', '2016-02-12 07:51:22', 0, 0),
(25, '1', 6, '2016-02-12 07:51:29', '2016-02-12 07:51:29', 0, 0),
(26, '2', 6, '2016-02-12 07:51:34', '2016-02-12 07:51:34', 0, 1),
(27, '3', 6, '2016-02-12 07:51:41', '2016-02-12 07:51:41', 0, 5),
(28, '4', 6, '2016-02-12 07:51:47', '2016-02-12 07:51:47', 0, 9),
(29, '5', 6, '2016-02-12 07:51:57', '2016-02-12 07:51:57', 0, 11),
(30, '6', 6, '2016-02-12 07:52:09', '2016-02-12 07:52:34', 0, 15),
(31, '7', 6, '2016-02-12 07:52:39', '2016-02-12 07:52:39', 0, 18),
(32, '8', 6, '2016-02-12 07:52:46', '2016-02-12 07:52:46', 0, 21),
(33, '9', 6, '2016-02-12 07:52:52', '2016-02-12 07:52:52', 0, 25),
(34, '10', 6, '2016-02-12 07:53:00', '2016-02-12 07:53:00', 0, 33),
(35, '11', 6, '2016-02-12 07:53:07', '2016-02-12 07:53:07', 0, 55),
(36, '12', 6, '2016-02-12 07:53:16', '2016-02-12 07:53:16', 0, 56),
(37, '13', 6, '2016-02-12 07:53:22', '2016-02-12 07:53:22', 0, 60),
(38, '8.5 inch (3 Years & Under)', 7, '2016-02-12 07:54:09', '2016-02-12 07:54:09', 0, 0),
(39, '10 inches add $5.00', 7, '2016-02-12 07:54:21', '2016-02-12 09:49:48', 5, 0),
(40, '13 inches add $10.00', 7, '2016-02-12 07:54:30', '2016-02-12 09:49:43', 10, 0),
(41, '16 inches add $15.00', 7, '2016-02-12 07:54:40', '2016-02-12 07:57:01', 15, 0),
(42, '18 inches add $20.00', 7, '2016-02-12 07:54:49', '2016-02-12 09:49:38', 20, 0),
(43, 'SHORTY 6 INCH TUTU', 7, '2016-02-12 07:54:58', '2016-02-12 07:54:58', 0, 0),
(44, 'Headband with 6 inch bow', 8, '2016-02-12 09:50:46', '2016-02-12 09:50:46', 0, 0),
(45, '1 Hair Bow On Alligator Clip', 8, '2016-02-12 09:50:59', '2016-02-12 09:50:59', 0, 0),
(46, '2 Hair Bows On Alligator Clips add $5.00', 8, '2016-02-12 09:51:08', '2016-02-12 09:51:08', 5, 0),
(47, 'NO HAIR PIECE', 8, '2016-02-12 09:51:21', '2016-02-12 09:51:21', 0, 0),
(48, 'NO CRYSTALS', 11, '2016-02-12 09:55:05', '2016-02-12 09:55:05', 0, 0),
(49, 'YES, ADD CRYSTALS TO TOP add $10.00', 11, '2016-02-12 09:55:13', '2016-02-12 09:55:13', 10, 0),
(50, 'Red', 14, '2016-04-11 11:16:00', '2016-04-12 17:55:54', 2, 0),
(51, 'Blue', 14, '2016-04-11 11:16:08', '2016-04-11 11:16:08', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `blog_categories`
--

CREATE TABLE `blog_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `url` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_categories`
--

INSERT INTO `blog_categories` (`id`, `name`, `description`, `url`, `created_at`, `updated_at`, `status`, `image`) VALUES
(6, 'Heavy Metals', '', '', '2016-12-09 07:10:00', '2016-12-09 07:10:00', 1, ''),
(7, 'Hormone Balance', '', '', '2016-12-09 07:15:38', '2016-12-09 07:15:38', 1, ''),
(8, 'Is your doctor listening to you', '', '', '2016-12-09 07:17:06', '2016-12-09 07:17:06', 1, ''),
(9, 'Lipid', '', '', '2016-12-09 07:17:36', '2016-12-09 07:17:36', 1, ''),
(10, 'Metabolic Syndrome', '', '', '2016-12-09 07:17:57', '2016-12-09 07:17:57', 1, ''),
(11, 'Thyroid', '', '', '2016-12-09 07:18:16', '2016-12-09 07:18:16', 1, ''),
(12, 'Toxic Air', '', '', '2016-12-09 07:21:44', '2016-12-09 07:21:44', 1, ''),
(13, 'Vitamin D', '', '', '2016-12-09 07:22:15', '2016-12-09 07:22:15', 1, ''),
(14, 'Your Liver', '', '', '2016-12-09 07:22:36', '2016-12-09 07:22:36', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `blog_posts`
--

CREATE TABLE `blog_posts` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `tags` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `teaser` text NOT NULL,
  `comments` int(11) NOT NULL DEFAULT '0',
  `likes` int(11) NOT NULL DEFAULT '0',
  `keywords` varchar(255) NOT NULL,
  `metaDescription` varchar(255) NOT NULL,
  `url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog_posts`
--

INSERT INTO `blog_posts` (`id`, `created_at`, `updated_at`, `status`, `tags`, `user_id`, `name`, `description`, `category_id`, `image`, `teaser`, `comments`, `likes`, `keywords`, `metaDescription`, `url`) VALUES
(24, '2016-12-09 08:16:02', '2016-12-09 10:44:27', 1, 'Heavy Metals, Toxic Air', 1, 'Portland, Oregon a TOXIC AIR MESS', '<h2><a href="http://koin.com/2016/02/24/heavy-metals-in-your-body-theres-a-test-for-that/">Click This Link To See Video Clip</a></h2>\r\n\r\n<h2>It&rsquo;s their dirty little secret!</h2>\r\n\r\n<p>Portland is ranked as one of the top most toxic and polluted cities in America, yet also &nbsp;ranked as the top eco friendly city in America. We can&rsquo;t seem to wrap our fingers around that one. Seems so oxymoronic wouldn&rsquo;t you say? Don&rsquo;t let the pretty green trees and over 92,000 acres of green space for hiking, the overly abundant bicycle riders in every direction, and endless city transit fool you. Portland is also ranked to be one of the most toxic and polluted cities in America with over 2,300 permits filed by industrial facilities such as huge mills and major manufacturing to release heavy metal toxicity into the air for people to breath, and it&rsquo;s all LEGAL. We&rsquo;re talking about hundreds of tons of toxic compounds into the air. Did I mention, Oregon&rsquo;s water ways are also one of the worst in the nation too. This is due to 645 tons of toxic chemicals dumped into waterways each year. To put this into perspective that amount of waste is equivalent to 430 Toyota Prius, please excuse the humor Portland.</p>\r\n\r\n<p>In our air we breathe these toxins which contain Arsenic, Cadmium, Cobalt, and Nickel, among other toxic heavy metals, and there&rsquo;s a lot. The toxic air is of course entered in our lungs and into our blood stream slowly destroying our DNA and future off springs DNA as well. This toxic air is significantly linked to major neurological disorders and cancers, yet the law allows it. &nbsp;And it just so happens to be that the nation&rsquo;s top industrial air polluters are right here in the Portland Metro area, hmm&hellip; go figure. If you&rsquo;re from the Portland metro area, you&rsquo;ve probably heard of Portland&rsquo;s&nbsp;<strong>Precision Cast Parts</strong>, makers of aircraft and engine parts, and&nbsp;<strong>Bulls Eye Glass&nbsp;</strong>manufactures located in SE Portland, to name a few, releasing Cadmium, Arsenic, Cobalt, and roughly 30 other toxic substances but has recently added some better filters according to the Oregonian, yet New Century Labs is still getting back very high levels of Arsenic test results from individuals purchasing our&nbsp; comprehensive&nbsp; heavy metals tests on our website, by collecting random urine tests. This has us very concerned.</p>\r\n\r\n<p>Pointing the finger at just one or two companies &nbsp;is a great start to take action and to start demanding cleaner air for Portland and surrounding areas. Although the media has the SE glass company on its Bulls Eye (No Pun) &nbsp;the exposure to people&nbsp;living around OTHER manufacturing companies, factories, and mills, are just as exposed to the same toxicities &nbsp;for those who live around them, and the Portland Metro area has a lot of industrial &nbsp;manufacturing.</p>\r\n\r\n<p>Testing positive for heavy metals is a major issue, but the question is where should one go who&rsquo;s tested positive for heavy metal exposure, and where do you go for treatment? How about what is the treatment?</p>\r\n\r\n<p>We asked our customers who ordered these tests, who then took their results back to their Medical Doctors, some of which showed their doctors in Kaiser hospital, they said they didn&rsquo;t know exactly what the protocol was for treatment, &nbsp;how to interpret the tests, &nbsp;and said they may want to go see a Naturopathic doctor. We spoke to several Naturopathic doctors and they had loads of information on what to do when there&rsquo;s positive exposure to heavy metals. Apparently heavy metals is a core subject taught in the school of Naturopathic medicine, most MD&rsquo;s who are involved in heavy metal treatment are specialists.</p>\r\n\r\n<p>How about the individual who hasn&rsquo;t tested for heavy metals who should they talk to and where do they go? Although &nbsp;NCL will never&nbsp;&nbsp;give medical advice you should always discuss healthcare issues &nbsp;with your doctor first. &nbsp;However access to lab tests at&nbsp;New Century Labs and getting heavy metal testing has been made easy to access, online, on demand, on your terms.</p>\r\n\r\n<p>We decided to do some digging and &nbsp;called the Oregon Health Authority at 1-800-273-0557 they told us to call the EPA. The EPA, what&hellip; why?? We asked them specific questions about how one can get a test and what the cost would be, even asked who the diagnostic companies were offering testing. Of course they had no answer, and no protocol in place, yet they get several calls per day regarding this question.</p>\r\n\r\n<p>Although I was disappointed with their answers we found more resources&ndash;I&rsquo;m on to something! Multnomah County Health Department, they should know! We asked them the same questions were asked, although we got better answers, access to obtaining Heavy metal tests sounded daunting, yet they also didn&rsquo;t know who the diagnostic testing providers were, and couldn&rsquo;t answer how much it would cost, the tests weren&rsquo;t free even if you worked in Bulls Eye Glass and were exposed every day!</p>\r\n\r\n<p>Its seems that the main focus with city, county, and government officials has not &nbsp;been so focused on&nbsp;&nbsp;peoples questions and concerns about getting tests, especially people who cannot afford them, and what to do when you test positive for heavy metals.&nbsp;When we called the Oregon Health Authority we were put on hold for 30 min, and 20 minutes with the county health clinic, and that&rsquo;s just on the phone. Now you have to drive there, sit in the waiting room, pay your co-pay and then see the doctor for 5 min who may or may not give you a lab order for a metals test.</p>\r\n\r\n<p>As much as government officials have tried to provide resources, we believe the resources are simply not enough and very frustrating for many.</p>\r\n\r\n<p>New Century Labs is a private company located in the heart of Lake Oswego, our business is digital, automated, and extremely efficient. Folks concerned about heavy metal tests can order labs from our website, or by simply calling us at 1-800-519-2997 to place an order. If you cannot afford a test we will work with you to make sure you get your tests done ASAP.</p>\r\n\r\n<p>NCL is far more efficient, we can create a lab order and email it to you fast, sometimes within minutes, and you can visit one of our affiliated patient service centers to get your labs done without making an appointment. Your results are emailed back to you in 5 business days or less. You can then take your lab test results and start having a meaningful conversation with your doctor.</p>\r\n\r\n<p>Our goal at NCL is to break apart from the traditional system of obtaining lab tests. This means giving people access to labs on demand when they want it, lowering the price up to 90% off and showing transparency with no surprise bill, all while performing these tests at the highest diagnostics quality, we choose to work with Quest Diagnostics. You have resources now, we&rsquo;re looking forward to serving you at NCL as your preferred source&nbsp;for lab testing.</p>\r\n\r\n<p>&nbsp;</p>\r\n', 6, '8431481271392.jpg', 'Portland is ranked as one of the top most toxic and polluted cities in America, yet also  ranked as the top eco friendly city in America. ', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Portland, Oregon a TOXIC AIR MESS'),
(25, '2016-12-09 09:34:10', '2016-12-09 13:59:49', 1, 'Arsenic, cadmium, Heavy Metals', 1, 'Heavy Metals Making Air Toxic to Health in Portland, Oregon', '<p>When the state of Oregon advises residents not to eat the food from their backyard gardens, people tend to take notice. And for good reason. Results of tests for Arsenic, Cadmium and Nickel in the air near glass manufacturing plants in Southeast Portland were so high that the businesses voluntarily stopped using some of the chemicals to make glass that are toxic, and have pledged to continue to work with the Oregon Department of Environmental Equality. Arsenic levels in the air were at 159 times the state&rsquo;s air safety benchmark. The city has hosted several community meetings for the public, but at the end of the day residents are left to wonder, &ldquo;Has my family been exposed?&rdquo;&nbsp;Not to mention &ldquo;where do I go to get tested?&rdquo;</p>\r\n\r\n<p>Human exposure to arsenic by inhalation has been shown to be strongly associated with lung cancer. Chronic exposure even at small amounts has been attributed to Diabetes. And no wonder the state is telling us not to eat the vegetables from our gardens because of possible soil toxicity: ingestion of inorganic Arsenic by humans has been linked to a form a skin cancer and also to bladder, liver and lung cancer. The EPA has classified inorganic arsenic as a human carcinogen. Nickel is also toxic, resulting in slight skin irritations to more serious issues such as gastrointestinal distress as well as neurological effects.&nbsp; Chronic exposure to nickel can cause issues such as respiratory failure, heart disorders, asthma and chronic bronchitis, plus an increased risk of cancer of the lung, larynx, nose and prostate.</p>\r\n\r\n<p>Exposure to heavy metals can have very serious consequences, especially when children are exposed. For example, young children are more susceptible to the effects of lead exposure because they absorb several times the percent ingested compared with adults and because their brains are more plastic and even brief exposures may influence developmental processes. You and your children could be exposed without even knowing it. The only way to detect this is through a urine test, called a Comprehensive Heavy Metals Panel, which shows past exposure over the course of a day or two. Although more expensive, a hair strand test will show exposure over 6 to 12 months. Oregon health officials, in a show of how serious this is, have offered to pay for testing residents&rsquo; urine for heavy metals if they cannot afford it themselves. Through a doctor&rsquo;s office, insurance will sometimes pay for testing. However, if there are no symptoms, they may deny the claim and pay nothing. Thankfully there is another, less expensive option, through New Century Labs.</p>\r\n\r\n<p>Our Comprehensive&nbsp;<a href="https://newcenturylabs.com/product/heavy-metals-comprehensive-panel-u">Heavy Metals Panel&nbsp;</a>covers 7 metals, including&nbsp;<strong>Cadmium, Arsenic, Lead, Mercury, Thallium, Creatinine, and Cobalt</strong>&nbsp;among others listed individually, for just $299 with an additional discount for the month of March by entering coupon code TOX2016. Find out if you or your loved ones have been exposed and check out our full line of<a href="https://newcenturylabs.com/shop?sa_product_cat=128">&nbsp;heavy metal tests.</a></p>\r\n\r\n<p>The moral of our store is what you can&rsquo;t see CAN hurt you!</p>\r\n', 6, '4011481291989.jpg', 'When the state of Oregon advises residents not to eat the food from their backyard gardens, people tend to take notice.', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'HEAVY METALS MAKING AIR TOXIC TO HEALTH IN PORTLAND, OREGON'),
(26, '2016-12-09 10:41:37', '2016-12-09 10:41:37', 1, 'Hormone Balance', 1, 'The key to health is hormone balance', '<p>Did you know your personality, your mood, your outlook in life, what we aspire to be, everything that sets that spark to motivation, our ability to combat unwanted diseases all&nbsp;stem from&nbsp;hormones&ndash; hormones,&nbsp;ideally, regulate who we can optimally be.&nbsp; If your hormones are off balance it can dramatically have an effect on your work performance, relationship, mental health and it can set the stage for&nbsp;disease.</p>\r\n\r\n<p>The commonly known glands that regulate our hormone system are the thyroid glands, the ovaries in women, the testicles in men, the adrenal glands in the belly, in addition to the pituitary in the head. Hormones act as messengers that move through the blood into tissues, where they act to regulate every process in the body, including emotions. Put simply, they regulate your general health and overall well-being.</p>\r\n\r\n<p>Hormones have individual effects on the body. They also interact with each other to produce dramatic effects in the body. Due to these interactions, they can trigger drastic reactions in multiple body systems.</p>\r\n\r\n<p>Hormones should work in harmony with each other as they affect every day health and well-being. Body systems are stable when hormone balance exists. When balance is lost, hormone deficiencies and excesses cause serious disorders and increased risk of diseases.</p>\r\n\r\n<p><strong>Female Hormones</strong></p>\r\n\r\n<p>Besides their role in reproduction,&nbsp;<strong><a href="https://newcenturylabs.com/product/estrogen-total-serum/">estrogens&nbsp;</a></strong>are important in maintaining healthy reproductive tissues, breasts, skin, and the brain. Progesterone is often described as &ldquo;the hormone balancer&rdquo;, particularly of the estrogens in your body. Progesterone enhances the known benefits of estrogen, while preventing problems related to having too much estrogen.</p>\r\n\r\n<p><strong>Male Hormones</strong></p>\r\n\r\n<p>Testosterone is the major male hormone produced in the testicles. Excess production of estrones (an estrogen) relative to testosterone is known to contribute to the development of prostate problems. Most scientists now agree that estrogen dominance is the cause of both prostate and breast cancers.</p>\r\n\r\n<p><strong>The Adrenal Glands</strong></p>\r\n\r\n<p>The adrenal glands produce three types of steroid hormones: glucocorticoids (cortisol), mineralocorticoids (aldosterone), and androgens.</p>\r\n\r\n<p><strong>Glucocorticoids</strong>&nbsp;enable the body to respond and adapt to daily life stresses like emotional distress, exercise, trauma, illness and starvation. Cortisol, for example, plays a vital immune function role, to defend the body against bacterial or viral infections. However, continuous excessive levels of cortisol suppress the immune system leading to frequent infections.</p>\r\n\r\n<p>Aldosterone maintains the body&rsquo;s salt and water levels.</p>\r\n\r\n<p>Androgens, such as&nbsp;<a href="https://newcenturylabs.com/product/dhea-dehydroepiandrosterone-unconjugated/"><strong>DHEA</strong></a>, testosterone and androstenedione, play an important role in the regeneration of body tissue, especially in the skin, bones and muscles. DHEA levels decline gradually as a person ages.</p>\r\n\r\n<p>For women, the adrenal glands are the major source of testosterone. Testosterone plays a role in the maintenance of lean body mass, bone density, skin elasticity, sex drive and cardiovascular health for both men and women.</p>\r\n\r\n<p>Adrenal imbalance can contribute to nervous and immune system dysfunction, weight problems, blood sugar irregularities, and high androgen levels.</p>\r\n\r\n<p><strong>Female Hormone Imbalance</strong></p>\r\n\r\n<p>Follicle-stimulating hormone (FSH) is a gonadotropin hormone secreted by the pituitary glands in the brain. FSH regulates the development, growth, and maturation of the female body. FSH and luteinizing hormone (LH), also secreted by the pituitary glands, work together in regulating the reproductive process.</p>\r\n\r\n<p>The ovaries produce many hormones. The most influential hormones are the estrogens (many hormones in this range) and progesterone, which interact to coordinate a woman&rsquo;s menstrual cycle during her reproductive years, along with testosterone. FSH and LH trigger hormone production in the ovaries.</p>\r\n\r\n<p>When any of the above hormones are imbalanced, symptoms may occur. Imbalances are most common during puberty and menopause, but can occur at any age. Imbalances can have far-ranging effects on the body, producing a variety of physical, emotional and cognitive changes. These changes cause symptoms like:</p>\r\n\r\n<ul>\r\n	<li>Irregular and or painful periods.</li>\r\n	<li>Periods that are longer, shorter, heavier or lighter than normal.</li>\r\n	<li>Hot flashes and night sweats.</li>\r\n	<li>Insomnia and other sleep disturbances.</li>\r\n	<li>Diminished sex drive.</li>\r\n	<li>Decreased fertility.</li>\r\n	<li>Vaginal dryness.</li>\r\n	<li>Irritability and mood swings.</li>\r\n	<li>Depression and/or anxiety.</li>\r\n	<li>Difficulty with concentration and/or memory, a symptom often described as &ldquo;brain fog.&rdquo;</li>\r\n	<li>Fatigue.</li>\r\n	<li>Unexplained weight gain, especially in the abdominal area, hips and thighs.</li>\r\n	<li>Skin changes, such as acne, thinning, dryness, oiliness and wrinkling.</li>\r\n	<li>Dry, brittle hair or loss of hair.</li>\r\n	<li>Loss of bone mass and muscle mass.</li>\r\n	<li>Bloating.</li>\r\n	<li>Excess facial and body hair.</li>\r\n	<li>Tender or fibrocystic breasts.</li>\r\n	<li>Urinary incontinence.</li>\r\n</ul>\r\n\r\n<p>If left untreated, female hormone imbalances can increase a woman&rsquo;s risk of developing diseases like heart disease and osteoporosis.</p>\r\n\r\n<p><strong>Male Hormone Imbalance</strong></p>\r\n\r\n<p><strong>Low testosterone and high estrogen</strong>&nbsp;is more and more found in men who go through hormone tests. Common symptoms are:</p>\r\n\r\n<ul>\r\n	<li>Excess weight, especially around the breasts, hips and abdomen.</li>\r\n	<li>Low libido, infertility and erectile dysfunction.</li>\r\n</ul>\r\n\r\n<p>If left untreated, this imbalance increases the risk of stroke and heart attack because of an increased risk of clotting. It also increases the risk of prostate cancer.</p>\r\n\r\n<p><strong>Low Testosterone</strong>&nbsp;causes:</p>\r\n\r\n<ul>\r\n	<li>Muscle weakness and poor recovery from exercise.</li>\r\n	<li>Fatigue and lack of energy.</li>\r\n	<li>Mood changes and depression.</li>\r\n	<li>Weak bones and osteoporosis as one ages.</li>\r\n</ul>\r\n\r\n<p><strong>Your Health Problems May be Caused by Hormone Imbalance</strong></p>\r\n\r\n<p>As you can now understand, hormones play a critical role in how we act, feel, and think. You also understand that many of today&rsquo;s health problems can be attributed to&nbsp;<em>hormone imbalance</em>. Whether you&rsquo;re trying to lose weight, avoid illness, or enhance cognitive focus, imbalanced hormones may be the first area you check. Your aim is to recreate hormone balances.</p>\r\n\r\n<p><strong>How a Hormone Test Can Help You</strong></p>\r\n\r\n<p>Many people have benefited from thyroid tests which have indicated an imbalance which has caused difficulty in weight loss. A simple blood test will help you too to discover if you have an imbalance somewhere. This will help your doctor to diagnose the cause of many of the health problems you may be having. As a result, you&rsquo;ll have a strong basis for correcting the imbalance through the use of diet, exercise or hormone supplementing.</p>\r\n\r\n<p>Take control of your health today. A simple blood test is the important initial step in determining if you are out of balance. You can take full advantage of the hormone tests that New Century Labs offer. New Century Labs offer direct-to-consumer tests, giving you full control of your health.</p>\r\n\r\n<p>Should the results indicate imbalance, you can take your test results to a doctor who can then prescribe a course of treatment. After you have begun your treatment program, a subsequent test can help you determine how effective your treatment is.</p>\r\n\r\n<p>You do not need to see your doctor first in order to have a test. If you have any of the symptoms listed above, you can order a test on our website. No need to wait in the queue and pay doctor&rsquo;s fees. You also avoid rejection of your claims by your insurance.</p>\r\n\r\n<p><strong>Our Tests are Affordable!</strong></p>\r\n\r\n<p>Our tests cost far less than you would pay if you went via your doctor&rsquo;s office. Our prices are highly discounted between 50% and 85%! The cost is so low&nbsp;and fully transparent&ndash;no surprise billing and now health insurance required.</p>\r\n\r\n<p><strong>Order a Test Today!</strong></p>\r\n\r\n<p>You can order your Hormone panels at the link below and get your results in 72 hours! No doctors order, no Co-pay and no germy clinics.</p>\r\n\r\n<h2><strong><a href="https://newcenturylabs.com/product-category/comprehensive-health-panels/">Comprehensive Hormone Panels</a></strong></h2>\r\n\r\n<p><strong>Easy to Order too!</strong></p>\r\n\r\n<p>Click on the link below to see&nbsp;what Kim had to say about her experience:</p>\r\n\r\n<h2><strong><a href="https://www.youtube.com/watch?v=TlNw-ybTo-w">Kims Experience</a></strong></h2>\r\n', 7, '7881481280097.jpg', 'Did you know your personality, your mood, your outlook in life, what we aspire to be, everything that sets that spark to motivation, our ability to combat unwanted', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests, ', 'New Century provides low cost medical lab tests online across the United States.', 'The key to health is hormone balance'),
(27, '2016-12-09 10:55:19', '2016-12-09 14:08:41', 1, 'Advanced Lipid Profile Test, Cardio IQ, Diabetes, Healthcare, Heart Disease, Lab, Lipid, Proactive, Stroke, thyroid', 1, 'Creating a more meaningful relationship with your provider', '<h2>Your physician should provide you with necessary resources to enhance your health.</h2>\r\n\r\n<p>Let&rsquo;s face its 2016, you don&rsquo;t need to drive to a local video store to rent a movie, you can sit on your couch and order one. You can pull out your cell phone and order an UBER within minutes anywhere you want. If you want to buy retail products, you can do so online from Amazon and have it delivered to you the very next day&mdash;this type of demand service is what we are now accustomed to. We can go on and on with companies who have identified problems in the market place who has found better quicker solutions for the consumer. But what about healthcare, and how has healthcare adapted to our current expectations, and how is healthcare system as a whole been identifying ways to help patient&rsquo;s rid disease? Identifying patient&rsquo;s frustrations and finding solutions has been improving, yet not at the same pace to modern times.</p>\r\n\r\n<p>There were over 52,000 applicants who applied for med school in 2015, up over 6% from the prior year, According to the Association of American Medical Colleges. The average time to be a practicing MD independently, after residency, is typically another 4 years. If you&rsquo;re one of those who got accepted in Med school in 2016, chances are by the year 2024 Healthcare technology will be more innovative and technologically advanced. The question is how do we measure success rates for innovative technology in the world of healthcare, is it less heart attacks, less cancer, less diabetes, less obesity, or better disease management? We believe the focus will continue to be better disease management and life saving devices to aid a heart attack and stroke victims, respiratory difficulties, and other lifesaving technologies for acute trauma.</p>\r\n\r\n<p>The reality is people are living longer, but living with a chronic disease. Rather than dying from your disease, you can just live with it. pharmaceutical technology has scientifically created the ability to keep you living as long as possible, but with other potential side effects&mdash;you could need other pharmaceutical drugs to manage your symptoms from side effects.</p>\r\n\r\n<p>Example let&rsquo;s talk about the number #1 type of drug in the market known to lower cholesterol and prescribed by your doctor. According to the&nbsp;<a href="http://www.cdc.gov/cholesterol/treating_cholesterol.htm">CDC&nbsp;</a>if you previously had a heart attack or stroke, a Statin drug is given to you if your LDL cholesterol (Bad Cholesterol) level is 190 mg/dL or higher. You are 40&ndash;75 years old with diabetes and LDL cholesterol of 70 mg/dL or higher. You are 40&ndash;75 years old with a high risk for developing heart disease or stroke and LDL cholesterol of 70 mg/dL or higher. These cholesterol lowering drugs are known as statins do come with potentially harming side effects side effects to your health.</p>\r\n\r\n<p>Although we see many of these technological advancements as necessary tools to aid physicians not only to practice medicine but to manage chronic disease, at the end of the day YOU are the ultimate decision maker as to how you want to live your life. Are your comfortable popping drugs every day, or do you want to take charge of your life be 100% committed to your healthcare and avoid the possibility of being a pill popper. You have the choice to either empower yourself and become more involved with your healthcare by making healthy choices, or you can put yourself at risk of falling prey to potential disease. Think of disease as a robber, a home invader. If you leave the door unlocked, you are opening up the possibility of a criminal entering your home. Likewise, with disease, if you do the very best by maintaining a healthy proactive life style it makes disease very difficult to invade your body. We believe that most diseases start by lacking self-awareness, and education. Sometimes education isn&rsquo;t that easy to access, so we&rsquo;re here to provide you some knowledge as to how one may start.</p>\r\n\r\n<p>We think that providing patients with as many resources as possible can be the best advancement in healthcare and it starts with &ldquo;you&rdquo; and your physician. Both of you need to have a vested interested in your health. The average time a patient spends with their doctor is less than 15 minutes and patients are rushed out the door. What makes matters worse, patients are not offered the correct medical laboratory tests because health insurance companies are reluctant to cover claims. Even though 70-80% of all clinical decisions stem from lab testing, and disease strikes before a symptom appears. One of the only times your health insurance company will cover your lab tests are when you&rsquo;re symptomatic, or during your annual physical with a limited number of labs.</p>\r\n\r\n<p>We believe that the core fundamentals of our healthcare system is dependent on lab testing. Physicians absolutely cannot make a guaranteed diagnosis without the aid of a lab test result, in addition to keeping up to date with new and proven scientific research. Take your normal lipid panel that calculates your total cholesterol, LDL, HDL and Triglycerides. This basic test was invented over 40 years ago and is the gold standard for detecting cardiovascular disease. Even though statistic show that 50% of patients who end up in the ER for heart attacks had normal cholesterol results, yet there are more advanced cholesterol tests like&nbsp;<a href="https://newcenturylabs.com/product/cardio-iq-advanced-lipid-panel">Cardio IQ Advanced Lipid Profile Test&nbsp;</a>that measures your Cholesterol particle size, however this test is not ordered by physicians and insurance doesn&rsquo;t normally cover it. Even though this test has much more clinical utility than the standard lipid test and helps aid the practitioner in the right direction, it&rsquo;s not ordered as often as it should.</p>\r\n\r\n<p>How about physicians not ordering thyroid panels for their patients where medical scientific research has proven that abnormal thyroid results could be the reason of very high cholesterol. The reality is when your doctor orders you the wrong tests, or tests they think you don&rsquo;t need, they may be putting you at risk. Perhaps you really didn&rsquo;t need that statin drug after all, maybe it was just your thyroid that need to be worked on.</p>\r\n\r\n<p>Institutionally physicians do not have a very good platform to match lab tests to symptoms, and lab testing isn&rsquo;t taught heavily in Med School, also insurance companies have so much weight on access and cost, and big Pharma has major influence as well too. How do you get out of this muck. The answer is simple, READ! Use the internet to your advantage, 70% of google searches have to do with healthcare related topics, ask your doctor why the ordered those tests and have them explain in detail how they are determining diagnosis and prognosis&mdash;at the end of the day it&rsquo;s your body, not theirs!</p>\r\n\r\n<p>The power is in your hands, leverage all the creditable resources out there to your advantage, if insurance and your doctor are denying you lab tests you think you need, seek all other alternatives, never take &ldquo;NO&rdquo; for a final answer, it can mean the difference between life or death.</p>\r\n\r\n<h2>NCL has a solution for you and your Doctor</h2>\r\n\r\n<p>Although the intention for the last hundred years has been to rid disease completely, this is just not the reality. As doctors have the advanced tools&nbsp;at their disposal, so do you. You can now order your own lab tests any day, any time, 24 hours a day, 7 days per week from your PC, or your cell phone, &nbsp;passing all the hurdles it takes to living a proactive lifestyle, and bypassing your insurance company denying you lab test claims. NCL has contracted with major diagnostic laboratories nationally allowing you access to over 8,000 lab tests from 50-90% off, on demand, on your terms! Your physician already knows this and needs to communicate this to you. Most people don&rsquo;t know you can order a lab test online. Communication with your doctor is key to better health, and ordering your own lab tests can be a tool for your doctor if insurance is out of the picture.</p>\r\n\r\n<p>New Century Labs has also contracted with physicians throughout the United States offering a unique platform for physicians to order blood work for their patients who either have no insurance, a high deductible,&nbsp;and when health&nbsp;insurance does not cover. We have found that at least a third of the patient need to pay cash for their lab tests and offering such services at extremely discounted prices has been seen as a useful tool for doctor and patient relationships. We have received calls from both physicians and patients who have expressed how much easier it is to be treated for health issues when access is available and pricing is low.</p>\r\n\r\n<p>When you want a lab test, you won&rsquo;t need to call your doctor&rsquo;s office and make an appointment, which could take weeks, wait in the waiting room with other sick patients, pay your co pay and doctors fee. You can have full control to order lab tests and become more proactive, taking charge of your health. This should be one of the answers to solving our healthcare crisis and identifying solutions to get patients more in control of their health. Allowing you the freedom and access to critical information about your body is critical so that communication with your doctor can become more meaningful. At the end of the day your doctor has the final say as to the right diagnosis, medication and prognosis by using lab test results as an aiding tool, so isn&rsquo;t it better to have the necessary tools at your disposal? NCL does several thousand lab tests per month from individuals who want answers about their body and we believe that proactive healthcare starts at the core fundamentals of diagnostic testing.</p>\r\n\r\n<p>Let us serve you with information that matters most to you!</p>\r\n', 8, '6871481292520.jpg', 'Your physician should provide you with necessary resources to enhance your health. ', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Creating a more meaningful relationship with your provider'),
(28, '2016-12-09 11:18:17', '2016-12-09 11:42:03', 1, 'Lipid', 1, 'Why You Should Stop Getting Standard Lipid Tests', '<h2>Did you know that 50% of patients who wind up in the ER for heart attacks all had normal cholesterol results?</h2>\r\n\r\n<p>But I thought a normal cholesterol test meant I have a healthy heart, after all the results came back normal, right?</p>\r\n\r\n<p>Here&rsquo;s some hard facts, the standard lipid test was invented over 40 years ago, yet it&rsquo;s still used today as the gold standard to determine heart health, yet heart disease continues to be the leading cause of Death in America, causing 1 in every 3 deaths in the United States.<br />\r\nOne in every American Dies of cardio vascular Disease every 40 seconds, 635,000 Americans will have a heart attack every year, 280,000 Americans per year will have a recurrent heart attack, thus resulting in a massive spending influx on heart related issues.</p>\r\n\r\n<p>When results that come back with higher than normal cholesterol levels the standard protocol is to give a patient one of six prescription drugs potentially used to lower cholesterol levels, such as Lipitor or Crestor, so why the increase in our overwhelming population of heart attacks?<br />\r\nHowever, many doctors are still scratching their heads and still prescribing patients to take the standard cholesterol test, which won&rsquo;t detect which drug is the best for therapy, unless however, a more advanced lipid profile test is utilized such as The Cardio IQ created by Quest Diagnostics or the advanced LLP Plus test by SpectraCell. Both of which can actually hone in on how, why, where, and what treatment plan is needed to help save your heart from disease.</p>\r\n\r\n<p>What Advanced lipid profile tests measure are The LDL particle number, Small, Medium, large, and the LDL pattern (A or B), in addition to your LDL peak size, Apoliprotein B and Lipoprotein (a). This information could potentially save your life and can help you get back to a better state of heart health by picking the right pharmaceutical therapy prescribed by your doctor.</p>\r\n\r\n<p>The reality is disease happens to everybody before symptoms first appear; just because you&rsquo;re not symptomatic doesn&rsquo;t mean your clear of health related issues. NCL wants you to take charge of your health early, not after the fact where solutions become scarce.&nbsp;<a href="http://newcenturylabs.com/product/cardio-iq-advanced-lipid-panel">Advanced lipid profile tests&nbsp;</a>today have made it easier than ever to catch potential heart disease early helping you take immediate action with your doctor.</p>\r\n\r\n<p>We believe if more doctors offered advanced lipid profile tests to patients, and insurance companies paid for them more frequently, Americans facing heart related risks would have a higher probability of avoiding heart attacks.</p>\r\n\r\n<p><strong>So what&rsquo;s been the set back? Pricing, accessibility, INSURANCE COMPANIES.</strong></p>\r\n\r\n<ul>\r\n	<li>Did you know even if you have insurance and met your deductibles your lab test may not be covered?</li>\r\n	<li>This is why Americans are constantly let down when the thought of being proactive about healthcare comes to play&ndash; we get slammed with a big denial when we&rsquo;re not symptomatic. Sounds a bit odd.</li>\r\n	<li>Wouldn&rsquo;t health insurance companies want you to request advanced testing to avoid a major healthcare payout?</li>\r\n</ul>\r\n\r\n<p>As puzzled as we are,&nbsp;<a href="http://www.newcenturylabs.com/" target="_blank">www.newcenturylabs.com</a>&nbsp;eliminates all the middlemen, making access to&nbsp;<a href="http://newcenturylabs.com/product/llp-plus">life saving tests</a>more affordable and accessible, saving patents health, money and eliminating&nbsp;the feeling of uncertainty.</p>\r\n\r\n<p>When you&rsquo;re given the freedom to access vital information; when answers are no longer scares, healthy actions immediately follow. Become proactive and order lab tests on demand, on your terms!</p>\r\n', 9, '7881481282297.jpg', 'Did you know that 50% of patients who wind up in the ER for heart attacks all had normal cholesterol results?', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests, ', 'New Century provides low cost medical lab tests online across the United States.', 'Why You Should Stop Getting Standard Lipid Tests'),
(29, '2016-12-09 11:49:05', '2016-12-09 12:33:32', 1, 'Cancer, Diabetes, Heart Disease, Stroke', 1, 'Metabolic Syndrome', '<h1>The leading pathways to Death</h1>\r\n\r\n<h2>And simple examples to combat these killer illnesses.</h2>\r\n\r\n<p><a href="http://www.medicinenet.com/metabolic_syndrome/article.htm">Metabolic Syndrome</a>&nbsp;is the name for a group of risk factors that raises your risk for<a href="http://www.heart.org/HEARTORG/Conditions/More/MyHeartandStrokeNews/Coronary-Artery-Disease---Coronary-Heart-Disease_UCM_436416_Article.jsp#.V4GeC4-cGhc">&nbsp;Heart Disease</a>,&nbsp;<a href="http://www.diabetes.org/diabetes-basics/type-2/?loc=db-slabnav">Diabetes</a>, stroke&nbsp;and other diseases, known in America as the leading causes of Death.</p>\r\n\r\n<p>The term &ldquo;Metabolic&rdquo; refers to all the processes in your body working together to create the energy that keeps you going. Now, let&rsquo;s link in your metabolism. Your metabolism is the rate at which your body&rsquo;s many processes function, and it can be low, high, or somewhere in the middle. When you&rsquo;re younger and more active, your metabolism can be high, making it easy to lose weight, but as you get older your metabolism slows down and you might put on a few extra pounds. Exercising will speed up your metabolism, and so does a good diet! Many factors come into play for high and low metabolism in people, so let&rsquo;s break this down even further. Compare a person who has a lot of fat under their skin vs someone who has a lot of muscle under their skin, those who have more muscle actually increase the number of calories they burn; &nbsp;on average it comes&nbsp;to&nbsp;6-10 calories per pound of muscle you gain, while one pound of fat burns about two calories per day at rest. Fat is not a great physical state to be in, and we&rsquo;re not just talking looks. Being overweight actually makes it harder to be healthier which means you will have to work 10x harder than someone with less body fat.</p>\r\n\r\n<p>Before we start selling you on exercise we want to circle back to &ldquo;<a href="http://www.medicinenet.com/metabolic_syndrome/article.htm">metabolic syndrome</a>&rdquo; to demonstrate two life styles which&nbsp;act as a&nbsp;magnet to&nbsp;<a href="http://www.medicinenet.com/metabolic_syndrome/article.htm">metabolic syndrome&nbsp;</a>and a deterrent to Metabolic syndrome, so let&rsquo;s talk about Bob and Jack:</p>\r\n\r\n<p>Jack is not a healthy diet extremist, but he maintains a healthy balanced diet, avoiding as much dairy out of his diet, eats his fruits and veggies with lean grass fed beef and chicken and gets his vitamins and minerals from supplements. He has a 9-5 job, but takes walks during his lunch break. Takes the stairs avoiding&nbsp;elevators&nbsp;to burn those calories, and doesn&rsquo;t let the daily stress of work, family life, and driving in traffic stress him out. He&rsquo;s proactive with his health care and checks in with his Doctor for routine and preventative checkups. Gym time is his time to unwind and release stress, he doesn&rsquo;t have a $200 a month gym membership its got everything he needs and Jack follows a stringent exercise routine from a great<a href="http://jcarlosfitlab.com/">&nbsp;exercise program</a>&mdash; water and whey protein are by his side. Jack also focuses on exercising his brain by simply reading and learning new things, laughing with friends and is always up for a good hike in the mountains. Jack loves his life and life around him.</p>\r\n\r\n<p>Bob is also a go get&rsquo;em type of guy, he&rsquo;s known as a take charge guy at work and loves his job. He has a 9-5 job like Jack with a family and also has his daily routine. Bob claims he prefers to live for the &ldquo;now&rdquo; so he doesn&rsquo;t have to stress about the future. At lunch Bob can easily eat cheese burgers and pizza every day with no regrets. Bob admits he can be a workaholic and prefers to eat at his desk. No time for the gym he says and weekends are just a stay at home event watching sports. Bobs wife is concerned for his health but Bob claims he will see his doctor when he has time. Bob stands 5ft&nbsp;11&Prime;&nbsp;tall and weighs over 285 pounds. He says his energy and concentration is best utilized while he is sitting and feels out of breath when he goes on walks, let alone the stairs.</p>\r\n\r\n<p>The reality is you have a choice in life you can be like Bob, or like Jack. You can live for the moment, or prepare for the future. You can be proactive, or reactive and hope for the best. You can leverage the internet for knowledge about ways to make healthy life style changes or you can sit on the couch and watch sports for 8 hours a day.</p>\r\n\r\n<p>The common denominator with Bob is behavioral avoidance with the most common excuse &ldquo;I don&rsquo;t have time, I&rsquo;m too tired, &ldquo;eating unhealthy is too easy to access&rdquo;, sitting at a desk is easier than taking a walk. Unlike Bob, Jack makes it a habit to show up and persevere with daily activities; in a nut shell this motivates Jack to continue to make healthier life style changes.</p>\r\n\r\n<p>Jacks metabolism is working at a much higher rate making weight gain difficult to enter. He pumps his heart at the gym and moves blood flow through his arteries. His diet is low on sugar and high on fiber, forgiving his pancreas from over working and reducing the risk of diabetes. His stress levels are low reducing a spike in cortisol levels, combating high blood pressure. His doctor orders lab tests and Jack likes to track his lab test results to prior lab tests, &nbsp;making sure his blood chemistry levels are optimal.</p>\r\n\r\n<p>The path that Bob has chosen&nbsp;will one-day surprise himself and his family with disease, as Bob likes to live for the now and not the future, even though Bobs Doctor advised him that disease strikes before symptoms appear.&nbsp; Bobs diet is causing mini cholesterol particles to hit his arterial wall, potentially leading to a heart attack and stroke. His choice to be inactive is also causing limited blood flow throughout the body, making it easier to kill off his ability to fight off&nbsp;health risks and welcome disease.</p>\r\n\r\n<p>Bob is now entering the deadly path of&nbsp;<a href="https://www.heart.org/HEARTORG/Conditions/More/MetabolicSyndrome/Prevention-and-Treatment-of-Metabolic-Syndrome_UCM_301927_Article.jsp">Metabolic Syndrome</a>. NCL wants to be very clear with our readers that neglecting your health is no different than walking through a war zone and expecting nothing will happen to you. When you neglect your health, you welcome every opportunity for disease to strike, and its not just you who suffers. Your family and friends, your health insurance premiums, in addition or health insurance premiums across the board. The four leading causes of death in America&nbsp;are&nbsp;Heart disease, Diabetes, Stroke and Cancer. All of which can be eliminated by simply making an immediate behavioral change. Become more proactive minded and less reactive minded.</p>\r\n\r\n<p>It&rsquo;s never too late to make healthier choices, so work on getting that higher metabolism, change your mind set, check your blood chemistry levels often, get to know the real you from inside out and be positive with yourself and others and make it a habit!</p>\r\n\r\n<p>We always strive to be the best quality Lab Service for&nbsp;all your lab testing needs, so&nbsp;let us&nbsp;make this experience comforting and empowering.</p>\r\n\r\n<p>New Century Labs believes&nbsp;proactive healthcare is the best health care and it starts&nbsp;at the core fundamentals of diagnostic testing.</p>\r\n\r\n<p>Order your&nbsp;<a href="https://newcenturylabs.com/product/diabetes-risk-panel-with-score">Diabetes Risk Panel which comes with an 8 year risk of developing diabetes for only $29.00</a></p>\r\n\r\n<p>Test Includes:</p>\r\n\r\n<ol>\r\n	<li>Cardio IQ&reg; Glucose</li>\r\n	<li>Cardio IQ&reg; Hemoglobin A1c</li>\r\n	<li>Cardio IQ&reg; Cholesterol, Total</li>\r\n	<li>Cardio IQ&reg; HDL Cholesterol</li>\r\n	<li>Cardio IQ&reg; Triglycerides</li>\r\n	<li>Cardio IQ&reg; Non-HDL</li>\r\n	<li>Calculated Components</li>\r\n	<li>Cardio IQ&reg;&nbsp;<strong>8 Year Diabetes Risk!</strong></li>\r\n</ol>\r\n', 10, '9971481286812.jpg', 'Metabolic Syndrome is the name for a group of risk factors that raises your risk for Heart Disease, Diabetes, stroke and other diseases, known in America as the leading causes of Death.', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Metabolic Syndrome');
INSERT INTO `blog_posts` (`id`, `created_at`, `updated_at`, `status`, `tags`, `user_id`, `name`, `description`, `category_id`, `image`, `teaser`, `comments`, `likes`, `keywords`, `metaDescription`, `url`) VALUES
(30, '2016-12-09 11:54:37', '2016-12-09 11:54:37', 1, 'Hormone, thyroid', 1, 'Your Thyroid can throw you off Balance', '<p>Thyroid gland is the most important gland in the body, after the pituitary gland. It helps in retaining the energy that each cell has. A deficiency or dysfunction of the thyroid gland results in adverse effects for both men and women. There are two ways in which this happens- hypothyroidism and hyperthyroidism. The former is the most common ailment.</p>\r\n\r\n<p>Have you ever felt so tired that you couldn&rsquo;t make it through the day? Have you been noticing unnecessary and sudden weight gain? Are you experiencing hair fall? These are all some of the symptoms that indicate a thyroid problem.</p>\r\n\r\n<p><strong>Signs &amp; Symptoms:</strong></p>\r\n\r\n<p>Women are more prone to thyroid but men are equally at risk too. The thyroid awareness has increased tremendously lately that many women are rushing to their doctors to find out if they have the condition too.</p>\r\n\r\n<p>When some of them are lucky enough to have caught it early, there are others who get unlucky. Most of the individuals are always borderline hypothyroid. Taking this as a sign from the tests conducted, doctors prescribe pills and medicine that fight the condition. This in turn makes you a victim for the condition, when you did not have it in the first place.</p>\r\n\r\n<p>Here are some of the signs that men and women can watch out for:</p>\r\n\r\n<ul>\r\n	<li>Sudden weight gain/loss.</li>\r\n	<li>Unable to go through regular workout.</li>\r\n	<li>Extreme fatigue.</li>\r\n	<li>Mood swings.</li>\r\n	<li>Poor memory retention.</li>\r\n	<li>Constipation</li>\r\n	<li>Depression</li>\r\n	<li>Poor skin, nails and hair.</li>\r\n	<li>Sore muscles.</li>\r\n	<li>Trouble in concentrating.</li>\r\n	<li>Irregular menstrual cycle.</li>\r\n</ul>\r\n\r\n<p><strong>Blood tests&nbsp;</strong>and&nbsp;<strong>hormone tests&nbsp;</strong>are mostly the best way to conclude if you suffer from hypothyroidism. Consult your doctor to know more. Once you consult your doctor, you can&nbsp;<strong>order your lab tests online</strong>.</p>\r\n\r\n<p><strong>Fighting Hypothyroidism:</strong></p>\r\n\r\n<p>Regular&nbsp;<strong>wellness check</strong>&nbsp;is something you can do to be more proactive about your health. You can run yourself through&nbsp;<strong>blood tests and hormone tests&nbsp;</strong>every once in a while to make sure you haven&rsquo;t missed any symptoms (just in case).&nbsp;<strong>Proactive healthcare&nbsp;</strong>is more beneficial compared to diagnosing at a much later stage. Fighting thyroid is not impossible. With time, you can ward off your conditions easily and continue to live a healthy life.</p>\r\n\r\n<p>When a&nbsp;<strong>hormone test&nbsp;</strong>is run to check for thyroid related problems, men and women are tested for more than one hormone. This gives doctors a complete understanding of your symptoms. Men with thyroid issues are prone to Erectile Dysfunction and other infertility problems. To know more about the tests and ordering one online,&nbsp;<a href="https://newcenturylabs.com/product/basic-male-health-check">click here.</a></p>\r\n\r\n<p>Women with thyroid issues face problems with their menstrual cycle and other fertility disorders. To stay on the safe side,&nbsp;<a href="https://newcenturylabs.com/product/basic-female-hormone-panel">click here to know more about tests.</a></p>\r\n', 11, '3051481284477.jpg', 'Thyroid gland is the most important gland in the body, after the pituitary gland. It helps in retaining the energy that each cell has.', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Your Thyroid can throw you off Balance'),
(31, '2016-12-09 11:59:40', '2016-12-09 12:00:01', 1, 'Toxic Air', 1, 'Portland, Oregon a TOXIC AIR MESS.', '<h2><a href="http://koin.com/2016/02/24/heavy-metals-in-your-body-theres-a-test-for-that/">Click This Link To See Video Clip</a></h2>\r\n\r\n<h2>It&rsquo;s their dirty little secret!</h2>\r\n\r\n<p>Portland is ranked as one of the top most toxic and polluted cities in America, yet also &nbsp;ranked as the top eco friendly city in America. We can&rsquo;t seem to wrap our fingers around that one. Seems so oxymoronic wouldn&rsquo;t you say? Don&rsquo;t let the pretty green trees and over 92,000 acres of green space for hiking, the overly abundant bicycle riders in every direction, and endless city transit fool you. Portland is also ranked to be one of the most toxic and polluted cities in America with over 2,300 permits filed by industrial facilities such as huge mills and major manufacturing to release heavy metal toxicity into the air for people to breath, and it&rsquo;s all LEGAL. We&rsquo;re talking about hundreds of tons of toxic compounds into the air. Did I mention, Oregon&rsquo;s water ways are also one of the worst in the nation too. This is due to 645 tons of toxic chemicals dumped into waterways each year. To put this into perspective that amount of waste is equivalent to 430 Toyota Prius, please excuse the humor Portland.</p>\r\n\r\n<p>In our air we breathe these toxins which contain Arsenic, Cadmium, Cobalt, and Nickel, among other toxic heavy metals, and there&rsquo;s a lot. The toxic air is of course entered in our lungs and into our blood stream slowly destroying our DNA and future off springs DNA as well. This toxic air is significantly linked to major neurological disorders and cancers, yet the law allows it. &nbsp;And it just so happens to be that the nation&rsquo;s top industrial air polluters are right here in the Portland Metro area, hmm&hellip; go figure. If you&rsquo;re from the Portland metro area, you&rsquo;ve probably heard of Portland&rsquo;s&nbsp;<strong>Precision Cast Parts</strong>, makers of aircraft and engine parts, and&nbsp;<strong>Bulls Eye Glass&nbsp;</strong>manufactures located in SE Portland, to name a few, releasing Cadmium, Arsenic, Cobalt, and roughly 30 other toxic substances but has recently added some better filters according to the Oregonian, yet New Century Labs is still getting back very high levels of Arsenic test results from individuals purchasing our&nbsp; comprehensive&nbsp; heavy metals tests on our website, by collecting random urine tests. This has us very concerned.</p>\r\n\r\n<p>Pointing the finger at just one or two companies &nbsp;is a great start to take action and to start demanding cleaner air for Portland and surrounding areas. Although the media has the SE glass company on its Bulls Eye (No Pun) &nbsp;the exposure to people&nbsp;living around OTHER manufacturing companies, factories, and mills, are just as exposed to the same toxicities &nbsp;for those who live around them, and the Portland Metro area has a lot of industrial &nbsp;manufacturing.</p>\r\n\r\n<p>Testing positive for heavy metals is a major issue, but the question is where should one go who&rsquo;s tested positive for heavy metal exposure, and where do you go for treatment? How about what is the treatment?</p>\r\n\r\n<p>We asked our customers who ordered these tests, who then took their results back to their Medical Doctors, some of which showed their doctors in Kaiser hospital, they said they didn&rsquo;t know exactly what the protocol was for treatment, &nbsp;how to interpret the tests, &nbsp;and said they may want to go see a Naturopathic doctor. We spoke to several Naturopathic doctors and they had loads of information on what to do when there&rsquo;s positive exposure to heavy metals. Apparently heavy metals is a core subject taught in the school of Naturopathic medicine, most MD&rsquo;s who are involved in heavy metal treatment are specialists.</p>\r\n\r\n<p>How about the individual who hasn&rsquo;t tested for heavy metals who should they talk to and where do they go? Although &nbsp;NCL will never&nbsp;&nbsp;give medical advice you should always discuss healthcare issues &nbsp;with your doctor first. &nbsp;However access to lab tests at&nbsp;New Century Labs and getting heavy metal testing has been made easy to access, online, on demand, on your terms.</p>\r\n\r\n<p>We decided to do some digging and &nbsp;called the Oregon Health Authority at 1-800-273-0557 they told us to call the EPA. The EPA, what&hellip; why?? We asked them specific questions about how one can get a test and what the cost would be, even asked who the diagnostic companies were offering testing. Of course they had no answer, and no protocol in place, yet they get several calls per day regarding this question.</p>\r\n\r\n<p>Although I was disappointed with their answers we found more resources&ndash;I&rsquo;m on to something! Multnomah County Health Department, they should know! We asked them the same questions were asked, although we got better answers, access to obtaining Heavy metal tests sounded daunting, yet they also didn&rsquo;t know who the diagnostic testing providers were, and couldn&rsquo;t answer how much it would cost, the tests weren&rsquo;t free even if you worked in Bulls Eye Glass and were exposed every day!</p>\r\n\r\n<p>Its seems that the main focus with city, county, and government officials has not &nbsp;been so focused on&nbsp;&nbsp;peoples questions and concerns about getting tests, especially people who cannot afford them, and what to do when you test positive for heavy metals.&nbsp;When we called the Oregon Health Authority we were put on hold for 30 min, and 20 minutes with the county health clinic, and that&rsquo;s just on the phone. Now you have to drive there, sit in the waiting room, pay your co-pay and then see the doctor for 5 min who may or may not give you a lab order for a metals test.</p>\r\n\r\n<p>As much as government officials have tried to provide resources, we believe the resources are simply not enough and very frustrating for many.</p>\r\n\r\n<p>New Century Labs is a private company located in the heart of Lake Oswego, our business is digital, automated, and extremely efficient. Folks concerned about heavy metal tests can order labs from our website, or by simply calling us at 1-800-519-2997 to place an order. If you cannot afford a test we will work with you to make sure you get your tests done ASAP.</p>\r\n\r\n<p>NCL is far more efficient, we can create a lab order and email it to you fast, sometimes within minutes, and you can visit one of our affiliated patient service centers to get your labs done without making an appointment. Your results are emailed back to you in 5 business days or less. You can then take your lab test results and start having a meaningful conversation with your doctor.</p>\r\n\r\n<p>Our goal at NCL is to break apart from the traditional system of obtaining lab tests. This means giving people access to labs on demand when they want it, lowering the price up to 90% off and showing transparency with no surprise bill, all while performing these tests at the highest diagnostics quality, we choose to work with Quest Diagnostics. You have resources now, we&rsquo;re looking forward to serving you at NCL as your preferred source&nbsp;for lab testing.</p>\r\n', 12, '4451481284800.jpg', 'Portland is ranked as one of the top most toxic and polluted cities in America, yet also  ranked as the top eco friendly city in America', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Portland, Oregon a TOXIC AIR MESS'),
(32, '2016-12-09 12:05:28', '2016-12-09 12:05:28', 1, 'Vitamin D', 1, 'Dangers of Vitamin D Deficiency', '<h2><strong>Reasons You Should Be Tested For Vitamin D</strong></h2>\r\n\r\n<p>As winter approaches, you want to have the right levels of Vitamin D in your blood! Here is why vitamin D is important for your health.</p>\r\n\r\n<p><strong>Prevention of flu:</strong>&nbsp;Vitamin D deficiency can plummet your&nbsp;immune system increasing your risk of getting&nbsp;infections and inflammation during the fall-winter flu season. As your strategy should be to prevent&nbsp; the winter flu, you want to increase your intake of Vitamin D supplements if your D blood levels show below normal range. It is important to get your blood tested for vitamin D levels so you know if you need supplements.</p>\r\n\r\n<p><strong>Prevention of depression:</strong>&nbsp;Low levels of Vitamin D are associated with depression and can attack your sex hormone causing low estrogen in women and low testosterone in men, which can cause mood changes and potential depression, hence why some men tend to have increased libido in the summer time than the winters.</p>\r\n\r\n<p><strong>Reduction of muscle aches and pain:</strong>&nbsp;Vitamin D normalizes blood calcium which softens and relaxes tight shortened muscles. It is particularly useful for menstrual cramps.</p>\r\n\r\n<p><strong>Reduction of the risk of cancer:</strong>&nbsp;Vitamin D normalizes cell to cell communication, reduces uncontrolled cell growth and allows cells to develop into normal cells with a normal life cycle. Deficiency of Vitamin D may increase risks of many cancers. Several studies have shown that low levels of Vit D have a increased risks of developing bladder cancer, researchers have also found that cells lining the bladder activate and respond to vit D. When this key nutrient is taken the immune system response stimulates, where the immune system can destroy abnormal cells they develop into cancer.</p>\r\n\r\n<p><strong>Prevention of Cardiovascular diseases:</strong>&nbsp;Vitamin D has been shown to protect the lining of your blood vessels hence reducing risks of high blood pressure, heart diseases and stroke.</p>\r\n\r\n<p><strong>Reducing&nbsp;Diabetes&nbsp; risk:</strong>&nbsp;Research has invariably found low levels of Vit D&nbsp;could increase the chance of &nbsp;diabetics causing insulin resistance.</p>\r\n\r\n<p><strong>Prevention of Autoimmune Diseases:&nbsp;</strong><strong>Vit D reduces risk of getting autoimmune diseases like Lupus, Multiple Sclerosis, Rheumatoid Arthritis, and Hashimoto&rsquo;s Thyroiditis.</strong>&nbsp;Research found that Vit D reduces the risk of Multiple Sclerosis at optimal levels.</p>\r\n\r\n<p><strong>Strengthen bones:&nbsp;</strong><strong>Vit D reduces your risk of bone fractures, bone loss and osteoporosis</strong><strong>.</strong>&nbsp;Deficiency is associated with rickets, which is common among dark skinned people.</p>\r\n\r\n<p><strong>The body can make Vitamin D!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Obviously&nbsp;this key nutrient &nbsp;is very important for health. The human body can make Vit D when the skin is exposed to sunlight. But a lot of people suffer from deficiency of vit D because:</p>\r\n\r\n<ul>\r\n	<li>They spend more time indoors during working hours.</li>\r\n	<li>When they go outdoors they apply sunscreen which blocks Vit D production in the skin.</li>\r\n	<li>Dark skinned people make less Vit D than those with light skin.</li>\r\n	<li>Aging skin makes 75 percent less Vit D&nbsp;than young skin.</li>\r\n	<li>In the northern hemisphere, there is little or no sun exposure in winter.</li>\r\n</ul>\r\n\r\n<p>Blood levels of Vitamin D3 associated with OPTIMAL HEALTH are in the range of 70-120nmol/L.</p>\r\n\r\n<p>To prepare for the upcoming winter season when there is little or no sun, get your blood tested for vit D levels, know where you stand and be proactive.</p>\r\n\r\n<p><strong>Be Proactive. Order Your Blood Test Online!</strong></p>\r\n\r\n<p>Here is the good news! You can order your blood test online! New Century Labs provide this convenient service so you can order your test easily! You do not need to go through a doctor. You can order the test yourself! No sitting in a queue. No doctor&rsquo;s fees or Copay. It&rsquo;s quick. It&rsquo;s convenient. It&rsquo;s affordable.</p>\r\n\r\n<p>You can order your&nbsp;vit &nbsp;D test for only $29 by clicking on the link&nbsp;below easily and quickly. Your lab order will be delivered to you by email in less than 4 hours. Simply print the order and take it to the nearest outlet. You will receive your results confidentially in just 3 business days.</p>\r\n\r\n<p>Why pay $99 for the same test when you can get it here for a fraction of the price.</p>\r\n\r\n<h3><strong><a href="https://newcenturylabs.com/product/vitamin-d-blood-test/">New Century Labs Vitamin D Test</a></strong></h3>\r\n', 13, '8761481285128.jpg', 'As winter approaches, you want to have the right levels of Vitamin D in your blood! Here is why vitamin D is important for your health.', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Dangers of Vitamin D Deficiency'),
(33, '2016-12-09 12:15:49', '2016-12-09 14:35:55', 1, 'Liver Disease, Liver Panel, Liver Test', 1, 'Healthy Liver Healthy Life', '<h1><strong>Take care of your liver</strong></h1>\r\n\r\n<h2><a href="https://vimeo.com/122387548">Click to watch trailer </a></h2>\r\n\r\n<p>Our blog is inspired by the movie <strong>“</strong><a href="http://sugarcoateddoc.com/"><strong>Sugar Coated” </strong></a>created by Michele Hozer. As the key discussion of this movie was sugar, and all of its toxic harms, we wanted to focus on the body’s processing plant, the  Liver, and how Neglecting your liver will bankrupt your life,  and overall well-being. Your liver can be harmed overtime, with almost no warning signs and no symptoms. Often times people wait until a symptom starts appearing before they take action– often times it’s too late. When we think of liver disease, we immediately think of alcohol abuse, but that’s not always 100% the case. Your liver can get diseased from simply putting the wrong types of food in your mouth. When you eat a bad diet, cheese burgers, pizza, soda pop, sit around all day and lacking exercise, your liver can become fat making it much harder for your liver to filter out all the bad stuff.</p>\r\n\r\n<p><a href="http://www.liverfoundation.org/education/liverlowdown/ll1013/bigpicture/">1 in 10 Americans have some form of liver disease every year</a>. Every year 19,500 die from liver cancer, 49,500 Die from Cirrhosis, (Cirrhosis occurs in response to damage to your liver.) In the world liver cancer deaths per year amounts to 745,000 and over 1,000,000 from Cirrhosis. Fatty liver disease from alcoholic and non alcoholic fatty liver disease on an upward trend:</p>\r\n\r\n<p>Alcohol consumption is the leading cause of FLD (Fatty liver Disease) (25%-35% of the general population and Non-alcoholic  Fatty Liver Disease currently affects 25% of Americans and expected to reach 50% by 2030.</p>\r\n\r\n<p>This is a disease that has to do with what we put into our mouths, we call this <a href="https://www.atkins.com/how-it-works/library/articles/the-sad-consequences-of-the-standard-american-diet">SAD (Sad American Diet.)</a> The choice is clear, neglect your liver and your liver will neglect you!</p>\r\n\r\n<p>The best way to attack “neglect” is to become more in tune with how your organs function, their purpose, how they gets effected and how they can add more years to your life!  YES your liver should be treated like your own child, love, care, and respect and NCL has some pointers  that will make you think about your liver on a more conscientious state.</p>\r\n\r\n<h2>Lets jump into your liver and take a look!</h2>\r\n\r\n<p>Your <strong><a href="http://www.liverfoundation.org/">liver </a></strong>is one of the heaviest organs in the body weighing in at slightly over 3 pounds, yes 3 pounds, and it’s in charge of  many different processes and functions in the body. Think about your liver like a factory.  A factory has a warehouse, manufacturing capabilities, and can process material into a finished product, sending off finished goods to the end user for utilization–this process is exactly how your liver functions.</p>\r\n\r\n<p>Everything you eat filters through your liver, it metabolizes nutrients and stores them, even detoxifies your system of harmful  toxins from the blood. This is of course when your liver is healthy–everything you eat has to filter through your liver.</p>\r\n\r\n<p>If you build fat in your liver it won’t be able to filter out toxins and break down essential vitamins and key nutrients. When you have a fatty liver, it cannot get normal blood supply, which can cause all kinds of damage to your body.</p>\r\n\r\n<h3><strong>Your liver is really your bodyguard.</strong></h3>\r\n\r\n<p>When you eat food your liver strips out important vitamins and nutrients, feeding your cells with those needed nutrients and then  storing them up until your body is in need again. For example, with carbohydrates your body breaks it down and converts it to sugar for your body’s energy use. When you have excess of what your body no longer needs, your liver will store them and use them for later use– sounds like a good neighbor! Your liver is actually a genius, it can detect toxins and immediately and rid them kidneys and into your intestines.</p>\r\n\r\n<p>Through the manufacturing side, your liver has a production component, everything from producing blood plasma protein, which transports fatty acids and helps form blood clouts, to cholesterol production which help your body to create hormones, not to mention vitamins and substances that help in the aid of digestion.</p>\r\n\r\n<p>The most vital product that your liver manufactures is that oozing green looking substance, it’s called Bile. Like an Eco-friendly treatment plant your liver uses cells called Hepatocytes to convert toxic waste products, A hepatocyte is a cell of the main parenchymal tissue of the liver. Hepatocytes make up 70-85% of the liver’s mass.</p>\r\n\r\n<p>Bile is then funneled into a small container below the liver called the Gallbladder before being dumping into the intestine which then break down fats, destroys microbes, and helps stomach acids. Bile also helps carry other toxins and unnecessary by products from the liver out of the body, again, what an amazing neighbor!</p>\r\n\r\n<p>Your liver really is a factory in charge of multiple functions, helping keep your body strong and healthy. However, such a complex system needs tender loving care, self awareness, and a proactive mind set. The ability to look at soda pop and make a rational judgment call is key. You are no longer in a state of neglect, you are in charge of the situation, the situation is not in charge of you.</p>\r\n\r\n<p>When liver damage strikes, its often too late for treatment, or too difficult for treatment. The reality is disease happens before any symptoms appear and the best way to check your liver is simply being more proactive with your health care. Getting to know the real you from inside out. Getting critical information about your body before it’s late.</p>\r\n\r\n<p>70-80% of all clinical decisions come from lab testing and NCL supports those who are proactive with their healthcare, who are looking for ways to improve health and wellness.</p>\r\n\r\n<p>The best time to check your liver health is when you don’t have signs and symptoms, this can be done through 1 simple blood draw. NCL makes getting a test affordable, convenient, and fast. You no longer need to call to make an appointment at your doctor’s office, no long waiting rooms, no co-pays, no need to deal with pesky insurance companies. Simply order online, from your PC or your cell phone. Pick your lab tests and check out with your credit card. Your lab order will be emailed to you– you are now ready to get your blood drawn– we’ll show you where to get your blood drawn nearest you.  Your results then get emailed to you privately and securely. If you need to take your results to your doctor to have a meaningful conversation about your results please do so we recommend it.</p>\r\n\r\n<p>Remember all it took was you becoming more self aware–just 1 blood draw can change your life. Knowledge is power and when you get critical information about your body, you begin to make positive changes.</p>\r\n\r\n<h2>Appreciate what the liver does for you!</h2>\r\n\r\n<p><strong>Ordering these tests can help you and your doctor understand your liver health, so we made ordering your liver function test super easy and super affordable:</strong></p>\r\n\r\n<p><strong><a href="https://newcenturylabs.com/product/hepatic-function-panel">Hepatic Function panel $15.00</a>    </strong></p>\r\n\r\n<h3><strong>This test includes:</strong></h3>\r\n\r\n<p><strong>-Total Protein</strong></p>\r\n<p><strong>-Albumin</strong></p>\r\n<p><strong>-Globulin (calculated)</strong></p>\r\n<p><strong>-Albumin/Globulin Ratio (calculated)</strong></p>\r\n<p><strong>-Total Bilirubin</strong></p>\r\n<p><strong>-Direct Bilirubin</strong></p>\r\n<p><strong>-Indirect Bilirubin (calculated)</strong></p>\r\n<p><strong>-Alkaline Phosphatase</strong></p>\r\n<p><strong>-AST</strong></p>\r\n<p><strong>-ALT</strong></p>\r\n\r\n<p><strong><a href="https://newcenturylabs.com/product/cbc-includes-differential-and-platelets">Complete blood count (CBC) $15.00</a></strong></p>\r\n\r\n\r\n\r\n<h3><strong>Test Includes:</strong></h3>\r\n\r\n<p><strong>Platelet count The number of red blood cells (RBC count)</strong></p>\r\n<p><strong>The number of white blood cells (WBC count)</strong></p>\r\n<p><strong>The total amount of hemoglobin in the blood The fraction of the blood composed of red blood cells (hematocrit)</strong></p>\r\n<p><strong>Average red blood cell size (MCV)</strong></p>\r\n<p><strong>Hemoglobin amount per red blood cell (MCH)</strong></p>\r\n<p><strong>The amount of hemoglobin relative to the size of the cell (hemoglobin concentration) per red blood cell (MCHC)</strong></p>\r\n<p><strong><a href="https://newcenturylabs.com/product/gamma-glutamyl-transferase-ggt">GGT $15.00</a></strong></p>\r\n<p><strong>Elevated GGT is found in all forms of liver disease.</strong></p>\r\n', 14, '4231481294155.jpg', 'Our blog is inspired by the movie “Sugar Coated” created by Michele Hozer. As the key discussion of this movie was sugar, and all of its toxic harms, ', 0, 0, 'order lab tests, affordable lab tests, order lab tests online, blood tests, order lab tests without a doctor, order labs, lab tests, buy lab tests online, hormone balance tests,', 'New Century provides low cost medical lab tests online across the United States.', 'Healthy Liver Healthy Life');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `session_id` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `totalPrice` float DEFAULT NULL,
  `quantity` int(5) NOT NULL DEFAULT '1',
  `type` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_product_attributes`
--

CREATE TABLE `cart_product_attributes` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `value` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_product_attributes`
--

INSERT INTO `cart_product_attributes` (`id`, `cart_id`, `attribute_id`, `value_id`, `value`, `created_at`, `updated_at`) VALUES
(1, 90, 2, 4, 'Long Sleeves', '2017-03-06 15:42:12', '2017-03-06 15:42:12'),
(2, 91, 14, 50, 'Red', '2017-03-06 16:58:50', '2017-03-06 16:58:50'),
(3, 91, 2, 4, 'Long Sleeves', '2017-03-06 16:58:50', '2017-03-06 16:58:50'),
(4, 92, 2, 0, '--', '2017-03-06 17:08:42', '2017-03-06 17:08:42'),
(5, 93, 2, 0, '--', '2017-03-06 17:38:00', '2017-03-06 17:38:00'),
(6, 94, 14, 50, 'Red', '2017-03-06 17:41:25', '2017-03-06 17:41:25'),
(7, 94, 2, 6, 'Long Sleeves', '2017-03-06 17:41:25', '2017-03-06 17:41:25'),
(8, 95, 2, 4, 'Long Sleeves', '2017-03-07 11:05:19', '2017-03-07 11:05:19'),
(9, 96, 2, 4, 'Long Sleeves', '2017-03-07 11:05:30', '2017-03-07 11:05:30'),
(10, 97, 2, 0, '--', '2017-03-08 17:01:12', '2017-03-08 17:01:12'),
(11, 100, 14, 50, 'Red', '2017-03-10 12:52:21', '2017-03-10 12:52:21'),
(12, 100, 2, 4, 'Long Sleeves', '2017-03-10 12:52:21', '2017-03-10 12:52:21'),
(13, 101, 2, 4, 'Short Sleeves (PUFF) add $5.00', '2017-03-10 13:14:17', '2017-03-10 13:14:17'),
(14, 103, 14, 50, 'Red', '2017-03-10 14:07:11', '2017-03-10 14:07:11'),
(15, 103, 2, 4, 'Long Sleeves', '2017-03-10 14:07:11', '2017-03-10 14:07:11');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `url` text,
  `image` varchar(255) DEFAULT NULL,
  `description` text,
  `teaser` varchar(255) DEFAULT NULL,
  `sortOrder` int(11) DEFAULT '0',
  `status` int(2) NOT NULL DEFAULT '1',
  `keywords` varchar(255) NOT NULL,
  `metaTitle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `url`, `image`, `description`, `teaser`, `sortOrder`, `status`, `keywords`, `metaTitle`) VALUES
(1, 'Apparel', 0, '2017-03-06 15:33:16', '2017-03-09 15:57:01', NULL, '5911489074951.jpg', NULL, 'See our Apparel products for your best Style.', NULL, 1, '', NULL),
(2, 'mens', 1, '2017-03-06 15:34:10', '2017-03-06 15:36:25', NULL, NULL, NULL, '', NULL, 1, '', NULL),
(3, 'Women', 3, '2017-03-06 15:36:43', '2017-03-06 15:36:53', NULL, NULL, NULL, '', NULL, 1, '', NULL),
(4, 'Products', 0, '2017-03-06 15:37:06', '2017-03-09 15:16:53', NULL, '3191489072613.jpg', NULL, '', NULL, 1, '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `id` int(11) DEFAULT NULL,
  `name` varchar(765) DEFAULT NULL,
  `email` varchar(765) DEFAULT NULL,
  `message` text,
  `status` tinyint(2) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'waqar.golpik@gmail.com', 'sdasdasdasdasdasdasd', 1, '2016-03-02 10:56:32', '2016-03-02 10:56:32'),
(2, 'admin', 'waqar.golpik@gmail.com', 'sdasdasdasdasdasdasd', 1, '2016-03-02 10:58:27', '2016-03-02 10:58:27'),
(3, 'admin', 'waqar.golpik@gmail.com', 'ddddasdasdasdasd\r\nasdasdasdasd\r\n', 1, '2016-03-02 10:58:47', '2016-03-02 10:58:47'),
(NULL, 'Ray', 'raysmithdev@gmail.com', 'this is a test message', NULL, '2016-05-06 11:20:19', '2016-05-06 11:20:19'),
(NULL, 'Rajput', 'rajput@cutemail.com', 'asdl;kfjasdl;kj ', NULL, '2016-05-10 09:47:46', '2016-05-10 09:47:46'),
(NULL, 'Ray', 'raysmithdev@gmail.com', 'test12334', NULL, '2016-05-11 14:35:24', '2016-05-11 14:35:24'),
(NULL, 'ray ', 'raysmithdev@gmail.com', 'testddddd', NULL, '2016-05-12 11:30:30', '2016-05-12 11:30:30'),
(NULL, 'Asad', 'asad@golpik.com', 'testing....', NULL, '2016-05-12 11:36:46', '2016-05-12 11:36:46'),
(NULL, 'ray', 'raysmithdev@gmail.com', 'testesteste', NULL, '2016-05-12 12:31:34', '2016-05-12 12:31:34'),
(NULL, 'Ray', 'ray@test.com', 'Fgggfffffffff', NULL, '2016-05-12 12:33:00', '2016-05-12 12:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `code` varchar(30) NOT NULL,
  `title` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `language_id` varchar(10) NOT NULL,
  `metaTitle` varchar(255) DEFAULT NULL,
  `metaDescription` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `deleted` int(2) DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `url` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `type`, `code`, `title`, `subject`, `teaser`, `body`, `language_id`, `metaTitle`, `metaDescription`, `keywords`, `created_at`, `updated_at`, `status`, `deleted`, `image`, `url`) VALUES
(1, 'page', 'paypal_success', 'Your Payment was successful', 'sad', 'dsa', '<p>\r\nThank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You will receive your first issue of the Eurofish magazine when the next issue is relased. As a paying subscriber you will also receive access to our online version for FREE. This will be sent to the email address you provided. We will contact you before your subscription expires to ensure that you receive the magazine without interruption.\r\nIf you have any comments or questions please do not hesitate to contact us:\r\n</p>\r\n \r\n<p>Tel.: +45 333 777 55</p>\r\n<p>Fax: +45 333 777 56</p>\r\n<p>info@eurofishmagazine.com</p>\r\n<p>Thanks again and have a great day.</p>', 'en_uk', 'asd', '', 'Valentine\'s Day Outfits', '2016-02-24 12:14:19', '2016-10-06 12:14:31', 1, 0, '6451456317215.jpg', 'paypal-success'),
(2, 'page', 'paypal_cancel', 'Failure ', '', '', 'Please Try Again', '', '', '', '', NULL, '2016-10-06 12:14:55', 1, 0, NULL, 'paypal-cancel'),
(3, 'email', 'order_confirmation', 'Your Order is being processed.', 'Your Order is being processed.', NULL, '<p>Dear %%NAME%%</p>\n<p>\nYour order number is "%%ID%%".\n<p>Thank you for online purchase.\n This the the confirmation and summary of you order, which is current being processed.</p>\n<p>For your convenience, you will able to track the status of you online orders and manage you account by visiting the "My Account" section of our website.</p>\n<p>Regards,</p>\n<p>newcenturylabs</p>', '', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(7, 'email', 'forgot_password', 'Your new newcenturylabs.com password', 'Your new newcenturylabs.com password', NULL, '<p>Dear %%NAME%%</p>\r\n<p>Your new passowrd is %%PASSWORD%%<p>\r\n<p>For your convenience, you can change you password by visiting the \r\n"My Account" section of our website.</p>\r\n<p>Regards,</p>\r\n<p>newcenturylabs</p>', '', NULL, NULL, NULL, '2016-04-15 15:06:04', '2016-04-15 15:11:50', 1, 0, NULL, NULL),
(9, 'email', 'order_status', 'You newcenturylabs.local Order Status', NULL, NULL, '<p>Dear %%NAME%%</p>\r\n<p>Thank you for online purchase. Your order %%ID%%  is currently %%STATUS%%.</p>\r\n<p>For your convenience, you will able to track the status of you online orders by visiting the " %%ACCOUNT%% " section of our website.</p>\r\n<p>Regards,</p>\r\n<p>newcenturylabs</p>', '', NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, NULL),
(10, 'page', 'check_success', 'Check Success Message', 'Check Success Message', '', '<p></p><p>Thank you for your Order. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You will receive your first issue of the Eurofish magazine when the next issue is relased. As a paying subscriber you will also receive access to our online version for FREE. This will be sent to the email address you provided. We will contact you before your subscription expires to ensure that you receive the magazine without interruption. If you have any comments or questions please do not hesitate to contact us:</p><p>Tel.: +45 333 777 55</p><p>Fax: +45 333 777 56</p><p>info@newcenturylabs.local</p><p>Thanks again and have a great day.</p><p></p>', '', '', '', '', '2016-11-23 12:04:57', '2016-11-23 12:25:23', 1, 0, NULL, 'check-success-message'),
(11, 'page', 'home', 'Home', NULL, '', '<!-- end:fh5co-header -->\r\n<div class="fh5co-hero">\r\n<div class="fh5co-overlay">&nbsp;</div>\r\n\r\n<div class="fh5co-cover" data-stellar-background-ratio="0.5" style="background-image: url({{asset(\'\')}}front/images/home-image.jpg);">\r\n<div class="desc animate-box">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-7">\r\n<h2>Fitness &amp; Health<br />\r\nis a <b>Mentality</b></h2>\r\n\r\n<p><span>Created with by the fine folks at <a class="fh5co-site-name" href="http://freehtml5.co">FreeHTML5.co</a></span></p>\r\n<span><a class="btn btn-primary" href="#">Start Your Journey</a></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end:fh5co-hero -->\r\n\r\n<div class="fh5co-lightgray-section" id="fh5co-schedule-section">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-8 col-md-offset-2">\r\n<div class="heading-section text-center animate-box">\r\n<h2>Class Schedule</h2>\r\n\r\n<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row animate-box">\r\n<div class="col-md-10 col-md-offset-1 text-center">\r\n<ul class="schedule">\r\n	<li><a class="active" data-sched="sunday" href="#">Sunday</a></li>\r\n	<li><a data-sched="monday" href="#">Monday</a></li>\r\n	<li><a data-sched="tuesday" href="#">Tuesday</a></li>\r\n	<li><a data-sched="wednesday" href="#">Wednesday</a></li>\r\n	<li><a data-sched="thursday" href="#">Thursday</a></li>\r\n	<li><a data-sched="monday" href="#">Monday</a></li>\r\n	<li><a data-sched="saturday" href="#">Saturday</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div class="row text-center">\r\n<div class="col-md-12 schedule-container">\r\n<div class="schedule-content active" data-day="sunday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="monday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="tuesday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="wednesday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="thursday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="friday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="saturday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content --></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="fh5co-lightgray-section" id="fh5co-schedule-section">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-8 col-md-offset-2">\r\n<div class="heading-section text-center animate-box">\r\n<h2>Class Schedule</h2>\r\n\r\n<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row animate-box">\r\n<div class="col-md-10 col-md-offset-1 text-center">\r\n<ul class="schedule">\r\n	<li><a class="active" data-sched="sunday" href="#">Sunday</a></li>\r\n	<li><a data-sched="monday" href="#">Monday</a></li>\r\n	<li><a data-sched="tuesday" href="#">Tuesday</a></li>\r\n	<li><a data-sched="wednesday" href="#">Wednesday</a></li>\r\n	<li><a data-sched="thursday" href="#">Thursday</a></li>\r\n	<li><a data-sched="monday" href="#">Monday</a></li>\r\n	<li><a data-sched="saturday" href="#">Saturday</a></li>\r\n</ul>\r\n</div>\r\n\r\n<div class="row text-center">\r\n<div class="col-md-12 schedule-container">\r\n<div class="schedule-content active" data-day="sunday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="monday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="tuesday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="wednesday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="thursday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="friday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content -->\r\n\r\n<div class="schedule-content" data-day="saturday">\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Body Building</h3>\r\n<span>John Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Yoga Programs</h3>\r\n<span>James Smith</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Cycling Program</h3>\r\n<span>Rita Doe</span></div>\r\n</div>\r\n\r\n<div class="col-md-3 col-sm-6">\r\n<div class="program program-schedule"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" /> <small>06AM-7AM</small>\r\n\r\n<h3>Boxing Fitness</h3>\r\n<span>John Dose</span></div>\r\n</div>\r\n</div>\r\n<!-- END sched-content --></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="fh5co-parallax" data-stellar-background-ratio="0.5" style="background-image: url({{asset(\'\')}}front/images/home-image-3.jpg);">\r\n<div class="overlay">&nbsp;</div>\r\n\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">\r\n<div class="fh5co-intro fh5co-table-cell animate-box">\r\n<h1 class="text-center">Commit To Be Fit</h1>\r\n\r\n<p>Made with love by the fine folks at <a href="http://freehtml5.co">FreeHTML5.co</a></p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end: fh5co-parallax -->\r\n\r\n<div id="fh5co-programs-section">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-8 col-md-offset-2">\r\n<div class="heading-section text-center animate-box">\r\n<h2>Our Programs</h2>\r\n\r\n<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row text-center">\r\n<div class="col-md-4 col-sm-6">\r\n<div class="program animate-box"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-dumbell.svg" />\r\n<h3>Body Combat</h3>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n<span><a class="btn btn-default" href="#">Join Now</a></span></div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="program animate-box"><img alt="" src="{{asset(\'\')}}front/images/fit-yoga.svg" />\r\n<h3>Yoga Programs</h3>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n<span><a class="btn btn-default" href="#">Join Now</a></span></div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="program animate-box"><img alt="" src="{{asset(\'\')}}front/images/fit-cycling.svg" />\r\n<h3>Cycling Program</h3>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n<span><a class="btn btn-default" href="#">Join Now</a></span></div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="program animate-box"><img alt="Cycling" src="{{asset(\'\')}}front/images/fit-boxing.svg" />\r\n<h3>Boxing Fitness</h3>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n<span><a class="btn btn-default" href="#">Join Now</a></span></div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="program animate-box"><img alt="" src="{{asset(\'\')}}front/images/fit-swimming.svg" />\r\n<h3>Swimming Program</h3>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n<span><a class="btn btn-default" href="#">Join Now</a></span></div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="program animate-box"><img alt="" src="{{asset(\'\')}}front/images/fit-massage.svg" />\r\n<h3>Massage</h3>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n<span><a class="btn btn-default" href="#">Join Now</a></span></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="fh5co-lightgray-section" id="fh5co-team-section">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-8 col-md-offset-2">\r\n<div class="heading-section text-center animate-box">\r\n<h2>Meet Our Trainers</h2>\r\n\r\n<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row text-center">\r\n<div class="col-md-4 col-sm-6">\r\n<div class="team-section-grid animate-box" style="background-image: url({{asset(\'\')}}front/images/trainer-1.jpg);">\r\n<div class="overlay-section">\r\n<div class="desc">\r\n<h3>John Doe</h3>\r\n<span>Body Trainer</span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n\r\n<p class="fh5co-social-icons">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="team-section-grid animate-box" style="background-image: url({{asset(\'\')}}front/images/trainer-2.jpg);">\r\n<div class="overlay-section">\r\n<div class="desc">\r\n<h3>James Smith</h3>\r\n<span>Swimming Trainer</span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n\r\n<p class="fh5co-social-icons">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="team-section-grid animate-box" style="background-image: url({{asset(\'\')}}front/images/trainer-3.jpg);">\r\n<div class="overlay-section">\r\n<div class="desc">\r\n<h3>John Doe</h3>\r\n<span>Chief Executive Officer</span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n\r\n<p class="fh5co-social-icons">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="team-section-grid animate-box" style="background-image: url({{asset(\'\')}}front/images/trainer-4.jpg);">\r\n<div class="overlay-section">\r\n<div class="desc">\r\n<h3>John Doe</h3>\r\n<span>Chief Executive Officer</span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n\r\n<p class="fh5co-social-icons">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="team-section-grid animate-box" style="background-image: url({{asset(\'\')}}front/images/trainer-5.jpg);">\r\n<div class="overlay-section">\r\n<div class="desc">\r\n<h3>John Doe</h3>\r\n<span>Chief Executive Officer</span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n\r\n<p class="fh5co-social-icons">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-4 col-sm-6">\r\n<div class="team-section-grid animate-box" style="background-image: url({{asset(\'\')}}front/images/trainer-6.jpg);">\r\n<div class="overlay-section">\r\n<div class="desc">\r\n<h3>John Doe</h3>\r\n<span>Chief Executive Officer</span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>\r\n\r\n<p class="fh5co-social-icons">&nbsp;</p>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="fh5co-parallax" data-stellar-background-ratio="0.5" style="background-image: url({{asset(\'\')}}front/images/home-image-2.jpg);">\r\n<div class="overlay">&nbsp;</div>\r\n\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-6 col-md-offset-3 col-md-pull-3 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 fh5co-table">\r\n<div class="fh5co-intro fh5co-table-cell box-area">\r\n<div class="animate-box">\r\n<h1>Fitness Classes this summer</h1>\r\n\r\n<p>Pay now and get 25% Discount</p>\r\n<a class="btn btn-primary" href="#">Become A Member</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n<!-- end: fh5co-parallax -->\r\n\r\n<div class="fh5co-pricing fh5co-lightgray-section" id="fh5co-pricing-section">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-8 col-md-offset-2">\r\n<div class="heading-section text-center animate-box">\r\n<h2>Pricing Plan</h2>\r\n\r\n<p>Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="row">\r\n<div class="pricing">\r\n<div class="col-md-3 animate-box">\r\n<div class="price-box animate-box">\r\n<h2 class="pricing-plan">Starter</h2>\r\n\r\n<div class="price"><sup class="currency">$</sup>9<small>/month</small></div>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n\r\n<ul class="classes">\r\n	<li>15 Cardio Classes</li>\r\n	<li class="color">10 Swimming Lesson</li>\r\n	<li>10 Yoga Classes</li>\r\n	<li class="color">20 Aerobics</li>\r\n	<li>10 Zumba Classes</li>\r\n	<li class="color">5 Massage</li>\r\n	<li>10 Body Building</li>\r\n</ul>\r\n<a class="btn btn-default" href="#">Select Plan</a></div>\r\n</div>\r\n\r\n<div class="col-md-3 animate-box">\r\n<div class="price-box animate-box">\r\n<h2 class="pricing-plan">Basic</h2>\r\n\r\n<div class="price"><sup class="currency">$</sup>27<small>/month</small></div>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n\r\n<ul class="classes">\r\n	<li>15 Cardio Classes</li>\r\n	<li class="color">10 Swimming Lesson</li>\r\n	<li>10 Yoga Classes</li>\r\n	<li class="color">20 Aerobics</li>\r\n	<li>10 Zumba Classes</li>\r\n	<li class="color">5 Massage</li>\r\n	<li>10 Body Building</li>\r\n</ul>\r\n<a class="btn btn-default" href="#">Select Plan</a></div>\r\n</div>\r\n\r\n<div class="col-md-3 animate-box">\r\n<div class="price-box animate-box popular">\r\n<h2 class="pricing-plan pricing-plan-offer">Pro <span>Best Offer</span></h2>\r\n\r\n<div class="price"><sup class="currency">$</sup>74<small>/month</small></div>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n\r\n<ul class="classes">\r\n	<li>15 Cardio Classes</li>\r\n	<li class="color">10 Swimming Lesson</li>\r\n	<li>10 Yoga Classes</li>\r\n	<li class="color">20 Aerobics</li>\r\n	<li>10 Zumba Classes</li>\r\n	<li class="color">5 Massage</li>\r\n	<li>10 Body Building</li>\r\n</ul>\r\n<a class="btn btn-select-plan btn-sm" href="#">Select Plan</a></div>\r\n</div>\r\n\r\n<div class="col-md-3 animate-box">\r\n<div class="price-box animate-box">\r\n<h2 class="pricing-plan">Unlimited</h2>\r\n\r\n<div class="price"><sup class="currency">$</sup>140<small>/month</small></div>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n\r\n<ul class="classes">\r\n	<li>15 Cardio Classes</li>\r\n	<li class="color">10 Swimming Lesson</li>\r\n	<li>10 Yoga Classes</li>\r\n	<li class="color">20 Aerobics</li>\r\n	<li>10 Zumba Classes</li>\r\n	<li class="color">5 Massage</li>\r\n	<li>10 Body Building</li>\r\n</ul>\r\n<a class="btn btn-default" href="#">Select Plan</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div id="fh5co-blog-section">\r\n<div class="container">\r\n<div class="row">\r\n<div class="col-md-6">\r\n<div class="col-md-12">\r\n<div class="heading-section animate-box">\r\n<h2>Recent from Blog</h2>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-12 col-md-offset-0">\r\n<div class="fh5co-blog animate-box">\r\n<div class="inner-post"><a href="#"><img alt="" class="img-responsive" src="{{asset(\'\')}}front/images/blog-1.jpg" /></a></div>\r\n\r\n<div class="desc">\r\n<h3><a href="">Starting new session of body building this summer</a></h3>\r\n<span class="posted_by">Posted by: Admin</span> <span class="comment"><a href="">21</a></span>\r\n\r\n<p>Far far away, behind the word mountains</p>\r\n<a class="btn btn-default" href="#">Read More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-12 col-md-offset-0">\r\n<div class="fh5co-blog animate-box">\r\n<div class="inner-post"><a href="#"><img alt="" class="img-responsive" src="{{asset(\'\')}}front/images/blog-1.jpg" /></a></div>\r\n\r\n<div class="desc">\r\n<h3><a href="">Starting new session of body building this summer</a></h3>\r\n<span class="posted_by">Posted by: Admin</span> <span class="comment"><a href="">21</a></span>\r\n\r\n<p>Far far away, behind the word mountains</p>\r\n<a class="btn btn-default" href="#">Read More</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-6">\r\n<div class="col-md-12">\r\n<div class="heading-section animate-box">\r\n<h2>Upcoming Events</h2>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-12 col-md-offset-0">\r\n<div class="fh5co-blog animate-box">\r\n<div class="meta-date text-center">\r\n<p><span class="date">14</span><span>June</span><span>2016</span></p>\r\n</div>\r\n\r\n<div class="desc desc2">\r\n<h3><a href="">Starting new session of body building this summer</a></h3>\r\n<span class="posted_by">Posted by: Admin</span> <span class="comment"><a href="">21</a></span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n<a class="btn btn-default" href="#">Read More</a></div>\r\n</div>\r\n</div>\r\n\r\n<div class="col-md-12 col-md-offset-0">\r\n<div class="fh5co-blog animate-box">\r\n<div class="meta-date text-center">\r\n<p><span class="date">13</span><span>June</span><span>2016</span></p>\r\n</div>\r\n\r\n<div class="desc desc2">\r\n<h3><a href="">Starting new session of body building this summer</a></h3>\r\n<span class="posted_by">Posted by: Admin</span> <span class="comment"><a href="">21</a></span>\r\n\r\n<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>\r\n<a class="btn btn-default" href="#">Read More</a></div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n', '', '', '', '', NULL, '2017-01-31 09:33:59', 1, 0, NULL, '/'),
(12, 'page', 'aboutus', 'About Us', NULL, '', '<section class="inr-bnr-area">\r\n<div class="inr-bnr-img"><img alt="" src="{{asset(\'\')}}/front/images/about-bnr.jpg" />\r\n<div class="container">\r\n<div class="inr-bnr-cont col-sm-12 anime-left">\r\n<h2>About Us</h2>\r\n\r\n<h4>Home / About Us</h4>\r\n</div>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class="about-area">\r\n<div class="container">\r\n<div class="hed">\r\n<h2>WELCOME TO <span>HAMMER FIT</span></h2>\r\n\r\n<p>Come Here and Explore it Now!</p>\r\n</div>\r\n\r\n<div class="about__cont col-sm-10 col-sm-offset-1">\r\n<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n</div>\r\n</div>\r\n</section>\r\n', '', 'about-us', 'Home / About Us', 'hammer fit,about us', NULL, '2017-03-09 14:58:33', 1, 0, NULL, 'aboutus'),
(13, 'page', 'how_to_order', 'How To Order', NULL, '', '<section class="page-bnr-area bg-full valigner" style="background-image:url(\'{{asset(\'\')}}front/images/bnr-how.jpg\');">\r\n<div class="container">\r\n<div class="bnr__cont valign white text-center col-sm-12 anime-flipInX">\r\n<h2>DON&rsquo;T JUST THINK YOU&rsquo;RE HEALTHY, <span>KNOW YOU&rsquo;RE HEALTHY</span></h2>\r\n\r\n<p>Ordering tests when you need to know made easy</p>\r\n</div>\r\n</div>\r\n</section>\r\n\r\n<section class="how-step-area pt50 pb50">\r\n<div class="container">\r\n<div class="step__cont col-sm-5">\r\n<div class="step__img"><img alt="" src="{{asset(\'\')}}front/images/how1.png" /></div>\r\n</div>\r\n\r\n<div class="step__cont col-sm-7 valigner anime-left">\r\n<div class="step_list clrlist listview valign">\r\n<h3>STEP 1</h3>\r\n\r\n<ul>\r\n	<li>Find your lab test(s) of choice.</li>\r\n	<li>Check out with your credit card.</li>\r\n	<li>Your lab order will be located in your email securely and confidentially.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n\r\n<div class="step__cont col-sm-7 valigner anime-left">\r\n<div class="step_list clrlist listview valign">\r\n<h3>STEP 2</h3>\r\n\r\n<ul>\r\n	<li>Test results on average take 72 hours and will be emailed to you as soon as results are complete. You may print your lab results and take it with you to discuss with your doctor if needed.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n\r\n<div class="step__cont col-sm-5">\r\n<div class="step__img"><img alt="" src="{{asset(\'\')}}/front/images/how3.png" /></div>\r\n</div>\r\n\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n\r\n\r\n<div class="step__cont col-sm-5">\r\n<div class="step__img"><img alt="" src="{{asset(\'\')}}front/images/how2.png" /></div>\r\n</div>\r\n\r\n\r\n\r\n<div class="step__cont col-sm-7 valigner anime-left">\r\n<div class="step_list clrlist listview valign">\r\n<h3>STEP 3</h3>\r\n\r\n<ul>\r\n	<li>Print your lab order and take it with you to one of our 2,300 Patient Service Center locations. Walk-ins are always welcome!</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="clearfix">&nbsp;</div>\r\n\r\n<div class="step__cont col-sm-7 valigner anime-left">\r\n<div class="step_list clrlist listview valign">\r\n<h3>Convenient Ordering</h3>\r\n\r\n<ul>\r\n	<li>Order labs and view results from your desk top or any mobile device.</li>\r\n</ul>\r\n</div>\r\n</div>\r\n\r\n<div class="step__cont col-sm-5">\r\n<div class="step__img"><img alt="" src="{{asset(\'\')}}front/images/how4.png" /></div>\r\n</div>\r\n</div>\r\n</section>\r\n', '', '', '', '', NULL, '2017-01-11 12:18:07', 1, 0, NULL, 'how_to_order');
INSERT INTO `content` (`id`, `type`, `code`, `title`, `subject`, `teaser`, `body`, `language_id`, `metaTitle`, `metaDescription`, `keywords`, `created_at`, `updated_at`, `status`, `deleted`, `image`, `url`) VALUES
(14, 'page', 'faq', 'Faq', NULL, '', '<section class="inr-intro-area pt100 pb40">\r\n    <div class="container">\r\n        <div class="page__title text-center mb30">\r\n            <h2>FAQ PAGE</h2>\r\n            <span>Lorem Ipsum is simply dummy text of the printing.</span>\r\n        </div>\r\n\r\n    </div>\r\n</section>\r\n<section class="faq-area pt30 pb30">\r\n    <div class="container">\r\n\r\n        <div class="faq__lft col-sm-3 p0">\r\n            <ul class="nav nav-tabs">\r\n                <li class="active"><a href="#faq1" data-toggle="tab">How do i check my order Status?</a></li>\r\n                <li><a href="#faq2" data-toggle="tab">What are the payment Options?</a></li>\r\n                <li><a href="#faq3" data-toggle="tab">How do i cancel my Order?</a></li>\r\n                <li><a href="#faq4" data-toggle="tab">How do i place an Order?</a></li>\r\n                <li><a href="#faq5" data-toggle="tab">How do i redeem my Test?</a></li>\r\n            </ul>\r\n        </div>\r\n\r\n\r\n\r\n        <div class="faq__rgt col-sm-9 pl30 iconic-list" data-listicon="\\f08d" >\r\n            <div class="tab-content">\r\n                <div class="tab-pane active" id="faq1">\r\n                    <h3>HOW DO I CHECK MY ORDER STATUS?</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes</p>\r\n\r\n                    <h3>NEW TESTS</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber</p>\r\n\r\n\r\n                    <ul>\r\n                        <li>Lorem ipsum dolor sit amet</li>\r\n                        <li>Consectetuer adipiscing elit, sed diam nonummy</li>\r\n                        <li>Nibh euismod tincidunt ut laoreet</li>\r\n                        <li>Dolore magna aliquam erat volutpat</li>\r\n                        <li>Ut wisi enim ad minim veniam</li>\r\n                        <li>Quis nostrud exerci tation</li>\r\n                    </ul>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n\r\n                </div>\r\n                <div class="tab-pane" id="faq2">\r\n                    <h3>What are the payment Options?</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes</p>\r\n\r\n                    <h3>NEW TESTS</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber</p>\r\n\r\n\r\n                    <ul>\r\n                        <li>Lorem ipsum dolor sit amet</li>\r\n                        <li>Consectetuer adipiscing elit, sed diam nonummy</li>\r\n                        <li>Nibh euismod tincidunt ut laoreet</li>\r\n                        <li>Dolore magna aliquam erat volutpat</li>\r\n                        <li>Ut wisi enim ad minim veniam</li>\r\n                        <li>Quis nostrud exerci tation</li>\r\n                    </ul>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n\r\n                </div>\r\n                <div class="tab-pane" id="faq3">\r\n\r\n                    <h3>How do i cancel my Order?</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes</p>\r\n\r\n                    <h3>NEW TESTS</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber</p>\r\n\r\n\r\n                    <ul>\r\n                        <li>Lorem ipsum dolor sit amet</li>\r\n                        <li>Consectetuer adipiscing elit, sed diam nonummy</li>\r\n                        <li>Nibh euismod tincidunt ut laoreet</li>\r\n                        <li>Dolore magna aliquam erat volutpat</li>\r\n                        <li>Ut wisi enim ad minim veniam</li>\r\n                        <li>Quis nostrud exerci tation</li>\r\n                    </ul>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n\r\n\r\n                </div>\r\n                <div class="tab-pane" id="faq4">\r\n                    <h3>How do i place an Order?</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes</p>\r\n\r\n                    <h3>NEW TESTS</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber</p>\r\n\r\n\r\n                    <ul>\r\n                        <li>Lorem ipsum dolor sit amet</li>\r\n                        <li>Consectetuer adipiscing elit, sed diam nonummy</li>\r\n                        <li>Nibh euismod tincidunt ut laoreet</li>\r\n                        <li>Dolore magna aliquam erat volutpat</li>\r\n                        <li>Ut wisi enim ad minim veniam</li>\r\n                        <li>Quis nostrud exerci tation</li>\r\n                    </ul>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n\r\n                </div>\r\n                <div class="tab-pane" id="faq5">\r\n\r\n                    <h3>How do i redeem my Test?</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes</p>\r\n\r\n                    <h3>NEW TESTS</h3>\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber</p>\r\n\r\n\r\n                    <ul>\r\n                        <li>Lorem ipsum dolor sit amet</li>\r\n                        <li>Consectetuer adipiscing elit, sed diam nonummy</li>\r\n                        <li>Nibh euismod tincidunt ut laoreet</li>\r\n                        <li>Dolore magna aliquam erat volutpat</li>\r\n                        <li>Ut wisi enim ad minim veniam</li>\r\n                        <li>Quis nostrud exerci tation</li>\r\n                    </ul>\r\n\r\n                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>\r\n\r\n\r\n                </div>\r\n            </div>\r\n        </div>\r\n\r\n    </div>\r\n</section>', '', '', '', '', NULL, NULL, 1, 0, NULL, 'faq'),
(15, 'page', 'terms', 'Terms', NULL, '', '<section class="inr-intro-area pt100 ">\r\n    <div class="container">\r\n        <div class="page__title text-center mb30">\r\n            <h2>TERMS AND CONDITIONS</h2>\r\n        </div>\r\n\r\n    </div>\r\n</section>\r\n\r\n\r\n\r\n<section class="cont-area  pt30 pb30 big ">\r\n    <div class="container">\r\n\r\n        <p>NewCenturylabs.com and New Century Labs LLC is a registered company in the state of Oregon that provides direct lab services through our listed diagnostic partners: Quest Diagnostics, Spectracell, and DDC. When you purchase a lab test, you agree to be bound by the following terms & conditions:</p>\r\n\r\n        <p>Newcenturylabs.com reserves the right to make changes to the terms & conditions at any time.</p>\r\n        <ol>\r\n            <li>You agree that you are at least 18 years old.</li>\r\n            <li>No refunds are available after specimen is collected.</li>\r\n            <li>You agree that a lab test purchased through newcenturylabs.com does not constitute medical advice. The test results are not a diagnosis, treatment or protocol for any disease or condition and it is recommended that you discuss all results with a qualified health professional. You also agree that the lab test results can be inaccurate through no fault of Newcenturylabs.com or New Century Labs, LLC or any of our ordering physicians or diagnostic partners. You agree that it is your own responsibility to consult your own physician about your lab test results. You understand and agree that neither Newcenturylabs.com, New Century Labs, LLC nor the ordering physician or diagnostic partners is your medical provider and that no patient/physician relationship exists or will exist as a result of your lab test order or your lab results. You agree that your test results are provided for educational purposes only and you agree to follow-up with your own physician if have any question about your lab results or do not feel well.\r\n            <li>You agree to indemnify, defend and hold harmless Newcentury.com, New Century Labs, LLC and it’s officers, directors, employees, agents, licensors, suppliers and any third party information providers to the Service, including the ordering physicians, from and against all losses, expenses, damages and costs, including reasonable attorneys’ fees, resulting from any violation of this Agreement by you.</li>\r\n            <li>You also agree not to use the website for illegal purposes.</li>\r\n            <li>You acknowledge and accept that New Century Labs, LLC and Newcenturylabs.com the ordering physicians and the laboratory may be compelled by state or local statue to report you abnormal laboratory result to the local health department and it is required for a physician to report most positive\r\n                STD tests and abnormal lead levels to the local health department.</li>\r\n            <li>By placing an order with us, you agree to receive email marketing that provides promotions and health information. At any time you may opt out of these emails by emailing <a href="mailtto:customerservice@newcenturylabs.com">customerservice@newcenturylabs.com</a></li>\r\n            <li>Your lab test results will be sent to your email by a HIPAA complaint encrypted email server prompting you to create a password to access your results.</li>\r\n            <li>Requisitions will be sent to your email address you provide after payment is made.</li>\r\n            <li>Your lab test results will be accessed only by physicians and staff members of newcenturylabs.com and Quest Diagnostics and or SpectraCell Laboratories or DDC. Newcenturylabs.com will only release health information to comply with legal requirements as set forth by the Health Insurance Portability and Accountability Act (HIPAA) and other applicable state and federal laws. State laws require laboratories and physicians to report certain infectious disease-related test results to their local health departments.</li>\r\n            <li>Your personal information will not be sold to third parties we will only collect your information to order labs and for statistical purposes only.</li>\r\n        </ol>\r\n\r\n\r\n    </div>\r\n</section>', '', '', '', '', NULL, NULL, 1, 0, NULL, 'terms'),
(16, 'page', 'privacy', 'Privacy', NULL, '', '<section class="inr-intro-area pt100 ">\r\n		<div class="container">\r\n				<div class="page__title text-center mb30 text-uppercase">\r\n					<h2>Privacy Policy</h2>\r\n				</div>\r\n				\r\n		</div>\r\n	</section>\r\n	\r\n	\r\n	\r\n	<section class="cont-area  pt30 pb30 big">\r\n		<div class="container">\r\n	\r\n	<p>Patient Notification Regarding State-Mandated Reportable Conditions Certain infectious diseases and conditions and the identity of those who test positive for them, are required, by federal and/or state law, to be reported to local or state health authorities by your health care providers, including New Century Lab’s Ordering physicians, University Services, its physicians, staff, and the laboratories that run the medical tests. The time frames\r\nand reporting requirements vary according to the disease or condition. These local and state health authorities are considered Public Health Authorities according to the federal Health Insurance Portability and Accountability Act of 1996 (“HIPAA”) which means that they are legally authorized to receive your Protected Health Information (“PHI”). However, both New Century Labs, LLC and these health authorities will not otherwise share or release any confidential information, unless mandated by law or authorized by you in writing.</p>\r\n\r\n	<p>You understand that if you test positive for any infectious disease or condition on the state’s list of reportable conditions, your\r\ntest result and your identifying information will be reported to the applicable local or state health authority. Reporting this\r\ninformation does not require your permission or consent.\r\nAdditionally, you understand that if you test positive for any infectious disease or condition, neither New Century Labs, LLC, nor\r\nits staff, University Services, its physicians, staff, or the laboratories that run the medical tests, will treat, prescribe medications,\r\nor refer you for medical treatment. It is your sole responsibility to seek and comply with necessary treatment and all required\r\nfollow-up with your physician or local public health department.\r\nI authorize my health care providers, including University Services, its physicians and its staff and the laboratories that run\r\nmedical tests for me to use and/or disclose certain protected health information about me to New Century Labs, LLC for the\r\npurposes state below.</p>\r\n\r\n	<p>This authorization applies to the following protected health information about me: the laboratory requisition submitted by New\r\nCentury Labs, LLC and the laboratory test values which are the result of the laboratory test(s) requested in the requisition.\r\nFor avoidance of doubt, I specifically authorize the transfer of this information between and among me and the following\r\nParticipants, organizations and their representatives: i) New Century Labs, LLC ii) University Services staff and physician of\r\nrecord, and iii) the reference laboratory of record.\r\nI understand that University Services physician of record may be required to receive my lab test results before I do, and that\r\nthis physician’s authorization to release those results to New Century Labs, LLC may also be required before I receive my\r\nresults.</p>\r\n\r\n\r\n	<p>The protected health information will be used or disclosed for the sole purpose of complying with the state and federal laws\r\nwhich may require a physician or their agent to: 1) review and approve a laboratory requisition; and 2) review the laboratory\r\ntest results. This review may be conducted for any reason, including in the event laboratory values, which are outside of\r\nnormal ranges, require the physician or its agent to contact me.\r\nThe purposes outlined above are provided so that I can make an informed decision whether to allow release of the information\r\nto the parties referenced in this authorization. This authorization will expire one year after the date of this authorization.\r\nI understand that I have a right to receive a copy of this authorization. I understand that the sole purpose of the laboratory test\r\nis to generate the results of the tests that I and New Century Labs, LLC have requested, and the laboratory tests will not be\r\nrequisitioned unless I sign this authorization. I have the right to refuse to agree to this authorization. When my information is\r\nused or disclosed pursuant to this authorization, it may be subject to re-disclosure by the recipient and may no longer be\r\nprotected by the federal HIPAA Privacy Rule. I have the right to revoke this authorization in writing at any time, except that the\r\nrevocation will not apply to any information already disclosed by the parties referenced in this authorization have acted in\r\nreliance upon this authorization. My written revocation must be submitted to the NCL privacy officer.\r\nPatient Authorization for Use and Disclosure of Protected Health Information</p>\r\n	\r\n	\r\n		</div>\r\n	</section>', '', '', '', '', NULL, NULL, 1, 0, NULL, 'privacy'),
(17, 'page', 'contact', 'Contact us', NULL, '', '<section class="touch-area">\r\n<div class="container">\r\n			<div class="hed">\r\n				<h2>GET IN <span>TOUCH</span></h2>\r\n				<p>Thanks for getting in touch with us</p>\r\n			</div>\r\n			<div class="row">\r\n			<div class="touch__box clrlist list-icon col-sm-4">\r\n				<div class="touch__inr">\r\n					<ul>\r\n						<li><i class="fa fa-phone"></i>\r\n							<h4>PHONE NUMBER</h4>\r\n							<p>+012 345 6789 / +012 345 6789</p>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n			<div class="touch__box clrlist list-icon col-sm-4">\r\n				<div class="touch__inr">\r\n					<ul>\r\n						<li><i class="fa fa-envelope"></i>\r\n							<h4>EMAIL ADDRESS</h4>\r\n							<p>info@companylisting.com</p>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n			<div class="touch__box clrlist list-icon col-sm-4">\r\n				<div class="touch__inr">\r\n					<ul>\r\n						<li><i class="fa fa-map-marker"></i>\r\n							<h4>LOCATION ADDRESS</h4>\r\n							<p>123 W Street Name New York 100</p>\r\n						</li>\r\n					</ul>\r\n				</div>\r\n			</div>\r\n			</div>\r\n		</div>\r\n	</section>\r\n	\r\n	<section class="contact-area">\r\n		<div class="container">\r\n			<div class="hed">\r\n				<h2>CONTACT <span>US</span></h2>\r\n				<p>Thanks for getting in touch with us</p>\r\n			</div>\r\n			<div class="contact__form col-sm-12 p0">\r\n				<form>\r\n					<div class="row">\r\n						<div class="form-group col-sm-6">\r\n						  <input type="text" class="form-control" id="firstName" placeholder="First Name">\r\n						</div>\r\n						<div class="form-text col-sm-6">\r\n						  <input type="text" class="form-control" id="lastName" placeholder="Last Name">\r\n						</div>\r\n					</div>\r\n					<div class="row">\r\n						<div class="form-group col-sm-6">\r\n						  <input type="text" class="form-control" id="email" placeholder="Email Address">\r\n						</div>\r\n						<div class="form-text col-sm-6">\r\n						  <input type="text" class="form-control" id="phoneNumber" placeholder="Phone Number">\r\n						</div>\r\n					</div>\r\n					<div class="row">\r\n						<div class="form-group col-sm-12">\r\n						  <textarea class="form-control" rows="9" id="comment" placeholder="Your Message!"></textarea>\r\n						</div>\r\n					</div>\r\n					<button type="submit" class="btn btn-default contact__submit">SUBMIT</button>\r\n				</form>\r\n			</div>\r\n		</div>\r\n	</section>', '', 'Contact us', '', '', NULL, '2017-03-09 16:00:17', 1, 0, NULL, NULL),
(18, 'page', 'get-started', 'Get Started', NULL, '', '<p>&nbsp; &nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', '', 'Get Started', '', '', NULL, NULL, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'ES', 'Spain'),
(203, 'LK', 'Sri Lanka'),
(204, 'SH', 'St. Helena'),
(205, 'PM', 'St. Pierre and Miquelon'),
(206, 'SD', 'Sudan'),
(207, 'SR', 'Suriname'),
(208, 'SJ', 'Svalbard and Jan Mayen Islands'),
(209, 'SZ', 'Swaziland'),
(210, 'SE', 'Sweden'),
(211, 'CH', 'Switzerland'),
(212, 'SY', 'Syrian Arab Republic'),
(213, 'TW', 'Taiwan'),
(214, 'TJ', 'Tajikistan'),
(215, 'TZ', 'Tanzania, United Republic of'),
(216, 'TH', 'Thailand'),
(217, 'TG', 'Togo'),
(218, 'TK', 'Tokelau'),
(219, 'TO', 'Tonga'),
(220, 'TT', 'Trinidad and Tobago'),
(221, 'TN', 'Tunisia'),
(222, 'TR', 'Turkey'),
(223, 'TM', 'Turkmenistan'),
(224, 'TC', 'Turks and Caicos Islands'),
(225, 'TV', 'Tuvalu'),
(226, 'UG', 'Uganda'),
(227, 'UA', 'Ukraine'),
(228, 'AE', 'United Arab Emirates'),
(229, 'GB', 'United Kingdom'),
(230, 'US', 'United States'),
(231, 'UM', 'United States minor outlying islands'),
(232, 'UY', 'Uruguay'),
(233, 'UZ', 'Uzbekistan'),
(234, 'VU', 'Vanuatu'),
(235, 'VA', 'Vatican City State'),
(236, 'VE', 'Venezuela'),
(237, 'VN', 'Vietnam'),
(238, 'VG', 'Virgin Islands (British)'),
(239, 'VI', 'Virgin Islands (U.S.)'),
(240, 'WF', 'Wallis and Futuna Islands'),
(241, 'EH', 'Western Sahara'),
(242, 'YE', 'Yemen'),
(243, 'YU', 'Yugoslavia'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupons`
--

CREATE TABLE `discount_coupons` (
  `id` int(11) NOT NULL,
  `code` varchar(15) NOT NULL,
  `description` varchar(64) NOT NULL,
  `amount` decimal(15,2) DEFAULT NULL,
  `type` varchar(35) DEFAULT 'percent',
  `startDate` datetime DEFAULT NULL,
  `endDate` datetime DEFAULT NULL,
  `maxUse` int(3) NOT NULL DEFAULT '0',
  `minOrder` decimal(15,2) NOT NULL DEFAULT '0.00',
  `used` int(3) NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `alt` varchar(20) DEFAULT NULL,
  `filePath` varchar(50) DEFAULT NULL,
  `fileType` varchar(15) NOT NULL,
  `status` int(2) DEFAULT '1',
  `deleted` int(2) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  `relatedTo` varchar(15) DEFAULT NULL,
  `related_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `guestbook`
--

CREATE TABLE `guestbook` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `message` varchar(200) NOT NULL,
  `status` int(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guestbook`
--

INSERT INTO `guestbook` (`id`, `name`, `email`, `message`, `status`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Valentine\'s Day Outfits', 'admin@gmail.com', 'sadadasdasd', 1, '2016-04-15 14:47:05', '2016-04-15 14:47:05', NULL),
(2, 'kash Ali', 'kash@golpik.com', 'dfsdfsdf', 1, '2016-04-25 14:10:13', '2016-04-25 14:10:13', NULL),
(3, 'kash Ali', 'kash@golpik.com', 'dfsdfsdf', 1, '2016-04-25 14:10:13', '2016-04-25 14:10:13', NULL),
(4, 'kash Ali', 'kash@golpik.com', 'dfsdfsdf', 1, '2016-04-25 14:10:50', '2016-04-25 14:10:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2014_10_12_104748_create_administrators_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `gender` varchar(4) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `ssn` varchar(50) DEFAULT NULL,
  `firstName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `lastName` varchar(255) CHARACTER SET latin1 NOT NULL,
  `user_id` int(11) NOT NULL,
  `grandTotal` float NOT NULL,
  `message` text CHARACTER SET latin1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `paymentType` varchar(20) CHARACTER SET latin1 DEFAULT NULL,
  `orderStatus` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'pending',
  `deleted` int(2) DEFAULT '0',
  `paymentStatus` varchar(20) CHARACTER SET latin1 NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

-- --------------------------------------------------------

--
-- Table structure for table `orders_discounts`
--

CREATE TABLE `orders_discounts` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `discount` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `customer_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `quantity` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `order_product_attributes`
--

CREATE TABLE `order_product_attributes` (
  `id` int(11) NOT NULL,
  `orders_prodrocts_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `value_id` int(11) NOT NULL,
  `attribute` varchar(255) DEFAULT NULL,
  `value` varchar(255) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@yopmail.com', 'cadd80a288de20b6ce9c6e5fee7441bc430d1fae8fbbcc80260cb83178e4c3ea', '2016-05-10 16:37:17'),
('admin@gmail.com', '86ab357e984469c95b76ab683cb22db00ff1092fa34bda9cbf5c799db41e648b', '2017-03-10 05:46:36');

-- --------------------------------------------------------

--
-- Table structure for table `payments_credit_cards`
--

CREATE TABLE `payments_credit_cards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cardNumber` bigint(18) NOT NULL,
  `cardCVC` varchar(6) NOT NULL,
  `type` varchar(11) DEFAULT NULL,
  `cardExpiry` varchar(10) NOT NULL,
  `order_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments_credit_cards`
--

INSERT INTO `payments_credit_cards` (`id`, `name`, `cardNumber`, `cardCVC`, `type`, `cardExpiry`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Aftab Khan', 1111111111111111, '123', NULL, '20/12', 1, '2016-02-22 13:17:41', '2016-02-22 13:17:41'),
(2, 'Aftab Khan', 123456789012345, '123', NULL, '2012', 2, '2016-02-22 14:54:28', '2016-02-22 14:54:28'),
(4, 'Aftab Khan', 1111111111111111, '123', NULL, '2/2016', 7, '2016-02-23 08:52:03', '2016-02-23 08:52:03'),
(5, 'Aftab Khan', 1111111111, '123', NULL, '1/2024', 8, '2016-02-23 15:30:21', '2016-02-23 15:30:21');

-- --------------------------------------------------------

--
-- Table structure for table `paypal`
--

CREATE TABLE `paypal` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `paymentId` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `payerID` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paypal`
--

INSERT INTO `paypal` (`id`, `order_id`, `paymentId`, `token`, `payerID`, `created_at`, `updated_at`) VALUES
(14, 2, 'QUTM2CJ53ZV34', 'EC-17J09136BP306661T', 'QUTM2CJ53ZV34', '2016-11-23 11:48:13', '2016-11-23 11:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `teaser` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `deleted` int(2) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `url` text,
  `category_id` int(11) NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `sale` int(2) DEFAULT '0',
  `salePrice` float DEFAULT NULL,
  `priceForDoctors` float NOT NULL,
  `availabeInColors` int(2) NOT NULL DEFAULT '0',
  `quantity` int(2) DEFAULT '0',
  `inStock` int(2) DEFAULT '1',
  `tax` float DEFAULT NULL,
  `type` varchar(10) DEFAULT 'simple',
  `metaTitle` varchar(255) DEFAULT NULL,
  `wholeSale` int(2) DEFAULT '0',
  `featured` int(2) DEFAULT NULL,
  `inventory` int(11) DEFAULT NULL,
  `catalogNo` int(11) DEFAULT NULL,
  `simpleProduct` int(1) DEFAULT '0',
  `sku` varchar(75) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `teaser`, `description`, `image`, `keywords`, `status`, `deleted`, `created_at`, `updated_at`, `url`, `category_id`, `price`, `sale`, `salePrice`, `priceForDoctors`, `availabeInColors`, `quantity`, `inStock`, `tax`, `type`, `metaTitle`, `wholeSale`, `featured`, `inventory`, `catalogNo`, `simpleProduct`, `sku`) VALUES
(1, 'HyperKnit Tank Top - Graphite', '', '<div class="hl_custom_description">\r\n                    <div class="Block Panel ProductDescription" id="ProductDescription">\r\n    <h2 class="subtitle">Product Description</h2>\r\n    <div class="ProductDescriptionContainer prodAccordionContent">\r\n        \r\n        <div class="custom_description">\r\n<div class="hl_content_text container">\r\n<h4>YEAR ROUND COMFORT &amp; MOISTURE WICKING PERFORMANCE</h4>\r\n<p>The Physiq Apparel Seamless Tank pushes the boundaries of innovation and performance. Made of sweat wicking fabric with enhanced ventilation to help you stay cool and dry. The stretch-fit fabric allows for maximum movement with tapered areas providing a body hugging fit.</p>\r\n</div>\r\n<div class="hl_content_img"><img class="__mce_add_custom__" title="grey-tank-feat1.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/grey-tank-feat1.jpg?t=1468490268" alt="grey-tank-feat1.jpg" width="1900" height="600"></div>\r\n<div class="hl_content_text container">\r\n<h4>Outstanding innovation</h4>\r\n<p>No seams within the tubular body construction ensures optimal comfort at all times. Benefit from 360 degrees enhanced visibility with reflective logo printing. We\'ve created a product that suits all aspects of training and fitness, indoor and outdoor.</p>\r\n</div>\r\n<div class="hl_content_img"><img class="__mce_add_custom__" title="grey-tank-feat2.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/grey-tank-feat2.jpg?t=1468490539" alt="grey-tank-feat2.jpg"></div>\r\n<div class="performance-features container">\r\n<h4><span>performance features</span></h4>\r\n<div class="content-performance-features">\r\n<div class="left_feature">\r\n<ul>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-1.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-1.jpg?t=1449202241" alt="icon-1.jpg" width="50" height="50"></span>\r\n<h5>Seamless tubular body</h5>\r\n<p>for a performance enhancing, anti-irritating finish</p>\r\n</li>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-2.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-2.jpg?t=1449202251" alt="icon-2.jpg" width="50" height="50"></span>\r\n<h5>Temperature regulating fabric</h5>\r\n<p>for optimal warmth in cold temperatures, while also keeping you cool during intense workouts</p>\r\n</li>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-3.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-3.jpg?t=1449202254" alt="icon-3.jpg" width="50" height="50"></span>\r\n<h5>360 degree reflectivity</h5>\r\n<p>for enhanced visibility in low-light</p>\r\n</li>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-4.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-4.jpg?t=1449202257" alt="icon-4.jpg" width="50" height="50"></span>\r\n<h5>Tapered fitting areas</h5>\r\n<p>for a unrivalled body hugging fit</p>\r\n</li>\r\n</ul>\r\n</div>\r\n<div class="center_feature"><img class="__mce_add_custom__" title="grey-feature.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/grey-feature.jpg?t=1468263915" alt="grey-feature.jpg" width="625" height="287"></div>\r\n<div class="right_feature">\r\n<ul>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-5.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-5.jpg?t=1449202260" alt="icon-5.jpg" width="50" height="50"></span>\r\n<h5>Sweat wicking technology</h5>\r\n<p>pulls the sweat away from your skin and moves it outside the fabric</p>\r\n</li>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-6.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-6.jpg?t=1449202262" alt="icon-6.jpg" width="50" height="50"></span>\r\n<h5>Breathable fabric</h5>\r\n<p>for increased airflow and staying cool during your workouts</p>\r\n</li>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-7.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-7.jpg?t=1449202264" alt="icon-7.jpg" width="50" height="50"></span>\r\n<h5>4 way stretch material</h5>\r\n<p>provides maximum mobility and comfort</p>\r\n</li>\r\n<li><span class="icon"><img class="__mce_add_custom__" title="icon-8.jpg" src="http://cdn2.bigcommerce.com/server3500/iyqvgyco/product_images/uploaded_images/icon-8.jpg?t=1449202275" alt="icon-8.jpg" width="50" height="50"></span>\r\n<h5>Lightweight and smooth</h5>\r\n<p>increases comfort and performance while feeling smooth against your skin</p>\r\n</li>\r\n</ul>\r\n</div>\r\n</div>\r\n</div>\r\n</div>\r\n        \r\n    </div>\r\n    <!--<hr style="" class="ProductSectionSeparator" />-->\r\n</div>\r\n\r\n\r\n\r\n\r\n  <div class="socialphotos-widget-root slpht-clearfix" data-uid="iyqvgyco" id="socialphotos-widget-1" data-id="688535" data-containerid="1">\r\n\r\n<!-- Socialphotos app https://socialphotosapp.com -->\r\n<div id="socialphotos-gallery-0" style="float: none !important;"><p class="spw-text">Hashtag #PHYSIQAPPAREL to be featured here!</p>\r\n\r\n  <p class="spw-text"><a style="color: #428BCA; text-decoration: underline; cursor: pointer;" class="slpht-upload" data-id="688535"></a></p>\r\n\r\n\r\n<div class="slpht-carousel slpht-clearfix">\r\n  <!-- Photos roll -->\r\n  <div class="slpht-carousel-inner">\r\n    \r\n      <div class="spw-row" id="sp_wll_1" style="height: auto;"><ul class="spw-thumbnails"><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/sh0.08/e35/p640x640/16906940_171420716695545_8925629871510519808_n.jpg\');" data-id="9609222" data-containerid="1"></div></li><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/sh0.08/e35/p640x640/16906627_1859333707682992_7159385533796319232_n.jpg\');" data-id="9609219" data-containerid="1"></div></li><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/e35/16788842_1276418152443011_4771473301648179200_n.jpg\');" data-id="9606168" data-containerid="1"></div></li><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/16465238_1895908800652797_2104728786166611968_n.jpg?ig_cache_key=MTQ0NTI5MTkxOTY5MzY2MjkxNg%3D%3D.2\');" data-id="9605131" data-containerid="1"></div></li><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/sh0.08/e35/p640x640/15624557_350145035384101_2557514451943161856_n.jpg?ig_cache_key=MTQxODY5NDQ3OTkzNzkxMzkxOA%3D%3D.2\');" data-id="9603283" data-containerid="1"></div></li><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/sh0.08/e35/p640x640/14606945_361087724256230_5966051788548210688_n.jpg?ig_cache_key=MTQxNjA2MDU5ODc4NTE3NjUwNw%3D%3D.2\');" data-id="9601540" data-containerid="1"></div></li><li class="spw-thumbnail">\r\n  <!-- class "spw-lazy" - delays loading of images in long web pages -->\r\n  \r\n<div class="spw-thumbnail-overlay"></div>\r\n<div class="socialphotos-view" style="background-image:url(\'https://scontent.cdninstagram.com/t51.2885-15/s640x640/sh0.08/e35/16123540_653039581545517_2057552040753627136_n.jpg?ig_cache_key=MTQzNTYyODI1MDE5NzEwMDU5Nw%3D%3D.2\');" data-id="9601392" data-containerid="1"></div></li></ul></div>\r\n    \r\n  </div>\r\n\r\n  <!-- Left control -->\r\n  <a class="left slpht-carousel-control spw_prev" id="spw_prev_1" role="button" data-slide="prev" data-containerid="1" style="display: none;">\r\n    <span class="slpht-glyphicon slpht-glyphicon-chevron-left"></span>\r\n  </a>\r\n\r\n  <!-- Right control -->\r\n  <a class="right slpht-carousel-control spw_next" id="spw_next_1" role="button" data-slide="next" data-containerid="1">\r\n    <span class="slpht-glyphicon slpht-glyphicon-chevron-right"></span>\r\n  </a>\r\n</div>\r\n\r\n<!-- Load more control -->\r\n<!-- If you consider changing load more colors: edit style attribute below -->\r\n<style>\r\n  .slpht-glyphicon.slpht-glyphicon-chevron-down {\r\n    color: #000000;\r\n  }\r\n  .slpht-carousel-load-more:hover .slpht-glyphicon-chevron-down {\r\n    color: #797979;\r\n  }\r\n</style>\r\n\r\n<!-- .slpht-carousel-load-more triggers load more logic -->\r\n<div class="slpht-carousel-load-more" id="spw_load_more_1" data-containerid="1">\r\n  <!-- You can add your text below between <p> and </p> -->\r\n  <p class="slpht-load-more-text">  </p>\r\n  <div class="slpht-load-more-icon slpht-text-center">\r\n    <span class="slpht-glyphicon slpht-glyphicon-chevron-down"></span>\r\n  </div>\r\n</div></div>\r\n\r\n</div><br>\r\n\r\n    <style type="text/css">\r\n.tg  {border-collapse:collapse;border-spacing:0;margin:0px auto;}\r\n.tg td{font-family:Arial, sans-serif;font-size:14px;padding:17px 17px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}\r\n.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:17px 17px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}\r\n.tg .tg-7fle{font-weight:bold;background-color:#efefef;;border-color:#efefef;text-align:center;vertical-align:top}\r\n.tg .tg-083h{font-weight:bold;font-family:Arial, Helvetica, sans-serif !important;;background-color:#efefef;border-color:#efefef;text-align:center;vertical-align:top}\r\n.tg .tg-baqh{text-align:center;vertical-align:top}\r\n@media screen and (max-width: 967px) {.tg {width: auto !important;}.tg col {width: auto !important;}.tg-wrap {overflow-x: auto;-webkit-overflow-scrolling: touch;margin: auto 0px;}}</style>\r\n\r\n\r\n<div id="openModal" class="modalDialog">\r\n    <div>\r\n        <a href="#close" title="Close" class="close">X</a>\r\n        <br>\r\n<h4>MENS SIZE GUIDE</h4>\r\n\r\n<p>The following size chart refers to all Mens t-shirts, tank tops, stringer vests, hoodies, bottoms and shorts. These are only for guidance and some products may slightly vary in sizing. Although our products are designed to be true to size, we strongly recommend reading the \'sizing tips\' for the most accurate recommendation for your choice. Our customer service team are experts at assisting you to find the perfect fit, so feel free to chat to us using our Live Chat feature at the bottom of the website. </p>\r\n\r\n\r\n\r\n  <div class="datagrid">\r\n\r\n        <div class="tg-wrap"><table class="tg" style="undefined;table-layout: fixed; width: 501px">\r\n<colgroup>\r\n<col style="width: 180px">\r\n<col style="width: 180px">\r\n<col style="width: 180px">\r\n<col style="width: 180px">\r\n</colgroup>\r\n  <tbody><tr>\r\n    <th class="tg-083h">Size</th>\r\n    <th class="tg-7fle">Chest</th>\r\n    <th class="tg-7fle">Waist</th>\r\n    <th class="tg-7fle">Hip</th>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Small</td>\r\n    <td class="tg-baqh">31-34"</td>\r\n    <td class="tg-baqh">28-30"</td>\r\n    <td class="tg-baqh">29-34"</td>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Medium</td>\r\n    <td class="tg-baqh">37-41"</td>\r\n    <td class="tg-baqh">31-33"</td>\r\n    <td class="tg-baqh">34-37"</td>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Large</td>\r\n    <td class="tg-baqh">41-44"</td>\r\n    <td class="tg-baqh">34-38"</td>\r\n    <td class="tg-baqh">37-40"</td>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">XL</td>\r\n    <td class="tg-baqh">44-48"</td>\r\n    <td class="tg-baqh">38-42"</td>\r\n    <td class="tg-baqh">40-43"</td>\r\n  </tr>\r\n</tbody></table></div><br><br>\r\n\r\n\r\n        <h4>WOMENS SIZE GUIDE</h4>\r\n\r\n<p>The following size chart refers to all Womens tops, hoodies, bottoms and tights. These are only for guidance and some products may slightly vary in sizing. Although our products are designed to be true to size, we strongly recommend reading the \'sizing tips\' for the most accurate recommendation for your choice. Our customer service team are experts at assisting you to find the perfect fit, so feel free to chat to us using our Live Chat feature at the bottom of the website. </p>\r\n\r\n\r\n  <div class="datagrid">\r\n\r\n        <div class="tg-wrap"><table class="tg" style="undefined;table-layout: fixed; width: 700px">\r\n<colgroup>\r\n<col style="width: 180px">\r\n<col style="width: 180px">\r\n<col style="width: 180px">\r\n<col style="width: 180px">\r\n</colgroup>\r\n  <tbody><tr>\r\n    <th class="tg-083h">Size</th>\r\n    <th class="tg-7fle">Chest</th>\r\n    <th class="tg-7fle">Waist</th>\r\n    <th class="tg-7fle">Inside Leg</th>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Extra Small<br>\r\nUK 6-8<br>\r\nUS 2-4</td>\r\n    <td class="tg-baqh">&lt; 34(&lt; 86)    </td>\r\n    <td class="tg-baqh">&lt; 30(&lt; 76)    </td>\r\n    <td class="tg-baqh">&lt; 28(&lt; 71)\r\n</td>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Small<br>\r\nUK 8-10<br>\r\nUS 4-6</td>\r\n    <td class="tg-baqh">34 - 36(86 - 91)    </td>\r\n    <td class="tg-baqh">30 - 33(76 - 84)    </td>\r\n    <td class="tg-baqh">28 - 29(70 - 74)\r\n</td>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Medium<br>\r\nUK 10-12<br>\r\nUS 6-8</td>\r\n    <td class="tg-baqh">36 - 38(91 - 96)    </td>\r\n    <td class="tg-baqh">33 - 36(84 - 91)    </td>\r\n    <td class="tg-baqh">29 - 30(74 - 76)\r\n</td>\r\n  </tr>\r\n  <tr>\r\n    <td class="tg-baqh">Large<br>\r\nUK 12-14<br>\r\nUS 8-10</td>\r\n    <td class="tg-baqh">38 - 42(96 - 107)    </td>\r\n    <td class="tg-baqh">36 - 40(91 - 102)    </td>\r\n    <td class="tg-baqh">30 - 31(76 - 78)</td>\r\n  </tr>\r\n</tbody></table></div><br><br>\r\n           <h3> <div data-id="67ea2879b3" class="livechat_button"><a href="http://www.livechatinc.com/?partner=lc_3600491&amp;utm_source=chat_button">Live Chat</a></div>\r\n\r\n                                <script type="text/javascript">\r\nvar __lc = {};\r\n__lc.license = 3600491;\r\n\r\n(function() {\r\n	var lc = document.createElement(\'script\'); lc.type = \'text/javascript\'; lc.async = true;\r\n	lc.src = (\'https:\' == document.location.protocol ? \'https://\' : \'http://\') + \'cdn.livechatinc.com/tracking.js\';\r\n	var s = document.getElementsByTagName(\'script\')[0]; s.parentNode.insertBefore(lc, s);\r\n})();\r\n</script>\r\n\r\n</h3></div>\r\n\r\n        </div>\r\n    </div>\r\n</div>\r\n                \r\n                </div>', '1321488814901.jpg', '', 1, 0, '2017-03-06 15:41:41', '2017-03-06 15:41:41', NULL, 0, 30.63, NULL, 0, 0, 0, 0, 1, NULL, 'simple', NULL, 0, NULL, NULL, NULL, 0, 'spar-jogger-pants'),
(2, 'MUTANT MUSCLES MASS', 'Advance pre-workut for increased Energy & Focus', '<p>&nbsp;&nbsp;</p>\r\n', '9721489069487.jpg', '', 1, 0, '2017-03-09 14:24:35', '2017-03-09 14:24:47', NULL, 0, 220, 0, 0, 0, 0, 0, 1, NULL, 'simple', NULL, 0, NULL, NULL, NULL, 0, 'm01'),
(3, 'BPI BEST SPORTS BCAA', 'Advance pre-workut for increased Energy & Focus', '<p>&nbsp;&nbsp;</p>\r\n', '1861489069567.jpg', '', 1, 0, '2017-03-09 14:26:07', '2017-03-09 14:26:07', NULL, 0, 100, NULL, 0, 0, 0, 0, 1, NULL, 'simple', NULL, 0, NULL, NULL, NULL, 0, '902'),
(4, 'Lxius Sporty Rope', 'Advance pre-workut for increased Energy & Focus', '<p>&nbsp;&nbsp;</p>\r\n', '9821489069711.jpg', '', 1, 0, '2017-03-09 14:28:31', '2017-03-09 14:28:31', NULL, 0, 220, NULL, 0, 0, 0, 0, 1, NULL, 'simple', NULL, 0, NULL, NULL, NULL, 0, 'm03'),
(5, 'MUTANT MUSCLES MASS', 'Advance pre-workut for increased Energy & Focus', '<p>&nbsp;&nbsp;</p>\r\n', '3411489069755.jpg', '', 1, 0, '2017-03-09 14:29:15', '2017-03-09 14:29:15', NULL, 0, 30.63, NULL, 0, 0, 0, 0, 1, NULL, 'simple', NULL, 0, NULL, NULL, NULL, 0, 'm04');

-- --------------------------------------------------------

--
-- Table structure for table `products_attributes`
--

CREATE TABLE `products_attributes` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `attribute_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sortOrder` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_attributes`
--

INSERT INTO `products_attributes` (`id`, `product_id`, `attribute_id`, `created_at`, `updated_at`, `sortOrder`) VALUES
(1, 1, 2, '2017-03-06 15:41:41', '2017-03-06 15:41:41', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products_categories`
--

CREATE TABLE `products_categories` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_categories`
--

INSERT INTO `products_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-03-06 15:41:41', '2017-03-06 15:41:41'),
(2, 1, 2, '2017-03-06 15:41:41', '2017-03-06 15:41:41'),
(4, 2, 4, '2017-03-09 14:24:47', '2017-03-09 14:24:47'),
(5, 3, 4, '2017-03-09 14:26:07', '2017-03-09 14:26:07'),
(6, 4, 4, '2017-03-09 14:28:32', '2017-03-09 14:28:32'),
(7, 5, 4, '2017-03-09 14:29:15', '2017-03-09 14:29:15');

-- --------------------------------------------------------

--
-- Table structure for table `products_images`
--

CREATE TABLE `products_images` (
  `id` int(11) NOT NULL,
  `attribute_value_id` int(11) DEFAULT NULL,
  `caption` varchar(50) DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_images`
--

INSERT INTO `products_images` (`id`, `attribute_value_id`, `caption`, `image`, `created_at`, `updated_at`, `product_id`) VALUES
(1, 50, NULL, '3321488814913.jpg', '2017-03-06 15:41:53', '2017-03-06 15:41:53', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `deleted` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`id`, `name`, `price`, `created_at`, `updated_at`, `status`, `deleted`) VALUES
(2, '5-7 DAYS USA', 12.5, '2016-04-15 12:28:46', '2016-04-15 12:28:46', NULL, NULL),
(3, '2 BUSINESS DAYS, order by 1p', 20, '2016-04-15 12:29:06', '2016-04-15 16:34:28', NULL, NULL),
(4, 'NEXT DAY USA or INTERNATIONAL', 65, '2016-04-15 12:30:46', '2016-04-15 12:30:46', NULL, NULL),
(5, 'INTL. 1st class up to 6 weeks', 14, '2016-04-15 12:31:04', '2016-04-15 12:31:04', NULL, NULL),
(6, '7-10 DAYS USA', 8, '2016-04-15 12:31:28', '2016-04-15 12:31:28', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `title` varchar(22) NOT NULL,
  `code` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci';

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`title`, `code`) VALUES
('Alaska', 'AK'),
('Alabama', 'AL'),
('Arkansas', 'AR'),
('Arizona', 'AZ'),
('California', 'CA'),
('Colorado', 'CO'),
('Connecticut', 'CT'),
('District of Columbia', 'DC'),
('Delaware', 'DE'),
('Florida', 'FL'),
('Georgia', 'GA'),
('Hawaii', 'HI'),
('Iowa', 'IA'),
('Idaho', 'ID'),
('Illinois', 'IL'),
('Indiana', 'IN'),
('Kansas', 'KS'),
('Kentucky', 'KY'),
('Louisiana', 'LA'),
('Massachusetts', 'MA'),
('Maryland', 'MD'),
('Maine', 'ME'),
('Michigan', 'MI'),
('Minnesota', 'MN'),
('Missouri', 'MO'),
('Mississippi', 'MS'),
('Montana', 'MT'),
('North Carolina', 'NC'),
('North Dakota', 'ND'),
('Nebraska', 'NE'),
('New Hampshire', 'NH'),
('New Jersey', 'NJ'),
('New Mexico', 'NM'),
('Nevada', 'NV'),
('New York', 'NY'),
('Ohio', 'OH'),
('Oklahoma', 'OK'),
('Oregon', 'OR'),
('Pennsylvania', 'PA'),
('Rhode Island', 'RI'),
('South Carolina', 'SC'),
('South Dakota', 'SD'),
('Tennessee', 'TN'),
('Texas', 'TX'),
('Utah', 'UT'),
('Virginia', 'VA'),
('Vermont', 'VT'),
('Washington', 'WA'),
('Wisconsin', 'WI'),
('West Virginia', 'WV'),
('Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `stripe_customers`
--

CREATE TABLE `stripe_customers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `stripeCustomerId` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stripe_customers`
--

INSERT INTO `stripe_customers` (`id`, `user_id`, `stripeCustomerId`, `created_at`, `updated_at`) VALUES
(11, 35, 'cus_9wq1Wnf5D0yC3l', '2017-01-17 17:45:24', '2017-01-17 17:45:24'),
(12, 1, 'cus_9x9Ofk9EbKFnlg', '2017-01-18 13:47:12', '2017-01-18 13:47:12'),
(13, 36, 'cus_9xQHt43ZG75t1M', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `firstName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `dob` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT '2',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `isConfirmed` int(2) DEFAULT '0',
  `gender` varchar(6) COLLATE utf8_unicode_ci NOT NULL,
  `isCompetitor` int(1) DEFAULT '0',
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `federation` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `medicalConcerns` text COLLATE utf8_unicode_ci,
  `goals` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastName` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `middleName` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` varchar(5) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='utf8_unicode_ci';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `email`, `password`, `dob`, `remember_token`, `role_id`, `created_at`, `updated_at`, `isConfirmed`, `gender`, `isCompetitor`, `height`, `weight`, `federation`, `medicalConcerns`, `goals`, `lastName`, `middleName`, `state`, `status`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$Dm5OQMXEHkFhm2RONbfiy.pf2ylaAABugcH/3mc0/DF9kv5t3esiO', '1986-1-1', 'gltJkkD0DN2B9l4ynLAZjtz0XkHg9PVFRTodsgoBq8tywJlzjwi6kCv9UFYz', 1, '2016-10-04 12:18:01', '2017-01-25 15:44:28', 0, 'm', 0, 0, 0, 'golpik', NULL, '', 'Golpik', NULL, '', 0),
(30, 'Admin', 'aftab@yopmail.com', '$2y$10$pUBTAxRsPfHr.OWzb/c5.eXRAI.chwOMt3KsdLkWK0lCOcIFs6e/.', '2016-1-1', 'G46UZQ85VpB4PQK4rpQQjVuZcKuX3J7FmKvOHhQpcn9ukdHJ1N0SUN4L0WK3', 2, '2016-11-23 14:16:55', '2016-12-05 13:11:57', 0, 'm', 0, 0, 0, 'golpik', NULL, '', 'Golpik', NULL, 'AK', 0),
(31, 'adel', 'adel@newcenturylabs.com', '$2y$10$fCKIy16J2sF89BkVXEC2juEOOKTLR1yqOCqJeTdaPCH95hgCiT2uK', '2016-1-1', 'CsvXcIPi7kX1RHkAXqNglpWNLhb8lDQAxb8Zkoo5qXnXCpM49OG4cAVVOOrE', 2, '2016-12-01 18:17:21', '2016-12-03 23:09:31', 0, 'f', 0, 0, 0, 'ncl', NULL, '', 'morgan ', NULL, 'OR', 0),
(32, 'Norah', 'norah.a.naim@gmail.com', '$2y$10$gz9LRF1C1ICcQXXl02okmeKQ949PfgNf.TI7Ck0XbjO3C5DgjNYfe', '2016-1-1', '3eAglQ7O2mmttwwT73kwUrovZ8JT11KAVWKVV4LZozkdEfxyxHiM5Vruhn3X', 2, '2016-12-05 20:52:30', '2016-12-05 20:53:22', 0, 'm', 0, 0, 0, '1992', NULL, '', 'Alnaim', NULL, 'MI', 0),
(33, 'Ahmed', 'amerahmm@gmail.com', '$2y$10$LC5Fy1QAXhgNraTydLtVnOt4p0H9Ag36u1R4rXiC7QcVEqGZsmvJO', '1988-1-18', 'u7FJLDAWn7ZkjVbB9AgIsrtWuA3POI7hHK6dd5DKnMRx9E6Eaiw6Saq2lofV', 2, '2016-12-16 15:05:28', '2016-12-23 04:43:22', 0, 'm', 0, 0, 0, 'Not needed', NULL, '', 'Alamer', NULL, 'MI', 0),
(34, 'asdasd', 'golpik@yopmail.com', '$2y$10$QqYhZBCWH5rfskFKTURb7emXb1hunwjk6RMEYiJoeVErV/vvmLPCK', '1998-9-1', '0fy0MP2whYh5fnU5M2kFxDrU55zV3RDiCuBfN46C9q4TyoNN3VQXndrV8Tub', 2, '2017-01-04 14:35:06', '2017-01-04 14:56:13', 0, 'm', 0, 0, 0, NULL, NULL, '', 'dsa', NULL, 'State', 0),
(35, 'Aftab', 'doctor@yopmail.com', '$2y$10$8YBCdPKWKcXa5QjjSU07L.GwkQBNfakK3Zda2wNf0mWbMDmqoTVbW', '2016-1-1', 'hvA1jzbO2fRR3uopdvwcaDde1bF76BF2uhvejWvGAJAGEwZ8nTpLIiA5gAr6', 3, '2017-01-11 15:47:57', '2017-01-25 15:45:46', 0, 'm', 0, 0, 0, NULL, NULL, '', 'Doctor', NULL, 'State', 0),
(36, 'Adel ', 'customerservice@newcenturylabs.com', '$2y$10$1P7U.c88xwo37/jr.NiT1.wuN35hI61d.98N5w4m6QycP2DkVkXK.', '1981-2-10', 'YNU3SdaCz7QnB6CoztvEnWkt9sZ6t6lkGqoDxyidaqU7bLTkhVTE5BjDIHK0', 2, '2017-01-19 02:10:55', '2017-01-19 02:10:55', 0, 'm', 0, 0, 0, NULL, NULL, '', 'Morgan ', NULL, 'OR', 0),
(37, 'First Name', 'test@yopmail.com', '$2y$10$1Mb9GpSXaZxAbLa9ftNkLOSx8gBi39DjyVhtbNWr/LGGBhVHiyiBa', '2016-1-1', 'L7NLdjUugOdzUAHtYcd9Gr2QqFm81wZ5HHRkM1qepWB73kZx6MSKFdazSQbO', 3, '2017-03-08 08:30:38', '2017-03-08 08:31:39', 0, 'm', 0, 0, 0, NULL, NULL, '', 'Last Name', 'Middle Name', 'New Y', 0),
(38, 'First Name', 'testgolpik@yopmail.com', '$2y$10$pFYhZe2IZIko90z.WcP6eeWfUSmoY.fQWXoxNDEVQgA8bGSrXAAdy', '2016-1-1', 'G1ma2lZOYLQASrTZOVnTed0QNqGtrzR86IuvhmTwFl1a8bTtwvtYd1SDlMMr', 3, '2017-03-08 09:37:56', '2017-03-08 09:43:38', 0, 'm', 0, 6.7, 5.7, 'K7', 'no', '', 'Last Name', 'Middle Name', 'New Y', 0),
(39, 'First Name', 'test123@yopmail.com', '$2y$10$6PO9gJ0wANYsZSzgFH6bsebZRgeA4tW5rGQ2d1aQpSR1enN98oZW2', '2016-1-1', 'jPDVDiwJebHnZkeJzKYtD3lggNPN0EnkncjyzrVv2rNQx9gOrdoqs33hjNhr', 2, '2017-03-08 09:44:37', '2017-03-08 09:44:37', 0, 'm', 0, 6.7, 5.7, 'K7', '', '', 'Last Name', 'Middle Name', 'New Y', 0),
(40, 'First Name', 'test12413@yopmail.com', '$2y$10$pyqVpDWdgwtTKYyvsLAk8.Nt/QJAvnCZOlI7rSWa9/KVQVxoU/7bS', '2016-1-1', 'k89WoLHgMMrE1pFBm2VFYtt1yTiJuARCGqR3N9C2opIT9P8ksQNL3I9BWocV', 2, '2017-03-08 09:50:48', '2017-03-08 09:50:48', 0, 'm', 1, 6.7, 5.7, 'K7', '', '', 'Last Name', 'Middle Name', 'New Y', 0),
(41, 'First Name', 'ambassador@yopmail.com', '$2y$10$F8rA2EoV.LI62zqsdMbN4u6CX/02u14D666zhdcZJ7mwHs037pCSa', '2016-1-1', '01RWbXIhR4yY3tpzSviU8bmxDlPxUfvD5ZcW5Z1ZnZVWWTUWkt8HQ8z0rVOx', 3, '2017-03-08 09:55:21', '2017-03-08 13:05:42', 0, 'm', 0, 6.7, 5.7, 'K7', '', '', 'Last Name', 'Middle Name', 'New Y', 0),
(42, 'First Name', 'ambassador2@yopmail.com', '$2y$10$6kgHmr87rav3GCmMQhaAqeEOPGsemREJ9Aty3BaQ/D3w8as8Msznm', '2016-1-1', 'rFA36IdhHJjDaPUisEIjJevxR3fV0faNRX3q9GkwgapHzEU2prN6bZn7jcCV', 3, '2017-03-08 13:07:03', '2017-03-10 10:17:29', 0, 'f', 0, 6.7, 5.7, '', '', '', 'Last Name', 'Middle Name', 'New Y', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `administrators_username_unique` (`username`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attributes_values`
--
ALTER TABLE `attributes_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_categories`
--
ALTER TABLE `blog_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_posts`
--
ALTER TABLE `blog_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_product_attributes`
--
ALTER TABLE `cart_product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guestbook`
--
ALTER TABLE `guestbook`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_discounts`
--
ALTER TABLE `orders_discounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_product_attributes`
--
ALTER TABLE `order_product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `payments_credit_cards`
--
ALTER TABLE `payments_credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paypal`
--
ALTER TABLE `paypal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD KEY `id` (`id`);

--
-- Indexes for table `products_attributes`
--
ALTER TABLE `products_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_categories`
--
ALTER TABLE `products_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_images`
--
ALTER TABLE `products_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `stripe_customers`
--
ALTER TABLE `stripe_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;
--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `attributes_values`
--
ALTER TABLE `attributes_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `blog_categories`
--
ALTER TABLE `blog_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `blog_posts`
--
ALTER TABLE `blog_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cart_product_attributes`
--
ALTER TABLE `cart_product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `discount_coupons`
--
ALTER TABLE `discount_coupons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guestbook`
--
ALTER TABLE `guestbook`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_discounts`
--
ALTER TABLE `orders_discounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `order_product_attributes`
--
ALTER TABLE `order_product_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payments_credit_cards`
--
ALTER TABLE `payments_credit_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `paypal`
--
ALTER TABLE `paypal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products_attributes`
--
ALTER TABLE `products_attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `products_categories`
--
ALTER TABLE `products_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `products_images`
--
ALTER TABLE `products_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `stripe_customers`
--
ALTER TABLE `stripe_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
