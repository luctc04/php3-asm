@extends('client.layouts.master')

@section('title')
    {{ request('search') }} - Kết quả tìm kiếm
@endsection

@section('content')
<div class="col-lg-8  mb-5 mb-lg-0 mt-5">
    <h2 class="h5 section-title">Tìm kiếm : {{ request('search') }}</h2>
    <div class="row">

        @foreach ($posts as $item)
            <div class="col-lg-6 col-sm-6">
                <article class="card mb-4">
                    <div class="post-slider slider-sm">
                        @php
                            $url_thumbnail = $item->img_thumbnail;
                            $url_cover = $item->img_cover;

                            if (!\Str::contains($url_thumbnail, $url_cover, 'http')) {
                                $url = Storage::url($url_thumbnail, $url_cover);
                            }
                        @endphp
                        <img src="{{ $url_thumbnail }}" class="card-img-top" alt="post-thumb">
                        <img src="{{ $url_cover }}" class="card-img-top" alt="post-thumb">
                    </div>

                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title"
                                href="{{ route('post.detail', $item->id) }}">{{ $item->title }}</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="#" class="card-meta-author">
                                    @php
                                        $url_avatar = $item->author->avatar;

                                        if (!\Str::contains($url_avatar, 'http')) {
                                            $url = Storage::url($url_avatar);
                                        }
                                    @endphp

                                    <img src="{{ $url_avatar }}">
                                    <span>{{ $item->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $item->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($item->tags as $tag)
                                        <!-- dd($tag) -->
                                        <li class="list-inline-item"><a href="#">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <p>{{ \Str::limit($item->excerpt, 190) }}</p>
                        <a href="{{ route('post.detail', $item->id) }}" class="btn btn-outline-primary">ĐỌC THÊM</a>
                    </div>
                </article>
            </div>
        @endforeach

    </div>
    {{ $posts->links() }}
</div>

<aside class="col-lg-4 sidebar-home">
    <!-- Search -->
    <div class="widget">
        <h4 class="widget-title"><span>Search</span></h4>
        <form action="{{ route('search') }}" method="GET" class="widget-search">
            <input class="mb-3" id="search-query" name="search" type="search" placeholder="Tìm kiếm">
            <i class="ti-search"></i>
            <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
        </form>
    </div>


    <div class="widget">
        <h4 class="widget-title">Thịnh hành</h4>

        <!-- post-item -->
        <article class="widget-card">
            <div class="d-flex">
                <img class="card-img-sm" src="images/post/post-10.jpg">
                <div class="ml-3">
                    <h5><a class="post-title" href="post/elements/">Elements That You Can Use In This
                            Template.</a></h5>
                    <ul class="card-meta list-inline mb-0">
                        <li class="list-inline-item mb-0">
                            <i class="ti-calendar"></i>15 jan, 2020
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </div>

    <div class="widget">
        <h4 class="widget-title">Đọc nhiều</h4>

        <!-- post-item -->
        <article class="widget-card">
            <div class="d-flex">
                <img class="card-img-sm" src="images/post/post-10.jpg">
                <div class="ml-3">
                    <h5><a class="post-title" href="post/elements/">Elements That You Can Use In This
                            Template.</a></h5>
                    <ul class="card-meta list-inline mb-0">
                        <li class="list-inline-item mb-0">
                            <i class="ti-calendar"></i>15 jan, 2020
                        </li>
                    </ul>
                </div>
            </div>
        </article>
    </div>

</aside>
@endsection
