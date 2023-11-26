@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Thông tin người dùng
                        <small>Sửa</small>
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
                    <form action="{{ route('sua_ds_usr') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="username">ID User:</label>
                            <input type="text" class="form-control" name="id" id="id"
                                value="{{ $user->id }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="username">Tên User:</label>
                            <input type="text" class="form-control" name="username" id="username"
                                value="{{ $user->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="text" class="form-control" name="email" id="email"
                                value="{{ $user->email }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="quyen">Quyền:</label><select name="quyen" id="quyen">
                                <option value="0" @if ($user->quyen == 0) {{ 'checked' }} @endif>Guest
                                </option>
                                <option value="1" @if ($user->quyen == 1) {{ 'checked' }} @endif>Admin
                                </option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <a href="{{ route('danhsach_tl') }}" class="btn btn-default">Trở về</a>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
