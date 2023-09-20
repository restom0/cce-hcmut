<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Bán Sữa</title>
    <link rel="stylesheet" href="Css/style.css">
</head>

<body>
    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
        <caption></caption>
        <tr bgcolor="#F4FBEB">
            <th width="21%" valign="top" align="left">
                <img src="hinh_anh/LogotypeKvitka.png" width="205" height="102" alt="Logo"/>
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
            <td colspan="3" valign="top" background="hinh_anh/nen.jpg">
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
                <table width="100%" border="0" cellpadding="0" cellspacing="0" background="hinh_anh/nen.jpg">
                    <caption></caption>
                    <tr>
                        <th bgcolor="#C7EAB0">
                            <table width="100%" border="0" bgcolor="#F4FBEB">
                                <caption></caption>
                                <tr>
                                    <th align="left">
                                        <ul style="list-style-image:url(hinh_anh/online0.gif);line-height:30px;">
                                            <li class="item" style="cursor:pointer">Hãng Sữa</li>
                                            <ul style="list-style-image:url(hinh_anh/hangsua.jpg);">
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=hangsua">Danh Sách</a></li>
                                                <li><a href="<?= ROOT_URL ?>/?ctrl=hangsua&act=addnew">Thêm Mới</a></li>
                                            </ul>
                                            <li class="item" style="cursor:pointer">Loại Sữa</li>
                                            <ul style="list-style-image:url(hinh_anh/loaisua.jpg);">
                                                <li>Danh Sách</li>
                                                <li>Thêm Mới</li>
                                            </ul>
                                            <li>Sữa</li>
                                            <li>Khách Hàng</li>
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
                        <td valign="bottom" align="center" bgcolor="#F4FBEB">
                            <img src="hinh_anh/banner_sua.jpg" width="200" height="200" alt="Banner"/>
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
                    <img src="hinh_anh/IconMail.gif" width="16" height="16" alt="hình" />
                    <a href="./sua@cafe.com.vn">sua@cafe.com.vn</a>
                    <br />
                    <img src="hinh_anh/online0.gif" width="18" height="18" alt="hình" />sua.com.vn</span></td>
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