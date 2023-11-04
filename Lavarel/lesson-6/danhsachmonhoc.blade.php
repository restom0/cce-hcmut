@extends("Buoi06.layout")
@section("content")
<div class="h2 text-center bg-primary text-white p-3">Danh Sách Môn Học</div>
@if($tb = Session::get("tb"))
    <div class="h3 text-success">{{$tb}}</div>
@endif
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã Môn Học</th>
            <th>Tên Môn Học</th>
            <th>Số Tín Chỉ</th>
            <th>Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dsmh as $mh)
            <tr>
                <td>{{$mh->mamh}}</td>
                <td>{{$mh->tenmh}}</td>
                <td>{{$mh->sotinchi}}</td>
                <td>
                    <a href="{{route('suamonhoc',$mh->mamh)}}" class="btn btn-info">Sửa</a> | 
                    <a href="{{route('xuly_xoa_mh', $mh->mamh)}}" class="btn btn-danger"> Xóa </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    
@endsection