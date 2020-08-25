-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2019 at 12:19 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ta_spk_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penilaians`
--

CREATE TABLE `hasil_penilaians` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `hasil_penilaians` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hasil_penilaians`
--

INSERT INTO `hasil_penilaians` (`id`, `tahun_ajaran_id`, `siswa_id`, `hasil_penilaians`, `created_at`, `updated_at`) VALUES
(14, 4, 8, 0.7, '2019-07-27 07:11:53', '2019-07-27 07:11:53'),
(15, 4, 9, 0.775, '2019-07-27 07:11:54', '2019-07-27 07:11:54'),
(16, 4, 10, 0.5666666666666667, '2019-07-27 07:11:54', '2019-07-27 07:11:54'),
(17, 4, 11, 0.5916666666666667, '2019-07-27 07:11:54', '2019-07-27 07:11:54'),
(18, 4, 12, 0.5750000000000001, '2019-07-27 07:11:54', '2019-07-27 07:11:54');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tingkat` int(11) NOT NULL,
  `grade` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tingkat`, `grade`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', NULL, NULL),
(2, 1, 'B', NULL, NULL),
(3, 2, 'A', NULL, NULL),
(4, 2, 'B', NULL, NULL),
(5, 3, 'A', NULL, NULL),
(6, 3, 'B', NULL, NULL),
(7, 4, 'A', NULL, NULL),
(8, 4, 'B', NULL, NULL),
(9, 5, 'A', NULL, NULL),
(10, 5, 'B', NULL, NULL),
(11, 6, 'A', NULL, NULL),
(12, 6, 'B', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas_siswas`
--

CREATE TABLE `kelas_siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kriterias`
--

CREATE TABLE `kriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_kriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bobot` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kriterias`
--

INSERT INTO `kriterias` (`id`, `nama_kriteria`, `tipe_kriteria`, `bobot`, `created_at`, `updated_at`) VALUES
(1, 'Peringkat Kelas', 'Benefit', 0.3, '2019-07-22 17:13:27', '2019-07-22 17:13:27'),
(2, 'Jumlah Tanggungan', 'Benefit', 0.2, '2019-07-22 17:14:00', '2019-07-22 17:14:00'),
(3, 'Status Anak', 'Benefit', 0.4, '2019-07-22 17:14:15', '2019-07-22 17:14:15'),
(4, 'Penghasilan Ortu/Wali', 'Benefit', 0.1, '2019-07-22 17:14:50', '2019-07-22 17:14:50');

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
(23, '2014_10_12_000000_create_users_table', 1),
(24, '2014_10_12_100000_create_password_resets_table', 1),
(25, '2019_04_14_052639_create_kriterias_table', 1),
(26, '2019_04_14_053200_create_subkriterias_table', 1),
(27, '2019_06_23_135603_create_periodes_table', 1),
(28, '2019_06_23_135645_create_tahun_ajarans_table', 1),
(29, '2019_06_23_143124_create_kelas_table', 1),
(30, '2019_06_26_172916_create_siswas_table', 1),
(32, '2019_06_26_173729_create_kelas_siswas_table', 1),
(38, '2019_06_26_173230_create_penilaians_table', 2),
(39, '2019_07_07_081720_create_hasil_penilaians_table', 2);

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
-- Table structure for table `penilaians`
--

CREATE TABLE `penilaians` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran_id` int(10) UNSIGNED DEFAULT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `subkriteria_id` int(10) UNSIGNED NOT NULL,
  `nilai_sub` double NOT NULL,
  `nilai_normalisasi` double DEFAULT NULL,
  `bobot_normalisasi` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penilaians`
--

INSERT INTO `penilaians` (`id`, `tahun_ajaran_id`, `siswa_id`, `kriteria_id`, `subkriteria_id`, `nilai_sub`, `nilai_normalisasi`, `bobot_normalisasi`, `created_at`, `updated_at`) VALUES
(61, 5, 8, 1, 1, 4, 1, 0.3, '2019-07-27 07:11:22', '2019-07-28 20:50:13'),
(62, 5, 8, 2, 10, 2, 1, 0.2, '2019-07-27 07:11:22', '2019-07-28 20:50:13'),
(63, 5, 8, 3, 15, 1, 0.25, 0.1, '2019-07-27 07:11:22', '2019-07-28 20:50:13'),
(64, 5, 8, 4, 8, 3, 1, 0.1, '2019-07-27 07:11:22', '2019-07-28 20:50:13'),
(65, 5, 9, 1, 13, 1, 0.25, 0.075, '2019-07-27 07:11:30', '2019-07-28 20:50:13'),
(66, 5, 9, 2, 10, 2, 1, 0.2, '2019-07-27 07:11:30', '2019-07-28 20:50:13'),
(67, 5, 9, 3, 5, 4, 1, 0.4, '2019-07-27 07:11:30', '2019-07-28 20:50:13'),
(68, 5, 9, 4, 8, 3, 1, 0.1, '2019-07-27 07:11:30', '2019-07-28 20:50:13'),
(69, 5, 10, 1, 1, 4, 1, 0.3, '2019-07-27 07:11:34', '2019-07-28 20:50:13'),
(70, 5, 10, 2, 14, 1, 0.5, 0.1, '2019-07-27 07:11:34', '2019-07-28 20:50:13'),
(71, 5, 10, 3, 15, 1, 0.25, 0.1, '2019-07-27 07:11:34', '2019-07-28 20:50:13'),
(72, 5, 10, 4, 12, 2, 0.6666666666666666, 0.06666666666666667, '2019-07-27 07:11:34', '2019-07-28 20:50:13'),
(73, 5, 11, 1, 2, 3, 0.75, 0.22499999999999998, '2019-07-27 07:11:41', '2019-07-28 20:50:13'),
(74, 5, 11, 2, 10, 2, 1, 0.2, '2019-07-27 07:11:41', '2019-07-28 20:50:13'),
(75, 5, 11, 3, 15, 1, 0.25, 0.1, '2019-07-27 07:11:41', '2019-07-28 20:50:13'),
(76, 5, 11, 4, 12, 2, 0.6666666666666666, 0.06666666666666667, '2019-07-27 07:11:41', '2019-07-28 20:50:13'),
(77, 5, 12, 1, 13, 1, 0.25, 0.075, '2019-07-27 07:11:45', '2019-07-28 20:50:13'),
(78, 5, 12, 2, 14, 1, 0.5, 0.1, '2019-07-27 07:11:45', '2019-07-28 20:50:13'),
(79, 5, 12, 3, 6, 3, 0.75, 0.30000000000000004, '2019-07-27 07:11:45', '2019-07-28 20:50:13'),
(80, 5, 12, 4, 8, 3, 1, 0.1, '2019-07-27 07:11:45', '2019-07-28 20:50:13');

-- --------------------------------------------------------

--
-- Table structure for table `periodes`
--

CREATE TABLE `periodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_periode` enum('Ganjil','Genap') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `periodes`
--

INSERT INTO `periodes` (`id`, `nama_periode`, `created_at`, `updated_at`) VALUES
(1, 'Ganjil', NULL, NULL),
(2, 'Genap', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswas`
--

CREATE TABLE `siswas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_siswa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peringkat_kls` char(3) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jml_tanggungan` int(11) NOT NULL,
  `status_anak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `penghasilan_ortu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswas`
--

INSERT INTO `siswas` (`id`, `nama_siswa`, `jk`, `kelas_id`, `alamat`, `peringkat_kls`, `jml_tanggungan`, `status_anak`, `penghasilan_ortu`, `created_at`, `updated_at`) VALUES
(8, 'Kunti Putri', 'Perempuan', 9, 'Boro RT 8 RW 2', '2', 2, 'lengkap', 2450000, '2019-07-23 10:18:05', '2019-07-23 10:18:05'),
(9, 'Rizaldi Maulana', 'Laki - Laki', 9, 'Boro RT 10 RW 2', '0', 2, 'yatim piatu', 1780000, '2019-07-23 10:19:44', '2019-07-27 07:09:44'),
(10, 'Khaidar Farrozan', 'Laki - Laki', 9, 'Boro Pandean RT 12 RW 3', '1', 1, 'lengkap', 2850000, '2019-07-23 10:21:01', '2019-07-23 10:21:01'),
(11, 'M Dandy Dhiyaul Haq', 'Laki - Laki', 9, 'Perumtas II M5/25 RT 1 RW 6', '3', 2, 'lengkap', 2740000, '2019-07-23 10:25:07', '2019-07-23 10:25:07'),
(12, 'Kevin Afriza', 'Laki - Laki', 10, 'Randegan RT 8 RW 2', '0', 1, 'yatim', 2200000, '2019-07-23 10:26:25', '2019-07-27 07:10:55'),
(16, 'wati', 'Perempuan', 10, 'sby', '5', 2, 'lengkap', 2560000, '2019-07-27 07:24:29', '2019-07-27 07:24:29'),
(17, 'tupiwa', 'Laki - Laki', 10, 'sby II A 5', '1', 6, 'yatim piatu', 1000000, '2019-07-27 07:28:16', '2019-07-27 07:28:16');

-- --------------------------------------------------------

--
-- Table structure for table `subkriterias`
--

CREATE TABLE `subkriterias` (
  `id` int(10) UNSIGNED NOT NULL,
  `kriteria_id` int(10) UNSIGNED NOT NULL,
  `nama_subkriteria` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` int(11) NOT NULL,
  `max` int(11) NOT NULL,
  `nilai` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subkriterias`
--

INSERT INTO `subkriterias` (`id`, `kriteria_id`, `nama_subkriteria`, `min`, `max`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 'P 1 - 2', 1, 2, 4, '2019-07-22 17:15:26', '2019-07-25 07:39:01'),
(2, 1, 'P 3 - 4', 3, 4, 3, '2019-07-22 17:15:45', '2019-07-25 07:39:20'),
(3, 2, 'T > 5', 6, 99, 4, '2019-07-22 17:17:24', '2019-07-25 07:40:03'),
(4, 2, 'T > 3 & <= 5', 4, 5, 3, '2019-07-22 17:17:34', '2019-07-25 07:40:22'),
(5, 3, 'yatim piatu', 0, 0, 4, '2019-07-22 17:17:57', '2019-07-22 17:17:57'),
(6, 3, 'yatim', 0, 0, 3, '2019-07-22 17:18:07', '2019-07-22 17:18:07'),
(7, 4, '<= 1.500.000', 0, 1500000, 4, '2019-07-22 17:18:55', '2019-07-25 07:42:07'),
(8, 4, '> 1.500.000 - <=2.500.000', 1500001, 2500000, 3, '2019-07-22 17:19:11', '2019-07-25 07:42:59'),
(9, 1, '5', 5, 5, 2, '2019-07-22 17:27:36', '2019-07-25 07:39:37'),
(10, 2, 'T > 1 & <= 3', 2, 3, 2, '2019-07-22 17:28:19', '2019-07-25 07:40:42'),
(11, 3, 'piatu', 0, 0, 2, '2019-07-22 17:28:37', '2019-07-23 10:12:56'),
(12, 4, '> 2.500.000 - <= 3.500.000', 2500001, 3500000, 2, '2019-07-22 17:29:00', '2019-07-25 07:43:36'),
(13, 1, 'P > 5', 0, 0, 1, '2019-07-23 10:02:09', '2019-07-26 11:49:55'),
(14, 2, 'T <= 1', 1, 1, 1, '2019-07-23 10:06:10', '2019-07-25 07:41:10'),
(15, 3, 'lengkap', 0, 0, 1, '2019-07-23 10:13:31', '2019-07-23 10:13:31'),
(16, 4, '> 3.500.000', 3500001, 10000000, 1, '2019-07-23 10:14:58', '2019-07-25 07:44:27');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajarans`
--

CREATE TABLE `tahun_ajarans` (
  `id` int(10) UNSIGNED NOT NULL,
  `periode_id` int(10) UNSIGNED NOT NULL,
  `keterangan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_start` date NOT NULL,
  `tgl_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahun_ajarans`
--

INSERT INTO `tahun_ajarans` (`id`, `periode_id`, `keterangan`, `tgl_start`, `tgl_end`, `created_at`, `updated_at`) VALUES
(4, 1, 'Ganjil 2018/2019', '2019-07-12', '2019-07-15', '2019-07-23 10:30:32', '2019-07-23 10:30:32'),
(5, 2, 'Genap 2018/2019', '2019-07-06', '2019-07-19', '2019-07-23 20:44:59', '2019-07-23 20:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `role`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', NULL, '$2y$10$UY5RNVDkRNi1Be0WXF/tTuAoHN2N3I7eSBUPSwPhyMpfClxE11.b.', 'admin', 1, '76205ZvKSR2jOTU5Y5fdTXC3N7JoCApOwCJqdvHYHR4tvCNgQXk1NpwHDjde', '2019-07-22 17:09:09', '2019-07-23 17:29:31'),
(2, 'Kepala Sekolah', 'kepsek', NULL, '$2y$10$4c/c4VUZFr1sLY2qi8JtXOHO9OeMuU7qI8TGhYMqBaDF3R.02XQ.m', 'kepsek', 1, 'iOO8vEtVHDUaibFJ4KpLtYdv3FJK66OOoMkKkBXcBwKD2VWrOOLjL7tvNNlb', '2019-07-22 17:11:55', '2019-07-22 17:11:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hasil_penilaians`
--
ALTER TABLE `hasil_penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hasil_penilaians_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `hasil_penilaians_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas_siswas`
--
ALTER TABLE `kelas_siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_siswas_siswa_id_foreign` (`siswa_id`),
  ADD KEY `kelas_siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `kriterias`
--
ALTER TABLE `kriterias`
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
-- Indexes for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD PRIMARY KEY (`id`),
  ADD KEY `penilaians_tahun_ajaran_id_foreign` (`tahun_ajaran_id`),
  ADD KEY `penilaians_siswa_id_foreign` (`siswa_id`),
  ADD KEY `penilaians_kriteria_id_foreign` (`kriteria_id`),
  ADD KEY `penilaians_subkriteria_id_foreign` (`subkriteria_id`);

--
-- Indexes for table `periodes`
--
ALTER TABLE `periodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_kelas_id_foreign` (`kelas_id`);

--
-- Indexes for table `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subkriterias_kriteria_id_foreign` (`kriteria_id`);

--
-- Indexes for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tahun_ajarans_periode_id_foreign` (`periode_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hasil_penilaians`
--
ALTER TABLE `hasil_penilaians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kelas_siswas`
--
ALTER TABLE `kelas_siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kriterias`
--
ALTER TABLE `kriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `penilaians`
--
ALTER TABLE `penilaians`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `periodes`
--
ALTER TABLE `periodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `subkriterias`
--
ALTER TABLE `subkriterias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hasil_penilaians`
--
ALTER TABLE `hasil_penilaians`
  ADD CONSTRAINT `hasil_penilaians_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `hasil_penilaians_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kelas_siswas`
--
ALTER TABLE `kelas_siswas`
  ADD CONSTRAINT `kelas_siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`),
  ADD CONSTRAINT `kelas_siswas_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`);

--
-- Constraints for table `penilaians`
--
ALTER TABLE `penilaians`
  ADD CONSTRAINT `penilaians_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_subkriteria_id_foreign` FOREIGN KEY (`subkriteria_id`) REFERENCES `subkriterias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `penilaians_tahun_ajaran_id_foreign` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `tahun_ajarans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);

--
-- Constraints for table `subkriterias`
--
ALTER TABLE `subkriterias`
  ADD CONSTRAINT `subkriterias_kriteria_id_foreign` FOREIGN KEY (`kriteria_id`) REFERENCES `kriterias` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tahun_ajarans`
--
ALTER TABLE `tahun_ajarans`
  ADD CONSTRAINT `tahun_ajarans_periode_id_foreign` FOREIGN KEY (`periode_id`) REFERENCES `periodes` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
