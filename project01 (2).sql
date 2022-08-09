-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 06, 2022 at 10:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project01`
--

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_id` int(20) NOT NULL,
  `EName` varchar(20) NOT NULL,
  `Econ` int(20) NOT NULL,
  `Epro` varchar(20) NOT NULL,
  `Edel` int(11) NOT NULL,
  `Etime` varchar(20) NOT NULL,
  `Etimet` varchar(20) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_id`, `EName`, `Econ`, `Epro`, `Edel`, `Etime`, `Etimet`, `DATE`) VALUES
(3, 'เซวิน', 4200, 'C-100', 47, '17:00', '20:00', '2022-06-01'),
(4, 'เอ', 4100, 'C-100', 37, '08:00', '17:00', '2022-06-20'),
(16, 'เซวิน', 4100, 'C-100', 37, '08:00', '17:00', '2020-08-17'),
(17, 'เซวิน', 4120, 'C-100', 37, '17:00', '20:00', '2020-08-18'),
(140, 'saw', 45002, 'C-100', 47, '08:00', '17:00', '2022-07-31'),
(141, 'max', 4200, 'C-100', 47, '08:00', '17:00', '2022-08-03'),
(142, 'jame', 4100, 'C-100', 47, '08:00', '17:00', '2022-08-06');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `id` int(10) NOT NULL,
  `AT` double NOT NULL,
  `SP` double NOT NULL,
  `WT` double NOT NULL,
  `MS` double NOT NULL,
  `MIX` double NOT NULL,
  `RT` double NOT NULL,
  `MSS` double NOT NULL,
  `TT` double NOT NULL,
  `NO` double NOT NULL,
  `NUM` double NOT NULL,
  `TOT` double NOT NULL,
  `TR` float NOT NULL,
  `TS` float NOT NULL,
  `NT` int(20) NOT NULL,
  `EU` float NOT NULL,
  `date` date DEFAULT NULL,
  `u_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `report`
--

INSERT INTO `report` (`id`, `AT`, `SP`, `WT`, `MS`, `MIX`, `RT`, `MSS`, `TT`, `NO`, `NUM`, `TOT`, `TR`, `TS`, `NT`, `EU`, `date`, `u_id`) VALUES
(36, 45, 2, 43, 4, 90.7, 12, 4, 66.67, 4555555, 1, 100, 90.7, 66.67, 100, 60.47, '2022-07-04', '5'),
(39, 88, 4, 84, 1, 98.81, 66, 1, 98.48, 500000, 4, 100, 98.81, 98.48, 100, 97.31, '2022-07-04', '5'),
(40, 56, 45, 11, 2, 81.82, 56, 9, 83.93, 45678, 4563, 90.01, 81.82, 83.93, 90, 61.81, '2022-07-04', '5'),
(42, 36, 4, 32, 8, 75, 48, 15, 68.75, 500, 145, 71, 75, 68.75, 71, 12.14, '2022-07-07', '5'),
(43, 36, 10, 26, 13, 50, 12, 8, 33.33, 4500, 412, 90.84, 50, 33.33, 91, 98.1, '2022-07-07', '5'),
(45, 48, 12, 36, 11, 69.44, 50, 26, 48, 14000, 4500, 67.86, 69.44, 48, 68, 22.62, '2022-07-09', '5'),
(48, 9, 1, 8, 1.5, 81.25, 10, 2, 80, 4500, 47, 98.96, 81.25, 80, 99, 64.32, '2022-07-25', '5'),
(49, 10, 1.5, 8.5, 1, 88.24, 10, 5, 50, 4500, 10, 99.78, 88.24, 50, 100, 44.02, '2022-08-01', '22'),
(50, 12, 1, 11, 2, 81.82, 10, 1, 90, 25000, 45, 99.82, 81.82, 90, 100, 73.5, '2022-08-01', '5'),
(51, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 4200, 47, 98.88, 87.5, 88.89, 99, 76.91, '2022-08-03', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_usersname` varchar(50) NOT NULL,
  `u_pssaword` int(20) NOT NULL,
  `Status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_usersname`, `u_pssaword`, `Status`) VALUES
(1, 'seveen', 7777, 'Admin'),
(5, 'AE', 1111, 'Admin'),
(7, 'saw', 12345, 'User'),
(22, 'yo', 1111, 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_id`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
