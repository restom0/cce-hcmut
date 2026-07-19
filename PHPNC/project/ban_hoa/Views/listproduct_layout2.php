<?php
    if ($list->num_rows >0 )
    {
        foreach($list as $sp)
        {
            $id=$sp["id"];
            echo "<div class='col-md-3 mb-5'>";
            echo "<div class='card h-100'>";
            echo "<img src='img/".$sp["hinh_anh"]."' class='card-img-top' alt='hình hoa'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$sp["ten_hoa"]."</h5>";
            echo " <h6 class='card-text'>".number_format($sp["gia_ban"])." đồng</h6>";
            echo "<div class='card-text'>".$sp["tp_chinh"]."</div>";
            echo "</div>";
            echo "<div class='card-footer'><a class='btn btn-primary btn-sm' href='?action=chitiet&id=$id'>Chi tiết</a></div>";
            echo "</div></div>";
        }
    }
    else
    {
        echo "<div class='fs-3 p-5 text-center'>Không tìm thấy sản phẩm</div>";
    }
