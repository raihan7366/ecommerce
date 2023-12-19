-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2023 at 06:38 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_ecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name_en`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Samsung', '7821702963010.png', '2023-11-28 22:02:24', '2023-12-18 23:16:50', NULL),
(3, 'Xaiomi', '9481702963019.png', '2023-11-29 00:10:15', '2023-12-18 23:16:59', NULL),
(4, 'JBL', '8021702963032.png', '2023-12-11 22:51:33', '2023-12-18 23:17:12', NULL),
(6, 'Google', '8941702963040.png', '2023-12-17 22:26:42', '2023-12-18 23:17:20', NULL),
(7, 'Ottobi', '3581702963048.jpg', '2023-12-17 22:45:19', '2023-12-18 23:17:28', NULL),
(8, 'Hatil', '7301702963055.png', '2023-12-17 22:45:31', '2023-12-18 23:17:36', NULL),
(9, 'Prada', '4971702963064.png', '2023-12-17 22:45:55', '2023-12-18 23:17:44', NULL),
(10, 'George Armani', '7091702963086.png', '2023-12-17 22:46:24', '2023-12-18 23:18:06', NULL),
(11, 'Columbia', '4291702963095.png', '2023-12-17 22:47:03', '2023-12-18 23:18:15', NULL),
(12, 'Sharjah Lightings', '7611702963103.jpg', '2023-12-17 23:01:35', '2023-12-18 23:18:23', NULL),
(13, 'Apple', '2081702963115.jpg', '2023-12-18 22:56:27', '2023-12-18 23:18:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name_en`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Electronics', '9821702883343.jpg', '2023-11-26 22:45:56', '2023-12-18 01:09:03', NULL),
(2, 'Furniture', '7951702873786.jpg', '2023-12-17 22:29:47', '2023-12-18 01:09:52', NULL),
(3, 'Decorations', '3351702873823.jpg', '2023-12-17 22:30:23', '2023-12-18 01:11:13', NULL),
(5, 'Clothing & Apparels', '1901702873903.jpg', '2023-12-17 22:31:43', '2023-12-18 23:24:42', NULL),
(6, 'Home Appliances', '1981702960684.jpg', '2023-12-18 01:17:11', '2023-12-18 22:38:04', NULL),
(7, 'Health & Beauty', '1831702960766.jpg', '2023-12-18 01:17:35', '2023-12-18 22:39:26', NULL),
(8, 'Cooking', '2381702960775.jpg', '2023-12-18 01:18:37', '2023-12-18 22:39:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_data` longtext NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `txnid` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 active, 0 inactive',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `valid_from` date DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `discount`, `valid_from`, `valid_until`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'RS123', '10.00', '2023-12-19', '2023-12-20', '2023-12-18 23:19:08', '2023-12-18 23:19:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `contact_no_en` varchar(255) DEFAULT NULL,
  `contact_no_bn` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `full_access` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>yes 0=>no',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active 2=>inactive',
  `address` varchar(255) DEFAULT NULL,
  `shipping_address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name_en`, `name_bn`, `email`, `contact_no_en`, `contact_no_bn`, `password`, `image`, `full_access`, `status`, `address`, `shipping_address`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jamil', 'রায়হান', 'raihan@yahoo.com', '0303', '০৩০৩', '$2y$12$5CIvpOMk2G0OJBUX1CKo8uavH7kIKUnNsM9qpYfJ/xKGppUPivuZm', '2941700378803.png', 0, 1, '2 no gate', '2 no gate', NULL, '2023-11-19 01:04:33', '2023-11-19 01:26:43', NULL),
(3, 'aaaaaaaaaaaaaaaaa', NULL, 'raihan@gmail.com', NULL, NULL, '$2y$12$pOCVSQTlINHUdamr4OWa5ew/gChvDnZZpbhsNGhAQvZfjcC5CSCi.', NULL, 0, 1, NULL, NULL, NULL, '2023-12-05 22:36:13', '2023-12-05 22:36:13', NULL),
(4, 'aaaaaaaaaaaaaafdgdaaa', NULL, 'jason@gmail.com', NULL, NULL, '$2y$12$TGlfWNw5pqYdeyFNuQv6d.nqprD.SPzx75XYbkMwV1s4eCO3dqO06', NULL, 0, 1, NULL, NULL, NULL, '2023-12-05 22:38:26', '2023-12-05 22:38:26', NULL),
(5, 'patric', NULL, 'patric@gmail.com', NULL, NULL, '$2y$12$HAwgD2hW9amb6D5nrnzvOOV1.hyvHQRpSpLN3h9Y4wSBHq3mnEoE.', NULL, 0, 1, NULL, NULL, NULL, '2023-12-08 21:24:55', '2023-12-08 21:24:55', NULL);

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
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2023_11_13_063016_create_roles_table', 1),
(3, '2023_11_13_063026_create_users_table', 1),
(4, '2023_11_19_061913_create_customers_table', 2),
(5, '2023_11_13_064129_create_permissions_table', 3),
(6, '2023_11_27_033328_create_categories_table', 4),
(7, '2023_11_27_050947_create_brands_table', 5),
(9, '2023_11_29_042951_create_orders_table', 7),
(12, '2023_12_03_032413_create_settings_table', 8),
(14, '2023_11_30_041541_create_order_details_table', 9),
(15, '2023_12_02_055926_create_payments_table', 9),
(16, '2023_12_03_050428_create_stocks_table', 9),
(17, '2023_12_07_034628_create_reviews_table', 10),
(18, '2023_12_11_062910_create_checkouts_table', 11),
(19, '2023_12_17_032941_create_coupons_table', 11),
(20, '2023_12_19_031915_create_subcategories_table', 12),
(21, '2023_11_27_053736_create_products_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `sub_amount` decimal(10,2) NOT NULL,
  `discount` decimal(10,2) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>paid 2=>not paid',
  `delivery_status` int(11) NOT NULL DEFAULT 1 COMMENT '1=>delivered 2=>not delivered',
  `order_date` date NOT NULL,
  `delivery_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` bigint(20) UNSIGNED NOT NULL,
  `product_image` bigint(20) UNSIGNED NOT NULL,
  `product_category` bigint(20) UNSIGNED NOT NULL,
  `product_brand` bigint(20) UNSIGNED NOT NULL,
  `order_discount` bigint(20) UNSIGNED NOT NULL,
  `order_total_amount` bigint(20) UNSIGNED NOT NULL,
  `order_sub_amount` bigint(20) UNSIGNED NOT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_name_en` bigint(20) UNSIGNED NOT NULL,
  `customer_contact_no_en` bigint(20) UNSIGNED NOT NULL,
  `customer_email` bigint(20) UNSIGNED NOT NULL,
  `transaction_no` varchar(255) NOT NULL,
  `payment_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=>Bkash 2=>card 3=>COD',
  `card_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `role_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 3, 'customers.index', '2023-11-24 23:16:19', '2023-11-24 23:16:19'),
(2, 3, 'customers.create', '2023-11-24 23:16:19', '2023-11-24 23:16:19'),
(3, 3, 'customers.show', '2023-11-24 23:16:19', '2023-11-24 23:16:19'),
(4, 3, 'customers.edit', '2023-11-24 23:16:19', '2023-11-24 23:16:19'),
(5, 3, 'customers.destroy', '2023-11-24 23:16:19', '2023-11-24 23:16:19');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `short_description` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `subcategory_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `discount_type` int(11) NOT NULL DEFAULT 1 COMMENT '1=>percentage 2=>fixed',
  `discount_amount` decimal(10,2) DEFAULT NULL,
  `is_popular` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>yes 0=>no',
  `is_featured` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=>yes 0=>no',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name_en`, `description`, `short_description`, `image`, `category_id`, `subcategory_id`, `brand_id`, `price`, `discount_type`, `discount_amount`, `is_popular`, `is_featured`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Neato Robotics', 'Lorem Ipsum', 'Lorem Ipsum', '4511702961696.jpg', 1, 1, 4, '399.00', 2, '10.00', 1, 1, '2023-12-18 22:54:56', '2023-12-18 22:54:56', NULL),
(2, 'Macbook Pro 13\" Display, i5', 'Lorem Ipsum', 'Lorem Ipsum', '3351702961869.jpg', 1, 2, 13, '1199.00', 2, '10.00', 1, 1, '2023-12-18 22:57:49', '2023-12-18 22:57:49', NULL),
(3, 'Bose-SoundLink Bluetooth Speaker', 'Lorem ipsum', 'Lorem Ipsum', '9831702961935.jpg', 1, 3, 4, '79.99', 2, '10.00', 1, 1, '2023-12-18 22:58:55', '2023-12-18 22:58:55', NULL),
(4, 'Apple-11 inch ipad Pro with Wi-Fi 256GB', 'Lorem Ipsum', 'Lorem Ipsum', '6481702962003.jpg', 1, 4, 13, '899.99', 2, '10.00', 1, 1, '2023-12-18 23:00:03', '2023-12-18 23:00:03', NULL),
(5, 'Google - Pixel 3 XL 128GB', 'Lorem Ipsum', 'Lorem Ipsum', '9891702963350.jpg', 1, 5, 6, '399.99', 2, '10.00', 1, 1, '2023-12-18 23:22:30', '2023-12-18 23:22:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name_en` bigint(20) UNSIGNED DEFAULT NULL,
  `product_image` bigint(20) UNSIGNED DEFAULT NULL,
  `user_name_en` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no_en` varchar(255) NOT NULL,
  `comment` text DEFAULT NULL,
  `ratings` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `identity` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `identity`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', '2023-11-13 00:34:48', NULL),
(2, 'Admin', 'admin', '2023-11-13 00:34:48', NULL),
(3, 'Customer', 'customer', '2023-11-24 23:09:17', '2023-11-24 23:09:17');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `company_add` varchar(255) DEFAULT NULL,
  `contact_no_en` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `whatsapp_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `image`, `company_add`, `contact_no_en`, `email`, `facebook_link`, `twitter_link`, `whatsapp_link`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '4521701756314.jpg', 'Selicon', '12356', 'jason@gmail.com', 'https://www.facebook.com/', 'https://www.twitter.com/', 'https://www.whatsapp.com/', '2023-12-04 23:48:16', '2023-12-05 00:05:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name_en` bigint(20) UNSIGNED NOT NULL,
  `total_quantity` decimal(8,2) NOT NULL,
  `order_quantity` bigint(20) UNSIGNED NOT NULL,
  `buying_price` decimal(10,2) NOT NULL,
  `selling_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE `subcategories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subcatname_en` varchar(255) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcatname_en`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Appliances', NULL, '2023-12-18 22:45:09', '2023-12-18 22:45:09'),
(2, 'Computer & Laptop', NULL, '2023-12-18 22:45:16', '2023-12-18 23:29:24'),
(3, 'Audio', NULL, '2023-12-18 22:45:21', '2023-12-18 22:45:21'),
(4, 'Tablets', NULL, '2023-12-18 22:45:27', '2023-12-18 22:45:27'),
(5, 'Smart Phone', NULL, '2023-12-18 22:45:49', '2023-12-18 23:28:58'),
(6, 'Table', NULL, '2023-12-18 22:46:12', '2023-12-18 22:46:12'),
(7, 'Sofas', NULL, '2023-12-18 22:46:17', '2023-12-18 22:46:17'),
(8, 'Lightings', NULL, '2023-12-18 22:46:23', '2023-12-18 22:46:23'),
(9, 'Chairs', NULL, '2023-12-18 22:46:29', '2023-12-18 22:46:29'),
(10, 'Shoes', NULL, '2023-12-18 22:46:50', '2023-12-18 22:46:50'),
(11, 'Accessories', NULL, '2023-12-18 22:46:58', '2023-12-18 22:46:58'),
(12, 'T-Shirts', NULL, '2023-12-18 22:47:05', '2023-12-18 22:47:05'),
(13, 'Bags', NULL, '2023-12-18 22:47:10', '2023-12-18 22:47:10'),
(14, 'Shirt', NULL, '2023-12-18 22:47:28', '2023-12-18 22:47:28'),
(15, 'Televisions', NULL, '2023-12-18 23:27:44', '2023-12-18 23:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact_no_en` varchar(255) NOT NULL,
  `contact_no_bn` varchar(255) DEFAULT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) NOT NULL,
  `language` varchar(255) NOT NULL DEFAULT 'en',
  `image` varchar(255) DEFAULT NULL,
  `full_access` tinyint(1) NOT NULL DEFAULT 0 COMMENT 'yes=>1, No=>0',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>active 2=>inactive',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name_en`, `name_bn`, `email`, `contact_no_en`, `contact_no_bn`, `role_id`, `password`, `language`, `image`, `full_access`, `status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Raihan Shazzad', 'রায়হান', 'nm@gmail.com', '0123', '০১২৩', 1, '$2y$12$.12CDFOe2XCBXV4LASXM2OnVvf2Fn9llak9u4NlPx.5HLUoe8.n92', 'en', '9691700369467.jpg', 1, 1, NULL, '2023-11-18 22:49:16', '2023-11-27 01:42:02', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_contact_no_en_unique` (`contact_no_en`),
  ADD UNIQUE KEY `customers_email_unique` (`email`),
  ADD UNIQUE KEY `customers_contact_no_bn_unique` (`contact_no_bn`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_customer_id_index` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_details_product_name_index` (`product_name`),
  ADD KEY `order_details_product_image_index` (`product_image`),
  ADD KEY `order_details_product_category_index` (`product_category`),
  ADD KEY `order_details_product_brand_index` (`product_brand`),
  ADD KEY `order_details_order_discount_index` (`order_discount`),
  ADD KEY `order_details_order_total_amount_index` (`order_total_amount`),
  ADD KEY `order_details_order_sub_amount_index` (`order_sub_amount`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_card_no_unique` (`card_no`),
  ADD KEY `payments_customer_name_en_index` (`customer_name_en`),
  ADD KEY `payments_customer_contact_no_en_index` (`customer_contact_no_en`),
  ADD KEY `payments_customer_email_index` (`customer_email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_role_id_index` (`role_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_index` (`category_id`),
  ADD KEY `products_subcategory_id_index` (`subcategory_id`),
  ADD KEY `products_brand_id_index` (`brand_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `reviews_contact_no_en_unique` (`contact_no_en`),
  ADD UNIQUE KEY `reviews_email_unique` (`email`),
  ADD KEY `reviews_product_name_en_index` (`product_name_en`),
  ADD KEY `reviews_product_image_index` (`product_image`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_type_unique` (`name`),
  ADD UNIQUE KEY `roles_identity_unique` (`identity`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `stocks_product_name_en_index` (`product_name_en`),
  ADD KEY `stocks_order_quantity_index` (`order_quantity`);

--
-- Indexes for table `subcategories`
--
ALTER TABLE `subcategories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_contact_no_en_unique` (`contact_no_en`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_contact_no_bn_unique` (`contact_no_bn`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subcategories`
--
ALTER TABLE `subcategories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_order_discount_foreign` FOREIGN KEY (`order_discount`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_sub_amount_foreign` FOREIGN KEY (`order_sub_amount`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_order_total_amount_foreign` FOREIGN KEY (`order_total_amount`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_brand_foreign` FOREIGN KEY (`product_brand`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_category_foreign` FOREIGN KEY (`product_category`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_image_foreign` FOREIGN KEY (`product_image`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_details_product_name_foreign` FOREIGN KEY (`product_name`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_customer_contact_no_en_foreign` FOREIGN KEY (`customer_contact_no_en`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_customer_email_foreign` FOREIGN KEY (`customer_email`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_customer_name_en_foreign` FOREIGN KEY (`customer_name_en`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `products_subcategory_id_foreign` FOREIGN KEY (`subcategory_id`) REFERENCES `subcategories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_image_foreign` FOREIGN KEY (`product_image`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_product_name_en_foreign` FOREIGN KEY (`product_name_en`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `stocks_order_quantity_foreign` FOREIGN KEY (`order_quantity`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `stocks_product_name_en_foreign` FOREIGN KEY (`product_name_en`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
