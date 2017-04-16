-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2017 at 06:13 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digitalnimaran`
--

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `eid` int(11) NOT NULL,
  `cons_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enquiry`
--

INSERT INTO `enquiry` (`eid`, `cons_id`, `ref_no`, `firstname`, `lastname`, `email`, `gender`, `subject`, `details`, `number`) VALUES
(1, 1, 1000, 'has', 'you', 'has@yougna.ss', 'male', 'hello kaise ', 'haillo asnoasn', '9878787878');

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE `feedbacks` (
  `fid` int(11) NOT NULL,
  `cons_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `otp`
--

CREATE TABLE `otp` (
  `id` int(11) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(50) NOT NULL DEFAULT 'Punjab',
  `city` varchar(50) NOT NULL,
  `constituency` varchar(50) NOT NULL,
  `pincode` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `firstname`, `lastname`, `email`, `password`, `gender`, `phone`, `dob`, `address`, `state`, `city`, `constituency`, `pincode`, `created_at`) VALUES
(6, 'hello', 'kya hai', 'hello@gmail.com', '123456', 'male', '9876543210', '2017-12-31', 'hello', '', 'hello', 'hello', '123456', '2017-04-13 11:11:46'),
(7, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', '', 'kadsad', 'dkas', '144001', '2017-04-13 11:15:42'),
(8, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', 'Punjab', 'kadsad', 'dkas', '144001', '2017-04-13 11:17:03'),
(9, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', 'Punjab', 'kadsad', 'dkas', '144001', '2017-04-13 11:17:34'),
(10, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', 'Punjab', 'kadsad', 'dkas', '144001', '2017-04-13 11:19:13'),
(11, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', 'Punjab', 'kadsad', 'dkas', '144001', '2017-04-13 11:19:28'),
(12, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', 'Punjab', 'kadsad', 'dkas', '144001', '2017-04-13 11:21:34'),
(13, 'haias', 'samda', 'bol@gmail.com', 'hariom', 'male', '0987654321', '2014-10-25', 'hefa', 'Punjab', 'kadsad', 'dkas', '144001', '2017-04-13 11:25:20'),
(14, 'hello', 'hello', 'bol@gmail.com', 'hariom', 'male', '1234567890', '2017-01-01', 'hello', 'Punjab', 'hello', 'hello', '123456', '2017-04-14 22:23:55'),
(15, 'hello', 'hello', 'bol@gmail.com', 'hariom', 'male', '1234567890', '2017-01-01', 'hello', 'Punjab', 'hello', 'hello', '123456', '2017-04-14 22:25:49'),
(16, 'shiv', 'shiv', 'bol@gmail.com', 'hariom', 'male', '9876543210', '2015-11-01', 'all', 'Punjab', 'all', 'all', '12345', '2017-04-16 22:58:55');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `sid` int(11) NOT NULL,
  `cons_id` int(11) NOT NULL,
  `ref_no` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `details` varchar(1000) NOT NULL,
  `number` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `otp`
--
ALTER TABLE `otp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `eid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `otp`
--
ALTER TABLE `otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
