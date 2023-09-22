<?php
if ($list == null) {
    echo "<h1>Hiện giờ chưa có sản phẩm !!! </h1>";
    exit;
}
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0" align="center">
    <caption></caption>
    <?php
    echo '<table class="style13" border="1" cellspacing="0" cellpadding="5">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col">Mã Khách hàng</th>';
    echo '<th scope="col">Tên Khách hàng</th>';
    echo '<th scope="col">Ngày đặt</th>';
    echo '<th scope="col">Địa chỉ</th>';
    echo '<th scope="col">Xử lý</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    $i = 0;
    foreach ($list as $row) {
        echo '<tr>';
        echo '<th scope="row">' . $row["id"] . '</th>';
        echo "<td>" . $row["ho_ten"] . "</td><br>";
        echo "<td>" . $row["ngaydat"] . "</td><br>";
        echo "<td>" . $row["diachi_giaohang"] . "</td><br>";
        echo "<td><a href='?ctrl=donhang&action=chitiet&ma=" . $row["id"] . "'>Chi Tiết</a></td>";
        echo '</tr>';
    }
    echo '</tbody>';
    echo "</table>";
    ?>
</table>