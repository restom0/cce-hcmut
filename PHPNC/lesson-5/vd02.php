
<table width="100%" cellspacing="0" cellpadding="5" border="1">
    <caption><h1 align="center">Danh Sách Sữa</h1></caption>
    <tr>
        <th>Tên Sữa</th>
        <th>Trọng Lượng</th>
        <th>Đơn Giá</th>
    </tr>
<?php
    $sql ="Select Ten_sua, Trong_luong, Don_gia from sua";
    $ketqua = $ketnoi->query($sql);
    if ($ketqua->num_rows > 0)
    {
        while($dulieu = $ketqua->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $dulieu["Ten_sua"] . "</td>";
            echo "<td>" . $dulieu["Trong_luong"] . "</td>";
            echo "<td>" . $dulieu["Don_gia"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "chưa có thông tin sữa";
    }

