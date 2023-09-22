<form action="<?= ROOT_URL ?>/?ctrl=khachhang&act=update" method="post">
    <table style="border:2px groove gray;width:40%; margin:5px auto;" cellpadding="5px">
        <tr>
            <td>Mã Khách hàng</td>
            <td><input type="text" name="mahang" value="<?= $row['id'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Tên Khách hàng</td>
            <td><input type="text" name="tenhang" value="<?= $row['ho_ten'] ?>"></td>
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