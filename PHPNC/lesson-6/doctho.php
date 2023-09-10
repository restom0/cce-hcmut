<?php
    $taptin = fopen("tho.txt", "r");
    if (! $taptin)
    {
        echo "đường dẫn sai hoặc không có tập tin này";
    }
    else
    {
        echo "<div style='font-size:20px;line-height:30px'>";
        while (! feof($taptin))
        {
            $noidung = fgets($taptin);
            echo nl2br($noidung);
        }
        echo "</div>";
        fclose($taptin);
    }