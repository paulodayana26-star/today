-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2026 at 11:34 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job_application`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `gender` enum('male','female','other') NOT NULL,
  `reg_date` date NOT NULL,
  `marital_status` enum('single','married','other') NOT NULL,
  `experience` text DEFAULT NULL,
  `terms` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `gender`, `reg_date`, `marital_status`, `experience`, `terms`) VALUES
(1, 'John Doe', 'male', '2026-10-01', 'married', '5 years of experience in software development.', 1),
(2, 'Jane Smith', 'female', '2026-09-15', 'single', '3 years as a graphic designer.', 1),
(3, 'Michael Johnson', 'male', '2026-08-22', 'single', '2 years in digital marketing.', 1),
(4, 'Emily Davis', 'female', '2026-07-30', 'married', '7 years in project management.', 1),
(5, 'David Brown', 'male', '2026-06-11', 'other', 'Freelance web developer for 4 years.', 1),
(6, 'Sarah Wilson', 'female', '2026-05-05', 'married', 'HR specialist with 6 years of experience.', 1),
(7, 'James Taylor', 'male', '2026-04-18', 'single', 'Junior PHP developer, 1 year experience.', 1),
(8, 'Linda Anderson', 'female', '2026-03-27', 'other', 'Data analyst with 5 years in fintech.', 1),
(9, 'Robert Thomas', 'male', '2026-02-14', 'married', 'Network administrator, 8 years experience.', 1),
(10, 'Patricia Moore', 'female', '2026-01-09', 'single', 'Content writer and SEO specialist, 3 years.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
