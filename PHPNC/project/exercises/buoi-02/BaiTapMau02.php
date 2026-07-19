<?php
class PhepTinh
{
	//khai báo thuộc tính
	private $s1;
	private $s2;
	private $pt;

	//Khai báo các phương thức khởi tạo
	public function __construct($s1, $s2, $pt)
	{
		$this->s1 = $s1;
		$this->s2 = $s2;
		$this->pt = $pt;
	}
	
	//các phương thức tính trong lớp phép tính
	public function tinh()
	{
		$kq=""; $bt=0;
		switch($this->pt)
		{
			case "+": $bt = $this->s1 + $this->s2; break;
			case "-": $bt = $this->s1 - $this->s2; break;
			case "x": $bt = $this->s1 * $this->s2; break;
			case "/":
		            if ($this->s2==0)
	   				  $bt="Không chia được !!!!";
				    else
					  $bt = number_format($this->s1 / $this->s2, 2);
		}
		$kq = $this->s1 . " " . $this->pt . " " . $this->s2 . " = " . $bt;
		return $kq;
	}
}
?>
<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Đăng Ký Phòng</title>
</head>
<body>
<?php
    $c="+";
    if (isset($_POST["tinh"]))
    {
    	$a = $_POST["s1"];
    	$b = $_POST["s2"];
    	$c = $_POST["pt"];
    }
?>
<form action="" method="post">
	<table width="500" cellspaing="0" cellpadding="5" border="1" bgcolor=
	"#F79F81" align="center">
		<tr>
			<th colspan="2">PHÉP TÍNH</th>
		</tr>
		<tr>
			<td>Số Thứ nhất:</td>
			<td><input type="text" name="s1" value="<?=$a??null;?>"></td>
		</tr>
		<tr>
			<td>Số Thứ hai:</td>
			<td><input type="text" name="s2" value="<?=$b??null?>"></td>
		</tr>
		<tr>
			<td colspan="2" style="text-align:center">
<input type="radio" name="pt" value="+" <?php echo ($c=="+")? "checked" : "";?> >Cộng
<input type="radio" name="pt" value="-" <?php echo ($c=="-")? "checked": "";?>> Trừ
<input type="radio" name="pt" value="x" <?php echo ($c=="x")? "checked": "";?>> Nhân
<input type="radio" name="pt" value="/" <?php echo ($c=="/")? "checked": "";?>> Chia
				<input type="submit" name="tinh" value=" Tính ">
			</td>
		</tr>
	</table>
</form>
    <?php
    	if (isset($a))
    	{
    		echo '<table width="500" cellspaing="0" cellpadding="5" border="1" bgcolor="#669933" align="center"';
    		echo "<tr><th>KẾT QUẢ</th></tr>";
    		echo "<tr><td style='text-align:center'>";

    		if (is_numeric($a) && is_numeric($b))
    		{
    			$tinhtoan = new PhepTinh($a, $b, $c);
    		    echo $tinhtoan->tinh();
    		}
    		else
    		{
    			echo "Phải nhập số em ơi !!!";
    		}
    		echo "</td></tr></table>";

    	}
    ?>
</body>
</html>