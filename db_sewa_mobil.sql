-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 16, 2024 at 12:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sewa_mobil`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manajemen_mobil`
--

CREATE TABLE `manajemen_mobil` (
  `ID_Mobil` int(10) UNSIGNED NOT NULL,
  `Merk` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Model` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nomor_Plat` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tarif_Sewa_Mobil` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Foto_Mobil` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status_Mobil` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(5, '2024_03_16_040012_create_pengguna_tabel', 1),
(117, '2014_10_12_000000_create_users_table', 2),
(118, '2014_10_12_100000_create_password_resets_table', 2),
(119, '2019_08_19_000000_create_failed_jobs_table', 2),
(120, '2019_12_14_000001_create_personal_access_tokens_table', 2),
(121, '2024_03_16_040122_create_pengguna_table', 2),
(122, '2024_03_16_040159_drop_pengguna_tabel_table', 2),
(123, '2024_03_16_044159_create_manajemen_mobil_table', 2),
(124, '2024_03_16_052121_create_peminjaman_mobil_table', 2),
(125, '2024_03_16_074640_create_pengembalian_mobil_table', 2),
(126, '2024_03_16_094527_create_users_role_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman_mobil`
--

CREATE TABLE `peminjaman_mobil` (
  `ID_Peminjaman_Mobil` int(10) UNSIGNED NOT NULL,
  `ID_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Mobil` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Mulai` date DEFAULT NULL,
  `Tanggal_Selesai` date DEFAULT NULL,
  `Harga_Harian` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian_mobil`
--

CREATE TABLE `pengembalian_mobil` (
  `ID_Pengembalian_Mobil` int(10) UNSIGNED NOT NULL,
  `ID_Peminjaman_Mobil` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_Mobil` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Tanggal_Pengembalian` date DEFAULT NULL,
  `Total_Harga` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `ID_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Nama_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Alamat_Pengguna` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nomor_Telepon_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Nomor_SIM_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID_User` int(10) UNSIGNED NOT NULL,
  `ID_Pengguna` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ID_User_Roles` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID_User`, `ID_Pengguna`, `Email`, `Password`, `ID_User_Roles`, `created_at`, `updated_at`) VALUES
(1, NULL, 'admin@gmail.com', 'admin', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_role`
--

CREATE TABLE `users_role` (
  `ID_User_Roles` int(10) UNSIGNED NOT NULL,
  `Role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_role`
--

INSERT INTO `users_role` (`ID_User_Roles`, `Role`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, NULL),
(2, 'Pengguna', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `manajemen_mobil`
--
ALTER TABLE `manajemen_mobil`
  ADD PRIMARY KEY (`ID_Mobil`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `peminjaman_mobil`
--
ALTER TABLE `peminjaman_mobil`
  ADD PRIMARY KEY (`ID_Peminjaman_Mobil`);

--
-- Indexes for table `pengembalian_mobil`
--
ALTER TABLE `pengembalian_mobil`
  ADD PRIMARY KEY (`ID_Pengembalian_Mobil`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`ID_Pengguna`);

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
  ADD PRIMARY KEY (`ID_User`);

--
-- Indexes for table `users_role`
--
ALTER TABLE `users_role`
  ADD PRIMARY KEY (`ID_User_Roles`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `manajemen_mobil`
--
ALTER TABLE `manajemen_mobil`
  MODIFY `ID_Mobil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `peminjaman_mobil`
--
ALTER TABLE `peminjaman_mobil`
  MODIFY `ID_Peminjaman_Mobil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengembalian_mobil`
--
ALTER TABLE `pengembalian_mobil`
  MODIFY `ID_Pengembalian_Mobil` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID_User` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users_role`
--
ALTER TABLE `users_role`
  MODIFY `ID_User_Roles` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
