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
    $productUrl = route('client.products.show', $product->slug);
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
            @if ($discount > 0)
                <div class="position-absolute top-0 end-0 m-1">
                    <span class="badge bg-danger" style="font-size: 10px;">-{{ $discount }}%</span>
                </div>
            @elseif($badgeType == 'new')
                <div class="position-absolute top-0 end-0 m-1">
                    <span class="badge bg-info" style="font-size: 10px;">Mới</span>
                </div>
            @endif
            @foreach ($product->sanpham_variants as $variant)
                <button
                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity"
                    onclick="toggleFavorite({{ $product->id }})">
                    <i class="fa fa-heart text-danger" style="font-size: 12px;"></i>
                </button>
            @endforeach
            @if ($tonKho == 0)
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center"
                    style="background: rgba(0,0,0,0.5);">
                    <span class="badge bg-dark">Hết hàng</span>
                </div>
            @endif
        </div>
        <div class="card-body p-2">
            <a href="{{ $productUrl }}" class="text-decoration-none">
                <h3 class="card-title fw-medium mb-1 text-dark hover:text-primary"
                    style="font-size: 13px; line-height: 1.3; height: 36px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                    {{ $tenSP }}
                </h3>
            </a>
            @if ($product->thuonghieu)
                <p class="text-muted mb-1" style="font-size: 11px;">
                    {{ $product->thuonghieu->tenthuonghieu }}
                </p>
            @endif
            <div class="d-flex align-items-center mb-2 gap-1">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="fa fa-star {{ $i <= $rating ? 'text-warning' : 'text-muted' }}"
                        style="font-size: 9px;"></i>
                @endfor
                <span class="text-muted" style="font-size: 10px;">({{ $rating }})</span>
            </div>
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
                @php
                    $product;
                @endphp
                @foreach ($product->sanpham_variants as $variant)
                    @php
                        $tonKhoVariant = $variant->soluong;
                    @endphp

                    @if ($tonKhoVariant > 0)
                        <button onclick="addToCart('{{ $variant->sku }}')"
                            class="btn btn-sm rounded-circle p-1 btn-primary transition" title="Thêm vào giỏ hàng">
                            <i class="fa fa-shopping-cart text-white" style="font-size: 11px;"></i>
                        </button>
                        @break
                    @endif
                @endforeach
            </div>
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
        function addToCart(sku) {
            sku = sku.trim();

            console.log('SKU gửi đi:', sku);

            fetch('/gio-hang/add-to-cart', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    },
                    body: JSON.stringify({
                        sku: sku,
                        soluong: 1
                    })
                })
                .then(res => {
                    if (res.status === 401) {
                        window.location.href = '/login';
                        return;
                    }
                    return res.json();
                })
                .then(data => {
                    if (data?.success) {
                        alert('Đã thêm vào giỏ hàng!');
                        updateCartCount(data.cart_count ?? null);
                    } else if (data?.message) {
                        alert(data.message);
                    }
                })
                .catch(err => console.error(err));
        }

        function toggleFavorite(productId) {
            fetch(`/profile/favorite/toggle/${productId}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept': 'application/json'
                    }
                })
                .then(response => {
                    console.log('Response status:', response.status);
                    // Kiểm tra nếu redirect (302)
                    if (response.redirected) {
                        window.location.href = response.url;
                        return;
                    }
                    // Kiểm tra content-type
                    const contentType = response.headers.get('content-type');
                    if (contentType && contentType.includes('application/json')) {
                        return response.json();
                    } else {
                        return response.text().then(text => {
                            console.error('Response không phải JSON:', text);
                            throw new Error('Server không trả về JSON');
                        });
                    }
                })
                .then(data => {
                    if (data && data.success) {
                        alert(data.message);
                        // Có thể toggle icon tim ở đây
                        location.reload(); // Reload để cập nhật UI
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Có lỗi xảy ra, vui lòng thử lại!');
                });
        }
    </script>
@endpush
