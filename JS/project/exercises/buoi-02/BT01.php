<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài Tập 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .ddbang {border:1px solid #990000; 
                 border-collapse:collapse;
                background-color: #98FB98;
            }
        td {border:1px solid #990000;}
        .ddkq {font-size:15px; color:red}
    </style>
    <script>
       function TongTichHieu()
       {
          var s1 = parseFloat(st1.value);
          var s2 = parseFloat(st2.value);
          if (isNaN(s1) || isNaN(s2))
          {
              ketqua.innerHTML = "Phải nhập số em ơi!!!";
          }
          else
          {
              kq = "Tổng 2 số là : " + (s1+s2) + "<br>";
              kq = kq + "Hiệu 2 số là : " + (s1-s2) + "<br>";
              kq = kq + "Tích 2 số là : " + (s1*s2);  
              ketqua.innerHTML = kq;
          }
       }

       function LamMoi()
       {
          st1.value='';
          st2.value="";
          ketqua.innerHTML="";
          st1.focus();
       }
    </script>
</head>
<body>
    <form>
        <h1 align="center">Tính Tổng - Tích _ Hiệu</h1>
        <table align="center" border="1" class="ddbang" cellspacing="0" cellpadding="10" width="500">
            <tr>
                <td>Số Thứ Nhất :</td>
                <td><input type="text" name="st1" id="st1" value=""/></td>
            </tr>
            <tr>
                <td>Số Thứ Hai :</td>
                <td><input type="text" name="st2" id="st2" value=""/></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" name="tinh" value=" Tính " onclick="TongTichHieu();">
                    <input type="button" name="moi" value=" Làm Mới " onclick="LamMoi();">
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <div id="ketqua" class="ddkq"></div>
                </td>
            </tr>
        </table>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>