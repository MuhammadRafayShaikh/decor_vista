-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2024 at 03:11 PM
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
-- Database: `my_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `designer_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `time_id` int(11) NOT NULL,
  `b_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `b_date` date NOT NULL,
  `special_requests` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `designer_id`, `category_id`, `time_id`, `b_name`, `email`, `phone`, `status`, `b_date`, `special_requests`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 2, 'anum', 'anumta@gmail.com', '03102353631', 0, '2024-11-26', 'dasda', '2024-11-02 15:53:02', '2024-11-02 16:21:29'),
(3, 1, 8, 10, 5, 'anum', 'anumta@gmail.com', '0310235369', 0, '2024-11-07', 'dfgd', '2024-11-02 20:40:11', '2024-11-02 20:40:11');

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
('306eb646a2613733927122d280ac58e2', 'i:1;', 1730553800),
('306eb646a2613733927122d280ac58e2:timer', 'i:1730553800;', 1730553800),
('82f52fa1a9948feb06ea0e0a5930221e', 'i:1;', 1730549105),
('82f52fa1a9948feb06ea0e0a5930221e:timer', 'i:1730549105;', 1730549105),
('89fbb4b062946e3170f6fc9ab619beaa', 'i:1;', 1730556297),
('89fbb4b062946e3170f6fc9ab619beaa:timer', 'i:1730556297;', 1730556297),
('b2bed9ef4308b01d213af23039bc237c', 'i:1;', 1730552352),
('b2bed9ef4308b01d213af23039bc237c:timer', 'i:1730552352;', 1730552352),
('c525a5357e97fef8d3db25841c86da1a', 'i:1;', 1730556478),
('c525a5357e97fef8d3db25841c86da1a:timer', 'i:1730556478;', 1730556478);

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
(4, 'Bedroom', '1730276869.jpg', '2024-09-20 01:02:50', '2024-10-30 15:27:49'),
(5, 'Living Rooms', '1730276691.jpg', '2024-09-22 01:12:50', '2024-10-30 15:24:51'),
(6, 'kitchen', '1730276974.jpg', '2024-09-22 01:14:37', '2024-10-30 15:29:34'),
(8, 'Offices', '1730273445.jpg', '2024-10-30 13:25:16', '2024-10-30 14:30:45'),
(9, 'Outdoor Space', '1730277203.jpg', '2024-10-30 15:31:08', '2024-10-30 15:33:23'),
(10, 'Bathroom', '1730277068.jpg', '2024-10-30 15:31:08', '2024-10-30 15:31:08'),
(12, 'Hotel', '1730525215.jfif', '2024-11-02 12:26:55', '2024-11-02 12:28:38'),
(13, 'Hoteljkj;kl', '1730555961.jpeg', '2024-11-02 18:01:54', '2024-11-02 20:59:50');

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
(5, 1, 'Kitchen', 'qfqrgq', '2024-11-02 18:53:06', '2024-11-02 18:53:06');

-- --------------------------------------------------------

--
-- Table structure for table `designers`
--

CREATE TABLE `designers` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `descript` varchar(1000) NOT NULL,
  `exp` varchar(50) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `portfolio` text DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designers`
--

