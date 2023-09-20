<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bán Sữa</title>
    <link rel="stylesheet" href="Css/style.css">
</head>

<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <tr bgcolor="#F4FBEB">
            <td width="21%" valign="top">
                <img src="hinh_anh/LogotypeKvitka.gif" width="205" height="102" />
            </td>
            <td width="28%" valign="top">
                <table width="100%" border="0" cellpadding="0" cellspacing="2">
                    <tr>
                        <td><span class="style5">(028) 987246357 </span></td>
                    </tr>
                    <tr>
                        <td><span class="style10">(Giờ mở cửa: 8:00 - 22:00 mỗi ngày) </span></td>
                    </tr>
                    <tr>
                        <td><span class="style10">
                                <img src="hinh_anh/IconMail.gif" width="16" height="16" />
                                <a href="./">sua@cafe.com.vn</a></span>
                        </td>
                    </tr>
                    <tr>
                        <td><span class="style10">
                                <img src="hinh_anh/online0.gif" width="18" height="18" />
                                sua.com.vn</span>
                        </td>
                    </tr>
                </table>
            </td>
            <td width="27%" valign="top">
                <table width="100%" border="0" cellpadding="2" cellspacing="2">
                    <form id="form1" name="form1" method="post" action="trang_1.php">
                        <tr>
                            <td colspan="2">
                                <div align="center" class="style5"> Đăng nhập</div>
                            </td>
                        </tr>
                        <tr>
                            <td width="46%">
                                <div class="style10">Tên đăng nhập: </div>
                            </td>
                            <td width="54%"><span class="style10">
                                    <input name="ten_dn" type="text" id="ten_dn" size="15">
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="style10">Mật khẩu: </div>
                            </td>
                            <td><span class="style10">
                                    <input name="mat_khau" type="password" id="mat_khau" size="15" />
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div align="center">
                                    <label>
                                        <input type="submit" name="Submit" value="Đăng nhập" />
                                    </label>
                                </div>
                            </td>
                        </tr>
                    </form>
                </table>
            </td>
            <td width="24%" valign="top">
                <table width="100%" border="0" cellpadding="2">
                    <tr>
                        <td valign="top">
                            <div align="center" class="style5"> Có thể thanh toán bằng</div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div align="center" class="style10">
                                <img src="hinh_anh/IconCardMasterCard.gif" width="37" height="23" />
                                <img src="hinh_anh/IconCardVisaE.gif" width="37" height="23" />
                                <img src="hinh_anh/IconCardVisa.gif" width="37" height="23" />
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td valign="top">Chào mừng bạn <b>Giang Hào Côn</b></td>
                    </tr>
                    <tr>
                        <td valign="top">
                            <div align="left" class="style10">Đăng Xuất &#10173;</div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td valign="top" bgcolor="#D3F4CE"><span class="style3">&#9851; Danh mục
                    thông tin &#9851;</span></td>
            <td colspan="3" valign="top" background="hinh_anh/nen.jpg">
                <table width="100%" border="0" cellpadding="0" cellspacing="0">
                    <tr align="center" class="style10" bgcolor="#CCFFCC">
                        <td width="25%" height="23" bgcolor="#CCFFCC"><strong>
                                <a href="./"><strong>Trang chủ</strong></a></td>
                        <td width="25%"><strong><a href="./"><strong>Tìm kiếm Hãng Sữa</strong></a></td>
                        <td width="28%"><strong>
                                <a href="<?= ROOT_URL ?>/?ctrl=hangsua&act=addnew"><strong>Thêm Hãng Sữa
                                        Mới</strong></a></td>
                        <td width="22%"><strong><a href="#">Đăng ký mới</a></strong></td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr bgcolor="#F4FBEB">
            <td valign="top" bgcolor="#F4FBEB">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" background="hinh_anh/nen.jpg">
                    <tr>
                        <td bgcolor="#C7EAB0">
                            <table width="100%" border="0" bgcolor="#F4FBEB">
                                <tr>
                                    <td>
                                        <ul style="list-style-image:url(hinh_anh/online0.gif);line-height:30px;">
                                            <li class="item" style="cursor:pointer">Hãng Sữa</li>
                                            <ul style="list-style-image:url(hinh_anh/hangsua.jpg);">
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=hangsua">Danh Sách</a></li>
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=hangsua&act=addnew">Thêm Mới</a></li>
                                            </ul>
                                            <li class="item" style="cursor:pointer">Loại Sữa</li>
                                            <ul>
                                                <li>Danh Sách</li>
                                                <li>Thêm Mới</li>
                                            </ul>
                                            <li class="item" style="cursor:pointer">Sữa</li>
                                            <ul>
                                                <li>Danh Sách</li>
                                                <li>Thêm Mới</li>
                                            </ul>
                                            <li class="item" style="cursor:pointer">Khách Hàng</li>
                                            <ul>
                                                <li>Danh Sách</li>
                                                <li>Thêm Mới</li>
                                            </ul>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td valign="bottom" align="center" bgcolor="#F4FBEB">
                            <img src="hinh_anh/banner_sua.jpg" width="200" height="200" />
                        </td>
                    </tr>
                </table>
            </td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF">
                <h1 class="style03" align="center">
                    <?php echo (isset($page_title)) ? $page_title : "TRANG QUẢN TRỊ"; ?>
                </h1>
                <?php if (file_exists($page_files)) require_once "$page_files"; ?>
            </td>
        </tr>
        <tr>
            <td valign="top" bgcolor="#d3f4ce"><span class="style2">Copyright
                    &copy;2023-2027 <br /> Công ty thiết kế Ý Tưởng </span></td>
            <td valign="top" bgcolor="#d3f4ce">&nbsp;</td>
            <td valign="top" bgcolor="#d3f4ce">&nbsp;</td>
            <td bgcolor="#d3f4ce"><span class="style10"><img src="hinh_anh/IconMail.gif" width="16" height="16" />
                    <a href="./sua@cafe.com.vn">sua@cafe.com.vn</a><br />
                    <img src="hinh_anh/online0.gif" width="18" height="18" />sua.com.vn</span></td>
        </tr>
    </table>
</body>

</html