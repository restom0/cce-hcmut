<!DOCTYPE html>
<html lang="vi">
<head>
     <title>bài tập 03</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <script>
        function tienthuong(a , b)
        {
           var tl = parseInt(a);
           if (isNaN(tl))
           {
                ketqua.innerHTML = "Phải nhập số nguyên dương !!!";
           }
           else
           {
               switch(b)
               {
                  case "A": ketqua.innerHTML = "Tiền thưởng là " + (tl * 2); break;
                  case "B": ketqua.innerHTML = "Tiền thưởng là " + (tl * 1.8); break;
                  case "C": ketqua.innerHTML = "Tiền thưởng là " + (tl * 1.2); break;
                  case "D": ketqua.innerHTML = "Tiền thưởng là " + (tl * 0.8); break;
               }
           }
        }
     </script>
  
</head>
<body>
    <h2 align="center">Tính Tiền Thưởng Cuối Năm</h2>
    <table border="1" cellspacing="0" cellpadding="5" width="400" align="center" bordercolor="green">
        <tr>
            <td>Tiền Lương</td>
            <td><input type="text" name="tienluong" id="tienluong"></td>
        </tr>
        <tr>
            <td>Xếp Loại</td>
            <td>
                <select name="xeploai" id="xeploai">
                    <option value="A">Loại A</option>
                    <option value="B">Loại B</option>
                    <option value="C">Loại C</option>
                    <option value="D">Loại D</option>
                </select>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="button" name="tinh" value=" Tính " onclick="tienthuong(tienluong.value, xeploai.value)">
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <div id="ketqua" style="color:red">Kết Quả ??? </div>
            </td>
        </tr>
    </table>   
 
</body>
</html>