<header class="header">

    <a href="{{ route('client.home') }}" class="logo">
        <i class="fas fa-graduation-cap"></i> EASY LEARN
    </a>

    <div id="menu-btn" class="fas fa-bars"></div>

    <nav class="navbar">
        <ul>
            <li><a href="{{ route('client.home') }}">Trang chủ</a></li>
            <li><a name = title href="{{ route('client.about') }}">EASY-LEARN</a></li>
            <li><a href="{{ route('client.contact') }}">Liên hệ</a></li>
            <li><a name= title href="{{ route('client.contact') }}">Chủ đề</a></li>
            <li><a name= title href="{{ route('client.course') }}">Giỏ hàng</a></li>
            <li>
                @if (auth()->check())
                    <a href="{{ route('client.profile',['id' => auth()->user()->id]) }}"><i class="fas fa-user"></i></a>
                @else
                    <a href="#"><i class="fas fa-user"></i></a>
                @endif
                <ul>
                    @if (auth()->check())
                    <li><a href="{{ route('client.profile',['id' => auth()->user()->id]) }}">Thông tin</a></li>
                    <li><a href="{{ route('client.course') }}">Giỏ hàng</a></li>
                    <li><a href="{{ route('logins.logout') }}">Đăng xuất</a></li>
                    @else
                        <li><a href="{{ route('logins.form') }}">Đăng nhập</a></li>
                    @endif
                    <li></li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
