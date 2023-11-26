@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">User
                        <small>Thêm</small>
                    </h1>
                </div>
                <!-- /.col-lg-12 -->
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if (count($errors) > 0)
                        <div class="alter alter-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('them_ds_usr') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">Tên User:</label>
                            <input type="text" class="form-control" name="username" id="username"
                                placeholder="Nhập tên user">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email"
                                placeholder="Nhập
email user">
                        </div>
                        <div class="form-group">
                            <label for="password1">Password:</label>
                            <input type="password" class="form-control" name="password1" id="password1"
                                placeholder="Nhập password">
                        </div>
                        <div class="form-group">
                            <label for="password2">Nhập lại Password:</label>
                            <input type="password" class="form-control" name="password2" id="password2"
                                placeholder="Nhập lại password">
                        </div>
                        <div class="form-group">
                            <label for="quyen">Quyền:</label>
                            <select name="quyen" id="quyen">
                                <option value="0">Guest</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Thêm</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
