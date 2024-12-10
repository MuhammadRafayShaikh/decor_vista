-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2024 at 08:35 PM
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
-- Database: `my_dbbb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `special_requests` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `designer_id`, `category_id`, `time_id`, `address`, `status`, `special_requests`, `created_at`, `updated_at`) VALUES
(13, 19, 19, 5, 16, 'xyz', 1, 'xyz', '2024-12-02 08:20:38', '2024-12-02 13:31:55'),
(25, 21, 19, 5, 28, 'xyz', 1, 'xyz', '2024-12-03 13:29:58', '2024-12-03 13:30:16');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('3b5b2e4f8bcb474ee497221dc508f21e', 'i:2;', 1730716453),
('3b5b2e4f8bcb474ee497221dc508f21e:timer', 'i:1730716453;', 1730716453),
('41ca8fff01351b5039c6a2bee076b032', 'i:1;', 1730697787),
('41ca8fff01351b5039c6a2bee076b032:timer', 'i:1730697787;', 1730697787),
('7bc6025f25d009611895004c279ab1c3', 'i:1;', 1730697712),
('7bc6025f25d009611895004c279ab1c3:timer', 'i:1730697711;', 1730697712),
('7d24f1534e2152c8f8eadc496aac9319', 'i:3;', 1730657356),
('7d24f1534e2152c8f8eadc496aac9319:timer', 'i:1730657356;', 1730657356),
('919408d45035de85ecfe663f04fd3857', 'i:1;', 1730717802),
('919408d45035de85ecfe663f04fd3857:timer', 'i:1730717802;', 1730717802),
('admin@gamil.com|127.0.0.1', 'i:3;', 1730657356),
('admin@gamil.com|127.0.0.1:timer', 'i:1730657356;', 1730657356),
('b2bed9ef4308b01d213af23039bc237c', 'i:1;', 1730695164),
('b2bed9ef4308b01d213af23039bc237c:timer', 'i:1730695164;', 1730695164),
('b45ceb70babcb1c74d391378998cd583', 'i:1;', 1730713788),
('b45ceb70babcb1c74d391378998cd583:timer', 'i:1730713788;', 1730713788),
('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1730718288),
('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1730718288;', 1730718288),
('d45bd95c38cf657b2769a0d69fecd94c', 'i:1;', 1730699692),
('d45bd95c38cf657b2769a0d69fecd94c:timer', 'i:1730699692;', 1730699692),
('d7fcc13ab4a80cddf2e23869fe1c1e8b', 'i:1;', 1730699344),
('d7fcc13ab4a80cddf2e23869fe1c1e8b:timer', 'i:1730699344;', 1730699344),
('d998fb8cfb62bf04d01b25702e6d9af8', 'i:1;', 1730705817),
('d998fb8cfb62bf04d01b25702e6d9af8:timer', 'i:1730705817;', 1730705817),
('designerasnain@gmail.com|127.0.0.1', 'i:2;', 1730716453),
('designerasnain@gmail.com|127.0.0.1:timer', 'i:1730716453;', 1730716453),
('desinger@gmail.com|127.0.0.1', 'i:1;', 1730697787),
('desinger@gmail.com|127.0.0.1:timer', 'i:1730697787;', 1730697787);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cancelbookings`
--

CREATE TABLE `cancelbookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `special_requests` varchar(250) DEFAULT NULL,
  `dc` int(11) DEFAULT NULL,
  `uc` int(11) DEFAULT NULL,
  `cancel_reason` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cancelbookings`
--

