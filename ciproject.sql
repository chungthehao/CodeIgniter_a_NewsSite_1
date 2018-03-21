-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th2 09, 2018 lúc 07:07 AM
-- Phiên bản máy phục vụ: 10.1.25-MariaDB
-- Phiên bản PHP: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ciproject`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cate_news`
--

CREATE TABLE `cate_news` (
  `cate_id` int(10) UNSIGNED NOT NULL,
  `cate_title` varchar(150) NOT NULL,
  `cate_parent` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cate_news`
--

INSERT INTO `cate_news` (`cate_id`, `cate_title`, `cate_parent`) VALUES
(1, 'Kinh Tế', 0),
(2, 'Văn Hoá', 0),
(3, 'Tài Chính', 1),
(4, 'Điện Ảnh', 2),
(5, 'Thời Trang', 2),
(7, 'Xã Hội', 0),
(8, 'Giáo Dục', 0),
(9, 'Gia Đình', 7),
(11, 'Vào Bếp', 7),
(12, 'Công Nghệ', 0),
(16, 'Âm Nhạc', 2),
(18, 'Bất Động Sản', 1),
(27, 'Thể Thao', 0),
(28, 'Nhịp Sống Trẻ', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(10) UNSIGNED NOT NULL,
  `news_title` varchar(250) NOT NULL,
  `news_author` varchar(100) NOT NULL,
  `news_info` text NOT NULL,
  `news_full` longtext NOT NULL,
  `news_img` varchar(250) NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `news_title`, `news_author`, `news_info`, `news_full`, `news_img`, `cate_id`, `user_id`) VALUES
(1, 'aaa', 'bbb', 'ccc', '<p>ddd</p>\r\n', '19971_en_11.jpg', 8, 2),
(7, 'yyyy', 'hhhhhhh', 'hhhhhhhhh', '<p>nnnnnnnnnnnnn</p>\r\n', '19185_en_1.jpg', 4, 1),
(8, 'u23 vn 2018', '11111', 'wwwwwwwww', '<p>rrrrrrrrrrr</p>\r\n', '19342_en_1.jpg', 27, 1),
(10, '1wddhj', 'jhkutdsf', 'gjhfyu', '<p>rrhuuytrffffffffffff</p>\r\n', '19443_en_1.jpg', 1, 1),
(11, 'Levi', 'USA', 'giodano', '<p>coach</p>\r\n', '', 5, 1),
(12, 'Quăng đủ thứ xuống sông, hồ tiễn Táo quân chầu trời', 'tuoitre.vn', 'Sáng 8/2, người dân nô nức tìm đến hồ Hoàn Kiếm, hồ Tây, sông Hồng (Hà Nội) thả các con cá chép sau lễ cúng tiễn Táo quân \"lên thiên đình chầu trời\".', '<h1>&nbsp;</h1>\r\n\r\n<p>&nbsp;S&aacute;ng 8/2, người d&acirc;n n&ocirc; nức t&igrave;m đến hồ Ho&agrave;n Kiếm, hồ T&acirc;y, s&ocirc;ng Hồng (H&agrave; Nội) thả c&aacute;c con c&aacute; ch&eacute;p sau lễ c&uacute;ng tiễn T&aacute;o qu&acirc;n &quot;l&ecirc;n thi&ecirc;n đ&igrave;nh chầu trời&quot;.</p>\r\n\r\n<p><strong><a href=\"https://news.zing.vn/video-mat-ho-tay-day-tro-bui-sau-le-cung-ong-cong-ong-tao-post818303.html\" target=\"_blank\">Mặt hồ T&acirc;y đầy tro bụi sau lễ c&uacute;ng &ocirc;ng C&ocirc;ng &ocirc;ng T&aacute;o</a></strong>&nbsp;Tinh trạng thả c&aacute; ch&eacute;p k&egrave;m t&uacute;i nylon t&aacute;i diễn v&agrave;o ng&agrave;y 23 th&aacute;ng Chạp, nhiều người d&acirc;n c&ograve;n đổ tro từ b&aacute;t hương v&agrave; quăng cả b&agrave;n thờ xuống hồ T&acirc;y (H&agrave; Nội).</p>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"Quang du thu xuong song, ho tien Tao quan chau troi hinh anh 1\" src=\"https://znews-photo-td.zadn.vn/w820/Uploaded/lerl/2018_02_08/tha_ca_zing_3.jpg\" style=\"height:267px; width:400px\" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>S&aacute;ng 8/2 (23 th&aacute;ng Chạp), h&agrave;ng trăm người d&acirc;n ở&nbsp;<a href=\"https://news.zing.vn/ha-noi-tieu-diem.html\" title=\"Tin tức Hà Nội\">H&agrave; Nội</a>&nbsp;tấp nập ra hồ Gươm, cầu Chương Dương, Long Bi&ecirc;n thả c&aacute; ch&eacute;p tiễn &ocirc;ng T&aacute;o về trời. Ngay từ s&aacute;ng sớm, chị em phụ nữ tr&ecirc;n đường đi l&agrave;m đ&atilde; tiện tay thả c&aacute; từ độ cao h&agrave;ng chục m&eacute;t xuống s&ocirc;ng Hồng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<table align=\"center\">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n			<p><img alt=\"Quang du thu xuong song, ho tien Tao quan chau troi hinh anh 2\" src=\"https://znews-photo-td.zadn.vn/w820/Uploaded/lerl/2018_02_08/tha_ca_zing_5.jpg\" style=\"height:267px; width:400px\" /></p>\r\n			</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Nh&acirc;n dịp n&agrave;y mọi vật dụng của năm cũ tr&ecirc;n ban thờ đều được họ &quot;ph&oacute;ng&quot; xuống s&ocirc;ng.</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', '', 12, 2),
(13, '\'Hốt bạc\' nhờ đu đủ vàng', 'thanhnien.vn', 'Đu đủ vàng mini trồng trong chậu để chưng tết bất ngờ tăng giá từ 300.000 đồng lên 500.000 đồng/cặp khiến nhà vườn H.Chợ Lách (Bến Tre) vô cùng phấn khởi.', '<p>Ng&agrave;y 6.2, vợ chồng chị Nguyễn Thu H&agrave; (ngụ x&atilde; Vĩnh Th&agrave;nh, H.Chợ L&aacute;ch) quyết định b&aacute;n hết 500 chậu đu đủ v&agrave;ng mini l&agrave;m kiểng cho thương l&aacute;i với gi&aacute; 500.000 đồng/cặp. Với gi&aacute; n&agrave;y, mỗi cặp đu đủ v&agrave;ng, gia đ&igrave;nh chị thu l&atilde;i tr&ecirc;n 350.000 đồng. Theo chị H&agrave;, việc kh&oacute; đầu ti&ecirc;n khi trồng đu đủ v&agrave;ng l&agrave; t&igrave;m mua c&acirc;y giống. Song kh&oacute; nhất l&agrave; trong thời gian chăm s&oacute;c phải xử l&yacute; sao cho c&acirc;y c&oacute; t&aacute;n l&aacute; gọn với chiều cao từ 60 - 90 cm (chỉ bằng 1/2 chiều cao c&acirc;y đu đủ th&ocirc;ng thường), sai tr&aacute;i đ&uacute;ng dịp tết mới b&aacute;n được. &ldquo;Mỗi c&acirc;y giống c&oacute; gi&aacute; 7.500 đồng/c&acirc;y nhưng phải đặt mua ở miền Trung, tỷ lệ hao hụt trong qu&aacute; tr&igrave;nh trồng thường khoảng 20%.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, việc xử l&yacute; cho c&acirc;y ra tr&aacute;i sai v&agrave; m&agrave;u v&agrave;ng đẹp mắt đ&uacute;ng dịp tết trong điều kiện thời tiết diễn biến hết sức phức tạp như năm nay gặp rất nhiều kh&oacute; khăn, tỷ lệ hao hụt l&ecirc;n tr&ecirc;n 50%&rdquo;, chị H&agrave; cho biết.</p>\r\n\r\n<p>Do việc chăm s&oacute;c đ&ograve;i hỏi kỹ thuật kh&aacute; cao, chiếm diện t&iacute;ch rộng&hellip; n&ecirc;n kiểng đu đủ v&agrave;ng chỉ được nh&agrave; vườn Chợ L&aacute;ch xem l&agrave; c&acirc;y trồng thứ yếu b&ecirc;n cạnh c&aacute;c loại hoa tết chủ lực, như: c&uacute;c, vạn thọ, hoa treo, mai. Từ tuần trước, hầu hết c&aacute;c nh&agrave; vườn c&oacute; trồng kiểng đu đủ đ&atilde; b&aacute;n hết cho c&aacute;nh thương l&aacute;i với gi&aacute; từ 250.000 - 300.000 đồng/cặp</p>\r\n', '19224_en_1.jpg', 7, 2),
(14, 'Độc đáo dừa hồ lô', 'tuoitre.vn', 'Những trái dừa xiêm lùn, dừa ta đã được anh Võ Hoàng Bửu (33 tuổi, ngụ P.Đông Thuận, TX.Bình Minh, Vĩnh Long) tạo hình hồ lô với 2 màu xanh, đỏ để cung ứng thị trường Tết Nguyên đán 2018.', '<p>Những tr&aacute;i dừa xi&ecirc;m l&ugrave;n, dừa ta đ&atilde; được anh V&otilde; Ho&agrave;ng Bửu (33 tuổi, ngụ P.Đ&ocirc;ng Thuận, TX.B&igrave;nh Minh, Vĩnh Long) tạo h&igrave;nh hồ l&ocirc; với 2 m&agrave;u xanh, đỏ để cung ứng thị trường Tết Nguy&ecirc;n đ&aacute;n 2018.</p>\r\n\r\n<p><a href=\"https://image.thanhnien.vn/1600/uploaded/hoangnam/2018_02_04/5b4336975danh_1_pioi.jpg\"><img alt=\"Mất hơn 1 năm nghiên cứu, thử nghiệm anh Bửu mới tạo hình dừa hồ lô thành công /// Ảnh: Thanh Đức\" src=\"https://image.thanhnien.vn/665/uploaded/hoangnam/2018_02_04/5b4336975danh_1_pioi.jpg\" /></a></p>\r\n\r\n<p>Mất hơn 1 năm nghi&ecirc;n cứu, thử nghiệm anh Bửu mới tạo h&igrave;nh dừa hồ l&ocirc; th&agrave;nh c&ocirc;ng</p>\r\n\r\n<p>ẢNH: THANH ĐỨC</p>\r\n\r\n<p>Để tạo h&igrave;nh hồ l&ocirc; cho tr&aacute;i dừa, anh Bửu phải trải qua thời gian d&agrave;i nghi&ecirc;n cứu v&agrave; kh&ocirc;ng &iacute;t lần thất bại. Kh&oacute; nhất l&agrave; t&igrave;m loại v&ograve;ng ph&ugrave; hợp để &ldquo;thắt eo&rdquo; cho tr&aacute;i dừa, kế đến l&agrave; c&ocirc;ng đoạn v&ocirc; khung. Ban đầu d&ugrave;ng d&acirc;y kẽm nhưng d&acirc;y bị đứt, sau một thời gian m&agrave;y m&ograve;, cuối c&ugrave;ng anh cũng t&igrave;m được kim loại ph&ugrave; hợp, kết hợp với vật liệu mềm l&oacute;t ph&iacute;a trong chiếc v&ograve;ng để tr&aacute;i dừa kh&ocirc;ng bị cấn, trầy da trong qu&aacute; tr&igrave;nh ph&aacute;t triển, nhằm tạo sự b&oacute;ng l&aacute;ng.</p>\r\n\r\n<p>Theo anh Bửu, c&ocirc;ng đoạn v&ocirc; khung để tạo h&igrave;nh kh&ocirc;ng đơn giản bởi phải &ldquo;canh me&rdquo; khi tr&aacute;i dừa lớn bằng tr&aacute;i cam mật (khoảng 1,5 th&aacute;ng tuổi) v&agrave; chọn k&iacute;ch thước khung vừa vặn. B&ecirc;n cạnh đ&oacute; phải chọn những buồng tr&aacute;i thưa, &iacute;t ch&egrave;n &eacute;p. Với những c&acirc;y dừa thấp th&igrave; dễ, c&acirc;y cao phải tr&egrave;o l&ecirc;n bẹ ngồi thắt v&ograve;ng cho cả buồng dừa, kh&aacute; nguy hiểm. Sau khi &ldquo;thắt eo&rdquo; để tạo d&aacute;ng cho tr&aacute;i dừa th&igrave; phải ch&uacute; &yacute; chăm s&oacute;c chu đ&aacute;o cho đến khi dừa được chừng 4 th&aacute;ng tuổi l&agrave; thời điểm đẹp nhất để đưa ra thị trường. &ldquo;Tr&aacute;i dừa hồ l&ocirc; đẹp th&igrave; da phải s&aacute;ng mịn, kh&ocirc;ng t&igrave; vết; d&aacute;ng đẹp, kh&ocirc;ng m&eacute;o m&oacute;, c&acirc;n đối ba v&ograve;ng: v&ograve;ng một v&agrave; v&ograve;ng ba tr&ograve;n trịa, v&ograve;ng eo vừa vặn&rdquo;, anh Bửu n&oacute;i.</p>\r\n', '19177_en_1.jpg', 7, 2),
(15, 'Giá vàng, USD tiếp tục giảm', 'tuoitre.vn', 'Giá vàng miếng SJC sụt giảm mạnh 140.000 đồng/lượng so với giá ngày hôm qua. Mỗi lượng vàng SJC được Công ty vàng bạc đá quý Sài Gòn - SJC mua vào 36,53 triệu đồng, bán ra 36,7 triệu đồng.', '<p>Gi&aacute; v&agrave;ng thế giới tiếp tục giảm th&ecirc;m 5 USD/ounce trong phi&ecirc;n giao dịch 7.2 tại thị trường Mỹ, tức s&aacute;ng 8.2 tại Việt Nam, c&ograve;n 1.318 USD/ounce, c&oacute; thời điểm gi&aacute; xuống 1.311 USD/ounce.</p>\r\n\r\n<p><a href=\"https://thanhnien.vn/kinh-doanh/gia-vang-usd-cung-giam-932027.html\" rel=\"\" target=\"_blank\"><img alt=\"Giá vàng, USD tiếp tục giảm - ảnh 1\" src=\"https://image.thanhnien.vn/160x105/uploaded/hoangnam/2018_02_07/anhtno1_fguo.jpg\" style=\"height:263px; width:400px\" /></a></p>\r\n\r\n<p>Theo Reuters, gi&aacute; v&agrave;ng thế giới giảm phi&ecirc;n thứ ba li&ecirc;n tiếp do chỉ số đồng USD tăng so với 6 đồng tiền chủ chốt trong rổ tiền tệ nhờ c&aacute;c thị trường chứng kho&aacute;n đang hồi phục t&iacute;ch cực trở lại cũng như những lo ngại Cục Dự trữ Li&ecirc;n bang Mỹ sẽ n&acirc;ng l&atilde;i suất cơ bản với tốc độ nhanh hơn dự kiến trong năm nay.</p>\r\n\r\n<p>Tr&ecirc;n thị trường ngoại tệ, tỷ gi&aacute; USD tại c&aacute;c ng&acirc;n h&agrave;ng thương mại tiếp tục giảm 10 - 20 đồng/USD so với ng&agrave;y 7.2. Tại Vietcombank, ACB gi&aacute; mua - b&aacute;n c&ograve;n 22.650 - 22.720 đồng/USD. Eximbank giảm gi&aacute; mua USD về 22.630 đồng/USD, gi&aacute; b&aacute;n c&ograve;n 22.720 đồng/USD; BIDV c&ograve;n 22.660 - 22.730 đồng/USD&hellip; Đ&acirc;y l&agrave; ng&agrave;y thứ hai li&ecirc;n tiếp, gi&aacute; USD tại c&aacute;c ng&acirc;n h&agrave;ng giảm.</p>\r\n\r\n<p>Ng&acirc;n h&agrave;ng Nh&agrave; nước Việt Nam giảm tỷ gi&aacute; trung t&acirc;m th&ecirc;m 10 đồng, xuống mức 22.435 đồng/USD.</p>\r\n', '', 3, 2),
(16, 'Dự báo thị trường tiền ảo đạt 1.000 tỉ USD năm nay', 'tuoitre.vn', 'Đây là nhận định của nhiều chuyên gia. Họ còn cho rằng bitcoin có thể chạm mốc 50.000 USD cũng trong năm nay.', '<p>Theo CNBC, bitcoin vừa giảm gi&aacute; mạnh trong những ng&agrave;y gần đ&acirc;y, trượt xuống dưới 6.000 USD lần đầu ti&ecirc;n từ giữa th&aacute;ng 11. Tại thời điểm tệ nhất h&ocirc;m 6.2, vốn h&oacute;a thị trường tiền ảo mất hơn 550 tỉ USD. Ng&agrave;y 7.2, gi&aacute; bitcoin tăng l&ecirc;n tr&ecirc;n 7.000 USD v&agrave; thị trường tiền thuật to&aacute;n ổn định trở lại. Sau biến động mạnh, nhiều chuy&ecirc;n gia trong ng&agrave;nh dự b&aacute;o một đợt tăng gi&aacute; mới.</p>\r\n\r\n<p>Thomas Glucksmann, chuy&ecirc;n gia đứng đầu bộ phận ph&aacute;t triển kinh doanh APAC tại s&agrave;n giao dịch tiền thuật to&aacute;n Gatecoin, cho hay: &ldquo;Việc c&aacute;c s&agrave;n giao dịch tiền ảo ng&agrave;y c&agrave;ng được c&ocirc;ng nhận về mặt ph&aacute;p l&yacute;, vốn của c&aacute;c tổ chức bước v&agrave;o v&agrave; bước ph&aacute;t triển c&ocirc;ng nghệ sẽ g&oacute;p phần gi&uacute;p thị trường hồi phục, đẩy gi&aacute; tiền thuật to&aacute;n l&ecirc;n mức cao mới trong năm nay. Chẳng c&oacute; l&yacute; do g&igrave; m&agrave; ch&uacute;ng ta kh&ocirc;ng thể thấy gi&aacute; bitcoin l&ecirc;n 50.000 USD v&agrave;o th&aacute;ng 12&rdquo;.</p>\r\n\r\n<p>Tiến bộ c&ocirc;ng nghệ của bitcoin được &ocirc;ng Glucksmann nhắc đến l&agrave; Lightning Network, gi&uacute;p tăng tốc độ giao dịch. Một yếu tố kh&aacute;c c&oacute; thể th&uacute;c đẩy gi&aacute; tăng mạnh l&agrave; việc c&ocirc;ng cụ t&agrave;i ch&iacute;nh hậu thuẫn bởi tiền ảo được ni&ecirc;m yết tr&ecirc;n một s&agrave;n giao dịch lớn. &ldquo;Chuyện ch&uacute;ng ta c&oacute; một quỹ ho&aacute;n đổi danh mục (ETF) tiền thuật to&aacute;n chỉ l&agrave; vấn đề thời gian&rdquo;, &ocirc;ng Glucksmann nhận định.</p>\r\n', '19230_en_1.jpg', 3, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(80) NOT NULL,
  `level` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `email`, `level`) VALUES
(1, 'admin', '12345', '41000816@hcmut.edu.vn', 2),
(2, 'henry', '827ccb0eea8a706c4c34a16891f84e7b', 'henry@yahoo.com', 2),
(3, 'lulu', '12345', 'lulu@gmail.com', 1),
(5, 'city', '12345', 'city@yahoo.com', 1),
(6, 'kiwi222', '54321', 'kiwi@hmail.com', 1),
(7, 'lactomin', '12345', 'lactomin@live.com', 1),
(9, 'tiki', '12345', 'tiki@gmail.com', 1),
(10, 'haochung789', '56789', 'haochung@gmail.com', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cate_news`
--
ALTER TABLE `cate_news`
  ADD PRIMARY KEY (`cate_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cate_news`
--
ALTER TABLE `cate_news`
  MODIFY `cate_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
