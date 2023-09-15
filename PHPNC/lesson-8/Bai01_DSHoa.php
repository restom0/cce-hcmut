<?php
    $conn = new mysqli("localhost", "root", null, "ql_ban_hoa");
    if ($conn->connect_error)
    {
        die("Kết nối thất bại !!!" . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Hoa Đã Thêm</title>
    <style>
        .style01 {width:700px; margin:10px auto; border-collapse:collapse; background-color:lightorange;}
        .style02 {font-family:serif; font-size:30px; color:whitesmoke; background-color:darkorange;padding:5px;}
        .style03 {font-family:arial; font-size:18px}
    </style>
</head>
<body>
    <table cellspacing="0" cellpadding="5" class="style01">
        <caption class="style02">HOA ĐẸP BỐN MÙA - <a href="Bai01_ThemHoa.php">Trở về trang chính</a></capion>
        <?php
            $sql = "SELECT * FROM hoa_tuoi";
            $kq  = $conn->query($sql);
            $i=0;
            while($dl = $kq->fetch_assoc())
            {
                if ($i % 5==0)
                {
                    echo "<tr align='center'>";
                }
                $i++;
                echo "<td><b>".$dl["ten_hoa"]."</b><br>";
                echo "Giá bán: " . number_format($dl["gia_ban"]). "VNĐ<br>";
                echo "<img src='../hinh/".$dl["hinh"]."' width='200' height='200' alt='hình'>";
                echo "</td>";
                if ($i % 5 == 0)
                {
                    echo "</tr>";
                }
            }
            $conn->close();
        ?>
    </table>
</body>
</html>