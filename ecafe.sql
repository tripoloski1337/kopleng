-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 15, 2018 at 07:42 AM
-- Server version: 10.1.29-MariaDB-6+b1
-- PHP Version: 7.0.29-1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(10) UNSIGNED NOT NULL,
  `nama_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banyak_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `satuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `nama_bahan`, `banyak_bahan`, `satuan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'kopi', '10', 'kg', 1, '2018-07-24 18:49:45', '2018-07-24 18:51:31');

-- --------------------------------------------------------

--
-- Table structure for table `chart`
--

CREATE TABLE `chart` (
  `id_chart` int(10) UNSIGNED NOT NULL,
  `id_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banyak_beli` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chart`
--

INSERT INTO `chart` (`id_chart`, `id_item`, `id_user`, `banyak_beli`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '3', '1', 'paid', '2018-07-24 18:51:12', '2018-07-24 18:51:41'),
(2, '1', '3', '1', 'paid', '2018-07-24 18:51:31', '2018-07-24 18:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id_item` int(10) UNSIGNED NOT NULL,
  `nama_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`id_item`, `nama_item`, `harga_item`, `created_at`, `updated_at`) VALUES
(1, 'kopi item', '15000', '2018-07-24 18:50:26', '2018-07-24 18:50:26');

-- --------------------------------------------------------

--
-- Table structure for table `komposisi`
--

CREATE TABLE `komposisi` (
  `id_komposisi` int(10) UNSIGNED NOT NULL,
  `id_item` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banyak_penggunaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `komposisi`
--

INSERT INTO `komposisi` (`id_komposisi`, `id_item`, `id_bahan`, `banyak_penggunaan`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '5', '2018-07-24 18:50:43', '2018-07-24 18:50:43');

-- --------------------------------------------------------

--
-- Table structure for table `ktp`
--

CREATE TABLE `ktp` (
  `nik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Tempat_ttl` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rt` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rw` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelurahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Status_nikah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warga_negara` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `valid_till` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ktp`
--

INSERT INTO `ktp` (`nik`, `Nama`, `Tempat_ttl`, `jenis_kelamin`, `Alamat`, `rt`, `rw`, `kelurahan`, `kecamatan`, `agama`, `Status_nikah`, `pekerjaan`, `warga_negara`, `valid_till`) VALUES
('1234567891213141', 'Muhammad Arsalan Diponegoro', 'bekasi , 13 12 2000', 'Laki - Laki', 'Bekasi kalimalang', '06', '013', 'teluk pucung', 'bekasi utara', 'islam', 'belum ', 'pelajar', 'indonesia', 'seumur hidup');

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
(3, '2018_06_20_093203_tb_bahan', 2),
(4, '2018_06_20_162426_stock', 3),
(7, '2018_06_20_170538_item', 4),
(8, '2018_06_20_170544_komposisi', 4),
(11, '2018_06_20_182140_transaksi', 5),
(12, '2018_06_21_014444_chart', 5),
(13, '2018_06_21_094346_pembayaran', 6);

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(10) UNSIGNED NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_bayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_pembayaran` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_user`, `total_pembayaran`, `uang_bayar`, `date_pembayaran`, `created_at`, `updated_at`) VALUES
(1, '3', '30000', '50000', '2018-07-25', '2018-07-24 18:51:41', '2018-07-24 18:51:41');

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id_stock` int(10) UNSIGNED NOT NULL,
  `id_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banyak_bahan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id_stock`, `id_bahan`, `banyak_bahan`, `id_user`, `created_at`, `updated_at`) VALUES
(1, '1', '20', 1, '2018-07-24 18:50:08', '2018-07-24 18:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(10) UNSIGNED NOT NULL,
  `id_chart` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uang_bayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_bayar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `user`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@ecafe.com', '$2y$10$lO659JvS5V/nVukUYX9CO.kpBYfqj6ODzQckKrALNf/Kp.PL7ymiS', '1', 'lWkFQ6xoPlugsnlWmWIM3tNQ10RnBnrjENUBVoLUAkYnvbUQ7ZoqsijOrtNk', '2018-06-19 23:34:27', '2018-06-19 23:34:27'),
(2, 'kasir1', 'kasir@ecafe.com', '$2y$10$5SMv2hEO9KHV2qC0A5AqWObQuSGoPJGOju/B7yDUz/L08fbPJYQbC', '2', 'H8s8EsEhBX8LDCGwjyyFbLuJkudQ1v73ZrJoDp3rZsCvbVA8jzxErTtGlqGW', '2018-06-19 23:35:35', '2018-06-19 23:35:35'),
(3, 'kasir2', 'kasir2@ecafe.com', '$2y$10$KMYLiV.GPTEvkMmXVUzuR.CsckWXtWkAW8CVW4YRzkAsBgtNkoFoy', '2', '8Hgm5tE1nB9ttsVBAkmqkd8lFAO5HTmmeybWTcxzqlIsHMSrtRFtx8jYm6jX', '2018-06-21 05:35:03', '2018-06-21 05:35:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `chart`
--
ALTER TABLE `chart`
  ADD PRIMARY KEY (`id_chart`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id_item`);

--
-- Indexes for table `komposisi`
--
ALTER TABLE `komposisi`
  ADD PRIMARY KEY (`id_komposisi`);

--
-- Indexes for table `ktp`
--
ALTER TABLE `ktp`
  ADD PRIMARY KEY (`nik`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id_stock`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

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
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chart`
--
ALTER TABLE `chart`
  MODIFY `id_chart` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id_item` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `komposisi`
--
ALTER TABLE `komposisi`
  MODIFY `id_komposisi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id_stock` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
