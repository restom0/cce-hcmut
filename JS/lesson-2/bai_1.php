<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <label for="name">Họ tên: </label>
    <input type="text" id="name">
    <br>
    <br>
    <label for="score">Điểm thi: </label>
    <input type="text" id="score">
    <br><br>
    <button type="submit" onclick="check()">Kiểm tra</button>
    <div id="result">
        <p id="res-name">Họ tên: </p>
        <p id="res-score">Xếp loại: </p>
        <p id="res-qualify">Kết quả: </p>
    </div>
    <script>
        function check() {
            var name = document.getElementById("name").value;
            var res_name = document.getElementById("res-name");
            res_name.innerHTML += name.toUpperCase();
            res_name.style.fontSize = "40pt";
            res_name.style.color = "blue";
            var score = parseFloat(document.getElementById("score").value);
            var res_score = document.getElementById("res-score");
            if (score < 5) res_score.innerHTML += "Yếu";
            else if (score < 7) res_score.innerHTML += "Trung bình";
            else if (score < 8) res_score.innerHTML += "Khá";
            else if (score < 9) res_score.innerHTML += "Giỏi";
            else res_score += "Xuất sắc";
            var res_qualify = document.getElementById("res-qualify");
            if (score < 5) res_qualify.innerHTML += "Rớt";
            else res_qualify.innerHTML += "Đậu";
        }

    </script>
</body>

</html>