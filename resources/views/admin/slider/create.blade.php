@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Table</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard') }}">Bảng Điều Khiển</a></div>
                <div class="breadcrumb-item"><a href="{{ route('admin.slider.index') }}">Quản Lý Website</a></div>
                <div class="breadcrumb-item">Tạo Banner</div>
            </div>
        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Tạo Banner</h4>

                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.slider.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="">Ảnh (Image Banner)</label>
                                    <input type="file" class="form-control" name="banner">
                                </div>
                                <div class="form-group">
                                    <label for="">Kiểu (Type)</label>
                                    <input type="text" class="form-control" name="type" value="{{ old('type') }}"
                                        placeholder="VD: Giảm Giá">
                                </div>
                                <div class="form-group">
                                    <label for="">Tiêu Đề (Title)</label>
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Giá (Price)</label>
                                    <input type="text" class="form-control" name="starting_price"
                                        value="{{ old('starting_price') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Đường dẫn của nút (Button URL)</label>
                                    <input type="text" class="form-control" name="btn_url" value="{{ old('btn_url') }}">
                                </div>
                                <div class="form-group">
                                    <label for="">Thứ Tự Xuất Hiện Của Banner (Serial)</label>
                                    <input type="text" class="form-control" name="serial" value="{{ old('serial') }}"
                                        placeholder="VD: 1, 2 ,3 ,4">
                                </div>
                                <div class="form-group">
                                    <label for="status">Trạng Thái (Status)</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1">Hiển Thị (Show)</option>
                                        <option value="0">Ẩn (Hide)</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Tạo</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
