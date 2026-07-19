
<table width="100%" cellspacing="0" cellpadding="5" border="1">
    <caption><h1 align="center">Danh Sách Hãng Sữa</h1></caption>
    <tr>
        <th>Tên Hãng Sữa</th>
        <th>Địa chỉ</th>
        <th>Điện Thoại</th>
    </tr>
<?php
    $sql ="Select Teng_hang_sua, Dia_chi, Dien_thoai from hang_sua";
    $ketqua = $ketnoi->query($sql);
    if ($ketqua->num_rows > 0)
    {
        while($dulieu = $ketqua->fetch_assoc())
        {
            echo "<tr>";
            echo "<td>" . $dulieu["Teng_hang_sua"] . "</td>";
            echo "<td>" . $dulieu["Dia_chi"] . "</td>";
            echo "<td>" . $dulieu["Dien_thoai"] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "chưa có thông tin hãng sữa";
    }

