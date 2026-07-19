<?php
//goi trang xu ly phpvao
require_once('xldangky.php');

?>
<!DOCTYPE html>
<html lang="en">
  
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <?php 
               require_once('menuleft.php');
            ?>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php
                  require_once('header.php');
               ?>
               <!-- end topbar -->
               <!-- content -->
                  <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Them loai banh</h2>
                                 </div>
                                
                              </div>
                             <!--noi dung replace-->
                              <form method="post" action="xlthemloaibanh.php">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input required="required" class="form-control" id="" name="maloai" type="text" placeholder="Vui long nhap ma loai banh" />
                                                        <label for="inputFirstName">Ma loai</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input required="required" class="form-control" id="" name="tenloai" type="text" placeholder="Vui long nhap ten loai" />
                                                        <label for="inputLastName">Ten loai</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="" type="text" name="mota" placeholder="vui long nhap mo ta" />
                                                <label for="inputEmail">Mo ta</label>
                                            </div>
                                            
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid"><button type="submit" class="btn btn-primary btn-block" >Them loai banh</button></div>
                                            </div>
                                        </form>
                           </div>
               <!-- end content-->
            </div>
         </div>
      </div>
     
   </body>
</html>