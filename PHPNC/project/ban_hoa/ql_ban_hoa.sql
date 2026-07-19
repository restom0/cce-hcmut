-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th9 21, 2023 lúc 05:44 AM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_ban_hoa`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_donhang`
--
CREATE DATABASE ql_ban_hoa;
USE ql_ban_hoa;
CREATE TABLE `chitiet_donhang` (
  `id` int(11) NOT NULL,
  `id_donhang` int(11) NOT NULL,
  `id_hoa` int(11) NOT NULL,
  `so_luong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `chitiet_donhang`
--

INSERT INTO `chitiet_donhang` (`id`, `id_donhang`, `id_hoa`, `so_luong`) VALUES
(1, 1, 1, 2),
(2, 1, 6, 1),
(3, 1, 10, 1),
(4, 1, 17, 2),
(5, 2, 5, 1),
(6, 2, 6, 2),
(7, 2, 19, 1),
(8, 2, 8, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_hang`
--

CREATE TABLE `don_hang` (
  `id` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `diachi_giaohang` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `don_hang`
--

INSERT INTO `don_hang` (`id`, `id_khachhang`, `ngaydat`, `diachi_giaohang`) VALUES
(1, 1, '2023-09-01', 'A123 - Nguyễn Oanh - Phường 17 - Quận Gò vấp - TP HCM'),
(2, 4, '2023-09-02', '357 - Lê Hồng Phong - Quận 10 - TP HCM');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa`
--

CREATE TABLE `hoa` (
  `id` int(11) NOT NULL,
  `id_loai` int(11) NOT NULL,
  `ten_hoa` varchar(50) NOT NULL,
  `gia_ban` int(11) NOT NULL,
  `hinh_anh` varchar(20) NOT NULL,
  `tp_chinh` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoa`
--

INSERT INTO `hoa` (`id`, `id_loai`, `ten_hoa`, `gia_ban`, `hinh_anh`, `tp_chinh`) VALUES
(1, 1, 'Đón xuân', 50000, 'cuc_9.jpg', 'Hoa cúc các màu: trắng, vàng, cam\r\n'),
(2, 1, 'Hồn nhiên', 60000, 'cuc_2.jpg', 'Hoa cúc vàng, cam. lá măng\r\n'),
(3, 1, 'Tím thuỷ chung', 45000, 'cuc_3.jpg', 'Hoa cúc tím\r\n'),
(4, 1, 'Nét duyên tím hoa cà', 40000, 'cuc_4.jpg', 'Hoa cúc màu tím nhạt\r\n'),
(5, 1, 'Cùng khoe sắc', 70000, 'cuc_5.jpg', 'Hoa cúc các màu: trắng, vàng, cam\r\n'),
(6, 1, 'Trắng thơ ngây', 65000, 'cuc_6.jpg', 'Hoa cúc trắng\r\n'),
(7, 2, 'Dây tơ hồng', 250000, 'cuoi_1.jpg', 'Hoa hồng màu hồng đậm, hoa hồng xanh, các loại lá '),
(8, 2, 'Cầu thuỷ tinh', 220000, 'cuoi_2.jpg', 'Hoa hồng và hoa thuỷ tiên trắng\r\n'),
(9, 2, 'Duyên thầm', 260000, 'cuoi_3.jpg', 'Hoa cúc trắng, baby, lá măng\r\n'),
(10, 2, 'Đâm chồi nảy lộc', 180000, 'cuoi_4.jpg', 'Hoa hồng trắng và các loại lá măng\r\n'),
(11, 2, 'Hoà quyện', 270000, 'cuoi_5.jpg', 'Hoa hồng trắng, lá thuỷ tùng\r\n'),
(12, 2, 'Nồng nàn', 210000, 'cuoi_6.jpg', 'Hoa hồng đỏ, lá thuỷ tùng, lá măng\r\n'),
(13, 3, 'Together', 120000, 'hong_1.jpg', 'Hồng xác pháo, cúc tím\r\n'),
(14, 3, 'Long trip', 85000, 'hong_2.jpg', 'Hoa hồng đỏ, lá kim thuỷ tùng\r\n'),
(15, 3, 'Beautiful life', 100000, 'hong_3.jpg', 'Hoa hồng đỏ, lá măng, lá đệm\r\n'),
(16, 3, 'Morning Sun', 75000, 'hong_4.jpg', 'Hoa hồng vàng\r\n'),
(17, 3, 'Pretty Bloom', 65000, 'hong_5.jpg', 'Hoa hồng trắng và lá thông\r\n'),
(18, 3, 'Red Rose', 45000, 'hong_7.jpg', 'Hoa hồng đỏ và lá măng\r\n'),
(19, 4, 'Vấn vương', 150000, 'xuan_1.jpg', 'Hoa hồng đỏ, hồng đậm, cúc đỏ, các loại lá\r\n'),
(20, 4, 'Nắng nhẹ nhàng', 50000, 'xuan_2.jpg', 'Hoa cúc xanh, hoa lys vàng, lá đệm\r\n'),
(21, 4, 'Thanh tao', 120000, 'xuan_3.jpg', 'Hoa thủy tiên, cúa trắng, cúc dại tím, các loại lá'),
(22, 4, 'Tinh khiết', 110000, 'xuan_4.jpg', 'Hồng trắng và salem\r\n'),
(23, 4, 'Mùa xuân chín', 150000, 'xuan_5.jpg', 'Hồmg cam, cúc xanh, thuỷ tiên và các loại lá\r\n'),
(24, 4, 'Rực rỡ nắng vàng', 75000, 'xuan_6.jpg', 'Hồng vàng và cúc vàng\r\n'),
(25, 3, 'Love Candy', 95000, 'hong_13.jpg', 'Hoa hồng trắng tinh khôi xen với hoa hồng màu hồng'),
(26, 2, 'Happy Wedding', 210000, 'cuoi_9.jpg', 'Hoa hồng môn và các loại lá'),
(27, 1, 'Cúc nhiệt đới', 150000, 'cuc_15.jpg', 'Cúc vàng - hồng cam - lá măng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_tuoi`
--

CREATE TABLE `hoa_tuoi` (
  `id` int(11) NOT NULL,
  `Ten_Hoa` varchar(50) NOT NULL,
  `Gia_Ban` int(11) NOT NULL,
  `hinh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `hoa_tuoi`
--

INSERT INTO `hoa_tuoi` (`id`, `Ten_Hoa`, `Gia_Ban`, `hinh`) VALUES
(1, 'Hoa Tình Yêu A316', 950000, 'hoaa316.jpg'),
(2, 'Bó Hồng Đẹp A315', 550000, 'hoaa315.jpg'),
(3, 'Bó Hồng Xanh A310', 1500000, 'hoa310.jpg'),
(4, 'Bó Hoa Đẹp A309', 2250000, 'hoa309.jpg'),
(5, 'Bó Hồng Tím A312', 900000, 'hoa312.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id` int(11) NOT NULL,
  `ho_ten` varchar(50) NOT NULL,
  `dia_chi` varchar(50) NOT NULL,
  `dien_thoai` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id`, `ho_ten`, `dia_chi`, `dien_thoai`, `email`) VALUES
(1, 'Khuất Thuỳ Phương', '357 Lê Hồng Phong Q.5', '0989247123', 'ktphuong@hcmuns.edu.vn\r\n'),
(2, 'Chung Quốc Cường', '1bis Nguyễn Văn Trỗi Q.1', '0912345678', 'cqcuong@hcmuns.edu.vn\r\n'),
(3, 'Lưu Hải Tùng', '1 Mạc Đỉnh Chi Q.1', '0989766569', 'lhtung@yahoo.com\r\n'),
(4, 'Đỗ Lâm Thiên', '357 Lê Hồng Phong Q.10 ', '0903123456', 'dlthien@hcmuns.edu.vn\r\n'),
(5, 'Nguyễn Ngọc Thanh', '357 Lê Hồng Phong Q.10 ', '0903456789', 'lthanh@hcmuns.edu.vn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `id` int(11) NOT NULL,
  `ten_loai` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`id`, `ten_loai`) VALUES
(1, 'Hoa cúc\r\n'),
(2, 'Hoa cưới\r\n'),
(3, 'Hoa hồng\r\n'),
(4, 'Hoa xuân');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_donhang` (`id_donhang`,`id_hoa`),
  ADD KEY `id_hoa` (`id_hoa`);

--
-- Chỉ mục cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_khachhang` (`id_khachhang`);

--
-- Chỉ mục cho bảng `hoa`
--
ALTER TABLE `hoa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_loai` (`id_loai`);

--
-- Chỉ mục cho bảng `hoa_tuoi`
--
ALTER TABLE `hoa_tuoi`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `hoa`
--
ALTER TABLE `hoa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `hoa_tuoi`
--
ALTER TABLE `hoa_tuoi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_donhang`
--
ALTER TABLE `chitiet_donhang`
  ADD CONSTRAINT `chitiet_donhang_ibfk_1` FOREIGN KEY (`id_hoa`) REFERENCES `hoa` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `chitiet_donhang_ibfk_2` FOREIGN KEY (`id_donhang`) REFERENCES `don_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `khach_hang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `hoa`
--
ALTER TABLE `hoa`
  ADD CONSTRAINT `hoa_ibfk_1` FOREIGN KEY (`id_loai`) REFERENCES `loai` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
