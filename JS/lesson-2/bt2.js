function check() {
    var name = document.getElementById("name").value;
    var score = parseFloat(document.getElementById("score").value);
    if (name.length > 3) {
        var res_name = document.getElementById("res-name");
        res_name.innerHTML += name.toUpperCase();
        res_name.style.fontSize = "40pt";
        res_name.style.color = "blue";
    }
    else {
        alert("Tên không khả dụng");
    }
    if (score >= 0 && score <= 10) {
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
    else {
        alert("Điểm không khả dụng");
    }
}
