<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bài tập 01 - hình chữ nhật</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="alert alert-primary text-center">Tính Chu Vi - Diện Tích Hình Chữ Nhật</div>
            <table class="table table-bordered border-primary">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Thông Tin Hình Chữ Nhật</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Chiều rộng: 3.2m x Chiều dài: 13.5m</td>
                        <td>
                            <a href="{{route('hcn1',[3.2,13.5])}}" class="btn btn-success">Tính</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Chiều rộng: 6.4m x Chiều dài: 20m</td>
                        <td>
                            <a href="{{route('hcn1',[6.2,20])}}" class="btn btn-success">Tính</a>
                        </td>
                    </tr>
                </tbody>
                @if (isset($dt))
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-center">Chu vi = {{$cv}}m - Diện tích = {{$dt}}m<sup>2</sup></th>
                        </tr>
                    </tfoot>
                @endif
                
            </table>
        </div>
        <div class="col-md-3"></div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>