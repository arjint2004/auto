-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 04, 2014 at 03:54 PM
-- Server version: 5.5.37
-- PHP Version: 5.4.4-14+deb7u9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autoarjint`
--

-- --------------------------------------------------------

--
-- Table structure for table `controll`
--

DROP TABLE IF EXISTS `controll`;
CREATE TABLE IF NOT EXISTS `controll` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_group` int(5) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `aktif` int(1) NOT NULL,
  `gpio_no` int(2) NOT NULL,
  `nyala` int(1) NOT NULL,
  `timer_aktif` int(1) NOT NULL,
  `date_on` varchar(10) NOT NULL,
  `date_off` varchar(10) NOT NULL,
  `time_on` varchar(8) NOT NULL,
  `time_off` varchar(8) NOT NULL,
  `every_timer` text NOT NULL,
  `type` enum('byday','schedulled') NOT NULL,
  `timer_service` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `controll`
--

INSERT INTO `controll` (`id`, `id_group`, `nama`, `aktif`, `gpio_no`, `nyala`, `timer_aktif`, `date_on`, `date_off`, `time_on`, `time_off`, `every_timer`, `type`, `timer_service`) VALUES
(1, 1, 'Point 1', 1, 1, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(2, 1, 'Point 2', 1, 2, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(3, 1, 'Point 3', 1, 3, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(4, 1, 'Point 4', 1, 4, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(5, 1, 'Point 5', 1, 5, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(6, 1, 'Point 6', 1, 6, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(7, 1, 'Point 7', 1, 7, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(8, 1, 'Point 8', 1, 8, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(9, 1, 'Point 9', 1, 9, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(10, 1, 'Point 10', 1, 10, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(11, 1, 'Point 11', 1, 11, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(12, 1, 'Point 12', 1, 12, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(13, 1, 'Point 13', 1, 13, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(14, 1, 'Point 14', 1, 14, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(15, 1, 'Point 15', 1, 15, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(16, 1, 'Point 16', 1, 16, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(17, 1, 'Point 17', 1, 17, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(18, 1, 'Point 18', 1, 18, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(19, 1, 'Point 19', 1, 19, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(20, 1, 'Point 20', 1, 20, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(21, 1, 'Point 21', 1, 21, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(22, 1, 'Point 22', 1, 22, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(23, 1, 'Point 23', 1, 23, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(24, 1, 'Point 24', 1, 24, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(25, 1, 'Point 25', 1, 25, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(26, 1, 'Point 26', 1, 26, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(27, 1, 'Point 27', 1, 27, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(28, 1, 'Point 28', 1, 28, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(29, 1, 'Point 29', 1, 29, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(30, 1, 'Point 30', 1, 30, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(31, 1, 'Point 31', 1, 31, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(32, 1, 'Point 32', 1, 32, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(33, 1, 'Point 33', 1, 33, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(34, 1, 'Point 34', 1, 34, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(35, 1, 'Point 35', 1, 35, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(36, 1, 'Point 36', 1, 36, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(37, 1, 'Point 37', 1, 37, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(38, 1, 'Point 38', 1, 38, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(39, 1, 'Point 39', 1, 39, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(40, 1, 'Point 40', 1, 40, 0, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(41, 1, 'Point 41', 1, 41, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(42, 1, 'Point 42', 1, 42, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(43, 1, 'Point 43', 1, 43, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(44, 1, 'Point 44', 1, 44, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(45, 1, 'Point 45', 1, 45, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(46, 1, 'Point 46', 1, 46, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(47, 1, 'Point 47', 1, 47, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0),
(48, 1, 'Point 48', 1, 48, 1, 0, '', '', '00:00:00', '00:00:00', '["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"]', 'byday', 0);

-- --------------------------------------------------------

--
-- Table structure for table `det_group`
--

DROP TABLE IF EXISTS `det_group`;
CREATE TABLE IF NOT EXISTS `det_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL,
  `auth` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16060 ;

-- --------------------------------------------------------

--
-- Table structure for table `gpio`
--

DROP TABLE IF EXISTS `gpio`;
CREATE TABLE IF NOT EXISTS `gpio` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `is_i2c` int(1) NOT NULL,
  `chip_addr` varchar(3) NOT NULL,
  `i2c_addr` varchar(4) NOT NULL,
  `command` text NOT NULL,
  `used` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `gpio`
--

INSERT INTO `gpio` (`id`, `nama`, `is_i2c`, `chip_addr`, `i2c_addr`, `command`, `used`) VALUES
(1, 'A0', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 0 -s high","off":"python mcp2301700.py -b a -o 0 -s low"}', 1),
(2, 'A1', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 1 -s high","off":"python mcp2301700.py -b a -o 1 -s low"}', 0),
(3, 'A2', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 2 -s high","off":"python mcp2301700.py -b a -o 2 -s low"}', 0),
(4, 'A3', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 3 -s high","off":"python mcp2301700.py -b a -o 3 -s low"}', 0),
(5, 'A4', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 4 -s high","off":"python mcp2301700.py -b a -o 4 -s low"}', 0),
(6, 'A5', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 5 -s high","off":"python mcp2301700.py -b a -o 5 -s low"}', 0),
(7, 'A6', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 6 -s high","off":"python mcp2301700.py -b a -o 6 -s low"}', 0),
(8, 'A7', 1, '000', '0x20', '{"on":"python mcp2301700.py -b a -o 7 -s high","off":"python mcp2301700.py -b a -o 7 -s low"}', 0),
(9, 'B0', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 0 -s high","off":"python mcp2301700.py -b b -o 0 -s low"}', 0),
(10, 'B1', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 1 -s high","off":"python mcp2301700.py -b b -o 1 -s low"}', 0),
(11, 'B2', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 2 -s high","off":"python mcp2301700.py -b b -o 2 -s low"}', 0),
(12, 'B3', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 3 -s high","off":"python mcp2301700.py -b b -o 3 -s low"}', 0),
(13, 'B4', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 4 -s high","off":"python mcp2301700.py -b b -o 4 -s low"}', 0),
(14, 'B5', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 5 -s high","off":"python mcp2301700.py -b b -o 5 -s low"}', 0),
(15, 'B6', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 6 -s high","off":"python mcp2301700.py -b b -o 6 -s low"}', 0),
(16, 'B7', 1, '000', '0x20', '{"on":"python mcp2301700.py -b b -o 7 -s high","off":"python mcp2301700.py -b b -o 7 -s low"}', 0),
(17, 'A0', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 0 -s high","off":"python mcp2301701.py -b a -o 0 -s low"}', 0),
(18, 'A1', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 1 -s high","off":"python mcp2301701.py -b a -o 1 -s low"}', 0),
(19, 'A2', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 2 -s high","off":"python mcp2301701.py -b a -o 2 -s low"}', 0),
(20, 'A3', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 3 -s high","off":"python mcp2301701.py -b a -o 3 -s low"}', 0),
(21, 'A4', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 4 -s high","off":"python mcp2301701.py -b a -o 4 -s low"}', 0),
(22, 'A5', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 5 -s high","off":"python mcp2301701.py -b a -o 5 -s low"}', 0),
(23, 'A6', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 6 -s high","off":"python mcp2301701.py -b a -o 6 -s low"}', 0),
(24, 'A7', 1, '001', '0x21', '{"on":"python mcp2301701.py -b a -o 7 -s high","off":"python mcp2301701.py -b a -o 7 -s low"}', 0),
(25, 'B0', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 0 -s high","off":"python mcp2301701.py -b b -o 0 -s low"}', 0),
(26, 'B1', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 1 -s high","off":"python mcp2301701.py -b b -o 1 -s low"}', 0),
(27, 'B2', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 2 -s high","off":"python mcp2301701.py -b b -o 2 -s low"}', 0),
(28, 'B3', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 3 -s high","off":"python mcp2301701.py -b b -o 3 -s low"}', 0),
(29, 'B4', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 4 -s high","off":"python mcp2301701.py -b b -o 4 -s low"}', 0),
(30, 'B5', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 5 -s high","off":"python mcp2301701.py -b b -o 5 -s low"}', 0),
(31, 'B6', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 6 -s high","off":"python mcp2301701.py -b b -o 6 -s low"}', 0),
(32, 'B7', 1, '001', '0x21', '{"on":"python mcp2301701.py -b b -o 7 -s high","off":"python mcp2301701.py -b b -o 7 -s low"}', 0),
(33, 'A0', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 0 -s high","off":"python mcp2301702.py -b a -o 0 -s low"}', 0),
(34, 'A1', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 1 -s high","off":"python mcp2301702.py -b a -o 1 -s low"}', 0),
(35, 'A2', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 2 -s high","off":"python mcp2301702.py -b a -o 2 -s low"}', 0),
(36, 'A3', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 3 -s high","off":"python mcp2301702.py -b a -o 3 -s low"}', 0),
(37, 'A4', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 4 -s high","off":"python mcp2301702.py -b a -o 4 -s low"}', 0),
(38, 'A5', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 5 -s high","off":"python mcp2301702.py -b a -o 5 -s low"}', 0),
(39, 'A6', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 6 -s high","off":"python mcp2301702.py -b a -o 6 -s low"}', 0),
(40, 'A7', 1, '010', '0x22', '{"on":"python mcp2301702.py -b a -o 7 -s high","off":"python mcp2301702.py -b a -o 7 -s low"}', 0),
(41, 'B0', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 0 -s high","off":"python mcp2301702.py -b b -o 0 -s low"}', 0),
(42, 'B1', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 1 -s high","off":"python mcp2301702.py -b b -o 1 -s low"}', 0),
(43, 'B2', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 2 -s high","off":"python mcp2301702.py -b b -o 2 -s low"}', 0),
(44, 'B3', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 3 -s high","off":"python mcp2301702.py -b b -o 3 -s low"}', 0),
(45, 'B4', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 4 -s high","off":"python mcp2301702.py -b b -o 4 -s low"}', 0),
(46, 'B5', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 5 -s high","off":"python mcp2301702.py -b b -o 5 -s low"}', 0),
(47, 'B6', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 6 -s high","off":"python mcp2301702.py -b b -o 6 -s low"}', 0),
(48, 'B7', 1, '010', '0x22', '{"on":"python mcp2301702.py -b b -o 7 -s high","off":"python mcp2301702.py -b b -o 7 -s low"}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `group`
--

DROP TABLE IF EXISTS `group`;
CREATE TABLE IF NOT EXISTS `group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `otoritas` varchar(100) NOT NULL,
  `home_url` text NOT NULL,
  `auth` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `group`
--

INSERT INTO `group` (`id`, `otoritas`, `home_url`, `auth`) VALUES
(31, 'superadmin', '', ''),
(32, 'user', '', ''),
(33, 'lock', '', 'd68ddab3fc5675108ddec651f0c2aa9f');

-- --------------------------------------------------------

--
-- Table structure for table `group_controll`
--

DROP TABLE IF EXISTS `group_controll`;
CREATE TABLE IF NOT EXISTS `group_controll` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `group_controll`
--

INSERT INTO `group_controll` (`id`, `nama`, `aktif`) VALUES
(1, 'Group 1', 1),
(2, 'Group 2', 1),
(3, 'Group 3', 1),
(4, 'Group 4', 1),
(5, 'Group 5', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

DROP TABLE IF EXISTS `jadwal`;
CREATE TABLE IF NOT EXISTS `jadwal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_controll` int(10) NOT NULL,
  `nyala` int(1) NOT NULL,
  `timer_aktif` int(111) NOT NULL,
  `date_on` varchar(10) NOT NULL,
  `date_off` varchar(10) NOT NULL,
  `time_on` varchar(8) NOT NULL,
  `time_off` varchar(8) NOT NULL,
  `every_timer` text NOT NULL,
  `type` enum('byday','schedulled') NOT NULL,
  `timer_service` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_group` int(5) NOT NULL,
  `id_pengguna` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `images` text NOT NULL,
  `aktif` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15962 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_group`, `id_pengguna`, `username`, `password`, `images`, `aktif`) VALUES
(15960, 31, 0, 'asbin', '37740b504633a2eedf618da9b3f60ab9', '', 1),
(15961, 32, 0, 'arjint', 'e6d291d5effd688082fa6d483762c3e5', '', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
