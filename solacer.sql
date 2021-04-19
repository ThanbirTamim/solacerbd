-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 12:13 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `solacer`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_solacers`
--

CREATE TABLE `about_solacers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'About Solacer',
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'It is a Garments.',
  `file1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_solacers`
--

INSERT INTO `about_solacers` (`id`, `heading`, `description`, `file1`, `file2`, `file3`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'About Solacer', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has', 'lehenga-divyanka-tripathi-traditional-indian-wallpaper-preview.jpg', '47b08ac3ee33cc17a7ef95109d7b2742.jpg', 'dupatta-girl-whatsapp-image.jpg', 'Thanbir Tamim', '2021-04-05 23:07:01', '2021-04-05 23:07:01');

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `max_size` int(11) DEFAULT NULL,
  `min_size` int(11) DEFAULT NULL,
  `size_type` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fabric` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file2` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file3` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file4` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file5` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file6` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`id`, `name`, `price`, `max_size`, `min_size`, `size_type`, `gender_type`, `max_age`, `min_age`, `age_type`, `product_type`, `fabric`, `description`, `added_by`, `tag`, `file1`, `file2`, `file3`, `file4`, `file5`, `file6`, `created_at`, `updated_at`) VALUES
(2, 'Shirt 1', 500, NULL, NULL, 'all', 'male', NULL, NULL, 'adult', 'shirts', 'cotton', 'It is shirt', 'Thanbir Tamim', NULL, '1112773725shirt1.jpg', '1112773725shirt1.jpg', '1112773725shirt1.jpg', '1112773725shirt1.jpg', '1112773725shirt1.jpg', '1112773725shirt1.jpg', '2021-04-06 03:10:01', '2021-04-06 03:10:01'),
(3, 'Shirt 2', 700, NULL, NULL, 'all', 'male', NULL, NULL, 'adolescence', 'shirts', 'linen', 'It is a super shirt', 'Thanbir Tamim', NULL, '310488345shirt2.jpg', '310488345shirt2.jpg', '310488345shirt2.jpg', '310488345shirt2.jpg', '310488345shirt2.jpg', '310488345shirt2.jpg', '2021-04-06 03:11:02', '2021-04-06 03:11:02'),
(4, 'Shirt 3', 900, NULL, NULL, 'all', 'male', NULL, NULL, 'adult', 'shirts', 'cotton', 'Cotton Shirt; Full Hand', 'Thanbir Tamim', NULL, '1433830218shirt3.jpg', '1433830218shirt3.jpg', '1433830218shirt3.jpg', '1433830218shirt3.jpg', '1433830218shirt3.jpg', '1433830218shirt3.jpg', '2021-04-06 03:11:50', '2021-04-06 03:11:50'),
(5, 'Shirt 4', 1050, NULL, NULL, 'all', 'male', NULL, NULL, 'adult', 'shirts', 'silk', 'Silk Shirt', 'Thanbir Tamim', NULL, '962635623shirt4.jpeg', '962635623shirt4.jpeg', '962635623shirt4.jpeg', '962635623shirt4.jpeg', '962635623shirt4.jpeg', '962635623shirt4.jpeg', '2021-04-06 03:12:31', '2021-04-06 03:12:31'),
(6, 'Shirt 5', 550, NULL, NULL, 'all', 'male', NULL, NULL, 'adolescence', 'shirts', 'cotton', 'Normal Shirt', 'Thanbir Tamim', NULL, '806786025shirt5.jpg', '806786025shirt5.jpg', '806786025shirt5.jpg', '806786025shirt5.jpg', '806786025shirt5.jpg', '806786025shirt5.jpg', '2021-04-06 03:13:19', '2021-04-06 03:13:19'),
(7, 'Tops 1', 1200, NULL, NULL, 'all', 'female', NULL, NULL, 'child', 'tops', 'chinese', 'Tops for teenagers', 'Thanbir Tamim', NULL, '2075514748tops1.jpg', '2075514748tops1.jpg', '2075514748tops1.jpg', '2075514748tops1.jpg', '2075514748tops1.jpg', '2075514748tops1.jpg', '2021-04-06 03:15:15', '2021-04-06 03:15:15'),
(8, 'Tops 2', 1400, NULL, NULL, 'all', 'female', NULL, NULL, 'adult', 'tops', 'silk', 'Silk Tops', 'Thanbir Tamim', NULL, '1851187087tops2.jpg', '1851187087tops2.jpg', '1851187087tops2.jpg', '1851187087tops2.jpg', '1851187087tops2.jpg', '1851187087tops2.jpg', '2021-04-06 03:15:57', '2021-04-06 03:15:57'),
(9, 'Tops 3', 1350, NULL, NULL, 'm', 'female', NULL, NULL, 'adolescence', 'tops', 'cotton', 'Cotton tops', 'Thanbir Tamim', NULL, '281216570tops3.jpg', '281216570tops3.jpg', '281216570tops3.jpg', '281216570tops3.jpg', '281216570tops3.jpg', '281216570tops3.jpg', '2021-04-06 03:16:55', '2021-04-06 03:16:55'),
(10, 'Tips 4', 1500, NULL, NULL, 'all', 'female', NULL, NULL, 'adult', 'tops', 'cotton', 'Cotton tops for female', 'Thanbir Tamim', NULL, '898571460tops4.jpg', '898571460tops4.jpg', '898571460tops4.jpg', '898571460tops4.jpg', '898571460tops4.jpg', '898571460tops4.jpg', '2021-04-06 03:17:39', '2021-04-06 03:17:39'),
(11, 'Pant', 500, NULL, NULL, 'l', 'all', NULL, NULL, 'all', 'pant', 'cotton', 'Jens Pant', 'Thanbir Tamim', NULL, '640905546pant1.jpg', '640905546pant1.jpg', '640905546pant1.jpg', '640905546pant1.jpg', '640905546pant1.jpg', '640905546pant1.jpg', '2021-04-06 03:18:59', '2021-04-06 03:18:59'),
(12, 'Pant 2', 900, NULL, NULL, 'all', 'all', NULL, NULL, 'adult', 'pant', 'cotton', 'Gabading pant', 'Thanbir Tamim', NULL, '1292695837pant2.jpg', '1292695837pant2.jpg', '1292695837pant2.jpg', '1292695837pant2.jpg', '1292695837pant2.jpg', '1292695837pant2.jpg', '2021-04-06 03:19:53', '2021-04-06 03:19:53'),
(13, 'Pant 3', 800, NULL, NULL, 'all', 'all', NULL, NULL, 'child', 'pant', 'cotton', 'Child Pant', 'Thanbir Tamim', NULL, '52350006pant3.jpg', '52350006pant3.jpg', '52350006pant3.jpg', '52350006pant3.jpg', '52350006pant3.jpg', '52350006pant3.jpg', '2021-04-06 03:20:35', '2021-04-06 03:20:35'),
(14, 'Panjabi 1', 900, NULL, NULL, 'all', 'male', NULL, NULL, 'adult', 'panjabi', 'cotton', 'Panjabi Long', 'Thanbir Tamim', NULL, '2027216732panjabi1.jpg', '2027216732panjabi1.jpg', '2027216732panjabi1.jpg', '2027216732panjabi1.jpg', '2027216732panjabi1.jpg', '2027216732panjabi1.jpg', '2021-04-06 03:25:50', '2021-04-06 03:25:50'),
(15, 'Panjabi 2', 900, NULL, NULL, 'all', 'male', NULL, NULL, 'adult', 'panjabi', 'cotton', 'Panjabi is handicraft', 'Thanbir Tamim', 'shirt, pant, top', '982498696panjabi2.jpg', '982498696panjabi2.jpg', '982498696panjabi2.jpg', '982498696panjabi2.jpg', '982498696panjabi2.jpg', '982498696panjabi2.jpg', '2021-04-06 21:52:53', '2021-04-06 21:54:51');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT 'undone',
  `answer` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answered_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `number`, `message`, `status`, `answer`, `answered_by`, `response`, `created_at`, `updated_at`) VALUES
