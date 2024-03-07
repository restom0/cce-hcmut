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
        .canhgiua {
            width:100px;
            margin:0px auto;
        }
    </style>
    <script>
        function inCuuChuong(a)
        {
            var a = parseInt(a);
            var kq = "";
            for(var i=1; i<=10; i++)
            {
                if (i<10)
                    kq = kq + a + " x &nbsp;&nbsp;" + i + " = " + (a*i) + "<br>";
                else
                    kq = kq + a + " x " + i + " = " + (a*i) + "<br>";
            }
            ketqua.innerHTML = kq;
        }
    </script>
</head>
<body>
    <table class="ddbang">
        <caption>In Bảng Cửu Chương</caprion>
        <tr>
            <td>Nhập Cửu Chương</td>
            <td>
                <input type="text" name="cc" id="cc" value="">
                <input type="button" name="tinh" value="In" onClick="inCuuChuong(cc.value)">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="ketqua" class="canhgiua"></div>
            </td>
        </tr>
    </table>
   
</body>
</html>