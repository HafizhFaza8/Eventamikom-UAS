-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 25, 2026 at 02:40 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eventtiket_3372`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'IT & Software', 'it-software', '2026-04-23 20:22:29', '2026-04-23 20:22:29'),
(2, 'UI/UX Design', 'uiux-design', '2026-04-23 20:22:29', '2026-04-23 20:22:29'),
(3, 'E-Sport', 'e-sport', '2026-04-23 20:22:29', '2026-04-23 20:22:29'),
(5, 'Sistem Informasi', 'sistem-informasi', '2026-05-25 21:37:45', '2026-05-25 21:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `category_id` bigint UNSIGNED NOT NULL,
  `organizer_id` bigint UNSIGNED DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `stock` int NOT NULL,
  `poster_path` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `category_id`, `organizer_id`, `title`, `description`, `date`, `location`, `price`, `stock`, `poster_path`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Hackathon Unleash 2026', 'Kompetisi coding 24 jam untuk menciptakan solusi inovatif.', '2026-06-15 08:00:00', 'Inkubator Amikom', 0, 50, 'posters/pzWCvKguzT88PtUAhdpkgtrGuNLi1HsuVO75x7wN.png', '2026-04-23 20:22:29', '2026-07-23 05:36:12'),
(2, 2, NULL, 'UI/UX Masterclass', 'Belajar desain produk digital dari industri profesional.', '2026-07-10 10:00:00', 'Cinema Unit 6', 75000, 120, 'posters/event-2.png', '2026-04-23 20:22:29', '2026-04-23 20:22:29'),
(3, 3, NULL, 'E-Sport U-Champ: Valorant', 'Turnamen Valorant bergengsi antar mahasiswa.', '2026-08-05 13:00:00', 'Basement Unit 7', 50000, 32, 'posters/event-3.png', '2026-04-23 20:22:29', '2026-04-23 20:22:29'),
(4, 1, NULL, 'AI & Future Tech Summit', 'Seminar nasional membahas tren AI masa depan.', '2026-09-01 09:00:00', 'Ruang Seminar Unit 5', 25000, 200, 'posters/event-4.png', '2026-04-23 20:22:29', '2026-04-23 20:22:29'),
(5, 2, NULL, 'Workshop Logo Branding', 'Teknik membangun identitas visual yang kuat.', '2026-09-12 10:00:00', 'Lab Multimedia', 30000, 40, 'posters/2zC6LcUW3JBVgTdJh4AB1DKaaaGVjVXCQ5beLRhp.jpg', '2026-04-23 20:22:29', '2026-07-23 05:33:34'),
(6, 3, NULL, 'Mobile Legends Amikom League', 'Liga mingguan komunitas pecinta MLBB.', '2026-10-20 15:00:00', 'Kantin Amikom', 20000, 100, 'posters/udnNSTCdxIwoWyPB9BlaVSIQ3KJtd3dmfVF5l28z.jpg', '2026-04-23 20:22:29', '2026-07-23 05:31:31'),
(8, 1, NULL, 'Lomba Coding', 'mari ramaikan acara ini agarberjalan lancar dan  sukses', '2026-07-23 17:49:00', 'Amikom Baru', 30000, 20, 'posters/fDM07empbcLCTde9ljjXyO92k7DcF5SyEoJfa3Xx.jpg', '2026-07-23 03:49:57', '2026-07-23 06:28:59'),
(9, 5, NULL, 'konser amikom', 'konser organisasi amikom', '2026-07-23 18:19:00', 'Amikom Baru', 20000, 49, 'posters/1HSU9jhnPByZDNXlg8DSaVts0jOh7jGgzXjAhzI5.jpg', '2026-07-23 04:19:37', '2026-07-23 06:42:33'),
(10, 3, 2, 'lomba free fire', 'lomba gaming', '2026-07-28 18:32:00', 'amikom condongcatur', 50000, 49, 'posters/VEoHfe2p5T7rs3dZiyzPvua0szupdw0H90ClrQlA.jpg', '2026-07-23 04:33:18', '2026-07-23 06:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_04_24_024033_create_categories_table', 1),
(5, '2026_04_24_024034_create_events_table', 1),
(6, '2026_04_24_024034_create_transactions_table', 1),
(7, '2026_05_25_163406_create_partners_table', 2),
(8, '2026_05_26_000001_add_url_to_partners_table', 3),
(9, '2026_07_23_083324_add_google_id_to_users_table', 4),
(10, '2026_07_23_095535_create_reviews_table', 5),
(11, '2026_07_23_100210_create_organizers_table', 6),
(12, '2026_07_23_100215_add_organizer_id_to_events_table', 6),
(13, '2026_07_23_104533_alter_role_column_in_users_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `organizers`
--

CREATE TABLE `organizers` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'approved',
  `is_verified` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `organizers`
--

INSERT INTO `organizers` (`id`, `user_id`, `name`, `slug`, `description`, `logo_path`, `status`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 5, 'HIMASI', 'himasi-jQME', 'organisasi ini adalah himpunan mahasiswa sistem informasi', NULL, 'approved', 1, '2026-07-23 03:46:21', '2026-07-23 03:46:21'),
(2, 6, 'JAGOCODING', 'jagocoding-Hidx', 'coding handal', NULL, 'approved', 1, '2026-07-23 04:11:06', '2026-07-23 04:11:06');

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `name`, `logo_url`, `url`, `created_at`, `updated_at`) VALUES
(5, 'Toko Pedia', 'partners/EYlP1fGgiIXj4v9aIt0bSFPbkrvdbv4Gtdr6Qwjf.jpg', 'https://www.tokopedia.com/', '2026-05-25 21:06:40', '2026-05-25 21:06:40'),
(6, 'Amazon', 'partners/mElcJaO6qDYxSL0KtgO4Yp4B9penWtYLRkoUhCDs.jpg', 'https://www.amazon.com/', '2026-05-25 21:51:50', '2026-05-25 22:12:44'),
(8, 'Youtube', 'partners/NTpm76rb27CwdN6cA2lD1rgC40TjXjo7GnMaDZhy.png', 'https://www.youtube.com/', '2026-06-05 17:21:35', '2026-06-05 17:21:35');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` tinyint UNSIGNED NOT NULL DEFAULT '5',
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `organizer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ABP Productions',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `event_id`, `user_id`, `customer_name`, `customer_email`, `rating`, `comment`, `organizer_name`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 'Hfdh Irfan', 'hfdhirfan@gmail.com', 5, 'josjis', 'ABP Productions', '2026-07-23 03:32:03', '2026-07-23 03:32:03'),
(2, 10, 8, 'Iyan Ihsanu', 'iyanihsanu88@gmail.com', 5, 'event yang bagus', 'ABP Productions', '2026-07-23 06:31:25', '2026-07-23 06:31:25'),
(3, 9, 8, 'Iyan Ihsanu', 'iyanihsanu88@gmail.com', 5, 'event yang cukup bagus', 'ABP Productions', '2026-07-23 06:44:35', '2026-07-23 06:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('dJKivhWgsC8CbqlX6LxFyQXKf4qp1CS7PtpJ5BWm', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Code/1.129.0 Chrome/148.0.7778.280 Electron/42.6.0 Safari/537.36', 'eyJfdG9rZW4iOiJpdzZnYUdWWWFCSmREd093SWpJSlpqZ2hyZUVycFNtMDhlUXRhV3BBIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1784820132),
('gUX1dw9k7H8Nrg3W59XEbj3goHVWy51YylBM1G8j', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJic0xabHNvZ1JRVWc3VEc3dmttemJra1BSUXVLYkdSakFjZVlDd2Q4IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cLzEyNy4wLjAuMTo4MDAwIiwicm91dGUiOiJob21lIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfX0=', 1784820151),
('ygm80tZdyud9eAigAoKMVPSr58jcot21prTmLPW1', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/150.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiIwS1hYYnIzU2J0czd0RkdPbTNOZ2EwRXlUM2tKblQwblZFU1BpUElRIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC90cmFuc2FjdGlvbnMiLCJyb3V0ZSI6ImFkbWluLnRyYW5zYWN0aW9ucy5pbmRleCJ9LCJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI6MX0=', 1784814727);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `order_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `snap_token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `event_id`, `order_id`, `customer_name`, `customer_email`, `customer_phone`, `total_price`, `status`, `snap_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'TRX-1781284758-NTSOs', 'bagus', 'bagus@gmail.com', '0847824773', 5000, 'expire', NULL, '2026-06-12 10:19:18', '2026-07-23 04:52:18'),
(2, 1, 'TRX-1782442504-2PUKf', 'b', 'bagus@gmail.com', '439893', 5000, 'expire', NULL, '2026-06-25 19:55:04', '2026-07-23 04:52:18'),
(3, 1, 'TRX-1782442620-B8z9f', 'bagus n', 'bagus@gmail.com', '645846583', 5000, 'expire', 'bd44bdaf-f8f7-4a1a-a4ed-7650c6f19b81', '2026-06-25 19:57:00', '2026-07-23 04:52:18'),
(4, 1, 'TRX-1782442724-LgRX0', 'bagus', 'bagus@gmail.com', '439639639', 5000, 'expire', '0d2a9ef9-908d-4658-9eb1-2b59af95b1d6', '2026-06-25 19:58:44', '2026-07-23 04:52:18'),
(5, 1, 'TRX-1782442816-RKoRa', 'bagus', 'bagus326@gmail.com', '081359097702', 5000, 'expire', 'd223382a-60c5-4035-b8c8-a72a9ddab584', '2026-06-25 20:00:16', '2026-07-23 04:52:18'),
(6, 1, 'TRX-1782443370-OL7QD', 'bagus', 'bagus326@gmail.com', '081359097702', 5000, 'expire', 'b9f3d0a4-1b8a-4b79-921c-4a9625148404', '2026-06-25 20:09:30', '2026-07-23 04:52:18'),
(7, 1, 'TRX-1782443952-L2hFP', 'bagus', 'bagus@gmail.com', '923847247', 5000, 'expire', '31903933-25d2-44e7-9db4-f79f5c912e3a', '2026-06-25 20:19:12', '2026-07-23 04:52:18'),
(8, 1, 'TRX-1783046087-JdNjc', 'bagus', 'bagus@gmail.com', '0235802752', 5000, 'expire', 'cd88af6d-4dfc-43c2-975d-b34736013db5', '2026-07-02 19:34:47', '2026-07-23 04:52:18'),
(9, 1, 'TRX-1783048952-Zd1en', 'irpan', 'irpan@gmail.com', '084162512864', 5000, 'expire', '5749468f-7c8e-4e97-b026-d71ac03f0201', '2026-07-02 20:22:32', '2026-07-23 04:52:18'),
(10, 1, 'TRX-1783049009-b6yox', 'irpan', 'irpan@gmail.com', '084162512864', 5000, 'expire', '007bb8e0-bdcc-4e47-bdb5-61571e093152', '2026-07-02 20:23:29', '2026-07-23 04:52:18'),
(11, 1, 'TRX-1784794929-FdAP1', 'q', 'hafidhirfan21@students.amikom.ac.id', '02313531355', 5000, 'expire', 'f3744b12-b3c9-419b-8e6f-069c79dbfafb', '2026-07-23 01:22:09', '2026-07-23 04:52:18'),
(12, 1, 'TRX-1784795260-Mo6xV', '3372_HAFIDH IRFANUDIN ZUHDI', 'hafidhirfan21@students.amikom.ac.id', '02313531355', 5000, 'expire', '46c387c7-d054-4cd6-835b-fc10e8ae91c2', '2026-07-23 01:27:40', '2026-07-23 04:52:18'),
(13, 1, 'TRX-1784796024-LpRAi', 'asdff', 'hafidhirfan21@students.amikom.ac.id', '02313531355', 5000, 'expire', '5e02e7be-5a95-450b-ae28-218979723361', '2026-07-23 01:40:24', '2026-07-23 04:52:18'),
(14, 1, 'TRX-1784800370-ec9av', '3372_HAFIDH IRFANUDIN ZUHDI', 'hafidhirfan21@students.amikom.ac.id', '08214337874892', 5000, 'expire', '0c2116d5-751a-43f2-b4a9-7b9e612dbfae', '2026-07-23 02:52:50', '2026-07-23 04:52:18'),
(15, 1, 'TRX-1784807544-H5ABM', 'Hfdh Irfan', 'hfdhirfan@gmail.com', '08214337874892', 5000, 'expire', '6dea263c-6a57-42a1-9444-3f65731d589d', '2026-07-23 04:52:24', '2026-07-23 05:08:24'),
(16, 10, 'TRX-1784808035-NDA5C', 'Hfdh Irfan', 'hfdhirfan@gmail.com', '08214337874892', 55000, 'expire', '4744a844-4b85-4a11-9bf3-d7b80db45a70', '2026-07-23 05:00:35', '2026-07-23 05:17:55'),
(17, 9, 'TRX-1784808794-MdiNC', '3361_Iyan Ihsanu Yafi', 'iyanihsanu@students.amikom.ac.id', '084622562422', 25000, 'expire', '260e2604-5c8c-4b6a-9e31-bcb35fb01c25', '2026-07-23 05:13:14', '2026-07-23 05:46:36'),
(18, 10, 'TRX-1784809399-UO1VD', '3361_Iyan Ihsanu Yafi', 'iyanihsanu@students.amikom.ac.id', '0231353135567', 55000, 'expire', '70817bf0-6cea-45b9-aee7-ce33e3bfd415', '2026-07-23 05:23:19', '2026-07-23 05:46:36'),
(19, 8, 'TRX-1784810866-eh4Da', 'Iyan Ihsanu', 'iyanihsanu88@gmail.com', '08214337874892', 35000, 'expire', 'bc47417d-10b7-4e47-9076-959534f30e00', '2026-07-23 05:47:46', '2026-07-23 06:28:59'),
(20, 10, 'TRX-1784813392-5zizf', 'Iyan Ihsanu', 'iyanihsanu88@gmail.com', '08214337874892', 55000, 'pending', 'fcfa6ee8-b915-4207-be7e-67f0f658c968', '2026-07-23 06:29:52', '2026-07-23 06:29:53'),
(21, 9, 'TRX-1784814153-fhMAX', 'Iyan Ihsanu', 'iyanihsanu88@gmail.com', '02313531355', 25000, 'pending', '3fa0f91c-bd52-4b7f-86ae-a65a84864995', '2026-07-23 06:42:33', '2026-07-23 06:42:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `google_id`, `avatar`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`) VALUES
(1, 'Admin Amikom', 'admin@amikom.ac.id', NULL, NULL, NULL, '$2y$12$/YTBtgVw7cIV6tkrD9vzAOQnag1t7o20HZjqIpuIdv4oMiU.d6Qwm', NULL, '2026-04-23 20:22:29', '2026-05-25 21:19:34', 'admin'),
(2, 'Admin Backup', 'admin2@amikom.ac.id', NULL, NULL, NULL, '$2y$12$CHsF0ObftNJGNU8s.k71MOLaadvwsyBu3ZLcv8Bm8yS/z2hJpFoue', NULL, '2026-05-25 21:18:23', '2026-05-25 21:19:35', 'admin'),
(3, '3372_HAFIDH IRFANUDIN ZUHDI', 'hafidhirfan21@students.amikom.ac.id', '103436841309491872661', 'https://lh3.googleusercontent.com/a/ACg8ocJNAC_RShB_7vocpEC0sH-RCOhETehNp6ROeY9bsIlCY9aaBA=s96-c', NULL, NULL, 'K3a7uVlM2mhmM8Ga3fcIZLPeU5nwMnz1XSdWvDhfh3ptFDvWX4kq8cKmGHqV', '2026-07-23 02:52:15', '2026-07-23 02:52:15', 'user'),
(4, 'Hfdh Irfan', 'hfdhirfan@gmail.com', '108707628351961107854', 'https://lh3.googleusercontent.com/a/ACg8ocJ262UNj7Xfk22k9j2k6EB_N6QL0i4scKSbjaifkq_hqC2kxwQ=s96-c', NULL, NULL, 'SAthnpXYTDuJ5CK5gClveqaEC3Cfehq48GQe3pJAkWODtRGYXBfEL1W9x1Jk', '2026-07-23 03:25:56', '2026-07-23 03:25:56', 'user'),
(5, 'HIMASI', 'himasi@gmail.com', NULL, NULL, NULL, '$2y$12$4yuc/11VisjzHrb9nUN32.eTMU352lt2oKK.GtVoz3AZsN73GNAl.', NULL, '2026-07-23 03:46:21', '2026-07-23 03:46:21', 'organizer'),
(6, 'JAGOCODING', 'iyan@gmail.com', NULL, NULL, NULL, '$2y$12$/dF7J9kGC558jT..cfVAeu6Z38xRL57kLEuGw/dvvxkN9X7g6lVFe', NULL, '2026-07-23 04:11:06', '2026-07-23 04:11:06', 'organizer'),
(7, '3361_Iyan Ihsanu Yafi', 'iyanihsanu@students.amikom.ac.id', '106404925971684180939', 'https://lh3.googleusercontent.com/a/ACg8ocJ66RIV4ZPy4uaPWYtLhz0AetaF65NwgDtnbFcUCdgtjWV1Dw=s96-c', NULL, NULL, 'cRc798MHV036drycn7V17lzkIRmXqrWYPbo4nIL6Tz1NTd0hSMM0qI1UVEsQ', '2026-07-23 05:12:50', '2026-07-23 05:12:50', 'user'),
(8, 'Iyan Ihsanu', 'iyanihsanu88@gmail.com', '103038903049380205216', 'https://lh3.googleusercontent.com/a/ACg8ocJJMQZTzN2Q-pu0hbYBzxHa40iuIhfUN-OEJD8AgZaO9SYDMQ=s96-c', NULL, NULL, 'G04PHlccda0SQqJzMo8hjroFXX09IHuTOMESVzY7P4nNux1Pk97eIHb0sqpZ', '2026-07-23 05:45:50', '2026-07-23 05:45:50', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_category_id_foreign` (`category_id`),
  ADD KEY `events_organizer_id_foreign` (`organizer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `organizers`
--
ALTER TABLE `organizers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `organizers_slug_unique` (`slug`),
  ADD KEY `organizers_user_id_foreign` (`user_id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_event_id_foreign` (`event_id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_order_id_unique` (`order_id`),
  ADD KEY `transactions_event_id_foreign` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_google_id_unique` (`google_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `organizers`
--
ALTER TABLE `organizers`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `events_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `events_organizer_id_foreign` FOREIGN KEY (`organizer_id`) REFERENCES `organizers` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `organizers`
--
ALTER TABLE `organizers`
  ADD CONSTRAINT `organizers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
