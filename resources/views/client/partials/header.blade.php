@section('header')
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">

            <a href="index.html" class="logo d-flex align-items-center me-auto">
                <!-- Bỏ comment dòng bên dưới nếu bạn muốn sử dụng logo hình ảnh -->
                <!-- <img src="assets/img/logo.png" alt=""> -->
                <h1 class="sitename">Mentor</h1>
            </a>

            <nav id="navmenu" class="navmenu">
                <ul>
                    <li><a href="{{ route('clients.home') }}" class="active">Trang chủ<br></a></li>
                    <li><a href="about.html">Giới thiệu</a></li>
                    <li><a href="{{ route('clients.courses.index') }}">Khóa học</a></li>
                    <li><a href="trainers.html">Giảng viên</a></li>
                    <li><a href="events.html">Sự kiện</a></li>
                    <li><a href="pricing.html">Bảng giá</a></li>
                    <li class="dropdown"><a href="#"><span>Dropdown</span> <i
                                class="bi bi-chevron-down toggle-dropdown"></i></a>
                        <ul>
                            <li><a href="#">Dropdown 1</a></li>
                            <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i
                                        class="bi bi-chevron-down toggle-dropdown"></i></a>
                                <ul>
                                    <li><a href="#">Deep Dropdown 1</a></li>
                                    <li><a href="#">Deep Dropdown 2</a></li>
                                    <li><a href="#">Deep Dropdown 3</a></li>
                                    <li><a href="#">Deep Dropdown 4</a></li>
                                    <li><a href="#">Deep Dropdown 5</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Dropdown 2</a></li>
                            <li><a href="#">Dropdown 3</a></li>
                            <li><a href="#">Dropdown 4</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Liên hệ</a></li>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>


            <!-- Dropdown cho tên người dùng -->
            <ul class="dropdown">

                @if (Auth::user())
                    <li style="list-style:none; margin-top: 20px; margin-left: 40px;">Xin chào
                        <a href="#" class="btn-default"><span
                                style="font-weight:bold;">{{ Auth::user()->name ?? '' }}</span>
                            <i></i></a>
                        <ul class="dropdown-menu" style="width: 200px">
                            <!-- Link đến trang profile của người dùng -->
                            <li><a href="#" style="color: black;" class="btn btn-default btn-flat">Trang cá nhân</a>
                            </li>
                            <!-- Link đến trang quản lý người dùng -->
                            <li><a href="#" style="color: black;" class="btn btn-default btn-flat">Quản lý người
                                    dùng</a>
                            </li>
                            <!-- Form đăng xuất -->
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-default btn-flat">Đăng xuất</button>
                                </form>
                            </li>
                            
                        </ul>
                    </li>
                @else
                    <a href="{{route('showLogin')}}" class="btn btn-sqr">Đăng nhập</a>
                @endif

            </ul>
            <div class="header-configure-area">
                <ul class="nav justify-content-end">
                    @if (Auth::user())
                    <li class="user-hover">
                        <a href="#">
                            <i class="pe-7s-user"></i>
                        </a>
                    </li>
                    @else
                        
                    @endif
                    <li>
                        <a href="{{ route('clients.cart') }}" class="minicart-btn">
                            <i class="pe-7s-shopbag"></i>
                            <div class="notification">{{ session('cart') && Auth::user() ? count(session('cart')) : '0' }}
                            </div>
                        </a>
                    </li>
                </ul>
            </div>






        </div>
    </header>
@endsection
