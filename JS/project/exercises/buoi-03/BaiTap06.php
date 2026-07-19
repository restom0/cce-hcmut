<!DOCTYPE html>
<html lang="vi">
<head>
     <title>bài tập 03</title>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     
     <script>
        function tinh(ndl)
        {
           var ndl = parseInt(ndl);

           if (isNaN(ndl))
           {
                alert("phải nhập số nguyên dương em ơi !!!");
           }
           else
           {
              var can = ndl % 10;
              var chi = ndl % 12;
              var kq="";
              switch(can)
              {
                  case 0: kq="Canh "; break;
                  case 1: kq="Tân "; break;                  
                  case 2: kq="Nhâm "; break;                  
                  case 3: kq="Quý "; break;                  
                  case 4: kq="Giáp "; break;                  
                  case 5: kq="Ất "; break;                  
                  case 6: kq="Bính "; break;                  
                  case 7: kq="Đinh "; break;                  
                  case 8: kq="Mậu "; break;                  
                  case 9: kq="Kỷ "; break;                  
              }
              switch(chi)
              {
                  case 0: kq+="Thân"; hinh.src="../Hinh/than.jfif"; break;
                  case 1: kq+="Dậu"; hinh.src="../Hinh/dau.jfif"; break;                  
                  case 2: kq+="Tuất"; hinh.src="../Hinh/tuat.jfif";break;                  
                  case 3: kq+="Hợi"; hinh.src="../Hinh/hoi.jfif";break;                  
                  case 4: kq+="Tý"; hinh.src="../Hinh/ty.jfif"; break;                  
                  case 5: kq+="Sửu"; hinh.src="../Hinh/suu.jfif";break;                  
                  case 6: kq+="Dần"; hinh.src="../Hinh/dan.jfif";break;                  
                  case 7: kq+="Mẹo"; hinh.src="../Hinh/meo.jfif";break;                  
                  case 8: kq+="Thìn"; hinh.src="../Hinh/thin.jfif";break;                  
                  case 9:kq+="Tỵ "; hinh.src="../Hinh/ti.jfif";break;                  
                  case 10:kq+="Ngọ"; hinh.src="../Hinh/ngo.jfif";break;   
                  case 11:kq+="Mùi"; hinh.src="../Hinh/mui.jfif";break;                  
              }
              al.value = kq;
           }
            
        }
     </script>
  
</head>
<body>
    <h2 align="center">TÍNH NĂM ÂM LỊCH</h2>
    <table border="1" cellspacing="0" cellpadding="5" width="500" align="center" bordercolor="green">
        <tr>
            <td>NĂM DƯƠNG LỊCH </td>
            <td><input type="text" name="dl" id="dl"></td>
        </tr>
        <tr>
            <td>NĂM ÂM LỊCH</td>
            <td><input type="text" name="al" id="al" readonly></td>
        </tr>
        <tr>
           <td colspan="2" align="center">
              <img src="../Hinh/Congiap.webp" id="hinh" alt="con giáp" width="60%" height="200">
           </td>
        </tr>
        <tr>
            <td align="center" colspan="2">
                <input type="button" name="tinh" value=" Tính " onclick="tinh(dl.value)">
                <input type="button" name="moi" value=" Làm Mới " onclick="location='/Buoi03/BaiTap06.php'">
            </td>
        </tr>
    </table>   
 
</body>
</html>