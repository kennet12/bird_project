-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2023 at 10:04 AM
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
-- Table structure for table `m_log`
--

CREATE TABLE `m_log` (
  `id` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_slider` bigint(20) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_by` bigint(20) NOT NULL,
  `item_log` varchar(255) NOT NULL,
  `previous_content` varchar(255) NOT NULL,
  `after_content` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_log`
--

INSERT INTO `m_log` (`id`, `id_user`, `id_slider`, `created_date`, `updated_date`, `updated_by`, `item_log`, `previous_content`, `after_content`) VALUES
(17, 1, 42, '2023-03-27 14:13:55', '2023-03-27 14:13:55', 1, 'slide', '', ''),
(18, 1, 42, '2023-03-27 14:17:45', '2023-03-27 14:17:45', 1, 'slide', '', ''),
(19, 1, 42, '2023-03-27 14:20:39', '2023-03-27 14:20:39', 1, 'slide', '', ''),
(20, 1, 42, '2023-03-27 14:21:50', '2023-03-27 14:21:50', 1, 'slide', '1234', ''),
(21, 1, 42, '2023-03-27 14:22:36', '2023-03-27 14:22:36', 1, 'slide', '1', ''),
(22, 1, 42, '2023-03-27 14:40:54', '2023-03-27 14:40:54', 1, 'slide', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_log`
--
ALTER TABLE `m_log`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_log`
--
ALTER TABLE `m_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
