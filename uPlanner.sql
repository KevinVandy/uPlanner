-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 05:53 PM
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
(8, 'kevin@gmail.com', 'Kevin', '$2y$13$bgQiluH/5jIQevEH8lZSKu55/hPtgRJU6tSo7DDxQOJAFloYrzInu', '2019-03-11 22:38:25', '2019-03-11 22:38:25'),
(10, 'thomas@gmail.com', 'Thomas', '$2y$13$hImjyPClLjqIojrCkbhhgevMYOFlC0WnKV8UMgL.qDcMXPyKK6j/y', '2019-03-12 08:30:55', '2019-03-12 08:30:55');

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
(8, 8, 'month', 'light', 0, 0, '2019-03-11 22:38:25', '2019-03-12 11:04:25'),
(10, 10, 'month', 'purple', 0, 0, '2019-03-12 08:30:55', '2019-03-12 08:30:55');

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

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `UserName`, `PasswordHash`, `CreateTime`, `ModifyTime`) VALUES
(11, 'admin1', 'helloThere2', '2019-03-11 22:35:24', '2019-03-12 11:08:45'),
(13, 'admin3', 'helloThere', '2019-03-12 11:08:58', '2019-03-12 11:08:58');

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
(6, 8, 'PC/Web Capstone', NULL, 'Glenn', '2019-01-07', '2019-03-19', '2019-03-11 22:39:14', '2019-03-11 22:39:45'),
(7, 8, 'COBOL', NULL, 'Beth', '2019-01-07', '2019-03-19', '2019-03-11 22:59:18', '2019-03-11 22:59:18'),
(8, 8, 'C#', NULL, 'Glenn', '2019-03-13', '2019-03-15', '2019-03-12 11:05:25', '2019-03-12 11:05:25');

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

--
-- Dumping data for table `course_work`
--

INSERT INTO `course_work` (`Id`, `CourseId`, `WorkName`, `WorkType`, `Priority`, `DueDate`, `DueTime`, `Completed`, `CreateTime`, `ModifyTime`) VALUES
(4, 6, 'Solo Project Presentation', 'Presentation', 'High', '2019-03-12', '10:00:00', 1, '2019-03-11 22:40:22', '2019-03-11 22:40:22'),
(5, 7, 'CBL04', 'Homework', 'Low', '2019-03-14', '11:55:00', 0, '2019-03-11 23:00:18', '2019-03-11 23:00:18'),
(6, 6, 'Group Project Presentation', 'Presentation', 'High', '2019-03-14', '10:00:00', 0, '2019-03-11 23:01:18', '2019-03-11 23:01:18'),
(7, 8, 'assignment 1', 'Project', 'High', '2019-03-14', '11:00:00', 1, '2019-03-12 11:05:59', '2019-03-12 11:05:59');

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
(21, 8, 'Last Day of School', NULL, '2019-03-19', '00:00:00', '00:00:00', 0, '2019-03-11 22:41:50', '2019-03-11 22:41:50'),
(22, 8, 'My Birthday', NULL, '2019-09-03', '00:00:00', '00:00:00', 0, '2019-03-11 23:17:08', '2019-03-11 23:17:08'),
(23, 8, 'New Year\'s Party', NULL, '2020-01-03', '00:00:00', '00:00:00', 0, '2019-03-11 23:18:05', '2019-03-11 23:18:50');

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
(3, 8, 'State of Nebraska', NULL, '2019-03-11 22:42:07', '2019-03-11 22:42:07');

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

--
-- Dumping data for table `job_work`
--

INSERT INTO `job_work` (`Id`, `JobId`, `WorkName`, `WorkType`, `Priority`, `DueDate`, `DueTime`, `Completed`, `CreateTime`, `ModifyTime`) VALUES
(2, 3, 'Business Meeting', 'Meeting', 'High', '2019-03-14', '02:00:00', 0, '2019-03-11 23:05:28', '2019-03-11 23:05:28');

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
(11, 8, 'Coffee with Joe', NULL, '2019-03-15', '09:00:00', '10:00:00', 0, '2019-03-12 10:07:05', '2019-03-12 10:07:05');

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
  `TaskName` varchar(100) NOT NULL,
  `Priority` varchar(10) NOT NULL,
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
  ADD PRIMARY KEY (`Id`),
  ADD KEY `AccountId` (`AccountId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `account_settings`
--
ALTER TABLE `account_settings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `course_times`
--
ALTER TABLE `course_times`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_work`
--
ALTER TABLE `course_work`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `job_times`
--
ALTER TABLE `job_times`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `job_work`
--
ALTER TABLE `job_work`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `meetings`
--
ALTER TABLE `meetings`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reminders`
--
ALTER TABLE `reminders`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
