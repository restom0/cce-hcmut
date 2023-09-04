<?php
include './product.php';
session_start();
$products = [
    new Product(1, 'Mặt hàng 1', 1, 1000),
    new Product(2, 'Mặt hàng 2', 1, 850),
    new Product(3, 'Mặt hàng 3', 1, 1000),
    new Product(4, 'Mặt hàng 4', 1, 1000),
    new Product(5, 'Mặt hàng 5', 1, 1000)
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mua hàng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <?php
    if (isset($_POST["addToCartBtn"])) {
        if (isset($_POST["addToCartBtn"])) {
            $productToAdd = null;
            foreach ($products as $j) {
                if ($j->getIdFlower() == $_POST["addToCartBtn"]) {
                    $productToAdd = $j;
                    break;
                }
            }
            if ($productToAdd) {
                $product = isset($_SESSION["product"]) ? $_SESSION["product"] : array();
                if ($product != []) {
                    foreach ($product as $i) {
                        if ($i->getIdFlower() == $productToAdd->getIdFlower()) {
                            $i->setAmountFlower($i->getAmountFlower() + 1);
                        } else {
                            $product[] = $productToAdd;
                        }
                    }
                } else {
                    $product[] = $productToAdd;
                }
                $_SESSION["product"] = $product;
                header('Location: /PHPNC/lesson-3/gio_hang.php');
                exit;
            }
        }
    }
    ?>
    <form action="" method="post">
        <table width="800" align="center" cellspacing="0" cellpadding="5" border="1">
            <tr>
                <th>ID</th>
                <th>Tên hàng</th>
                <th>Đơn giá</th>
                <th>Tùy chỉnh</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Mặt hàng 1</td>
                <td>1000</td>
                <td><button name="addToCartBtn" value="1">Thêm vào giỏ hàng</button></td>
            </tr>
            <tr>
                <td>2</td>
                <td>Mặt hàng 2</td>
                <td>850</td>
                <td><button name="addToCartBtn" value="2">Thêm vào giỏ hàng</button></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Mặt hàng 3</td>
                <td>1000</td>
                <td><button name="addToCartBtn" value="3">Thêm vào giỏ hàng</button></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Mặt hàng 4</td>
                <td>1000</td>
                <td><button name="addToCartBtn" value="4">Thêm vào giỏ hàng</button></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Mặt hàng 5</td>
                <td>1000</td>
                <td><button name="addToCartBtn" value="5">Thêm vào giỏ hàng</button></td>
            </tr>
        </table>
    </form>
</body>

</html>