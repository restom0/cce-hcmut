<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bài Tâp 01</title>
    <style>
        .ddbang, td {
            border:1px solid #003300; 
            border-collapse:collapse;
            width:400px;
            margin:10px auto;
            padding:5px;
            background-color:#00ff00;
        }
    </style>
    <script>
        function xetketqua(d)
        {
            var a = parseFloat(d);
            if (isNaN(a))
            {
                kq.value = "Phải nhập số em ơi !!!";
                dtb.focus();
            }
            else
            {
               if (a < 5)
               {
                  kq.value = "Ở Lại Lớp !!!";
               } 
               else
               {
                  kq.value= "Được lên lớp";
               }
            }
        }
    </script>
</head>
<body>
    <table class="ddbang">
        <caption>Kết Quả Cuối năm học</caprion>
        <tr>
            <td>Điểm Trung Bình</td>
            <td><input type="text" name="dtb" id="dtb" value=""></td>
        </tr>
        <tr>
            <td>Kết Quả</td>
            <td><input type="text" name="kq" id="kq" value="" readonly></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="button" name="tinh" value="Xuất Kết Quả" 
                       onClick="xetketqua(dtb.value)">
            </td>
        </tr>
    </table>
</body>
</html>