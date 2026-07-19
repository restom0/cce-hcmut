CREATE DATABASE ql_ban_sua;
USE ql_ban_sua;
CREATE TABLE `ct_hoadon` (
  `So_hoa_don` varchar(5) NOT NULL,
  `Ma_sua` varchar(6) NOT NULL,
  `So_luong` int(11) NOT NULL,
  `Don_gia` int(11) NOT NULL,
  PRIMARY KEY (`So_hoa_don`,`Ma_sua`)
);

INSERT INTO `ct_hoadon` VALUES ('D001', 'VNM012', 4, 10300);
INSERT INTO `ct_hoadon` VALUES ('D002', 'AB002', 2, 13000);
INSERT INTO `ct_hoadon` VALUES ('D003', 'DL021', 3, 5000);
INSERT INTO `ct_hoadon` VALUES ('D004', 'NTF003', 2, 7200);
INSERT INTO `ct_hoadon` VALUES ('D005', 'DM012', 0, 5000);
INSERT INTO `ct_hoadon` VALUES ('D006', 'DS123', 3, 9000);

CREATE TABLE `hang_sua` (
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Teng_hang_sua` varchar(100) NOT NULL,
  `Dia_chi` varchar(200) DEFAULT NULL,
  `Dien_thoai` varchar(20) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Ma_hang_sua`)
);

INSERT INTO `hang_sua` VALUES ('VNM', 'Vinamilk', '123 - Nguyễn Du - Quận 1 - Tp. HCM', '02113456789', 'Vinamilk@gmail.com');
INSERT INTO `hang_sua` VALUES ('NTF', 'Nutifood', 'Khu Công Nghệp Sóng Thần - Bình Dương', '03568982', 'Nutifood@gmail.com');
INSERT INTO `hang_sua` VALUES ('AB', 'Abbort', 'Công ty nhập khẩu Việt Nam', '02116548625', 'Abbort@gmail.com');
INSERT INTO `hang_sua` VALUES ('DS', 'Daisy', 'Khu Công Nghệp Sóng Thần - Bình Dương', '14451267', 'Daisy@gmail.com');
INSERT INTO `hang_sua` VALUES ('DL', 'Dutch Lady', 'Khu Công Nghệp Biên Hòa - Đồng Nai', '03514625', 'Dutchlady@gmail.com');
INSERT INTO `hang_sua` VALUES ('DM', 'Dumex', 'Khu công nghiệp Bắc Thăng Long - Hà Nội', '02116502648', 'Dumex@gmail.com');

CREATE TABLE `hoa_don` (
  `So_hoa_don` varchar(5) NOT NULL,
  `Ngay_hd` date NOT NULL,
  `Ma_khach_hang` varchar(5) NOT NULL,
  PRIMARY KEY (`So_hoa_don`)
) ;

INSERT INTO `hoa_don` VALUES ('D001', '0000-00-00', 'kh001');
INSERT INTO `hoa_don` VALUES ('D002', '2010-01-14', 'kh002');
INSERT INTO `hoa_don` VALUES ('D004', '2011-01-03', 'kh001');
INSERT INTO `hoa_don` VALUES ('D005', '2008-01-17', 'kh001');
INSERT INTO `hoa_don` VALUES ('D006', '2010-01-21', 'kh002');

CREATE TABLE `khach_hang` (
  `Ma_khach_hang` varchar(5) NOT NULL,
  `Ten_khach_hang` varchar(100) NOT NULL,
  `Phai` tinyint(1) NOT NULL,
  `Dia_chi` varchar(200) NOT NULL,
  `Dien_thoai` varchar(20) NOT NULL,
  `Email` varchar(100) NOT NULL,
  PRIMARY KEY (`Ma_khach_hang`)
);

