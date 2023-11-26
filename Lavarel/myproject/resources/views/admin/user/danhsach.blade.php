@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Người dùng
                        <small>Danh sách</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên Người Dùng</th>
                            <th>Email</th>
                            <th>Quyền</th>
                            <th>Delete</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $usr)
                            <tr class="odd gradeX" align="center">
                                <td>{{ $usr->id }}</td>
                                <td>{{ $usr->name }}</td>
                                <td>{{ $usr->email }}</td>
                                <td>{{ $usr->quyen }}</td>
                                <td class="center"><i class="fa fa-trash-o fa-fw"></i><a
                                        href="{{ route('xoa_usr', $usr->id) }}"> Delete</a></td>
                                <td class="center"><i class="fa fa-pencil fa-fw"></i> <a
                                        href="{{ route('sua_ds_usr', $usr->id) }}">Edit</a></td>
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
