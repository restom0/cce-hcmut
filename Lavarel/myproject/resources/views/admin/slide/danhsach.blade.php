@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Danh sách</small>
                    </h1>
                </div>
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('thongbao') }}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên</th>
                            <th>Hình</th>
                            <th>Nội dung</th>
                            <th>Link</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($slide as $sl)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $sl->id }}</td>
                                <td>{{ $sl->Ten }}</td>
                                <td><img src="../resources/image/slide/{{ $sl->Hinh }}"
                                        style="max-width:
150px;"alt="{{ $sl->NoiDung }}"></td>
                                <td>{{ $sl->NoiDung }}</td>
                                <td>{{ $sl->link }}</td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i><a
                                        href="{{ route('sua_ds_sl', $sl->id) }}">Edit</a></td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i> <a
                                        href="{{ route('xoa_sl', $sl->id) }}">Delete</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
