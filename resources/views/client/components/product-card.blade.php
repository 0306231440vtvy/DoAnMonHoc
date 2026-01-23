{{-- resources/views/client/partials/product-card.blade.php --}}
@php
    // Tính giá sau giảm giá
    $giaGoc = $product->giaban ?? 0;
    $discount = $product->discount ?? 0;
    $giaSauGiam = $giaGoc - ($giaGoc * $discount) / 100;

    // Lấy hình ảnh
    $hinhAnh = $product->hinhnen ?? asset('client/img/product-default.jpg');

    // Lấy tên sản phẩm
    $tenSP = $product->tensp ?? 'Sản phẩm';

    // Link chi tiết sản phẩm
    $productUrl = route('client.product.detail', $product->slug ?? $product->id);

    // Số lượng tồn kho
    $tonKho = 0;
    if ($product->has_attribute == 1 && $product->sanpham_variants) {
        $tonKho = $product->sanpham_variants->sum('soluong');
    }

    // Đánh giá sao (có thể thêm logic đánh giá thực tế sau)
    $rating = 5;

    // Badge
    $badgeType = $showBadge ?? null;
@endphp

<div class="col">
    <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
        <div class="position-relative overflow-hidden">
            <a href="{{ $productUrl }}">
                <img src="{{ $hinhAnh }}"
                    class="card-img-top object-cover hover:scale-105 transition-transform duration-300"
                    style="height: 180px;" alt="{{ $tenSP }}">
            </a>

            <!-- Badge giảm giá hoặc bán chạy -->
            @if ($discount > 0)
                <div class="position-absolute top-0 end-0 m-1">
                    <span class="badge bg-danger" style="font-size: 10px;">-{{ $discount }}%</span>
                </div>
            @elseif($badgeType == 'bestseller')
                <div class="position-absolute top-0 end-0 m-1">
                    <span class="badge bg-success" style="font-size: 10px;">Bán chạy</span>
                </div>
            @elseif($badgeType == 'new')
                <div class="position-absolute top-0 end-0 m-1">
                    <span class="badge bg-info" style="font-size: 10px;">Mới</span>
                </div>
            @endif

            <!-- Nút yêu thích -->
            <button
                class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity"
                onclick="toggleFavorite({{ $product->id }})">
                <i class="fa fa-heart text-danger" style="font-size: 12px;"></i>
            </button>

            <!-- Hết hàng overlay -->
            @if ($tonKho == 0)
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                    style="background: rgba(0,0,0,0.5);">
                    <span class="badge bg-dark">Hết hàng</span>
                </div>
            @endif
        </div>

        <div class="card-body p-2">
            <!-- Tên sản phẩm -->
            <a href="{{ $productUrl }}" class="text-decoration-none">
                <h3 class="card-title fw-medium mb-1 text-dark hover:text-primary"
                    style="font-size: 13px; line-height: 1.3; height: 36px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                    {{ $tenSP }}
                </h3>
            </a>

            <!-- Thương hiệu -->
            @if ($product->thuonghieu)
                <p class="text-muted mb-1" style="font-size: 11px;">
                    {{ $product->thuonghieu->tenthuonghieu }}
                </p>
            @endif

            <!-- Đánh giá sao -->
            <div class="d-flex align-items-center mb-2 gap-1">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star {{ $i <= $rating ? 'text-warning' : 'text-muted' }}"
                        style="font-size: 9px;"></i>
                @endfor
                <span class="text-muted" style="font-size: 10px;">({{ $rating }})</span>
            </div>

            <!-- Giá và nút thêm giỏ hàng -->
            <div class="d-flex align-items-center justify-content-between">
                <div class="d-flex flex-column">
                    <span class="text-primary fw-bold" style="font-size: 14px;">
                        {{ number_format($giaSauGiam, 0, ',', '.') }}đ
                    </span>
                    @if ($discount > 0)
                        <span class="text-muted text-decoration-line-through" style="font-size: 11px;">
                            {{ number_format($giaGoc, 0, ',', '.') }}đ
                        </span>
                    @endif
                </div>

                @if ($tonKho > 0)
                    <button onclick="addToCart({{ $product->id }})"
                        class="btn btn-sm rounded-circle p-1 btn-primary transition">
                        <i class="fa fa-shopping-cart text-white" style="font-size: 11px;"></i>
                    </button>
                @else
                    <button class="btn btn-sm rounded-circle p-1 btn-secondary" disabled>
                        <i class="fa fa-ban text-white" style="font-size: 11px;"></i>
                    </button>
                @endif
            </div>

            <!-- Số lượng tồn kho -->
            @if ($tonKho > 0 && $tonKho <= 10)
                <p class="text-danger mb-0 mt-1" style="font-size: 10px;">
                    Chỉ còn {{ $tonKho }} sản phẩm
                </p>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script>
        function addToCart(productId) {
            // Logic thêm vào giỏ hàng
            fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Đã thêm vào giỏ hàng!');
                        // Cập nhật số lượng giỏ hàng trên header
                        updateCartCount();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        function toggleFavorite(productId) {
            fetch(`/favorite/toggle/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    </script>
@endpush
