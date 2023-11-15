@extends("Buoi06.layout")
@section("content")
<div class="h3 text-center">Thêm Môn Học Mới</div>
@if ($tb = Session::get("tb"))
    <div class="text-success">{{$tb}}</div>
@endif
<form action="{{route('xuly_sua_mh', $monhoc[0]->mamh)}}" method="post">
    @csrf
    <div class="mb-3">
        <label class="form-label">Tên Môn Học</label>
        <input type="text" name="tenmh" class="form-control"  value="{{$monhoc[0]->tenmh}}">
        @if($errors->has("tenmh"))
            <div class="text-danger">{{$errors->first("tenmh")}}</div>
        @endif
    </div>
    <div class="mb-3">
        <label class="form-label">Số Tín Chỉ</label>
        <input type="text" name="sotinchi" class="form-control"  value="{{$monhoc[0]->sotinchi}}">
        @if($errors->has("sotinchi"))
            <div class="text-danger">{{$errors->first("sotinchi")}}</div>
        @endif
    </div>
    <div class="mb-3">
        <input type="submit" name="luutru" class="btn btn-primary"  value=" Lưu trữ ">
    </div>
</form>
@endsection