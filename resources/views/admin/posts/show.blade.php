@extends('admin.layouts.master')

@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Xem Chi tiết bài viết</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                        {{-- <li class="breadcrumb-item active">{{ $post->title }}</li> --}}
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-primary">Danh sách</a>
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4 ">
                            <div class="col-md-4 border rounded-3 ">
                                <div class="">
                                    <label for="title" class="form-label mt-2 fw-bold">Title</label>
                                    <h6 class="fw-bold border rounded-3 p-2 ">{{ $post->title }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="sku" class="form-label mt-2 fw-bold">Sku</label>
                                    <h6 class="fw-bold border rounded-3 p-2">{{ $post->sku }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="ct" class="form-label mt-2 fw-bold">Category</label>
                                    <h6 class="fw-bold border rounded-3 p-2">{{ $post->category->name }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="at" class="form-label mt-2 fw-bold">Author</label>
                                    <h6 class="fw-bold border rounded-3 p-2">{{ $post->author->name }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="view" class="form-label mt-2 fw-bold">View</label>
                                    <h6 class="fw-bold border rounded-3 p-2">{{ $post->view_count }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="is_active" class="form-label mt-2 fw-bold">Is active</label>
                                    {!! $post->is_active
                                        ? '<span class="badge bg-primary mx-5">YES</span>'
                                        : '<span class="badge bg-danger mx-5">NO</span>' !!}
                                </div>

                                <div class="mt-2">
                                    <label for="is_trending" class="form-label mt-2 fw-bold">Is trending</label>
                                    {!! $post->is_active
                                        ? '<span class="badge bg-primary mx-4">YES</span>'
                                        : '<span class="badge bg-danger mx-4">NO</span>' !!}
                                </div>

                                <div class="mt-2">
                                    <label for="tags" class="form-label mt-2 fw-bold">Tags</label>
                                    @foreach ($post->tags as $tag)
                                        <span class="badge bg-info fs-6 mx-2">{{ $tag->name }}</span>
                                    @endforeach
                                </div>

                                <div class="mt-2">
                                    <label for="ngayDang" class="form-label mt-2 fw-bold">Ngày đăng</label>
                                    <h6 class="fw-bold border rounded-3 p-2">{{ $post->created_at }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="excerpt" class="form-label mt-2 fw-bold">Excerpt</label>
                                    <h6 class="fw-bold border rounded-3 p-2">{{ $post->excerpt }}</h6>
                                </div>

                                <div class="mt-2">
                                    <label for="image" class="form-label mt-2 fw-bold">Ảnh</label><br>
                                    @php
                                        $url = $post->img_thumbnail;

                                        if (!\Str::contains($url, 'http')) {
                                            $url = Storage::url($url);
                                        }
                                    @endphp
                                    <img src="{{ $url }}" width="100%" height="260px">
                                </div>
                            </div>

                            <div class="col-md-8">
                                <label for="content " class="form-label fw-bold">Content</label>
                                <div class="border rounded-3 p-3 ">
                                    {!! $post->content !!}
                                </div>
                            </div>
                        </div>

                        {{-- <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <a href="{{ route('admin.categories.index')}}" class="btn btn-primary">Danh sách</a>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning w-25 mx-3">Sửa</a>
                                    </div><!-- end card header -->

                                </div>
                            </div>
                            <!--end col-->
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
