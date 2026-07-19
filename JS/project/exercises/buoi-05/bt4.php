<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập ngày sinh của bạn</title>
    <style>
        body {
            font-family: sans-serif;
        }

        .container {
            width: 400px;
            margin: 50px auto;
            border: 1px solid #ccc;
            padding: 20px;
            border-radius: 5px;
        }

        .date-input {
            margin-bottom: 10px;
        }

        .date-input label {
            display: block;
            margin-bottom: 5px;
        }

        #result-box {
            display: none;
            border: 1px solid #ccc;
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
        }

        #output {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Nhập ngày sinh của bạn</h1>
        <div class="date-input">
            <label for="ngay">Ngày:</label>
            <input type="number" id="ngay" min="1" max="31">

            <label for="thang">Tháng:</label>
            <input type="number" id="thang" min="1" max="12">

            <label for="nam">Năm:</label>
            <input type="number" id="nam" min="1900">
        </div>
        <button onclick="hienthi()">Xuất ngày sinh</button>
        <div id="result-box">
            <p id="output"></p>
        </div>
    </div>
    <script>
        function hienthi() {
            const ngay = document.getElementById("ngay").value;
            const thang = document.getElementById("thang").value;
            const nam = document.getElementById("nam").value;

            const d = new Date(nam, thang - 1, ngay);
            const dayOfWeek = d.toLocaleDateString("vi-VN", {
                weekday: 'long'
            });
            const fullDate = d.toLocaleDateString("vi-VN", {
                day: 'numeric',
                month: 'long',
                year: 'numeric'
            });

            const resultBox = document.getElementById("result-box");
            const output = document.getElementById("output");
            output.textContent = `Thứ ${dayOfWeek}, ${fullDate}`;
            resultBox.style.display = "block";
        }
    </script>
</body>

</html>