-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th5 13, 2020 lúc 10:50 AM
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
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `studentid` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `phone` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `password` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `role` int DEFAULT '5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Đang đổ dữ liệu cho bảng `tblborrower`
--

INSERT INTO `tblborrower` (`ID`, `username`, `studentid`, `email`, `phone`, `password`, `avatar`, `role`) VALUES
(1, 'hieu1992', '', '', NULL, 'hieuanh92!A', NULL, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblsubject`
--

CREATE TABLE `tblsubject` (
  `ID` int NOT NULL,
  `subjectname` varchar(255) DEFAULT NULL,
  `desription` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tblborrowedbook`
--
ALTER TABLE `tblborrowedbook`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tblborrower`
--
ALTER TABLE `tblborrower`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT;

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
