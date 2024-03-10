<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chu Vi - Diện Tích</title>
</head>
<body>
    <table align="center" width="400" cellspacing="0" cellpadding="5" border="1">
        <tr>
            <td>Chiều Dài: </td>
            <td><input type="text" name="cd" id="cd" value=""></td>
        </tr>
        <tr>
            <td>Chiều Rộng </td>
            <td><input type="text" name="cr" id="cr" value=""></td>
        </tr>
        <tr>
            <th colspan="2"><div id="ketqua"></th>
        </tr>
        <tr>
            <th colspan="2"><input type="button" name="tinh" id="nuttinh" value=" Tính "></th>
        </tr>
    </table>
    <script src="Js/jquery-3.7.1.min.js"></script>
    <script>
        $(document).ready(function(){
            $("#nuttinh").click(function(){

                var chieudai = parseInt($("#cd").val());
                var chieurong = parseInt($("#cr").val());
                if (isNaN(chieudai) || isNaN(chieurong))
                {
                    $("#ketqua").html("du lieu nhap khong jhop le !!1");
                }
                else
                {
                    var chuvi = (chieudai+chieurong)*2;
                    var dientich = chieudai*chieurong;
                    var kq = "chu vi=" + chuvi + " - dien tich=" + dientich;
                    $("#ketqua").html(kq);
                }
                
            });
        });
    </script>
</body>
</html>