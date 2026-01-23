@extends('server.layout')
@section('title', 'Cập nhật sản phẩm')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ 'Cập nhật sản phẩm' }}</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('products.update', $products->id) }}"
                            enctype="multipart/form-data" class="confirm-submit">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="tensp">Tên Sản Phẩm <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('tensp') is-invalid @enderror"
                                            id="tensp" name="tensp" value="{{ old('tensp', $products->tensp ?? '') }}"
                                            placeholder="Nhập tên sản phẩm" required>
                                        @error('tensp')
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


                            {{-- danh mục thương hiệu biến thể --}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Danh Mục <span class="text-danger">*</span></label>

                                        <div class="border rounded p-2" style="max-height: 200px; overflow-y: auto;">
                                            @foreach ($categories as $category)
                                                <div class="form-check">
                                                    <input class="form-check-input category-checkbox" type="checkbox"
                                                        name="categories[]" value="{{ $category->id }}"
                                                        id="cat_{{ $category->id }}"
                                                        {{ in_array(
                                                            $category->id,
                                                            old('categories', isset($products) ? $products->categories->pluck('id')->toArray() : []),
                                                        )
                                                            ? 'checked'
                                                            : '' }}>

                                                    <label class="form-check-label" for="cat_{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                        @error('category_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="thuonghieu_id">Thương Hiệu <span class="text-danger">*</span></label>
                                        <select class="form-control @error('thuonghieu_id') is-invalid @enderror"
                                            id="thuonghieu_id" name="thuonghieu_id" required>
                                            <option value="">-- Chọn thương hiệu --</option>
                                            @foreach ($thuonghieu as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ old('thuonghieu_id', $products->thuonghieu_id ?? '') == $item->id ? 'selected' : '' }}>
                                                    {{ $item->tenth }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('thuonghieu_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            {{-- ảnh --}}
                            <div class="form-group mb-4">
                                <label>Hình Nền Sản Phẩm</label>
                                <div class="image-upload-wrapper">
                                    <div class="image-target-cus" style="cursor: pointer;">
                                        @php
                                            $hinhnenValue = old('hinhnen', $products->hinhnen ?? '');
                                        @endphp

                                        @if ($hinhnenValue)
                                            <img src="{{ $hinhnenValue }}" alt="Hình nền"
                                                class="image-preview img-thumbnail"
                                                style="max-width: 300px; max-height: 300px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('backend/img/not-found.png') }}" alt="Hình nền"
                                                class="image-preview img-thumbnail"
                                                style="max-width: 300px; max-height: 300px; object-fit: cover;">
                                        @endif
                                    </div>
                                    <input type="hidden" class="image-target" value="{{ $hinhnenValue }}" name="hinhnen"
                                        id="hinhnen" />

                                    <small class="text-muted d-block mt-2">
                                        <i class="fa fa-info-circle"></i> Click vào ảnh để thay đổi hình nền
                                    </small>

                                    @if ($hinhnenValue)
                                        <button type="button" class="btn btn-sm btn-danger mt-2 delete-image">
                                            <i class="fa fa-trash"></i> Xóa hình nền
                                        </button>
                                    @endif
                                </div>
                                @error('hinhnen')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- album --}}
                            <div class="form-group">
                                <label>Album ảnh sản phẩm</label>
                                <div class="album-upload-wrapper">
                                    <button type="button" class="upload-picture mb-3 btn btn-primary" data-name="album">
                                        <i class="fa fa-upload"></i> Thêm Album Ảnh
                                    </button>
                                    <ul id="sortable" class="row upload-list">
                                        @if (isset($products) && $products->album)
                                            @php
                                                $albumArray = is_string($products->album)
                                                    ? json_decode($products->album, true)
                                                    : $products->album;
                                            @endphp
                                            @if (is_array($albumArray))
                                                @foreach ($albumArray as $image)
                                                    <li
                                                        class="ui-state-default img_li_DAMH col-xl-2 col-md-3 col-sm-6 mb-3">
                                                        <div class="thumb img_albums_DAMH">
                                                            <span class="span image img-scaledown">
                                                                <a href="{{ $image }}" data-fancybox="gallery"
                                                                    data-caption="">
                                                                    <img src="{{ $image }}" alt="Album preview"
                                                                        width="100%" class="img-thumbnail">
                                                                </a>
                                                                <input type="hidden" name="album[]"
                                                                    value="{{ $image }}">
                                                            </span>
                                                            <div class="btn_delete_albums_DAMH">
                                                                <button type="button"
                                                                    class="delete-image btn btn-sm btn-light-danger"
                                                                    title="Delete Image">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @endif
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            {{-- mô tả --}}
                            <div class="form-group">
                                <label for="mota">Mô Tả Sản Phẩm</label>
                                <textarea class="form-control ck-editor" id="mota" name="mota" data-height="400">
                                    {{ old('mota', $products->mota ?? '') }}
                                </textarea>
                                @error('mota')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            {{-- form để thêm biến thể của sản phẩm --}}
                            @include('server.pages.products.components.update_variants')
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary ">
                                    <i class="fa fa-save"></i>
                                    {{ 'Cập nhật sản phẩm' }}
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

    {{-- <style>
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
    </style> --}}
@endsection
