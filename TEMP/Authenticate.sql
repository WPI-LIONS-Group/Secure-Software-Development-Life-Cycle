-- phpMyAdmin SQL Dump
-- version 
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 23, 2024 at 07:18 PM
-- Server version: 5.7.44-percona-sure1-log
-- PHP Version: 8.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cayennekevin_Student1`
--

-- --------------------------------------------------------

--
-- Table structure for table `Authenticate`
--

CREATE TABLE `Authenticate` (
  `userID` varchar(100) DEFAULT NULL,
  `userPW` varchar(255) DEFAULT NULL,
  `userLevel` varchar(100) NOT NULL,
  `U_ID` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `Authenticate`
--

INSERT INTO `Authenticate` (`userID`, `userPW`, `userLevel`, `U_ID`) VALUES
('Jackie0', 'p!a!s!s!w!o!r!d!', 'student', 1),
('brandon', 'pass', 'teacher', 41),
('student12', 'pass', 'student', 40),
('JoeHappy', 'pass', 'student', 39),
('john', 'pass', 'teacher', 38),
('jason', 'pass', 'student', 37),
('student', 'pass', 'student', 30),
('teacher', 'pass', 'teacher', 29);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Authenticate`
--
ALTER TABLE `Authenticate`
  ADD PRIMARY KEY (`U_ID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Authenticate`
--
ALTER TABLE `Authenticate`
  MODIFY `U_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
