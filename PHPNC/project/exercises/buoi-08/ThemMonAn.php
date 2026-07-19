<?php
$conn = new mysqli("localhost", "root", null, "ql_mon_an");
if ($conn->connect_error) {
    die("Kết nối thất bại !!!" . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài tập 01 - Thêm Món Ăn</title>
    <style>
        .style01 {
            width: 600px;
            margin: 10px auto;
            border-collapse: collapse;
            background-color: lightorange;
        }

        .style02 {
            font-family: serif;
            font-size: 30px;
            color: whitesmoke;
            background-color: darkorange;
        }

        .style03 {
            font-family: arial;
            font-size: 18px
        }
    </style>
</head>

<body>
    <?php
    if (isset($_POST["submit"])) {
        $ten_mon = $_POST["ten_mon"];
        $id_loai_mon = $_POST["loai_mon"];
        $cach_che_bien = $_POST["cach_che_bien"];
        $hinh = $_FILES["hinh"]["name"];

        if (empty($ten_mon) || empty($id_loai_mon) || empty($cach_che_bien)) {
            $loi = "Phải nhập tên món, loại món và cách chế biến !!!";
        } else {
            $sql = "INSERT INTO mon_an (id_loai_mon, ten_mon_an, cach_che_bien, hinh) VALUES ($id_loai_mon, '$ten_mon', '$cach_che_bien', '$hinh')";
            $kq = $conn->query($sql);
            if ($kq) {
                move_uploaded_file($_FILES["hinh"]["tmp_name"], "../hinh/" . $hinh);
                $tb = "Đã thêm món ăn thành công";
            } else {
                $loi = "Lỗi: Không lưu vào CSDL được !!!";
            }
        }
    }
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        <table cellspacing="0" cellpadding="5" class="style01">
            <tr>
                <th colspan="2" class="style02">THÊM MÓN ĂN MỚI</th>
            </tr>
            <tr>
                <td class="style03">Tên Món Ăn</td>
                <td><input type="text" name="ten_mon" value="<?= $ten_mon ?? null; ?>" class="style03" id="ten_mon"></td>
            </tr>
            <tr>
                <td class="style03">Loại Món</td>
                <td>
                    <select name="loai_mon" class="style03" id="loai_mon">
                        <option value="">-- Chọn loại món --</option>
                        <option value="1">Chiên</option>
                        <option value="2">Xào</option>
                        <option value="3">Nấu</option>
                        <option value="4">Nướng</option>
                        <option value="5">Hấp</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td class="style03">Cách Chế Biến</td>
                <td><textarea name="cach_che_bien" class="style03" id="cach_che_bien"><?= $cach_che_bien ?? null; ?></textarea></td>
            </tr>
            <tr>
                <td class="style03" valign="top">Hình Món Ăn</td>
                <td><input type="file" name="hinh" class="style03">
                    <div class="style03" id="hinh"><?= $hinh ?? null; ?></div>
                </td>
            </tr>
            <tr>
                <th colspan="2">
                    <input type="submit" name="submit" value=" Thêm Món Ăn ">
                </th>
            </tr>
        </table>
    </form>

    <?php
    if (isset($loi)) {
        echo "<div style='text-align:center;color:red;'>$loi</div>";
    }

    if (isset($tb)) {
        echo "<div id='hienthi'>";
        echo "<div style='text-align:center;color:green;'>$tb</div>";
        echo "<table align='center'>";
        echo "<tr><td align='center'>";
        echo "<img src='../hinh/$hinh' width='250' height='250' alt='hinh'><br>";
        echo "Tên món ăn: <b>$ten_mon</b><br>";
        echo "Loại món: <b>$id_loai_mon</b><br>";
        echo "Cách chế biến: <b>$cach_che_bien</b><br>";
        echo "</td></tr>";
        echo "<tr><td align='center'>";
        echo "<a href='Bai01_DSMonAn.php'>Xem danh sách món ăn đã thêm</a>";
        echo "</td></tr></table>";

        echo "</div>";
    }
    ?>

    <script>
        function addNew() {
            ten_mon.value = "";
            loai_mon.value = "";
            cach_che_bien.value = "";
            hinh.innerHTML = "";
            ten_mon.focus();
        }
    </script>

</body>

</html>