<?php
$id=$_GET['iduser'];
//ket noi database
require_once('connect.php');
$sql="delete from users where id =$id";
mysqli_query($conn,$sql);
header('Location:main.php');

?>