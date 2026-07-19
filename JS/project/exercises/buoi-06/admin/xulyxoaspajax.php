<?php

$msp=$_GET['q'];
//ket noi database
require_once('connect.php');
$sql="delete from san_pham where Ma_sp ='$msp'";
mysqli_query($conn,$sql);

?>