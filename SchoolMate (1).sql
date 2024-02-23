-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 22, 2024 at 05:23 PM
-- Server version: 8.0.36-0ubuntu0.22.04.1
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `SchoolMate`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `updated_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES
(1, 'student', 'mira', '2024-02-22 11:24:56', '', NULL),
(2, 'teacher', '', '2024-02-22 11:24:56', '', NULL),
(3, 'student', '', '2024-02-22 11:24:56', '', NULL),
(4, 'principle', '', '2024-02-22 11:24:56', '', NULL),
(6, 'student', 'khushi', '2024-02-22 11:25:24', '', NULL),
(7, 'principle', '', '2024-02-22 11:26:39', '', NULL),
(8, 'student', 'mira@gmail.com', '2024-02-22 11:53:14', '', NULL),
(9, 'employee', 'mira@gmail.com', '2024-02-22 14:33:03', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `role_id` int NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(16) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phone` bigint NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `profile_img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `created_by` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `created_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` varchar(255) DEFAULT NULL,
  `updated_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email`, `password`, `first_name`, `last_name`, `dob`, `gender`, `phone`, `blood_group`, `address`, `city`, `profile_img`, `status`, `created_by`, `created_dt`, `updated_by`, `updated_dt`) VALUES
(1, 1, 'mira@gmail.com', '12345678', 'Miral', 'Chauhan', '2002-12-01', 'Female', 1234567890, 'O+', 'Ahmedabad', 'Ahmedabad', 'dist/img/avtar.png', 1, '', '2024-02-22 11:58:06', NULL, '2024-02-22 12:29:05'),
(2, 3, 'manan@manan.com', '12345678', 'Manan', 'Vadher', '2002-12-24', 'male', 0, 'B+', 'surat', 'surat', 'manan.png', 1, '', '2024-02-22 11:58:06', NULL, '2024-02-22 12:29:05'),
(3, 1, 'm@m.c', '12345678', 'm', 'v', '2024-02-15', 'male', 9999999999, 'B+', 's', 's', 'Null', 1, 'manan@manan.com', '2024-02-22 11:59:41', '0', '2024-02-22 12:29:05'),
(4, 1, 'k@k.com', '12345678', 'k', 'k', '2024-02-09', 'female', 9785236412, 'B+', 'a', 'a', 'Null', 1, 'manan@manan.com', '2024-02-22 12:21:47', '0', '2024-02-22 12:29:05'),
(5, 1, 'k@ka.com', '12345678', 'k', 'v', '2024-02-14', 'female', 9785236412, 'B+', 's', 'a', 'Null', 1, 'manan@manan.com', '2024-02-22 12:22:26', '0', '2024-02-22 12:29:05'),
(6, 1, 'test@gmail.com', '11111111', 'test', 'test', '2017-02-14', 'male', 1234567890, 'A+', 'wxds', 'dedweqw', 'Null', 1, 'mira@gmail.com', '2024-02-22 14:35:27', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
