-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2017 at 06:21 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dodon`
--

-- --------------------------------------------------------

--
-- Table structure for table `golongan`
--

CREATE TABLE `golongan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_golongan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_golongan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `golongan`
--

INSERT INTO `golongan` (`id`, `kode_golongan`, `nama_golongan`, `besar_uang`, `created_at`, `updated_at`) VALUES
(1, 'G1', 'Golongan 1', 100000, '2017-02-24 07:38:02', '2017-02-24 07:38:02'),
(2, 'G2', 'Golongan 2', 200000, '2017-02-24 07:38:12', '2017-02-24 07:38:12'),
(3, 'G3', 'Golongan 3', 300000, '2017-02-24 07:38:20', '2017-02-24 07:38:20');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id`, `kode_jabatan`, `nama_jabatan`, `besar_uang`, `created_at`, `updated_at`) VALUES
(1, 'J1', 'Jabatan 1', 100000, '2017-02-24 07:38:36', '2017-02-24 07:38:36'),
(2, 'J2', 'Jabtan 2', 2000000, '2017-02-24 07:38:46', '2017-02-24 07:38:46'),
(3, 'J3', 'Jabatan 3', 300000, '2017-02-24 07:38:57', '2017-02-24 07:38:57');

-- --------------------------------------------------------

--
-- Table structure for table `kategorilembur`
--

CREATE TABLE `kategorilembur` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_lembur` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `id_golongan` int(10) UNSIGNED NOT NULL,
  `besar_uang` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `kategorilembur`
--

