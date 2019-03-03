-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2019 at 01:51 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uplanner`
--
CREATE DATABASE IF NOT EXISTS `uplanner` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `uplanner`;

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `Id` int(11) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `PasswordHash` text NOT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`Id`, `Email`, `FirstName`, `PasswordHash`, `CreateTime`, `ModifyTime`) VALUES
(1, 'kevinvandy656@gmail.com', 'Kevin', '$2y$13$YW5uHoL.ENgeXaS.lXSKO..dl5HA6t0tcggdD1HubC0ZqjZz9Pk1y', '2019-01-02 23:38:54', '2019-01-02 23:38:54'),
(2, 'thomasvancott1@gmail.com', 'Thomas', '$2y$13$/Im/r2/sBV0Yc8MRgox07eFr4ZKU/CpWCSAsB/3kvJhnHICPFeqyi', '2019-02-05 21:19:31', '2019-02-05 21:19:31');

-- --------------------------------------------------------

--
-- Table structure for table `account_settings`
--

CREATE TABLE `account_settings` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `DefaultView` varchar(50) NOT NULL,
  `Theme` varchar(50) NOT NULL,
  `HideCompleted` tinyint(1) NOT NULL,
  `HideHints` tinyint(1) NOT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_settings`
--

INSERT INTO `account_settings` (`Id`, `AccountId`, `DefaultView`, `Theme`, `HideCompleted`, `HideHints`, `CreateTime`, `ModifyTime`) VALUES
(1, 1, 'month', 'default', 0, 0, '2019-01-02 23:38:54', '2019-03-02 17:35:17'),
(2, 2, 'month', 'default', 0, 0, '2019-02-05 21:19:31', '2019-03-02 17:35:25');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `PasswordHash` text NOT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `CourseName` varchar(30) NOT NULL,
  `LocationId` int(30) DEFAULT NULL,
  `Teacher` varchar(30) DEFAULT NULL,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`Id`, `AccountId`, `CourseName`, `LocationId`, `Teacher`, `StartDate`, `EndDate`, `CreateTime`, `ModifyTime`) VALUES
(1, 1, 'asgas', NULL, 'sdfa', '2019-02-21', '2019-02-28', '2019-02-23 22:14:58', '2019-02-23 22:14:58'),
(2, 1, 'asgas', NULL, 'sdfa', '2019-02-21', '2019-02-28', '2019-02-23 22:20:30', '2019-02-23 22:20:30'),
(3, 1, 'asdf', NULL, 'fda', '2019-02-14', '2019-02-28', '2019-02-24 14:35:06', '2019-02-24 14:35:06');

-- --------------------------------------------------------

--
-- Table structure for table `course_times`
--

CREATE TABLE `course_times` (
  `Id` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `Period` varchar(30) DEFAULT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `Sunday` tinyint(1) DEFAULT NULL,
  `Monday` tinyint(1) DEFAULT NULL,
  `Tuesday` tinyint(1) DEFAULT NULL,
  `Wednesday` tinyint(1) DEFAULT NULL,
  `Thursday` tinyint(1) DEFAULT NULL,
  `Friday` tinyint(1) DEFAULT NULL,
  `Saturday` tinyint(1) DEFAULT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_work`
--

CREATE TABLE `course_work` (
  `Id` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `WorkName` varchar(50) NOT NULL,
  `WorkType` varchar(50) DEFAULT NULL,
  `Priority` varchar(50) DEFAULT NULL,
  `DueDate` date NOT NULL,
  `DueTime` time DEFAULT NULL,
  `Completed` tinyint(1) DEFAULT '0',
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `EventName` varchar(50) NOT NULL,
  `LocationId` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Completed` tinyint(1) NOT NULL DEFAULT '0',
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`Id`, `AccountId`, `EventName`, `LocationId`, `Date`, `StartTime`, `EndTime`, `Completed`, `CreateTime`, `ModifyTime`) VALUES
(1, 1, 'kjjk', NULL, '2019-02-13', '00:00:00', '00:00:00', 0, '2019-02-28 18:54:48', '2019-02-28 18:56:12'),
(2, 1, 'knlkn', NULL, '2019-02-14', '00:00:00', '00:00:00', 0, '2019-02-28 18:58:18', '2019-02-28 18:58:18'),
(3, 1, 'kkknjk', NULL, '2019-02-04', '00:00:00', '00:00:00', 0, '2019-02-28 19:02:41', '2019-02-28 19:02:41'),
(4, 1, 'egrsr', NULL, '2019-04-09', '00:00:00', '00:00:00', 0, '2019-03-02 15:08:25', '2019-03-02 15:08:25'),
(5, 1, 'hello there', NULL, '2019-03-12', '00:00:00', '00:00:00', 0, '2019-03-02 15:20:41', '2019-03-02 15:20:41'),
(6, 1, 'Luke\'s Birthday', NULL, '2019-03-13', '00:00:00', '00:00:00', 0, '2019-03-02 15:22:09', '2019-03-02 15:22:09'),
(7, 1, 'Last Day of School', NULL, '2019-03-19', '00:00:00', '00:00:00', 0, '2019-03-02 18:20:33', '2019-03-02 18:20:33'),
(8, 1, 'jknnjj', NULL, '2019-04-30', '00:00:00', '00:00:00', 1, '2019-03-02 18:41:28', '2019-03-02 18:41:28');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `JobName` varchar(50) NOT NULL,
  `LocationId` int(11) DEFAULT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`Id`, `AccountId`, `JobName`, `LocationId`, `CreateTime`, `ModifyTime`) VALUES
(1, 1, 'State of Nebraska', NULL, '2019-02-28 18:01:20', '2019-02-28 18:01:20');

