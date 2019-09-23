-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2019 at 03:04 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compa1p3`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `massage_time` date NOT NULL,
  `time` varchar(250) NOT NULL,
  `reason` varchar(250) NOT NULL,
  `massage_type` varchar(250) NOT NULL,
  `price` varchar(250) NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `user_id`, `massage_time`, `time`, `reason`, `massage_type`, `price`, `created`, `updated`) VALUES
(3, 2, '2019-09-22', '', 'Just relaxing', '', '$45 for 30min', '2019-09-22 04:50:40', '2019-09-22 05:26:24'),
(14, 1, '2019-09-22', '1:00', 'Recovering from injury', 'Aromatherapy Massage', '$45 for 30min', '2019-09-23 02:01:33', '0000-00-00 00:00:00'),
(15, 1, '2019-09-27', '12:00', 'Recovering from injury', 'Deep Tissue Massage', '$45 for 30min', '2019-09-23 02:18:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `therapist`
--

CREATE TABLE `therapist` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `birth_date` date NOT NULL,
  `mob_number` int(15) NOT NULL,
  `therapist_email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `therapist`
--

INSERT INTO `therapist` (`id`, `fullname`, `gender`, `birth_date`, `mob_number`, `therapist_email`, `password`, `created`) VALUES
(1, 'raveena sharma', 'female', '1993-03-25', 1236547890, 'test@example.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-09-22 12:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fullname` varchar(250) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `birth_date` date NOT NULL,
  `mob_number` int(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `is_late` varchar(250) NOT NULL DEFAULT 'No',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `gender`, `birth_date`, `mob_number`, `email`, `password`, `is_late`, `created`, `updated`) VALUES
(1, 'raveena sharma', 'female', '2019-09-20', 224535660, 'test@test.com', '25f9e794323b453885f5181f1b624d0b', 'Yes', '2019-09-16 13:43:02', '2019-09-23 02:07:05'),
(2, 'test', 'female', '2019-09-20', 224535660, 'example@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'No', '2019-09-18 13:27:22', NULL),
(3, 'raveena sharma', 'male', '2019-09-20', 224535660, 'test@123.com', 'e10adc3949ba59abbe56e057f20f883e', 'No', '2019-09-19 01:22:18', NULL),
(4, 'test', 'male', '2019-09-20', 224535660, 'example1@example.com', 'e10adc3949ba59abbe56e057f20f883e', 'No', '2019-09-19 04:12:29', NULL),
(5, 'raveena sharma', 'male', '2019-09-21', 224535660, '123@test.com', 'e10adc3949ba59abbe56e057f20f883e', 'No', '2019-09-19 04:17:17', NULL),
(6, 'raveena sharma', 'male', '2019-09-28', 224535660, '12@ww.com', '733d7be2196ff70efaf6913fc8bdcabf', 'No', '2019-09-19 04:42:36', NULL),
(7, 'test', 'male', '2019-09-28', 224535660, 'sahil@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'No', '2019-09-19 05:58:57', NULL),
(10, 'raveena sharma', 'female', '1993-03-25', 123456789, 'sharmaraveena03@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'No', '2019-09-22 10:57:41', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `therapist`
--
ALTER TABLE `therapist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `therapist`
--
ALTER TABLE `therapist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
