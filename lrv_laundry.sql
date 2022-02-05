-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2022 at 05:03 PM
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
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` bigint(20) UNSIGNED NOT NULL,
  `laundry_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `metode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `berat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `laundry_id`, `user_id`, `metode`, `subtotal`, `berat`, `created_at`, `updated_at`) VALUES
(2, 16, 1, 'antar', '27058', '', '2022-02-05 07:53:19', '2022-02-05 07:53:19'),
(3, 16, 1, 'antar', '10000', '', '2022-02-05 08:08:16', '2022-02-05 08:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `laundries`
--

CREATE TABLE `laundries` (
  `laundry_id` bigint(20) UNSIGNED NOT NULL,
  `laundry_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_address_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_price` int(11) NOT NULL,
  `laundry_open` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `laundry_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundries`
--

INSERT INTO `laundries` (`laundry_id`, `laundry_name`, `laundry_description`, `laundry_address`, `laundry_address_detail`, `laundry_price`, `laundry_open`, `laundry_lat`, `laundry_long`, `created_at`, `updated_at`) VALUES
(16, 'Martani Uwais', 'Odit sapiente itaque dolores possimus adipisci.', 'Psr. Baladewa No. 643', 'Voluptatem accusamus.', 2058, '10:00am - 11:00pm', '-7.362690', '109.265381', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(17, 'Cindy Hani Yuliarti M.Farm', 'Eum quia eaque unde.', 'Jr. Ters. Pasir Koja No. 525', 'Excepturi dolor.', 4353, '10:00am - 11:00pm', '-7.362690', '109.265381', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(18, 'Eja Napitupulu', 'Aperiam magnam molestias dolorem.', 'Jr. Ujung No. 605', 'Repellendus distinctio facere aperiam.', 5793, '10:00am - 11:00pm', '-7.362690', '109.265381', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(19, 'Puput Umi Puspita M.TI.', 'Tempore perspiciatis voluptas natus rerum ut nihil.', 'Ki. Aceh No. 938', 'Et doloribus.', 1695, '10:00am - 11:00pm', '-7.362690', '109.265381', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(20, 'Jati Suryono', 'Qui vel ad at voluptates.', 'Psr. Sumpah Pemuda No. 195', 'Vitae quam corporis.', 4874, '10:00am - 11:00pm', '-7.362690', '109.265381', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(21, 'Hani Diana Namaga', 'Omnis omnis quasi sit laborum veniam qui nihil.', 'Psr. Abdul Rahmat No. 585', 'Quia repellendus recusandae.', 5645, '10:00am - 11:00pm', '-7.362690', '109.265381', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(22, 'Vanya Mardhiyah', 'Illum enim ea animi sequi.', 'Jr. Kusmanto No. 995', 'Consequatur nisi iusto.', 2646, '10:00am - 11:00pm', '57', '310', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(23, 'Karen Nurdiyanti', 'Velit rerum ratione labore et cupiditate.', 'Kpg. Dewi Sartika No. 721', 'Magnam expedita.', 1502, '10:00am - 11:00pm', '364', '4509', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(24, 'Nasrullah Hamzah Sinaga S.Pd', 'Optio illo atque soluta et.', 'Kpg. Urip Sumoharjo No. 331', 'Omnis error quibusdam.', 6296, '10:00am - 11:00pm', '644', '9859', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(25, 'Ratih Wulandari', 'Qui unde rerum itaque quam.', 'Kpg. Tambak No. 652', 'Voluptatibus illum minima.', 8076, '10:00am - 11:00pm', '212', '8588', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(26, 'Ega Prayoga', 'Numquam ad ratione ex sed facilis saepe.', 'Psr. PHH. Mustofa No. 432', 'Inventore ut adipisci suscipit cum.', 455, '10:00am - 11:00pm', '912', '1539', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(27, 'Gantar Hakim', 'Minus exercitationem sit nihil at quas ut optio.', 'Kpg. Samanhudi No. 627', 'Quis eum id.', 6317, '10:00am - 11:00pm', '835', '9068', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(28, 'Hari Rajasa S.Sos', 'Sint sunt earum cupiditate quia sequi.', 'Ds. Yosodipuro No. 568', 'Architecto velit.', 883, '10:00am - 11:00pm', '819', '9695', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(29, 'Gasti Nadine Uyainah', 'Optio aliquid et tempore occaecati nostrum.', 'Dk. Baya Kali Bungur No. 158', 'Laudantium voluptatibus.', 7563, '10:00am - 11:00pm', '675', '7023', '2022-02-05 05:43:58', '2022-02-05 05:43:58'),
(30, 'Dalimin Kurnia Simbolon S.E.', 'Suscipit explicabo illo atque veritatis libero enim.', 'Psr. Taman No. 646', 'Aliquam molestiae eos.', 7762, '10:00am - 11:00pm', '346', '1157', '2022-02-05 05:43:58', '2022-02-05 05:43:58');

-- --------------------------------------------------------

--
-- Table structure for table `laundry_fiturs`
--

CREATE TABLE `laundry_fiturs` (
  `laundryFitur_id` bigint(20) UNSIGNED NOT NULL,
  `laundry_id` bigint(20) UNSIGNED NOT NULL,
  `laundryFitur_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `laundry_fiturs`
--

INSERT INTO `laundry_fiturs` (`laundryFitur_id`, `laundry_id`, `laundryFitur_name`, `created_at`, `updated_at`) VALUES
(1, 16, 'Fitur 1', NULL, NULL),
(2, 16, 'Fitur 2', NULL, NULL),
(3, 16, 'Fitur 3', NULL, NULL);

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
(9, '2022_02_05_132515_booking', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ongkirs`
--

CREATE TABLE `ongkirs` (
  `ongkir_id` bigint(20) UNSIGNED NOT NULL,
  `jarak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ongkirs`
--

INSERT INTO `ongkirs` (`ongkir_id`, `jarak`, `harga`, `created_at`, `updated_at`) VALUES
(1, '2', '10000', NULL, NULL),
(2, '4', '15000', NULL, NULL),
(3, '6', '20000', NULL, NULL),
(4, '8', '25000', NULL, NULL);

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
  `address_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_long` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `phone`, `address`, `address_detail`, `password`, `user_lat`, `user_long`, `created_at`, `updated_at`) VALUES
(1, 'Wahyu Triono', 'admin@admin.com', '085156113164', 'Jl. banteran', 'Dekat masjid abc', '$2y$10$ySx89TkyqTc5hZeWT6.YEephAcc4tLPp02lW64ULdZ4Sw0YKTfh.6', '-7.4161', '109.2899', '2022-02-05 06:14:23', '2022-02-05 06:14:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `bookings_laundry_id_foreign` (`laundry_id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`);

--
-- Indexes for table `laundries`
--
ALTER TABLE `laundries`
  ADD PRIMARY KEY (`laundry_id`);

--
-- Indexes for table `laundry_fiturs`
--
ALTER TABLE `laundry_fiturs`
  ADD PRIMARY KEY (`laundryFitur_id`),
  ADD KEY `laundryfiturs_laundry_id_foreign` (`laundry_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ongkirs`
--
ALTER TABLE `ongkirs`
  ADD PRIMARY KEY (`ongkir_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `laundries`
--
ALTER TABLE `laundries`
  MODIFY `laundry_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `laundry_fiturs`
--
ALTER TABLE `laundry_fiturs`
  MODIFY `laundryFitur_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ongkirs`
--
ALTER TABLE `ongkirs`
  MODIFY `ongkir_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_laundry_id_foreign` FOREIGN KEY (`laundry_id`) REFERENCES `laundries` (`laundry_id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `laundry_fiturs`
--
ALTER TABLE `laundry_fiturs`
  ADD CONSTRAINT `laundryfiturs_laundry_id_foreign` FOREIGN KEY (`laundry_id`) REFERENCES `laundries` (`laundry_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
