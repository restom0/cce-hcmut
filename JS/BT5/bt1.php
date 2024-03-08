<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reverse String</title>
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
</head>

<body>
    <table class="ddbang">
        <caption>Đảo chuỗi</caprion>
        <tr>
            <td>Nhập 1 chuỗi</td>
            <td>
                <input type="text" id="inputString">
                <button onclick="reverseString()">Thực hiện</button>
            </td>
        </tr>
        <tr>
            <td>Chuỗi đảo</td>
            <td>
                <p id="outputString"></p>
            </td>
        </tr>
    </table>
    <script>
        function reverseString() {
            const inputString = document.getElementById('inputString').value;
            const outputString = document.getElementById('outputString');
            outputString.textContent = inputString.split('').reverse().join('');
        }
    </script>
</body>

</html>