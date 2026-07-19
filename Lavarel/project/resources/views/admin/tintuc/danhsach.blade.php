@extends('admin/layout/master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin Tức
                        <small>Danh sách</small>
                    </h1>
                </div>
                @if ($message = Session::get('thongbao'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTablesexample">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tiêu Đề</th>
                            <th>Tóm tắt</th>
                            <th>Nội dung</th>
                            <th>Hình</th>
                            <th>Nổi bật</th>
                            <th>Số lượt xem</th>
                            <th>Id Loại Tin</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tintuc as $tt)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $tt->id }}</td>
                                <td>{{ $tt->TieuDe }}</td>
                                <td>{{ $tt->TomTat }}</td>
                                <td>{{ $tt->NoiDung }}</td>
                                <td><img src="../resources/image/tintuc/{{ $tt->Hinh }}"
                                        style="maxwidth: 150px;"alt="{{ $tt->NoiDung }}"></td>
                                <td>{{ $tt->NoiBat }}</td>
                                <td>{{ $tt->SoLuotXem }}</td>
                                <td>{{ $tt->idLoaiTin }}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                        href="{{ route('xoa_tt', $tt->id) }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{ route('sua_ds_tt', $tt->id) }}">Edit</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $tintuc->links() }}
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
</div @endsection
