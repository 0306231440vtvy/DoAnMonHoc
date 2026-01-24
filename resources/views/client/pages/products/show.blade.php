@extends('client.layouts')
@section('content')


@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
        <strong>Thành công!</strong> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


<div class="container my-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->tensp }}</li>
        </ol>
    </nav>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card shadow-sm border-0">
                <img src="{{ asset('client/img/' . basename($product->hinhnen)) }}" 
                    class="img-fluid rounded main-image" 
                    id="mainImage" 
                    alt="{{ $product->tensp }}">
            </div>


            <div id="comment-container">
                @foreach($product->binhluans as $index => $bl)
                    <div class="comment {{ $index >= 2 ? 'd-none hidden-comment' : '' }}" style="margin-bottom: 15px; border-bottom: 1px solid #eee; padding: 10px 0;">
                        <strong>{{ $bl->user->name }}:</strong>
                        <p>
                            {{ $bl->noidung }} 
                            <span class="emoji-stars" style="margin-left: 10px;">
                                {{-- Lấy số sao từ chính bình luận đó --}}
                                @php 
                                    $starCount = (int)($bl->danhgia ?? 5); 
                                @endphp
                                
                                @for($i = 1; $i <= 5; $i++)
                                    @if($i <= $starCount)
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
            </div>


            <div class="card border-0 shadow-sm mb-4" style="border-radius: 10px; background: #f9f9f9;">
                <div class="card-body">
                    <h6 class="fw-bold mb-3">Để lại đánh giá của bạn</h6>
                    <form id="commentForm" action="{{ route('client.products.show', $product->id) }}" method="POST">
                        @csrf
                        <div class="mb-2">
                            <div class="star-rating">
                                @for($i = 5; $i >= 1; $i--)
                                    <input type="radio" id="write-star{{ $i }}" name="danhgia" value="{{ $i }}" {{ $i == 5 ? 'checked' : '' }} />
                                    <label for="write-star{{ $i }}"><span style="font-size: 20px; cursor:pointer;">⭐</span></label>
                                @endfor
                            </div>
                        </div>
                        <div class="input-group">
                            <input type="text" name="noidung" class="form-control" placeholder="Viết bình luận..." required>
                            <button class="btn btn-primary" type="submit">Gửi</button>
                        </div>
                    </form>
                </div>
            </div>

            <style>
                /* CSS để chọn sao ngược từ phải qua trái (kỹ thuật radio rating) */
                .star-rating { display: flex; flex-direction: row-reverse; justify-content: flex-end; }
                .star-rating input { display: none; }
                .star-rating label { filter: grayscale(100%); opacity: 0.3; transition: 0.2s; }
                .star-rating input:checked ~ label, .star-rating label:hover, .star-rating label:hover ~ label { 
                    filter: grayscale(0%); opacity: 1; 
                }
            </style>


            @if(count($product->binhluans) > 2)
                <div style="margin-top: 10px;">
                    <button id="toggleCommentBtn" class="btn btn-link p-0" data-status="closed" style="text-decoration: none; font-weight: bold; color: #007bff;">
                        Xem thêm bình luận...
                    </button>
                </div>
            @endif

            <script>
                document.getElementById('commentForm').addEventListener('submit', function(e) {
                    // Biến checkLogin được render từ Blade
                    var isLoggedIn = {{ auth()->check() ? 'true' : 'false' }};
                    
                    if (!isLoggedIn) {
                        // Ngừng việc gửi form
                        e.preventDefault();
                        
                        // Thông báo nhẹ hoặc chuyển hướng ngay lập tức
                        alert('Vui lòng đăng nhập để gửi đánh giá!');
                        window.location.href = "{{ route('login') }}";
                    }
                });
            </script>
            

        </div>
    
        <div class="col-md-6">
            <h1 class="h2 fw-bold text-uppercase">{{ $product->tensp }}</h1>

            <div class="view-count border-start ps-3">
                <span class="text-muted small">
                    <i class="fa-regular fa-eye me-1"></i> 
                    <strong>{{ number_format($product->view) }}</strong> lượt xem
                </span>
            </div>
            <h2>                
                @if($product->binhluans->count() > 0)
                    @php
                        // Tính trung bình cộng cột 'danhgia' từ các bình luận
                        $averageRating = $product->binhluans->avg('danhgia');
                    @endphp
                    
                    <span class="average-rating" style="font-size: 1rem; margin-left: 10px; vertical-align: middle;">
                        <span style="color: #ffc107;">⭐</span> 
                        <strong style="color: #333;">{{ number_format($averageRating, 1) }}</strong>
                        <small class="text-muted" style="font-size: 0.8rem;">/5</small>
                        <small class="text-muted" style="font-size: 0.8rem; margin-left: 5px;">
                            ({{ $product->binhluans->count() }} bình luận)
                        </small>
                    </span>
                @else
                    <small style="font-size: 0.8rem; color: #ccc; margin-left: 10px;">(Chưa có đánh giá)</small>
                @endif
            </h2>

            <div class="product-info mt-3">
                <div class="mb-2">
                        <span class="text-muted small">Mã SKU: </span>
                        <strong id="display-sku" class="small text-dark">{{ $product->variants->first()->sku }}</strong>
                    </div>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div class="product-info mt-3">
                        <p class="text-muted mb-0">
                            Trạng thái: 
                            <span id="display-stock-count" class="fw-bold {{ $product->variants->sum('soluong') > 0 ? 'text-success' : 'text-danger' }}">
                                {{ $product->variants->sum('soluong') > 0 ? 'Còn hàng' : 'Hết hàng' }}
                            </span>
                        </p>
                        <h2 id="display-price" class="text-dark fw-bold mb-0">
                            {{ number_format($product->variants->first()->giaban ?? 0, 0, ',', '.') }}đ
                        </h2>
                    </div>

                    <div class="wishlist-wrapper">
                        @auth
                            <button type="button" class="btn-wishlist" onclick="toggleLike(this)" data-id="{{ $product->id }}">
                                <i class="fa-regular fa-heart"></i>
                            </button>

                        @endauth
                    </div>
                </div>
            </div>

            <style>
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
                    outline: none;
                }

                .btn-wishlist i {
                    font-size: 22px;
                    color: #999;
                    transition: all 0.3s ease;
                }

                .btn-wishlist:hover {
                    border-color: #ff4d4d;
                }

                /* Trạng thái khi Đã Thích (Active) */
                .btn-wishlist.active {
                    border-color: #ff4d4d !important;
                    background-color: #fff0f0 !important;
                }

                .btn-wishlist.active i {
                    color: #ff4d4d !important;
                    font-weight: 900 !important; /* Đổi font-weight để hiện tim đặc */
                }

                /* Hiệu ứng nảy tim khi click */
                .btn-wishlist:active i {
                    transform: scale(1.4);
                }
            </style>


            <div class="product-variants mt-4">
                @foreach($groupedAttributes as $typeName => $values)
                    <div class="mb-4 attribute-group" data-type="{{ $typeName }}">
                        <h6 class="text-uppercase fw-bold" style="font-size: 0.85rem; color: #555;">{{ $typeName }}:</h6>
                        <div class="d-flex flex-wrap gap-2">
                            @foreach($values as $value)
                                @php
                                    // Lấy ID thực tế từ database để JS so khớp chính xác
                                    $valObj = \App\Models\BientheValue::where('value', $value)->first();
                                @endphp
                                <input type="radio" 
                                       class="btn-check attribute-select" 
                                       name="attr_{{ Str::slug($typeName) }}" 
                                       id="val_{{ Str::slug($typeName) . '_' . Str::slug($value) }}" 
                                       value="{{ $value }}"
                                       data-value-id="{{ $valObj->id ?? '' }}"
                                       autocomplete="off"
                                       {{ $loop->first ? 'checked' : '' }}>
                                
                                <label class="btn btn-outline-dark px-3 py-2" for="val_{{ Str::slug($typeName) . '_' . Str::slug($value) }}">
                                    {{ $value }}
                                </label>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>

            <form action="{{ route('client.cart.add') }}" method="POST" class="mt-5">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <input type="hidden" name="variant_id" id="selected-variant-id" value="{{ $product->variants->first()->id }}">
                
                <div class="d-flex align-items-center mb-4">
                    <div class="input-group me-3" style="width: 130px;">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQty(-1)">-</button>
                        <input type="text" class="form-control text-center" value="1" id="quantity" name="quantity">
                        <button class="btn btn-outline-secondary" type="button" onclick="changeQty(1)">+</button>
                    </div>
                    <button type="submit" onclick="console.log('Form đang gửi đến: ' + this.form.action)" class="btn btn-dark btn-lg flex-grow-1">
                        Thêm vào giỏ hàng
                    </button>
                </div>
            </form>

            <div class="mt-4 p-3 bg-light rounded border">
                <p class="fw-bold mb-2"><i class="fas fa-info-circle me-2"></i>Mô tả sản phẩm:</p>
                <div class="text-muted small">
                    {!! $product->mota ?? 'Đang cập nhật nội dung mô tả...' !!}
                </div>
            </div>


                                                                          

            


        </div>


        <div class="container mt-5">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h4 class="fw-bold">Sản phẩm thường mua cùng</h4>
                </div>

                <div class="row row-cols-1 row-cols-md-5 g-3">
                    @foreach($relatedProducts as $related)
                        <div class="col">
                            <div class="card h-100 border-0 shadow-sm p-2 related-card">
                                <a href="{{ route('client.products.show', $related->id) }}">
                                    <img src="{{ asset('client/img/' . basename($related->hinhnen)) }}" class="card-img-top rounded" alt="{{ $related->tensp }}">
                                </a>

                                <div class="card-body p-2 d-flex flex-column">
                                    <div class="mb-1">
                                        <span class="badge bg-danger p-1" style="font-size: 0.7rem;">
                                            <i class="fas fa-bolt"></i> THỨ 4 SALE SẬP SÀN
                                        </span>
                                    </div>

                                    <h6 class="card-title mb-1 text-truncate-2" style="font-size: 0.9rem; height: 2.5rem;">
                                        <a href="#" class="text-decoration-none text-dark">{{ $related->tensp }}</a>
                                    </h6>

                                    <div class="mt-auto">
                                        <span class="text-danger fw-bold d-block">{{ number_format($related->variants->first()->giaban ?? 0, 0, ',', '.') }}đ</span>
                                        @if($related->giacu)
                                            <small class="text-muted text-decoration-line-through">{{ number_format($related->giacu, 0, ',', '.') }}đ</small>
                                            <small class="text-danger">-{{ round((($related->giacu - $related->variants->first()->giaban) / $related->giacu) * 100) }}%</small>
                                        @endif
                                    </div>

                                    <div class="mt-2 d-flex align-items-center" style="font-size: 0.8rem;">
                                        <span class="text-warning me-1">
                                            <i class="fas fa-star"></i> 
                                            {{-- Sửa từ binhluans_avg_sosao thành binhluans_avg_danhgia --}}
                                            {{ number_format($related->binhluans_avg_danhgia ?? 0, 1) }}
                                        </span>
                                        <span class="text-muted">| Đã bán {{ $related->luotmua ?? 0 }}k</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>



    </div>
