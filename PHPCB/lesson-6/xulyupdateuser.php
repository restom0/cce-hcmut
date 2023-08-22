<?php
//lay gia tri cacs input tu Post
$f = $_POST['fn'];
$l = $_POST['ln'];
$e = $_POST['email'];
$id = $_POST['iduser'];
//echo $id;
//connect database
require_once 'connect.php';
//update cac gia tri cua user cos id = $id
$sql = "UPDATE users SET F_name = :f, L_name = :l, Email = :e WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':f', $f);
$stmt->bindParam(':l', $l);
$stmt->bindParam(':e', $e);
$stmt->bindParam(':id', $id);
$stmt->execute();
//quay ve trang quan ly user(main.php)
header("Location:main.php");
