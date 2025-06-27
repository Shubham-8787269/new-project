-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2025 at 11:40 AM
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
-- Database: `comment`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `parent_comment_id` bigint(20) UNSIGNED DEFAULT NULL,
  `content` text DEFAULT NULL,
  `depth` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `post_id`, `parent_comment_id`, `content`, `depth`, `created_at`, `updated_at`) VALUES
(10, 1, 3, NULL, 'sb log apni rai do', 1, '2025-06-27 00:52:50', '2025-06-27 00:52:50'),
(11, 4, 3, NULL, 'yes', 1, '2025-06-27 00:53:41', '2025-06-27 00:53:41'),
(12, 4, 3, NULL, 'btao aur kuch', 1, '2025-06-27 00:54:40', '2025-06-27 00:54:40'),
(14, 1, 3, NULL, 'btao bhai', 1, '2025-06-27 01:00:06', '2025-06-27 01:00:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_06_26_100553_create_posts_table', 2),
(6, '2025_06_26_100605_create_comments_table', 2);

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
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(110) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `image`, `content`, `created_at`, `updated_at`) VALUES
(3, 'these is graph', 'posts/I7g8R5AUafQiuJd7PAyUfmXAVCrfvf0apKiFyDBV.jpg', 'these is graph..my lifeiygigigiyufufu1', '2025-06-27 00:31:52', '2025-06-27 01:48:50');

-- --------------------------------------------------------

--
-- Table structure for table `reply`
--

CREATE TABLE `reply` (
  `id` int(10) NOT NULL,
  `content` varchar(255) DEFAULT NULL,
  `user_id` int(50) DEFAULT NULL,
  `post_id` int(50) DEFAULT NULL,
  `parent_id` int(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `comment_id` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reply`
--

INSERT INTO `reply` (`id`, `content`, `user_id`, `post_id`, `parent_id`, `created_at`, `updated_at`, `comment_id`) VALUES
(2, 'hiii', 4, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 1),
(3, 'can i call you', 4, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 4),
(4, 'tell me', 4, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 1),
(5, 'yes bro', 3, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 1),
(6, 'yes', 3, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 5),
(7, 'why not', 3, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 5),
(8, 'ho gy', 3, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 1),
(9, 'ho gya', 3, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 4),
(10, 'bolo', 3, 2, NULL, '2025-06-27 05:03:33', '2025-06-27 05:03:57', 4),
(11, 'hi', 3, 2, NULL, '2025-06-26 23:34:27', '2025-06-26 23:34:27', 5),
(12, 'new', 3, 2, NULL, '2025-06-26 23:50:17', '2025-06-26 23:50:17', 1),
(13, 'new boy', 4, 2, NULL, '2025-06-27 00:16:46', '2025-06-27 00:16:46', 1),
(14, 'dekhta hu', 1, 2, NULL, '2025-06-27 00:50:44', '2025-06-27 00:50:44', 1),
(15, 'ha bhai', 1, 3, NULL, '2025-06-27 01:02:06', '2025-06-27 01:02:06', 11),
(16, 'ha btao', 1, 3, NULL, '2025-06-27 01:03:14', '2025-06-27 01:03:14', 12),
(17, 'kya btau', 1, 3, NULL, '2025-06-27 01:07:11', '2025-06-27 01:07:11', 11),
(18, 'kese ho', 1, 3, NULL, '2025-06-27 01:20:05', '2025-06-27 01:20:05', 12);

-- --------------------------------------------------------

--
-- Table structure for table `replytoreply`
--

CREATE TABLE `replytoreply` (
  `id` int(10) NOT NULL,
  `user_id` int(50) DEFAULT NULL,
  `post_id` int(50) DEFAULT NULL,
  `parent_id` int(50) DEFAULT NULL,
  `comment_id` int(50) DEFAULT NULL,
  `reply_id` int(50) DEFAULT NULL,
  `content` varchar(2000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `replytoreply`
--

INSERT INTO `replytoreply` (`id`, `user_id`, `post_id`, `parent_id`, `comment_id`, `reply_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 3, 2, NULL, 1, 2, 'hii', '2025-06-26 23:36:18', '2025-06-26 23:36:18'),
(2, 3, 2, NULL, 1, 2, 'bolo', '2025-06-26 23:48:11', '2025-06-26 23:48:11'),
(3, 3, 2, NULL, 1, 2, 'thats good', '2025-06-26 23:50:28', '2025-06-26 23:50:28'),
(4, 3, 2, NULL, 4, 3, 'wow', '2025-06-26 23:50:54', '2025-06-26 23:50:54'),
(5, 4, 2, NULL, 4, 9, 'ha bhai', '2025-06-27 00:05:24', '2025-06-27 00:05:24'),
(6, 4, 2, NULL, 5, 6, 'bolo', '2025-06-27 00:08:04', '2025-06-27 00:08:04'),
(7, 4, 2, NULL, 1, 5, 'ha bhai', '2025-06-27 00:17:04', '2025-06-27 00:17:04'),
(8, 1, 2, NULL, 1, 2, 'ha bhai', '2025-06-27 00:50:17', '2025-06-27 00:50:17'),
(9, 4, 3, NULL, 11, 15, 'kya hai', '2025-06-27 01:02:24', '2025-06-27 01:02:24'),
(10, 4, 3, NULL, 11, 15, 'kuch nhi', '2025-06-27 01:02:38', '2025-06-27 01:02:38'),
(11, 4, 3, NULL, 12, 16, 'kya btau', '2025-06-27 01:03:33', '2025-06-27 01:03:33'),
(12, 4, 3, NULL, 11, 15, 'ha bolo', '2025-06-27 01:04:50', '2025-06-27 01:04:50'),
(13, 3, 3, NULL, 11, 15, 'mujhe bh btao', '2025-06-27 01:06:28', '2025-06-27 01:06:28'),
(14, 3, 3, NULL, 12, 16, 'ha ji', '2025-06-27 01:18:32', '2025-06-27 01:18:32'),
(15, 3, 3, NULL, 12, 18, 'badhiya hogi', '2025-06-27 01:20:40', '2025-06-27 01:20:40');

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
  `mobile` varchar(110) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'shubham kumar', 'admin@gmail.com', NULL, '$2y$12$og77qskUnoYv035zblO.TO5GhQ/jx3uRiuFxHNS8Z0ZYok2AIhDEy', '08787269436', 1, NULL, '2025-06-26 04:09:11', '2025-06-26 04:09:11'),
