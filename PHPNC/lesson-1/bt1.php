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
    <h1 class="text-center">THÔNG TIN ĐẶT CHỖ</h1>
    <form action="" method="get">
        <div class="container w-50">
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Số khách tham dự bữa tiệc của quý khách</span>
                        <input type="text" aria-label="First name" class="form-control" name="amount-guest">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Ngày</span>
                        <input type="date" aria-label="First name" class="form-control" name="date-party">
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group-inline form-check-inline">
                        <span class="input-group-text">Loại tiệc</span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeParty" id="inlineRadio1" value="Tiệc sáng">
                        <label class="form-check-label" for="inlineRadio1">Tiệc sáng</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeParty" id="inlineRadio2" value="Tiệc trưa">
                        <label class="form-check-label" for="inlineRadio2">Tiệc trưa</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="typeParty" id="inlineRadio3" value="Tiệc tối">
                        <label class="form-check-label" for="inlineRadio3">Tiệc tối</label>
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group-inline form-check-inline">
                        <span class="input-group-text">Địa điểm</span>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="locationParty" id="inlineRadio1" value="Trong nhà">
                        <label class="form-check-label" for="inlineRadio1">Trong nhà</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="locationParty" id="inlineRadio2" value="Ngoài trời">
                        <label class="form-check-label" for="inlineRadio2">Ngoài trời</label>
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Tên quý khách</span>
                        <input type="text" aria-label="First name" class="form-control" name="name">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Địa chỉ liên lạc</span>
                        <input type="text" aria-label="First name" class="form-control" name="address">
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Độ tuổi</span>
                        <select class="form-select" aria-label="Default select example" name="age">
                            <option value="Dưới 19 tuổi" selected>Dưới 19 tuổi</option>
                            <option value="Từ 19 đến 34 tuổi">Từ 19 đến 34 tuổi</option>
                            <option value="Trên 34 tuổi">Trên 34 tuổi</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="col">
                        <div class="input-group-inline form-check-inline">
                            <span class="input-group-text">Giới tính</span>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderUser" id="inlineRadio1" value="Nam">
                            <label class="form-check-label" for="inlineRadio1">Nam</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="genderUser" id="inlineRadio2" value="Nữ">
                            <label class="form-check-label" for="inlineRadio2">Nữ</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Quý khách biết nhà hàng của chúng tôi qua</span>
                        <select class="form-select" multiple aria-label="Default select example" name="multimedia[]">
                            <option value="Báo chí" selected>Báo chí</option>
                            <option value="Đài phát thanh">Đài phát thanh</option>
                            <option value="Tivi">Tivi</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Yêu cầu kèm theo</span>
                        <textarea class="form-control" aria-label="With textarea" name="other"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 col-1 mx-auto">
                <button type="submit" class="btn btn-outline-primary" name="createPartyBtn" value="createPartyBtn">Đặt chỗ</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_GET["createPartyBtn"])) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $amountGuest = $_GET["amount-guest"];
        $dateParty = $_GET["date-party"];
        $dateParty = date("d-m-Y", strtotime($dateParty));
        $typeParty = $_GET["typeParty"];
        $locationParty = $_GET["locationParty"];
        $name = $_GET["name"];
        $address = $_GET["address"];
        $age = $_GET["age"];
        $genderUser = $_GET["genderUser"];
        $multimedia = $_GET["multimedia"];
        $other = $_GET["other"];
        echo '<h1 class="text-center">THÔNG TIN ĐẶT CHỖ</h1>';
        echo '<table class="table table-bordered w-50 mx-auto">';
        echo '<thead><th scope="col">Thông tin khách hàng</th><th scope="col">Thông tin đã đăng ký</th></thead>';
        echo '<tbody>';
        echo '<tr><td>Tên</td><td>' . $name . '</td></tr>';
        echo '<tr><td>Địa chỉ liên lạc</td><td>' . $address . '</td></tr>';
        echo '<tr><td>Độ tuổi</td><td>' . $age . '</td></tr>';
        echo '<tr><td>Giới tính</td><td>' . $genderUser . '</td></tr>';
        echo '<thead><th><b>Thông tin đặt chỗ</b></th></thead>';
        echo '<tr><td>Số khách tham dự</td><td>' . $amountGuest . '</td></tr>';
        echo '<tr><td>Ngày</td><td>' . $dateParty . '</td></tr>';
        echo '<tr><td>Loại tiệc</td><td>' . $typeParty . '</td></tr>';
        echo '<tr><td>Địa điểm</td><td>' . $locationParty . '</td></tr>';
        echo '<tr><td>Yêu cầu kèm theo</td><td>' . $other . '</td></tr>';
        echo '<thead><th><b>Quý khách biết đến nhà hàng qua</b></th></thead>';
        echo '<tr><td>Nguồn thông tin</td><td>';
        foreach ($multimedia as $choice) {
            echo $choice . '<br>';
        }
        echo '</td></tr>';
        echo '<tr><td>Chúng tôi đã nhận được thông tin vào lúc:</td><td>' . date("H:i:s - d/m/Y") . '</td></tr>';
        echo '</tbody></table>';
    }
    ?>
</body>

</html>