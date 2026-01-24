@extends('client.layouts')
@section('content')
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
            <strong>Thành công!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="container my-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
                <li class="breadcrumb-item active">{{ $product->tensp }}</li>
            </ol>
        </nav>

        <div class="row">
            {{-- Cột trái: Hình ảnh sản phẩm --}}
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 mb-3">
                    <img src="{{ asset($product->hinhnen) }}" class="img-fluid rounded main-image" id="mainImage"
                        alt="{{ $product->tensp }}">
                </div>

                {{-- ALBUM ẢNH --}}
                @if (isset($albumImages) && $albumImages->count() > 0)
                    <div class="row g-2 mb-4">
                        <div class="col-3">
                            <img src="{{ asset($product->hinhnen) }}"
                                class="img-thumbnail cursor-pointer thumbnail-img active"
                                onclick="changeMainImage('{{ asset($product->hinhnen) }}')"
                                style="height: 80px; width: 100%; object-fit: cover; cursor: pointer;">
                        </div>

                        @foreach ($albumImages->take(7) as $img)
                            <div class="col-3">
                                <img src="{{ asset($img) }}" class="img-thumbnail cursor-pointer thumbnail-img"
                                    onclick="changeMainImage('{{ asset($img) }}')"
                                    style="height: 80px; width: 100%; object-fit: cover; cursor: pointer;">
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- Phần bình luận --}}
                {{-- <div id="comment-container" class="mt-4">
                    @foreach ($product->binhluan as $index => $bl)
                        <div class="comment {{ $index >= 2 ? 'd-none hidden-comment' : '' }}"
                            style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding: 10px 0;">
                            <strong>{{ $bl->user->name }}:</strong>
                            <p>
                                {{ $bl->noidung }}
                                <span class="emoji-stars" style="margin-left: 10px;">
                                    @php
                                        $starCount = (int) ($bl->danhgia ?? 5);
                                    @endphp

                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $starCount)
                                            <span style="color: gold;">⭐</span>
                                        @else
                                            <span style="filter: grayscale(100%); opacity: 0.2;">⭐</span>
                                        @endif
                                    @endfor
                                </span>
                            </p>
                            <small class="text-muted">{{ $bl->created_at->diffForHumans() }}</small>
                        </div>
                    @endforeach
                </div> --}}

                {{-- Form đánh giá --}}
                <div class="card border-0 shadow-sm mb-4" style="border-radius: 10px; background: #f9f9f9;">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Để lại đánh giá của bạn</h6>
                        {{-- <form id="commentForm" action="{{ route('client.products.comment', $product->slug) }}"
                            method="POST">
                            @csrf
                            <div class="mb-2">
                                <div class="star-rating">
                                    @for ($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="write-star{{ $i }}" name="danhgia"
                                            value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }} />
                                        <label for="write-star{{ $i }}">
                                            <span style="font-size: 20px; cursor:pointer;">⭐</span>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="text" name="noidung" class="form-control" placeholder="Viết bình luận..."
                                    required>
                                <button class="btn btn-primary" type="submit">Gửi</button>
                            </div>
                        </form> --}}
                    </div>
                </div>

                {{-- @if (count($product->binhluan) > 2)
                    <div style="margin-top: 10px;">
                        <button id="toggleCommentBtn" class="btn btn-link p-0" data-status="closed"
                            style="text-decoration: none; font-weight: bold; color: #007bff;">
                            Xem thêm bình luận...
                        </button>
                    </div>
                @endif --}}
            </div>

            {{-- Cột phải: Thông tin sản phẩm --}}
            <div class="col-md-6">
                <h1 class="h2 fw-bold text-uppercase">{{ $product->tensp }}</h1>

                {{-- Lượt xem --}}
                <div class="view-count border-start ps-3 mb-2">
                    <span class="text-muted small">
                        <i class="fa-regular fa-eye me-1"></i>
                        <strong>{{ number_format($product->view) }}</strong> lượt xem
                    </span>
                </div>

                {{-- Đánh giá trung bình --}}
                <div class="mb-3">
                    @if ($product->binhluan->count() > 0)
                        @php
                            $averageRating = $product->binhluan->avg('danhgia');
                        @endphp
                        <span class="average-rating" style="font-size: 1rem;">
                            <span style="color: #ffc107;">⭐</span>
                            <strong style="color: #333;">{{ number_format($averageRating, 1) }}</strong>
                            <small class="text-muted" style="font-size: 0.8rem;">/5</small>
                            <small class="text-muted" style="font-size: 0.8rem; margin-left: 5px;">
                                ({{ $product->binhluan->count() }} đánh giá)
                            </small>
                        </span>
                    @else
                        <small style="font-size: 0.8rem; color: #ccc;">(Chưa có đánh giá)</small>
                    @endif
                </div>

                {{-- Thông tin giá và SKU --}}
                <div class="product-info mt-3">
                    <div class="mb-3">
                        <strong id="display-sku" class="small text-muted d-block mb-1">
                            SKU: {{ $defaultVariant->sku ?? 'N/A' }}
                        </strong>

                        <h2 id="display-price" class="text-danger fw-bold mb-2">
                            {{ number_format($defaultVariant->giaban ?? 0, 0, ',', '.') }}đ
                        </h2>

                        <span id="display-stock-count"
                            class="fw-bold {{ ($defaultVariant->soluong ?? 0) > 0 ? 'text-success' : 'text-danger' }}">
                            {{ ($defaultVariant->soluong ?? 0) > 0 ? "Còn {$defaultVariant->soluong} sản phẩm" : 'Hết hàng' }}
                        </span>
                    </div>

                    {{-- Nút yêu thích --}}
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <div class="wishlist-wrapper">
                            @auth
                                <button type="button" class="btn-wishlist" onclick="toggleLike(this)"
                                    data-id="{{ $product->id }}">
                                    <i class="fa-regular fa-heart"></i>
                                </button>
                            @endauth
                        </div>
                    </div>
                </div>

                {{-- Chọn thuộc tính sản phẩm --}}
                <div class="product-variants mt-4">
                    @foreach ($groupedAttributes as $typeName => $values)
                        <div class="mb-4 attribute-group" data-type="{{ $typeName }}">
                            <h6 class="text-uppercase fw-bold" style="font-size: 0.85rem; color: #555;">
                                {{ $typeName }}:
                            </h6>
                            <div class="d-flex flex-wrap gap-2">
                                @foreach ($values as $val)
                                    <input type="radio" class="btn-check attribute-select"
                                        name="attr_{{ Str::slug($typeName) }}" id="val_{{ $val->id }}"
                                        value="{{ $val->value }}" data-value-id="{{ $val->id }}"
                                        {{ $loop->first ? 'checked' : '' }}>
                                    <label class="btn btn-outline-dark" for="val_{{ $val->id }}">
                                        {{ $val->value }}
                                    </label>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Form thêm vào giỏ hàng --}}
                <form action="{{ route('carts.add-to-cart') }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <input type="hidden" name="variant_id" id="selected-variant-id"
                        value="{{ $defaultVariant->id ?? '' }}">

                    <div class="d-flex align-items-center mb-4">
                        <div class="input-group me-3" style="width: 130px;">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQty(-1)">-</button>
                            <input type="text" class="form-control text-center" value="1" id="quantity"
                                name="quantity">
                            <button class="btn btn-outline-secondary" type="button" onclick="changeQty(1)">+</button>
                        </div>
                        @if ($defaultVariant)
                            <button onclick="addToCart('{{ $defaultVariant->sku }}')"
                                class="btn btn-sm rounded-circle p-1 btn-primary">
                                <i class="fa fa-shopping-cart text-white"></i>
                            </button>
                        @else
                            <button class="btn btn-secondary btn-sm" disabled>
                                Hết hàng
                            </button>
                        @endif
                        <button
                            class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity"
                            onclick="toggleFavorite({{ $product->id }})">
                            <i class="fa fa-heart text-danger" style="font-size: 12px;"></i>
                        </button>
                    </div>
                </form>

                {{-- Mô tả sản phẩm --}}
                <div class="mt-4 p-3 bg-light rounded border">
                    <p class="fw-bold mb-2">
                        <i class="fas fa-info-circle me-2"></i>Mô tả sản phẩm:
                    </p>
                    <div class="text-muted small">
                        {!! $product->mota ?? 'Đang cập nhật nội dung mô tả...' !!}
                    </div>
                </div>
            </div>
        </div>

        {{-- Sản phẩm liên quan --}}
        <div class="container mt-5">
            <h4 class="fw-bold mb-4">Sản phẩm liên quan</h4>

            <div class="row row-cols-1 row-cols-md-5 g-3">
                @foreach ($relatedProducts as $related)
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm p-2">
                            <a href="{{ route('client.products.show', $related->slug) }}">
                                <img src="{{ asset($related->hinhnen) }}" class="card-img-top rounded"
                                    style="height: 150px; object-fit: cover;" alt="{{ $related->tensp }}">
                            </a>

                            <div class="card-body p-2">
                                <h6 class="card-title mb-2 text-truncate-2" style="font-size: 0.9rem;">
                                    <a href="{{ route('client.products.show', $related->slug) }}"
                                        class="text-decoration-none text-dark">
                                        {{ $related->tensp }}
                                    </a>
                                </h6>

                                <div class="mt-auto">
                                    @php
                                        $relatedVariant = $related->sanpham_variants->first();
                                    @endphp
                                    <span class="text-danger fw-bold d-block">
                                        {{ number_format($relatedVariant->giaban ?? 0, 0, ',', '.') }}đ
                                    </span>
                                    {{-- @if ($related->discount > 0)
                                        <small class="text-muted text-decoration-line-through ms-1">
                                            {{ number_format($relatedVariant->giaban / (1 - $related->discount / 100), 0, ',', '.') }}đ
                                        </small>
                                    @endif --}}
                                </div>

                                <div class="mt-2 d-flex align-items-center" style="font-size: 0.8rem;">
                                    <span class="text-warning me-1">
                                        <i class="fas fa-star"></i>
                                        {{ number_format($related->binhluan_avg_danhgia ?? 0, 1) }}
                                    </span>
                                    <span class="text-muted">| {{ number_format($related->view) }} lượt xem</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <style>
        .main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
        }

        .thumbnail-img {
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .thumbnail-img:hover,
        .thumbnail-img.active {
            border-color: #007bff;
            transform: scale(1.05);
        }

        .btn-check:checked+.btn-outline-dark {
            background-color: #212529 !important;
            color: #fff !important;
        }

        .star-rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }

        .star-rating input {
            display: none;
        }

        .star-rating label {
            filter: grayscale(100%);
            opacity: 0.3;
            transition: 0.2s;
        }

        .star-rating input:checked~label,
        .star-rating label:hover,
        .star-rating label:hover~label {
            filter: grayscale(0%);
            opacity: 1;
        }

        .btn-wishlist {
            background: white;
            border: 1px solid #ddd;
            border-radius: 50%;
            width: 45px;
            height: 45px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-wishlist i {
            font-size: 22px;
            color: #999;
            transition: all 0.3s ease;
        }

        .btn-wishlist:hover {
            border-color: #ff4d4d;
        }

        .btn-wishlist.active {
            border-color: #ff4d4d !important;
            background-color: #fff0f0 !important;
        }

        .btn-wishlist.active i {
            color: #ff4d4d !important;
            font-weight: 900 !important;
        }

        .btn-wishlist:active i {
            transform: scale(1.4);
        }

        .text-truncate-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>
@endsection
@push('scripts')
    <script>
        // Chuyển đổi ảnh chính
        function changeMainImage(src) {
            document.getElementById('mainImage').src = src;

            // Đổi border cho thumbnail được chọn
            document.querySelectorAll('.thumbnail-img').forEach(img => {
                img.classList.remove('active');
            });
            event.target.classList.add('active');
        }

        // Dữ liệu biến thể
        const productVariants = @json($product->sanpham_variants->load('attributesValues'));

        function changeQty(val) {
            let qty = document.getElementById('quantity');
            let current = parseInt(qty.value);
            if (current + val >= 1) qty.value = current + val;
        }

        document.addEventListener('DOMContentLoaded', function() {
            const skuDisplay = document.getElementById('display-sku');
            const priceDisplay = document.getElementById('display-price');
            const stockCountDisplay = document.getElementById('display-stock-count');
            const variantIdInput = document.getElementById('selected-variant-id');

            function updateVariantInfo() {
                let selectedValueIds = [];
                document.querySelectorAll('.attribute-select:checked').forEach(input => {
                    const id = input.getAttribute('data-value-id');
                    if (id) selectedValueIds.push(parseInt(id));
                });

                const matchedVariant = productVariants.find(variant => {
                    const vValues = variant.attribute_values || variant.attributesValues || [];
                    const vIds = vValues.map(v => v.id);
                    return selectedValueIds.every(id => vIds.includes(id));
                });

                if (matchedVariant) {
                    skuDisplay.innerText = 'SKU: ' + matchedVariant.sku;
                    priceDisplay.innerText = new Intl.NumberFormat('vi-VN').format(matchedVariant.giaban) + 'đ';

                    if (matchedVariant.soluong > 0) {
                        stockCountDisplay.innerText = "Còn " + matchedVariant.soluong + " sản phẩm";
                        stockCountDisplay.classList.remove('text-danger');
                        stockCountDisplay.classList.add('text-success');
                    } else {
                        stockCountDisplay.innerText = "Hết hàng";
                        stockCountDisplay.classList.remove('text-success');
                        stockCountDisplay.classList.add('text-danger');
                    }

                    variantIdInput.value = matchedVariant.id;

                    // Cập nhật album ảnh nếu variant có album riêng
                    if (matchedVariant.album && matchedVariant.album.length > 0) {
                        // Logic cập nhật ảnh theo variant (nếu cần)
                    }
                }
            }

            document.querySelectorAll('.attribute-select').forEach(input => {
                input.addEventListener('change', updateVariantInfo);
            });

            updateVariantInfo();
        });

        // Toggle bình luận
        // $(document).ready(function() {
        //     $('#toggleCommentBtn').click(function() {
        //         let status = $(this).attr('data-status');
        //         if (status === 'closed') {
        //             $('.hidden-comment').removeClass('d-none');
        //             $(this).text('Ẩn bớt');
        //             $(this).attr('data-status', 'open');
        //         } else {
        //             $('.hidden-comment').addClass('d-none');
        //             $(this).text('Xem thêm bình luận...');
        //             $(this).attr('data-status', 'closed');
        //             $('html, body').animate({
        //                 scrollTop: $("#comment-container").offset().top - 100
        //             }, 300);
        //         }
        //     });
        // });
        // Form comment validation
        // document.getElementById('commentForm').addEventListener('submit', function(e) {
        //     var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
        //     if (!isLoggedIn) {
        //         e.preventDefault();
        //         alert('Vui lòng đăng nhập để gửi đánh giá!');
        //         window.location.href = "{{ route('login') }}";
        //     }
        // });
        // Toggle wishlist
        function toggleLike(element) {
            const productId = element.getAttribute('data-id');
            element.classList.toggle('active');
            const icon = element.querySelector('i');
            icon.className = element.classList.contains('active') ? 'fa-solid fa-heart' : 'fa-regular fa-heart';

            fetch(`/wishlist/toggle/${productId}`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    }
                })
                .then(res => res.json())
                .then(data => console.log(data.message))
                .catch(err => {
                    element.classList.toggle('active');
                    icon.className = 'fa-regular fa-heart';
                    alert('Vui lòng đăng nhập!');
                });
        }

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