(2, 'Anish Ashapure', 'anish12@gmail.com', NULL, '$2y$12$.PX7BA8OUjZqn24GWkSu1OFRXtXcApjyeNwhEhMOrKf1FNhrcbUjC', '08787269436', 0, NULL, '2025-06-26 04:12:47', '2025-06-26 04:12:47'),
(3, 'Hemant Soni', 'hemant@gmail.com', NULL, '$2y$12$6y8TovOCoPGwKcNTTRoK/.MegEA5.SnDhu8XmrhtC3yMC.P5g4lY2', '08787269436', 0, NULL, '2025-06-26 12:59:58', '2025-06-26 12:59:58'),
(4, 'Anushri Bhardwaj', 'anushi@gmail.com', NULL, '$2y$12$s62GhpsiV4uvNs1JYaadluOK6I0sUNZ.TjQ/QmxMe6RQrQ3HMJRDq', '08787269436', 0, NULL, '2025-06-26 13:18:00', '2025-06-26 13:18:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comments_user_id_foreign` (`user_id`),
  ADD KEY `comments_post_id_foreign` (`post_id`),
  ADD KEY `comments_parent_comment_id_foreign` (`parent_comment_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `reply`
--
ALTER TABLE `reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replytoreply`
--
ALTER TABLE `replytoreply`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reply`
--
ALTER TABLE `reply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `replytoreply`
--
ALTER TABLE `replytoreply`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_parent_comment_id_foreign` FOREIGN KEY (`parent_comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comments_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
