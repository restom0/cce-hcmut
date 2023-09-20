<?php
    if ($list==null)
    {
        echo "<h1>Hiện giờ chưa có sản phẩm !!! </h1>";
        exit;
    }
?>
<table border="0" width="100%" cellspacing="5" cellpadding="0" align="center">
    <caption></caption>
    <?php
        $i=0;
        foreach($list as $row)
        {
            if ($i % 4 == 0)
            {
                echo "<tr>";
            }
            echo "<td style='test-align:center'>";
            echo "<div style='border:1px solid gray; border-radius:5px; width:80%;padding:5px;text-align:center'>";
            echo "<img src='hinh_anh/".$row["Hinh"]."' height='170' alt='hình'><br>";
            echo "<b>".$row["Ten_sua"]."</b><br>";
            echo "<b>".number_format($row["Don_gia"])."</b> VNĐ - ";
            echo "<a href='?ctrl=sanpham&action=chitiet&ma=".$row["Ma_sua"]."'>Chi Tiết</a>";
            echo "</div>";
            echo "</td>";
            $i++;
            if($i % 4 == 0)
            {
                echo "</tr>";
            }
        }
    ?>
</table>
