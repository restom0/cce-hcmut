<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_POST["orderBtn"])) {
        $order = $_POST["order"];
        $address = $_POST["address"];

        $_SESSION["order"] = $order;
        $_SESSION["address"] = $address;
    }
    ?>
    <div class="container">
        <h1 class="text-center">
            Chào <b><?= $_SESSION["username"] ?? null; ?></b><br>
        </h1>
    </div>
    <form action="" method="post">
        <table width="400" align="center" cellspacing="0" cellpadding="5" border="1">
            <tr>
                <th colspan="2" class="text-center">CÁC SẢN PHẨM</th>
            </tr>
            <tr>
                <td>Chúng tôi có</td>
                <td>
                    <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="order">
                        <option selected>Hãy chọn món</option>
                        <option value="Kem bốn mùa">Kem bốn mùa</option>
                        <option value="Kem bốn mùa">Kem bốn mùa</option>
                        <option value="Kem bốn mùa">Kem bốn mùa</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Địa chỉ giao hàng</td>
                <td><input type="text" name="address" value="<?= $address ?? null; ?>"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="orderBtn" value="Đặt hàng"></th>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_SESSION["order"]) and isset($_SESSION["address"])) {
        echo "<div style='text-align:center;width:400px;margin:0px auto;'>";
        echo "Bạn đã đặt " . $_SESSION["order"] . ". <br/>";
        echo "Chúng tôi sẽ giao hàng cho bạn tại địa chỉ <br/>";
        echo $_SESSION["address"] . " Cảm ơn bạn!";
        echo "</div>";
    }
    ?>

</body>

</html>