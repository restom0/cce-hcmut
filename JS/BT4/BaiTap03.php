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
            background-color:#F3F781;
        }
     
    </style>
    <script>
        function xetso(s)
        {
            var s = parseInt(s);
            var kq="";
            for(var i=1; i<=s; i++)
            {
                if ((i % 6==0) && (i % 9 ==0))
                    kq = kq + i + ", ";
            }
            kq = "các số từ 1 đến " + s + " chia hết cho 6 và 9 là: " + kq;
            ketqua.innerHTML = kq;   
        }
    </script>
</head>
<body>
    <table class="ddbang">
        <caption>Tìm các Số Chia Hết cho 6 và 9</caprion>
        <tr>
            <td>Nhập Một Số</td>
            <td>
                <input type="text" name="so" id="so" value="">
                <input type="button" name="tinh" value="In" onClick="xetso(so.value)">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="ketqua"></div>
            </td>
        </tr>
    </table>
   
</body>
</html>