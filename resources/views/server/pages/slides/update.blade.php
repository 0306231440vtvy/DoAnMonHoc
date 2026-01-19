@extends('server.layout')
@section('title', 'Thêm Sản Phẩm')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ 'Thêm Sản Phẩm' }}</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('slides.store') }}" method="POST" enctype="multipart/form-data"
                            class="confirm-submit">
                            @csrf
                            @if (isset($slide))
                                @method('PUT')
                            @endif
                            <div class="form-group">
                                <label for="tensp">Tên Sản Phẩm <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('tensp') is-invalid @enderror"
                                    id="tensp" name="tensp" value="{{ old('tensp', $slides->tensp ?? '') }}"
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
                                            id="sku" name="sku" value="{{ $slides->sku ?? old('sku', $sku) }}"
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
                                            value="{{ old('soluong', $slides->soluong ?? '') }}" placeholder="Nhập số lượng"
                                            required>
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
                                            id="giaban" name="giaban" value="{{ old('giaban', $slides->giaban ?? '') }}"
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
                                            id="discount" name="discount"
                                            value="{{ old('discount', $slides->discount ?? '') }}" min="0"
                                            placeholder="Nhập giảm giá">
                                        @error('discount')
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
                                            $hinhthunhoValue = old('hinhthunho', $slide->hinhthunho ?? '');
                                        @endphp

                                        @if ($hinhthunhoValue)
                                            <img src="{{ $hinhthunhoValue }}" alt="Hình nền"
                                                class="image-preview img-thumbnail"
                                                style="max-width: 300px; max-height: 300px; object-fit: cover;">
                                        @else
                                            <img src="{{ asset('backend/img/not-found.png') }}" alt="Hình nền"
                                                class="image-preview img-thumbnail"
                                                style="max-width: 300px; max-height: 300px; object-fit: cover;">
                                        @endif
                                    </div>
                                    <input type="hidden" class="image-target" value="{{ $hinhthunhoValue }}"
                                        name="hinhthunho" id="hinhthunho" />

                                    <small class="text-muted d-block mt-2">
                                        <i class="fa fa-info-circle"></i> Click vào ảnh để thay đổi hình nền
                                    </small>

                                    @if ($hinhthunhoValue)
                                        <button type="button" class="btn btn-sm btn-danger mt-2 delete-image">
                                            <i class="fa fa-trash"></i> Xóa hình nền
                                        </button>
                                    @endif
                                </div>
                                @error('hinhthunho')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary confirm-submit">
                                    <i class="fa fa-save"></i>
                                    {{ 'Thêm Sản Phẩm' }}
                                </button>
                                <a href="{{ route('slides.index') }}" class="btn btn-secondary confirm-cancel">
                                    <i class="fa fa-times"></i> Hủy
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
