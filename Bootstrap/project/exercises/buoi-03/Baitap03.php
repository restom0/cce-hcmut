<?php
  $conn = @new mysqli("localhost", "root", null, "ql_ban_giay");
   $conn->set_charset("utf8");
  if ($conn->connect_error) {
      die("Kết nối thất bại " . $conn->connect_error);
  }
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
     <div class="container-fluid">
          <div class="alert alert-light mt-2">
            <div class="list-group list-group-horizontal  justify-content-center">
                <a href="./" class="list-group-item">Trang chủ</a>
                <a href="?sanpham=tatca" class="list-group-item">Tất Cả Sản Phẩm</a>
                <a href="?sanpham=nam" class="list-group-item">Sản Phẩm Nam</a>
                <a href="?sanpham=nu" class="list-group-item">Sản Phẩm Nữ</a>
            </div>
          </div>
          <!-- Slide Images-->
          <div id="carouselExampleIndicators" class="carousel slide">
               <div class="carousel-indicators">
                   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                   <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
               </div>
               <div class="carousel-inner">
                    <?php
                         $sql = "Select * from slide";
                         $rs = $conn->query($sql);
                         $i=0;
                         while($row = $rs->fetch_assoc())
                         {
                              $hinh = $row["hinh"];
                              if ($i==0)
                              {
                                   echo "<div class='carousel-item active'>";     
                              }
                              else
                              {
                                   echo "<div class='carousel-item'>";         
                              }
                              $i++;
                              echo "<img src='../hinh/$hinh' class='d-block w-100' height='400' alt='...'>";
                              echo "</div>";
                         }
                    ?>    
               </div>
                 <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                   <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Previous</span>
                 </button>
                 <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                   <span class="carousel-control-next-icon" aria-hidden="true"></span>
                   <span class="visually-hidden">Next</span>
                 </button>
          </div>
          <!-- End Slide -->
          <!-- Begin product -->
          <div class="container">
               <div class="row">
                    <?php
                         $sql = "Select * from giay, loai_giay where giay.maloai = loai_giay.id";
                         $rs = $conn->query($sql);
                         $ten_loai ="";
                         while($row = $rs->fetch_assoc())
                         {
                              $id = $row["id"];
                              $ten_giay = $row["ten_giay"];
                              $gia_km = $row["gia_khuyenmai"];
                              $gia_goc = $row["gia_goc"];
                              $hinh = $row["hinh"];
                              if ($ten_loai != $row["ten_loai"])
                              {
                                   $ten_loai = $row["ten_loai"];
                                   echo "<div class='h2 text-center my-3'>Giày $ten_loai</div>";
                              }
                              echo "<div class='col-md-3 col-sm-4 col-6 mb-3'>";
                              echo "<div class='card h-100'>";
                              echo "<img src='../hinh/$hinh' class='card-img-top' alt='$hinh'>";
                              echo "<div class='card-body'>";
                              echo "<h5 class='card-title'>$ten_giay</h5>";
                              echo "<p class='card-text float-end'><del>".number_format($gia_goc)."đ</del> <strong>".number_format($gia_km)."đ</strong></p>";
                              echo "</div>";
                              echo "</div>";   
                              echo "</div>";
                         }
                         
                    ?>
               </div>
          </div>
          <!-- End product -->
     </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

