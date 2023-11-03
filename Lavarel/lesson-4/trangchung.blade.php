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
        <!-- header -->
        <div class="alert alert-primary h2 text-center"> 
            ĐỌC TRUYỆN CƯỜI TRỰC TUYẾN
        </div>
        <!--content-->
        <div class="row">
            <div class="col-md-3">
                <div class="accordion" id="accordionExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Truyện Cười
                        </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <ul class="list-group">
                                <li class="list-group-item"><a href="{{route('index')}}">Trang Chủ</a></li>
                                    <li class="list-group-item"><a href="{{route('truyen', 1)}}">Chuyện cười 1</a></li>
                                    <li class="list-group-item"><a href="{{route('truyen', 2)}}">Chuyện cười 2</a></li>
                                    <li class="list-group-item"><a href="{{route('truyen', 3)}}">Chuyện cười 3</a></li>
                                    <li class="list-group-item">A fourth item</li>
                                    <li class="list-group-item">And a fifth one</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                                        
                </div>
            </div>
            <div class="col-md-9">
                @yield("noidung")
            </div>
        </div>
        <!-- Footer -->
        <div class="alert alert-primary h6 text-center"> 
            Bản Quyền &copy; 2023
        </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>