INSERT INTO `kategorilembur` (`id`, `kode_lembur`, `id_jabatan`, `id_golongan`, `besar_uang`, `created_at`, `updated_at`) VALUES
(1, 'K1', 1, 1, 2000000, '2017-02-24 07:41:24', '2017-02-24 07:41:24'),
(2, 'K2', 2, 2, 202020, '2017-02-24 07:41:34', '2017-02-24 07:41:34'),
(3, 'K3', 3, 3, 12313, '2017-02-24 07:41:43', '2017-02-24 07:41:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(50, '2014_10_12_000000_create_users_table', 1),
(51, '2014_10_12_100000_create_password_resets_table', 1),
(52, '2017_02_06_063049_table_golongan', 1),
(53, '2017_02_06_063103_table_jabatan', 1),
(54, '2017_02_06_064622_table_pegawai', 1),
(55, '2017_02_07_032900_create_kategorilembur', 1),
(56, '2017_02_10_054049_create_pegawainulembur', 1),
(57, '2017_02_10_090446_create_tunjangan', 1),
(58, '2017_02_19_231420_create_pegawaitunjangan', 1),
(59, '2017_02_21_013901_create_penggajian', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(10) UNSIGNED NOT NULL,
  `nip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `id_golongan` int(10) UNSIGNED NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nip`, `id_user`, `id_golongan`, `id_jabatan`, `created_at`, `updated_at`, `photo`) VALUES
(1, '09090909', 2, 1, 1, '2017-02-24 07:40:21', '2017-02-24 07:40:21', 'ki-joko-bodo1.jpg'),
(2, '2432', 3, 2, 2, '2017-02-24 07:40:46', '2017-02-24 07:40:46', 'black-Menu-vector-background-1.jpg'),
(3, '123412', 4, 3, 3, '2017-02-24 07:41:09', '2017-02-24 07:41:09', 'dsd.png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawainulembur`
--

CREATE TABLE `pegawainulembur` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_lembur` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `jumlah_jam` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawainulembur`
--

INSERT INTO `pegawainulembur` (`id`, `id_lembur`, `id_pegawai`, `jumlah_jam`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2017-02-24 07:41:55', '2017-02-24 07:41:55'),
(2, 1, 1, 3, '2017-02-24 07:42:03', '2017-02-24 07:42:03'),
(3, 1, 1, 4, '2017-02-24 07:42:07', '2017-02-24 07:42:07'),
(4, 2, 2, 21, '2017-02-24 07:42:12', '2017-02-24 07:42:12'),
(5, 2, 2, 2, '2017-02-24 07:42:17', '2017-02-24 07:42:17'),
(6, 3, 3, 12, '2017-02-24 07:42:22', '2017-02-24 07:42:22'),
(7, 3, 3, 2, '2017-02-24 07:42:26', '2017-02-24 07:42:26');

-- --------------------------------------------------------

--
-- Table structure for table `pegawaitunjangan`
--

CREATE TABLE `pegawaitunjangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_pegawai` int(10) UNSIGNED NOT NULL,
  `id_tunjangan` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pegawaitunjangan`
--

INSERT INTO `pegawaitunjangan` (`id`, `id_pegawai`, `id_tunjangan`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-02-24 07:43:19', '2017-02-24 07:43:19'),
(2, 2, 2, '2017-02-24 07:43:23', '2017-02-24 07:43:23'),
(3, 3, 3, '2017-02-24 07:43:32', '2017-02-24 07:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `penggajian`
--

CREATE TABLE `penggajian` (
  `id` int(10) UNSIGNED NOT NULL,
  `jumlah_jam_lembur` int(11) NOT NULL,
  `jumlah_uang_lembur` int(11) NOT NULL,
  `gaji_pokok` int(11) NOT NULL,
  `gaji_total` int(11) NOT NULL,
  `tanggal_pengambilan` date DEFAULT NULL,
  `status_pengambilan` tinyint(1) NOT NULL DEFAULT '0',
  `petugas_penerima` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_tunjangan_pegawai` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `penggajian`
--

INSERT INTO `penggajian` (`id`, `jumlah_jam_lembur`, `jumlah_uang_lembur`, `gaji_pokok`, `gaji_total`, `tanggal_pengambilan`, `status_pengambilan`, `petugas_penerima`, `id_tunjangan_pegawai`, `created_at`, `updated_at`) VALUES
(1, 9, 18000000, 200000, 18492929, '2024-02-17', 0, 'Admin@gmail.com', 1, '2017-02-24 07:44:02', '2017-02-24 07:44:02'),
(2, 23, 4646460, 2200000, 6856460, '2024-02-17', 0, 'Admin@gmail.com', 2, '2017-02-24 07:44:07', '2017-02-24 07:44:07'),
(3, 14, 172382, 600000, 772595, '2024-02-17', 0, 'Admin@gmail.com', 3, '2017-02-24 07:44:13', '2017-02-24 07:44:13');

-- --------------------------------------------------------

--
-- Table structure for table `tunjangan`
--

CREATE TABLE `tunjangan` (
  `id` int(10) UNSIGNED NOT NULL,
  `kode_tunjangan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_golongan` int(10) UNSIGNED NOT NULL,
  `id_jabatan` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `jumlah_anak` int(11) NOT NULL,
  `besar_tunjangan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tunjangan`
--

INSERT INTO `tunjangan` (`id`, `kode_tunjangan`, `id_golongan`, `id_jabatan`, `status`, `jumlah_anak`, `besar_tunjangan`, `created_at`, `updated_at`) VALUES
(1, 'KJ1', 1, 1, 'Menikah', 12, 292929, '2017-02-24 07:42:43', '2017-02-24 07:42:43'),
(2, 'KJ2', 2, 2, 'Tidak Menikah', 0, 10000, '2017-02-24 07:42:59', '2017-02-24 07:42:59'),
(3, 'KJ3', 3, 3, 'Duda', 2, 213, '2017-02-24 07:43:11', '2017-02-24 07:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `permission`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin@gmail.com', 'admin@gmail.com', 'Admin', '$2y$10$tTub9t.babLxuVRAWuY8feOPpcz06rV.TfGS7achvTkzv81M371W.', NULL, '2017-02-24 07:37:20', '2017-02-24 07:37:20'),
(2, 'satu', 'satu@gmail.com', 'HRD', '$2y$10$701CC.uh.iS7QxRdaRQK1ukgcx4//scipP5q0Wb63IBKSna7mcNqW', NULL, '2017-02-24 07:40:21', '2017-02-24 07:40:21'),
(3, 'dua', 'dua@gmail.com', 'Pegawai', '$2y$10$Fadp2/KdAcfxU8gv/8NxKOxESIKSn5kGmOVJ7av5AbyKQGN5NWdq2', NULL, '2017-02-24 07:40:46', '2017-02-24 07:40:46'),
(4, 'tiga', 'tiga@gmail.com', 'Adrimistrasi', '$2y$10$gWYG5lPzqhy9JKY3VciZsOcSnDtSacp.a6lSOX5tihhiYxgATQvLy', NULL, '2017-02-24 07:41:09', '2017-02-24 07:41:09'),
(5, 'HRD', 'HRD@gmail.com', 'HRD', '$2y$10$CnX67d7z2/nHqSnbbkMXz.VtjIswJ4TCbDdFoHX6eTSgmKLmeTUc.', 'xqJYBoYyRA5yOVd3DElOKNJ5gFbKDT0sWbaf7sZHEw7QPALlEY1s7Cb0iiBH', '2017-02-24 11:20:20', '2017-02-24 11:20:24'),
(6, 'ADRIMISTRASI', 'ADM@gmail.com', 'Adrimistrasi', '$2y$10$F6QqMBXy6a1boJWjwnvr9etXuiXM4ZhpCJ1nV4FU4Vxh6VBFqMJCK', NULL, '2017-02-24 11:20:42', '2017-02-24 11:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `golongan`
--
ALTER TABLE `golongan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `golongan_kode_golongan_unique` (`kode_golongan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `jabatan_kode_jabatan_unique` (`kode_jabatan`);

--
-- Indexes for table `kategorilembur`
--
ALTER TABLE `kategorilembur`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kategorilembur_kode_lembur_unique` (`kode_lembur`),
  ADD KEY `kategorilembur_id_jabatan_foreign` (`id_jabatan`),
  ADD KEY `kategorilembur_id_golongan_foreign` (`id_golongan`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_id_user_foreign` (`id_user`),
  ADD KEY `pegawai_id_golongan_foreign` (`id_golongan`),
  ADD KEY `pegawai_id_jabatan_foreign` (`id_jabatan`);

--
-- Indexes for table `pegawainulembur`
--
ALTER TABLE `pegawainulembur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawainulembur_id_lembur_foreign` (`id_lembur`),
  ADD KEY `pegawainulembur_id_pegawai_foreign` (`id_pegawai`);

--
-- Indexes for table `pegawaitunjangan`
--
ALTER TABLE `pegawaitunjangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawaitunjangan_id_pegawai_foreign` (`id_pegawai`),
  ADD KEY `pegawaitunjangan_id_tunjangan_foreign` (`id_tunjangan`);

--
-- Indexes for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `penggajian_id_tunjangan_pegawai_unique` (`id_tunjangan_pegawai`);

--
-- Indexes for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tunjangan_kode_tunjangan_unique` (`kode_tunjangan`),
  ADD KEY `tunjangan_id_golongan_foreign` (`id_golongan`),
  ADD KEY `tunjangan_id_jabatan_foreign` (`id_jabatan`);

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
-- AUTO_INCREMENT for table `golongan`
--
ALTER TABLE `golongan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `kategorilembur`
--
ALTER TABLE `kategorilembur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawainulembur`
--
ALTER TABLE `pegawainulembur`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `pegawaitunjangan`
--
ALTER TABLE `pegawaitunjangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penggajian`
--
ALTER TABLE `penggajian`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tunjangan`
--
ALTER TABLE `tunjangan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `kategorilembur`
--
ALTER TABLE `kategorilembur`
  ADD CONSTRAINT `kategorilembur_id_golongan_foreign` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kategorilembur_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_id_golongan_foreign` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawai_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawainulembur`
--
ALTER TABLE `pegawainulembur`
  ADD CONSTRAINT `pegawainulembur_id_lembur_foreign` FOREIGN KEY (`id_lembur`) REFERENCES `kategorilembur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawainulembur_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pegawaitunjangan`
--
ALTER TABLE `pegawaitunjangan`
  ADD CONSTRAINT `pegawaitunjangan_id_pegawai_foreign` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pegawaitunjangan_id_tunjangan_foreign` FOREIGN KEY (`id_tunjangan`) REFERENCES `tunjangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penggajian`
--
ALTER TABLE `penggajian`
  ADD CONSTRAINT `penggajian_id_tunjangan_pegawai_foreign` FOREIGN KEY (`id_tunjangan_pegawai`) REFERENCES `pegawaitunjangan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tunjangan`
--
ALTER TABLE `tunjangan`
  ADD CONSTRAINT `tunjangan_id_golongan_foreign` FOREIGN KEY (`id_golongan`) REFERENCES `golongan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tunjangan_id_jabatan_foreign` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
