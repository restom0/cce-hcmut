<!doctype html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bài Tập 01</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .ddbang {border:1px solid #990000; 
                 border-collapse:collapse;
                background-color: #98FB98;
            }
        td {border:1px solid #990000;}
    </style>
</head>
<body>
    <form>
        <h1 align="center">Tính Lương Nhn Viên</h1>
        <table align="center" border="1" class="ddbang" cellspacing="0" cellpadding="10" width="500">
            <tr>
                <td>
                    Ngày Công
                </td>
                <td>
                    <input type="text" name="nc" id="nc" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                    Lương Một Ngày
                </td>
                <td>
                    <input type="text" name="l1n" id="l1n" value=""/>
                </td>
            </tr>
            <tr>
                <td>
                    Lương Tháng
                </td>
                <td>
                    <input type="text" name="lt" id="lt" value="" readonly/>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="button" name="tinhlt" value="Tính Lương Tháng" onclick="lt.value= parseInt(nc.value) * parseInt(l1n.value)">
                    <input type="button" name="lammoi" value=" Làm Mới " onclick="nc.value=''; l1n.value=''; lt.value=''; nc.focus()">
                </td>
            </tr>
        </table>
    </form>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>