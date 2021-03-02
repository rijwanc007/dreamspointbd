-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2021 at 07:23 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dreamspoint`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `ip`, `product_id`, `product_code`, `size`, `color`, `created_at`, `updated_at`) VALUES
(49, '127.0.0.1', '[\"99\"]', '[\"KJ001\"]', '[\"M\"]', '[\"Purple\"]', '2021-03-02 00:00:16', '2021-03-02 00:00:50');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_head_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `sub_head_category`, `sub_category`, `created_at`, `updated_at`) VALUES
(3, 'men', 'All Clothing', 'CASUAL & PARTY WEAR SHIRTS', '2020-12-21 23:56:03', '2020-12-24 05:27:15'),
(4, 'men', 'All Clothing', 'JEANS', '2020-12-21 23:56:24', '2020-12-24 05:27:09'),
(5, 'men', 'All Clothing', 'FORMAL SHIRTS', '2020-12-21 23:56:31', '2020-12-24 05:27:03'),
(6, 'men', 'All Clothing', 'SPORTS WEAR', '2020-12-21 23:56:45', '2020-12-24 05:26:57'),
(7, 'men', 'All Footwear', 'FLATS', '2020-12-21 23:56:51', '2020-12-24 05:26:50'),
(8, 'men', 'All Footwear', 'SLIPPERS & FLIP FLOPS', '2020-12-21 23:57:07', '2020-12-24 05:26:44'),
(9, 'men', 'All Footwear', 'SPORTS SHOES', '2020-12-21 23:57:16', '2020-12-24 05:26:36'),
(10, 'men', 'All Footwear', 'SPORTS SANDLES', '2020-12-21 23:57:24', '2020-12-24 05:26:29'),
(11, 'women', 'All Clothing', 'FORMAL SHIRTS', '2020-12-21 23:59:04', '2020-12-24 05:26:22'),
(12, 'women', 'All Clothing', 'JEANS', '2020-12-21 23:59:10', '2020-12-24 05:26:15'),
(13, 'women', 'All Clothing', 'BAGS', '2020-12-21 23:59:32', '2020-12-24 05:26:10'),
(14, 'kids', 'All Clothing', 'JACKETS', '2020-12-22 00:01:24', '2020-12-24 05:26:05'),
(15, 'kids', 'All Clothing', 'JEANS', '2020-12-22 00:01:28', '2020-12-24 05:26:00'),
(16, 'groceries', 'Groceries', 'CANNED FOOD', '2020-12-22 00:01:47', '2020-12-24 05:25:56'),
(17, 'groceries', 'Fresh Produce', 'FRUITS', '2020-12-22 00:02:03', '2020-12-24 05:25:51'),
(18, 'groceries', 'Fresh Produce', 'VEGETABLES', '2020-12-22 00:02:10', '2020-12-24 05:25:47'),
(19, 'groceries', 'Fish & Meat', 'DRY FISH', '2020-12-22 00:02:19', '2020-12-24 05:25:41'),
(20, 'groceries', 'Fish & Meat', 'MUTTON', '2020-12-22 00:02:35', '2020-12-24 05:25:37'),
(21, 'groceries', 'Fish & Meat', 'CHICKEN', '2020-12-22 00:02:41', '2020-12-24 05:25:33'),
(23, 'accessories', 'Computer Accessories', 'HEADPHONE & EARPHONE', '2020-12-22 00:03:22', '2020-12-24 05:24:25'),
(26, 'men', 'All Clothing', 'T-SHIRTS', '2021-01-04 05:10:07', '2021-01-04 05:10:07'),
(27, 'women', 'All Footwear', 'SHOES', '2021-01-06 02:58:04', '2021-01-06 02:58:04'),
(31, 'women', NULL, 'TOPS', '2021-02-22 10:46:26', '2021-02-22 10:46:26'),
(32, 'women', 'All Clothing', 'SPORTS', '2021-02-22 12:36:28', '2021-02-22 12:36:28'),
(33, 'men', 'All Clothing', 'UNDERWARE', '2021-02-22 12:42:22', '2021-02-22 12:42:22');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `starting_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ending_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon_name`, `percent`, `starting_date`, `ending_date`, `created_at`, `updated_at`) VALUES
(2, 'val1421', '5', '2021-02-01', '2021-02-28', '2021-02-08 01:45:52', '2021-02-08 01:45:52'),
(3, '21_february', '10', '2021-02-16', '2021-02-26', '2021-02-17 06:03:03', '2021-02-17 06:03:03'),
(6, 'Sm', '10', '2021-02-21', '2021-03-21', '2021-02-21 09:43:02', '2021-02-21 09:43:02');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotdeals`
--

