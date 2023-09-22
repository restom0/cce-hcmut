<table width="80%" border="0" cellpadding="0" cellspacing="0" align="center">
    <caption></caption>
    <tr>
        <?php
        echo '<table class="style13" border="1" cellspacing="0" cellpadding="5">';
        echo '<thead>';
        echo '<tr>';
        echo '<th scope="col">Hình ảnh</th>';
        echo '<th scope="col">Tên hoa</th>';
        echo '<th scope="col">Giá bán</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        $i = 0;
        foreach ($list as $row) {
            echo '<tr>';
            echo "<td><img src='img/" . $row["hinh_anh"] . "' width='30%' height='30%' alt='Hình'></td>";
            echo "<td>" . $row["ten_hoa"] . "</td>";
            echo "<td>" . $row["gia_ban"] . "</td>";
            echo '</tr>';
        }
        echo '</tbody>';
        echo "</table>";
        ?>
    </tr>
</table>