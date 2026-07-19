-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 04, 2023 lúc 02:44 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_sinhvien`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(10) UNSIGNED NOT NULL,
  `masv` int(11) NOT NULL,
  `mamh` int(11) NOT NULL,
  `lanthi` int(11) NOT NULL,
  `diemthi` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `ketqua`
--

INSERT INTO `ketqua` (`id`, `masv`, `mamh`, `lanthi`, `diemthi`) VALUES
(2, 1, 1, 1, 2.00),
(3, 2, 1, 1, 7.50),
(4, 3, 1, 1, 5.00),
(5, 4, 1, 1, 7.00),
(6, 5, 1, 1, 4.00),
(7, 1, 2, 1, 6.00),
(8, 2, 2, 1, 7.00),
(9, 3, 2, 1, 5.50),
(10, 4, 2, 1, 6.50),
(11, 5, 2, 1, 7.50),
(12, 1, 3, 1, 9.00),
(13, 2, 3, 1, 10.00),
(14, 3, 3, 1, 3.00),
(15, 4, 3, 1, 3.00),
(16, 5, 3, 1, 6.00),
(17, 1, 4, 1, 8.00),
(18, 2, 4, 1, 3.50),
(19, 3, 4, 1, 5.00),
(20, 4, 4, 1, 8.00),
(21, 5, 4, 1, 6.00),
(22, 6, 5, 1, 7.50),
(23, 7, 5, 1, 9.00),
(24, 8, 5, 1, 4.50),
(25, 9, 5, 1, 4.00),
(26, 10, 5, 1, 8.00),
(27, 6, 6, 1, 6.50),
(28, 7, 6, 1, 4.00),
(29, 8, 6, 1, 3.00),
(30, 9, 6, 1, 4.50),
(31, 10, 6, 1, 7.50),
(32, 6, 7, 1, 5.00),
(33, 7, 7, 1, 4.00),
(34, 8, 7, 1, 5.00),
(35, 9, 7, 1, 6.50),
(36, 10, 7, 1, 7.00),
(37, 6, 8, 1, 8.50),
(38, 7, 8, 1, 5.00),
(39, 8, 8, 1, 5.50),
(40, 9, 8, 1, 6.50),
(41, 10, 8, 1, 7.00),
(42, 6, 9, 1, 8.50),
(43, 7, 9, 1, 5.50),
(44, 8, 9, 1, 5.00),
(45, 9, 9, 1, 6.50),
(46, 10, 9, 1, 10.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoa`
--

CREATE TABLE `khoa` (
  `makhoa` int(10) UNSIGNED NOT NULL,
  `tenkhoa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khoa`
--

INSERT INTO `khoa` (`makhoa`, `tenkhoa`) VALUES
(1, 'Công nghệ thông tin'),
(2, 'Đại cương'),
(3, 'Quan hệ hợp tác quốc tế'),
(4, 'Cơ khí');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lophoc`
--

CREATE TABLE `lophoc` (
  `malop` int(10) UNSIGNED NOT NULL,
  `tenlop` varchar(30) NOT NULL,
  `makhoa` int(11) NOT NULL,
  `gvcn` varchar(40) NOT NULL,
  `siso` int(11) NOT NULL,
  `hocphi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lophoc`
--

INSERT INTO `lophoc` (`malop`, `tenlop`, `makhoa`, `gvcn`, `siso`, `hocphi`) VALUES
(1, 'Cao Đẳng Tin Học A', 1, 'Nguyễn Hoài Nam', 100, 800000),
(2, 'Cao Đẳng Tin Học B', 1, 'Trần Thị Bích Nga', 80, 800000),
(3, 'Cao Đẳng Cơ khí A', 4, 'Hồ Văn Chung', 120, 900000),
(4, 'Cao Đẳng Cơ khí B', 4, 'Nguyễn Hoài Nam', 100, 950000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_12_17_185210_taobang_monhoc', 1),
(6, '2021_12_17_192605_taobang_khoa', 2),
(7, '2021_12_17_192712_taobang_sinhvien', 2),
(8, '2021_12_17_192742_taobang_lophoc', 2),
(9, '2021_12_17_192816_taobang_ketqua', 2),
(10, '2021_12_17_210748_taobang_sinhvien', 3),
(11, '2021_12_17_211540_taobang_sinhvien', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `mamh` int(10) UNSIGNED NOT NULL,
  `tenmh` varchar(50) NOT NULL,
  `sotinchi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`mamh`, `tenmh`, `sotinchi`) VALUES
