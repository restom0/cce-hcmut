<?php
    $ma = $_GET["ma"];

     $ketnoi = new mysqli("localhost","root",null,"ql_ban_sua");
     if ($ketnoi->connect_error)
     {
           die("Kết nối thất bại !!!" . $ketnoi->connect_error);
     }

     $sql = "DELETE FROM hang_sua where Ma_hang_sua = '$ma'";
     $ketqua = $ketnoi->query($sql);
     if ($ketqua)
     {
        $ketnoi->close();
        header("location: ViDuMySQL.php?thamso=ds");
     }
     else
     {
        echo "Loi cau lenh SQL !!!";
     }