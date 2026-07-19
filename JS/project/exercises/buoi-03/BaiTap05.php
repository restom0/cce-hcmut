<!DOCTYPE html>
<html lang="vi">
<head>
     <title>bài tập 03</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <script>
       function xetTamGiac(a, b, c)
       {
          var a = parseFloat(a);
          var b = parseFloat(b);
          var c = parseFloat(c);
          if (isNaN(a) || isNaN(b) || isNaN(c))
          {
              ketqua.innerHTML = " Phải nhập số em ơi !!!";
          }
          else
          {
              if (a>0 && b>0 && c>0)
              {
                  if ((a+c>b) && (a+b>c) && (b+c)>a)
                  {
                     if (a==b && b==c)
                     {
                        ketqua.innerHTML = "Tam Giác Đều";
                     }
                     else if ( (a==b) || (b==c) || (a==c))
                     {
                        if ((a*a+b*b==c*c) || (b*b+c*c==a*a) || (a*a+c*c==b*b))
                        {
                            ketqua.innerHTML = "Tam giác Vuông Cân";
                        }
                        else
                        {
                            ketqua.innerHTML = "Tam giác Cân";
                        }
                     }
                     else
                     {
                        if ((a*a+b*b==c*c) || (b*b+c*c==a*a) || (a*a+c*c==b*b))
                        {
                            ketqua.innerHTML = "Tam giác Vuông";
                        }
                        else
                        {
                            ketqua.innerHTML = "Tam giác thường";
                        }
                     }
                  }
                  else
                  {
                     ketqua.innerHTML = " Ba Cạnh này không hợp thành tam giác !!!";
                  }
              }
              else
              {
                 ketqua.innerHTML = " Phải nhập số dương nhé em !!!";
              }
              
          }
       }

       function LamMoi()
       {
          ca.value = null;
          cb.value = null;
          cc.value = null;
          ketqua.innerHTML = "Kết Quả ???";
          ca.focus();
       }
     </script>
  
</head>
<body>
    <h2 align="center">Nhận Dạng Tam Giác</h2>
    <table border="1" cellspacing="0" cellpadding="5" width="400" align="center" bordercolor="green">
        <tr>
            <td>Cạnh A: </td>
            <td><input type="text" name="ca" id="ca"></td>
        </tr>
        <tr>
            <td>Cạnh B:</td>
            <td><input type="text" name="cb" id="cb"></td>
        </tr>
        <tr>
            <td>Cạnh C:</td>
            <td><input type="text" name="cc" id="cc"></td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <div id="ketqua" style="color:red">Kết Quả ??? </div>
            </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="button" name="tinh" value=" Xét Tam Giác " onclick="xetTamGiac(ca.value, cb.value, cc.value)">
                <input type="button" name="moi" value=" Làm Mới " onclick="LamMoi()">
            </td>
        </tr>
    </table>   
 
</body>
</html>