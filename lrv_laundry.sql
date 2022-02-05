-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 01:49 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lrv_laundry`
--

-- --------------------------------------------------------

--
-- Table structure for table `laundries`
--

CREATE TABLE `laundries` (
  `laundry_id` bigint(20) UNSIGNED NOT NULL,
  `laundry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_price` int(11) NOT NULL,
  `laundry_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundries`
--

INSERT INTO `laundries` (`laundry_id`, `laundry_name`, `laundry_address`, `laundry_price`, `laundry_lat`, `laundry_long`, `created_at`, `updated_at`) VALUES
(1, 'Eum officia nostrum.', 'Nanas', 1236, '-7.362690', '109.265381', '2022-01-28 22:14:51', '2022-01-28 22:14:51'),
(2, 'Ut veniam magni nostrum est.', 'Dewi Sartika', 6997, '-7.360310', '109.246650', '2022-01-28 22:14:51', '2022-01-28 22:14:51'),
(3, 'Eum eos voluptate suscipit.', 'Dahlia', 9422, '402', '9076', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(4, 'Doloremque qui et quisquam.', 'R.M. Said', 9826, '446', '8120', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(5, 'Mollitia id aspernatur.', 'Zamrud', 6294, '368', '5638', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(6, 'Recusandae iusto ducimus.', 'Batako', 9745, '454', '1343', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(7, 'Et ea et dicta.', 'Tangkuban Perahu', 8138, '915', '2326', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(8, 'Perferendis incidunt voluptate quia.', 'Padma', 7584, '14', '6163', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(9, 'Non esse.', 'Wahidin Sudirohusodo', 8047, '575', '6031', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(10, 'Rerum assumenda.', 'Cikutra Barat', 7981, '70', '6498', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(11, 'Dolor voluptates accusamus.', 'Bambu', 9186, '148', '9321', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(12, 'Explicabo enim nemo.', 'Sutarto', 9804, '953', '5000', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(13, 'Dolorem voluptate natus sed.', 'Bhayangkara', 7627, '833', '6255', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(14, 'Autem omnis.', 'Reksoninten', 3287, '357', '3655', '2022-01-28 22:14:52', '2022-01-28 22:14:52'),
(15, 'Harum totam.', 'Babadan', 6320, '895', '7377', '2022-01-28 22:14:52', '2022-01-28 22:14:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_01_28_095758_laundry', 1),
(3, '2022_01_28_215621_user', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `address`, `password`, `user_lat`, `user_long`, `created_at`, `updated_at`) VALUES
(5, 'Wahyu Triono', 'admin@admin.com', '1231241123', 'wdawd', '$2y$10$pnFbaLLcpASgDjhNBvtPkO4B.kSLZ7qbBHhPwdXvky5d352DsArzK', '-7.4161', '109.2899', '2022-01-28 21:08:32', '2022-01-28 21:08:32'),
(6, 'Wahyu Triono', '20104001@ittelkom-pwt.ac.id', '123124112313', 'wdawd', '$2y$10$aK/OhMosTSnk23d2H.ToQuX01yrJGx3ca.pIjgQEybWd45OaMefMm', '-7.4161', '109.2899', '2022-01-28 21:18:21', '2022-01-28 21:18:21'),
(7, 'Wahyu Triono', 'admin@admi131n.com', '51512351231', 'asdwd', '$2y$10$ArclH.OjpfR01XnsP0Rjn.dD.qyo1TXYI9BbSZwdQ849ZO8E8o5TS', '-7.4161', '109.2899', '2022-01-28 21:20:17', '2022-01-28 21:20:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `laundries`
--
ALTER TABLE `laundries`
  ADD PRIMARY KEY (`laundry_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `laundries`
--
ALTER TABLE `laundries`
  MODIFY `laundry_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
