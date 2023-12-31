@extends('admin/layout/master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Loại Tin
                        <small>Danh Sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                @if (session('thongbao'))
                    <div class="alert alert-info">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTablesexample">
                    <thead>
                        <tr align="center">
                            <th>Mã Loại Tin</th>
                            <th>Tên Loại Tin</th>
                            <th>Tên Thể Loại</th>
                            <th>Tên Không Dấu</th>
                            <th colspan="2">Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($loaitin as $lt)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $lt->id }}</td>
                                <td>{{ $lt->Ten }}</td>
                                <td>{{ $lt->TheLoai->Ten }}</td>
                                <td>{{ $lt->TenKhongDau }}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                        href="{{ route('xulyxoalt', $lt->id) }}">Xóa</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{ route('sualt', $lt->id) }}">Sửa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->
@endsection
