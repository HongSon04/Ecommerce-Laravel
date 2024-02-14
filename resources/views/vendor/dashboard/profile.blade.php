@extends('vendor.dashboard.layouts.master')


@section('content')
    <!--=============================
                    DASHBOARD START
                  ==============================-->
    <section id="wsus__dashboard">
        <div class="container-fluid">
            @include('vendor.dashboard.layouts.sidebar')
            <div class="row">
                <div class="col-xl-9 col-xxl-10 col-lg-9 ms-auto">
                    <div class="dashboard_content mt-2 mt-md-0">
                        <h3><i class="far fa-user"></i> Thông Tin</h3>
                        <div class="wsus__dashboard_profile">
                            <div class="wsus__dash_pro_area">
                                <h4>Thông Tin Người Dùng</h4>
                                <div class="row">
                                    <form method="POST" action="{{ route('user.profile.update') }}"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT') {{-- Bởi vì form chỉ hỗ trợ GET và POST nên khi sử dụng PUT hoặc DELETE thì cần phải thêm @ method('PUT') hoặc @ method('DELETE') để gửi request PUT hoặc DELETE --}}
                                        <div class="row">
                                            <div class="col-xl-9">
                                                <div class="row">
                                                    <div class="col-xl-12 col-md-12">
                                                        <div class="wsus__dash_pro_single">
                                                            <i class="fas fa-user-tie"></i>
                                                            <input type="text" placeholder="Họ Và Tên" name="name"
                                                                value="{{ Auth::user()->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12">
                                                        <div class="wsus__dash_pro_single">
                                                            <i class="far fa-phone-alt"></i>
                                                            <input type="text" placeholder="Số Điện Thoại" name="phone"
                                                                value="{{ Auth::user()->phone }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12 col-md-12">
                                                        <div class="wsus__dash_pro_single">
                                                            <i class="fal fa-envelope-open"></i>
                                                            <input type="email" placeholder="Email" name="email"
                                                                value="{{ Auth::user()->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-12">
                                                        <div class="wsus__dash_pro_single">
                                                            <textarea cols="3" rows="5" placeholder="Tóm tắt về bạn" name="bio">{{ Auth::user()->bio }}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-sm-6 col-md-6">
                                                <div class="wsus__dash_pro_img">
                                                    <img src="{{ Auth::user()->image ? asset(Auth::user()->image) : asset('uploads/myprofile.jpg') }}"
                                                        alt="img" class="img-fluid w-100">
                                                    <input type="file" name="image">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <button class="common_btn mb-4 mt-2" type="submit">Cập Nhật</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- Change password --}}
                        <div class="wsus__dashboard_profile mt-5">
                            <div class="wsus__dash_pro_area">
                                <h4>Đổi Mật Khẩu</h4>
                                <div class="wsus__dash_pass_change mt-2">
                                    <form method="POST" action="{{ route('user.profile.update.password') }}" >
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-4 col-md-6">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-unlock-alt"></i>
                                                    <input type="password" placeholder="Mật Khẩu Hiện Tại"
                                                        name="current_password">
                                                </div>
                                            </div>
                                            <div class="col-xl-4 col-md-6">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-lock-alt"></i>
                                                    <input type="password" placeholder="Mật Khẩu Mới" name="password">
                                                </div>
                                            </div>
                                            <div class="col-xl-4">
                                                <div class="wsus__dash_pro_single">
                                                    <i class="fas fa-lock-alt"></i>
                                                    <input type="password" placeholder="Nhập Lại Mật Khẩu Mới"
                                                        name="password_confirmation">
                                                </div>
                                            </div>
                                            <div class="col-xl-12">
                                                <button class="common_btn" type="submit">Cập Nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=============================
                    DASHBOARD START
                  ==============================-->
@endsection
