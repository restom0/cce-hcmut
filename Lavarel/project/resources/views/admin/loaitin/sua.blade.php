@extends('admin/layout/master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Tin
                        <small>{{ $loaitin->Ten }}</small>
                    </h1>
                </div>
                @if ($errors > 0)
                    <div class="alert alert-danger">
                        @foreach ($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="admin/loaitin/sua/{{ $lt->id }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Thể Loại</label>
                            <select class="form-control" name="theloai">
                                @foreach ($theloai as $tl)
                                    <option @if ($loaitin->idTheLoai == $tl->id) {{ 'selected' }} @endif
                                        value="{{ $tl->id }}">{{ $tl->Ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tên Loại Tin</label>
                            <input class="form-control" name="ten" value="{{ $loaitin->Ten }}" />
                        </div>
                        <button type="submit" class="btn btn-default">Cập Nhật</button>
                        <button type="reset" class="btn btn-default">Làm Mới</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
