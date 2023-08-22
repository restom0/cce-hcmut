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
                                    <h2>San Pham theo Danh muc</h2>
                                 </div>
                                 
                              </div>
                             <!--noi dung replace-->
                             <div>
                                 <form method="post" action="">
                                 Danh mục: 
                                
                                   <select name="danhmuc">
                                       <?php require_once('connect.php');
                                          $sqldm= "select * from loai_banh";
                                                $kqdm=mysqli_query($conn,$sqldm);
                                                while ($rowdm = mysqli_fetch_array($kqdm)) {

                                                echo '<option value="'.$rowdm['Ma_loai'].'">'.$rowdm['Ten_loai'].'</option>';
                                             }
                                      ?>
                                      
                                   </select>
                                   <input type="submit" value="Xem" name="">
                                 
                             </div>
                             <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table">
                                       <thead>
                                          <tr>
                                             <th><b>Mã sp</b></th>
                                             <th><b>Tên sp</b></th>
                                             <th><b>Gia bán</b></th>
                                             <th><b>Số lượng</b></th>
                                             <th><b>Giảm giá</b></th>
                                             <th><b>Ngày sx</b></th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php
                                          if(isset($_POST)){

                                             $dm= $_POST['danhmuc'];
                                             //dua du lieu  sp theo dm ra
                                             //require_once('connect.php');
                                             $sql= "select * from san_pham where Ma_loai = '$dm'";
                                             $kq=mysqli_query($conn,$sql);
                                             while ($row = mysqli_fetch_array($kq)) {
                                                echo ' <tr>
                                                         <td>'.$row['Ma_sp'].'</td>
                                                         <td>'.$row['Ten_sp'].'</td>
                                                         <td>'.$row['So_luong'].'</td>
                                                         <td>'.$row['Gia_ban'].'</td>
                                                         <td>'.$row['Giam_gia'].'</td>
                                                         <td>'.$row['Ngay_sx'].'</td>
                                                      </tr>';
                                                # code...
                                             }
                                          }
                                         
                                          
                                          ?>
                                         
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           </form>
               <!-- end content-->
            </div>
         </div>
      </div>
     
   </body>
</html>