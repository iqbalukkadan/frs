-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2017 at 10:10 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `frs`
--

-- --------------------------------------------------------

--
-- Table structure for table `billstatus`
--

CREATE TABLE `billstatus` (
  `clintBillId` int(11) NOT NULL,
  `currentPlace` varchar(50) COLLATE utf8_bin NOT NULL,
  `deliverdTo` varchar(50) COLLATE utf8_bin NOT NULL,
  `dateTime` datetime NOT NULL,
  `deliverEmployeAddress` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `branchId` int(2) NOT NULL,
  `branch` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `frs_admin`
--

CREATE TABLE `frs_admin` (
  `adminId` int(20) NOT NULL,
  `adminName` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminUsername` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminPassword` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminEmailId` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminAddress` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminGender` char(6) COLLATE utf8_bin DEFAULT NULL,
  `adminMobile_no` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `adminDOB` date DEFAULT NULL,
  `adminRole` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminBranch` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `adminImage` varchar(250) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `frs_admin`
--

INSERT INTO `frs_admin` (`adminId`, `adminName`, `adminUsername`, `adminPassword`, `adminEmailId`, `adminAddress`, `adminGender`, `adminMobile_no`, `adminDOB`, `adminRole`, `adminBranch`, `adminImage`) VALUES
(1, 'rajan', 'jobrajan', '25d55ad283aa400af464c76d713c07ad', 'jobrajan@gmail.com', 'aaaaaa', 'male', '1234567890', '2017-01-20', '1', 'kkkk', ''),
(2, 'ukkadan', 'iqubalukkadan', '25d55ad283aa400af464c76d713c07ad', 'ukkadan@gmail.com', 'bbbbbb', 'male', '1234456778', '2017-01-12', '2', 'yyyy', '');

-- --------------------------------------------------------

--
-- Table structure for table `frs_adminrole`
--

CREATE TABLE `frs_adminrole` (
  `adminId` varchar(50) COLLATE utf8_bin NOT NULL,
  `adminRole` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `frs_billdetails`
--

CREATE TABLE `frs_billdetails` (
  `billId` int(11) NOT NULL,
  `billCompany` varchar(50) COLLATE utf8_bin NOT NULL,
  `companyDetails` varchar(250) COLLATE utf8_bin NOT NULL,
  `cost` int(11) NOT NULL,
  `billDate` datetime NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `frs_branches`
--

CREATE TABLE `frs_branches` (
  `branchId` int(2) NOT NULL,
  `branch` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `frs_branches`
--

INSERT INTO `frs_branches` (`branchId`, `branch`) VALUES
(0, 'calicut'),
(1, 'kochin'),
(2, 'palakkad'),
(3, 'wayanad'),
(4, 'delhi'),
(5, 'kannur');

-- --------------------------------------------------------

--
-- Table structure for table `frs_clintbilldetails`
--

CREATE TABLE `frs_clintbilldetails` (
  `billId` int(11) NOT NULL,
  `clintBillId` int(11) NOT NULL,
  `source` varchar(50) COLLATE utf8_bin NOT NULL,
  `destination` varchar(50) COLLATE utf8_bin NOT NULL,
  `cost` int(11) NOT NULL,
  `clintAddress` varchar(250) COLLATE utf8_bin NOT NULL,
  `clintPhoneNumber` int(15) NOT NULL,
  `clintEmail` varchar(50) COLLATE utf8_bin NOT NULL,
  `destinationBranch` varchar(50) COLLATE utf8_bin NOT NULL,
  `destinationCity` varchar(50) COLLATE utf8_bin NOT NULL,
  `currentStatus` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Table structure for table `frs_consignment`
--

CREATE TABLE `frs_consignment` (
  `consignmentId` int(20) NOT NULL,
  `billNumber` int(20) NOT NULL,
  `companyName` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `pickupDate` date DEFAULT NULL,
  `origin` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `consigneeName` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `mode` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `weight` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `destination` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `amount` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `status` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `deliveryAddress` varchar(250) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `frs_consignment`
--

INSERT INTO `frs_consignment` (`consignmentId`, `billNumber`, `companyName`, `pickupDate`, `origin`, `consigneeName`, `mode`, `weight`, `destination`, `amount`, `status`, `deliveryAddress`) VALUES
(1, 100, '100', '0000-00-00', '100', '100', '100', '100', '100', '100', NULL, '100'),
(2, 100, '100', '0000-00-00', '100', '100', '100', '100', '100', '100', NULL, '100'),
(3, 100, '100', '0000-00-00', '100', '100', '100', '100', '100', '100', NULL, '100'),
(4, 100, '100', '0000-00-00', '100', '100', '100', '100', '100', '100', NULL, '100'),
(5, 100, 'aaaa', '0000-00-00', 'bbbb', 'cccc', 'air', '100', 'calicut', '100', NULL, NULL),
(6, 12345, 'esdfghjk', '2017-02-08', 'dfghjk', 'zxvcbnm,', 'wertyjk', '200', 'xcvbnm', '4555', NULL, 'sadfghjkl'),
(7, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(8, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(9, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(10, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(11, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(12, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(13, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(14, 0, 'dddd', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(15, 1, 'v', '2017-02-09', 'h', 'n', 'air', '2', 'j', '3', NULL, 'k'),
(16, 1, 'v', '2017-02-09', 'h', 'n', 'air', '2', 'j', '3', NULL, 'k'),
(17, 1, 'v', '2017-02-09', 'h', 'n', 'air', '2', 'j', '3', NULL, 'k'),
(18, 1, 'v', '2017-02-09', 'h', 'n', 'air', '2', 'j', '3', NULL, 'k'),
(19, 1, 'v', '2017-02-09', 'h', 'n', 'air', '2', 'j', '3', NULL, 'k'),
(20, 444, 'ghgfh', '2017-02-15', 'fdf', 'dsagr', 'sdfgd', '1231', 'qwerty', '1213', NULL, 'ewrtyfug'),
(21, 444, 'ghgfh', '2017-02-15', 'fdf', 'dsagr', 'sdfgd', '1231', 'qwerty', '1213', NULL, 'ewrtyfug'),
(22, 444, 'ghgfh', '2017-02-15', 'fdf', 'dsagr', 'sdfgd', '1', 'qwerty', '1213', NULL, 'ewrtyfug'),
(23, 123, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(24, 1234, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(25, 1234, 'dgfdg', '2017-02-16', 'sgdfghjkl', 'sdgjk', 'xcvbnm', '234', '12345', 'sdfghjk', NULL, 'fghj'),
(26, 345678, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(27, 1223, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(28, 1223, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(29, 678, '', '0000-00-00', '', '', '', '', '', '', NULL, ''),
(30, 0, '', '0000-00-00', '', '', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `frs_roles`
--

CREATE TABLE `frs_roles` (
  `roleId` int(2) NOT NULL,
  `role` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `frs_roles`
--

INSERT INTO `frs_roles` (`roleId`, `role`) VALUES
(1, 'manager'),
(2, 'admin'),
(3, 'sales'),
(4, 'branch');

-- --------------------------------------------------------

--
-- Table structure for table `frs_user`
--

CREATE TABLE `frs_user` (
  `userId` int(20) NOT NULL,
  `userName` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `userUsername` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `userPassword` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `userEmailId` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `userAddress` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `userGender` char(6) COLLATE utf8_bin DEFAULT NULL,
  `userMobile_no` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `userDOB` date DEFAULT NULL,
  `userRole` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `userBranch` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `status` char(50) COLLATE utf8_bin NOT NULL,
  `image` varchar(250) COLLATE utf8_bin NOT NULL,
  `createdDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `frs_user`
--

INSERT INTO `frs_user` (`userId`, `userName`, `userUsername`, `userPassword`, `userEmailId`, `userAddress`, `userGender`, `userMobile_no`, `userDOB`, `userRole`, `userBranch`, `status`, `image`, `createdDate`) VALUES
(74, 'Farook', 'farook', '25d55ad283aa400af464c76d713c07ad', 'farook@gmail.com', 'farook wayanad', 'male', '9911172261', '2015-07-11', 'manager', 'calicut', 'edited', '', '2017-02-13 08:02:49'),
(75, 'Job Rajan', 'jobrajan', '25d55ad283aa400af464c76d713c07ad', 'job@gmail.com', 'job rajan kallumala', 'male', '9562212489', '1995-11-27', 'manager', 'calicut', 'edited', '', '2017-02-12 11:17:52');

-- --------------------------------------------------------

--
-- Table structure for table `frs_user_history`
--

CREATE TABLE `frs_user_history` (
  `userId` int(20) DEFAULT NULL,
  `userLoginTime` datetime DEFAULT NULL,
  `userLogoutTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `frs_user_history`
--

INSERT INTO `frs_user_history` (`userId`, `userLoginTime`, `userLogoutTime`) VALUES
(70, '2017-02-06 07:18:09', '2017-02-06 07:19:45'),
(70, '2017-02-06 07:19:37', '2017-02-06 07:19:45'),
(72, '2017-02-07 12:50:31', '2017-02-07 01:49:46'),
(40, '2017-02-07 01:51:03', '2017-02-07 05:14:34'),
(74, '2017-02-07 05:15:37', '2017-02-07 05:24:13'),
(74, '2017-02-07 05:16:37', '2017-02-07 05:24:13'),
(74, '2017-02-07 05:23:51', '2017-02-07 05:24:13'),
(74, '2017-02-08 08:17:49', NULL),
(74, '2017-02-08 09:56:05', NULL),
(74, '2017-02-09 07:56:13', NULL),
(74, '2017-02-09 11:17:21', NULL),
(74, '2017-02-10 11:04:25', NULL),
(74, '2017-02-11 05:22:36', NULL),
(74, '2017-02-11 05:48:08', NULL),
(74, '2017-02-11 10:28:13', NULL),
(74, '2017-02-12 11:52:42', NULL),
(74, '2017-02-12 09:54:06', NULL),
(74, '2017-02-13 08:00:40', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billstatus`
--
ALTER TABLE `billstatus`
  ADD PRIMARY KEY (`clintBillId`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`branchId`),
  ADD UNIQUE KEY `branch` (`branchId`);

--
-- Indexes for table `frs_admin`
--
ALTER TABLE `frs_admin`
  ADD PRIMARY KEY (`adminId`),
  ADD UNIQUE KEY `adminUsername` (`adminUsername`);

--
-- Indexes for table `frs_adminrole`
--
ALTER TABLE `frs_adminrole`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `frs_branches`
--
ALTER TABLE `frs_branches`
  ADD PRIMARY KEY (`branch`),
  ADD UNIQUE KEY `adminRole` (`branchId`);

--
-- Indexes for table `frs_consignment`
--
ALTER TABLE `frs_consignment`
  ADD PRIMARY KEY (`consignmentId`);

--
-- Indexes for table `frs_roles`
--
ALTER TABLE `frs_roles`
  ADD PRIMARY KEY (`role`),
  ADD UNIQUE KEY `frs_roles` (`roleId`);

--
-- Indexes for table `frs_user`
--
ALTER TABLE `frs_user`
  ADD PRIMARY KEY (`userId`);
ALTER TABLE `frs_user` ADD FULLTEXT KEY `userUsername` (`userUsername`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frs_admin`
--
ALTER TABLE `frs_admin`
  MODIFY `adminId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `frs_consignment`
--
ALTER TABLE `frs_consignment`
  MODIFY `consignmentId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `frs_user`
--
ALTER TABLE `frs_user`
  MODIFY `userId` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
