<?php
//lay gia tri cacs input tu Post
$ml = $_POST['maloai'];
$tl = $_POST['tenloai'];
$mt = $_POST['mota'];
//echo $id;
//connect database
require_once 'connect.php';
//update cac gia tri cua user cos id = $id
$sql = "UPDATE loai_banh SET Ma_loai = :ml, Ten_loai = :tl, Mo_ta = :mt WHERE Ma_loai = :ml_old";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ml', $ml);
$stmt->bindParam(':tl', $tl);
$stmt->bindParam(':mt', $mt);
$stmt->bindParam(':ml_old', $ml);
$stmt->execute();
//quay ve trang quan ly user(main.php)
header("Location:danhmuc.php");
