<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Tour</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <h1 class="text-center">ĐẶT TOUR DU LỊCH</h1>
    <form action="" method="get">
        <div class="container w-50">
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Tên tour</span>
                        <select class="form-select" aria-label="Chọn tour" name="tour-name">
                            <option value="Tour 1">Tour 1</option>
                            <option value="Tour 2">Tour 2</option>
                            <option value="Tour 3">Tour 3</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Ngày khởi hành</span>
                        <input type="date" aria-label="Ngày khởi hành" class="form-control" name="departure-date">
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Phương tiện di chuyển</span>
                        <select class="form-select" aria-label="Phương tiện" name="transportation">
                            <option value="Xe ô tô">Xe ô tô</option>
                            <option value="Máy bay">Máy bay</option>
                            <option value="Tàu hỏa">Tàu hỏa</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Số lượng đăng ký</span>
                        <input type="text" aria-label="Số lượng đăng ký" class="form-control" name="registration-count">
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Tên khách hàng</span>
                        <input type="text" aria-label="Tên khách hàng" class="form-control" name="customer-name">
                    </div>
                </div>
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Liên hệ theo địa chỉ</span>
                        <input type="text" aria-label="Địa chỉ liên hệ" class="form-control" name="contact-address">
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Số điện thoại</span>
                        <input type="text" aria-label="Số điện thoại" class="form-control" name="phone-number">
                    </div>
                </div>
            </div>
            <div class="row align-items-start mb-3">
                <div class="col">
                    <div class="input-group">
                        <span class="input-group-text">Yêu cầu kèm theo</span>
                        <textarea class="form-control" aria-label="Yêu cầu khác" name="additional-requests"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 col-2 mx-auto">
                <button type="submit" class="btn btn-outline-primary" name="bookTourBtn" value="bookTourBtn">Đặt tour</button>
            </div>
        </div>
    </form>
    <?php
    if (isset($_GET["bookTourBtn"])) {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $tourName = $_GET["tour-name"];
        $departureDate = $_GET["departure-date"];
        $departureDate = date("d-m-Y", strtotime($departureDate));
        $transportation = $_GET["transportation"];
        $registrationCount = $_GET["registration-count"];
        $customerName = $_GET["customer-name"];
        $contactAddress = $_GET["contact-address"];
        $phoneNumber = $_GET["phone-number"];
        $additionalRequests = $_GET["additional-requests"];

        echo '<h1 class="text-center">THÔNG TIN ĐẶT TOUR DU LỊCH</h1>';
        echo '<table class="table table-bordered w-50 mx-auto">';
        echo '<thead><th scope="col">Thông tin khách hàng</th><th scope="col">Thông tin đặt tour</th></thead>';
        echo '<tbody>';
        echo '<tr><td>Tên khách hàng</td><td>' . $customerName . '</td></tr>';
        echo '<tr><td>Liên hệ theo địa chỉ</td><td>' . $contactAddress . '</td></tr>';
        echo '<tr><td>Số điện thoại</td><td>' . $phoneNumber . '</td></tr>';
        echo '<thead><th><b>Thông tin đặt tour</b></th></thead>';
        echo '<tr><td>Tên tour</td><td>' . $tourName . '</td></tr>';
        echo '<tr><td>Ngày khởi hành</td><td>' . $departureDate . '</td></tr>';
        echo '<tr><td>Phương tiện di chuyển</td><td>' . $transportation . '</td></tr>';
        echo '<tr><td>Số lượng đăng ký</td><td>' . $registrationCount . '</td></tr>';
        echo '<tr><td>Yêu cầu kèm theo</td><td>' . $additionalRequests . '</td></tr>';
        echo '<tr><td>Chúng tôi đã nhận được thông tin vào lúc:</td><td>' . date("H:i:s - d/m/Y") . '</td></tr>';
        echo '</tbody></table>';
    }
    ?>
</body>

</html>