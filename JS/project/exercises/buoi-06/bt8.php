<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
    body {
        font-family: cambria, Arial, Helvetica, sans-serif;
        line-height: 1.5;
        font-size: 14px;
    }

    .tabs-menu {
        height: 30px;
        float: left;
        clear: both;
        list-style-type: none;
    }

    .tabs-menu li {
        height: 30px;
        line-height: 30px;
        float: left;
        margin-right: 10px;
        background-color: #ccc;
        border-top: 1px solid #d4d4d1;
        border-right: 1px solid #d4d4d1;
        border-left: 1px solid #d4d4d1;
    }

    .tabs-menu li.current {
        position: relative;
        background-color: #fff;
        border-bottom: 1px solid #fff;
        z-index: 5;
    }

    .tabs-menu li a {
        padding: 10px;
        text-transform: uppercase;
        color: #fff;
        text-decoration: none;
    }

    .tabs-menu li.current a {
        color: #2e7da3;
    }

    .tab {
        border: 1px solid #d4d4d1;
        background-color: #fff;
        float: left;
        margin-bottom: 20px;
        width: auto;
        clear: both;
    }

    .tab-content {
        width: 660px;
        padding: 20px;
        display: none;
    }

    #tab-1 {
        display: block;
    }
    </style>
</head>

<body>
    <div id="tabs-container">
        <ul class="tabs-menu">
            <li class="current"><a href="#tab-1">Pháp Luật</a></li>
            <li><a href="#tab-2">Thể Thao</a></li>
            <li><a href="#tab-3">Giáo Dục</a></li>
            <li><a href="#tab-4">Kinh Doanh</a></li>
        </ul>
        <div class="tab">
            <div id="tab-1" class="tab-content">
                <p>Đại úy công an cầm đầu đường dây buôn lậu" hơn 200 tỷ đồng TP HCM
                    cảnh sát kinh tế đã móc nối thành lập 47 công ty để nhập lậu lượng lớn
                    hàng hóa trị giá hơn 211 tỷ đồng.</p>
            </div>
            <div id="tab-2" class="tab-content">
                <p>Messi lập cú đúp cho Argentina. Tiền đạo 35 tuổi Lionel Messi ghi hai bàn và phát động tấn công dẫn
                    đến bàn còn lại trong trận giao hữu thắng Honduras 3-0</p>
            </div>
            <div id="tab-3" class="tab-content">
                <p>TP HCM lần đầu thì tuyến phố hiệu trưởng
                    Năm 2022, Sở Giáo dục và Đào tạo TP HCM lần đầu tổ chức thi tuyển ba phó hiệu trưởng tại
                    các trường THPT An Nhơn Tây, Quang Trung và An Nghĩa.</p>
            </div>
            <div id="tab-4" class="tab-content">
                <p>Cơ chế đặc thù cho TP Buôn Ma Thuột bị chê ít - TP Buôn Ma Thuột sẽ được thí điểm cơ chế ưu đãi về
                    tài chính, thuế cho doanh nghiệp,
                    nhưng thành viên Uỷ ban Thường vụ Quốc hội cho rằng như vậy là ít, dập khuôn và lối mòn.</p>
            </div>
        </div>
    </div>
    <script>
    $(document).ready(function() {
        $(".tabs-menu a").click(function(event) {
            event.preventDefault();
            $(this).parent().addClass("current");
            $(this).parent().siblings().removeClass("current");
            var tab = $(this).attr("href");
            $(".tab-content").not(tab).css("display", "none");
            $(tab).fadeIn();
        });
    });
    </script>

</body>

</html>