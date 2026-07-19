<?php
    //Tính tổng số mẫu tin
    $sql = "Select * from Sua";
    $ketqua = $ketnoi->query($sql);
    $tong_mautin = $ketqua->num_rows;
    //xác định giới hạn (số mẫu tin 1 trang), trang hiện hành
    $gioihan = 4;
    $trang_hh = isset($_GET["trang"])? $_GET["trang"] : 1;
    // Tính tổng số trang
    $tong_sotrang = ceil($tong_mautin / $gioihan);
    if ($trang_hh > $tong_sotrang)
    {
        $trang_hh = $tong_sotrang;
    }
    elseif($trang_hh < 1)
    {
        $trang_hh = 1;
    }
    //Tính số thứ tự bắt đầu để hiển thị
    $batdau = ($trang_hh - 1) * $gioihan;
?>
<div style="min-height:300px">
<table width="100%" border="1" cellspacing="0" cellpadding="5">
    <caption><h1>Danh Sách Sữa</h1></caption>
    <tr>
        <th>Mã Sữa</th>
        <th>Tên Sữa</th>
        <th>Trọng Lượng</th>
        <th>Đơn Giá</th>
    </tr>
<?php
    $sql = "SELECT Ma_sua, Ten_sua, Trong_luong, Don_gia from sua limit $batdau, $gioihan";
    $ketqua = $ketnoi->query($sql);
    while ($dong = $ketqua->fetch_assoc())
    {
        echo "<tr>";
        echo "<td>" . $dong["Ma_sua"] . "</td>";
        echo "<td>" . $dong["Ten_sua"] . "</td>";
        echo "<td>" . $dong["Trong_luong"] . "</td>";
        echo "<td>" . $dong["Don_gia"] . "</td>";
        echo "</tr>";
    }
?>
</table>
</div>
<!-- Hiển số thứ tự phân trang -->
<div style="text-align:center">
<?php
    if ($trang_hh > 1 && $tong_sotrang >1)
    {
        echo "<a href='?thamso=pt&trang=".($trang_hh-1)."' class='page-item'><</a>";
    }
    for($i=1; $i <= $tong_sotrang; $i++)
    {
        if ($i==$trang_hh)
        {
            echo "<span class='page-item' style='background-color:darkblue'>$i</span>"; 
        }
        else
        {
            echo "<a href='?thamso=pt&trang=$i' class='page-item'>$i</a>";
        }
    }
    if ($trang_hh < $tong_sotrang && $tong_sotrang >1)
    {
        echo "<a href='?thamso=pt&trang=".($trang_hh+1)."' class='page-item'>></a>";
    }
?>
</div>