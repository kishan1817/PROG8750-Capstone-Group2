-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 09:51 PM
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
  `Applied_at` date NOT NULL,
  `status` enum('Pending','Accept','Reject') DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_application`
--

INSERT INTO `tbl_application` (`Application_id`, `Job_id`, `User_id`, `Cover_Letter`, `Resume`, `Applied_at`, `status`) VALUES
(16, 36, 26, NULL, 'Resume/Kishan_Resume.pdf', '2024-04-16', 'Pending');

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
-- Table structure for table `tbl_contacts`
--

CREATE TABLE `tbl_contacts` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
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
(34, 'Rogers', 'StoredImages/brand-1.png', 'Digital Marketing', ' Seeking a creative and data-driven Digital Marketing Specialist to develop, implement, track, and optimize our digital marketing campaigns across all digital channels. Ideal candidates should have a strong grasp of current marketing tools and strate', 'Waterloo', 50000, 'Advertising', 'Contract', 'Entery', 1, '2024-05-11', '2024-04-16', 24, 1),
(35, 'RMES', 'StoredImages/brand-3.png', 'Assistant Manager', 'Seeking a creative and data-driven Digital Marketing Specialist to develop, implement, track, and optimize our digital marketing campaigns across all digital channels. Ideal candidates should have a strong grasp of current marketing tools and strateg', 'Kitchener', 600000, 'Management', 'Full Time', 'Entery', 3, '2024-05-02', '2024-04-16', 24, 1),
(36, 'BuildRight Construction Group', 'StoredImages/brand-10.png', 'Project Manager', 'We are looking for an experienced Project Manager to manage organization of key client projects in the construction sector, ensuring completion on time, within budget and within scope. Overseeing all onsite and offsite constructions to monitor compli', 'Cambridge', 90000, 'Management', 'Full Time', 'Expert', 10, '2024-05-10', '2024-04-16', 25, 1),
(37, 'TechSolutions Ltd.', 'StoredImages/brand-5.png', 'Senior Java Developer', 'Join our team as a Senior Java Developer where you will be involved in building high-performing, scalable, enterprise-grade applications. You will be part of a talented software team that works on mission-critical applications.\r\nRequirements: Hands-o', 'Waterloo', 600000, 'Software', 'Contract', 'Intermidiate', 3, '2024-04-30', '2024-04-16', 25, 1);

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
-- Table structure for table `tbl_saved_jobs`
--

CREATE TABLE `tbl_saved_jobs` (
  `user_id` int(11) NOT NULL,
  `job_id` int(11) NOT NULL,
  `saved_on` datetime DEFAULT current_timestamp()
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
  `Password` varchar(250) NOT NULL,
  `Phone` bigint(20) NOT NULL,
  `User` varchar(20) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`User_id`, `First_Name`, `Last_Name`, `Email`, `Password`, `Phone`, `User`, `Status`) VALUES
(24, 'Kishankumar', 'Joshi', '18bmiit067@gmail.com', '$2y$10$2jI2JUkKYnjUJNiN8NUniOUg0HhvrvQuVw3/85X7jcKICKcSYTe7W', 5467891230, 'employer', 1),
(25, 'ajay', 'gosai', 'ajay.gosai35@gmail.com', '$2y$10$wFP5SL1FElnADYhog3Au4u444bqk.HbuZULwu8Qg2ZOTMour9pfem', 7894561230, 'employer', 1),
(26, 'Kishankumar', 'Joshi', 'kishan.joshi.1807@gmail.com', '$2y$10$hQG/TufrQ3Bq1Id.tPA.N.Q5prmEXSt.8Tpfzcm0OJw8hn0dac4Hi', 5483330718, 'job seeker', 1);

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
-- Indexes for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD PRIMARY KEY (`contact_id`),
  ADD KEY `user_id` (`user_id`);

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
-- Indexes for table `tbl_saved_jobs`
--
ALTER TABLE `tbl_saved_jobs`
  ADD PRIMARY KEY (`user_id`,`job_id`),
  ADD KEY `job_id` (`job_id`);

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
  MODIFY `Application_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
-- AUTO_INCREMENT for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_jobs`
--
ALTER TABLE `tbl_jobs`
  MODIFY `Job_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

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
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
-- Constraints for table `tbl_contacts`
--
ALTER TABLE `tbl_contacts`
  ADD CONSTRAINT `tbl_contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`User_id`) ON DELETE CASCADE;

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
-- Constraints for table `tbl_saved_jobs`
--
ALTER TABLE `tbl_saved_jobs`
  ADD CONSTRAINT `tbl_saved_jobs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_users` (`User_id`),
  ADD CONSTRAINT `tbl_saved_jobs_ibfk_2` FOREIGN KEY (`job_id`) REFERENCES `tbl_jobs` (`Job_id`);

--
-- Constraints for table `tbl_users_membership`
--
ALTER TABLE `tbl_users_membership`
  ADD CONSTRAINT `tbl_users_membership_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `tbl_users` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
