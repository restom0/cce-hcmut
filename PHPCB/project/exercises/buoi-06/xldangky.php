<?php
//kiem tra submit
if (!empty($_POST)) {

    $f = $l = $e = $p = $rp = '';
    if (isset($_POST['fn'])) {
        $f = $_POST['fn'];
    }
    if (isset($_POST['ln'])) {
        $l = $_POST['ln'];
    }
    if (isset($_POST['email'])) {
        $e = $_POST['email'];
    }
    if (isset($_POST['pws'])) {
        $p = $_POST['pws'];
    }
    if (isset($_POST['repws'])) {
        $rp = $_POST['repws'];
    }

    //echo $f.$l.$e.$p.$rp;

    //ket noi database
    require_once 'connect.php';
    if ($p == $rp) {
        $p = $rp = md5($p);

        $sql = "INSERT INTO users (F_name, L_name, Email, Password, Re_Password) VALUES (:f, :l, :e, :p, :rp)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':f', $f);
        $stmt->bindParam(':l', $l);
        $stmt->bindParam(':e', $e);
        $stmt->bindParam(':p', $p);
        $stmt->bindParam(':rp', $rp);

        $stmt->execute();
        //chay qua trang login
        header('Location:main.php');
    } else {
        echo "ban nhap pass va repass khong giong nhau!";
    }
}
