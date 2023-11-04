@extends("Buoi06.layout")
@section("content")
    <div class="h2 text-center bg-primary text-white p-3">Truy Vấn Bằng Lớp DB của Laravel</div>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-bordered">
                <caption>Nhiều Bảng - cách 01</caption>
                <thead>
                    <tr>
                        <th>Mã Sinh Viên</th>
                        <th>Họ Và tên</th>
                        <th>Tên Lớp</th>
                    </tr>
                </thead>
                <tbody class="bg-success">
                    @foreach($dsmh_c1 as $mh)
                        <tr>
                            <td>{{$mh->masv}}</td>
                            <td>{{$mh->hosv . " " . $mh->tensv}}</td>
                            <td>{{$mh->tenlop}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-6">
        <table class="table table-bordered">
                <caption>nhiều bảng  - cách 02</caption>
                <thead>
                    <tr>
                        <th>Mã Sinh Viên</th>
                        <th>Họ Và tên</th>
                        <th>Tên Lớp</th>
                    </tr>
                </thead>
                <tbody class="bg-info">
                    @foreach($dsmh_c2 as $mh)
                        <tr>
                            <td>{{$mh->masv}}</td>
                            <td>{{$mh->hosv . " " . $mh->tensv}}</td>
                            <td>{{$mh->tenlop}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection