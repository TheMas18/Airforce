-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2021 at 08:57 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iaf_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicationusers`
--

CREATE TABLE `applicationusers` (
  `id` int(4) NOT NULL,
  `candidateID` int(4) NOT NULL,
  `email` varchar(100) NOT NULL,
  `height` int(4) NOT NULL,
  `weight` int(4) NOT NULL,
  `ssc` int(4) NOT NULL,
  `hsc` int(4) NOT NULL,
  `hscENG` int(4) NOT NULL,
  `hscPHY` int(4) NOT NULL,
  `Grad` int(4) NOT NULL,
  `Glasses` tinyint(1) NOT NULL,
  `Created At` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `Application` varchar(100) NOT NULL,
  `JobDesc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicationusers`
--

INSERT INTO `applicationusers` (`id`, `candidateID`, `email`, `height`, `weight`, `ssc`, `hsc`, `hscENG`, `hscPHY`, `Grad`, `Glasses`, `Created At`, `Application`, `JobDesc`) VALUES
(23, 28, 'misha@mail.com', 180, 55, 80, 80, 80, 80, 0, 1, '2021-08-11 17:34:45.163442', 'Rejected', 'Group X'),
(24, 28, 'misha@mail.com', 180, 80, 80, 80, 80, 80, 8, 0, '2021-08-11 17:34:46.490824', 'Rejected', 'Flying Officer'),
(25, 28, 'misha@mail.com', 180, 65, 80, 80, 80, 80, 8, 0, '2021-08-11 17:39:02.499110', 'Approved', 'Flying Officer'),
(26, 28, 'misha@mail.com', 180, 55, 80, 80, 80, 80, 0, 0, '2021-09-05 08:19:01.491459', 'Rejected', 'Group X'),
(27, 31, 'manoj@mail.com', 200, 80, 80, 80, 80, 80, 8, 0, '2021-09-05 08:19:03.256852', 'Approved', 'Garud Commando'),
(28, 33, 'msi@mail.com', 200, 80, 80, 80, 80, 80, 8, 0, '2021-09-13 06:56:29.508559', 'Pending', 'Garud Commando');

-- --------------------------------------------------------

--
-- Table structure for table `usercontact`
--

CREATE TABLE `usercontact` (
  `id` int(4) NOT NULL,
  `Message` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `CreatedAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6),
  `nexID` int(4) NOT NULL,
  `Resolved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usercontact`
--

INSERT INTO `usercontact` (`id`, `Message`, `Email`, `CreatedAt`, `nexID`, `Resolved`) VALUES
(28, 'msg here guys', 'misha@mail.com', '2021-08-08 12:47:23.148412', 8, 1),
(28, 'yesh', 'misha@mail.com', '2021-08-09 04:46:57.526471', 9, 1),
(28, 'this is misha name change to meera', 'misha@mail.com', '2021-08-08 14:07:16.247755', 10, 1),
(30, 'hello misha here', 'misha@123mail.com', '2021-09-12 09:57:39.709423', 11, 1),
(31, 'Hello change my name to Sanjay', 'manoj@mail.com', '2021-09-05 08:18:49.945846', 12, 1),
(33, 'issue here', 'msi@mail.com', '2021-09-13 06:55:30.362821', 13, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userregisdata`
--

CREATE TABLE `userregisdata` (
  `id` int(4) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `gender` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `CreatedAt` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userregisdata`
--

INSERT INTO `userregisdata` (`id`, `firstName`, `lastName`, `email`, `gender`, `city`, `state`, `password`, `CreatedAt`) VALUES
(27, 'Mayuresh', 'Samant', 'mayu@mail.com', 'Male', 'Mayu', 'Maharashtra', '$2y$10$pnDSgBSOhnaDgxOT.1XLN.q/5UeXYOlxFrUQYQEZRWOrSa.FPrgby', '2021-08-08 08:51:58.118170'),
(28, 'Misha', 'Mishra', 'misha@mail.com', 'Female', 'Mumbai', 'Maharashtra', '$2y$10$um/3hDWb/XOg9Lo6SOcOMuf.658/tT4sb6ZzTSv7Pu/R7FioSz6jm', '2021-08-10 11:50:33.594584'),
(31, 'Manoj', 'Saini', 'manoj@mail.com', 'Male', 'Navi Mumbai', 'Maharashtra', '$2y$10$cXFURJGnZymAKfZhDtZ52.XRS.Hfnk1zx.41sFa5q9jSidrHpAp8u', '2021-09-13 06:53:24.060573'),
(33, 'msi', 'msi', 'msi@mail.com', 'Male', 'msi', 'Goa', '$2y$10$q6V4YQNE0K/4kVSjNCAd9e1QkTi4lddiegt8axRoFv63l5IdKP6HO', '2021-09-13 06:54:31.841179');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicationusers`
--
ALTER TABLE `applicationusers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usercontact`
--
ALTER TABLE `usercontact`
  ADD PRIMARY KEY (`nexID`);

--
-- Indexes for table `userregisdata`
--
ALTER TABLE `userregisdata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicationusers`
--
ALTER TABLE `applicationusers`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `usercontact`
--
ALTER TABLE `usercontact`
  MODIFY `nexID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userregisdata`
--
ALTER TABLE `userregisdata`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
