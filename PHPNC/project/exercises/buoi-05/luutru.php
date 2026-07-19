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

    $sql = "Insert Into hang_sua Values('$mahang','$tenhang','$diachi','$dienthoai', '$email')";
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
