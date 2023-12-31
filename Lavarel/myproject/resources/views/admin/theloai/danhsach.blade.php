@extends('admin/layout/master')
@section('content')
    <!-- Page Content -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thể Loại
                        <small>Danh Sách</small>
                    </h1>
                </div><!-- /.col-lg-12 -->
                @if (session('thongbao'))
                    <div class="alert alert-info">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>Mã</th>
                            <th>Tên</th>
                            <th>Tên Không Dấu</th>
                            <th colspan="2">Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($theloai as $tl)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $tl->id }}</td>
                                <td>{{ $tl->Ten }}</td>
                                <td>{{ $tl->TenKhongDau }}</td>
                                <td>Hiện</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                        href="{{ route('xoatl', [$tl->id]) }}"> Xóa </a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{ route('suatl', [$tl->id]) }}"> Sửa </a></td>
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
