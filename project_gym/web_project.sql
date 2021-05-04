-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 04, 2021 at 01:09 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int(10) NOT NULL,
  `class_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `class_id`, `user_id`) VALUES
(6, 1, 2),
(7, 8, 2),
(8, 7, 2),
(9, 4, 3),
(10, 7, 3),
(11, 1, 4),
(12, 4, 4),
(13, 3, 4),
(14, 5, 4),
(15, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classes_id` int(11) NOT NULL,
  `classes_uid` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `trainer_name` varchar(255) DEFAULT NULL,
  `class_date` varchar(255) DEFAULT NULL,
  `number_of_trainees` int(11) DEFAULT 0,
  `max_num_of_trainees` int(11) DEFAULT 0,
  `added_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`classes_id`, `classes_uid`, `class_name`, `trainer_name`, `class_date`, `number_of_trainees`, `max_num_of_trainees`, `added_date`) VALUES
(1, '608efac170715', 'Cardio Class', 'Saleh', '2021-05-14', 2, 5, '2021-05-02 09:17:21'),
(3, '608efb015d3fd', 'Yoga Class', 'Nasser', '2021-05-07', 1, 5, '2021-05-02 09:18:25'),
(4, '608efb290f7e7', 'Zumba Class', 'Nasser', '2021-05-20', 2, 5, '2021-05-02 09:19:05'),
(5, '608efb43c0a09', 'Boxing Class', 'Saleh', '2021-06-04', 1, 5, '2021-05-02 09:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_uid` varchar(25) DEFAULT NULL,
  `username` varchar(155) DEFAULT NULL,
  `user_fname` varchar(150) DEFAULT NULL,
  `user_lname` varchar(150) DEFAULT NULL,
  `user_dob` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_mobile_no` varchar(25) DEFAULT NULL,
  `user_address` varchar(255) DEFAULT NULL,
  `user_city` varchar(255) DEFAULT NULL,
  `user_state` varchar(255) DEFAULT NULL,
  `user_country` varchar(255) DEFAULT NULL,
  `user_image` varchar(255) DEFAULT NULL,
  `user_type` varchar(150) DEFAULT NULL,
  `added_date` datetime NOT NULL,
  `modify_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_uid`, `username`, `user_fname`, `user_lname`, `user_dob`, `user_email`, `user_password`, `user_mobile_no`, `user_address`, `user_city`, `user_state`, `user_country`, `user_image`, `user_type`, `added_date`, `modify_date`) VALUES
(3, '609045bc78540', 'Test1', NULL, NULL, NULL, 'Test@test.com', 'VGVzdEAxMjM0', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-03 08:49:32', NULL),
(4, '609121270e60c', 'saleh', NULL, NULL, NULL, 'salehalbraak@gmail.com', 'U2FsZWgwNTAx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 12:25:43', NULL),
(5, '609122317250d', 'Ahmed', NULL, NULL, NULL, 'ahmed@ahmed.com', 'YWhtZWQx', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 12:30:09', NULL),
(6, '609124949ce2f', 'salbraak', NULL, NULL, NULL, 'saleh@gmail.com', 'U2EwNTAxNTI1Mjkz', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-05-04 12:40:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classes_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
