-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 15, 2020 lúc 01:32 AM
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
-- Cấu trúc bảng cho bảng `tblbook`
--

CREATE TABLE `tblbook` (
  `ID` int NOT NULL,
  `booktitle` varchar(255) DEFAULT NULL,
  `bookauthors` varchar(255) DEFAULT NULL,
  `subjectid` int DEFAULT NULL,
  `mdescription` text,
  `publisher` varchar(255) DEFAULT NULL,
  `copyrightyear` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tblbook`
--

INSERT INTO `tblbook` (`ID`, `booktitle`, `bookauthors`, `subjectid`, `mdescription`, `publisher`, `copyrightyear`) VALUES
(4, 'Số đỏ', 'Vũ Trọng Phụng', NULL, '123123', 'Kim ĐỒng', 1992),
(5, 'Số đỏ', 'Vũ Trọng Phụng', NULL, '123123', 'Kim ĐỒng', 1992),
(7, 'Số đỏ', 'Vũ Trọng Phụng', NULL, '123123', 'Kim ĐỒng', 1992),
(9, 'Doremon', 'Vũ Trọng Phụng', 5, '', '', 0),
(10, 'Số đỏ', 'honda', 5, '', '', 0),
(11, 'Số đỏ', 'Nguyễn Hiếu Anh', 5, '', '', 0);

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
(80, 4, '2020-05-14', '2020-06-13', NULL, 4),
(81, 9, '2020-05-14', '2020-06-13', NULL, 4);

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
(1, 'anh', 'hieu1992', '', '', NULL, '', NULL, 'male', 'hieuanh92!A', 'default.png', 5, 'deactive'),
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
(10, 'Scientific', '');

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tblborrowedbook`
--
ALTER TABLE `tblborrowedbook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `tblborrower`
--
ALTER TABLE `tblborrower`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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
