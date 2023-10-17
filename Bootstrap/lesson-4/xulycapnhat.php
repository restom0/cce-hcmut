<?php
   if (isset($_POST["capnhat"]))
   {
   	    $id = $_POST['id'];
        $ml = $_POST['maloai'];
        $tg = $_POST["tengiay"];
        $km = $_POST['giakm'];
        $gg = $_POST['giagoc'];
        $hinh = $_FILES["hinh"]["name"]; 
        
        $conn = @new mysqli("localhost", "root", null, "ql_ban_giay");
        $conn->set_charset("utf8");

		if (empty($hinh))
        {
        	$query = "UPDATE giay SET maloai=$ml, ten_giay='$tg', gia_khuyenmai=$km, gia_goc=$gg WHERE id=$id";
        }
        else
        {
            $query = "UPDATE giay SET maloai=$ml, ten_giay='$tg', gia_khuyenmai=$km, gia_goc=$gg, hinh='$hinh' WHERE id=$id";
        }
       
        $query_run = $conn->query($query);

        if($query_run)
        {
            if (! empty($hinh))
            {
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "../hinh/" . $hinh);
            }
            echo '<script> alert("Đã Cập Nhật Sản Phẩm!!!"); </script>';
            header("location: danhsach.php");
        
        }
        else
        {
            echo '<script> alert("đã cập nhật sản phẫm"); </script>';
        }
   }

?>	
