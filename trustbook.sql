-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2016 at 08:21 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trustbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `commentid` int(100) NOT NULL,
  `updateid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `text` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend1`
--

CREATE TABLE `friend1` (
  `friendid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend2`
--

CREATE TABLE `friend2` (
  `friendid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relationship`
--

CREATE TABLE `relationship` (
  `user_one_id` int(100) NOT NULL,
  `user_two_id` int(100) NOT NULL,
  `status` int(3) NOT NULL,
  `action_user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `relationship`
--

INSERT INTO `relationship` (`user_one_id`, `user_two_id`, `status`, `action_user_id`) VALUES
(1, 3, 1, 1),
(1, 4, 1, 1),
(1, 5, 1, 1),
(1, 6, 1, 6),
(2, 3, 1, 2),
(2, 4, 1, 4),
(2, 5, 1, 5),
(2, 6, 1, 6),
(3, 4, 1, 3),
(3, 5, 1, 5),
(3, 6, 1, 6),
(4, 5, 1, 5),
(4, 6, 1, 6),
(5, 6, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tagid` int(100) NOT NULL,
  `updateid` int(100) NOT NULL,
  `taguid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `updateid` int(100) NOT NULL,
  `uid` int(100) NOT NULL,
  `type` int(1) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `imgtype` varchar(20) NOT NULL,
  `img` longblob NOT NULL,
  `likes` int(111) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `updates`
--

INSERT INTO `updates` (`updateid`, `uid`, `type`, `text`, `imgtype`, `img`, `likes`, `time`) VALUES
(1, 1, 0, 'Hi guys', '', '', 1, '2016-04-05 04:40:56');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `uid` int(100) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `mobile` bigint(13) NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `livingplace` varchar(100) NOT NULL,
  `hometown` varchar(100) NOT NULL,
  `ugcollege` varchar(100) NOT NULL,
  `year1` varchar(20) NOT NULL,
  `degree1` varchar(20) NOT NULL,
  `loc1` varchar(20) NOT NULL,
  `pgcollege` varchar(100) NOT NULL,
  `year2` varchar(20) NOT NULL,
  `degree2` varchar(20) NOT NULL,
  `loc2` varchar(20) NOT NULL,
  `previousoccu` varchar(111) NOT NULL,
  `employer1` varchar(20) NOT NULL,
  `Years1` varchar(20) NOT NULL,
  `Location3` varchar(20) NOT NULL,
  `currentoccu` varchar(100) NOT NULL,
  `employer2` varchar(20) NOT NULL,
  `Years2` varchar(20) NOT NULL,
  `location4` varchar(20) NOT NULL,
  `relationship` varchar(100) NOT NULL,
  `language` varchar(100) NOT NULL,
  `interest` varchar(100) NOT NULL,
  `imgtype` varchar(20) NOT NULL,
  `img` longblob NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`uid`, `name`, `email`, `mobile`, `dob`, `gender`, `livingplace`, `hometown`, `ugcollege`, `year1`, `degree1`, `loc1`, `pgcollege`, `year2`, `degree2`, `loc2`, `previousoccu`, `employer1`, `Years1`, `Location3`, `currentoccu`, `employer2`, `Years2`, `location4`, `relationship`, `language`, `interest`, `imgtype`, `img`, `password`) VALUES
(1, 'Mayank Raj', 'mayankraj587@gmail.com', 7870881474, '1995-05-14', 'male', 'Patna', 'Patna,Bihar', 'NIT Patna', '', '', '', '', '', '', '', '', '', '', '', 'First American', '', '', '', 'Committed', 'Hindi,English', 'Music', 'image/jpeg', 0xf, 'tapan');
INSERT INTO `userinfo` (`uid`, `name`, `email`, `mobile`, `dob`, `gender`, `livingplace`, `hometown`, `ugcollege`, `year1`, `degree1`, `loc1`, `pgcollege`, `year2`, `degree2`, `loc2`, `previousoccu`, `employer1`, `Years1`, `Location3`, `currentoccu`, `employer2`, `Years2`, `location4`, `relationship`, `language`, `interest`, `imgtype`, `img`, `password`) VALUES
(5, 'Parakh', 'parakh@nitp.ac.in', 9876543210, '1994-01-23', 'male', 'Patna', 'Patna,Bihar', 'NIT Patna', '', '', '', '', '', '', '', '', '', '', '', 'First American', '', '', '', 'Committed', 'Hindi,English', 'Music', 'blank', '', 'parakh'),
(6, 'saumya', 'saumyat46@gmail.com', 89765433346, '0001-02-10', 'female', 'Patna ', 'Faizabad', 'army school', '2012', 'intermediate', 'faizabad', 'nit patna', '2013', 'bachelors of technol', 'patna', '', '', '', '', 'Oracle', 'oracle', '2017', 'patna', 'single', 'hindi, english', 'music', 'blank', '', 'saumya');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `friend1`
--
ALTER TABLE `friend1`
  ADD UNIQUE KEY `friendid` (`friendid`);

--
-- Indexes for table `friend2`
--
ALTER TABLE `friend2`
  ADD UNIQUE KEY `friendid` (`friendid`);

--
-- Indexes for table `relationship`
--
ALTER TABLE `relationship`
  ADD UNIQUE KEY `user_one_id_2` (`user_one_id`,`user_two_id`),
  ADD KEY `user_one_id` (`user_one_id`),
  ADD KEY `user_two_id` (`user_two_id`),
  ADD KEY `action_user_id` (`action_user_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`updateid`,`taguid`),
  ADD UNIQUE KEY `tagid` (`tagid`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`updateid`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `uid` (`uid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `commentid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tagid` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `updateid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `userinfo`
--
ALTER TABLE `userinfo`
  MODIFY `uid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `relationship`
--
ALTER TABLE `relationship`
  ADD CONSTRAINT `relationship` FOREIGN KEY (`user_one_id`) REFERENCES `userinfo` (`uid`),
  ADD CONSTRAINT `relationship_ibfk_1` FOREIGN KEY (`user_two_id`) REFERENCES `userinfo` (`uid`),
  ADD CONSTRAINT `relationship_ibfk_2` FOREIGN KEY (`action_user_id`) REFERENCES `userinfo` (`uid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
