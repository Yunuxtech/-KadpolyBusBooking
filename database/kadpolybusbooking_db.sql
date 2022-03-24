-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2022 at 08:44 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kadpolybusbooking_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `booked`
--

CREATE TABLE `booked` (
  `id` int(30) NOT NULL,
  `schedule_id` int(30) NOT NULL,
  `ref_no` text NOT NULL,
  `name` varchar(250) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '0' COMMENT '1=Paid, 0- Unpaid',
  `date_updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `id` int(11) NOT NULL,
  `busName` varchar(50) NOT NULL,
  `busCap` int(30) NOT NULL,
  `busAvailableSpace` int(11) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`id`, `busName`, `busCap`, `busAvailableSpace`, `creationDate`, `updateDate`) VALUES
(14, 'BUS 001', 3, 0, '2022-03-20 14:09:44', '2022-03-24 20:43:35'),
(15, 'BUS 002', 2, 0, '2022-03-20 14:09:57', '2022-03-21 16:31:37'),
(16, 'BUS 003', 3, 0, '2022-03-20 14:10:10', '2022-03-21 14:46:03');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `department` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL,
  `messageSubject` varchar(50) NOT NULL,
  `message` longtext NOT NULL,
  `sendDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `phone`, `department`, `level`, `messageSubject`, `message`, `sendDate`) VALUES
(1, 'Yunus Isah', '09033248408', 'Information', '400', 'Delay in Bus', 'we are having some delay in buses, please let that be corrected', '2022-03-21 21:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `terminalName` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `creationDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDate` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `terminalName`, `address`, `creationDate`, `updateDate`) VALUES
(8, 'Main Campus', 'Tudun Wada', '2022-03-20 14:10:51', '0000-00-00 00:00:00'),
(9, 'CASSS Sabon Tasha', 'College Admin', '2022-03-20 14:11:38', '0000-00-00 00:00:00'),
(10, 'CBMS', 'College Business', '2022-03-20 14:12:07', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_list`
--

CREATE TABLE `schedule_list` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `orderID` varchar(30) NOT NULL,
  `std_name` varchar(30) NOT NULL,
  `location_from` varchar(50) NOT NULL,
  `location_to` varchar(50) NOT NULL,
  `bus_name` varchar(30) NOT NULL,
  `day` varchar(30) NOT NULL,
  `time` varchar(30) NOT NULL,
  `oderDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule_list`
--

INSERT INTO `schedule_list` (`id`, `userID`, `orderID`, `std_name`, `location_from`, `location_to`, `bus_name`, `day`, `time`, `oderDate`) VALUES
(37, 2, '6238E841A4C1B', 'Yunus Isah', 'CASSS Sabon Tasha', 'Main Campus', 'BUS 001', 'Tues', '7:00 am', '2022-03-21 22:04:01'),
(38, 2, '6238E84D255C8', 'Yunus Isah', 'Main Campus', 'CASSS Sabon Tasha', 'BUS 001', 'Mon', '7:00 am', '2022-03-21 22:04:13'),
(39, 2, '6238E8557D8EF', 'Yunus Isah', 'Main Campus', 'Main Campus', 'BUS 001', 'sun', '7:00 am', '2022-03-21 22:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `reg.No` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `level` varchar(30) NOT NULL,
  `department` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `status` int(1) NOT NULL,
  `creation_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `FullName`, `reg.No`, `email`, `phone`, `level`, `department`, `password`, `status`, `creation_date`, `update_date`) VALUES
(2, 'Yunus Isah', 'CST/17/IFT/00029', 'yunusisah123@gmail.com', '09033248408', '400', 'Information', '123456', 1, '2022-03-09 16:30:35', '2022-03-21 20:29:47'),
(3, 'Programming', 'CST/17/IFT/00029', 'admin@example.com', '09033248408', '300', 'Information', 'mmm', 0, '2022-03-09 16:45:50', '0000-00-00 00:00:00'),
(4, 'Testing', 'mm', 'admin@example.com', '09017797709', '300', 'fauz@gmail.', 'mmm', 0, '2022-03-09 21:44:00', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booked`
--
ALTER TABLE `booked`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule_list`
--
ALTER TABLE `schedule_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booked`
--
ALTER TABLE `booked`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule_list`
--
ALTER TABLE `schedule_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
