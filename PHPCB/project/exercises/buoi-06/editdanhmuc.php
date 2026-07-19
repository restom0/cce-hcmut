<?php
//lay maloai duoc gui tu trang daanhmuc
$ml = $_GET['maloai'];
//connect database
require_once 'connect.php';
$sql = "SELECT * FROM loai_banh WHERE Ma_loai = :ml";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ml', $ml);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$tl = $row['Ten_loai'];
$mt = $row['Mo_ta'];
?>
<!DOCTYPE html>
<html lang="en">

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
                     <h2>Edit danh muc</h2>
                  </div>

               </div>
               <!--noi dung replace-->
               <form method="post" action="xulyupdatedm.php">
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">

                           <input value="<?= $ml ?>" class="form-control" id="inputFirstName" readonly name="maloai" type="text" placeholder="Enter your first name" />
                           <label for="inputFirstName">Ma loai</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating">
                           <input value="<?= $tl; ?>" class="form-control" id="inputLastName" name="tenloai" type="text" placeholder="Enter your last name" />
                           <label for="inputLastName">Ten loai</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-floating mb-3">
                     <input value="<?= $mt; ?>" class="form-control" id="inputEmail" type="text" name="mota" placeholder="" />
                     <label for="inputEmail">Mo ta</label>
                  </div>

                  <div class="mt-4 mb-0">
                     <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Update danh muc</button>
                        <button type="reset" class="btn btn-info btn-block">Cancel</button>
                     </div>
                  </div>
               </form>
            </div>
            <!-- end content-->
         </div>
      </div>
   </div>

</body>

</html>