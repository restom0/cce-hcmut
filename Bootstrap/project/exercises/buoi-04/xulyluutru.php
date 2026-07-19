<?php
   if (isset($_POST["luutru"]))
   {
        $ml = $_POST["maloai"];
        $tg = $_POST["tengiay"];
        $km = $_POST["giakm"];
        $gg = $_POST["giagoc"];
       
       $thumuc = "../hinh/";
       $tentaptin = basename($_FILES["hinhsp"]["name"]);
       $noichua = $thumuc . $tentaptin;

       $conn = @new mysqli("localhost", "root", null, "ql_ban_giay");
       $conn->set_charset("utf8");
       if ($conn->connect_error) {
          die("Kết nối thất bại " . $conn->connect_error);
        }
       $sql = "Insert into giay(id, maloai,ten_giay, gia_khuyenmai, gia_goc, hinh) Values(null, $ml, '$tg', $km, $gg, '$tentaptin')";

       $tv1 = $conn->query($sql);
       if ($tv1)
       {
       	   move_uploaded_file($_FILES["hinhsp"]["tmp_name"], $noichua);
       }
       $conn->close();

   }
   header("location: danhsach.php");
?>

