<form action="<?= ROOT_URL ?>/?ctrl=khachhang&act=store" method="post">
    <table style="border:2px groove gray;width:40%; margin:5px auto;" cellpadding="5px">
        <tr>
            <td>Tên Khách hàng</td>
            <td><input type="text" name="tenhang" value=""></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi" value=""></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai" value=""></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value=""></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" name="luutru" value=" Lưu Trữ "></td>
        </tr>

    </table>
</form>