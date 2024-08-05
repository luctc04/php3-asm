@php
    $data = DB::table('categories')->where('is_active', '1')->get();
    // dd(DB::table('categories')->get());
@endphp
<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand order-1" href="/">
                <img class="img-fluid" width="100px" src="{{ asset('theme/client/images/logo.png') }}"
                    alt="Reader | Hugo Personal Blog Template">
            </a>
            <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                <ul class="navbar-nav">

                    <li class="nav-item ">
                        <a class="nav-link" href="/"><i class="ti-home"></i></a>
                    </li>

                    @foreach ($data as $item)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/category', $item->slug) }}">{{ $item->name }}</a>
                        </li>
                    @endforeach
                </ul>

            </div>

            <div class="order-2 order-lg-3 d-flex align-items-center">
                <!-- search -->
                <form action="{{ route('search') }}" method="get" class="search-bar">
                    <input id="search-query" name="search" type="search" placeholder="Tìm kiếm">
                </form>

                <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item dropdown">
                            @guest
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <img class="img" width="35px"
                                        src="{{ asset('theme/client/images/nguoidung2.png') }}">
                                    <i class="ti-angle-down"></i>
                                </a>
                                <div class="dropdown-menu">

                                    @if (Route::has('login'))
                                        <a class="dropdown-item" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                                    @endif

                                    @if (Route::has('register'))
                                        <a class="dropdown-item" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
                                    @endif
                                </div>
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();"> {{ __('Đăng Xuất') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
