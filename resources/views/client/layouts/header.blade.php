@php
    $data = DB::table('categories')->get();
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
                <ul class="navbar-nav" >

                    <li class="nav-item " >
                        <a class="nav-link" href="/"><i class="ti-home"></i></a>
                    </li>

                    @foreach ($data as $item )
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/category', [$item->id] )}}">{{ $item->name }}</a>
                        </li>    
                    @endforeach
                </ul>

            </div>

            <div class="order-2 order-lg-3 d-flex align-items-center">
                <select class="m-2 border-0 bg-transparent" id="select-language">
                    <option id="en" value="" selected>En</option>
                    <option id="fr" value="">Fr</option>
                </select>

                <!-- search -->
                <form action="{{ route('search') }}" method="get" class="search-bar">
                    <input id="search-query" name="search" type="search"
                        placeholder="Tìm kiếm">
                </form>

                <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                    data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>
            </div>

        </nav>
    </div>
</header>