INSERT INTO `khach_hang` VALUES ('kh001', 'Hà Hữu Đôn', 0, 'Hải Lựu - Lập Thạch - Vĩnh Phúc', '0974136509', 'haanhdon@gmail.com');
INSERT INTO `khach_hang` VALUES ('kh002', 'Phạm Kỳ khôi', 0, 'Sơn Lôi - Bình Xuyên - Vĩnh Phúc', '01689937167', 'khoilopci@gmil.com');
INSERT INTO `khach_hang` VALUES ('kh003', 'La Thị Thu Thủy', 1, 'Hải Lựu - Lập Thạch - Vĩnh Phúc', '0974128483', 'kieuthanh2312@gmail.com');
INSERT INTO `khach_hang` VALUES ('kh004', 'Nguyễn Xuân Bách', 0, 'Hải Lựu - Sông Lô - Vĩnh Phúc', '0976256106', 'nhatgai195@gmail.com');
INSERT INTO `khach_hang` VALUES ('kh007', 'ha anh don', 0, 'Vĩnh Phúc', '0974136509', 'haanhdon.cntt@gmail.com');

CREATE TABLE `loai_sua` (
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Ten_loai` varchar(50) NOT NULL,
  PRIMARY KEY (`Ma_loai_sua`)
);

INSERT INTO `loai_sua` VALUES ('sd', 'Sữa đặc');
INSERT INTO `loai_sua` VALUES ('st', 'Sữa tươi');
INSERT INTO `loai_sua` VALUES ('sc', 'Sữa chua');
INSERT INTO `loai_sua` VALUES ('sb', 'Sữa bột');


CREATE TABLE `sua` (
  `Ma_sua` varchar(6) NOT NULL,
  `Ten_sua` varchar(50) NOT NULL,
  `Ma_hang_sua` varchar(20) NOT NULL,
  `Ma_loai_sua` varchar(3) NOT NULL,
  `Trong_luong` int(11) NOT NULL,
  `Don_gia` int(11) NOT NULL,
  `Tp_dinh_duong` TEXT,
  `Loi_ich` text,
  `Hinh` varchar(200) NOT NULL,
  PRIMARY KEY (`Ma_sua`)
);

INSERT INTO `sua` VALUES ('VNM012', 'Sữa VNM 001', 'VNM', 'sd', 700, 10300, 'Sữa đặc có đường với các thành phần lipit,vitamin A ...', 'Ngon bổ và rẻ @@', '01');
INSERT INTO `sua` VALUES ('DL001', 'Sữa DL 003', 'DL', 'st', 650, 5000, 'toàn chất xơ,làm bằng sắn tươi,ăn vào thêm còi xương @@', NULL, '01');
INSERT INTO `sua` VALUES ('VNM011', 'Sữa VNM 002', 'VNM', 'st', 650, 10300, NULL, NULL, '01');
INSERT INTO `sua` VALUES ('VNM013', 'Sữa VNM 003', 'VNM', 'sd', 400, 10300, 'sữa ngon', NULL, '01');
INSERT INTO `sua` VALUES ('VNM001', 'Sữa VNM 004', 'VNM', 'sc', 400, 10300, NULL, NULL, '01');
INSERT INTO `sua` VALUES ('AB001', 'Sữa AB 001', 'AB', 'sb', 400, 13000, 'Sữa thượng hạng đó', NULL, '01');
INSERT INTO `sua` VALUES ('AB002', 'Sữa AB 002', 'AB', 'sc', 400, 13000, NULL, NULL, '01');
INSERT INTO `sua` VALUES ('NTF001', 'Sữa NTF 001', 'NTF', 'sb', 650, 7200, NULL, NULL, '01');
INSERT INTO `sua` VALUES ('NTF002', 'Sữa NTF 002', 'NTF', 'st', 700, 7200, NULL, NULL, '01');
INSERT INTO `sua` VALUES ('DS123', 'Sữa DS 123', 'DS', 'st', 650, 9000, NULL, NULL, '01');
INSERT INTO `sua` VALUES ('DS001', 'Sữa DS 001', 'DS', 'sc', 200, 9000, 'Sữa chua làm từ rong biển,an rai như rẻ váy ^^', NULL, '01');
