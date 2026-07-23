
<form action="<?= ROOT_URL ?>/?ctrl=hangsua&act=store" method="post">
    <table role="presentation" style="border:2px groove gray;width:40%; margin:5px auto;" cellpadding="5px">
        <tr>
            <td>Mã Hãng Sữa</td>
            <td><input type="text" name="mahang" value="" aria-label="Ma hang sua"></td>
        </tr>
        <tr>
            <td>Tên Hãng Sữa</td>
            <td><input type="text" name="tenhang" value="" aria-label="Ten hang sua"></td>
        </tr>
        <tr>
            <td>Địa chỉ</td>
            <td><input type="text" name="diachi" value="" aria-label="Dia chi"></td>
        </tr>
        <tr>
            <td>Điện thoại</td>
            <td><input type="text" name="dienthoai" value="" aria-label="Dien thoai"></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" value="" aria-label="Email"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><button type="submit" name="luutru">Lưu Trữ</button></td>
        </tr>

    </table>
</form>
