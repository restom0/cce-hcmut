<?php
	include("thuvien.php");
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hiển Thị Hình Ảnh</title>
</head>
<body>
<?php
    $cl="Left";
	if (isset($_POST["hienthi"]))
	{
		$td = $_POST["tieude"];
		$dd = $_POST["duongdan"];
		$gc = $_POST["ghichu"];
		$cr = $_POST["chieurong"];
		$cc = $_POST["chieucao"];
		$dv = $_POST["duongvien"];
		$cl = $_POST["canhle"];
	}
?>
<form action="" method="POST">
	<table width="500" cellspaing="0" cellpadding="5" border="1" bgcolor=
	"#F79F81" align="center">
		<tr>
			<th colspan="4">HIỂN THỊ HÌNH ẢNH</th>
		</tr>
		<tr>
			<td width="150">Tiêu đề</td>
			<td width="350" colspan="3"><input type="text" name="tieude" value="<?=$td??null;?>"></td>
		</tr>
		<tr>
			<td>Đường dẫn hình: </td>
			<td colspan="3"><input type="text" name="duongdan" value="<?=$dd??null;?>"></td>
		</tr>
		<tr>
			<td>Dòng ghi chú</td>
			<td colspan="3"><input type="text" name="ghichu" value="<?=$gc??null;?>"></td>
		</tr>
		<tr>
			<td>Chiều Rộng</td>
			<td><input type="text" name="chieurong" value="<?=$cr??null;?>" size="4"></td>
			<td width="100">Chiều Cao</td>
			<td><input type="text" name="chieucao" value="<?=$cc??null;?>" size="4"></td>
		</tr>
		<tr>
			<td>Đường viền</td>
			<td><input type="text" name="duongvien" value="<?=$dv??null;?>"></td>
			<td>Canh lề</td>
			<td>
				<select name="canhle" size="1">
<option value="left" <?php echo ($cl=="left")? "selected" : "";?>> Left </option>
<option value="center" <?php echo ($cl=="center")? "selected" : ""?>> Center </option>
<option value="right" <?php echo ($cl=="right")? "selected" : "" ?>> Right </option>
				</select>
			</td>
		</tr>
		<tr>
			<th colspan="4">
				<input type="submit" name="hienthi" value=" Hiển Thị ">
			</th>
		</tr>
	</table>
</form>
<?php
	if (isset($td))
	{
		$hinh = new Hinh($td, $dd, $gc, $cr, $cc, $dv, $cl);
		$hinh->hienthi();
	}
?>
</body>
</html>