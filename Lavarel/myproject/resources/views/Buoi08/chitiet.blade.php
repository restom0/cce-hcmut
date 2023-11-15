@extends('Buoi07.master')

@section('noidung')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Chi Tiết Lớp Học</p>
            <div class="form-group">
                <label>Tên Lớp</label>
                <input type="text" class="form-control" value="{{ $lophoc->tenlop }}">
            </div>

            <div class="form-group">
                <label>Mã Khoa</label>
                <input type="text" class="form-control" value="{{ $lophoc->makhoa }}">
            </div>

            <div class="form-group">
                <label>JGiáo Viên Chủ Nhiệm</label>
                <input type="text" class="form-control" value="{{ $lophoc->gvcn }}">
            </div>

            <div class="form-group">
                <label>Sỉ Số</label>
                <input type="number" class="form-control" value="{{ $lophoc->siso }}">
            </div>

            <div class="form-group">
                <label>Học Phí</label>
                <input type="number" class="form-control" value="{{ $lophoc->hocphi }}">
            </div>
            <a href="{{ route('lophoc.index') }}" class="btn btn-primary mt-3">Quay lại</a>
        </div>
    </div>
@endsection
