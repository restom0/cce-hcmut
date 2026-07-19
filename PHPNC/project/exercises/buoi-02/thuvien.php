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

class Hinh
{
	private $tieude;
	private $duongdan;
	private $ghichu;
	private $chieurong;
	private $chieucao;
	private $duongvien;
	private $canhle;

	//khoi tao
	public function __construct($a, $b, $c, $d, $e, $f, $g)
	{
		$this->tieude = $a;
		$this->duongdan = $b;
		$this->ghichu = $c;
		$this->chieurong = $d;
		$this->chieucao = $e;
		$this->duongvien = $f;
		$this->canhle = $g;
	}

	//hien thi hinh anh
    public function hienthi()
    {
    	echo "<div style='text-align:$this->canhle; margin-top:10px'>";
		echo "<img src='$this->duongdan' width='$this->chieurong' height='$this->chieucao' alt='$this->ghichu' title='$this->tieude' border='$this->duongvien'>";
		echo "</div>";
    }

}
?>