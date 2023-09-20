<?php
if ($list == null) echo "Chưa có dữ liệu !!!";
else {
    if (isset($_SESSION["thongbao"])) {
        echo "<div class='alert alert-danger'>" . $_SESSION['thongbao'] . "</div>";
    }
    echo '<table class="style13" border="1" cellspacing="0" cellpadding="5">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Mã Hãng Sữa</th>';
    echo '<th scope="col">Tên Hãng Sữa</th>';
    echo '<th scope="col">Địa Chỉ</th>';
    echo '<th scope="col">Điện Thoại</th>';
    echo '<th scope="col">Email</th>';
    echo '<th scope="col">Xử lý</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($list as $row) {
        echo '<tr>';
        echo '<th scope="row">' . $row["ma_hang_sua"] . '</th>';
        echo '<td>' . $row["ten_hang_sua"] . '</td>';
        echo '<td>' . $row["dia_chi"] . '</td>';
        echo '<td>' . $row["dien_thoai"] . '</td>';
        echo '<td>' . $row["email"] . '</td>';
        echo '<td><a href="?ctr=hangsua&act=edit&ma=' . $row["ma_hang_sua"] . '">Sữa</a>
|<a href="?ctr=hangsua&act=delete&ma=' . $row["ma_hang_sua"] . '">Xoá</a> </td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo "</table>";
}
