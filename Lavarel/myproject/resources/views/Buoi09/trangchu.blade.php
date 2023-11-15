@foreach ($theloai as $tl)
    @if (count($tl->loaitin) > 0)
        <div class="row-item row">
            <h3>
                <a href="category.html">{{ $tl->Ten }}</a> |
                @foreach ($tl->loaitin as $lt)
                    <small><a
                            href="{{ route('loaitin', [$lt->id, $lt->TenKhongDau]) }}"><i>{{ $lt->Ten }}</i></a>/</small>
                @endforeach
            </h3>
            @php(
    $data = $tl->tintuc->where('NoiBat', '=', 1)->sortByDesc('id')->take(5),
)
            <!-- lấy ra 1 tin hiện cột bên trái, hàm shift trả về dữ liệu kiểu mảng -->
            @php($tin1 = $data->shift())
            <div class="col-md-8 border-right">
                <div class="col-md-5">
                    <a href="detail.html">
                        @if (isset($tin1['Hinh']))
                            <img class="img-responsive" src="upload/tintuc/{{ $tin1['Hinh'] }}" alt="{{ $tin1['Hinh'] }}">
                        @else
                            <img class="img-responsive" src="image/320x150.png" alt="320x150">
                        @endif
                    </a>
                </div>
                <div class="col-md-7">
                    <h3>{{ isset($tin1['TieuDe']) ? $tin1['TieuDe'] : 'aaaa' }}</h3>
                    <p>{{ isset($tin1['TomTat']) ? $tin1['TomTat'] : 'bbbb' }}</p>
                    <a class="btn btn-primary" href="detail.html">
                        Xem thêm <span class="glyphicon glyphicon-chevron-right"></span></a>
                </div>
            </div>
            <div class="col-md-4">
                @foreach ($data as $tt)
                    <a href="detail.html">
                        <h4>
                            <span class="glyphicon glyphicon-list-alt"></span>
                            {{ isset($tt['TieuDe']) ? $tt['TieuDe'] : '' }}
                        </h4>
                    </a>
                @endforeach
            </div>
            <div class="break"></div>
        </div>
    @endif
@endforeach
