<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phân tích Chuỗi</title>
    <style>
        th {
            text-align: left;
        }

        .ddbang,
        td,
        th,
        tr {
            border: 1px solid #003300;
            border-collapse: collapse;
            width: 400px;
            margin: 10px auto;
            padding: 5px;
            background-color: #F3F781;
        }
    </style>
</head>

<body>
    <h1>Phân tích Chuỗi</h1>
    <table class="ddbang">
        <tr>
            <th>Nhập họ và tên</th>
            <td><input type="text" id="nameInput"><button onclick="analyzeName()">Phân tích</button></td>
        </tr>
        <tr>
            <th>Họ</th>
            <td id="lastNameOutput"></td>
        </tr>
        <tr>
            <th>Tên lót</th>
            <td id="middleNameOutput"></td>
        </tr>
        <tr>
            <th>Tên</th>
            <td id="firstNameOutput"></td>
        </tr>
    </table>
    <script>
        function analyzeName() {
            const fullName = document.getElementById('nameInput').value;
            const nameParts = fullName.split(' ');

            document.getElementById('lastNameOutput').textContent = nameParts[0];
            document.getElementById('middleNameOutput').textContent = nameParts.slice(1, -1).join(' ');

            document.getElementById('firstNameOutput').textContent = nameParts.length > 1 ? nameParts[nameParts.length -
                1] : '';
        }
    </script>
</body>

</html>