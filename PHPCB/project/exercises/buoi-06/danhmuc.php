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
                     <h2>Quan ly danh muc banh kem</h2>
                  </div>
                  <div class="add">
                     <a href="addloaibanh.php">
                        <button type="button" class="btn cur-p btn-success">Add</button>
                     </a>
                  </div>
               </div>
               <!--noi dung replace-->
               <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                     <table class="table">
                        <thead>
                           <tr>
                              <th><b>Ma Loai</b></th>
                              <th><b>Ten loai</b></th>
                              <th><b>Mo ta</b></th>
                              <th><b>Action</b></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           //dua du lieu table loai banh ra
                           require_once('connect.php');
                           $sql = "SELECT * FROM loai_banh";
                           $stmt = $conn->query($sql);
                           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<tr>
                                    <td>' . $row['Ma_loai'] . '</td>
                                    <td>' . $row['Ten_loai'] . '</td>
                                    <td>' . $row['Mo_ta'] . '</td>
                                    <td>
                                       <a href="xlxoadm.php?maloai=' . $row['Ma_loai'] . '">Del</a> |
                                       <a href="editdanhmuc.php?maloai=' . $row['Ma_loai'] . '">Edit</a>
                                    </td>
                              </tr>';
                           }
                           ?>


                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
            <!-- end content-->
         </div>
      </div>
   </div>

</body>

</html>