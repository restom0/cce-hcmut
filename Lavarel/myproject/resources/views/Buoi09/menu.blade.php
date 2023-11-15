@foreach ($theloai as $tl)
    @if (count($tl->loaitin) > 0)
        <li href="#" class="list-group-item menul"> {{ $tl->Ten }}</li>
        <ul>
            @foreach ($tl->loaitin as $lt)
                <li class="list-group-itee">
                    {{-- <a href="front/loaitin/{{$lt->id}1/{{$1t->TenKhongDau}l.html">{{ $lt->Ten}}</a> --}}
                    <a href="{{ route('loaitin', [$lt->id, $lt->TenKhongDau]) }}">{{ $tt->Ten }}</a>
                </li>
            @endforeach
        </ul>
    @endif
@endforeach
