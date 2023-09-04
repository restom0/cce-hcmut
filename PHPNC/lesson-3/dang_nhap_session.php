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
    if (isset($_POST["loginBtn"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
    }
    ?>
    <form action="" method="post">
        <table width="400" align="center" cellspacing="0" cellpadding="5" border="1">
            <tr>
                <th colspan="2">THÔNG TIN ĐĂNG NHẬP</th>
            </tr>
            <tr>
                <td>Tên đăng nhập</td>
                <td><input type="text" name="username" value="<?= $username ?? null; ?>"></td>
            </tr>
            <tr>
                <td>Mật Khẩu</td>
                <td><input type="password" name="password" value="<?= $password ?? null; ?>"></td>
            </tr>
            <tr>
                <th colspan="2"><input type="submit" name="loginBtn" value="Đăng nhập"></th>
            </tr>
        </table>
    </form>
    <?php
    if (isset($_SESSION["username"]) and isset($_SESSION["password"])) {
        echo "<div style='text-align:center;width:400px;margin:0px auto;'>";
        echo "Chào " . $_SESSION["username"] . " ! Đăng nhập thành công! <br/>";
        echo "<a href='./dat_hang_session.php'>Qua trang đặt hàng</a>";
        echo "</div>";
    }
    ?>
</body>

</html>