-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220519.4c1c1fcc18
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2022 at 09:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` int(50) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
(1, 'ผ้าเบรค Yasaki VIP รุ่น WA'),
(2, 'ผ้าเบรค Yasaki VIP รุ่น CL'),
(3, 'ผ้าเบรค Yasaki VIP รุ่น RX-Z,Dream'),
(4, 'ผ้าเบรค  Yasaki VIP Super รุ่น CL'),
(31, 'ผ้าเบรค Yasaki VIP Super รุ่น AB'),
(32, 'ผ้าเบรค Yasaki VIP Super รุ่น AC');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `E_id` int(20) NOT NULL,
  `EName` varchar(20) NOT NULL,
  `Nmac` varchar(50) NOT NULL,
  `Econ` int(20) NOT NULL,
  `Epro` varchar(100) NOT NULL,
  `Edel` int(11) NOT NULL,
  `Etime` varchar(20) NOT NULL,
  `Etimet` varchar(20) NOT NULL,
  `DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`E_id`, `EName`, `Nmac`, `Econ`, `Epro`, `Edel`, `Etime`, `Etimet`, `DATE`) VALUES
(395, ' sen win', 'MC-HTP-2016-1', 4100, 'ผ้าเบรค Yasaki VIP รุ่น WA', 40, '08:05', '17:03', '2022-09-22'),
(396, 'Saw maung tin', 'MC-HTP-2009-2', 4500, 'ผ้าเบรค Yasaki VIP รุ่น CL', 41, '08:00', '18:00', '2022-09-22'),
(397, ' joe wen', 'MC-HTP-2005-3', 4000, 'ผ้าเบรค Yasaki VIP รุ่น RX-Z,Dream', 10, '08:00', '18:30', '2022-09-22'),
(398, ' tun naing', 'MC-HTP-2014-4', 5000, 'ผ้าเบรค  Yasaki VIP Super รุ่น CL', 100, '08:00', '20:30', '2022-09-22'),
(399, 'admin', 'MC-HTP-2016-1', 4100, 'ผ้าเบรค Yasaki VIP กล่องรุ่น WA<', 47, '08:00', '17:00', '2022-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `machine`
--

CREATE TABLE `machine` (
  `mac_id` int(50) NOT NULL,
  `mac_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `machine`
--

INSERT INTO `machine` (`mac_id`, `mac_name`) VALUES
(1, 'MC-HTP-2016-1'),
(2, 'MC-HTP-2009-2'),
(3, 'MC-HTP-2005-3'),
(4, 'MC-HTP-2014-4'),
(31, 'MC-HTP-2014-9'),
(32, 'MC-HTP-2016-2');

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
(139, 538, 60, 478, 60, 87.45, 538, 60, 88.85, 4100, 41, 99, 87.45, 88.85, 99, 76.92, '2022-09-22', '45'),
(140, 600, 90, 510, 90, 82.35, 600, 90, 85, 4500, 41, 99.09, 82.35, 85, 99, 69.36, '2022-09-22', '46'),
(141, 630, 60, 570, 60, 89.47, 630, 60, 90.48, 4000, 10, 99.75, 89.47, 90.48, 100, 80.75, '2022-09-22', '47'),
(142, 750, 63, 687, 63, 90.83, 750, 63, 91.6, 5000, 100, 98, 90.83, 91.6, 98, 81.54, '2022-09-22', '48'),
(143, 540, 60, 480, 60, 87.5, 540, 60, 88.89, 4100, 47, 98.85, 87.5, 88.89, 99, 76.89, '2022-09-27', '5'),
(144, 540, 60, 480, 60, 87.5, 540, 60, 88.89, 4100, 47, 98.85, 87.5, 88.89, 99, 76.89, '2022-09-27', '5'),
(145, 540, 90, 450, 90, 80, 540, 90, 83.33, 4100, 47, 98.85, 80, 83.33, 99, 65.9, '2022-09-27', '45'),
(146, 540, 60, 480, 60, 87.5, 540, 60, 88.89, 4001, 500, 87.5, 87.5, 88.89, 88, 68.06, '2022-10-01', '5'),
(147, 540, 60, 480, 60, 87.5, 540, 60, 88.89, 500, 10, 98, 87.5, 88.89, 98, 76.22, '2022-10-01', '5'),
(148, 450, 60, 390, 60, 84.62, 450, 60, 86.67, 7000, 85, 98.79, 84.62, 86.67, 99, 72.44, '2022-10-06', '59');

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
  `mac_id` varchar(50) NOT NULL,
  `b_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`u_id`, `u_usersname`, `u_pssaword`, `Status`, `std2`, `mac_id`, `b_id`) VALUES
(0, 'ชิด', 1111, 'Admin', 'ปกติ', '', ''),
(2, 'admin', 1111, 'Admin', 'ปกติ', '5', '5'),
(45, 'sen win', 1111, 'User', 'ปกติ', '1', '1'),
(46, 'Saw maung tin', 1111, 'User', 'ปกติ', '2', '2'),
(47, ' joe wen', 1111, 'User', 'ปกติ', '3', '3'),
(48, ' tun naing', 1111, 'User', 'ปกติ', '4', '4'),
(60, 'test', 1111, 'User', 'ปกติ', '31', '31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`b_id`);

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
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `b_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT for table `machine`
--
ALTER TABLE `machine`
  MODIFY `mac_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



