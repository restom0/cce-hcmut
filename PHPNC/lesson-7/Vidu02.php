<form action="" method="post">
        <table align="center" width="400" style="background-color:#F5A9E1">
            <tr>
                <th colspan="2" style="color:white;background-color:#FF00BF" align="center">Đọc nội dung thư mục</th>
            </tr>
            <tr>
                <td>Tên Thư mục</td>
                <td>
                    <select name='foldername'>
                        <?php
                            $fd = opendir("..");
                            if ($fd)
                            {
                                while (($fn = readdir($fd)) != false)
                                {
                                    if (strstr($fn,".")==false)
                                    {
                                        echo "<option value='$fn'>$fn</option>";
                                    }
                                }
                                closedir($fd);
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="submit" value="đọc thư mục"></th>
            </tr>
        </table>
    </form>
    <?php
        if (isset($_POST["submit"]))
        {
            $ten_tm = $_POST["foldername"];
            $fd = opendir("../".$ten_tm);
            echo ' <table align="center" width="400" style="background-color:#F5A9E1">';
            echo '<tr><td>';
            while (($fn = readdir($fd)) != false)
            {
                if (($fn != ".") && ($fn != ".."))
                {
                    if (is_file($fn)==false)
                    {
                        echo "<p><img src='../hinh/folder.png'>$fn</p>";
                    }
                    else
                    {
                        echo "<p><img src='../hinh/file.png'>$fn</p>";
                    }
                }
            }
            echo "</td></td></table>";
            closedir($fd);
        }