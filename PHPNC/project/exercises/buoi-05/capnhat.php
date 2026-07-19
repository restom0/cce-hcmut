<?php
    $ketnoi = new mysqli("localhost","root",null,"ql_ban_sua");
    if ($ketnoi->connect_error)
    {
          die("Kết nối thất bại !!!" . $ketnoi->connect_error);
    }
    $mahang = $_POST["mahang"];
    $tenhang = $_POST["tenhang"];
    $dienthoai = $_POST["dienthoai"];
    $diachi = $_POST["diachi"];
    $email  = $_POST["email"];

    $sql = "Update hang_sua set
             Teng_hang_sua = '$tenhang',
             Dia_chi = '$diachi',
             Dien_thoai = '$dienthoai',
             Email = '$email' where Ma_hang_sua = '$mahang'";
    $ketqua = $ketnoi->query($sql);
    if ($ketqua)
    {
        $ketnoi->close();
        header("location: ViDuMySQL.php?thamso=ds");
    }
    else
    {
        echo "Cau lenh sai";
    }