INSERT INTO `cancelbookings` (`id`, `user_id`, `designer_id`, `category_id`, `time_id`, `address`, `status`, `special_requests`, `dc`, `uc`, `cancel_reason`, `created_at`, `updated_at`) VALUES
(1, 23, 16, 5, 8, 'xyz', 0, 'xyz', 1, 0, 'xyz', '2024-11-22 13:08:36', '2024-11-22 13:08:36'),
(2, 23, 16, 5, 10, 'xyz', 0, NULL, 0, 1, 'xyz', '2024-11-22 15:20:54', '2024-11-22 15:20:54'),
(3, 21, 16, 5, 9, 'xyz', 0, NULL, 1, 0, 'Some issues', '2024-11-23 07:36:21', '2024-11-23 07:36:21'),
(4, 18, 16, 5, 11, 'xyz', 0, NULL, 0, 1, 'some issues', '2024-11-23 08:10:45', '2024-11-23 08:10:45'),
(5, 19, 16, 5, 17, 'xyz', 0, 'xyz', 1, 0, 'Sorrry you are not eligible for this appointment', '2024-12-02 14:03:34', '2024-12-02 14:03:34'),
(6, 19, 16, 5, 18, 'xyz', 0, 'xyz', 1, 0, 'xyz', '2024-12-02 14:39:54', '2024-12-02 14:39:54'),
(7, 19, 16, 5, 18, 'xyz', 0, 'xyz', 1, 0, 'xyz', '2024-12-02 14:40:17', '2024-12-02 14:40:17'),
(8, 19, 16, 5, 18, 'xyz', 0, 'xyz', 0, 1, 'For some reason', '2024-12-02 14:51:24', '2024-12-02 14:51:24'),
(9, 19, 16, 5, 18, 'xyz', 0, 'xyz', 0, 1, 'For some reason', '2024-12-02 14:53:35', '2024-12-02 14:53:35'),
(10, 19, 16, 5, 20, 'xyz', 0, 'xyz', 1, 0, 'xyz', '2024-12-02 15:54:05', '2024-12-02 15:54:05'),
(11, 21, 16, 5, 26, 'xyz', 0, 'xyz', 0, 1, 'xyz', '2024-12-03 13:22:37', '2024-12-03 13:22:37');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `c_name`, `c_image`, `created_at`, `updated_at`) VALUES
(5, 'Living Rooms', '1730276691.jpg', '2024-09-22 01:12:50', '2024-10-30 15:24:51'),
(6, 'kitchen', '1730276974.jpg', '2024-09-22 01:14:37', '2024-10-30 15:29:34'),
(8, 'Offices', '1730273445.jpg', '2024-10-30 13:25:16', '2024-10-30 14:30:45'),
(9, 'Outdoor Space', '1730277203.jpg', '2024-10-30 15:31:08', '2024-10-30 15:33:23'),
(31, 'Bedroom', '1730657955.jpg', '2024-11-03 13:19:15', '2024-11-03 13:19:15'),
(32, 'Hotels', '1730702528.jpg', '2024-11-03 23:08:55', '2024-11-04 01:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('05f86f15-c598-46d8-98d6-5d9d7aa3e608', 19, 10, 'd', NULL, 1, '2024-12-02 11:12:39', '2024-12-02 11:12:41'),
('176e0ea4-02ef-404b-979b-691c37abec76', 19, 21, 'ok', NULL, 1, '2024-12-01 15:37:56', '2024-12-01 15:37:58'),
('1b797b28-7494-4d5e-ae8a-72ab97b8c903', 21, 19, 'Hi', NULL, 1, '2024-12-01 15:37:39', '2024-12-01 15:37:40'),
('1c10568f-24fa-4c99-8cc6-cfb8c0794da6', 10, 19, '...', NULL, 1, '2024-12-02 10:59:45', '2024-12-02 11:00:06'),
('2a94be5d-cdf4-4cb5-bb45-e24956ff75d6', 10, 19, 'fd', NULL, 1, '2024-12-02 11:12:45', '2024-12-02 11:12:47'),
('4537246b-4ec5-429f-9c33-d34064ea793e', 10, 19, 'ji', NULL, 1, '2024-12-02 08:56:51', '2024-12-02 08:56:52'),
('4b1a13cd-e085-48c0-8ca4-9a6e3149a038', 19, 10, 'f', NULL, 1, '2024-12-02 11:11:41', '2024-12-02 11:11:43'),
('4cc17b6a-2cc5-48eb-b687-06b7905976d2', 21, 10, 'hi', NULL, 1, '2024-12-03 13:37:31', '2024-12-03 13:42:33'),
('536ba0b7-aebb-4500-bef6-cf41c239b7cb', 19, 21, 'Hello', NULL, 1, '2024-12-01 15:36:22', '2024-12-01 15:37:35'),
('5403959e-2812-446d-beef-da11286f53ac', 10, 19, 'f', NULL, 1, '2024-12-02 11:12:32', '2024-12-02 11:12:34'),
('5dff4882-6185-4270-acb6-508ffab62b9b', 21, 19, 'ok', NULL, 1, '2024-12-01 15:37:52', '2024-12-01 15:37:53'),
('7262f883-b31c-4c5f-a4fb-76d4820208b5', 21, 19, 'Bye', NULL, 1, '2024-12-01 15:37:48', '2024-12-01 15:37:49'),
('7c1a721b-b34a-4512-9bbc-e9f369b4f7bb', 19, 10, 'g', NULL, 1, '2024-12-02 11:11:56', '2024-12-02 11:12:30'),
('8c3c6b08-2035-4112-bdcb-f4f8327c1b61', 19, 10, 'ji', NULL, 1, '2024-12-02 11:00:14', '2024-12-02 11:00:17'),
('9097afa0-247e-431e-9eec-7a230e14a21a', 19, 10, 'd', NULL, 1, '2024-12-02 11:12:28', '2024-12-02 11:12:30'),
('9c2a09fe-3382-41b7-925e-25d0616d9a61', 10, 19, '', '{\"new_name\":\"5dfb6517-208f-4346-8011-e18980d6a085.png\",\"old_name\":\"ser1.png\"}', 1, '2024-12-02 10:38:57', '2024-12-02 11:00:06'),
('af7707ca-3b99-40bf-bf30-bac4ce5d6e93', 21, 10, 'hello', NULL, 1, '2024-12-03 13:14:30', '2024-12-03 13:16:25'),
('b4f480a2-60c7-48f3-82d3-245dd1b5bc0b', 10, 19, 'd', NULL, 1, '2024-12-02 11:13:19', '2024-12-02 11:13:23'),
('beecfe05-0aab-4caa-9e2d-181e4b2886ea', 19, 10, 'hello', NULL, 1, '2024-12-02 08:56:28', '2024-12-02 08:56:30'),
('c80dcbf6-1a47-4ed9-abd6-5910c165c670', 10, 19, '..', NULL, 1, '2024-12-02 10:59:18', '2024-12-02 11:00:06'),
('e3044682-8287-4d5c-afc6-88299bb4cf2d', 19, 10, 'hi', NULL, 1, '2024-12-02 08:56:22', '2024-12-02 08:56:24'),
('e38d38b8-a21b-47e2-b43f-a943db4056b1', 10, 19, 'f', NULL, 1, '2024-12-02 11:11:28', '2024-12-02 11:11:30'),
('e939800c-f34f-4ba9-ac34-e222a144188f', 19, 10, 'd', NULL, 1, '2024-12-02 11:12:50', '2024-12-02 11:12:55'),
('f8e400cf-9ce0-4b49-aa4d-0a644bcf789a', 10, 19, '..', NULL, 1, '2024-12-02 10:58:56', '2024-12-02 11:00:06'),
('fcee16fe-74f5-4757-b5e7-b9e19da2986d', 10, 19, 'm', NULL, 1, '2024-12-02 11:00:00', '2024-12-02 11:00:06');

-- --------------------------------------------------------

--
-- Table structure for table `confirmbookings`
--

CREATE TABLE `confirmbookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time_id` bigint(20) UNSIGNED DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `feedback` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `confirmbookings`
--

INSERT INTO `confirmbookings` (`id`, `user_id`, `designer_id`, `category_id`, `time_id`, `address`, `status`, `feedback`, `created_at`, `updated_at`) VALUES
(1, 23, 16, 5, 8, 'xyz', 0, 'xyz', '2024-11-22 14:04:13', '2024-11-22 14:04:13'),
(2, 18, 16, 5, 11, 'xyz', 0, 'Best user', '2024-11-23 09:31:33', '2024-11-23 09:31:33'),
(3, 19, 18, 8, 13, 'xyz', 0, 'Best Client', '2024-11-23 12:09:19', '2024-11-23 12:09:19'),
(4, 19, 16, 5, 12, 'xyz', 0, 'good client', '2024-11-23 12:18:59', '2024-11-23 12:18:59'),
(5, 19, 19, 5, 14, 'xyz', 0, 'Excellent Client', '2024-11-23 12:36:11', '2024-11-23 12:36:11'),
(6, 19, 16, 5, 15, 'xyz', 0, 'Best Client', '2024-12-02 13:23:21', '2024-12-02 13:23:21'),
(7, 19, 16, 5, 17, 'xyz', 0, 'Nice To Meet You', '2024-12-02 14:34:50', '2024-12-02 14:34:50'),
(8, 19, 16, 5, 18, 'xyz', 0, 'Have a nice day!', '2024-12-02 14:55:54', '2024-12-02 14:55:54'),
(9, 19, 16, 5, 19, 'xyz', 0, 'Have a great day!', '2024-12-02 15:02:24', '2024-12-02 15:02:24'),
(10, 21, 16, 5, 20, 'xyz', 0, 'have a great day', '2024-12-03 13:17:06', '2024-12-03 13:17:06');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `user_id`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(6, 18, 'Kitchen', 'i need kitchen sepecialst', '2024-11-04 00:47:38', '2024-11-04 00:47:38'),
(7, 19, 'Network Issue', 'xyz', '2024-11-26 14:32:35', '2024-11-26 14:32:35'),
(8, 19, 'Hello', 'How Are You?', '2024-12-02 15:30:05', '2024-12-02 15:30:05'),
(9, 19, 'hi', 'bye', '2024-12-02 15:31:55', '2024-12-02 15:31:55'),
(10, 19, 'hi', 'bye', '2024-12-02 15:34:38', '2024-12-02 15:34:38'),
(11, 19, 'hi', 'bye', '2024-12-02 15:35:05', '2024-12-02 15:35:05'),
(12, 19, 'h', 'b', '2024-12-02 15:37:15', '2024-12-02 15:37:15'),
(13, 19, 'h', 'b', '2024-12-02 15:37:43', '2024-12-02 15:37:43'),
(14, 19, 'h', 'b', '2024-12-02 15:49:52', '2024-12-02 15:49:52'),
(15, 19, 'b', 'b', '2024-12-02 15:50:20', '2024-12-02 15:50:20'),
(16, 19, 'h', 'b', '2024-12-02 15:50:45', '2024-12-02 15:50:45');

-- --------------------------------------------------------

--
-- Table structure for table `designerreviews`
--

CREATE TABLE `designerreviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `designer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designerreviews`
--

INSERT INTO `designerreviews` (`id`, `user_id`, `designer_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(4, 19, 19, 4, 'Best Designerss', '2024-11-23 12:50:00', '2024-11-23 13:25:44'),
(5, 18, 16, 3, 'Great Designer', '2024-11-23 15:21:51', '2024-11-23 15:21:51');

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `descript` varchar(1000) NOT NULL,
  `exp` varchar(50) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `portfolio` text DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`id`, `fname`, `lname`, `phone`, `category_id`, `descript`, `exp`, `image`, `portfolio`, `user_id`) VALUES
