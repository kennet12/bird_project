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
-- Table structure for table `m_order`
--

CREATE TABLE `m_order` (
  `id` bigint(20) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `message` text,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `updated_by` bigint(20) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_order`
--

INSERT INTO `m_order` (`id`, `fullname`, `email`, `phone`, `address`, `message`, `status`, `updated_by`, `created_date`, `updated_date`) VALUES
(2, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:08:58', NULL),
(3, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:10:11', NULL),
(4, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:11:30', NULL),
(5, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:13:56', NULL),
(6, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:14:06', NULL),
(7, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:15:13', NULL),
(8, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:17:51', NULL),
(9, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:17:56', NULL),
(10, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:18:39', NULL),
(11, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:18:43', NULL),
(12, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:20:12', NULL),
(13, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:21:30', NULL),
(14, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:21:54', NULL),
(15, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:23:02', NULL),
(16, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:24:24', NULL),
(17, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:26:32', NULL),
(18, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:27:24', NULL),
(19, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:28:26', NULL),
(20, 'Duy Anh Phan', 'nevermorepda1@gmail.com', '+841259322224', 'VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad', '', 0, 0, '2023-04-20 21:32:47', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_order`
--
ALTER TABLE `m_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_order`
--
ALTER TABLE `m_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
