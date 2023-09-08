-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2023 at 09:35 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emercado`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` int(11) NOT NULL,
  `municipal` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `account_id`, `municipal`, `province`, `created_at`, `updated_at`, `deleted_at`) VALUES
(38, 86413, 'san francisco', 'Southern Leyte', '2023-06-09 18:36:04', '2023-06-09 18:36:04', NULL),
(39, 86417, 'sogod', 'Southern Leyte', '2023-06-09 18:37:47', '2023-06-09 18:37:47', NULL),
(41, 86410, 'padre burgos', 'Southern Leyte', '2023-06-09 19:53:45', '2023-06-09 19:53:45', NULL),
(42, 86407, 'maasin city', 'Southern Leyte', '2023-06-09 20:55:21', '2023-06-11 22:40:30', NULL),
(47, 86411, 'pintuyan', 'Southern Leyte', '2023-06-10 18:31:05', '2023-06-10 18:31:05', NULL),
(62, 0, '', 'Southern Leyte', NULL, NULL, NULL),
(64, 86405, 'libagon', 'Southern Leyte', '2023-06-13 17:27:33', '2023-06-13 17:27:33', NULL),
(65, 86415, 'san ricardo', 'Southern Leyte', '2023-06-13 17:32:41', '2023-06-13 17:32:41', NULL),
(66, 86402, 'bontoc', 'Southern Leyte', '2023-06-15 03:13:28', '2023-06-18 21:01:00', NULL),
(67, 86401, 'anahawan', 'Southern Leyte', '2023-06-15 21:50:22', '2023-06-15 21:50:22', NULL),
(68, 86409, 'malitbog', 'Southern Leyte', '2023-06-17 16:21:10', '2023-06-17 16:21:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `aid_received`
--

CREATE TABLE `aid_received` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `aid_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `aid_received`
--

INSERT INTO `aid_received` (`id`, `seller_id`, `aid_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-06-14 18:13:34', '2023-06-14 18:13:34'),
(2, 1, 2, '2023-06-14 18:13:34', '2023-06-14 18:13:34'),
(3, 2, 3, '2023-06-14 21:14:22', '2023-06-14 21:14:22'),
(4, 2, 1, '2023-06-14 21:14:22', '2023-06-14 21:14:22'),
(5, 2, 2, '2023-06-14 21:14:22', '2023-06-14 21:14:22');

-- --------------------------------------------------------

--
-- Table structure for table `farm_coordinates`
--

CREATE TABLE `farm_coordinates` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `longitude` decimal(10,4) NOT NULL,
  `latitude` decimal(10,4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farm_coordinates`
--

INSERT INTO `farm_coordinates` (`id`, `seller_id`, `longitude`, `latitude`, `created_at`, `updated_at`, `deleted_at`) VALUES
(7, 2, '10.4329', '124.9948', '2023-06-15 02:21:16', '2023-06-15 02:21:16', NULL),
(9, 1, '17.0913', '121.0106', '2023-06-15 02:57:18', '2023-06-15 02:57:18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aid_received`
--
ALTER TABLE `aid_received`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `farm_coordinates`
--
ALTER TABLE `farm_coordinates`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `aid_received`
--
ALTER TABLE `aid_received`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `farm_coordinates`
--
ALTER TABLE `farm_coordinates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
