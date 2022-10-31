-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 31, 2022 at 11:02 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `generaldb`
--
CREATE DATABASE IF NOT EXISTS `generaldb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `generaldb`;

-- --------------------------------------------------------

--
-- Table structure for table `activitiesdb`
--

CREATE TABLE `activitiesdb` (
  `Activity_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Start_time` time NOT NULL,
  `End_time` time NOT NULL,
  `Title` varchar(100) NOT NULL,
  `Duration` int(11) DEFAULT NULL,
  `Start_day` date DEFAULT NULL,
  `End_day` date DEFAULT NULL,
  `Notes` tinytext DEFAULT NULL,
  `Weekdays` varchar(7) DEFAULT NULL,
  `Repeat_attribute` varchar(11) DEFAULT NULL,
  `Frequency` int(11) DEFAULT NULL,
  `Days_duration` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `activitiesdb`:
--   `User_ID`
--       `userdb` -> `User_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `labdb`
--

CREATE TABLE `labdb` (
  `Lab_ID` int(11) NOT NULL,
  `Subject_ID` int(11) NOT NULL,
  `Lab_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `labdb`:
--   `Subject_ID`
--       `subjectdb` -> `Subject_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `profdb`
--

CREATE TABLE `profdb` (
  `Prof_ID` int(11) NOT NULL,
  `Prof_name` varchar(20) NOT NULL,
  `Prof_lastName` varchar(20) DEFAULT NULL,
  `Prof_title` varchar(50) DEFAULT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `profdb`:
--   `User_ID`
--       `userdb` -> `User_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `subjectdb`
--

CREATE TABLE `subjectdb` (
  `Subject_ID` int(11) NOT NULL,
  `Activity_ID` int(11) NOT NULL,
  `Prof_ID` int(11) DEFAULT NULL,
  `Subject_name` varchar(30) NOT NULL,
  `Credits` smallint(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `subjectdb`:
--   `Activity_ID`
--       `activitiesdb` -> `Activity_ID`
--   `Prof_ID`
--       `profdb` -> `Prof_ID`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE `userdb` (
  `User_ID` int(11) NOT NULL,
  `User_name` varchar(20) NOT NULL,
  `User_lastName` varchar(20) NOT NULL,
  `User_email` varchar(50) NOT NULL,
  `User_password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- RELATIONSHIPS FOR TABLE `userdb`:
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activitiesdb`
--
ALTER TABLE `activitiesdb`
  ADD PRIMARY KEY (`Activity_ID`),
  ADD KEY `user` (`User_ID`);

--
-- Indexes for table `labdb`
--
ALTER TABLE `labdb`
  ADD PRIMARY KEY (`Lab_ID`),
  ADD KEY `subject` (`Subject_ID`);

--
-- Indexes for table `profdb`
--
ALTER TABLE `profdb`
  ADD PRIMARY KEY (`Prof_ID`),
  ADD KEY `User_ID` (`User_ID`);

--
-- Indexes for table `subjectdb`
--
ALTER TABLE `subjectdb`
  ADD PRIMARY KEY (`Subject_ID`),
  ADD UNIQUE KEY `Subject_ID` (`Subject_ID`),
  ADD KEY `Activity_ID` (`Activity_ID`),
  ADD KEY `Prof_ID` (`Prof_ID`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
  ADD PRIMARY KEY (`User_ID`),
  ADD UNIQUE KEY `User_email` (`User_email`),
  ADD UNIQUE KEY `User_email_2` (`User_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activitiesdb`
--
ALTER TABLE `activitiesdb`
  MODIFY `Activity_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `labdb`
--
ALTER TABLE `labdb`
  MODIFY `Lab_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profdb`
--
ALTER TABLE `profdb`
  MODIFY `Prof_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjectdb`
--
ALTER TABLE `subjectdb`
  MODIFY `Subject_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userdb`
--
ALTER TABLE `userdb`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activitiesdb`
--
ALTER TABLE `activitiesdb`
  ADD CONSTRAINT `user` FOREIGN KEY (`User_ID`) REFERENCES `userdb` (`User_ID`) ON DELETE CASCADE;

--
-- Constraints for table `labdb`
--
ALTER TABLE `labdb`
  ADD CONSTRAINT `subject` FOREIGN KEY (`Subject_ID`) REFERENCES `subjectdb` (`Subject_ID`) ON DELETE CASCADE;

--
-- Constraints for table `profdb`
--
ALTER TABLE `profdb`
  ADD CONSTRAINT `profdb_ibfk_1` FOREIGN KEY (`User_ID`) REFERENCES `userdb` (`User_ID`);

--
-- Constraints for table `subjectdb`
--
ALTER TABLE `subjectdb`
  ADD CONSTRAINT `subjectdb_ibfk_1` FOREIGN KEY (`Activity_ID`) REFERENCES `activitiesdb` (`Activity_ID`),
  ADD CONSTRAINT `subjectdb_ibfk_2` FOREIGN KEY (`Prof_ID`) REFERENCES `profdb` (`Prof_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