-- --------------------------------------------------------

--
-- Table structure for table `job_times`
--

CREATE TABLE `job_times` (
  `Id` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `StartTime` time DEFAULT NULL,
  `EndTime` time DEFAULT NULL,
  `Sunday` tinyint(1) DEFAULT NULL,
  `Monday` tinyint(1) DEFAULT NULL,
  `Tuesday` tinyint(1) DEFAULT NULL,
  `Wednesday` tinyint(1) DEFAULT NULL,
  `Thursday` tinyint(1) DEFAULT NULL,
  `Friday` tinyint(1) DEFAULT NULL,
  `Saturday` tinyint(1) DEFAULT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `job_work`
--

CREATE TABLE `job_work` (
  `Id` int(11) NOT NULL,
  `JobId` int(11) NOT NULL,
  `WorkName` varchar(50) NOT NULL,
  `WorkType` varchar(50) NOT NULL,
  `Priority` varchar(50) NOT NULL,
  `DueDate` date NOT NULL,
  `DueTime` time NOT NULL,
  `Completed` tinyint(1) NOT NULL DEFAULT '0',
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `Id` int(11) NOT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `City` varchar(50) DEFAULT NULL,
  `StateProvince` varchar(50) DEFAULT NULL,
  `Zip` varchar(12) DEFAULT NULL,
  `Country` varchar(50) DEFAULT NULL,
  `Building` varchar(50) DEFAULT NULL,
  `RoomNumber` varchar(25) DEFAULT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meetings`
--

CREATE TABLE `meetings` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `MeetingName` varchar(50) NOT NULL,
  `LocationId` int(11) DEFAULT NULL,
  `Date` date NOT NULL,
  `StartTime` time DEFAULT '00:00:00',
  `EndTime` time DEFAULT '00:00:00',
  `Completed` tinyint(1) NOT NULL DEFAULT '0',
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meetings`
--

INSERT INTO `meetings` (`Id`, `AccountId`, `MeetingName`, `LocationId`, `Date`, `StartTime`, `EndTime`, `Completed`, `CreateTime`, `ModifyTime`) VALUES
(3, 1, 'Dentist Appointment', NULL, '2019-03-21', '00:00:00', '00:00:00', 0, '2019-03-02 18:39:31', '2019-03-02 18:39:31');

-- --------------------------------------------------------

--
-- Table structure for table `reminders`
--

CREATE TABLE `reminders` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `ReminderText` text NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `CreationTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `Id` int(11) NOT NULL,
  `AccountId` int(11) NOT NULL,
  `TaskName` varchar(500) NOT NULL,
  `Priority` varchar(50) DEFAULT NULL,
  `CreateTime` datetime DEFAULT CURRENT_TIMESTAMP,
  `ModifyTime` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UniqueEmail` (`Email`);

--
-- Indexes for table `account_settings`
--
ALTER TABLE `account_settings`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `account_settings_ibfk_1` (`AccountId`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `courses_ibfk_1` (`AccountId`),
  ADD KEY `courses_ibfk_2` (`LocationId`);

--
-- Indexes for table `course_times`
--
ALTER TABLE `course_times`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CourseId` (`CourseId`) USING BTREE;

--
-- Indexes for table `course_work`
--
ALTER TABLE `course_work`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `CourseId` (`CourseId`) USING BTREE;

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `events_ibfk_1` (`AccountId`),
  ADD KEY `LocationId` (`LocationId`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `jobs_ibfk_1` (`AccountId`),
  ADD KEY `LocationId` (`LocationId`);

--
-- Indexes for table `job_times`
--
ALTER TABLE `job_times`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `job_hours_ibfk_1` (`JobId`);

--
-- Indexes for table `job_work`
--
ALTER TABLE `job_work`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `job_work_ibfk_1` (`JobId`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `meetings`
--
ALTER TABLE `meetings`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `meetings_ibfk_1` (`AccountId`),
  ADD KEY `meetings_ibfk_2` (`LocationId`);

--
-- Indexes for table `reminders`
--
ALTER TABLE `reminders`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `reminders_ibfk_1` (`AccountId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD KEY `tasks_ibfk_1` (`AccountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `account_settings`
--
ALTER TABLE `account_settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course_times`
--
ALTER TABLE `course_times`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_work`
--
ALTER TABLE `course_work`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `job_times`
--
ALTER TABLE `job_times`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_work`
--
ALTER TABLE `job_work`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_settings`
--
ALTER TABLE `account_settings`
  ADD CONSTRAINT `account_settings_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `courses_ibfk_2` FOREIGN KEY (`LocationId`) REFERENCES `locations` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_times`
--
ALTER TABLE `course_times`
  ADD CONSTRAINT `course_times_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `courses` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `course_work`
--
ALTER TABLE `course_work`
  ADD CONSTRAINT `course_work_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `courses` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `events_ibfk_2` FOREIGN KEY (`LocationId`) REFERENCES `locations` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_ibfk_2` FOREIGN KEY (`LocationId`) REFERENCES `locations` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_times`
--
ALTER TABLE `job_times`
  ADD CONSTRAINT `job_hours_ibfk_1` FOREIGN KEY (`JobId`) REFERENCES `jobs` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_work`
--
ALTER TABLE `job_work`
  ADD CONSTRAINT `job_work_ibfk_1` FOREIGN KEY (`JobId`) REFERENCES `jobs` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `meetings`
--
ALTER TABLE `meetings`
  ADD CONSTRAINT `meetings_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `meetings_ibfk_2` FOREIGN KEY (`LocationId`) REFERENCES `locations` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reminders`
--
ALTER TABLE `reminders`
  ADD CONSTRAINT `reminders_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`AccountId`) REFERENCES `accounts` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
