<table width="80%" border="0" cellpadding="0" cellspacing="0" align="center">
    <caption></caption>
    <tr>
        <?php
        echo "<td width='30%' style='text-align:center;'>";
        echo "<img src='../hinh_anh/" . $row["Hinh"] . ".jpg' width='80%' alt='Hình'>";
        echo "</td>";
        echo "<td width='70%' style='line-height:30px'>";
        echo "<b>" . $row["Ten_sua"] . " - " . $row["Trong_luong"] . " gr</b><br>";
        echo $row["Tp_dinh_duong"] . "<br>";
        echo $row["Loi_ich"] . "<br>";
        echo number_format($row["Don_gia"]) . " VNĐ <br>";
        echo "<a href='?ctrl=trangchu'>Trở về trang chủ" . $row["Don_gia"] . "</a>";
        echo "</td>";
        ?>
    </tr>
</table>