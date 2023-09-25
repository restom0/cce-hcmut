    <!DOCTYPE html>
    <html lang="vi">

    <head>
        <title>Shop Hoa Tươi - BachLieu</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="Css/w31.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            body,
            h1,
            h2,
            h3,
            h4,
            h5,
            h6 {
                font-family: "Karma", sans-serif
            }

            .w3-bar-block .w3-bar-item {
                padding: 20px
            }
        </style>
    </head>

    <body>

        <!-- Sidebar (hidden by default) -->
        <nav class="w3-sidebar w3-bar-block w3-card w3-top w3-large w3-animate-left" style="display:none;z-index:2;width:40%;min-width:300px" id="mySidebar">
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button">Đóng Trình Đơn</a>
            <a href="./" onclick="w3_close()" class="w3-bar-item w3-button">Tất Cả Hoa</a>
            <ul>
                <li class="item" style="cursor:pointer">Loại hoa</li>
                <ul style="list-style-image:url(img/detail.png);">
                    <li><a onclick="w3_close()" class="w3-bar-item w3-button" href="<?= ROOT_URL ?>/?ctrl=loaihoa">Danh Sách</a></li>
                    <li><a onclick="w3_close()" class="w3-bar-item w3-button" href="<?= ROOT_URL ?>/?ctrl=loaihoa&act=addnew">Thêm Mới</a></li>
                </ul>
                <li class="item" style="cursor:pointer">Khách Hàng</li>
                <ul style="list-style-image:url(img/detail.png);">
                    <li><a onclick="w3_close()" class="w3-bar-item w3-button" href="<?= ROOT_URL ?>/?ctrl=khachhang">Danh Sách</a></li>
                    <li><a onclick="w3_close()" class="w3-bar-item w3-button" href="<?= ROOT_URL ?>/?ctrl=khachhang&act=addnew">Thêm Mới</a></li>
                </ul>
                <li class="item" style="cursor:pointer">Đơn hàng
                </li>
                <ul style="list-style-image:url(img/detail.png);">
                    <li><a onclick="w3_close()" class="w3-bar-item w3-button" href="<?= ROOT_URL ?>/?ctrl=donhang">Danh Sách</a></li>
                </ul>
            </ul>
            <?php if (file_exists($page_loai)) require_once "$page_loai"; ?>
            <!--
    <a href="#food" onclick="w3_close()" class="w3-bar-item w3-button">Food</a>
    <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">About</a>
  -->
        </nav>

        <!-- Top menu -->
        <div class="w3-top w3-container">
            <div class="w3-white w3-bar" style="max-width:1200px;margin:auto">
                <div class="w3-button w3-padding-16 w3-left" onclick="w3_open()">☰</div>
                <div class="w3-button w3-padding-16 w3-left"><a href="./">Trang Chủ</a></div>
                <div class="w3-right w3-padding-16">Giỏ hàng (0)</div>
                <div class="w3-center w3-padding-16 w3-col s4 w3-display-middle">
                    <form action="<?= ROOT_URL ?>" method="get">
                        <input type="hidden" name="action" value="timkiem">
                        <input type="text" name="keyword" placeholder="Nhập từ khóa" class="w3-bar-item w3-input">
                        <Button type="submit" name="tim" value=" Tìm " class="w3-bar-item w3-button w3-green">
                            <i class="fa fa-search"></i>
                        </Button>
                    </form>
                </div>
            </div>
        </div>

        <!-- !PAGE CONTENT! -->
        <div class="w3-main w3-content w3-padding" style="max-width:1200px;margin-top:100px">

            <!-- Photo Grid -->
            <div class='w3-row w3-grayscale'>
                <?php if (file_exists($page_files)) require_once "$page_files"; ?>
            </div>
            <!-- Footer -->
            <footer class="w3-row-padding w3-padding-32">
                <div class="w3-third">
                    <h3>Shop Hoa Tươi</h3>
                    <p>Shop hoa tươi BachLieu Được thành lập từ năm 2017 với mục tiêu mang đến cho khách hàng trải nghiệm tuyệt vời về một dịch vụ đặt hoa online chuyên nghiệp</p>
                    <p>Powered by <a href="./" target="_self">bachlieu.hoatuoi.com</a></p>
                </div>

                <div class="w3-third">
                    <h3>BÀI ĐĂNG TRÊN BLOG</h3>
                    <ul class="w3-ul w3-hoverable">
                        <li class="w3-padding-16">
                            <img src="img/blog_01.jpg" class="w3-left w3-margin-right" alt="blog 01" style="width:50px">
                            <span class="w3-large">Shop BachLieu</span><br>
                            <span>Chuyên giới thiệu các loại đẹp</span>
                        </li>
                        <li class="w3-padding-16">
                            <img src="img/blog_02.jpg" class="w3-left w3-margin-right" alt="blog 02" style="width:50px">
                            <span class="w3-large">Shop BachLieu</span><br>
                            <span>Luôn có các loại hoa nhập khẩu</span>
                        </li>
                    </ul>
                </div>

                <div class="w3-third w3-serif">
                    <h3>THẺ PHỔ BIẾN</h3>
                    <p>
                        <span class="w3-tag w3-black w3-margin-bottom">Travel</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">New York</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dinner</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Salmon</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">France</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Drinks</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Ideas</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Flavors</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Cuisine</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Chicken</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Dressing</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fried</span>
                        <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Fish</span> <span class="w3-tag w3-dark-grey w3-small w3-margin-bottom">Duck</span>
                    </p>
                </div>
            </footer>

            <!-- End page content -->
        </div>

        <script>
            // Script to open and close sidebar
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
            }
        </script>
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