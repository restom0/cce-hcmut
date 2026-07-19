<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Tao Cookie</title>
</head>

<body>
	<?php
	if (isset($_POST["dangnhap"])) {
		$hoten = $_POST["hoten"];
		$email = $_POST["email"];
		$tendn = $_POST["tendn"];
		$matkhau = $_POST["matkhau"];

		$_SESSION["hoten"] = $hoten;
		$_SESSION["email"] = $email;
		$_SESSION["tendn"] = $tendn;
		$_SESSION["matkhau"] = $matkhau;
	}
	?>
	<form action="" method="post">
		<table width="400" align="center" cellspacing="0" cellpadding="5" border="1">
			<tr>
				<th colspan="2">THÔNG TIN ĐĂNG NHẬP</th>
			</tr>
			<tr>
				<td>Họ Và tên</td>
				<td><input type="text" name="hoten" value="<?= $hoten ?? null; ?>"></td>
			</tr>
			<tr>
				<td>Email</td>
				<td><input type="email" name="email" value="<?= $email ?? null; ?>"></td>
			</tr>
			<tr>
				<td>Tên đăng nhập</td>
				<td><input type="text" name="tendn" value="<?= $tendn ?? null; ?>"></td>
			</tr>
			<tr>
				<td>Mật Khẩu</td>
				<td><input type="password" name="matkhau" value="<?= $matkhau ?? null; ?>"></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="dangnhap" value="Đăng nhập"></th>
			</tr>
		</table>
	</form>
	<?php
	if (isset($_SESSION["hoten"])) {
		echo "<div style='text-align:center;width:400px;margin:0px auto;'>";
		echo "Xin chào " . $_SESSION["hoten"] . "<br/>";
		echo "Email " . $_SESSION["email"] . "<br/>";
		echo "Tên đăng nhập " . $_SESSION["tendn"] . "<br/>";
		echo "Mật khẩu " . $_SESSION["matkhau"] . "<br/>";
		echo "<a href='doc_session.php'> click here</a>";
		echo "</div>";
	}
	?>
</body>

</html>