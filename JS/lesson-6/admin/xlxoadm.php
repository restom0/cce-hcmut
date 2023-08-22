<?php
//lay maloai duoc gui tu trang danhmuc
$ml=$_GET['maloai'];
//ket noi database
require_once('connect.php');
$sql="delete from loai_banh where Ma_loai ='$ml'";
mysqli_query($conn,$sql);
header('Location:danhmuc.php');

?>