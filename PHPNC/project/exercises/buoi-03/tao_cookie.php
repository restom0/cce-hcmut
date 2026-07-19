<!DOCTYPE html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Tao Cookie</title>
</head>
<body>
<?php
   if (isset($_POST["xacnhan"]))
   {
   	   $hoten = $_POST["hoten"];
   	   $email = $_POST["email"];
   	   $diachi= $_POST["diachi"];

   	   setcookie("ttkh", $hoten . " - " . $email . " - " . $diachi, time()+300);
   }
?>
<form action="" method="post">
	<table width="400" align="center" cellspacing="0" cellpadding="5" border="1">
		<tr>
			<th colspan="2">THÔNG TIN KHÁCH HÀNG</th>
		</tr>
		<tr>
			<td>Họ Và tên</td>
			<td><input type="text" name="hoten" value="<?=$hoten??null;?>"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="email" name="email" value="<?=$email??null;?>"></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><input type="text" name="diachi" value="<?=$diachi??null;?>"></td>
		</tr>
		<tr>
			<th colspan="2"><input type="submit" name="xacnhan" value="Xác Nhận"></th>
		</tr>
	</table>
</form>
	<?php
		if (isset($_COOKIE["ttkh"]))
		{
			echo "<div style='text-align:center;width:400px;margin:0px auto;'>Thông tin khách hàng";
			echo $_COOKIE["ttkh"] . "<br/>";
			echo "<a href='doc_cookie.php'> click here</a>";
			echo "</div>";
		}
	?>
</body>
</html>