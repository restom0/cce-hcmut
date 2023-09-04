<?php
include './product.php';
session_start();
$sum = 0;
if (isset($_POST["orderBtn"])) {
    header('Location: /PHPNC/lesson-3/mua_hoa.php');
}
if (isset($_POST["deleteBtn"])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center">Shopping Cart</h1>
    <form action="" method="POST">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên hoa</th>
                    <th scope="col">Số lượng</th>
                    <th scope="col">Đơn giá</th>
                    <th scope="col">Thành tiền</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION["flower"]) && is_array($_SESSION["flower"])) {
                    foreach ($_SESSION["flower"] as $product) {
                ?>
                        <tr>
                            <td><?php echo $product->getNameFlower(); ?></td>
                            <td><?php echo $product->getAmountFlower(); ?></td>
                            <td><?php echo $product->getPriceFlower(); ?></td>
                            <td><?php echo $product->getAmountFlower() * $product->getPriceFlower(); ?></td>
                        </tr>
                <?php
                        $sum += $product->getAmountFlower() * $product->getPriceFlower();
                    }
                }
                ?>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><?php echo $sum; ?></td>
                </tr>
                <tr>
                    <td><input type="submit" name="orderBtn" value="Đặt hàng"></td>
                    <td><input type="submit" name="deleteBtn" value="Hủy giỏ hàng"></td>
                </tr>
            </tbody>
        </table>
    </form>
</body>

</html>