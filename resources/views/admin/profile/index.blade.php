@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Thông Tin</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng Thống Kê</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.profile') }}">Thông Tin</a></div>
            </div>
        </div>
        <div class="section-body">
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.profile.update') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-header">
                                <h4>Cập Nhật Thông Tin Người Dùng</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <div class="mb-3">
                                            <img style="max-width: 250px;border-radius: 5px"
                                                src="{{ asset(Auth::user()->image) }}" alt="">
                                        </div>
                                        <label>Ảnh</label>
                                        <input type="file" name="image" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 col-12">
                                        <label>Tên</label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ Auth::user()->name }}" required="">
                                    </div>
                                    <div class="form-group col-md-6 col-12">
                                        <label>Mật Khẩu</label>
                                        <input type="password" name="password" class="form-control"
                                            value="{{ Auth::user()->password }}" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-7 col-12">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            value="{{ Auth::user()->email }}" required="">

                                    </div>
                                    <div class="form-group col-md-5 col-12">
                                        <label>Số Điện Thoại</label>
                                        <input type="tel" name="phone" class="form-control"
                                            value="{{ Auth::user()->phone }}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-12">
                                        <label>Thông Tin Người Dùng</label>
                                        <textarea name="bio" class="form-control summernote-simple">{{ Auth::user()->bio }}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Lưu Thay Đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-sm-4">
                <div class="col-12 col-md-12 col-lg-7">
                    <div class="card">
                        <form method="post" class="needs-validation" novalidate=""
                            action="{{ route('admin.profile.update.password') }}">
                            @csrf
                            <div class="card-header">
                                <h4>Thay Đổi Mật Khẩu</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <div class="mb-3">
                                            <img style="max-width: 250px;border-radius: 5px"
                                                src="{{ asset(Auth::user()->image) }}" alt="">
                                        </div>
                                        <label for="current_password">Mật Khẩu Hiện Tại</label>
                                        <input type="password" name="current_password" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <div class="mb-3">
                                            <img style="max-width: 250px;border-radius: 5px"
                                                src="{{ asset(Auth::user()->image) }}" alt="">
                                        </div>
                                        <label for="password">Mật Khẩu Mới</label>
                                        <input type="password" name="password" class="form-control" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12 col-12">
                                        <div class="mb-3">
                                            <img style="max-width: 250px;border-radius: 5px"
                                                src="{{ asset(Auth::user()->image) }}" alt="">
                                        </div>
                                        <label for="password_confirmation">Xác Nhận Mật Khẩu Mới</label>
                                        <input type="password" name="password_confirmation" class="form-control"
                                            required="">
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary">Lưu Thay Đổi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
