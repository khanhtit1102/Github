-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 07, 2018 lúc 04:04 SA
-- Phiên bản máy phục vụ: 5.7.17-log
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `edumall`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cmt`
--

CREATE TABLE `cmt` (
  `id_cmt` int(11) NOT NULL,
  `id_cs` int(11) NOT NULL,
  `ten_cmt` varchar(255) NOT NULL,
  `email_cmt` varchar(255) NOT NULL,
  `nd_cmt` text NOT NULL,
  `ngay_cmt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cmt`
--

INSERT INTO `cmt` (`id_cmt`, `id_cs`, `ten_cmt`, `email_cmt`, `nd_cmt`, `ngay_cmt`) VALUES
(1, 6, 'Fullname Admin', 'admin@admin.com', 'asjdhaksd', '2018-03-07'),
(2, 6, 'Fullname Admin', 'admin@admin.com', 'không hay', '2018-03-07'),
(3, 6, 'Fullname Admin', 'admin@admin.com', 'Hay quá', '2018-03-07'),
(4, 6, 'Fullname Admin', 'admin@admin.com', 'không hay', '2018-03-07'),
(5, 6, 'Fullname Admin', 'admin@admin.com', 'Hay quá', '2018-03-07'),
(6, 6, 'Fullname Admin', 'admin@admin.com', 'không hay', '2018-03-07'),
(7, 6, 'Fullname Admin', 'admin@admin.com', 'Hay quá', '2018-03-07'),
(8, 6, 'Fullname Admin', 'admin@admin.com', 'không hayasdasda', '2018-03-07'),
(10, 6, 'Nông Văn Khánh', 'nvk@mail.com', 'heyzo What\'s up?', '2018-03-06'),
(11, 6, 'Nông Văn Khánh', 'nvk@mail.com', 'heyzo What\'s up?', '2018-03-07'),
(12, 6, 'Nông Văn Khánh', 'nvk@mail.com', 'Alibaba', '2018-03-07'),
(13, 6, 'Nông Văn Khánh', 'nvk@mail.com', 'Alibaba', '2018-03-07'),
(14, 1, 'Nông Văn Khánh', 'nvk@mail.com', 'Hello Everyone?', '2018-03-07');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD PRIMARY KEY (`id_cmt`),
  ADD KEY `id_cs` (`id_cs`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cmt`
--
ALTER TABLE `cmt`
  MODIFY `id_cmt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cmt`
--
ALTER TABLE `cmt`
  ADD CONSTRAINT `cmt_ibfk_1` FOREIGN KEY (`id_cs`) REFERENCES `course` (`id_cs`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
