<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bài Tâp 02</title>
    <style>
        .ddbang, td {
            border:1px solid #003300; 
            border-collapse:collapse;
            width:450px;
            margin:10px auto;
            padding:5px;
            background-color:#00ff00;
        }
        #xl {
            color:red;
            font-weight:bold; 
        }
    </style>
    <script>
        function xetxeploai(k1, k2)
        {
            var k1 = parseFloat(k1);
            var k2 = parseFloat(k2);
           
            if (isNaN(k1) || isNaN(k2))
            {
                xl.innerHTML = "Phải nhập số em ơi !!!";
                hk1.focus();
            }
            else
            {
               if ((k1 < 0 || k1>10) || (k2<0 || k2>10))
               {
                  xl.innerHTML = "Chỉ nhập số trong khoảng 0 - 10";
               }
               else
               {
                    var cn = (k1 + k2*2)/3;
                    canam.value= cn;
                    if (cn <=10 && cn>=9)
                    {
                        xl.innerHTML = "Giỏi";
                    }
                    else if (cn <9 && cn>=7)
                    {
                        xl.innerHTML = "Khá";
                    }
                    else if (cn <7 && cn>=5)
                    {
                        xl.innerHTML = "Trung Bình";
                    }
                    else if (cn<5)
                    {
                        xl.innerHTML = "Yếu";
                    }
                }
            }
        }
    </script>
</head>
<body>
    <table class="ddbang">
        <caption>Xếp Loại cuối năm học</caprion>
        <tr>
            <td>Điểm Trung Bình HKI</td>
            <td><input type="text" name="hk1" id="hk1" value=""></td>
        </tr>
        <tr>
            <td>Điểm Trung Bình HKII</td>
            <td><input type="text" name="hk2" id="hk2" value=""></td>
        </tr>
        <tr>
            <td>Điểm Trung Bình cả năm</td>
            <td><input type="text" name="canam" id="canam" value=""></td>
        </tr>
        <tr>
            <td>Xếp loại</td>
            <td><div id="xl"></div></td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="button" name="tinh" value="Xuất Xếp Loại" 
                       onClick="xetxeploai(hk1.value, hk2.value)">
            </td>
        </tr>
    </table>
</body>
</html>