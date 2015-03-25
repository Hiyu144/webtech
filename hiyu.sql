-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2015 at 07:09 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hiyu`
--

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
`ID` int(11) NOT NULL,
  `Name` text COLLATE utf8_unicode_ci NOT NULL,
  `Username` text COLLATE utf8_unicode_ci NOT NULL,
  `Password` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `Gender` text COLLATE utf8_unicode_ci NOT NULL,
  `DOB` text COLLATE utf8_unicode_ci NOT NULL,
  `Country` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`ID`, `Name`, `Username`, `Password`, `Email`, `Gender`, `DOB`, `Country`) VALUES
(8, 'Huy', 'hiyu', '123', 'huy@gmail.com', 'Male', '1994-12-04', 'VN'),
(11, 'Welp', 'welp', '123', 'welp@gmail.com', 'Unknown', '14/04/1994', 'FL'),
(12, 'Tusam', 'tusama', '123', 'tu@yahoo.com', 'Unknown', '14/04/1994', 'UK');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
`ID` int(255) NOT NULL,
  `linkimg` text NOT NULL,
  `pathimg` text NOT NULL,
  `keyimg` text NOT NULL,
  `imgpage` text NOT NULL,
  `visit` bigint(20) NOT NULL,
  `mode` int(11) NOT NULL,
  `owner` text NOT NULL,
  `uptime` int(11) NOT NULL,
  `expiretime` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=121 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`ID`, `linkimg`, `pathimg`, `keyimg`, `imgpage`, `visit`, `mode`, `owner`, `uptime`, `expiretime`) VALUES
(112, '5512ea5aa4b02.jpg', 'uploads/hiyu/', '0', '5512ea5aa4b02', 21, 0, 'hiyu', 1427303002, 0),
(114, '5512ea5b108c3.jpg', 'uploads/hiyu/', '0', '5512ea5b108c3', 2, 0, 'hiyu', 1427303003, 0),
(115, '5512ebeb4dbd9.jpg', 'uploads/hiyu/', '0', '5512ebeb4dbd9', 2, 1, 'hiyu', 1427303403, 0),
(116, '5512ebeb6c193.jpg', 'uploads/hiyu/', '0', '5512ebeb6c193', 2, 0, 'hiyu', 1427303403, 0),
(117, '5512ec198cb2a.jpg', 'uploads/anon/', '5512ec198cb30', '5512ec198cb2a', 0, 0, '0', 1427303449, 2147483647),
(118, '5512ec19a8d94.jpg', 'uploads/anon/', '5512ec19a8d9a', '5512ec19a8d94', 0, 1, '0', 1427303449, 2147483647),
(119, '5512ecaa3644f.jpg', 'uploads/anon/', '5512ecaa36457', '5512ecaa3644f', 7, 0, '0', 1427303594, 315360000),
(120, '5512ecaa56ddd.jpg', 'uploads/anon/', '5512ecaa56de9', '5512ecaa56ddd', 0, 0, '0', 1427303594, 315360000);

-- --------------------------------------------------------

--
-- Table structure for table `upvote`
--

CREATE TABLE IF NOT EXISTS `upvote` (
`ID` int(11) NOT NULL,
  `imgID` int(11) NOT NULL,
  `userID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `upvote`
--

INSERT INTO `upvote` (`ID`, `imgID`, `userID`) VALUES
(29, 112, 8);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `form`
--
ALTER TABLE `form`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `upvote`
--
ALTER TABLE `upvote`
 ADD PRIMARY KEY (`ID`), ADD UNIQUE KEY `ID` (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `form`
--
ALTER TABLE `form`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=121;
--
-- AUTO_INCREMENT for table `upvote`
--
ALTER TABLE `upvote`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
