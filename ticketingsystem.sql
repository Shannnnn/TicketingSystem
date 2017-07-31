-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 28, 2017 at 05:07 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticketingsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignees`
--

CREATE TABLE `assignees` (
  `id` int(10) UNSIGNED NOT NULL,
  `assignee` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assignees`
--

INSERT INTO `assignees` (`id`, `assignee`, `created_at`, `updated_at`) VALUES
(1, 'Technician 1', '2017-07-12 01:54:25', '2017-07-12 01:54:25');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` int(10) UNSIGNED NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch`, `branch_address`, `company_id`, `created_at`, `updated_at`) VALUES
(2, 'Davao', 'Davao City', 1, '2017-07-06 08:16:42', '2017-07-06 08:16:42'),
(3, 'Butuan', 'Butuan City', 1, '2017-07-06 08:18:58', '2017-07-06 08:18:58'),
(4, 'Galleria', 'Cebu City', 1, '2017-07-06 08:21:08', '2017-07-06 08:21:08'),
(5, 'Delgado', 'Iloilo City', 2, '2017-07-06 08:21:46', '2017-07-06 08:21:46'),
(6, 'Geege Mall', 'Ozamis City', 4, '2017-07-06 08:23:33', '2017-07-06 08:23:33'),
(7, 'Market-Market', 'Taguig, Metro Manila', 4, '2017-07-06 08:24:22', '2017-07-06 08:24:22'),
(8, 'Molino', 'Cavite', 5, '2017-07-06 17:03:17', '2017-07-06 17:03:17'),
(9, 'Bulacan', 'Bulacan', 5, '2017-07-06 17:04:53', '2017-07-06 17:04:53'),
(10, 'SM BF', 'Paranaque', 4, '2017-07-06 17:06:00', '2017-07-06 17:06:00'),
(11, 'SM Lazaro', 'Santa Cruz, Metro Manila City', 4, '2017-07-06 17:08:16', '2017-07-06 17:08:16'),
(12, 'Paranaque', 'Paranaque', 6, '2017-07-06 17:09:38', '2017-07-06 17:09:38'),
(13, 'San Jose', 'Antique', 7, '2017-07-06 17:12:41', '2017-07-06 17:12:41'),
(14, 'Bicutan', 'Bicutan', 5, '2017-07-06 17:14:14', '2017-07-06 17:14:14'),
(35, 'Sta. Cruz', 'Sta. Cruz, Manila', 10, '2017-07-07 00:55:59', '2017-07-07 00:55:59'),
(36, 'Cabanatuan', 'Nueva Ecija', 2, '2017-07-07 00:56:26', '2017-07-07 00:56:26'),
(38, 'Bicutan', 'Bicutan', 12, '2017-07-07 00:58:08', '2017-07-07 00:58:08'),
(39, 'SM Muntinlupa', 'Muntinlupa', 5, '2017-07-07 00:58:40', '2017-07-07 00:58:40'),
(40, 'Bataan', 'Bataan', 13, '2017-07-07 00:59:03', '2017-07-07 00:59:03'),
(41, 'Gen 3 Iloilo', 'Iloilo City', 7, '2017-07-07 01:03:43', '2017-07-07 01:03:43'),
(42, 'Sample', 'Sample', 14, '2017-07-09 21:57:50', '2017-07-09 21:57:50'),
(43, 'Sample', 'Sample', 15, '2017-07-09 21:59:05', '2017-07-09 21:59:05'),
(45, 'Cavite', 'Trece Martires, Cavite', 7, '2017-07-13 23:32:54', '2017-07-13 23:32:54'),
(47, 'Iligan', 'Iligan City', 16, '2017-07-18 20:23:15', '2017-07-18 20:23:15'),
(48, 'Iligan', 'Macapagal Ave, Iligan City, Lanao del Norte', 1, '2017-07-19 18:46:36', '2017-07-19 18:46:36'),
(49, 'Paul Bench Tower', '30th Street Corner Rizal Drive, Crescent Park Bonifacio Global City', 17, '2017-07-20 23:43:39', '2017-07-20 23:43:39'),
(50, 'Shan', 'Shan', 18, '2017-07-22 23:10:58', '2017-07-22 23:10:58'),
(51, 'Centrio Mall', 'Cagayan De Oro City', 19, '2017-07-25 06:56:45', '2017-07-25 06:56:45'),
(52, 'Cubao', '123 New York Street', 20, '2017-07-27 05:38:50', '2017-07-27 05:38:50'),
(53, 'Head Office', 'Libis Quezon City', 1, '2017-07-27 06:06:03', '2017-07-27 06:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand`, `created_at`, `updated_at`) VALUES
(1, 'Fine DVR', '2017-07-18 06:39:35', '2017-07-18 06:39:35'),
(2, 'Samsung', '2017-07-19 22:08:57', '2017-07-19 22:08:57'),
(3, 'Hupervision', '2017-07-19 22:09:10', '2017-07-19 22:09:10'),
(4, 'ACTIVA', '2017-07-23 18:52:21', '2017-07-23 18:52:21'),
(5, 'Amersec', '2017-07-23 18:52:28', '2017-07-23 18:52:28'),
(6, 'ASONI', '2017-07-23 18:52:38', '2017-07-23 18:52:38'),
(7, 'Biobio', '2017-07-23 18:52:48', '2017-07-23 18:52:48'),
(8, 'D-link', '2017-07-23 18:52:55', '2017-07-23 18:52:55'),
(9, 'EATON', '2017-07-23 18:53:06', '2017-07-23 18:53:06'),
(10, 'Fine Camera', '2017-07-23 18:53:15', '2017-07-23 18:53:15'),
(11, 'Geovision', '2017-07-23 18:53:30', '2017-07-23 18:53:30'),
(13, 'Omniview', '2017-07-23 18:53:55', '2017-07-23 18:53:55'),
(14, 'Smart Blazer', '2017-07-23 18:54:16', '2017-07-23 18:54:16'),
(15, 'Others', '2017-07-23 18:55:01', '2017-07-23 18:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `company_name`, `branch`, `address`, `created_at`, `updated_at`) VALUES
(6, 'Robinsons', 'Davao', 'Davao City', '2017-07-06 08:16:42', '2017-07-22 23:01:38'),
(9, 'SMDS', 'Delgado', 'Iloilo City', '2017-07-06 08:21:45', '2017-07-06 08:21:45'),
(10, 'Watsons', 'Geege Mall', 'Ozamis City', '2017-07-06 08:23:33', '2017-07-06 08:23:33'),
(11, 'Watsons', 'Market-Market', 'Taguig, Metro Manila', '2017-07-06 08:24:22', '2017-07-06 08:24:22'),
(12, 'SACI', 'Molino', 'Cavite', '2017-07-06 17:03:17', '2017-07-06 17:03:17'),
(13, 'SACI', 'Bulacan', 'Bulacan', '2017-07-06 17:04:53', '2017-07-06 17:04:53'),
(15, 'Watsons', 'SM Lazaro', 'Santa Cruz, Metro Manila City', '2017-07-06 17:08:16', '2017-07-06 17:08:16'),
(16, 'Planet Sports Warehouse', 'Paranaque', 'Paranaque', '2017-07-06 17:09:38', '2017-07-06 17:09:38'),
(17, 'Globe', 'San Jose', 'Antique', '2017-07-06 17:12:41', '2017-07-06 17:12:41'),
(18, 'SACI', 'Bicutan', 'Bicutan', '2017-07-06 17:14:14', '2017-07-06 23:13:27'),
(39, 'JT-Centrale', 'Sta. Cruz', 'Sta. Cruz, Manila', '2017-07-07 00:55:59', '2017-07-07 00:55:59'),
(40, 'SMDS', 'Cabanatuan', 'Nueva Ecija', '2017-07-07 00:56:26', '2017-07-07 00:56:26'),
(42, 'Bench Warehouse', 'Bicutan', 'Bicutan', '2017-07-07 00:58:07', '2017-07-07 00:58:07'),
(43, 'SACI', 'SM Muntinlupa', 'Muntinlupa', '2017-07-07 00:58:40', '2017-07-07 00:58:40'),
(44, 'Handyman', 'Bataan', 'Bataan', '2017-07-07 00:59:03', '2017-07-07 00:59:03'),
(45, 'Globe', 'Gen 3 Iloilo', 'Iloilo City', '2017-07-07 01:03:43', '2017-07-07 01:03:43'),
(47, 'Globe', 'Cavite', 'Trece Martires, Cavite', '2017-07-13 23:32:54', '2017-07-13 23:32:54'),
(51, 'Gaisano', 'Iligan', 'Iligan City', '2017-07-18 20:23:15', '2017-07-18 20:23:15'),
(52, 'Robinsons', 'Iligan', 'Macapagal Ave, Iligan City, Lanao del Norte', '2017-07-19 18:46:36', '2017-07-19 18:46:36'),
(53, 'Suyen Corporation', 'Paul Bench Tower', '30th Street Corner Rizal Drive, Crescent Park Bonifacio Global City', '2017-07-20 23:43:39', '2017-07-20 23:43:39'),
(55, 'Daiso', 'Centrio Mall', 'Cagayan De Oro City', '2017-07-25 06:56:45', '2017-07-25 06:56:45'),
(56, 'Bench Warehouse', 'Cubao', '123 New York Street', '2017-07-27 05:38:50', '2017-07-27 05:38:50'),
(57, 'Robinsons', 'Head Office', 'Libis Quezon City', '2017-07-27 06:06:03', '2017-07-27 06:06:03');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `ticket_id`, `user_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 8, 1, 'Hahaha', '2017-07-18 22:45:53', '2017-07-18 22:45:53'),
(2, 8, 1, 'Sample.', '2017-07-18 22:56:47', '2017-07-18 22:56:47'),
(3, 8, 2, 'Will go to site.', '2017-07-18 22:58:22', '2017-07-18 22:58:22'),
(4, 46, 1, 'Hello.', '2017-07-20 20:42:56', '2017-07-20 20:42:56'),
(8, 14, 1, 'Assigned new agent', '2017-07-20 21:14:40', '2017-07-20 21:14:40'),
(9, 14, 1, 'Assigned to new agent.', '2017-07-20 21:23:03', '2017-07-20 21:23:03'),
(10, 14, 1, 'This ticket is closed/resolved.', '2017-07-20 21:25:04', '2017-07-20 21:25:04'),
(11, 14, 1, 'This ticket is closed/resolved.', '2017-07-20 21:25:06', '2017-07-20 21:25:06'),
(12, 17, 1, 'This ticket is closed/resolved.', '2017-07-20 23:11:28', '2017-07-20 23:11:28'),
(13, 17, 1, 'Assigned to new agent.', '2017-07-20 23:11:34', '2017-07-20 23:11:34'),
(14, 17, 1, 'This ticket is closed/resolved.', '2017-07-20 23:14:14', '2017-07-20 23:14:14'),
(15, 18, 1, 'This ticket is closed/resolved.', '2017-07-21 00:45:13', '2017-07-21 00:45:13'),
(16, 20, 1, 'This ticket is closed/resolved.', '2017-07-21 01:24:19', '2017-07-21 01:24:19'),
(17, 21, 1, 'This ticket is closed/resolved.', '2017-07-21 01:28:41', '2017-07-21 01:28:41'),
(18, 33, 1, 'This ticket is closed/resolved.', '2017-07-21 01:49:50', '2017-07-21 01:49:50'),
(19, 22, 1, 'This ticket is closed/resolved.', '2017-07-21 01:52:32', '2017-07-21 01:52:32'),
(20, 22, 1, 'This ticket is closed/resolved.', '2017-07-21 01:52:33', '2017-07-21 01:52:33'),
(21, 34, 1, 'This ticket is closed/resolved.', '2017-07-21 01:53:16', '2017-07-21 01:53:16'),
(22, 35, 1, 'This ticket is closed/resolved.', '2017-07-21 02:03:22', '2017-07-21 02:03:22'),
(29, 40, 1, 'This ticket is closed/resolved.', '2017-07-22 01:34:16', '2017-07-22 01:34:16'),
(30, 41, 1, 'This ticket is closed/resolved.', '2017-07-22 01:40:24', '2017-07-22 01:40:24'),
(31, 54, 1, 'Urgent', '2017-07-23 19:00:33', '2017-07-23 19:00:33'),
(32, 33, 1, 'Hi', '2017-07-25 10:11:52', '2017-07-25 10:11:52'),
(33, 33, 1, 'Hi', '2017-07-25 10:12:35', '2017-07-25 10:12:35'),
(34, 33, 1, 'Sample', '2017-07-25 10:17:26', '2017-07-25 10:17:26'),
(35, 33, 1, 'Hello', '2017-07-25 10:23:34', '2017-07-25 10:23:34'),
(36, 33, 1, 'Hello', '2017-07-25 10:25:42', '2017-07-25 10:25:42'),
(37, 51, 1, 'Assigned to new agent.', '2017-07-25 13:21:24', '2017-07-25 13:21:24'),
(38, 51, 1, 'This ticket is closed/resolved.', '2017-07-25 13:55:19', '2017-07-25 13:55:19'),
(39, 52, 1, 'This ticket is closed/resolved.', '2017-07-25 13:58:06', '2017-07-25 13:58:06'),
(40, 53, 1, 'This ticket is closed/resolved.', '2017-07-25 13:59:44', '2017-07-25 13:59:44'),
(41, 54, 1, 'This ticket is closed/resolved.', '2017-07-25 14:01:50', '2017-07-25 14:01:50'),
(42, 55, 1, 'This ticket is closed/resolved.', '2017-07-25 14:02:52', '2017-07-25 14:02:52'),
(43, 58, 1, 'This ticket is closed/resolved.', '2017-07-25 14:04:01', '2017-07-25 14:04:01'),
(44, 56, 1, 'This ticket is closed/resolved.', '2017-07-26 00:43:16', '2017-07-26 00:43:16'),
(45, 66, 1, 'Hello', '2017-07-26 00:49:43', '2017-07-26 00:49:43'),
(46, 66, 1, 'Hello', '2017-07-26 00:50:55', '2017-07-26 00:50:55'),
(47, 66, 1, 'Hello', '2017-07-26 00:51:48', '2017-07-26 00:51:48'),
(48, 66, 1, 'This ticket is closed/resolved.', '2017-07-26 00:52:38', '2017-07-26 00:52:38'),
(49, 65, 1, 'This ticket is closed/resolved.', '2017-07-26 00:58:40', '2017-07-26 00:58:40'),
(50, 67, 1, 'Hi', '2017-07-27 02:22:24', '2017-07-27 02:22:24'),
(51, 67, 1, 'Hi', '2017-07-27 02:23:49', '2017-07-27 02:23:49'),
(52, 67, 1, 'Hi', '2017-07-27 02:24:50', '2017-07-27 02:24:50'),
(53, 67, 1, 'Hi', '2017-07-27 02:24:59', '2017-07-27 02:24:59'),
(54, 67, 1, 'Hi', '2017-07-27 02:50:40', '2017-07-27 02:50:40'),
(55, 67, 1, 'Hi', '2017-07-27 02:51:28', '2017-07-27 02:51:28'),
(56, 67, 1, 'Hi', '2017-07-27 02:52:34', '2017-07-27 02:52:34'),
(57, 67, 1, 'Hello', '2017-07-27 02:55:30', '2017-07-27 02:55:30'),
(58, 71, 1, 'Please update', '2017-07-27 03:06:14', '2017-07-27 03:06:14'),
(59, 75, 1, 'Service done', '2017-07-27 06:18:20', '2017-07-27 06:18:20');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `sortcompany` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `sortcompany`, `company`, `created_at`, `updated_at`) VALUES
(1, 'Robinsons', 'Robinsons', '2017-07-05 21:07:09', '2017-07-05 21:07:09'),
(2, 'SMDS', 'SMDS', '2017-07-05 21:07:25', '2017-07-05 21:07:25'),
(4, 'Watsons', 'Watsons', '2017-07-06 08:23:33', '2017-07-06 08:23:33'),
(5, 'SACI', 'SACI', '2017-07-06 17:03:17', '2017-07-06 17:03:17'),
(6, 'Planet Sports Warehouse', 'Planet Sports Warehouse', '2017-07-06 17:09:38', '2017-07-06 17:09:38'),
(7, 'Globe', 'Globe', '2017-07-06 17:12:41', '2017-07-06 17:12:41'),
(10, 'JT-Centrale', 'JT-Centrale', '2017-07-07 00:55:59', '2017-07-07 00:55:59'),
(13, 'Handyman', 'Handyman', '2017-07-07 00:59:03', '2017-07-07 00:59:03'),
(16, 'Gaisano', 'Gaisano', '2017-07-18 20:23:15', '2017-07-18 20:23:15'),
(17, 'Suyen Corporation', 'Suyen Corporation', '2017-07-20 23:43:39', '2017-07-20 23:43:39'),
(18, 'Shan', 'Shan', '2017-07-22 23:10:58', '2017-07-22 23:10:58'),
(19, 'Daiso', 'Daiso', '2017-07-25 06:56:45', '2017-07-25 06:56:45'),
(20, 'Bench Warehouse', 'Bench Warehouse', '2017-07-27 05:38:50', '2017-07-27 05:38:50');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` bigint(20) NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `contact_name`, `contact_number`, `email`, `label`, `client_id`, `created_at`, `updated_at`) VALUES
(3, 'Contact One', 11111, 'contact1@example.com', 'Store Manager', 6, '2017-07-06 08:18:34', '2017-07-22 23:01:39'),
(4, 'Benedict Cumberbatch', 11111, 'benedict@gmail.com', 'Store Manager', 18, '2017-07-06 17:27:10', '2017-07-06 17:27:10'),
(5, 'Robert Downey Jr', 90909, 'ironman@sample.com', 'Account Manager', 18, '2017-07-06 17:32:25', '2017-07-06 17:32:25'),
(6, 'Michael Jackson', 12345, 'beatit@sample.com', 'Technician', 18, '2017-07-06 17:37:35', '2017-07-06 17:37:35'),
(11, 'Tech One', 9353580459, 'techn@circuit-solutions.net', 'Technician', 17, '2017-07-07 00:49:08', '2017-07-07 00:49:08'),
(14, 'Maria', 9352331896, 'maria@example.com', 'Store Manager', 17, '2017-07-07 00:52:34', '2017-07-07 00:52:34'),
(15, 'Contact Zero', 7390, 'sample@test.com', 'Contact', 45, '2017-07-09 19:41:08', '2017-07-09 19:41:08'),
(16, 'Contact One', 91234567, 'contact1@sample.com', 'Store Manager', 46, '2017-07-12 19:16:15', '2017-07-12 19:16:15'),
(17, 'Contact Two', 911111111, 'contact2@example.com', 'Agent', 46, '2017-07-12 19:51:47', '2017-07-12 19:51:47'),
(18, 'Contact Three', 91234567, 'contact3@example.com', 'Account Manager', 46, '2017-07-12 19:53:26', '2017-07-12 19:53:26'),
(19, 'Sample Contact', 911111111, 'sample123@gmail.com', 'Store Manager', 44, '2017-07-12 19:55:28', '2017-07-12 19:55:28'),
(21, 'Seanne Canoy', 9353580459, 'sacanoy16@gmail.com', 'Sample', 51, '2017-07-18 20:23:16', '2017-07-18 20:23:16'),
(22, 'Robin Gallego', 9123456787, 'robin@sample.com', 'Store Manager', 51, '2017-07-18 20:23:16', '2017-07-18 20:23:16'),
(23, 'John', 912345678, 'john@example.com', 'Store Manager', 52, '2017-07-19 18:46:37', '2017-07-19 18:46:37'),
(24, 'Mary', 999999999, 'mary@example.com', 'Account Manager', 52, '2017-07-19 18:46:37', '2017-07-19 18:46:37'),
(25, 'Nina Mendoza', 9054995828, 'ninamendoza@example.com', 'Manager', 53, '2017-07-20 23:43:40', '2017-07-20 23:43:40'),
(26, 'Contact two', 22222, 'contact2@example.com', 'Account Manager', 6, '2017-07-22 23:01:38', '2017-07-22 23:01:38'),
(28, 'Seanne Canoy', 9353580459, 'sacanoy16@gmail.com', 'Store Manager', 55, '2017-07-25 06:56:45', '2017-07-25 06:56:45'),
(29, 'Shan Canoy', 9353535353, 'sacanoy16@yahoo.com', 'Account Manager', 55, '2017-07-25 06:56:46', '2017-07-25 06:56:46'),
(30, 'Shan Canoy', 9353580459, 'sacanoy16@gmail.com', 'Store Manager', 9, '2017-07-26 07:10:56', '2017-07-26 07:10:56'),
(31, 'Shan Canoy', 9353580459, 'sacanoy16@gmail.com', 'Store Manager', 10, '2017-07-26 07:11:21', '2017-07-26 07:11:21'),
(32, 'Shan Canoy', 9353580459, 'sacanoy16@gmail.com', 'Manager', 11, '2017-07-26 07:11:43', '2017-07-26 07:11:43'),
(33, 'Shan Canoy', 9353580459, 'sacanoy16@gmail.com', 'Manager', 12, '2017-07-26 07:12:05', '2017-07-26 07:12:05'),
(34, 'Shan Canoy', 9353580459, 'sacanoy16@gmail.com', 'Manager', 13, '2017-07-26 07:12:31', '2017-07-26 07:12:31'),
(35, 'Shan Canoy', 9353580459, 'sacanoy16@gmail.com', 'Manager', 15, '2017-07-26 07:13:00', '2017-07-26 07:13:00'),
(36, 'Shan', 9353580459, 'sacanoy16@gmail.com', 'Manager', 16, '2017-07-26 07:13:24', '2017-07-26 07:13:24'),
(37, 'Shan', 9353580459, 'sacanoy16@gmail.com', 'Manager', 47, '2017-07-26 07:14:12', '2017-07-26 07:14:12'),
(38, 'Shan', 12345, 'sacanoy16@gmail.com', 'Manager', 39, '2017-07-26 07:14:46', '2017-07-26 07:14:46'),
(39, 'Juan Dela Cruz', 55551234, 'fzcolina@circuit-solutions.net', 'Store Janitor', 56, '2017-07-27 05:38:50', '2017-07-27 05:38:50'),
(40, 'Uncle Sam', 12345555, 'rstan@circuit-solutions.net', 'Housekeeper', 56, '2017-07-27 05:46:32', '2017-07-27 05:46:32'),
(41, 'Juna Dela Cruz', 55551234, 'masaulo@circuit-solutions.net', 'Boss', 57, '2017-07-27 06:06:03', '2017-07-27 06:06:03'),
(42, 'Raizel Barnuevo', 12345678, 'rubarnuevo@circuit-solutions.net', 'SD', 57, '2017-07-27 06:06:04', '2017-07-27 06:06:04'),
(43, 'Aiza Balagbis', 9999999, 'ajbalagbis@circuit-solutions.net', 'Sexy', 57, '2017-07-27 06:06:04', '2017-07-27 06:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department`, `created_at`, `updated_at`) VALUES
(1, 'IT Department', '2017-07-12 01:33:21', '2017-07-12 01:33:21'),
(2, 'PreSales', '2017-07-12 01:33:54', '2017-07-12 01:33:54'),
(3, 'Technical', '2017-07-12 01:34:05', '2017-07-12 01:34:05'),
(4, 'Warehouse', '2017-07-12 01:34:14', '2017-07-12 01:34:14');

-- --------------------------------------------------------

--
-- Table structure for table `descriptions`
--

CREATE TABLE `descriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `descriptions`
--

INSERT INTO `descriptions` (`id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Configuration', '2017-07-16 01:52:21', '2017-07-16 01:52:21'),
(2, 'Defective Accessory*UPS', '2017-07-19 22:27:55', '2017-07-19 22:27:55'),
(3, 'Defective Accessory*PSU', '2017-07-19 22:28:08', '2017-07-19 22:28:08'),
(4, 'Defective Accessory*DVR', '2017-07-19 22:28:17', '2017-07-19 22:28:17'),
(5, 'Defective Unit*Camera', '2017-07-23 18:48:39', '2017-07-23 18:48:39'),
(6, 'Detection Issue', '2017-07-23 18:48:57', '2017-07-23 18:48:57'),
(7, 'Relocation', '2017-07-23 18:49:13', '2017-07-23 18:49:13'),
(8, 'Reinstallation', '2017-07-23 18:49:23', '2017-07-23 18:49:23'),
(9, 'Out of Commision', '2017-07-23 18:49:31', '2017-07-23 18:49:31'),
(10, 'Recording Issue', '2017-07-23 18:49:47', '2017-07-23 18:49:47'),
(11, 'Video Loss', '2017-07-23 18:49:54', '2017-07-23 18:49:54'),
(12, 'Video Loss*Connection Error', '2017-07-23 18:50:24', '2017-07-23 18:50:24'),
(14, 'Video Output Issue*Blurred Viewing', '2017-07-23 18:51:08', '2017-07-23 18:51:08'),
(15, 'Video Output Issue*Black and White Viewing', '2017-07-23 18:51:38', '2017-07-23 18:51:38'),
(16, 'Multiple Issues', '2017-07-23 18:51:56', '2017-07-23 18:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `help_topics`
--

CREATE TABLE `help_topics` (
  `id` int(10) UNSIGNED NOT NULL,
  `topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `help_topics`
--

INSERT INTO `help_topics` (`id`, `topic`, `created_at`, `updated_at`) VALUES
(1, 'Incident Report', '2017-07-12 00:04:44', '2017-07-12 00:04:44'),
(4, 'Request for Driver', '2017-07-12 01:26:37', '2017-07-12 01:26:37'),
(6, 'Service Desk Request', '2017-07-12 01:27:12', '2017-07-12 01:27:12');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(17, '2014_10_12_000000_create_users_table', 1),
(18, '2014_10_12_100000_create_password_resets_table', 1),
(19, '2017_07_02_120750_create_clients_table', 1),
(20, '2017_07_02_120912_create_companies_table', 1),
(21, '2017_07_02_120956_create_branches_table', 1),
(22, '2017_07_02_121044_create_contacts_table', 1),
(23, '2017_07_03_101736_create_permission_tables', 1),
(24, '2017_07_03_133525_create_posts_table', 1),
(27, '2017_07_12_021338_create_ticket_informations_table', 2),
(28, '2017_07_13_060338_create_products_table', 3),
(29, '2017_07_13_060451_create_brands_table', 3),
(30, '2017_07_13_061536_create_ticket_details_table', 4),
(37, '2017_07_14_064247_create_tickets_table', 6),
(38, '2017_07_16_151218_create_ticket_reports_table', 7),
(40, '2017_07_16_153942_create_tickets_table', 8),
(41, '2017_07_13_071813_create_ticket_reports_table', 9),
(42, '2016_07_02_160300_create_comments_table', 10),
(43, '2017_07_20_012549_create_tags_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sacanoy16@gmail.com', '$2y$10$l5Nfdc5rBIp9bZZmSXYpl.D/haxHC79MNYd.zRuwOwFxbJG6MtWeK', '2017-07-25 06:31:18');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administer roles & permissions', '2017-07-07 01:15:58', '2017-07-07 01:15:58'),
(2, 'Create client', '2017-07-07 01:24:19', '2017-07-07 01:24:19'),
(3, 'Create ticket', '2017-07-07 01:24:29', '2017-07-07 01:24:29'),
(4, 'View ticket', '2017-07-07 01:24:41', '2017-07-07 01:24:41'),
(5, 'Assign ticket', '2017-07-07 01:24:51', '2017-07-07 01:24:51');
-- --------------------------------------------------------

--
-- Table structure for table `priorities`
--

CREATE TABLE `priorities` (
  `id` int(10) UNSIGNED NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `priorities`
--

INSERT INTO `priorities` (`id`, `priority`, `created_at`, `updated_at`) VALUES
(1, 'Normal', '2017-07-18 17:24:12', '2017-07-18 17:24:12'),
(2, 'Low', '2017-07-18 17:24:18', '2017-07-18 17:24:18'),
(3, 'High', '2017-07-18 17:24:24', '2017-07-18 17:24:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `sortproduct` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `sortproduct`, `product`, `created_at`, `updated_at`) VALUES
(1, 'CCTV', 'CCTV', '2017-07-12 23:52:35', '2017-07-12 23:52:35'),
(7, 'EAS', 'EAS', '2017-07-23 18:41:41', '2017-07-23 18:41:41'),
(9, 'LibSys', 'LibSys', '2017-07-23 18:42:05', '2017-07-23 18:42:05'),
(10, 'MLS*Maelisa', 'MLS*Maelisa', '2017-07-23 18:42:22', '2017-07-23 18:42:22'),
(11, 'DPS', 'DPS', '2017-07-23 18:44:50', '2017-07-23 18:44:50'),
(12, 'ACS/BIO', 'ACS/BIO', '2017-07-23 18:44:57', '2017-07-23 18:44:57'),
(13, 'Panic Alarm', 'Panic Alarm', '2017-07-23 18:45:14', '2017-07-23 18:45:14'),
(14, 'Solar', 'Solar', '2017-07-23 18:45:21', '2017-07-23 18:45:21');

-- --------------------------------------------------------

--
-- Table structure for table `product_summaries`
--

CREATE TABLE `product_summaries` (
  `id` int(10) UNSIGNED NOT NULL,
  `summary` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `remarks`
--

CREATE TABLE `remarks` (
  `id` int(10) UNSIGNED NOT NULL,
  `remark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', '2017-07-07 01:16:09', '2017-07-07 01:16:09'),
(2, 'Agent', '2017-07-07 01:25:31', '2017-07-07 01:25:31'),
(3, 'Guest', '2017-07-07 01:25:44', '2017-07-20 17:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 2),
(4, 2),
(4, 3),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sla_plans`
--

CREATE TABLE `sla_plans` (
  `id` int(10) UNSIGNED NOT NULL,
  `sla_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sla_plans`
--

INSERT INTO `sla_plans` (`id`, `sla_plan`, `created_at`, `updated_at`) VALUES
(1, 'Field Support - NCR (No Warranty) (72 hours - Active)', '2017-07-12 21:11:43', '2017-07-12 21:11:43'),
(2, 'Field Support - NCR (Warranty) (24 hours - Active)', '2017-07-12 21:12:19', '2017-07-12 21:12:19'),
(3, 'Field Support - PROV (No Warranty) (120 hours - Active)', '2017-07-12 21:12:42', '2017-07-12 21:12:42'),
(4, 'Field Support - PROV (Warranty) (74 hours - Active)', '2017-07-12 21:12:55', '2017-07-12 21:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `tag` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `ticket_id`, `tag`, `created_at`, `updated_at`) VALUES
(3, 17, 'CCTV*DVR', '2017-07-19 21:46:35', '2017-07-19 21:46:35'),
(4, 21, 'CCTV*DVR', '2017-07-19 22:29:29', '2017-07-19 22:29:29'),
(5, 22, 'Defective Accessory*DVR', '2017-07-19 22:32:32', '2017-07-19 22:32:32'),
(6, 24, 'Configuration', '2017-07-19 23:40:59', '2017-07-19 23:40:59'),
(7, 25, 'Configuration', '2017-07-19 23:42:36', '2017-07-19 23:42:36'),
(8, 26, 'Configuration', '2017-07-19 23:46:18', '2017-07-19 23:46:18'),
(9, 27, 'Configuration', '2017-07-19 23:47:22', '2017-07-19 23:47:22'),
(10, 28, 'Configuration', '2017-07-19 23:49:26', '2017-07-19 23:49:26'),
(11, 29, 'Configuration', '2017-07-19 23:54:32', '2017-07-19 23:54:32'),
(12, 30, 'Configuration', '2017-07-20 00:02:39', '2017-07-20 00:02:39'),
(13, 31, 'Configuration', '2017-07-20 00:06:58', '2017-07-20 00:06:58'),
(14, 32, 'Defective Accessory*DVR', '2017-07-20 00:54:42', '2017-07-20 00:54:42'),
(15, 33, 'Defective Accessory*DVR', '2017-07-20 01:05:18', '2017-07-20 01:05:18'),
(26, 47, 'CCTV', '2017-07-20 23:49:57', '2017-07-20 23:49:57'),
(27, 48, 'Defective Accessory*PSU', '2017-07-22 01:50:53', '2017-07-22 01:50:53'),
(28, 49, 'Defective Accessory*DVR', '2017-07-22 01:52:04', '2017-07-22 01:52:04'),
(29, 50, 'Defective Accessory*DVR', '2017-07-22 01:54:11', '2017-07-22 01:54:11'),
(30, 51, 'Defective Accessory*DVR', '2017-07-22 01:57:29', '2017-07-22 01:57:29'),
(31, 52, 'Defective Accessory*PSU', '2017-07-22 02:48:38', '2017-07-22 02:48:38'),
(32, 53, 'Configuration', '2017-07-22 02:53:24', '2017-07-22 02:53:24'),
(33, 53, 'Defective Accessory*DVR', '2017-07-22 02:53:24', '2017-07-22 02:53:24'),
(34, 53, 'Defective Accessory*PSU', '2017-07-22 02:53:24', '2017-07-22 02:53:24'),
(35, 54, 'Defective Unit*Camera', '2017-07-23 18:57:37', '2017-07-23 18:57:37'),
(36, 54, 'CCTV', '2017-07-23 18:57:37', '2017-07-23 18:57:37'),
(37, 55, 'Detection Issue', '2017-07-23 19:53:46', '2017-07-23 19:53:46'),
(38, 55, 'ACS/BIO', '2017-07-23 19:53:46', '2017-07-23 19:53:46'),
(39, 56, 'Configuration', '2017-07-24 02:24:51', '2017-07-24 02:24:51'),
(40, 56, 'Defective Accessory*DVR', '2017-07-24 02:24:51', '2017-07-24 02:24:51'),
(41, 57, 'EAS', '2017-07-24 17:26:56', '2017-07-24 17:26:56'),
(42, 58, 'Configuration', '2017-07-25 03:49:09', '2017-07-25 03:49:09'),
(43, 59, 'Reinstallation', '2017-07-25 07:14:00', '2017-07-25 07:14:00'),
(44, 59, 'ACS/BIO', '2017-07-25 07:14:00', '2017-07-25 07:14:00'),
(45, 60, 'Reinstallation', '2017-07-25 07:16:31', '2017-07-25 07:16:31'),
(46, 60, 'ACS/BIO', '2017-07-25 07:16:31', '2017-07-25 07:16:31'),
(47, 61, 'Configuration', '2017-07-25 07:19:22', '2017-07-25 07:19:22'),
(48, 61, 'ACS/BIO', '2017-07-25 07:19:22', '2017-07-25 07:19:22'),
(49, 62, 'Configuration', '2017-07-25 08:30:12', '2017-07-25 08:30:12'),
(50, 62, 'ACS/BIO', '2017-07-25 08:30:12', '2017-07-25 08:30:12'),
(51, 63, 'Configuration', '2017-07-25 08:45:37', '2017-07-25 08:45:37'),
(52, 63, 'ACS/BIO', '2017-07-25 08:45:37', '2017-07-25 08:45:37'),
(53, 64, 'Configuration', '2017-07-25 08:50:09', '2017-07-25 08:50:09'),
(54, 64, 'ACS/BIO', '2017-07-25 08:50:09', '2017-07-25 08:50:09'),
(55, 65, 'Configuration', '2017-07-25 09:57:11', '2017-07-25 09:57:11'),
(56, 65, 'ACS/BIO', '2017-07-25 09:57:11', '2017-07-25 09:57:11'),
(57, 66, 'Configuration', '2017-07-26 00:46:09', '2017-07-26 00:46:09'),
(58, 66, 'Defective Accessory*DVR', '2017-07-26 00:46:09', '2017-07-26 00:46:09'),
(59, 67, 'Configuration', '2017-07-26 07:49:35', '2017-07-26 07:49:35'),
(60, 67, 'Defective Accessory*DVR', '2017-07-26 07:49:35', '2017-07-26 07:49:35'),
(61, 68, 'Configuration', '2017-07-27 02:16:19', '2017-07-27 02:16:19'),
(62, 68, 'Defective Accessory*DVR', '2017-07-27 02:16:19', '2017-07-27 02:16:19'),
(63, 69, 'Configuration', '2017-07-27 02:58:28', '2017-07-27 02:58:28'),
(64, 69, 'Defective Accessory*DVR', '2017-07-27 02:58:28', '2017-07-27 02:58:28'),
(65, 70, 'Configuration', '2017-07-27 02:59:27', '2017-07-27 02:59:27'),
(66, 70, 'Defective Accessory*DVR', '2017-07-27 02:59:27', '2017-07-27 02:59:27'),
(67, 71, 'Configuration', '2017-07-27 03:01:45', '2017-07-27 03:01:45'),
(68, 71, 'Defective Accessory*DVR', '2017-07-27 03:01:45', '2017-07-27 03:01:45'),
(69, 72, 'Configuration', '2017-07-27 05:43:34', '2017-07-27 05:43:34'),
(70, 72, 'Defective Accessory*PSU', '2017-07-27 05:43:34', '2017-07-27 05:43:34'),
(71, 73, 'Configuration', '2017-07-27 05:44:42', '2017-07-27 05:44:42'),
(72, 73, 'Defective Accessory*PSU', '2017-07-27 05:44:42', '2017-07-27 05:44:42'),
(73, 74, 'Configuration', '2017-07-27 05:48:41', '2017-07-27 05:48:41'),
(74, 74, 'Defective Accessory*DVR', '2017-07-27 05:48:41', '2017-07-27 05:48:41'),
(75, 75, 'Configuration', '2017-07-27 06:12:56', '2017-07-27 06:12:56'),
(76, 75, 'Defective Accessory*DVR', '2017-07-27 06:12:56', '2017-07-27 06:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(10) UNSIGNED NOT NULL,
  `assigned_to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `help_topic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand` varchar(216) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ticket_source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_summary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sla_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `ticket_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warranty` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `turn_over_date` date NOT NULL,
  `scheduled_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `assigned_to`, `department`, `help_topic`, `priority`, `product`, `brand`, `ticket_source`, `description`, `product_summary`, `sla_plan`, `remarks`, `client_id`, `user_id`, `ticket_status`, `warranty`, `scheduled_date`, `turn_over_date`, `created_at`, `updated_at`) VALUES
(13, 'Agent One', 'Technical', 'Incident Report', 'Normal', 'CCTV', 'Fine DVR', 'Email', 'Configuration', 'CCTV not working.', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'Please plot schedule.', 52, 1, 'Closed', 'Yes', '2017-07-20', '2017-07-20', NULL, '2017-07-19 18:49:53', '2017-07-19 21:18:16'),
(19, 'Agent One', 'Technical', 'Incident Report', 'Normal', 'CCTV', 'Hupervision', 'Email', 'Configuration', 'Configuration', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Configuration', 45, 1, 'Closed', 'Yes', '2017-07-20', '2017-07-20', NULL, '2017-07-19 22:16:11', '2017-07-19 22:16:45'),
(20, 'Agent One', 'Technical', 'Incident Report', 'Normal', 'CCTV', 'Samsung', 'Email', 'Configuration', 'CCTV', 'Field Support - NCR (Warranty) (24 hours - Active)', 'CCTV', 18, 1, 'Closed', 'Yes', '2017-07-20', '2017-07-20', NULL, '2017-07-19 22:23:33', '2017-07-21 01:24:19'),
(22, 'Agent One', 'IT Department', 'Incident Report', 'Normal', 'CCTV', 'Samsung', 'Email', 'Configuration', 'Sample', 'Field Support - NCR (Warranty) (24 hours - Active)', 'Sample', 16, 1, 'Closed', 'Yes', '2017-07-20', '2017-07-20', NULL, '2017-07-19 22:32:32', '2017-07-21 01:52:32'),
(47, 'James', 'Technical', 'Incident Report', 'Normal', 'CCTV', 'Hupervision', 'Email', 'Configuration', 'CCTV Configuration.', 'Field Support - NCR (Warranty) (24 hours - Active)', 'For Schedule Plotting.', 53, 1, 'Open', 'Yes', '2017-07-21', '2017-07-21', NULL, '2017-07-20 23:49:57', '2017-07-20 23:49:57'),
(51, 'James', 'IT Department', 'Incident Report', 'High', 'CCTV', 'Fine DVR', 'Email', 'Configuration', 'jshkdajhd', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'jsldjalsdjaskl', 45, 1, 'Closed', 'Yes', '2017-07-22', '2017-07-22', NULL, '2017-07-22 01:57:29', '2017-07-25 13:55:18'),
(52, 'Agent One', 'IT Department', 'Incident Report', 'High', 'CCTV', 'Fine DVR', 'Email', 'Configuration', 'dsd', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'dsf', 39, 1, 'Closed', 'Yes', '2017-07-22', '2017-07-22', NULL, '2017-07-22 02:48:38', '2017-07-25 13:58:06'),
(53, 'Agent One', 'IT Department', 'Incident Report', 'High', 'CCTV', 'Fine DVR', 'Email', 'Configuration', 'Gwapa si Shan', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'Gwapa si Shan', 16, 1, 'Closed', 'Yes', '2017-07-22', '2017-07-22', NULL, '2017-07-22 02:53:24', '2017-07-25 13:59:44'),
(54, 'James', 'Technical', 'Incident Report', 'High', 'CCTV', 'Fine Camera', 'Email', 'Defective Unit*Camera', 'Defective Camera, replaceable.', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Please plot schedule.', 51, 1, 'Closed', 'Yes', '2017-07-24', '2017-07-24', NULL, '2017-07-23 18:57:37', '2017-07-25 14:01:50'),
(55, 'James', 'Technical', 'Incident Report', 'High', 'ACS/BIO', 'Fine Camera', 'Email', 'Detection Issue', 'Biometric cannot detect.', 'Field Support - PROV (No Warranty) (120 hours - Active)', 'Hello', 51, 1, 'Closed', 'No', '2017-09-16', '2017-09-15', NULL, '2017-07-23 19:53:46', '2017-07-25 14:02:52'),
(56, 'Agent One', 'IT Department', 'Incident Report', 'High', 'ACS/BIO', 'ACTIVA', 'Email', 'Configuration', 'hey', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'hey', 39, 1, 'Closed', 'Yes', '2017-07-24', '2017-07-24', NULL, '2017-07-24 02:24:51', '2017-07-26 00:43:16'),
(57, 'James', 'Technical', 'Incident Report', 'Normal', 'EAS', 'Hupervision', 'Email', 'Multiple Issues', 'Multiple', 'Field Support - PROV (No Warranty) (120 hours - Active)', 'Sample', 44, 1, 'Open', 'No', '2017-07-25', '2017-07-25', NULL, '2017-07-24 17:26:56', '2017-07-24 17:26:56'),
(58, 'James', 'Technical', 'Incident Report', 'Normal', 'EAS', 'Hupervision', 'Email', 'Configuration', 'Configuration', 'Field Support - PROV (Warranty) (74 hours - Active)', 'For Schedule Plotting.', 51, 1, 'Closed', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 03:49:09', '2017-07-25 14:04:01'),
(59, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Reinstallation', 'Reinstallation of biometric', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Hello', 55, 1, 'Open', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 07:14:00', '2017-07-25 07:14:00'),
(60, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Reinstallation', 'Reinstallation of biometric', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Hello', 55, 1, 'Open', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 07:16:30', '2017-07-25 07:16:30'),
(61, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Configuration', 'Config', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Plot Schedule', 55, 1, 'Open', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 07:19:21', '2017-07-25 07:19:21'),
(62, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Configuration', 'Config', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Plot Schedule', 55, 1, 'Open', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 08:30:11', '2017-07-25 08:30:11'),
(63, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Configuration', 'Config', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Plot Schedule', 55, 1, 'Open', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 08:45:37', '2017-07-25 08:45:37'),
(64, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Configuration', 'Config', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Plot Schedule', 55, 1, 'Open', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 08:50:09', '2017-07-25 08:50:09'),
(65, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'Biobio', 'Email', 'Configuration', 'Config', 'Field Support - PROV (Warranty) (74 hours - Active)', 'Plot Schedule', 55, 1, 'Closed', 'Yes', '2017-07-25', '2017-07-25', NULL, '2017-07-25 09:57:11', '2017-07-26 00:58:39'),
(66, 'Agent One', 'IT Department', 'Incident Report', 'High', 'ACS/BIO', 'ACTIVA', 'Email', 'Configuration', 'Hello', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'Hello', 51, 1, 'Closed', 'Yes', '2017-07-26', '2017-07-26', NULL, '2017-07-26 00:46:09', '2017-07-26 00:52:37'),
(67, 'Agent One', 'IT Department', 'Incident Report', 'High', 'ACS/BIO', 'ACTIVA', 'Email', 'Configuration', 'Sample', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'Sample', 55, 1, 'Open', 'Yes', '2017-07-27', '2017-07-26', NULL, '2017-07-26 07:49:35', '2017-07-26 07:49:35'),
(68, 'Agent One', 'IT Department', 'Incident Report', 'Normal', 'ACS/BIO', 'ACTIVA', 'Email', 'Configuration', 'Sample', 'Field Support - NCR (No Warranty) (72 hours - Active)', 'Sample', 55, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 02:16:19', '2017-07-27 02:16:19'),
(69, 'James', 'Technical', 'Incident Report', 'Normal', 'EAS', 'ACTIVA', 'Email', 'Configuration', 'EAS', 'Field Support - PROV (Warranty) (74 hours - Active)', 'EAS', 55, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 02:58:28', '2017-07-27 02:58:28'),
(70, 'James', 'Technical', 'Incident Report', 'Normal', 'EAS', 'ACTIVA', 'Email', 'Configuration', 'EAS', 'Field Support - PROV (Warranty) (74 hours - Active)', 'EAS', 55, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 02:59:27', '2017-07-27 02:59:27'),
(71, 'James', 'Technical', 'Incident Report', 'Normal', 'EAS', 'ACTIVA', 'Email', 'Configuration', 'EAS', 'Field Support - PROV (Warranty) (74 hours - Active)', 'EAS', 55, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 03:01:45', '2017-07-27 03:01:45'),
(72, 'James', 'Technical', 'Incident Report', 'High', 'ACS/BIO', 'ACTIVA', 'Phone', 'Configuration', 'Sira ang aking CCTV', 'Field Support - NCR (Warranty) (24 hours - Active)', 'ASAP', 56, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 05:43:34', '2017-07-27 05:43:34'),
(73, 'James', 'Technical', 'Incident Report', 'High', 'ACS/BIO', 'ACTIVA', 'Phone', 'Configuration', 'Sira ang aking CCTV', 'Field Support - NCR (Warranty) (24 hours - Active)', 'ASAP', 56, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 05:44:42', '2017-07-27 05:44:42'),
(74, 'Agent One', 'Technical', 'Incident Report', 'High', 'CCTV', 'ACTIVA', 'Email', 'Defective Accessory*DVR', 'No power', 'Field Support - NCR (Warranty) (24 hours - Active)', 'ASAP', 56, 2, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 05:48:41', '2017-07-27 05:48:41'),
(75, 'James', 'Technical', 'Incident Report', 'Normal', 'ACS/BIO', 'ACTIVA', 'Phone', 'Configuration', 'CCTV no power.', 'Field Support - NCR (Warranty) (24 hours - Active)', 'Sample', 57, 1, 'Open', 'Yes', '2017-07-27', '2017-07-27', NULL, '2017-07-27 06:12:55', '2017-07-27 06:12:55');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_sources`
--

CREATE TABLE `ticket_sources` (
  `id` int(10) UNSIGNED NOT NULL,
  `source` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ticket_sources`
--

INSERT INTO `ticket_sources` (`id`, `source`, `created_at`, `updated_at`) VALUES
(1, 'Phone', '2017-07-11 22:03:05', '2017-07-11 22:03:05'),
(2, 'Email', '2017-07-11 22:05:25', '2017-07-11 22:05:25');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_statuses`
--

CREATE TABLE `ticket_statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Seanne Canoy', 'sacanoy16@gmail.com', '$2y$10$KXZOnc0TD/Pq2i1eohSqoOFRtQ8JFJAn6afnamW/aT4eW7/w3nt86', '62wutw42LxBuJlBbi34yKKDyhWKhlszhEp9ZgRlOc8fiV3p60leDVrBqMMN5', '2017-07-07 01:14:57', '2017-07-07 01:16:32'),
(2, 'Agent One', 'agent1@example.com', '$2y$10$bBCX1VqiBBLAf39SOqssaOuW3Mzzw00hn0xwPNZKFlxKWfq27hC.q', 'EKBTXUDSfZstsqnWP2PFbjk1BF5tvK78cF3GQetjGkNX7jy02evQNPZE7Int', '2017-07-07 01:26:20', '2017-07-07 01:26:20'),
(3, 'Robert', 'robert@example.com', '$2y$10$ObiDNQdA8qN.E41QGDzliORqqsEUwlXYrr2O7HHQHsXDosuwXNk9y', NULL, '2017-07-20 17:12:11', '2017-07-20 17:12:11'),
(4, 'James', 'james@example.com', '$2y$10$MgA7LW.HSTJBEcGwShtb7O17iI7FUPyPGYygQh/mGozm5Ym2FK9qq', NULL, '2017-07-20 17:12:36', '2017-07-20 17:12:36'),
(7, 'Guest One', 'guest1@example.com', '$2y$10$wDqnL2UHp4cj.ifbiKG89OhyzTLXJVygY1YcNKTj0w8LVkZmwJFkG', 'IutWyU95aYKqZxEZ1vmqixfFiHnkC7PuQtkN8Ym0zNrsPNMnd3Jp9OFQlpH5', '2017-07-28 01:44:24', '2017-07-28 01:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_permissions`
--

CREATE TABLE `user_has_permissions` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `permission_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `user_id`) VALUES
(1, 1),
(2, 2),
(2, 3),
(2, 4),
(3, 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignees`
--
ALTER TABLE `assignees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `descriptions`
--
ALTER TABLE `descriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `help_topics`
--
ALTER TABLE `help_topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `priorities`
--
ALTER TABLE `priorities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_summaries`
--
ALTER TABLE `product_summaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `remarks`
--
ALTER TABLE `remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `sla_plans`
--
ALTER TABLE `sla_plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_sources`
--
ALTER TABLE `ticket_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD PRIMARY KEY (`user_id`,`permission_id`),
  ADD KEY `user_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `user_has_roles_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignees`
--
ALTER TABLE `assignees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `descriptions`
--
ALTER TABLE `descriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `help_topics`
--
ALTER TABLE `help_topics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `priorities`
--
ALTER TABLE `priorities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `product_summaries`
--
ALTER TABLE `product_summaries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `remarks`
--
ALTER TABLE `remarks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sla_plans`
--
ALTER TABLE `sla_plans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `ticket_sources`
--
ALTER TABLE `ticket_sources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ticket_statuses`
--
ALTER TABLE `ticket_statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_permissions`
--
ALTER TABLE `user_has_permissions`
  ADD CONSTRAINT `user_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_permissions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
