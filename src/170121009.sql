-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 29, 2024 at 05:45 PM
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
-- Database: `170121009`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(12, '2024_10_14_090048_create_tbl_admin_table', 2),
(14, '2024_10_15_030356_create_tbl_password_resets_table', 2),
(15, '2024_10_15_030350_create_tbl_users_table', 3),
(16, '2024_10_15_075400_create_tbl_category_product_table', 4),
(17, '2024_10_16_063119_create_tbl_brand_product_table', 5),
(19, '2024_10_16_071008_create_tbl_product_table', 6),
(21, '2024_10_18_092432_create_tbl_customers_table', 7),
(22, '2024_10_18_100302_create_tbl_shipping_table', 8),
(23, '2024_10_20_035258_create_tbl_payment_table', 9),
(24, '2024_10_20_035322_create_tbl_order_table', 10),
(25, '2024_10_20_035359_create_tbl_order_details_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_password` varchar(255) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'ptphu@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '170121009_ADMIN', '0939456258', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand_product`
--

CREATE TABLE `tbl_brand_product` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `brand_desc` text NOT NULL,
  `brand_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand_product`
--

INSERT INTO `tbl_brand_product` (`brand_id`, `brand_name`, `brand_desc`, `brand_status`, `created_at`, `updated_at`) VALUES
(11, 'PhaNa phân phối', '<p>PhaNa ph&acirc;n phối</p>', 1, NULL, NULL),
(12, 'PhaNa sản xuất', '<p>&nbsp;</p>\r\n\r\n<p>PhaNa sản xuất</p>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_post`
--

CREATE TABLE `tbl_category_post` (
  `cate_post_id` int(11) NOT NULL,
  `cate_post_name` tinytext DEFAULT NULL,
  `cate_post_status` int(11) NOT NULL DEFAULT 0,
  `cate_post_slug` varchar(255) DEFAULT NULL,
  `cate_post_desc` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category_post`
--

INSERT INTO `tbl_category_post` (`cate_post_id`, `cate_post_name`, `cate_post_status`, `cate_post_slug`, `cate_post_desc`, `updated_at`, `created_at`) VALUES
(7, 'Siêu âm', 1, 'Siêu âm', '<h1>Nhiệt n&oacute;ng ở đầu si&ecirc;u &acirc;m kh&ocirc;ng c&oacute; t&aacute;c dụng m&ocirc; s&acirc;u.</h1>', '2024-10-29 13:26:07', '2024-10-29 13:26:07'),
(8, 'Phục hồi chức năng', 1, 'Phục hồi chức năng', '<h1>M&ocirc; h&igrave;nh Phục hồi chức năng hiện đai</h1>', '2024-10-29 13:26:32', '2024-10-29 13:26:32');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category_product`
--

CREATE TABLE `tbl_category_product` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_desc` text NOT NULL,
  `category_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category_product`
--

INSERT INTO `tbl_category_product` (`category_id`, `category_name`, `category_desc`, `category_status`, `created_at`, `updated_at`) VALUES
(30, 'Dụng cụ tập VLTL- PHCN', '<p>Dụng cụ tập&nbsp;VLTL- PHCN</p>', 1, NULL, NULL),
(31, 'Máy vật lý trị liệu', '<h1>M&aacute;y vật l&yacute; trị liệu</h1>', 1, NULL, NULL),
(32, 'Máy vật lý trị liệu', '<h1>M&aacute;y vật l&yacute; trị liệu</h1>', 1, NULL, NULL),
(33, 'Thiết bị Đông y', '<h1>Thiết bị Đ&ocirc;ng y</h1>', 1, NULL, NULL),
(34, 'Giường - tủ - băng ca - bàn khám', '<h1>Giường - tủ - băng ca - b&agrave;n kh&aacute;m</h1>', 1, NULL, NULL),
(35, 'Đai - nẹp chỉnh hình', '<h1>Đai - nẹp chỉnh h&igrave;nh</h1>', 1, NULL, NULL),
(36, 'Y khoa - chăm sóc sức khỏe', '<h1>Y khoa - chăm s&oacute;c sức khỏe</h1>', 1, NULL, NULL),
(37, 'Thể Thao - Thẩm mỹ', '<h1>Thể Thao - Thẩm mỹ</h1>', 1, NULL, NULL),
(38, 'Mô hình y khoa', '<h1>M&ocirc; h&igrave;nh y khoa</h1>', 1, NULL, NULL),
(39, 'Vật tư - phụ kiện y khoa', '<h1>Vật tư - phụ kiện y khoa</h1>', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customers_id` bigint(20) UNSIGNED NOT NULL,
  `customers_name` varchar(255) NOT NULL,
  `customers_email` varchar(255) NOT NULL,
  `customers_password` varchar(255) NOT NULL,
  `customers_phone` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customers`
--

INSERT INTO `tbl_customers` (`customers_id`, `customers_name`, `customers_email`, `customers_password`, `customers_phone`, `created_at`, `updated_at`) VALUES
(1, 'abc', 'ptphu@gmail.com', '123456', '0939456258', NULL, NULL),
(2, 'abc', 'ptphu@gmail.com', '123456', '0939456258', NULL, NULL),
(3, '1', 'padmin@gmai', '1', '1', NULL, NULL),
(4, '1', 'padmin@gmai', '11', '1', NULL, NULL),
(5, '1', 'padmin@ad', '1', '1', NULL, NULL),
(6, '1', 'padmin@qq', '1478965p', '1', NULL, NULL),
(7, '1', 'padmin@qq', '1478965p', '1', NULL, NULL),
(8, '1', 'padmin@qq', '111', '1', NULL, NULL),
(9, '1', 'padmin@ww', '1478965p', '1', NULL, NULL),
(10, '11', 'padmin1@sad', '1478965p', '11', NULL, NULL),
(11, '11', 'padmin!@xn--bda', '1478965p', '11', NULL, NULL),
(12, 'sdasd', 'padmin!@sadasd', '1478965p', 'ádsa', NULL, NULL),
(13, 'sadda', 'padmin!#@dsfds', '1478965p', 'adsad', NULL, NULL),
(14, 'abc', 'padmin@1', 'e10adc3949ba59abbe56e057f20f883e', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_infomation`
--

CREATE TABLE `tbl_infomation` (
  `info_id` int(11) NOT NULL,
  `info_contact` mediumint(9) DEFAULT NULL,
  `info_map` text DEFAULT NULL,
  `info_image` varchar(255) DEFAULT NULL,
  `info_fanpage` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `customers_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) DEFAULT NULL,
  `order_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customers_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(9, 14, 9, 13, '6,000,000.00', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_detailts`
--

CREATE TABLE `tbl_order_detailts` (
  `order_detailts_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` double NOT NULL,
  `product_sales_quantity` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_detailts`
--

INSERT INTO `tbl_order_detailts` (`order_detailts_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(6, 9, 22, 'PN03IL - Ghế tập cơ đùi (lớn, inox)', 6000000, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, '2', 'Đang chờ xử lý', NULL, NULL),
(2, '2', 'Đang chờ xử lý', NULL, NULL),
(3, '2', 'Đang chờ xử lý', NULL, NULL),
(4, '2', 'Đang chờ xử lý', NULL, NULL),
(5, '2', 'Đang chờ xử lý', NULL, NULL),
(6, '1', 'Đang chờ xử lý', NULL, NULL),
(7, '3', 'Đang chờ xử lý', NULL, NULL),
(8, '2', 'Đang chờ xử lý', NULL, NULL),
(9, '2', 'Đang chờ xử lý', NULL, NULL),
(10, '2', 'Đang chờ xử lý', NULL, NULL),
(11, '2', 'Đang chờ xử lý', NULL, NULL),
(12, '2', 'Đang chờ xử lý', NULL, NULL),
(13, '2', 'Đang chờ xử lý', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_posts`
--

CREATE TABLE `tbl_posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) DEFAULT NULL,
  `post_desc` varchar(255) DEFAULT NULL,
  `post_content` text DEFAULT NULL,
  `post_meta_desc` varchar(255) DEFAULT NULL,
  `post_meta_keyword` varchar(255) DEFAULT NULL,
  `post_status` int(11) NOT NULL DEFAULT 0,
  `post_image` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `cate_post_id` int(11) NOT NULL DEFAULT 0,
  `post_slug` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_posts`
--

INSERT INTO `tbl_posts` (`post_id`, `post_title`, `post_desc`, `post_content`, `post_meta_desc`, `post_meta_keyword`, `post_status`, `post_image`, `updated_at`, `created_at`, `cate_post_id`, `post_slug`) VALUES
(7, 'Mô hình PHCN hiện đại phân khúc giá rẻ cho Phòng Khám/bệnh viên', NULL, '<p>Trong ng&agrave;nh phục hồi chức năng, c&aacute;c sản phẩm c&ocirc;ng nghệ cao đ&oacute;ng vai tr&ograve; quan trọng trong việc n&acirc;ng cao hiệu quả điều trị v&agrave; cải thiện chất lượng cuộc sống của bệnh nh&acirc;n. Tuy nhi&ecirc;n, việc đầu tư v&agrave;o thiết bị c&ocirc;ng nghệ cao thường y&ecirc;u cầu chi ph&iacute; rất lớn, chỉ ở tại c&aacute;c cơ sở y tế c&ocirc;ng lập. Điều n&agrave;y dẫn đến kh&oacute; khăn trong việc tiếp cận c&ocirc;ng nghệ ti&ecirc;n tiến tại c&aacute;c cơ sở y tế tư nh&acirc;n.</p>\r\n\r\n<p>Để giải quyết vấn đề n&agrave;y, việc ph&aacute;t triển v&agrave; ứng dụng c&aacute;c sản phẩm c&ocirc;ng nghệ cao gi&aacute; rẻ l&agrave; một giải ph&aacute;p khả thi. Những sản phẩm n&agrave;y kh&ocirc;ng chỉ gi&uacute;p giảm chi ph&iacute; đầu tư m&agrave; c&ograve;n mang lại hiệu quả điều trị chuy&ecirc;n s&acirc;u v&agrave; cải thiện hiệu quả t&agrave;i ch&iacute;nh cho c&aacute;c cơ sở y tế tư nh&acirc;n.</p>\r\n\r\n<p>1. Thiết bị Đo lường v&agrave; Theo d&otilde;i T&igrave;nh trạng Bệnh nh&acirc;n</p>\r\n\r\n<p>C&aacute;c thiết bị đo lường v&agrave; theo d&otilde;i t&igrave;nh trạng bệnh nh&acirc;n hiện nay c&oacute; thể được ph&aacute;t triển với chi ph&iacute; hợp l&yacute;. Những thiết bị n&agrave;y gi&uacute;p theo d&otilde;i c&aacute;c chỉ số sinh học quan trọng, từ đ&oacute; cung cấp th&ocirc;ng tin ch&iacute;nh x&aacute;c v&agrave; kịp thời cho b&aacute;c sĩ trong qu&aacute; tr&igrave;nh điều trị.</p>\r\n\r\n<p>2. C&ocirc;ng nghệ T&aacute;i tạo v&agrave; Kh&ocirc;i phục Chức năng</p>\r\n\r\n<p>C&ocirc;ng nghệ t&aacute;i tạo chức năng như c&aacute;c thiết bị k&iacute;ch th&iacute;ch điện, robot hỗ trợ phục hồi chức năng, v&agrave; c&aacute;c hệ thống tập luyện tự động ng&agrave;y c&agrave;ng trở n&ecirc;n phổ biến v&agrave; tiết kiệm. Những sản phẩm n&agrave;y gi&uacute;p bệnh nh&acirc;n phục hồi nhanh ch&oacute;ng v&agrave; hiệu quả hơn m&agrave; kh&ocirc;ng cần đầu tư qu&aacute; lớn.</p>\r\n\r\n<p>3. Phần mềm v&agrave; Ứng dụng Hỗ trợ Phục hồi</p>\r\n\r\n<p>Phần mềm v&agrave; ứng dụng di động d&agrave;nh cho phục hồi chức năng cung cấp c&aacute;c b&agrave;i tập v&agrave; hướng dẫn điều trị c&aacute; nh&acirc;n h&oacute;a với chi ph&iacute; thấp. C&aacute;c c&ocirc;ng nghệ n&agrave;y kh&ocirc;ng chỉ dễ tiếp cận m&agrave; c&ograve;n c&oacute; thể t&ugrave;y chỉnh theo nhu cầu của từng bệnh nh&acirc;n, gi&uacute;p giảm thiểu chi ph&iacute; m&agrave; vẫn đạt hiệu quả cao.</p>\r\n\r\n<p>4. Thiết bị Đ&agrave;o tạo v&agrave; Tập luyện Tự Động</p>\r\n\r\n<p>Những thiết bị tập luyện tự động v&agrave; đ&agrave;o tạo th&ocirc;ng minh, như m&aacute;y tập thể dục đa năng với gi&aacute; th&agrave;nh hợp l&yacute;, gi&uacute;p bệnh nh&acirc;n thực hiện c&aacute;c b&agrave;i tập phục hồi chức năng một c&aacute;ch hiệu quả. C&aacute;c thiết bị n&agrave;y thường được t&iacute;ch hợp c&ocirc;ng nghệ mới nhất, mang lại kết quả điều trị tương đương với thiết bị đắt tiền hơn.</p>\r\n\r\n<p>Việc ứng dụng c&aacute;c sản phẩm c&ocirc;ng nghệ cao gi&aacute; rẻ trong ng&agrave;nh phục hồi chức năng kh&ocirc;ng chỉ giảm thiểu chi ph&iacute; đầu tư m&agrave; c&ograve;n n&acirc;ng cao hiệu quả điều trị. Đ&acirc;y l&agrave; một hướng đi bền vững v&agrave; hiệu quả cho c&aacute;c cơ sở y tế tư nh&acirc;n, g&oacute;p phần n&acirc;ng cao chất lượng dịch vụ v&agrave; chăm s&oacute;c sức khỏe cho bệnh nh&acirc;n.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821978064312-18a086e13d35c8e165773d47e13be7cf.jpg?v=1726106782658\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821981411814-c16cd6420e488a484064b1f1c6a330d0.jpg?v=1726106783588\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821986162927-c77017f5b804cec2c6fdb94983d5bbcf.jpg?v=1726106784252\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821986895387-4e0cdaf9017c4eec4296f1d63779cf4d.jpg?v=1726106784825\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821987449548-b940d0887cfed77a7ce9e39cbc3fd130.jpg?v=1726106785456\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821988683402-c0be4b3973176feb54faecc75236e1f7.jpg?v=1726106786161\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821989757528-dbefee146882890d90c363966cbc106c.jpg?v=1726106787989\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821991419837-1b95e04ce78d2ea88b15fc1dd5892f03.jpg?v=1726106788826\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821993216752-e8121b3ac71e45096470bef22785b226.jpg?v=1726106791020\" /></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/medium/100/114/864/files/z5821996909777-a1d8644eedc8124de4ee31b3e700c7a4.jpg?v=1726106791904\" /></p>', NULL, 'Mô hình PHCN hiện đại phân khúc giá rẻ cho Phòng Khám/bệnh viên', 1, '', '2024-10-29 13:29:09', '2024-10-29 13:29:09', 8, 'Phục hồi chức năng'),
(9, 'Nhiệt nóng ở đầu siêu âm không có tác dụng mô sâu', 'Nhiệt nóng ở đầu siêu âm không có tác dụng mô sâu.', '<p>Nhiều người nghĩ rằng si&ecirc;u &acirc;m trị liệu chỉ đơn thuần l&agrave; một phương ph&aacute;p tạo nhiệt trong m&ocirc; để giảm đau. Tuy nhi&ecirc;n, bản chất thực sự của si&ecirc;u &acirc;m trị liệu kh&ocirc;ng chỉ nằm ở t&aacute;c dụng nhiệt, m&agrave; c&ograve;n ở khả năng tạo ra những rung động si&ecirc;u &acirc;m c&oacute; t&aacute;c dụng chữa l&agrave;nh s&acirc;u b&ecirc;n trong.</p>\r\n\r\n<p>C&aacute;c thiết bị si&ecirc;u &acirc;m hiện nay c&oacute; thiết kế l&agrave;m n&oacute;ng đầu si&ecirc;u &acirc;m, tạo cảm gi&aacute;c ấm &aacute;p tr&ecirc;n da, nhưng thực tế, hiệu quả điều trị kh&ocirc;ng phải chỉ đến từ cảm gi&aacute;c n&agrave;y. T&aacute;c dụng ch&iacute;nh của si&ecirc;u &acirc;m trị liệu l&agrave; k&iacute;ch th&iacute;ch c&aacute;c m&ocirc; s&acirc;u hơn như cơ, g&acirc;n v&agrave; d&acirc;y chằng, gi&uacute;p tăng cường tuần ho&agrave;n m&aacute;u, giảm vi&ecirc;m v&agrave; th&uacute;c đẩy qu&aacute; tr&igrave;nh hồi phục.</p>\r\n\r\n<p>Việc cảm nhận hơi ấm tr&ecirc;n bề mặt da c&oacute; thể khiến nhiều người cảm thấy thư gi&atilde;n, cảm gi&aacute;c khi trị liệu, nhưng để đạt được hiệu quả thực sự cho c&aacute;c m&ocirc; s&acirc;u, cần c&oacute; kỹ thuật v&agrave; thiết bị ph&ugrave; hợp, kh&ocirc;ng chỉ dựa v&agrave;o cảm gi&aacute;c b&ecirc;n ngo&agrave;i.</p>\r\n\r\n<p>Nhiều h&atilde;ng lớn c&ograve;n giới hạn nhiệt độ cảm biến đầu ph&aacute;t mức #43 độ để tr&aacute;nh bỏng s&acirc;u cho bệnh nh&acirc;n.</p>\r\n\r\n<p>H&atilde;y lựa chọn phương ph&aacute;p trị liệu đ&uacute;ng đắn v&agrave; hiểu r&otilde; hơn về c&ocirc;ng nghệ si&ecirc;u &acirc;m để mang lại hiệu quả tốt nhất cho bệnh nh&acirc;n.</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/114/864/files/z2515987474370-1f8f3f28830cc0e332da387f53eb992b-c49c5097-ca65-4337-8470-881af8d1edd0.jpg?v=1727322551494\" /></p>\r\n\r\n<p>C&aacute;c d&ograve;ng m&aacute;y si&ecirc;u &acirc;m sử dụng c&oacute; hiệu quả cao,&nbsp;Sử dụng trong chuy&ecirc;n khoa vật l&yacute; trị liệu, sản khoa...được sử dụng kh&aacute; phổ biến v&agrave; rộng r&atilde;i tr&ecirc;n cả nước</p>\r\n\r\n<p>Si&ecirc;u &acirc;m 1 k&ecirc;nh:</p>\r\n\r\n<p>H&atilde;ng BTL Anh Quốc</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/114/864/files/z2515987502735-e0332ea9b4c53b77f95199d5375b8017.jpg?v=1727322657029\" /><img src=\"https://bizweb.dktcdn.net/100/114/864/files/z2904753691811-1b46c81281267250ae5b38d5bb8ece90.jpg?v=1727322657684\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Si&ecirc;u &acirc;m 2 k&ecirc;nh h&atilde;ng BTL Anh Quốc</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/114/864/files/z2904753680956-8293fecd48e7b05f203cdba9e8294540.jpg?v=1727322761048\" /></p>', NULL, 'Nhiệt nóng ở đầu siêu âm không có tác dụng mô sâu.', 1, '', '2024-10-29 13:42:51', '2024-10-29 13:42:51', 7, 'Nhiệt nóng ở đầu siêu âm không có tác dụng mô sâu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` text NOT NULL,
  `product_content` text NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_content`, `product_price`, `product_image`, `product_status`, `created_at`, `updated_at`) VALUES
(21, 'Dụng cụ tập khớp gối (Inox) - PN07IL', 30, 12, '<p><strong>Dụng cụ tập khớp gối (Inox)</strong></p>\r\n\r\n<p><strong>M&atilde; sản phẩm: PN07IL</strong></p>\r\n\r\n<p><strong>Th&ocirc;ng số :</strong></p>\r\n\r\n<p>Xuất xứ: PhaNa - Việt Nam</p>\r\n\r\n<p>Sản xuất theo ti&ecirc;u chuẩn ISO:13485</p>\r\n\r\n<p>Inox, niệm&nbsp;ngồi bọc simily</p>\r\n\r\n<p>K&iacute;ch thước: D164xR54xC110cm (+/- sai số 5%) &nbsp;</p>\r\n\r\n<p>Trọng lượng: 28kg</p>\r\n\r\n<p>M&ocirc; tả sản phẩm :</p>\r\n\r\n<p>- C&oacute; thể tăng giảm độ nghi&ecirc;n của ghế để gia tăng lực khi trượt v&agrave;&nbsp;độ nghi&ecirc;n của bệ để ch&acirc;n,&nbsp;rất c&oacute; hiệu quả&nbsp;đối với khớp gối bị giới hạn tầm hoạt&nbsp;động gập. V&igrave; c&oacute;&nbsp;độ dốc&nbsp;được tăng giảm n&ecirc;n người bệnh c&oacute; thể tập gập khớp h&ocirc;ng, gập gối v&agrave; khớp cổ ch&acirc;n dễ d&agrave;ng, nhất l&agrave; l&agrave;m k&eacute;o d&atilde;n g&acirc;n g&oacute;t v&agrave; l&agrave;m mạnh cơ to&agrave;n chi.</p>\r\n\r\n<p>- Tập khớp gối đặc biệt l&agrave; người bệnh c&oacute; thể tự tập gia tăng tầm hoạt động (ROM) khớp gối bị giới hạn, ngo&agrave;i ra c&ograve;n tập khớp h&ocirc;ng, khớp cổ ch&acirc;n, k&eacute;o d&atilde;n g&acirc;n g&oacute;t rất hiệu quả ...</p>\r\n\r\n<p>- Rất ph&ugrave; hợp với ph&ograve;ng tập Vật l&yacute; trị liệu, phục&nbsp;hồi chức năng hoặc d&ugrave;ng tại tại nh&agrave;.</p>\r\n\r\n<p>- Sản phẩm được trang bị tại nhiều cơ sở tr&ecirc;n cả nước.</p>', '<p>Tập khớp gối đặc biệt l&agrave; người bệnh c&oacute; thể tự tập gia tăng tầm hoạt động (ROM) khớp gối bị giới hạn, ngo&agrave;i ra c&ograve;n tập khớp h&ocirc;ng, khớp cổ ch&acirc;n, k&eacute;o d&atilde;n g&acirc;n g&oacute;t rất hiệu quả</p>', '5000000', 'dc14220241028083131.webp', 0, NULL, NULL),
(22, 'PN03IL - Ghế tập cơ đùi (lớn, inox)', 39, 12, '<p><strong>H&atilde;ng sản xuất:&nbsp;C&Ocirc;NG TY TNHH SẢN XUẤT THƯƠNG MẠI PHANA</strong></p>\r\n\r\n<p><strong>Nước sản xuất: Việt Nam</strong></p>\r\n\r\n<p><strong>Sản xuất theo ti&ecirc;u chuẩn ISO 13485</strong></p>\r\n\r\n<p><strong>Cấu h&igrave;nh:</strong></p>\r\n\r\n<ul>\r\n	<li>Khung ch&iacute;nh: 1 bộ</li>\r\n	<li>Tựa lưng: 1 c&aacute;i</li>\r\n	<li>Nệm y&ecirc;n: 1 c&aacute;i</li>\r\n	<li>Bộ n&acirc;ng đỡ tạ inox (c&acirc;y đ&aacute; tạ) v&agrave; cục g&ugrave;: 1 bộ</li>\r\n	<li>Thanh tập tay: 1 bộ</li>\r\n	<li>12kg tạ thẻ gang.</li>\r\n	<li>Trụ để tạ khi kh&ocirc;ng d&ugrave;ng</li>\r\n</ul>\r\n\r\n<p><u><strong>H&Igrave;NH ẢNH K&Iacute;CH THƯỚC SẢN PHẨM :</strong></u></p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/114/864/products/3-5b325d29-c191-4ea0-b28d-66cb2d216ac1.png?v=1703229462530\" /></p>\r\n\r\n<p><strong>Th&ocirc;ng số kỹ thuật ch&iacute;nh:</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<table align=\"left\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"vertical-align:top\">\r\n			<ul>\r\n				<li>K&iacute;ch&nbsp;thước D106xR114xC102cm (+/- sai số 5%)</li>\r\n				<li>Chỗ ngồi: 45x60cm. Tựa lưng: 45x46cm (+/- sai số 5%),</li>\r\n				<li>Cấu tạo: Khung inox kh&ocirc;ng rỉ độ d&agrave;y&nbsp;1.2 ly</li>\r\n				<li>Chỗ ngồi v&agrave; tựa lưng PE + mousse bọc simily</li>\r\n				<li>Phạm vi điều chỉnh bộ phận tập ch&acirc;n: 0 &ndash; 45cm</li>\r\n				<li>Phạm vi điều chỉnh của thanh tập tay: 0 - 45cm</li>\r\n				<li>G&oacute;c xoay của bộ phận tập tay v&agrave; ch&acirc;n: 360&ordm;</li>\r\n				<li>T&aacute;c dụng trọng tải 120 kg</li>\r\n				<li>Đĩa xoay với n&uacute;m vặn điều chỉnh phạm vi tầm vận động. Thay đổi g&oacute;c đ&aacute; bằng n&uacute;m xoay tiện lợi.</li>\r\n				<li>Nhiều mức chỉnh phạm vi đ&aacute; n&ecirc;n c&oacute; thể đ&aacute; lực căng trước hoặc đ&aacute; lực căng sau. 2 thanh tập nh&oacute;m cơ tay độc lập hoặc tập điều hợp/phối hợp tay ch&acirc;n.</li>\r\n				<li>Tập mạnh nh&oacute;m cơ v&ugrave;ng đ&ugrave;i trước v&agrave; v&ugrave;ng đ&ugrave;i sau Tuỳ theo sức cơ, người bệnh c&oacute; thể tăng dần trọng lượng tạ cho ph&ugrave; hợp.</li>\r\n			</ul>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><u><strong>H&Igrave;NH ẢNH THỰC TẾ SẢN PHẨM:</strong></u></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/100/114/864/products/1-bb08d538-1826-4f44-aa8e-c0eafdd447b1.png?v=1703229461467\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/114/864/files/20240613-135531.jpg?v=1718588723158\" /><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/114/864/files/20240613-135544.jpg?v=1718588725109\" /><img src=\"https://bizweb.dktcdn.net/thumb/1024x1024/100/114/864/files/20240613-135551.jpg?v=1718588726924\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>NHẬN SẢN XUẤT SỐ LƯỢNG LỚN THEO Y&Ecirc;U CẦU&nbsp;</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong><em>HƯỚNG DẪN SỬ DỤNG</em></strong></p>\r\n\r\n<ul>\r\n	<li>Bệnh nh&acirc;n ngồi thẳng, gập h&ocirc;ng, gập gối 90 độ, nhượng ch&acirc;n s&aacute;t với th&agrave;nh của ghế để tr&aacute;nh cử động thay thế.</li>\r\n	<li>Trước ti&ecirc;n cho tạ v&agrave;o chổ để tạ, sau đ&oacute;&nbsp;tăng hoặc giảm trọng lượng tạ&nbsp;cho ph&ugrave; hợp theo người đang tập&nbsp;t&ugrave;y theo sức cơ v&agrave; sự tiến triển của người bệnh bằng c&aacute;ch cho ph&ugrave; hợp.</li>\r\n	<li>Chỗ đ&aacute; ch&acirc;n c&oacute; thể tăng cao &ndash; thấp theo chiều d&agrave;i chi từng người tập.</li>\r\n	<li>Điều thanh đ&aacute; để tăng &ndash; giảm độ gập gối cũng như tập tập cho nh&oacute;m cơ đ&ugrave;i trước (Cơ tứ đầu đ&ugrave;i) hay đ&ugrave;i sau (cơ tam đầu đ&ugrave;i)</li>\r\n</ul>\r\n\r\n<p><strong>Đối với Tập mạnh nh&oacute;m cơ đ&ugrave;i trước ( cơ tứ đầu đ&ugrave;i ) :</strong></p>\r\n\r\n<p>Chỉnh trục đ&aacute; vừa với cổ ch&acirc;n người tập, khuy&ecirc;n người tập từ từ n&acirc;ng ch&acirc;n l&ecirc;n thẳng gối (lưu &yacute; l&agrave; chỉ cử động từ khớp gối trở xuống), giữ tư thế n&agrave;y trong v&agrave;i gi&acirc;y rồi hạ ch&acirc;n xuống ... sau đ&oacute; tăng dần giữ trong 20 gi&acirc;y , 30 gi&acirc;y ...</p>\r\n\r\n<p><strong>Đối với Tập mạnh nh&oacute;m cơ đ&ugrave;i sau (cơ tam đầu đ&ugrave;i ) :</strong></p>\r\n\r\n<p>Giống như c&aacute;ch tập nh&oacute;m cơ đ&ugrave;i trước nhưng phải điều chỉnh thanh đ&aacute; ch&acirc;n hướng song song với mặt đất, để đoạn tr&ecirc;n g&acirc;n g&oacute;t v&agrave;o trục đ&aacute; ch&acirc;n ,khuy&ecirc;n người tập từ từ &eacute;p ch&acirc;n v&agrave;o , giữ lại ....từ từ dưỗi thẳng ch&acirc;n ra ... lập lại nhiều lần giống như c&aacute;ch tập nh&oacute;m cơ đ&ugrave;i trước .</p>\r\n\r\n<ul>\r\n	<li>Ngo&agrave;i ra, Sản phẩm được cải tiến mở rộng với thanh tập nh&oacute;m cơ hai tay hoặc tập phối hợp hoặc điều hợp giữa tay v&agrave; ch&acirc;n.</li>\r\n	<li>Trong qu&aacute; tr&igrave;nh tập luyện theo d&otilde;i nhắc nhở người tập kh&ocirc;ng l&agrave;m th&ecirc;m những cử động thay thế như nhấc m&ocirc;ng v&agrave; gập h&ocirc;ng để cố đưa ch&acirc;n n&acirc;ng tạ l&ecirc;n .</li>\r\n</ul>\r\n\r\n<p>Thực hiện động t&aacute;c n&agrave;y từ 10 lần &ndash; 20 lần / 1 lần tập. Mỗi buổi tập khoảng từ 15-20 ph&uacute;t t&ugrave;y theo sức khỏe người bệnh , tr&aacute;nh để người bệnh cố gắng qu&aacute; sức v&agrave; tập trọng lượng tạ kh&ocirc;ng ph&ugrave; hợp.</p>\r\n\r\n<p>Sản phẩm n&agrave;y kh&aacute; an to&agrave;n trong điều trị n&ecirc;n sản phẩm kh&ocirc;ng c&oacute; chống chỉ định, tuy nhi&ecirc;n cần tr&aacute;nh bệnh nh&acirc;n c&oacute; tăng huyết &aacute;p v&agrave; suy tim. Khi tập những đối tượng n&agrave;y phải thường xuy&ecirc;n theo d&otilde;i v&agrave; kh&ocirc;ng tập trọng lượng tạ qu&aacute; sức người bệnh.</p>\r\n\r\n<p><strong><u>CHỐNG CHỈ ĐỊNH</u>:</strong></p>\r\n\r\n<p>Những bệnh nh&acirc;n tr&iacute; thức kh&ocirc;ng ổn định, cẩn thận khi tập cho bệnh nh&acirc;n c&oacute; tăng huyết &aacute;p v&agrave; suy tim . Khi tập những đối tượng n&agrave;y phải thường xuy&ecirc;n theo d&otilde;i v&agrave; kh&ocirc;ng tập trọng lượng tạ qu&aacute; sức người bệnh.</p>\r\n\r\n<p><strong>&nbsp; &nbsp;</strong></p>\r\n\r\n<p><strong><u>VIDEO HƯỚNG DẪN SỬ DỤNG:</u></strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"315\" src=\"https://www.youtube.com/embed/2dvAH6171TU\" title=\"YouTube video player\" width=\"560\"></iframe></p>\r\n\r\n<p>--------------------------------------------------</p>\r\n\r\n<p>Doanh nghiệp đ&atilde; thiết kế cung cấp nhiều năm tr&ecirc;n thị trường với hơn 200 đầu mục sản phẩm do ch&uacute;ng t&ocirc;i sản xuất. C&ugrave;ng với, rất nhiều m&aacute;y m&oacute;c thiết bị y tế do ch&uacute;ng t&ocirc;i nhập khẩu v&agrave; ph&acirc;n phối được chọn lọc từ nhiều h&agrave;ng nổi tiếng tr&ecirc;n thế giới. Sản phẩm của ch&uacute;ng t&ocirc;i sản xuất v&agrave; nhập khẩu ph&acirc;n phối rộng khắp tr&ecirc;n cả nước; đại đa số c&aacute;c cơ sở y tế lớn nhỏ tr&ecirc;n cả nước v&agrave; b&aacute;c sỹ đầu ng&agrave;ng t&iacute;n nhiệm v&agrave; tin d&ugrave;ng. Ngo&agrave;i ra, ch&uacute;ng t&ocirc;i cũng l&agrave; đơn vị cung cấp hầu hết cho c&aacute;c tổ chức phi ch&iacute;nh phủ đang hoạt động tại Việt Nam.</p>\r\n\r\n<p>Tất cả những thiết bị của ch&uacute;ng t&ocirc;i c&oacute; gi&aacute; th&agrave;nh ổn định, chất lượng ng&agrave;y c&agrave;ng n&acirc;ng cao về kỷ thuật chuy&ecirc;n m&ocirc;n v&agrave; mẫu m&atilde;.&nbsp;&nbsp;Trong những năm vừa qua, C&ocirc;ng ty Phana được rất nhiều tổ chức, ban ng&agrave;nh v&agrave; kh&aacute;ch h&agrave;ng đ&aacute;nh gi&aacute; l&agrave; sản phẩm c&oacute; uy t&iacute;n, chất lượng dẫn đầu tại Việt Nam &hellip;&nbsp;Với&nbsp;những th&agrave;nh quả đạt được, C&ocirc;ng ty ch&uacute;ng t&ocirc;i đ&atilde; được nhiều tổ chức uy t&iacute;n trong v&agrave; ngo&agrave;i nước chứng nhận:</p>\r\n\r\n<ul>\r\n	<li>Thương hiệu uy t&iacute;n chất lượng &ndash; năm 2005</li>\r\n	<li>C&uacute;p v&agrave;ng sản phẩm uy t&iacute;n chất lượng &ndash; năm 2005</li>\r\n	<li>Thương hiệu h&agrave;ng đầu về sản phẩm PHCN uy t&iacute;n chất lượng tại Việt Nam - năm 2014 .</li>\r\n	<li>Thương hiệu chinh phục người ti&ecirc;u d&ugrave;ng &ndash; năm 2014</li>\r\n	<li>Nh&agrave; cung cấp tốt nhất &ndash; năm 2014</li>\r\n	<li>Thượng hiệu dẫn đầu Việt Nam năm 2018</li>\r\n	<li>Thượng hiệu dẫn đầu Việt Nam năm 2022</li>\r\n	<li>Đặc biệt từ 28/11/2017, PhaNa đ&atilde; &aacute;p dụng Hệ thống Quản l&yacute; chất lượng đối với thiết bị y tế ISO 13485:2016. Đ&acirc;y l&agrave;&nbsp;ti&ecirc;u chuẩn quy định c&aacute;c y&ecirc;u cầu đối với hệ thống quản l&yacute; chất lượng &aacute;p dụng tại c&aacute;c cơ sở cung cấp dụng cụ y tế v&agrave; dịch vụ li&ecirc;n quan m&agrave; Bộ Y Tế bắt buộc phải c&oacute; kể từ ng&agrave;y 01/01/2020 nhằm tạo ra m&ocirc;i trường l&agrave;m việc giảm thiểu rủi ro li&ecirc;n quan an to&agrave;n sản phẩm y tế, sản phẩm được tạo ra an to&agrave;n, nhằm thỏa m&atilde;n nhu cầu của kh&aacute;ch h&agrave;ng v&agrave; y&ecirc;u cầu luật ph&aacute;p.</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>CAM KẾT CHẤT LƯỢNG</strong></p>\r\n\r\n<ol>\r\n	<li>C&ocirc;ng ty TNHH Sản xuất &ndash; Thương mại PhaNa l&agrave; một c&ocirc;ng ty h&agrave;ng đầu trong lĩnh vực sản xuất v&agrave; cung cấp thiết bị - dụng cụ Vật l&yacute; trị liệu &ndash; Phục hồi chức năng tại Việt Nam.</li>\r\n	<li>Mỗi kh&aacute;ch h&agrave;ng khi đến với PhaNa đều được lắng nghe v&agrave; đ&aacute;p ứng mọi nhu cầu, d&ugrave; l&agrave; nhỏ nhất. Đội ngũ nh&acirc;n vi&ecirc;n c&ocirc;ng ty lu&ocirc;n nỗ lực để biến mỗi y&ecirc;u cầu của kh&aacute;ch h&agrave;ng trở th&agrave;nh hiện thực, mang đến một sản phẩm an to&agrave;n, ph&ugrave; hợp v&agrave; hiệu quả nhất.</li>\r\n</ol>\r\n\r\n<ol>\r\n	<li>Ch&uacute;ng t&ocirc;i kh&ocirc;ng sản xuất những sản phẩm ch&uacute;ng t&ocirc;i cần b&aacute;n m&agrave; ch&uacute;ng t&ocirc;i tận t&acirc;m nghi&ecirc;n cứu, thiết kế v&agrave; sản xuất ra những sản phẩm &ndash; dịch vụ kh&aacute;ch h&agrave;ng cần mua.</li>\r\n	<li>Đảm bảo cung cấp đầy đủ nguồn nh&acirc;n lực v&agrave; c&aacute;c điều kiện cần thiết để vận h&agrave;nh, duy tr&igrave; v&agrave; cải tiến li&ecirc;n tục Hệ thống quản l&yacute; chất lượng theo ti&ecirc;u chuẩn ISO 13485:2016 nhằm n&acirc;ng cao hiệu quả hoạt động quản l&yacute; điều h&agrave;nh, chất lượng sản phẩm của c&ocirc;ng ty, g&oacute;p phần đảm bảo đời sống vật chất v&agrave; tinh thần cho c&aacute;n bộ nh&acirc;n vi&ecirc;n c&ocirc;ng ty, đồng thời l&agrave; tr&aacute;ch nhiệm x&atilde; hội khi cung ứng sản phẩm y tế ra thị trường.</li>\r\n	<li>Trong hoạt đ&ocirc;ng sản xuất, nhập khẩu v&agrave; kinh doanh ph&acirc;n phối ch&uacute;ng t&ocirc;i lu&ocirc;n b&aacute;n h&agrave;ng với ti&ecirc;u ch&iacute;&nbsp;Đừng cố gắng b&aacute;n, h&atilde;y gi&uacute;p kh&aacute;ch h&agrave;ng mua&rdquo; l&agrave; phương ch&acirc;m b&aacute;n h&agrave;ng m&agrave; ch&uacute;ng t&ocirc;i. Bởi ch&uacute;ng t&ocirc;i hiểu rằng: Sự h&agrave;i l&ograve;ng, niềm vui, tin tưởng v&agrave; sự tiến bộ của kh&aacute;ch h&agrave;ng ch&iacute;nh l&agrave; động lực để th&uacute;c đẩy PhaNa cố gắng, tiếp tục vững bước tr&ecirc;n con đường thực hiện sứ mạng của m&igrave;nh đối với cộng đồng v&agrave; x&atilde; hội.</li>\r\n</ol>', '<p>Tập mạnh nh&oacute;m cơ v&ugrave;ng đ&ugrave;i trước v&agrave; sau (cơ tứ đầu v&agrave; cơ tam đầu đ&ugrave;i ) của chi dưới. Ghế c&oacute; thể điều chỉnh được lực kh&aacute;ng nặng &ndash; nhẹ t&ugrave;y theo sức cơ v&agrave; sự tiến triển của người bệnh bằng c&aacute;ch tăng hoặc giảm trọng lượng tạ cho ph&ugrave; hợp.</p>', '6000000', 'dc23020241028083503.webp', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` bigint(20) UNSIGNED NOT NULL,
  `shipping_name` varchar(255) NOT NULL,
  `shipping_address` varchar(255) NOT NULL,
  `shipping_phone` varchar(255) NOT NULL,
  `shipping_email` varchar(255) NOT NULL,
  `shipping_notes` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_name`, `shipping_address`, `shipping_phone`, `shipping_email`, `shipping_notes`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '1', 'asfdsad@ưqeweq', '1', NULL, NULL),
(2, '1', '1', '1', 'asfdsad@ưqeweqq', '1', NULL, NULL),
(3, 'sadfas', 'ádsad', '1212', 'sdfsdfsdf!aweqwe@sadsa', '121212', NULL, NULL),
(4, '12', '12', '12', 'asfdsad@ưqeweq', '12', NULL, NULL),
(5, 'qưe', 'qưe', 'qưe', 'qe', 'qưe', NULL, NULL),
(6, 'ads', 'ád', 'ád', 'ad', NULL, NULL, NULL),
(7, 'ads', 'ads', 'ád', 'ad', 'ads', NULL, NULL),
(8, 'Phan Thanh Phú', 'Hòa Lạc, Phú Tân, An Giang', '0939456258', '170121009@rdi.edu.vn', 'đóng gói cẩn thận', NULL, NULL),
(9, 'Phan Thanh Phú', 'Hòa Lạc, Phú Tân, An Giang', '0939456258', '170121009@rdi.edu.vn', 'đóng gói cẩn thận dùm!', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(11) NOT NULL,
  `slider_name` varchar(255) DEFAULT NULL,
  `slider_image` varchar(255) DEFAULT NULL,
  `slider_status` int(11) NOT NULL DEFAULT 0,
  `slider_desc` varchar(255) DEFAULT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_name`, `slider_image`, `slider_status`, `slider_desc`, `updated_at`, `created_at`) VALUES
(5, 'slider 1', 'banner-14520241028080819.jpg', 1, '<p>slider 1</p>', '2024-10-28 08:08:19', '2024-10-28 08:08:19'),
(6, 'slider 2', 'banner-24720241028080829.jpg', 1, '<p>slider 2</p>', '2024-10-28 08:08:29', '2024-10-28 08:08:29'),
(7, 'slider 3', 'banner-36320241028080837.jpg', 1, '<p>slider 3</p>', '2024-10-28 08:08:37', '2024-10-28 08:08:37'),
(8, 'slider 4', 'banner-42620241028080847.jpg', 1, '<p>slider 4</p>', '2024-10-28 08:08:47', '2024-10-28 08:08:47'),
(9, 'slider 5', 'banner-59020241028080856.jpg', 1, '<p>slider 5</p>', '2024-10-28 08:08:56', '2024-10-28 08:08:56');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `passwword` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  ADD PRIMARY KEY (`cate_post_id`);

--
-- Indexes for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customers_id`);

--
-- Indexes for table `tbl_infomation`
--
ALTER TABLE `tbl_infomation`
  ADD PRIMARY KEY (`info_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_detailts`
--
ALTER TABLE `tbl_order_detailts`
  ADD PRIMARY KEY (`order_detailts_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_brand_product`
--
ALTER TABLE `tbl_brand_product`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category_post`
--
ALTER TABLE `tbl_category_post`
  MODIFY `cate_post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_category_product`
--
ALTER TABLE `tbl_category_product`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customers_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_infomation`
--
ALTER TABLE `tbl_infomation`
  MODIFY `info_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order_detailts`
--
ALTER TABLE `tbl_order_detailts`
  MODIFY `order_detailts_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_posts`
--
ALTER TABLE `tbl_posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
