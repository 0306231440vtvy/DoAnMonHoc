@extends('server.layout')
@section('title', 'Thêm Sản Phẩm')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Thêm Sản Phẩm Mới</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="tensp">Tên Sản Phẩm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tensp') is-invalid @enderror"
                                    id="tensp" name="tensp" value="{{ old('tensp') }}"
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
                                            id="sku" name="sku" value="{{ old('sku') }}"
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
                                            id="soluong" name="soluong" value="{{ old('soluong') }}"
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
                                            id="giaban" name="giaban" value="{{ old('giaban') }}"
                                            placeholder="Nhập giá bán" required>
                                        @error('giaban')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="discount">Giảm Giá (%)</label>
                                        <input type="text" class="form-control @error('discount') is-invalid @enderror"
                                            id="discount" name="discount" value="{{ old('discount') }}" min="0"
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
                                <textarea class="form-control @error('mota') is-invalid @enderror" id="btnMota" name="mota" rows="5"
                                    placeholder="Nhập mô tả chi tiết về sản phẩm">{{ old('mota') }}</textarea>
                                @error('mota')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-save"></i> Thêm Sản Phẩm
                                </button>
                                <a href="{{ route('products.index') }}" class="btn btn-secondary">
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
