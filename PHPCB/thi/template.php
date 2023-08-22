<!DOCTYPE html>
<html lang="en">

<head>
   <link rel="stylesheet" href="./style.css">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
   <script src="https://kit.fontawesome.com/d458b53c3b.js" crossorigin="anonymous"></script>
</head>

<body class="dashboard dashboard_1">
   <div class="full_container">
      <div class="inner_container">
         <!-- Sidebar  -->
         <?php
         require_once 'menuleft.php';
         ?>
         <!-- end sidebar -->
         <!-- right content -->
         <div id="content">
            <!-- topbar -->
            <?php
            require_once 'header.php';
            ?>
            <!-- end topbar -->
            <!-- content -->
            <div class="white_shd full margin_bottom_30">
               <div class="full graph_head">
                  <div class="heading1 margin_0">
                     <h1>Quản lý bánh kem</h1>
                  </div>

               </div>
               <div class="container">
                  <h1 style="text-align: center"><b>Bánh petit</b></h1>
                  <hr />
                  <div class="row">
                     <?php
                     require_once 'connect.php';
                     $sql = "SELECT * FROM san_pham";
                     $stmt = $conn->query($sql);
                     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        if ($row['Ma_loai'] == 'pt_c') {
                           echo '
                    <div class="col-md-3">
                        <img src="' . $row['Hinh_anh'] . '" >' .
                              '<p><b><strong>' . $row['Ten_sp'] . '</strong></b></p>' .
                              '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>' .
                              '<br>' .
                              '<span style="color:red;margin-top: 10px;margin-bottom: 10px;"><b><strong>$' . ($row['Gia_ban'] * (100 - $row['Giam_gia']) / 100) . '</strong></b></span> ' .
                              '<span><del> $' . $row['Gia_ban'] . '</del></span>' .
                              '<br>' .
                              '<button type="submit" style="margin-bottom:10px">Add to cart</button>' .
                              '</div>';
                        }
                     }
                     ?>
                  </div>
               </div>
               <div class="container" style="margin-top: 50px;">
                  <h1 style="text-align: center"><b>Bánh sinh nhật tiêu chuẩn</b></h1>
                  <hr />
                  <div class="row">
                     <?php
                     $sql = "SELECT * FROM san_pham";
                     $stmt = $conn->query($sql);
                     while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        if ($row['Ma_loai'] == 'sn_tc') {
                           echo '
                    <div class="col-md-3">
                        <img src="' . $row['Hinh_anh'] . '" >' .
                              '<p><b><strong>' . $row['Ten_sp'] . '</strong></b></p>' .
                              '<i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>' .
                              '<br>' .
                              '<span style="color:red;margin-top: 10px;margin-bottom: 10px"><b><strong>$' . ($row['Gia_ban'] * (100 - $row['Giam_gia']) / 100) . '</strong></b></span> ' .
                              '<span><del> $' . $row['Gia_ban'] . '</del></span>' .
                              '<br>' .
                              '<button type=\"submit\" style="margin-bottom:10px">Add to cart</button>' .
                              '</div>';
                        }
                     }
                     ?>
                  </div>
               </div>
            </div>
            <!-- end content-->
         </div>
      </div>
   </div>

</body>

</html>