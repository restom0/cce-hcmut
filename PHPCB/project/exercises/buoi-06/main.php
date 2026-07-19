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
                     <h2>Quan ly Users</h2>
                  </div>
                  <div class="add">
                     <a href="adduser.php">
                        <button type="button" class="btn cur-p btn-success">Add</button>
                     </a>
                  </div>
               </div>
               <div class="table_section padding_infor_info">
                  <div class="table-responsive-sm">
                     <table class="table">
                        <thead>
                           <tr>
                              <th><b>Firstname</b></th>
                              <th><b>Lastname</b></th>
                              <th><b>Email</b></th>
                              <th><b>Action</b></th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php
                           require_once('connect.php');
                           $sql = "SELECT * FROM users";
                           $stmt = $conn->query($sql);
                           while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                              echo '<tr>
                                    <td>' . $row['F_name'] . '</td>
                                    <td>' . $row['L_name'] . '</td>
                                    <td>' . $row['Email'] . '</td>
                                    <td>
                                    <a href="xulyxoauser.php?iduser=' . $row['id'] . '">Del</a> |
                                    <a href="edituser.php?iduser=' . $row['id'] . '">Edit</a>
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