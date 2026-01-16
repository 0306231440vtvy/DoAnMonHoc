@extends('server.layout')
@section('title', isset($product) ? 'Cập nhật sản phẩm' : 'Thêm Sản Phẩm')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ isset($product) ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' }}</h3>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($product) ? route('products.edit', $products->id) : route('products.store') }}"
                            method="POST" enctype="multipart/form-data" class="confirm-submit">
                            @csrf
                            @if (isset($product))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="tensp">Tên Sản Phẩm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tensp') is-invalid @enderror"
                                    id="tensp" name="tensp" value="{{ old('tensp', $products->tensp ?? '') }}"
                                    placeholder="Nhập tên sản phẩm" required>
                                @error('tensp')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="sku">SKU (Mã sản phẩm)</label>
                                        <input type="text" class="form-control @error('sku') is-invalid @enderror"
                                            id="sku" name="sku" value="{{ $products->sku ?? old('sku', $sku) }}"
                                            placeholder="VD: SP001">
                                        @error('sku')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="soluong">Số Lượng <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('soluong') is-invalid @enderror"
                                            id="soluong" name="soluong"
                                            value="{{ old('soluong', $products->soluong ?? '') }}"
                                            placeholder="Nhập số lượng" required>
                                        @error('soluong')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="giaban">Giá Bán (VNĐ) <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('giaban') is-invalid @enderror"
                                            id="giaban" name="giaban"
                                            value="{{ old('giaban', $products->giaban ?? '') }}" placeholder="Nhập giá bán"
                                            required>
                                        @error('giaban')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount">Giảm Giá (%)</label>
                                        <input type="text" class="form-control @error('discount') is-invalid @enderror"
                                            id="discount" name="discount"
                                            value="{{ old('discount', $products->discount ?? '') }}" min="0"
                                            placeholder="Nhập giảm giá">
                                        @error('discount')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="category_id">Danh Mục <span class="text-danger">*</span></label>
                                        <select class="form-control @error('category_id') is-invalid @enderror"
                                            id="category_id" name="category_id" required>
                                            <option value="">-- Chọn danh mục --</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('category_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="thuonghieu_id">Thương Hiệu <span class="text-danger">*</span></label>
                                        <select class="form-control @error('thuonghieu_id') is-invalid @enderror"
                                            id="thuonghieu_id" name="thuonghieu_id" required>
                                            <option value="">-- Chọn thương hiệu --</option>
                                            @foreach ($thuonghieu as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('thuonghieu_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->tenth }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('thuonghieu_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="bienthe_id">Biến Thể</label>
                                        <select class="form-control @error('bienthe_id') is-invalid @enderror"
                                            id="bienthe_id" name="bienthe_id">
                                            <option value="">-- Không có biến thể --</option>
                                            @foreach ($bienthe as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('bienthe_id') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('bienthe_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="mota">Mô Tả Sản Phẩm</label>
                                <textarea class="form-control ck-editor" id="mota" name="mota" data-height="400">
                                    {{ old('mota') }}
                                </textarea>
                                @error('mota')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Hình Ảnh Phụ (Album)</label>

                                {{-- Nút upload ảnh phụ --}}
                                <div class="mb-3">
                                    <button type="button" class="btn btn-primary upload-picture" data-name="album">
                                        <i class="fa fa-images"></i> Chọn nhiều ảnh
                                    </button>
                                    <small class="text-muted ml-2">
                                        <i class="fa fa-info-circle"></i> Nhấn Ctrl để chọn nhiều ảnh cùng lúc
                                    </small>
                                </div>

                                {{-- Grid hiển thị ảnh phụ --}}
                                <div class="row" id="sortable">
                                    {{-- @if (isset($product) && $product->album)
                                        @php
                                            $albumImages = is_string($product->album)
                                                ? json_decode($product->album, true)
                                                : $product->album;
                                        @endphp

                                        @if (is_array($albumImages))
                                            @foreach ($albumImages as $image) --}}
                                    {{-- <li class="ui-state-default img_li_DAMH col-xl-2 col-md-3 col-sm-6 mb-3">
                                        <div class="thumb img_albums_DAMH">
                                            <span class="span image img-scaledown">
                                                <a href="{{ asset($image) }}" data-fancybox="gallery" data-caption="">
                                                    <img src="{{ asset($image) }}" alt="Image preview" width="100%"
                                                        class="img-thumbnail">
                                                </a>
                                                <input type="hidden" name="album[]" value="{{ $image }}">
                                            </span>
                                            <div class="btn_delete_albums_DAMH">
                                                <button type="button" class="delete-image btn btn-sm btn-danger"
                                                    title="Xóa ảnh">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </li> --}}
                                    {{-- @endforeach
                                        @endif
                                    @endif --}}
                                </div>

                                {{-- Thông báo khi chưa có ảnh --}}
                                <div id="no-images-message" class="text-center text-muted py-4"
                                    style="{{ isset($albumImages) && count($albumImages) > 0 ? 'display: none;' : '' }}">
                                    <i class="fa fa-images fa-3x mb-3"></i>
                                    <p>Chưa có ảnh phụ nào. Click nút "Chọn nhiều ảnh" để thêm.</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary confirm-submit">
                                    <i class="fa fa-save"></i> Thêm Sản Phẩm
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary confirm-cancel">
                                    <i class="fa fa-times"></i> Hủy
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        .card-header {
            background: linear-gradient(135deg, #363f5a 0%, #000000 100%);
            color: white;
            border-radius: 8px 8px 0 0;
            padding: 15px 20px;
        }

        .card-title {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }

        .form-group label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }

        .text-danger {
            color: #e74c3c;
        }

        .form-control {
            border-radius: 6px;
            border: 1px solid #ddd;
            padding: 10px 15px;
        }

        .btn {
            padding: 10px 20px;
            border-radius: 6px;
            font-weight: 500;
        }

        .btn-primary:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background: #00060c;
            border: none;
        }

        .invalid-feedback {
            display: block;
            margin-top: 5px;
            font-size: 14px;
        }
    </style>
@endsection
