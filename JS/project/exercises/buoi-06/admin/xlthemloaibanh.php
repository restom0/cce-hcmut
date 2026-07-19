<?php
//lay cac gia tri duoc nhap tu trang addloaibanh
$ml=$_POST['maloai'];
$tl=$_POST['tenloai'];
$mt=$_POST['mota'];
//ket noi database
require_once('connect.php');
//sql insert
$sql="insert into loai_banh(Ma_loai,Ten_loai,Mo_ta) values('$ml','$tl','$mt')";
//thuc thi sql
mysqli_query($conn,$sql);
//quay ve trang danh muc
header('Location:danhmuc.php');
