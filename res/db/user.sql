-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th3 07, 2018 lúc 04:05 SA
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
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email_user` varchar(255) NOT NULL,
  `pass_user` varchar(255) NOT NULL,
  `name_user` varchar(255) NOT NULL,
  `job_user` varchar(255) NOT NULL,
  `about_user` varchar(255) NOT NULL,
  `permission_user` int(11) NOT NULL DEFAULT '0' COMMENT '0 là chưa kích hoạt mail  -  1 là tv đã active  -  2 là GV  -  3 là ADMIN',
  `coin_user` int(11) NOT NULL,
  `avatar_user` varchar(255) NOT NULL DEFAULT 'default.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `email_user`, `pass_user`, `name_user`, `job_user`, `about_user`, `permission_user`, `coin_user`, `avatar_user`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', 'Fullname Admin', 'Admin Edumall.vn', 'Gioi thieu ban than Admin', 3, 10000000, 'default.jpg'),
(2, 'nvk@mail.com', '629e8d70e993322601ea565b7cfb4d0c', 'Nông Văn Khánh', 'Đéo ăn bám nữa', 'Công chức', 2, 201000, 'default.jpg'),
(3, 'ndh@mail.com', '629e8d70e993322601ea565b7cfb4d0c', 'Nguyen Dinh Hau', 'An bam', 'About Nay', 1, 0, 'default.jpg'),
(6, 'taikhoan01@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tài khoản 01', 'a', 'a', 1, 0, 'default.jpg'),
(7, 'taikhoan02@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tài khoản 02', '', '', 0, 0, 'default.jpg'),
(8, 'taikhoan03@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tài khoản 03', '', '', 0, 0, 'default.jpg'),
(14, 'nguyentt@mail.com', '123456', 'Nguyễn Thị Thu', '', '', 0, 0, 'default.jpg'),
(17, 'taikhoan05@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tài khoản 05', '', '', 0, 0, 'default.jpg'),
(18, 'taikhoan06@mail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Tài khoản 06', '', '', 0, 0, 'default.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email_user` (`email_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
