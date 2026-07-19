@extends('Buoi07.master')
@section('noidung')
    <div class="h2 alert alert-info text-center">Cập nhật môn học</div>
    <form action="{{ route('cnmh', $monhoc->mamh) }}" method="post">
        @csrf
        <div class="form-group">
            <strong>Tên môn học</strong>
            <input type="text" name="tenmh" class="form-control" value="{{ $monhoc->tenmh }}">
            @if ($errors->has('tenmh'))
                <span class="text-danger">{{ $errors->first('tenmh') }}</span>
            @endif
        </div>
        <div class="form-group">
            <strong>Số Tín Chỉ</strong>
            <input type="number" name="sotinchi" class="form-control" value="{{ $monhoc->sotinchi }}">
            @if ($errors->has('sotinchi'))
                <span class="text-danger">{{ $errors->first('sotinchi') }}</span>
            @endif
        </div>
        <div class="form-group my-2">
            <input type="submit" name="save" class="btn btn-primary" value=" Cập Nhật ">|
            <a href="{{ route('lkmh') }}" class="btn btn-warning"> Trở về </a>
        </div>
    </form>
@endsection
