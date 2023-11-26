@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Sửa</small>
                    </h1>
                </div>
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{ session('loi') }}
                    </div>
                @endif
                @if (count($errors) > 0)
                    @foreach ($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                @endif
                <div class="col-lg-7" style="padding-bottom:120px">
                    <form action="{{ route('sua_ds_sl', $slide->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <img src="../resources/image/slide/{{ $slide->Hinh }}" alt="{{ $slide->Ten }}"
                                style="max-width: 150px;">
                            <label for="uploadfile" class="form-label">Tải file ảnh mới cho silde</label>
                            <input type="file" class="form-control" id="uploadfile" name="uploadfile">
                            @if ($errors->has('uploadfile'))
                                <span class="text-danger">{{ $errors->first('uploadfile') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tenloaitin">Tên</label>
                            <input type="text" name="tenslide" value="{{ $slide->Ten }}">
                        </div>
                        <div class="form-group">
                            <label for="noidungslide">Nội dung</label>
                            <input type="text" name="noidungslide" value="{{ $slide->NoiDung }}">
                        </div>
                        <div class="form-group">
                            <label for="tenloaitin">Link</label>
                            <input type="text" name="linkslide" value="{{ $slide->link }}">
                        </div>
                        <button type="submit" class="btn btn-default">Sửa</button>
                        <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
@endsection
