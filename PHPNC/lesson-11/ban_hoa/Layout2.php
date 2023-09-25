<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Cửa Hàng Bán Hoa Tươi</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="Css/w31.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        .w3-bar-block .w3-bar-item {
            padding: 20px
        }
    </style>
</head>

<body>
    <!-- Responsive navbar-->
    <?php require_once "./gioithieu.php" ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container px-5">
            <div class="w3-button w3-padding-16 w3-left" style="color: white;" onclick="w3_open()">☰</div>
            <a class="navbar-brand" href="./">haocon.com</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <form class="d-flex" role="search">
                    <input type="hidden" name="action" value="timkiem">
                    <input class="form-control me-2" type="search" placeholder="Nhập từ khóa" name="keyword">
                    <button class="btn btn-outline-success" type="submit">Tìm</button>
                </form>
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" aria-current="page" href="./">Trang Chủ</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!" data-bs-toggle="modal" data-bs-target="#exampleModal">Giới thiệu</a></li>
                    <li class="nav-item"><a class="nav-link" href="#!">Liên hệ</a></li>
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Sản Phẩm</a>
                        <ul class="dropdown-menu">
                            <?php if (file_exists($page_loai)) require_once "$page_loai"; ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
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
    <!-- Page Content-->
    <div class="container px-4 px-lg-5">
        <!-- Heading Row-->
        <div class="row gx-4 gx-lg-5 align-items-center my-5">
            <div class="col-lg-7"><img class="img-fluid rounded mb-4 mb-lg-0" src="img/banner_02.png" alt="..." /></div>
            <div class="col-lg-5">
                <h1 class="font-weight-light">Gửi Trao Cảm Xúc Và Yêu Thương</h1>
                <p>Điều lớn nhất khiến Shop Nhà Hoa được tạo nên, vì chúng tôi hiểu rằng tất cả mọi người đều đáng để nhận được yêu thương và hạnh phúc. Nhà Hoa đã ở đây và muốn là một phần để giúp Bạn có thể gửi trao yêu thương đến những người đặc biệt của mình bằng những bó hoa, giỏ hoa tươi.</p>
                <a class="btn btn-primary" href="./">Đặt hàng ngay !</a>
            </div>
        </div>
        <!-- Call to Action-->
        <div class="card text-white bg-secondary my-5 py-4 text-center">
            <div class="card-body">
                <p class="text-white m-0">CHÚNG TÔI MANG LẠI CẢM XÚC VÀO NHỮNG BÓ HOA TƯƠI CHO BẠN!</p>
            </div>
        </div>
        <!-- Content Row-->
        <div class="row gx-4 gx-lg-5">
            <?php if (file_exists($page_files)) require_once "$page_files"; ?>
        </div>
    </div>
    <!-- Footer-->
    <footer class="w3-row-padding w3-padding-32 py-5 bg-dark text-light mt-5">
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
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
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