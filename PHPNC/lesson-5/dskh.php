
<table width="100%" cellspacing="0" cellpadding="5" border="1">
    <caption><h1 align="center">Danh Sách Hãng Sữa</h1></caption>
    <tr>
        <th>Mã Hãng Sữa</th>
        <th>Tên Hãng Sữa</th>
        <th>Địa chỉ</th>
        <th>Điện Thoại</th>
        <th>Email</th>
        <th>Thao tác</th>
    </tr>
<?php
    $sql ="Select * from hang_sua";
    $ketqua = $ketnoi->query($sql);
    if ($ketqua->num_rows > 0)
    {
        while($dulieu = $ketqua->fetch_assoc())
        {
            $ma = $dulieu["Ma_hang_sua"];
            echo "<tr>";
            echo "<td>" . $dulieu["Ma_hang_sua"] . "</td>";
            echo "<td>" . $dulieu["Teng_hang_sua"] . "</td>";
            echo "<td>" . $dulieu["Dia_chi"] . "</td>";
            echo "<td>" . $dulieu["Dien_thoai"] . "</td>";
            echo "<td>" . $dulieu["Email"] . "</td>";
            echo "<td><a href='?thamso=sua&ma=$ma'>Sữa</a> | 
                      <a href='?thamso=xoa&ma=$ma'>Xóa</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    }
    else
    {
        echo "chưa có thông tin sữa";
    }

