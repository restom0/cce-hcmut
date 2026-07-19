<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài Tập 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .ddbang {
            border: 1px solid #00ff00;
            border-collapse: collapse;
            background-color: #98FB98;
        }
    </style>
</head>

<body onload="tb.innerHTML ='Chào Bạn ' + prompt('Hãy Nhập Họ tên');">
    <form>
        <table align="center" border="1" class="ddbang" cellspacing="0" cellpadding="10" width="500">
            <tr>
                <td>
                    <div id="tb" style="color:#FF00FF"></div>
                </td>
            </tr>
            <tr>
                <td class="ddbang">
                    nhập tên bạn:
                    <input type="text" name="hoten" id="hoten" value="" size="40">
                </td>
            </tr>
            <tr>
                <td>
                    <input type="button" name="xuatcc" value="Thay đổi Câu Chào" onclick="tb.innerHTML = 'Chào Bạn ' + hoten.value">
                </td>
            </tr>
        </table>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>