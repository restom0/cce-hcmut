<?php
require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container">
        <h1 style="text-align: center">Bánh petit cake</h1>
        <hr />
        <div class="row">
            <?php
            $sql = "SELECT * FROM san_pham";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['Ma_loai'] == 'pt_c') {
                    echo '
                        <div class="col-md-3">
                        <img src="' . $row['Hinh_anh'] . '" >' .
                        '<p>' . $row['Gia_ban'] . '</p>' .
                        '<p>' . ($row['Gia_ban'] * (100 - $row['Giam_gia']) / 100) . '</p>' .
                        '<p>' . $row['Ten_sp'] . '</p>' .
                        '</div>';
                }
            }
            ?>
        </div>
    </div>
    <div class="container" style="margin-top: 50px;">
        <h1>Bánh sinh nhật tiêu chuẩn</h1>
        <hr />
        <div class="row">
            <?php
            $sql = "SELECT * FROM san_pham";
            $stmt = $conn->query($sql);
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($row['Ma_loai'] == 'sn_tc') {
                    echo '
                    <div class="col-md-3">
                        <img src="' . $row['Hinh_anh'] . '" >' .
                        '<p><del> Price: ' . $row['Gia_ban'] . '</del></p>' .
                        '<p style="color:red"><b> Discount: ' . ($row['Gia_ban'] * (100 - $row['Giam_gia']) / 100) . '</b></p>' .
                        '<p>' . $row['Ten_sp'] . '</p>' .
                        '</div>';
                }
            }
            ?>
        </div>
    </div>
</body>

</html>