CREATE TABLE `hotdeals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotdeals`
--

INSERT INTO `hotdeals` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(5, 'h1', '932220098.png', '2020-12-30 23:23:06', '2020-12-30 23:23:06'),
(6, 'h2', '869753262.png', '2020-12-30 23:23:16', '2020-12-30 23:23:16'),
(7, 'h3', '1708557592.png', '2020-12-30 23:23:28', '2020-12-30 23:23:28'),
(9, 'h4', '93237959.png', '2020-12-30 23:28:24', '2020-12-30 23:28:24'),
(10, 'h5', '1980964459.png', '2020-12-30 23:29:30', '2020-12-30 23:29:30');

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_12_22_045429_create_categories_table', 1),
(5, '2020_12_22_070731_create_products_table', 2),
(7, '2020_12_26_055833_create_reviews_table', 3),
(8, '2020_12_26_065901_create_offers_table', 4),
(9, '2020_12_30_113924_create_subscribers_table', 5),
(10, '2020_12_31_044121_create_hotdeals_table', 6),
(11, '2020_12_31_091121_create_navoffers_table', 7),
(12, '2020_12_31_093859_create_wishlists_table', 8),
(13, '2021_01_17_121002_create_orders_table', 9),
(14, '2021_02_06_075327_create_carts_table', 10),
(15, '2021_02_08_065334_create_coupons_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `navoffers`
--

CREATE TABLE `navoffers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navoffers`
--

INSERT INTO `navoffers` (`id`, `category`, `image`, `created_at`, `updated_at`) VALUES
(2, 'men', '754223681.jpg', '2020-12-31 03:22:11', '2020-12-31 03:22:11'),
(3, 'women', '1992059316.png', '2020-12-31 03:22:41', '2020-12-31 03:22:41'),
(5, 'kids', '1336343805.jpg', '2020-12-31 03:28:45', '2020-12-31 03:28:45'),
(6, 'accessories', '1740234535.png', '2020-12-31 04:10:18', '2020-12-31 04:10:18'),
(10, 'men', '886844000.jpg', '2021-02-17 06:10:24', '2021-02-17 06:10:24');

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `display` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `name`, `image`, `duration`, `display`, `created_at`, `updated_at`) VALUES
(1, 'Black Friday', '1804779762.jpg', '2021-01-02', 'no', '2020-11-11 04:57:21', '2021-01-06 04:31:56'),
(2, 'New Year Sale', '88650996.jpg', '2021-05-26', 'yes', '2020-12-26 04:12:42', '2021-02-17 05:22:58'),
(5, 'Valentines Day', '1792153236.jpg', '2021-02-28', 'no', '2021-01-06 02:54:47', '2021-02-17 05:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_name` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_qty` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_price` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_sub_total` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coupon_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_with_coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_without_coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pf` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `offer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prev_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `discount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_code`, `category`, `sub_category`, `image`, `title`, `description`, `size`, `color`, `pf`, `offer`, `prev_price`, `new_price`, `discount`, `created_at`, `updated_at`) VALUES
(87, 'j01', 'men', 'JEANS', '[\"240996861.png\",\"1955888453.jpeg\"]', 'Blue Jeans', NULL, '[\"34\",\"35\",\"36\"]', '[\"Blue\",\" Red\",\" Orange\"]', 'featured', '2', NULL, '800', NULL, '2021-02-06 00:40:12', '2021-02-08 05:33:08'),
(88, 'wj01', 'women', 'JEANS', '[\"1182841156.jpg\",\"846557885.jpg\"]', 'Blue Denim Jeans', NULL, '[\"27\",\"28\",\"30\"]', '[\"Blue\",\" Light Blue\"]', 'new', '2', NULL, '800', NULL, '2021-02-06 00:40:57', '2021-02-08 05:39:06'),
(89, 'wh01', 'women', 'FORMAL SHIRTS', '[\"1270635572.jpg\",\"2133264127.jpg\"]', 'Formal Shirt', NULL, '[\"M\",\"L \",\"S\"]', '[\"Blue\",\" Red\",\" Orange\",\" White\"]', 'new', '2', NULL, '600', NULL, '2021-02-06 00:41:35', '2021-02-08 05:35:28'),
(92, 'hp002', 'accessories', 'HEADPHONE & EARPHONE', '[\"130287561.png\"]', 'HeadPhone', NULL, '[\"null\"]', '[\"Blue\",\"Purple\"]', 'best', '2', NULL, '1500', NULL, '2021-02-06 00:43:05', '2021-02-16 23:16:18'),
(94, 'veg001', 'groceries', 'VEGETABLES', '[\"81529147.jpg\"]', 'Spinach', NULL, '[\"null\"]', '[\"null\"]', NULL, NULL, NULL, '50', NULL, '2021-02-06 00:43:58', '2021-02-08 05:50:50'),
(95, 'fruits001', 'groceries', 'FRUITS', '[\"1653236399.jpg\"]', 'Kiwi', NULL, '[\"null\"]', '[\"null\"]', NULL, NULL, '300', '250', NULL, '2021-02-06 00:44:25', '2021-02-08 05:48:17'),
(99, 'KJ001', 'kids', 'JACKETS', '[\"1381829596.jpg\",\"373411110.png\"]', 'Kids Winter Jacket', NULL, '[\"M\",\"L \",\"S\"]', '[\"Blue\",\" Purple\",\" Orange\"]', 'featured', '2', '2500', '2000', NULL, '2021-02-07 02:05:39', '2021-02-07 02:05:39'),
(100, 'ss01', 'men', 'SPORTS WEAR', '[\"1837853665.jpg\",\"2131354445.jpeg\"]', 'Sports Keds', NULL, '[\"34\",\"36\",\"38\"]', '[\"Blue\",\" Red\",\" Orange\"]', 'featured', '2', '2000', '1500', NULL, '2021-02-07 03:46:53', '2021-02-07 03:56:44'),
(103, 'hs001', 'women', 'FORMAL SHIRTS', '[\"30301979.jpg\",\"53289461.jpg\",\"2053137370.jpg\"]', 'Half Sleeve Shirt', NULL, '[\"XL\",\"M\",\"L \",\"S\"]', '[\"Blue\",\" Red\",\" Orange\"]', 'featured', '2', NULL, '500', NULL, '2021-02-07 06:04:58', '2021-02-17 00:26:00'),
(109, 'DPB 001', 'women', 'TOPS', '[\"529183989.jpg\",\"309363642.jpg\",\"1000756037.jpg\"]', 'Long Tops', 'Pure viscose fabric \r\nwith beautiful hand work and embroidery work\r\n all over Kurti Superb quality', '[\"S\",\"M\",\"L\"]', '[\"Red\",\"blue\",\"Green\"]', 'featured', NULL, NULL, '990', NULL, '2021-02-22 12:30:36', '2021-02-22 12:56:00'),
(110, 'DPB 002', 'women', 'TOPS', '[\"1447840600.jpg\",\"550213967.jpg\"]', 'Long Tops', 'Pure viscose fabric \r\nwith beautiful hand work and embroidery work\r\n all over Kurti Superb quality', '[\"S\",\"M\",\"L\"]', '[\"Pink\",\"blue\"]', 'featured', NULL, NULL, '990', NULL, '2021-02-22 12:32:42', '2021-02-22 12:32:42'),
(111, 'DPB 003', 'women', 'TOPS', '[\"1080204336.jpg\",\"2059252440.jpg\"]', 'Long Tops', 'Pure viscose fabric \r\nwith beautiful hand work and embroidery work\r\n all over Kurti Superb quality', '[\"S\",\"M\",\"L\"]', '[\"Pink\",\"black\"]', 'featured', NULL, NULL, '990', NULL, '2021-02-22 12:35:04', '2021-02-22 12:35:04'),
(112, 'CKY 003', 'women', 'SPORTS', '[\"1657261328.jpg\",\"1973467118.jpg\",\"897964337.jpg\",\"126428398.jpg\"]', 'Calvin Klein  Yoga Set', 'Women Bralette And Legging Set Modern Cotton Stre 95%Cotton\r\n5%Elastane', '[\"S\",\"M\",\"L\",\"XL\"]', '[\"Black\",\"blue\",\"Ash\",\"pink\"]', 'featured', NULL, NULL, '499', NULL, '2021-02-22 12:41:23', '2021-02-22 15:32:40'),
(114, 'DPB 101', 'men', 'JEANS', '[\"165520038.png\",\"835518290.png\",\"584134758.png\",\"487145890.png\",\"1188201513.png\"]', 'Lee-Original Export Quality Active Stretch Denim', 'Our truly modern fit look jeans unite your personality.  Cool and contemporary, a product\r\n\r\n Regular waist - thin thighs and knees - slender', '[\"30\",\"32\",\"34\",\"36\",\"38\"]', '[\"Dark blue\",\"light blue\",\" light ash\"]', 'featured', NULL, NULL, '1150', NULL, '2021-02-22 13:07:34', '2021-02-24 13:27:12'),
(115, 'CKS 002', 'women', 'SPORTS', '[\"2123528437.jpg\",\"1717236909.jpg\"]', 'Ladies Sports bra set', 'Brand : CK\r\n : 95% cotton & 5% Lycra. \r\n100% Export quality', '[\"S\",\"M\",\"L\",\"XL\"]', '[\"Blue\",\"Ash\",\"black\"]', 'featured', NULL, NULL, '460', NULL, '2021-02-22 13:58:10', '2021-02-22 15:32:13'),
(116, 'DPB 105', 'men', 'JEANS', '[\"1160963576.png\",\"60560976.png\",\"1538702733.png\"]', 'Export Quality Stock & Hunk-Slim Fit Denim,', 'Slim fit denim, made with high quality fabrics\r\n\r\n  Beautiful, fresh and comfortable,', '[\"29\",\"30\",\"31\",\"32\",\"33\",\"34\",\"35\",\"36\"]', '[\"light blue\"]', 'featured', NULL, NULL, '850', NULL, '2021-02-22 15:39:32', '2021-02-23 20:56:12'),
(117, 'CKB 001', 'men', 'UNDERWARE', '[\"1625957757.jpg\"]', 'Calvin Klein Cotton Stretch 3Pack Trunks', 'Calvin Klein 3pcs box Underwear For Men\r\n\r\n We can give you 100% of surety for the original product you will get. \r\n 95% Cotton.\r\n 5% Elastan', '[\"S\",\"M\",\"L\",\"XL\"]', '[\"Blue\",\"Ash\",\"black\"]', 'featured', NULL, NULL, '290', NULL, '2021-02-22 15:48:34', '2021-02-24 18:54:21'),
(118, 'Baby_pants003', 'kids', 'JEANS', '[\"400634300.png\"]', 'Baby Trouser', '100% Cotton', '[\"M\",\"L \",\"S\"]', '[\"Blue\",\" Purple\"]', 'featured', NULL, NULL, '300', NULL, '2021-02-22 17:38:50', '2021-02-22 17:38:50'),
(119, 'THB 001', 'men', 'UNDERWARE', '[\"1174282930.jpg\",\"1444118798.jpg\"]', 'Modern Classic Boxer', 'Tommy Hilfiger premium Essentials  3 Trunks\r\n95%Cotton\r\n5%Elastane', '[\"S\",\"M\",\"L\",\"XL\"]', '[\"Blue\",\"Ash\",\"black\"]', 'featured', NULL, NULL, '310', NULL, '2021-02-24 18:51:18', '2021-02-24 18:51:18');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `image`, `email`, `message`, `status`, `created_at`, `updated_at`) VALUES
(4, 'Rezaul Bari', '964436928.png', 'rz@email.com', 'This E-Commerce Site is like dream comes true. Their product is as good as they show.', 'approved', '2020-12-26 00:57:24', '2021-01-06 22:44:38'),
(6, 'Maria Mustafa', '39648694.png', 'maria@gmail.com', 'The Sop has exclusive Collection. I love their product and service.\r\nHope they add more interesting Product.', 'approved', '2021-01-05 23:57:19', '2021-01-06 22:44:42');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'mehedy@gmail.com', '2020-12-30 05:48:58', '2020-12-30 05:48:58'),
(3, 'mahfuz@gmail.com', '2021-01-04 05:13:23', '2021-01-04 05:13:23'),
(4, 'rijwanc007@gmail.com', '2021-01-06 22:45:15', '2021-01-06 22:45:15'),
(5, 'uniliver@mail.com', '2021-01-09 06:08:27', '2021-01-09 06:08:27'),
(6, 'rz@email.com', '2021-02-17 04:40:49', '2021-02-17 04:40:49'),
(7, 'rz1@email.com', '2021-02-17 06:11:04', '2021-02-17 06:11:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Rijwan Chowdhury', 'rijwanc007@gmail.com', NULL, '$2y$10$GmEJlswadjOEsJ.n.lXINem9Hrzoh55d78QAIoKg6592wWpUPI80O', NULL, '2020-12-30 06:05:03', '2020-12-30 06:05:03'),
(3, 'Mehedy Hassan', 'mehedy@gmail.com', NULL, '$2y$10$IKeZaf4lq53AHa9LhUBdaeZYNnNW524SSBqafIf.1wBYsLuWBVNC2', NULL, '2020-12-30 06:07:55', '2020-12-30 06:07:55'),
(4, 'Dream Point Bangladesh', 'dream_point@gmail.com', NULL, '$2y$10$cJPofZk2aSTaK.5eM4SyfeHuRYq8YFw7YJdrRj.dtq6YFQQiBDmsG', NULL, '2021-02-18 15:48:29', '2021-02-18 15:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liked` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `ip`, `product_id`, `liked`, `created_at`, `updated_at`) VALUES
(94, '127.0.0.1', '99', 'yes', '2021-02-16 23:05:56', '2021-02-16 23:05:56'),
(96, '127.0.0.1', '89', 'yes', '2021-02-16 23:06:01', '2021-02-16 23:06:01'),
(98, '192.168.88.216', '103', 'yes', '2021-02-17 05:09:47', '2021-02-17 05:09:47'),
(102, '192.168.88.216', '87', 'yes', '2021-02-17 05:09:57', '2021-02-17 05:09:57'),
(104, '192.168.88.216', '89', 'yes', '2021-02-17 05:10:07', '2021-02-17 05:10:07'),
(105, '192.168.88.216', '88', 'yes', '2021-02-17 05:10:08', '2021-02-17 05:10:08'),
(109, '192.168.88.216', '106', 'yes', '2021-02-17 05:31:58', '2021-02-17 05:31:58'),
(110, '192.168.88.252', '107', 'yes', '2021-02-17 06:07:26', '2021-02-17 06:07:26'),
(111, '192.168.88.252', '85', 'yes', '2021-02-17 06:08:24', '2021-02-17 06:08:24'),
(112, '192.168.88.252', '92', 'yes', '2021-02-17 06:11:34', '2021-02-17 06:11:34'),
(113, '192.168.88.252', '88', 'yes', '2021-02-17 06:20:56', '2021-02-17 06:20:56'),
(114, '103.204.211.149', '103', 'yes', '2021-02-22 12:30:06', '2021-02-22 12:30:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotdeals`
--
ALTER TABLE `hotdeals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `navoffers`
--
ALTER TABLE `navoffers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
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
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotdeals`
--
ALTER TABLE `hotdeals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `navoffers`
--
ALTER TABLE `navoffers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