(1, 'Trí tuệ nhân tạo', 4),
(2, 'Truyền tin', 4),
(3, 'Đồ họa', 8),
(4, 'Văn Phạm', 7),
(5, 'Đàm thoại', 5),
(6, 'Đồ họa', 8),
(7, 'Vật lý', 4),
(8, 'Vật lý đại cương', 4),
(9, 'Triết học', 6),
(10, 'Toán đại cương', 4),
(11, 'Mã Nguồn mở - Wordpress', 4);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `masv` int(10) UNSIGNED NOT NULL,
  `hosv` varchar(30) NOT NULL,
  `tensv` varchar(10) NOT NULL,
  `phai` varchar(3) NOT NULL,
  `ngaysinh` date NOT NULL,
  `noisinh` varchar(50) NOT NULL,
  `diachi` varchar(50) NOT NULL,
  `malop` int(11) NOT NULL,
  `hocbong` int(11) NOT NULL,
  `hinh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`masv`, `hosv`, `tensv`, `phai`, `ngaysinh`, `noisinh`, `diachi`, `malop`, `hocbong`, `hinh`) VALUES
(1, 'Nguyễn Thị', 'Hải', 'Nữ', '1979-03-23', 'Sài Gòn', '12 Võ Văn Tần Q3', 1, 100000, 'sinhvien.jpg'),
(2, 'Trần Văn', 'Chính', 'Nam', '1980-12-24', 'Sài Gòn', '3 Nguyễn Bỉnh Khiêm Q1', 2, 120000, 'sinhvien.jpg'),
(3, 'Lê Thị Bạch', 'Yến', 'Nữ', '1977-02-21', 'Hà Nội', '75 Pastuer', 1, 140000, 'sinhvien.jpg'),
(4, 'Trần Thanh', 'Mai', 'Nam', '1978-12-20', 'Bến Tre', '56 Hai Bà Trưng', 2, 100000, 'sinhvien.jpg'),
(5, 'Trần Thị Thu', 'Thủy', 'Nữ', '1981-02-13', 'Sài Gòn', '40/3 An Lạc Vũng Tàu', 2, 120000, 'sinhvien.jpg'),
(6, 'Trần Thị', 'Thanh', 'Nữ', '1979-12-31', 'Sài Gòn', '10 Nguyễn Du Q1', 3, 890000, 'sinhvien.jpg'),
(7, 'Trần Anh', 'Tuấn', 'Nam', '1978-08-12', 'Long An', '12 Điện Biên Phủ', 3, 80000, 'sinhvien.jpg'),
(8, 'Trần Thanh', 'Triều', 'Nam', '1980-01-02', 'Hà Nội', '3 Nguyễn Thiện Thuật', 4, 80000, 'sinhvien.jpg'),
(17, 'Nguyễn Văn', 'Chính', 'Nam', '1977-01-02', 'Sài Gòn', '5 Nguyễn Văn Cừ Q5', 4, 120000, 'sinhvien.jpg'),
(18, 'Lê Thị', 'Kim', 'Nữ', '1981-12-20', 'Sài Gòn', '12 Nguyễn Thiệp Q4', 4, 120000, 'sinhvien.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoa`
--
ALTER TABLE `khoa`
  ADD PRIMARY KEY (`makhoa`);

--
-- Chỉ mục cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  ADD PRIMARY KEY (`malop`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`mamh`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`masv`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `khoa`
--
ALTER TABLE `khoa`
  MODIFY `makhoa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `lophoc`
--
ALTER TABLE `lophoc`
  MODIFY `malop` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `mamh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `masv` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
