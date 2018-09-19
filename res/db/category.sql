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
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `stt_cate` int(11) NOT NULL,
  `id_cate` varchar(255) NOT NULL,
  `name_cate` varchar(255) NOT NULL,
  `icon_cate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`stt_cate`, `id_cate`, `name_cate`, `icon_cate`) VALUES
(1, 'cntt', 'Công nghệ thông tin', 'fa fa-code'),
(5, 'kdkn', 'Kinh doanh & Khởi nghiệp', 'fa fa-line-chart'),
(7, 'mkt', 'Marketing', 'fa fa-bullhorn'),
(3, 'ndc', 'Nuôi dạy con', 'fa fa-grav'),
(6, 'nn', 'Ngoại ngữ', 'fa fa-comments'),
(4, 'ptbt', 'Phát triển bản thân', 'fa fa-black-tie'),
(8, 'thvp', 'Tin học văn phòng', 'fa fa-desktop'),
(2, 'tk', 'Thiết kế', 'fa fa-google-wallet');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_cate`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
