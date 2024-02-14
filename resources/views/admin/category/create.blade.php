@extends('admin.layouts.master')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Danh Mục</h1>

        </div>
        <div class="section-body">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Thêm Danh Mục</h4>
                            <div class="card-header-action">
                            </div>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{route('admin.category.store')}}">
                                @csrf
                                <div class="form-group">
                                    <label for="">Biểu tượng (Icon)</label> <br>
                                    <button class="btn btn-primary" data-selected-class="btn-danger"
                                        data-unselected-class="btn-primary" role="iconpicker" name="icon"></button>
                                </div>
                                <div class="form-group">
                                    <label for="">Tên Danh Mục (Name)</label>
                                    <input type="text" class="form-control" name="name">
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
