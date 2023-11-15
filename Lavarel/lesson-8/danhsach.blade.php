@extends("Buoi07.master")
@section("noidung")
<div class="h2 text-center bg-primary text-white p-3">Danh Sách Lớp Học</div>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Mã Lớp</th>
            <th>Tên Lớp</th>
            <th>Mã Khoa</th>
            <th>Chủ Nhiệm</th>
            <th>Sỉ Số</th>
            <th>Học Phí</th>
            <th colspan="2">Thao tác</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dslh as $lh)
            <tr>
                <td>{{$lh->malop}}</td>
                <td>{{$lh->tenlop}}</td>
                <td>{{$lh->makhoa}}</td>
                <td>{{$lh->gvcn}}</td>
                <td>{{$lh->siso}}</td>
                <td>{{$lh->hocphi}}</td>
                <td>
                    <a href="{{route('lophoc.edit',$lh->malop)}}" class="btn btn-info">Sửa</a> |
                    <a href="{{route('lophoc.show',$lh->malop)}}" class="btn btn-success">Chi tiết</a>
                </td>
                <td>
                    <form action="{{ route('lophoc.destroy',$lh->malop) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Xóa</button>
                    </form>
                   
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection