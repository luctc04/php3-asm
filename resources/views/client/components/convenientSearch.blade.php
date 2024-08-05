@php
    use App\Models\Post;
    use App\Models\Category;
    $view = Post::query()->where('is_active', '1')->orderByDesc('view_count')->limit(3)->get();

    // 3 bài viết thịnh hành
    $postTrending = Post::query()
        ->where([['is_active', '1'], ['is_trending', '1']])
        ->orderByDesc('id')
        ->limit(3)
        ->get();

    //  3bài viết theo danh mục
    $category = Category::with([
        'posts' => function ($query) {
            $query->take(3)->where('is_active', 1)->orderbyDesc('id');
        },
    ])->find(1);

    // dd($category->toArray());

@endphp
<!-- Search -->
{{-- <div class="widget">
    <h4 class="widget-title"><span>Search</span></h4>
    <form action="{{ route('search') }}" method="GET" class="widget-search">
        <input class="mb-3" id="search-query" name="search" type="search" placeholder="Tìm kiếm">
        <i class="ti-search"></i>
        <button type="submit" class="btn btn-primary btn-block">Tìm kiếm</button>
    </form>
</div> --}}


<div class="widget">
    <h4 class="widget-title">Thịnh hành</h4>

    <!-- post-item -->
    @foreach ($postTrending as $item)
        <article class="widget-card">
            <div class="d-flex">
                <img class="card-img-sm" src="{{ \Storage::url($item->img_thumbnail) }}">
                <div class="ml-3">
                    <h5><a class="post-title" href="{{ route('post.detail', $item->slug) }}">{{ $item->title }}</a>
                    </h5>
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

<div class="widget">
    <h4 class="widget-title">Đọc nhiều</h4>

    <!-- post-item -->
    @foreach ($view as $item)
        <article class="widget-card">
            <div class="d-flex">
                <img class="card-img-sm" src="{{ \Storage::url($item->img_thumbnail) }}">
                <div class="ml-3">
                    <h5><a class="post-title" href="{{ route('post.detail', $item->slug) }}">
                            {{ $item->title }}</a></h5>
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

<div class="widget">
    <h4 class="widget-title">{{ $category->name}}</h4>

    <!-- post-item -->
    @foreach ($category->posts as $item)
        <article class="widget-card">
            <div class="d-flex">
                <img class="card-img-sm" src="{{ \Storage::url($item->img_thumbnail) }}">
                <div class="ml-3">
                    <h5><a class="post-title" href="{{ route('post.detail', $item->slug) }}">
                            {{ $item->title }}</a></h5>
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

</section>
