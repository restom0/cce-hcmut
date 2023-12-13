@extends('layouts.master')
@section('content')
    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>Sản phẩm mới</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($product) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>

                            <div class="row">
                                @foreach ($product as $pro)
                                    <div class="col-sm-3" style="margin-bottom:5vh">
                                        <div class="single-item">
                                            @if ($pro->promotion_price != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class=" ribbon sale">Sale</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="chi-tiet-san-pham/{{ $pro->id }}"><img alt=""
                                                        height="250" src="image/product/{{ $pro->image }}"></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $pro->name }}</p>
                                                <p class="single-item-price">
                                                    @if ($pro->promotion_price == 0)
                                                        <span class="flash-sale">{{ number_format($pro->unit_price) }}
                                                            đ</span>
                                                    @else
                                                        <span class="flash-del">{{ number_format($pro->unit_price) }}
                                                            đ</span>
                                                        <span class="flash-sale">{{ number_format($pro->promotion_price) }}
                                                            đ</span>
                                                    @endif

                                                </p>
                                            </div>
                                            <div class="single-item-caption" style="margin-top:5vh">
                                                <a class="add-to-cart pull-left"
                                                    href="them-vao-gio-hang/{{ $pro->id }}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="chi-tiet-san-pham/{{ $pro->id }}">Chi
                                                    tiết <i class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
