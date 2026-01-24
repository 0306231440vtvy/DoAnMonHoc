@extends('client.layouts')

@section('content')
<div class="container my-5">
    <h1 class="h2 fw-bold mb-4 text-dark">Cửa Hàng</h1>

    <div class="card border-0 shadow-sm mb-4" style="border-radius: 15px; overflow: hidden;">
        <div class="card-body p-4 bg-white shadow-sm" style="border-radius: 15px;">
    <form action="{{ route('client.search') }}" method="GET" class="d-flex flex-column gap-3">
        
        <div>
            <label class="form-label small fw-bold text-uppercase text-muted mb-2">
                <i class="fa-solid fa-font me-1"></i> Tên hoặc mô tả
            </label>
            <input type="text" name="keyword" class="form-control border-light-subtle py-2 shadow-sm" 
                   placeholder="Nhập từ khóa..." value="{{ $keyword }}" style="border-radius: 8px;">
        </div>

        <div>
            <label class="form-label small fw-bold text-uppercase text-muted mb-2">
                <i class="fa-solid fa-list me-1"></i> Danh mục sản phẩm
            </label>
            <select name="category_id" class="form-select border-light-subtle py-2 shadow-sm" style="border-radius: 8px;">
                <option value="">-- Tất cả danh mục --</option>
                @foreach ($categories ?? [] as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label class="form-label small fw-bold text-uppercase text-muted mb-2">
                <i class="fa-solid fa-coins me-1"></i> Khoảng giá (VNĐ)
            </label>
            <div class="d-flex align-items-center gap-2">
                <input type="number" name="min_price" class="form-control border-light-subtle py-2 shadow-sm" 
                       placeholder="Giá từ" value="{{ request('min_price') }}" style="border-radius: 8px;">
                <span class="text-muted"><i class="fa-solid fa-arrow-right-long"></i></span>
                <input type="number" name="max_price" class="form-control border-light-subtle py-2 shadow-sm" 
                       placeholder="đến" value="{{ request('max_price') }}" style="border-radius: 8px;">
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-success w-100 fw-bold py-2 border-0 shadow" 
                    style="background-color: #20c997; border-radius: 8px;">
                <i class="fa-solid fa-filter me-2"></i> LỌC SẢN PHẨM
            </button>
        </div>
        
    </form>
</div>
    </div>

    <div class="alert border-0 text-white d-flex justify-content-between align-items-center mb-4" 
         style="background-color: #20c997; border-radius: 10px;">
        <span><i class="fa-solid fa-magnifying-glass me-2"></i> Kết quả cho: <strong>"{{ $keyword }}"</strong></span>
        <span class="badge bg-white text-dark shadow-sm">{{ $products->total() }} sản phẩm</span>
    </div>

    <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3">
        @forelse($products as $product)
            <div class="col">
                <div class="card h-100 border-0 shadow-sm product-card" style="border-radius: 12px;">
                    <div class="position-relative overflow-hidden" style="border-radius: 12px 12px 0 0;">
                        <img src="{{ asset('client/img/' . basename($product->hinhnen)) }}" 
                             class="card-img-top object-fit-cover" style="height: 200px;" alt="...">
                        @if($product->discount)
                            <span class="position-absolute top-0 end-0 bg-danger text-white px-2 py-1 small fw-bold" 
                                  style="border-bottom-left-radius: 10px;">-{{ $product->discount }}%</span>
                        @endif
                    </div>
                    <div class="card-body p-3">
                        <h6 class="card-title text-truncate mb-1" style="font-size: 0.9rem;">{{ $product->tensp }}</h6>
                        <div class="d-flex align-items-center gap-1 mb-2 text-warning" style="font-size: 0.7rem;">
                            <i class="fa-solid fa-star"></i> <span>{{ $product->star ?? 5 }}</span>
                        </div>
                        <p class="text-danger fw-bold mb-3" style="font-size: 1rem;">
                            {{ number_format($product->variants->first()->giaban ?? 0, 0, ',', '.') }}đ
                        </p>
                        <a href="{{ route('client.products.show', $product->id) }}" 
                           class="btn btn-outline-secondary btn-sm w-100 rounded-pill border-light-subtle py-1">
                            Xem chi tiết
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5 bg-white shadow-sm" style="border-radius: 15px;">
                <img src="https://cdn-icons-png.flaticon.com/512/6134/6134065.png" width="100" class="mb-3 opacity-50">
                <p class="text-muted">Rất tiếc, chúng tôi không tìm thấy sản phẩm bạn yêu cầu.</p>
            </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-5">
        {{ $products->appends(request()->query())->links() }}
    </div>
</div>

<style>
    .product-card { transition: all 0.3s ease; }
    .product-card:hover { transform: translateY(-8px); box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important; }
    .form-control:focus { border-color: #20c997; box-shadow: 0 0 0 0.25rem rgba(32, 201, 151, 0.15); }
    /* Chỉnh màu cho phân trang */
    
</style>
@endsection