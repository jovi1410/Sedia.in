-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 03, 2020 at 04:53 PM
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
  `no_meja` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `warung_id` bigint(20) UNSIGNED NOT NULL,
  `status_meja` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`no_meja`, `created_at`, `updated_at`, `warung_id`, `status_meja`) VALUES
(1, NULL, NULL, 1, 0),
(2, NULL, NULL, 1, 0),
(3, NULL, NULL, 1, 0),
(4, NULL, NULL, 1, 0),
(5, NULL, NULL, 1, 0),
(6, NULL, NULL, 1, 0),
(7, NULL, NULL, 1, 0);

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
(1, 1, 'bakso', 'makanan', '10000', 100, 'images (1).jfif', 1, NULL, NULL, NULL),
(2, 1, 'soto ayam', 'makanan', '12000', 323, 'soto ayam.jpg', 1, NULL, NULL, NULL),
(4, 1, 'es teh', 'minuman', '5000', 220, 'ES-TEH.jpg', 1, NULL, NULL, NULL),
(5, 1, 'thai tea', 'minuman', '8000', 43, 'thai tea boba.png', 1, NULL, NULL, NULL),
(6, 1, 'lemon squash', 'minuman', '13000', 200, '5725228_1da63a43-4e85-4659-b893-4448ed5f09f9_452_452.jpg', 1, NULL, NULL, NULL);

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
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_resets_table', 1),
(8, '2020_11_20_171628_create_menu_tabel', 1),
(9, '2020_11_29_140143_create_warung_table', 1),
(10, '2020_12_02_161349_create_meja_table', 1),
(11, '2020_12_02_183543_add_id_warung_to_meja_table', 2),
(12, '2020_12_02_183831_add_warung_id_to_meja_table', 3),
(14, '2020_12_02_192155_create_transaksi_table', 4),
(15, '2020_12_03_121934_add_warung_id_to_transaksi_table', 5);

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
-- Error reading structure for table sediain.transaksi: #1932 - Table 'sediain.transaksi' doesn't exist in engine
-- Error reading data for table sediain.transaksi: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'FROM `sediain`.`transaksi`' at line 1

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
(1, 'Jovi', 'jovi@sediain.com', NULL, '$2y$10$OT0sf5XwYw3Zyy2sni83jeywj5NtCDqG3ef7VO7PQ2fLbVg6NaLeC', 2, NULL, '2020-12-02 10:51:13', '2020-12-02 10:51:13'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$oFbJ6uut6RBCHE7inYGMFOoax93ctERvenKazJPbz9lQsGiMdxGlG', 1, NULL, '2020-12-03 06:45:18', '2020-12-03 06:45:18');

-- --------------------------------------------------------

--
-- Table structure for table `warung`
--

CREATE TABLE `warung` (
  `id_warung` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_warung` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stok_meja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `warung`
--

INSERT INTO `warung` (`id_warung`, `user_id`, `nama_warung`, `stok_meja`, `created_at`, `updated_at`) VALUES
(1, 1, 'Warung Sumatera', 7, NULL, NULL);

