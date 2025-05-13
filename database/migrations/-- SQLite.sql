-- SQLite
-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2024 at 05:23 PM
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
-- Database: `cimartne_cimart`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postal_code` varchar(20) NOT NULL,
  `country` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image_url` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image_url`, `created_at`, `updated_at`) VALUES
(3, 'Snacks', '01J9GD0DRNH1VJRHTKPKJS72HC.png', '2024-09-21 22:06:07', '2024-10-06 00:51:51'),
(4, 'Minuman', '', '2024-09-21 22:11:38', '2024-10-06 00:23:10'),
(5, 'Masakan', '', '2024-09-21 22:13:53', '2024-10-06 00:23:00'),
(6, 'Produk Fresh', '', '2024-10-06 00:21:45', '2024-10-06 00:21:45'),
(7, 'Produk Kebersihan', '', '2024-10-06 00:21:54', '2024-10-06 00:22:31'),
(8, 'Semabako', '', '2024-10-06 00:23:38', '2024-10-06 00:23:38'),
(9, 'Produk Kesehatan', '', '2024-10-06 00:23:48', '2024-10-06 00:23:48'),
(10, 'Frozen Food', '', '2024-10-06 00:24:18', '2024-10-06 00:24:18'),
(11, 'Kerajinan', '', '2024-10-06 00:24:54', '2024-10-06 00:24:54');

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
-- Table structure for table `hero`
--

CREATE TABLE `hero` (
  `id` bigint(20) NOT NULL,
  `image_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hero`
--

INSERT INTO `hero` (`id`, `image_url`) VALUES
(1, '01J9GEPR8HHJYYEKH5C2MG650D.jpg'),
(2, '01J9GESRZVBJ7JC8AM8JZ62WRT.jpg');

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
-- Table structure for table `merchant_payments`
--

CREATE TABLE `merchant_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `merchant_reviews`
--

