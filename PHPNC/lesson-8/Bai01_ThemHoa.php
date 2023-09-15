<?php
    $conn = new mysqli("localhost", "root", null, "ql_ban_hoa");
    if ($conn->connect_error)
    {
        die("Kết nối thất bại !!!" . $conn->connect_error);
    }
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 01 - Thêm Hoa</title>
    <style>
        .style01 {width:600px; margin:10px auto; border-collapse:collapse; background-color:lightorange;}
        .style02 {font-family:serif; font-size:30px; color:whitesmoke; background-color:darkorange;}
        .style03 {font-family:arial; font-size:18px}
    </style>
</head>
<body>
<?php
    if (isset($_POST["submit"]))
    {
        $tenhoa = $_POST["tenhoa"];
        $giaban = $_POST["giaban"];
        $taptin = $_FILES["taptin"]["name"];

        if (empty($tenhoa) || empty($giaban))
        {
            $loi = "Phải nhập tên hoa và giá bán !!!";
        }
        else
        {
            $sql = "INSERT INTO hoa_tuoi(ten_hoa, gia_ban, hinh) VALUES('$tenhoa',$giaban,'$taptin')";
            $kq  = $conn->query($sql);
            if ($kq)
            {
                move_uploaded_file($_FILES["taptin"]["tmp_name"],"../hinh/".$taptin);
                $tb = "Đã thêm bó hoa Thành Công";
            }
            else
            {
                $loi = "Lỗi: Không lưu vào CSDL được !!!";
            }
        }

    }
?>
<form action="" method="post" enctype="multipart/form-data">
    <table cellspacing="0" cellpadding="5" class="style01">
        <tr>
            <th colspan="2" class="style02">THÊM BÓ HOA MỚI</th>
        </tr>
        <tr>
            <td class="style03">Tên Bó Hoa</td>
            <td><input type="text" name="tenhoa" value="<?=$tenhoa??null;?>" class="style03" id="tenhoa"></td>
        </tr>
        <tr>
            <td class="style03">Giá Bán</td>
            <td><input type="number" name="giaban" value="<?=$giaban??null;?>" class="style03" id="giaban"></td>
        </tr>
        <tr>
            <td class="style03" valign="top">Hình Bó Hóa</td>
            <td><input type="file" name="taptin" class="style03">
                <div class="style03" id="taptin"><?=$taptin??null;?></div>
            </td>
        </tr>
        <tr>
            <th colspan="2">
                <input type="submit" name="submit" value=" Thêm Bó Hoa ">
                <input type="button" name="nhapmoi" value=" Nhập Mới " onclick="addNew();">
            </th>
        </tr>
    </table>
</form>

<?php
    if(isset($loi))
    {
        echo "<div style='text-align:center;color:red;'>$loi</div>";
    }
    else if (isset($tb))
    {
        echo "<div id='hienthi'>";
        echo "<div style='text-align:center;color:green;'>$tb</div>";
        echo "<table align='center'>";
        echo "<tr><td align='center'>";
        echo "<img src='../hinh/$taptin' width='250' height='250' alt='hinh'><br>";
        echo "tên bó hoa:<b>$tenhoa</b><br>";
        echo "giá bán: <b>".number_format($giaban)."VNĐ</b>";
        echo "</td></tr>";
        echo "<tr><td align='center'>";
        echo "<a href='Bai01_DSHoa.php'>Xem các Bó Hoa Đã Thêm</a>";
        echo "</td></tr></table>";

        echo "</div>";
    }
?>
</div>
<script>
    function addNew()
    {
        tenhoa.value="";
        giaban.value="";
        hienthi.innerHTML="";
        taptin.innerHTML="";
        tenhoa.focus();
    }
</script>
</body>
</html>