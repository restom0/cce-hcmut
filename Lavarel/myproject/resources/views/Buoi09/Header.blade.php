<ul class="nav navbar-nav pull-right"></ul>
@if (Auth::check())
    <li>
        <a href="{{ route('nguoidung') }}">
            <span class ="glyphicon glyphicon-user"></span> {{ Auth::user()->name }}
        </a>
    </li>
    <li>
        <a href="{{ route('dangxuat') }}">Đăng xuất</a>
    </li>
@else
    <li>
        <a href="#"></a>
    </li>
    <li>
        <a href="{{ route('dangnhap') }}">Đăng nhập</a>
    </li>
@endif
<form class="navbar-form navbar-left" role="search" action="{{ route('timkiem') }}" method="post`">
    @csrf
    <div class="form-group">
        <input type="text" class="form-control" placeholder="nhập từ khóa" name="tukhoa">
    </div>
    <button type="submit" class="btn btn-default"> Tìm </button>
</form>
</ul>
