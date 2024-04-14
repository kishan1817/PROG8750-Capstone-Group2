-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 07:10 PM
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
-- Table structure for table `tbl_adminlogin`
--

CREATE TABLE `tbl_adminlogin` (
  `Email` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_adminlogin`
--

INSERT INTO `tbl_adminlogin` (`Email`, `Password`) VALUES
('jk@gmail.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_application`
--

CREATE TABLE `tbl_application` (
  `Application_id` int(11) NOT NULL,
  `Job_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `Cover_Letter` blob DEFAULT NULL,
  `Resume` varchar(100) NOT NULL,
  `Applied_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`Application_id`, `Job_id`, `User_id`, `Cover_Letter`, `Resume`, `Applied_at`) VALUES
(9, 28, 12, NULL, 'Resume/Kishan_Resume_Staples.pdf', '2024-03-22'),
(10, 28, 12, NULL, 'Resume/Kishankumar_Joshi_winners.pdf', '2024-03-22'),
(13, 28, 12, NULL, 'Resume/Kishankumar Joshi Resume.pdf', '2024-03-22'),
(14, 28, 12, NULL, 'Resume/Kishan_Resume.pdf', '2024-03-22'),
(15, 13, 17, NULL, 'Resume/Kishan_Resume.pdf', '2024-04-02');

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
  `User_id` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_jobs`
--

INSERT INTO `tbl_jobs` (`Job_id`, `Company`, `Logo`, `Title`, `Description`, `Location`, `Salary`, `Industry`, `Job_type`, `Job_level`, `Experience`, `Deadline`, `Posted_at`, `User_id`, `Status`) VALUES
(11, 'Concentrix', 'StoredImages/brand-8.png', 'Customer Service Advisor', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Cambridge', 450000, 'Management', 'Part time', 'Intermidiate', 1, '2024-03-09', '2024-03-08', 12, 1),
(13, 'Gamerflit', 'StoredImages/brand-10.png', 'Full Stack Engineer', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Waterloo', 50000, 'Software', 'Contract', 'Entery', 1, '2024-03-30', '2024-03-08', 12, 1),
(28, 'Food World', 'StoredImages/brand-7.png', 'Cook', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Waterloo', 600000, 'Food', 'Contract', 'Intermidiate', 3, '2024-03-16', '2024-03-19', 12, 1),
(30, 'Bell', 'StoredImages/brand-1.png', 'Manager', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Kitchener', 80000, 'Management', 'Full Time', 'Intermidiate', 3, '2024-03-30', '2024-03-26', 17, 1),
(32, 'Rogers', 'StoredImages/brand-3.png', 'Salesman', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure do', 'Cambridge', 50000, 'Management', 'Part time', 'Entery', 1, '2024-04-05', '2024-03-31', 12, 1);

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

--
-- Dumping data for table `tbl_jobseekerprofile`
--

INSERT INTO `tbl_jobseekerprofile` (`Jobsekker_profile_id`, `User_id`, `Resume`, `Education`, `Experience`, `Skills`, `City`, `State`, `Country`, `Postal_code`) VALUES
(1, 13, '', '', '', '', 'Cambridge', 'Ontario', 'Canada', 'N1R0E2'),
(2, 13, '', '', '', '', 'Kitchener', 'Ontario', 'Canada', 'N2C 2J9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_membership`
--

CREATE TABLE `tbl_membership` (
  `Membership_id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` float NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_membership`
--

INSERT INTO `tbl_membership` (`Membership_id`, `Name`, `Description`, `Price`, `Status`) VALUES
(1, 'Starter Connect', 'Post up to 5 job listings per month\r\nAccess to bas', 49, 1),
(2, 'Growth Engage', 'Post up to 20 job listings per month\r\nAdvanced can', 149, 1),
(3, 'Elite Hire', 'Unlimited job postings\r\nPremium candidate search f', 299, 1);

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
  `User` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`User_id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Phone`, `User`, `Status`) VALUES
(12, 'Kishankumar', 'Joshi', '18bmiit067@gmail.com', 'Kishan@1718', 5483330718, 'employer', 1),
(13, 'Kishankumar', 'Joshi', 'kishan.joshi.1807@gmail.com', 'Kishan@123', 5483330718, 'job seeker', 1),
(14, 'aj', 'go', '18bmiit068@gmail.com', 'Kishan1718@', 1234567890, 'job seeker', 1),
(17, 'ajay', 'gosai', 'ajay@gmail.com', 'Ajay@123', 7894561230, 'employer', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users_membership`
--

CREATE TABLE `tbl_users_membership` (
  `Membership_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indexes for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  ADD PRIMARY KEY (`Membership_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `tbl_users_membership`
--
ALTER TABLE `tbl_users_membership`
  ADD UNIQUE KEY `User_id` (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_application`
--
ALTER TABLE `tbl_application`
  MODIFY `Application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
  MODIFY `Job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_jobseekerprofile`
--
ALTER TABLE `tbl_jobseekerprofile`
  MODIFY `Jobsekker_profile_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_membership`
--
ALTER TABLE `tbl_membership`
  MODIFY `Membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

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

--
-- Constraints for table `tbl_users_membership`
--
ALTER TABLE `tbl_users_membership`
  ADD CONSTRAINT `tbl_users_membership_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tbl_users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
