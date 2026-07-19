<?php
//lay gia tri cacs input tu Post
$ml= $_POST['maloai'];
$tl=$_POST['tenloai'];
$mt=$_POST['mota'];
//echo $id;
//connect database
require_once('connect.php');
//update cac gia tri cua user cos id = $id
$sql="update loai_banh set Ma_loai ='$ml', Ten_loai='$tl', Mo_ta='$mt' where Ma_loai='$ml'";
//echo $sql;
mysqli_query($conn, $sql);
//quay ve trang quan ly user(main.php)
header("Location:danhmuc.php");