<?php
$x = $y = '';
if (isset($_POST["a"])) {
    $x = $_POST["a"];
}
if (isset($_POST["b"])) {
    $y = $_POST["b"];
}
if (isset($_POST["c"])) {
    $z = $_POST["c"];
}
switch($z):{
    case "plus":{
        (int)$kq = $x + $y;
        break;
    }
    case "minus":{
        (int)$kq = $x - $y;
        break;
    }
    case "product":{
        (int)$kq = $x * $y;
        break;
    }
    default:
    (int)$kq = $x / $y;
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