@php
    use App\Models\Post;
    // bài viết mới nhất
    $postTrending = Post::query()
        ->where([['is_active', '1'], ['is_trending', '1']])
        ->orderByDesc('id')
        ->limit(3)
        ->get();

    // bài viết mới nhất
    $postNew = Post::query()
        ->with(['category', 'author', 'tags'])
        ->where('is_active', '1')
        ->orderByDesc('id')
        ->first();
    // dd($postNew->toArray());

    //  bài viết có nhiều lượt xem nhất
    $postViewOne = Post::query()
        ->with(['category', 'author', 'tags'])
        ->where('is_active', '1')
        ->orderByDesc('view_count')
        ->first();
@endphp
<section class="section pb-0">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Mới Nhất</h2>
                <article class="card">
                    <div class="post-slider slider-sm">
                        <img src="{{ \Storage::url($postNew->img_thumbnail) }}" class="card-img-top" alt="post-thumb"
                            width="100%" height="100%">
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title"
                                href="{{ route('post.detail', $postNew->slug) }}">{{ $postNew->title }}</a>
                        </h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="images/john-doe.jpg">
                                    <span>{{ $postNew->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $postNew->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($postNew->tags as $tag)
                                        <li class="list-inline-item"><a href="#">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <p>{{ $postNew->excerpt }}</p>
                        <a href="{{ route('post.detail', $postNew->slug) }}" class="btn btn-outline-primary">Xem
                            thêm</a>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Bài viết xu hướng</h2>
                @foreach ($postTrending as $item)
                    <article class="card mb-4">
                        <div class="card-body d-flex">
                            <img class="card-img-sm" src="{{ \Storage::url($item->img_thumbnail) }}">
                            <div class="ml-3">
                                <h4><a href="{{ route('post.detail', $postNew->slug) }}"
                                        class="post-title">{{ $item->title }}</a>
                                </h4>
                                <ul class="card-meta list-inline mb-0">
                                    <li class="list-inline-item mb-0">
                                        <i class="ti-calendar"></i>{{ $item->created_at }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <div class="col-lg-4 mb-5">
                <h2 class="h5 section-title">Xem nhiều nhất</h2>

                <article class="card">
                    <div class="post-slider slider-sm">
                        <img src="{{ \Storage::url($postViewOne->img_thumbnail) }}" class="card-img-top"
                            alt="post-thumb">
                    </div>
                    <div class="card-body">
                        <h3 class="h4 mb-3"><a class="post-title"
                                href="{{ route('post.detail', $postNew->slug) }}">{{ $postViewOne->title }}</a></h3>
                        <ul class="card-meta list-inline">
                            <li class="list-inline-item">
                                <a href="author-single.html" class="card-meta-author">
                                    <img src="images/kate-stone.jpg">
                                    <span>{{ $postViewOne->author->name }}</span>
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <i class="ti-calendar"></i>{{ $postViewOne->created_at }}
                            </li>
                            <li class="list-inline-item">
                                <ul class="card-meta-tag list-inline">
                                    @foreach ($postViewOne->tags as $tag)
                                        <li class="list-inline-item"><a href="#">{{ $tag->name }}</a></li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <p>{{ $postViewOne->excerpt }}</p>
                        <a href="{{ route('post.detail', $postNew->slug) }}" class="btn btn-outline-primary">Xem
                            thêm</a>
                    </div>
                </article>
            </div>
            <div class="col-12">
                <div class="border-bottom border-default"></div>
            </div>
        </div>
    </div>
</section>
