-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2019 at 12:17 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `childcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `guardian_id` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `booking_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `guardian_id`, `creation_date`, `booking_status`) VALUES
(1, 1, '2019-08-18', 'pending'),
(2, 1, '2019-08-18', 'pending'),
(3, 1, '2019-08-18', 'pending'),
(4, 1, '2019-08-18', 'pending'),
(5, 1, '2019-08-18', 'pending'),
(6, 1, '2019-08-18', 'pending'),
(7, 1, '2019-08-18', 'pending'),
(8, 1, '2019-08-18', 'pending'),
(9, 1, '2019-08-18', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `booking_details`
--

CREATE TABLE `booking_details` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `center_name` varchar(255) NOT NULL,
  `charge_per_hr` double NOT NULL,
  `hours` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_details`
--

INSERT INTO `booking_details` (`id`, `booking_id`, `center_name`, `charge_per_hr`, `hours`) VALUES
(1, 1, '', 20, 2),
(2, 2, '', 20, 4),
(3, 3, '', 20, 4),
(4, 4, '', 12, 48),
(5, 5, '', 15, 6),
(6, 6, '', 20, 2),
(7, 7, '', 20, 2),
(8, 8, '', 20, 2),
(9, 9, '', 20, 2);

-- --------------------------------------------------------

--
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `id` int(10) NOT NULL,
  `cenname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `flat` varchar(10) NOT NULL DEFAULT 'n/a',
  `house` varchar(10) NOT NULL DEFAULT 'n/a',
  `road` varchar(10) NOT NULL DEFAULT 'n/a',
  `area` varchar(50) NOT NULL DEFAULT 'n/a',
  `city` varchar(30) NOT NULL DEFAULT 'n/a',
  `zip` varchar(5) NOT NULL DEFAULT 'n/a',
  `phone` int(20) NOT NULL DEFAULT 0,
  `profile` varchar(255) DEFAULT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `cenname`, `name`, `username`, `email`, `address`, `password`, `flat`, `house`, `road`, `area`, `city`, `zip`, `phone`, `profile`, `price`) VALUES
(1, 'ABC-Childcare', 'Jafar Sadik', 'Jafar95', 'jafar95@gmail.com', 'Dhaka Bangladesh', '$2y$10$p2eXLHCRUCUOHzJOwb/iV.WeeskooE770wifoNnGZ3kqs928KztDC', '4A', '410', '5', 'Block B, Bashundhara', 'Dhaka', '1229', 176037933, '1.jpg', 20),
(2, 'ABC1-Childcare', 'Khan Ashrabi', 'ashrabi12', 'ashrabi@gmail.com', 'Dhaka Bangladesh', '$2y$10$THOzMR3tSfd041n0sDwsKucteEyOrgO0Ly3oCi8fW6i5ek5idix5u', '5B', '110', '7', 'Oxyzen, Zero Point', 'Chittagong', '1110', 192457625, '2.jpg', 15),
(3, '123-Childcare', 'Ananna Islam', 'ananna12', 'ananna@gmail.com', 'Dhaka Bangladesh', '$2y$10$xWEYjtiqVpc4KitdlebeT.Az19Ugz8S9qzrBMdL8CSznv0EVAtkIe', 'n/a', '15', 'Sadar Road', 'B. Baria Shadar', 'B. Baria', '1010', 13310000, '3.jpg', 12),
(4, 'XYZ-Childcare', 'Jafar Sadik', 'jafar96', 'jafarsadik@northsouth.edu', 'Dhaka Bangladesh', '$2y$10$PM0PJpS/VYx/VydGqYzsfeT8oTEfQpnPI9WGyCWMDuEZeGudLinua', 'n/a', '10', '15', 'Zero Point', 'Rajshahi', '1000', 18257257, '4.jpg', 30);

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `GuardianId` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `GuardianUsername` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profilepic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`GuardianId`, `firstname`, `lastname`, `GuardianUsername`, `email`, `password`, `profilepic`) VALUES
(1, 'Jafar', 'Sadik', 'Jafar_s', 'jafar.sadik@northsouth.edu', '$2y$10$Hyg5./XaPjDRpMRug8sMDetJYG10nHDOZbd2gKo.5ornhbUmgk2KS', '');

-- --------------------------------------------------------

--
-- Table structure for table `pic`
--

CREATE TABLE `pic` (
  `id` int(11) NOT NULL,
  `profilePic` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `b_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `b_image`) VALUES
(1, '812308.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `booking_details`
--
ALTER TABLE `booking_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`GuardianId`);

--
-- Indexes for table `pic`
--
ALTER TABLE `pic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `booking_details`
--
ALTER TABLE `booking_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `GuardianId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pic`
--
ALTER TABLE `pic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
