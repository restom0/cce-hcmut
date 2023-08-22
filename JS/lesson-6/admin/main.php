<!DOCTYPE html>
<html lang="en">

   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
        <!-- Sidebar  -->
		<?php
		//tach php ra khoi html sau do goi trang xu ly php vao
		require_once('menuleft.php');
		?>
        <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <?php
			//tach php ra khoi html sau do goi trang xu ly php vao
			require_once('header.php');
			?>
               <!-- end topbar -->
               <!-- content inner -->
                           <div class="white_shd full margin_bottom_30">
                              <div class="full graph_head">
                                 <div class="heading1 margin_0">
                                    <h2>Quản lí Users</h2>
                                 </div>
                                 <div class="button_block" style="float: right; padding: 5px">
                                    <a href="addusers.php">
                                    <button type="button" class="btn cur-p btn-success">Add</button></div>
                                 </div>
                              <div class="table_section padding_infor_info">
                                 <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                       <thead>
                                          <tr>
                                             <th>Firstname</th>
                                             <th>Lastname</th>
                                             <th>Email</th>
                                             <th>Action</th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                       	<?php
                                       	//dua du lieu table vao 
                                       	require_once('connect.php');
                                       	$sql="select * from users";
                                       	$kq=mysqli_query($conn,$sql);
                                       	while ($row=mysqli_fetch_array($kq)) {
                                       		echo '  <tr>
		                                            <td>'.$row['F_name'].'</td>
		                                            <td>'.$row['L_name'].'</td>
		                                            <td>'.$row['Email'].'</td>
                                                  <td> <img src=images/users/'.$row['Hinh'].' width=50px/> </td>
                                                  <td> <a href=xulyxoausers.php?idusers='.$row['id'].'> Del </a> | <a href=editusers.php?idusers='.$row['id'].'> Edit </a> </td>
		                                          	</tr> ';
                                       		# code...
                                       	}
                                        ?>  
                                          
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                        
               <!-- end content inner -->
            </div>
         </div>
      </div>

   </body>
</html>