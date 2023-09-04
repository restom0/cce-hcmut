<?php
include './product.php';
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
        $flower = isset($_SESSION["flower"]) ? $_SESSION["flower"] : array();
        if ($flower != []) {
            foreach ($flower as $product) {
                if ($product->getIdFlower == $_POST["id_flower"]) {
                    $product->setAmountFlower(intval($product->getAmountFlower) + intval($_POST["amount_flower"]));
                }
            }
        } else {
            $flower[] = new Product($_POST["id_flower"], $_POST["name_flower"], $_POST["amount_flower"], $_POST["price_flower"]);
        }
        $_SESSION["flower"] = $flower;
    }
    ?>
    <form action="" method="post">
        <table width="400" align="center" cellspacing="0" cellpadding="5" border="1">
            <tr>
                <th colspan="2" class="text-center">MUA HOA</th>
            </tr>
            <tr>
                <td>Mã hoa: </td>
                <td><input type="text" name="id_flower" value="<?= $id_flower ?? null; ?>"></td>
            </tr>
            <tr>
                <td>Tên hoa: </td>
                <td><input type="text" name="name_flower" value="<?= $name_flower ?? null; ?>"></td>
            </tr>
            <tr>
                <td>Số lượng: </td>
                <td><input type="text" name="amount_flower" value="<?= $amount_flower ?? null; ?>"></td>
            </tr>
            <tr>
                <td>Giá: </td>
                <td><input type="text" name="price_flower" value="<?= $price_flower ?? null; ?>"></td>
            </tr>
            <tr>
                <td><input type="submit" name="orderBtn" value="Đặt hàng"></td>
                <td><input type="submit" name="cartBtn" value="Giỏ hàng"></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_POST["cartBtn"])) {
        header('Location: /PHPNC/lesson-3/gio_hoa.php');
        exit;
    }
    ?>
</body>

</html>