(9, 'ayesha', 'shaikh', '03457888999', 31, 'hello i am ayesha i m kitchen specialist As a Kitchen Specialist, I bring a passion for culinary arts and a deep understanding of kitchen operations to ensure every meal is prepared to perfection. With expertise in menu development, food safety, and kitchen management', '5', '1730639120.jpg', '1730639120.jpeg', 13),
(11, 'asnain', 'shaikh', '034888999', 32, 'hello i am asnain arain outdoor space As a Kitchen Specialist, I bring a passion for culinary arts and a deep understanding of kitchen operations to ensure every meal is prepared to perfection. With expertise in menu development, food safety, and kitchen management speclialist', '6', '1730643054.jpg', '1730643054.jpeg', 14),
(14, 'Shahzaib', 'karim', '03457888965', 5, 'hello i m shahzaib  As a living room Specialist, I bring a passion for culinary arts and a deep understanding of kitchen operations to ensure every meal is prepared to perfection. With expertise in menu development, food safety, and kitchen management', '5', '1730644204.jpg', '1730644133.jpeg', 15),
(16, 'anumta', 'shaikh', '03453888965', 5, 'hello i m anumta As a living room Specialist, I bring a passion for culinary arts and a deep understanding of kitchen operations to ensure every meal is prepared to perfection. With expertise in menu development, food safety, and kitchen management', '6', '1730655253.jpeg', '1730655165.jpeg', 10),
(18, 'Zohaib', 'ali', '03412091321', 8, 'I am Zohaib', '2', '1730717485.jpeg', '1730717485.jpeg', 22),
(19, 'Rohan', 'Shaikh', '03128310', 5, 'xyz', '20', '1732212200.png', '1732211986.png', 24);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `g_image` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `g_image`, `category_id`, `created_at`, `updated_at`) VALUES
(5, '1730284186.jpg', 5, '2024-10-30 17:29:46', '2024-10-30 17:29:46'),
(6, '1730284211.jpg', 8, '2024-10-30 17:30:11', '2024-10-30 17:30:11'),
(7, '1730284237.jpg', 8, '2024-10-30 17:30:37', '2024-10-30 17:30:37'),
(8, '1730284260.jpg', 9, '2024-10-30 17:31:00', '2024-10-30 17:31:00'),
(9, '1730284284.jpg', 9, '2024-10-30 17:31:24', '2024-10-30 17:31:24'),
(10, '1730284313.jpg', 9, '2024-10-30 17:31:53', '2024-10-30 17:31:53'),
(14, '1730284482.jpg', 5, '2024-10-30 17:34:42', '2024-10-30 17:34:42'),
(15, '1730284526.jpg', 5, '2024-10-30 17:35:26', '2024-10-30 17:35:26'),
(16, '1730284578.jpg', 5, '2024-10-30 17:36:18', '2024-10-30 17:36:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_09_18_150540_add_two_factor_columns_to_users_table', 1),
(5, '2024_09_18_150621_create_personal_access_tokens_table', 1),
(6, '2024_09_18_174322_create_products_table', 2),
(7, '2024_09_18_184744_create_categories_table', 3),
(8, '2024_09_18_191452_create_products_table', 4),
(9, '2024_09_18_222236_create_products_table', 5),
(10, '2024_09_20_062103_create_carts_table', 6),
(11, '2024_09_20_072821_create_designers_table', 7),
(12, '2024_09_19_065706_create_orders_table', 8),
(13, '2024_09_19_065719_create_orders_items_table', 8),
(14, '2024_09_20_160910_add_role_to_users_table', 9),
(15, '2024_09_20_233158_create_designers_table', 10),
(16, '2024_09_20_140910_create_contacts_table', 11),
(17, '2024_09_20_182758_create_times_table', 11),
(18, '2024_09_21_080725_create_bookkings_table', 11),
(19, '2024_09_21_080725_create_bookings_table', 12),
(20, '2024_09_22_052650_create_galleries_table', 13),
(21, '2024_10_27_145649_create_wishlists_table', 14),
(22, '2024_10_28_132509_create_wishlists_table', 15),
(23, '2024_10_31_082009_create_reviews_table', 16),
(24, '2024_11_01_080422_create__wishlists_table', 17),
(26, '2024_11_02_075430_create_bookings_table', 18),
(27, '2024_11_03_101420_create_reviews_table', 19),
(28, '2019_12_14_000001_create_personal_access_tokens_table', 20),
(29, '2024_12_01_999999_add_active_status_to_users', 21),
(30, '2024_12_01_999999_add_avatar_to_users', 21),
(31, '2024_12_01_999999_add_dark_mode_to_users', 21),
(32, '2024_12_01_999999_add_messenger_color_to_users', 21),
(33, '2024_12_01_999999_create_chatify_favorites_table', 21),
(34, '2024_12_01_999999_create_chatify_messages_table', 21),
(35, '2024_12_02_162654_create_views_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(111) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `delivery` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `address`, `phone`, `status`, `delivery`, `created_at`, `updated_at`) VALUES
(47, 1, '12000', 'karachi', '32123141', 1, 0, '2024-11-04 05:43:34', '2024-11-04 05:54:33'),
(48, 1, '12900', 'karachi', '32123141', 1, 0, '2024-11-04 05:59:40', '2024-11-04 06:00:37'),
(49, 19, '6022', 'malir', '03452328230', 1, 0, '2024-11-23 15:24:55', '2024-11-23 15:28:49'),
(50, 19, '416', 'malir', '03452328230', 2, 2, '2024-11-23 15:27:21', '2024-11-23 15:27:44'),
(51, 19, '12900', 'malir', '03452328230', 2, 2, '2024-11-24 06:56:11', '2024-11-24 07:03:52'),
(53, 19, '693', 'malir', '03452328230', 1, 0, '2024-11-24 07:19:32', '2024-11-24 07:19:32'),
(54, 19, '11200', 'malir', '03452328230', 0, 0, '2024-11-24 07:30:32', '2024-11-24 07:30:32'),
(55, 19, '3000', 'malir', '03452328230', 1, 0, '2024-11-24 08:40:39', '2024-11-24 08:41:58'),
(56, 19, '416', 'malir', '03452328230', 0, 0, '2024-11-24 09:18:03', '2024-11-24 09:19:07'),
(57, 19, '10250', 'malir', '03452328230', 1, 0, '2024-11-24 09:28:10', '2024-11-24 11:29:45'),
(58, 19, '416', 'malir', '03452328230', 1, 0, '2024-11-24 11:31:22', '2024-11-24 12:02:15'),
(59, 19, '416', 'malir', '03452328230', 1, 0, '2024-11-24 12:07:15', '2024-11-24 12:08:59'),
(60, 19, '12900', 'malir', '03452328230', 0, 0, '2024-11-24 13:34:54', '2024-11-24 13:34:54'),
(61, 21, '12900', 'karachi', '031234567', 0, 0, '2024-11-24 13:56:34', '2024-11-24 13:56:34'),
(62, 21, '3000', 'karachi', '031234567', 1, 0, '2024-11-24 13:58:34', '2024-11-24 13:59:33'),
(63, 19, '5253', 'malir', '03452328230', 0, 0, '2024-11-26 14:44:39', '2024-11-26 14:44:39'),
(64, 19, '7000', 'malir', '03452328230', 1, 0, '2024-11-26 14:46:13', '2024-11-26 14:56:33'),
(65, 19, '5022', 'malir', '03452328230', 2, 2, '2024-12-02 12:24:30', '2024-12-03 12:16:56'),
(66, 19, '5022', 'malir', '03452328230', 1, 1, '2024-12-02 12:32:54', '2024-12-03 11:41:21'),
(67, 19, '8022', 'malir', '03452328230', 2, 2, '2024-12-03 10:52:18', '2024-12-03 12:15:03'),
(68, 19, '5022', 'malir', '03452328230', 1, 0, '2024-12-03 10:54:54', '2024-12-03 10:54:54'),
(69, 19, '10000', 'malir', '03452328230', 2, 2, '2024-12-03 10:58:14', '2024-12-03 12:14:53'),
(70, 19, '5022', 'malir', '03452328230', 2, 2, '2024-12-03 12:19:03', '2024-12-03 12:19:19'),
(71, 19, '7000', 'malir', '03452328230', 1, 0, '2024-12-03 12:30:26', '2024-12-03 12:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(39, 47, 28, 10, '2024-11-04 05:43:34', '2024-11-04 05:43:34'),
(40, 48, 42, 1, '2024-11-04 05:59:40', '2024-11-04 05:59:40'),
(41, 49, 8, 4, '2024-11-23 15:24:55', '2024-11-23 15:24:55'),
(42, 49, 10, 1, '2024-11-23 15:24:55', '2024-11-23 15:24:55'),
(43, 50, 11, 1, '2024-11-23 15:27:21', '2024-11-23 15:27:21'),
(44, 51, 42, 1, '2024-11-24 06:56:11', '2024-11-24 06:56:11'),
(46, 53, 7, 3, '2024-11-24 07:19:32', '2024-11-24 07:19:32'),
(48, 54, 32, 2, '2024-11-24 07:30:32', '2024-11-24 07:30:32'),
(49, 55, 22, 1, '2024-11-24 08:40:39', '2024-11-24 08:40:39'),
(50, 56, 11, 1, '2024-11-24 09:18:03', '2024-11-24 09:18:03'),
(51, 57, 31, 1, '2024-11-24 09:28:10', '2024-11-24 09:28:10'),
(52, 57, 29, 1, '2024-11-24 09:28:10', '2024-11-24 09:28:10'),
(53, 57, 28, 1, '2024-11-24 09:28:10', '2024-11-24 09:28:10'),
(54, 58, 11, 1, '2024-11-24 11:31:22', '2024-11-24 11:31:22'),
(55, 59, 11, 1, '2024-11-24 12:07:15', '2024-11-24 12:07:15'),
(56, 60, 42, 1, '2024-11-24 13:34:54', '2024-11-24 13:34:54'),
(57, 61, 42, 1, '2024-11-24 13:56:34', '2024-11-24 13:56:34'),
(58, 62, 22, 1, '2024-11-24 13:58:34', '2024-11-24 13:58:34'),
(59, 63, 7, 1, '2024-11-26 14:44:39', '2024-11-26 14:44:39'),
(60, 63, 10, 1, '2024-11-26 14:44:39', '2024-11-26 14:44:39'),
(61, 64, 26, 1, '2024-11-26 14:46:13', '2024-11-26 14:46:13'),
(62, 65, 10, 1, '2024-12-02 12:24:30', '2024-12-02 12:24:30'),
(63, 66, 10, 1, '2024-12-02 12:32:54', '2024-12-02 12:32:54'),
(64, 67, 10, 1, '2024-12-03 10:52:18', '2024-12-03 10:52:18'),
(65, 67, 22, 1, '2024-12-03 10:52:18', '2024-12-03 10:52:18'),
(66, 68, 10, 1, '2024-12-03 10:54:54', '2024-12-03 10:54:54'),
(67, 69, 33, 1, '2024-12-03 10:58:14', '2024-12-03 10:58:14'),
(68, 70, 10, 1, '2024-12-03 12:19:03', '2024-12-03 12:19:03'),
(69, 71, 26, 1, '2024-12-03 12:30:26', '2024-12-03 12:30:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_price` int(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `views` int(11) DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_image`, `quantity`, `views`, `category_id`, `created_at`, `updated_at`) VALUES
(7, 'Wall Light', 231, '1726986159.webp', '4', 1, 5, '2024-09-22 01:22:39', '2024-12-02 12:16:40'),
(8, 'Wall Light 2', 250, '1726986202.jfif', '0', 1, 5, '2024-09-22 01:23:22', '2024-12-02 11:34:58'),
(9, 'Wall Light 3', 300, '1726986221.webp', '0', 2, 5, '2024-09-22 01:23:41', '2024-12-02 12:28:16'),
(10, 'Tray', 5022, '1726986312.webp', '1', 1, 6, '2024-09-22 01:25:12', '2024-12-03 12:19:03'),
(11, 'Tray 2', 416, '1726986334.webp', '41', 0, 6, '2024-09-22 01:25:34', '2024-11-24 12:07:15'),
(12, 'Tray 3', 300, '1726986353.jpg', '10', 1, 6, '2024-09-22 01:25:53', '2024-12-02 12:02:15'),
(21, 'Shahi Sofa', 4000, '1730277542.jpg', '6', 0, 5, '2024-10-30 15:39:02', '2024-11-04 05:13:19'),
(22, 'mirror', 3000, '1730277714.jpg', '4', 2, 5, '2024-10-30 15:41:54', '2024-12-03 10:52:18'),
(23, 'panola sofa', 50, '1730278978.jpg', '4', 0, 5, '2024-10-30 16:02:58', '2024-10-30 16:02:58'),
(24, 'kitchen catter set', 3090, '1730280059.jpg', '7', 0, 6, '2024-10-30 16:20:59', '2024-10-30 16:20:59'),
(25, 'kitchen cabinet', 6000, '1730280301.jpg', '8', 1, 6, '2024-10-30 16:25:01', '2024-12-02 12:16:14'),
(26, 'kitchen cabinet', 7000, '1730280372.jpg', '12', 1, 6, '2024-10-30 16:26:12', '2024-12-03 12:30:26'),
(27, 'Office table', 30, '1730280749.jpg', '13', 0, 8, '2024-10-30 16:32:29', '2024-10-30 16:32:29'),
(28, 'Office calender', 1200, '1730280919.jpg', '8', 1, 8, '2024-10-30 16:35:19', '2024-12-02 12:02:21'),
(29, 'Office chair', 50, '1730281118.jpg', '1', 0, 8, '2024-10-30 16:38:38', '2024-11-24 09:28:10'),
(31, 'outdoor decor', 9000, '1730281969.jpg', '7', 0, 9, '2024-10-30 16:52:49', '2024-11-24 09:28:10'),
(32, 'outdoor  table set', 5600, '1730282103.jpg', '8', 0, 9, '2024-10-30 16:55:03', '2024-11-24 07:30:32'),
(33, 'outdoor chair', 10000, '1730282267.webp', '4', 1, 9, '2024-10-30 16:57:47', '2024-12-03 10:58:14'),
(42, 'Shahi Sofa', 12900, '1730694085.jpg', '8', 0, 5, '2024-11-03 23:21:25', '2024-11-24 13:56:34'),
(43, '123', -1, '1730718374.jpeg', '123', 0, 8, '2024-11-04 06:06:14', '2024-11-04 06:06:14');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(7, 16, 7, 4, 'Nice wall Light', '2024-11-04 00:16:03', '2024-11-04 00:16:03'),
(8, 18, 7, 4, 'Nice Product.', '2024-11-04 00:44:09', '2024-11-04 00:44:09'),
(9, 1, 28, 3, 'product is good', '2024-11-04 05:47:54', '2024-11-04 05:47:54'),
(13, 19, 22, 5, 'Great Mirror', '2024-11-24 08:42:32', '2024-11-24 08:58:59'),
(14, 19, 26, 4, 'Best Cabinet', '2024-11-26 14:57:25', '2024-11-26 14:57:40'),
(15, 21, 22, 3, 'xyz', '2024-12-02 12:19:16', '2024-12-02 12:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('3ZQmaxm8grS9WEyAQBnmQn8Sdz91YcVZmzDhk346', 10, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoieW9hYzdxSklxc2pSTXpBb0hPcmFkVjJDaDFFVmFDT3M2YUxEWkhSdSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9jaGF0aWZ5LzEyIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkT24yeWFYTTA3WlBzOThubTRSZWtSdW5pUzVvcUtXaFBEL1R5bnNvbGNLWkF6ZUR1dnZkaEsiO3M6MTE6ImRlc2lnbmVyX2lkIjtpOjE2O30=', 1733254237),
('a5i0AmpnM8tbpf6peH3BpkbH5qYNK9UPEgW4QDvs', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibWJqaXJxcDBPbjhhZzNTRzRoNkpSRzc5c1BEWlZoN1hTTnZmOVdheiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMCI7fX0=', 1733254485);

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `designer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `date` date NOT NULL,
  `is_booked` int(11) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `designer_id`, `time_in`, `time_out`, `date`, `is_booked`, `created_at`, `updated_at`) VALUES
(6, 19, '02:14:00', '05:14:00', '2024-11-26', 1, '2024-11-21 15:16:18', '2024-11-22 15:01:24'),
(8, 16, '18:35:00', '20:35:00', '2024-11-22', 1, '2024-11-22 07:35:09', '2024-11-22 13:41:14'),
(9, 16, '01:16:00', '02:16:00', '2024-11-24', 1, '2024-11-22 15:16:38', '2024-11-23 08:14:20'),
(10, 16, '02:16:00', '03:16:00', '2024-11-25', 1, '2024-11-22 15:16:55', '2024-11-22 15:18:08'),
(11, 16, '18:07:00', '19:07:00', '2024-11-23', 1, '2024-11-23 08:07:52', '2024-11-23 08:14:20'),
(12, 16, '21:08:00', '23:08:00', '2024-11-23', 1, '2024-11-23 08:08:09', '2024-11-23 12:15:32'),
(13, 18, '14:01:00', '18:01:00', '2024-11-23', 1, '2024-11-23 12:02:14', '2024-11-23 12:06:22'),
(14, 19, '12:24:00', '13:24:00', '2024-11-23', 1, '2024-11-23 12:25:01', '2024-11-23 12:35:16'),
(15, 16, '23:32:00', '23:38:00', '2024-11-27', 1, '2024-11-23 12:32:43', '2024-11-23 12:33:36'),
(16, 19, '12:53:00', '16:53:00', '2024-12-03', 1, '2024-11-23 12:53:42', '2024-12-02 08:20:38'),
(17, 16, '12:46:00', '14:46:00', '2024-12-02', 1, '2024-12-02 13:46:35', '2024-12-02 14:10:01'),
(18, 16, '13:38:00', '14:40:00', '2024-12-02', 1, '2024-12-02 14:38:18', '2024-12-02 14:54:13'),
(19, 16, '14:00:00', '17:00:00', '2024-12-02', 1, '2024-12-02 15:00:48', '2024-12-02 15:01:22'),
(20, 16, '14:52:00', '16:55:00', '2024-12-02', 1, '2024-12-02 15:52:33', '2024-12-03 13:12:29'),
(21, 16, '14:56:00', '16:57:00', '2024-12-04', 1, '2024-12-02 15:57:13', '2024-12-03 13:17:50'),
(22, 16, '02:58:00', '03:58:00', '2024-12-04', 1, '2024-12-02 15:58:32', '2024-12-03 13:17:50'),
(23, 16, '03:00:00', '05:00:00', '2024-12-04', 1, '2024-12-02 16:00:12', '2024-12-03 13:17:50'),
(24, 16, '03:01:00', '05:01:00', '2024-12-04', 1, '2024-12-02 16:01:35', '2024-12-03 13:17:50'),
(25, 16, '03:01:00', '04:02:00', '2024-12-12', 0, '2024-12-02 16:02:09', '2024-12-02 16:02:09'),
(26, 16, '03:04:00', '05:04:00', '2024-12-04', 0, '2024-12-02 16:04:12', '2024-12-03 13:22:37'),
(27, 16, '03:06:00', '05:06:00', '2024-12-05', 0, '2024-12-02 16:06:35', '2024-12-02 16:06:35'),
(28, 19, '12:29:00', '14:29:00', '2024-12-04', 1, '2024-12-03 13:29:36', '2024-12-03 13:29:58');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(111) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `address`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(1, 'Ifrah', 'ifrah@gmail.com', '32123141', NULL, '$2y$12$ekyoKO2M9xHAgomQvVET0OwwTXRmrtDlhYrpnaAQXSFrgtV5jt5iq', NULL, NULL, NULL, 'karachi', 'user', 't2fGY2IxtAa1el7NlhX6Fv7LTYYSp41HKCiRYS12eBQICQuHGTH3uidaBbeP', NULL, NULL, '2024-09-18 10:42:31', '2024-09-18 10:42:31', 0, 'avatar.png', 0, NULL),
(2, 'Admin', 'admin@gmail.com', '324234', NULL, '$2y$12$kmOUT9x.WrS.5CeyVTCGw.xTbgg1zTMbEyxjJiQ4oqJwPrd9WyxTK', NULL, NULL, NULL, 'karachi', 'admin', NULL, NULL, NULL, '2024-09-18 16:36:23', '2024-09-18 16:36:23', 0, 'avatar.png', 0, NULL),
(10, 'Anumta', 'aptechrafay2@gmail.com', '432423432', NULL, '$2y$12$On2yaXM07ZPs98nm4RekRuniS5oqKWhPD/TynsolcKZAzeDuvvdhK', NULL, NULL, NULL, 'Shah Latif Town', 'designer', NULL, NULL, NULL, '2024-11-02 14:26:21', '2024-12-03 13:39:30', 0, 'avatar.png', 0, NULL),
(13, 'Ayesha', 'designerayesha@gmail.com', '432432', NULL, '$2y$12$9EsJyJK8oHfhCIRoTWSNb.VwN1Ks6ZAb8Db25fqb3vkq/A54IhTIO', NULL, NULL, NULL, 'malir', 'designer', NULL, NULL, NULL, '2024-11-03 08:01:52', '2024-11-03 08:01:52', 0, 'avatar.png', 0, NULL),
(14, 'Asnain', 'designerasnainarain@gmail.com', '3248329', NULL, '$2y$12$tJBaYs5FQ9bazF5Z8OcnwO/QRpCpk/ao3gVZJZpFtjYaYGYhCDNgu', NULL, NULL, NULL, 'lahore', 'designer', NULL, NULL, NULL, '2024-11-03 09:03:34', '2024-11-03 09:03:34', 0, 'avatar.png', 0, NULL),
(15, 'Shahzaib', 'designershahzaib@gmail.com', '324932', NULL, '$2y$12$dkOhYc3Ft/RRZaxFo4SRM.n7x01Ctf8HNgUpCBrTXXUnNVR3vm1nK', NULL, NULL, NULL, 'multan', 'designer', NULL, NULL, NULL, '2024-11-03 09:17:32', '2024-11-03 09:17:32', 0, 'avatar.png', 0, NULL),
(16, 'Demo', 'demo@gamil.com', '432432545', NULL, '$2y$12$JvDFa0DeNtAowj3D86k4s.ib1yTO8nBPYnUK1PqNFgq1wLAlZs29i', NULL, NULL, NULL, 'multan', 'user', NULL, NULL, NULL, '2024-11-04 00:08:12', '2024-11-04 00:08:12', 0, 'avatar.png', 0, NULL),
(17, 'Basit', 'basit@gamil.com', '32132', NULL, '$2y$12$yMRxSh0Lo7t9zTLugy5ZqOLOySkzqnWzzlcJ501g7bJLc.zAbiESi', NULL, NULL, NULL, 'multan', 'designer', NULL, NULL, NULL, '2024-11-04 00:25:27', '2024-11-04 00:25:27', 0, 'avatar.png', 0, NULL),
(18, 'Shahzaib', 'shahzaib@gmail.com', '31243434', NULL, '$2y$12$Ij/KB4O4fPWDrxleO5P3feegMUtlDTx.IXDbN6opOxzebLUPes.he', NULL, NULL, NULL, 'karachi', 'user', NULL, NULL, NULL, '2024-11-04 00:40:19', '2024-11-04 00:40:19', 0, 'avatar.png', 0, NULL),
(19, 'Rafay', 'rafayshaikh405@gmail.com', '03452328230', NULL, '$2y$12$7S5HyL.1x.R23snfn3ghieW28fINq0MOxKp3eBd3RkYVai8uUiNfW', NULL, NULL, NULL, 'malir', 'user', NULL, NULL, NULL, '2024-11-04 02:48:02', '2024-12-02 10:59:11', 1, 'avatar.png', 0, NULL),
(20, 'zey', 'zeby@gmail.com', '031234243', NULL, '$2y$12$uGVb78Xw35Ou7g3rnNeWlelqyVNN4qfVMDNliM9U6rscRQPTg7X3i', NULL, NULL, NULL, 'karachi', 'user', NULL, NULL, NULL, '2024-11-04 04:53:18', '2024-11-04 04:53:18', 0, 'avatar.png', 0, NULL),
(21, 'fuzail', 'fuzail@gmail.com', '031234567', NULL, '$2y$12$uMDEBecsOuO4aAjgXtokHuJm50CZ9UryP2O0PXIECYJt6xu6E8fPi', NULL, NULL, NULL, 'karachi', 'user', NULL, NULL, NULL, '2024-11-04 05:10:07', '2024-12-03 14:30:37', 0, 'avatar.png', 0, NULL),
(22, 'Zohaib', 'zohaib@gmail.com', '0322758983', NULL, '$2y$12$m4mEyoMkcLloMW86RX6xNuIcH.Q1z5PZvlwtG/vEYaVzEvljp1sHy', NULL, NULL, NULL, 'karachi', 'designer', NULL, NULL, NULL, '2024-11-04 05:49:28', '2024-11-04 05:49:28', 0, 'avatar.png', 0, NULL),
(23, 'Reyaan', 'reyaan@gmail.com', '048329', NULL, '$2y$12$xj7MAttyg3myuthKj9Dm5eve/fC99L74UJqy1rgMydVg/27Ayr8Gm', NULL, NULL, NULL, 'xyz', 'user', NULL, NULL, NULL, '2024-11-21 11:41:03', '2024-11-21 11:41:03', 0, 'avatar.png', 0, NULL),
(24, 'Rohan', 'rohan@gmail.com', '031280', NULL, '$2y$12$.BM5g7aC9VA66KOCt4dN/uSjqKMKdOmLq9vwv0QscnE7q2tdgGlv2', NULL, NULL, NULL, 'xyz', 'designer', NULL, NULL, NULL, '2024-11-21 11:53:32', '2024-11-21 11:53:32', 0, 'avatar.png', 0, NULL),
(25, 'xtylish', 'xtylishlarka029@gmail.com', '03219', NULL, '$2y$12$jaTIlv6e7XXpspV78JRnfu5w9T8xFCTX2cg3RiVVajKOj5spn0cNO', NULL, NULL, NULL, 'xyz', 'user', NULL, NULL, NULL, '2024-11-24 09:12:05', '2024-11-24 09:12:05', 0, 'avatar.png', 0, NULL),
(26, 'Ghazali', 'ighazali791@gmail.com', '038302', NULL, '$2y$12$NPyhAHLiL1PMkwDVnlMjnOzZA8BugexVbOqPLs8yYR75FV.29.7Lu', NULL, NULL, NULL, 'xyz', 'designer', NULL, NULL, NULL, '2024-11-24 09:15:52', '2024-11-24 09:15:52', 0, 'avatar.png', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `views`
--

CREATE TABLE `views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `views`
--

INSERT INTO `views` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 8, 19, '2024-12-02 11:34:58', '2024-12-02 11:34:58'),
(2, 12, 19, '2024-12-02 12:02:15', '2024-12-02 12:02:15'),
(3, 28, 19, '2024-12-02 12:02:21', '2024-12-02 12:02:21'),
(4, 25, 19, '2024-12-02 12:16:14', '2024-12-02 12:16:14'),
(5, 22, 19, '2024-12-02 12:16:18', '2024-12-02 12:16:18'),
(6, 26, 19, '2024-12-02 12:16:25', '2024-12-02 12:16:25'),
(7, 7, 19, '2024-12-02 12:16:40', '2024-12-02 12:16:40'),
(8, 9, 21, '2024-12-02 12:19:08', '2024-12-02 12:19:08'),
(9, 22, 21, '2024-12-02 12:19:09', '2024-12-02 12:19:09'),
(10, 10, 19, '2024-12-02 12:22:15', '2024-12-02 12:22:15'),
(11, 9, 19, '2024-12-02 12:28:16', '2024-12-02 12:28:16'),
(12, 33, 19, '2024-12-03 10:55:29', '2024-12-03 10:55:29');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(15, 16, 7, '2024-11-04 00:17:34', '2024-11-04 00:17:34'),
(17, 20, 8, '2024-11-04 04:53:41', '2024-11-04 04:53:41'),
(20, 21, 7, '2024-11-23 15:31:23', '2024-11-23 15:31:23'),
(21, 19, 22, '2024-11-24 08:32:29', '2024-11-24 08:32:29'),
(22, 19, 29, '2024-11-24 09:20:31', '2024-11-24 09:20:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `designer_id` (`designer_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `time_id` (`time_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cancelbookings`
--
ALTER TABLE `cancelbookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `designer_id` (`designer_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `time_id` (`time_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `c_name` (`c_name`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirmbookings`
--
ALTER TABLE `confirmbookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `designer_id` (`designer_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `time_id` (`time_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `designerreviews`
--
ALTER TABLE `designerreviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `designer_id` (`designer_id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_category_id` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `galleries_category_id_foreign` (`category_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_items_order_id_foreign` (`order_id`),
  ADD KEY `orders_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_user_id_product_id_unique` (`user_id`,`product_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designer_id` (`designer_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `phone` (`phone`);

--
-- Indexes for table `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`),
  ADD KEY `views_product_id_foreign` (`product_id`),
  ADD KEY `views_user_id_foreign` (`user_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `cancelbookings`
--
ALTER TABLE `cancelbookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `confirmbookings`
--
ALTER TABLE `confirmbookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `designerreviews`
--
ALTER TABLE `designerreviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `views`
--
ALTER TABLE `views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `bookings_ibfk_2` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id`),
  ADD CONSTRAINT `bookings_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `bookings_ibfk_4` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`);

--
-- Constraints for table `cancelbookings`
--
ALTER TABLE `cancelbookings`
  ADD CONSTRAINT `cancelbookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cancelbookings_ibfk_2` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id`),
  ADD CONSTRAINT `cancelbookings_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `cancelbookings_ibfk_4` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `confirmbookings`
--
ALTER TABLE `confirmbookings`
  ADD CONSTRAINT `confirmbookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `confirmbookings_ibfk_2` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id`),
  ADD CONSTRAINT `confirmbookings_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `confirmbookings_ibfk_4` FOREIGN KEY (`time_id`) REFERENCES `times` (`id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `designerreviews`
--
ALTER TABLE `designerreviews`
  ADD CONSTRAINT `designerreviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `designerreviews_ibfk_2` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id`);

--
-- Constraints for table `designers`
--
ALTER TABLE `designers`
  ADD CONSTRAINT `fk_category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `galleries`
--
ALTER TABLE `galleries`
  ADD CONSTRAINT `galleries_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `times`
--
ALTER TABLE `times`
  ADD CONSTRAINT `fk_designer_id` FOREIGN KEY (`designer_id`) REFERENCES `designers` (`id`);

--
-- Constraints for table `views`
--
ALTER TABLE `views`
  ADD CONSTRAINT `views_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `views_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
