-- phpMyAdmin SQL Dump
-- version 4.3.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 23, 2017 at 07:57 AM
-- Server version: 5.5.51-38.2
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `yourtnt_too_cute`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE IF NOT EXISTS `attributes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(12) DEFAULT 'text',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `sortOrder` int(11) NOT NULL DEFAULT '0',
  `code` varchar(10) NOT NULL,
  `canDelete` int(2) DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
