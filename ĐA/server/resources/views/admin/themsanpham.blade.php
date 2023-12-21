@extends('admin.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Sản phẩm
                    <small>Thêm mới</small>
                </h1>
            </div>
        </div>
        @if (Session::has('loi'))
            <p class="alert alert-warning">{{ Session::get('loi') }}</p>
        @endif
        @if (Session::has('thongbao'))
            <p class="alert alert-success">{{ Session::get('thongbao') }}</p>
        @endif
        <!-- /.col-lg-12 -->
        <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('themsanpham') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Tên sản phẩm</label>
                    <input class="form-control" name="namePro" placeholder="Nhập tên sản phẩm" />
                    @if ($errors->has('namePro'))
                        <span class="text-danger">{{ $errors->first('namePro') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Loại sản phẩm</label>
                    <select name="loaisp" id="loaisp">
                        @foreach ($type_pro as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('loaisp'))
                        <span class="text-danger">{{ $errors->first('loaisp') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Giá sản phẩm</label>
                    <input class="form-control" name="price" placeholder="Nhập giá gốc sản phẩm" />
                    @if ($errors->has('price'))
                        <span class="text-danger">{{ $errors->first('price') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Giá khuyến mãi (nếu có)</label>
                    <input class="form-control" name="pro_price" placeholder="Nhập giá khuyến mãi" />
                    @if ($errors->has('pro_price'))
                        <span class="text-danger">{{ $errors->first('pro_price') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Đơn vị tính</label>
                    <select name="unit" id="unit">
                        <option value="hộp">Hộp</option>
                        <option value="cái">Cái</option>
                    </select>
                    @if ($errors->has('unit'))
                        <span class="text-danger">{{ $errors->first('unit') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Mô tả sản phẩm</label>
                    <textarea class="form-control" rows="3" name="des"></textarea>
                </div>
                <div class="form-group">
                    <label>Hình sản phẩm</label>
                    <input type="file" name="flmages">
                </div>
                <div class="form-group">
                    <label>Tình trạng sản phẩm</label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="1" checked type="radio">Mới </label>
                    </label>
                    <label class="radio-inline">
                        <input name="rdoStatus" value="0" type="radio">none </label>
                    @if ($errors->has('rdoStatus'))
                        <span class="text-danger">{{ $errors->first('rdoStatus') }}</span>
                    @endif
                </div>
                <button type="submit" class="btn btn-default">Thêm sản phẩm</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </form>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
@endsection
