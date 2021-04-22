-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th12 24, 2020 lúc 05:27 PM
-- Phiên bản máy phục vụ: 10.3.16-MariaDB
-- Phiên bản PHP: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `id14635799_card`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `card`
--

CREATE TABLE `card` (
  `cardID` int(11) NOT NULL,
  `cardNhaMang` varchar(3) NOT NULL,
  `cardMenhGia` int(11) NOT NULL,
  `cardGiaGoc` int(11) NOT NULL,
  `cardHSD` date NOT NULL,
  `cardSeRi` varchar(16) NOT NULL,
  `cardMaThe` varchar(16) NOT NULL,
  `cardStatus` int(1) NOT NULL,
  `cardHinhAnh` text NOT NULL,
  `userID` int(11) NOT NULL,
  `cardChietKhau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `card`
--

INSERT INTO `card` (`cardID`, `cardNhaMang`, `cardMenhGia`, `cardGiaGoc`, `cardHSD`, `cardSeRi`, `cardMaThe`, `cardStatus`, `cardHinhAnh`, `userID`, `cardChietKhau`) VALUES
(2, 'VNM', 20000, 11100, '2024-12-31', '2026200069024990', '063799352917', 1, '1.PNG', 4, 3115),
(3, 'VN', 50000, 42000, '2025-12-31', '59550018578635', '94351784282331', 0, '2.PNG', 4, 2800),
(4, 'VN', 50000, 42000, '2025-12-31', '59550018572308', '45212026382133', 0, '3.PNG', 4, 2800),
(5, 'VN', 50000, 35000, '2025-12-31', '59550018495912', '19332349998985', 0, '4.PNG', 4, 5250),
(6, 'VN', 20000, 13000, '2025-12-31', '59200023709768', '20184134597396', 0, '5.PNG', 4, 2450),
(7, 'VN', 20000, 13000, '2025-12-31', '59200023709770', '77594988943945', 0, '6.PNG', 4, 2450),
(8, 'VN', 20000, 14800, '2025-12-31', '59200022897450', '46930378409422', 0, '7.PNG', 4, 1820),
(9, 'MB', 20000, 11000, '2024-12-31', '091402000046061', '331715440992', 1, '8.PNG', 4, 3150),
(10, 'MB', 20000, 11000, '2024-12-31', '091402000033496', '718513004407', 1, '9.PNG', 4, 3150),
(11, 'MB', 20000, 9999, '2024-12-31', '090762000045181', '527723936570', 1, '10.PNG', 4, 3500),
(12, 'MB', 20000, 12000, '2024-12-31', '092462000020827', '086670341308', 1, 'Screenshot_20201212-092349.jpg', 4, 2800),
(13, 'MB', 20000, 12000, '2024-12-31', '092462000024246', '475065557802', 1, 'Screenshot_20201212-102013.jpg', 4, 2800),
(14, 'VT', 20000, 12000, '2021-12-08', '10006497119845', '410191619115441', 1, 'Screenshot_20201212-102226.jpg', 4, 2800),
(15, 'MB', 20000, 12000, '2024-12-31', '092462000021812', '000512275016', 1, '12122020011.jpg', 4, 2800),
(16, 'VT', 20000, 12000, '2021-12-08', '10006497117021', '110813385375186', 1, '12122020012321.jpg', 4, 2800),
(17, 'MB', 20000, 12000, '2024-12-31', '092672000103511', '369207002932', 1, '121220200sd1.jpg', 4, 2800),
(18, 'VT', 20000, 12000, '2020-12-31', '10006497719087', '514485957572058', 1, 'Screenshot_20201212-134249_Shopee.jpg', 7, 2800),
(19, 'VN', 20000, 12000, '2025-12-31', '59200025352327', '56865034688116', 0, 'Screenshot_20201212-140611_Shopee.jpg', 7, 2800);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huongdan`
--

CREATE TABLE `huongdan` (
  `hdID` int(11) NOT NULL,
  `hdTitle` text NOT NULL,
  `hdContent` text NOT NULL,
  `hdHinhAnh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsugiaodich`
--

CREATE TABLE `lichsugiaodich` (
  `LichSuGiaoDichID` int(11) NOT NULL,
  `LichSuGiaoDichLoai` int(1) NOT NULL,
  `LichSuGiaoDichNgay` datetime NOT NULL,
  `LichSuGiaoDichGiaTri` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `cardID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lichsugiaodich`
--

INSERT INTO `lichsugiaodich` (`LichSuGiaoDichID`, `LichSuGiaoDichLoai`, `LichSuGiaoDichNgay`, `LichSuGiaoDichGiaTri`, `userID`, `cardID`) VALUES
(1, 3, '2020-11-27 16:52:18', 282240, 6, NULL),
(2, 2, '2020-11-27 23:29:01', 14215, 4, 2),
(3, 2, '2020-11-27 23:29:07', 44800, 4, 3),
(4, 2, '2020-11-27 23:29:12', 44800, 4, 4),
(5, 2, '2020-11-27 23:29:17', 40250, 4, 5),
(6, 2, '2020-11-27 23:29:22', 15450, 4, 6),
(7, 2, '2020-11-27 23:29:42', 15450, 4, 7),
(8, 2, '2020-11-27 23:29:48', 16620, 4, 8),
(9, 2, '2020-11-27 23:29:53', 14150, 4, 9),
(10, 2, '2020-11-27 23:29:58', 14150, 4, 10),
(11, 2, '2020-11-27 23:30:03', 13499, 4, 11),
(12, 1, '2020-12-04 14:37:18', 16400, 6, 9),
(14, 1, '2020-12-04 14:48:29', 16400, 6, 10),
(15, 1, '2020-12-04 14:54:17', 16000, 6, 11),
(16, 1, '2020-12-09 12:15:29', 16440, 6, 2),
(17, 2, '2020-12-12 09:26:33', 14800, 4, 12),
(18, 2, '2020-12-12 10:45:13', 14800, 4, 17),
(19, 2, '2020-12-12 10:45:36', 14800, 4, 16),
(20, 2, '2020-12-12 10:46:02', 14800, 4, 15),
(21, 2, '2020-12-12 10:46:37', 14800, 4, 14),
(22, 2, '2020-12-12 10:47:00', 14800, 4, 13),
(23, 2, '2020-12-12 17:13:03', 14800, 7, 18),
(24, 2, '2020-12-12 17:13:55', 14800, 7, 19),
(25, 1, '2020-12-14 07:45:41', 16800, 6, 12),
(26, 1, '2020-12-14 07:46:17', 16800, 6, 13),
(27, 1, '2020-12-14 07:46:44', 16800, 6, 15),
(28, 3, '2020-12-19 07:16:55', 300000, 6, NULL),
(29, 4, '2020-12-19 07:19:28', 282240, 4, NULL),
(30, 1, '2020-12-19 15:30:01', 16800, 6, 17),
(31, 1, '2020-12-21 08:31:01', 16800, 6, 14),
(32, 1, '2020-12-21 20:47:55', 16800, 6, 16),
(33, 3, '2020-12-22 09:32:27', 50000, 5, NULL),
(34, 1, '2020-12-22 09:33:11', 17200, 5, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(16) NOT NULL,
  `userPassword` text NOT NULL,
  `userFullName` varchar(100) NOT NULL,
  `userSDT` varchar(12) NOT NULL,
  `userNgayTao` date NOT NULL,
  `userSoDu` int(11) NOT NULL,
  `userType` int(1) NOT NULL,
  `userChietKhau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`userID`, `userName`, `userPassword`, `userFullName`, `userSDT`, `userNgayTao`, `userSoDu`, `userType`, `userChietKhau`) VALUES
(1, 'admin', '111357b80856014d98201f9806bf92d2', 'admin', '0335687425', '2020-11-19', 350000, -1, 30),
(4, 'tla231199', '111357b80856014d98201f9806bf92d2', 'Huỳnh Văn Giỏi Em - Bán', '0335687425', '2020-11-27', 39944, 1, 35),
(5, '0335687425', '111357b80856014d98201f9806bf92d2', 'Huỳnh Văn Giỏi Em - Mua', '0335687425', '2020-11-27', 32800, 0, 35),
(6, '0964669924', '25d55ad283aa400af464c76d713c07ad', 'Dương Thúy Phượng', '0964669924', '2020-11-27', 416200, 0, 40),
(7, '0388026017', '85c94236901e39edc2600e0edf3361fc', 'Chế Quang Huy', '0388026017', '2020-12-08', 29600, 1, 35);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardID`),
  ADD KEY `fk_card_user` (`userID`);

--
-- Chỉ mục cho bảng `huongdan`
--
ALTER TABLE `huongdan`
  ADD PRIMARY KEY (`hdID`);

--
-- Chỉ mục cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  ADD PRIMARY KEY (`LichSuGiaoDichID`),
  ADD KEY `fk_LichSuGiaoDich_user1` (`userID`),
  ADD KEY `fk_LichSuGiaoDich_card1` (`cardID`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `card`
--
ALTER TABLE `card`
  MODIFY `cardID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `huongdan`
--
ALTER TABLE `huongdan`
  MODIFY `hdID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  MODIFY `LichSuGiaoDichID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `card`
--
ALTER TABLE `card`
  ADD CONSTRAINT `fk_card_user` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Các ràng buộc cho bảng `lichsugiaodich`
--
ALTER TABLE `lichsugiaodich`
  ADD CONSTRAINT `fk_LichSuGiaoDich_card1` FOREIGN KEY (`cardID`) REFERENCES `card` (`cardID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LichSuGiaoDich_user1` FOREIGN KEY (`userID`) REFERENCES `user` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
