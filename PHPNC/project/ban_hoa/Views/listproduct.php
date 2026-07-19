<?php
//First Photo Grid
foreach ($list_loai as $ll) {
    $i=0;
    echo "<div class='w3-row w3-center w3-padding-16'>" . $ll["ten_loai"] . "</div>";
    foreach($list_hoa as $lh)
    {
        if ($ll["id"]== $lh["id_loai"])
        {
            $id= $lh=["id"];
            if ($i % 4 ==0)
            {
                echo "<div class='w3-row-padding w3-padding-16 w3-center'>";
            }
        
            $i++;
            $link_01 = "<a href='?action=detail&id=$id'><img src='img/detail.png'></a>";
            echo "<div class='w3-quarter'>";
            echo "<img src='img/" . $lh["hinh_anh"] . "' alt='" . $lh["hinh_anh"] . "' style='width:100%'>";
            echo "<h4>" . $lh["ten_hoa"] . " - $link_01 </h4>";
            echo "<p>" . $lh["tp_chinh"] . "</p>";
            echo "</div>";
            if ($i % 4 == 0)
            {
                echo "</div>";
            }
        }
    }
}
