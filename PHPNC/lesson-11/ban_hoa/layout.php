<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bán Hoa</title>
    <link rel="stylesheet" href="./Css/w31.css">
</head>

<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <caption></caption>
        <tr bgcolor="#F4FBEB">
            <th width="21%" valign="top" align="left">
                <img src="img/LogotypeKvitka.gif" width="205" height="102" alt="Logo" />
            </th>
            <td width="28%" valign="top">
                <?php require_once "gioithieu.php"; ?>
            </td>
            <td width="27%" valign="top">
                <?php require_once "dangnhap.php"; ?>
            </td>
            <td width="24%" valign="top">
                <?php require_once "thanhtoan.php"; ?>
            </td>
        </tr>
        <tr>
            <td valign="middle" bgcolor="#D3F4CE"><span class="style3">&#9851; Danh mục thông tin &#9851;</span></td>
            <td colspan="3" valign="top" background="img/nen.jpg">
                <table width="100%" border="0" cellpadding="5" cellspacing="0">
                    <caption></caption>
                    <tr align="center" class="style10" bgcolor="#CCFFCC">
                        <th width="25%" height="23" bgcolor="#CCFFCC">
                            <a href="<?= ROOT_URL ?>">Trang chủ</a>
                        </th>
                        <th width="25%"><a href="./">Tìm Kiếm</a></th>
                        <th width="28%"><a href="./">Liên Hệ</a></th>
                        <th width="22%"><a href="./">Đăng ký mới</a></strong></th>
                    </tr>
                </table>
            </td>
        </tr>
        <tr bgcolor="#F4FBEB">
            <td valign="top" bgcolor="#F4FBEB">
                <table width="100%" border="0" cellpadding="0" cellspacing="0" background="img/nen.jpg">
                    <caption></caption>
                    <tr>
                        <th bgcolor="#C7EAB0">
                            <table width="100%" border="0" bgcolor="#F4FBEB">
                                <caption></caption>
                                <tr>
                                    <th align="left">
                                        <ul style="list-style-image:url(img/online0.gif);line-height:30px;">
                                            <li class="item" style="cursor:pointer">Loại hoa</li>
                                            <ul style="list-style-image:url(img/detail.png);">
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=loaihoa">Danh Sách</a></li>
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=loaihoa&act=addnew">Thêm Mới</a></li>
                                            </ul>
                                            <li class="item" style="cursor:pointer">Khách Hàng</li>
                                            <ul style="list-style-image:url(img/detail.png);">
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=khachhang">Danh Sách</a></li>
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=khachhang&act=addnew">Thêm Mới</a></li>
                                            </ul>
                                            <li class="item" style="cursor:pointer">Đơn hàng</a></li>
                                            <ul style="list-style-image:url(img/detail.png);">
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=donhang">Danh Sách</a></li>
                                            </ul>
                                        </ul>
                                    </th>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                </tr>
                            </table>
                        </th>
                    </tr>
                    <tr>
                        <td valign=" bottom" align="center" bgcolor="#F4FBEB">
                            <img src="img/BannerSideCreative.jpg" width="200" height="200" alt="Banner" />
                        </td>
                    </tr>
                </table>
            </td>
            <td colspan="3" valign="top" bgcolor="#FFFFFF">
                <h1 class="style03" align="center">
                    <?php echo (isset($page_title)) ? $page_title : ""; ?>
                </h1>
                <?php if (file_exists($page_files)) require_once "$page_files"; ?>
            </td>
        </tr>
        <tr>
            <td valign="top" bgcolor="#d3f4ce"><span class="style2">Copyright &copy;2023-2027 <br />
                    Công ty thiết kế Ý Tưởng </span></td>
            <td valign="top" bgcolor="#d3f4ce">&nbsp;</td>
            <td valign="top" bgcolor="#d3f4ce">&nbsp;</td>
            <td bgcolor="#d3f4ce"><span class="style10">
                    <img src="./img/IconMail.gif" width="16" height="16" alt="hình" />
                    <a href="./hoa@cafe.com.vn">sua@cafe.com.vn</a>
                    <br />
                    <img src="./img/online0.gif" width="18" height="18" alt="hình" />sua.com.vn</span></td>
        </tr>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".item").click(function(e) {
                $(this).next("ul").toggle(500);
            });
        });
    </script>
</body>

</html>