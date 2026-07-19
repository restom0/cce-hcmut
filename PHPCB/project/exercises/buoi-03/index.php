<?php
$x = $y = $z = '';
$kq = '';
if (isset($_POST["a"])) {
    $x = $_POST["a"];
}
if (isset($_POST["b"])) {
    $y = $_POST["b"];
}
if (isset($_POST["c"])) {
    $z = $_POST["c"];
}
switch ($z) {
    case "plus":
        $kq = (int)($x + $y);
        break;
    case "minus":
        $kq = (int)($x - $y);
        break;
    case "product":
        $kq = (int)($x * $y);
        break;
    case "divide":
        // Guarded: the form can submit b=0, and on first load $z was empty
        // and fell through to the old default branch, dividing by nothing.
        $kq = ((int)$y === 0) ? 'Không chia được cho 0' : (int)($x / $y);
        break;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="./index.php"></script>
</head>

<body>
    <form method="post" action="">
        <label for="a">Nhập a:</label>
        <input type="text" name="a" id="" />
        <label for="b">Nhập b:</label>
        <input type="text" name="b" id="" />
        <label for="c">Chọn phép tính:</label>
        <select name="c" id="">
            <option value="plus">+</option>
            <option value="minus">-</option>
            <option value="product">*</option>
            <option value="divide">/</option>
        </select>
        <button type="submit" name="ok" value="Do">Submit</button>
    </form>
    <div class="result">
        <?php
        echo $kq;
        ?>
    </div>
</body>

</html>