</div>

<style>
    .main-image { width: 100%; height: 500px; object-fit: cover; }
    .btn-check:checked + .btn-outline-dark {
        background-color: #212529 !important;
        color: #fff !important;
    }
</style>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // 1. Chuyển dữ liệu biến thể từ Laravel sang JavaScript (có kèm ID thuộc tính)
    const productVariants = @json($product->variants->load('attributeValues'));

    function changeQty(val) {
        let qty = document.getElementById('quantity');
        let current = parseInt(qty.value);
        if(current + val >= 1) qty.value = current + val;
    }

    document.addEventListener('DOMContentLoaded', function() {
        const skuDisplay = document.getElementById('display-sku');
        const priceDisplay = document.getElementById('display-price');
        const stockCountDisplay = document.getElementById('display-stock-count');
        const variantIdInput = document.getElementById('selected-variant-id');
        const addToCartBtn = document.getElementById('add-to-cart-btn');

        function updateVariantInfo() {
            let selectedValueIds = [];
            
            // Lấy ID của tất cả radio đang được chọn
            document.querySelectorAll('.attribute-select:checked').forEach(input => {
                const id = input.getAttribute('data-value-id');
                if(id) selectedValueIds.push(parseInt(id));
            });

            console.log("Đang chọn các ID:", selectedValueIds);

            // Tìm biến thể khớp với tổ hợp ID đã chọn
            const matchedVariant = productVariants.find(variant => {
                // Kiểm tra quan hệ attribute_values trong JSON
                const vValues = variant.attribute_values || variant.attributeValues || [];
                const vIds = vValues.map(v => v.id);
                return selectedValueIds.every(id => vIds.includes(id));
            });
            // kiem tra so luong ton sp
            if (matchedVariant) {
                skuDisplay.innerText = matchedVariant.sku;
                priceDisplay.innerText = new Intl.NumberFormat('vi-VN').format(matchedVariant.giaban) + 'đ';
                
                // Xử lý hiển thị số lượng và màu sắc
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
            }
        }

        // Lắng nghe sự kiện thay đổi trên các nút radio
        document.querySelectorAll('.attribute-select').forEach(input => {
            input.addEventListener('change', updateVariantInfo);
        });

        // Chạy khởi tạo lần đầu
        updateVariantInfo();
    });


    // bnh luan
    $(document).ready(function() {
        $('#toggleCommentBtn').click(function() {
            let status = $(this).attr('data-status');

            if (status === 'closed') {
                // Đang đóng -> Mở ra
                $('.hidden-comment').removeClass('d-none');
                $(this).text('Ẩn bớt');
                $(this).attr('data-status', 'open');
            } else {
                // Đang mở -> Đóng lại
                $('.hidden-comment').addClass('d-none');
                $(this).text('Xem thêm bình luận...');
                $(this).attr('data-status', 'closed');
                
                // (Tùy chọn) Cuộn trang lên đầu khu vực bình luận để người dùng không bị lạc
                $('html, body').animate({
                    scrollTop: $("#comment-container").offset().top - 100
                }, 300);
            }
        });
    });


    function toggleLike(element) {
    const productId = element.getAttribute('data-id');
    
    // Đổi màu ngay lập tức để người dùng thấy mượt (UI/UX)
    element.classList.toggle('active');
    const icon = element.querySelector('i');
    icon.className = element.classList.contains('active') ? 'fa-solid fa-heart' : 'fa-regular fa-heart';

    // Gửi yêu cầu lưu vào Database
    fetch(`/wishlist/toggle/${productId}`, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}',
            'Content-Type': 'application/json'
        }
    })
    .then(res => res.json())
    .then(data => {
        console.log(data.message);
    })
    .catch(err => {
        // Nếu lỗi (chưa đăng nhập chẳng hạn) thì hồi lại màu cũ
        element.classList.toggle('active');
        icon.className = 'fa-regular fa-heart';
        alert('Vui lòng đăng nhập!');
    });
}

</script>

@endsection