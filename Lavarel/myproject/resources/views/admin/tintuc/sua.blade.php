@extends('admin/layout/master')
@section('content')
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Tin tức
                        <small>{{ $tintuc->TieuDe }}</small>
                    </h1>
                </div>
                <div class="col-lg-7" style="padding-bottom:120px">
                    @if (count($errors) > 0)
                        <div class="alter alter-danger">
                            @foreach ($errors->all() as $err)
                                {{ $err }}<br>
                            @endforeach
                        </div>
                    @endif
                    <form action="{{ route('sua_ds_tt', $tintuc->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="theloai">Thể loại</label>
                            <select name="theloai" id="theloai" class="form-control">
                                @foreach ($theloai as $tl)
                                    <option value="{{ $tl->id }}"
                                        @if ($tintuc->loaitin->theloai->id == $tl->id) {{ 'selected' }} @endif>{{ $tl->Ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="loaitin">Loại tin</label>
                            <select name="loaitin" id="loaitin" class="form-control">
                                @foreach ($loaitin as $lt)
                                    <option value="{{ $lt->id }}"
                                        @if ($tintuc->loaitin->id == $lt->id) {{ 'selected' }} @endif>{{ $lt->Ten }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tieude">Tiêu đề</label>
                            <input type="text" class="form-control" name="tieude" id="tieude"
                                placeholder="Nhập tên tiêu đề cho tin tức" value="{{ $tintuc->TieuDe }}">
                        </div>
                        <div class="form-group">
                            <label for="tomtat">Tóm tắt</label>
                            <textarea name="tomtat" class="form-control" id="tomtat" rows="3" placeholder="Nhập tóm tắt nội dung tin tức">{{ $tintuc->TomTat }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="noidung">Nội dung</label>
                            <textarea name="noidung" class="form-control" id="noidung" rows="5" placeholder="Nhập nội dung tin tức"> {{ $tintuc->NoiDung }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="filehinh">Ảnh cho tin tức</label>
                            <img src="../resources/image/tintuc/{{ $tintuc->Hinh }}" width="200px" alt="">
                            <input type="file" name="filehinh" class="form-control" id="filehinh">
                        </div>
                        <div class="form-group">
                            <label for="noibat">Nổi bật</label>
                            <label class="radio-inline">
                                <input type="radio" name="noibat" id="noibat" value="0"
                                    @if ($tintuc->NoiBat == 0) {{ 'checked' }} @endif> Không
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="noibat" id="noibat" value="1"
                                    @if ($tintuc->NoiBat == 1) {{ 'checked' }} @endif> Có
                            </label>
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
@section('script')
    <script>
        $d(document).ready(function() {
            $("#theloai").change(function() {
                var idth = $(this).val();
                $.get('admin/ajax/loaitin/' + idlt, function(data) {
                    $("#loaitin").html(data);
                })
            })
        })
    </script>
@endsection
