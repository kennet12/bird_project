-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2023 at 04:41 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bird_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_order_detail`
--

CREATE TABLE `m_order_detail` (
  `id` bigint(29) NOT NULL,
  `order_id` bigint(20) NOT NULL DEFAULT '0',
  `product_id` bigint(29) NOT NULL DEFAULT '0',
  `qty` tinyint(4) NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `name` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `updated_by` bigint(29) DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_order_detail`
--

INSERT INTO `m_order_detail` (`id`, `order_id`, `product_id`, `qty`, `price`, `name`, `thumbnail`, `updated_by`, `created_date`, `updated_date`) VALUES
(3, 3, 49, 20, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:10:11', NULL),
(4, 3, 48, 20, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:10:11', NULL),
(5, 4, 49, 20, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:11:30', NULL),
(6, 4, 48, 20, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:11:30', NULL),
(7, 5, 49, 20, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:13:56', NULL),
(8, 5, 48, 20, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:13:56', NULL),
(9, 6, 49, 20, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:14:06', NULL),
(10, 6, 48, 20, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:14:06', NULL),
(11, 7, 49, 20, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:15:13', NULL),
(12, 7, 48, 20, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:15:13', NULL),
(13, 8, 48, 1, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:17:51', NULL),
(14, 9, 48, 1, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:17:56', NULL),
(15, 10, 48, 1, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:18:39', NULL),
(16, 11, 48, 1, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:18:43', NULL),
(17, 12, 49, 1, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:20:12', NULL),
(18, 13, 49, 2, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:21:31', NULL),
(19, 14, 49, 2, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:21:54', NULL),
(20, 15, 49, 1, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:23:03', NULL),
(21, 16, 49, 1, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:24:24', NULL),
(22, 17, 49, 2, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:26:32', NULL),
(23, 18, 48, 2, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:27:24', NULL),
(24, 19, 48, 2, 160000, 'mỡ cá biển', '/files/upload/image/product/48/banner-danh-muc-dohavi.jpeg', 0, '2023-04-20 21:28:26', NULL),
(25, 19, 49, 1, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:28:26', NULL),
(26, 20, 49, 2, 150000, 'mỡ cá biển 1', '/files/upload/image/product/49/691675.jpg', 0, '2023-04-20 21:32:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_order_detail`
--
ALTER TABLE `m_order_detail`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_order_detail`
--
ALTER TABLE `m_order_detail`
  MODIFY `id` bigint(29) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
