<?php
    $ma = $_GET["ma"];
    $sql = "select * from hang_sua where Ma_hang_sua='$ma'";
    $ketqua = $ketnoi->query($sql);
    $dulieu = $ketqua->fetch_assoc();

?>
<form action="capnhat.php" method="post">
    <table>
        <caption><h1>Thêm Sữa Mới</h1></caption>
        <tr>
            <th>Mã hãng Sữa</th>
            <td><input type="text" name="mahang" value="<?=$dulieu['Ma_hang_sua']?>" readonly></td>
        </tr>
        <tr>
            <th>Tên hãng Sữa</th>
            <td><input type="text" name="tenhang" value="<?=$dulieu['Teng_hang_sua']?>"></td>
        </tr>
        <tr>
            <th>Điện Thoại</th>
            <td><input type="text" name="dienthoai" value="<?=$dulieu['Dien_thoai']?>"></td>
        </tr>
        <tr>
            <th>Địa Chỉ</th>
            <td><input type="text" name="diachi" value="<?=$dulieu['Dia_chi']?>"></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><input type="text" name="email" value="<?=$dulieu['Email']?>"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="luutru" value="Lưu trữ"></td>
        </tr>
    </table>
</form>