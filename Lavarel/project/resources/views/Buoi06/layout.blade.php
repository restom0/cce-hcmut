<!DOCTYPE html>
<html lang="vi">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Truy Vấn DB - Buổi 06</title>
        <base href="{{asset('')}}"/>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="sources/assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="sources/css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('lietke1')}}">Liệt Kê 01</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('lietke2')}}">Liệt Kê 02</a>
                </div>
                <div class="accordion" id="Bangdieukhien">
                    <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#monhoc" aria-expanded="true" aria-controls="collapseOne">
                            Quản Lý Môn Học
                            </button>
                            </h2>
                        <div id="monhoc" class="accordion-collapse collapse show" data-bs-parent="#Bangdieukhien">
                            <div class="accordion-body">
                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('danhsachmonhoc')}}">Danh Sách</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('themmonhoc')}}">Thêm</a>
                                
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                            <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#lophoc" aria-expanded="true" aria-controls="collapseOne">
                            Quản Lý Lớp Học
                            </button>
                            </h2>
                        <div id="lophoc" class="accordion-collapse collapse show" data-bs-parent="#Bangdieukhien">
                            <div class="accordion-body">
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('danhsachmonhoc')}}">Danh Sách</a>
                                <a class="list-group-item list-group-item-action list-group-item-light p-3" href="{{route('themmonhoc')}}">Thêm</a>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-primary" id="sidebarToggle">Bật/Tắt Menu</button>
                    </div>
                </nav>
                <!-- Page content-->
                <div class="container-fluid">
                    @yield("content")
                </div>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="sources/js/scripts.js"></script>
    </body>
</html>
