<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Trang Chủ</title>
    <base href="{{ asset('/') }}">
</head>

<body>
    <div class="container mb-4">
        <div class="float-start">
            <img src="images/Icon_BK.jfif" width="70"> TTĐTBK
        </div>
        <form class="d-flex float-end p-2">
            <input class="form-control me-2" type="search" placeholder="Nhập từ khóa" arialabel="Search">
            <button class="btn btn-outline-success" type="submit"> Tìm </button>
        </form>
        <ul class="nav nav-pills justify-content-center p-2">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Môn Học</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('lkmh') }}">Liệt kê</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="{{ route('thmh') }}">Thêm mới</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Khoa</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item">Liệt kê</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item">Thêm mới</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Sinh viên</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item">Liệt kê</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item">Thêm mới</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">Kết quả</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item">Liệt kê</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item">Thêm mới</a></li>
                </ul>
            </li>
        </ul>
    </div>
    <div class="container mt-1 bg-info" style="clear:both">
        @yield('noidung')</div>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
