<?php
if ($list == null) echo "Chưa có dữ liệu !!!";
else {
   if (isset($_SESSION["thongbao"])) {
      echo "<div class='alert alert-danger'>" . $_SESSION['thongbao'] . "</div>";
   }
   echo '<table class="style13" border="1" cellspacing="0" cellpadding="5">';
   echo '<thead>';
   echo '<tr>';
   echo '<th scope="col">Mã Hoa</th>';
   echo '<th scope="col">Tên Hoa</th>';
   echo '</tr>';
   echo '</thead>';
   echo '<tbody>';
   foreach ($list as $row) {
      echo '<tr>';
      echo '<th scope="row">' . $row["id"] . '</th>';
      echo '<td>' . $row["ten_loai"] . '</td>';
      echo '<td><a href="?ctrl=loaihoa&act=edit&ma=' . $row["id"] . '">Sữa</a> | 
                  <a href="?ctrl=loaihoa&act=delete&ma=' . $row["id"] . '">Xoá</a> </td>';
      echo '</tr>';
   }
   echo '</tbody>';
   echo "</table>";
}
