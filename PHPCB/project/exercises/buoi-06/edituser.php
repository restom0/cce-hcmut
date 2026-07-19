<?php
$id = $_GET['iduser'];
//connect database
require_once 'connect.php';
$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$fn = $row['F_name'];
$ln = $row['L_name'];
$e = $row['Email'];
///echo $fn.$ln.$e;

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
                     <h2>Edit user</h2>
                  </div>

               </div>
               <!--noi dung replace-->
               <form method="post" action="xulyupdateuser.php">
                  <div class="row mb-3">
                     <div class="col-md-6">
                        <div class="form-floating mb-3 mb-md-0">
                           <input hidden="hidden" type="number" name="iduser" value="<?= $id ?>">
                           <input value="<?= $fn ?>" class="form-control" id="inputFirstName" name="fn" type="text" placeholder="Enter your first name" />
                           <label for="inputFirstName">First name</label>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-floating">
                           <input value="<?php echo $ln; ?>" class="form-control" id="inputLastName" name="ln" type="text" placeholder="Enter your last name" />
                           <label for="inputLastName">Last name</label>
                        </div>
                     </div>
                  </div>
                  <div class="form-floating mb-3">
                     <input value="<?php echo $e; ?>" class="form-control" id="inputEmail" type="email" name="email" placeholder="name@example.com" />
                     <label for="inputEmail">Email address</label>
                  </div>

                  <div class="mt-4 mb-0">
                     <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-block">Update user</button>
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