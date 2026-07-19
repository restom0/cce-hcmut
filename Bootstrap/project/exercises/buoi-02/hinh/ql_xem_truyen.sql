-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2023 lúc 03:09 PM
-- Phiên bản máy phục vụ: 10.1.34-MariaDB
-- Phiên bản PHP: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ql_xem_truyen`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai_truyen`
--

CREATE TABLE `loai_truyen` (
  `id` int(11) NOT NULL,
  `tieude` varchar(100) NOT NULL,
  `ngaydang` date NOT NULL,
  `luotxem` int(11) NOT NULL,
  `mota` text NOT NULL,
  `xemnhieu` int(11) NOT NULL,
  `hinh` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `loai_truyen`
--

INSERT INTO `loai_truyen` (`id`, `tieude`, `ngaydang`, `luotxem`, `mota`, `xemnhieu`, `hinh`) VALUES
(1, 'Tổng hợp những mẩu truyện cười Tây Du Ký chế hay nhất', '2023-10-05', 6553, 'Tây Du Ký là bộ phim được chuyển thể từ tiểu thuyết cùng tên của nhà văn Ngô Thừa Ân (Trung Quốc). Bộ phim gắn liền với tuổi thơ của rất nhiều thế hệ...', 0, 'loai01.jpg'),
(2, 'Tổng hợp những mẩu truyện cười Tây Du Ký chế hay nhất', '2023-10-05', 6553, 'Tây Du Ký là bộ phim được chuyển thể từ tiểu thuyết cùng tên của nhà văn Ngô Thừa Ân (Trung Quốc). Bộ phim gắn liền với tuổi thơ của rất nhiều thế hệ...', 0, 'loai01.jpg'),
(3, 'Tổng hợp những mẩu truyện cười Tam Quốc Diễn Nghĩa hay nhất', '2023-10-05', 4108, 'Tam Quốc Diễn Nghĩa là một trong “Tứ đại danh tác” hay “Tứ đại kỳ thư” của nền văn học Trung Quốc. Là bộ tiểu thuyết sử thi thế nên giọng văn chủ...', 0, 'loai02.jpg'),
(4, 'Tổng hợp những mẩu truyện cười Vova hay nhất', '2023-10-05', 6183, 'Truyện cười Vova đến từ xứ sở nước Nga, cậu bé có tên Vova (Vovochka) có tính cách nghịch ngợm, lém lĩnh trong nhiều tình huống khiến người đọc phải bật...', 0, 'loai03.jpg'),
(5, 'Những mẩu truyện cười tiếu lâm hay nhất', '2023-10-05', 8763, 'Bạn đang cảm thấy chán nản? Bạn đã và đang trải qua những ngày tháng chìm trong deadline. Nếu áp lực quá hãy để bản thân thoải mái bằng cách đọc những mẩu...', 0, 'loai04.jpg'),
(6, 'Những mẩu truyện cười hay nhất về người lính', '2023-10-05', 5655, 'Với nhiều trường môi trường quân đội vô cùng nghiêm khắc thế nên nó rất nhàm chán, thế nhưng thực tế thì xung quanh cuộc sống của bộ đội cũng có rất nhiều...', 0, 'loai05.jpg'),
(7, 'Tổng hợp truyện cười Trạng Quỳnh hay nhất', '2023-10-05', 17410, 'Truyện cười dân gian Trạng Quỳnh là bộ truyện gắn bó với thế hệ thiếu nhi Việt Nam. Trạng Quỳnh là một cậu bé thông minh, lanh lợi, tính hay nghịch ngợm, thế...', 0, 'loai06.jpg'),
(8, 'Tổng hợp những câu nói hay nhất về tình yêu', '2023-10-05', 10000, 'Tổng hợp những câu nói hay nhất về tình yêu', 1, 'loai07.jpg'),
(9, 'Những câu nói hay về nghị lực, ý chí vươn lên trong cuộc sống', '2023-10-05', 10000, 'Những câu nói hay về nghị lực, ý chí vươn lên trong cuộc sống', 1, 'loai08.jpg'),
(10, 'Quả bầu tiên - Truyện cổ tích Việt Nam về tấm lòng nhân hậu', '2023-10-05', 10000, 'Quả bầu tiên - Truyện cổ tích Việt Nam về tấm lòng nhân hậu', 1, 'loai09.jpg'),
(11, 'Truyện cổ tích về các nàng công chúa xinh đẹp', '2023-10-05', 10000, 'Truyện cổ tích về các nàng công chúa xinh đẹp', 1, 'loai10.jpg'),
(12, 'Tổng Hợp Những Nhận Định Văn Học Hay Nhất ', '2023-10-05', 10000, 'Tổng Hợp Những Nhận Định Văn Học Hay Nhất ', 1, 'loai11.jpg'),
(13, 'Truyện cổ tích thế tục Việt Nam hay và ý nghĩa nhất', '2023-10-05', 10000, 'Truyện cổ tích thế tục Việt Nam hay và ý nghĩa nhất', 1, 'loai12.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `truyen`
--

CREATE TABLE `truyen` (
  `id` int(11) NOT NULL,
  `maloai` int(11) NOT NULL,
  `tieude` varchar(50) NOT NULL,
  `noidung` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `truyen`
--

INSERT INTO `truyen` (`id`, `maloai`, `tieude`, `noidung`) VALUES
(1, 1, 'Tây du ký thời Internet', 'Sau khi trải qua chín chín tám mốt kiếp nạn.\r\nThầy trò Đường Tăng cũng đến được đất Phật để thỉnh Kinh. Mấy anh em hồ hởi vào gặp Như Lai. Như Lai:\r\n- Các chú có mang theo USB không đấy?\r\n- Đường Tăng: sặc…\r\n- Như Lai: Thế ổ cứng di động thì sao?\r\n- Đường Tăng:…\r\n- Như Lai: Thôi điện thoại cũng được\r\n- Đường Tăng: Bọn em toàn dùng Nokia 1100\r\n- Như Lai:…Thôi các chú về đi anh gửi qua Skype cho.\r\nQuay mặt đi Đường Tăng lẩm bẩm: Biết thế này bố đến tận đây làm gì…\r\nTiếng Như Lai vọng theo: Non và xanh lắm. Chú tưởng add nick anh dễ lắm sao???'),
(2, 1, 'Thỉnh kinh thời hiện đại', 'Sau khi trải qua 81 kiếp nạn, thày trò đường tăng cũng đến được đất phật để thỉnh kinh. Anh em hồ hởi gặp như Lai.\r\n- Như Lai: các chú có mang theo USB ko đấy ?\r\n- Đường Tăng: sặc..\r\nNhư Lai: thế anh truyền kinh cho các chú bằng gì bây giờ?\r\n- Ngộ Không nhanh trí: anh bắn bluetooth vào di động cho em.\r\nNgộ Không lắc mạnh tay con di động anycall haptic hiện ngay bluetooth enable.\r\nNhư Lai ăn chơi không kém rút con netbook từ túi quần hiệu sony vaio P kích thước 16x9 ra, chỉ trong vài giây, việc truyền kinh đã xong và Như Lai bay đi.\r\n- Đường Tăng lẩm bẩm, biết thế ở nhà search Google download cho nhanh'),
(3, 2, 'Vợ ngoại tình', 'Lại nói về Lưu Bị, Khổng Minh, Bàng Thống.\r\nMột hôm Lưu Bị, Khổng Minh, Bàng Thống buồn rầu ngồi nói chuyện với nhau.\r\nLưu Bị: chán quá con vợ tao nó ngoại tình với thằng Vân\r\nKhổng Minh, Bàng Thống: sao công chúa (ý lộn chúa công) lại biết??\r\nLưu Bị: Vì 1 hôm tao về nhà tao thấy dưới gầm giường vợ tao có cái Giáo rất đẹp.\r\nKhổng Minh: hic, thế thì Vợ thần thì lòng thòng cùng thằng Râu èn hàm ngái mày ùm Trương Phi rồi (nói lái thành Râu hùm hàm én mày ngài)\r\nLưu Bị, Bàng Thống: ủa sao ngươi biết???\r\nKhổng Minh: vì tôi thấy dưới giường vợ tôi có thanh bát xà mâu.\r\nBàng Thống vội nói: Vậy thì chắc chắn Vợ tao đang ngoại tình với con ngựa xích thố rồi.\r\nKhổng Minh, Lưu Bị: Oh My God, sao ngươi biết???\r\nBàng Thống: Bởi vì lúc nãy tao về nhà tao thấy thằng Quan Vũ dưới gầm giường.'),
(4, 2, 'Ngã lộn cổ', 'Lại nói về Lã Bố đánh thắng Tào Tháo ở Bộc Dương, liền tổ chức đại tiệc. Sau vài tuần rượu, Bố đã ngà ngà say, liền rút đèn pin ra, chiếu lên giời, nói:\r\n- Hôm nay thằng nào mà theo ánh sáng đèn pin trèo lên được nóc nhà thì ông cho ăn tối với Điêu Thuyền!\r\nTang Bá: Để tao! Chuyện nhỏ!\r\nCao Thuận: Tao! Tao làm được!\r\nTrương Liêu: Để tao! Tụi mày thì biết cái gì!\r\nTrần Cung: Dừng lại đi mấy thằng ngu! Không biết tụi bay ăn cái gì mà ngu thế! Thằng Bố nó mà tắt cái đèn pin giữa chừng thì tụi bay ngã lộn cổ cả nút.'),
(5, 4, 'Quân đội không có phụ nữ', 'Trong giờ học môn Tự nhiên – Xã hội, cô giáo hỏi cả lớp:\r\n- Các em có biết tại sao trong quân đội lại không có phụ nữ?\r\nCả lớp im phăng phắc, chỉ có mỗi Vova giơ tay. Cô giáo chờ một lúc đành phải mời Vova phát biểu.\r\nVova: Thưa cô, vì khi nghe khẩu lệnh “Nằm xuống” thì phụ nữ toàn nằm ngửa ra!'),
(6, 4, 'Vova ghen', 'Giữa trưa nắng, một Vova đèo một cô bé trên một chiếc xe đạp mini bé tí.\r\nVẻ mặt cậu bé có vẻ rất bực.\r\nĐang đi Vova quay lại nói với cô bé:\r\n- Này, tại sao chiều hôm qua em lại đi chơi đồ hàng với thằng lớp 2B hả?'),
(7, 6, 'Sao không để đối phương làm?', 'Buổi diễn tập của một đơn vị tân binh. Trung uý hô:\r\n- Chuẩn bị phản công! Toàn trung đội cầm lấy xẻng để đào công sự.\r\n- Một người lính nói: Thưa trung uý! Sao không để chúng ta tấn công, còn đối phương đào công sự có hơn không ạ?'),
(8, 6, 'Khúc gỗ', 'Đang trong giờ lao động của đơn vị, hạ sĩ gặp hai lính đi nối đuôi nhau, liền bảo họ dừng lại và hỏi:\r\n- Này, các anh đi đâu thế hả?\r\n- Chúng tôi khênh cây gỗ về kho?\r\n- Cây gỗ nào?\r\n- Trời ơi, quỷ thật, chúng tôi quên khuấy mất cây gỗ.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loai_truyen`
--
ALTER TABLE `loai_truyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maloai` (`maloai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `loai_truyen`
--
ALTER TABLE `loai_truyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `truyen`
--
ALTER TABLE `truyen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `truyen`
--
ALTER TABLE `truyen`
  ADD CONSTRAINT `truyen_ibfk_1` FOREIGN KEY (`maloai`) REFERENCES `loai_truyen` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
