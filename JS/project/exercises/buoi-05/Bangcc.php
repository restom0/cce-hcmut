<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bảng Cưu Chương</title>
    <style>
        .bang {border:1px solid green;
               width:50%;
               margin:10px auto;
               border-collapse:collapse;
        }
        .tieude {
            font-size:30px;
            text-align:center;
        }
        .dong { border:1px solid green; padding:10px;text-align:center}
        .ddkq {
            width:50%;
            margin:5px auto;
            font-size:18px;
        }
    </style>
    <script>
        function in_bang_cuu_chuong(x, y)
        {
            x = parseInt(x);
            y = parseInt(y);
            if (isNaN(x) || isNaN(y))
            {
                ketqua.innerHTML = "Phải nhập số nguyên dương !!!";
            }
            else
            {
                kq = "<table cellspacing='20'><tr>";
                for(var i=x; i<=y; i++)
                {
                    kq = kq + "<td>";
                    for(var j=1; j<=9; j++)
                    {
                        kq = kq + i + " x " + j + " = " + (i*j) + "<br>";
                    }
                    kq = kq + "</td>";
                }
                kq = kq + "</tr></table>";
                ketqua.innerHTML = kq; 
            }
        }
    </script>
</head>
<body>
<form>
    <table class="bang">
        <tr>
            <td class="tieude dong">BẢNG CỬU CHƯƠNG</td>
        </tr>
        <tr>
            <td  class="dong">
                Nhập số X <input type="text" name="sox" id="sox" value="" size="4">
                Nhập số Y <input type="text" name="soy" id="soy" value="" size="4">
                <input type="button" name="tinh" id="tinh" value=" In Cửu Chương " onclick="in_bang_cuu_chuong(sox.value, soy.value)">
            </td>
        </tr>
    </table>
    <div id="ketqua" class="ddkq"></div>
</form>
</body>
</html>