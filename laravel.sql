-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 01, 2020 at 07:40 AM
-- Server version: 8.0.22-0ubuntu0.20.04.3
-- PHP Version: 7.3.23-4+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `currency`
--

CREATE TABLE `currency` (
  `id` int NOT NULL,
  `NumCode` varchar(255) DEFAULT NULL,
  `CharCode` varchar(255) DEFAULT NULL,
  `Nominal` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `currency`
--

INSERT INTO `currency` (`id`, `NumCode`, `CharCode`, `Nominal`, `Name`, `Value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, '36', 'AUD', '1', 'Австралийский доллар\r\n', '562,584', NULL, NULL, NULL),
(4, '944', 'AZN', '1', 'Азербайджанский манат\r\n', '448,499', NULL, NULL, NULL),
(5, '826', 'GBP', '1', 'Фунт стерлингов Соединенного королевства\r\n', '1,016,507', NULL, NULL, NULL),
(6, '51', 'AMD', '100', 'Армянских драмов\r\n', '149,938', NULL, NULL, NULL),
(7, '933', 'BYN', '1', 'Белорусский рубль', '294,583', NULL, NULL, NULL),
(8, '975', 'BGN', '1', 'Болгарский лев\r\n', '466,568', NULL, NULL, NULL),
(9, '986', 'BRL', '1', 'Бразильский реал\r\n', '142,587', NULL, NULL, NULL),
(10, '348', 'HUF', '100', 'Венгерских форинтов\r\n', '252,707', NULL, NULL, NULL),
(11, '344', 'HKD', '10', 'Гонконгских долларов\r\n', '983,085', NULL, NULL, NULL),
(12, '208', 'DKK', '1', 'Датская крона\r\n', '122,622', NULL, NULL, NULL),
(13, '840', 'USD', '1', 'Доллар США\r\n', '761,999', NULL, NULL, NULL),
(14, '978', 'EUR', '1', 'Евро\r\n', '912,037', NULL, NULL, NULL),
(15, '356', 'INR', '10', 'Индийских рупий\r\n', '102,993', NULL, NULL, NULL),
(16, '398', 'KZT', '100', 'Казахстанских тенге\r\n', '179,066', NULL, NULL, NULL),
(17, '124', 'CAD', '1', 'Канадский доллар\r\n', '587,011', NULL, NULL, NULL),
(18, '417', 'KGS', '100', 'Киргизских сомов\r\n', '898,313', NULL, NULL, NULL),
(19, '156', 'CNY', '1', 'Китайский юань\r\n', '115,754', NULL, NULL, NULL),
(20, '498', 'MDL', '10', 'Молдавских леев\r\n', '441,739', NULL, NULL, NULL),
(21, '578', 'NOK', '10', 'Норвежских крон\r\n', '861,990', NULL, NULL, NULL),
(22, '985', 'PLN', '1', 'Польский злотый\r\n', '203,623', NULL, NULL, NULL),
(23, '946', 'RON', '1', 'Румынский лей\r\n', '187,269', NULL, NULL, NULL),
(24, '960', 'XDR', '1', 'СДР (специальные права заимствования)\r\n', '1,086,054', NULL, NULL, NULL),
(25, '702', 'SGD', '1', 'Сингапурский доллар\r\n', '569,761', NULL, NULL, NULL),
(26, '972', 'TJS', '10', 'Таджикских сомони\r\n', '672,698', NULL, NULL, NULL),
(27, '949', 'TRY', '10', 'Турецких лир\r\n', '974,822', NULL, NULL, NULL),
(28, '934', 'TMT', '1', 'Новый туркменский манат\r\n', '218,025', NULL, NULL, NULL),
(29, '860', 'UZS', '10000', 'Узбекских сумов\r\n', '735,449', NULL, NULL, NULL),
(30, '980', 'UAH', '10', 'Украинских гривен\r\n', '267,321', NULL, NULL, NULL),
(31, '203', 'CZK', '10', 'Чешских крон\r\n', '348,199', NULL, NULL, NULL),
(32, '752', 'SEK', '10', 'Шведских крон\r\n', '898,128', NULL, NULL, NULL),
(33, '756', 'CHF', '1', 'Швейцарский франк\r\n', '844,414', NULL, NULL, NULL),
(34, '710', 'ZAR', '10', 'Южноафриканских рэндов\r\n', '498,687', NULL, NULL, NULL),
(35, '410', 'KRW', '1000', 'Вон Республики Корея\r\n', '687,986', NULL, NULL, NULL),
(36, '392', 'JPY', '100', 'Японских иен\r\n', '731,566', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leads`
--

CREATE TABLE `leads` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `source_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `lead_details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `asign_to` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `feedback` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('1','2','3') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1' COMMENT '1 Pending, 2 Failed, 3 Closed',
  `total_amount` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_of_installment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_08_07_040926_create_sources_table', 1),
(4, '2020_08_07_042242_create_money_table', 1),
(5, '2020_08_07_082101_create_leads_table', 1),
(6, '2020_08_10_041303_add_new_fields_to_users_table', 1),
(7, '2020_08_10_043101_add_orignal_password_to_users_table', 1),
(8, '2020_08_10_090623_add_asign_to_to_leads_table', 1),
(9, '2020_08_11_090005_create_installments_table', 1),
(10, '2020_08_11_090537_add_fields_to_leads_table', 1),
(11, '2020_08_12_050739_create_feedbacks_table', 1),
(12, '2020_08_12_054525_create_notes_table', 1),
(13, '2020_08_28_091409_create_bulk_table', 1),
(14, '2020_09_03_111224_add_delete_option_to_sources_table', 1),
(15, '2020_09_03_111323_add_delete_option_to_leads_table', 1),
(16, '2020_09_03_122012_add_delete_option_to_users_table', 1),
(17, '2020_09_04_0838412_add_user_id_to_sources_table', 1),
(18, '2020_09_04_0839172_add_user_id_to_leads_table', 1),
(19, '2020_09_04_084655_add_user_id_to_users_table', 1),
(20, '2020_09_04_114041_add_user_id_to_notes_table', 1),
(21, '2016_06_01_000001_create_oauth_auth_codes_table', 2),
(22, '2016_06_01_000002_create_oauth_access_tokens_table', 2),
(23, '2016_06_01_000003_create_oauth_refresh_tokens_table', 2),
(24, '2016_06_01_000004_create_oauth_clients_table', 2),
(25, '2016_06_01_000005_create_oauth_personal_access_clients_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `client_id` int UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('0312da22ada9b459906fb0b8f976fc2a15c4e8ff9c4e91ddcf972658a926c8f76e3f0e325214ccab', 40, 1, 'MyApp', '[]', 0, '2020-10-28 04:15:14', '2020-10-28 04:15:14', '2021-10-28 04:15:14'),
('03d403cc0b495d5da9471ec8cda3eb47809b10f24ce226eb65da1c2619cd88a825c0d098ed88664d', 40, 1, 'MyApp', '[]', 0, '2020-10-29 11:41:07', '2020-10-29 11:41:07', '2021-10-29 11:41:07'),
('03f7e4544349ee2198ecddfdfe3db40f0a1e03d86a41911737626ce426bd7bdec4ce396a12e51c90', 48, 1, 'MyApp', '[]', 0, '2020-12-01 05:57:43', '2020-12-01 05:57:43', '2021-12-01 05:57:43'),
('04424922a5ae515cc276d6e028924b32640c88a1aa5099d20e8dc41d1a701b3e764e89fc64e90af6', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:35:57', '2020-09-09 05:35:57', '2021-09-09 11:05:57'),
('052ad5df6070446c688f42dc055344053366e693c6cf932914aa372c81eedb7eacc1aaf2898f66a2', 40, 1, 'MyApp', '[]', 0, '2020-10-27 10:48:31', '2020-10-27 10:48:31', '2021-10-27 10:48:31'),
('0610422b003f6055fd600aad52b6d9b1f8acf3fb34c942a9493e518fd081ec961bd871762054f24c', 1, 1, 'MyApp', '[]', 0, '2020-10-21 03:34:18', '2020-10-21 03:34:18', '2021-10-21 09:04:18'),
('06a0248cd41c76367579ce9af5438c3cb3aeed6eb2567d8c028ac13a3b97924a56b7975a73fac637', 34, 1, 'MyApp', '[]', 0, '2020-10-12 23:55:29', '2020-10-12 23:55:29', '2021-10-13 05:25:29'),
('09d7524f70a762f28609d0f1cca95ef91da40901bb5c5518d34425a0021d027ab078627d3452d669', 38, 1, 'MyApp', '[]', 0, '2020-10-26 11:37:53', '2020-10-26 11:37:53', '2021-10-26 11:37:53'),
('09ef169204228e17d2a72d83e0b20c519fd17ac08c4a30dad32ab409d31d6ceb0840fef3c5d699b9', 40, 1, 'MyApp', '[]', 0, '2020-11-17 05:37:30', '2020-11-17 05:37:30', '2021-11-17 05:37:30'),
('0aa51d47c6dc781b3568cfc6fb33b3bd1465d6ae5ca9111b534ac8f503e4857b83bc1e6f8a0cce2c', 40, 1, 'MyApp', '[]', 0, '2020-11-09 04:53:54', '2020-11-09 04:53:54', '2021-11-09 04:53:54'),
('0bf6c04f1334e867a32bf918760f3ec0092298372c6d1fadadae8da125356502e8642e6ab529e9dd', 1, 1, 'MyApp', '[]', 0, '2020-10-23 05:59:50', '2020-10-23 05:59:50', '2021-10-23 05:59:50'),
('0c88cfa1a633309a6eaf6ce12b37bbe12bba256894de997e55f540f5aac6aaf9669e328b1687c537', 40, 1, 'MyApp', '[]', 0, '2020-11-05 12:38:53', '2020-11-05 12:38:53', '2021-11-05 12:38:53'),
('0efc7b2e10944ba7629191b8b725256de30634ade6279b3115a2fa3c6b24b60d3cbb2666c0d3c9aa', 40, 1, 'MyApp', '[]', 0, '2020-11-11 06:13:44', '2020-11-11 06:13:44', '2021-11-11 06:13:44'),
('0f01ff34d9610f88193ea6706d51e7f2642ae7ad7830c8af504b2413e5da000aaade59813ac15644', 24, 1, 'MyApp', '[]', 0, '2020-09-24 06:47:18', '2020-09-24 06:47:18', '2021-09-24 12:17:18'),
('0f7b3887b0364eff7539fee87e22dd89493f2950d32f07d9c511892e00880f2acb6d9ce04d54c96b', 39, 1, 'MyApp', '[]', 0, '2020-10-27 10:46:46', '2020-10-27 10:46:46', '2021-10-27 10:46:46'),
('1134bb300ccd3a6cf505c0a54e8567fb5ffc30a1d8ae6b5d4377d70d89749023def0722205f98e2e', 38, 1, 'MyApp', '[]', 0, '2020-10-26 09:26:02', '2020-10-26 09:26:02', '2021-10-26 09:26:02'),
('119624ec5e31ffa8e9adcd3781ddbb3cf37b7d2747b62d8bd175680d14363258a26c7f7e924a99e7', 42, 1, 'MyApp', '[]', 0, '2020-10-27 10:50:42', '2020-10-27 10:50:42', '2021-10-27 10:50:42'),
('12dc2ca8242e154cdc0fdd6d6bbfb06ccad6551982aa3303f3041da63372b02db7853610b0075eaa', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:41:07', '2020-09-09 05:41:07', '2021-09-09 11:11:07'),
('1474805d7de9301fb57cae24c46bc4a1a3f9a328572aaf404cddc8a06e02552de4e81dc85da5072b', 41, 1, 'MyApp', '[]', 0, '2020-10-27 13:02:40', '2020-10-27 13:02:40', '2021-10-27 13:02:40'),
('14c2b253044b051030341f09639ec1b025a8f523bde4fb354e31a713d79b686486cbcb2b9cd10eb7', 22, 1, 'MyApp', '[]', 0, '2020-09-24 06:42:15', '2020-09-24 06:42:15', '2021-09-24 12:12:15'),
('14cd49d24b1b812ea8c43b3c5ec60e71d2bf60a76e63aeba7dd6442776ecb4697b180f0173d9e964', 30, 1, 'MyApp', '[]', 0, '2020-10-11 23:40:59', '2020-10-11 23:40:59', '2021-10-12 05:10:59'),
('17f16799939cff316f92b65d6afca4a86926d9d06ef43f2fa343e7ee3c2f753b2e779999d5b1d202', 15, 1, 'MyApp', '[]', 0, '2020-09-09 04:17:42', '2020-09-09 04:17:42', '2021-09-09 09:47:42'),
('197ac5b69cbf4581b71574820ef834875a66e210cf0c132197f8bd9c55271b4bf013b8188254c3fa', 39, 1, 'MyApp', '[]', 0, '2020-10-27 10:46:07', '2020-10-27 10:46:07', '2021-10-27 10:46:07'),
('1c2498c9e90601f4d2062ffff1713d0c0ae07102626cf19e4ccef012e45179c54a82d3dd2c9eb531', 40, 1, 'MyApp', '[]', 0, '2020-11-06 12:48:01', '2020-11-06 12:48:01', '2021-11-06 12:48:01'),
('1d02a7377da3c7813f9e742c46eac7869be8cc2d37419c8fc199f45e3882d23c4c63082c00f12325', 12, 1, 'MyApp', '[]', 0, '2020-09-08 23:47:55', '2020-09-08 23:47:55', '2021-09-09 05:17:55'),
('1dbedc5de995839e7e9bd076ebfc89100645e3ef2cbd3d8f96ab0d25e2341c01cbf6e2825aa4ef8e', 40, 1, 'MyApp', '[]', 0, '2020-10-27 11:01:35', '2020-10-27 11:01:35', '2021-10-27 11:01:35'),
('1dc9022757c4ed02887ee18cbcc8d22b30e84ccb306936201154e101516156e43357f2be117f954a', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:38:58', '2020-09-09 05:38:58', '2021-09-09 11:08:58'),
('1e8df3c3248b75a3eedb3e11b2a4d54d6b7ceeb332880061019fd336427a78b76644ffeb9cd69f3e', 38, 1, 'MyApp', '[]', 0, '2020-10-26 09:51:44', '2020-10-26 09:51:44', '2021-10-26 09:51:44'),
('1f110c2973d3159f2d419e5487be78914c8cb704fa24c9bdfea49e8e33077918039ba30fd031e04a', 44, 1, 'MyApp', '[]', 0, '2020-10-27 10:57:09', '2020-10-27 10:57:09', '2021-10-27 10:57:09'),
('2237c3dc72522ee95deb368897219191fb12b12a04e0fd1cea063fef77a3ef67cafa6259f0be9365', 40, 1, 'MyApp', '[]', 0, '2020-10-27 10:53:56', '2020-10-27 10:53:56', '2021-10-27 10:53:56'),
('2292122f19fdd8ecafed751c23abed0d5263f9853f53c2217c7da62169b1b5e071d104d30afe5d7f', 28, 1, 'MyApp', '[]', 0, '2020-09-29 01:19:08', '2020-09-29 01:19:08', '2021-09-29 06:49:08'),
('24781b2386cf7d042a9bfe092b63cbc854380303fab2486313abe6ed4912530afcb8231360262d36', 38, 1, 'MyApp', '[]', 0, '2020-10-26 13:53:10', '2020-10-26 13:53:10', '2021-10-26 13:53:10'),
('2660106d2e9fd9c70e69b1195dc791dd980ee143f1f1ed71814568567897b1e7751641c6dd6811e7', 38, 1, 'MyApp', '[]', 0, '2020-10-26 11:35:25', '2020-10-26 11:35:25', '2021-10-26 11:35:25'),
('278c0d9505899176c82880f7cd0ed7d648374ed8fa3c29a01c185c20682320a5b967d2006d01081b', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:34:17', '2020-09-09 05:34:17', '2021-09-09 11:04:17'),
('2858a53a0412b3218d9af6f21def5fa7fe4934f76fa321fb8f678374ff17c4a164f7df7e9cd82bcb', 40, 1, 'MyApp', '[]', 0, '2020-11-10 09:00:08', '2020-11-10 09:00:08', '2021-11-10 09:00:08'),
('2c5d7155de066612217ca6087ec428e70e6c14b98df585d192329e12f323f42a8937c7a2a851a3e6', 40, 1, 'MyApp', '[]', 0, '2020-11-09 05:21:08', '2020-11-09 05:21:08', '2021-11-09 05:21:08'),
('2e38fe846116445e32acd1b92d2559992004faafc4f4f66c5fab7eb4c010a68eaf352195b1c3ea06', 14, 1, 'MyApp', '[]', 0, '2020-09-09 03:29:23', '2020-09-09 03:29:23', '2021-09-09 08:59:23'),
('3513a55186e0dde18652d360297480ec5793e09dc0f105eff27f3b32bfbb040f0f996f9029c6b0bd', 40, 1, 'MyApp', '[]', 0, '2020-11-23 05:14:34', '2020-11-23 05:14:34', '2021-11-23 05:14:34'),
('3603e5c1c75093864effb443e9b0cdbfdb245aa197d6cecd2b88a8b0ed5cf9a0068d775f79bfc785', 1, 1, 'MyApp', '[]', 0, '2020-10-29 05:49:27', '2020-10-29 05:49:27', '2021-10-29 05:49:27'),
('371e8d60de0d6629e30b48a6e4e199fe81ae7047dd159c6df01a5bc323478ef9afb77fd35d0c9ff7', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:59:17', '2020-09-09 05:59:17', '2021-09-09 11:29:17'),
('372c47d498b970f30268760587b067ed6b35a121e34e472cfde9850999b385396d4e60aa6cf7a9cd', 40, 1, 'MyApp', '[]', 0, '2020-11-10 09:38:50', '2020-11-10 09:38:50', '2021-11-10 09:38:50'),
('37f8da0cac42cd33ef5d2d37ab778abcf45997309843f3df99c25228418f66a3e2406c098558146d', 13, 1, 'MyApp', '[]', 0, '2020-09-09 00:41:42', '2020-09-09 00:41:42', '2021-09-09 06:11:42'),
('385e42c7069ae6a22782f62e7221257929d000000ef6bbb33f5872157a73e156f211cd26f37c6263', 41, 1, 'MyApp', '[]', 0, '2020-10-27 10:49:28', '2020-10-27 10:49:28', '2021-10-27 10:49:28'),
('3b97882c060a063cb45f0e4ebfdc3b787e92ea3f4022f65462b013adad1a702e5383db16982219bf', 40, 1, 'MyApp', '[]', 0, '2020-10-28 12:18:11', '2020-10-28 12:18:11', '2021-10-28 12:18:11'),
('3f0f26cc426210ee176f4ce6ec481fe1c8ab05ff72ca0c43b27ac846c6bfb8e8331b6bfa85a476d4', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:44:27', '2020-09-09 05:44:27', '2021-09-09 11:14:27'),
('3fbfc6d8e8448fa19e29b4965d9e77a4b133cc7abdb1eff7d21c1b2b2701e87caf9936fefc5cc510', 31, 1, 'MyApp', '[]', 0, '2020-10-11 23:43:15', '2020-10-11 23:43:15', '2021-10-12 05:13:15'),
('4257d2e0630b17ddac7d4a07dd0484cbc9459b4b38c7f424844b6f9351c542c2afa4770364f36f4f', 40, 1, 'MyApp', '[]', 0, '2020-10-28 02:31:02', '2020-10-28 02:31:02', '2021-10-28 02:31:02'),
('45ffe8e22c2f212ab57ff4ff1a0363220a4998d037ac636000dbc6b8e623645ce5a514734a14d5c6', 38, 1, 'MyApp', '[]', 0, '2020-10-27 08:34:00', '2020-10-27 08:34:00', '2021-10-27 08:34:00'),
('473e9d747ee03066d06b7a0b1a633653afaa7c228ddc50af2370c5b93ab50e15c5a8d5052a27e1a4', 6, 1, 'MyApp', '[]', 0, '2020-09-08 23:37:43', '2020-09-08 23:37:43', '2021-09-09 05:07:43'),
('49a99229dadc93ac89cbb3c2e9a4f19988cc069c65bdbe5faab8b8c32b0aea597ee080d35b4733ff', 1, 1, 'MyApp', '[]', 0, '2020-09-23 06:19:44', '2020-09-23 06:19:44', '2021-09-23 11:49:44'),
('4af3074794652819499500e1b6522f53cd73f9264af1d254c488d64ac571231ad730691c164f6ded', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:38:26', '2020-09-09 05:38:26', '2021-09-09 11:08:26'),
('4e152db2167dbb7696759989df4c4f330fdfbcf8db0bb0e3677f728232a60e3e6f0d3978d0efb735', 18, 1, 'MyApp', '[]', 0, '2020-09-09 04:57:51', '2020-09-09 04:57:51', '2021-09-09 10:27:51'),
('523677797e67aeef0c37e2ed332831e7516270164a7c7241c52eaafedd1c2f1a334d767bbf603314', 40, 1, 'MyApp', '[]', 0, '2020-10-30 09:29:48', '2020-10-30 09:29:48', '2021-10-30 09:29:48'),
('53d457d23f7f0573322aed5e2de539bf8a3e49f4dd8a2f525156abfc3ddbd6beb000328a556499f4', 38, 1, 'MyApp', '[]', 0, '2020-10-27 09:41:11', '2020-10-27 09:41:11', '2021-10-27 09:41:11'),
('58f82258ff47dbb04b88b0823a419f8d7ae325c09de0b6159b4bfc9e3337bef2eace89072729e195', 1, 1, 'MyApp', '[]', 0, '2020-09-08 23:22:14', '2020-09-08 23:22:14', '2021-09-09 04:52:14'),
('5c22f353e6202443afd5e589b3e1257fd35f5ef2e672c2d41459b35dc34b4fa4b3f629c87885bc84', 23, 1, 'MyApp', '[]', 0, '2020-09-24 06:46:16', '2020-09-24 06:46:16', '2021-09-24 12:16:16'),
('5cdaa7ea6a8a614b2b795b356f6c6cb80d20017ed102cff0272c7c378a47f501ae847781432725b8', 29, 1, 'MyApp', '[]', 0, '2020-09-29 01:36:57', '2020-09-29 01:36:57', '2021-09-29 07:06:57'),
('5d57ef937e28ec64094229c6d229650fc690de17b967d0ee030e32245df73b805e69b2425c7884bd', 40, 1, 'MyApp', '[]', 0, '2020-11-04 06:18:50', '2020-11-04 06:18:50', '2021-11-04 06:18:50'),
('61a64b5d20a46047a9288226337d46c166d2c6a0132c1c3c145f2778d7f1f25443d3c80578b11efc', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:34:16', '2020-09-09 05:34:16', '2021-09-09 11:04:16'),
('659347dba538d3e6201827ee0da140b6a75b57457fbea6301676507d616ceab6b2062157c41cd702', 25, 1, 'MyApp', '[]', 0, '2020-09-24 06:53:51', '2020-09-24 06:53:51', '2021-09-24 12:23:51'),
('66a405b42ccc11548079c5712cc9563ae8182e96e8a07adf28564b3549ef57c4df39f7e429e3be6c', 40, 1, 'MyApp', '[]', 0, '2020-11-18 06:04:16', '2020-11-18 06:04:16', '2021-11-18 06:04:16'),
('67991d1d0045d4522da21f7b10d50af41860d460c81000ac7d7e00a1b1f0e7a7552d7644291293fd', 35, 1, 'MyApp', '[]', 0, '2020-10-13 00:30:27', '2020-10-13 00:30:27', '2021-10-13 06:00:27'),
('6810ff8e4feb3e56a64b29e6d65b67416e58a6fa865e429b74a738636f94689234ea9f6c316cfde3', 1, 1, 'MyApp', '[]', 0, '2020-10-23 03:23:07', '2020-10-23 03:23:07', '2021-10-23 03:23:07'),
('6a8993aa4a1c9a8193aa0a0861a3c848982de27d703799c07d14c96a5ea83a57f5fdeadd6eafd67f', 1, 1, 'MyApp', '[]', 0, '2020-12-01 05:34:29', '2020-12-01 05:34:29', '2021-12-01 05:34:29'),
('6abd153d5ec57f9518ab39930ce64873b83d0ce5246513feec931f4aed1c6d2d896ed689ed2dac8d', 40, 1, 'MyApp', '[]', 0, '2020-11-03 11:52:39', '2020-11-03 11:52:39', '2021-11-03 11:52:39'),
('6b325d7d9ac7f1b2ad8981bd11c84fa73f35369076991ac19c757beda5b2e6dc70b6d1caa8067798', 36, 1, 'MyApp', '[]', 0, '2020-10-27 10:42:56', '2020-10-27 10:42:56', '2021-10-27 10:42:56'),
('6d14dc3b333a453dac6a52462bdfc3c9f842be58de14bf6473e16c97b784a5d22b3538efccff1cd8', 40, 1, 'MyApp', '[]', 0, '2020-11-18 06:03:34', '2020-11-18 06:03:34', '2021-11-18 06:03:34'),
('6e8bc037b7ac87fca5249bbd66f80efffec2140d185e3dbfc59bbec4fb17d4eb82ea5589182b4c5f', 33, 1, 'MyApp', '[]', 0, '2020-10-12 22:56:47', '2020-10-12 22:56:47', '2021-10-13 04:26:47'),
('6f9a495577bd9f6716e1d9d7079bf8b169d51df6582bc59c7c45a170712b13867dd7726a5ed56d9a', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:35:27', '2020-09-09 05:35:27', '2021-09-09 11:05:27'),
('6fdd479aa407b996569b1bb68aa210c606e4d52b6f29bcef1ae7cf139d2485a9eceda535a3911738', 38, 1, 'MyApp', '[]', 0, '2020-10-26 11:32:13', '2020-10-26 11:32:13', '2021-10-26 11:32:13'),
('70daf89501fc587cd1cbe97713f6fc16055adc7d30bc6237fe1314cc563426759ee4ce9ba6b6e80b', 41, 1, 'MyApp', '[]', 0, '2020-10-27 10:57:39', '2020-10-27 10:57:39', '2021-10-27 10:57:39'),
('71c97a7a4b8bf99527f8a76c3726530310bd0dddcd32ae4dc4f63f8d8ca0241ba9b8e2347e259847', 40, 1, 'MyApp', '[]', 0, '2020-11-04 09:37:06', '2020-11-04 09:37:06', '2021-11-04 09:37:06'),
('760755eaeb0ade7ea2a40e200aa1c9d223f3afd8cbf928d8bd957a44552cca32d448164ce7897668', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:37:19', '2020-09-09 05:37:19', '2021-09-09 11:07:19'),
('796b7c2b9b328e9d14e7180ef6e3f9f6a5b2d256856ff7b614fcf1d356f58b1f61cf6b7155e9e517', 40, 1, 'MyApp', '[]', 0, '2020-10-29 06:28:26', '2020-10-29 06:28:26', '2021-10-29 06:28:26'),
('7aaacd3db70f2544a44646f4f99019c21715214c9e2d678eae0073afc169556ce51db4c66ac795d8', 1, 1, 'MyApp', '[]', 0, '2020-12-01 06:29:19', '2020-12-01 06:29:19', '2021-12-01 06:29:19'),
('7bae05ac2998fd16e0b602419d52294b2ccd9593b8963579206b9b32e76bb05371f8888ce71fda81', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:36:26', '2020-09-09 05:36:26', '2021-09-09 11:06:26'),
('81f1049cebafa23952951202e5bd6f6f263f9545ef4fc86f5fd7bcc63ab24fd743468da09d55df03', 1, 1, 'MyApp', '[]', 0, '2020-11-20 11:34:28', '2020-11-20 11:34:28', '2021-11-20 11:34:28'),
('83a356cd2ac1874c6a86413c7d0adf123b6219cc5c818b629762381fe662dd775d38c7a1c26e2884', 9, 1, 'MyApp', '[]', 0, '2020-09-08 23:41:44', '2020-09-08 23:41:44', '2021-09-09 05:11:44'),
('85993eeb07f7316fcd8dc681a3b13165c8758ad690fe7aac67498c2bdc3f8bf98b8415b4c3ea10f9', 40, 1, 'MyApp', '[]', 0, '2020-11-10 09:27:20', '2020-11-10 09:27:20', '2021-11-10 09:27:20'),
('89606e51b171b4c1c5ef348818f3ad284bc4607ca24639c57f478f517d2587f404d352800bafb36c', 1, 1, 'MyApp', '[]', 0, '2020-09-29 01:26:34', '2020-09-29 01:26:34', '2021-09-29 06:56:34'),
('8d6eed961811374fdc96e1a0f8a57f686f230b2fb8e445e8de64e21bec16f0e67f4547cd47797a97', 38, 1, 'MyApp', '[]', 0, '2020-10-26 11:42:18', '2020-10-26 11:42:18', '2021-10-26 11:42:18'),
('8e79a4ca4972a26efc220c24f91dddba3f6ff5117e1cc7f49a190690d088d2005c12fbc3cb2ceced', 1, 1, 'MyApp', '[]', 0, '2020-09-24 02:25:41', '2020-09-24 02:25:41', '2021-09-24 07:55:41'),
('8eb0ab6e6a95428e853584e237e07d7ac46f4d9cd71fd916ddc3e9dc4b467d9d24afa3b8a8c6f94f', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:41:52', '2020-09-09 05:41:52', '2021-09-09 11:11:52'),
('8fdae9abcd6f49bdd5e8d88cbb6e76714390526f413164d0bc8a84c1b61e1c86ffd25380f0edb6ab', 27, 1, 'MyApp', '[]', 0, '2020-09-24 07:02:55', '2020-09-24 07:02:55', '2021-09-24 12:32:55'),
('905ef21e5533026eaba7f32fc45249ac4a101be3a332a261b0707826f93e899a7ab635ef8f372a40', 40, 1, 'MyApp', '[]', 0, '2020-11-04 11:08:38', '2020-11-04 11:08:38', '2021-11-04 11:08:38'),
('934157cee6f88dfedcb9a38ca85dd6da36da4122269c4795e05c6e38db89644e61190c74f6faa9de', 5, 1, 'MyApp', '[]', 0, '2020-09-08 23:20:05', '2020-09-08 23:20:05', '2021-09-09 04:50:05'),
('94fe89a6d0bf2536e753493bfe8c059ccbcb2c45d4134cf1678ed6938520624d5b54f6a235b1282a', 36, 1, 'MyApp', '[]', 0, '2020-10-22 02:02:31', '2020-10-22 02:02:31', '2021-10-22 07:32:31'),
('95b2865bd10fcb0b002a3b68f52f846791f9711367ec8bf7419d8c33d52329f092cfb73f9c8eb447', 19, 1, 'MyApp', '[]', 0, '2020-09-23 06:17:37', '2020-09-23 06:17:37', '2021-09-23 11:47:37'),
('96478c4b242dce7ebb18b1e51c7739181f7b3c3725b1163375d78d04a678618c9f8d88b492f14127', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:42:59', '2020-09-09 05:42:59', '2021-09-09 11:12:59'),
('9b660f9881d2b6f3d05e87347740525f131597883257bb5628739fefe05359274c928b443dd77315', 40, 1, 'MyApp', '[]', 0, '2020-11-09 11:14:37', '2020-11-09 11:14:37', '2021-11-09 11:14:37'),
('9b9993680bb74fcd462aad849649b5fe74bff8330b295813d1b8771899dca9590535efa7153b91d1', 40, 1, 'MyApp', '[]', 0, '2020-11-18 04:03:18', '2020-11-18 04:03:18', '2021-11-18 04:03:18'),
('9c17afd42b1900635f53cde12cccbdd55d76be310ed5797e7ddc51f13c9ab9c110e8c0fbe28e579b', 1, 1, 'MyApp', '[]', 0, '2020-09-24 02:25:39', '2020-09-24 02:25:39', '2021-09-24 07:55:39'),
('9d8cfd00e663c626dbfb5ad4b747b27a32e0c06526a1c23be92ffb5be9cfcc91a09cc760cc1a2258', 38, 1, 'MyApp', '[]', 0, '2020-10-27 04:14:30', '2020-10-27 04:14:30', '2021-10-27 04:14:30'),
('9e3ac3fa89c33fbd06ba87c06acd9196221a1790a22787c83dd39051bd76f1f6f3c190a5dd865671', 40, 1, 'MyApp', '[]', 0, '2020-11-03 10:29:29', '2020-11-03 10:29:29', '2021-11-03 10:29:29'),
('a09dc21f4d20e796a756ad1157f98c28a646e74075e4b1a64919eb931e729056d14ad8dee0cb00ef', 1, 1, 'MyApp', '[]', 0, '2020-09-08 23:03:52', '2020-09-08 23:03:52', '2021-09-09 04:33:52'),
('a0c2724727bbb8b44ce74a8a5a2146f13efb03df8dd5b82433ddaa839b5fad118705c41628b8c570', 40, 1, 'MyApp', '[]', 0, '2020-10-29 12:02:09', '2020-10-29 12:02:09', '2021-10-29 12:02:09'),
('a124889b70021c2ed3bce91204a0b0072e821bf536a976b3e9c6c5ef262b943b64cc7145c59e8437', 38, 1, 'MyApp', '[]', 0, '2020-10-23 10:32:55', '2020-10-23 10:32:55', '2021-10-23 10:32:55'),
('a29083eda978b26b9306c4d620fb6fd710e7673cdf7721ed2da1fafe988df230b8d4bec2f5006468', 1, 1, 'MyApp', '[]', 0, '2020-10-12 22:50:09', '2020-10-12 22:50:09', '2021-10-13 04:20:09'),
('a48216ac95700aab76c6531ae52ae12a7ae457f94bdc0f555350c807e59b1c65e30c3d1d59c6bbf0', 40, 1, 'MyApp', '[]', 0, '2020-11-11 07:16:44', '2020-11-11 07:16:44', '2021-11-11 07:16:44'),
('a4e6795011137a45e7843a05150135b26a294fc1e3ef8e9fa25aec0a11f851eb95065ce335ee2852', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:30:49', '2020-09-09 05:30:49', '2021-09-09 11:00:49'),
('a5b7f68df2e3abc90736391864667cc55cd2f2d6765117dd569047cd0d28398275d73669e782a503', 1, 1, 'MyApp', '[]', 0, '2020-12-01 06:27:19', '2020-12-01 06:27:19', '2021-12-01 06:27:19'),
('a790e213fe2f9164b7487a0a3da442e0c4ada9c66ae68cd86d6cdd6df668f8e6af84a30671f9ecc9', 21, 1, 'MyApp', '[]', 0, '2020-09-24 06:42:03', '2020-09-24 06:42:03', '2021-09-24 12:12:03'),
('a8f67ee424da8ffdeb56a52d0fd3e64da8ac59acf6e8df584d880f8d4b6f723b87be2424b5e1ed9e', 38, 1, 'MyApp', '[]', 0, '2020-10-22 02:08:06', '2020-10-22 02:08:06', '2021-10-22 07:38:06'),
('a9b3bd9d001a4b2fef831a16e7db49a84c276e7e7518c3a4c149a24ee5b8fcbbd71a44adee3b6ead', 1, 1, 'MyApp', '[]', 0, '2020-09-08 23:08:16', '2020-09-08 23:08:16', '2021-09-09 04:38:16'),
('ac129d9e8ab6046b8e286d16a9c7017552936cc00cdaf62cc1d488daac1e92fd7fb5cac43e1aa63e', 38, 1, 'MyApp', '[]', 0, '2020-10-22 02:07:20', '2020-10-22 02:07:20', '2021-10-22 07:37:20'),
('ac2407537638e505f02282cad6a16692f3fc115cb86622ae997d7d11d7af178b8db3147cbbacfa2b', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:37:57', '2020-09-09 05:37:57', '2021-09-09 11:07:57'),
('af20f574bc917f92caaa28c0d4cc647bd04462c56a4788327c057177f571740ef77ec1b616fee1bb', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:44:55', '2020-09-09 05:44:55', '2021-09-09 11:14:55'),
('b08471f7dd3b4611210869ca051eac4e9bf896f0d65f4f56d15ba78f2ae9702c161e0bf2f586e3e3', 22, 1, 'MyApp', '[]', 0, '2020-09-24 07:13:56', '2020-09-24 07:13:56', '2021-09-24 12:43:56'),
('b0ffb29d9eb3a0dad4aef8b7388c3c4c90e36ab498fe7e8d15f400adb948166a30418f94179e2425', 1, 1, 'MyApp', '[]', 0, '2020-11-18 05:58:33', '2020-11-18 05:58:33', '2021-11-18 05:58:33'),
('b33bdb4ab04e46c00ddb75115869cbce5ce44856069e594983b2773f662726b52526c58801f4bc11', 30, 1, 'MyApp', '[]', 0, '2020-10-11 23:40:27', '2020-10-11 23:40:27', '2021-10-12 05:10:27'),
('b3e793ecd64c9e651f3e5bf7532bebdd2a97ec3b17830df3adc4d2098af3841825d7b85b94ed2d23', 1, 1, 'MyApp', '[]', 0, '2020-10-12 22:53:22', '2020-10-12 22:53:22', '2021-10-13 04:23:22'),
('b459cfde5ace9a0c645528a6ebd5948b150d3be32d806012742ce747feae2f2ff5db6e711ac34d58', 1, 1, 'MyApp', '[]', 0, '2020-09-24 03:40:03', '2020-09-24 03:40:03', '2021-09-24 09:10:03'),
('b5eed477886ef4229536796501474a9d5d38e9071fef818f8cde96d52cb28c44fccdb3db7c109209', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:59:52', '2020-09-09 05:59:52', '2021-09-09 11:29:52'),
('b69035ab41a299a060c4de2abff3c5d753a285141ab981ccaa57082f959eb953c46161af062886e0', 43, 1, 'MyApp', '[]', 0, '2020-10-27 10:51:32', '2020-10-27 10:51:32', '2021-10-27 10:51:32'),
('b81d963687de23ba152fba998618439ff7a1dd531760c1cb0a52c8c3409ae760031101876498cedf', 1, 1, 'MyApp', '[]', 0, '2020-10-29 05:26:03', '2020-10-29 05:26:03', '2021-10-29 05:26:03'),
('bacdbdac020b81d25013d1af270d23fb151906866d8e554b6f700e3beb034d9358b50e544e746298', 40, 1, 'MyApp', '[]', 0, '2020-11-30 08:46:48', '2020-11-30 08:46:48', '2021-11-30 08:46:48'),
('bb2eb90ef8907e724e31675ba0293c640b47e765a519282b2030e3ba0c1daa49f62cc7eaea82fab2', 40, 1, 'MyApp', '[]', 0, '2020-10-29 06:37:52', '2020-10-29 06:37:52', '2021-10-29 06:37:52'),
('bf8169a2d2c992a9555b021c3ad57db1d72ae52e03b393b523cd749eb43947948ee9e0249348cefb', 4, 1, 'MyApp', '[]', 0, '2020-09-08 23:05:53', '2020-09-08 23:05:53', '2021-09-09 04:35:53'),
('c1aa5d54920a308df4b255055d0bbaa47598f6e470ca0cae6b3d8a994e8c11ac662ef567bb4eae1c', 40, 1, 'MyApp', '[]', 0, '2020-10-28 04:44:52', '2020-10-28 04:44:52', '2021-10-28 04:44:52'),
('c1f90ba8ee6730d6e73a8969b016301c33bd8d90e88f91277d4d18a0a768aed50ee8247bcf22093b', 40, 1, 'MyApp', '[]', 0, '2020-11-05 04:08:06', '2020-11-05 04:08:06', '2021-11-05 04:08:06'),
('c3f9318655b9fcdb81ae035a028d45fc35908f2dae798957e4488f1a5d841825914750a14a75ca30', 17, 1, 'MyApp', '[]', 0, '2020-09-09 04:34:44', '2020-09-09 04:34:44', '2021-09-09 10:04:44'),
('c55ccedffd360e47e1fb48ee4fd265e1eb701566c4cb32f0941a0f607b5ac59cdbbc1c485a11f4e6', 40, 1, 'MyApp', '[]', 0, '2020-10-30 09:28:32', '2020-10-30 09:28:32', '2021-10-30 09:28:32'),
('c5880f499cbe98404b407ce5f6af88551b23083b0b8d79f74283458932fb79f575b2224863a5fc97', 8, 1, 'MyApp', '[]', 0, '2020-09-08 23:39:56', '2020-09-08 23:39:56', '2021-09-09 05:09:56'),
('c6b8061a514e2ce710dae61de73ce8276c9645f9c690f2d78bb47a4ee78a91add2a7c5e7e6dd496c', 11, 1, 'MyApp', '[]', 0, '2020-09-08 23:44:56', '2020-09-08 23:44:56', '2021-09-09 05:14:56'),
('c76c767a034a74ca0493f0e45b1639b1b579019e0e914ad83e2a40a5fc627856570f89f8b14e7ca1', 45, 1, 'MyApp', '[]', 0, '2020-10-28 07:22:55', '2020-10-28 07:22:55', '2021-10-28 07:22:55'),
('c862239ced227d311be8495def815423c4095688830856376a4d19031e745a220ab1c362959c8a05', 38, 1, 'MyApp', '[]', 0, '2020-10-23 10:50:43', '2020-10-23 10:50:43', '2021-10-23 10:50:43'),
('cdb334ee7cff9b02870c155cdcea2c4073499d8fbb2d690dbca3b62ae82ff34b2380f53d06c96e7d', 38, 1, 'MyApp', '[]', 0, '2020-10-26 12:12:06', '2020-10-26 12:12:06', '2021-10-26 12:12:06'),
('d455cf12f077d341a1094e0ef78c120b1de0db1d512212ba8d37c332f3ed94d1cb3f1eafc78089ba', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:58:31', '2020-09-09 05:58:31', '2021-09-09 11:28:31'),
('d78db96f0a1fa679ff61df7c64209c6e75c4dc4d030aee8513a8dd86ed61df67e3a3ca8a9c01c368', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:57:33', '2020-09-09 05:57:33', '2021-09-09 11:27:33'),
('dd78ced79700bfc92cabd2fffd41458ccd0f2414bb0aa0ef1b842ac1c000ab11a472171971370b84', 1, 1, 'MyApp', '[]', 0, '2020-09-09 00:41:23', '2020-09-09 00:41:23', '2021-09-09 06:11:23'),
('ddb5110a1b5babb2589205efd40dc7d7b58fde2b4e0c18094b2a4411e93f0d3b17462bd00a6aed97', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:33:41', '2020-09-09 05:33:41', '2021-09-09 11:03:41'),
('de5bf3626ba0066a7fc0e7e8f2d039c4d09648338012e868b56039c8c2d52c9016e397b8585e3335', 1, 1, 'MyApp', '[]', 0, '2020-10-29 06:34:49', '2020-10-29 06:34:49', '2021-10-29 06:34:49'),
('de9e4430dec3235bfb62c400ace0078b758fded8138698a60f6cec2062f5111b6d8eec8f8b2a6f4d', 29, 1, 'MyApp', '[]', 0, '2020-09-29 01:32:19', '2020-09-29 01:32:19', '2021-09-29 07:02:19'),
('e3d6cc73a455de4fb952c858bea94f292b0b66ff5ea7ad8ec25f70bf2b4e32df4b9e2f009e5e3b91', 40, 1, 'MyApp', '[]', 0, '2020-11-03 09:32:18', '2020-11-03 09:32:18', '2021-11-03 09:32:18'),
('e59add93002ec2f8b537cb7489ddb4e2e87ad029dc566542c3fef5d3f88f577068f3d447098a28a3', 32, 1, 'MyApp', '[]', 0, '2020-10-11 23:46:07', '2020-10-11 23:46:07', '2021-10-12 05:16:07'),
('e61ca8167b81a46ec4a5046db2c57314ccb92d3098591037c0b8bac1a2ead08155363c6e1281e2c8', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:57:52', '2020-09-09 05:57:52', '2021-09-09 11:27:52'),
('e7058b4c17efc22c51ae28bae6c47af41cec757481c7da35458e06d0ce0781c223cb5ddc5f5d4319', 40, 1, 'MyApp', '[]', 0, '2020-10-30 12:58:47', '2020-10-30 12:58:47', '2021-10-30 12:58:47'),
('e796bba10d46779d077c8bb6f8a1ff839b489601aee2090f81b8858fe1790deed3356dd227903e40', 29, 1, 'MyApp', '[]', 0, '2020-09-29 01:35:58', '2020-09-29 01:35:58', '2021-09-29 07:05:58'),
('e864664c66c0026d7b5d1e6bc6ff6074b0da47227ad07a115b493cf5730c038bbda389b221753f06', 40, 1, 'MyApp', '[]', 0, '2020-11-10 06:54:10', '2020-11-10 06:54:10', '2021-11-10 06:54:10'),
('e89e82dbfb19d8e84bd5f1df1d7e298e99eb220c9233bdda797e31de0ca25881cf151606d3ecc545', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:57:07', '2020-09-09 05:57:07', '2021-09-09 11:27:07'),
('e8ae6549247ea39a274dd2ae4b4764eb5beff1a255dc56bc5f26e405c7621c020978af4d6a23c41e', 1, 1, 'MyApp', '[]', 0, '2020-12-01 06:27:20', '2020-12-01 06:27:20', '2021-12-01 06:27:20'),
('e97c10ffe5982b1ce194b59db634f4183bf3636f2f16f0d6fa44a707b4ba74ec856d18d1185d495a', 40, 1, 'MyApp', '[]', 0, '2020-11-03 11:05:15', '2020-11-03 11:05:15', '2021-11-03 11:05:15'),
('e9cbd4b12bd77341e7c972140632f104a11f9a85b66d873623f194cd26ff32e1f845b77b190edc31', 16, 1, 'MyApp', '[]', 0, '2020-09-09 04:18:43', '2020-09-09 04:18:43', '2021-09-09 09:48:43'),
('ee66396f720b71a1dbdf5388b17f7da77fda4f6acd8fb2b6093a01f0cb6b3010b18bb44be3db8a7c', 7, 1, 'MyApp', '[]', 0, '2020-09-08 23:39:09', '2020-09-08 23:39:09', '2021-09-09 05:09:09'),
('f12607cb4ab39ceabce64983e3251489cc10735ab667e3f7aef48b611bdb8617a43c4aecbe43e990', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:45:35', '2020-09-09 05:45:35', '2021-09-09 11:15:35'),
('f26317db1f19dc444466eeaf76fba93a265edb3fbc4f727fe3c30217fb3bccc9328ed68c91f70bb5', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:46:17', '2020-09-09 05:46:17', '2021-09-09 11:16:17'),
('f2ea46548983aa63f5ce61456b6651f20b901cebf1a8d673db68a96c247ee677d39146b448f2baf9', 40, 1, 'MyApp', '[]', 0, '2020-11-04 10:14:07', '2020-11-04 10:14:07', '2021-11-04 10:14:07'),
('f2f4edd4df2d50e653de3fc567bd4559c786b5c93ba9ff360dabdf085ea8af2526721dfef4562b79', 1, 1, 'MyApp', '[]', 0, '2020-12-01 06:28:33', '2020-12-01 06:28:33', '2021-12-01 06:28:33'),
('f374d909c6791fe71d1ace341850c74f976b04340e4b9cb47e92fffa3242e0eb6f42e8d79bc6158b', 40, 1, 'MyApp', '[]', 0, '2020-11-03 10:55:25', '2020-11-03 10:55:25', '2021-11-03 10:55:25'),
('f4cbd3a599a7b12927b24395d8cb2e5e4d7459cee15793d37f52dd73bead9f335acc67a3c2af7567', 37, 1, 'MyApp', '[]', 0, '2020-10-22 02:05:22', '2020-10-22 02:05:22', '2021-10-22 07:35:22'),
('f509367d5348188b8f5a1d3ef4dd23fa918a3d4115611a6327b5bbdfa1d2ebbf3083bc8af80c5d0f', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:41:40', '2020-09-09 05:41:40', '2021-09-09 11:11:40'),
('f6ff7fd18ef342b26b23b6b11dceaaff9e4e2f73c779536c0bda50b27ad3916deb7d0111c6cc37e6', 26, 1, 'MyApp', '[]', 0, '2020-09-24 06:58:14', '2020-09-24 06:58:14', '2021-09-24 12:28:14'),
('f729fbb089433407b7a0d3244338996f9b3763217f988373590eec4b9db2b61b8de4c060051bd32e', 1, 1, 'MyApp', '[]', 0, '2020-09-23 06:11:08', '2020-09-23 06:11:08', '2021-09-23 11:41:08'),
('f72bc71cbccc21ed76258c798f07168fec0a6b5f30c98839d0c9b2b0e2fcc18cea6c192cbe3190e8', 40, 1, 'MyApp', '[]', 0, '2020-10-27 10:48:56', '2020-10-27 10:48:56', '2021-10-27 10:48:56'),
('f73a5b36e5eca3aed50054e7a1c7b129279ad0f41f4ae927fc3e1ed5516acc6c54c9bd9c02f156dc', 1, 1, 'MyApp', '[]', 0, '2020-09-09 05:43:34', '2020-09-09 05:43:34', '2021-09-09 11:13:34');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint NOT NULL,
  `client_id` int UNSIGNED NOT NULL,
  `scopes` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int UNSIGNED NOT NULL,
  `user_id` bigint DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Mortgage Personal Access Client', 'cJeD0JuSzwBRjkxkADMwBb36bCmDPjhyEyo463rY', 'http://localhost', 1, 0, 0, '2020-09-08 23:02:35', '2020-09-08 23:02:35'),
(2, NULL, 'Mortgage Password Grant Client', 'sEujj481ZHdc1KVEHr9wZUUXzoW15DNJQdAWXm2r', 'http://localhost', 0, 1, 0, '2020-09-08 23:02:35', '2020-09-08 23:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int UNSIGNED NOT NULL,
  `client_id` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2020-09-08 23:02:35', '2020-09-08 23:02:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_code` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `orignal_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `dob` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `device_type` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'A' COMMENT '''A for Android'', ''I for IOS''',
  `device_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_id`, `referral_code`, `first_name`, `last_name`, `name`, `email`, `email_verified_at`, `password`, `orignal_password`, `phone_no`, `image`, `dob`, `address`, `is_admin`, `device_type`, `device_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, '', NULL, NULL, 'Admin', 'admin@gmail.com', NULL, '$2y$10$3LTOYh8AMKhVv/4ELy74U.7hUmS4w7AEIhN4jZPjpb5SbCA7SjQqa', NULL, '08168295841', '1603711042.jpeg', NULL, NULL, NULL, 'A', '', '7WWiDTPXrZ5DuACHu2xO18pBFzdd4lGkVfPpnsuxS6lCoWBUhnaErVvTulsu', '2020-09-07 22:16:42', '2020-12-01 05:34:10', NULL),
(3, '1', '', NULL, NULL, 'Tarun', 'broker@gmail.com', NULL, '$2y$10$DlnKHxFxfReuluWOrYug6eDlj48vjhg9U.HVMHx3I0dm1PV6FtRbW', '39772001', '9092599926', '1603711812.jpeg', NULL, NULL, 2, 'A', '', NULL, '2020-09-07 22:49:07', '2020-12-01 05:50:26', '2020-12-01 05:50:26'),
(13, NULL, '12345', NULL, NULL, 'Tarun', 'tarun8@gmail.com', NULL, '$2y$10$ul9jQeJk9bFZ8fDTSCkc1.4NbmhzauASQ7BtN8M0BvAP4UbxkRdXC', NULL, '8168295848', 'default.png', NULL, NULL, 2, 'A', '', NULL, '2020-09-09 00:41:42', '2020-12-01 05:50:23', '2020-12-01 05:50:23'),
(39, NULL, NULL, NULL, NULL, 'Prince', 'fortec.prince@gmail.com', NULL, '$2y$10$SvDZw27EIp7CwX7PA8jZ..NIpjYPIm6vZAtTjjBCaSzSYgPm51nlS', NULL, '8728034244', 'default.png', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-27 10:46:07', '2020-11-18 10:29:03', '2020-11-18 10:29:03'),
(40, NULL, NULL, NULL, NULL, 'Nikhil Tiwari', 'nikhil@gmail.com', NULL, '$2y$10$1yjRqVEhTO9/DyhAEUtR7.m28nfcLwly.GJjYgKu7TvtbiUKPt/Ou', NULL, '8437904258', '1605007980.jpeg', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-27 10:48:31', '2020-12-01 05:50:19', '2020-12-01 05:50:19'),
(41, NULL, NULL, NULL, NULL, 'Dheeraj', 'dheeraj@yopmail.com', NULL, '$2y$10$NqZO5Hg8SNiRHSGGroz1Uu.ccUURsjNOQDF8T4cpVzpLACdjk/SE2', NULL, '8847325616', 'default.png', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-27 10:49:28', '2020-12-01 05:50:16', '2020-12-01 05:50:16'),
(42, NULL, NULL, NULL, NULL, 'Dheeraj', 'dheeraj1@yopmail.com', NULL, '$2y$10$54R68Tug8EBAd8K2opfsmuIW9H.p8ch0yBZ/OdgBDiSHva0c3.LQO', NULL, '8847325617', 'default.png', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-27 10:50:42', '2020-12-01 05:50:13', '2020-12-01 05:50:13'),
(43, NULL, NULL, NULL, NULL, 'Dheeraj', 'dheeraj2@yopmail.com', NULL, '$2y$10$.1k0OpV4IZXElEQOmfvPm.p4x0H0QL//5bCCwVdCbMs0qwN2aUIwy', NULL, '8847325618', 'default.png', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-27 10:51:32', '2020-12-01 05:50:10', '2020-12-01 05:50:10'),
(44, NULL, NULL, NULL, NULL, 'DHeeraj', 'dheeraj13@yopmail.com', NULL, '$2y$10$M2nkFJphpNc3Col6QSTsTepsMo1bgH7ChDRy4M7Qwua5nqvusjDia', NULL, '8844773325', 'default.png', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-27 10:57:09', '2020-12-01 05:50:06', '2020-12-01 05:50:06'),
(45, NULL, NULL, NULL, NULL, 'ttt', 'tarun871@gmail.com', NULL, '$2y$10$HQVu.ui/TMvaKKJGDQa2.efgm6B0iRF5IfCRBEEWO.sC506OT/Qbq', NULL, '8168295840', '1604569754.jpeg', NULL, NULL, 2, 'I', '12345', NULL, '2020-10-28 07:22:55', '2020-12-01 05:50:02', '2020-12-01 05:50:02'),
(46, '1', NULL, NULL, NULL, 'Tarun Malhotra', 't2@gmail.com', NULL, '$2y$10$1GsU35VnkaOAo0ahkjIdaewqdbLc2DT03Bl3xXzuDFRsdVviQU.em', '47622573', '+9199504295686', '', NULL, NULL, 2, 'A', '', NULL, '2020-12-01 05:49:37', '2020-12-01 05:49:37', NULL),
(47, '1', NULL, NULL, NULL, 'Tarun Malhotra1', 't11@gmail.com', NULL, '$2y$10$ovCMHs73yX24jMle8MwKd.fizXP.Kw0n/DBJpAQ4AIGwS2jwh9nka', '84621995', '+91995022495686', '', NULL, NULL, 2, 'A', '', NULL, '2020-12-01 05:54:53', '2020-12-01 05:55:00', '2020-12-01 05:55:00'),
(48, NULL, NULL, NULL, NULL, 'Tarun', 'tarun87@gmail.com', NULL, '$2y$10$I4fKYy.ypcTbYz2uE.v0MubS/nQdJGctohjVYTTb9yCT9LCG/h9VS', NULL, '81682958487', 'default.png', NULL, NULL, 2, 'I', '12345', NULL, '2020-12-01 05:57:43', '2020-12-01 06:59:44', '2020-12-01 06:59:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `currency`
--
ALTER TABLE `currency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leads`
--
ALTER TABLE `leads`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- AUTO_INCREMENT for table `currency`
--
ALTER TABLE `currency`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `leads`
--
ALTER TABLE `leads`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
