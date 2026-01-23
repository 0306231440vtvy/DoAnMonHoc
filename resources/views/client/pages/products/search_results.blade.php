@extends('client.layouts')

@section('content')
<div class="container my-5">
    <div class="card border-0 shadow-sm mb-4 bg-light">
        <div class="card-body p-4">
            <form action="{{ route('client.search') }}" method="GET" class="row g-3">
                <div class="col-md-5">
                    <label class="form-label small fw-bold text-uppercase">
                        <i class="fa-solid fa-font me-1"></i> Tên hoặc Mô tả
                    </label>
                    <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa..." value="{{ $keyword }}">
                </div>
                <div class="col-md-5">
                    <label class="form-label small fw-bold text-uppercase">
                        <i class="fa-solid fa-coins me-1"></i> Khoảng giá (vnđ)
                    </label>
                    <div class="input-group">
                        <input type="number" name="min_price" class="form-control" placeholder="Từ" value="{{ request('min_price') }}">
                        <span class="input-group-text bg-white border-0"><i class="fa-solid fa-right-left"></i></span>
                        <input type="number" name="max_price" class="form-control" placeholder="Đến" value="{{ request('max_price') }}">
                    </div>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary w-100 fw-bold py-2">
                        <i class="fa-solid fa-filter me-2"></i> LỌC
                    </button>
                </div>
            </form>
        </div>
    </div>

    <h5 class="mb-4">
        <i class="fa-solid fa-circle-check text-success me-2"></i>
        Kết quả cho: <span class="text-primary">"{{ $keyword }}"</span>
    </h5>

    <div class="row row-cols-1 row-cols-md-4 g-4">
        @forelse($products as $product)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm hover-shadow">
                    <img src="{{ asset('client/img/' . basename($product->hinhnen)) }}" class="card-img-top" alt="...">
                    <div class="card-body p-3">
                        <h6 class="card-title text-truncate fw-bold mb-1">{{ $product->tensp }}</h6>
                        <p class="text-muted small text-truncate mb-2">
                            <i class="fa-solid fa-circle-info me-1 opacity-50"></i>{{ Str::limit($product->mota, 35) }}
                        </p>
                        <p class="text-danger fw-bold mb-2">
                            <i class="fa-solid fa-tag me-1 small"></i>{{ number_format($product->variants->first()->giaban ?? 0, 0, ',', '.') }}đ
                        </p>
                        <a href="{{ route('client.products.show', $product->id) }}" class="btn btn-outline-dark btn-sm w-100 rounded-pill">
                            <i class="fa-solid fa-eye me-1"></i> Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <i class="fa-solid fa-magnifying-glass fa-3x text-muted mb-3"></i>
                <p class="text-muted">Không tìm thấy sản phẩm phù hợp với các tiêu chí kết hợp của bạn.</p>
            </div>
        @endforelse
    </div>
</div>


<style>
    .product-card { transition: transform 0.3s ease; }
    .product-card:hover { transform: translateY(-5px); }
</style>
@endsection