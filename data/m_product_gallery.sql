-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2023 at 05:10 PM
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
-- Table structure for table `m_product_gallery`
--

CREATE TABLE `m_product_gallery` (
  `id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL DEFAULT '0',
  `thumbnail` varchar(255) DEFAULT NULL,
  `stt` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_product_gallery`
--

INSERT INTO `m_product_gallery` (`id`, `product_id`, `thumbnail`, `stt`, `created_date`, `updated_date`, `updated_by`) VALUES
(29, 49, '/files/upload/image/product/49/thanh-bach.jpg', 3, '2023-03-17 22:18:07', '2023-03-17 22:18:07', 1),
(31, 49, '/files/upload/image/product/49/16786385948152.jpg', 0, '2023-03-17 22:57:41', '2023-03-17 22:57:41', 1),
(32, 49, '/files/upload/image/product/49/cach-lam-gio-cha-chay-deponline5.jpg', 1, '2023-03-17 23:01:51', '2023-03-17 23:01:51', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_product_gallery`
--
ALTER TABLE `m_product_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_product_gallery`
--
ALTER TABLE `m_product_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
