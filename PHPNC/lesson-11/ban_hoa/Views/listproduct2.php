<?php
//First Photo Grid
$i = 0;
foreach ($list as $lp) {
    if ($i != $lp["id_loai"]) {
         echo "<p class='w3_left w3-xlarge'>" . $lp["ten_loai"] . "</p>";
         $i = $lp["id_loai"];
         $j = 0;
     }
    if ($j % 4 == 0) {
        echo "<div class='w3-col l3 s6'>";
    }
    $j++;
    //$link = "<span class='w3-right'><a href='?action=detail&id=$id'><img src='img/detail.png'></a>&#9756;&#9758;<a href'?action=detail&id=$id'><img src='img/giohang.png'></a></span>";
    echo "<div class='w3-container'>";
    echo "<img src='img/" . $lp["hinh_anh"] . "' alt='" . $lp["hinh_anh"] . "' style='width:100%'>";
    echo "<p>" . $lp["ten_hoa"] . "<b class='w3-right'>".$lp["gia_ban"]."</b></p>";
    echo "</div>";
    if ($j % 4 == 0) {
        echo "</div>";
    }
}
