-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2024 at 01:59 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobnest`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `Application_id` int(11) NOT NULL,
  `Job_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Cover_Letter` blob NOT NULL,
  `Resume` blob NOT NULL,
  `Applied_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `Category_id` int(11) NOT NULL,
  `Category_Name` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_company`
--

CREATE TABLE `tbl_company` (
  `Company_id` int(11) NOT NULL,
  `Company_Name` varchar(40) NOT NULL,
  `Industry` varchar(40) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobs`
--

CREATE TABLE `tbl_jobs` (
  `Job_id` int(11) NOT NULL,
  `Company` varchar(50) NOT NULL,
  `Logo` varchar(255) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Description` varchar(250) NOT NULL,
  `Location` varchar(250) NOT NULL,
  `Salary` float NOT NULL,
  `Industry` varchar(50) NOT NULL,
  `Job_type` varchar(50) NOT NULL,
  `Job_level` varchar(50) NOT NULL,
  `Experience` int(11) NOT NULL,
  `Deadline` date NOT NULL,
  `Posted_at` date NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jobseekerprofile`
--

CREATE TABLE `tbl_jobseekerprofile` (
  `Jobsekker_profile_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Resume` blob NOT NULL,
  `Education` varchar(250) NOT NULL,
  `Experience` varchar(250) NOT NULL,
  `Skills` varchar(100) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `Country` varchar(50) NOT NULL,
  `Postal_code` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `User_id` int(11) NOT NULL,
  `First_Name` varchar(40) NOT NULL,
  `Last_Name` varchar(40) NOT NULL,
  `Email` varchar(80) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `User` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`User_id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Phone`, `User`) VALUES
(11, 'Ajay', 'Gosai', 'ajay.gosai@gmail.com', '9876543210', 8200916191, 'j'),
(12, 'Kishankumar', 'Joshi', '18bmiit067@gmail.com', 'Kishan1718@', 5483330718, 'employer'),
(13, 'Kishankumar', 'Joshi', 'kishan.joshi.1807@gmail.com', 'Kishan1718@', 5483330718, 'job seeker'),
(14, 'aj', 'go', '18bmiit068@gmail.com', 'Kishan1718@', 1234567890, 'job seeker');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD PRIMARY KEY (`Application_id`),
  ADD KEY `User_id` (`User_id`),
  ADD KEY `Job_id` (`Job_id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`Category_id`);

--
-- Indexes for table `tbl_company`
--
ALTER TABLE `tbl_company`
  ADD PRIMARY KEY (`Company_id`);

--
-- Indexes for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD PRIMARY KEY (`Job_id`),
  ADD KEY `Company_id` (`Company`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `tbl_jobseekerprofile`
--
ALTER TABLE `tbl_jobseekerprofile`
  ADD PRIMARY KEY (`Jobsekker_profile_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `Application_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `Category_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_company`
--
ALTER TABLE `tbl_company`
  MODIFY `Company_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `Job_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_jobseekerprofile`
--
ALTER TABLE `tbl_jobseekerprofile`
  MODIFY `Jobsekker_profile_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_application`
--
ALTER TABLE `tbl_application`
  ADD CONSTRAINT `tbl_application_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tbl_users` (`User_id`),
  ADD CONSTRAINT `tbl_application_ibfk_2` FOREIGN KEY (`Job_id`) REFERENCES `tbl_jobs` (`Job_id`);

--
-- Constraints for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  ADD CONSTRAINT `tbl_jobs_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tbl_users` (`User_id`);

--
-- Constraints for table `tbl_jobseekerprofile`
--
ALTER TABLE `tbl_jobseekerprofile`
  ADD CONSTRAINT `tbl_jobseekerprofile_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tbl_users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
