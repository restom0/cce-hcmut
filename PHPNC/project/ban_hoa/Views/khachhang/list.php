<?php
if ($list == null) echo "Chưa có dữ liệu !!!";
else {
   if (isset($_SESSION["thongbao"])) {
      echo "<div class='alert alert-danger'>" . $_SESSION['thongbao'] . "</div>";
   }
   echo '<table class="style13" border="1" cellspacing="0" cellpadding="5">';
   echo '<thead>';
   echo '<tr>';
   echo '<th scope="col">Mã Khách hàng</th>';
   echo '<th scope="col">Tên Khách hàng</th>';
   echo '<th scope="col">Địa Chỉ</th>';
   echo '<th scope="col">Điện Thoại</th>';
   echo '<th scope="col">Email</th>';
   echo '<th scope="col">Xử lý</th>';
   echo '</tr>';
   echo '</thead>';
   echo '<tbody>';
   foreach ($list as $row) {
      echo '<tr>';
      echo '<th scope="row">' . $row["id"] . '</th>';
      echo '<td>' . $row["ho_ten"] . '</td>';
      echo '<td>' . $row["dia_chi"] . '</td>';
      echo '<td>' . $row["dien_thoai"] . '</td>';
      echo '<td>' . $row["email"] . '</td>';
      echo '<td><a href="?ctrl=khachhang&act=edit&ma=' . $row["id"] . '">Sữa</a> | 
                  <a href="?ctrl=khachhang&act=delete&ma=' . $row["id"] . '">Xoá</a> </td>';
      echo '</tr>';
   }
   echo '</tbody>';
   echo "</table>";
}