CREATE TABLE `merchant_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `merchant_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(4, '2024_08_19_191849_migration', 1),
(5, '2024_08_21_020523_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_order_id` bigint(20) UNSIGNED NOT NULL,
  `total_price` decimal(10,2) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_order_id`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(54, 1, 1, 20000.00, 'pending', '2024-09-24 05:57:09', '2024-09-24 05:57:09'),
(55, 1, 1, 10000.00, 'pending', '2024-09-24 18:32:18', '2024-09-24 18:32:18'),
(56, 1, 1, 10000.00, 'pending', '2024-09-24 18:32:42', '2024-09-24 18:32:42'),
(57, 1, 1, 5000.00, 'pending', '2024-09-24 19:19:37', '2024-09-24 19:19:37'),
(58, 1, 1, 5000.00, 'pending', '2024-09-24 19:20:05', '2024-09-24 19:20:05'),
(59, 1, 1, 5000.00, 'pending', '2024-09-24 19:20:36', '2024-09-24 19:20:36'),
(60, 1, 1, 10000.00, 'pending', '2024-09-24 19:28:55', '2024-09-24 19:28:55'),
(64, 1, 1, 10000.00, 'pending', '2024-09-24 19:44:17', '2024-09-24 19:44:17'),
(65, 1, 1, 10000.00, 'pending', '2024-09-24 19:47:18', '2024-09-24 19:47:18'),
(66, 1, 1, 900000.00, 'pending', '2024-09-24 19:52:13', '2024-09-24 19:52:13'),
(67, 1, 1, 900000.00, 'pending', '2024-09-24 19:53:42', '2024-09-24 19:53:42'),
(68, 1, 1, 900000.00, 'pending', '2024-09-24 19:54:11', '2024-09-24 19:54:11'),
(69, 1, 9, 900000.00, 'pending', '2024-09-24 20:02:02', '2024-09-24 20:02:02'),
(70, 1, 1, 50000.00, 'pending', '2024-10-05 21:07:41', '2024-10-05 21:07:41'),
(71, 1, 1, 10000.00, 'pending', '2024-10-05 22:33:21', '2024-10-05 22:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(54, 54, 8, 1, 10000.00, NULL, NULL),
(55, 54, 16, 1, 10000.00, NULL, NULL),
(56, 55, 9, 1, 10000.00, NULL, NULL),
(57, 56, 9, 1, 10000.00, NULL, NULL),
(58, 57, 13, 1, 5000.00, NULL, NULL),
(59, 58, 13, 1, 5000.00, NULL, NULL),
(60, 59, 13, 1, 5000.00, NULL, NULL),
(61, 60, 10, 1, 10000.00, NULL, NULL),
(62, 64, 5, 1, 10000.00, NULL, NULL),
(63, 65, 4, 1, 10000.00, NULL, NULL),
(64, 66, 18, 1, 900000.00, NULL, NULL),
(65, 67, 18, 1, 900000.00, NULL, NULL),
(66, 68, 18, 1, 900000.00, NULL, NULL),
(67, 69, 18, 1, 900000.00, NULL, NULL),
(68, 70, 4, 1, 10000.00, NULL, NULL),
(69, 70, 4, 1, 10000.00, NULL, NULL),
(70, 70, 4, 1, 10000.00, NULL, NULL),
(71, 70, 4, 1, 10000.00, NULL, NULL),
(72, 70, 4, 1, 10000.00, NULL, NULL),
(73, 71, 4, 1, 10000.00, NULL, NULL);

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
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(100) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `image_url` text NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image_url`, `text`) VALUES
(1, 'Testing Lorem Ipsum', '01J9G5NCYAWNXB087RJ28WVNW2.jpg', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc pellentesque molestie dignissim. Aliquam tempor lacus commodo cursus rutrum. Suspendisse facilisis lectus tortor, quis auctor eros molestie non. Aenean turpis tortor, varius vel urna vel, aliquet varius lacus. Integer sagittis placerat semper. Phasellus velit massa, condimentum in porta sit amet, consectetur at orci. Cras ex nisl, fermentum et ex quis, mollis pretium nibh. Aliquam erat volutpat. Aliquam nisi velit, elementum vitae feugiat placerat, facilisis at urna. Nunc quis molestie ipsum, eget pulvinar mi.</p><p>Phasellus vel quam nec nunc dignissim ornare. In hac habitasse platea dictumst. Phasellus cursus est metus, nec blandit nunc porta at. Ut auctor risus nec convallis porta. Vestibulum dignissim finibus tortor varius semper. Cras nisl lorem, dignissim ac ex ut, vestibulum condimentum enim. Aenean leo eros, hendrerit vitae enim ut, malesuada iaculis tellus. Nullam finibus est et arcu porta, nec pharetra arcu tincidunt. Integer sit amet nisl in sem ornare sodales. Nunc viverra lacus mi, in gravida magna sollicitudin eleifend. Nam placerat sed ante a interdum. Donec id aliquet urna. Suspendisse eu tortor turpis. Mauris non ex libero.</p><p>Integer nunc nisl, malesuada a lacinia in, vulputate imperdiet nibh. Fusce vulputate venenatis nisi sed porttitor. Sed eget nisl elit. Proin sagittis sem vel laoreet volutpat. Etiam varius accumsan placerat. Donec placerat purus quis orci auctor finibus. In hac habitasse platea dictumst. Proin quis posuere neque. Nullam sed placerat neque, sit amet sagittis massa. Aenean fermentum tellus sed odio sodales ullamcorper vel eget quam.</p><p>Aliquam orci dui, egestas in dolor ac, malesuada vehicula orci. Donec sodales eget nunc vel rutrum. Morbi tincidunt mauris non odio suscipit rutrum. Aenean sed leo vel justo ornare vehicula a eu nisi. Interdum et malesuada fames ac ante ipsum primis in faucibus. Aenean congue felis nibh, sit amet pretium ex bibendum id. Donec efficitur interdum ligula, id euismod lectus pellentesque at. Praesent volutpat eu velit eget tempus. Donec dapibus eget lectus eu varius. Sed egestas arcu a quam egestas maximus. Sed convallis lectus eu nisl eleifend tincidunt.</p><p>Sed convallis arcu a mauris auctor faucibus. Maecenas tellus urna, laoreet sollicitudin mattis a, ornare a ipsum. Ut pharetra aliquam posuere. Quisque at felis luctus, rutrum justo et, dapibus enim. Nullam id odio at mauris facilisis laoreet eu posuere nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent ante leo, fermentum in quam vel, elementum molestie mi. Sed accumsan fringilla ipsum at varius.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discounted_price` bigint(255) NOT NULL,
  `stock` int(11) NOT NULL,
  `viewcount` int(11) NOT NULL,
  `stars` int(11) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `image_url`, `user_id`, `name`, `description`, `price`, `discounted_price`, `stock`, `viewcount`, `stars`, `category_id`, `created_at`, `updated_at`) VALUES
(4, '01J8C20YH2JGYX8TP8R51NEEM3.jpg', 1, 'Sayur Bayam', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 10000.00, 0, 9994, 25, 0, 6, '2024-09-21 22:07:14', '2024-10-06 01:10:18'),
(5, '01J8C23PQCX7HTKPKQS277YYR3.jpg', 1, 'Brownies', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently witum</p>', 10000.00, 1000, 98, 3, 0, 3, '2024-09-21 22:08:44', '2024-10-06 05:41:24'),
(6, '01J8C299SNBMFQ16K0NH0T26GW.jpg', 1, 'Minuman Sayur', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 10000.00, 1000, 9, 3, 0, 4, '2024-09-21 22:11:48', '2024-10-06 06:50:00'),
(7, '01J8C2E72XDWD4RYV3GDQEJA78.jpg', 1, 'Basreng', '<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p>', 10000.00, 1000, 120, 6, 0, 5, '2024-09-21 22:14:29', '2024-10-06 00:18:42'),
(8, '01J8CPQ1KHHHDXYE1RHQV7KB4G.jpg', 1, 'Jus Buah', '<p>-</p>', 10000.00, 0, 1, 0, 0, 4, '2024-09-22 04:08:50', '2024-09-24 05:57:09'),
(9, '01J8CWD5WWKGF8PW53JCXG8QT1.jpg', 1, 'Rempeyek', '<p>-</p>', 10000.00, 0, 97, 0, 0, 5, '2024-09-22 05:48:18', '2024-09-24 18:32:42'),
(10, '01J8DYX0059HT212HDNRGK4M88.jpg', 1, 'Risolles', '<p>-</p>', 10000.00, 0, 99, 4, 0, 3, '2024-09-22 15:51:08', '2024-10-06 06:50:41'),
(13, '01J8FFZDD7V15KT5WTPQYTBN5D.jpg', 1, 'Kembang Goyan', '<p>-</p>', 5000.00, 0, 187, 0, 0, 5, '2024-09-23 06:08:47', '2024-09-24 19:20:36'),
(14, '01J8FSEWCDXJQW3PXFJAXC42R9.jpg', 1, 'Bubuk Jahe', '<p>-</p>', 10000.00, 0, 120, 0, 0, 4, '2024-09-23 08:54:31', '2024-09-23 08:54:31'),
(15, '01J8FSN3B34E5ZY4J520WSB115.jpg', 1, 'Siomay?', '<p>-</p>', 10000.00, 0, 100, 0, 0, 3, '2024-09-23 08:57:55', '2024-09-23 08:57:55'),
(16, '01J8FSQRTKNFA9SFQW8S2RQ1RX.jpg', 1, 'Cireng', '<p>-</p>', 10000.00, 0, 99, 2, 0, 3, '2024-09-23 08:59:22', '2024-10-05 22:06:16'),
(17, '01J8FSY1CFHP3X0M7GDBT31WJF.jpg', 1, 'Crocket', '<p>-</p>', 10000.00, 0, 90, 0, 0, 5, '2024-09-23 09:02:48', '2024-09-23 09:03:04'),
(18, '01J8FT3M29J5RYBFAVZ17F0RF9.jpg', 1, 'Cokelat', '<p>-</p>', 900000.00, 0, 97, 1, 0, 5, '2024-09-23 09:05:51', '2024-10-06 05:56:22'),
(19, '01J8FT8HBA788ZFB1TMYDER7JK.jpg', 1, 'Jus Buah 2', '<p>-</p>', 10000.00, 0, 9000, 0, 0, 4, '2024-09-23 09:08:32', '2024-09-23 09:08:32'),
(20, '01J8FTAQ720CY0F45Q7RRGY9FX.jpg', 1, 'Jus Buah 2', '<p>-</p>', 10000.00, 0, 100, 0, 0, 4, '2024-09-23 09:09:43', '2024-09-23 09:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `recomendation`
--

CREATE TABLE `recomendation` (
  `id` bigint(40) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recomendation`
--

INSERT INTO `recomendation` (`id`, `product_id`) VALUES
(1, 4),
(2, 5),
(3, 7),
(4, 10),
(5, 16);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 1, 'LMAO', '2024-10-05 23:38:09', '2024-10-05 23:38:09'),
(2, 1, 4, 1, 'LMAO', '2024-10-05 23:38:21', '2024-10-05 23:38:21'),
(3, 1, 4, 4, 'LMAO', '2024-10-05 23:45:29', '2024-10-05 23:45:29'),
(4, 1, 7, 3, 'lol', '2024-10-06 00:18:50', '2024-10-06 00:18:50'),
(5, 1, 7, 1, 'lo', '2024-10-06 00:19:04', '2024-10-06 00:19:04'),
(6, 1, 5, 4, 'Aku Suka Brownies', '2024-10-06 02:17:42', '2024-10-06 02:17:42'),
(7, 1, 6, 5, 'lmmmmmmmmmmmmmmmmmmmmm', '2024-10-06 06:50:17', '2024-10-06 06:50:17');

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
('GphdBdP9c271ctM3ZLiYyuy3pf9uQdPT6k8IvWvp', 2, '::1', 'Mozilla/5.0 (iPhone; CPU iPhone OS 16_6 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/16.6 Mobile/15E148 Safari/604.1', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiemVSZzZrSjdpVGVBZnJ6cGhEZllLMGlxTzV4cnJlMEZrVlNEVnRjUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1728227778),
('WkNL2KP2Xg4sKTYqMvi9Xi2Xt3XEKd2I0BywFabd', 1, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiVFJtZFdONXBRTExRaG03OHBJZkFqOGM5WWNrNU5CYW1NY1NpRWQ5YiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9sb2NhbGhvc3QvZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMiRWZjdLMEJwVDZtOC5BeW0zb2RqYlB1Q3NKSEYueGQuVjhiSDNUZWxnQVlOZDUzd1pzMEc5bSI7fQ==', 1728227598);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(81, 1, 4, 1, '2024-10-05 23:25:15', '2024-10-05 23:25:15'),
(82, 1, 9, 1, '2024-10-05 23:25:55', '2024-10-05 23:25:55'),
(83, 2, 4, 1, '2024-10-06 00:57:13', '2024-10-06 00:57:13'),
(84, 1, 4, 1, '2024-10-06 01:40:23', '2024-10-06 01:40:23'),
(85, 1, 4, 1, '2024-10-06 02:08:34', '2024-10-06 02:08:34'),
(86, 1, 5, 1, '2024-10-06 02:10:34', '2024-10-06 02:10:34'),
(87, 1, 14, 1, '2024-10-06 02:16:40', '2024-10-06 02:16:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `role` enum('user','merchant') NOT NULL DEFAULT 'user',
  `business_name` varchar(255) DEFAULT NULL,
  `business_address` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone_number`, `email_verified_at`, `remember_token`, `address`, `role`, `business_name`, `business_address`, `created_at`, `updated_at`) VALUES
(1, 'Rizki Ramadhani', 'rizkiko368@gmail.com', '$2y$12$Vf7K0BpT6m8.Aym3odjbPuCsJHF.xd.V8bH3TelgAYNd53wZs0G9m', '0881011205176', '2024-08-20 23:26:07', '4zv0rkoniAqcUk4F9GKNN3rG4K4fRJcH9sm2V7bbOjo8Zv2wRfwrUbHH5iWP', 'Ciomsa', 'merchant', NULL, NULL, '2024-08-20 23:26:07', '2024-08-20 23:26:07'),
(2, 'Rizki Ramadhani', 'rizkiko368@gsdsdmail.com', '$2y$12$UoUp4uc.NHLps9LhhThUDesbgziJ0kmz6cdxp7MfB1RvMx9x9NFi.', NULL, NULL, NULL, NULL, 'user', NULL, NULL, '2024-09-17 18:44:00', '2024-09-17 18:44:00'),
(6, 'RIzki Ramadhani', 'romadhanus@admin', '$2y$12$2lx2WAHkIcLPPqVrVy9zmeUVB.dJw7f4IzWQXdP6FQKDcPcxESrtS', '0881011205176', NULL, NULL, NULL, 'merchant', NULL, NULL, '2024-09-24 18:25:24', '2024-09-24 18:25:24'),
(8, 'RIzki Ramadhani', 'admin@gmail.com', '$2y$12$enTvBmF/AwpHoffRXV5HoO/h8Ah4EoNVDoGDJgSIH.Sje5Gzr16U6', '0881011205176', NULL, NULL, 'Jl Gunung Sari Kecamatan Way Khilau Kab Pesawaran', 'merchant', NULL, NULL, '2024-09-24 18:29:10', '2024-09-24 18:29:10'),
(9, 'Satria', 'rizkiramadhani@gmail.com', '$2y$12$KPRB4X0/34RgSu3TsKv5LOhwKnM5DtzBDi9PoKFU30Zgo9hT91H3.', '0881011205176', NULL, NULL, 'Jl Gunung Sari Kecamatan Way Khilau Kab Pesawaran', 'user', NULL, NULL, '2024-09-24 19:24:52', '2024-09-24 19:24:52'),
(10, 'Rizki Ramadhani', NULL, '$2y$12$VHEsSuBab4FOqtNJYfBPfeMq3hrhreiXLSmDmKVmfEF7uDAhNslLS', '0881011205176', NULL, NULL, 'Jl Gunung Sari Kecamatan Way Khilau Kab Pesawaran', 'user', NULL, NULL, '2024-10-06 01:10:04', '2024-10-06 01:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `website_person`
--

CREATE TABLE `website_person` (
  `id` bigint(40) NOT NULL,
  `name` text NOT NULL,
  `image_url` text NOT NULL,
  `website_setting_id` bigint(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_person`
--

INSERT INTO `website_person` (`id`, `name`, `image_url`, `website_setting_id`) VALUES
(1, 'Rizki Ramadhani', '01J8KEBKFSW4XPQXP09YSB445Y.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `website_settings`
--

CREATE TABLE `website_settings` (
  `id` bigint(40) NOT NULL,
  `description` text NOT NULL,
  `phone_number` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `website_settings`
--

INSERT INTO `website_settings` (`id`, `description`, `phone_number`) VALUES
(1, '<h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><h2>What is Lorem Ipsum?</h2><p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum</p><p><br><br></p>', '62881011205176');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

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
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hero`
--
ALTER TABLE `hero`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `merchant_payments`
--
ALTER TABLE `merchant_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_payments_user_id_foreign` (`user_id`),
  ADD KEY `merchant_payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `merchant_reviews`
--
ALTER TABLE `merchant_reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `merchant_reviews_user_id_foreign` (`user_id`),
  ADD KEY `merchant_reviews_merchant_id_foreign` (`merchant_id`);

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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `user_order_id` (`user_order_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_user_id_foreign` (`user_id`);

--
-- Indexes for table `recomendation`
--
ALTER TABLE `recomendation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Products` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_cart_user_id_foreign` (`user_id`),
  ADD KEY `shopping_cart_product_id_foreign` (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `website_person`
--
ALTER TABLE `website_person`
  ADD PRIMARY KEY (`id`),
  ADD KEY `web` (`website_setting_id`);

--
-- Indexes for table `website_settings`
--
ALTER TABLE `website_settings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hero`
--
ALTER TABLE `hero`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant_payments`
--
ALTER TABLE `merchant_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `merchant_reviews`
--
ALTER TABLE `merchant_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `recomendation`
--
ALTER TABLE `recomendation`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `website_person`
--
ALTER TABLE `website_person`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `website_settings`
--
ALTER TABLE `website_settings`
  MODIFY `id` bigint(40) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `merchant_payments`
--
ALTER TABLE `merchant_payments`
  ADD CONSTRAINT `merchant_payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `merchant_payments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `merchant_reviews`
--
ALTER TABLE `merchant_reviews`
  ADD CONSTRAINT `merchant_reviews_merchant_id_foreign` FOREIGN KEY (`merchant_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `merchant_reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_order_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recomendation`
--
ALTER TABLE `recomendation`
  ADD CONSTRAINT `Products` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `shopping_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `website_person`
--
ALTER TABLE `website_person`
  ADD CONSTRAINT `web` FOREIGN KEY (`website_setting_id`) REFERENCES `website_settings` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;