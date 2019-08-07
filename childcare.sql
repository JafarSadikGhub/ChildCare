-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2019 at 07:10 PM
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
-- Table structure for table `center`
--

CREATE TABLE `center` (
  `id` int(10) NOT NULL,
  `cenname` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `center`
--

INSERT INTO `center` (`id`, `cenname`, `name`, `username`, `email`, `address`, `password`) VALUES
(1, 'center', 'Jafar Sadik', 'ash12', 'jafar.sadik@northsouth.edu', 'ajfajfja', '$2y$10$/Ud4MkpXQekNPar6Uw8o/esK7DRAlrNZ1jFH28J0ajpSY3cOE4i1i'),
(2, 'center', 'Owner', 'ash121', 'garof@mailhub.top', '5800 Cobbs Creek Parkway', '$2y$10$yFrXAM7P5/fgqQYL2hByPeCzQePKeakxw09RJDim.HlEm5HUtE8jK'),
(3, 'center', 'Owner', 'ash1212', 'garo@mailhub.top', '5800 Cobbs Creek Parkway', '$2y$10$t1Bdhx6J94cXtVfPOyJnrOWS2/z7mNL/HDDcyDAcB88eyYWlwjkdq'),
(4, 'new', 'new', 'new', 'new@gmail.com', 'new', '$2y$10$vJWTVGbyeg.X42rB8Wff5.3TBT.mrXk1gz2g9441X8a.73JwjcKu.');

-- --------------------------------------------------------

--
-- Table structure for table `guardian`
--

CREATE TABLE `guardian` (
  `id` int(10) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guardian`
--

INSERT INTO `guardian` (`id`, `firstname`, `lastname`, `username`, `email`, `password`) VALUES
(1, 'Jafar', 'Sadik', 'ash1212', 'anda@gmail.com', '$2y$10$jgxAWe7eV8/4CovCAf1RiOkwdagZNEs4dSAQFFTqUQPO5llM6A7gC'),
(2, 'Jafar', 'Sadik', 'ash12', 'anda@gmail.com', '$2y$10$1/NA198R/.YsjmyKUlrx/e.xpsidd0C1XiPPvgohWSAxsciYs1oC.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `center`
--
ALTER TABLE `center`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardian`
--
ALTER TABLE `guardian`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `center`
--
ALTER TABLE `center`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `guardian`
--
ALTER TABLE `guardian`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
