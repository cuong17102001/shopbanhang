-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 20, 2021 lúc 05:25 PM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `laravel`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `description`, `content`, `created_at`, `updated_at`) VALUES
(1, 'Quang Hải rơi vào khoảng lặng, chưa biết khi nào có thể thi đấu', 'Quang_Hai.jpg', 'Thiếu hai trụ cột, Hà Nội FC vẫn có chiến thắng 3-2 trước Thanh Hoá. Lối chơi của đội bóng thủ đô được cải thiện nhiều khi có cả Moses, Hùng Dũng ở tuyến giữa. Bộ đôi Geovane Magno và Bruno cũng dần hoà nhập', '<p>Thiếu hai trụ cột, H&agrave; Nội FC vẫn c&oacute; chiến thắng 3-2 trước Thanh Ho&aacute;. Lối chơi của đội b&oacute;ng thủ đ&ocirc; được cải thiện nhiều khi c&oacute; cả Moses, H&ugrave;ng Dũng ở tuyến giữa. Bộ đ&ocirc;i Geovane Magno v&agrave; Bruno cũng dần ho&agrave; nhập</p>\r\n\r\n<p><img alt=\"\" src=\"/ckfinder/userfiles/images/Quang_Hai.jpg\" style=\"height:100px; width:100px\" />&nbsp; &nbsp;<img alt=\"\" src=\"/ckfinder/userfiles/images/vietnam.png\" style=\"height:100px; width:150px\" /></p>\r\n\r\n<p>dfsdfasdfadfadfadf</p>', NULL, '2021-04-11 07:39:26'),
(3, 'áo thể thao', 'Nơi_này_có_anh_-_Single_Cover.jpg', 'Thiếu hai trụ cột, Hà Nội FC vẫn có chiến thắng 3-2 trước Thanh Hoá. Lối chơi của đội bóng thủ đô được cải thiện nhiều khi có cả Moses, Hùng Dũng ở tuyến giữa. Bộ đôi Geovane Magno và Bruno cũng dần hoà nhập', '<p>Thiếu hai trụ cột, H&agrave; Nội FC vẫn c&oacute; chiến thắng 3-2 trước Thanh Ho&aacute;. Lối chơi của đội b&oacute;ng thủ đ&ocirc; được cải thiện nhiều khi c&oacute; cả Moses, H&ugrave;ng Dũng ở tuyến giữa. Bộ đ&ocirc;i Geovane Magno v&agrave; Bruno cũng dần ho&agrave; nhập</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>', '2021-03-31 10:54:57', '2021-04-02 04:52:32'),
(4, 'áo dài', 'Quang-Hai-hai3-1576687732-width781height960.jpg', 'Thiếu hai trụ cột, Hà Nội FC vẫn có chiến thắng 3-2 trước Thanh Hoá. Lối chơi của đội bóng thủ đô được cải thiện nhiều khi có cả Moses, Hùng Dũng ở tuyến giữa. Bộ đôi Geovane Magno và Bruno cũng dần hoà nhập', '<p>Thiếu hai trụ cột, H&agrave; Nội FC vẫn c&oacute; chiến thắng 3-2 trước Thanh Ho&aacute;. Lối chơi của đội b&oacute;ng thủ đ&ocirc; được cải thiện nhiều khi c&oacute; cả Moses, H&ugrave;ng Dũng ở tuyến giữa. Bộ đ&ocirc;i Geovane Magno v&agrave; Bruno cũng dần ho&agrave; nhập</p>', '2021-03-31 10:55:50', '2021-04-02 04:52:22'),
(5, 'xzczxczxc', 'images.jpeg', 'ádaaaaaadsaaaaaaaaaaaaaaaaaaaassdas', '<p>&aacute;ddddddddddddddddddddddddddddddddddddddddddddd</p>', '2021-04-02 04:54:36', '2021-04-02 04:54:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `brand`, `created_at`, `updated_at`) VALUES
(2, 'samsung', '2021-04-11 07:35:46', '2021-04-11 07:35:46'),
(3, 'iphone', '2021-04-11 07:37:04', '2021-04-11 07:37:04'),
(4, 'asus', '2021-04-11 07:37:13', '2021-04-11 07:37:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category`, `created_at`, `updated_at`) VALUES
(3, 'điện thoại', '2021-04-11 07:12:38', '2021-04-11 07:12:38'),
(4, 'laptop', '2021-04-11 07:12:53', '2021-04-11 07:12:53');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmt_blog`
--

CREATE TABLE `cmt_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userId` int(11) NOT NULL,
  `blogId` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cmt_blog`
--

INSERT INTO `cmt_blog` (`id`, `userId`, `blogId`, `content`, `level`, `created_at`, `updated_at`) VALUES
(1, 10, 1, 'zxczxczxc', 0, '2021-04-05 11:05:14', '2021-04-05 11:05:14'),
(2, 10, 1, 'zxcxzcvzxcbvbxzcvbxzcvzxcv', 1, NULL, NULL),
(3, 10, 1, 'sdgghdafgdfag', 1, NULL, NULL),
(4, 10, 1, 'zxczxv123123', 0, '2021-04-05 11:21:46', '2021-04-05 11:21:46'),
(5, 10, 1, '435265234', 4, NULL, NULL),
(48, 10, 3, 'xczxc', 0, '2021-04-07 04:38:38', '2021-04-07 04:38:38'),
(49, 10, 3, 'ádasdqweqwe', 48, '2021-04-07 04:38:47', '2021-04-07 04:38:47'),
(50, 10, 3, 'heluu', 48, '2021-04-07 04:40:49', '2021-04-07 04:40:49'),
(51, 10, 3, 'jaldfjaisdfaosdhf', 48, '2021-04-07 05:57:12', '2021-04-07 05:57:12'),
(52, 10, 3, 'zxczxczxczxc', 0, '2021-04-07 05:58:53', '2021-04-07 05:58:53'),
(53, 10, 3, 'hádkjfhasdufh', 52, '2021-04-07 05:59:02', '2021-04-07 05:59:02'),
(54, 10, 3, 'sadasdasd', 52, '2021-04-07 06:00:56', '2021-04-07 06:00:56'),
(55, 10, 3, 'hee;akshlasdfasdf', 52, '2021-04-07 06:01:07', '2021-04-07 06:01:07'),
(56, 9, 3, 'hehehehe', 52, '2021-04-08 05:56:07', '2021-04-08 05:56:07'),
(57, 10, 3, 'm thích ê k', 0, '2021-04-11 02:44:15', '2021-04-11 02:44:15'),
(58, 10, 3, 'cxczxczxc', 0, '2021-04-11 02:49:06', '2021-04-11 02:49:06'),
(59, 10, 3, 'sadadasdasdasdasdasd', 0, '2021-04-11 02:51:18', '2021-04-11 02:51:18'),
(60, 9, 4, 'a;ldfjl;akdsjf;lakjdsf;l', 0, '2021-04-17 05:57:05', '2021-04-17 05:57:05'),
(61, 9, 4, 'xclzxcjzlxcjzxc', 60, '2021-04-17 05:57:27', '2021-04-17 05:57:27'),
(62, 9, 5, 'ưaewerwerwer', 0, '2021-04-18 23:20:06', '2021-04-18 23:20:06'),
(63, 9, 5, 'dsfsdfsdf', 0, '2021-04-18 23:20:21', '2021-04-18 23:20:21');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `country`, `created_at`, `updated_at`) VALUES
(3, 'England', NULL, NULL),
(4, 'Korea', '2021-03-30 09:38:48', '2021-03-30 09:38:48'),
(11, 'VietNam', '2021-03-31 10:43:48', '2021-03-31 10:43:48'),
(12, 'Japan', '2021-03-31 10:45:19', '2021-03-31 10:45:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `history`
--

CREATE TABLE `history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history`
--

INSERT INTO `history` (`id`, `email`, `phone`, `name`, `userId`, `price`, `created_at`, `updated_at`) VALUES
(1, 'a@gmail.com', '090581794223', 'Nguyễn Quốc Cường', 9, '0', '2021-04-16 06:56:09', '2021-04-16 06:56:09'),
(2, 'a@gmail.com', '090581794223', 'Nguyễn Quốc Cường', 9, '0', '2021-04-16 06:59:26', '2021-04-16 06:59:26'),
(3, 'a@gmail.com', '090581794223', 'Nguyễn Quốc Cường', 9, '0', '2021-04-16 07:18:42', '2021-04-16 07:18:42'),
(4, 'a@gmail.com', '090581794223', 'Nguyễn Quốc Cường', 9, '0', '2021-04-16 07:21:47', '2021-04-16 07:21:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_27_101405_create_user_table', 2),
(5, '2021_03_27_091700_create_user_table', 3),
(6, '2021_03_27_104255_create_updateuser_table', 4),
(7, '2021_03_30_124254_create_country_table', 5),
(8, '2021_03_31_131434_create_blogs_table', 6),
(9, '2021_03_31_140646_create_update_blog_table', 7),
(10, '2021_04_02_134515_create_updateuser2_table', 8),
(11, '2021_04_04_165353_create_rate_blog_table', 9),
(12, '2021_04_05_142034_create_cmt_blog_table', 10),
(13, '2021_04_08_144930_create_product_table', 11),
(14, '2021_04_09_140424_create_product_table', 12),
(15, '2021_04_11_101156_create_categories_table', 13),
(16, '2021_04_11_141722_create_brands_table', 14),
(17, '2021_04_15_160511_create_histories_table', 15),
(18, '2021_04_15_162046_create_history_table', 16);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `sale` tinyint(4) NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userId` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `categoryId`, `brandId`, `sale`, `discount`, `image`, `description`, `userId`, `created_at`, `updated_at`) VALUES
(24, 'Nguyễn Quốc Cường', 34, 3, 2, 0, 0, '[\"1618285639ao-thun-tay-dai-unisex-nam-rhode-xanh-reu-oversize.jpg\",\"1618285922hinh-nen-may-tinh-11.jpg\",\"1298501693N\\u01a1i_n\\u00e0y_c\\u00f3_anh_-_Single_Cover.jpg\"]', 'đá', 10, '2021-04-12 20:47:19', '2021-04-12 21:11:01'),
(27, 'Nguyễn Quốc Cường', 123, 3, 2, 0, 0, '[\"627846244N\\u01a1i_n\\u00e0y_c\\u00f3_anh_-_Single_Cover.jpg\"]', 'ád', 10, '2021-04-13 01:58:30', '2021-04-13 01:58:30'),
(28, 'admi', 20, 3, 2, 0, 0, '[\"815715633Quang-Hai-hai3-1576687732-width781height960.jpg\"]', 'sad', 10, '2021-04-13 01:59:05', '2021-04-13 01:59:05'),
(29, 'boong', 20, 3, 2, 0, 0, '[\"143211676ao-thun-tay-dai-unisex-nam-rhode-xanh-reu-oversize.jpg\"]', 'ádad', 10, '2021-04-13 01:59:43', '2021-04-13 01:59:43'),
(32, 'Nguyễn Quốc Cường', 34, 3, 2, 0, 0, '[\"1707081108ao-thun-tay-dai-unisex-nam-rhode-xanh-reu-oversize.jpg\",\"1707081108qkt04-quan-jogger-tui-hop-nu-xanh-den-1.jpg\"]', 'xzczxc', 9, '2021-04-14 20:55:17', '2021-04-14 20:55:17'),
(33, 'Nguyễn Quốc Cường', 34, 3, 2, 0, 0, '[\"776862748vietnam.png\",\"776862748images.jpeg\",\"776862748N\\u01a1i_n\\u00e0y_c\\u00f3_anh_-_Single_Cover.jpg\"]', 'ád', 9, '2021-04-14 20:55:46', '2021-04-14 20:55:46'),
(34, 'admi', 34, 3, 2, 0, 0, '[\"830533401Quang_Hai.jpg\",\"830533401Quang-Hai-hai3-1576687732-width781height960.jpg\"]', 'ád', 9, '2021-04-14 20:56:06', '2021-04-14 20:56:06'),
(35, 'boong', 12, 3, 3, 0, 0, '[\"364490140hinh-nen-may-tinh-11.jpg\",\"364490140vietnam.png\",\"364490140images.jpeg\"]', 'xczxc', 9, '2021-04-19 03:01:09', '2021-04-19 03:01:09'),
(36, 'sad', 56, 3, 2, 0, 0, '[\"131574205Quang_Hai.jpg\",\"131574205Quang-Hai-hai3-1576687732-width781height960.jpg\"]', 'ád', 9, '2021-04-19 03:04:37', '2021-04-19 03:04:37'),
(37, 'Nguyễn Quốc Cường', 12, 4, 4, 0, 0, '[\"889419132qkt04-quan-jogger-tui-hop-nu-xanh-den-1.jpg\",\"889419132default-avatar-profile-image-vector-social-media-user-icon-potrait-182347582.jpg\",\"889419132hinh-nen-may-tinh-11.jpg\"]', 'ádasd', 9, '2021-04-19 06:50:43', '2021-04-19 06:50:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rate_blog`
--

CREATE TABLE `rate_blog` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `blogId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rate_blog`
--

INSERT INTO `rate_blog` (`id`, `blogId`, `userId`, `rate`, `created_at`, `updated_at`) VALUES
(1, 4, 10, 4, '2021-04-05 05:22:33', '2021-04-05 05:22:33'),
(3, 4, 10, 3, '2021-04-05 06:24:34', '2021-04-05 06:24:34'),
(4, 4, 10, 4, '2021-04-05 06:28:37', '2021-04-05 06:28:37'),
(5, 4, 10, 5, '2021-04-05 06:31:56', '2021-04-05 06:31:56'),
(6, 4, 10, 5, '2021-04-05 06:32:00', '2021-04-05 06:32:00'),
(7, 4, 10, 5, '2021-04-05 06:32:03', '2021-04-05 06:32:03'),
(8, 4, 10, 5, '2021-04-05 06:32:05', '2021-04-05 06:32:05'),
(9, 4, 10, 5, '2021-04-05 06:32:07', '2021-04-05 06:32:07'),
(10, 4, 10, 4, '2021-04-05 06:36:01', '2021-04-05 06:36:01'),
(11, 4, 10, 2, '2021-04-05 06:41:23', '2021-04-05 06:41:23'),
(12, 4, 10, 4, '2021-04-05 06:42:22', '2021-04-05 06:42:22'),
(13, 4, 10, 3, '2021-04-05 06:42:22', '2021-04-05 06:42:22'),
(14, 4, 10, 1, '2021-04-05 06:42:22', '2021-04-05 06:42:22'),
(15, 4, 10, 2, '2021-04-05 06:42:22', '2021-04-05 06:42:22'),
(16, 4, 10, 5, '2021-04-05 06:42:22', '2021-04-05 06:42:22'),
(17, 4, 10, 1, '2021-04-05 06:46:56', '2021-04-05 06:46:56'),
(18, 4, 10, 1, '2021-04-05 06:47:13', '2021-04-05 06:47:13'),
(19, 4, 10, 4, '2021-04-05 06:47:50', '2021-04-05 06:47:50'),
(20, 4, 10, 5, '2021-04-05 06:48:43', '2021-04-05 06:48:43'),
(21, 1, 10, 4, '2021-04-05 07:11:51', '2021-04-05 07:11:51'),
(22, 1, 10, 2, '2021-04-05 07:12:02', '2021-04-05 07:12:02'),
(23, 1, 9, 5, '2021-04-05 20:55:31', '2021-04-05 20:55:31'),
(24, 3, 10, 4, '2021-04-06 09:32:55', '2021-04-06 09:32:55'),
(25, 3, 10, 3, '2021-04-06 09:33:12', '2021-04-06 09:33:12'),
(26, 1, 9, 1, '2021-04-11 07:40:26', '2021-04-11 07:40:26'),
(27, 1, 9, 1, '2021-04-11 07:40:42', '2021-04-11 07:40:42'),
(28, 1, 9, 1, '2021-04-11 07:40:46', '2021-04-11 07:40:46'),
(29, 1, 9, 5, '2021-04-11 07:40:52', '2021-04-11 07:40:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idCountry` int(11) DEFAULT NULL,
  `level` bigint(20) UNSIGNED NOT NULL DEFAULT 1 COMMENT '1:admin 0:member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `address`, `avatar`, `idCountry`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, '$2y$10$zLPWeTMYWY4ROPfsELPl8uxh2lspagKP3Wa9cAX0G9KYs3nuBKhMm', '0905817943', 'Nguyễn Minh Châu', 'Nơi_này_có_anh_-_Single_Cover.jpg', 3, 1, NULL, '2021-03-26 07:19:21', '2021-03-31 06:03:24'),
(3, 'Nguyễn Quốc Cường2', 'user1@gmail.com', NULL, '$2y$10$X8ahnJK4zCmiVj5p0GgZje9HwGUszERM177EDyPW.1oRBArtu6n7O', NULL, NULL, 'Quang_Hai.jpg', 3, 1, NULL, '2021-03-29 06:30:30', '2021-03-29 07:36:54'),
(4, 'Nguyễn Quốc Cường', 'user2@gmail.com', NULL, '$2y$10$ql9/lYXnLhM5e/3pPMxFEev13vnsShCBcVLx.m7m3Us4RptEtVade', NULL, NULL, 'default.jpg', 6, 1, NULL, '2021-03-29 06:33:30', '2021-03-29 06:33:30'),
(7, 'Nguyễn Quốc Cường', 'user3@gmail.com', NULL, '$2y$10$WGyGsJTDfB0PG5qOuoZs/elDydByWDT.DZgQNqANY5KfqLKXOSzr.', NULL, NULL, NULL, NULL, 0, NULL, '2021-04-04 02:11:26', '2021-04-04 02:11:26'),
(9, 'Nguyễn Quốc Cường', 'a@gmail.com', NULL, '$2y$10$z1GUGH.RABU2qjPCKBgvWOHX33CkKqoGKMVLCEesj8WGJJBO4ceS.', '090581794223', 'kp5-p1', 'Quang_Hai.jpg', 4, 0, NULL, '2021-04-04 02:35:17', '2021-04-09 22:47:26'),
(10, 'Nguyễn Quốc Đạt', 'b@gmail.com', NULL, '$2y$10$9LeLI0JTVH/kGetX93krUOofCaZ/ZobRG2sGRDZG0tfnP9b6OXfFq', '0905817942', NULL, 'default.jpg', 3, 0, NULL, '2021-04-04 04:17:53', '2021-04-11 03:08:04'),
(11, 'Nguyễn Quốc Cường', 'user4@gmail.com', NULL, '$2y$10$Nn8gNLMotKsG55psQ3kPKOd6cwdy6PplR.9IsnLiZDi0No7biUaXK', NULL, NULL, 'default.jpg', NULL, 0, NULL, '2021-04-15 22:31:16', '2021-04-15 22:31:16');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `cmt_blog`
--
ALTER TABLE `cmt_blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rate_blog`
--
ALTER TABLE `rate_blog`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `cmt_blog`
--
ALTER TABLE `cmt_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history`
--
ALTER TABLE `history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `rate_blog`
--
ALTER TABLE `rate_blog`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
