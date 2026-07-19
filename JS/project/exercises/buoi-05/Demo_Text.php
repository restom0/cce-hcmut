<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo - Text</title>
</head>

<body>
    <script>
    var text = "Tài liệu học Javascript";
    var a = text.length;
    document.write(a);
    document.write("<hr>");
    document.write(text.toUpperCase());
    document.write("<hr>");
    document.write(text.toLowerCase());
    document.write("<hr>");
    text = "Tài liệu học HTML và tài liệu học CSS";
    a = text.indexOf("học"); //trả số n là chỉ số của chữ học đầu tiên
    a = text.lastIndexOf("học"); //trả số n là chỉ số của chữ học cuối
    a = text.charAt(10); //trích ký tự có chỉ số là 10 --> ọ
    a = text.substring(4, 14); //trích 1 chuỗi từ chỉ số 4 đến 14
    a = text.substr(4, 3); //trích 1 chuỗi từ chỉ số 4 và lấy 3 ký tự
    a = text.replace(/Học/ig,
        "tham khảo"); //tìm tất cả từ học thay thành tham khảo không phân biệt chữ hoa và chữ thường /ig
    document.write(a);
    </script>
</body>

</html>