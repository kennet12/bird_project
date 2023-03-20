-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 20, 2023 lúc 03:53 CH
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bird_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_content_gallery`
--

CREATE TABLE `m_content_gallery` (
  `id` bigint(20) NOT NULL,
  `content_id` bigint(20) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL,
  `updated_by` varchar(255) NOT NULL,
  `stt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_content_gallery`
--

INSERT INTO `m_content_gallery` (`id`, `content_id`, `thumbnail`, `created_date`, `updated_date`, `updated_by`, `stt`) VALUES
(3, 9, '/files/upload/image/content/9/336373509-583574583736815-7225694277218807955-n.jpg', '2023-03-20 20:26:54', '2023-03-20 20:26:54', '1', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_content_gallery`
--
ALTER TABLE `m_content_gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `m_content_gallery`
--
ALTER TABLE `m_content_gallery`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
