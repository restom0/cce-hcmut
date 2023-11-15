@extends('front.layout.master')
@section('content')
    <!-- Page Content -->
    <?php
    function doimau($str, $tukhoa)
    {
        return str_replace($tukhoa, "<span style='color:red; backgroundcolor:yellow'>$tukhoa</span>", $str);
    }
    ?>
    <div class="container">
        <div class="row">
            @include('front.layout.menu')
            <div class="col-md-9 ">
                <div class="panel panel-default">
                    <div class="panel-heading" style="background-color:#337AB7; color:white;">
                        <h4><b>Tìm kiếm: {{ $tukhoa }}</b></h4>
                    </div>
                    @foreach ($tintuc as $tt)
                        <div class="row-item row">
                            <div class="col-md-3">
                                <a href="{{ route('tintuc', [$tt->id, $tt->TieuDeKhongDau]) }}">
                                    <br>
                                    <img width="200px" height="200px" class="img-responsive"
                                        src="upload/tintuc/{{ $tt->Hinh }}" alt="">
                                </a>
                            </div>
                            <div class="col-md-9">
                                <h3>{!! doimau($tt->TieuDe, $tukhoa) !!}</h3>
                                <p>{!! doimau($tt->TomTat, $tukhoa) !!}</p>
                                <a class="btn btn-primary" href="{{ route('tintuc', [$tt->id, $tt->TieuDeKhongDau]) }}">Xem
                                    thêm <span class="glyphicon glyphicon-chevronright"></span></a>
                            </div>
                            <div class="break"></div>
                        </div>
                    @endforeach
                    <!-- Pagination -->
                    <div style="text-align:center">
                        {{ $tintuc->appends(['tukhoa' => $tukhoa])->links() }}
                    </div>
                    <!-- /.row -->
                </div>
            </div>
        </div>
    </div>
    <!-- end Page Content -->
@endsection
