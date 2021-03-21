-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2021 at 11:30 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qamonitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `application_tbl`
--

CREATE TABLE `application_tbl` (
  `id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `version` varchar(10) NOT NULL,
  `status` smallint(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_tbl`
--

INSERT INTO `application_tbl` (`id`, `created_date`, `modified_date`, `version`, `status`) VALUES
(1, '2021-03-04 00:00:00', '0000-00-00 00:00:00', '4', 1),
(2, '2021-03-04 00:00:00', '0000-00-00 00:00:00', '4', 1);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `description_log` text NOT NULL,
  `version` varchar(10) NOT NULL,
  `datetime_log` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='description of changes';

-- --------------------------------------------------------

--
-- Table structure for table `reports_tbl`
--

CREATE TABLE `reports_tbl` (
  `ID` int(11) NOT NULL,
  `application_id` int(11) NOT NULL DEFAULT 0,
  `application` text NOT NULL,
  `module` text NOT NULL,
  `description` text NOT NULL,
  `features` text NOT NULL,
  `remarks` text NOT NULL,
  `deployed_date` date NOT NULL,
  `modified_date` date DEFAULT NULL,
  `version` varchar(10) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reports_tbl`
--

INSERT INTO `reports_tbl` (`ID`, `application_id`, `application`, `module`, `description`, `features`, `remarks`, `deployed_date`, `modified_date`, `version`, `status`) VALUES
(1, 0, 'QA Monitoring', 'Management Module', 'Add module to include receiving of managers approval', 'Add Registration', 'Added', '2021-02-03', NULL, '1.01', 1),
(2, 0, 'Tproms', 'SBDY', 'Add randomizing', 'Add randomizing function to SBDY lot creation this will randomize lot number for QA Sample\r\n', 'Enhanced', '2021-02-24', '2021-02-25', '1.02', 1),
(3, 0, 'QA Monitoring', 'Management Module', 'Enhance to include receiving of managers approval', 'Add Report Viewer', 'Enhanced', '2021-02-03', '2021-03-04', '1.03', 1),
(4, 1, 'hotkey', 'MODULE A', 'The meaning of term keyboard shortcut can vary depending on software manufacturer', 'Fix a hotkey bug', 'Enhanced', '2021-03-04', '2021-03-05', '1.04', 1),
(5, 2, 'Language', 'Management Module', 'Add new language', 'Portuguese language', 'Added', '2021-03-05', NULL, '1.05', 1),
(6, 0, 'Canvas', 'MODULE C', 'Size of Canvas', 'Slightly reduce the size of canvas to unblock mouse interaction with hidden (as well as non-hidden) windows taskbar', 'Changed', '2021-03-06', '2021-03-07', '1.06', 1),
(7, 0, 'Language', 'module P', 'Add new language', 'Polish language', 'Added', '2021-03-06', NULL, '1.06', 1),
(8, 0, 'Language', 'module L', 'Add new Language', 'Czech language', 'Added', '2021-03-06', NULL, '1.06', 1),
(9, 0, 'Language', 'module G', 'Add new language', 'German Language', 'Added', '2021-03-08', NULL, '1.07', 1),
(10, 0, 'Language', 'module C', 'Add new language', 'Traditional Chinese language', 'Added', '2021-03-08', NULL, '1.07', 1),
(11, 0, 'Language', 'module F', 'add new language', 'French language', 'Added', '2021-03-09', NULL, '1.08', 1),
(12, 0, 'Language', 'module I', 'Add new language', 'Italian language', 'Added', '2021-03-09', NULL, '1.08', 1),
(13, 0, 'Snapchat', 'Click', 'One of the principal features of Snapchat is that pictures and messages are usually only available for a short time before they become inaccessible to their recipients.', 'Jump to the snapshot file when clicking the Windows tip balloon after taking a snapchat.', 'Added', '2021-03-10', NULL, '1.09', 1),
(14, 0, 'CPU Usage', '', 'CPU time (or process time) is the amount of time for which a central processing unit (CPU) was used for processing instructions of a computer program or operating system', 'Less CPU usage when dragging to take a snapchat.', 'Enhanced', '2021-03-10', '2021-03-11', '1.09', 1),
(15, 0, 'Crash', '', '', 'Fix a rare crash which occurs upon selecting eraser', 'Enhanced', '2021-03-10', '2021-03-11', '1.09', 1),
(16, 0, 'Crash', '', '', 'Fix a rare crash which occurs at startup due to the language folder not found.', 'Enhanced', '2021-03-10', '2021-03-11', '1.09', 1),
(17, 0, 'Language', 'module R', 'Add new language', 'Russian language', 'Added', '2021-03-10', NULL, '1.09', 1),
(18, 0, 'Layout', 'Module Management', 'layout description', 'Better handling of UI layout for multiple displays of unmatched DPI', 'Added', '2021-03-12', NULL, '1.10', 1),
(19, 0, 'Layout', 'Module Management', 'layout description', 'Better handling of UI layout for multiple displays of unmatched DPI', 'Enhanced', '2021-03-12', '2021-03-13', '1.10', 1),
(20, 0, 'Layout', 'Module Management', 'layout description', 'Better handling of UI layout for multiple displays of unmatched DPI', 'Changed', '2021-03-13', '2021-03-19', '1.10', 1),
(21, 0, 'Language', 'Management Module', 'Add new language', 'India language', 'Enhanced', '2021-03-05', '2021-03-19', '1.11', 1),
(22, 0, 'app', 'mod', 'this describe', 'alter handling mod', 'Changed', '2021-03-20', NULL, '1.11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `MiddleName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `application_tbl`
--
ALTER TABLE `application_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports_tbl`
--
ALTER TABLE `reports_tbl`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `application_tbl`
--
ALTER TABLE `application_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reports_tbl`
--
ALTER TABLE `reports_tbl`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
