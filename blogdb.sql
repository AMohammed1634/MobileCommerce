-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 21, 2019 at 04:19 PM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `no_items` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bills`
--

INSERT INTO `bills` (`id`, `user_id`, `mobile_id`, `no_items`, `price`, `created_at`, `updated_at`) VALUES
(43, 21, 2, 1, 15000, '2019-03-18 14:23:01', '2019-03-18 14:23:01'),
(44, 21, 1, 1, 18000, '2019-03-18 14:23:01', '2019-03-18 14:23:01'),
(45, 21, 38, 1, 3000, '2019-03-18 14:23:01', '2019-03-18 14:23:01'),
(46, 21, 16, 1, 4000, '2019-03-18 14:23:01', '2019-03-18 14:23:01'),
(47, 11, 18, 1, 7500, '2019-03-18 14:25:28', '2019-03-18 14:25:28'),
(48, 11, 12, 1, 14000, '2019-03-18 14:25:28', '2019-03-18 14:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, 'Huawei', NULL, NULL),
(3, 'Samsung', NULL, NULL),
(6, 'Iphone', NULL, NULL),
(9, 'Oppo', NULL, NULL),
(11, 'Sony', NULL, NULL),
(14, 'Tecno', NULL, NULL),
(16, 'Honor', NULL, NULL),
(120, 'Infinix', '2019-03-04 04:31:54', '2019-03-04 04:31:54');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `user_id`, `user_img`, `created_at`, `updated_at`, `mobile_id`) VALUES
(1, 'good', 21, NULL, '2019-03-17 11:01:16', '2019-03-17 11:01:16', 22),
(2, 'bad', 21, NULL, '2019-03-17 11:13:13', '2019-03-17 11:13:13', 16),
(3, 'good', 11, NULL, '2019-03-17 11:14:38', '2019-03-17 11:14:38', 16),
(4, 'شغال', 19, NULL, '2019-03-17 11:16:59', '2019-03-17 11:16:59', 16),
(5, 'waooo', 21, NULL, '2019-03-17 11:18:36', '2019-03-17 11:18:36', 35),
(6, 'expensive', 21, NULL, '2019-03-17 11:34:58', '2019-03-17 11:34:58', 16),
(7, 'good', 23, NULL, '2019-03-17 12:30:38', '2019-03-17 12:30:38', 2),
(8, 'expensive', 21, NULL, '2019-03-17 16:44:02', '2019-03-17 16:44:02', 2),
(9, 'Wandarfull', 24, NULL, '2019-03-17 16:45:05', '2019-03-17 16:45:05', 4),
(10, 'soo good ...', 19, NULL, '2019-03-17 16:46:33', '2019-03-17 16:46:33', 6),
(11, 'غالي خالص', 19, NULL, '2019-03-17 16:51:03', '2019-03-17 16:51:03', 34);

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
(1, '2019_02_28_173721_create_mobiles_table', 1),
(2, '2019_02_28_174029_create_btands_table', 1),
(3, '2019_03_02_011803_create_users_table', 2),
(4, '2019_03_03_183027_add_pices_to_mobiles', 3),
(5, '2019_03_03_185313_add_sale_to_mobiles', 4),
(6, '2019_03_04_084626_create_transaction_table', 5),
(7, '2019_03_06_232149_create_transactions_table', 6),
(8, '2019_03_13_085009_add_img2_to_mobile', 7),
(9, '2019_03_13_105728_add_discription_mobiles', 8),
(10, '2019_03_17_091143_add_img_profile_to_user', 9),
(11, '2019_03_17_121354_create_comments_table', 10),
(12, '2019_03_17_122200_add_mobile_id_to_comments', 11),
(13, '2019_03_18_113654_create_bill_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mobiles`
--

