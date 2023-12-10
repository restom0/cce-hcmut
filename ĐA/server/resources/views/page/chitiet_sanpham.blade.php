@extends('layouts.master')
@section('content')
    <div class="inner-header">
        <div class="container">
            <div class="pull-left">
                <h6 class="inner-title">Sản phẩm {{ $sanpham->name }}</h6>
            </div>
            <div class="pull-right">
                <div class="beta-breadcrumb font-large">
                    <a href="index">Trang chủ</a> / <span>Thông tin chi tiết sản phẩm</span>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <div class="container">
        <div id="content">
            <div class="row">
                <div class="col-sm-9">

                    <div class="row">
                        <div class="col-sm-4">
                            <img alt="" height="250" src="image/product/{{ $sanpham->image }}">
                        </div>
                        <div class="col-sm-8">
                            <div class="single-item-body">
                                <p class="single-item-title">{{ $sanpham->name }}</p>
                                <p class="single-item-price">
                                    @if ($sanpham->promotion_price == 0)
                                        <span class="flash-sale">{{ number_format($sanpham->unit_price) }}
                                            đ</span>
                                    @else
                                        <span class="flash-del">{{ number_format($sanpham->unit_price) }}
                                            đ</span>
                                        <span class="flash-sale">{{ number_format($sanpham->promotion_price) }}
                                            đ</span>
                                    @endif

                                </p>
                            </div>

                            <div class="clearfix"></div>
                            <div class="space20">&nbsp;</div>

                            <div class="single-item-desc">
                                <p>{{ $sanpham->description }}</p>
                            </div>
                            <div class="space20">&nbsp;</div>

                            <p>Đơn vị tính</p>
                            <div class="single-item-options">
                                <select class="wc-select" name="unit">
                                    <option>ĐVT</option>
                                    <option value="hộp" {{ $sanpham->unit == 'hộp' ? 'selected' : '' }}>hộp</option>
                                    <option value="cái" {{ $sanpham->unit == 'cái' ? 'selected' : '' }}>cái</option>
                                </select>
                                <a class="add-to-cart" href="them-vao-gio-hang/{{ $sanpham->id }}"><i
                                        class="fa fa-shopping-cart"></i></a>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>

                    <div class="space40">&nbsp;</div>
                    <div class="woocommerce-tabs">
                        <ul class="tabs">
                            <li><a href="#tab-description">Mô tả</a></li>
                            <li><a href="#tab-reviews">Reviews (0)</a></li>
                        </ul>

                        <div class="panel" id="tab-description">
                            <p>{{ $sanpham->description }}</p>
                        </div>
                        <div class="panel" id="tab-reviews">
                            <p>No Reviews</p>
                        </div>
                    </div>
                    <div class="space50">&nbsp;</div>
                    <div class="beta-products-list">
                        <h4>Sản phẩm tương tự</h4>

                        <div class="row">
                            @foreach ($sp_tuongtu as $sptt)
                                <div class="col-sm-4" style="margin-bottom:5vh">
                                    <div class="single-item">
                                        @if ($sptt->promotion_price != 0)
                                            <div class="ribbon-wrapper">
                                                <div class=" ribbon sale">Sale</div>
                                            </div>
                                        @endif
                                        <div class="single-item-header">
                                            <a href="chi-tiet-san-pham/{{ $sptt->id }}"><img
                                                    src="image/product/{{ $sptt->image }}" height="250"
                                                    alt=""></a>
                                        </div>
                                        <div class="single-item-body">
                                            <p class="single-item-title">{{ $sptt->name }}</p>
                                            <p class="single-item-price">
                                                @if ($sptt->promotion_price == 0)
                                                    <span class="flash-sale">{{ number_format($sptt->unit_price) }}
                                                        đ</span>
                                                @else
                                                    <span class="flash-del">{{ number_format($sptt->unit_price) }}
                                                        đ</span>
                                                    <span class="flash-sale">{{ number_format($sptt->promotion_price) }}
                                                        đ</span>
                                                @endif

                                            </p>
                                        </div>
                                        <div class="single-item-caption" style="margin-top:5vh">
                                            <a class="add-to-cart pull-left"
                                                href="them-vao-gio-hang/{{ $sptt->id }}"><i
                                                    class="fa fa-shopping-cart"></i></a>
                                            <a class="beta-btn primary" href="chi-tiet-san-pham/{{ $sptt->id }}">Chi
                                                tiết<i class="fa fa-chevron-right"></i></a>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row">{{ $sp_tuongtu->links() }}</div>
                    </div> <!-- .beta-products-list -->
                </div>
                <div class="col-sm-3 aside">
                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm bán chạy</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach ($sp_banchay as $spbc)
                                    <div class="media beta-sales-item">
                                        <a class="pull-left" href="{{ route('detailproduct', $spbc->id_product) }}">
                                            <img src="image/product/{{ $spbc->image }}" alt="{{ $spbc->name }}">
                                        </a>
                                        <div class="media-body">
                                            {{ $spbc->name }}
                                            @if ($spbc->promotion_price == 0)
                                                <span class="beta-sales-price">{{ number_format($spbc->unit_price) }}
                                                    đ</span>
                                            @else
                                                <span class="flash-del">{{ number_format($spbc->unit_price) }} đ</span>
                                                <span class="beta-sales-price">{{ number_format($spbc->promotion_price) }}
                                                    đ</span>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="widget">
                        <h3 class="widget-title">Sản phẩm mới</h3>
                        <div class="widget-body">
                            <div class="beta-sales beta-lists">
                                @foreach ($sp_moi as $new)
                                    <div class="beta-sales beta-lists">
                                        <div class="media beta-sales-item">
                                            <a class="pull-left" href="chi-tiet-san-pham/{{ $new->id }}">
                                                <img src="image/product/{{ $new->image }}"
                                                    alt="{{ $new->image }}"></a>
                                            <div class="media-body">
                                                {{ $new->name }}
                                                <span class="beta-sales-price">{{ number_format($new->unit_price) }}
                                                    đ</span>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div> <!-- best sellers widget -->
                </div>
            </div>
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
