<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Date</title>
</head>
<body>
    <script>
        var ngay = new Date();
        var kq = ngay.getDay(); //trả 1 con số từ 0 - 6 là thứ trong trong tuần
        kq = ngay.getDate();    //trả về 1 con số từ 1 -> 31 là số chỉ ngày trong tháng
        kq = ngay.getMonth();   // trả về 1 con số từ 0 -> 11 là số chỉ tháng trong năm
        kq = ngay.getYear();
        document.write(kq);
    </script>
</body>
</html>