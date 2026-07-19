<?php
    $taptin = @fopen("sinhvien.txt" , "r");
    if (! $taptin)
    {
        echo "<h1>chưa có tập tin sinhvien.txt hay sai tên tập tin</h1>";
    }
    else
    {
        echo "<table width='100%' cellspacing='0' cellpadding='5' border='1'>";
        echo "<tr>";
        echo "<th>Mã Sinh Viên</th>";
        echo "<th>Họ Và Tên</th>";
        echo "<th>Ngày Sinh</th>";
        echo "<th>Giới Tính</th>";
        echo "<th>Nơi Sinh</th>";
        echo "</tr>";
        while (! feof($taptin))
        {
            $dong = fgets($taptin);

            if ($dong=="") continue;
            
            $ttsv = explode(",", $dong);
            echo "<tr>";
            foreach($ttsv as $muc)
            {
                echo "<td>$muc</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        fclose($taptin);
    }