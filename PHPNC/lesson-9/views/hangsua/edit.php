<form action="<?= ROOT_URL ?>/?ctrl=hangsua&act=update" method="post">
    <table style="border:2px groove gray;width:40%; margin:5px auto;" cellpadding="5px">
        <tr>
            <td>Mã Hãng Sữa</td>
            <td><input type="text" name="mahang" value="<?= $row['ma_hang_sua'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Tên Hãng Sữa</td>
            <td><input type="text" name="tenhang" value="<?= $row['ten_hang_sua'] ?>"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi" value="<?= $row['dia_chi'] ?>"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai" value="<?= $row['dien_thoai'] ?>"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" name="luutru" value=" Cập Nhật "></td>
        </tr>
    </table>
</form>