INSERT INTO `designers` (`id`, `fname`, `lname`, `phone`, `descript`, `exp`, `category_id`, `image`, `portfolio`, `user_id`) VALUES
(5, 'Anumta', 'Shaikh', '03102353631', 'I am Anumta Shaikh', '2', 12, '1730553117.jpg', '1730553224.jpeg', 10),
(6, 'Sana', 'Shaikh', '0310235363', 'I am sana shaikh', '3', 5, '1730553826.jpg', '1730553826.jpg', 11),
(8, 'Ifrah', 'Khan', '03102353631', 'I am Ifrah Khan', '6', 10, '1730554732.jpg', '1730554732.jpeg', 12);

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
(2, '1727007041.jfif', 4, '2024-09-22 07:10:41', '2024-09-22 07:10:41'),
(3, '1727007106.jpg', 4, '2024-09-22 07:11:46', '2024-09-22 07:11:46'),
(4, '1727007506.jpeg', 4, '2024-09-22 07:18:26', '2024-09-22 07:18:26'),
(5, '1730284186.jpg', 5, '2024-10-30 17:29:46', '2024-10-30 17:29:46'),
(6, '1730284211.jpg', 8, '2024-10-30 17:30:11', '2024-10-30 17:30:11'),
(7, '1730284237.jpg', 8, '2024-10-30 17:30:37', '2024-10-30 17:30:37'),
(8, '1730284260.jpg', 9, '2024-10-30 17:31:00', '2024-10-30 17:31:00'),
(9, '1730284284.jpg', 9, '2024-10-30 17:31:24', '2024-10-30 17:31:24'),
(10, '1730284313.jpg', 9, '2024-10-30 17:31:53', '2024-10-30 17:31:53'),
(11, '1730284348.jpg', 4, '2024-10-30 17:32:28', '2024-10-30 17:32:28'),
(12, '1730284374.jpg', 10, '2024-10-30 17:32:54', '2024-10-30 17:32:54'),
(13, '1730284400.jpg', 10, '2024-10-30 17:33:20', '2024-10-30 17:33:20'),
(14, '1730284482.jpg', 5, '2024-10-30 17:34:42', '2024-10-30 17:34:42'),
(15, '1730284526.jpg', 5, '2024-10-30 17:35:26', '2024-10-30 17:35:26'),
(16, '1730284578.jpg', 5, '2024-10-30 17:36:18', '2024-10-30 17:36:18'),
(17, '1730284658.jpg', 10, '2024-10-30 17:37:38', '2024-10-30 17:37:38');

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
(26, '2024_11_02_075430_create_bookings_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) DEFAULT '0',
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `price`, `address`, `phone`, `status`, `created_at`, `updated_at`) VALUES
(15, 1, '25110', 'Malir', '03452585249', 2, '2024-09-21 23:42:34', '2024-11-02 20:40:48'),
(16, 5, '3072', 'malir', '0345285412', 1, '2024-09-22 02:51:02', '2024-10-29 16:14:32'),
(17, 5, '750', 'malir', '0345285412', 1, '2024-09-22 02:51:49', '2024-11-02 21:01:07'),
(18, 5, '250', 'malir', '0345285412', 0, '2024-09-22 03:05:02', '2024-09-22 03:05:02'),
(19, 5, '250', 'malir', '0345285412', 0, '2024-09-22 03:06:15', '2024-09-22 03:06:15'),
(20, 5, '300', 'malir', '0345285412', 0, '2024-09-22 03:07:41', '2024-09-22 03:07:41'),
(21, 5, '5022', 'malir', '0345285412', 0, '2024-09-22 03:08:10', '2024-09-22 03:08:10'),
(22, 5, '125000', 'malir', '0345285412', 0, '2024-09-22 05:32:58', '2024-09-22 05:32:58'),
(23, 5, '5022', 'malir', '032136756435', 0, '2024-09-22 06:31:54', '2024-09-22 06:31:54'),
(24, 2, '10044', 'malir', '0312856999', 0, '2024-10-28 21:29:13', '2024-11-02 21:01:27'),
(30, 1, '462', 'Shah Latif Town', '03102353638', 2, '2024-11-02 20:42:52', '2024-11-02 20:42:59'),
(31, 1, '462', 'Shah Latif Town', '031026788', 2, '2024-11-02 20:44:30', '2024-11-02 20:44:39'),
(32, 1, '250', 'Shah Latif Town', '0310235378', 2, '2024-11-02 20:46:47', '2024-11-02 20:47:09'),
(33, 1, '50400', 'Shah Latif Town', '03102353631', 0, '2024-11-02 21:04:41', '2024-11-02 21:04:41');

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
(6, 15, 6, 5, '2024-09-21 23:42:34', '2024-09-21 23:42:34'),
(8, 16, 7, 12, '2024-09-22 02:51:02', '2024-09-22 02:51:02'),
(9, 17, 8, 3, '2024-09-22 02:51:49', '2024-09-22 02:51:49'),
(10, 18, 8, 1, '2024-09-22 03:05:02', '2024-09-22 03:05:02'),
(11, 19, 8, 1, '2024-09-22 03:06:15', '2024-09-22 03:06:15'),
(13, 21, 10, 1, '2024-09-22 03:08:10', '2024-09-22 03:08:10'),
(14, 22, 16, 5, '2024-09-22 05:32:58', '2024-09-22 05:32:58'),
(15, 23, 10, 1, '2024-09-22 06:31:54', '2024-09-22 06:31:54'),
(16, 24, 6, 2, '2024-10-28 21:29:13', '2024-10-28 21:29:13'),
(22, 30, 7, 2, '2024-11-02 20:42:52', '2024-11-02 20:42:52'),
(23, 31, 7, 2, '2024-11-02 20:44:30', '2024-11-02 20:44:30'),
(24, 32, 8, 1, '2024-11-02 20:46:47', '2024-11-02 20:46:47'),
(25, 33, 32, 9, '2024-11-02 21:04:41', '2024-11-02 21:04:41');

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
  `p_price` varchar(255) NOT NULL,
  `p_image` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `p_name`, `p_price`, `p_image`, `quantity`, `category_id`, `created_at`, `updated_at`) VALUES
