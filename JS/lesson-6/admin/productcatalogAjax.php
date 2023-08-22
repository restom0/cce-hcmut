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
                                 
                                 Danh mục: 
                                
                                   <select id='danhmuc' name="danhmuc">
                                       <?php require_once('connect.php');
                                          $sqldm= "select * from loai_banh";
                                                $kqdm=mysqli_query($conn,$sqldm);
                                                while ($rowdm = mysqli_fetch_array($kqdm)) {

                                                echo '<option value="'.$rowdm['Ma_loai'].'">'.$rowdm['Ten_loai'].'</option>';
                                             }
                                      ?>
                                      
                                   </select>
                                   <button onclick='xemsp(danhmuc.value);'>Xem</button>
                                   <button onclick='xemtatcasp();'>Xem tất cả</button><br>
                                   Tìm sp: <input onkeyup="search(this.value)" type="text" name="search" placeholder="Nhập từ cần tìm">

                                 
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
                                             <th><b>Action</b></th>
                                             
                                          </tr>
                                       </thead>
                                       <tbody id='kqsp'>
                                             <?php
                                             require_once('xulytimtatcasptheodmajax.php');
                                             ?>
                                         
                                         
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           
               <!-- end content-->
               <script>
                   function xemtatcasp() {

                     
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                      document.getElementById("kqsp").innerHTML =
                      this.responseText;
                    }
                    xhttp.open("GET", "xulytimtatcasptheodmajax.php");
                    xhttp.send();
                    
                  }
                  function xemsp(dm) {

                     
                    const xhttp = new XMLHttpRequest();
                    xhttp.onload = function() {
                      document.getElementById("kqsp").innerHTML =
                      this.responseText;
                    }
                    xhttp.open("GET", "xulytimsptheodmajax.php?q=" + dm);
                    xhttp.send();
                    
                  }

                  //hàm tìm kiem ajax
                  function search(str){
                     const xhttp = new XMLHttpRequest();
                     xhttp.onload = function() {
                      document.getElementById("kqsp").innerHTML =
                      this.responseText;
                    }
                    xhttp.open("GET", "xulytimspjax.php?q=" + str);
                    xhttp.send();
                  }
                  //hàm xóa ajax
                  function xulyxoa(msp){
                      const xhttp = new XMLHttpRequest();
                     xhttp.onload = function() {
                     xemtatcasp();
                    }
                    xhttp.open("GET", "xulyxoaspajax.php?q=" + msp);
                    xhttp.send();

                  }
               </script>

            </div>
         </div>
      </div>
     
   </body>
</html>