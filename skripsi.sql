-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2024 at 02:30 PM
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
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminprofile`
--

CREATE TABLE `adminprofile` (
  `id_adminprofile` bigint(20) UNSIGNED NOT NULL,
  `id_admin` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama_klinik` varchar(255) NOT NULL,
  `alamat_lengkap` varchar(255) NOT NULL,
  `kecamatan` varchar(255) NOT NULL,
  `kabupaten` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `whatsapp` varchar(255) NOT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `website_klinik` varchar(255) DEFAULT NULL,
  `tentangklinik` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminprofile`
--

INSERT INTO `adminprofile` (`id_adminprofile`, `id_admin`, `username`, `email`, `nama_klinik`, `alamat_lengkap`, `kecamatan`, `kabupaten`, `kode_pos`, `whatsapp`, `telephone`, `instagram`, `facebook`, `website_klinik`, `tentangklinik`, `created_at`, `updated_at`) VALUES
(1, 1, 'klinik_satu', 'kliniksatu@gmail.com', 'Klinik Satu', 'Kp. Balakang tengah', 'Cipanas', 'Kab. Cianjur', '43253', '081912296986', '566231', 'klinik.satu', 'klinik satu', 'https://kliniksatu.com', 'Kami adalah klinik satu satunya', '2024-06-04 22:11:16', '2024-06-06 22:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `verified` int(11) NOT NULL DEFAULT 0,
  `status` enum('Pending','Active') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `name`, `username`, `email`, `password`, `picture`, `address`, `phone`, `email_verified_at`, `verified`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Klinik Satu', NULL, 'kliniksatu@gmail.com', '$2y$10$fJa9ze51llHQx9dzN1GL3.o0vL.Bf65myix.rcp5..IdDB4Ow7aPW', NULL, NULL, NULL, '2024-06-04 22:09:48', 1, 'Pending', '2024-06-04 22:09:31', '2024-06-04 22:09:48'),
(8, 'Klinik 15', NULL, 'klinik15@gmail.com', '$2y$10$9I.JLx6uKKmgzCU/ZxrRkOm0wyxdbx6tlxIrN8niahcM7aegf59y6', NULL, NULL, NULL, NULL, 0, 'Pending', '2024-06-07 06:28:51', '2024-06-07 06:28:51'),
(9, 'klinik aku', NULL, 'klinikaku@gmail.com', '$2y$10$LhNc2JrBpNvAOho/DGqkYOwhJnzU0KErPcf9ErZMNOfqf/uVFxGGe', NULL, NULL, NULL, NULL, 0, 'Pending', '2024-06-07 07:10:08', '2024-06-07 07:10:08'),
(10, 'klinik saya', NULL, 'kliniksaya@gmail.com', '$2y$10$S8gTRsj2rWj8kQX.iTdk2O2GLH41BnCTX0.Bazhmp1g20mg/5OTAC', NULL, NULL, NULL, NULL, 0, 'Pending', '2024-06-07 07:25:05', '2024-06-07 07:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id_clients` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','Actice') NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `daftars`
--

CREATE TABLE `daftars` (
  `id_daftar` bigint(20) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `nama_orang_tua` varchar(255) NOT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `whatsapportu` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `klinik` varchar(255) NOT NULL,
  `riwayat_kesehatan` varchar(255) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id_doctor` bigint(20) UNSIGNED NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `linkedin` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id_doctor`, `id_admin`, `name`, `position`, `description`, `photo`, `twitter`, `facebook`, `instagram`, `linkedin`, `created_at`, `updated_at`) VALUES
(2, 1, 'Selly Herlina, S.Keb', 'Kepala Kardiologi 1', 'ini dokter selly', 'img/doctors/rNAojSVtkKsZwv0Kg76Cp5DZmXdk4MT1DuOcTDo8.jpg', NULL, NULL, NULL, NULL, '2024-06-05 05:04:34', '2024-06-05 23:17:55'),
(3, 1, 'Lisa Yiha Rodhiatun, SpPD', 'Kepala IGD', 'ini adalah kepala IGD', 'img/doctors/kEGNhEPKKtCNzUAu1Q8QqSRZsfXKLK8KQTuRAgsz.jpg', 'https://www.tiktok.com/search?lang=id-ID&q=karunia%20dewi%20cover&t=1716811959125', NULL, NULL, NULL, '2024-06-05 05:22:33', '2024-06-09 00:33:27'),
(30, 1, 'Lisa Yiha Rodhiatun', 'lukjg', 'kugk', 'img/doctors/uld1am7EqCFSQXvAU19gbCxJ2YplTi4sXyPidt47.jpg', NULL, NULL, NULL, NULL, '2024-06-09 00:26:23', '2024-06-09 00:26:23');

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
-- Table structure for table `gallery_kliniks`
--

CREATE TABLE `gallery_kliniks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `global_metode_khitans`
--

CREATE TABLE `global_metode_khitans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `metode_khitan` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `rincian_harga` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `klinik_metode`
--

