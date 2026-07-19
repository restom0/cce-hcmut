@extends("Buoi06.layout")
@section("content")
    <div class="h2 text-center bg-primary text-white p-3">Truy Vấn Bằng Lớp DB của Laravel</div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Danh Sách Sinh Viên - cách 01</caption>
                <thead>
                    <tr>
                        <th>Mã Sinh Viên</th>
                        <th>Họ Và tên</th>
                        <th>Giới Tính</th>
                    </tr>
                </thead>
                <tbody class="bg-success">
                    @foreach($dssv_c1 as $sv)
                        <tr>
                            <td>{{$sv->masv}}</td>
                            <td>{{$sv->hosv . " " . $sv->tensv}} </td>
                            <td>{{$sv->phai}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
        <table class="table table-bordered">
                <caption>Danh Sách Sinh Viên - cách 01</caption>
                <thead>
                    <tr>
                        <th>Mã Sinh Viên</th>
                        <th>Họ Và tên</th>
                        <th>Giới Tính</th>
                    </tr>
                </thead>
                <tbody class="bg-success">
                    @foreach($dssv_c2 as $sv)
                        <tr>
                            <td>{{$sv->masv}}</td>
                            <td>{{$sv->hosv . " " . $sv->tensv}} </td>
                            <td>{{$sv->phai}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection