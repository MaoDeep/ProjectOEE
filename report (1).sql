-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2022 at 12:08 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `report`
--
ALTER TABLE `report`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
