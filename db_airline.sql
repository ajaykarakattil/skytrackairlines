-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 25, 2018 at 06:56 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_airline`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_avail`
--

CREATE TABLE IF NOT EXISTS `tbl_avail` (
  `fcode` bigint(20) NOT NULL,
  `jdate` varchar(50) NOT NULL,
  `avail_seat` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_avail`
--

INSERT INTO `tbl_avail` (`fcode`, `jdate`, `avail_seat`) VALUES
(1, '2018-11-26', 41),
(2, '2018-11-26', 49),
(3, '2018-11-27', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cancel`
--

CREATE TABLE IF NOT EXISTS `tbl_cancel` (
  `cid` int(11) NOT NULL,
  `rid` int(11) NOT NULL,
  `cdate` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_cancel`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE IF NOT EXISTS `tbl_class` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `fcode` bigint(10) NOT NULL,
  `classcode` varchar(20) NOT NULL,
  `cname` varchar(20) NOT NULL,
  `fare` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`cid`, `fcode`, `classcode`, `cname`, `fare`) VALUES
(1, 1, 'ECO', 'Economy', '5000.00'),
(2, 2, 'ECO', 'Economy', '4500.00'),
(3, 2, 'LUX', 'Luxury', '15000.00'),
(4, 3, 'LUX', 'Luxury', '15000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_flight`
--

CREATE TABLE IF NOT EXISTS `tbl_flight` (
  `fcode` bigint(10) NOT NULL AUTO_INCREMENT,
  `airline` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  PRIMARY KEY (`fcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_flight`
--

INSERT INTO `tbl_flight` (`fcode`, `airline`, `fname`, `capacity`) VALUES
(1, 'Airindia', 'AI101', 40),
(2, 'Air asia', 'AA103', 56),
(3, 'Singapoor Air', 'SN450', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_passenger`
--

CREATE TABLE IF NOT EXISTS `tbl_passenger` (
  `pno` bigint(10) NOT NULL AUTO_INCREMENT,
  `fcode` bigint(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  PRIMARY KEY (`pno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_passenger`
--

INSERT INTO `tbl_passenger` (`pno`, `fcode`, `name`, `address`, `gender`, `dob`, `email`) VALUES
(1, 2, 'Ajaymohan Karakkatti', 'rhgfhgf\r\nfghfghfgj', 'male', '2018-11-27', 'ajaymohan24@gmail.com'),
(2, 2, 'AJAY MOHAN', 'KARAKATTIL House\r\nMulakulam North', 'male', '2018-11-29', 'ajaymohan24@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reserv`
--

CREATE TABLE IF NOT EXISTS `tbl_reserv` (
  `rid` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL,
  `sid` int(11) NOT NULL,
  `fcode` bigint(20) NOT NULL,
  `pid` int(11) NOT NULL,
  `jdate` varchar(20) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`rid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tbl_reserv`
--

INSERT INTO `tbl_reserv` (`rid`, `uid`, `sid`, `fcode`, `pid`, `jdate`, `status`) VALUES
(2, 1, 2, 2, 2, '2018-11-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_schedule` (
  `sid` int(11) NOT NULL AUTO_INCREMENT,
  `fcode` bigint(10) NOT NULL,
  `sdate` varchar(15) NOT NULL,
  `sfrom` varchar(20) NOT NULL,
  `sto` varchar(20) NOT NULL,
  `departure` varchar(10) NOT NULL,
  `arrival` varchar(10) NOT NULL,
  PRIMARY KEY (`sid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_schedule`
--

INSERT INTO `tbl_schedule` (`sid`, `fcode`, `sdate`, `sfrom`, `sto`, `departure`, `arrival`) VALUES
(1, 1, '2018-11-26', 'KOCHI', 'MUMBAI', '01:01', '13:03'),
(2, 2, '2018-11-26', 'KOCHI', 'MUMBAI', '07:00', '18:59'),
(3, 3, '2018-11-27', 'TRIVANDRUM', 'DELHI', '17:01', '03:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `city` varchar(15) NOT NULL,
  `state` varchar(15) NOT NULL,
  `country` varchar(15) NOT NULL,
  `password` varchar(15) NOT NULL,
  `utype` varchar(10) NOT NULL,
  `uname` varchar(15) NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`uid`, `name`, `phone`, `dob`, `city`, `state`, `country`, `password`, `utype`, `uname`) VALUES
(1, 'Ajaymohan Karakkatti', '9562385033', '26/08/1997', 'PIRAVOM', 'Kerala', 'India', 'pass', 'local', 'ajay'),
(2, 'Aadharsh', '8545781256', '26/02/1998', 'Kothamangalam', 'Kerala', 'India', '123', 'local', 'amd'),
(3, 'Alee', '45465465', '15/10/1997', 'Trivandrum', 'Kerala', 'India', 'alee123', 'local', 'aleealee'),
(4, 'feby', '6445454', '345345345', 'nsdgsg', 'hghgh', 'hgcv', 'feds', 'local', 'feds');
