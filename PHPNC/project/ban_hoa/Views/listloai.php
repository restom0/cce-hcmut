<?php
    foreach($listloai as $ll)
    {
        $id = $ll["id"];
        $name = $ll["ten_loai"];
        echo "<a href='?action=loai&id=$id' class='w3-bar-item w3-button'>$name</a>";
    }
    echo '<a href="#about" onclick="w3_close()" class="w3-bar-item w3-button">Giới Thiệu</a>';