-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 23, 2020 lúc 08:19 AM
-- Phiên bản máy phục vụ: 8.0.20-0ubuntu0.20.04.1
-- Phiên bản PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `library`
--

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `borrow_detail`
-- (See below for the actual view)
--
CREATE TABLE `borrow_detail` (
`bookId` int
,`booktitle` varchar(255)
,`borrowerid` int
,`dateborrowed` date
,`duedate` date
,`fullname` varchar(100)
,`status` varchar(20)
,`ticketId` int
);

-- --------------------------------------------------------

--
-- Cấu trúc đóng vai cho view `history_borrow`
-- (See below for the actual view)
--
CREATE TABLE `history_borrow` (
`booktitle` varchar(255)
,`borrowerid` int
,`dateborrowed` varchar(20)
,`datereturned` varchar(20)
,`duedate` varchar(20)
,`fullname` varchar(100)
);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int NOT NULL,
  `booktitle` varchar(255) DEFAULT NULL,
  `bookauthors` varchar(255) DEFAULT NULL,
  `subjectid` int DEFAULT NULL,
  `mdescription` text,
  `publisher` varchar(255) DEFAULT NULL,
  `copyrightyear` int DEFAULT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'available',
  `cover` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'book-default.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbook`
--

INSERT INTO `tblbook` (`ID`, `booktitle`, `bookauthors`, `subjectid`, `mdescription`, `publisher`, `copyrightyear`, `status`, `cover`) VALUES
(13, 'Số đỏ', 'Vũ Trọng Phụng', 5, 'Số đỏ là một tiểu thuyết văn học của nhà văn Vũ Trọng Phụng, đăng ở Hà Nội báo từ số 40 ngày 7 tháng 10 năm 1936 và được in thành sách lần đầu vào năm 1938. Nhiều nhân vật và câu nói trong tác phẩm đã đi vào cuộc sống đời thường và tác phẩm đã được dựng thành kịch, phim. Nhân vật chính của Số đỏ là Xuân - biệt danh là Xuân Tóc đỏ, từ chỗ là một kẻ bị coi là hạ lưu, bỗng nhảy lên tầng lớp danh giá của xã hội nhờ trào lưu Âu hóa của giới tiểu tư sản Hà Nội khi đó. Tác phẩm Số đỏ, cũng như các tác phẩm khác của Vũ Trọng Phụng đã từng bị cấm lưu hành tại Việt Nam Dân chủ Cộng hòa trước năm 1975 cũng như tại Việt Nam thống nhất cho đến năm 1986.[1]\r\n\r\nCho đến nay, tác phẩm Số đỏ đã được tái xuất bản và được phê duyệt ở Việt Nam. Đồng thời đoạn trích của tác phẩm này cũng được đưa vào chương trình học ở trong nước (SGK Ngữ Văn 11, tập 1 với tên gọi: Hạnh phúc của một tang gia).\r\nTruyện dài 20 chương và được bắt đầu khi bà Phó Đoan đến chơi ở sân quần vợt nơi Xuân tóc đỏ làm việc. Vô tình Xuân tóc đỏ vì xem trộm 1 cô đầm thay đồ nên bị cảnh sát bắt giam và được bà Phó Đoan bảo lãnh. Sau đó, bà Phó Đoan giới thiệu Xuân đến làm việc ở tiệm may Âu Hóa, từ đó Xuân bắt đầu tham gia vào việc cải cách xã hội. Nhờ thuộc lòng những bài quảng cáo thuốc lậu, hắn được vợ chồng Văn Minh gọi là \"sinh viên trường thuốc\", \"đốc tờ Xuân\". Hắn gia nhập xã hội thượng lưu, quen với những người giàu và có thế lực, quyến rũ được cô Tuyết và phát hiện cô Hoàng Hôn ngoại tình. Xuân còn được bà Phó Đoan nhờ dạy dỗ cậu Phước, được nhà sư Tăng Phú mời làm cố vấn cho báo Gõ Mõ. Vì vô tình, hắn gây ra cái chết cho cụ cố tổ nên được mọi người mang ơn. Văn Minh vì nghĩ ơn của Xuân nên dẫn Xuân đi xóa bỏ lý lịch trước kia rồi đăng ký đi tranh giải quần vợt nhân dịp vua Xiêm đến Bắc Kì. Bằng thủ đoạn xảo trá, hắn làm 2 vận động viên quán quân bị bắt ngay trước hôm thi đấu nên Xuân được dịp thi tài với quán quân Xiêm. Vì để giữ tình giao hảo, hắn được lệnh phải thua. Kết thúc trận đấu, khi bị đám đông phản đối, Xuân hùng hồn diễn thuyết cho đám đông dân chúng hiểu hành động \"hy sinh vì tổ quốc của mình\", được mời vào hội Khai trí tiến đức, được nhận huân chương Bắc Đẩu bội tinh và cuối cùng trở thành con rể cụ cố Hồng.', '', 0, 'available', '1589736285-21.jpg'),
(15, 'Truyện Kiều', 'Nguyễn Du', 5, 'Đoạn trường tân thanh (chữ Hán: 斷腸新聲), thường được biết đến đơn giản là Truyện Kiều (chữ Nôm: 傳翹), là một truyện thơ của thi sĩ Nguyễn Du (1766–1820). Đây được xem là truyện thơ nổi tiếng nhất và xét vào hàng kinh điển trong văn học Việt Nam, tác phẩm được viết bằng chữ Nôm theo thể lục bát, gồm 3254 câu.\r\n\r\nCâu chuyện dựa theo tiểu thuyết Kim Vân Kiều truyện của Thanh Tâm Tài Nhân, một thi sĩ thời nhà Minh, Trung Quốc.[1]\r\n\r\nTác phẩm kể lại cuộc đời, những thử thách và đau khổ của Thúy Kiều, một phụ nữ trẻ xinh đẹp và tài năng, phải hy sinh thân mình để cứu gia đình. Để cứu cha và em trai khỏi tù, cô bán mình kết hôn với một người đàn ông trung niên, không biết rằng anh ta là một kẻ buôn người, và bị ép làm kĩ nữ trong lầu xanh.', '', 0, 'available', '1589736899-truyen-kieu-kim-van-kieu-tan-truyen-bia.jpg'),
(16, 'Vợ nhặt', 'Kim Lân', 5, 'Năm 1945, nạn đói khủng khiếp xảy ra tràn lan khắp nơi, người chết như ngả rạ, người sống cũng vật vờ như những bóng ma. Tràng là một người xấu xí, thô kệch, ế vợ, sống ở xóm ngụ cư. Tràng làm nghề kéo xe bò thuê và sống với một mẹ già. Một lần kéo xe thóc Liên đoàn lên tỉnh, Tràng đã quen với một cô gái. Vài ngày sau gặp lại, Tràng không còn nhận ra cô gái ấy, bởi vẻ tiều tụy, đói rách làm cô đã khác đi rất nhiều. Tràng đã mời cô gái một bữa ăn, cô gái liền ăn một lúc bốn bát bánh đúc. Sau một câu nói nửa thật, nửa đùa, cô gái đã theo anh về nhà làm vợ. Việc Tràng nhặt được vợ đã làm cả xóm ngụ cư ngạc nhiên, nhất là bà cụ Tứ (mẹ Tràng) đón nhận người con dâu trong tâm trạng vừa buồn vừa mừng, vừa lo âu, vừa hi vọng nhưng không hề tỏ ra rẻ rúng người phụ nữ đã theo không con mình. Đêm tân hôn của họ diễn ra trong không khí chết chóc, tủi sầu từ xóm ngụ cư vọng tới. Sáng hôm sau, một buổi sáng mùa hạ, nắng chói lóa. Bà cụ Tứ và cô dâu mới xăm xắn dọn dẹp, quét tước trong ngoài. Trước cảnh ấy, Tràng cảm thấy mình gắn bó và có trách nhiệm với cái nhà của mình và thấy mình nên người, trông người vợ đúng là một người phụ nữ hiền hậu đúng mực, không còn vẻ gì chao chát chỏng lỏn như lần đầu gặp nhau. Bà cụ Tứ hồ hởi đãi hai con vài bát cháo loãng và một nồi chè cám. Qua lời kể của người vợ, Tràng dần dần hiểu được Việt Minh và trong óc Tràng hiện lên hình ảnh đám người đói kéo nhau đi phá kho thóc Nhật, phía trước là một lá cờ đỏ bay phấp phới.', '', 0, 'available', '1589737867-image_96.png'),
(18, 'Doremon', 'Fujiko F Fujio', 5, 'Doraemon (ドラえもん tên cũ tại Việt Nam Đôrêmon?) là nhân vật chính hư cấu trong loạt manga cùng tên của họa sĩ Fujiko F. Fujio. Trong truyện lấy bối cảnh ở thế kỷ 20, Doraemon là chú mèo robot của tương lai do xưởng Matsushiba — công xưởng chuyên sản xuất robot vốn dĩ nhằm mục đích chăm sóc trẻ nhỏ. Ban đầu, chú mèo vốn dĩ thuộc sở hữu của cậu bé Sewashi, là con cháu nhiều đời sau của Nobita nhưng về sau Sewashi gửi lại cho ông Nobita của mình nhằm cải thiện cuộc sống của ông mình do Nobita là người hậu đậu, vụng về, luôn gặp trắc trở trong cuộc sống mà dẫn đến các thế hệ con cháu sau này phải sống trong cảnh nghèo khổ trong đó có Sewashi. Doraemon có một chiếc túi nhỏ trước bụng mà bên trong chứa vô vàn bảo bối tiện ích của tương lai chính vì vậy mà thường xuyên bị Nobita vòi vĩnh mượn.', '', 0, 'available', '1589736357-e3f34de992ae4267f272550a5935447f.jpg'),
(19, 'Nguồn cội', 'Dan Brown', 10, 'Nguồn cội là một cuốn tiểu thuyết kinh dị, bí ẩn, năm 2017 của tác giả người Mỹ Dan Brown. và phần thứ năm trong series Robert Langdon của ông, tiếp theo của Thiên thần & Ác quỷ, Mật mã Da Vinci, Biểu tượng thất truyền và Hỏa ngục. Cuốn sách được phát hành vào ngày 3 tháng 10 năm 2017 bởi Doubleday.', '', 0, 'available', '1589789578-1589725063-nguon-coi.jpg'),
(20, 'Chí Phèo', 'Nam Cao', 5, 'Chí Phèo là một truyện ngắn nổi tiếng của nhà văn Nam Cao viết vào tháng 2 năm 1941. Chí Phèo là một tác phẩm xuất sắc, thể hiện nghệ thuật viết truyện độc đáo của Nam Cao, đồng thời là một tấn bi kịch của một người nông dân nghèo bị tha hóa trong xã hội. Chí Phèo cũng là tên nhân vật chính của truyện', 'Văn học', 0, 'available', '1589789708-anh-baiviet-48568-05dec57c-9e6d-4e30-9989-226b49040205-e1576643891314.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblborrowedbook`
--

CREATE TABLE `tblborrowedbook` (
  `ID` int NOT NULL,
  `bookid` int DEFAULT NULL,
  `dateborrowed` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `datereturned` date DEFAULT NULL,
  `borrowerid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblborrower`
--

CREATE TABLE `tblborrower` (
  `ID` int NOT NULL,
  `fullname` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `studentid` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(8) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'male',
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `role` int DEFAULT '5',
  `status` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tblborrower`
--

INSERT INTO `tblborrower` (`ID`, `fullname`, `username`, `studentid`, `email`, `phone`, `address`, `dob`, `gender`, `password`, `avatar`, `role`, `status`) VALUES
(1, 'anh', 'hieu1992', '', '', NULL, '', NULL, 'male', 'hieuanh92!A', 'default.png', 5, 'active'),
(2, 'anh nguyen', 'admin', '', '', '0987656432', 'Đào Tấn', '2020-05-04', 'female', 'hieuanh92!A', '1589529116_AdobeStock_313222349_Preview.jpg', 1, 'active'),
(3, '', 'admin1', '', '', NULL, '', NULL, 'male', '123456', NULL, 5, 'deactive'),
(4, 'Anh Nguyễn', 'hieuanh92', 'h12', 'hieu132@gmail.com', '', '', '1992-09-09', 'male', 'hieuanh92!A', '1589417697_AdobeStock_313222349_Preview.jpg', 5, 'deactive'),
(5, '', 'hoang1234', 'h111', 'hoang@gmail.com', '0987654342', '', NULL, 'male', 'hieuanh92!A', NULL, 5, 'deactive'),
(6, NULL, 'hung123456', 'hu12', 'hung@gmail.com', '0987654342', NULL, NULL, 'male', 'hieuanh92!A', NULL, 5, 'deactive'),
(7, NULL, 'minhtran', 'min12', 'minh@gmail.com', '0987362547', NULL, NULL, 'male', 'hieuanh92!A', NULL, 5, 'deactive');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsubject`
--

CREATE TABLE `tblsubject` (
  `ID` int NOT NULL,
  `subjectname` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tblsubject`
--

INSERT INTO `tblsubject` (`ID`, `subjectname`, `description`) VALUES
(5, 'Drama', 'Drama depends a lot on realistic characters dealing with emotional themes, such as: alcoholism, drug addiction, infidelity, morals, racism, religion, intolerance, sexuality, poverty, class issues, violence, and corruption [society or natural disasters can even be thrown in from time to time]. Drama often crosses over and meshes with other genres'),
(10, 'Scientific', ''),
(13, 'Manga', ''),
(14, 'Văn học', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ticket_dump`
--

CREATE TABLE `ticket_dump` (
  `ID` varchar(11) NOT NULL,
  `bookid` varchar(11) DEFAULT NULL,
  `dateborrowed` varchar(20) DEFAULT NULL,
  `duedate` varchar(20) DEFAULT NULL,
  `datereturned` varchar(20) DEFAULT NULL,
  `borrowerid` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `ticket_dump`
--

INSERT INTO `ticket_dump` (`ID`, `bookid`, `dateborrowed`, `duedate`, `datereturned`, `borrowerid`) VALUES
('113', '13', '2020-05-15', '2020-06-14', '2020-05-15', '4'),
('114', '14', '2020-05-15', '2020-06-14', '2020-05-15', '4'),
('115', '15', '2020-05-15', '2020-06-14', '2020-05-15', '4'),
('116', '16', '2020-05-15', '2020-06-14', '2020-05-15', '4'),
('117', '17', '2020-05-15', '2020-06-14', '2020-05-15', '4'),
('118', '13', '2020-05-17', '2020-06-16', '2020-05-17', '4'),
('119', '14', '2020-05-17', '2020-06-16', '2020-05-17', '4'),
('120', '15', '2020-05-17', '2020-06-16', '2020-05-17', '4'),
('121', '16', '2020-05-17', '2020-06-16', '2020-05-17', '4'),
('122', '17', '2020-05-17', '2020-06-16', '2020-05-17', '4'),
('123', '13', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('124', '15', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('125', '16', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('126', '17', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('127', '18', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('128', '13', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('129', '15', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('130', '16', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('131', '16', '2020-05-18', '2020-06-17', '2020-05-18', '1'),
('132', '17', '2020-05-18', '2020-06-17', '2020-05-18', '1'),
('133', '18', '2020-05-18', '2020-06-17', '2020-05-18', '1'),
('134', '13', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('135', '15', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('136', '13', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('137', '15', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('138', '16', '2020-05-18', '2020-06-17', '2020-05-18', '4'),
('139', '17', '2020-05-18', '2020-06-17', '2020-05-18', '1'),
('140', '18', '2020-05-18', '2020-06-17', '2020-05-18', '1'),
('141', '13', '2020-05-18', '2020-06-17', '2020-05-18', '7'),
('142', '15', '2020-05-18', '2020-06-17', '2020-05-18', '7'),
('143', '16', '2020-05-18', '2020-06-17', '2020-05-18', '7'),
('144', '17', '2020-05-18', '2020-06-17', '2020-05-18', '7'),
('145', '18', '2020-05-18', '2020-06-17', '2020-05-18', '7');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `borrow_detail`
--
DROP TABLE IF EXISTS `borrow_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `borrow_detail`  AS  select `tblborrowedbook`.`ID` AS `ticketId`,`tblborrowedbook`.`borrowerid` AS `borrowerid`,`tblborrower`.`fullname` AS `fullname`,`tblbook`.`ID` AS `bookId`,`tblbook`.`booktitle` AS `booktitle`,`tblborrowedbook`.`dateborrowed` AS `dateborrowed`,`tblborrowedbook`.`duedate` AS `duedate`,`tblbook`.`status` AS `status` from ((`tblborrowedbook` join `tblborrower` on((`tblborrower`.`ID` = `tblborrowedbook`.`borrowerid`))) join `tblbook` on((`tblbook`.`ID` = `tblborrowedbook`.`bookid`))) ;

-- --------------------------------------------------------

--
-- Cấu trúc cho view `history_borrow`
--
DROP TABLE IF EXISTS `history_borrow`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `history_borrow`  AS  select `tblbook`.`booktitle` AS `booktitle`,`tblborrower`.`ID` AS `borrowerid`,`tblborrower`.`fullname` AS `fullname`,`ticket_dump`.`dateborrowed` AS `dateborrowed`,`ticket_dump`.`duedate` AS `duedate`,`ticket_dump`.`datereturned` AS `datereturned` from ((`ticket_dump` join `tblbook` on((`tblbook`.`ID` = `ticket_dump`.`bookid`))) join `tblborrower` on((`tblborrower`.`ID` = `ticket_dump`.`borrowerid`))) ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblbook`
--
ALTER TABLE `tblbook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `subjectid` (`subjectid`);

--
-- Chỉ mục cho bảng `tblborrowedbook`
--
ALTER TABLE `tblborrowedbook`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bookid` (`bookid`),
  ADD KEY `borrowerid` (`borrowerid`);

--
-- Chỉ mục cho bảng `tblborrower`
--
ALTER TABLE `tblborrower`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `ticket_dump`
--
ALTER TABLE `ticket_dump`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tblborrowedbook`
--
ALTER TABLE `tblborrowedbook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT cho bảng `tblborrower`
--
ALTER TABLE `tblborrower`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tblbook`
--
ALTER TABLE `tblbook`
  ADD CONSTRAINT `tblbook_ibfk_1` FOREIGN KEY (`subjectid`) REFERENCES `tblsubject` (`ID`);

--
-- Các ràng buộc cho bảng `tblborrowedbook`
--
ALTER TABLE `tblborrowedbook`
  ADD CONSTRAINT `tblborrowedbook_ibfk_1` FOREIGN KEY (`bookid`) REFERENCES `tblbook` (`ID`),
  ADD CONSTRAINT `tblborrowedbook_ibfk_2` FOREIGN KEY (`borrowerid`) REFERENCES `tblborrower` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
