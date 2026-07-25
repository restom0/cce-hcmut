<form action="<?= ROOT_URL ?>/?ctrl=hangsua&act=update" method="post">
    <table style="border:2px groove gray;width:40%; margin:5px auto;" cellpadding="5px">
        <caption style="position:absolute;left:-9999px;">Cap nhat hang sua</caption>
        <tr>
            <th scope="col">Thong tin</th>
            <th scope="col">Gia tri</th>
        </tr>
        <tr>
            <td><label for="mahang">Mã Hãng Sữa</label></td>
            <td><input type="text" id="mahang" name="mahang" value="<?= $row['ma_hang_sua'] ?>" readonly></td>
        </tr>
        <tr>
            <td><label for="tenhang">Tên Hãng Sữa</label></td>
            <td><input type="text" id="tenhang" name="tenhang" value="<?= $row['ten_hang_sua'] ?>"></td>
        </tr>
        <tr>
            <td><label for="diachi">Địa chỉ</label></td>
            <td><input type="text" id="diachi" name="diachi" value="<?= $row['dia_chi'] ?>"></td>
        </tr>
        <tr>
            <td><label for="dienthoai">Điện thoại</label></td>
            <td><input type="text" id="dienthoai" name="dienthoai" value="<?= $row['dien_thoai'] ?>"></td>
        </tr>
        <tr>
            <td><label for="email">Email</label></td>
            <td><input type="text" id="email" name="email" value="<?= $row['email'] ?>"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><button type="submit" name="luutru">Cập Nhật</button></td>
        </tr>

    </table>
</form>
