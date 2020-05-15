-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 15, 2020 lúc 01:33 PM
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
`ticketId` int
,`borrowerid` int
,`fullname` varchar(100)
,`bookId` int
,`booktitle` varchar(255)
,`dateborrowed` date
,`duedate` date
,`status` varchar(20)
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
(13, 'Số đỏ', 'Vũ Trọng Phụng', 5, '', '', 0, 'available', 'book-default.png'),
(14, 'Doremon', 'honda', 5, '', '', 0, 'available', 'book-default.png'),
(15, 'Truyện Kiều', 'Nguyễn Du', 5, '', '', 0, 'available', 'book-default.png'),
(16, 'Vợ nhặt', 'Kim Lân', 5, '', '', 0, 'unavailable', 'book-default.png'),
(17, 'Bí kíp làm giàu', 'Huần Hoa Hồng', 10, '', '', 0, 'unavailable', 'book-default.png');

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

--
-- Đang đổ dữ liệu cho bảng `tblborrowedbook`
--

INSERT INTO `tblborrowedbook` (`ID`, `bookid`, `dateborrowed`, `duedate`, `datereturned`, `borrowerid`) VALUES
(101, 16, '2020-05-15', '2020-06-14', NULL, 4),
(102, 17, '2020-05-15', '2020-06-14', NULL, 4);

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
(2, 'anh nguyen', 'admin', '', '', '0987656432', 'Đào Tấn', '2020-05-04', 'female', 'hieuanh92!A', 'default.png', 1, 'active'),
(3, '', 'admin1', '', '', NULL, '', NULL, 'male', '123456', NULL, 5, 'active'),
(4, 'Anh Nguyễn', 'hieuanh92', 'h12', 'hieu132@gmail.com', '', '', '1992-09-09', 'male', 'hieuanh92!AS', '1589417697_AdobeStock_313222349_Preview.jpg', 5, 'active'),
(5, '', 'hoang1234', 'h111', 'hoang@gmail.com', '0987654342', '', NULL, 'male', 'hieuanh92!A', NULL, 5, 'active'),
(6, NULL, 'hung123456', 'hu12', 'hung@gmail.com', '0987654342', NULL, NULL, 'male', 'hieuanh92!A', NULL, 5, 'active');

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
(12, 'Horror', '');

-- --------------------------------------------------------

--
-- Cấu trúc cho view `borrow_detail`
--
DROP TABLE IF EXISTS `borrow_detail`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `borrow_detail`  AS  select `tblborrowedbook`.`ID` AS `ticketId`,`tblborrowedbook`.`borrowerid` AS `borrowerid`,`tblborrower`.`fullname` AS `fullname`,`tblbook`.`ID` AS `bookId`,`tblbook`.`booktitle` AS `booktitle`,`tblborrowedbook`.`dateborrowed` AS `dateborrowed`,`tblborrowedbook`.`duedate` AS `duedate`,`tblbook`.`status` AS `status` from ((`tblborrowedbook` join `tblborrower` on((`tblborrower`.`ID` = `tblborrowedbook`.`borrowerid`))) join `tblbook` on((`tblbook`.`ID` = `tblborrowedbook`.`bookid`))) ;

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
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblbook`
--
ALTER TABLE `tblbook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tblborrowedbook`
--
ALTER TABLE `tblborrowedbook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `tblborrower`
--
ALTER TABLE `tblborrower`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

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
