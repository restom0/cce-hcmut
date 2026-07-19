<?php
session_start();
?>
<!DOCTYPE html>
<html lang="vi">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<style>
		.wrapper {
			width: 600px;
			margin: 0px auto;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<div style="float:left;">
			<img src="../hinh/logo_session.png" alt="logo hình">
		</div>
		<div style="float:right;line-height:25px">
			xin chào <b><?= $_SESSION["hoten"] ?? null; ?></b><br>
			Tên đăng nhập<b><?= $_SESSION["tendn"] ?? null; ?></b><br>
			<a href="tao_session.php">Quay về trang đăng Nhập</a>
		</div>
		<div style="clear:both;text-align:center">
			<img src="../hinh/banner_session.png" alt="banner">
		</div>
	</div>
</body>

</html>