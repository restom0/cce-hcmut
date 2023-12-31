@extends('admin/layout/master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }} <br>
                            @endforeach
                        </div>
                    @endif
                    @if (session('thongbao'))
                        <div class="alert alert-danger">
                            {{ session('thongbao') }}
                        </div>
                    @endif
                    <form action="{{ route('xulythemtl') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Tên Thể Loại</label>
                            <input class="form-control" name="Ten" />
                        </div>
                        <button type="submit" class="btn btn-default">Lưu trữ</button>
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
