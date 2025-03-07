-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2025 at 11:52 PM
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
-- Database: `school`
--

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
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `name`, `created_at`, `updated_at`) VALUES
('01956f2f-be69-71eb-99c1-f6c19e674f3b', 'Class A', '2025-03-06 22:59:14', '2025-03-06 23:30:33'),
('01956f4a-119d-702f-a3c7-dc2926f05dcc', 'Class B', '2025-03-06 23:28:00', '2025-03-06 23:30:49'),
('01956f4a-2a1b-7264-b0d4-3584e6ba6e39', 'Class C', '2025-03-06 23:28:06', '2025-03-06 23:28:06'),
('01956fc2-f249-73e8-a0fd-06157411fdd6', 'Class D', '2025-03-07 01:40:01', '2025-03-07 01:40:01');

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
(4, '2025_03_07_031340_create_classrooms_table', 1),
(5, '2025_03_07_032831_create_students_and_teachers_table', 1);

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
('THJCReUwMU0tSAKB7I33KexN4byWJVsOc9SGnVqI', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTkk3bWpFU2Rhd282NzRPMVVVTUJ3SkJnMUk2blkzMVV4eGJsMkR0MiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyO30=', 1741387903);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `class_id`, `created_at`, `updated_at`) VALUES
('01956f71-d66b-705b-807a-58a8df49e2a0', 'Ariel Moses', '01956fc2-f249-73e8-a0fd-06157411fdd6', '2025-03-07 00:11:26', '2025-03-07 02:37:56'),
('01956f71-ea5c-7204-945e-2af26e3daa89', 'Kamal Hess', '01956f2f-be69-71eb-99c1-f6c19e674f3b', '2025-03-07 00:11:31', '2025-03-07 02:58:39'),
('01957004-77bc-72a8-a2bf-c8d172129a16', 'Jasmine Hopper', '01956fc2-f249-73e8-a0fd-06157411fdd6', '2025-03-07 02:51:35', '2025-03-07 02:51:35'),
('01957004-8b6d-738e-be88-3d00107faecf', 'Winter Black', '01956f4a-119d-702f-a3c7-dc2926f05dcc', '2025-03-07 02:51:40', '2025-03-07 02:51:40'),
('01957004-9c0d-72ab-9a16-493c669d2930', 'Audrey Sutton', '01956f4a-2a1b-7264-b0d4-3584e6ba6e39', '2025-03-07 02:51:45', '2025-03-07 02:57:36'),
('01957004-abc9-71ad-bfc8-991aefc7b736', 'Tyrone Castillow', '01956f4a-2a1b-7264-b0d4-3584e6ba6e39', '2025-03-07 02:51:49', '2025-03-07 02:52:17'),
('01957004-bdea-7118-8ea6-01a848839865', 'Brooke Coleman', '01956fc2-f249-73e8-a0fd-06157411fdd6', '2025-03-07 02:51:53', '2025-03-07 02:51:53'),
('01957004-ccc0-7007-88e9-83a5be78c310', 'Amaya Ramos', '01956f4a-119d-702f-a3c7-dc2926f05dcc', '2025-03-07 02:51:57', '2025-03-07 02:51:57'),
('01957004-e1a4-7270-9844-5f8633360940', 'Mollie Rosaa', '01956f2f-be69-71eb-99c1-f6c19e674f3b', '2025-03-07 02:52:02', '2025-03-07 02:58:09'),
('01957019-3af9-717a-b18b-15f6802bfb13', 'Ariel Moses', '01956f2f-be69-71eb-99c1-f6c19e674f3b', '2025-03-07 03:14:16', '2025-03-07 03:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` char(36) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class_id` char(36) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `name`, `class_id`, `created_at`, `updated_at`) VALUES
('0195701a-8df0-7165-9506-6f952b97fdc6', 'Myles Contreras', '01956f4a-2a1b-7264-b0d4-3584e6ba6e39', '2025-03-07 03:15:43', '2025-03-07 03:15:43'),
('0195701a-a50b-7017-9b0b-5226b1b75ac3', 'Amanda Mcclure', '01956fc2-f249-73e8-a0fd-06157411fdd6', '2025-03-07 03:15:49', '2025-03-07 03:15:49'),
('0195701a-bb7f-71c0-be3a-8af244efc971', 'Rose Simpson', '01956f2f-be69-71eb-99c1-f6c19e674f3b', '2025-03-07 03:15:55', '2025-03-07 03:15:55'),
('0195701b-13c0-718a-8163-3681508a8646', 'Nina Doyle', '01956f2f-be69-71eb-99c1-f6c19e674f3b', '2025-03-07 03:16:17', '2025-03-07 03:16:17'),
('0195701b-24a3-73ee-8338-b99786aa74fd', 'Fitzgerald Snyder', '01956f2f-be69-71eb-99c1-f6c19e674f3b', '2025-03-07 03:16:21', '2025-03-07 03:16:21'),
('01957032-bce1-710d-8d02-19e7376b10a1', 'Colette Jensen', '01956f4a-119d-702f-a3c7-dc2926f05dcc', '2025-03-07 03:42:08', '2025-03-07 03:42:08');

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test User', 'test@example.com', '2025-03-06 20:29:18', '$2y$12$HfpmBLsggRvpAHJ/j3I4cu.QYlJg8vhEF9oLYQffKbWbSn1FVrvqq', 'YT6RSjX0oc', '2025-03-06 20:29:18', '2025-03-06 20:29:18'),
(2, 'sfauzi', 'sfauzi@gmail.com', NULL, '$2y$12$AnwJkajDWRjwNbcgWwf5e.X7u1whUS1FqyQyZBp69GfuLB/909ntK', NULL, '2025-03-06 20:29:50', '2025-03-06 20:29:50');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `students_class_id_foreign` (`class_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_class_id_foreign` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
