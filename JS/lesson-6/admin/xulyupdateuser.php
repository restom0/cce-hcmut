<?php
//lay gia tri cacs input tu Post
$f= $_POST['fn'];
$l=$_POST['ln'];
$e=$_POST['email'];
$id=$_POST['iduser'];
//echo $id;
//connect database
require_once('connect.php');
//update cac gia tri cua user cos id = $id
$sql="update users set F_name ='$f', L_name='$l', Email='$e' where id=$id";
//echo $sql;
mysqli_query($conn, $sql);
//quay ve trang quan ly user(main.php)
header("Location:main.php");