<?php
//lay maloai duoc gui tu trang danhmuc
$ml = $_GET['maloai'];
//ket noi database
require_once 'connect.php';
$sql = "DELETE FROM loai_banh WHERE Ma_loai = :ml";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':ml', $ml);
$stmt->execute();
header('Location:danhmuc.php');
