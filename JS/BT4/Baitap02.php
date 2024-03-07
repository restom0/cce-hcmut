<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài Tập 02</title>
    <style>
        .ddbang,
        td {
            border: 1px solid #003300;
            border-collapse: collapse;
            width: 400px;
            margin: 10px auto;
            padding: 5px;
            background-color: #F3F781;
        }

        .canhgiua {
            width: 100px;
            margin: 0px auto;
        }
    </style>
    <script>
        function inCuuChuong(x, y) {
            var startX = parseInt(x);
            var endX = parseInt(y);
            var kq = "";

            for (var i = startX; i <= endX; i++) {
                kq += "<strong>Bảng cửu chương " + i + "</strong><br>";
                for (var j = 1; j <= 10; j++) {
                    kq += i + " x " + j + " = " + (i * j) + "<br>";
                }
                kq += "<br>";
            }

            ketqua.innerHTML = kq;
        }
    </script>
</head>

<body>
    <table class="ddbang">
        <caption>In Bảng Cửu Chương</caption>
        <tr>
            <td>Nhập số thứ X</td>
            <td><input type="text" name="x" id="x" value=""></td>
        </tr>
        <tr>
            <td>Nhập số thứ Y</td>
            <td><input type="text" name="y" id="y" value=""></td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="button" name="tinh" value="In" onClick="inCuuChuong(x.value, y.value)">
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