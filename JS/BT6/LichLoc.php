<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xem Lịch</title>
    <script>
          function lay_tenthu(d)
          {
            var thu="";
            switch(d.getDay())
            {
                case 0: thu = "Chủ Nhật"; break;
                case 1: thu = "Thứ Hai";  break;
                case 2: thu = "Thứ Ba"; break;
                case 3: thu = "Thứ Tư";   break;
                case 4: thu = "Thứ Năm";  break;
                case 5: thu = "Thứ Sáu";  break;
                case 6: thu = "Thứ Bảy";  break;
            }
            return thu;
          }

         function in_lich(pg, pt, pn)
         {
            var vngay = new Date(pn, pt, pg);
            nam.innerHTML = pn;
            thang.innerHTML = "Tháng " + (parseInt(pt)+1);
            ngay.innerHTML = pg;
            thu.innerHTML = lay_tenthu(vngay);
         }

        function khoi_tao(f)
        {
            ngayhh = new Date();
            if (f==1) in_lich(ngayhh.getDate(), ngayhh.getMonth(), ngayhh.getFullYear());
            giohh = ngayhh.getHours();
            if (giohh<12)
                chao.innerHTML = "Chào buổi sáng";
            else if (giohh < 17)
                chao.innerHTML = "Chào buổi chiều";
            else if (giohh < 23)
                chao.innerHTML = "Chào buổi tối"           
        }

        function lich_moi(pg, pt, pn)
        {
            if ( isNaN(pg) || isNaN(pt) || isNaN(pn))
            {
                chao.innerHTML = "Giá trị ngày/tháng/năm không hợp lệ";
            }
            else
            {
                if ((pg>=1 && pg<=31) && (pt>=1 && pt<12) && (pn<=9999))
                {
                    pt=pt+1;
                    switch(pt)
                    {
                        case 1: case 3: case 5: case 7: case 8: case 10: case 12:
                            if (pg>=1 && pg<=31)
                            {
                                pt=pt-1;
                                in_lich(pg, pt, pn);
                                khoi_tao(0);
                            }
                            else
                                chao.innerHTML = "Giá trị ngày/tháng/năm không hợp lệ";
                            break;
                        case 4: case 6: case 9: case 11:
                            if (pg>=1 && pg<=30)
                            {
                                pt=pt-1;
                                in_lich(pg, pt, pn);
                                khoi_tao(0);
                            }
                            else
                                chao.innerHTML = "Giá trị ngày/tháng/năm không hợp lệ";
                            break;
                        case 2:
                            if (((pn % 4 == 0) && (pn % 100 != 0)) || (pn % 400==0) )
                            {
                                if (pg>=1 && pg<=29)
                                {
                                    pt=pt-1;
                                    in_lich(pg, pt, pn);
                                    khoi_tao(0);
                                }
                                else
                                    chao.innerHTML = "Giá trị ngày/tháng/năm không hợp lệ";
                            }
                            else
                            {
                                if (pg>=1 && pg<=28)
                                {
                                    pt=pt-1;
                                    in_lich(pg, pt, pn);
                                    khoi_tao(0);
                                }
                                else
                                    chao.innerHTML = "Giá trị ngày/tháng/năm không hợp lệ";
                            }

                    }
                    
                   
                }
                else
                {
                    chao.innerHTML = "Giá trị ngày/tháng/năm không hợp lệ";
                }
            }
        }
    </script>
</head>
<body onload="khoi_tao(1)">
    <table align="center" border="5" bordercolor="#CCCCCC" cellspacing="5" cellpadding="5" width="120">
        <tr>
            <td align="center">
                <div id="nam" style="font-size:14px; color:#ff0000"></div>
                <div id="thang" style="font-size:20px; color:#330066"></div>
                <div id="ngay" style="font-size:60px; color:#ff0000"></div>
                <div id="thu" style="font-size:22px; color:#330066"></div>
            </td>
        </tr>
    </table>
    <div id="chao" style="font-size:30px; color:red; text-align:center;margin:10px 0px;"></div>
    <form>
        <table border="1" bordercolor="#330099" cellspacing="0" cellpadding="10" align="center" width="400">
            <tr align="center">
                <td>
                    Ngày: <input type="text" id="ng" size="2">
                    Tháng: <input type="text" id="th" size="2">
                    Năm: <input type="text" id="nm" size="2">
                </td>
            </tr>
            <tr>
                <td align="center">
                    <input type="button" name="nut" value="In Lịch" onclick="lich_moi(parseInt(ng.value), parseInt(th.value)-1, parseInt(nm.value));">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>