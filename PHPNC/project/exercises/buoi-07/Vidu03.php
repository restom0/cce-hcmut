<table align="center" width="600" style="background-color:#F5A9E1">
    <tr>
        <th width="300">CÁC TẬP TIN VÀ THƯ MỤC TRONG THƯ MỤC HIỆN HÀNH</th>
        <th width="300">ĐỌC THƯ MỤC ĐƯỢC CHỌN</th>
    </tr>
    <tr>
        <td valign="top">
            <?php
             
             $fd = opendir("..");
             if ($fd)
             {
                 while (($fn = readdir($fd)) != false)
                 {
                     if ($fn != "." && $fn != "..")
                     {
                         if (is_file($fn))
                         {
                            echo "<p><img src='../hinh/file.png'> $fn</p>";
                         }
                         else
                         {
                            echo "<p><img src='../hinh/folder.png'><a href='?thamso=fd2&folder=$fn'> $fn</a></p>";
                         }
                     }
                 }
                 closedir($fd);
             }
            ?>
        </td>
        <td>
            <?php
                if (isset($_GET["folder"]))
                {
                    $tm = $_GET["folder"];
                    $fd = opendir("../".$tm);
                    echo "<h3>$tm</h3>";
                    while ($fn = readdir($fd))
                    {
                        if ($fn != "." && $fn != "..")
                        {
                            if (is_file($fn))
                            {
                            echo "<blockquote><img src='../hinh/file.png'> $fn</blockquote>";
                            }
                            else
                            {
                            echo "<blockquote><img src='../hinh/folder.png'>$fn</blockquote>";
                            }
                        }
                    }
                }
            ?>
        </td>
    </tr>
</table>