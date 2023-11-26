@extends('admin.Layout.master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Slide
                        <small>Thêm</small>
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
                    <form action="{{ route('them_ds_sl') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="uploadfile" class="form-label">Tải file ảnh mới cho silde</label>
                            <input type="file" class="form-control" id="uploadfile" name="uploadfile">
                            @if ($errors->has('uploadfile'))
                                <span class="text-danger">{{ $errors->first('uploadfile') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="tenloaitin">Tên</label>
                            <input type="text" name="tenslide" placeholder="Thêm tên Silde">
                        </div>
                        <div class="form-group">
                            <label for="noidungslide">Nội dung</label>
                            <input type="text" name="noidungslide" placeholder="Thêm nội dung Silde">
                        </div>
                        <div class="form-group">
                            <label for="tenloaitin">Link</label>
                            <input type="text" name="linkslide" placeholder="Thêm link Silde">
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
