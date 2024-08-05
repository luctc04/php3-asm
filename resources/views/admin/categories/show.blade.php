@extends('admin.layouts.master')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh mục Sản phẩm: {{ $category->name }}</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục Sản phẩm</a></li>
                        <li class="breadcrumb-item active">{{ $category->name }}</li>
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
                </div><!-- end card header -->
                <div class="card-body">
                    <div class="live-preview">
                        <div class="row gy-4">
                            <div class="col-md-4">
                                <div>
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        value="{{ $category->name }}">
                                </div>

                                <div class="mt-3">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" id="slug"
                                        value="{{ $category->slug }}">
                                </div>

                                <div class="my-3">
                                    <label class="form-check-label" for="is_active">Is Active: </label>

                                    {!! $category->is_active
                                        ? '<span class="badge bg-primary">YES</span>'
                                        : '<span class="badge bg-danger">NO</span>' !!}

                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <a href="{{ route('admin.categories.index')}}" class="btn btn-primary">Danh sách</a>
                                        <a href="{{ route('admin.categories.edit', $category->id) }}" class="btn btn-warning w-25 mx-3">Sửa</a>
                                    </div><!-- end card header -->

                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end col-->
    </div>
@endsection
