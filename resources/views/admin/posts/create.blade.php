@extends('admin.layouts.master')

@section('title')
    Thêm mới Bài viết
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Bài viết</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Bài viết</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif

    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div class="mt-3">
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ old('title') }}">
                                        @error('title')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="sku" class="form-label">Sku</label>
                                        <input type="text" class="form-control" name="sku" id="sku"
                                            value="{{ strtoupper(\Str::random(8)) }}">
                                    </div>
                                    <div class="mt-3">
                                        <label for="category_id" class="form-label">Categories</label>
                                        <select type="text" class="form-select" name="category_id" id="category_id">
                                            @foreach ($categories as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="author_id" class="form-label">Author</label>
                                        <select type="text" class="form-select" name="author_id" id="author_id">
                                            @foreach ($authors as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mt-3">
                                        <label for="img_thumbnail" class="form-label">Img Thumbnail</label>
                                        <input type="file" class="form-control" name="img_thumbnail" id="img_thumbnail"
                                            value="{{ old('img_thumbnail') }}">
                                        @error('img_thumbnail')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="mt-3">
                                        <label for="excerpt" class="form-label">Excerpt</label>
                                        <textarea class="form-control" name="excerpt" id="excerpt" rows="5">{{ old('excerpt') }}</textarea>
                                        @error('excerpt')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_active" id="is_active" checked>
                                                <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-warning">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_trending" id="is_trending" checked>
                                                <label class="form-check-label" for="is_trending">Is Trending</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <label for="tags" class="form-label">Tags</label>
                                        <select class="js-example-basic-multiple" name="tags[]" id="tags"
                                            multiple="multiple">
                                            @foreach ($tags as $id => $name)
                                                <option value="{{ $id }}">{{ $name }}</option>
                                            @endforeach
                                        </select>
                                        {{-- @error('tags')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror --}}
                                    </div>

                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="content" class="form-label">Content</label>
                                            <textarea class="form-control" name="content" id="content">{{ old('content') }}</textarea>
                                            @error('content')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!--end row-->
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <button class="btn btn-primary w-25" type="submit">Save</button>
                        </div><!-- end card header -->
                    </div>
                </div>
            </div>

    </form>
@endsection

@section('style-libs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('script-libs')
    {{-- <script src="https:////cdn.ckeditor.com/4.8.0/basic/ckeditor.js"></script> --}}
    <script src="https:////cdn.ckeditor.com/4.8.0/full-all/ckeditor.js"></script>

    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--select2 cdn-->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('theme/admin/assets/js/pages/select2.init.js') }}"></script>
@endsection

@section('scripts')
    <script>
        CKEDITOR.replace('content', {
            width: '100%',
            height: '800px'
        });
    </script>
@endsection