(6, 'Sofa', '5022', '1726812275.jpg', '10', 6, '2024-09-20 01:04:35', '2024-11-02 18:15:50'),
(7, 'Wall Light', '231', '1726986159.webp', '3', 5, '2024-09-22 01:22:39', '2024-11-02 20:44:30'),
(8, 'Wall Light 2', '250', '1726986202.jfif', '6', 5, '2024-09-22 01:23:22', '2024-11-02 20:46:47'),
(9, 'Wall Light 3', '300', '1726986221.webp', '44', 5, '2024-09-22 01:23:41', '2024-11-01 19:04:08'),
(10, 'Tray', '5022', '1726986312.webp', '10', 6, '2024-09-22 01:25:12', '2024-09-22 06:31:54'),
(11, 'Tray 2', '416', '1726986334.webp', '45', 6, '2024-09-22 01:25:34', '2024-09-22 01:25:34'),
(12, 'Tray 3', '300', '1726986353.jpg', '11', 6, '2024-09-22 01:25:53', '2024-11-01 14:23:17'),
(16, 'Rest Room', '25000', '1726986689.jpg', '4', 4, '2024-09-22 01:31:29', '2024-09-22 05:32:58'),
(17, 'Italian Room', '25000', '1726986727.jfif', '9', 4, '2024-09-22 01:32:07', '2024-09-22 01:32:07'),
(18, 'Luxury Room', '25000', '1726986770.avif', '9', 4, '2024-09-22 01:32:50', '2024-09-22 01:32:50'),
(21, 'Sofa', '4000', '1730277542.jpg', '7', 5, '2024-10-30 15:39:02', '2024-10-30 15:39:02'),
(22, 'mirror', '3000', '1730277714.jpg', '8', 5, '2024-10-30 15:41:54', '2024-10-30 15:41:54'),
(23, 'panola sofa', '50,00', '1730278978.jpg', '4', 5, '2024-10-30 16:02:58', '2024-10-30 16:02:58'),
(24, 'kitchen catter set', '3090', '1730280059.jpg', '7', 6, '2024-10-30 16:20:59', '2024-10-30 16:20:59'),
(25, 'kitchen cabinet', '6000', '1730280301.jpg', '8', 6, '2024-10-30 16:25:01', '2024-10-30 16:25:01'),
(26, 'kitchen cabinet', '7000', '1730280372.jpg', '14', 6, '2024-10-30 16:26:12', '2024-10-30 16:26:12'),
(27, 'Office table', '30,000', '1730280749.jpg', '13', 8, '2024-10-30 16:32:29', '2024-10-30 16:32:29'),
(28, 'Office calender', '1200', '1730280919.jpg', '19', 8, '2024-10-30 16:35:19', '2024-10-30 16:35:19'),
(29, 'Office chair', '50,000', '1730281118.jpg', '2', 8, '2024-10-30 16:38:38', '2024-10-30 16:38:38'),
(30, 'outdoor decor', '40000', '1730281599.jpg', '14', 9, '2024-10-30 16:46:39', '2024-10-30 16:46:39'),
(31, 'outdoor decor', '9000', '1730281969.jpg', '8', 9, '2024-10-30 16:52:49', '2024-10-30 16:52:49'),
(32, 'outdoor  table set', '5600', '1730282103.jpg', '0', 9, '2024-10-30 16:55:03', '2024-11-02 21:04:41'),
(33, 'outdoor chair', '10000', '1730282267.webp', '8', 9, '2024-10-30 16:57:47', '2024-10-30 16:57:47'),
(34, 'bathroom', '47,000', '1730282971.jpg', '23', 10, '2024-10-30 17:09:31', '2024-10-30 17:09:31'),
(35, 'bathroom', '5100', '1730283021.jpg', '4', 10, '2024-10-30 17:10:21', '2024-10-30 17:10:21'),
(36, 'bathroom', '1200', '1730283071.jpg', '2', 10, '2024-10-30 17:11:11', '2024-10-30 17:11:11'),
(37, 'bathroom', '7000', '1730283174.jpg', '4', 10, '2024-10-30 17:12:54', '2024-10-30 17:12:54'),
(38, 'Badroom', '68000', '1730283464.png', '4', 4, '2024-10-30 17:17:44', '2024-10-30 17:17:44'),
(39, 'badroom', '1200', '1730283544.jpg', '7', 4, '2024-10-30 17:19:04', '2024-10-30 17:19:04'),
(40, 'badroom sofa', '50,000', '1730283957.webp', '2', 4, '2024-10-30 17:25:57', '2024-10-30 17:25:57'),
(41, 'Badroom', '1200', '1730284016.jpg', '8', 4, '2024-10-30 17:26:56', '2024-10-30 17:26:56');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 7, 2, 3, 'fdhjdh', '2024-11-01 13:30:56', '2024-11-01 13:30:56');

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
('U1z0ETG5BmxaqLCnJZ2CxhyNBVE0O3ExbZC7F6d1', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT25zOGpiT3pRaWxmWjBqbVJPeGtlc3BMZUhyTTM5NXpPQlV2WkllYiI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1730556653);

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `time_in`, `time_out`, `date`, `created_at`, `updated_at`) VALUES
(1, '23:33:18', '19:40:18', '2024-09-26', NULL, NULL),
(2, '13:33:18', '22:45:45', '2024-09-26', '2024-09-22 09:45:45', '2024-09-22 10:45:45'),
(3, '07:44:00', '05:44:00', '2024-11-11', '2024-11-02 18:44:19', '2024-11-02 18:44:19'),
(4, '04:46:00', '05:46:00', '2024-11-15', '2024-11-02 18:46:38', '2024-11-02 18:46:38'),
(5, '05:51:00', '08:51:00', '2024-11-13', '2024-11-02 18:51:13', '2024-11-02 18:51:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `address`, `role`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'anum', 'anumta@gmail.com', NULL, '$2y$12$ekyoKO2M9xHAgomQvVET0OwwTXRmrtDlhYrpnaAQXSFrgtV5jt5iq', NULL, NULL, NULL, 'karachi', 'user', 'vDDU1uOl3lgzUtZ2a5hR7MBD7JpVbm7uJEKH8DuRF7K2rLhMGexvpzE2Gs7Y', NULL, NULL, '2024-09-18 10:42:31', '2024-09-18 10:42:31'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$12$kmOUT9x.WrS.5CeyVTCGw.xTbgg1zTMbEyxjJiQ4oqJwPrd9WyxTK', NULL, NULL, NULL, 'karachi', 'admin', NULL, NULL, NULL, '2024-09-18 16:36:23', '2024-09-18 16:36:23'),
(4, 'designer', 'desinger@gmail.com', NULL, '$2y$12$yN4CPC0ezo5eLPOrOCv/b.itxr27Z281nyyxXcBAkDzMi8BclBzBa', NULL, NULL, NULL, 'karachi', 'designer', NULL, NULL, NULL, '2024-09-18 23:14:59', '2024-09-18 23:14:59'),
(5, 'ali', 'ali@gmail.com', NULL, '$2y$12$ZIWiHjDNlZFwLsvo5G5rjumyHStJlsEZKsoiEZiAA/QyMcyLtWS4G', NULL, NULL, NULL, 'malir', 'user', NULL, NULL, NULL, '2024-09-19 02:52:54', '2024-09-19 02:52:54'),
(6, 'Zohaib', 'zohaib@gmail.com', NULL, '$2y$12$/EzPT9LKBhD7gVx2UDgEGe9HgK5jBtwp0YErwn1x7rRjLSjN1VVWG', NULL, NULL, NULL, 'Johar', 'designer', NULL, NULL, NULL, '2024-09-20 12:34:38', '2024-09-20 12:34:38'),
(7, 'monis', 'monis@gmail.com', NULL, '$2y$12$PmUvCTq8tTmYV6YKwy/B7.6JafNaSediBnHQRQ0JSTLxSTjaNjLc6', NULL, NULL, NULL, 'malir', 'designer', NULL, NULL, NULL, '2024-09-22 03:36:36', '2024-09-22 03:36:36'),
(8, 'sana', 'sanaimran@gmail.com', NULL, '$2y$12$qpU6fuEKEUDnItgYti82a.XDxB97raAxz.IT62tvqMUOWaS/5mBkS', NULL, NULL, NULL, 'malir', 'designer', NULL, NULL, NULL, '2024-10-29 14:38:37', '2024-10-29 14:38:37'),
(9, 'abubakar', 'abubakar@gmail.com', NULL, '$2y$12$OLhwhDOi4UYgfRbjCUCUyerWY/CduxqEOb.TJgnymtqN3h0M2Lr7q', NULL, NULL, NULL, 'malir', 'user', NULL, NULL, NULL, '2024-11-01 14:29:49', '2024-11-01 14:29:49'),
(10, 'anumta', 'designeranumta@gmail.com', NULL, '$2y$12$On2yaXM07ZPs98nm4RekRuniS5oqKWhPD/TynsolcKZAzeDuvvdhK', NULL, NULL, NULL, 'Shah Latif Town', 'designer', NULL, NULL, NULL, '2024-11-02 14:26:21', '2024-11-02 14:26:21'),
(11, 'rafay', 'rafay12@gmail.com', NULL, '$2y$12$nUWSpEsk7/OmvGlJF7dbv.1F/J/1Jy.ry3rjkRazMkUR3MxMxuNXu', NULL, NULL, NULL, 'Shah Latif Town', 'designer', NULL, NULL, NULL, '2024-11-02 20:18:15', '2024-11-02 20:18:15'),
(12, 'rafay', 'rafay123@gmail.com', NULL, '$2y$12$lokmASfM7guJyrTERRkmQerF20lAyTRLRs68BExE0IkSZcwWg/t0m', NULL, NULL, NULL, 'Shah Latif Town', 'designer', NULL, NULL, NULL, '2024-11-02 20:32:38', '2024-11-02 20:32:38');

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
(1, 9, 8, '2024-11-01 15:06:52', '2024-11-01 15:06:52'),
(2, 9, 9, '2024-11-01 15:31:09', '2024-11-01 15:31:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `bookingss_phone_unique` (`phone`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacts_user_id_foreign` (`user_id`);

--
-- Indexes for table `designers`
--
ALTER TABLE `designers`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `designers`
--
ALTER TABLE `designers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
