-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 07, 2023 lúc 08:20 AM
-- Phiên bản máy phục vụ: 5.7.31
-- Phiên bản PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `csduyandy_db`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_contact`
--

CREATE TABLE `m_contact` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `content` text,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_contact`
--

INSERT INTO `m_contact` (`id`, `name`, `email`, `phone`, `content`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'phan duy anh', 'nevermorepda1@gmail.com', '01259322224', 'tui mun gửi tien', '2020-10-13 14:22:32', '2020-10-15 04:17:43', 1, 1),
(2, 'phan duy anh', 'nevermorepda1@gmail.com', '01259322224', 'tui mun gửi tien', '2020-10-13 14:22:32', '2020-10-15 04:17:43', 1, 1),
(3, 'phan duy anh', 'nevermorepda1@gmail.com', '01259322224', 'toi la phan duy anh', '2020-10-13 14:22:32', '2020-10-15 04:17:44', 1, 1),
(4, 'Mono Marketplace Team', 'business@monomarketplace.com', '0000000000', 'Gửi đến những ai quan tâm,<br />\nTôi đang liên hệ với bạn thay mặt cho Mono Marketplace. <br />\n<br />\nChúng tôi là một nền tảng thương mại điện tử B2B trực tuyến để giúp các nhà sản xuất ASEAN có được khách hàng từ Nhật Bản. Chúng tôi tin rằng công ty của bạn có các sản phẩm & dịch vụ rất thú vị để được xuất bản trên trang web của chúng tôi và tăng doanh thu kinh doanh của bạn.<br />\n<br />\nhttps://businesshub.monomarketplace.com/membership-information/<br />\n<br />\nMở rộng hoạt động kinh doanh của bạn mà không cần đầu tư và thu hút các khách hàng tiềm năng của bạn ở Nhật Bản.<br />\n<br />\nBạn có thể bắt đầu đăng ký tại đây:<br />\n<br />\nhttps://www.monomarketplace.com/register/<br />\n<br />\nTrân trọng,<br />\nMono Marketplace Team', '2021-03-22 01:56:52', '0000-00-00 00:00:00', 0, 0),
(5, 'Lê Tấn Thịnh', 'thinh.lt1989@gmail.com', '0909417885', 'Dear anh chị<br />\n<br />\nEm tên Thịnh - Cty APT. Bên em là cty xuất khẩu thủy sản, hiện tại khách hàng bên Nhật của bên em có nhu cầu nhập sản phẩm bột cá dành cho chăn nuôi<br />\n<br />\nEm tìm thông tin thì biết qua công ty mình<br />\n<br />\nAnh chị cho em xin thông tin về sản phẩm, giá, số lượng tối thiểu cho phép để xúc tiến tiếp với bên Nhật!<br />\nMong tin anh chị<br />\n<br />\nThịnh 0909417885', '2021-05-25 08:35:04', '0000-00-00 00:00:00', 0, 0),
(6, 'Trần Long AN', '2137909817@qq.com', '0948379186', 'Muốn mua dầu cá biển số lượng trăm tấn/ tháng ', '2021-07-26 01:28:50', '0000-00-00 00:00:00', 0, 0),
(7, 'Dmitry Solyanik', 'import@ultrafish.ru', '+79099641739', 'Dear Sirs,<br />\nWe are one of the biggest fish companies in Russia. Our company is located in Moscow and St.Petersburg. we are working with many companies from Vietnam. We import products:<br />\nPangasius fillet, baby octopus, shrimps, tuna steaks and loins and so on.<br />\nWhat can you offer?<br />\nAs you are green from 18.10.2021.<br />\nThanks in advance! <br />\n', '2021-10-21 12:03:17', '0000-00-00 00:00:00', 0, 0),
(8, 'Denis Rusakov', 'import.holod2@ugrus.com', '+79182405461', 'Hello there! Intergrant LLC do import to Russia, please contact me about cooperation', '2021-11-11 07:59:10', '0000-00-00 00:00:00', 0, 0),
(9, 'Denis Rusakov', 'import.holod2@ugrus.com', '+79182405461', 'Hello there! Intergrant LLC do import to Russia, please contact me about cooperation', '2021-11-11 07:59:10', '0000-00-00 00:00:00', 0, 0),
(10, 'Denis Rusakov', 'import.holod2@ugrus.com', '+79182405461', 'Hello there! Intergrant LLC do import to Russia, please contact me about cooperation', '2021-11-11 07:59:45', '0000-00-00 00:00:00', 0, 0),
(11, 'Lina (Marine-import Ltd.)', 'fishimpexp3@gmail.com', 'Inquiry on pangasius ', 'Dear Sir or Madam, I would highly appreciate if you could offer pangasius fillets, hgt (white and pink) IQF size 220 gr glaze 5% deliveried to Saint-Petersburg, Russia. ', '2021-11-17 08:30:25', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_contents`
--

CREATE TABLE `m_contents` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `view_num` bigint(20) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_contents`
--

INSERT INTO `m_contents` (`id`, `title`, `alias`, `thumbnail`, `category_id`, `description`, `content`, `view_num`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'DẦU ĂN TỪ MỠ CÁ - THAY ĐỔI TẦM VÓC VIỆT', 'dau-an-tu-mo-ca--thay-doi-tam-voc-viet', '/daucalxag/files/upload/image/tin-tuc/dau-ca-1_jmlg.jpg', 2, 'Nhắc đến dầu cá, đa số mọi người đều nghĩ ngay đến những viên thuốc bổ sung các loại vitamin A, E; omega 3-6-9; DHA… Để thay đổi suy nghĩ và mang lại một lượng vi chất dinh dưỡng thay đổi tầm vóc Việt đã có một sản phẩm dầu ăn chiết xuất từ mỡ cá mang tên', '<div id=\"printable\">\r\n<div class=\"contentdetail clearall\">\r\n<p>V&ugrave;ng ĐBSCL mỗi năm cung cấp ra thị trường sản lượng mỡ c&aacute; tra kh&ocirc;ng dưới 140.000 tấn nhưng được d&ugrave;ng l&agrave;m nguy&ecirc;n liệu cho c&ocirc;ng nghiệp chế biến thức ăn gia s&uacute;c, sản xuất dầu biodiesel v&agrave; xuất khẩu th&ocirc; với gi&aacute; b&aacute;n thấp. Trong khi Việt Nam đang chi h&agrave;ng tỉ USD mỗi năm để nhập khẩu dầu thực vật v&agrave; nhu cầu n&agrave;y ng&agrave;y c&agrave;ng gia tăng.</p>\r\n<p>C&ocirc;ng nghệ chế biến mỡ c&aacute; th&agrave;nh dầu ăn đ&atilde; được nhiều doanh nghiệp thử nghiệm trước đ&oacute;, tuy nhi&ecirc;n, do kh&ocirc;ng khử được m&ugrave;i tanh của c&aacute; trong dầu n&ecirc;n c&ograve;n bỏ ngỏ. Tr&ecirc;n thế giới, người ta chủ yếu sản xuất vi&ecirc;n dầu c&aacute; dạng thuốc để bổ sung vi chất dinh dưỡng, chứ chưa c&oacute; sản phẩm dầu c&aacute; được sử dụng như thực phẩm hằng ng&agrave;y.</p>\r\n<p>Nhận thấy điều n&agrave;y, &ocirc;ng L&ecirc; Thanh Thuấn, Chủ tịch HĐQT Tập đo&agrave;n Sao Mai, c&ugrave;ng c&aacute;c cộng sự đ&atilde; đi nhiều quốc gia để t&igrave;m hiểu c&ocirc;ng nghệ. Từ ph&ograve;ng th&iacute; nghiệm tiến tới sản xuất thực tế l&agrave; cả một qu&aacute; tr&igrave;nh t&igrave;m t&ograve;i, thay đổi. Loại bỏ những phương ph&aacute;p chế biến thủ c&ocirc;ng sau hơn 2 năm khảo s&aacute;t (năm 2010), Tập đo&agrave;n Sao Mai ch&iacute;nh thức k&yacute; hợp đồng trị gi&aacute; 15 triệu USD với Tập đo&agrave;n Desmet Balesstra (Bỉ) để nhập khẩu c&ocirc;ng nghệ v&agrave; thiết bị cho nh&agrave; m&aacute;y tinh luyện dầu c&aacute;. Với tổng diện t&iacute;ch gần 4 ha, nh&agrave; m&aacute;y tinh luyện dầu c&aacute; cao cấp Sao Mai tọa lạc tại x&atilde; B&igrave;nh Th&agrave;nh, huyện Lấp V&ograve;, tỉnh Đồng Th&aacute;p; c&ocirc;ng suất giai đoạn 1 l&agrave; 100 tấn nguy&ecirc;n liệu/ng&agrave;y, tổng gi&aacute; trị đầu tư hơn 400 tỉ đồng.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"VCSortableInPreviewMode\">\r\n<div><img id=\"img_e63cb760-c5da-11e6-8431-abecdbba0613\" src=\"http://nld.vcmedia.vn/2016/chot-1482145460703.jpg\" alt=\"Quy tr&igrave;nh đ&oacute;ng tem nh&atilde;n được nh&acirc;n vi&ecirc;n kiểm tra kỹ lưỡng\" data-original=\"http://nld.vcmedia.vn/2016/chot-1482145460703.jpg\" /></div>\r\n<div class=\"PhotoCMS_Caption\">Quy tr&igrave;nh đ&oacute;ng tem nh&atilde;n được nh&acirc;n vi&ecirc;n kiểm tra kỹ lưỡng</div>\r\n</div>\r\n<p>&nbsp;</p>\r\n<p>Nh&agrave; m&aacute;y tinh luyện cho ra 2 th&agrave;nh phẩm l&agrave; dầu đặc (stearin) v&agrave; dầu lỏng (olein). Dầu đặc sẽ được cung cấp cho c&ocirc;ng nghiệp chế biến thực phẩm (m&igrave; ăn liền, kem, bơ, chocolate, b&aacute;nh ngọt&hellip;), c&ograve;n dầu lỏng th&igrave; ph&acirc;n phối ra thị trường dưới dạng dầu ăn cao cấp mang thương hiệu Ranee (d&ugrave;ng để chi&ecirc;n x&agrave;o), dầu dinh dưỡng d&agrave;nh cho trẻ em (bổ sung c&aacute;c loại vitamin, ax&iacute;t b&eacute;o kh&ocirc;ng no cần thiết cho sức khỏe). Đặc biệt, Sao Mai cũng sẽ cung cấp nguy&ecirc;n liệu cho c&aacute;c c&ocirc;ng ty dược phẩm để sản xuất dầu c&aacute; vi&ecirc;n omega 3-6-9.</p>\r\n<p>Sản phẩm dầu c&aacute; Ranee l&agrave; mắt x&iacute;ch v&ocirc; c&ugrave;ng quan trọng kết nối h&igrave;nh th&agrave;nh chuỗi kh&eacute;p k&iacute;n của quy tr&igrave;nh nu&ocirc;i v&agrave; chế biến ca tra, ba sa xuất khẩu. Việc tận dụng nguồn nguy&ecirc;n liệu phụ mỡ c&aacute; để tinh chế th&agrave;nh dầu Ranee l&agrave; lời giải cho b&agrave;i to&aacute;n n&acirc;ng cao chuỗi gi&aacute; trị sản xuất, chế biến, xuất khẩu con c&aacute; tra Việt Nam m&agrave; Sao Mai - An Giang vinh dự l&agrave; người đi ti&ecirc;n phong.</p>\r\n<p>TS-BS Trương Tuyết Mai, Viện Dinh dưỡng Quốc gia, cho biết một số nghi&ecirc;n cứu đ&atilde; chứng minh vai tr&ograve; của dầu c&aacute; gi&uacute;p cải thiện tr&iacute; nhớ v&agrave; tăng khả năng tập trung. Dầu c&aacute; cũng rất tốt cho phụ nữ mang thai v&agrave; trẻ nhỏ, gi&uacute;p cải thiện tr&iacute; th&ocirc;ng minh của trẻ&hellip; Với những t&iacute;nh năng ưu việt, việc tinh luyện sản phẩm dầu ăn từ c&aacute; tra của Tập đo&agrave;n Sao Mai được nhận định l&agrave; bước ngoặt tạo ra gi&aacute; trị mới cho c&aacute; tra (một đối tượng tiềm năng nhưng chưa ph&aacute;t huy được hết gi&aacute; trị).</p>\r\n<p>&nbsp;</p>\r\n<div id=\"ObjectBoxContent_1482145582570\" class=\"VCSortableInPreviewMode\" dir=\"center\" data-back=\"E6E6FA\" data-border=\"999\">\r\n<p><strong>Dầu ăn cao cấp Ranee&nbsp;</strong>- dầu ăn Việt được Viện Dinh dưỡng Quốc gia khuy&ecirc;n d&ugrave;ng.</p>\r\n<p><strong>Dầu ăn cao cấp Ranee</strong>&nbsp;l&agrave; sản phẩm của C&ocirc;ng ty Cổ phần Dầu c&aacute; ch&acirc;u &Aacute; - Tập đo&agrave;n Sao Mai. Ranee chiết xuất từ tinh dầu c&aacute; da trơn. Sản phẩm sử dụng c&ocirc;ng nghệ Desmet t&aacute;ch m&ugrave;i n&ecirc;n kh&ocirc;ng tanh.</p>\r\n<p><strong>Li&ecirc;n hệ hotline: 0673 680 997.</strong></p>\r\n<p><strong>Gia đ&igrave;nh gắn kết - Quanh năm l&agrave; Tết.&nbsp;</strong>Mừng Xu&acirc;n Đinh Dậu 2017, dầu ăn cao cấp Ranee tặng 1 ch&eacute;n sứ cao cấp khi mua hộp qu&agrave; Tết gồm 2 chai 950 ml.</p>\r\n</div>\r\n</div>\r\n<div class=\"authordetail\"><strong>Nhật Thương</strong></div>\r\n</div>', 715, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(2, 'Bổ sung vitamin A với dầu cá basa', 'bo-sung-vitamin-a-voi-dau-ca-basa', '/daucalxag/files/upload/image/product/dau-ca-basa.png', 2, '', '<div class=\"article__sapo\">Dầu c&aacute; basa l&agrave; một trong những nguồn bổ sung vitamin A dồi d&agrave;o. Vừa qua, Viện Dinh Dưỡng Quốc gia &ndash; Bộ Y tế phối hợp với Tập đo&agrave;n Sao Mai An Giang tổ chức Hội thảo khoa học &ldquo;Dầu c&aacute; v&agrave; sức khỏe&rdquo; v&agrave;o ng&agrave;y 08/10/2014. Trong hội thảo, c&aacute;c chuy&ecirc;n gia dinh dưỡng đ&atilde; đề cập rất cụ thể về lợi &iacute;ch của dầu c&aacute; đến sức khỏe.</div>\r\n<div class=\"article__sapo\">&nbsp;</div>\r\n<div class=\"article__body\">\r\n<p class=\"body-text\">Tại Hội thảo, TS.BS Trương Tuyết Mai - Viện dinh dưỡng Quốc gia cho biết, t&igrave;nh trạng thiếu dinh dưỡng v&agrave; vi chất tại Việt Nam tuy đ&atilde; c&oacute; nhiều tiến bộ hơn so với những năm trước nhưng nhiều người d&acirc;n vẫn chưa &yacute; thức được việc bổ sung đầy đủ dinh dưỡng v&agrave; vi chất, đặc biệt l&agrave; vitamin A trong bữa ăn h&agrave;ng ng&agrave;y. Vitamin A l&agrave; vi chất c&oacute; chức năng bảo tồn to&agrave;n vẹn tế b&agrave;o biểu m&ocirc;, hỗ trợ tăng trưởng v&agrave; tăng cường miễn dịch. Thiếu vitamin A c&oacute; thể g&acirc;y m&ugrave; l&ograve;a do kh&ocirc; lo&eacute;t gi&aacute;c mạc, k&igrave;m h&atilde;m sự ph&aacute;t triển tr&iacute; tuệ v&agrave; thể lực.</p>\r\n<p class=\"body-text\">Kết quả tổng điều tra dinh dưỡng to&agrave;n quốc năm 2013 cho thấy c&oacute; 25,9% trẻ dưới 5 tuổi bị suy dinh dưỡng thấp c&ograve;i. Trong đ&oacute;, t&igrave;nh trạng thiếu Vitamin A tiền l&acirc;m s&agrave;ng (vitamin A huyết thanh thấp, &lt; 0.70 mmol/L) ở trẻ em Việt Nam đang tr&ecirc;n mức 10%, l&agrave;m tăng nguy cơ mắc c&aacute;c bệnh nhiễm khuẩn, bệnh về mắt v&agrave; chậm lớn ở trẻ. V&igrave; vậy, việc bổ sung vitamin l&agrave; điều rất cần thiết. C&aacute;c chuy&ecirc;n gia dinh dưỡng khuy&ecirc;n rằng n&ecirc;n bổ sung thịt c&aacute;, c&aacute;c loại rau xanh như rau muống, rau ng&oacute;t, rau dền, h&agrave;nh l&aacute;, hẹ l&aacute;, rau thơm...; c&aacute;c loại củ quả c&oacute; h&agrave;m lượng caroten - tiền chất của vitamin A cao như gấc, c&agrave; rốt, đu đủ, xo&agrave;i ch&iacute;n... v&agrave;o bữa ăn h&agrave;ng ng&agrave;y.</p>\r\n<p class=\"body-text\">Ngo&agrave;i ra, d&ugrave;ng dầu c&aacute; để chế biến m&oacute;n ăn cũng l&agrave; một trong những giải ph&aacute;p hiệu quả để c&aacute;c b&agrave; nội trợ bổ sung vitamin A v&agrave;o khẩu phần ăn của c&aacute;c th&agrave;nh vi&ecirc;n trong gia đ&igrave;nh h&agrave;ng ng&agrave;y. Viện Dinh dưỡng quốc gia cũng c&ocirc;ng bố kết quả nghi&ecirc;n cứu về dầu c&aacute; được chiếc xuất từ c&aacute; basa l&agrave; một nguồn bổ sung nhiều th&agrave;nh phần dinh dưỡng tự nhi&ecirc;n rất qu&yacute; gi&aacute; đối với sức khỏe con người như c&aacute;c axit b&eacute;o kh&ocirc;ng no, Omega 3, 6, 9, c&aacute;c th&agrave;nh phần kho&aacute;ng vi lượng, vitamin E, EPA, DHA...</p>\r\n<p class=\"body-text\">Nghi&ecirc;n cứu khoa học cũng đ&atilde; chứng minh dầu c&aacute; l&agrave;m tăng nồng độ ho&oacute;c-m&ocirc;n adiponectin c&oacute; li&ecirc;n quan với độ nhạy insulin trong m&aacute;u. Nồng độ ho&oacute;c-m&ocirc;n n&agrave;y trong m&aacute;u cao hơn cũng li&ecirc;n quan với giảm nguy cơ mắc bệnh tim mạch v&agrave; n&oacute; đ&oacute;ng vai tr&ograve; quan trọng trong c&aacute;c qu&aacute; tr&igrave;nh t&aacute;c động đến chuyển h&oacute;a như điều chỉnh đường huyết, chuyển h&oacute;a chất b&eacute;o v&agrave; vi&ecirc;m. V&igrave; vậy, dầu c&aacute; c&ograve;n c&oacute; t&aacute;c dụng hỗ trợ như một loại thực phẩm chức năng, gi&uacute;p cải thiện sức khỏe của con người, gi&uacute;p ph&ograve;ng chống c&aacute;c bệnh tim mạch, ổn định dường huyết... Bạn c&oacute; thể sử dụng dầu c&aacute; để chế biến c&aacute;c loại thức ăn như c&aacute;c loại dầu thực vật.</p>\r\n<p class=\"body-text\"><strong>Huỳnh Ch&acirc;u</strong></p>\r\n<p class=\"body-text\">&nbsp;</p>\r\n</div>', 683, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(3, 'Dầu cá loại nào tốt nhất trên thị trường hiện nay?', 'dau-ca-loai-nao-tot-nhat-tren-thi-truong-hien-nay', '/daucalxag/files/upload/image/tin-tuc/0000888355_w240.png', 2, '', '<p><em>N&oacute;i đến thực phẩm chức năng n&oacute;i chung; ch&uacute;ng ta kh&ocirc;ng thể kh&ocirc;ng nhắc đến nước &Uacute;c v&igrave; xứ sở chuột t&uacute;i l&agrave; nơi c&oacute; thể sản xuất ra c&aacute;c vitamin, hay sản phẩm bổ sung sức khỏe c&oacute; chất lượng h&agrave;ng đầu thế giới. Hiện nay, với cương vị l&agrave; nh&atilde;n h&agrave;ng số 1 của &Uacute;c về sản xuất thực phẩm chức năng; Blackmores c&oacute; thể cho ra những vi&ecirc;n dầu c&aacute; chất lượng nhất; đ&aacute;p ứng đầy đủ lượng omega 3 m&agrave; ta cần h&agrave;ng ng&agrave;y. V&igrave; thế, ch&uacute;ng ta h&atilde;y t&igrave;m hiểu xem dầu c&aacute; loại n&agrave;o tốt nhất từ h&atilde;ng Blackmores qua b&agrave;i viết sau đ&acirc;y.&nbsp;</em></p>\r\n<h2>Dầu c&aacute; l&agrave; g&igrave;?</h2>\r\n<figure id=\"attachment_6629\" class=\"wp-caption aligncenter\"><img class=\"size-full wp-image-6629\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca.jpg\" alt=\"dầu c&aacute;\" width=\"495\" height=\"338\" />\r\n<figcaption class=\"wp-caption-text\">dầu c&aacute;</figcaption>\r\n</figure>\r\n<p>Dầu c&aacute; xuất ph&aacute;t từ c&aacute;c tế b&agrave;o dầu của c&aacute;. Những loại c&aacute; tốt nhất để lấy dầu l&agrave; c&aacute; nước lạnh, v&agrave; c&aacute; chứa nhiều dầu mỡ.</p>\r\n<p>Khi n&oacute;i đến việc ti&ecirc;u thụ dầu c&aacute;, bạn c&oacute; thể ăn n&oacute; trực tiếp từ c&aacute; biển hoặc từ một loại thuốc bổ sung dầu c&aacute;.</p>\r\n<p>Dầu c&aacute; l&agrave; một nguồn chứa nhiều chất b&eacute;o omega-3; c&ograve;n được gọi l&agrave; axit b&eacute;o &omega;-3 hoặc axit b&eacute;o n-3.&nbsp;Theo khoa học, omega-3s l&agrave; axit b&eacute;o kh&ocirc;ng b&atilde;o h&ograve;a đa, hoặc PUFAs.</p>\r\n<p>Cơ thể ch&uacute;ng ta c&oacute; thể tạo ra hầu hết c&aacute;c chất b&eacute;o cần thiết; nhưng ta kh&ocirc;ng thể tự tạo ra axit b&eacute;o omega-3.</p>\r\n<p>V&igrave; thế ch&uacute;ng ta cần phải ăn uống để bổ sung loại chất b&eacute;o quan trọng n&agrave;y.</p>\r\n<p>Khi n&oacute;i đến những chất b&eacute;o thiết yếu, ch&uacute;ng ta c&oacute; thể hấp thụ ch&uacute;ng từ c&aacute;c loại thực phẩm c&oacute; chứa omega-3 hoặc thuốc chức năng chứa omega-3.</p>\r\n<p>Dầu c&aacute; chứa hai PUFAs omega-3 rất quan trọng. Đ&oacute; l&agrave;&nbsp;axit docosahexaenoic (DHA) v&agrave; eicosapentaenoic acid (EPA).</p>\r\n<p>DHA v&agrave; EPA đ&ocirc;i khi được gọi l&agrave; omega-3 biển bởi v&igrave; ch&uacute;ng chủ yếu đến từ c&aacute;. Một số loại c&aacute; tốt nhất để lấy dầu c&aacute; bao gồm c&aacute; hồi, c&aacute; tr&iacute;ch, c&aacute; trắng, c&aacute; m&ograve;i v&agrave; c&aacute; cơm.</p>\r\n<h2>Dầu c&aacute; loại n&agrave;o tốt nhất?</h2>\r\n<p>Dầu c&aacute; l&agrave; một trong những thực phẩm chức năng phổ biến nhất trong những năm gần đ&acirc;y tại Việt Nam.</p>\r\n<p>Tuy nhi&ecirc;n, hiện nay c&oacute; qu&aacute; nhiều loại dầu c&aacute; tr&ecirc;n thị trường. Đa số l&agrave; nhập từ c&aacute;c nh&atilde;n h&agrave;ng từ nước ngo&agrave;i về; chủ yếu l&agrave; Mỹ v&agrave; &Uacute;c.</p>\r\n<p>Điều n&agrave;y c&oacute; thể l&agrave;m bạn bị m&ugrave; th&ocirc;ng tin; b&ecirc;n cạnh đ&oacute;, c&ograve;n nhiều h&agrave;ng thực phẩm chức năng c&ograve;n bị l&agrave;m giả nữa.</p>\r\n<p>V&igrave; thế, h&atilde;y để Xuất Xứ &Uacute;c giới thiệu với c&aacute;c bạn loại dầu c&aacute; từ h&atilde;ng Blackmores- h&atilde;ng vitamin số 1 của &Uacute;c hiện nay.</p>\r\n<p>Với hơn 100 năm trong ngh&agrave;nh, Blackmores đ&atilde; thay đổi rất nhiều để đ&aacute;p ứng c&aacute;c nhu cầu của người d&ugrave;ng. Điều m&agrave; những nh&agrave; cung cấp kh&aacute;c vẫn chưa thể theo kịp.</p>\r\n<p>Vậy dầu c&aacute; loại n&agrave;o tốt?</p>\r\n<p>Để trả lời c&acirc;u hỏi n&agrave;y, ch&uacute;ng ta h&atilde;y t&igrave;m hiểu qua c&aacute;c loại sản phẩm dầu c&aacute; từ h&atilde;ng Blackmores nh&eacute;.</p>\r\n<h2>Dầu c&aacute; Blackmores số 1 của &Uacute;c</h2>\r\n<p>Hiện tại Blackmores c&oacute; 6 loại dầu c&aacute; ch&iacute;nh như sau:</p>\r\n<ul>\r\n<li>Dầu c&aacute; thường 1000mg</li>\r\n<li>Dầu c&aacute; kh&ocirc;ng m&ugrave;i 1000mg</li>\r\n<li>Dầu c&aacute; kh&ocirc;ng m&ugrave;i vi&ecirc;n nhỏ 1000mg</li>\r\n<li>Dầu c&aacute; h&agrave;ng ng&agrave;y với lượng omega gấp đ&ocirc;i 1000mg</li>\r\n<li>Dầu c&aacute; với lượng omega gấp 3 1550mg</li>\r\n<li>Dấu c&aacute; glucosamine</li>\r\n</ul>\r\n<p>Nếu bạn c&ograve;n l&agrave; người mới t&igrave;m hiểu về dầu c&aacute;; bạn c&oacute; thể kh&ocirc;ng hiểu c&aacute;c loại dầu c&aacute; n&agrave;y c&oacute; t&aacute;c dụng g&igrave;. V&agrave; bạn cũng c&oacute; thể kh&ocirc;ng biết dầu c&aacute; loại n&agrave;o tốt hay loại n&agrave;o ph&ugrave; hợp với m&igrave;nh.</p>\r\n<p>Bạn y&ecirc;n t&acirc;m, n&oacute; kh&ocirc;ng kh&oacute; để biết m&igrave;nh n&ecirc;n uống loại dầu c&aacute; n&agrave;o đ&acirc;u.</p>\r\n<p>H&atilde;y để Xuất Xứ &Uacute;c gi&uacute;p bạn giải quyết vấn đề n&agrave;y một c&aacute;ch dễ hiểu nhất bằng c&aacute;ch ph&acirc;n biệt sự kh&aacute;c nhau của ch&uacute;ng.</p>\r\n<h3>1, Dầu c&aacute; thường 1000mg</h3>\r\n<figure id=\"attachment_6611\" class=\"wp-caption aligncenter\"><img class=\"wp-image-6611 size-thumbnail\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-blackmores-200-vien-280x280.jpg\" sizes=\"(max-width: 280px) 100vw, 280px\" srcset=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-blackmores-200-vien-280x280.jpg 280w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-blackmores-200-vien-400x400.jpg 400w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-blackmores-200-vien.jpg 450w\" alt=\"dầu c&aacute; blackmores 200 vi&ecirc;n\" width=\"280\" height=\"280\" />\r\n<figcaption class=\"wp-caption-text\">dầu c&aacute; blackmores 200 vi&ecirc;n</figcaption>\r\n</figure>\r\n<p>Điều đầu ti&ecirc;n khi mua dầu c&aacute;, c&aacute;c bạn c&oacute; thể nhận thấy rất r&otilde; mỗi loại dầu c&aacute; c&oacute; một một con số b&ecirc;n cạnh. V&iacute; dụ như loại dầu c&aacute; thường 1000mg; th&igrave; 1000mg ở đ&acirc;y c&oacute; nghĩa l&agrave; g&igrave;?</p>\r\n<p>1000mg tương đương với 1g: đ&acirc;y ch&iacute;nh l&agrave; trọng lượng của mỗi vi&ecirc;n dầu c&aacute;.</p>\r\n<p>Dầu c&aacute; thường 1000mg h&atilde;ng Blackmores c&oacute; loại 200 vi&ecirc;n. Mỗi vi&ecirc;n nang c&oacute; k&iacute;ch thước ti&ecirc;u chuẩn cỡ đốt ng&oacute;n tay &uacute;t.</p>\r\n<p>Khi ta sử dụng dầu c&aacute;, điều ta quan t&acirc;m nhất đ&oacute; ch&iacute;nh l&agrave; ta sẽ hấp thụ được bao nhi&ecirc;u lượng omega3 trong mỗi vi&ecirc;n. V&igrave; mục đ&iacute;ch ch&iacute;nh của ta l&agrave; nhận omega3 chứ kh&ocirc;ng phải l&agrave; chỉ ăn dầu c&aacute; m&agrave; phải kh&ocirc;ng n&agrave;o?</p>\r\n<p>Mỗi vi&ecirc;n dầu c&aacute; thường th&igrave; c&oacute; khoảng 300mg omega3. Vậy mỗi vi&ecirc;n dầu c&aacute; c&oacute; thể cung cấp cho bạn đủ lượng omega3 cần thiết mỗi ng&agrave;y kh&ocirc;ng?</p>\r\n<p>Điều n&agrave;y th&igrave; c&ograve;n phụ thuộc v&agrave;o bạn sử dụng dầu c&aacute; với mục đ&iacute;ch g&igrave;.</p>\r\n<p>Nếu bạn muốn sử dụng dầu c&aacute; để bổ sung omega3 h&agrave;ng ng&agrave;y cho sức khỏe của mắt, tim, v&agrave; n&atilde;o; h&atilde;y sử dụng 2 vi&ecirc;n mỗi ng&agrave;y.</p>\r\n<p>Như vậy bạn sẽ nhận được 600mg omega3 mỗi ng&agrave;y &ndash; đ&acirc;y l&agrave; lượng omega3 được khuyến nghị bởi c&aacute;c chuy&ecirc;n gia dinh dưỡng.</p>\r\n<p>Ngo&agrave;i ra, nếu bạn sử dụng dầu c&aacute; để trị vi&ecirc;m khớp. Bạn cần phải sử dụng nhiều lượng omega3 hơn.</p>\r\n<p>Bạn c&oacute; thể sử dụng tối đa 4 vi&ecirc;n &ndash; tức khoảng 1,200 omega3 mỗi ng&agrave;y.</p>\r\n<p>Link xem sản phẩm:&nbsp;<a href=\"https://xuatxuuc.com/san-pham/dau-ca-blackmores-fish-oil-1000mg-200-vien/\">Dầu c&aacute; thường 1000mg</a></p>\r\n<h3>2, Dầu c&aacute; kh&ocirc;ng m&ugrave;i 1000mg</h3>\r\n<figure id=\"attachment_6593\" class=\"wp-caption aligncenter\"><img class=\"wp-image-6593 size-thumbnail\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-fish-oil-khong-mui-blackmores-odourless-1000-400-vien-280x280.jpg\" sizes=\"(max-width: 280px) 100vw, 280px\" srcset=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-fish-oil-khong-mui-blackmores-odourless-1000-400-vien-280x280.jpg 280w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-fish-oil-khong-mui-blackmores-odourless-1000-400-vien.jpg 400w\" alt=\"Dầu c&aacute; fish oil kh&ocirc;ng m&ugrave;i Blackmores odourless 1000 400 vi&ecirc;n\" width=\"280\" height=\"280\" />\r\n<figcaption class=\"wp-caption-text\">Dầu c&aacute; fish oil kh&ocirc;ng m&ugrave;i Blackmores odourless 1000</figcaption>\r\n</figure>\r\n<p>Dầu c&aacute; odourless nghĩa l&agrave; dầu c&aacute; kh&ocirc;ng m&ugrave;i. Hiện Blackmores c&oacute; 3 loại dầu c&aacute; kh&ocirc;ng m&ugrave;i: Loại 200 vi&ecirc;n, 400 vi&ecirc;n, v&agrave; 500 vi&ecirc;n.</p>\r\n<p>Vậy, tại sao Blackmores lại ph&aacute;t triển loại dầu c&aacute; n&agrave;y cho người ti&ecirc;u d&ugrave;ng?</p>\r\n<p>Thật đơn giản !!!</p>\r\n<p>Dầu c&aacute; thường được chiết xuất từ những con c&aacute; lạnh từ biển đại dương. Những con c&aacute; n&agrave;y c&oacute; rất nhiều chất b&eacute;o.</p>\r\n<p>Khi nh&agrave; sản xuất &eacute;p những chất b&eacute;o n&agrave;y v&ocirc; th&agrave;nh vi&ecirc;n nang; th&igrave; ch&uacute;ng vẫn c&ograve;n giữ lại m&ugrave;i h&ocirc;i tanh của c&aacute;. Rất kh&oacute; cho những người kh&ocirc;ng quen với m&ugrave;i tanh của c&aacute; để uống những vi&ecirc;n dầu c&aacute; như vậy.</p>\r\n<p>Do đ&oacute;, Blackmores đ&atilde; sản xuất ra những vi&ecirc;n dầu c&aacute; kh&ocirc;ng m&ugrave;i.</p>\r\n<p>Blackmores đ&atilde; sử dụng hương vị tự nhi&ecirc;n vanila chanh để khử m&ugrave;i tanh của c&aacute;. V&igrave; thế, n&oacute; rất th&acirc;n thiện với người d&ugrave;ng m&agrave; kh&ocirc;ng lo c&aacute;c chất độc hại.</p>\r\n<p>Về k&iacute;ch thước v&agrave; lượng omega3 th&igrave; dầu c&aacute; kh&ocirc;ng m&ugrave;i ho&agrave;n to&agrave;n giống với dầu c&aacute; thường.</p>\r\n<p>Mỗi vi&ecirc;n nang 1000mg dầu c&aacute; kh&ocirc;ng m&ugrave;i chứa 300mg omega3.</p>\r\n<p>Trong đ&oacute; c&oacute;&nbsp;EPA 180mg v&agrave; DHA 120 mg</p>\r\n<p>C&aacute;c loại sản phẩm dầu c&aacute; kh&ocirc;ng m&ugrave;i Blackmores</p>\r\n<ul>\r\n<li><a href=\"https://xuatxuuc.com/san-pham/dau-ca-blackmores-khong-mui-200-vien/\">Dầu c&aacute; kh&ocirc;ng m&ugrave;i 200 vi&ecirc;n</a></li>\r\n<li><a href=\"https://xuatxuuc.com/san-pham/dau-ca-fish-oil-1000-400-vien/\">Dầu c&aacute; kh&ocirc;ng m&ugrave;i 400 vi&ecirc;n</a></li>\r\n<li><a href=\"https://xuatxuuc.com/san-pham/dau-ca-khong-mui-blackmores-1000mg-500-vien/\">Dầu c&aacute; kh&ocirc;ng m&ugrave;i 500 vi&ecirc;n</a></li>\r\n</ul>\r\n<p>Vậy dầu c&aacute; loại n&agrave;o tốt cho bạn: 200 vi&ecirc;n, 400 vi&ecirc;n, hay 500 vi&ecirc;n?</p>\r\n<p>Điều n&agrave;y th&igrave; phụ thuộc v&agrave;o bạn m&agrave; th&ocirc;i. Nếu bạn muốn tiết kiệm h&atilde;y mua dầu c&aacute; với số lượng lớn 500 vi&ecirc;n. Nếu bạn muốn sử dụng dầu c&aacute; trong một thời gian ngắn, chỉ sử dụng loại 200 vi&ecirc;n l&agrave; đủ.</p>\r\n<h3>3, Dầu c&aacute; kh&ocirc;ng m&ugrave;i vi&ecirc;n nhỏ 1000mg</h3>\r\n<figure id=\"attachment_6607\" class=\"wp-caption aligncenter\"><img class=\"wp-image-6607 size-thumbnail\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-khong-mui-vien-nho-400-vien-280x280.jpg\" sizes=\"(max-width: 280px) 100vw, 280px\" srcset=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-khong-mui-vien-nho-400-vien-280x280.jpg 280w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-khong-mui-vien-nho-400-vien-400x400.jpg 400w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-khong-mui-vien-nho-400-vien.jpg 450w\" alt=\"Dầu c&aacute; kh&ocirc;ng m&ugrave;i vi&ecirc;n nhỏ 400 vi&ecirc;n\" width=\"280\" height=\"280\" />\r\n<figcaption class=\"wp-caption-text\">Dầu c&aacute; kh&ocirc;ng m&ugrave;i vi&ecirc;n nhỏ</figcaption>\r\n</figure>\r\n<p>Đ&acirc;y l&agrave; sản phẩm được ph&aacute;t triển dựa tr&ecirc;n &yacute; kiến của kh&aacute;ch h&agrave;ng của Blackmores.</p>\r\n<p>Sau khi ph&aacute;t triển sản phẩm dầu c&aacute; kh&ocirc;ng m&ugrave;i nhằm thỏa m&atilde;n c&aacute;c kh&aacute;ch h&agrave;ng kh&ocirc;ng thể chịu được m&ugrave;i tanh của c&aacute;; Blackmores đ&atilde; ph&aacute;t triển th&ecirc;m sản phẩm dầu c&aacute; kh&ocirc;ng m&ugrave;i dạng vi&ecirc;n nhỏ.</p>\r\n<p>Tại sao Blackmores lại cho ra sản phẩm vi&ecirc;n nhỏ</p>\r\n<p>Chắc nhiều người cũng t&igrave;m ra được đ&aacute;p &aacute;n cho c&acirc;u hỏi n&agrave;y rồi. V&igrave; c&oacute; thể ch&iacute;nh bạn cũng cần những vi&ecirc;n dầu c&aacute; loại nhỏ.</p>\r\n<p>Khi m&agrave; nhiều người cảm thấy vi&ecirc;n dầu c&aacute; qu&aacute; to v&agrave; kh&oacute; nuốt dưới dạng vi&ecirc;n thường; bạn kh&ocirc;ng biết dầu c&aacute; loại n&agrave;o tốt th&igrave; đ&acirc;y l&agrave; giải ph&aacute;p ho&agrave;n hảo cho bạn.</p>\r\n<p>Dầu c&aacute; kh&ocirc;ng m&ugrave;i vi&ecirc;n nhỏ n&agrave;y c&oacute; lượng omega3 tương đương với loại kh&ocirc;ng m&ugrave;i</p>\r\n<p>Điều kh&aacute;c biệt lớn nhất chỉ l&agrave; k&iacute;ch thước nhỏ hơn gấp 2 lần vi&ecirc;n thường m&agrave; th&ocirc;i</p>\r\n<p>Xem sản phẩm:&nbsp;<a href=\"https://xuatxuuc.com/san-pham/odourless-fish-oil-mini-caps/\">dầu c&aacute; kh&ocirc;ng m&ugrave;i dạng vi&ecirc;n nhỏ</a></p>\r\n<h3>4, Dầu c&aacute; h&agrave;ng ng&agrave;y với lượng omega 3 gấp đ&ocirc;i</h3>\r\n<figure id=\"attachment_6617\" class=\"wp-caption aligncenter\"><img class=\"wp-image-6617 size-thumbnail\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-omega-3-blackmores-hang-ngay-280x280.jpg\" sizes=\"(max-width: 280px) 100vw, 280px\" srcset=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-omega-3-blackmores-hang-ngay-280x280.jpg 280w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-omega-3-blackmores-hang-ngay.jpg 400w\" alt=\"Dầu c&aacute; omega 3 blackmores h&agrave;ng ng&agrave;y\" width=\"280\" height=\"280\" />\r\n<figcaption class=\"wp-caption-text\">Dầu c&aacute; omega 3 blackmores h&agrave;ng ng&agrave;y</figcaption>\r\n</figure>\r\n<p>Tại sao Blackmores lại cho ra sản phẩm dầu c&aacute; với lượng omega3 gấp đ&ocirc;i?</p>\r\n<p>Nếu bạn để &yacute; khi ta sử dụng dầu c&aacute; thường thi phải uống 2 vi&ecirc;n mỗi ng&agrave;y để bổ sung th&ecirc;m omega3.</p>\r\n<p>Chắc bạn cũng đ&atilde; rơi v&agrave;o trường hợp m&agrave; bạn qu&ecirc;n uống thuốc đều đặn rồi phải kh&ocirc;ng?</p>\r\n<p>V&iacute; dụ như mỗi ng&agrave;y ta phải uống 2 lần, nhưng đ&acirc;u phải ng&agrave;y n&agrave;o ta cũng chắc l&agrave; uống được 2 lần một c&aacute;ch đều đặn. C&oacute; khi ta qu&ecirc;n, hoặc v&igrave; một l&yacute; do n&agrave;o đ&oacute; ta kh&ocirc;ng thể uống được.</p>\r\n<p>Đ&acirc;y l&agrave; l&yacute; do Blackmores đ&atilde; sản xuất ra loại dầu c&aacute; tiện dụng n&agrave;y. Ch&uacute;ng ta chỉ cần uống 1 vi&ecirc;n để bổ sung th&ecirc;m omega3 v&agrave; 2 vi&ecirc;n để chữa vi&ecirc;m khớp.</p>\r\n<p>Dầu c&aacute; h&agrave;ng ng&agrave;y với lượng omega3 gấp đ&ocirc;i n&agrave;y vẫn c&ograve;n một &iacute;t m&ugrave;i. Tuy nhi&ecirc;n, n&oacute; kh&ocirc;ng ảnh hưởng nhiều đến vị gi&aacute;c của bạn.</p>\r\n<p>Về th&agrave;nh phần th&igrave; loại dầu c&aacute; n&agrave;y c&oacute; lượng omega3 gấp đ&ocirc;i n&ecirc;n trong mỗi vi&ecirc;n dầu c&aacute; c&oacute; chứa 600mg omega3 ( loại thường th&igrave; c&oacute; 300mg)</p>\r\n<p>Trong đ&oacute; c&oacute; chứa:&nbsp;EPA 360 mg v&agrave; DHA 240 mg</p>\r\n<p>Khi sử dụng thuốc hay thực phẩm chức năng n&oacute;i ri&ecirc;ng, việc sử dụng ch&uacute;ng thường xuy&ecirc;n l&agrave; một điều cần thiết.</p>\r\n<p>V&igrave; thế nếu bạn kh&ocirc;ng biết dầu c&aacute; loại n&agrave;o tốt cho bạn khi muốn gia tăng hiệu quả của việc sử dụng thuốc; dầu c&aacute; h&agrave;ng ng&agrave;y n&agrave;y l&agrave; giải ph&aacute;p cho bạn</p>\r\n<p>Xem sản phẩm:&nbsp;<a href=\"https://xuatxuuc.com/san-pham/dau-ca-blackmores-daily/\">Dầu c&aacute; h&agrave;ng ng&agrave;y với lượng omega3 gấp đ&ocirc;i</a></p>\r\n<h3>5, Dầu c&aacute; với lượng omega gấp 3 1550mg</h3>\r\n<figure id=\"attachment_6597\" class=\"wp-caption aligncenter\"><img class=\"wp-image-6597 size-thumbnail\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-ham-luong-omega3-nhan-3-280x280.jpg\" sizes=\"(max-width: 280px) 100vw, 280px\" srcset=\"https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-ham-luong-omega3-nhan-3-280x280.jpg 280w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-ham-luong-omega3-nhan-3-400x400.jpg 400w, https://xuatxuuc.com/wp-content/uploads/2017/09/dau-ca-ham-luong-omega3-nhan-3.jpg 450w\" alt=\"dầu c&aacute; h&agrave;m lượng omega3 nh&acirc;n 3\" width=\"280\" height=\"280\" />\r\n<figcaption class=\"wp-caption-text\">Dầu c&aacute; h&agrave;m lượng omega3 nh&acirc;n 3</figcaption>\r\n</figure>\r\n<p>Đ&acirc;y l&agrave; c&oacute; lẻ l&agrave; loại dầu c&aacute; đặc biệt nhất. Bởi v&igrave; đ&acirc;y kh&ocirc;ng phải l&agrave; dầu c&aacute; hạng thường.</p>\r\n<p>Mỗi vi&ecirc;n kh&ocirc;ng phải l&agrave; 1000mg nữa m&agrave; l&agrave; 1550mg.</p>\r\n<p>Hơn nữa, mỗi vi&ecirc;n nang dầu c&aacute; triple concentrated fish oil n&agrave;y c&oacute; h&agrave;m lượng omega3 gấp 3 lần b&igrave;nh thường: 900mg omega3. ( B&igrave;nh thường l&agrave; 300mg)</p>\r\n<p>Trong đ&oacute;</p>\r\n<ul>\r\n<li>Axit eicosapentaenoic (EPA) 528 mg</li>\r\n<li>Axit docosahexaenoic (DHA) 372 mg</li>\r\n</ul>\r\n<p>Loại dầu c&aacute; n&agrave;y chứa h&agrave;m lượng omega3 kh&aacute; cao; v&igrave; thế ph&ugrave; hợp với những ai thiếu hụt omega3 trầm trọng.</p>\r\n<blockquote>\r\n<p>Tổ chức Sức Khỏe Quốc Gia &Uacute;c v&agrave; Hội Đồng Nghi&ecirc;n Cứu Y Tế đ&atilde; khuyến nghị ch&uacute;ng ta n&ecirc;n uống 610mg dầu c&aacute; x3 omega3 (EPA, DHA, v&agrave; DPA) cho đ&agrave;n &ocirc;ng v&agrave; 430mg cho phụ nữ để duy tr&igrave; sức khỏe h&agrave;ng ng&agrave;y.</p>\r\n</blockquote>\r\n<p>Xem sản phẩm tại đ&acirc;y:&nbsp;<a href=\"https://xuatxuuc.com/san-pham/dau-ca-ham-luong-omega3-nhan-3-blackmores/\">Dầu c&aacute; omega3 x3</a></p>\r\n<h3>6, Dầu c&aacute; Glucosamine</h3>\r\n<figure id=\"attachment_6620\" class=\"wp-caption aligncenter\"><img class=\"wp-image-6620 size-thumbnail\" src=\"https://xuatxuuc.com/wp-content/uploads/2017/09/thuoc-bo-xuong-khop-glucosamine-dau-ca-280x280.jpg\" sizes=\"(max-width: 280px) 100vw, 280px\" srcset=\"https://xuatxuuc.com/wp-content/uploads/2017/09/thuoc-bo-xuong-khop-glucosamine-dau-ca-280x280.jpg 280w, https://xuatxuuc.com/wp-content/uploads/2017/09/thuoc-bo-xuong-khop-glucosamine-dau-ca-400x400.jpg 400w, https://xuatxuuc.com/wp-content/uploads/2017/09/thuoc-bo-xuong-khop-glucosamine-dau-ca.jpg 450w\" alt=\"Thuốc bổ xương khớp Glucosamine + dầu c&aacute;\" width=\"280\" height=\"280\" />\r\n<figcaption class=\"wp-caption-text\">Thuốc bổ xương khớp Glucosamine + dầu c&aacute;</figcaption>\r\n</figure>\r\n<p>Nếu bạn kh&ocirc;ng biết dầu c&aacute; loại n&agrave;o tốt cho vi&ecirc;m xương khớp th&igrave; đ&acirc;y l&agrave; lựa chọn số 1 cho bạn.</p>\r\n<p>Blackmores đ&atilde; kết hợp glucosamine v&agrave; dầu c&aacute; v&agrave;o trong 1 vi&ecirc;n nang. Điều n&agrave;y gi&uacute;p tăng cường hiệu quả của việc chữa trị c&aacute;c bệnh li&ecirc;n quan đến khớp xương.</p>\r\n<p>Glucosamine c&oacute; thể được sản xuất b&ecirc;n trong cơ thể. Tuy nhi&ecirc;n, khi về gi&agrave; chức năng sản xuất glucosamine bị giảm đi v&agrave; c&aacute;c sụn của xương dễ bị tổn thương.</p>\r\n<p>V&igrave; thế, ch&uacute;ng ta cần phải bổ sung th&ecirc;m glucosamine v&agrave;o cơ thể để giảm t&igrave;nh trạng vi&ecirc;m xương khớp.</p>\r\n<p>Như ta đ&atilde; biết dầu c&aacute; cũng c&oacute; chức năng l&agrave;m giảm vi&ecirc;m khớp; v&igrave; thế việc kết hợp glucosamine v&agrave; dầu c&aacute; sẽ l&agrave;m tăng hiệu quả của n&oacute; l&ecirc;n rất nhiều.</p>\r\n<blockquote>\r\n<p>Đ&atilde; c&oacute; cuộc khảo s&aacute;t dựa tr&ecirc;n c&aacute;c bệnh nh&acirc;n vi&ecirc;m xương khớp; kết quả c&oacute; 55% bệnh nh&acirc;n vi&ecirc;m khớp xương đầu gối được cải thiện một c&aacute;ch r&otilde; rệt. V&agrave; họ c&ograve;n c&oacute; thể vận động b&igrave;nh thường sau 4 tuần sử dụng glucosamine sulfat 1500mg (500mg 3 lần mỗi ng&agrave;y)</p>\r\n</blockquote>\r\n<p>Th&agrave;nh phần của loại dầu c&aacute; glucosamine n&agrave;y như sau:</p>\r\n<ul>\r\n<li>Glucosamine sunfat natri clorua 650mg ~&nbsp; glucosamine sulfate 500mg</li>\r\n<li>&nbsp;500mg dầu c&aacute; chứa 150mg omega-3</li>\r\n</ul>\r\n<p>Trong đ&oacute;:</p>\r\n<p>Acid eicosapentaenoic (EPA) 90mg</p>\r\n<p>Docosahexaenoic Acid (DHA) 60mg</p>', 784, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(4, 'Thị trường dầu cá toàn cầu sẽ đạt 3.300 triệu USD năm 2020', 'thi-truong-dau-ca-toan-cau-se-dat-3-300-trieu-usd-nam-2020', '/daucalxag/files/upload/image/tin-tuc/0000888355_w240.png', 2, '', '<div class=\"imgdes clearfix\"><img id=\"ctl00_mainContent_ctl00_245_11739_imgNews\" src=\"http://chongbanphagia.vn/images/thumbs/0000888355_w240.png\" /></div>\r\n<div class=\"content-post-gr\">\r\n<div><strong>(vasep.com.vn) Thị trường dầu c&aacute; to&agrave;n cầu dự kiến đạt 3.300 triệu USD v&agrave;o năm 2020.</strong></div>\r\n<div>&nbsp;</div>\r\n<div>Nhu cầu dầu c&aacute; dự kiến tăng đ&aacute;ng kể sau khi con người tăng ti&ecirc;u thụ mặt h&agrave;ng n&agrave;y do dầu c&aacute; cung cấp omega 3, ax&iacute;t b&eacute;o v&agrave; c&aacute;c dinh dưỡng tốt cho sức khỏe kh&aacute;c.</div>\r\n<div>&nbsp;</div>\r\n<div>B&ecirc;n cạnh đ&oacute;, nhu cầu nu&ocirc;i trồng thủy sản tăng mạnh th&uacute;c đẩy thị trường dầu c&aacute; tăng trưởng. Gi&aacute; dầu c&aacute; biến động do sản lượng dầu c&aacute; ổn định, tr&aacute;i ngược với nhu cầu gia tăng dự kiến sẽ l&agrave; th&aacute;ch thức đối với những người tham gia thị trường.</div>\r\n<div>&nbsp;</div>\r\n<div>Ch&acirc;u &Aacute; Th&aacute;i B&igrave;nh Dương v&agrave; Mỹ La tinh dự kiến l&agrave; những thị trường tăng trưởng nhanh nhất về nhu cầu, do gia tăng trại nu&ocirc;i c&aacute; hồi tại Chile v&agrave; nu&ocirc;i c&aacute; ch&eacute;p tại Trung Quốc.</div>\r\n<div>&nbsp;</div>\r\n<div>Lĩnh vực nu&ocirc;i trồng thủy sản cần nhiều dầu c&aacute; nhất với 772,4 ngh&igrave;n tấn v&agrave;o năm 2013 v&agrave; dự kiến tăng l&ecirc;n 843,6 ngh&igrave;n tấn năm 2020, tăng 1% trong 6 năm tới.</div>\r\n<div>&nbsp;</div>\r\n<div>Diện t&iacute;ch nu&ocirc;i trồng thủy sản tăng nhanh ở khu vực Ch&acirc;u &Aacute; Th&aacute;i B&igrave;nh Dương c&oacute; thể l&agrave; cơ hội lớn cho thị trường dầu c&aacute;. B&ecirc;n cạnh đ&oacute;, nhu cầu ti&ecirc;u thụ trực tiếp mặt h&agrave;ng n&agrave;y cũng dự kiến tăng 1,6% từ 2014-2020.</div>\r\n<div><em>&nbsp;</em></div>\r\n<div><em>Nguồn: The Fish Site</em></div>\r\n</div>', 700, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(5, 'Những người tuyệt đối không nên bổ sung dầu cá', 'nhung-nguoi-tuyet-doi-khong-nen-bo-sung-dau-ca', '/daucalxag/files/upload/image/tin-tuc/nhung-nguoi-tuyet-doi-khong-nen-bo-sung-dau-ca.jpg', 2, '', '<h2 class=\"detail-sp\" data-field=\"sapo\">Dầu c&aacute; l&agrave; nguồn bổ sung axit b&eacute;o omega-3 rất tốt cho sức khỏe, nhưng lại kh&ocirc;ng th&iacute;ch hợp với mọi đối tượng. Bổ sung omega-3 kh&ocirc;ng đ&uacute;ng c&aacute;ch c&oacute; thể g&acirc;y ngộ độc, nguy hiểm đến t&iacute;nh mạng.</h2>\r\n<div class=\"content-new clear\" data-field=\"body\">\r\n<p><strong><em>Những người kh&ocirc;ng n&ecirc;n bổ sung dầu c&aacute;</em></strong></p>\r\n<p><strong>Bệnh đường ti&ecirc;u h&oacute;a</strong></p>\r\n<p>Với những người đau bụng c&oacute; vấn đề về đường ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n sử dụng. Hệ ti&ecirc;u h&oacute;a của ch&uacute;ng ta kh&ocirc;ng c&oacute; khả năng để hấp thụ lượng nhiều qu&aacute; mức khi được bổ sung v&agrave;o cơ thế. Khi kh&ocirc;ng được ti&ecirc;u h&oacute;a, dầu c&aacute; giải ph&oacute;ng kh&iacute; sinh ra trướng bụng, đầy hơi v&agrave; l&agrave; nguy&ecirc;n nh&acirc;n của những cơn đau bụng dữ dội v&agrave; g&acirc;y ra kh&oacute; chịu.</p>\r\n<p><strong>Đối với trẻ nhỏ</strong></p>\r\n<p>Lời khuy&ecirc;n d&agrave;nh cho c&aacute;c bậc phụ huynh l&agrave; kh&ocirc;ng n&ecirc;n lạm dụng dầu c&aacute; đối với trẻ sơ sinh, trẻ mới tập đi v&agrave; thậm ch&iacute; dưới 15 tuổi. Mặc d&ugrave; h&agrave;m lượng DHA c&oacute; trong dầu c&aacute; tốt cho sự ph&aacute;t triển của trẻ nhưng chất EPA lại g&acirc;y hại cho c&aacute;c cơ quan trong cơ thể trẻ. C&oacute; nhiều c&aacute;ch để bổ sung DHA nhưng để ngăn chặn ảnh hưởng của EPA lại chưa thực sự c&oacute; biện ph&aacute;p th&iacute;ch hợp n&ecirc;n tốt nhất l&agrave; kh&ocirc;ng cho trẻ uống dầu c&aacute;.</p>\r\n<p><strong>Người bị rối loại t&acirc;m thần</strong></p>\r\n<p>Những người bị bệnh về thần kinh như rối loạn lưỡng cực, trầm cảm kh&ocirc;ng n&ecirc;n sử dụng dầu c&aacute; v&igrave; n&oacute; c&oacute; thể k&iacute;ch th&iacute;ch bệnh t&igrave;nh nguy hiểm hơn.</p>\r\n<div class=\"VCSortableInPreviewMode\">\r\n<div><img id=\"img_275285\" src=\"http://giadinh.vcmedia.vn/k:2016/1-bo-sung-dau-ca-1452244284526/nhung-nguoi-tuyet-doi-khong-nen-bo-sung-dau-ca.jpg\" alt=\"\" /></div>\r\n<div class=\"PhotoCMS_Caption\">&nbsp;</div>\r\n</div>\r\n<p><strong>Phụ nữ c&oacute; thai v&agrave; cho con b&uacute;</strong></p>\r\n<p>Đối với phụ nữ c&oacute; thai v&agrave; cho con b&uacute; kh&ocirc;ng n&ecirc;n bổ sung sử dụng dầu c&aacute; th&ocirc;. L&yacute; do l&agrave; v&igrave; c&aacute;c kim loại nặng v&agrave; chất &ocirc; nhiễm trong dầu c&aacute; c&oacute; thể ảnh hưởng tới sức khỏe của thai nhi v&agrave; cả người mẹ. Do t&iacute;nh chất chống đ&ocirc;ng m&aacute;u c&oacute; trong Omega-3 n&ecirc;n nguy cơ chảy m&aacute;u tử cung ở những người phụ nữ bổ sung dầu c&aacute; l&agrave; rất cao.</p>\r\n<p><strong>Người cơ địa dị ứng</strong></p>\r\n<p>Dầu c&aacute; giống như những vitamin bổ sung kh&aacute;c cũng c&oacute; thể g&acirc;y dị ứng. Những người c&oacute; mức nhạy cảm cao c&oacute; xu hướng gặp một số loại phản ứng dị ứng khi d&ugrave;ng loại vitamin bổ sung n&agrave;y, chẳng hạn: ngứa v&agrave; nổi mụn, ph&aacute;t ban v&agrave; nổi mẩn đỏ tr&ecirc;n da, vi&ecirc;m họng, buồn n&ocirc;n, đau đầu, kh&oacute; thở&hellip;</p>\r\n<p><strong>Những người mắc bệnh tuyến tiền liệt</strong></p>\r\n<p>Trong khi hầu hết c&aacute;c nghi&ecirc;n cứu cho thấy bổ sung dầu c&aacute; &iacute;t hoặc kh&ocirc;ng c&oacute; t&aacute;c dụng phụ, bằng chứng gần đ&acirc;y trong nghi&ecirc;n cứu ung thư tuyến tiền liệt được c&ocirc;ng bố v&agrave;o năm 2013 tr&ecirc;n Tạp ch&iacute; của Viện Ung thư Quốc gia Mỹ cho thấy mối li&ecirc;n hệ giữa dầu c&aacute; v&agrave; ung thư tuyến tiền liệt.</p>\r\n<p>Nguy cơ ung thư tuyến tiền liệt tăng ở những người đ&agrave;n &ocirc;ng c&oacute; nồng độ cao axit b&eacute;o omega-3. Ph&aacute;t hiện n&agrave;y cho thấy c&aacute;c axit b&eacute;o c&oacute; li&ecirc;n quan đến sự ph&aacute;t triển của c&aacute;c khối u tuyến tiền liệt.</p>\r\n<div class=\"VCSortableInPreviewMode IMSCurrentEditorEditObject\">\r\n<div><img id=\"img_275284\" src=\"http://giadinh.vcmedia.vn/k:2016/2-bo-sung-dau-ca-1452244282933/nhung-nguoi-tuyet-doi-khong-nen-bo-sung-dau-ca.jpg\" alt=\"\" /></div>\r\n<div class=\"PhotoCMS_Caption\">&nbsp;</div>\r\n</div>\r\n<div id=\"admzone480462\">\r\n<div id=\"ads_zone480462\">\r\n<div id=\"ads_zone480462_slot1\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p><strong>Lưu &yacute; khi bảo quản dầu c&aacute;</strong></p>\r\n<p>Đặc t&iacute;nh của &nbsp;dầu c&aacute; c&aacute;c vitamin v&agrave; chất b&eacute;o omega-3 n&oacute;i chung sẽ bị mất đi trong một số điều kiện. &Aacute;nh nắng, &aacute;nh s&aacute;ng l&agrave; yếu tố h&agrave;ng đầu khiến cho c&aacute;c loại dầu c&aacute; d&agrave;nh cho trẻ em dễ bị hư hại v&agrave; v&ocirc; t&aacute;c dụng nhất.</p>\r\n<p>Hoặc nếu để &nbsp;dầu c&aacute; ở nơi c&oacute; độ ẩm cao l&agrave; yếu tố g&acirc;y hư hỏng c&aacute;c loại thực phẩm bổ sung. Độ ẩm l&agrave;m mềm vỏ bọc vi&ecirc;n dầu c&aacute;, l&acirc;u ng&agrave;y g&acirc;y thất tho&aacute;t dưỡng chất.</p>\r\n<p>Kể cả việc c&oacute; nhiều b&agrave; mẹ qu&aacute; cẩn thận bảo quản dầu c&aacute; trẻ em trong ngăn tủ đ&ocirc;ng lạnh hoặc ngăn m&aacute;t tủ lạnh với nhiệt độ qu&aacute; thấp cũng kh&ocirc;ng tốt v&igrave; dầu c&aacute; kh&ocirc;ng được để ở nơi n&oacute;ng qu&aacute; cũng như lạnh qu&aacute;. Điều kiện n&agrave;o cũng l&agrave;m dầu c&aacute; dễ hỏng v&agrave; kh&ocirc;ng c&ograve;n giữ được chức năng bổ sung.</p>\r\n<p>V&igrave; vậy để bảo quản tốt nhất dầu cả ở nhiệt độ trung b&igrave;nh tr&aacute;nh nơi c&oacute; &aacute;nh nắng rọi thằng v&agrave;o.</p>\r\n<p>Khi mở hộp dầu c&aacute; ra cần đ&oacute;ng chật nắp hộp. &nbsp;khi mua, bạn n&ecirc;n chọn sản phẩm dầu c&aacute; c&oacute; hộp đựng kh&ocirc;ng xuy&ecirc;n thấu (hộp kh&ocirc;ng nh&igrave;n thấy b&ecirc;n trong hoặc nh&igrave;n thấy nhưng m&agrave;u nhựa trong phải sậm m&agrave;u, kh&ocirc;ng trắng trong suốt). Loại hộp n&agrave;y gi&uacute;p bảo quản dầu c&aacute; tốt nhất.</p>\r\n<p>Theo&nbsp;<em>Tr&iacute; thức trẻ</em></p>\r\n</div>', 458, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(6, '90% cá tra bán tại Mỹ nhập khẩu từ Việt Nam', '90-ca-tra-ban-tai-my-nhap-khau-tu-viet-nam', '/daucalxag/files/upload/image/tin-tuc/is-6-1491726210257.jpg', 3, '', '<p>Vasep cho biết, từ nay cho tới thời điểm đ&oacute;, Cơ quan Quản l&yacute; thực phẩm v&agrave; dược phẩm Mỹ (FDA) vẫn chịu tr&aacute;ch nhiệm đảm bảo c&aacute; tra nhập khẩu đ&aacute;p ứng tất cả c&aacute;c ti&ecirc;u ch&iacute; cần thiết về an to&agrave;n thực phẩm.C&oacute; nghĩa l&agrave; thanh tra của USDA sẽ kiểm tra tất cả c&aacute;c kh&acirc;u của chuỗi sản xuất ở Việt Nam, từ khi ương trứng cho đến sản phẩm đ&oacute;ng g&oacute;i cuối c&ugrave;ng.<br /><br />90% c&aacute; tra b&aacute;n tại Mỹ l&agrave; nhập khẩu từ Việt Nam. Kiểm tra tăng cường c&oacute; thể được xem như một c&aacute;ch hợp l&yacute; để h&agrave;nh động, ngoại trừ sự bất tiện m&agrave; c&aacute; tra Việt Nam đ&atilde; được b&aacute;n th&agrave;nh c&ocirc;ng tại Mỹ trong khoảng thời gian từ 10 - 15 năm vừa qua v&agrave; chưa c&oacute; trường hợp n&agrave;o c&aacute; tra g&acirc;y hại cho người ti&ecirc;u d&ugrave;ng Mỹ.<br /><br />Ng&agrave;nh c&aacute; tra Việt Nam c&oacute; lẽ l&agrave; ng&agrave;nh c&ocirc;ng nghiệp thủy sản được quy định chặt chẽ nhất tr&ecirc;n thế giới. C&aacute;c trại nu&ocirc;i được chứng nhận bởi c&aacute;c tổ chức độc lập v&agrave; c&oacute; uy t&iacute;n như: ASC, BAP v&agrave; GlobalG.A.P&hellip;c&ograve;n c&aacute;c nh&agrave; m&aacute;y chế biến c&aacute; tra của Việt Nam lại đ&aacute;p ứng ti&ecirc;u chuẩn HACCP cũng như c&aacute;c chứng nhận IFS v&agrave; BRC. Gần như tất cả đ&atilde; được chấp thuận để xuất khẩu c&aacute; tra sang EU, thị trường c&oacute; ti&ecirc;u ch&iacute; nhập khẩu rất nghi&ecirc;m ngặt.<br /><br />Tuy nhi&ecirc;n, tất cả những điều n&agrave;y kh&ocirc;ng c&oacute; gi&aacute; trị g&igrave; ở c&aacute;c tiểu bang Mississippi, Louisiana v&agrave; Alabama nằm ở khu vực ph&iacute;a Nam nước Mỹ, nơi nu&ocirc;i c&aacute; da trơn v&agrave; c&aacute; tra Việt Nam được coi l&agrave; một lo&agrave;i gi&aacute; rẻ l&agrave;m giảm gi&aacute; b&aacute;n v&agrave; ph&aacute; hoại thị trường của họ.<br /><br />Thay v&igrave; quảng b&aacute; c&aacute; da trơn nội địa như l&agrave; một lo&agrave;i \"cao cấp\", c&oacute; gi&aacute; trị cao, th&igrave; c&aacute;c chủ trại nu&ocirc;i c&aacute; da trơn Mỹ (CFA) đ&atilde; tiến h&agrave;nh một cuộc chiến l&acirc;u d&agrave;i v&agrave; quyết liệt nhằm b&ocirc;i xấu lo&agrave;i c&aacute; tra Việt Nam bằng mọi c&aacute;ch họ c&oacute; thể l&agrave;m.<br /><br />H&agrave;nh động n&agrave;y bao gồm cả th&ocirc;ng tin rằng c&aacute; tra được nu&ocirc;i ở s&ocirc;ng M&ecirc;k&ocirc;ng, nguồn nước bị nhiễm chất độc m&agrave;u da cam. Tuy nhi&ecirc;n, thực tế l&agrave; c&aacute; tra hiện nay được nu&ocirc;i trong c&aacute;c ao nu&ocirc;i chuy&ecirc;n biệt v&agrave; được cho ăn thức ăn vi&ecirc;n.<br /><br />Đơn kiện của họ cho rằng c&aacute;c c&ocirc;ng ty ở Việt Nam, nơi c&oacute; thu nhập b&igrave;nh qu&acirc;n đầu người chỉ bằng khoảng 1/5 của Mỹ, lại đang bao cấp cho những người gi&agrave;u c&oacute; ở Mỹ sử dụng c&aacute; da trơn. Theo b&aacute;o c&aacute;o của FAO n&ecirc;u tr&ecirc;n, CFA đ&atilde; c&aacute;o buộc rằng Ch&iacute;nh phủ Việt Nam đ&atilde; can thiệp qu&aacute; s&acirc;u v&agrave;o nền kinh tế do đ&oacute; kh&ocirc;ng thể đ&aacute;nh gi&aacute; thực sự về chi ph&iacute; của c&aacute;c nh&agrave; sản xuất của Việt Nam.<br /><br />Th&ocirc;ng qua c&aacute;c đại diện của Quốc hội, người nu&ocirc;i c&aacute; da trơn ở c&aacute;c bang ph&iacute;a Nam đ&atilde; y&ecirc;u cầu Bộ Thương mại Hoa Kỳ t&iacute;nh to&aacute;n chi ph&iacute; nu&ocirc;i c&aacute; da trơn ở Ấn Độ, phi l&ecirc; v&agrave; cấp đ&ocirc;ng tại c&aacute;c nh&agrave; m&aacute;y giả định, v&agrave; vận chuyển ch&uacute;ng trong những chiếc t&agrave;u giả định sang Mỹ. Đ&aacute;nh gi&aacute; n&agrave;y dẫn đến kết luận rằng c&aacute;c nh&agrave; sản xuất Việt Nam được trợ cấp kh&ocirc;ng c&ocirc;ng bằng v&agrave; phải trả mức thuế 190%.<br /><br />Thuế chống ph&aacute; gi&aacute; vẫn c&ograve;n tồn tại, mặc d&ugrave; mức thuế giữa c&aacute;c nh&agrave; sản xuất l&agrave; kh&aacute;c nhau. Chẳng hạn như, nh&agrave; sản xuất v&agrave; xuất khẩu c&aacute; tra h&agrave;ng đầu Vĩnh H&ograve;an đang c&oacute; mức thuế l&agrave; 0%. Thực tế thuế được thu từ nh&agrave; NK v&agrave; sau đ&oacute; nh&agrave; NK sẽ thu lại của nh&agrave; xuất khẩu. Ngo&agrave;i ra c&ograve;n c&oacute; một \"khoản tiền k&yacute; quỹ\" trong trường hợp b&aacute;n ph&aacute; gi&aacute; được \"ph&aacute;t hiện\", c&oacute; thể l&ecirc;n đến 1 triệu USD (942.000 euro) v&agrave; phải được trả trước cho Mỹ.<br /><br />Đối mặt với tất cả những trở ngại n&agrave;y, nếu Việt Nam quyết định từ bỏ thị trường Mỹ cũng sẽ l&agrave; điều dễ hiểu. Tr&ecirc;n thực tế, Trung Quốc đ&atilde; gần vượt qua Mỹ l&agrave; thị trường xuất khẩu c&aacute; tra lớn nhất của Việt Nam. Tuy nhi&ecirc;n, Việt Nam vẫn đang nỗlực rất nhiều để đ&aacute;p ứng c&aacute;c y&ecirc;u cầu của USDA.<br /><br />Tuy nhi&ecirc;n, nếu c&aacute;c nh&agrave; sản xuất Việt Nam c&oacute; thể đ&aacute;p ứng c&aacute;c y&ecirc;u cầu của USDA, một thị trường lớn ở Mỹ đang chờ đợi họ. C&aacute; tra hiện nay phổ biến hơn so với c&aacute; da trơn nu&ocirc;i của Mỹ, nếu đổi t&ecirc;n th&agrave;nh \"catfish\", ng&agrave;nh c&aacute; tra Việt Nam c&oacute; tiềm năng lớn để b&ugrave;ng nổ về doanh số.<br /><br />Ng&agrave;nh c&ocirc;ng nghiệp c&aacute; da trơn Mỹ chưa tận dụng hết được tiềm năng của m&igrave;nh v&agrave; cũng kh&ocirc;ng thể tự m&igrave;nh đ&aacute;p ứng được hết nhu cầu của thị trường tiềm năng Mỹ. Đ&acirc;y ch&iacute;nh l&agrave; l&yacute; do v&igrave; sao họ phải bằng mọi gi&aacute; để loại c&aacute; tra Việt Nam ra khỏi thị trường của m&igrave;nh.</p>\r\n<p>&nbsp;</p>\r\n<div class=\"VCSortableInPreviewMode link-content-footer\"><a href=\"http://cafef.vn/xuat-khau-ca-tra-sang-tay-ban-nha-giam-manh-20170404155843383.chn\" type=\"2\">Xuất khẩu c&aacute; tra sang T&acirc;y Ban Nha giảm mạnh</a></div>\r\n<p>&nbsp;</p>\r\n<p class=\"author\">T&ugrave;ng Anh</p>\r\n<p class=\"source\" data-field=\"source\">Theo Tr&iacute; thức trẻ</p>', 505, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0);
INSERT INTO `m_contents` (`id`, `title`, `alias`, `thumbnail`, `category_id`, `description`, `content`, `view_num`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(7, 'Rộng mở thị trường cá tra, basa', 'rong-mo-thi-truong-ca-tra-basa', '/daucalxag/files/upload/image/tin-tuc/0000885391_w240.png', 3, '', '<p><strong>Từ đầu năm 2009 đến nay, xuất khẩu c&aacute; tra, c&aacute; basa của Việt Nam đ&atilde; mở rộng th&ecirc;m thị trường ra 24 quốc gia mới, n&acirc;ng tổng số c&aacute;c thị trường nhập khẩu c&aacute; tra, c&aacute; basa của Việt Nam l&ecirc;n 110 quốc gia v&agrave; v&ugrave;ng l&atilde;nh thổ.</strong></p>\r\n<p>Theo Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n, c&aacute; tra, basa vẫn đang l&agrave; mặt h&agrave;ng chiếm tỷ trọng gi&aacute; trị xuất khẩu cao nhất trong nh&oacute;m thủy sản, nửa đầu năm 2009 đạt khối lượng xuất khẩu 206.000 tấn, kim ngạch 473,9 triệu USD. Thị trường ti&ecirc;u thụ ch&iacute;nh của c&aacute; tra, basa Việt Nam vẫn l&agrave; EU với kim ngạch đạt 206 triệu USD trong 6 th&aacute;ng đầu năm.</p>\r\n<p>Ri&ecirc;ng thị trường Mỹ, bất chấp kh&oacute; khăn do khủng hoảng kinh tế, xuất khẩu sang nước n&agrave;y đ&atilde; c&oacute; sự tăng trưởng vượt bậc, đạt 45,97 triệu USD, tăng 59,98 % so với c&ugrave;ng kỳ năm 2008.</p>\r\n<p><strong>Giữ vững thị trường cũ, mở thị trường mới</strong></p>\r\n<p>Mặc d&ugrave; chịu ảnh hưởng do khủng hoảng kinh tế, nhưng c&aacute;c thị trường nhập khẩu c&aacute; tra, c&aacute; basa chủ lực của Việt Nam (mạnh nhất l&agrave;: EU, Mỹ, ASEAN, Ucraina, Mexico, Ai Cập) đều c&oacute; mức tăng trưởng kh&aacute; cả về mặt khối lượng v&agrave; gi&aacute; trị so với c&ugrave;ng kỳ năm trước.</p>\r\n<p>Do trong 4 th&aacute;ng đầu năm 2009, c&aacute;c doanh nghiệp xuất khẩu c&aacute; tra, c&aacute; basa của Việt Nam vẫn chưa được ph&eacute;p xuất khẩu sang thị trường Nga, n&ecirc;n số c&aacute; dư ra đ&atilde; được họ đẩy mạnh sang ti&ecirc;u thụ tại c&aacute;c thị trường n&agrave;y.</p>\r\n<p>Hiện tại, EU vẫn l&agrave; khối thị trường lớn nhất nhập khẩu c&aacute; tra, c&aacute; basa của Việt Nam, với 26/27 quốc gia đ&atilde; nhập khẩu c&aacute; của Việt Nam. Trong đ&oacute;, 3 nước đứng đầu l&agrave; T&acirc;y Ban Nha, Đức v&agrave; H&agrave; Lan, c&oacute; khối lượng nhập khẩu chiếm 60% tổng lượng nhập khẩu c&aacute; tra, basa của to&agrave;n EU. T&acirc;y Ban Nha v&agrave; Đức đồng thời l&agrave; hai nh&agrave; nhập khẩu c&aacute; tra, basa lớn nhất của Việt Nam trong số 110 quốc gia nhập khẩu hai mặt h&agrave;ng n&agrave;y.</p>\r\n<p>Thời gian vừa qua, Việt Nam cũng đ&atilde; đẩy mạnh xuất khẩu v&agrave;o 3 quốc gia EU kh&aacute;c, l&agrave; Rumani, Bungari v&agrave; Hungari. Sở dĩ cho tới nay, thị trường EU vẫn th&iacute;ch ti&ecirc;u thụ c&aacute; tra, basa của Việt Nam l&agrave; v&igrave; c&oacute; mức gi&aacute; ph&ugrave; hợp, đ&aacute;p ứng tốt an to&agrave;n vệ sinh thực phẩm.</p>\r\n<p>Nửa đầu năm 2009, gần 100/190 doanh nghiệp thuỷ sản Việt Nam đ&atilde; xuất khẩu c&aacute; tra, c&aacute; basa sang thị trường EU. Gi&aacute; xuất khẩu trung b&igrave;nh c&aacute; tra của Việt Nam tới c&aacute;c nước EU t&iacute;nh theo gi&aacute; FOB kể từ đầu năm đến nay đạt 2,445 USD/kg.</p>\r\n<p>Dự b&aacute;o, trong qu&yacute; 3 tới đ&acirc;y, gi&aacute; xuất khẩu mặt h&agrave;ng n&agrave;y vẫn tiếp tục ổn định tại thị trường EU. Tuy nhi&ecirc;n, từ th&aacute;ng 5 trở lại đ&acirc;y, sản lượng c&aacute; tra, basa xuất khẩu sang EU đ&atilde; chững lại, nguy&ecirc;n nh&acirc;n ch&iacute;nh l&agrave; do khan hiếm nguồn h&agrave;ng.</p>\r\n<p>Nga l&agrave; thị trường nhập khẩu thuỷ sản lớn thứ 4 của Việt Nam, ri&ecirc;ng đối với mặt h&agrave;ng c&aacute; tra th&igrave; Nga lại c&agrave;ng l&agrave; thị trường đầy tiềm năng, v&igrave; c&oacute; nhu cầu cao đối với mặt h&agrave;ng n&agrave;y. Hơn nữa, nếu so với c&aacute;c thị trường Nhật, Mỹ, EU th&igrave; thị trường Nga dễ t&iacute;nh hơn.</p>\r\n<p>Theo b&aacute;o c&aacute;o của Thương vụ Việt Nam tại Nga, năm 2008, tỷ trọng c&aacute; tra của Việt Nam xuất khẩu sang Nga chiếm 94,4% về khối lượng v&agrave; 86,5% về gi&aacute; trị trong tổng khối lượng v&agrave; gi&aacute; trị xuất khẩu thuỷ sản của Việt Nam đến thị trường n&agrave;y, đạt 118.155 tấn, trị gi&aacute; 188,45 triệu USD.</p>\r\n<p>Những th&aacute;ng đầu năm, Nga đ&oacute;ng cửa đối với c&aacute; tra, basa Việt Nam, đ&atilde; g&acirc;y nhiều kh&oacute; khăn cho xuất khẩu thủy sản. Từ th&aacute;ng 5/2009, việc mở cửa thị trường Nga l&agrave; t&iacute;n hiệu rất tốt cho ng&agrave;nh Thuỷ sản Việt Nam v&agrave; trong thời gian tới, Nga sẽ vẫn l&agrave; thị trường lớn nhập khẩu c&aacute; tra của Việt Nam.</p>\r\n<p>Tại Australia, c&aacute; tra đ&ocirc;ng lạnh l&agrave; một trong hai mặt h&agrave;ng xuất khẩu chủ lực của Việt Nam (c&ugrave;ng với t&ocirc;m đ&ocirc;ng lạnh) nhưng mức tăng trưởng của mặt h&agrave;ng từ đầu năm đến nay đ&atilde; giảm so với c&ugrave;ng kỳ năm 2008.</p>\r\n<p>Tại thị trường n&agrave;y, c&aacute;c doanh nghiệp xuất khẩu của Việt Nam đ&atilde; chuyển hướng xuất khẩu c&aacute;c mặt h&agrave;ng đ&ocirc;ng lạnh kh&aacute;c, như mực, c&aacute; basa, c&aacute; ngừ (trong đ&oacute; c&aacute; basa tăng 63,9% về lượng v&agrave; tăng 50,4% về kim ngạch). Gi&aacute; xuất khẩu trung b&igrave;nh c&aacute; tra đ&ocirc;ng lạnh tại thị trường Australia nửa đầu năm 2009 l&agrave; 2,94 USD/kg (giảm 3,8%).</p>\r\n<p>C&ocirc;ng ty TNHH Thuận Hưng hiện l&agrave; doanh nghiệp đứng đầu về xuất khẩu c&aacute; tra đ&ocirc;ng lạnh v&agrave;o Australia với kim ngạch xuất khẩu 5 th&aacute;ng đầu năm 2009 đạt tr&ecirc;n 2,7 triệu USD, tiếp theo l&agrave; C&ocirc;ng ty cổ phần xuất nhập khẩu thuỷ sản An Giang - xấp xỉ 2,1 triệu USD, C&ocirc;ng ty cổ phần Vĩnh Ho&agrave;n - tr&ecirc;n 1,9 triệu USD.</p>\r\n<p>Để vượt qua những kh&oacute; khăn trong thời kỳ khủng hoảng, c&aacute;c doanh nghiệp xuất khẩu c&aacute; tra, basa nước ta đ&atilde; t&iacute;ch cực mở rộng những thị trường mới. Nửa đầu năm 2009, c&oacute; th&ecirc;m 24 quốc gia mới nhập khẩu c&aacute; tra, c&aacute; basa của VN. Trong đ&oacute;, Cadắcxtan, Nigeria v&agrave; Irắc l&agrave; 3 nước nhập khẩu rất triển vọng với số lượng nhập khẩu lớn.</p>\r\n<p><strong>Th&uacute;c đẩy nu&ocirc;i trồng để chủ động nguồn cung</strong></p>\r\n<p>Xuất khẩu c&aacute; tra, c&aacute; basa của Việt Nam trong th&aacute;ng 4/2009 đạt mức cao nhất kể từ đầu năm đến nay, với khối lượng đạt 46.200 tấn, tăng 6,6% so với c&ugrave;ng kỳ năm 2008.</p>\r\n<p>Tuy nhi&ecirc;n, sang đến th&aacute;ng 5, xuất khẩu c&aacute; tra, c&aacute; basa của Việt Nam đ&atilde; c&oacute; biểu hiện chững lại. Nguy&ecirc;n nh&acirc;n nằm ở việc nguồn cung c&aacute; nguy&ecirc;n liệu giảm, dẫn tới lượng c&aacute; xuất khẩu giảm. Trong khi tr&ecirc;n thế giới, nhu cầu về c&aacute; tra, c&aacute; basa ở hầu hết c&aacute;c thị trường đều rất cao.</p>\r\n<p>V&agrave;o th&aacute;ng 5/2009, diện t&iacute;ch nu&ocirc;i thả c&aacute; tra, basa ở nước ta chỉ bằng 60% diện t&iacute;ch c&ugrave;ng kỳ năm 2008, xấp xỉ 3.690 ha. Phần diện t&iacute;ch c&ograve;n lại đ&atilde; bị bỏ kh&ocirc;ng v&igrave; người nu&ocirc;i kh&ocirc;ng đủ niềm tin về đầu ra. Trước t&igrave;nh h&igrave;nh đ&oacute;, một số doanh nghiệp đ&atilde; chủ động k&yacute; hợp đồng bao ti&ecirc;u khiến c&aacute;c hộ nu&ocirc;i bắt đầu y&ecirc;n t&acirc;m thả nu&ocirc;i lại tr&ecirc;n những diện t&iacute;ch bỏ trống. Đồng thời k&yacute; cam kết thu mua c&aacute; nguy&ecirc;n liệu với mức gi&aacute; ổn định 15.500 đến 16.500 đồng/kg để n&ocirc;ng d&acirc;n c&oacute; l&atilde;i.</p>\r\n<p>Nhờ vậy đến nay, theo thống k&ecirc; chưa đầy đủ của Cục Nu&ocirc;i trồng thủy sản, 10 tỉnh đồng bằng s&ocirc;ng Cửu Long đ&atilde; thả gần 1,7 triệu con giống c&aacute; tra tr&ecirc;n diện t&iacute;ch hơn 5.500 ha, đạt 83% kế hoạch thả nu&ocirc;i năm 2009. Trong đ&oacute;, 1.133ha diện t&iacute;ch c&aacute; tra đ&atilde; thu hoạch, bằng 22,1% diện t&iacute;ch thả nu&ocirc;i, với sản lượng đạt 312.337 tấn. Năng suất b&igrave;nh qu&acirc;n tr&ecirc;n 240 tấn/ha</p>\r\n<p>Tại Tiền Giang năng suất đạt 264 tấn/ha, Đồng Th&aacute;p 302 tấn/ha, Vĩnh Long 300 tấn/ha, Cần Thơ 224 tấn/ha, Hậu Giang 230 tấn/ha v&agrave; Tr&agrave; Vinh 267 tấn/ha. Sản lượng c&aacute; đến kỳ thu hoạch t&iacute;nh đến nay l&agrave; 119.160 tấn, trong đ&oacute; tập trung ở Đồng Th&aacute;p 53.944 tấn, Cần Thơ 32.955 tấn v&agrave; An Giang 14.362 tấn. Lượng c&aacute; tồn đọng (loại &gt;1kg) khoảng 6.743 tấn, bằng 4,15% lượng tồn đọng của năm 2008.</p>\r\n<p>Trong thời gian qua, ng&agrave;nh thủy sản nước ta đ&atilde; phải đối mặt với v&ocirc; v&agrave;n kh&oacute; khăn th&aacute;ch thức. Do sự ph&aacute;t triển tự ph&aacute;t, thiếu quy hoạch, n&ecirc;n mặt h&agrave;ng n&agrave;y lu&ocirc;n ở t&igrave;nh trạng mất c&acirc;n đối cung - cầu, với những biến động kh&oacute; lường.</p>\r\n<p>Trong khi đ&oacute;, nhiều quốc gia trước t&igrave;nh h&igrave;nh suy tho&aacute;i kinh tế, đ&atilde; bảo hộ sản xuất trong nước, đưa th&ocirc;ng tin sai lệch về c&aacute; tra của Việt Nam. Đ&acirc;y cũng l&agrave; những th&aacute;ch thức lớn của ng&agrave;nh nu&ocirc;i trồng thủy sản trong những th&aacute;ng c&ograve;n lại của năm 2009.</p>\r\n<p>C&aacute;c chuy&ecirc;n gia kinh tế lại dự b&aacute;o rằng, c&aacute;c doanh nghiệp chế biến, xuất khẩu c&aacute; tra, c&aacute; basa của Việt Nam sẽ kh&ocirc;ng đẩy mức gi&aacute; xuất khẩu, m&agrave; chấp nhận gi&aacute; c&aacute; ổn định ở mức thấp như hiện nay, chấp nhận lợi nhuận thấp để c&acirc;n bằng lợi &iacute;ch hai b&ecirc;n - nước xuất khẩu v&agrave; nước nhập khẩu, v&igrave; tất cả đều đang phải trải qua một thời kỳ hết sức kh&oacute; khăn.</p>\r\n<p>Nhiều chuy&ecirc;n gia lạc quan dự b&aacute;o, kim ngạch xuất khẩu c&aacute; tra, basa năm nay c&oacute; thể đạt mức 1,2 - 1,3 tỉ USD, cao hơn dự b&aacute;o trước đ&oacute; của Hiệp hội Chế biến v&agrave; Xuất khẩu thủy sản Việt Nam (chỉ đạt khoảng 1 tỉ USD).</p>\r\n<p align=\"right\"><em>Nguồn: Thời b&aacute;o kinh tế Việt Nam</em></p>', 453, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(8, 'Nguy cơ mất thị trường cá tra, ba sa do Mỹ thay đổi quy định', 'nguy-co-mat-thi-truong-ca-tra-ba-sa-do-my-thay-doi-quy-dinh', '', 3, '', '<p class=\"SGTOSummary\" align=\"left\">(TBKTSG Online) &ndash; Những ti&ecirc;u chuẩn m&agrave; người nu&ocirc;i c&aacute; tra, doanh nghiệp xuất khẩu c&aacute; tra đang &aacute;p dụng như BAP, GlobalGap (thực h&agrave;nh n&ocirc;ng nghiệp tốt), ASC khi xuất sang Mỹ sẽ c&oacute; kh&ocirc;ng c&oacute; &yacute; nghĩa g&igrave; trong thời gian tới m&agrave; phải theo một hệ thống ti&ecirc;u chuẩn được Mỹ đồng &yacute; l&agrave; tương đương.</p>\r\n<p class=\"SGTOContent\" align=\"left\">Đ&acirc;y l&agrave; những y&ecirc;u cầu nằm trong &ldquo;Quy định cuối c&ugrave;ng&rdquo; về việc thiết lập chương tr&igrave;nh gi&aacute;m s&aacute;t đối với c&aacute;c lo&agrave;i c&aacute; thuộc bộ Siluriformes, trong đ&oacute; c&oacute; c&aacute; tra, c&aacute; basa của Việt Nam, vừa được Bộ N&ocirc;ng nghiệp Mỹ (USDA) ban h&agrave;nh.</p>\r\n<p>Theo &ocirc;ng Trương Đ&igrave;nh H&ograve;e, Tổng thư k&yacute; Hiệp hội chế biến v&agrave; xuất khẩu thủy sản Việt Nam (VASEP), trong thời gian tới, để c&aacute; tra xuất khẩu sang Mỹ, Việt Nam phải đưa ra một hệ thống những ti&ecirc;u chuẩn được ph&iacute;a Mỹ xem x&eacute;t l&agrave; tương đương v&agrave; căn cứ tr&ecirc;n đ&oacute;, c&aacute;c doanh nghiệp sẽ l&agrave;m theo.</p>\r\n<p>&Ocirc;ng H&ograve;e cho biết, hiện tại, c&aacute; tra xuất khẩu qua Mỹ phải bị kiểm so&aacute;t bởi FDA, tức l&agrave; cơ quan quản l&yacute; thực phẩm v&agrave; dược phẩm nhập khẩu v&agrave;o Mỹ. Nhưng sắp tới, Ban quản l&yacute; thực phẩm n&ocirc;ng nghiệp an to&agrave;n v&agrave; dịch vụ kiểm so&aacute;t (FSIS) của Mỹ sẽ kiểm tra tất cả c&aacute;c quy tr&igrave;nh &ldquo;tạo ra sản phẩm c&aacute; tra&rdquo; từ kh&acirc;u con giống&hellip; đến sản phẩm cuối c&ugrave;ng.</p>\r\n<p>&Ocirc;ng John P.Connelly, Chủ tịch Viện Thủy sản Mỹ (National Fisheries Institute) trong buổi l&agrave;m việc với Hiệp hội chế biến v&agrave; xuất khẩu thủy sản Việt Nam (VASEP) h&ocirc;m nay 8-12, cho biết, để tiếp tục xuất khẩu c&aacute; tra v&agrave;o thị trường Mỹ, Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển N&ocirc;ng th&ocirc;n sẽ phải gởi cho ph&iacute;a Mỹ danh s&aacute;ch những doanh nghiệp đang v&agrave; c&oacute; mong muốn xuất khẩu c&aacute; tra sang Mỹ. V&agrave; dĩ nhi&ecirc;n, những doanh nghiệp n&agrave;y phải chịu sự &ldquo;kiểm so&aacute;t&rdquo; tất cả c&aacute;c quy tr&igrave;nh trong kh&acirc;u sản xuất, chế biến c&aacute; tra.</p>\r\n<p>&ldquo;Về mặt l&yacute; thuyết, thời gian tới, Việt Nam sẽ c&oacute; một hệ thống ti&ecirc;u chuẩn cho con c&aacute; tra từ kh&acirc;u sản xuất giống đến nu&ocirc;i trồng, chế biến rồi xuất khẩu tương đương ti&ecirc;u chuẩn của Mỹ, c&ograve;n sau đ&oacute;, c&oacute; bao nhi&ecirc;u doanh nghiệp đ&aacute;p ứng được ti&ecirc;u chuẩn n&agrave;y hay kh&ocirc;ng l&agrave; một c&acirc;u chuyện kh&aacute;c&rdquo;, &ocirc;ng H&ograve;e của VASEP cho biết.</p>\r\n<p class=\"SGTOSuperTitle\">Kh&oacute; khăn cho doanh nghiệp</p>\r\n<p>Trong khi đ&oacute;, &ocirc;ng V&otilde; H&ugrave;ng Dũng, Ph&oacute; Chủ tịch ki&ecirc;m Tổng thư k&yacute; Hiệp hội c&aacute; tra Việt Nam, n&oacute;i rằng việc Mỹ thực hiện quy định gi&aacute;m s&aacute;t mới với c&aacute; da trơn c&oacute; thể khiến ng&agrave;nh c&aacute; tra, ba sa c&oacute; nguy cơ mất thị trường Mỹ, vốn chiếm 20% kim ngạch xuất khẩu của Việt Nam.</p>\r\n<p>Thực tế, để điều kiện sản xuất c&aacute; tra của Việt Nam đ&aacute;p ứng ti&ecirc;u chuẩn của một nước c&oacute; tr&igrave;nh độ ph&aacute;t triển như Mỹ cực kỳ kh&oacute; khăn. Ngay cả Nghị định 36 về c&aacute; tra nhằm n&acirc;ng cao một số ti&ecirc;u chuẩn chất lượng trong nước cũng đ&atilde; vấp phải sự phản ứng của doanh nghiệp, n&oacute;i chi &aacute;p dụng theo ti&ecirc;u chuẩn Mỹ.</p>\r\n<p>Hoa Kỳ đưa ra quy định kiểm tra n&agrave;y với l&yacute; do nh&agrave; sản xuất của Mỹ sản xuất như vậy th&igrave; doanh nghiệp nước ngo&agrave;i muốn xuất khẩu c&aacute; v&agrave;o Mỹ cũng phải &aacute;p dụng tương tự. Nhưng ti&ecirc;u chuẩn l&agrave; do họ đưa ra v&agrave; họ tự c&ocirc;ng nhận chứ kh&ocirc;ng phải do b&ecirc;n thứ ba. &ldquo;Cho n&ecirc;n, nếu họ muốn dựng l&ecirc;n r&agrave;o cản, ngăn cản c&aacute; tra, ba sa v&agrave;o Mỹ th&igrave; đ&acirc;y l&agrave; một r&agrave;o cản c&oacute; thẩm quyền thuộc về họ&rdquo;, &ocirc;ng Dũng n&oacute;i.</p>\r\n<p>Thực tế, trước đ&acirc;y Th&aacute;i Lan cũng đ&atilde; bị Mỹ &aacute;p dụng đạo luật n&agrave;y với mặt h&agrave;ng thịt g&agrave;. Sau đ&oacute;, Th&aacute;i Lan đ&atilde; đấu tranh nhiều năm nhưng ph&iacute;a Mỹ vẫn &aacute;p dụng ti&ecirc;u chuẩn tương đương.</p>\r\n<p>Đ&atilde; c&oacute; &yacute; kiến trong cộng đồng doanh nghiệp l&agrave; n&ecirc;n kiện Hoa Kỳ ra WTO, song &ocirc;ng Dũng cho hay, việc kiện tụng rất kh&oacute; khăn v&igrave; li&ecirc;n quan tới chi ph&iacute; kiện tụng. Hơn nữa, liệu kiện c&oacute; thắng kh&ocirc;ng, sau kiện l&agrave; g&igrave;, ai sẽ chi trả khoản ph&iacute; đ&oacute;, thu&ecirc; mướn luật sư Mỹ ra sao để kiện lại ch&iacute;nh phủ Mỹ? Đ&acirc;y l&agrave; một loạt c&acirc;u hỏi cần phải trả lời trước khi kiện tụng.</p>\r\n<p class=\"SGTOSuperTitle\">Gấp r&uacute;t sửa đổi quy định</p>\r\n<p>Theo &ocirc;ng Nguyễn Ngọc Oai, Ph&oacute; Tổng cục trưởng Tổng cục Thủy sản, Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển N&ocirc;ng th&ocirc;n (NNPTNT), Bộ đang nghi&ecirc;n cứu sửa lại Nghị định 36, đặc biệt l&agrave; th&ocirc;ng tư 23 để ph&ugrave; hợp với ti&ecirc;u chuẩn tương đương m&agrave; Hoa Kỳ đưa ra.</p>\r\n<p>Thực tế, quy định mới của Hoa Kỳ kh&ocirc;ng chỉ &aacute;p dụng ri&ecirc;ng cho Việt Nam m&agrave; đối với tất cả c&aacute;c nước xuất khẩu c&aacute; tra, c&aacute; ba sa v&agrave;o nước n&agrave;y. Thời gian Hoa Kỳ &aacute;p dụng quy định mới rất gấp n&ecirc;n sẽ g&acirc;y kh&oacute; khăn cho doanh nghiệp xuất khẩu cũng như hệ thống quản l&yacute; nh&agrave; nước Việt Nam.</p>\r\n<p>Do đ&oacute;, theo Bộ trưởng NNPTNT Cao Đức Ph&aacute;t, từ nay đến đầu th&aacute;ng 3-2016, Bộ NNPTNT sẽ phối hợp với Hiệp hội chế biến v&agrave; xuất khẩu thủy sản (VASEP) gửi cho Mỹ danh s&aacute;ch c&aacute;c doanh nghiệp c&oacute; mong muốn tiếp tục xuất khẩu c&aacute; tra, c&aacute; ba sa v&agrave;o Mỹ, cũng như cung cấp c&aacute;c th&ocirc;ng tin cho Mỹ về c&aacute;c hệ thống luật ph&aacute;p, hệ thống quản l&yacute; nh&agrave; nước về an to&agrave;n thực phẩm trong sản xuất chế biến c&aacute; tra, c&aacute; ba sa của Việt Nam theo như y&ecirc;u cầu của ph&iacute;a Hoa Kỳ.</p>\r\n<p>Kể từ th&aacute;ng 3-2016 trở đi sẽ l&agrave; khoảng thời gian chuyển tiếp 18 th&aacute;ng. Trong 18 th&aacute;ng n&agrave;y, Việt Nam sẽ phải cung cấp c&aacute;c tư liệu để chứng minh rằng Việt Nam c&oacute; hệ thống quản l&yacute; đối với sản xuất, chế biến c&aacute; da trơn tương đồng với Mỹ. &ldquo;Đ&acirc;y l&agrave; quan ngại lớn, bởi hệ thống quản l&yacute; sản xuất, chế biến c&aacute; da trơn của Việt Nam v&agrave; Mỹ đang c&oacute; nhiều sự kh&aacute;c biệt&rdquo;, Bộ trưởng Ph&aacute;t n&oacute;i.</p>\r\n<p>C&ograve;n về d&agrave;i hạn, Bộ NNPTNT đ&atilde; y&ecirc;u cầu c&aacute;c đơn vị chuy&ecirc;n m&ocirc;n r&agrave; so&aacute;t, đối chiếu thật cụ thể, chi tiết để xem giữa quy định trong nước đang &aacute;p dụng c&ograve;n chỗ n&agrave;o chưa ph&ugrave; hợp, chưa tương đồng với quy định mới của Hoa Kỳ để điều chỉnh.</p>\r\n<p>Hiện tại, trung b&igrave;nh mỗi năm, gi&aacute; trị xuất khẩu c&aacute; tra sang Mỹ dao động ở mức 300 triệu đ&ocirc; la Mỹ, tương đương khoảng 20% tổng gi&aacute; trị xuất khẩu c&aacute; tra. V&igrave; thế, theo &ocirc;ng H&ograve;e, những quy định mới của Mỹ &iacute;t nhiều g&acirc;y kh&oacute; khăn cho c&aacute; tra xuất sang thị trường n&agrave;y.</p>\r\n<p>L&agrave; một người c&oacute; nhiều năm l&agrave;m việc trong lĩnh vực thủy sản, trải qua nhiều cuộc họp li&ecirc;n quan đến chuyện &aacute;p thế b&aacute;n ph&aacute; gi&aacute;, h&agrave;ng r&agrave;o kỹ thuật đối với c&aacute; tra v&agrave;o Mỹ, &ocirc;ng H&ograve;e cho rằng, những hệ thống quy định m&agrave; FSIS đưa ra ở một kh&iacute;a cạnh n&agrave;o đ&oacute; l&agrave; nhằm bảo hộ cho ng&agrave;nh c&aacute; da trơn&nbsp;<em>(catfish)</em>&nbsp;của Mỹ.</p>\r\n<p>&ldquo;&Yacute; tưởng đưa c&aacute; da trơn v&agrave;o một chuỗi kiểm so&aacute;t bắt đầu từ Farm Bill 2008,... v&agrave; &yacute; tưởng n&agrave;y đ&atilde; bị phản đối từ nhiều b&ecirc;n v&agrave; hiện nay vẫn đang tiếp tục nhận phản đối từ một số nghĩ sĩ ở Mỹ. Theo t&ocirc;i, những g&igrave; m&agrave; ph&iacute;a Mỹ đang đưa ra c&oacute; thể xem như một h&agrave;ng r&agrave;o kỹ thuật để bảo hộ cho ng&agrave;nh sản xuất c&aacute; da trơn của Mỹ&rdquo;, &ocirc;ng H&ograve;e n&oacute;i.</p>\r\n<table class=\"sgtobox1center\" width=\"100%\" cellspacing=\"0\" cellpadding=\"7\" align=\"center\">\r\n<tbody>\r\n<tr>\r\n<td>\r\n<p>Ng&agrave;y 2-12-2015, Cơ quan gi&aacute;m s&aacute;t an to&agrave;n thực phẩm (Bộ N&ocirc;ng nghiệp Hoa Kỳ) đ&atilde; quyết định ban h&agrave;nh \"quy định cuối c&ugrave;ng\" về việc thiết lập chương tr&igrave;nh gi&aacute;m s&aacute;t đối với c&aacute;c lo&agrave;i c&aacute; thuộc bộ Siluriformes, trong đ&oacute; c&oacute; c&aacute; da trơn v&agrave; c&aacute; tra của Việt Nam.</p>\r\n<p>\"Quy định cuối c&ugrave;ng\" được triển khai theo y&ecirc;u cầu của Luật N&ocirc;ng nghiệp 2014 (Farm Bill 2014) của Hoa Kỳ v&agrave; &aacute;p dụng đối với tất cả c&aacute;c lo&agrave;i c&aacute; thuộc bộ Siluriformes, tức c&aacute; da trơn nu&ocirc;i trồng nội địa v&agrave; nhập khẩu. Quy định n&agrave;y sẽ c&oacute; hiệu lực bắt đầu từ th&aacute;ng 3-2016, tức 90 ng&agrave;y sau khi đăng C&ocirc;ng b&aacute;o Li&ecirc;n bang.</p>\r\n<p>Một trong những nội dung quan trọng của quy định n&agrave;y l&agrave; Hoa Kỳ sẽ &aacute;p dụng quy tr&igrave;nh gi&aacute;m s&aacute;t chặt chẽ từ kh&acirc;u sản xuất, chế biến đối với c&aacute; tra v&agrave; c&aacute; ba sa của tất c&aacute;c nước xuất khẩu v&agrave;o Hoa Kỳ theo ti&ecirc;u chuẩn phải tương đương với ti&ecirc;u chuẩn m&agrave; Hoa Kỳ đang &aacute;p dụng.</p>\r\n<p>Đồng thời, quy định mới cũng y&ecirc;u cầu quy tr&igrave;nh gi&aacute;m s&aacute;t từ kh&acirc;u sản xuất, chế biến c&aacute; tra, c&aacute; ba sa phải tương tự như quy tr&igrave;nh gi&aacute;m s&aacute;t đối với thịt v&agrave; sản phẩm thịt của Hoa Kỳ đang &aacute;p dụng.</p>\r\n<p>C&ugrave;ng với sự thay đổi n&agrave;y, Hoa Kỳ cũng sẽ thay đổi thẩm quyền gi&aacute;m s&aacute;t c&aacute;c sản phẩm c&aacute; tra, c&aacute; ba sa, kể cả sản phẩm sản xuất trong nước v&agrave; sản phẩm nhập khẩu, từ Cục Quản l&iacute; Thực phẩm v&agrave; Dược phẩm (FDA) trước đ&acirc;y chuyển sang cho Cục Kiểm dịch, Thanh tra An to&agrave;n thực phẩm (FSIS).</p>\r\n<p>Trong giai đoạn chuyển giao thẩm quyền gi&aacute;m s&aacute;t của FDA cho FSIS, Hoa Kỳ sẽ c&oacute; giai đoạn chuyển đổi, theo đ&oacute; trước ng&agrave;y 2-3-2016, c&aacute;c nước hiện đang xuất khẩu sản phẩm c&aacute; c&aacute;, c&aacute; ba sa v&agrave;o Hoa Kỳ, nếu c&oacute; mong muốn tiếp tục xuất khẩu cần phải cung cấp danh s&aacute;ch c&aacute;c cơ sở sản xuất kinh doanh hiện đang xuất khẩu, cũng như c&aacute;c t&agrave;i liệu bằng văn bản để chứng minh thẩm quyền được xuất khẩu cũng như tu&acirc;n thủ theo những quy định nhập khẩu hiện h&agrave;nh của FDA.</p>\r\n<p>Trong 18 th&aacute;ng chuyển đổi, FSIS sẽ tiến h&agrave;nh t&aacute;i gi&aacute;m s&aacute;t v&agrave; lấy mẫu ngẫu nhi&ecirc;n &iacute;t nhất 1 lần/qu&yacute; tại cơ sở xuất khẩu sang Hoa Kỳ để gi&aacute;m định về chủng loại c&aacute; cũng như dư lượng h&oacute;a chất c&oacute; trong c&aacute;c l&ocirc; h&agrave;ng c&aacute; thuộc bộ Siluriformes. Sau khi kết th&uacute;c thời gian chuyển đổi 18 th&aacute;ng n&agrave;y, c&aacute;c nước muốn tiếp tục xuất khẩu phải nộp tiếp hồ sơ để Hoa Kỳ xem x&eacute;t Ti&ecirc;u chuẩn tương đồng&hellip;</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 423, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(9, 'Nguồn cung cấp bột cá nhiều triển vọng trong ngắn hạn, nhưng cần giải pháp lâu dài', 'nguon-cung-cap-bot-ca-nhieu-trien-vong-trong-ngan-han-nhung-can-giai-phap-lau-dai', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 1, 'Một báo cáo mới của Rabobank cho thấy các nguồn cung cấp bột cá thế giới đang ổn định, đặt ra mối hoài nghi về các chiến lược tăng trưởng hiện tại cho thị trường protein thay thế.', '<p>B&aacute;o c&aacute;o mới nhất của Rabobank, xem x&eacute;t t&igrave;nh h&igrave;nh hiện tại của thị trường bột c&aacute; to&agrave;n cầu, cho thấy sau ba năm nguồn cung c&aacute; cơm Peru ở mức thấp, sản lượng thu hoạch đ&atilde; được cải thiện trong năm nay. Nghi&ecirc;n cứu cho thấy điều n&agrave;y chủ yếu l&agrave; do sự vắng mặt của El Nino, sự n&oacute;ng l&ecirc;n của nhiệt độ bề mặt biển xảy ra v&agrave;i năm một lần ở v&ugrave;ng Th&aacute;i B&igrave;nh Dương, x&iacute;ch đạo, Trung Đ&ocirc;ng v&agrave; ảnh hưởng đến sự ph&acirc;n bố địa l&yacute; của c&aacute;c nguồn lợi thủy sản.</p>\r\n<p>Sự gia tăng sản lượng c&aacute; cơm đ&atilde; l&agrave;m tăng nguồn cung cấp bột c&aacute; v&agrave; dầu c&aacute;, v&agrave; xu hướng n&agrave;y sẽ tiếp tục trong ngắn hạn.</p>\r\n<p>Theo c&aacute;c t&aacute;c giả của b&aacute;o c&aacute;o, Gorjan Nikolik v&agrave; Beyhan de Jong, ng&agrave;nh nu&ocirc;i trồng thuỷ sản hiện ti&ecirc;u thụ 70% lượng bột c&aacute; v&agrave; 73% lượng dầu c&aacute;. Ng&agrave;nh chăn nu&ocirc;i lợn chiếm 22% thị trường bột c&aacute; v&agrave; ng&agrave;nh chăn nu&ocirc;i g&agrave; chiếm th&ecirc;m 6%, v&agrave; ti&ecirc;u d&ugrave;ng trực tiếp của con người chiếm 21% thị trường dầu c&aacute;.</p>\r\n<p>Số liệu của Tổ chức N&ocirc;ng Lương Li&ecirc;n Hợp Quốc (FAO) cho thấy 2/3 diện t&iacute;ch nu&ocirc;i trồng thủy sản to&agrave;n cầu hiện nay dựa tr&ecirc;n diện t&iacute;ch canh t&aacute;c rộng lớn, sử dụng &iacute;t thức ăn nu&ocirc;i trồng thủy sản. Tuy nhi&ecirc;n, việc nu&ocirc;i th&acirc;m canh c&aacute;c lo&agrave;i như c&aacute; hồi, t&ocirc;m, c&aacute; da trơn, c&aacute; r&ocirc; phi, c&aacute; m&uacute;, v&agrave; c&aacute; tr&aacute;p biển tạo ra nhu cầu lớn về bột c&aacute; v&agrave; dầu c&aacute;. Nikolik v&agrave; de Jong mong đợi c&aacute;c lo&agrave;i mới hơn bao gồm c&aacute; ngừ v&acirc;y xanh, c&aacute;c lo&agrave;i thủy sản Amazon v&agrave; c&aacute; gi&ograve; sẽ dẫn dắt nhu cầu tương lai về bột c&aacute; v&agrave; dầu c&aacute;, được dự đo&aacute;n sẽ c&oacute; tỷ lệ tăng trưởng h&agrave;ng năm 6% cho đến năm 2020.</p>\r\n<p>Nikolik v&agrave; de Jong cho biết: &ldquo;Xu hướng nu&ocirc;i thủy sản th&acirc;m canh l&agrave;m tăng nhu cầu thức ăn nu&ocirc;i trồng thủy sản. Th&ecirc;m v&agrave;o đ&oacute;, hầu hết c&aacute;c lo&agrave;i nu&ocirc;i mới l&agrave; động vật ăn thịt, điều n&agrave;y l&agrave;m tăng hơn nữa nhu cầu bột c&aacute; v&agrave; dầu c&aacute;&rdquo;.</p>\r\n<p>Khai th&aacute;c thủy sản to&agrave;n cầu đ&atilde; bị suy giảm kể từ những năm 1980, v&agrave; nguồn cung bột c&aacute; giảm xuống mức thấp l&agrave; 4,2 triệu tấn v&agrave;o năm 2016 từ mức cao khoảng 7 triệu tấn năm 2000. C&aacute;c t&aacute;c giả cho biết nguồn cung bột c&aacute; bị ảnh hưởng bởi c&aacute;c h&igrave;nh thức thu hoạch yếu k&eacute;m v&agrave; việc tăng cường sử dụng c&aacute;c lo&agrave;i c&aacute; biển nhỏ để ti&ecirc;u thụ trực tiếp, cũng như c&aacute;c điều kiện kh&iacute; hậu, đặc biệt l&agrave; El Ni&ntilde;o. Nguồn cung hiện dự kiến ​​sẽ ổn định, nhưng trong d&agrave;i hạn sản lượng c&aacute; biển dự kiến kh&ocirc;ng tăng trưởng hơn nữa do giới hạn về hạn ngạch.</p>\r\n<p>Nhu cầu từ ng&agrave;nh thức ăn nu&ocirc;i trồng thủy sản đ&atilde; tăng đều trong suốt thời gian n&agrave;y, v&agrave; mặc d&ugrave; ng&agrave;nh thức ăn nu&ocirc;i trồng thủy sản giảm lượng bột c&aacute; trong thức ăn từ khoảng 70% trong những năm 1990 xuống c&ograve;n 25% hiện tại, vẫn c&oacute; sự ch&ecirc;nh lệch giữa nguồn cung dự kiến ​​v&agrave; nhu cầu trong tương lai. C&aacute;c c&ocirc;ng ty thức ăn nu&ocirc;i trồng thủy sản lớn đ&atilde; thử nghiệm thức ăn nu&ocirc;i trồng thủy sản kh&ocirc;ng c&oacute; th&agrave;nh phần bột c&aacute;, nhưng những người trong ng&agrave;nh n&agrave;y vẫn đồng quan điểm l&agrave; loại thức ăn n&agrave;y hiện nay vẫn chưa phải l&agrave; loại thức ăn tối ưu cho c&aacute;c lo&agrave;i thủy sản.</p>\r\n<p>Thị trường đ&atilde; đ&aacute;p ứng một phần nhu cầu protein th&ocirc;ng qua việc tăng cường sử dụng c&aacute;c bộ phận của c&aacute;c lo&agrave;i thủy sản cho con người, nguồn protein từ thực vật v&agrave; protein từ động vật chế biến v&agrave; c&aacute;c sản phẩm phụ từ động vật như bột l&ocirc;ng vũ v&agrave; bột m&aacute;u. C&aacute;c quy định n&agrave;y l&agrave; kh&aacute;c nhau giữa c&aacute;c quốc gia v&agrave; c&aacute;c nguy&ecirc;n liệu thay thế n&agrave;y kh&ocirc;ng được chấp nhận rộng r&atilde;i, điều n&agrave;y l&agrave;m phức tạp th&ecirc;m nguồn cung thị trường.</p>\r\n<p>Nhiều người đang l&agrave;m việc trong ng&agrave;nh sản xuất bột c&aacute; đang nghi&ecirc;n cứu t&igrave;m ra c&aacute;c chất thay thế cho protein động vật. C&aacute;c nguy&ecirc;n liệu tiềm năng nhất trong l&agrave; trong c&aacute;c nguồn protein vi khuẩn v&agrave; nguồn protein dựa tr&ecirc;n c&ocirc;n tr&ugrave;ng v&agrave; dầu tảo. Con người đang rất nỗ lực v&agrave; nhiều quỹ đang t&igrave;m kiếm c&aacute;c nguy&ecirc;n liệu thay thế v&agrave; c&aacute;c c&ocirc;ng ty mới đang được khuyến kh&iacute;ch tham gia v&agrave;o lĩnh vực n&agrave;y th&ocirc;ng qua c&aacute;c s&aacute;ng kiến ​​như Challenge F3 Fish-Free Feed (thức ăn nu&ocirc;i trồng thủy sản kh&ocirc;ng c&oacute; th&agrave;nh phần bột c&aacute;).</p>\r\n<p>C&aacute;c v&iacute; dụ về quy m&ocirc; thương mại của c&aacute;c c&ocirc;ng ty đ&atilde; sản xuất ra c&aacute;c protein mới bao gồm một li&ecirc;n doanh của Brazil giữa TerraVia v&agrave; Bunge trong việc th&agrave;nh lập một nh&agrave; m&aacute;y sản xuất dầu tảo quy m&ocirc; lớn v&agrave; FeedKind Aqua của Calysta, trong đ&oacute; Cargill đ&atilde; đầu tư v&agrave;o việc th&agrave;nh lập nh&agrave; m&aacute;y l&ecirc;n men kh&iacute; lớn nhất thế giới tại Memphis, Tennessee.</p>\r\n<p>FeedKind Aqua của Calysta, UniProtein của Unibo v&agrave; Mango Materials đều sử dụng kh&iacute; m&ecirc;-tan l&agrave;m nguy&ecirc;n liệu để sản xuất ra vi khuẩn sinh học. KnipBio sử dụng ethanol v&agrave; methanol, v&agrave; Novo Nutrients của Oakbio sử dụng carbon dioxide v&agrave; chất thải carbon. Một lợi thế lớn của c&aacute;c nguồn protein như vậy l&agrave; sản xuất bền vững, sử dụng &iacute;t nước v&agrave; kh&ocirc;ng cần đất n&ocirc;ng nghiệp, v&agrave; kh&ocirc;ng g&acirc;y t&aacute;c động đến chuỗi thức ăn của con người.</p>\r\n<p>Nikolik v&agrave; de Jong nhận thấy rằng protein từ c&ocirc;n tr&ugrave;ng c&oacute; tiềm năng l&agrave; một trong những nguồn cung cấp thức ăn thay thế bền vững nhất, nhưng cần đầu tư lớn hơn để đạt được quy m&ocirc; thương mại. Nguồn protein bao gồm kiến l&iacute;nh đen, ấu tr&ugrave;ng bọ, ch&acirc;u chấu v&agrave; dế.</p>\r\n<p>C&aacute;c r&agrave;o cản ph&aacute;p l&yacute; đ&atilde; ngăn cản việc đưa protein từ c&ocirc;n tr&ugrave;ng v&agrave;o thức ăn nu&ocirc;i trồng thủy sản, nhưng việc sử dụng loại nguy&ecirc;n liệu n&agrave;y trong thức ăn nu&ocirc;i trồng thủy sản đ&atilde; được Li&ecirc;n minh Ch&acirc;u &Acirc;u ph&ecirc; duyệt bắt đầu từ th&aacute;ng 7 năm 2017.</p>\r\n<p>Nikolik v&agrave; de Jong cho biết: &ldquo;X&eacute;t về sự c&oacute; mặt của một số dự &aacute;n protein thay thế tr&ecirc;n to&agrave;n cầu, ch&uacute;ng ta c&oacute; thể ước t&iacute;nh c&oacute; th&ecirc;m khoảng 500.000 tấn protein thay thế chất lượng cao trong thức ăn nu&ocirc;i trồng thủy sản v&agrave;o năm 2022. Với sự đ&oacute;ng g&oacute;p c&ograve;n lại của ng&agrave;nh từ sản lượng đ&aacute;nh bắt tự nhi&ecirc;n, tổng sản lượng bột c&aacute; c&oacute; thể đạt 5,4 triệu tấn v&agrave;o năm 2022&rdquo;.</p>\r\n<p><strong><em>HNN (Theo seafoodsource)</em></strong></p>', 425, 1, '2020-10-13 14:22:32', '2021-02-04 10:51:56', 1, 0),
(10, 'Giá bột cá Peru tăng lên đến 2.400 USD/tấn', 'gia-bot-ca-peru-tang-len-den-2-400-usd-tan', '/daucalxag/files/upload/image/tin-tuc/tin-te635512048589775454.jpg', 1, '', '<h2 class=\"txtDescNewDetail\"><span style=\"font-size: 18pt;\">Gi&aacute; bột c&aacute; từ Peru đ&atilde; tăng mạnh do nguồn cung khan hiếm. Sau khi Viện nghi&ecirc;n cứu h&agrave;ng hải P&ecirc;ru (Imarpe) đ&igrave;nh chỉ đ&aacute;nh bắt c&aacute; cơm trong vụ 2, gi&aacute; bột c&aacute; phẩm cấp cao nhất đ&atilde; đạt 2.400 USD/ tấn (gi&aacute; FOB tại Peru). Giữa th&aacute;ng 10, gi&aacute; mới dừng ở mức 2.100 USD/tấn.</span></h2>\r\n<p style=\"font-weight: 400;\">Trước khi hội nghị IFFO, 40.000 tấn đ&atilde; được b&aacute;n ra ở mức 2.100 USD/ tấn cho loại phẩm cấp cao nhất v&agrave; 1.950 USD / tấn đối với loại ti&ecirc;u chuẩn. Trong hội nghị, đ&atilde; c&oacute; giao dịch cho 10.000 tấn, với gi&aacute; 2.300 USD/ tấn cho loại phẩm cấp cao nhất v&agrave; 2.100 USD/ tấn đối với loại ti&ecirc;u chuẩn. Cho đến th&aacute;ng 5/2015, Peru sẽ kh&ocirc;ng c&oacute; nguồn bột c&aacute;. Do nguồn cung hạn chế n&ecirc;n c&oacute; hồ sơ dự thầu tăng đến mức 2.400 USD/ tấn cho loại phẩm cấp cao nhất.&nbsp;</p>\r\n<p style=\"font-weight: 400;\"><strong>Triển vọng ảm đạm</strong></p>\r\n<p style=\"font-weight: 400;\">Tại hội nghị IFFO, Hiệp hội Thủy sản Quốc gia Peru cho biết, sẽ khảo s&aacute;t trữ lượng c&aacute; cơm trong nửa đầu th&aacute;ng 12. Hai phương ph&aacute;p được &aacute;p dụng l&agrave; khảo s&aacute;t trong 1 th&aacute;ng v&agrave; c&acirc;u thử nghiệm trong 2 ng&agrave;y. Về phương ph&aacute;p c&acirc;u thử nghiệm, thời điểm n&agrave;y kh&oacute; c&oacute; thể đạt được kết quả cao.</p>\r\n<p style=\"font-weight: 400;\">Gi&aacute;&nbsp;&nbsp;tăng cao khiến người mua bột c&aacute; Trung Quốc phải t&igrave;m nguồn thay thế. Đối với dầu c&aacute;, nguồn cung cấp l&agrave; một vấn đề lớn.</p>\r\n<p style=\"font-weight: 400;\">Trong vụ c&aacute; cơm đầu ti&ecirc;n của Peru trong năm nay, sản lượng chỉ đạt 1,7 triệu tấn trong khi TAC cho vụ n&agrave;y l&agrave; 2,53 triệu tấn. Với lượng n&agrave;y, sẽ sản xuất được khoảng 380.000 tấn bột c&aacute;, thấp hơn so với c&aacute;c năm trước. Do hiện tượng El Nino, sản lượng đ&aacute;nh bắt vụ sau năm 2014 sẽ đạt khoảng 1,45 triệu tấn.</p>', 447, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(11, 'TRUNG QUỐC TĂNG MUA BỘT CÁ VIỆT NAM', 'trung-quoc-tang-mua-bot-ca-viet-nam', '', 1, '', '<p>Vụ đ&aacute;nh bắt c&aacute; tại Peru sẽ bắt đầu v&agrave;o cuối th&aacute;ng 11 hoặc đầu th&aacute;ng 12 tới nhưng theo khảo s&aacute;t của Viện Hải dương học Peru (Imarpe), trữ lượng c&aacute; m&ugrave;a đ&ocirc;ng n&agrave;y sẽ chỉ đạt khoảng 1,5 triệu tấn, từ hơn 10 triệu tấn v&agrave;o m&ugrave;a xu&acirc;n. Khi đ&oacute;, sản lượng bột c&aacute; trong năm 2014 c&oacute; thể sẽ giảm tới hơn 40%, xuống c&ograve;n 700.000 tấn. Trữ lượng c&aacute; thấp như vậy c&oacute; thể l&agrave; do những bất thường về kh&iacute; hậu v&agrave; điều kiện m&ocirc;i trường dọc bờ biển Peru đẩy c&aacute; ra xa hơn khỏi khu vực đ&aacute;nh bắt c&aacute; truyền thống.</p>\r\n<p>Trong gần một th&aacute;ng trở lại đ&acirc;y, gi&aacute; bột c&aacute; đ&atilde; tăng một c&aacute;ch ch&oacute;ng mặt, gi&aacute; bột c&aacute; Peru loại 65% protein đ&atilde; tăng từ mức 1.680 đ&ocirc; la Mỹ/tấn (FOB) hồi giữa th&aacute;ng 10, l&ecirc;n mức 2.060 đ&ocirc; la/tấn (FOB) v&agrave;o đầu th&aacute;ng 11. Nguồn cung bột c&aacute; đang cực kỳ khan hiếm, hiện tồn kho bột c&aacute; Peru chỉ c&ograve;n khoảng 30.000 - 35.000 tấn v&agrave; chủ yếu l&agrave; bột c&aacute; phẩm cấp thấp.</p>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>Việc gi&aacute; bột c&aacute; Peru tăng cao đ&atilde; ảnh hưởng rất lớn đến Trung Quốc bởi nước n&agrave;y l&agrave; nh&agrave; nhập khẩu bột c&aacute; lớn nhất thế giới, chiếm tới 85% sản lượng bột c&aacute; xuất khẩu của Peru. C&aacute;c nh&agrave; nhập khẩu nước n&agrave;y đang chuyển hướng sang t&igrave;m kiếm c&aacute;c nguồn cung kh&aacute;c để thay thế. Hiện ở ch&acirc;u &Acirc;u, Trung Quốc chủ yếu nhập h&agrave;ng từ Đan Mạch do Iceland v&agrave; Na Uy chưa c&oacute; giấy ph&eacute;p xuất khẩu bột c&aacute; sang nước n&agrave;y. Tuy nhi&ecirc;n, nguồn cung bột c&aacute; Đan Mạch cũng kh&ocirc;ng lớn n&ecirc;n Trung Quốc đang thiếu hụt nghi&ecirc;m trọng bột c&aacute;.</div>\r\n<div>&nbsp;</div>\r\n<div>Gần đ&acirc;y, c&oacute; tin cho biết c&aacute;c thương l&aacute;i Việt Nam đ&atilde; bắt đầu vận chuyển bột c&aacute; Việt Nam l&ecirc;n cửa khẩu ph&iacute;a Bắc để b&aacute;n cho ph&iacute;a Trung Quốc, khiến cho gi&aacute; bột c&aacute; nội địa đang rục rịch tăng. Bột c&aacute; 60% đạm v&agrave; 65% đạm tại kho Ki&ecirc;n Giang đang được ch&agrave;o lần lượt ở mức 26.300 - 26.850 đồng/kg v&agrave; 30.000 - 30.300 đồng/kg, tương ứng tăng800 - 1.350 đồng/kg v&agrave; 300 đồng/kg so với tuần trước.</div>\r\n<div>&nbsp;</div>\r\n<div>Nhu cầu của Trung Quốc c&oacute; thể sẽ kh&aacute; lớn bởi giai đoạn cuối năm nhu cầu bột c&aacute; cho sản xuất thức ăn thủy sản của nước n&agrave;y tăng cao, trong khi vụ đ&aacute;nh bắt c&aacute; của Peru chưa bắt đầu. Do đ&oacute;, việc gi&aacute; bột c&aacute; của Peru tăng cao trong một th&aacute;ng trở lại đ&acirc;y c&oacute; thể khiến cho c&aacute;c nh&agrave; nhập khẩu Trung Quốc chuyển sang nhập khẩu từ c&aacute;c nước kh&aacute;c thay thế, trong đ&oacute; c&oacute; Việt Nam.</div>\r\n<div>&nbsp;</div>\r\n<div>Tuy nhi&ecirc;n, trong khoảng thời gian cuối năm nay v&agrave; đầu năm tới nguồn cung bột c&aacute; biển kh&ocirc;ng c&oacute; nhiều bởi rộ vụ khai th&aacute;c l&agrave; giai đoạn từ th&aacute;ng 5 đến th&aacute;ng 8. Trong bối cảnh nhu cầu mua của c&aacute;c nh&agrave; m&aacute;y thức ăn thủy sản trong nước tăng, cộng với nhu cầu gom h&agrave;ng để xuất đi Trung Quốc th&igrave; nhiều khả năng gi&aacute; bột c&aacute; sẽ tăng kh&aacute; mạnh trong thời gian tới.</div>\r\n<div>&nbsp;</div>\r\n<div>Việc gi&aacute; bột c&aacute; nội địa tăng sẽ khiến cho c&aacute;c nh&agrave; m&aacute;y sản xuất thức ăn thủy sản nội địa phải chịu chi ph&iacute; lớn hơn cho việc mua nguy&ecirc;n liệu, đẩy chi ph&iacute; sản xuất của ng&agrave;nh thủy sản tăng l&ecirc;n.</div>\r\n<div>&nbsp;</div>\r\n<div><strong><em>Nguồn: Thời b&aacute;o Kinh tế S&agrave;i G&ograve;n</em></strong></div>', 489, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(12, 'TIÊU CHUẨN CHO BỘT CÁ BIỂN TỐT', 'tieu-chuan-cho-bot-ca-bien-tot', '', 1, '', '<p>Từ bao đời nay, thi&ecirc;n nhi&ecirc;n ưu đ&atilde;i cho ngư trường khai th&aacute;c hải sản với nguồn lợi lớn. B&ecirc;n cạnh c&aacute;c loại hải sản c&oacute; gi&aacute; trị cao vẫn c&oacute; c&aacute;c loại c&aacute; nhỏ, c&aacute; tạp c&oacute; gi&aacute; trị thấp. Một c&aacute;ch để n&acirc;ng cao gi&aacute; trị của c&aacute;c loại c&aacute; n&agrave;y l&agrave; chế biến c&aacute;c loai c&aacute; tạp th&agrave;nh bột c&aacute; &ndash; nguồn nguy&ecirc;n liệu ch&iacute;nh trong sản xuất thức ăn chăn nu&ocirc;i.</p>\r\n<p>Bột c&aacute; được chế biến từ thịt c&aacute;, c&aacute; tạp, c&aacute; nguy&ecirc;n con, đầu v&agrave; xương c&aacute; hay c&aacute;c phụ phẩm kh&aacute;c từ qu&aacute; tr&igrave;nh chế biến c&aacute;. Hiện tại ở Việt Nam bột c&aacute; được sản xuất từ 2 nguồn nguy&ecirc;n liệu ch&iacute;nh l&agrave; nguy&ecirc;n liệu c&aacute; biển (c&aacute; nước mặn) v&agrave; nguy&ecirc;n liệu c&aacute; tra (c&aacute; nước ngọt). Với c&aacute;c phụ phẩm c&aacute; v&agrave; c&aacute; kh&ocirc;ng đảm bảo quy c&aacute;ch, sau khi chế biến thu được bột c&aacute; d&ugrave;ng l&agrave;m nguy&ecirc;n liệu thức ăn chăn nu&ocirc;i gia s&uacute;c, gia cầm v&agrave; thủy hải sản.</p>\r\n<p>Trong thức ăn chăn nu&ocirc;i th&igrave; bột c&aacute; được xem như l&agrave; một trong những th&agrave;nh phần rất c&oacute; gi&aacute; trị. N&oacute; c&oacute; vị ngon v&agrave; chất lượng rất tốt, cung cấp đủ pr&ocirc;t&ecirc;in với c&aacute;c ax&iacute;t b&eacute;o thiết yếu gi&uacute;p vật nu&ocirc;i ph&aacute;t triển tốt. Do đ&oacute; việc ph&acirc;n t&iacute;ch th&agrave;nh phần c&aacute;c chất c&oacute; trong bột c&aacute; sẽ gi&uacute;p c&aacute;c nh&agrave; sản xuất biết r&otilde; chất lượng của sản phẩm đơn vị m&igrave;nh l&agrave;m ra cũng như gi&uacute;p c&aacute;c nh&agrave; ti&ecirc;u thụ an t&acirc;m về chất lượng của sản phẩm m&igrave;nh sử dụng.</p>\r\n<p>Ti&ecirc;u chuẩn bột c&aacute;:</p>\r\n<p style=\"text-align: center;\">Bảng 1: C&aacute;c chỉ ti&ecirc;u cảm quan của bột c&aacute;</p>\r\n<table style=\"margin-left: auto; margin-right: auto;\" border=\"1\" width=\"614\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 188px; text-align: center;\" rowspan=\"2\">\r\n<h5>Chỉ Ti&ecirc;u</h5>\r\n</td>\r\n<td style=\"width: 425px; text-align: center;\" colspan=\"3\">Hạng</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 151px; text-align: center;\">Hạng 1</td>\r\n<td style=\"width: 151px; text-align: center;\">\r\n<h2>Hạng 2</h2>\r\n</td>\r\n<td style=\"width: 123px; text-align: center;\">Hạng 3</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 188px; text-align: left;\">1. M&agrave;u sắc</td>\r\n<td style=\"width: 151px; text-align: center;\">N&acirc;u nhạt</td>\r\n<td style=\"width: 274px; text-align: center;\" colspan=\"2\">N&acirc;u đến n&acirc;u sẫm</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 188px; text-align: left;\">2. M&ugrave;i</td>\r\n<td style=\"width: 425px;\" colspan=\"3\">C&oacute; m&ugrave;i thơm đặc trưng của bột c&aacute;, kh&ocirc;ng c&oacute; m&ugrave;i mốc, m&ugrave;i h&ocirc;i hoặc m&ugrave;i kh&aacute;c lạ.</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 188px; text-align: left;\">3. Trạng th&aacute;i bền ngo&agrave;i</td>\r\n<td style=\"width: 425px;\" colspan=\"3\">Tơi, kh&ocirc;ng v&oacute;n cục, kh&ocirc;ng c&oacute; s&acirc;u mọt, kh&ocirc;ng mốc, kh&ocirc;ng lẫn vật lạ.</td>\r\n</tr>\r\n<tr>\r\n<td style=\"width: 188px; text-align: left;\">4. Độ mịn</td>\r\n<td style=\"width: 425px;\" colspan=\"3\">Bột c&aacute; phải lọt s&agrave;ng c&oacute; đường k&iacute;nh mắt s&agrave;ng 3,0mm, cho ph&eacute;p phần c&ograve;n lại tr&ecirc;n s&agrave;ng kh&ocirc;ng vượt qu&aacute; 5%.</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>Bột c&aacute; kh&ocirc;ng được chứa Samonella, E. Coli, c&aacute;c độc tố nấm mốc v&agrave; c&aacute;c chất độc hại. Dư lượng chất bảo quản v&agrave; c&aacute;c chất nhiễm bẩn kh&aacute;c kh&ocirc;ng được vượt qu&aacute; mức tối đa cho ph&eacute;p theo qui định hiện h&agrave;nh.</p>\r\n<p>2. Y&ecirc;u cầu về c&aacute;c chỉ ti&ecirc;u l&yacute; ho&aacute;</p>\r\n<p>Y&ecirc;u cầu về c&aacute;c chỉ ti&ecirc;u l&yacute; ho&aacute; của bột c&aacute; được qui định trong bảng 2.</p>\r\n<p style=\"text-align: center;\">Bảng 2: C&aacute;c chỉ ti&ecirc;u l&yacute; ho&aacute; của bột c&aacute;</p>\r\n<table style=\"margin-left: auto; margin-right: auto;\" border=\"1\" width=\"624\">\r\n<tbody>\r\n<tr>\r\n<td style=\"text-align: center;\" rowspan=\"2\" width=\"369\">\r\n<h5>Chỉ Ti&ecirc;u</h5>\r\n</td>\r\n<td style=\"text-align: center;\" colspan=\"3\" width=\"255\">Hạng</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: center;\" width=\"85\">Hạng 1</td>\r\n<td style=\"text-align: center;\" width=\"85\">Hạng 2</td>\r\n<td style=\"text-align: center;\" width=\"85\">Hạng 3</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">1. Độ ẩm, t&iacute;nh theo % khối lượng, kh&ocirc;ng lớn hơn</td>\r\n<td style=\"text-align: center;\" width=\"85\">10</td>\r\n<td style=\"text-align: center;\" width=\"85\">10</td>\r\n<td style=\"text-align: center;\" width=\"85\">10</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">2. H&agrave;m lượng protein th&ocirc;, t&iacute;nh theo % khối lượng, kh&ocirc;ng nhỏ hơn.</td>\r\n<td style=\"text-align: center;\" width=\"85\">60</td>\r\n<td style=\"text-align: center;\" width=\"85\">50</td>\r\n<td style=\"text-align: center;\" width=\"85\">40</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">3. H&agrave;m lượng chất b&eacute;o, t&iacute;nh theo % khối lượng, kh&ocirc;ng lớn hơn</td>\r\n<td style=\"text-align: center;\" width=\"85\">8</td>\r\n<td style=\"text-align: center;\" width=\"85\">10</td>\r\n<td style=\"text-align: center;\" width=\"85\">12</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">4. H&agrave;m lượng muối natriclorua, t&iacute;nh theo % khối lượng, kh&ocirc;ng lớn hơn</td>\r\n<td style=\"text-align: center;\" width=\"85\">2</td>\r\n<td style=\"text-align: center;\" width=\"85\">3</td>\r\n<td style=\"text-align: center;\" width=\"85\">5</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">5. H&agrave;m lượng tro kh&ocirc;ng tan trong axit Clohyđric (c&aacute;t sạn) t&iacute;nh theo % khối lượng, kh&ocirc;ng lớn hơn</td>\r\n<td style=\"text-align: center;\" width=\"85\">2</td>\r\n<td style=\"text-align: center;\" width=\"85\">2,5</td>\r\n<td style=\"text-align: center;\" width=\"85\">3</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">6. Mảnh vật rắn sắc nhọn.</td>\r\n<td style=\"text-align: center;\" width=\"85\">Kh&ocirc;ng c&oacute;</td>\r\n<td style=\"text-align: center;\" width=\"85\">Kh&ocirc;ng c&oacute;</td>\r\n<td style=\"text-align: center;\" width=\"85\">Kh&ocirc;ng c&oacute;</td>\r\n</tr>\r\n<tr>\r\n<td style=\"text-align: left;\" width=\"369\">7. H&agrave;m lượng nitơ bay hơi tổng số, t&iacute;nh theo mg/100g, kh&ocirc;ng lớn hơn</td>\r\n<td style=\"text-align: center;\" width=\"85\">150</td>\r\n<td style=\"text-align: center;\" width=\"85\">250</td>\r\n<td style=\"text-align: center;\" width=\"85\">350</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p style=\"text-align: center;\">&nbsp;</p>\r\n<p>ST internet</p>', 459, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(13, 'Mất cơ hội xuất khẩu 100 tấn mỡ cá chỉ vì thủ tục', 'mat-co-hoi-xuat-khau-100-tan-mo-ca-chi-vi-thu-tuc', '/daucalxag/files/upload/image/product/3-102017-1499250949084-19-0-466-720-crop-1499250955091.jpg', 3, '', '<div class=\"div-baiviet\">\r\n<p class=\"baiviet-sapo\">Đ&atilde; qu&aacute; hạn để xuất khẩu l&ocirc; mở c&aacute; sang Chile nhưng doanh nghiệp vẫn chưa biết v&agrave; li&ecirc;n hệ được cơ quan thẩm quyền n&agrave;o để xin cấp Giấy Chứng nhận xuất xứ hợp ph&aacute;p cho l&ocirc; h&agrave;ng mỡ c&aacute;.</p>\r\n</div>\r\n<div class=\"clear padT5\">&nbsp;</div>\r\n<div class=\"text-conent\">\r\n<p>Mới đ&acirc;y, Hiệp hội Chế biến v&agrave; Xuất khẩu Thủy sản Việt Nam (VASEP) đ&atilde; c&oacute; C&ocirc;ng văn số 105/2017 gửi Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển N&ocirc;ng th&ocirc;n xin cấp Giấy chứng nhận xuất xứ hợp ph&aacute;p sản phẩm mỡ c&aacute; xuất sang Chile sau khi nhận được phản &aacute;nh vướng mắc của c&ocirc;ng ty CP Vĩnh Ho&agrave;n về việc kh&oacute; khăn kh&ocirc;ng xin được Giấy chứng nhận xuất xứ hợp ph&aacute;p (Certificate of Legal Origin).</p>\r\n<p>Cụ thể, ng&agrave;y 31-5-2017, C&ocirc;ng ty cổ phần Vĩnh Ho&agrave;n k&yacute; hợp đồng để xuất khẩu 100 tấn mỡ c&aacute; v&agrave;o thị trường Chile, dự kiến xuất h&agrave;ng trong th&aacute;ng 6-2017. Thủ tục nhập khẩu của Chile quy định phải c&oacute; Giấy chứng nhận xuất xứ hợp ph&aacute;p (Certificate of Legal Origin).</p>\r\n<p>C&ocirc;ng ty Vĩnh Ho&agrave;n đ&atilde; li&ecirc;n hệ v&agrave; gửi c&ocirc;ng văn đến nhiều cơ quan thẩm quyền kh&aacute;c nhau bao gồm Cục Th&uacute; &yacute;, Cục NAFIQAD, Tổng Cục Thủy Sản, Ph&ograve;ng Thương mại v&agrave; C&ocirc;ng nghiệp VCCI Cần Thơ, Sở C&ocirc;ng Thương Tỉnh Đồng Th&aacute;p nhưng vẫn chưa c&oacute; cơ quan n&agrave;o x&aacute;c nhận thẩm quyền v&agrave; chấp nhận cấp chứng từ n&oacute;i tr&ecirc;n.</p>\r\n<p><img class=\"news-image\" src=\"http://image.24h.com.vn/upload/3-2017/images/2017-08-05/1501896926-hinh-che-bien-catra_mnuo.jpg\" alt=\"Mất cơ hội xuất khẩu 100 tấn mỡ c&aacute; chỉ v&igrave; thủ tục - 1\" /></p>\r\n<p>Thế nhưng, hiện đ&atilde; qu&aacute; hạn để xuất khẩu l&ocirc; mở c&aacute; sang Chile nhưng C&ocirc;ng ty Vĩnh Ho&agrave;n vẫn chưa biết v&agrave; li&ecirc;n hệ được cơ quan thẩm quyền n&agrave;o để xin cấp Giấy Chứng nhận xuất xứ hợp ph&aacute;p cho l&ocirc; h&agrave;ng mỡ c&aacute;.</p>\r\n<p>Theo &ocirc;ng Trương Đ&igrave;nh H&ograve;e, Tổng thư k&yacute; Vasep, hiện nay, trước qu&aacute; tr&igrave;nh cạnh tranh khốc liệt tr&ecirc;n thị trường, c&aacute;c doanh nghiệp thủy sản đang cố gắng để đẩy mạnh xuất khẩu sang thị trường c&aacute;c nước kh&ocirc;ng chỉ với c&aacute;c sản phẩm thủy sản ch&iacute;nh m&agrave; xuất khẩu cả c&aacute;c sản phẩm phụ phẩm từ qu&aacute; tr&igrave;nh chế biến thủy sản.</p>\r\n<p>Điều n&agrave;y, vừa l&agrave;m tăng kim ngạch xuất khẩu của Việt Nam đồng thời gi&uacute;p c&aacute;c DN tận dụng sử dụng hết nguồn nguy&ecirc;n liệu để sản xuất tại lợi nhuận cho c&ocirc;ng ty. Tuy nhi&ecirc;n, hiện c&aacute;c doanh nghiệp đang gặp kh&oacute; khăn trong qu&aacute; tr&igrave;nh l&agrave;m thủ tục để xuất khẩu sản phẩm phụ phẩm n&agrave;y.</p>\r\n<p>Hiệp hội VASEP đ&atilde; b&aacute;o c&aacute;o Bộ N&ocirc;ng nghiệp v&agrave; Ph&aacute;t triển n&ocirc;ng th&ocirc;n xem x&eacute;t v&agrave; c&oacute; chỉ đạo kịp thời hướng dẫn cho c&aacute;c doanh nghiệp về thủ tục v&agrave; cơ quan c&oacute; thẩm quyền cấp Giấy chứng nhận xuất xứ hợp ph&aacute;p k&egrave;m theo l&ocirc; h&agrave;ng khi xuất khẩu sản phẩm thủy sản cũng như sản phẩm phụ phẩm v&agrave;o thị trường Chile n&oacute;i ri&ecirc;ng v&agrave; c&aacute;c thị trường kh&aacute;c n&oacute;i chung để gi&uacute;p doanh nghiệp ph&aacute;t triển thị trường mới cho sản phẩm phụ phẩm.</p>\r\n</div>\r\n<div class=\"nguontin\">Theo Quang Huy (Ph&aacute;p luật TPHCM</div>', 428, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_content_categories`
--

CREATE TABLE `m_content_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_content_categories`
--

INSERT INTO `m_content_categories` (`id`, `name`, `alias`, `description`, `parent_id`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'Tin tức về bột cá', 'tin-tuc-ve-bot-ca', NULL, NULL, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(2, 'Tin tức về dầu cá', 'tin-tuc-ve-dau-ca', NULL, NULL, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(3, 'Tin tức khác', 'tin-tuc-khac', NULL, NULL, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(4, 'bot ca 5', 'bot-ca-5', NULL, NULL, 1, '2020-11-15 08:23:39', '2020-11-15 08:24:09', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_document`
--

CREATE TABLE `m_document` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `file_name` varchar(255) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `type` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `file_size` varchar(255) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_document`
--

INSERT INTO `m_document` (`id`, `title`, `alias`, `file_name`, `file_path`, `type`, `active`, `file_size`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'file excel', 'file-excel', 'ba-ng-gia--do--i-ta-c.xlsx', 'http://localhost/quytindungphuhoa/files/upload/file_excel/1/ba-ng-gia--do--i-ta-c.xlsx', 'xlsx', 1, '22.86', '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(2, 'file zip', 'file-zip', 'logo.rar', 'http://localhost/quytindungphuhoa/files/upload/file_rar/2/logo.rar', 'rar', 1, '53.41', '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_faq`
--

CREATE TABLE `m_faq` (
  `id` bigint(20) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `alias_question` varchar(255) DEFAULT NULL,
  `content` text,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `view_num` bigint(20) DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_faq`
--

INSERT INTO `m_faq` (`id`, `question`, `alias_question`, `content`, `category_id`, `view_num`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'Những người nào tuyệt đối không nên bổ sung dầu cá', 'nhung-nguoi-nao-tuyet-doi-khong-nen-bo-sung-dau-ca', '<h2 class=\"detail-sp\" data-field=\"sapo\">Dầu c&aacute; l&agrave; nguồn bổ sung axit b&eacute;o omega-3 rất tốt cho sức khỏe, nhưng lại kh&ocirc;ng th&iacute;ch hợp với mọi đối tượng. Bổ sung omega-3 kh&ocirc;ng đ&uacute;ng c&aacute;ch c&oacute; thể g&acirc;y ngộ độc, nguy hiểm đến t&iacute;nh mạng.</h2>\r\n<div class=\"content-new clear\" data-field=\"body\">\r\n<p><strong><em>Những người kh&ocirc;ng n&ecirc;n bổ sung dầu c&aacute;</em></strong></p>\r\n<p><strong>Bệnh đường ti&ecirc;u h&oacute;a</strong></p>\r\n<p>Với những người đau bụng c&oacute; vấn đề về đường ti&ecirc;u h&oacute;a kh&ocirc;ng n&ecirc;n sử dụng. Hệ ti&ecirc;u h&oacute;a của ch&uacute;ng ta kh&ocirc;ng c&oacute; khả năng để hấp thụ lượng nhiều qu&aacute; mức khi được bổ sung v&agrave;o cơ thế. Khi kh&ocirc;ng được ti&ecirc;u h&oacute;a, dầu c&aacute; giải ph&oacute;ng kh&iacute; sinh ra trướng bụng, đầy hơi v&agrave; l&agrave; nguy&ecirc;n nh&acirc;n của những cơn đau bụng dữ dội v&agrave; g&acirc;y ra kh&oacute; chịu.</p>\r\n<p><strong>Đối với trẻ nhỏ</strong></p>\r\n<p>Lời khuy&ecirc;n d&agrave;nh cho c&aacute;c bậc phụ huynh l&agrave; kh&ocirc;ng n&ecirc;n lạm dụng dầu c&aacute; đối với trẻ sơ sinh, trẻ mới tập đi v&agrave; thậm ch&iacute; dưới 15 tuổi. Mặc d&ugrave; h&agrave;m lượng DHA c&oacute; trong dầu c&aacute; tốt cho sự ph&aacute;t triển của trẻ nhưng chất EPA lại g&acirc;y hại cho c&aacute;c cơ quan trong cơ thể trẻ. C&oacute; nhiều c&aacute;ch để bổ sung DHA nhưng để ngăn chặn ảnh hưởng của EPA lại chưa thực sự c&oacute; biện ph&aacute;p th&iacute;ch hợp n&ecirc;n tốt nhất l&agrave; kh&ocirc;ng cho trẻ uống dầu c&aacute;.</p>\r\n<p><strong>Người bị rối loại t&acirc;m thần</strong></p>\r\n<p>Những người bị bệnh về thần kinh như rối loạn lưỡng cực, trầm cảm kh&ocirc;ng n&ecirc;n sử dụng dầu c&aacute; v&igrave; n&oacute; c&oacute; thể k&iacute;ch th&iacute;ch bệnh t&igrave;nh nguy hiểm hơn.</p>\r\n<div class=\"VCSortableInPreviewMode\">\r\n<div><img id=\"img_275285\" src=\"http://giadinh.vcmedia.vn/k:2016/1-bo-sung-dau-ca-1452244284526/nhung-nguoi-tuyet-doi-khong-nen-bo-sung-dau-ca.jpg\" alt=\"\" /></div>\r\n<div class=\"PhotoCMS_Caption\">&nbsp;</div>\r\n</div>\r\n<p><strong>Phụ nữ c&oacute; thai v&agrave; cho con b&uacute;</strong></p>\r\n<p>Đối với phụ nữ c&oacute; thai v&agrave; cho con b&uacute; kh&ocirc;ng n&ecirc;n bổ sung sử dụng dầu c&aacute; th&ocirc;. L&yacute; do l&agrave; v&igrave; c&aacute;c kim loại nặng v&agrave; chất &ocirc; nhiễm trong dầu c&aacute; c&oacute; thể ảnh hưởng tới sức khỏe của thai nhi v&agrave; cả người mẹ. Do t&iacute;nh chất chống đ&ocirc;ng m&aacute;u c&oacute; trong Omega-3 n&ecirc;n nguy cơ chảy m&aacute;u tử cung ở những người phụ nữ bổ sung dầu c&aacute; l&agrave; rất cao.</p>\r\n<p><strong>Người cơ địa dị ứng</strong></p>\r\n<p>Dầu c&aacute; giống như những vitamin bổ sung kh&aacute;c cũng c&oacute; thể g&acirc;y dị ứng. Những người c&oacute; mức nhạy cảm cao c&oacute; xu hướng gặp một số loại phản ứng dị ứng khi d&ugrave;ng loại vitamin bổ sung n&agrave;y, chẳng hạn: ngứa v&agrave; nổi mụn, ph&aacute;t ban v&agrave; nổi mẩn đỏ tr&ecirc;n da, vi&ecirc;m họng, buồn n&ocirc;n, đau đầu, kh&oacute; thở&hellip;</p>\r\n<p><strong>Những người mắc bệnh tuyến tiền liệt</strong></p>\r\n<p>Trong khi hầu hết c&aacute;c nghi&ecirc;n cứu cho thấy bổ sung dầu c&aacute; &iacute;t hoặc kh&ocirc;ng c&oacute; t&aacute;c dụng phụ, bằng chứng gần đ&acirc;y trong nghi&ecirc;n cứu ung thư tuyến tiền liệt được c&ocirc;ng bố v&agrave;o năm 2013 tr&ecirc;n Tạp ch&iacute; của Viện Ung thư Quốc gia Mỹ cho thấy mối li&ecirc;n hệ giữa dầu c&aacute; v&agrave; ung thư tuyến tiền liệt.</p>\r\n<p>Nguy cơ ung thư tuyến tiền liệt tăng ở những người đ&agrave;n &ocirc;ng c&oacute; nồng độ cao axit b&eacute;o omega-3. Ph&aacute;t hiện n&agrave;y cho thấy c&aacute;c axit b&eacute;o c&oacute; li&ecirc;n quan đến sự ph&aacute;t triển của c&aacute;c khối u tuyến tiền liệt.</p>\r\n<div class=\"VCSortableInPreviewMode IMSCurrentEditorEditObject\">\r\n<div><img id=\"img_275284\" src=\"http://giadinh.vcmedia.vn/k:2016/2-bo-sung-dau-ca-1452244282933/nhung-nguoi-tuyet-doi-khong-nen-bo-sung-dau-ca.jpg\" alt=\"\" /></div>\r\n<div class=\"PhotoCMS_Caption\">&nbsp;</div>\r\n</div>\r\n<div id=\"admzone480462\">\r\n<div id=\"ads_zone480462\">\r\n<div id=\"ads_zone480462_slot1\">&nbsp;</div>\r\n</div>\r\n</div>\r\n<p><strong>Lưu &yacute; khi bảo quản dầu c&aacute;</strong></p>\r\n<p>Đặc t&iacute;nh của &nbsp;dầu c&aacute; c&aacute;c vitamin v&agrave; chất b&eacute;o omega-3 n&oacute;i chung sẽ bị mất đi trong một số điều kiện. &Aacute;nh nắng, &aacute;nh s&aacute;ng l&agrave; yếu tố h&agrave;ng đầu khiến cho c&aacute;c loại dầu c&aacute; d&agrave;nh cho trẻ em dễ bị hư hại v&agrave; v&ocirc; t&aacute;c dụng nhất.</p>\r\n<p>Hoặc nếu để &nbsp;dầu c&aacute; ở nơi c&oacute; độ ẩm cao l&agrave; yếu tố g&acirc;y hư hỏng c&aacute;c loại thực phẩm bổ sung. Độ ẩm l&agrave;m mềm vỏ bọc vi&ecirc;n dầu c&aacute;, l&acirc;u ng&agrave;y g&acirc;y thất tho&aacute;t dưỡng chất.</p>\r\n<p>Kể cả việc c&oacute; nhiều b&agrave; mẹ qu&aacute; cẩn thận bảo quản dầu c&aacute; trẻ em trong ngăn tủ đ&ocirc;ng lạnh hoặc ngăn m&aacute;t tủ lạnh với nhiệt độ qu&aacute; thấp cũng kh&ocirc;ng tốt v&igrave; dầu c&aacute; kh&ocirc;ng được để ở nơi n&oacute;ng qu&aacute; cũng như lạnh qu&aacute;. Điều kiện n&agrave;o cũng l&agrave;m dầu c&aacute; dễ hỏng v&agrave; kh&ocirc;ng c&ograve;n giữ được chức năng bổ sung.</p>\r\n<p>V&igrave; vậy để bảo quản tốt nhất dầu cả ở nhiệt độ trung b&igrave;nh tr&aacute;nh nơi c&oacute; &aacute;nh nắng rọi thằng v&agrave;o.</p>\r\n<p>Khi mở hộp dầu c&aacute; ra cần đ&oacute;ng chật nắp hộp. &nbsp;khi mua, bạn n&ecirc;n chọn sản phẩm dầu c&aacute; c&oacute; hộp đựng kh&ocirc;ng xuy&ecirc;n thấu (hộp kh&ocirc;ng nh&igrave;n thấy b&ecirc;n trong hoặc nh&igrave;n thấy nhưng m&agrave;u nhựa trong phải sậm m&agrave;u, kh&ocirc;ng trắng trong suốt). Loại hộp n&agrave;y gi&uacute;p bảo quản dầu c&aacute; tốt nhất.</p>\r\n</div>', 2, 480, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(2, 'QTD Phú Hòa có tham gia bảo hiểm tiền gửi không? Mức bảo hiểm là bao nhiêu?', 'qtd-phu-hoa-co-tham-gia-bao-hiem-tien-gui-khong-muc-bao-hiem-la-bao-nhieu', '<p>Theo quy định chung của Nh&agrave; nước, để đảm bảo quyền lợi cho Kh&aacute;ch h&agrave;ng, QTD Ph&uacute; H&ograve;a tham gia bảo hiểm tiền gửi l&agrave; đồng Việt Nam cho c&aacute;c c&aacute; nh&acirc;n, hộ gia đ&igrave;nh, tổ hợp t&aacute;c, doanh nghiệp tư nh&acirc;n v&agrave; c&ocirc;ng ty.</p>\r\n<p>&nbsp;</p>\r\n<p>Khi c&oacute; rủi ro xảy ra, Kh&aacute;ch h&agrave;ng được chi trả tiền bồi thường theo Quy định của Bảo hiểm tiền gửi trong từng thời kỳ.</p>', 2, 384, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(3, 'Cho tôi biết thành phần công dụng của mỡ cá ba sa và ứng dụng của cá vào việc chế biến dầu', 'cho-toi-biet-thanh-phan-cong-dung-cua-mo-ca-ba-sa-va-ung-dung-cua-ca-vao-viec-che-bien-dau', '<p>DHA (viết tắt Docosaexa henoic acid l&agrave; chất dinh dưỡng quan trọng v&agrave; cần thiết để đảm bảo sự ph&aacute;t triển cũng như duy tr&igrave; chức năng hoạt động b&igrave;nh thường của bộ n&atilde;o v&agrave; v&otilde;ng mạc) chỉ c&oacute; trong mỡ c&aacute; v&ugrave;ng biển s&acirc;u, v&ugrave;ng Green land Nhật Bản, ở c&aacute; hồi, c&aacute; sọc, c&aacute; salmon hoặc đi theo con đường tổng hợp v&agrave; hiện nay đ&atilde; x&aacute;c định được trong th&agrave;nh phần mỡ c&aacute; basa Việt Nam (Panga sius baucourti) c&aacute; nước ngọt, nu&ocirc;i b&egrave; tr&ecirc;n d&ograve;ng s&ocirc;ng M&ecirc;k&ocirc;ng kh&ocirc;ng những c&oacute; đủ th&agrave;nh phần acid b&aacute;o kh&ocirc;ng no &ndash; acid b&eacute;o thiết yếu m&agrave; c&ograve;n c&oacute; th&agrave;nh phần DHA.&nbsp;<br /><br />Ch&iacute;nh những acid b&eacute;o kh&ocirc;ng no &ndash; acid thiết yếu đặc biệt DHA đ&atilde; chuyển h&oacute;a cholesterol th&agrave;nh những dẫn xuất kh&ocirc;ng g&acirc;y tắc nghẽn mạch m&aacute;u, l&agrave;m giảm loạn nhịp đập tim, giảm chứng đau bụng kinh ở một số phụ nữ, giảm chứng tiền sản giật ở phụ nữ (5).&nbsp;<br /><br />Như vậy mỡ c&aacute; Basa được d&ugrave;ng để tinh luyện th&agrave;nh dầu mỡ thực phẩm v&agrave; thức ăn gi&agrave;u dinh dưỡng cho trẻ em.&nbsp;<br /><br />Ngo&agrave;i ra, mỡ c&aacute; ba sa cũng được d&ugrave;ng l&agrave;m nguy&ecirc;n liệu chế biến th&agrave;nh dầu biodiesel (l&agrave; nhi&ecirc;n liệu sinh học, d&ugrave;ng cho động cơ diesel, c&oacute; nguồn gốc từ dầu thực vật hoặc mỡ động vật) thay cho dầu diesel truyền thống.&nbsp;<br /><br />Ưu điểm của biodiesel so với nhi&ecirc;n liệu diesel truyền thống l&agrave; nguồn năng lượng c&oacute; thể t&aacute;i tạo được, giảm lượng kh&iacute; thải độc hại ra m&ocirc;i trường, giảm hiệu ứng nh&agrave; k&iacute;nh. Biodiesel l&agrave; chất kh&ocirc;ng độc, dễ bị ph&acirc;n hủy sinh học, c&oacute; nhiệt độ chớp nh&aacute;y cao n&ecirc;n t&iacute;nh an to&agrave;n trong tồn trữ cao. Biodiesel c&oacute; thể sử dụng trực tiếp với động cơ diesel m&agrave; kh&ocirc;ng cần bất cứ sự biến đổi động cơ n&agrave;o, c&oacute; thể phối trộn với nhi&ecirc;n liệu truyền thống ở bất kỳ tỷ lệ n&agrave;o, gi&uacute;p k&eacute;o d&agrave;i tuổi thọ động cơ</p>', 1, 464, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(4, 'Số tiền gửi tiết kiệm tối thiểu là bao nhiêu?', 'so-tien-gui-tiet-kiem-toi-thieu-la-bao-nhieu', '<p>Theo quy định về tiền gửi tiết kiệm hiện h&agrave;nh của QTD Ph&uacute; H&ograve;a, mức gửi tối thiểu cho mỗi sổ tiết kiệm l&agrave;: (Tối thiểu 1.000.000 VND)</p>\r\n<p>Mức gửi tối thiểu tr&ecirc;n kh&ocirc;ng cố định m&agrave; thay đổi t&ugrave;y theo quy định của từng sản phẩm.</p>', 2, 426, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(5, 'Khi tất toán trước hạn sổ tiết kiệm đã gửi thì được tính lãi suất bao nhiêu?', 'khi-tat-toan-truoc-han-so-tiet-kiem-da-gui-thi-duoc-tinh-lai-suat-bao-nhieu', '<p>Mức l&atilde;i suất khi tất to&aacute;n trước hạn t&iacute;nh cho Kh&aacute;ch h&agrave;ng được thực hiện theo từng sản phẩm, thường l&agrave; l&atilde;i suất kh&ocirc;ng kỳ hạn (trừ trường hợp kh&aacute;ch h&agrave;ng sử dụng sản phẩm tiết kiệm r&uacute;t gốc linh hoạt)</p>', 2, 417, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(6, 'Sổ tiết kiệm đã đến hạn nhưng Khách hàng không đến tất toán mà vẫn duy trì như vậy thì mức lãi suất của Khách hàng được hưởng là bao nhiêu?', 'so-tiet-kiem-da-den-han-nhung-khach-hang-khong-den-tat-toan-ma-van-duy-tri-nhu-vay-thi-muc-lai-suat-cua-khach-hang-duoc-huong-la-bao-nhieu', '<p>Đối với sổ tiết kiệm gửi v&agrave;o sản phẩm tiết kiệm th&ocirc;ng thường, khi sổ tiết kiệm đến hạn m&agrave; Kh&aacute;ch h&agrave;ng kh&ocirc;ng đến tất to&aacute;n, nếu Kh&aacute;ch h&agrave;ng kh&ocirc;ng c&oacute; y&ecirc;u cầu g&igrave; kh&aacute;c, QTD Ph&uacute; H&ograve;a sẽ tự động thực hiện t&aacute;i k&yacute; gửi gốc (v&agrave; l&atilde;i) cho Kh&aacute;ch h&agrave;ng một kỳ hạn bằng kỳ hạn đ&atilde; gửi v&agrave; l&atilde;i suất được t&iacute;nh theo mức l&atilde;i suất tại thời điểm t&aacute;i tục.</p>\r\n<p>Đối với sổ tiết kiệm gửi v&agrave;o c&aacute;c sản phẩm kh&aacute;c:QTD Ph&uacute; H&ograve;a sẽ thực hiện theo Thể lệ sản phẩm trong từng thời kỳ.</p>', 2, 403, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(7, 'Sổ tiết kiệm của Khách hàng đáo hạn rơi vào ngày nghỉ hoặc ngày Lễ, Khách hàng có thể đến lĩnh vào ngày nào? Lãi suất được tính như thế nào?', 'so-tiet-kiem-cua-khach-hang-dao-han-roi-vao-ngay-nghi-hoac-ngay-le-khach-hang-co-the-den-linh-vao-ngay-nao-lai-suat-duoc-tinh-nhu-the-nao', '<p>Đối với sổ tiết kiệm c&oacute; ng&agrave;y đ&aacute;o hạn v&agrave;o ng&agrave;y nghỉ hoặc ng&agrave;y Lễ, Kh&aacute;ch h&agrave;ng c&oacute; thể đến lĩnh tiền v&agrave;o ng&agrave;y l&agrave;m việc liền kề sau ng&agrave;y nghỉ, ng&agrave;y Lễ đ&oacute;. Số tiền trả l&atilde;i Kh&aacute;ch h&agrave;ng được hưởng trong trường hợp n&agrave;y bằng số tiền l&atilde;i Kh&aacute;ch h&agrave;ng nhận được khi đến hạn cộng th&ecirc;m số tiền l&atilde;i kh&ocirc;ng kỳ hạn của c&aacute;c ng&agrave;y duy tr&igrave; sau ng&agrave;y đến hạn tr&ecirc;n số tiền gốc theo l&atilde;i suất đ&atilde; cam kết.</p>\r\n<p>Nếu Kh&aacute;ch h&agrave;ng kh&ocirc;ng đến tất to&aacute;n Thẻ tiết kiệm v&agrave;o đ&uacute;ng ng&agrave;y l&agrave;m việc liền kề sau ng&agrave;y nghỉ, ng&agrave;y Lễ, QTD Ph&uacute; H&ograve;a sẽ thực hiện t&aacute;i k&yacute; gửi sổ&nbsp; tiết kiệm của Kh&aacute;ch h&agrave;ng theo quy định hiện h&agrave;nh của QTD Ph&uacute; H&ograve;a.</p>', 2, 567, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(8, 'Tôi có thể ủy quyền cho người khác thực hiện các giao dịch liên quan đến tiền gửi tiết kiệm như nhận gốc và lãi, tái tục, tất toán sổ…? Thủ tục ủy quyền như thế nào?', 'toi-co-the-uy-quyen-cho-nguoi-khac-thuc-hien-cac-giao-dich-lien-quan-den-tien-gui-tiet-kiem-nhu-nhan-goc-va-lai-tai-tuc-tat-toan-so---thu-tuc-uy-quyen-nhu-the-nao', '<p>Kh&aacute;ch h&agrave;ng c&oacute; thể uỷ quyền cho người kh&aacute;c đến r&uacute;t gốc/l&atilde;i từ sổ tiết kiệm, cầm cố sổ tiết kiệm hoặc to&agrave;n quyền sử dụng số tiền tr&ecirc;n sổ tiết kiệm. Khi giao dịch, Người được uỷ quyền xuất tr&igrave;nh c&aacute;c giấy tờ sau:</p>\r\n<p>Sổ tiết kiệm được ủy quyền.</p>\r\n<p>Giấy uỷ quyền</p>\r\n<p>Giấy CMND hoặc Giấy tờ tương đương c&ograve;n thời hạn hiệu lực của người được uỷ quyền.</p>\r\n<p>Kh&aacute;ch h&agrave;ng c&oacute; thể x&aacute;c lập giấy ủy quyền c&oacute; x&aacute;c nhận của QTD Ph&uacute; H&ograve;a hoặc ch&iacute;nh quyền địa phương hoặc cơ quan c&oacute; thẩm quyền kh&aacute;c. Chữ k&yacute; của Kh&aacute;ch h&agrave;ng tr&ecirc;n Giấy ủy quyền phải giống chữ k&yacute; mẫu đăng k&yacute; tại QTD Ph&uacute; H&ograve;a.</p>', 2, 349, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(9, 'Giờ làm việc của QTD Phú Hòa?', 'gio-lam-viec-cua-qtd-phu-hoa', '<p>QTD Ph&uacute; H&ograve;a l&agrave;m việc buổi s&aacute;ng từ 7:30 đến 11:30 v&agrave; buổi chiều từ 1:00 đến 5:00 c&aacute;c ng&agrave;y Thứ 2 đến Thứ 6.</p>', 3, 410, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(10, 'Ăn nhiều mỡ cá có tốt không?', 'an-nhieu-mo-ca-co-tot-khong', '<p style=\"font-weight: 300;\">Nhiều người cho rằng mỡ c&aacute; cũng như mỡ động vật ăn nhiều sẽ g&acirc;y b&eacute;o ph&igrave; v&agrave; thừa mỡ. Tuy nhi&ecirc;n, theo c&aacute;c nh&agrave; nghi&ecirc;n cứu mỡ c&aacute; nhất l&agrave; c&aacute;c loại c&aacute; biển c&oacute; h&agrave;m lượng đạm cao, mỡ c&aacute; c&ograve;n l&agrave; nguồn cung cấp omega-3 rất tốt cho cơ thể.</p>\r\n<p style=\"font-weight: 300;\">C&aacute;c loại c&aacute; c&oacute; nhiều omega-3 gồm: c&aacute; hồi, c&aacute; m&ograve;i, c&aacute; ngừ đại dương v&agrave; c&aacute; hồi m&agrave;u hồng cam&hellip; Acid b&eacute;o omega-3 c&oacute; trong mỡ c&aacute; c&oacute; t&aacute;c dụng hạn chế việc h&igrave;nh th&agrave;nh cholesterol trong m&aacute;u gi&uacute;p ngăn ngừa chứng nghẽn mạch m&aacute;u v&agrave; đột quỵ.</p>\r\n<p style=\"font-weight: 300;\">Đối với mỡ c&aacute; tra, c&aacute; basa chứa 90 &ndash; 98 % triglyceride, l&agrave; ester của c&aacute;c acid b&eacute;o v&agrave; glycerin. Ngo&agrave;i ra c&ograve;n c&oacute; c&aacute;c vitamintan trong dầu như A, E, D&hellip; Mỡ c&aacute; c&ograve;n c&oacute; lipit v&agrave; lipoit, trong lipit của c&aacute; chủ yếu l&agrave; axit b&eacute;o kh&ocirc;ng no c&oacute; hoạt t&iacute;nh sinh học cao: linoleic, axit lioneic, axit arachodonic. Vai tr&ograve; sinh học của c&aacute;c axit b&eacute;o chưa no rất quan trọng đối với gan, n&atilde;o, tim, c&aacute;c tuyến sinh dục. Tỷ lệ acid b&eacute;o kh&ocirc;ng no v&agrave; no c&acirc;n đối, tương ứng với dầu cọ, hơn hẳn so với dầu dừa.</p>\r\n<p style=\"font-weight: 300;\">V&igrave; vậy, c&aacute;c nh&agrave; chuy&ecirc;n m&ocirc;n cho rằng mỗi tuần n&ecirc;n&nbsp;<a href=\"http://alobacsi.vn/2012111810075261p0c164/co-phai-an-ca-tot-hon-an-thit.htm\">ăn c&aacute;</a>&nbsp;&iacute;t nhất 2 lần rất tốt sức khỏe. D&ugrave; mỡ c&aacute; tốt như vậy, nhưng bạn kh&ocirc;ng n&ecirc;n ăn qu&aacute; nhiều 1 loại thực phẩm m&agrave; cần ăn nhiều loại thực phẩm, gi&uacute;p đa dạng về dinh dưỡng để cung cấp đầy đủ chất cho cơ thể, bạn nh&eacute;!</p>', 1, 413, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_faq_categories`
--

CREATE TABLE `m_faq_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_faq_categories`
--

INSERT INTO `m_faq_categories` (`id`, `name`, `alias`, `parent_id`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'Hỏi đáp về mỡ cá', 'hoi-dap-ve-mo-ca', 0, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(2, 'Hỏi - đáp về dầu cá', 'hoi--dap-ve-dau-ca', 0, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(3, 'Hỏi - đáp khác', 'hoi--dap-khac', 0, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_meta`
--

CREATE TABLE `m_meta` (
  `id` int(10) UNSIGNED NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `canonical` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_partner`
--

CREATE TABLE `m_partner` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `banner` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `m_partner`
--

INSERT INTO `m_partner` (`id`, `name`, `url`, `banner`, `active`, `deleted`, `created_date`, `updated_date`, `updated_by`) VALUES
(1, 'proconco corp', '', '/files/upload/image/logo/unnamed.jpg', 1, 0, '2020-11-18 16:56:32', '2020-11-18 16:57:05', 1),
(2, 'Uni-president', '', '/files/upload/image/logo/uni-president_416x416.jpg', 1, 0, '2020-11-18 16:57:34', '2020-11-18 16:57:34', 1),
(3, 'Mellow', '', '/files/upload/image/logo/s%C3%A2s.jpg', 1, 0, '2020-11-18 16:57:54', '2020-11-18 16:57:54', 1),
(4, 'SpotLight', '', '/files/upload/image/logo/spotlight0_1396537481.jpg', 1, 1, '2020-11-18 16:58:08', '2020-11-25 03:53:43', 1),
(5, 'VINA', '', '/files/upload/image/logo/Logo_Vina.jpg', 1, 0, '2020-11-18 16:58:19', '2020-11-18 16:58:19', 1),
(7, 'Anova', '', '/files/upload/image/logo/2cb15e9f88452e371ce9f4be9a4ca60f_1-1429697160-7-AnovaFeed-Bui_Phan_Phu_Loc.jpg', 1, 0, '2020-11-19 02:50:10', '2020-11-19 02:50:39', 1),
(8, 'videc', '', '/files/upload/image/logo/55videc.jpg', 1, 0, '2020-11-19 02:50:59', '2020-11-19 02:50:59', 1),
(9, 'Cargill', '', '/files/upload/image/logo/CARGILL.jpg', 1, 0, '2020-11-19 02:51:29', '2020-11-19 02:51:29', 1),
(10, 'CJ Corporation', '', '/files/upload/image/logo/CJ_Corporation.png', 1, 0, '2020-11-19 02:52:05', '2020-11-19 02:52:05', 1),
(11, 'Seapro', '', '/files/upload/image/logo/d%C3%A1.jpg', 1, 0, '2020-11-19 02:52:38', '2020-11-19 02:52:38', 1),
(12, 'Sunset', 'sun-set', '/files/upload/image/logo/logo.jpg', 1, 0, '2020-11-19 02:52:57', '2020-11-25 03:50:15', 1),
(13, 'Viêt-Trung', 'viet-trung', '/files/upload/image/logo/sgsdf.jpg', 1, 0, '2020-11-19 02:53:54', '2020-11-25 03:49:19', 1),
(14, 'Spotlight', 'spotlight', '/files/upload/image/logo/spotlight0_1396537481.jpg', 1, 0, '2020-11-19 02:55:02', '2020-11-25 03:49:35', 1),
(15, 'ANT', 'ant', '/files/upload/image/logo/%C3%A1dad.jpg', 1, 0, '2020-11-25 03:51:08', '2020-11-25 03:51:14', 1),
(16, 'woosung', '', 'http://www.basa-mekong.com/files/upload/image/new/bang-03.png', 1, 0, '2020-11-25 03:51:59', '2021-02-04 11:08:48', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_post`
--

CREATE TABLE `m_post` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `content` text,
  `type` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_post`
--

INSERT INTO `m_post` (`id`, `title`, `alias`, `thumbnail`, `content`, `type`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', 'http://www.basa-mekong.com/files/upload/image/about/bia-web.jpg', '<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n<p>&nbsp;C&ocirc;ng ty TNHH Basa Mekong đặt tại T&acirc;y Kh&aacute;nh 2, phường Mỹ H&ograve;a, th&agrave;nh phố Long Xuy&ecirc;n, tỉnh An Giang, Việt Nam. Điện thoại: 84 2963 858417. Fax: 84 2963 958137. Ch&uacute;ng t&ocirc;i sản xuất bột c&aacute; v&agrave; dầu c&aacute;. Ch&uacute;ng t&ocirc;i lu&ocirc;n tu&acirc;n thủ triết l&yacute; kinh doanh chất lượng đầu ti&ecirc;n, dựa tr&ecirc;n lợi thế nguồn lực địa phương (đồng bằng s&ocirc;ng Cửu Long), sẵn s&agrave;ng l&agrave;m việc kinh doanh c&oacute; lợi, hoạt động theo luật, cung cấp sản phẩm tốt với gi&aacute; tốt.</p>\r\n<p>&nbsp;Sản phẩm chủ yếu xuất khẩu sang ch&acirc;u &Aacute; v&agrave; c&aacute;c nước Trung Đ&ocirc;ng. Sự h&agrave;i l&ograve;ng của bạn l&agrave; vinh dự lớn nhất của ch&uacute;ng t&ocirc;i; sự c&ocirc;ng nhận của bạn l&agrave; mục ti&ecirc;u cuối c&ugrave;ng của sự ph&aacute;t triển của doanh nghiệp.</p>\r\n<p>Bột c&aacute; l&agrave; một loại bột hảo hạng thu được từ việc nấu, l&agrave;m kh&ocirc; v&agrave; nghiền c&aacute; tươi. Bột c&aacute; l&agrave; nguồn protein gi&agrave;u protein v&agrave; được sử dụng l&agrave;m th&agrave;nh phần thức ăn cho nu&ocirc;i trồng thủy sản, gia cầm, thức ăn chăn nu&ocirc;i.</p>\r\n<p>Thức ăn chăn nu&ocirc;i: đối với lợn, g&agrave; v&agrave; b&ograve; v&agrave; c&aacute;c động vật kh&aacute;c, thức ăn gia s&uacute;c, những thức ăn n&agrave;y cần phải chứa chất đạm chất lượng cao, đặc biệt l&agrave; ở lợn v&agrave; g&agrave; non. Bởi v&igrave; động vật non trong giai đoạn sinh trưởng , nhu cầu protein v&agrave; c&aacute;c y&ecirc;u cầu axit amin cần một tỷ lệ lớn protein, bột c&aacute; như l&agrave; protein,bao gồm tỷ lệ axit amin cần thiết cho động vật.</p>\r\n<p>Thức ăn cho động vật thủy sản: đối với động vật thủy sản như c&aacute;, cua, t&ocirc;m v&agrave; c&aacute;c loại thức ăn th&ocirc;. Tỷ lệ axit amin y&ecirc;u cầu đối với c&aacute; v&agrave; động vật thủy l&agrave; ph&ugrave; hợp, để đảm bảo rằng thủy sinh vật c&oacute; thể ph&aacute;t triển nhanh hơn.</p>\r\n<p>Thức ăn cho động vật bằng l&ocirc;ng th&uacute;: Đối với một số động vật c&oacute; l&ocirc;ng th&uacute; như c&aacute;o, gấu tr&uacute;c v&agrave; thức ăn kh&aacute;c, động vật l&ocirc;ng th&uacute; chủ yếu l&agrave; ăn thịt, nhu cầu lớn về protein, bột c&aacute; chất lượng cao l&agrave; nguồn protein được lựa chọn cho c&aacute;c th&agrave;nh phần thức ăn chăn nu&ocirc;i n&agrave;y.</p>\r\n<p>&nbsp;Ch&uacute;ng t&ocirc;i cung cấp protein bột c&aacute; từ 55% đến 65%, g&oacute;i 25kg hoặc 50kg. Nếu bạn đang t&igrave;m kiếm một nh&agrave; cung cấp bột c&aacute; tốt, Basa Mekong l&agrave; C&ocirc;ng ty TNHH sẵn s&agrave;ng cung cấp chất lượng tốt v&agrave; gi&aacute; cả hợp l&yacute; nhất.</p>\r\n<p>&nbsp;</p>\r\n<p>Nguyễn Hồng Qu&acirc;n<br />Gi&aacute;m Đốc<br />Mobile : 0975777888<br />Email : basa.mekongagg@gmail.com</p>\r\n<p>Chuy&ecirc;n Cung Cấp :<br />- N&ocirc;ng sản , nguy&ecirc;n liệu thức ăn gia s&uacute;c<br />- Phụ phẩm : - Bột C&aacute; Tra - Bột C&aacute; Biển - Mỡ C&aacute;<br />Mr. NGUYEN HONG QUAN<br />Director<br />Mobile : +84975777888<br />Email : basa.mekongagg@gmail.com</p>\r\n<p>Specialty Supplying :<br />- Agricultural and animal feed products.<br />- Raw materials - Basa fish meal - Marine fish meal - Fish oil<br />TH&Ocirc;NG TIN LI&Ecirc;N HỆ</p>', 'gioi-thieu', 1, '2020-10-14 03:44:13', '2021-02-04 14:14:41', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_posts`
--

CREATE TABLE `m_posts` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `view_num` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NULL DEFAULT NULL,
  `updated_date` timestamp NULL DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_posts`
--

INSERT INTO `m_posts` (`id`, `title`, `alias`, `thumbnail`, `category_id`, `description`, `content`, `view_num`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, '2dsad', 'dsadsad', 'dsad', 2, NULL, NULL, NULL, 1, NULL, '2021-02-04 11:00:31', 1, 1),
(2, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Version', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-version', '/files/upload/image/slide/slider-dau-ca-1.jpg', 2, '', '', 320, 1, '2021-02-04 10:59:33', '2021-02-04 11:00:31', 1, 1),
(3, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Version', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-version', '/files/upload/image/slide/slider-dau-ca-1.jpg', 2, '', '', NULL, 1, '2021-02-04 10:59:33', '2021-02-04 11:00:31', 1, 1),
(4, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Versiondddd', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-versiondddd', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 2, '', '', NULL, 1, '2021-02-04 10:59:52', '2021-02-04 11:00:31', 1, 1),
(5, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Versiondddd', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-versiondddd', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 2, '', '', NULL, 1, '2021-02-04 10:59:52', '2021-02-04 11:00:31', 1, 1),
(6, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Versiondd22', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-versiondd22', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 2, '', '', NULL, 1, '2021-02-04 11:00:16', '2021-02-04 11:00:31', 1, 1),
(7, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Versiondd22', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-versiondd22', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 2, '', '', NULL, 1, '2021-02-04 11:00:16', '2021-02-04 11:00:31', 1, 1),
(8, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Version', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-version', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 2, '', '', NULL, 1, '2021-02-04 11:00:45', '2021-02-04 11:00:45', 1, 0),
(9, 'Một Bước Yêu Vạn Dặm Đau | Mr.Siro | Piano Version', 'mot-buoc-yeu-van-dam-dau--mr-siro--piano-version', 'http://www.basa-mekong.com/files/upload/image/new/122.jpg', 2, '', '', NULL, 1, '2021-02-04 11:00:45', '2021-02-04 11:00:59', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_posts_categories`
--

CREATE TABLE `m_posts_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `parent_id` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_posts_categories`
--

INSERT INTO `m_posts_categories` (`id`, `name`, `alias`, `parent_id`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'Tuyễn dụng', 'tuyen-dung', NULL, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(2, 'Chương trình khuyến mãi', 'chuong-trinh-khuyen-mai', NULL, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 0),
(3, 'Chính sách bảo hành', 'chinh-sach-bao-hanh', NULL, 1, '2020-10-13 14:22:32', '2020-10-13 14:22:32', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_product`
--

CREATE TABLE `m_product` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `check_bold` tinyint(1) NOT NULL DEFAULT '0',
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `description` varchar(255) DEFAULT NULL,
  `content` text,
  `view_num` bigint(20) NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_product`
--

INSERT INTO `m_product` (`id`, `title`, `alias`, `thumbnail`, `price`, `check_bold`, `category_id`, `description`, `content`, `view_num`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(18, 'vỏ ghẹ ruốt xay 22%', 'vo-ghe-ruot-xay', 'http://www.basa-mekong.com/files/upload/image/product/18/ghe-ruoc-xay-22-p.jpg', '', 0, 15, '', '<p>vỏ ghẹ ruốt xay 22% đạm</p>', 553, 1, '2020-11-17 04:08:50', '2021-02-04 14:11:08', 1, 0),
(20, 'dầu cá biển L1', 'dau-ca-bien', '/files/upload/image/product/D%E1%BA%A7u%20c%C3%A1%20Bi%E1%BB%83n%20L1.jpg', '', 0, 12, '', '<p>dầu c&aacute; biển L1</p>', 1132, 1, '2020-11-17 04:11:03', '2020-11-19 07:33:31', 1, 0),
(21, 'dầu cá biển loại 2', 'dau-ca-bien', '/files/upload/image/product/D%E1%BA%A7u%20c%C3%A1%20Bi%E1%BB%83n%20L2.jpg', '', 0, 12, '', '<p>dầu c&aacute; biển L2</p>', 0, 1, '2020-11-17 04:11:51', '2020-11-19 07:33:30', 1, 0),
(39, 'xác mắm cá cơm xay 22%', 'xac-mam-ca-com-xay-22', 'http://www.basa-mekong.com/files/upload/image/product/39/390625.jpg', '', 0, 18, '', '', 488, 1, '2020-11-19 08:30:22', '2021-02-04 10:44:41', 1, 0),
(40, 'bột cá tra 62%', 'bot-ca-tra-62', 'http://www.basa-mekong.com/files/upload/image/product/40/ca-tra-62-p.jpg', '', 0, 3, '', '<p>Protein: 62% Chất b&eacute;o: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: tối đa 100 ASH: tối đa 21 - 24% Kh&ocirc;ng nhiễm Melamine</p>', 680, 1, '2020-11-19 08:33:29', '2021-02-04 14:10:10', 1, 0),
(41, 'Bột cá tra 60%', 'bot-ca-tra-60', 'http://www.basa-mekong.com/files/upload/image/product/41/ca-tra-60-p.jpg', '', 0, 3, '', '<p>Protein: 60% Chất b&eacute;o: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: tối đa 100 ASH: tối đa 21 - 24% Kh&ocirc;ng nhiễm Melamine</p>', 716, 1, '2020-11-19 08:34:53', '2021-02-04 14:09:52', 1, 0),
(42, 'bột cá tra 58%', 'bot-ca-tra-58', 'http://www.basa-mekong.com/files/upload/image/product/42/ca-tra-58-p.jpg', '', 0, 3, '', '<p>Protein: 58% Chất b&eacute;o: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: tối đa 100 ASH: tối đa 21 - 24% Kh&ocirc;ng nhiễm Melamine</p>', 712, 1, '2020-11-19 08:35:44', '2021-02-04 14:09:15', 1, 0),
(43, 'bột cá biển 65%', 'bot-ca-bien-65', 'http://www.basa-mekong.com/files/upload/image/product/43/ca-bien-65-p.jpg', '', 0, 6, '', '<p>Protein: 65%min Chất b&eacute;o: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: 120 - 180 tối đa ASH: 24 - 27% tối đa Kh&ocirc;ng nhiễm Melamine</p>', 966, 1, '2020-11-19 08:36:41', '2021-02-04 14:12:17', 1, 0),
(44, 'bột cá biển 60%', 'bot-ca-bien-60', 'http://www.basa-mekong.com/files/upload/image/product/44/ca-bien-60-p.jpg', '', 0, 6, '', '<p>Protein: 60%min Chất b&eacute;o: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: 120 - 180 tối đa ASH: 24 - 27% tối đa Kh&ocirc;ng nhiễm Melamine</p>', 1203, 1, '2020-11-19 08:37:40', '2021-02-04 14:11:54', 1, 0),
(45, 'bột cá biển 55%', 'bot-ca-bien-55', 'http://www.basa-mekong.com/files/upload/image/product/45/ca-bien-55-p.jpg', '', 0, 6, '', '<p>Protein: 55%min Chất b&eacute;o: Tối đa 12% Độ ẩm: Tối đa 10% TVBN: 120 - 180 tối đa ASH: 24 - 27% tối đa Kh&ocirc;ng nhiễm Melamine</p>', 1223, 1, '2020-11-19 08:38:24', '2021-02-04 14:11:34', 1, 0),
(46, 'mỡ cá Av3', 'mo-ca-av3', '/files/upload/image/product/Av3.jpg', '', 0, 12, '', '<ul>\r\n<li>Lipid : 95%</li>\r\n<li>Độ ẩm &lt;0.5%</li>\r\n<li>Gi&aacute; trị axit 3</li>\r\n</ul>', 1123, 1, '2020-11-21 07:21:25', '2020-11-25 04:35:22', 1, 0),
(47, 'mỡ cá Av5', 'mo-ca-av5', '/files/upload/image/product/Av5.jpg', '', 0, 12, '', '<ul>\r\n<li>Lipid : 95%</li>\r\n<li>Độ ẩm &lt;0.5%</li>\r\n<li>Gi&aacute; trị axit 5</li>\r\n</ul>', 1101, 1, '2020-11-21 07:22:28', '2020-11-25 04:34:58', 1, 0),
(48, 'mỡ cá biển', 'mo-ca-bien', '/files/upload/image/product/M%E1%BB%A1%20c%C3%A1%20Bi%E1%BB%83n.jpg', '', 0, 12, '', '', 281, 1, '2020-11-21 07:23:51', '2020-11-25 04:35:05', 1, 1),
(49, 'mỡ cá biển', 'mo-ca-bien', '/files/upload/image/product/M%E1%BB%A1%20c%C3%A1%20Bi%E1%BB%83n.jpg', '', 0, 12, '', '', 0, 0, '2020-11-25 04:36:03', '2020-11-25 04:36:11', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_product_categories`
--

CREATE TABLE `m_product_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `alias` varchar(255) DEFAULT NULL,
  `description` text,
  `parent_id` bigint(20) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_product_categories`
--

INSERT INTO `m_product_categories` (`id`, `name`, `alias`, `description`, `parent_id`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(3, 'Bột cá tra', 'bot-ca-tra', '', NULL, 1, '2020-10-13 14:22:32', '2020-11-19 08:32:09', 1, 0),
(6, 'bột cá biển', 'bot-ca-bien', '', NULL, 1, '2020-11-17 02:21:44', '2021-02-04 08:47:48', 1, 0),
(12, 'Mỡ cá -dầu cá', 'mo-ca-dau-ca', '', NULL, 1, '2020-11-17 02:30:50', '2020-11-21 07:21:58', 1, 0),
(15, 'vỏ ghẹ ruốt xay', 'vo-ghe-ruot-xay', '', NULL, 1, '2020-11-17 02:33:11', '2020-11-19 08:44:14', 1, 0),
(18, 'xác mắm cá cơm xay 22%', 'xac-mam-ca-com-xay', '', NULL, 1, '2020-11-19 08:28:26', '2020-11-19 08:44:10', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_sessions`
--

CREATE TABLE `m_sessions` (
  `id` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `ip_address` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `m_sessions`
--

INSERT INTO `m_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('cdftm2kt5krcsqsv3e03hrb0kagoe4vt', '103.48.193.132', 1677992416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939323431363b),
('cltng1d2v7sb1idv8h3v2arnjs9j6hin', '103.48.193.132', 1677992416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939323431363b),
('7726ruvppsmanvkdd2e4b281j7tvfj4i', '103.48.193.132', 1677994213, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939343231333b),
('dordl3lhfmmaemus6k4uhfi1m4ek05vm', '103.48.193.132', 1677994214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939343231343b),
('35gis203hj318g0310fmhh7qfaraohfu', '103.48.193.132', 1677996016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939363031363b),
('89urrkvdgj7qul244oc8to713rfd4jfm', '103.48.193.132', 1677996017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939363031373b),
('pnb45jqh173ib263j82oba8a72v0b0p2', '103.48.193.132', 1677997816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939373831363b),
('3l45masb6dmdl9lfu5h7o008vkq4663t', '103.48.193.132', 1677997817, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939373831373b),
('ve9nsb9garj1dbiqajqbs7r19ekq0bs5', '114.119.130.177', 1677999591, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939393539303b),
('526v5pi166jebi8dk76m8lfvflldrcpu', '103.48.193.132', 1677999613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939393631333b),
('d939vpmuec1ouuom83g5ds8l7k7lfo2k', '103.48.193.132', 1677999614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939393631343b),
('jqj92jghpfth1jrebnas0p4sedv36q98', '114.119.135.195', 1677999741, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637373939393734313b),
('q3m29mc8dfs69qp0m2gmjdlt5cnfn5f7', '103.48.193.132', 1678001414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030313431343b),
('bjotisqnbu26ou6mnar0dub3ppifntav', '103.48.193.132', 1678001414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030313431343b),
('dog5c502gjh4ebhpks190qe3fc3dpatv', '103.48.193.132', 1678003217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030333231373b),
('idoaa6u6t0b5tdpvo9lvj9jm0jmun6f1', '103.48.193.132', 1678003218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030333231383b),
('spuh03dn6uup8sl20v55kmctpsrn8je0', '66.249.71.166', 1678004243, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030343234333b),
('2gjr2efglm5fm0tulr8qhdho8p9iav53', '114.119.162.62', 1678004584, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030343538343b),
('rtsdspd38l8eiscp2cq4p4aocl9hlmf6', '114.119.128.44', 1678004612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030343631323b),
('15pg6jirtb9nk6f223qnbrf8o2iu8iu6', '103.48.193.132', 1678005019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030353031393b),
('fu5duianvuscqejtpuuim8ug362hshuk', '103.48.193.132', 1678005019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030353031393b),
('8qkpvhsnh0hdmptpbebu1tk4h14ld0af', '103.48.193.132', 1678006814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030363831343b),
('993i9j9psloo78nvdc16ggmgcrtv1ddo', '103.48.193.132', 1678006815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030363831353b),
('kkbagceridrt0hq3gu9tb9cb3qi9po9v', '103.48.193.132', 1678008615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030383631353b),
('34ts462u7o6e4scotma8b6mp5700udv3', '103.48.193.132', 1678008616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030383631363b),
('o5q3a1g04ar63euo450phfqs33ub8n5u', '17.241.75.26', 1678009886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383030393838363b),
('uod5ng048fgs4hhoo4jvtugq27901bui', '103.48.193.132', 1678010414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031303431343b),
('8a0g75qcqjq58iv5k4ig8hotpjlsdoev', '103.48.193.132', 1678010414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031303431343b),
('c41kmofoeicj9j9fbpvr4hum0uiccppc', '103.48.193.132', 1678012214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031323231343b),
('vculqa443dfgigbugojrsqejvdm26im8', '103.48.193.132', 1678012214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031323231343b),
('o77apn86tdl6e8csalqtmlt64am4sm4o', '103.48.193.132', 1678014013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031343031333b),
('ejhluo84dr0f78qb5gvcb604ps9oo9km', '103.48.193.132', 1678014013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031343031333b),
('lup7cnpk7p219nvrl34fm84qpqupp5m9', '103.48.193.132', 1678015815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031353831353b),
('03dfvbov7pa82iiai2unkfdvi7nslau6', '103.48.193.132', 1678015815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031353831353b),
('pusi02tcf9qlqtdooq0v8s62urmg17j8', '103.48.193.132', 1678017618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031373631383b),
('134t13enghe9et7bfrhjdh5rofj401nf', '103.48.193.132', 1678017618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031373631383b),
('sagfkrf6rm167s869jui0racrmbjt58d', '171.226.114.12', 1678018333, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031383333333b),
('p4or46te8v48jhnh1lo9o781crlpvcdq', '103.48.193.132', 1678019414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031393431343b),
('phqtgbgp0ta3ric4fdnvmu2st5ud4172', '103.48.193.132', 1678019415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383031393431353b),
('g9s6pp02poe5jigpftc9roaiaqc3qh8t', '103.48.193.132', 1678021216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032313231363b),
('kpo681cn7g181u5usc0tlbd3nssfd1dl', '103.48.193.132', 1678021216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032313231363b),
('6s501gp3nhrrrh9caheson7vn71ksef2', '157.55.39.219', 1678022187, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032323138373b),
('hmupklofntvk2u5j4v4c1dp0m40cnm34', '34.30.202.175', 1678022872, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032323837323b),
('kg0mnsd964ujtc2h76fktdg8shmkjhdp', '103.48.193.132', 1678023013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032333031333b),
('ukmfmvg04gc1p4g0snml0oracff93phe', '103.48.193.132', 1678023014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032333031343b),
('u9eb0p0quqp060inr7iog80h8ceprbd7', '66.249.79.153', 1678023271, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032333237313b),
('5gk0hc44sjfaa30d2sfe24a93up2rl8b', '103.48.193.132', 1678024814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032343831343b),
('de8al0qbdo2c5cq69hdvrht56g2v05pd', '103.48.193.132', 1678024814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032343831343b),
('qusjbgdrflh8n6gth2k0954lq93n4ug9', '103.48.193.132', 1678026614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032363631343b),
('2rivbshgucdbd7l34377i5c7ua2eoe02', '103.48.193.132', 1678026615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032363631343b),
('3kgnmammdgc4hbs7phd9kamc5rfk5dq4', '103.48.193.132', 1678028414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032383431343b),
('j9fea0oam1q32s85co66tnjmp8u1v5t4', '103.48.193.132', 1678028414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032383431343b),
('29o1eou4jpsu66793btdc9ngmuoilb3v', '125.235.237.59', 1678029352, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032393333353b),
('7kn2rdivs09hq6oi3cske1k979snc7cu', '114.119.130.213', 1678029537, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383032393533363b),
('1jg9rlk5ouh22dliuo4q4tc5928gq7ja', '103.48.193.132', 1678030216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033303231363b),
('1e2qmqdcsagrr0k2slh7lc9ll8k8l19d', '103.48.193.132', 1678030217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033303231373b),
('mro3e7qdvvi58eig72gbkbkblii5cuvk', '139.180.209.73', 1678030520, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033303532303b),
('8lfurepq1gv3nbomap2nmrh5ldkcrek4', '14.162.202.211', 1678031096, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033313035343b),
('cfjlmea103djmk7m1rmfd4ceikjh6s2e', '40.117.185.219', 1678031130, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033313133303b),
('h319jsmpmpgtc8c5bpdeov9i7271hcss', '114.119.144.42', 1678031298, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033313239383b),
('36s51029mld2c3k68b3joj4tr64lqeq9', '103.48.193.132', 1678032014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033323031343b),
('o7sbal61h3rthiui7seess224lns68ak', '103.48.193.132', 1678032014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033323031343b),
('7ev58lbnr2gambtvomf9s90ebil4m222', '114.119.142.69', 1678032430, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033323433303b),
('k6b2rn137mj2ko8b73e7rrqbc6grgrd3', '40.117.185.219', 1678033774, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033333737343b),
('r9dred4kehovlo595vjflp2q05dvju23', '103.48.193.132', 1678033814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033333831343b),
('3mevot93qcvtkrt95cf6vsgg97ukvb2a', '103.48.193.132', 1678033815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033333831353b),
('4hf4e3jdbuhi6476s95nf34b084qhgsi', '114.119.129.191', 1678034383, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033343338333b),
('jke9fv7cj7ru6d7ej8dku6i7v0fp99pe', '103.48.193.132', 1678035616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033353631363b),
('3s6qcgtdrqebk2k4kbdvq9obb7he2r1c', '103.48.193.132', 1678035616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033353631363b),
('nnn116jp8enb983a6uimql7pjmnvuvas', '103.48.193.132', 1678037417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033373431363b),
('fno1kuvcea35jo3515ff83oeb28no4cb', '103.48.193.132', 1678037417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033373431363b),
('guhbjinr6bc79hfi3l5qe2e87q6m909r', '114.119.146.179', 1678037862, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033373836323b),
('msnajvegfjg0hl0qs34m8qe1k2qefjgh', '87.250.224.16', 1678038960, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033383936303b),
('adf3micvi8to1mp50t603dmjcrkvqmdj', '103.48.193.132', 1678039214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033393231343b),
('n5gifl04phhbjant8jmdocs3bg8qhias', '103.48.193.132', 1678039215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383033393231353b),
('4r9c3f3o9mfehjo4u67k56uo9a9p9300', '103.48.193.132', 1678041015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034313031353b),
('ec2r0dommnascfg45ecpn1rfej6n7pgo', '103.48.193.132', 1678041015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034313031353b),
('gtbf4n39pqu2072d5tpfrompp98j9eo9', '131.153.240.178', 1678041537, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034313533373b),
('ddcoftpc3o8db8h3p28db6er92m649cr', '114.119.158.5', 1678041640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034313634303b),
('ko84p8tcbsb8s0k5noqbol7eikooie8n', '103.48.193.132', 1678042814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034323831343b),
('2tup5mk6iafi1niknujcb348g05bvpjj', '103.48.193.132', 1678042815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034323831353b),
('td5d97l40ffr4hs56okjmf9g68m6j60f', '52.167.144.47', 1678043689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034333638393b),
('op3hcc7jrholr166ui6a6e826gv4675c', '103.48.193.132', 1678044616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034343631363b),
('r7f0eg1lm4s53ag5tjae5cshk7a15nlk', '103.48.193.132', 1678044616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034343631363b),
('qe1kfpb2dfah95hd26hk8npctg4e2v40', '35.90.241.81', 1678044802, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034343830323b),
('30thgdf8i641vvph5q9kdj3aokatgo3f', '34.220.154.18', 1678044804, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034343830343b),
('871s52r3pffunhpt9bjmn96oco1aaoi3', '34.221.200.214', 1678044824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034343832343b),
('u855uf43no28ss9qfvo8lno49fjh7b0l', '54.244.36.45', 1678044826, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034343832363b),
('qgoravrj428t061pa8j7p3q4b6h14nfi', '54.186.41.127', 1678045076, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034353037363b),
('6ipm5nh2du992ohqrorod458fidgvg5j', '114.119.131.136', 1678045715, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034353731353b),
('hgb2kgqr7sjh5uv9qa7a8f6fa2ccgc5h', '103.48.193.132', 1678046424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034363432343b),
('f3fgudg0d3en5snlcl04u3bish520itr', '103.48.193.132', 1678046424, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034363432343b),
('vrq8b8t8jm8dlmi7e6al8cc0etpavuiu', '103.48.193.132', 1678048225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034383232353b),
('tsr835vg3upiclv6vqhrmhulo2una5in', '103.48.193.132', 1678048225, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383034383232353b),
('002u11mbeddlgcc76uamajm8nece4ndt', '103.48.193.132', 1678050020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035303032303b),
('77iqfj68a3mothekpckp1666rmvn7q15', '103.48.193.132', 1678050020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035303032303b),
('erkjrfugom0epk50kj3pufouj42p9a70', '103.48.193.132', 1678051814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035313831343b),
('usc949eoqvbk95h82mve2ovcfjmt6hhq', '103.48.193.132', 1678051814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035313831343b),
('5ogs79e7tl00u909m7bc87aaoik1ju9d', '18.180.132.196', 1678053497, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035333439373b),
('k5g0un3086007g79dg8seeeid44vuqmg', '103.48.193.132', 1678053615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035333631353b),
('18n9gdk4lgcg0lou0j1tct0snevlqc44', '103.48.193.132', 1678053616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035333631363b),
('2s51l95vjjun563k167slj8rcsuit7cq', '103.48.193.132', 1678055416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035353431363b),
('ujkb5b1ro2nmnpn0vrr8kkqlhn7rjep4', '103.48.193.132', 1678055416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035353431363b),
('m7ofpenal5j4ci1oihb4dth1eh3ktb8o', '103.48.193.132', 1678057213, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035373231333b),
('ebdvvn4edj7d9236gd6tqkbqqk2gt2fk', '103.48.193.132', 1678057214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035373231343b),
('q0ad5ccvnajvdc9tgksukolmn92mqetm', '66.249.71.175', 1678058677, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035383637373b),
('rejletirq65i9hai2c8ckkik1sub1tfl', '103.48.193.132', 1678059013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035393031333b),
('52oip9gr64mj4ma98epi5s2nbbm468un', '103.48.193.132', 1678059015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035393031353b),
('4d1prcnbkpcdhs3u9o0ll79ditn30vdj', '18.219.76.142', 1678059405, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383035393430353b),
('ajo0guqgq9kaj2ncjuvqg1d0hvv7h7ab', '103.48.193.132', 1678060814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036303831343b),
('7goguoitfjjpjr4bt637901pg7ghgv2c', '103.48.193.132', 1678060815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036303831353b),
('kkrg0j0db92lbnnviu17bmgi4b0r064k', '103.48.193.132', 1678062614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036323631343b),
('jpd9dqtvbj9oi9favff33beie8ke9l19', '103.48.193.132', 1678062614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036323631343b),
('l5bccqha3emgve5aormjhntrgab1df8b', '123.60.146.214', 1678063198, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036333139383b),
('qbj5p5dt2ulgec23of8h1fjv7ng3i5cq', '114.119.156.120', 1678064367, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036343336373b),
('q5scpo228p50dle59hgg0dqnr67u0395', '103.48.193.132', 1678064413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036343431333b),
('bj7j3q215reg79b2hafg2qu1jemhm346', '103.48.193.132', 1678064414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036343431343b),
('gi9o97r4qt9h286b3rtebuk8m11cbo59', '34.210.43.209', 1678065062, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036353036323b),
('hfhs1na603i32s5q4m9p6jvsd1bb8932', '34.213.157.216', 1678065495, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036353439353b),
('m7tgl9cfakerl5r9m5vjaekckleaa1n9', '34.214.186.227', 1678065533, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036353533333b),
('e8pedcb1bjsu9ldn37eadt7kbglktim7', '103.48.193.132', 1678066215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036363231353b),
('imd7nbnut9603218ercgt3rb48a7488g', '103.48.193.132', 1678066216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036363231363b),
('8rm9tjpr47jpdlfr4l7kl7seemififm9', '114.119.136.72', 1678067917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036373931373b),
('3umtjouvvnrt5j6j450ivba5glauk8o0', '103.48.193.132', 1678068017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036383031373b),
('j6qfc7tnmge8d64tm4gijgr5nbub7qv9', '103.48.193.132', 1678068018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036383031383b),
('lkcknd5vslepi4bmiiqrmep92339juvj', '114.119.128.44', 1678068606, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036383630363b),
('p9c31g6fvrf2so9immlmspnum1b94cte', '114.119.132.70', 1678068820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036383832303b),
('6ruif9rlefavr76c58mc9nt9hbq526mf', '103.48.193.132', 1678069816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036393831363b),
('r1ubfh24vr0ndh0js4sg66i34s72aqo7', '103.48.193.132', 1678069817, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383036393831373b),
('qh9tfi1prh474g9clukpedb9eb4mi4pi', '115.79.47.60', 1678073246, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037333234363b),
('kcqp8tajhsshpbich7720e7iedrtq8bm', '103.48.193.132', 1678071614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037313631343b),
('gtb1k2i1sjkjdeeetprmqlpllef4frcu', '103.48.193.132', 1678071614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037313631343b),
('s7a0fvo140djktkvg4a97ae7o8laijdk', '115.79.199.103', 1678074792, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037343739323b),
('o0km346d6vsqn9817pp4ggb0ste9uh6p', '115.79.47.60', 1678073246, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037333234363b),
('tnagqcqvsfslv33t9gnlcfa9noknkqa1', '103.48.193.132', 1678073418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037333431383b),
('2gelrml8sq6d096cf8ej05qt6ooaj09i', '103.48.193.132', 1678073419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037333431393b),
('oc624i6hkedjif8l8cv0hs1koijek4gt', '115.79.199.103', 1678074832, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037343739323b),
('18r0rc90botibnan2nchc0p7ehfd32fe', '103.48.193.132', 1678075221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037353232313b),
('hrjvlaugh0hndtq1rabf0fro2qvb4bh2', '103.48.193.132', 1678075221, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037353232313b),
('qosou6k5si08tq1khe4182pla3kjbtgr', '103.48.193.132', 1678077019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037373031393b),
('g7ia7snkrfvhk834u6asonkmu0sutn08', '103.48.193.132', 1678077019, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037373031393b),
('0qub8h4fjn6bm9islq5nb1osbfk7to5h', '66.249.71.175', 1678078548, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037383534383b),
('m2uubc58lpertu5ha5h3sqpckr5rvm4b', '103.48.193.132', 1678078819, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037383831393b),
('vkclepngqqak9uk674h1ruvevjedu2di', '103.48.193.132', 1678078820, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037383832303b),
('9ne7d06nr1h9leu62ucnf9pi7q9tvrjq', '114.119.140.47', 1678079932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383037393933323b),
('c81mfsc345rd8bm7ra6afjdjgk2mrmmo', '5.255.253.129', 1678080352, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038303335323b),
('tofgvaip9eq8b7h3988vqj6kbglfsh5r', '103.48.193.132', 1678080618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038303631383b),
('7l9sseokunv33uopvvoeu7olkifqprbr', '103.48.193.132', 1678080619, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038303631393b),
('8qgoca80shp2c8f12p81nob3vm3vj8hl', '103.48.193.132', 1678082417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038323431373b),
('nbvha67vif8oan46rqdpj7ledtpbn2qe', '103.48.193.132', 1678082418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038323431373b),
('8p60gqe9b5o3ust293l50g1nbl9dhj7c', '103.48.193.132', 1678084215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038343231353b),
('gslulqfoskpn63sua52i84ht1c2kpicm', '103.48.193.132', 1678084215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038343231353b),
('dinffma2nfam67mhmr868tv58q3l8fme', '114.119.142.97', 1678085521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038353532313b),
('mj0r7oeis8981onubj5r96fe2jb3g4ta', '114.119.151.89', 1678085700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038353730303b),
('vv2uefm81mc0ns6oufb4vp66o1j6k4bd', '103.48.193.132', 1678086016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038363031363b),
('5vg215bvtdmo797ut3brdpb76g9ieiqo', '103.48.193.132', 1678086022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038363032313b),
('sb7kndv48jfoulu0es80aj16aab5c369', '14.227.203.16', 1678086427, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038363432373b),
('9heq5i9loht1k0p1jfup8lc8g1sejs8k', '103.48.193.132', 1678087819, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038373831383b),
('rhsngo97cajojft1mqs8bb1mbppt8f8c', '103.48.193.132', 1678087819, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038373831393b),
('9mdgakv8ancgit1mihc3oe7a2n6qeqld', '114.119.143.250', 1678089020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038393032303b),
('l7tfv707b7atr495q87adroom42nkvj3', '103.48.193.132', 1678089620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038393632303b),
('nk6f2jkvo51pk8o5pin7i44ohorbqe55', '103.48.193.132', 1678089620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383038393632303b),
('pvpcacn0218rd323ce3n7drqeet64v5q', '103.48.193.132', 1678091418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039313431383b),
('3ts6bsfv6up8bau02olorne27evsks7s', '103.48.193.132', 1678091418, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039313431383b),
('18jq9n99dtn1b8lismctm388c8lae1i8', '103.48.193.132', 1678093218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039333231383b),
('ilu5gpe1amo8adoj48495q5d5tu7ql4s', '103.48.193.132', 1678093218, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039333231383b),
('tlnq7kfhg9d30q1habdp486ntbqeccmi', '114.119.142.27', 1678093500, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039333530303b),
('hg963cv3gd169p3mo2tan1ga2dfq79h9', '103.48.193.132', 1678095015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039353031353b),
('ijid1soo8nl4g8li8qfnb9fbjj0esibs', '103.48.193.132', 1678095016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039353031363b),
('phj6galeff6ulo5ct48k12bjpf3his66', '103.48.193.132', 1678096815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039363831353b),
('6u1iu82m59pkj8ilkcuavdmbbqgorpqs', '103.48.193.132', 1678096816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039363831363b),
('r4umofqaeuhdp73n55vvgv28sdu394eu', '103.48.193.132', 1678098614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039383631343b),
('mlrqt6pdosknb03r9l6j8mpcdha819cv', '103.48.193.132', 1678098614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383039383631343b),
('v02ff1bi2atnlbs2ll7ugellul2vi1m5', '103.48.193.132', 1678100413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130303431333b),
('43g78qu7di058npabvvrilkfg3e632dq', '103.48.193.132', 1678100414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130303431333b),
('2618nmed3cankcqec6fppjjkoop6flfc', '18.117.174.176', 1678101175, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130313137353b),
('cc8qc85u82dsfcpennhengjdppiifagv', '18.117.174.176', 1678101176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130313137363b),
('293pghq1f610c3qvugfluqcscq23avg5', '18.117.174.176', 1678101176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130313137363b),
('uibr7q17u4coi9id38rr3kgbec64650j', '18.117.174.176', 1678101177, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130313137373b),
('dpbsgug9hp48cds59cabptfho9pq9vqs', '18.117.174.176', 1678101178, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130313137383b),
('tdu2k3ih2b025tpfm3spinpqq7fbf6bc', '18.117.174.176', 1678101181, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130313138313b),
('qm3gpu0h3nf967hrn3l92t6sub3ir1u8', '103.48.193.132', 1678102214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130323231343b),
('bevft3qggbenjrp7g31b2v338qef37ef', '103.48.193.132', 1678102215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130323231353b),
('38ieq7vg61mj22tu75m10n4uaej06pnt', '114.119.137.156', 1678102988, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130323938383b),
('6tfqul0fo5ahecr04v9pu5h2bo508bje', '114.119.129.128', 1678103161, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130333136313b),
('m3q4j82lguvvkvbp0eog7jlt1gvevnep', '114.119.133.26', 1678103330, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130333333303b),
('n8b72qh2lueuagnjd7p9sap9k3jmogrv', '114.119.130.33', 1678103510, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130333531303b),
('hi0r5polr4vdtllcg9cj7204tfqocapv', '114.119.157.250', 1678103692, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130333639323b),
('lvq80jg3kub36g4em1prssfokgfongp5', '114.119.131.90', 1678103857, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130333835373b),
('e8jcplvslv47phit02hhej1b70rbjav1', '103.48.193.132', 1678104014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130343031343b),
('lceecojg7jti1bk3v26hlb2g1uh7amao', '103.48.193.132', 1678104015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130343031353b),
('2naa42huo8oeaaj3kb7sq7blpu7033mv', '103.48.193.132', 1678105814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130353831343b),
('57tdkr39msunh86nh7csf3lvpqe7rvt6', '103.48.193.132', 1678105815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130353831353b),
('rtinauvmii7ivf6vgo3hbgqg28j2u4up', '134.209.111.9', 1678107222, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130373232323b),
('sqbnnvij6kb7lj5a6bmuc346nubbt6pe', '103.48.193.132', 1678107615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130373631353b),
('asp4jo3l6b2rsq6sbfkdimv1nf9s1gi8', '103.48.193.132', 1678107616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130373631363b),
('rcefm5mlnrfkic6qvcntei0m4rqfdp6q', '40.77.167.136', 1678109267, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130393236373b),
('t51oqtm617ko0uv2n295dlvgigndi1sk', '104.198.190.42', 1678109276, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130393237363b),
('qct963v6af6rk74p5gff42u22vpqe2n8', '103.48.193.132', 1678109419, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130393431393b),
('c47h2ner1di1se52g4828tj66345ter3', '103.48.193.132', 1678109420, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383130393431393b),
('5t4vflh5j3tockl4ta56t49abbo6796i', '103.48.193.132', 1678111217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131313231373b),
('s84apjveujgc33legbnfjh2j8kfou35k', '103.48.193.132', 1678111217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131313231373b),
('u0fgo2bqm9c2b67pd9n5bfkm4to2u1he', '103.48.193.132', 1678113017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131333031373b),
('minrla9e498milf09bq1cpbfufhm6bkh', '103.48.193.132', 1678113017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131333031373b),
('ih21ipqunbkpbm0djk75a2j4ldrg2thj', '103.48.193.132', 1678114814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131343831343b),
('m58op5aakb78j91r4o2r7bm0o4gu6885', '103.48.193.132', 1678114815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131343831353b),
('lmpr481em57p683n2bvui9rd9ou86l98', '103.48.193.132', 1678116614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131363631343b),
('26c1caia48828jscigq860umscgifu5o', '103.48.193.132', 1678116615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131363631353b),
('7na21j3ipe68v1p9f61uda6q9oa9gch9', '103.48.193.132', 1678118413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131383431333b),
('1euf9m5qocfun2jk7b6bahn32bf17ncu', '103.48.193.132', 1678118414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131383431343b),
('t1l3458rbll2ff36k4v7209qgr02v25j', '87.250.224.16', 1678119529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131393532393b),
('uh674jh3dcrmk53odqfs8qih3ebnnr94', '87.250.224.24', 1678119529, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383131393532393b),
('p03ku3epc8ogu700nbkqd2lqq4o79elp', '103.48.193.132', 1678120216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132303231363b),
('sak2815hko664tf2icqlan4bkia2v67t', '103.48.193.132', 1678120217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132303231373b),
('qaken25uh82k3amprr3oqadg5bnce601', '103.48.193.132', 1678122015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132323031353b),
('f6f97f1c82iujobfa710dpd4dbcas7u9', '103.48.193.132', 1678122016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132323031363b),
('0lt0kvs7qcj5ht1fmuv7778av3lh0moh', '17.241.227.194', 1678122350, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132323335303b),
('hc6pvgna6ngfn926t3jqo780mhg92pku', '114.119.147.15', 1678123620, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132333632303b),
('janrucqm7paq5j2omk6hrclllbo2mhp7', '114.119.153.171', 1678123786, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132333738363b),
('966pj12k05tc8snhkhoiraqkpc1f4s1h', '103.48.193.132', 1678123814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132333831343b),
('fc0ufg5utccut77m7sf0617sn6upc98m', '103.48.193.132', 1678123815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132333831353b),
('hts9eu6fsm1bkjnja7m6uhpq7np6ki85', '114.119.128.253', 1678124768, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132343736383b),
('jils5e77gp0cgd1la644f6ldhgn8hm6s', '103.48.193.132', 1678125614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132353631343b),
('ganr1eum26jjqj8580bakai0a1v18fct', '103.48.193.132', 1678125614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132353631343b),
('fbks0buim1urbanc3g22kvidl5q20m7d', '193.58.109.251', 1678126020, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132363032303b),
('pvclucvcahsrvb984p5bm4655bklkujs', '103.48.193.132', 1678127414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132373431343b),
('t40m1c72ah7l5tjg2t8kjbv2bl39kk4o', '103.48.193.132', 1678127414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132373431343b),
('6gbl8ktpjkvh0tknekgco7qt9kaan9td', '114.119.154.203', 1678128612, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132383631323b),
('difd09rf18k0cp81em93hldhsbeshetd', '114.119.135.172', 1678128833, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132383833333b),
('bmn503gkumbema94ofvvunas054d9qbd', '114.119.157.68', 1678128952, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132383935323b),
('lilu3ot6v2dgbjb10g5aqiis0023nl8p', '103.48.193.132', 1678129215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132393231353b),
('uj8ggbm857ubapg2v91ps36e2sdtmv4v', '103.48.193.132', 1678129216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383132393231363b),
('eeg5r8029qeer5jf33piccahfprk9i0c', '34.220.95.178', 1678130432, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133303433323b),
('ovckgrq1vn19bjmh5a7prji8e42p3gq2', '34.213.184.223', 1678130434, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133303433343b),
('u6uttc5avj7c9v8kitvi72fokufpte6q', '35.89.92.223', 1678130438, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133303433383b),
('ugnolkm4sg161sfhnrh0bmb3vdbt14f0', '54.184.63.79', 1678130463, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133303436333b),
('iebsfmbgjdsqr08n1o5urr517e5v7ltq', '103.48.193.132', 1678131023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133313032333b),
('de9acer4c0i514tepod965q5ifbo0ssd', '103.48.193.132', 1678131023, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133313032333b),
('43ret4352536sri8bmq68j50amat064b', '69.14.105.237', 1678132094, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133323039343b),
('uuvtnr76ncqb7qfefp8nta9ubtroqa3r', '17.241.227.243', 1678132223, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133323232323b),
('h17jouc5cuq62ojmkotfea7qd2gf7iur', '103.48.193.132', 1678132821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133323832303b),
('k90k45kg8u2c2jrbu8dcmt354cogh97l', '103.48.193.132', 1678132821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133323832313b),
('8srs57c9p2573jvgr1h2juavigae0nn4', '40.77.167.242', 1678134610, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133343630393b),
('1t7ogv071rob2ieai9gi2pmkhsuu2ivj', '103.48.193.132', 1678134618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133343631383b),
('kp4a0lbqqes00n4odtodpgeoj9fi4bt3', '103.48.193.132', 1678134618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133343631383b),
('kd21h5vlfsa2m9970jum1e0pot9i305h', '103.48.193.132', 1678136421, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133363432313b),
('dnq0t2r4sflupf1tm6kpa750alvt42l3', '103.48.193.132', 1678136422, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133363432323b),
('7v7gka4lbv683q9cctm9081oim1cqs3o', '18.185.64.152', 1678136689, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133363638393b),
('v7kv2mlts72k3v67co19peh4r6jn9ut4', '193.235.141.21', 1678137926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133373932363b),
('vs36kdnm7ujmht3aj9j0u1qcp91vg6h1', '103.48.193.132', 1678138214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133383231343b),
('l3dcqp0tvtiemtd07sfi0qb4g1an67ah', '103.48.193.132', 1678138215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383133383231353b),
('5qodnk7qvhfttk61m3u0v7rug5167k73', '103.48.193.132', 1678140015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134303031353b),
('ikuqobqn3kgvufa3116umr5oquij7g76', '103.48.193.132', 1678140016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134303031363b),
('vijdr8avrbq7n0paqam29jr7gi8v2l9e', '40.77.167.242', 1678140267, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134303236373b),
('rmb6gr19g2isgllka1ag6ovolu0bkrc0', '103.48.193.132', 1678141814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134313831343b),
('0spno46q4afm2a7udcsf2pp2jmq1capf', '103.48.193.132', 1678141814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134313831343b),
('g7jbu8tdd34gcggl0i19bumtmk96d2l3', '103.48.193.132', 1678143613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134333631333b),
('nn5lohun2ar7ae1l95s962ml1fbodppr', '103.48.193.132', 1678143613, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134333631333b),
('p70bcd7he8tllo84dp9u9rkkfn4nti0o', '103.48.193.132', 1678145415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134353431353b),
('t1svnmsu68e76hvkmfpvca41bh8vvvit', '103.48.193.132', 1678145415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134353431353b),
('om3sktsjsvsg2t22rh59ppjh4ftujrqc', '103.48.193.132', 1678147214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134373231343b),
('k3bohmr2c9nj2bsp91ull6rov0rd7mfj', '103.48.193.132', 1678147214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134373231343b),
('3r95p8117s3pbm5ann6v4a1rnh80fqko', '52.167.144.47', 1678148504, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134383530343b),
('ko7nbg55chc63knl87hpu9ri6gdno33e', '103.48.193.132', 1678149013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134393031333b),
('h0sgvgqvthjuvg4a347a8iobu92l1g3o', '103.48.193.132', 1678149014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383134393031343b),
('kjoc4umhd5jili670c7hpqpfobs7mflm', '103.48.193.132', 1678150815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135303831353b),
('pab1djne7hksh20s7b0v40qqdtra8dut', '103.48.193.132', 1678150815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135303831353b),
('j13ktrv5k2shdkqa077jode9mojvjjkk', '18.237.34.220', 1678152212, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135323231323b),
('cicguql8q9hoe4get13a6o432lbd9fmn', '54.149.25.190', 1678152247, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135323234373b),
('74akp124bdvtf9bdb0sapd2csutnr7ir', '34.215.137.41', 1678152291, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135323239313b),
('70lgj0rn4picp18ma107bq0ratlqodb7', '35.90.171.200', 1678152530, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135323533303b),
('04fb52gvg8i1nppke7eqk25k9mj1f56v', '103.48.193.132', 1678152614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135323631343b),
('7md5mpaad9blk3b3l76ppttqjfa439fe', '103.48.193.132', 1678152615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135323631353b),
('08d6bop25ie75am0a6he429e424lgat3', '103.48.193.132', 1678154416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135343431363b),
('ndn70e62tfd12qsc3bgpk8lu7squ72cd', '103.48.193.132', 1678154417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135343431373b),
('i3u2pcqs0hk1arhei5v2m77tgv6cbhma', '114.119.151.146', 1678155971, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135353937313b),
('c88q6tkbrqfp689plthnodvd4fmcbu1d', '87.250.224.16', 1678156051, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135363035313b),
('cle4al25dhvm0gkung647eid8dd0mebn', '103.48.193.132', 1678156216, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135363231363b),
('ni15bq952e2mipn4ov554rokfvs7pi4d', '103.48.193.132', 1678156217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135363231373b),
('65ghovqj4e1ctobjuah4ol882r8i7ib6', '114.119.131.88', 1678156344, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135363334343b),
('gr1qd2ekeue0hm6lel8iim9407a910u1', '103.48.193.132', 1678158016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135383031363b),
('00bsg54m9ij8evao0haenobr4vnlojq3', '103.48.193.132', 1678158017, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135383031363b),
('bmrko0089j9sdcbmbdva6r6658goqbbe', '103.48.193.132', 1678159822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135393832323b),
('ar2ls19ico1q692iujrv1kpv8io8c044', '103.48.193.132', 1678159822, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383135393832323b),
('5cut59igvmuv3875tkmhjl9le5kemkmf', '103.48.193.132', 1678161614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136313631343b),
('07pbda5tsda0ei5dfs27qjipj61nj4s8', '103.48.193.132', 1678161614, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136313631343b),
('9abl27puvq2n5fh0crushd50vdf1u6k6', '103.48.193.132', 1678163414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136333431343b),
('9pbuss5khvmvl6mpu0bm6qu505epv9hu', '103.48.193.132', 1678163414, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136333431343b),
('6qrhaq8muj3r70d897ubaq5edr4k8t04', '114.119.156.31', 1678163602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136333630323b),
('h8j6konlt4aht1t8dg98oerg9n3bchih', '103.48.193.132', 1678165215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136353231353b),
('flmn067mujje3bsiasosi287vfljie5i', '103.48.193.132', 1678165215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136353231353b),
('3c0cg52dko11lr9s4o5gq769lj9b09f9', '103.48.193.132', 1678167014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136373031343b),
('h1cu4eif4kddc5vroa44ttl0blkp6m3u', '103.48.193.132', 1678167015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136373031353b),
('ijo3ecjkfp1vnc28bc2n7vddud4k6qii', '40.77.167.206', 1678167247, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136373234373b),
('dfa4hjhn6f3ac79b41m46g6cdmd19356', '114.119.129.34', 1678168280, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136383238303b),
('r5h7slmiotgv3ds6t63ipss77qjk2uq8', '103.48.193.132', 1678168821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136383832313b),
('t49mn42rgv2sdq665fv0dkgr8dd1p3r5', '103.48.193.132', 1678168821, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383136383832313b),
('n91qd019gos864onuviar3dcmcb0n4gk', '103.48.193.132', 1678170617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137303631373b),
('bvs322kvkshahih8m4811rrs0qn5kov4', '103.48.193.132', 1678170618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137303631383b),
('8505qkd72tcioso49tgq0nbdc54k8llo', '54.178.188.254', 1678170824, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137303832343b),
('vu2p8255i51bdl8c61i46vi1ccjm56sa', '114.119.157.146', 1678171148, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137313134383b),
('847irdvsjbhukms9o803bgjrsmjvqhgf', '185.191.171.43', 1678171908, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137313930383b),
('ng44l6cecdo5uc65agft9lp72u3i6rje', '114.119.149.228', 1678172226, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137323232363b),
('obov9vedht746gv9h0g2g3p78joh196m', '52.167.144.90', 1678172229, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137323232393b),
('78pnhsifqh690u8khndiu80v0kdvi611', '103.48.193.132', 1678172415, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137323431353b),
('ipp8ks0lv6o4cnoltelid908ssjr3alq', '103.48.193.132', 1678172416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137323431363b),
('g3lrta453kg5n70gu88uem0u270e23gq', '114.119.132.105', 1678172681, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137323638313b),
('l29j7aqa34aso8m6i473v6163nr3mipj', '114.119.146.69', 1678173505, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137333530353b),
('8t5j9ngqarne745543gqh9au8i32d1t6', '185.191.171.16', 1678173834, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137333833343b),
('8eorq07tct6k5pa1b1nl5vcc8rk649gd', '103.48.193.132', 1678174214, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137343231343b),
('gg8lqei2peuoct4m7uf2h0nnhgb929n5', '103.48.193.132', 1678174215, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137343231353b),
('5agakffg6rc9432ef3fai7gvest6u31n', '114.119.129.128', 1678175653, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137353635333b),
('4baj1cdili047m1t2efureptj930f853', '103.48.193.132', 1678176014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137363031343b),
('4avofg9ruk2m5cdqku9f7agbd0h67eck', '103.48.193.132', 1678176014, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137363031343b),
('b5pa7ue4etbkraub3b52uojf04iskvm9', '103.48.193.132', 1678177814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137373831343b),
('rlm54roiakg9qpjjn38oej3lue4pm217', '103.48.193.132', 1678177815, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137373831353b),
('4ibd0497irbf60ebdslg8n1v7d81cbes', '114.119.138.59', 1678178784, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137383738343b),
('ao6qndveu3gjvfmtialm3cc0g1vsg0sh', '114.119.131.195', 1678178886, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137383838363b),
('bdrrldt2r3v7c9fh0um8rertnpvfqrac', '114.119.153.253', 1678178987, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137383938373b),
('uk00cgnan7qa5kauad03ubuu864p2f2o', '114.119.152.230', 1678179102, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137393130323b),
('r6bc8qg63ltdm21t0jbt71jub3o0u6sc', '103.48.193.132', 1678179617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137393631373b),
('3e8rtt1uqkhb2vpu82f5me5qj6cb0lja', '103.48.193.132', 1678179618, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383137393631383b),
('aqndeesqkl4tcok5put7er2qe2p68qh1', '185.191.171.9', 1678180268, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138303236383b),
('v1la93n2b61ik63u218di8lil3qmh2s3', '118.70.180.180', 1678186718, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138363731383b),
('q41ta7httv84m0i84md0pq0da8gagof0', '114.119.157.43', 1678180896, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138303839363b),
('pi5m0uejqd2gk9etcmkvlbbd7baa5kcj', '103.48.193.132', 1678181416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138313431363b),
('mhqga236kpnie58vb087l18756ij8353', '103.48.193.132', 1678181416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138313431363b),
('k3t8357on2lalm4h7bjsu7ovitvfbggc', '66.249.70.15', 1678181572, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138313537323b),
('n708qioub5kvkrjs4cet9bnifurg5g88', '52.167.144.175', 1678181797, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138313739373b),
('2jd3n65oujkpj804qf02se465ln1vgpf', '66.249.71.163', 1678183080, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138333038303b),
('7hplcetss7bqpnttfcndbnfsciotfik4', '103.48.193.132', 1678183217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138333231373b),
('68ed44mn17qiibf9oauu1lb1odq6ghel', '103.48.193.132', 1678183217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138333231373b),
('41invg859pd5f4luqfo2d9oga1p7qho5', '114.119.136.88', 1678184709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138343730393b),
('cpn102bbt232c2fjju8m6sibv6qgkbkm', '114.119.128.237', 1678184809, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138343830393b),
('0uc7s2t6vk2kvlvi2ejkg1b91ji9ii59', '103.48.193.132', 1678185012, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138353031323b),
('kfffv7jt72ed4jhb31fnfqnsquj0ag1l', '103.48.193.132', 1678185013, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138353031333b),
('vjj62k7g5anljmi4uu7ri9vaiob6f4a5', '185.191.171.5', 1678185550, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138353535303b),
('lebl1piutdcjjqkpl7oi02ohfa2ukr89', '114.119.142.197', 1678186011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138363031313b),
('529lp84o9hepeite5e0sfcj4ci8k4fib', '118.70.180.180', 1678186773, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138363731383b),
('4eh53ms9f0g9jh0mo1oacfoeci39i25g', '103.48.193.132', 1678186814, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138363831343b),
('obk7ddggoe32v8b8r6fj8gupk5p8ri74', '103.48.193.132', 1678186816, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138363831363b),
('1eusepkakhjd02vrblorfihcs37j4qig', '66.249.70.8', 1678187870, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138373837303b),
('i6kfp3nms564l6ihm38i8bbtepplki9b', '114.119.143.51', 1678188417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138383431373b),
('3cj4f8543cmd1f6qd21cbu3604gpke3q', '103.48.193.132', 1678188616, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138383631363b),
('vvf37c8kcj2ofadkgepmckb1ja76rkie', '103.48.193.132', 1678188617, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138383631363b),
('d3ettdj1utnei5pasc5tlfc6iup4g66b', '14.160.185.202', 1678188707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138383730373b),
('7o76ddkdg2kfg2f5qqgbekrvatl5lob3', '114.119.153.214', 1678188903, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138383930333b),
('dc8fe9e8dtr0ohg7jov61hh6uebcok3b', '66.249.70.19', 1678189602, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383138393630323b),
('93ht7nkleco42pms10an3bpbpbnfd9dl', '103.48.193.132', 1678190416, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139303431363b),
('taipqa2ths82upk2r88c7sdkgjsjujg4', '103.48.193.132', 1678190417, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139303431373b),
('ml0snago2sm3u4m2ga1jh8hkdhnh0c59', '123.60.146.214', 1678191030, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139313033303b),
('okqc95vpuk7jl9clvl3jb992k2rh3ed7', '103.48.193.132', 1678192212, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139323231323b),
('9rqajjs533mrdfcmpr192kvps0q9ogh9', '103.48.193.132', 1678192213, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139323231333b),
('v6ng4h6nov68ppps6mmcjggktinaoi5u', '185.191.171.8', 1678194009, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139343030393b),
('fo5bvglrljae946n1dfec92tnulfa0jp', '103.48.193.132', 1678194015, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139343031353b),
('re40o7l9pjptqabjguk12a61n48morfc', '103.48.193.132', 1678194016, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139343031363b),
('neul14ck51kllkm70q3ov11u67h8eht1', '203.205.27.208', 1678195022, 0x5f5f63695f6c6173745f726567656e65726174657c693a313637383139353032323b);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_setting`
--

CREATE TABLE `m_setting` (
  `id` int(10) UNSIGNED NOT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `company_logan` varchar(255) DEFAULT NULL,
  `company_address` varchar(255) DEFAULT NULL,
  `company_hotline` varchar(255) DEFAULT NULL,
  `company_tollfree` varchar(255) DEFAULT NULL,
  `company_email` varchar(255) DEFAULT NULL,
  `facebook_url` varchar(255) DEFAULT NULL,
  `googleplus_url` varchar(255) DEFAULT NULL,
  `twitter_url` varchar(255) DEFAULT NULL,
  `youtube_url` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_setting`
--

INSERT INTO `m_setting` (`id`, `company_name`, `company_logan`, `company_address`, `company_hotline`, `company_tollfree`, `company_email`, `facebook_url`, `googleplus_url`, `twitter_url`, `youtube_url`, `tags`, `logo`) VALUES
(1, 'CÔNG TY TNHH SX TM XNK BASA MEKONG', 'Uy Tín, Chất Lượng, Bền Vững - Prestige, Quality, Sustainable', 'Tây Khánh 2, Phường Mỹ Hoà, Thành phố Long Xuyên, Tỉnh An Giang, Việt Nam', 'Tel: 02963 958 167', 'Fax:02963 958 137', 'basa.mekongagg@gmail.com', 'https://www.facebook.com/Basa-Mekong-582338548774520/?modal=admin_todo_tour', '', '', '', 'bot ca long xuyen an giang, cty Mekong Fishmeal mo ca basa, bot ca bien', '/files/upload/image/logo/logo.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_slide`
--

CREATE TABLE `m_slide` (
  `id` bigint(20) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `position` tinyint(1) NOT NULL DEFAULT '0',
  `link` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT 'slide',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_slide`
--

INSERT INTO `m_slide` (`id`, `title`, `thumbnail`, `description`, `position`, `link`, `type`, `active`, `created_date`, `updated_date`, `updated_by`, `deleted`) VALUES
(1, 'Mừng ngày 20/10', '/files/upload/image/slide/slider-dau-ca-1.jpg', '', 0, 'https://www.youtube.com/watch?v=kgV4GA3smis', 'slide', 0, '2020-10-13 14:22:32', '2020-11-18 08:15:06', 1, 1),
(7, 'Giá bột cá Peru tăng lên đến 2.400 USD/tấn', '/files/upload/image/slide/slider-dau-ca-2.jpg', 'Giá bột cá từ Peru đã tăng mạnh do nguồn cung khan hiếm. ', 0, 'https://www.youtube.com/watch?v=kgV4GA3smis', 'slide', 0, '2020-10-13 14:22:32', '2020-11-18 08:25:17', 1, 1),
(8, 'haloween', '/files/upload/image/product/Desert.jpg', '123', 0, 'google.com', 'slide', 1, '2020-11-15 08:30:25', '2020-11-15 08:31:15', 1, 1),
(9, 'Nuôi cá tra', '/files/upload/image/tin-tuc/nuoi%20ca%20tra.jpg', '', 0, '', 'slide', 0, '2020-11-17 03:21:13', '2020-11-18 08:25:14', 1, 1),
(10, 'Hân hạnh chào đón quý khách', '/files/upload/image/slide/z2179748132393_7a8184de5bbad03fab7364d8d84c7458.jpg', '', 0, 'chao-don-quy-khach', 'slide', 1, '2020-11-17 03:23:42', '2020-11-25 04:09:52', 1, 1),
(11, 'Thu Hoạch', '/files/upload/image/tin-tuc/is-6-1491726210257.jpg', '', 0, '', 'slide', 1, '2020-11-17 03:24:58', '2020-11-17 03:25:40', 1, 1),
(12, 'MỠ CÁ BASA MEKONG CORP', '/files/upload/image/slide/z2179748139228_f7aa50ebd476bfb04ba9e53f97577f64.jpg', '', 0, '', 'slide', 1, '2020-11-17 03:52:10', '2020-11-25 04:09:43', 1, 1),
(13, 'Basa mekong Corp', '/files/upload/image/slide/z2179748136704_a8dfd73fcc36ce4b65babe7081bdea3d.jpg', '', 0, '', 'slide', 1, '2020-11-18 08:18:14', '2020-11-19 07:56:47', 1, 0),
(14, 'basamekong', '/files/upload/image/slide/z2179748143629_c77c69f8c0e0e10127217e77b929aa10.jpg', '', 0, '', 'slide', 1, '2020-11-18 08:25:04', '2020-11-19 07:59:32', 1, 0),
(15, 'Email:basa.mekongagg@gmail.com', '/files/upload/image/slide/z2179748146834_461089590c278d8da48f073cf73e1955.jpg', '', 0, 'ba-sa-mekongagg@gmail.com', 'slide', 1, '2020-11-18 08:31:23', '2020-11-19 08:07:00', 1, 0),
(16, 'Chuyên cung cấp Bột cá tra ,mỡ cá ', '/files/upload/image/slide/z2179748141217_ee54a8f716418e47580ef33d4c3dcea7.jpg', '', 0, 'bot-ca-tra-mo-ca', 'slide', 1, '2020-11-19 07:51:29', '2020-11-19 08:07:30', 1, 0),
(17, 'BASA MEKONG', '/files/upload/image/slide/z2179748129415_65c12dc223ba0c74cb66256f0c0d2c20.jpg', '', 0, 'ba-sa-me-kong', 'slide', 1, '2020-11-19 07:52:00', '2020-11-25 04:15:17', 1, 0),
(18, 'Mỡ cá', '/files/upload/image/product/2f37eef336a0d4fe8db1.jpg', '', 0, '', 'slide', 1, '2020-11-25 04:10:48', '2020-11-25 04:24:18', 1, 0),
(19, 'cá tra', 'http://www.basa-mekong.com/files/upload/banner/19/390625.jpg', '', 0, '', 'slide', 0, '2020-11-25 04:11:54', '2021-02-04 14:16:02', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_user`
--

CREATE TABLE `m_user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) DEFAULT '1',
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `password_text` varchar(255) DEFAULT NULL,
  `gender` tinyint(1) NOT NULL DEFAULT '1',
  `title` varchar(255) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `birthday` datetime DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country` bigint(20) UNSIGNED DEFAULT '0',
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(255) DEFAULT NULL,
  `vip_level` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT '0: Normal; 1: Silver; 2: Gold; 3: Diamon',
  `uid` varchar(255) DEFAULT NULL,
  `provider` varchar(255) NOT NULL DEFAULT 'visa',
  `avatar` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_date` datetime NOT NULL,
  `updated_by` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `last_activity` datetime DEFAULT NULL,
  `client_ip` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `m_user`
--

INSERT INTO `m_user` (`id`, `user_type`, `email`, `password`, `password_text`, `gender`, `title`, `fullname`, `birthday`, `phone`, `address`, `country`, `city`, `state`, `zipcode`, `vip_level`, `uid`, `provider`, `avatar`, `active`, `deleted`, `created_date`, `updated_date`, `updated_by`, `last_activity`, `client_ip`) VALUES
(1, '-2', 'kennet12', '3d186804534370c3c817db0563f0e461', '321321', 1, NULL, 'Phan duy anh', '1994-05-11 00:00:00', '01259322224', NULL, 0, NULL, NULL, NULL, 0, NULL, 'visa', '/quytindung/files/upload/image/apply-visa.png', 1, 0, '2017-10-14 09:38:41', '2017-11-01 16:46:10', 1, '2017-10-18 16:37:04', NULL),
(2, '-1', 'nevermorepda3@gmail.com', '3d186804534370c3c817db0563f0e461', '321321', 1, NULL, 'Lê Hữu Phúc', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 'visa', NULL, 1, 0, '2017-10-18 15:43:27', '2017-10-19 16:26:49', 1, NULL, NULL),
(3, '-1', 'nevermorepda5@gmail.com', '3d186804534370c3c817db0563f0e461', '321321', 1, NULL, 'Nguyễn hoàng nam', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 'visa', NULL, 1, 0, '2017-10-19 09:27:55', '2017-10-19 16:27:55', 2, NULL, NULL),
(4, '-2', 'nevermorepda6@gmail.com', '3d186804534370c3c817db0563f0e461', '321321', 1, NULL, 'Nguyễn mạnh tiền', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 'visa', NULL, 1, 0, '2017-10-19 09:35:09', '2017-10-19 16:42:12', 1, NULL, NULL),
(5, '-1', 'admin12', '4297f44b13955235245b2497399d7a93', '123123', 1, NULL, 'admin text', NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, 'visa', NULL, 1, 0, '2017-10-19 09:44:05', '2017-10-19 16:45:00', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `m_user_online`
--

CREATE TABLE `m_user_online` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ip` varchar(45) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `open_time` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `created_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `m_contact`
--
ALTER TABLE `m_contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_contents`
--
ALTER TABLE `m_contents`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_content_categories`
--
ALTER TABLE `m_content_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_document`
--
ALTER TABLE `m_document`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_faq`
--
ALTER TABLE `m_faq`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_faq_categories`
--
ALTER TABLE `m_faq_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_meta`
--
ALTER TABLE `m_meta`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_partner`
--
ALTER TABLE `m_partner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_post`
--
ALTER TABLE `m_post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_posts`
--
ALTER TABLE `m_posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_posts_categories`
--
ALTER TABLE `m_posts_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_product`
--
ALTER TABLE `m_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_product_categories`
--
ALTER TABLE `m_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_sessions`
--
ALTER TABLE `m_sessions`
  ADD KEY `m_sessions_timestamp` (`timestamp`);

--
-- Chỉ mục cho bảng `m_setting`
--
ALTER TABLE `m_setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_slide`
--
ALTER TABLE `m_slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_nicename` (`fullname`(191)) USING BTREE,
  ADD KEY `user_login_key` (`email`(191)) USING BTREE;

--
-- Chỉ mục cho bảng `m_user_online`
--
ALTER TABLE `m_user_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `m_contact`
--
ALTER TABLE `m_contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `m_contents`
--
ALTER TABLE `m_contents`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `m_content_categories`
--
ALTER TABLE `m_content_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `m_document`
--
ALTER TABLE `m_document`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `m_faq`
--
ALTER TABLE `m_faq`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `m_faq_categories`
--
ALTER TABLE `m_faq_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `m_meta`
--
ALTER TABLE `m_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `m_partner`
--
ALTER TABLE `m_partner`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `m_post`
--
ALTER TABLE `m_post`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `m_posts`
--
ALTER TABLE `m_posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `m_posts_categories`
--
ALTER TABLE `m_posts_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `m_product`
--
ALTER TABLE `m_product`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT cho bảng `m_product_categories`
--
ALTER TABLE `m_product_categories`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `m_setting`
--
ALTER TABLE `m_setting`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `m_slide`
--
ALTER TABLE `m_slide`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `m_user_online`
--
ALTER TABLE `m_user_online`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
