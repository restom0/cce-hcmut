<?php
    if (isset($_POST["kiemtra"]))
    {
        $ten_file = $_POST["name"];
    }
?>
<form action="" method="post">
    <table align="center" width="300" style="background-color:#F5A9E1">
        <tr>
            <th colspan="2" style="color:white;background-color:#FF00BF" align="center">
                KIỂM TRA FILE SIZE
            </th>
        </tr>
        <tr>
            <td>Tên file</td>
            <td><input type="text" name="name" value="<?=$ten_file??null;?>"></td>
        </tr>
        <tr>
            <th colspan="2"><input type="submit" name="kiemtra" value="Kiểm Tra"></th>
        </tr>
    </table>
</form>
<?php
    if (isset($ten_file))
    {
        if (file_exists($ten_file))
        {
            $size = filesize($ten_file);
            echo "<div style='text-align:center'>Kích cỡ của file <b>$ten_file</b> là $size bytes</div>";
        }
        else
        {
            echo "<div style='text-align:center'>Đường dẫn sai hoặc không có tập tin này !!!";
        }
    }