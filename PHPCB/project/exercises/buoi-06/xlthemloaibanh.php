<?php
//lay cac gia tri duoc nhap tu trang addloaibanh
$ml = $_POST['maloai'];
$tl = $_POST['tenloai'];
$mt = $_POST['mota'];
//ket noi database
require_once 'connect.php';
$sql = "INSERT INTO loai_banh (Ma_loai, Ten_loai, Mo_ta) VALUES (:ml, :tl, :mt)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ml', $ml);
$stmt->bindParam(':tl', $tl);
$stmt->bindParam(':mt', $mt);
$stmt->execute();
//quay ve trang danh muc
header('Location:danhmuc.php');
