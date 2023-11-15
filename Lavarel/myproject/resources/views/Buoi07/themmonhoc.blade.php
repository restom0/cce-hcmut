@extends('buoi07.master')
@section('noidung')
    <div class="h2 alert alert-info text-center">Thêm môn học mới</div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops</strong> Bạnnhập dữ liệu không hợp!!!<br><br>
        </div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{ route('ltmh') }}" method="post">
        @csrf
        <div class="form-group">
            <strong>Tên môn học</strong>
            <input type="text" name="tenmh" class="form-control" value="">
        </div>
        <div class="form-group">
            <strong>Số Tín Chỉ</strong>
            <input type="number" name="sotinchi" class="form-control" value="">
        </div>
        <div class="form-group my-2">
            <input type="submit" name="save" class="btn btn-primary" value=" Lưu Trữ "> |
            <a href="{{ route('lkmh') }}" class="btn btn-warning">Trở về</a>
        </div>
    </form>
@endsection
