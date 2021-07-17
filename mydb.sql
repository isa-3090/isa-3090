-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 14, 2017 at 07:09 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
CREATE Database `mydb`;
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `image` mediumblob DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_no` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `image`, `name`, `email`, `address`, `password`, `phone_no`, `date`) VALUES
(1, '', 'Muhammad Hussaini Abba', 'mahgirei@gmail.com', 'Sare Manga', '1234567', '07068024069', '2017-12-14 07:54:57'),
(2, '', 'Isa Ahmadi', 'isa@gmail.com', 'Sare Petel', '1234567', '09039024049', '2017-12-20 07:00:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;


--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`) VALUES
(1, 2, '  Nice', 'Muhammad Hussaini Abba', '2017-12-14 07:54:57'),
(2, 1, 'ok', 'Isa Ahmadi', '2017-12-20 13:05:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `post` varchar(200) NOT NULL,
  `post_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `parent_comment_id`, `post`, `post_sender_name`, `date`) VALUES
(1, 2, 'Electronics equipment which solves problems and does complicated calculations by processing according to prescribed programmed instructions', 'Muhammad Hussaini Abba', '2017-12-14 07:54:57'),
(2, 1, 'A collection of information organized and accessed according to a logical structure of that information', 'Isa Ahmadi', '2017-12-14 07:56:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
