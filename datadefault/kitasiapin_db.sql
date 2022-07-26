-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2022 at 01:12 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kitasiapin_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_headers`
--

CREATE TABLE `api_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `api_headers`
--

INSERT INTO `api_headers` (`id`, `key`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'ini-header-key', 1, 'SAdmin', NULL, '2022-07-17 00:44:59', '2022-07-17 00:44:59');

-- --------------------------------------------------------

--
-- Table structure for table `base_urls`
--

CREATE TABLE `base_urls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `basic_features`
--

CREATE TABLE `basic_features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `basic_features`
--

INSERT INTO `basic_features` (`id`, `name`, `description`, `icon`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Navigasi Peta', 'Tambah google map untuk memudahkan tamu menemukan lokasi acara.', '1655043870_map.png', 1, 'Super Admin', NULL, '2022-06-12 07:24:30', '2022-06-12 07:24:30'),
(2, 'Galeri Moment Bahagia', 'Tampilkan foto moment bahagia kamu dan pasangan pada undangan.', '1655043913_picture.png', 1, 'Super Admin', NULL, '2022-06-12 07:25:13', '2022-06-12 07:25:13'),
(3, 'Backsound Music Pilihan', 'Putar musik romantis pilihanmu saat undangan digital dibuka.', '1655043953_music.png', 1, 'Super Admin', NULL, '2022-06-12 07:25:53', '2022-06-12 07:25:53'),
(4, 'Kolom Ucapan', 'Terima ucapan dan do\'a langsung pada halaman undangan.', '1655043996_chat-box.png', 1, 'Super Admin', NULL, '2022-06-12 07:26:36', '2022-06-12 07:26:36'),
(5, 'Amplop Digital', 'Tambahkan nomor rekening / qr code eWallet untuk amplop digital.', '1655044033_wallet.png', 1, 'Super Admin', NULL, '2022-06-12 07:27:13', '2022-06-12 07:27:13'),
(6, 'Hitung Mundur', 'Timer untuk memberikan informasi waktu acara akan segera dimulai.', '1655044075_stopwatch.png', 1, 'Super Admin', NULL, '2022-06-12 07:27:55', '2022-06-12 07:27:55');

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
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Undangan berupa link unik', 'SAdmin', NULL, '2022-06-12 08:08:45', '2022-06-12 08:08:45'),
(2, 'Nama domain sesuai keinginan dengan domain.info', 'SAdmin', NULL, '2022-06-12 08:09:18', '2022-06-12 08:09:18'),
(3, 'Masa aktiv 1 minggu', 'SAdmin', NULL, '2022-06-12 08:09:59', '2022-06-12 08:09:59'),
(4, 'Masa aktiv 6 bulan', 'SAdmin', NULL, '2022-06-12 08:10:14', '2022-06-12 08:10:14'),
(5, 'Masa aktiv 1 tahun', 'SAdmin', NULL, '2022-06-12 08:10:27', '2022-06-12 08:10:27'),
(6, 'Menghitung waktu mundur', 'SAdmin', NULL, '2022-06-12 08:11:18', '2022-06-12 08:11:18'),
(7, 'Petunjuk lokasi acara dengan google map', 'SAdmin', 'SAdmin', '2022-06-12 08:11:39', '2022-06-14 08:31:02'),
(8, 'Kolom ucapan dan do\'a', 'SAdmin', NULL, '2022-06-12 08:11:53', '2022-06-12 08:11:53'),
(9, 'Edit tanpa batas', 'SAdmin', NULL, '2022-06-12 08:13:23', '2022-06-12 08:13:23'),
(10, 'Backsound romantis', 'SAdmin', NULL, '2022-06-12 08:14:16', '2022-06-12 08:14:16'),
(11, 'Bebas pilih template', 'SAdmin', NULL, '2022-06-12 08:14:33', '2022-06-12 08:14:33'),
(12, 'Gallery foto', 'SAdmin', NULL, '2022-06-12 08:14:45', '2022-06-12 08:14:45'),
(13, 'Reminder google calendar', 'SAdmin', NULL, '2022-06-12 08:15:13', '2022-06-12 08:15:13'),
(14, 'Amplop digital', 'SAdmin', NULL, '2022-06-12 08:15:57', '2022-06-12 08:15:57'),
(15, 'Custom nama tamu undangan', 'SAdmin', NULL, '2022-06-12 08:21:26', '2022-06-12 08:21:26'),
(16, 'Download undangan berupa gambar', 'SAdmin', NULL, '2022-06-12 08:22:12', '2022-06-12 08:22:12');

-- --------------------------------------------------------

--
-- Table structure for table `feature_package`
--

CREATE TABLE `feature_package` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `package_id` bigint(20) UNSIGNED NOT NULL,
  `feature_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `feature_package`
--

INSERT INTO `feature_package` (`id`, `package_id`, `feature_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-06-12 08:23:10', '2022-06-12 08:23:10'),
(2, 1, 3, '2022-06-12 08:23:10', '2022-06-12 08:23:10'),
(3, 1, 6, '2022-06-12 08:23:10', '2022-06-12 08:23:10'),
(4, 1, 7, '2022-06-12 08:23:10', '2022-06-12 08:23:10'),
(5, 1, 8, '2022-06-12 08:23:10', '2022-06-12 08:23:10'),
(6, 2, 1, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(7, 2, 4, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(8, 2, 6, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(9, 2, 7, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(10, 2, 8, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(11, 2, 9, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(12, 2, 10, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(13, 2, 11, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(14, 2, 12, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(15, 2, 13, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(16, 2, 14, '2022-06-12 08:24:12', '2022-06-12 08:24:12'),
(17, 3, 2, '2022-06-12 08:24:41', '2022-06-12 08:24:41'),
(18, 3, 5, '2022-06-12 08:24:41', '2022-06-12 08:24:41'),
(19, 3, 6, '2022-06-12 08:24:41', '2022-06-12 08:24:41'),
(20, 3, 7, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(21, 3, 8, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(22, 3, 9, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(23, 3, 10, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(24, 3, 11, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(25, 3, 12, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(26, 3, 13, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(27, 3, 14, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(28, 3, 15, '2022-06-12 08:24:42', '2022-06-12 08:24:42'),
(29, 3, 16, '2022-06-12 08:24:42', '2022-06-12 08:24:42');

-- --------------------------------------------------------

--
-- Table structure for table `invitation_themes`
--

CREATE TABLE `invitation_themes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `thumbnail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `uri`, `icon`, `type`, `parent_id`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Paket', 'paket', '1655043614_paket.png', NULL, NULL, 1, 'Super Admin', NULL, '2022-06-12 07:20:14', '2022-06-12 07:20:14'),
(2, 'Fitur', 'fitur', '1655043635_list-text.png', NULL, NULL, 1, 'Super Admin', NULL, '2022-06-12 07:20:35', '2022-06-12 07:20:35'),
(3, 'Tema Undangan', 'tema-undangan', '1656943575_wedding-invitation.png', NULL, NULL, 1, 'Super Admin', NULL, '2022-07-04 07:06:15', '2022-07-04 07:06:15');

-- --------------------------------------------------------

--
-- Table structure for table `menu_permission`
--

CREATE TABLE `menu_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_permission`
--

INSERT INTO `menu_permission` (`id`, `menu_id`, `permission_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(2, 1, 2, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(3, 1, 3, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(4, 2, 1, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(5, 2, 2, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(6, 2, 3, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(7, 3, 1, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(8, 3, 2, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(9, 3, 3, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40');

-- --------------------------------------------------------

--
-- Table structure for table `menu_role`
--

CREATE TABLE `menu_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_role`
--

INSERT INTO `menu_role` (`id`, `role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(2, 1, 2, '2022-07-13 23:51:40', '2022-07-13 23:51:40'),
(3, 1, 3, '2022-07-13 23:51:40', '2022-07-13 23:51:40');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2022_05_18_082637_create_menus_table', 1),
(11, '2022_05_30_102344_create_roles_table', 1),
(12, '2022_06_02_075700_create_menu_role_table', 1),
(13, '2022_06_02_081741_create_permission_table', 1),
(14, '2022_06_02_082813_create_menu_permission_table', 1),
(15, '2022_06_04_114328_create_packages_table', 1),
(16, '2022_06_04_114532_create_features_table', 1),
(17, '2022_06_05_222247_create_feature_package_table', 1),
(18, '2022_06_09_213447_create_basic_features_table', 1),
(19, '2022_07_13_222517_create_api_headers_table', 1),
(20, '2022_07_13_222559_create_base_urls_table', 1),
(21, '2022_07_15_221758_create_invitation_themes_table', 2),
(22, '2022_07_15_223601_create_invitation_themes_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('06b6721fdc247c2c61f99cc2405fa9af384b0931e8bbcb95786b3d0db51766b55a714f54e85b2fe5', 2, 1, 'Token', '[]', 0, '2022-07-26 14:15:28', '2022-07-26 14:15:28', '2023-07-26 21:15:28'),
('263401ad461e6d384e5f56790ec24e7594ef1b4dad8fd8a06e6046dc2d43303c877692ecbd0777cb', 2, 1, 'Token', '[]', 0, '2022-07-17 15:49:57', '2022-07-17 15:49:57', '2023-07-17 22:49:57'),
('7796e0da624f22d31d70fc22f222a21ec46ddc4e8551c5f7e8479cf6ea15e48cd53e685f7d3bdd75', 2, 1, 'Token', '[]', 0, '2022-07-17 01:17:14', '2022-07-17 01:17:14', '2023-07-17 08:17:14'),
('969a7f99c5d07b06f385f7a2b912a6ef5feb7314946e8c56924a4ca4a51bf14c096efa98e90ceecb', 2, 1, 'Token', '[]', 0, '2022-07-17 14:09:24', '2022-07-17 14:09:24', '2023-07-17 21:09:24'),
('a1c15b79d9231b58baea3a2130ee4956f61075fa134a4b1d66831f10ab53e6159970a817df764383', 3, 1, 'Token', '[]', 0, '2022-07-26 14:14:49', '2022-07-26 14:14:49', '2023-07-26 21:14:49'),
('ae2bb3f330dae5c0313c91dbe1cee7311a5e5af79e63967f98f904784d76b3c51c6be8c5a9c8b04c', 2, 1, 'Token', '[]', 0, '2022-07-26 15:03:52', '2022-07-26 15:03:52', '2023-07-26 22:03:52'),
('bf793dc2566bd2fdcaac9f53530dca244b2d8396d71c668097d88cf065835c79824acc1a60b4d032', 2, 1, 'Token', '[]', 0, '2022-07-26 14:33:37', '2022-07-26 14:33:37', '2023-07-26 21:33:37'),
('bfd6644e744df1b84b270d773b3c1be3b76707fcfa032d533f350587fdbf3ded1c921efd1bbbfb92', 2, 1, 'Token', '[]', 0, '2022-07-26 15:23:36', '2022-07-26 15:23:36', '2023-07-26 22:23:36'),
('d3a3fbe9905083ffb740c22ee3a92c9f7ebbb5b3d7317f56c50b18806242e78b36113160a9aaf8ea', 2, 1, 'Token', '[]', 0, '2022-07-17 17:23:37', '2022-07-17 17:23:37', '2023-07-18 00:23:37'),
('f633ada8623a68e63060e14a21be79d2888e038858d63905491b415f83e4f57fa58481e3c512026b', 2, 1, 'Token', '[]', 0, '2022-07-26 14:09:59', '2022-07-26 14:09:59', '2023-07-26 21:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'sugh17qroQzfVPY9NYxSRXX1q0asGU0IGZFvoEME', NULL, 'http://localhost', 1, 0, 0, '2022-07-17 01:16:55', '2022-07-17 01:16:55'),
(2, NULL, 'Laravel Password Grant Client', '5cWoDMqFmdjtUmtQ2IF5zMw5UEpA8Ez0jNw1KcMe', 'users', 'http://localhost', 0, 1, 0, '2022-07-17 01:16:55', '2022-07-17 01:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-17 01:16:55', '2022-07-17 01:16:55');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sell_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `best` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `premium` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `old_price`, `sell_price`, `best`, `premium`, `is_active`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Starter', '0', '0', 'no', 'no', 1, 'SAdmin', 'SAdmin', '2022-06-12 07:46:40', '2022-06-12 07:53:48'),
(2, 'Basic', '200000', '150000', 'yes', 'no', 1, 'SAdmin', NULL, '2022-06-12 07:54:55', '2022-06-12 07:54:55'),
(3, 'Premium', '300000', '250000', 'no', 'yes', 1, 'SAdmin', NULL, '2022-06-12 07:55:32', '2022-06-12 07:55:32');

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
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission`
--

INSERT INTO `permission` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'create', '2022-07-13 23:33:12', '2022-07-13 23:33:12'),
(2, 'edit', '2022-07-13 23:33:12', '2022-07-13 23:33:12'),
(3, 'delete', '2022-07-13 23:33:12', '2022-07-13 23:33:12');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Supermin', NULL, NULL, '2022-07-13 23:33:12', '2022-07-13 23:33:12'),
(2, 'Admin', NULL, NULL, '2022-07-13 23:33:12', '2022-07-13 23:33:12'),
(3, 'User', NULL, NULL, '2022-07-13 23:33:12', '2022-07-13 23:33:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `photo`, `is_active`, `status`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'SAdmin', 'sadmin@system.com', NULL, '$2y$10$TgfJteb0YBueW4bgOLKlfuSOy3MzCe/..6BT05W0QAL2CNOLIX.hy', NULL, 1, 99, 1, 'uw1lWj0lVCO88XygxayaQHmplti1vo63CKUubmBslTmNBpWdsynSMBiobupK', '2022-07-13 23:33:12', '2022-07-13 23:33:12'),
(2, 'Insan Hadi Karunia', NULL, 'insanhadikarunia@gmail.com', NULL, '$2y$10$Vi9fM.IkT1yHSFKZb2vs.O.vjZp.ASgzMDPGPUyMpWsR0gZ27/85.', NULL, 1, NULL, 3, NULL, '2022-07-17 01:13:54', '2022-07-17 01:13:54'),
(3, 'User Satu', NULL, 'user1@gmail.com', NULL, '$2y$10$DSUCLhiwMmIqxJHQQmnWpOOuBk/TRPlHf82hIXSQYeTvq.T0Ggjs.', NULL, 1, NULL, 3, NULL, '2022-07-26 14:13:40', '2022-07-26 14:13:40'),
(4, 'User Dua', NULL, 'user2@gmail.com', NULL, '$2y$10$fGxj68IZ3PHYR9g5eGXCb.D2isUG4tHMV6w3oVuwubaX7MMHrhcxW', NULL, 1, NULL, 3, NULL, '2022-07-26 14:14:36', '2022-07-26 14:14:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `api_headers`
--
ALTER TABLE `api_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `base_urls`
--
ALTER TABLE `base_urls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basic_features`
--
ALTER TABLE `basic_features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feature_package`
--
ALTER TABLE `feature_package`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feature_package_package_id_foreign` (`package_id`);

--
-- Indexes for table `invitation_themes`
--
ALTER TABLE `invitation_themes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_permission_menu_id_foreign` (`menu_id`);

--
-- Indexes for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `api_headers`
--
ALTER TABLE `api_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `base_urls`
--
ALTER TABLE `base_urls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `basic_features`
--
ALTER TABLE `basic_features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `features`
--
ALTER TABLE `features`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feature_package`
--
ALTER TABLE `feature_package`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `invitation_themes`
--
ALTER TABLE `invitation_themes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `menu_permission`
--
ALTER TABLE `menu_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `menu_role`
--
ALTER TABLE `menu_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `feature_package`
--
ALTER TABLE `feature_package`
  ADD CONSTRAINT `feature_package_package_id_foreign` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_permission`
--
ALTER TABLE `menu_permission`
  ADD CONSTRAINT `menu_permission_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `menu_role`
--
ALTER TABLE `menu_role`
  ADD CONSTRAINT `menu_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