(1, 'Thanbir', '01752217800', 'fdhgsfgh', 'done', 'হ্যালো, আমরা আপনার মেসেজ পেয়েছি, আমরা খুব শিগ্রই আপনাকে ফোন করব।', 'Thanbir Tamim', 'SMS Sent Successfully To +8801752217800', '2021-04-06 00:45:28', '2021-04-06 01:51:25'),
(2, 'Thanbir Tamim', '01752217800', 'dfgdfghdfgjdfgj', 'done', 'হ্যালো তামিম, আমরা আপনার মেসেজ পেয়েছি, আমরা খুব শিগ্রই আপনাকে ফোন করব। ধন্যবাদ', 'Thanbir Tamim', 'SMS Sent Successfully To +8801752217800', '2021-04-06 00:46:37', '2021-04-06 01:38:27');

-- --------------------------------------------------------

--
-- Table structure for table `contact_info_edits`
--

CREATE TABLE `contact_info_edits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `message` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact_info_edits`
--

INSERT INTO `contact_info_edits` (`id`, `message`, `link`, `added_by`, `created_at`, `updated_at`) VALUES
(1, 'Dummy Message', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7301.645983767978!2d90.35351517417205!3d23.789316768503653!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc941101522bf75be!2zQm9uZGhvbiBUb3dlciDgpqzgpqjgp43gpqfgpqgg4Kaf4Ka-4KaT4Kef4Ka-4Kaw!5e0!3m2!1sen!2sbd!4v1617690107517!5m2!1sen!2sbd', 'Thanbir Tamim', '2021-04-06 00:22:59', '2021-04-06 00:22:59');

-- --------------------------------------------------------

--
-- Table structure for table `customer_users`
--

CREATE TABLE `customer_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fb_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_users`
--

INSERT INTO `customer_users` (`id`, `name`, `phone`, `email`, `age`, `gender`, `fb_link`, `address`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 't', '01719573275', NULL, '18', '1', 'www.fb.com', 'Dhanmondi 32, Dhaka', NULL, '483252', NULL, '2021-04-06 23:03:53', '2021-04-07 11:49:34'),
(3, 'thanbir', '01752217800', NULL, '19', '1', 'www.fb.com', 'Dhanmondi 32, Dhaka', NULL, '794745', NULL, '2021-04-06 23:06:17', '2021-04-07 11:49:01');

-- --------------------------------------------------------

--
-- Table structure for table `front_views`
--

CREATE TABLE `front_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `front_views`
--

INSERT INTO `front_views` (`id`, `filename`, `status`, `title`, `added_by`, `created_at`, `updated_at`) VALUES
(11, 'banner-img.jpg', 'false', 'Welcome to SolacerBD', 'Thanbir Tamim', '2021-04-05 23:02:42', '2021-04-05 23:02:42'),
(12, 'beautiful-dupatta-girl-hd-wallpaper.jpg', 'true', 'Welcome to SolacerBD', 'Thanbir Tamim', '2021-04-05 23:03:54', '2021-04-05 23:03:54');

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
(3, '2021_04_04_065304_create_front_views_table', 2),
(4, '2021_04_04_142455_create_about_solacers_table', 3),
(5, '2021_04_05_043847_create_all_products_table', 4),
(6, '2021_04_05_140231_create_teams_table', 5),
(7, '2021_04_05_150043_create_social_media_table', 6),
(8, '2021_04_05_161349_create_sms_serveces_table', 7),
(9, '2021_04_06_053131_create_contacts_table', 8),
(10, '2021_04_06_055906_create_contact_info_edits_table', 9),
(11, '2021_04_07_040122_create_temp_product_bags_table', 10),
(12, '2021_04_07_041426_create_customer_users_table', 11),
(13, '2021_04_07_110144_create_orders_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(2000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id_name_quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `net_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subtotal_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_price` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `comment`, `address`, `session_id`, `product_id_name_quantity`, `net_price`, `subtotal_price`, `vat_price`, `shipping_price`, `payment_status`, `delivery_status`, `discount`, `response`, `added_by`, `created_at`, `updated_at`) VALUES
(7, 'thanbir', '01752217800', 'none', 'Dhanmondi 32, Dhaka', '6753279562021-04-07 07:32:03', 'Product ID: 15 Product Name:Panjabi 2 Quantity: 1 Size: l Price: 900;', 'TK 1090', 'TK 900', 'TK 135', 'TK 100', 'undone', 'undone', '45', 'প্রিয়গ্রাহক Invalid Number', NULL, '2021-04-07 09:53:29', '2021-04-07 09:53:29'),
(8, 'thanbir', '01752217800', 'none', 'Dhanmondi 32, Dhaka', '6753279562021-04-07 07:32:03', 'Product ID: 15 Product Name:Panjabi 2 Quantity: 1 Size: l Price: 900;', 'TK 1090', 'TK 900', 'TK 135', 'TK 100', 'done', 'done', '45', 'SMS Sent Successfully To +8801752217800', 'Thanbir Tamim', '2021-04-07 09:56:10', '2021-04-08 07:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('test@gmail.com', '$2y$10$y90ChbM9H19TrreYWLCffeuGT7U3rE71rm8LHyn/4IHqsoe7U71ri', '2021-04-08 07:53:19'),
('sk.tamim56@gmail.com', '$2y$10$seRPf778/KrStwSGKwEfbeqmedGGFDkWDlwUMcE3PkbPhb/M1QoOO', '2021-04-08 08:30:31');

-- --------------------------------------------------------

--
-- Table structure for table `sms_serveces`
--

CREATE TABLE `sms_serveces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `number` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `response` longtext COLLATE utf8mb4_unicode_ci,
  `sent_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_serveces`
--

INSERT INTO `sms_serveces` (`id`, `number`, `message`, `type`, `response`, `sent_by`, `created_at`, `updated_at`) VALUES
(5, '01752217800,01719573275', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'group', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    },\n    {\n        \"to\": \"+8801719573275\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801719573275\"\n    }\n]', 'Thanbir Tamim', '2021-04-05 11:11:08', '2021-04-05 11:11:08'),
(6, '01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'single', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    }\n]', 'Thanbir Tamim', '2021-04-05 11:17:23', '2021-04-05 11:17:23'),
(7, '01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'single', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    }\n]', 'Thanbir Tamim', '2021-04-05 11:17:50', '2021-04-05 11:17:50'),
(8, '01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'single', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    }\n]', 'Thanbir Tamim', '2021-04-05 11:18:14', '2021-04-05 11:18:14'),
(9, '01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'single', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    }\n]', 'Thanbir Tamim', '2021-04-05 11:18:17', '2021-04-05 11:18:17'),
(10, '01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'single', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    }\n]', 'Thanbir Tamim', '2021-04-05 11:18:20', '2021-04-05 11:18:20'),
(11, '01752217800,01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'group', '[\n    {\n        \"to\": \"+8801752217800\",\n        \"message\": \"\\u09b9\\u09cd\\u09af\\u09be\\u09b2\\u09cb, SolacherBD \\u0993\\u099f\\u09bf\\u09aa\\u09bf (OTP) \\u0995\\u09cb\\u09a1\\u0983 126589\",\n        \"status\": \"SENT\",\n        \"statusmsg\": \"SMS Sent Successfully To +8801752217800\"\n    }\n]', 'Thanbir Tamim', '2021-04-06 02:52:20', '2021-04-06 02:52:20'),
(12, '01752217800,01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'group', 'SMS Sent Successfully To +8801752217800', 'Thanbir Tamim', '2021-04-06 02:54:07', '2021-04-06 02:54:07'),
(13, 'All Customers Number', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'all', 'SMS Sent Successfully To +8801719573275', 'Thanbir Tamim', '2021-04-08 07:19:08', '2021-04-08 07:19:08'),
(14, '01752217800', 'হ্যালো, SolacherBD ওটিপি (OTP) কোডঃ 126589', 'single', 'SMS Sent Successfully To +8801752217800', 'Thanbir Tamim', '2021-04-08 07:26:39', '2021-04-08 07:26:39');

-- --------------------------------------------------------

--
-- Table structure for table `social_media`
--

CREATE TABLE `social_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_media`
--

INSERT INTO `social_media` (`id`, `name`, `link`, `added_by`, `created_at`, `updated_at`) VALUES
(3, 'facebook', 'www.fb.com', 'Thanbir Tamim', '2021-04-05 09:29:42', '2021-04-05 09:29:42'),
(4, 'instagram', 'www.instagram.com', 'Thanbir Tamim', '2021-04-05 09:29:54', '2021-04-05 09:29:54'),
(5, 'twitter', 'www.twitter.com', 'Thanbir Tamim', '2021-04-06 04:43:42', '2021-04-06 04:43:42'),
(6, 'youtube', 'www.youtube.com', 'Thanbir Tamim', '2021-04-06 04:43:56', '2021-04-06 04:43:56');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `added_by` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `file`, `description`, `added_by`, `created_at`, `updated_at`) VALUES
(5, 'test1', '1344297515pic1.jpg', 'test 1', 'Thanbir Tamim', '2021-04-06 04:12:18', '2021-04-06 04:12:18'),
(6, 'test2', '1890844000pic2.jpg', 'test 2', 'Thanbir Tamim', '2021-04-06 04:12:28', '2021-04-06 04:12:28'),
(7, 'test 3', '99466488pic3.jpg', 'test 3', 'Thanbir Tamim', '2021-04-06 04:12:38', '2021-04-06 04:12:38'),
(8, 'test 4', '2106071220pic4.jpg', 'test 4', 'Thanbir Tamim', '2021-04-06 04:12:49', '2021-04-06 04:12:49');

-- --------------------------------------------------------

--
-- Table structure for table `temp_product_bags`
--

CREATE TABLE `temp_product_bags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_product_bags`
--

INSERT INTO `temp_product_bags` (`id`, `session_id`, `product_id`, `quantity`, `size_type`, `created_at`, `updated_at`) VALUES
(3, '6753279562021-04-07 07:32:03', '15', '1', 'l', '2021-04-07 03:37:28', '2021-04-07 03:37:28'),
(4, '19607619052021-04-07 07:40:58', '2', '1', 'xs', '2021-04-07 04:59:46', '2021-04-07 04:59:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(11) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Thanbir Tamim', 'sk.tamim56@gmail.com', 0, NULL, '$2y$10$rhW/jlV3gtHRlPbOnGGYseYyH41gGtu6BkML3RKtABKnTKB.0CGru', NULL, '2021-04-03 07:42:06', '2021-04-08 08:26:48'),
(3, 'Abdur Rahman', 'test@gmail.com', 1, NULL, '$2y$10$rhW/jlV3gtHRlPbOnGGYseYyH41gGtu6BkML3RKtABKnTKB.0CGru', NULL, '2021-04-05 09:54:20', '2021-04-05 09:54:20'),
(5, 'test', 'moderator@gmail.com', 2, NULL, '$2y$10$m/ZTW1EEydCbqQiCmEZsKOBPa1Ujuz8ylnGrt3o1JErNi/nWh/Z82', NULL, '2021-04-05 09:55:37', '2021-04-05 09:55:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_solacers`
--
ALTER TABLE `about_solacers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `about_solacers_id_unique` (`id`);

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `all_products_id_unique` (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_info_edits`
--
ALTER TABLE `contact_info_edits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_users`
--
ALTER TABLE `customer_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customer_users_phone_unique` (`phone`);

--
-- Indexes for table `front_views`
--
ALTER TABLE `front_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `sms_serveces`
--
ALTER TABLE `sms_serveces`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sms_serveces_id_unique` (`id`);

--
-- Indexes for table `social_media`
--
ALTER TABLE `social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teams_id_unique` (`id`);

--
-- Indexes for table `temp_product_bags`
--
ALTER TABLE `temp_product_bags`
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
-- AUTO_INCREMENT for table `about_solacers`
--
ALTER TABLE `about_solacers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact_info_edits`
--
ALTER TABLE `contact_info_edits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer_users`
--
ALTER TABLE `customer_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `front_views`
--
ALTER TABLE `front_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sms_serveces`
--
ALTER TABLE `sms_serveces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `social_media`
--
ALTER TABLE `social_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `temp_product_bags`
--
ALTER TABLE `temp_product_bags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
