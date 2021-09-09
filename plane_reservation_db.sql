-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 01:45 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plane_reservation_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `user_name` char(20) NOT NULL,
  `password` varchar(30) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_accounts`
--

INSERT INTO `admin_accounts` (`user_name`, `password`, `name`) VALUES
('jimith', 'jimith123', 'jimith heshan');

-- --------------------------------------------------------

--
-- Table structure for table `available_flights`
--

CREATE TABLE `available_flights` (
  `trip_id` int(11) NOT NULL,
  `flight_no` char(5) DEFAULT NULL,
  `startfrom` varchar(30) DEFAULT NULL,
  `departure` date DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `e_class_price` double(8,2) DEFAULT NULL,
  `b_class_price` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `available_flights`
--

INSERT INTO `available_flights` (`trip_id`, `flight_no`, `startfrom`, `departure`, `departure_time`, `destination`, `e_class_price`, `b_class_price`) VALUES
(1, 'AC09', 'Sri Lanka', '2021-07-07', '21:48:25', 'Japan', 60000.00, 950000.00),
(2, 'BC09', 'Sri Lanka', '2021-07-17', '21:51:08', 'United State', 179000.00, 100000.00),
(3, 'A2-43', 'SriLanka', '2021-09-23', '10:28:00', 'China', 300000.00, 500000.00);

-- --------------------------------------------------------

--
-- Table structure for table `form_submissions`
--

CREATE TABLE `form_submissions` (
  `inquery_id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `date_submited` date DEFAULT NULL,
  `question` text DEFAULT NULL,
  `status` enum('pending','replied') DEFAULT 'pending',
  `admin_reply` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` char(20) DEFAULT NULL,
  `ticket_date` date NOT NULL,
  `ticket_time` time DEFAULT NULL,
  `flight_no` char(5) NOT NULL,
  `startfrom` varchar(30) DEFAULT NULL,
  `destination` varchar(30) DEFAULT NULL,
  `fclass` enum('business','economy') DEFAULT NULL,
  `price` double(8,2) DEFAULT NULL,
  `seat_row` int(11) NOT NULL,
  `seat_l` char(1) NOT NULL,
  `status` enum('Pending','Paid','Canceled') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `ticket_date`, `ticket_time`, `flight_no`, `startfrom`, `destination`, `fclass`, `price`, `seat_row`, `seat_l`, `status`) VALUES
(1, '1', '2021-07-14', '21:52:28', 'BC09', 'Sri lanka', 'United State', 'business', 566788.00, 3, '1', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_name` char(20) NOT NULL,
  `name` varchar(150) DEFAULT NULL,
  `gender` enum('male','female') DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `tel_no` char(14) DEFAULT NULL,
  `password` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_name`, `name`, `gender`, `email`, `tel_no`, `password`) VALUES
('chamo', 'chamodi', 'female', 'chamodi@gmail.com', '075534678', '123'),
('mihi', 'mihirangi', 'male', 'mihi@gmail.com', '(+94)765431289', '123'),
('nimal', 'naimal SuriyaABndara', 'male', 'chamodi@gmail.com', '0965263827', '456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`user_name`);

--
-- Indexes for table `available_flights`
--
ALTER TABLE `available_flights`
  ADD PRIMARY KEY (`trip_id`);

--
-- Indexes for table `form_submissions`
--
ALTER TABLE `form_submissions`
  ADD PRIMARY KEY (`inquery_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`ticket_date`,`flight_no`,`seat_row`,`seat_l`),
  ADD UNIQUE KEY `reservation_id` (`reservation_id`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `available_flights`
--
ALTER TABLE `available_flights`
  MODIFY `trip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `form_submissions`
--
ALTER TABLE `form_submissions`
  MODIFY `inquery_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
