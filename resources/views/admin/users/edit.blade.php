@extends('admin.layouts.master')

@section('title')
    Cập nhật Người dùng
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Cập nhật Người dùng</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Người dùng</a></li>
                        <li class="breadcrumb-item active">Cập nhật</li>
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

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" enctype="multipart/form-data">

        @csrf
        @method('put')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-5">
                                    <div class="mt-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ $user->name }}">
                                        @error('name')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mt-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="email"
                                            value="{{ $user->email }}">
                                        @error('email')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    {{-- <div class="mt-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="text" class="form-control" name="password" id="password" value="">
                                        @error('password')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div> --}}

                                    <div class="mt-3">
                                        <label for="avatar" class="form-label">Avatar</label>
                                        <input type="file" class="form-control mb-2" name="avatar" id="avatar">
                                        <img src="{{ \Storage::url($user->avatar) }}" alt="" width="100px">
                                        @error('avatar')
                                            <span style="color: red">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-7">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="is_active" id="is_active" checked>
                                                <label class="form-check-label" for="is_active">Is Active</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="mt-3">
                                            <label for="address" class="form-label">Address</label>
                                            <textarea class="form-control" name="address" id="address" rows="2">{{ $user->address }}</textarea>
                                            @error('address')
                                                <span style="color: red">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mt-3">
                                            <label for="type" class="form-label">Type</label>
                                            <select name="type" id="type" class="form-select">
                                                @if ($user->type == 'admin')
                                                    <option value="admin" selected>Admin</option>
                                                    <option value="member" >Member</option>
                                                @else
                                                    <option value="admin" >Admin</option>
                                                    <option value="member" selected>Member</option>
                                                @endif
                                            </select>
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
