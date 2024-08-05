@extends('client.layouts.master')

@section('title')
    {{ $tag->name }} - Kết quả Tag 
@endsection

@section('content')
    <div class="col-lg-8  mb-5 mb-lg-0 mt-5">
        <h2 class="h5 section-title">Tag : {{ $tag->name }}</h2>
        <div class="row">
            @foreach ($posts as $item)
                <div class="col-lg-6 col-sm-6">
                    <article class="card mb-4">
                        <div class="post-slider slider-sm">
                            <img src="{{ \Storage::url($item->img_thumbnail) }}" class="card-img-top" alt="post-thumb">
                        </div>

                        <div class="card-body">
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
                    </article>
                </div>
            @endforeach

        </div>
        {{ $posts->links() }}
    </div>

    <aside class="col-lg-4 @@sidebar mt-5   ">
        <!-- categories -->
        <div class="widget widget-categories">
            <h4 class="widget-title"><span>Danh Mục</span></h4>
            <ul class="list-unstyled widget-list">
                @foreach ($category2 as $item)
                    <li><a href="{{ url('/category', $item->slug) }}" class="d-flex">{{ $item->name }}<small
                                class="ml-auto">( {{ $item->ct_quantity }} )</small></a></li>
                @endforeach
            </ul>
        </div><!-- tags -->
        <div class="widget">
            <h4 class="widget-title"><span>Tags</span></h4>
            <ul class="list-inline widget-list-inline widget-card">
                @foreach ($tags as $item)
                    <li class="list-inline-item"><a href="{{ url('/tag', $item->id) }}">{{ $item->name }}</a></li>
                @endforeach
            </ul>
        </div>
    </aside>

@endsection
