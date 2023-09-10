<?php
    if (isset($_POST["hienthi"]))
    {
        $foldername = $_POST["foldername"];
        $size = $_POST["size"];
    }
    else
    {
        $size="50";
        $foldername="dalat";
    }
?>
<form action="" method="post">
    <table align="center" width="600" style="background-color:#F5A9E1">
        <tr>
            <th colspan="2" style="color:white;background-color:#FF00BF" align="center">XEM THƯ MỤC HÌNH ẢNHc</th>
        </tr>
        <tr>
            <td>Chọn thư mục hình:</td>
            <td>
                <select name="foldername">
                <?php
                    $tm = opendir("../TestFolder");
                    while($fn = readdir($tm))
                    {
                        if ($fn != "."  && $fn != "..")
                        {
                            if(is_file($fn)==false)
                            {
                                if ($foldername==$fn)
                                    echo "<option value='$fn' selected>$fn</option>";
                                else
                                    echo "<option value='$fn'>$fn</option>";
                            }
                        }
                    }
                    
                ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Kích cỡ hiển thị:</td>
            <td>
                <select name="size">
                    <option value="50"<?=($size==50)?"selected":null?>>50 x 50</option>
                    <option value="100" <?=($size==100)?"selected":null?>>100 x 100</option>
                    <option value="150" <?=($size==150)?"selected":null?>>150 x 150</option>
                    <option value="200" <?=($size==200)?"selected":null?>>200 x 200</option>
                </select>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" name="hienthi" value=" Xem Hình Ảnh ">
            </td>
        </tr>
    </table>
</form>
<div style="width:600px; margin:10px auto;">
<?php
    if (isset($foldername))
    {
        $fd  = opendir("../TestFolder/".$foldername);
        while ($fn = readdir($fd))
        {
            if ($fn !="." && $fn != "..")
            {
                echo "<span style='margin-right:10px'>";
                echo "<img src='../TestFolder/$foldername/$fn' width='$size' height='$size'>";
                echo "</span>";
            }
            
        }
    }
?>
</div>