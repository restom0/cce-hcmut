<?php
class PhepTinh
{
	//khai báo thuộc tính
	private $s1;
	private $s2;
	private $pt;

	//Khai báo các phương thức truy xuất thuộc
	public function setS1($a) 
	{
		$this->s1 = $a;
	}
	public function getS1()
	{
		return $this->s1;
	}

	public function setS2($a) 
	{
		$this->s2 = $a;
	}
	public function getS2()
	{
		return $this->s2;
	}

	public function setPT($a) 
	{
		$this->pt = $a;
	}
	public function getPT()
	{
		return $this->pt;
	}

	//các phương thức tính trong lớp phép tính
	public function cong()
	{
		$bt = $this->s1 + $this->s2;
		$kq = $this->s1 . " " . $this->pt . " " . $this->s2 . " = " . $bt;

		return $kq;
	}

	public function tru()
	{
		$bt = $this->s1 - $this->s2;
		$kq = $this->s1 . " " . $this->pt . " " . $this->s2 . " = " . $bt;

		return $kq;
	}

	public function nhan()
	{
		$bt = $this->s1 * $this->s2;
		$kq = $this->s1 . " " . $this->pt . " " . $this->s2 . " = " . $bt;

		return $kq;
	}	
	
	public function chia()
	{
		if ($this->s2==0)
		   $kq="Không chia được !!!!";
		else
		{
			$bt = number_format($this->s1 / $this->s2, 2);
			$kq = $this->s1 . " " . $this->pt . " " . $this->s2 . " = " . $bt;
		}

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
    			$tinhtoan = new PhepTinh();
    		    $tinhtoan->setS1($a);
    		    $tinhtoan->setS2($b);
    		    $tinhtoan->setPT($c);
    		    switch($c)
    			{
    			case "+": echo $tinhtoan->cong(); break;
    			case "-": echo $tinhtoan->tru(); break;
    			case "x": echo $tinhtoan->nhan(); break;
    			case "/": echo $tinhtoan->chia(); break;
    			}
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