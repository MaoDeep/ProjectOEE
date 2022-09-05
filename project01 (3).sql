-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2022 at 08:04 AM
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
  `Nmac` varchar(50) NOT NULL,
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

INSERT INTO `employee` (`E_id`, `EName`, `Nmac`, `Econ`, `Epro`, `Edel`, `Etime`, `Etimet`, `DATE`) VALUES
(140, 'saw', 'T200', 4500, 'C-100', 47, '08:00', '17:00', '2022-07-31'),
(155, 'row', 'T200', 4500, 'c-100', 47, '08:00', '17:00', '2022-08-23'),
(223, 'AE', 'T400', 500, 'c-100', 47, '08:00', '17:00', '2022-08-25'),
(224, 'win', 'T200', 500, 'c-100', 58, '08:00', '17:00', '2022-08-05'),
(225, 'win', 'T400', 8000, 'c-100', 800, '08:00', '17:00', '2022-06-14'),
(226, 'win', 'T300', 5000, 'c-100', 560, '08:00', '17:00', '0000-00-00'),
(227, 'win', 'T200', 500, 'c-100', 12, '08:00', '17:00', '0000-00-00'),
(228, 'win', 'T200', 500, 'c-100', 44, '08:00', '17:00', '2022-08-09');

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
(55, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 4200, 47, 98.88, 87.5, 88.89, 99, 76.91, '2022-08-09', '5'),
(56, 9, 2, 7, 2, 71.43, 9, 2, 77.78, 4500, 47, 98.96, 71.43, 77.78, 99, 54.98, '2022-08-09', '22'),
(57, 9, 1, 8, 1, 87.5, 1200, 1, 99.92, 4500, 1, 99.98, 87.5, 99.92, 100, 87.41, '2022-08-09', '5'),
(58, 13, 1, 12, 1, 91.67, 13, 1, 92.31, 45000, 400, 99.11, 91.67, 92.31, 99, 83.86, '2022-08-12', '5'),
(59, 12, 1, 11, 1, 90.91, 12, 1, 91.67, 4500, 45, 99, 90.91, 91.67, 99, 82.5, '2022-08-15', '5'),
(60, 10, 2, 8, 2, 75, 22, 2, 90.91, 4500, 47, 98.96, 75, 90.91, 99, 67.47, '2022-08-22', '28'),
(61, 9, 2, 7, 2, 71.43, 9, 2, 77.78, 4500, 47, 98.96, 71.43, 77.78, 99, 54.98, '2022-08-23', '7'),
(62, 9, 1.5, 7.5, 1.5, 80, 9, 1.5, 83.33, 4200, 12, 99.71, 80, 83.33, 100, 66.48, '2022-08-23', '27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_usersname` varchar(50) NOT NULL,
  `u_pssaword` int(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `std2` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_usersname`, `u_pssaword`, `Status`, `std2`) VALUES
(0, 'กาย', 1111, 'User', 'ปกติ'),
(5, 'AE', 1111, 'Admin', 'ปกติ'),
(7, 'saw', 1111, 'Admin', 'ปกติ'),
(22, 'yo', 1111, 'User', 'ปกติ'),
(27, 'row', 123, 'Admin', 'ปกติ'),
(28, 'win', 12345, 'Admin', 'ปกติ');

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
  MODIFY `E_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
