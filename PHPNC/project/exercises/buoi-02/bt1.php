<?php
class fraction
{
    private $num;
    private $dem;
    public function __construct($num, $dem)
    {
        $this->num = $num;
        $this->dem = $dem;
    }
    public function getNum()
    {
        return $this->num;
    }
    public function getDem()
    {
        return $this->dem;
    }
    private function gcd($a, $b)
    {
        $res = 1;
        for ($i = 2; $i <= ($a < $b ? $a : $b); $i++) {
            if ($a % $i == 0 && $b % $i == 0)
                $res = $i;
        }
        return $res;
    }
    private function plus($otherfraction)
    {
        $resultnum = $this->num * $otherfraction->dem + $otherfraction->num * $this->dem;
        $resultdem = $otherfraction->dem * $this->dem;
        $gcd = $this->gcd($resultnum, $resultdem);
        $resultnum /= $gcd;
        $resultdem /= $gcd;
        $result = new fraction($resultnum, $resultdem);
        return $result;
    }
    public function getPlus($otherfraction)
    {
        return $this->plus($otherfraction);
    }
    private function minus($otherfraction)
    {
        $resultnum = $this->num * $otherfraction->dem - $otherfraction->num * $this->dem;
        $resultdem = $otherfraction->dem * $this->dem;
        $gcd = $this->gcd($resultnum, $resultdem);
        $resultnum /= $gcd;
        $resultdem /= $gcd;
        $result = new fraction($resultnum, $resultdem);
        return $result;
    }
    public function getMinus($otherfraction)
    {
        return $this->minus($otherfraction);
    }
    private function product($otherfraction)
    {
        $resultnum = $this->num * $otherfraction->num;
        $resultdem = $otherfraction->dem * $this->dem;
        $gcd = $this->gcd($resultnum, $resultdem);
        $resultnum /= $gcd;
        $resultdem /= $gcd;
        $result = new fraction($resultnum, $resultdem);
        return $result;
    }
    public function getProduct($otherfraction)
    {
        return $this->product($otherfraction);
    }
    private function divide($otherfraction)
    {
        if ($this->dem == 0 or $otherfraction->dem == 0) {
            echo "division by zero";
            return null;
        } else {
            $resultnum = $this->num * $otherfraction->dem;
            $resultdem = $this->dem * $otherfraction->num;
            $gcd = $this->gcd($resultnum, $resultdem);
            $resultnum /= $gcd;
            $resultdem /= $gcd;
            $result = new fraction($resultnum, $resultdem);
            return $result;
        }
    }
    public function getDivide($otherfraction)
    {
        return $this->divide($otherfraction);
    }
}
$num1 = '';
$dem1 = '';
$num2 = '';
$dem2 = '';
$operation_mark = '';
$resnum = '';
$resdem = '';
if (isset($_POST["calculate"])) {
    $num1 = $_POST["numerator1"];
    $dem1 = $_POST["denominator1"];
    $num2 = $_POST["numerator2"];
    $dem2 = $_POST["denominator2"];

    $frac1 = new fraction($num1, $dem1);
    $frac2 = new fraction($num2, $dem2);
    if (isset($_POST["operation"])) {
        $operation_mark = $_POST["operation"];
        switch ($operation_mark) {
            case "plus":
                $operation_mark = "+";
                $res = $frac1->getPlus($frac2);
                break;
            case "minus":
                $operation_mark = "-";
                $res = $frac1->getMinus($frac2);
                break;

            case "product":
                $operation_mark = "*";
                $res = $frac1->getProduct($frac2);
                break;
            default:
                $operation_mark = "/";
                $res = $frac1->getDivide($frac2);
                break;
        }
        $resnum = $res->getNum();
        $resdem = $res->getDem();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Máy Tính Phân Số</title>
    </head>

    <body>
        <h2 class="text-center">Máy Tính Phân Số</h2>
        <div class="row align-items-center text-center mx-auto w-50">
            <form method="post" action="">
                <!-- First Row: Two Fraction Inputs -->
                <div class="row align-items-center text-center mx-auto">
                    <div class="col">
                        <input type="number" name="numerator1" required>
                        <hr>
                        <input type="number" name="denominator1" required>
                    </div>
                    <div class="col">
                        <span name="operation-mark"><?php echo ($operation_mark) ?></span>
                    </div>
                    <div class="col">
                        <input type="number" name="numerator2" required>
                        <hr>
                        <input type="number" name="denominator2" required>
                    </div>
                    <!-- Second Row: Operation Selection -->
                    <div class="row align-items-center text-center mt-4">
                        <div class="col">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operation" id="plus" value="plus">
                                <label class="form-check-label" for="plus">Cộng</label>

                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operation" id="inlineRadio2" value="minus">
                                <label class="form-check-label" for="inlineRadio2">Trừ</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operation" id="inlineRadio3" value="product">
                                <label class="form-check-label" for="inlineRadio3">Nhân</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="operation" id="inlineRadio4" value="divide">
                                <label class="form-check-label" for="inlineRadio4">Chia</label>
                            </div>
                        </div>
                    </div>
                    <!-- Third Row: Submit Button -->
                    <div class="row align-items-center text-center mt-4">
                        <div class="col">
                            <button type="submit" name="calculate">Tính</button>
                        </div>
                    </div>
            </form>
        </div>
        <?php
        if (isset($_POST["calculate"])) {
            echo '
            <h2 class="text-center">Kết quả Phân Số</h2>
            <div class="row align-items-center text-center mx-auto w-50">
                <form method="post" action="">
                    <!-- First Row: Two Fraction Inputs -->
                    <div class="row align-items-center text-center mx-auto">
                        <div class="col">
                            ' . $num1 . '
                            <hr>
                            ' . $dem1 . '
                        </div>
                        <div class="col">
                            <span name="operation-mark">' . $operation_mark . '</span>
                        </div>
                        <div class="col">
                            ' . $num2 . '
                            <hr>
                            ' . $dem2 . '
                        </div>
                        <div class="col">
                            <span name="result"> = </span>
                        </div>
                        <div class="col">
                            <p type="number" name="resultnum">' . $resnum . '</p>
                            <hr>
                            <p type="number" name="resultdem">' . $resdem . '</p>
                        </div>
                </form>
            </div>  ';
        }
        ?>
    </body>

    </html>