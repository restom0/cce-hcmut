<?php
//var_dump($_POST);
$a=0;
$b=0;
if(isset($_POST['so1'])){
	$a= $_POST["so1"];
}
if(isset($_POST['so2'])){
	$b= $_POST["so2"];
}
if(isset($_POST['pheptinh'])){
	$phep= $_POST["pheptinh"];
}

$kq= $a.$b;








//die;
if(isset($_GET['so1'])){
	echo $_GET["so1"];
}
if(isset($_GET['so2'])){
	echo $_GET["so2"];
}
if(isset($_GET['pheptinh'])){
	echo $_GET["pheptinh"];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form method="POST" action="">
	Nhap so a: <input type="text" name="so1"><br>
	Nhap so b: <input type="text" name="so2"><br>
	Chon phep: <select name="pheptinh">
					<option value="+">+</option>
					<option value="-">-</option>
					<option value="*">*</option>
					<option value="/">/</option>
					<option value="%">%</option>
			   </select><br>
	<input type="submit" name="ok" value="Thuc hien"><br>
	</form>
	Ket qua:<?php echo $kq; ?>
</body>
</html>