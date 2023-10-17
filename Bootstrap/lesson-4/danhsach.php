<?php
$conn = @new mysqli("localhost", "root", null, "ql_ban_giay");
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Kết nối thất bại " . $conn->connect_error);
}
?>
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
        <div class="text-center h3">Create, Read, Update and Delete By Bootstrap Modal</div>
        <div class="my-2">
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalthem">Thêm Mới Sản Phầm</a>
        </div>
        <table class="table table-striped-columns w-100">
            <caption></caption>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Mã Loại</th>
                    <th scope="col">Tên Giày</th>
                    <th scope="col">Giá Khuyến Mãi</th>
                    <th scope="col">Giá Góc</th>
                    <th scope="col">Hình Sản Phẩm</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "Select * from giay order by id DESC";
                $rs  = $conn->query($sql);
                while ($row = $rs->fetch_assoc()) {
                    $id = $row["id"];
                    $ml = $row["maloai"];
                    $tg = $row["ten_giay"];
                    $km = $row["gia_khuyenmai"];
                    $gg = $row["gia_goc"];
                    $hi = $row["hinh"];

                    echo "<tr class='nutsua'>";
                    echo "<td>$id</td><td>$ml</td><td>$tg</td><td>$km</td><td>$gg</td>";
                    echo "<td><img src='../hinh/$hi' width='70' height='70' alt='$hi'></td>";
                    echo "<td><a href='#' class='nutsua' data-bs-toggle='modal' data-bs-target='#modalsua'>Sữa</a> | <a href='#' class='nutxoa' data-bs-toggle='modal' data-bs-target='#modalxoa'>xóa</a>  </td>";
                    echo "<tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
    <!-- Modal thêm Giày Mới -->
    <div class="modal fade" id="modalthem" tabindex="-1">
        <form action="xulyluutru.php" method="POST" enctype="multipart/form-data">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Sản Phẩm Mới</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label class="form-label">Chọn loại Giày</label>
                        <select class="form-select" name="maloai">
                            <option value="1">Nam</option>
                            <option value="2">Nữ</option>
                        </select>
                        <label class="form-label">Tên Giày</label>
                        <input type="text" name="tengiay" class="form-control">
                        <label class="form-label">Giá Khuyên mãi</label>
                        <input type="text" name="giakm" class="form-control">
                        <label class="form-label">Giá góc</label>
                        <input type="text" name="giagoc" class="form-control">
                        <label class="form-label">Hình Sản Phẩm</label>
                        <input type="file" name="hinhsp" class="form-control">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" name="luutru">Lưu trữ</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Kết Thúc Thêm -->
    <!-- Model Sữa Thông tin Giày -->
    <div class="modal" tabindex="-1" id="modalsua">
        <form action="xulycapnhat.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sữa Thông Tin Giày</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Chọn loại giày</label>
                            <select class="form-control" name="maloai" size="1" id="maloai">
                                <option value='1'>Nam</option>;
                                <option value='2'>Nữ</option>;
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tên Giày</label>
                            <input type="text" class="form-control" name="tengiay" value="" id="tengiay">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá Khuyến Mãi</label>
                            <input type="text" class="form-control" name="giakm" value="" id="giakm">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Giá Góc</label>
                            <input type="text" class="form-control" name="giagoc" value="" id="giagoc">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Chọn Hình Sản Phẩm</label>
                            <div class="form-label"><img src="" width="100" alt="hinh" id="hinh"></div>
                            <input type="file" class="form-control" name="hinh" value="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                        <button type="submit" class="btn btn-primary" name="capnhat">Cập Nhật</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Kết Thúc Sữa -->
    <!--Modal Xoa san pham -->
    <div class="modal fade" id="modalxoa">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá Sản Phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="xulyxoa.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="delete_id" id="delete_id">
                    <input type="hidden" name="filename" id="filename">
                    <div>Mã Sản phẩm <span id="masp"></span> có hình là : <img src="" id="xoahinh" width="50" alt="" border="1"></div>
                    <h4>bạn có muốn xoá sản phẩm này không ??</h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Không xóa</button>
                    <button type="submit" name="deletedata" class="btn btn-primary"> Xoá </button>
                </div>
            </form>
        </div>
    </div>
</div>
    <!-- Ket thuc xoa sanpham -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('.nutsua').on('click', function() {
                var tr = $(this).closest('tr');
                var data = tr.children("td").map(function() {
                    if ($(this).children("img").length == 1)
                        return $(this).children("img").attr("alt");
                    else

                        return $(this).html();
                }).get();

                $('#id').val(data[0]);
                $('#maloai').val(data[1]);
                $('#tengiay').val(data[2]);
                $('#giakm').val(data[3]);
                $('#giagoc').val(data[4]);
                $('#hinh').attr("src", "../hinh/" + data[5]);
                
            });
            $('.nutxoa').on('click', function() {
                var tr = $(this).closest('tr');
                var data = tr.children("td").map(function() {
                if ($(this).children("img").length == 1)
                    return $(this).children("img").attr("alt");
                 else
                    return $(this).html();
            }).get();
            $('#delete_id').val(data[0]);
            $('#masp').html(data[0]);
            $('#filename').val(data[5]);
            $('#xoahinh').attr("src", "../hinh/" + data[5]);
    });
        });

    </script>
</body>

</html>