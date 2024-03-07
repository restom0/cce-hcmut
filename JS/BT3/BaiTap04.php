<!DOCTYPE html>
<html lang="vi">
<head>
     <title>bài tập 03</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <script>
        function tinhtoan(a , b)
        {
           
            var s1 = parseFloat(a);
            var s2 = parseFloat(b);
            if (isNaN(s1) || isNaN(s2))
            {
               ketqua.innerHTML = "Phải nhập số em ơi !!!";
            }
            else
            {
               if (cong.checked)
                  ketqua.innerHTML = "Tổng 2 số là : " + (s1+s2);

               if (tru.checked)
                  ketqua.innerHTML = "Hiệu 2 số là : " + (s1-s2);

               if (nhan.checked)
                  ketqua.innerHTML = "Tích 2 số là : " + (s1*s2);

                if (chia.checked)
                {
                  if (s2==0)
                    ketqua.innerHTML = "Số thứ 2 phải khác 0";
                  else
                    ketqua.innerHTML = "Thương 2 số là : " + (s1/s2);
                }
            }
        }
     </script>
  
</head>
<body>
    <h2 align="center">MÁY TÍNH TAY</h2>
    <table border="1" cellspacing="0" cellpadding="5" width="400" align="center" bordercolor="green">
        <tr>
            <td>Số Thứ 1: </td>
            <td><input type="text" name="st1" id="st1"></td>
        </tr>
        <tr>
            <td>Số Thứ 2: </td>
            <td><input type="text" name="st2" id="st2"></td>
        </tr>
        <tr>
           <td colspan="2" align="center">
                <fieldset>
                    <legend align="center">Phép Toán</legend>
                    <input type="radio" name="pheptoan" id="cong" value="1" checked> Tổng
                    <input type="radio" name="pheptoan" id="tru" value="2"> Hiệu
                    <input type="radio" name="pheptoan" id="nhan" value="3"> Tích
                    <input type="radio" name="pheptoan" id="chia" value="4"> Thương                  
                </fieldset>
           </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="button" name="tinh" value=" Tính " onclick="tinhtoan(st1.value, st2.value)">
                <input type="button" name="moi" value=" Làm Mới " onclick="">
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