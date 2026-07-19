<?php
    foreach($list_loai as $loai)
    {
        $id = $loai["id"];
        echo "<li><a class='dropdown-item' href='?action=loai&id=$id'>".$loai["ten_loai"]."</a></li>";
    }                 