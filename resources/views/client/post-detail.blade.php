@extends('client.layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class=" col-lg-9 mb-5 mb-lg-0 mt-5">
        <article>
            <div class="post-slider mb-4">
                {{-- @php
                    $url_thumbnail = $post->img_thumbnail;

                    if (!\Str::contains($url_thumbnail, 'http')) {
                        $url = Storage::url($url_thumbnail);
                    }
                @endphp
                <img src="{{ $post->img_thumbnail }}" class="card-img" alt="post-thumb"> --}}
            </div>

            <h1 class="h2">{{ $post->title }}</h1>
            <ul class="card-meta my-3 list-inline">
                <li class="list-inline-item">
                    <a href="author-single.html" class="card-meta-author">
                        @php
                            $url_avatar = $post->author->avatar;

                            if (!\Str::contains($url_avatar, 'http')) {
                                $url = Storage::url($url_avatar);
                            }
                        @endphp

                        <img src="{{ $url_avatar }}">
                        <span>{{ $post->author->name }}</span>
                    </a>
                </li>
                <li class="list-inline-item">
                    <i class="ti-calendar"></i>{{ $post->created_at }}
                </li>
                <li class="list-inline-item">
                    <ul class="card-meta-tag list-inline">
                        @foreach ($post->tags as $tag)
                            <li class="list-inline-item"><a href="#">{{ $tag->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
            </ul>
            <h4>{{ $post->excerpt }}</h4>
            <div class="content">
                {!! $post->content !!}
            </div>
        </article>

    </div>

    <div class="col-lg-9 col-md-12">
        <div class="mb-5 border-top mt-4 pt-5">
            <h3 class="mb-4">Bình luận</h3>

            <div class="media d-block d-sm-flex mb-4 pb-4">
                <a class="d-inline-block mr-2 mb-3 mb-md-0" href="#">
                    <img src="images/post/user-01.jpg" class="mr-3 rounded-circle" alt="">
                </a>
                <div class="media-body">
                    <a href="#!" class="h4 d-inline-block mb-3">Lực...</a>

                    <p>Ahihi.</p>

                    <span class="text-black-800 mr-3 font-weight-600">April 18, 2020 at 6.25 pm</span>
                    <a class="text-primary font-weight-600" href="#!">Reply</a>
                </div>
            </div>
        </div>

        <div>
            <h3 class="mb-4">Để lại phản hồi</h3>
            <form method="POST">
                <div class="row">
                    <div class="form-group col-md-12">
                        <textarea class="form-control shadow-none" name="comment" rows="7" required></textarea>
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-control shadow-none" type="text" placeholder="Họ và tên" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-control shadow-none" type="email" placeholder="Email" required>
                    </div>
                    <div class="form-group col-md-4">
                        <input class="form-control shadow-none" type="url" placeholder="Website">
                        <p class="font-weight-bold valid-feedback">OK! You can skip this field.</p>
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">Bình luận ngay</button>
            </form>
        </div>
    </div>
@endsection
