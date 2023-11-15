@extends("Buoi07.master")
@section("noidung")
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
        <div class="h3 text-center">Thêm Lớp Học Mới</div>
        @if ($tb = Session::get("tb"))
            <div class="text-success">{{$tb}}</div>
        @endif
        <form action="{{route('lophoc.update', $lophoc[0]->malop)}}" method="post">
            @csrf
            @method("PUT")
            <div class="mb-3">
                <label class="form-label">Tên Lớp Học</label>
                <input type="text" name="tenlop" class="form-control"  value="{{$lophoc[0]->tenlop}}">
                @if($errors->has("tenlop"))
                    <div class="text-danger">{{$errors->first("tenlop")}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Mã KHoa</label>
                <select class="form-control" name="makhoa" size="1">
                    @foreach($dskhoa as $kh)
                        <option value="{{$kh->makhoa}}">{{$kh->tenkhoa}}</option>
                    @endforeach
                </select>
                @if($errors->has("makhoa"))
                    <div class="text-danger">{{$errors->first("makhoa")}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Giáo Viên Chủ Nhiệm</label>
                <input type="text" name="gvcn" class="form-control"  value="{{$lophoc[0]->gvcn}}">
                @if($errors->has("gvcn"))
                    <div class="text-danger">{{$errors->first("gvcn")}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Sỉ số</label>
                <input type="text" name="siso" class="form-control"  value="{{$lophoc[0]->siso}}">
                @if($errors->has("siso"))
                    <div class="text-danger">{{$errors->first("siso")}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label class="form-label">Học Phí</label>
                <input type="text" name="hocphi" class="form-control"  value="{{$lophoc[0]->hocphi}}">
                @if($errors->has("hocphi"))
                    <div class="text-danger">{{$errors->first("hocphi")}}</div>
                @endif
            </div>
            <div class="mb-3">
                <input type="submit" name="luutru" class="btn btn-primary"  value=" Lưu trữ ">
            </div>
        </form>
    </div>
    <div class="col-md-3"></div>
</div>
@endsection