CREATE TABLE `mobiles` (
  `mobile_id` int(10) UNSIGNED NOT NULL,
  `mobile_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `img` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pices` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `img2` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disc` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mobiles`
--

INSERT INTO `mobiles` (`mobile_id`, `mobile_name`, `price`, `rate`, `img`, `brand_id`, `created_at`, `updated_at`, `pices`, `sale`, `img2`, `disc`) VALUES
(1, 'Tecno Phantom 8', 18000, 4, 'Tecno Phantom 8.jpg', 14, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(2, 'Tecno A6 Phantom 6', 15000, 3, 'Tecno A6 Phantom 6.jpg', 14, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(3, 'Sony Xperia XA Ultra', 19000, 5, 'Sony Xperia XA Ultra.jpg', 11, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(4, 'Sony Xperia X A1', 11000, 5, 'Sony Xperia X A1.jpg', 11, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(5, 'Samsung Galaxy J7 Pr', 9000, 4, 'Samsung Galaxy J7 Prime.jpg', 3, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(6, 'Samsung Galaxy J5 Pro', 6000, 5, 'Samsung Galaxy J5 Pro.jpg 	', 3, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(7, 'OPPO A83 2018', 14500, 4, 'OPPO A83 2018.jpg', 9, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(8, 'Oppo A3S ', 7000, 3, 'Oppo A3S .jpg', 9, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(9, 'Huawei Nova 3i', 4000, 4, 'Huawei Nova 3i.jpg', 1, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(10, 'Huawei Mate 10 Lite', 12000, 5, 'Huawei Mate 10 Lite.jpg', 1, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(11, 'Huawei Honor 6X', 15000, 5, 'Huawei Honor 6X.jpg', 1, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(12, 'Huawei GR5 2017', 14000, 4, 'Huawei GR5 2017.jpg', 1, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(13, 'Huawei GR3 2017 ', 4500, 3, 'Huawei GR3 2017 .jpg', 1, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(14, 'Honor Play', 6000, 5, 'Honor Play.jpg', 16, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(15, 'Honor 9 Lite', 7000, 5, 'Honor 9 Lite.jpg', 16, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(16, 'Honor 8X', 4000, 3, 'Honor 8X.jpg', 16, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(17, 'Honor 7X', 1600, 5, 'Honor 7X.jpg', 16, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(18, ' Honor 7S', 7500, 4, 'Honor 7S.jpg', 16, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(19, 'Honor 7A', 20000, 5, 'Honor 7A.jpg', 16, NULL, NULL, 100, 0, '7a-overview-01.jpg', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(20, 'Honor 10 ', 21000, 4, 'Honor 10 .jpg', 16, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(21, 'Apple iPhone Xs Max', 25000, 5, 'Apple iPhone Xs Max.jpg', 6, NULL, NULL, 100, 0, '07-iphone-xs-and-iphone-xs-max.jpg', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(22, 'Apple iPhone 8 Plus', 27000, 5, 'Apple iPhone 8 Plus.jpg', 6, NULL, NULL, 100, 0, '61cbeba7-8bca-4062-b278-673019d304f8_1.44b845bf2c88872f7c7310a0d40bc0e7.jpeg', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(23, 'Apple iPhone 7 Plus', 19000, 5, 'Apple iPhone 7 Plus.jpg', 6, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(24, 'Apple iPhone 6S Plus', 19000, 5, 'Apple iPhone 6S Plus.jpg', 6, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(25, 'Apple iPhone 6S', 10000, 5, 'Apple iPhone 6S.jpg', 6, NULL, NULL, 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(28, 'Tecno Phantom 8', 7500, 4, 'Tecno Phantom 8.JPG', 14, '2019-02-28 20:09:56', '2019-02-28 20:09:56', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(29, 'Tecno Camon CX Air', 6500, 5, 'Tecno Camon CX Air.JPG', 14, '2019-02-28 20:12:43', '2019-02-28 20:12:43', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(30, 'sony-xperia-xzs_1660', 12000, 5, 'sony-xperia-xzs_1660.JPG', 11, '2019-02-28 20:32:51', '2019-02-28 20:32:51', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(34, 'Samsung Galaxy S9', 19000, 4, 'Samsung Galaxy S9.JPG', 3, '2019-02-28 21:29:18', '2019-02-28 21:29:18', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(35, 'OPPO F7', 4500, 4, 'OPPO F7.JPG', 9, '2019-03-03 11:58:51', '2019-03-03 11:58:51', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(36, 'oppo-find-5_ef43', 3456, 4, 'oppo-find-5_ef43.JPG', 9, '2019-03-03 12:17:44', '2019-03-03 12:17:44', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(37, 'Infinix X605 Note5 Stylus', 4000, 5, 'Infinix X605 Note5 Stylus.JPG', 120, '2019-03-04 04:35:00', '2019-03-04 04:35:00', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(38, 'Huawei Y7 Prime 2018', 3000, 5, 'Huawei Y7 Prime 2018.JPG', 1, '2019-03-10 17:35:16', '2019-03-10 17:35:16', 100, 0, '', '   6.1-inch Dynamic AMOLED Capacitive Touch Screen  >>   128 GB Storage, MicroSD up to 512 GB >>    12 + 12 + 16 MP Back Cameras, 10 MP Front Camera  >>   Octa-core CPU, 8 GB RAM   >>  Li-Ion 3400 mAh battery, Fingerprint Sensor  >>   Android OS, v9.0 (Pie), One UI'),
(42, 'Samsung Grand Prime +', 12345, 4, 'Samsung Grand Prime Plus.JPG', 3, '2019-03-13 20:17:50', '2019-03-13 20:17:50', 100, 0, 'Samsung Grand Prime Plus.JPG', 'plaa..');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `trans_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `mobile_id` int(11) NOT NULL,
  `trans_type` int(11) NOT NULL,
  `trans_buy` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`trans_id`, `user_id`, `mobile_id`, `trans_type`, `trans_buy`, `created_at`, `updated_at`) VALUES
(7, 21, 1, 0, 0, '2019-03-06 22:08:21', '2019-03-06 22:08:21'),
(8, 21, 3, 0, 0, '2019-03-06 22:08:30', '2019-03-06 22:08:30'),
(9, 21, 6, 0, 0, '2019-03-06 22:10:04', '2019-03-06 22:10:04'),
(12, 11, 1, 0, 0, '2019-03-10 10:33:33', '2019-03-10 10:33:33'),
(13, 11, 2, 0, 0, '2019-03-10 10:33:39', '2019-03-10 10:33:39'),
(14, 11, 11, 0, 0, '2019-03-10 10:33:45', '2019-03-10 10:33:45'),
(15, 11, 12, 0, 0, '2019-03-10 10:33:49', '2019-03-10 10:33:49'),
(18, 19, 36, 1, 0, '2019-03-10 17:27:04', '2019-03-10 17:27:04'),
(19, 19, 9, 1, 0, '2019-03-10 17:27:10', '2019-03-10 17:27:10'),
(20, 19, 12, 1, 0, '2019-03-10 17:27:15', '2019-03-10 17:27:15'),
(21, 19, 16, 1, 0, '2019-03-10 17:27:19', '2019-03-10 17:27:19'),
(22, 19, 35, 1, 0, '2019-03-10 17:27:28', '2019-03-10 17:27:28'),
(23, 19, 21, 1, 0, '2019-03-10 17:27:38', '2019-03-10 17:27:38'),
(25, 21, 4, 0, 0, '2019-03-13 09:32:01', '2019-03-13 09:32:01'),
(26, 21, 38, 0, 0, '2019-03-13 09:55:22', '2019-03-13 09:55:22'),
(27, 21, 42, 0, 0, '2019-03-13 20:18:23', '2019-03-13 20:18:23'),
(29, 23, 1, 0, 0, '2019-03-17 12:29:25', '2019-03-17 12:29:25'),
(30, 23, 10, 0, 0, '2019-03-17 12:29:33', '2019-03-17 12:29:33'),
(31, 23, 11, 1, 0, '2019-03-17 12:29:42', '2019-03-17 12:29:42'),
(32, 23, 15, 1, 0, '2019-03-17 12:29:48', '2019-03-17 12:29:48'),
(33, 24, 4, 1, 0, '2019-03-17 19:11:42', '2019-03-17 19:11:42'),
(34, 24, 12, 1, 0, '2019-03-17 19:11:48', '2019-03-17 19:11:48'),
(35, 24, 38, 1, 0, '2019-03-17 19:11:55', '2019-03-17 19:11:55'),
(36, 24, 30, 0, 0, '2019-03-17 19:12:00', '2019-03-17 19:12:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `group_id`, `remember_token`, `created_at`, `updated_at`, `img`) VALUES
(10, 'anytest', 'anytest@anytest.com', '$2y$10$rm6WhdfJXyYY3WfddxR1LOO4YBlTCExL6gq/.AgpS2uaYs0TtLBxO', 0, NULL, '2019-03-02 15:14:02', '2019-03-02 15:14:02', ''),
(11, 'Ahmed_Mohammed', 'AhmedMohammedMahrous@gmail.com', '$2y$10$WyBFSPWv9TmdSkjcOqPVBu5hgJq3gjRIwSuQWGETVMOfZ4uJa7RLe', 0, 'NcXXwOWnjzyWQvJm7OwohvSB8PKhZnM2MZ0PmtC6EZrJk0Ss1cOCsOypxfsB', '2019-03-02 16:49:07', '2019-03-17 09:39:08', 'AAA.jpg'),
(12, 'any', 'any@any.com', '$2y$10$N3EXvWvhpBBSplskyOto5OAmccp80TUZdd34h39AkjN43JkasT7am', 0, NULL, '2019-03-02 16:56:16', '2019-03-02 16:56:16', ''),
(13, 'asad', 'asd@gmail.com', '$2y$10$YMuPyoXCr233AuyrVgejw.auZHgpq1PPErnhJe3Jvz9fMH6ZPg4Yq', 0, NULL, '2019-03-03 10:48:53', '2019-03-03 10:48:53', ''),
(14, 'asd1', 'aasd1@gmail.com', '$2y$10$VyZaE1sGMgu.DPWkTSIfzeuS7C9WXFL1xRGaaEQxIvSMYHfl8h50u', 0, NULL, '2019-03-03 10:52:58', '2019-03-03 10:52:58', ''),
(16, 'qwe', 'qwq@gmail.com', '$2y$10$Gg7NlCiMuhKrJJlZ6NlHceUs7X0zeOygRodNuhh7Dc3tmeXx/iT/i', 0, NULL, '2019-03-03 11:24:40', '2019-03-03 11:24:40', ''),
(17, 'ert', 'tttt@gmail.com', '$2y$10$azfGmyWBJnG8a0HoGpmvSeqHMyeZbrwdiF4Fr9Cmg5bI.fT7TZyIW', 0, NULL, '2019-03-03 11:26:28', '2019-03-03 11:26:28', ''),
(18, 'poi', 'poi@gmail.com', '$2y$10$OA3bNTsWVmFo/LKuCWP7Euuxaq/m.EhUtnc3kn1AVBJNxiA5wywkG', 0, 'zYbt7SLWyub8bMUi7oOWMaguflVE5ujzcJw0hZIDBNxNSxqPRcCghLHTlr8v', '2019-03-03 11:27:00', '2019-03-03 11:27:00', ''),
(19, 'Admin', 'Admin@gmail.com', '$2y$10$JzhQuadtim5ea7aw4XPxLuVf5PLMFekZmOnguUfpf2DaC0Itcwxk.', 1, 'F4mhn4uKkVgKuBhy4B8aYRKPmrywEtyURSScotCBc52Vwm2MqMDksWEhbD6M', '2019-03-03 11:42:29', '2019-03-17 11:17:21', 'Apple-logo1.jpg'),
(20, 'Admin1', 'Admin1@gmail.com', '$2y$10$PIHvc1DP6kr17/IM5gPGUOa90naUC5q4BjC/1xPCvC471WJUrwmV2', 1, 'NEcl1lBjjajl4uYzik4itHieSHbCGe8LPvY25JhaLkwxym64woEZHzDd7C71', '2019-03-03 11:46:07', '2019-03-03 11:46:07', ''),
(21, 'Super_Admin', 'Super_Admin@gmail.com', '$2y$10$Ou8Px6f.5ZRpdTpqTlt2Wen8cjws2oE8yqJqTKmr.e6BlfNr..iVa', 1001, 'e1Ub95UJKFSA0La9CiOjebp9WHWr0T7arVHtpVvCjnzwlpWy9D9E798BMoJ2', '2019-03-03 13:19:22', '2019-03-18 09:07:41', 'maxresdefault.jpg'),
(22, '<h1>AhmedMohammed</h1>', 'sssss@gmail.com', '$2y$10$z.88Y9qtZEUdYN4xQQkgJOr.7yGl6jf0Zg4fP3FBWSp/6DaO9tVnG', 0, 'aC1iVsCU2qD3wQWX9P6Ausd9IZkoYXH876GYjCR0cfe25T0dvS0sd4QfVy2v', '2019-03-04 10:50:11', '2019-03-04 10:50:11', ''),
(23, 'Ahmed', 'AA@AA.com', '$2y$10$43EX1R9hFxCQ/pBd6IKSl.wW3bUYslhnmOC7rhgDbvMBkxg50ldES', 0, 'WFeCPS2qFqiShKKJaWUzykuFc5V7wDXuVjxxxm3TmjLrgb7h2vuRGc94MLJz', '2019-03-17 12:29:16', '2019-03-17 12:30:07', 'images.png'),
(24, 'Admin_A', 'Admin_A@gmail.com', '$2y$10$C477.KzaIXprlyk8Ov3o/.fIHnokCKVjcdOx1O.HRaZw09DxrBl.y', 1, 'm0KewYgJwRqxvIl8doPQu9ROPWdYtx9BOyytV4db3Q9vZF9XoSMDEiBYi0LW', '2019-03-17 12:32:40', '2019-03-17 12:33:03', 'images.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobiles`
--
ALTER TABLE `mobiles`
  ADD PRIMARY KEY (`mobile_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`trans_id`);

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
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mobiles`
--
ALTER TABLE `mobiles`
  MODIFY `mobile_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `trans_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
