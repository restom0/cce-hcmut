<?php
   $gt=1;
   if (isset($_POST["ghifile"])) {

    $ma = $_POST["masv"];
    $ht = $_POST["hoten"];
    $ns = $_POST["ngaysinh"];
    $no = $_POST["noisinh"];
    $gt = $_POST["gioitinh"];

    $nd = $ma . "," . $ht . "," . date("d/m/Y", strtotime($ns)) . "," . $no . "," . (($gt == 1) ? "Nam" : "Nữ")."\n";

    $file = @fopen("ttsv.txt", "a");
    if (!$file) {
        echo "Đường dẫn sai hoặc tên file không đúng";
    } else {
        fwrite($file, $nd);
        fclose($file);
        $tb = "Đã ghi file thành công";
    }
  }
?>
<form action="" method="post">
    <table width="600" align="center" cellpadding="5" cellspacing="0">
        <caption style="background-color:#DF01D7;padding:5px;font-size:18px">
            THÔNG TIN SINH VIÊN
        </caption>
        <tr>
            <th width="100">Mã Sinh Viên</th>
            <td width="450"><input type="text" name="masv" value="<?= $ma ?? null; ?>"></td>
        </tr>
        <tr>
            <th valign="top">Họ Và Tên</th>
            <td><input type="text" name="hoten" value="<?= $ht ?? null; ?>"></td>
        </tr>
        <tr>
            <th valign="top">Ngày Sinh</th>
            <td><input type="date" name="ngaysinh" value="<?= $ns ?? null; ?>"></td>
        </tr>
        <tr>
            <th valign="top">Nơi Sinh</th>
            <td><input type="text" name="noisinh" value="<?= $no ?? null; ?>"></td>
        </tr>
        <tr>
            <th valign="top">Giới Tính</th>
            <td><input type="radio" name="gioitinh" value="1" <?= ($gt == 1) ? "checked" : null; ?>> Nam
                <input type="radio" name="gioitinh" value="0" <?= ($gt == 0) ? "checked" : null; ?>> Nữ
            </td>
        </tr>
        <tr align="center">
            <td colspan="2">
                <input type="submit" name="ghifile" value=" Ghi File ">
                <input type="reset" name="nhapmoi" value=" Nhập Mới ">
            </td>
        </tr>
    </table>
</form>
<?php
if (isset($tb)) {
    $taptin = fopen("ttsv.txt", "r");
    if (!$taptin) {
        echo "Đường dẫn sai hoặc không có tập tin !!!";
    } else {
        echo "<table border='1' cellspacing='0' cellpadding='5' align='center'>";
        echo "<caption><h3>Danh Sách Sinh Viên Đã Nhập</h3></caption>";
        echo "<tr><th>Mã SV</th><th>Họ Và Tên</th><th>Ngày Sinh</th><th>Nơi Sinh</th><th>Giới Tính</th></tr>";
        while (!feof($taptin)) {
            $dong = fgets($taptin);
            if ($dong == "") {
                continue;
            }
            $sv = explode(",", $dong);
            echo "<tr>";
            foreach ($sv as $muc) {
                echo "<td>$muc</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }
    fclose($taptin);
}