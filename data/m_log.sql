-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2023 at 05:50 PM
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
  `status` varchar(11) DEFAULT NULL,
  `log_tbl` varchar(225) DEFAULT NULL,
  `content_old` text,
  `content` text,
  `updated_by` bigint(20) NOT NULL DEFAULT '0',
  `created_date` datetime DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `m_log`
--

INSERT INTO `m_log` (`id`, `status`, `log_tbl`, `content_old`, `content`, `updated_by`, `created_date`, `updated_date`) VALUES
(1, 'ADD', 'm_partner', NULL, '{\"name\":\"danh muc 1\",\"url\":\"danh-muc-1\",\"active\":\"1\",\"banner\":\".\\/files\\/upload\\/image\\/partner\\/\\/16786385948152.jpg\",\"created_date\":\"2023-03-28 21:55:54\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 21:55:54\"}', 1, '2023-03-28 21:55:54', '2023-03-28 21:55:54'),
(2, 'ADD', 'm_content_gallery', NULL, '{\"content_id\":14,\"stt\":0,\"thumbnail\":\"\\/files\\/upload\\/image\\/content\\/14\\/16786385948152.jpg\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 21:57:26\"}', 1, '2023-03-28 21:57:26', '2023-03-28 21:57:26'),
(3, 'ADD', 'm_content_gallery', NULL, '{\"content_id\":14,\"stt\":1,\"thumbnail\":\"\\/files\\/upload\\/image\\/content\\/14\\/thanh-bach.jpg\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 21:57:26\"}', 1, '2023-03-28 21:57:26', '2023-03-28 21:57:26'),
(4, 'ADD', 'm_contents', NULL, '{\"title\":\"tin tuc 1\",\"alias\":\"tin-tuc-1\",\"category_id\":\"1\",\"description\":\"dsadsadsadsa\",\"active\":\"0\",\"content\":\"<p>ahiahi<\\/p>\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 21:57:26\"}', 1, '2023-03-28 21:57:26', '2023-03-28 21:57:26'),
(5, 'UPDATE', 'm_contents', '{\"id\":\"14\",\"title\":\"tin tuc 1\",\"alias\":\"tin-tuc-1\",\"thumbnail\":null,\"category_id\":\"1\",\"description\":\"dsadsadsadsa\",\"content\":\"<p>ahiahi<\\/p>\",\"view_num\":\"0\",\"active\":\"0\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"deleted\":\"0\"}', '{\"title\":\"tin tuc 2\",\"alias\":\"tin-tuc-1\",\"category_id\":\"2\",\"description\":\"dsadsadsadsa\",\"active\":\"0\",\"content\":\"<p>ahiahi<\\/p>\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 22:06:10\"}', 1, '2023-03-28 22:06:10', '2023-03-28 22:06:10'),
(6, 'DELETE', 'm_contents', '{\"id\":\"14\",\"title\":\"tin tuc 1\",\"alias\":\"tin-tuc-1\",\"thumbnail\":null,\"category_id\":\"1\",\"description\":\"dsadsadsadsa\",\"content\":\"<p>ahiahi<\\/p>\",\"view_num\":\"0\",\"active\":\"0\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"deleted\":\"0\"}', NULL, 1, '2023-03-28 22:13:07', '2023-03-28 22:13:07'),
(7, 'DELETE', 'm_product', '{\"id\":\"49\",\"title\":\"m\\u1ee1 c\\u00e1 bi\\u1ec3n\",\"alias\":\"mo-ca-bien\",\"thumbnail\":\"\\/files\\/upload\\/image\\/product\\/M%E1%BB%A1%20c%C3%A1%20Bi%E1%BB%83n.jpg\",\"price\":\"\",\"qty\":\"3\",\"check_bold\":\"0\",\"category_id\":\"12\",\"description\":\"\",\"content\":\"\",\"view_num\":\"0\",\"active\":\"0\",\"created_date\":\"2020-11-25 11:36:03\",\"updated_date\":\"2020-11-25 11:36:11\",\"updated_by\":\"1\",\"deleted\":\"0\"}', NULL, 1, '2023-03-28 22:16:56', '2023-03-28 22:16:56'),
(8, 'DELETE', 'm_content_gallery', '{\"id\":\"4\",\"content_id\":\"10\",\"thumbnail\":\"\\/files\\/upload\\/image\\/content\\/14\\/16786385948152.jpg\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"stt\":\"0\"}', NULL, 1, '2023-03-28 22:19:14', '2023-03-28 22:19:14'),
(9, 'DELETE', 'm_content_gallery', '{\"id\":\"5\",\"content_id\":\"10\",\"thumbnail\":\"\\/files\\/upload\\/image\\/content\\/14\\/thanh-bach.jpg\",\"created_date\":\"2023-03-28 21:57:26\",\"updated_date\":\"2023-03-28 21:57:26\",\"updated_by\":\"1\",\"stt\":\"1\"}', NULL, 1, '2023-03-28 22:19:14', '2023-03-28 22:19:14'),
(10, 'DELETE', 'm_contents', '{\"id\":\"10\",\"title\":\"Gi\\u00e1 b\\u1ed9t c\\u00e1 Peru t\\u0103ng l\\u00ean \\u0111\\u1ebfn 2.400 USD\\/t\\u1ea5n\",\"alias\":\"gia-bot-ca-peru-tang-len-den-2-400-usd-tan\",\"thumbnail\":\"\\/daucalxag\\/files\\/upload\\/image\\/tin-tuc\\/tin-te635512048589775454.jpg\",\"category_id\":\"1\",\"description\":\"\",\"content\":\"<h2 class=\\\"txtDescNewDetail\\\"><span style=\\\"font-size: 18pt;\\\">Gi&aacute; b\\u1ed9t c&aacute; t\\u1eeb Peru \\u0111&atilde; t\\u0103ng m\\u1ea1nh do ngu\\u1ed3n cung khan hi\\u1ebfm. Sau khi Vi\\u1ec7n nghi&ecirc;n c\\u1ee9u h&agrave;ng h\\u1ea3i P&ecirc;ru (Imarpe) \\u0111&igrave;nh ch\\u1ec9 \\u0111&aacute;nh b\\u1eaft c&aacute; c\\u01a1m trong v\\u1ee5 2, gi&aacute; b\\u1ed9t c&aacute; ph\\u1ea9m c\\u1ea5p cao nh\\u1ea5t \\u0111&atilde; \\u0111\\u1ea1t 2.400 USD\\/ t\\u1ea5n (gi&aacute; FOB t\\u1ea1i Peru). Gi\\u1eefa th&aacute;ng 10, gi&aacute; m\\u1edbi d\\u1eebng \\u1edf m\\u1ee9c 2.100 USD\\/t\\u1ea5n.<\\/span><\\/h2>\\r\\n<p style=\\\"font-weight: 400;\\\">Tr\\u01b0\\u1edbc khi h\\u1ed9i ngh\\u1ecb IFFO, 40.000 t\\u1ea5n \\u0111&atilde; \\u0111\\u01b0\\u1ee3c b&aacute;n ra \\u1edf m\\u1ee9c 2.100 USD\\/ t\\u1ea5n cho lo\\u1ea1i ph\\u1ea9m c\\u1ea5p cao nh\\u1ea5t v&agrave; 1.950 USD \\/ t\\u1ea5n \\u0111\\u1ed1i v\\u1edbi lo\\u1ea1i ti&ecirc;u chu\\u1ea9n. Trong h\\u1ed9i ngh\\u1ecb, \\u0111&atilde; c&oacute; giao d\\u1ecbch cho 10.000 t\\u1ea5n, v\\u1edbi gi&aacute; 2.300 USD\\/ t\\u1ea5n cho lo\\u1ea1i ph\\u1ea9m c\\u1ea5p cao nh\\u1ea5t v&agrave; 2.100 USD\\/ t\\u1ea5n \\u0111\\u1ed1i v\\u1edbi lo\\u1ea1i ti&ecirc;u chu\\u1ea9n. Cho \\u0111\\u1ebfn th&aacute;ng 5\\/2015, Peru s\\u1ebd kh&ocirc;ng c&oacute; ngu\\u1ed3n b\\u1ed9t c&aacute;. Do ngu\\u1ed3n cung h\\u1ea1n ch\\u1ebf n&ecirc;n c&oacute; h\\u1ed3 s\\u01a1 d\\u1ef1 th\\u1ea7u t\\u0103ng \\u0111\\u1ebfn m\\u1ee9c 2.400 USD\\/ t\\u1ea5n cho lo\\u1ea1i ph\\u1ea9m c\\u1ea5p cao nh\\u1ea5t.&nbsp;<\\/p>\\r\\n<p style=\\\"font-weight: 400;\\\"><strong>Tri\\u1ec3n v\\u1ecdng \\u1ea3m \\u0111\\u1ea1m<\\/strong><\\/p>\\r\\n<p style=\\\"font-weight: 400;\\\">T\\u1ea1i h\\u1ed9i ngh\\u1ecb IFFO, Hi\\u1ec7p h\\u1ed9i Th\\u1ee7y s\\u1ea3n Qu\\u1ed1c gia Peru cho bi\\u1ebft, s\\u1ebd kh\\u1ea3o s&aacute;t tr\\u1eef l\\u01b0\\u1ee3ng c&aacute; c\\u01a1m trong n\\u1eeda \\u0111\\u1ea7u th&aacute;ng 12. Hai ph\\u01b0\\u01a1ng ph&aacute;p \\u0111\\u01b0\\u1ee3c &aacute;p d\\u1ee5ng l&agrave; kh\\u1ea3o s&aacute;t trong 1 th&aacute;ng v&agrave; c&acirc;u th\\u1eed nghi\\u1ec7m trong 2 ng&agrave;y. V\\u1ec1 ph\\u01b0\\u01a1ng ph&aacute;p c&acirc;u th\\u1eed nghi\\u1ec7m, th\\u1eddi \\u0111i\\u1ec3m n&agrave;y kh&oacute; c&oacute; th\\u1ec3 \\u0111\\u1ea1t \\u0111\\u01b0\\u1ee3c k\\u1ebft qu\\u1ea3 cao.<\\/p>\\r\\n<p style=\\\"font-weight: 400;\\\">Gi&aacute;&nbsp;&nbsp;t\\u0103ng cao khi\\u1ebfn ng\\u01b0\\u1eddi mua b\\u1ed9t c&aacute; Trung Qu\\u1ed1c ph\\u1ea3i t&igrave;m ngu\\u1ed3n thay th\\u1ebf. \\u0110\\u1ed1i v\\u1edbi d\\u1ea7u c&aacute;, ngu\\u1ed3n cung c\\u1ea5p l&agrave; m\\u1ed9t v\\u1ea5n \\u0111\\u1ec1 l\\u1edbn.<\\/p>\\r\\n<p style=\\\"font-weight: 400;\\\">Trong v\\u1ee5 c&aacute; c\\u01a1m \\u0111\\u1ea7u ti&ecirc;n c\\u1ee7a Peru trong n\\u0103m nay, s\\u1ea3n l\\u01b0\\u1ee3ng ch\\u1ec9 \\u0111\\u1ea1t 1,7 tri\\u1ec7u t\\u1ea5n trong khi TAC cho v\\u1ee5 n&agrave;y l&agrave; 2,53 tri\\u1ec7u t\\u1ea5n. V\\u1edbi l\\u01b0\\u1ee3ng n&agrave;y, s\\u1ebd s\\u1ea3n xu\\u1ea5t \\u0111\\u01b0\\u1ee3c kho\\u1ea3ng 380.000 t\\u1ea5n b\\u1ed9t c&aacute;, th\\u1ea5p h\\u01a1n so v\\u1edbi c&aacute;c n\\u0103m tr\\u01b0\\u1edbc. Do hi\\u1ec7n t\\u01b0\\u1ee3ng El Nino, s\\u1ea3n l\\u01b0\\u1ee3ng \\u0111&aacute;nh b\\u1eaft v\\u1ee5 sau n\\u0103m 2014 s\\u1ebd \\u0111\\u1ea1t kho\\u1ea3ng 1,45 tri\\u1ec7u t\\u1ea5n.<\\/p>\",\"view_num\":\"447\",\"active\":\"1\",\"created_date\":\"2020-10-13 21:22:32\",\"updated_date\":\"2020-10-13 21:22:32\",\"updated_by\":\"1\",\"deleted\":\"0\"}', NULL, 1, '2023-03-28 22:19:14', '2023-03-28 22:19:14'),
(11, 'UPDATE', 'm_user', '{\"id\":\"4\",\"user_type\":\"0\",\"email\":\"nevermorepda6@gmail.com\",\"password\":\"3d186804534370c3c817db0563f0e461\",\"password_text\":\"321321\",\"gender\":\"1\",\"title\":null,\"fullname\":\"Nguy\\u1ec5n m\\u1ea1nh ti\\u1ec1n\",\"birthday\":null,\"phone\":null,\"address\":null,\"country\":\"0\",\"city\":null,\"state\":null,\"zipcode\":null,\"vip_level\":\"0\",\"uid\":null,\"provider\":\"visa\",\"avatar\":null,\"active\":\"1\",\"deleted\":\"0\",\"created_date\":\"2017-10-19 16:35:09\",\"updated_date\":\"2017-10-19 16:42:12\",\"updated_by\":\"1\",\"last_activity\":null,\"client_ip\":null}', '{\"fullname\":\"Phan Duy Anh\",\"phone\":\"0859322224\",\"address\":\"11\\/33 Nguyen Huu Tien\",\"gender\":\"1\",\"active\":\"1\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 22:21:04\"}', 1, '2023-03-28 22:21:04', '2023-03-28 22:21:04'),
(12, 'UPDATE', 'm_user', '{\"id\":\"3\",\"user_type\":\"-1\",\"email\":\"nevermorepda5@gmail.com\",\"password\":\"3d186804534370c3c817db0563f0e461\",\"password_text\":\"321321\",\"gender\":\"1\",\"title\":null,\"fullname\":\"Nguy\\u1ec5n ho\\u00e0ng nam\",\"birthday\":null,\"phone\":null,\"address\":null,\"country\":\"0\",\"city\":null,\"state\":null,\"zipcode\":null,\"vip_level\":\"0\",\"uid\":null,\"provider\":\"visa\",\"avatar\":null,\"active\":\"1\",\"deleted\":\"0\",\"created_date\":\"2017-10-19 16:27:55\",\"updated_date\":\"2017-10-19 16:27:55\",\"updated_by\":\"2\",\"last_activity\":null,\"client_ip\":null}', '{\"fullname\":\"Nguy\\u1ec5n ho\\u00e0ng nam 1\",\"phone\":\"+841259322224\",\"address\":\"VIETNAM EVISA SERVICE S4-S5 Ba Vi Ward 15, District 10, dsadsad\",\"gender\":\"1\",\"active\":\"1\",\"updated_by\":\"1\",\"updated_date\":\"2023-03-28 22:23:23\"}', 1, '2023-03-28 22:23:23', '2023-03-28 22:23:23');

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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
