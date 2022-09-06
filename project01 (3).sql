-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 12:13 PM
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
(257, 'row', 'T200', 4500, 'c-100', 50, '08:00', '21:10', '2022-09-06'),
(258, 'win', 'T300', 5000, 'c-100', 55, '08:00', '15:00', '2022-09-06'),
(259, 'saw', 'T400', 4100, 'c-100', 100, '08:00', '16:00', '2022-09-06'),
(260, 'yo', 'T500', 4100, 'c-100', 58, '08:00', '22:00', '2022-09-06'),
(262, 'AE', 'T600', 6000, 'c-100', 22, '08:00', '17:00', '2022-09-06'),
(263, 'Biw', 'T200', 4100, 'c-100', 100, '08:00', '17:00', '2022-09-06'),
(264, 'Nu', 'T300', 4100, 'c-100', 200, '08:00', '23:00', '2022-09-06');

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
(89, 13, 2, 11, 2, 81.82, 13, 2, 84.62, 4500, 50, 98.89, 81.82, 84.62, 99, 68.46, '2022-09-06', '27'),
(90, 7, 1, 6, 1, 83.33, 7, 1, 85.71, 5000, 55, 98.9, 83.33, 85.71, 99, 70.64, '2022-09-06', '28'),
(91, 8, 2, 6, 2, 66.67, 8, 2, 75, 4100, 100, 97.56, 66.67, 75, 98, 48.78, '2022-09-06', '7'),
(92, 14, 1, 13, 1, 92.31, 14, 1, 92.86, 4100, 58, 98.59, 92.31, 92.86, 99, 84.5, '2022-09-06', '22'),
(94, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 6000, 22, 99.63, 87.5, 88.89, 100, 77.49, '2022-09-06', '5'),
(95, 9, 1, 8, 1, 87.5, 9, 1, 88.89, 4100, 100, 97.56, 87.5, 88.89, 98, 75.88, '2022-09-06', '29'),
(96, 15, 1, 14, 1, 92.86, 15, 1, 93.33, 4100, 200, 95.12, 92.86, 93.33, 95, 82.44, '2022-09-06', '30');

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
(22, 'yo', 1111, 'Admin', 'ปกติ'),
(27, 'row', 1111, 'Admin', 'ปกติ'),
(28, 'win', 12345, 'Admin', 'ปกติ'),
(29, 'Biw', 1111, 'Admin', 'ปกติ'),
(30, 'Nu', 1111, 'Admin', 'ปกติ');

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
  MODIFY `E_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
