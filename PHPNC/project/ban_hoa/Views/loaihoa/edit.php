<form action="<?= ROOT_URL ?>/?ctrl=loaihoa&act=update" method="post">
    <table style="border:2px groove gray;width:40%; margin:5px auto;" cellpadding="5px">
        <tr>
            <td>Mã Loại</td>
            <td><input type="text" name="mahang" value="<?= $row['id'] ?>" readonly></td>
        </tr>
        <tr>
            <td>Tên Loại</td>
            <td><input type="text" name="tenhang" value="<?= $row['ten_loai'] ?>"></td>
        </tr>
        <tr align="center">
            <td colspan="2"><input type="submit" name="luutru" value=" Cập Nhật "></td>
        </tr>
    </table>
</form>