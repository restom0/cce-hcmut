<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bài Tâp 04</title>
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
    </style>
    <script>
        function xetso(s1, s2) {
            var s1 = parseInt(s1);
            var s2 = parseInt(s2);
            var kq = "";
            for (var i = s1; i <= s2; i++) {
                if ((i % 5 == 0) && (i % 7 == 0)) {
                    kq = kq + i;
                    break;
                }
            }
            kq = "Số đầu tiên từ " + s1 + " đến " + s2 + " chia hết cho 5 và 7 là " + kq;
            ketqua.innerHTML = kq;
        }
    </script>
</head>

<body>
    <table class="ddbang">
        <caption>Tìm các Số Chia Hết cho 5 và 7</caprion>
        <tr>
            <td>
                Nhập từ số
                <input style="display: inline;" type="text" name="so1" id="so1" value="">
                đến số
                <input style="display: inline;" type="text" name="so2" id="so2" value="">
            </td>
            <td>

                <input type="button" name="tinh" value="In" onClick="xetso(so1.value,so2.value)">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div id="ketqua"></div>
            </td>
        </tr>
    </table>

</body>

</html>