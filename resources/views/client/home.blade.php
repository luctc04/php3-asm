@extends('client.layouts.master')

@section('title')
    Trang chủ
@endsection

@section('content')
    <div class="col-lg-8  mb-5 mb-lg-0 mt-5">
        <h2 class="h5 section-title">Tin mới nhất</h2>
        @foreach ($data as $item)
            {{-- <article class="card mb-4">
                <div class="post-slider">
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
                    <h3 class="mb-3"><a class="post-title" href="post-elements.html">{{ $item->title }}</a></h3>
                    <ul class="card-meta list-inline">
                        <li class="list-inline-item">
                            <a href="author-single.html" class="card-meta-author">
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
                                    <li class="list-inline-item"><a href="tags.html">{{ $tag->name }}</a></li>
                                @endforeach

                            </ul>
                        </li>
                    </ul>
                    <p>{{ \Str::limit($item->content, 190) }}</p>
                    <a href="post-elements.html" class="btn btn-outline-primary">ĐỌC THÊM</a>
                </div>
            </article> --}}

            <article class="card mb-4">
                <div class="row card-body">
                    <div class="col-md-4 mb-4 mb-md-0">
                        <div class="post-slider slider-sm">
                            @if ($item->img_thumbnail && \Storage::exists($item->img_thumbnail))
                                <img class="card-img" alt="post-thumb" style="height:200px; object-fit: cover;"
                                    src="{{ \Storage::url($item->img_thumbnail) }}" alt="">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h3 class="h4 mb-3"><a class="post-title"
                                href="{{ route('post.detail', $item->slug) }}">{{ $item->title }}</a></h3>
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
                                <i class="ti-eye"></i>{{ $item->view_count }}
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
                        <a href="{{ route('post.detail', $item->slug) }}" class="btn btn-outline-primary">ĐỌC THÊM</a>
                    </div>
                </div>
            </article>
        @endforeach

        {{ $data->links() }}
    </div>

    <aside class="col-lg-4 sidebar-home">

        @include('client.components.convenientSearch')

    </aside>

    
    @include('client.components.convenient')

    {{-- CÁCH 2 --}}
    {{-- @include('client.components.convenient', ['data' => [[$postNew], [$postTrending], [$postViewOne]]]) --}}
@endsection
