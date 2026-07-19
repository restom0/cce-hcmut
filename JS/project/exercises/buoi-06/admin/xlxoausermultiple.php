<?php
if(isset($_POST['check'])){
	require_once('connect.php');
	//print_r($_POST['check']);
	$arr=$_POST['check'];
	foreach ($arr as $value) {
		//echo $value;
		$sql="delete from users where id='$value'";
		mysqli_query($conn,$sql);
		# code...
	}
	header('Location:main.php');

}