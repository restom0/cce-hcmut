<?php
if ($list->num_rows<=0)
{
    echo "<div class='w3-row w3-center w3-padding-16 w3-xlarge'>Không tìm thấy sản phẩm !!!!</div>";
}
else
{
    $i=0;
    foreach ($list as $lp)
    {
        if ($i != $lp["id_loai"])
        {
            echo "<div class='w3-row w3-center w3-padding-16'>" . $lp["ten_loai"] . "</div>";
            $i=$lp["id_loai"];
            $j = 0;
        }
        if ($j%4==0)
        {
            echo "<div class='w3-row-padding w3-padding-16 w3-center'>";
        }
        $j++;
        $link = "<span class='w3-right w3-small'><a href='?action=detail&id=$id'><img src='img/detail.png'></a>&#9756;&#9758;<a href='?action=detail&id=$id'><img src='img/giohang.png'></a></span>";
        
        echo "<div class='w3-quarter'>";
        echo "<img src='img/" . $lp["hinh_anh"] . "' alt='" . $lp["hinh_anh"] . "' style='width:100%'>";
        echo "<h4 class='w3-small'>" . $lp["ten_hoa"] ." - ".$lp["gia_ban"]. "$link</h4>";
        echo "<p>" . $lp["tp_chinh"] . "</p>";
        echo "</div>";
        if ($j % 4 == 0) {
            echo "</div>";
        }
    }
}

