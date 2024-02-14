@extends('frontend.layouts.master')

@section('content')
    <!--============================
                                                                                                                                                                                                                                       LOGIN/REGISTER PAGE START
                                                                                                                                                                                                                                    ==============================-->
    <section id="wsus__login_register">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 m-auto">
                    <div class="wsus__login_reg_area">
                        <ul class="nav nav-pills mb-3" id="pills-tab2" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-homes" type="button" role="tab" aria-controls="pills-homes"
                                    aria-selected="true">Đăng Nhập</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab2" data-bs-toggle="pill"
                                    data-bs-target="#pills-profiles" type="button" role="tab"
                                    aria-controls="pills-profiles" aria-selected="true">Đăng Ký</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent2">
                            <div class="tab-pane fade show active" id="pills-homes" role="tabpanel"
                                aria-labelledby="pills-home-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                                placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password" name="password" type="password" placeholder="Mật Khẩu">
                                        </div>
                                        <div class="wsus__login_save">
                                            <div class="form-check form-switch">
                                                <input id="remember_me" class="form-check-input" type="checkbox"
                                                    id="flexSwitchCheckDefault" name="remember">
                                                <label class="form-check-label" for="remember_me">Ghi Nhớ Mật Khẩu</label>
                                            </div>
                                            <a class="forget_p" href="{{ route('password.request') }}">Quên Mật Khẩu ?</a>
                                        </div>
                                        <button class="common_btn" type="submit">Đăng Nhập</button>
                                        <p class="social_text">Hoặc Đăng Nhập Với</p>
                                        <ul class="wsus__login_link">
                                            <li><a href="#"><i class="fab fa-google"></i></a></li>
                                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-profiles" role="tabpanel"
                                aria-labelledby="pills-profile-tab2">
                                <div class="wsus__login">
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="wsus__login_input">
                                            <i class="fas fa-user-tie"></i>
                                            <input id="name" name="name" value="{{ old('name') }}" type="text"
                                                placeholder="Họ Và Tên">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="far fa-envelope"></i>
                                            <input id="email" name="email" type="email" value="{{ old('email') }}"
                                                placeholder="Email">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password" type="password" type="password" name="password"
                                                placeholder="Mật Khẩu">
                                        </div>
                                        <div class="wsus__login_input">
                                            <i class="fas fa-key"></i>
                                            <input id="password_confirmation" type="password"
                                                name="password_confirmation" placeholder="Nhập Lại Mật Khẩu">
                                        </div>

                                        <button class="common_btn mt-4" type="submit">Đăng Ký</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--============================
                                                                                                                                                                                                                                       LOGIN/REGISTER PAGE END
                                                                                                                                                                                                                                    ==============================-->
@endsection
