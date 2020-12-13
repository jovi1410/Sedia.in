-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 01:04 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sediain`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `warung_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `warung_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(2, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(3, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(4, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(5, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(6, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(7, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41'),
(8, 1, '2020-12-04 22:48:41', '2020-12-04 22:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `menu_tabel`
--

CREATE TABLE `menu_tabel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_warung` int(11) NOT NULL,
  `nama_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_menu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok` int(11) NOT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_tabel`
--

INSERT INTO `menu_tabel` (`id`, `id_warung`, `nama_menu`, `jenis_menu`, `harga`, `stok`, `avatar`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'Johnny Walker', 'minuman', '21000', 42, 'ES-TEH.jpg', 1, NULL, '2020-12-04 22:51:20', '2020-12-04 22:51:20'),
(2, 1, 'Lemen Skuos', 'minuman', '13000', 433, '5725228_1da63a43-4e85-4659-b893-4448ed5f09f9_452_452.jpg', 1, NULL, '2020-12-04 22:51:50', '2020-12-04 22:51:50'),
(3, 1, 'oskab', 'makanan', '10000', 345, 'images (1).jfif', 1, NULL, '2020-12-04 22:52:20', '2020-12-04 22:52:20'),
(4, 1, 'otos koya', 'makanan', '11000', 353, 'soto ayam.jpg', 1, NULL, '2020-12-04 22:52:57', '2020-12-04 22:52:57'),
(5, 1, 'deng oseng celeng', 'Makanan', '13500', 890, 'jGmh3Ytb10.jpg', 1, NULL, '2020-12-04 22:54:19', '2020-12-04 22:54:33');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_11_20_171628_create_menu_tabel', 1),
(4, '2020_11_29_140143_create_warung_table', 1),
(5, '2020_12_02_161349_create_meja_table', 1),
(6, '2020_12_02_192155_create_transaksi_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_pembeli` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `warung_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `metode_pemesanan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_meja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `nama_pembeli`, `no_meja`, `warung_id`, `menu_id`, `jumlah`, `metode_pemesanan`, `status_meja`, `created_at`, `updated_at`) VALUES
(1, 'Mas Jopiiih', 2, 1, 4, 3, 'offline', 1, '2020-12-04 22:55:55', '2020-12-04 22:59:51'),
(2, 'Mas Jopiiih', 2, 1, 1, 1, 'offline', 1, '2020-12-04 22:55:56', '2020-12-04 22:59:51'),
(3, 'Jovv', 7, 1, 5, 3, 'offline', 1, '2020-12-04 23:33:02', '2020-12-04 23:33:02'),
(4, 'Jovv', 7, 1, 2, 1, 'offline', 1, '2020-12-04 23:33:02', '2020-12-04 23:33:02'),
(5, 'Jovv', 7, 1, 3, 1, 'offline', 1, '2020-12-04 23:33:02', '2020-12-04 23:33:02'),
(6, 'jovi', 1, 1, 5, 1, 'offline', 1, '2020-12-05 00:00:57', '2020-12-05 00:00:57'),
(7, 'jovi', 1, 1, 2, 1, 'offline', 1, '2020-12-05 00:00:57', '2020-12-05 00:00:57'),
(8, 'joo', 99, 1, 4, 2, 'offline', 0, '2020-12-05 00:01:49', '2020-12-05 00:01:49');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Joviiih', 'jovi@sediain.com', NULL, '$2y$10$IEnobcoeWV/orEyf8sx8y.1ezawKzxpMsdWX.O/./eEAHhk3EkIPC', 2, NULL, '2020-12-04 22:45:25', '2020-12-04 22:45:25');

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_warung` bigint(20) UNSIGNED NOT NULL,
  `nama_warung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `stok_meja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id_warung`, `nama_warung`, `user_id`, `stok_meja`, `created_at`, `updated_at`) VALUES
(1, 'Warung Mas Joviiih', 1, 8, '2020-12-04 22:47:34', '2020-12-04 22:47:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`),
  ADD KEY `meja_warung_id_foreign` (`warung_id`);

--
-- Indexes for table `menu_tabel`
--
ALTER TABLE `menu_tabel`
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
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_warung_id_foreign` (`warung_id`),
  ADD KEY `transaksi_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `warung`
--
ALTER TABLE `warung`
  ADD PRIMARY KEY (`id_warung`),
  ADD KEY `warung_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `meja`
--
ALTER TABLE `meja`
  MODIFY `no_meja` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `menu_tabel`
--
ALTER TABLE `menu_tabel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `warung`
--
ALTER TABLE `warung`
  MODIFY `id_warung` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `meja`
--
ALTER TABLE `meja`
  ADD CONSTRAINT `meja_warung_id_foreign` FOREIGN KEY (`warung_id`) REFERENCES `warung` (`id_warung`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menu_tabel` (`id`),
  ADD CONSTRAINT `transaksi_warung_id_foreign` FOREIGN KEY (`warung_id`) REFERENCES `warung` (`id_warung`);

--
-- Constraints for table `warung`
--
ALTER TABLE `warung`
  ADD CONSTRAINT `warung_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
