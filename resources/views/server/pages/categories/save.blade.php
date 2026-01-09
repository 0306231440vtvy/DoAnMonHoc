@extends('server.layout')
@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Thêm danh mục</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="{{ route('server.layouts') }}">Trang chủ</a>
                </li>
                <li class="active">
                    <strong>Thêm mới</strong>
                </li>
            </ol>
        </div>
    </div>

    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-content" style="border-left: 4px solid #1ab394;">
                        <h4 class="m-t-none m-b-sm">
                            <i class="fa fa-info-circle"></i> Lưu ý
                        </h4>
                        <p class="text-muted m-b-none">
                            Các trường có dấu <span class="text-danger">(*)</span> là bắt buộc nhập.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-lg-9">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Thông tin danh mục</h5>
                    </div>
                    <div class="ibox-content">
                        <form method="POST" action="{{ route('categories.store') }}" class="form-horizontal">
                            @csrf
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Tên danh mục <span
                                        class="text-danger">*</span></label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control"
                                        placeholder="Nhập tên danh mục" required>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Mô tả</label>
                                <div class="col-sm-9">
                                    <textarea name="description" rows="4" class="form-control" placeholder="Nhập mô tả cho danh mục"></textarea>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <label class="col-sm-3 control-label">Trạng thái</label>
                                <div class="col-sm-9">
                                    <select name="publish" class="form-control m-b">
                                        <option value="1" selected>Xuất bản</option>
                                        <option value="0">Không xuất bản</option>
                                    </select>
                                </div>
                            </div>
                            <div class="hr-line-dashed"></div>

                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">
                                    <button class="btn btn-white" type="button">Hủy</button>
                                    <button class="btn btn-primary" type="submit">Lưu danh mục</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