CREATE TABLE `klinik_metode` (
  `id_metodeadminprofil` bigint(20) UNSIGNED NOT NULL,
  `id_metode` int(11) NOT NULL,
  `id_adminprofile` int(11) NOT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `klinik_metode`
--

INSERT INTO `klinik_metode` (`id_metodeadminprofil`, `id_metode`, `id_adminprofile`, `harga`, `keterangan`, `created_at`, `updated_at`) VALUES
(2, 1, 1, '20000', 'Tersedia', NULL, '2024-06-09 01:19:29'),
(3, 2, 1, NULL, 'Tidak Tersedia', NULL, '2024-06-09 01:19:29'),
(4, 3, 1, '5000', 'Tersedia', NULL, '2024-06-09 01:19:29'),
(5, 4, 1, NULL, 'Tidak Tersedia', NULL, '2024-06-09 01:19:29'),
(6, 5, 1, NULL, 'Tidak Tersedia', NULL, '2024-06-09 01:19:29'),
(7, 6, 1, NULL, NULL, NULL, '2024-06-09 01:17:40');

-- --------------------------------------------------------

--
-- Table structure for table `metode_tabel`
--

CREATE TABLE `metode_tabel` (
  `id_metode` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `kisaran_harga` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `metode_tabel`
--

INSERT INTO `metode_tabel` (`id_metode`, `name`, `deskripsi`, `kisaran_harga`, `created_at`, `updated_at`) VALUES
(1, 'Metode KhitanTradisional (Manual)\r\n', 'Menggunakan alat seperti pisau atau gunting untuk memotong kulup. Setelahnya, luka dijahit atau diikat dengan benang khusus.\n', 'Rp 200.000 - Rp 1.000.000', NULL, NULL),
(2, 'Metode Khitan Klem (Clamp)', 'Menggunakan sinar laser untuk memotong kulup. Proses ini dianggap lebih cepat dan aman karena sinar laser juga berfungsi untuk mensterilkan area pemotongan.', 'Rp 1.000.000 - Rp 3.000.000', NULL, NULL),
(3, 'Metode Khitan Stapler', 'Menggunakan alat seperti stapler yang khusus dirancang untuk khitan.', 'Rp 2.000.000 - Rp 4.000.000', NULL, NULL),
(4, 'Metode Khitan Elektrik Cauter', 'Menggunakan alat kauter elektrik yang memotong dan membakar jaringan kulup sekaligus, sehingga mengurangi pendarahan.', 'Rp 1.000.000 - Rp 3.000.000', NULL, NULL),
(5, 'Metode Khitan Flap', 'Teknik bedah yang lebih kompleks, biasanya digunakan untuk kasus khusus seperti perbaikan sunat sebelumnya atau fimosis parah.', 'Rp 3.000.000 - Rp 6.000.000', NULL, NULL);

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
(5, '2024_05_16_025832_create_admins_table', 1),
(6, '2024_05_16_025915_create_clients_table', 1),
(7, '2024_05_16_220643_add_verified_to_admins_table', 1),
(8, '2024_05_16_221636_create_verification_tokens_table', 1),
(9, '2024_05_20_171100_create_doctors_table', 1),
(10, '2024_05_20_171125_create_services_kliniks_table', 1),
(11, '2024_05_20_171208_create_gallery_kliniks_table', 1),
(12, '2024_05_20_171225_create_pendaftar_kliniks_table', 1),
(13, '2024_05_20_173852_create_adminprofile_table', 1),
(14, '2024_05_22_052124_create_global_metode_khitans_table', 1),
(15, '2024_05_30_075251_create_metode_tabel', 1),
(16, '2024_05_30_085514_create_klinik_metode', 1),
(17, '2024_06_05_074554_create_doctors_table', 2),
(18, '2024_06_05_104004_create_services_kliniks_table', 3),
(19, '2024_06_05_163129_create_services_table', 4),
(20, '2024_06_06_075313_create_users_table', 5),
(21, '2024_06_06_091512_create_users_table', 6),
(22, '2024_06_07_023754_create_daftars_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `guard` varchar(255) DEFAULT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftar_kliniks`
--

CREATE TABLE `pendaftar_kliniks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id_services` bigint(20) UNSIGNED NOT NULL,
  `id_admin` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id_services`, `id_admin`, `name`, `description`, `created_at`, `updated_at`) VALUES
(9, 1, 'Perawatan Gigi', 'Perawatan Gigi Dewasa dan Anak', '2024-06-08 22:01:11', '2024-06-08 22:01:11'),
(10, 1, 'Pemeriksaan Umum', 'Pemeriksaan Umum', '2024-06-08 23:58:41', '2024-06-08 23:58:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `name`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dania', NULL, 'dania@gmail.com', NULL, '$2y$10$tuNaAzOLpJR20WUloMjKy.shMLpXaQDoFMkHlrMFRkv1/J99hp5AC', NULL, '2024-06-06 03:06:50', '2024-06-06 03:06:50');

-- --------------------------------------------------------

--
-- Table structure for table `verification_tokens`
--

CREATE TABLE `verification_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verification_tokens`
--

INSERT INTO `verification_tokens` (`id`, `user_type`, `email`, `token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'kliniksatu@gmail.com', 'd1BHTlRUVE5oQTlvNnFmWE12UGZIT1RPeEZpZjVwc21XN0N5aG1kb3pRNk9iRUxIN2gwNG9sbVd3MENhMWFTQg==', '2024-06-04 22:09:31', '2024-06-04 22:09:31'),
(2, 'admin', 'klinikdua@gmail.com', 'WXZIejlZR2tjSkhKMVA5NDhzWkVId1Z3eTIzbEw2NDFIaUxadkhSa3hEbzBTZmNzd2h2OXcxbWpTbGlBTkY4eQ==', '2024-06-06 03:51:49', '2024-06-06 03:51:49'),
(3, 'admin', 'klinikdua@gmail.com', 'NlF4aGl2eTBidGFpQ3prRGNKZE04bEpaYkozcXlYMWozeUZGRW01Sk96UTlGU0loRkphQWM0dFlTcjBJNkNZUQ==', '2024-06-06 03:53:38', '2024-06-06 03:53:38'),
(4, 'admin', 'klinikdua@gmail.com', 'd3JpUHF1bnprNGlVRFB4NnREbzhmSVR1eWttblpnM3VPY1RTempjUE41djI0NWpDTHFaNmQ4SDZ0cW9DTURCUg==', '2024-06-06 03:55:49', '2024-06-06 03:55:49'),
(5, 'admin', 'kliniklagi@gmail.com', 'b0gxejZDTVZIVUY2TFRWWkIyczNxVmZWMWJrVmlTWElEaUJGOWJENGl3RUd5bVZFTmRFeElhTzBibDNacXBZVg==', '2024-06-06 03:56:57', '2024-06-06 03:56:57'),
(6, 'admin', 'klinikyakin@gmail.com', 'OGtMSGZvczJSMDFIYlZhWDRGeENwbDNoVWtjOFBDZzhTSks0UFdEWWpiT01sY000b2RBQ21aNGVjeEIxcHVQSQ==', '2024-06-07 02:52:33', '2024-06-07 02:52:33'),
(7, 'admin', 'klinikbisa@gmail.com', 'dkNNdUhkV0dwMHkzNXhkWFJLbFdDdXVvdk1IOVVRS2hJUlNiWWlCUUpHS0trdlR0SWRxcmVJcUlNMmJFMzlWMQ==', '2024-06-07 03:52:50', '2024-06-07 03:52:50'),
(8, 'admin', 'klinik15@gmail.com', 'SWs1NkVKWURQazdNTjd4STVyaHBsaE14VzJWY0NMdk1DelRGdlVYWEJPMHZoTVBRZmVCUFNUVnZUNDc0Q2VBYQ==', '2024-06-07 06:28:51', '2024-06-07 06:28:51'),
(9, 'admin', 'klinikaku@gmail.com', 'UVdFSkxqWHRSU3Rnc3FIU1JJYVpYREk4cEtBVkxJa1U3ZmtYdlVTZ0tVVzR5VmRzQzJQRHZ2VFQ4Q3hFd212OA==', '2024-06-07 07:10:08', '2024-06-07 07:10:08'),
(10, 'admin', 'kliniksaya@gmail.com', 'RkZ2anNzaHdQeXdPRjI2ZHo5Wm52U3V5ZGpuY0hBMDl6RTdjeXBsTUR6VFFCSVhucjBBTUpveFozZ1RlVUFIWg==', '2024-06-07 07:25:05', '2024-06-07 07:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminprofile`
--
ALTER TABLE `adminprofile`
  ADD PRIMARY KEY (`id_adminprofile`),
  ADD UNIQUE KEY `adminprofile_email_unique` (`email`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id_clients`),
  ADD UNIQUE KEY `clients_email_unique` (`email`);

--
-- Indexes for table `daftars`
--
ALTER TABLE `daftars`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id_doctor`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery_kliniks`
--
ALTER TABLE `gallery_kliniks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `global_metode_khitans`
--
ALTER TABLE `global_metode_khitans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `klinik_metode`
--
ALTER TABLE `klinik_metode`
  ADD PRIMARY KEY (`id_metodeadminprofil`);

--
-- Indexes for table `metode_tabel`
--
ALTER TABLE `metode_tabel`
  ADD PRIMARY KEY (`id_metode`);

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
-- Indexes for table `pendaftar_kliniks`
--
ALTER TABLE `pendaftar_kliniks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id_services`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminprofile`
--
ALTER TABLE `adminprofile`
  MODIFY `id_adminprofile` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id_clients` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daftars`
--
ALTER TABLE `daftars`
  MODIFY `id_daftar` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id_doctor` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_kliniks`
--
ALTER TABLE `gallery_kliniks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `global_metode_khitans`
--
ALTER TABLE `global_metode_khitans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `klinik_metode`
--
ALTER TABLE `klinik_metode`
  MODIFY `id_metodeadminprofil` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metode_tabel`
--
ALTER TABLE `metode_tabel`
  MODIFY `id_metode` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pendaftar_kliniks`
--
ALTER TABLE `pendaftar_kliniks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id_services` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `verification_tokens`
--
ALTER TABLE `verification_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
