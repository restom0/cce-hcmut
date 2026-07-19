<?php
if (!empty($_POST)) {
    $u = $p = '';

    if (isset($_POST['urs'])) {
        $u = $_POST['urs'];
    }
    if (isset($_POST['psw'])) {
        $p = $_POST['psw'];
    }

    require_once('connect.php');
    $p = md5($p);
    $sql = "SELECT * FROM users WHERE Email = ? AND Password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$u, $p]); 

    if ($stmt->rowCount() > 0) {
        header('Location: main.php');
    } else {
        echo "You are not a member, please register!";
    }
}
