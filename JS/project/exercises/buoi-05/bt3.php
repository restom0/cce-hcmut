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

        .canhgiua {
            width: 100px;
            margin: 0px auto;
        }
    </style>
</head>

<body>
    <h1>Phân tích Chuỗi</h1>
    <table class="ddbang">
        <tr>
            <th>Nhập một chuỗi</th>
            <td>
                <textarea id="inputString" rows="5" cols="30"></textarea>
                <p id="output"></p>
            </td>
        </tr>
        <tr>
            <th>Nhập chuỗi tìm</th>
            <td><input type="text" id="findString" value=""></td>
        </tr>
        <tr>
            <th>Nhập chuỗi thay thế</th>
            <td><input type="text" id="replaceString" value=""></td>
        </tr>
        <tr>
            <td colspan="2" class="canhgiua"><button onclick="findAndReplace()">Tìm và Thay Thế</button></td>
        </tr>
    </table>
    <script>
        function findAndReplace() {
            var inputString = document.getElementById("inputString").value;
            var findString = document.getElementById("findString").value;
            var replaceString = document.getElementById("replaceString").value;
            var output = inputString.replaceAll(findString, replaceString);
            document.getElementById("output").innerHTML = output;
        }
    </script>
</body>

</html>