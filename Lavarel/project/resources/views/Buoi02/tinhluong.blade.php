<!doctype html>
<html lang="vi">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap demo</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="h2 text-center">Tính Lương Nhân Viên</div>
                <form action="" class="form-control" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Ngày Công</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$nc??null}}" name="ngaycong">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label class="col-sm-4 col-form-label">Lương Ngày</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" value="{{$lg??null}}" name="luongngay">
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="tinh" value=" Tính Lương " class="btn btn-primary">
                    </div>
                </form>
                @if (isset($lt))
                    <div class="h3 text-success text-center">
                        Lương tháng là: {{$lt}}
                    </div>
                @endif
            </div>
            <div class="col-md-4"></div>
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>