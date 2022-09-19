-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2022 at 02:37 PM
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
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `b_id` varchar(50) NOT NULL,
  `b_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`b_id`, `b_name`) VALUES
('1', 'ผ้าเบรค Yasaki VIP กล่องรุ่น WA'),
('2', 'ผ้าเบรค Yasaki VIP เเพ็ค+สปริง รุ่น CL'),
('3', 'ผ้าเบรค Yasaki VIP แพ็ค+สปริง RX-Z,Dream'),
('4', 'ผ้าเบรค Yasaki VIP Super เเพ็ค+สปริง รุ่น CL');

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
(369, 'Khun sen win', 'MC-HTP-2016-1', 4100, 'ผ้าเบรค Yasaki VIP ก', 47, '08:00', '17:00', '2022-09-19'),
(370, 'Saw maung tin', 'MC-HTP-2009-2', 5000, 'ผ้าเบรค Yasaki VIP เ', 50, '08:00', '17:00', '2022-09-19'),
(371, 'Kyaw win joe wen', 'MC-HTP-2005-3', 50000, 'ผ้าเบรค Yasaki VIP แ', 500, '17:00', '20:00', '2022-09-19'),
(372, 'Kyaw win joe wen', 'MC-HTP-2005-3', 4500, 'ผ้าเบรค Yasaki VIP แ', 48, '08:00', '17:00', '2022-09-19'),
(373, 'Khun tun naing', 'MC-HTP-2014-4', 4600, 'ผ้าเบรค Yasaki VIP S', 47, '08:00', '17:00', '2022-09-19'),
(374, 'Saw maung tin', 'MC-HTP-2009-2', 7000, 'ผ้าเบรค Yasaki VIP เ', 14, '08:00', '18:00', '2022-09-19'),
(375, 'Saw maung tin', 'MC-HTP-2009-2', 4100, 'ผ้าเบรค Yasaki VIP เ', 10, '08:00', '17:00', '2022-09-19'),
(376, 'Khun sen win', 'MC-HTP-2016-1', 4100, 'ผ้าเบรค Yasaki VIP ก', 100, '08:00', '18:00', '2022-09-19'),
(377, 'Kyaw win joe wen', 'MC-HTP-2005-3', 5000, 'ผ้าเบรค Yasaki VIP แ', 10, '08:00', '17:00', '2022-09-19'),
(378, 'Khun tun naing', 'MC-HTP-2014-4', 112, 'ผ้าเบรค Yasaki VIP S', 1, '08:00', '18:00', '2022-09-19');

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
(119, 180, 60, 120, 60, 50, 180, 60, 66.67, 50000, 500, 99, 50, 66.67, 99, 33, '2022-09-19', '47'),
(120, 180, 60, 120, 60, 50, 180, 60, 66.67, 50000, 500, 99, 50, 66.67, 99, 33, '2022-09-19', '47'),
(121, 540, 90, 450, 90, 80, 540, 90, 83.33, 4500, 48, 98.93, 80, 83.33, 99, 65.96, '2022-09-19', '47'),
(122, 540, 60, 480, 60, 87.5, 540, 60, 88.89, 4600, 47, 98.98, 87.5, 88.89, 99, 76.98, '2022-09-19', '48'),
(123, 600, 90, 510, 90, 82.35, 600, 90, 85, 7000, 14, 99.8, 82.35, 85, 100, 69.86, '2022-09-19', '46'),
(124, 540, 60, 480, 60, 87.5, 540, 60, 88.89, 4100, 10, 99.76, 87.5, 88.89, 100, 77.59, '2022-09-19', '46'),
(125, 600, 60, 540, 60, 88.89, 600, 60, 90, 4100, 100, 97.56, 88.89, 90, 98, 78.05, '2022-09-19', '45'),
(126, 540, 90, 450, 90, 80, 540, 90, 83.33, 5000, 10, 99.8, 80, 83.33, 100, 66.53, '2022-09-19', '47'),
(127, 600, 60, 540, 60, 88.89, 600, 60, 90, 112, 1, 99.11, 88.89, 90, 99, 79.29, '2022-09-19', '48');

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
(5, 'admin', 1111, 'Admin', 'ปกติ', '', ''),
(45, 'Khun sen win', 1111, 'User', 'ปกติ', '1', '1'),
(46, 'Saw maung tin', 1111, 'User', 'ปกติ', '2', '2'),
(47, 'Kyaw win joe wen', 1111, 'User', 'ปกติ', '3', '3'),
(48, 'Khun tun naing', 1111, 'User', 'ปกติ', '4', '4');

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
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `E_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=379;

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
