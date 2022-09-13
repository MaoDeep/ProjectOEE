-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2022 at 09:28 AM
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
(269, 'AE', 'MC-HTP-2005-3', 4100, 'c-100', 200, '09:00', '20:00', '2022-09-07'),
(275, 'win', 'MC-HTP-2005-3', 500, 'c-100', 2, '08:00', '17:00', '2022-09-07'),
(293, 'AE', 'MC-HTP-2016-1', 500, 'c-100', 3, '08:00', '17:00', '2022-09-10'),
(294, 'AE', 'MC-HTP-2016-1', 4100, 'c-100', 58, '08:00', '17:00', '2022-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `mac_id` varchar(50) NOT NULL,
  `mac_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`mac_id`, `mac_name`) VALUES
('1', 'MC-HTP-2016-1'),
('2', 'MC-HTP-2009-2'),
('3', 'MC-HTP-2005-3'),
('4', 'MC-HTP-2014-4');

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
(97, 10, 4, 6, 4, 33.33, 10, 4, 60, 1000, 14, 98.6, 33.33, 60, 99, 19.72, '2022-09-06', '30'),
(102, 13, 1, 12, 1, 91.67, 13, 1, 92.31, 6000, 600, 90, 91.67, 92.31, 90, 76.15, '2022-09-07', '5'),
(104, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 5000, 500, 90, 87.5, 88.89, 90, 70, '2022-09-07', '5'),
(105, 11, 4, 7, 4, 42.86, 11, 4, 63.64, 500, 50, 90, 42.86, 63.64, 90, 24.55, '2022-09-09', '5'),
(106, 10, 2, 8, 2, 75, 10, 2, 80, 5000, 20, 99.6, 75, 80, 100, 59.76, '2022-09-07', '28'),
(107, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 500, 2, 99.6, 87.5, 88.89, 100, 77.47, '2022-09-07', '28'),
(108, 10, 1, 9, 1, 88.89, 10, 1, 90, 500, 57, 88.6, 88.89, 90, 89, 70.88, '2022-09-07', '22'),
(109, 9, 4, 5, 4, 20, 9, 4, 55.56, 4100, 200, 95.12, 20, 55.56, 95, 10.57, '2022-09-07', '5'),
(110, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 4100, 58, 98.59, 87.5, 88.89, 99, 76.68, '2022-09-10', '5');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_usersname` varchar(50) NOT NULL,
  `u_pssaword` int(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `std2` varchar(50) NOT NULL,
  `mac_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_usersname`, `u_pssaword`, `Status`, `std2`, `mac_id`) VALUES
(0, 'กาย', 1111, 'User', 'ปกติ', '1'),
(5, 'AE', 1111, 'Admin', 'ปกติ', '1'),
(7, 'saw', 1111, 'Admin', 'ปกติ', '2'),
(22, 'yo', 1111, 'Admin', 'ปกติ', '2'),
(27, 'row', 1111, 'Admin', 'ปกติ', '4'),
(28, 'win', 12345, 'Admin', 'ปกติ', '3'),
(29, 'Biw', 1111, 'Admin', 'ปกติ', '3'),
(30, 'Nu', 1111, 'Admin', 'ปกติ', '4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`E_id`);

--
-- Indexes for table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`mac_id`);

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
  MODIFY `E_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=295;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
