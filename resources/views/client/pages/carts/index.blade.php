@extends('client.layouts')
@section('content')
    <div class="container py-4 py-md-5">
        <h1 class="h2 fw-bold mb-4">Giỏ Hàng ({{ $totalItems }})</h1>
        @if($cartItems->count()==0)
            <div class="text-center" style="margin: 40px 0;">
                <h1 class="text-muted">
                    <i class="glyphicon glyphicon-folder-open"></i>
                    <span >Giỏ hàng trống như túi tiền của bạn</span>
                </h1>
            </div> 
        @else
        
            <div class="row g-3 g-md-4">          
                <div class="col-lg-8">
                    @foreach ($cartItems as $item)    
                        <div class="bg-white rounded shadow-sm cart-item mb-3">
                            <div class="d-flex flex-column flex-md-row align-items-center gap-3 p-3 border-bottom">

                                <!-- Checkbox -->
                                <div class="form-check me-2">
                                    <input
                                        class="form-check-input check-item"
                                        type="checkbox"
                                        value="{{ $item->sanpham->id }}"
                                    >
                                </div>

                                <!-- Image -->
                                <a href="#" style="width:120px;height:120px">
                                    <img
                                        src="{{ $item->sanpham->hinhanh }}"
                                        class="img-fluid rounded object-fit-cover"
                                        alt="{{ $item->sanpham->tensp }}"
                                    >
                                </a>

                                <!-- Thoong tin sản phẩm -->
                                <div class="flex-grow-1">
                                    <h6 class="fw-semibold mb-1">{{ $item->sanpham->tensp }}</h6>
                                    <p class="mb-0 fw-bold text-success">
                                        {{ number_format($item->sanpham->giaban) }} ₫
                                    </p>
                                </div>

                                <!-- Số lượng -->
                                <div
                                    class="quantity-group d-flex align-items-center gap-2"
                                    data-id="{{ $item->sanpham_id }}"
                                >
                                    <button class="btn btn-outline-secondary btn-sm btn-minus">
                                        <i class="fa fa-minus"></i>
                                    </button>

                                    <input
                                        type="text"
                                        readonly
                                        class="form-control text-center qty-input"
                                        style="width:60px"
                                        value="{{ $item->soluong }}"
                                    >

                                    <button class="btn btn-outline-secondary btn-sm btn-plus">
                                        <i class="fa fa-plus"></i>
                                    </button>                   
                                </div>
                                
                                <button class="btn btn-outline-danger btn-sm btn-delete-item" data-id="{{ $item->sanpham_id }}">
                                    <i class="fa fa-trash"></i>
                                </button>
                                
                            </div>
                        </div>

                    @endforeach
                    <div class="row g-2 g-md-3 mt-3">
                        <div class="col-12 col-sm-6">
                            <a href="#" class="btn btn-outline-secondary w-100 py-3 fw-semibold"
                                style="transition: all 0.3s ease;">
                                <i class="fa fa-arrow-left me-2"></i>Tiếp Tục Mua Sắm
                            </a>
                        </div>
                        <div class="col-12 col-sm-6"  id="btn-clear-cart" >
                            <button class="btn btn-outline-danger w-100 py-3 fw-semibold" style="transition: all 0.3s ease;">
                                <i class="fa fa-trash me-2"></i>Xóa Tất Cả
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-white rounded shadow-sm p-3 p-md-4 position-sticky" style="top: 100px;">
                        <h3 class="h5 fw-bold mb-4">Tổng Đơn Hàng</h3>

                        <div class="mb-4">
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Tạm tính (<span id="totalQuantity">0</span> sản phẩm):</span>
                                <span class="fw-semibold"> <span id="totalPrice">0</span> </span>
                            </div>
                            {{-- <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Phí vận chuyển:</span>
                                <span class="fw-semibold">30,000đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <span class="text-muted">Giảm giá:</span>
                                <span class="fw-semibold" style="color: #ef4444;">-100,000đ</span>
                            </div> --}}
                            <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                                <span class="fw-bold" style="font-size: 1.125rem;">Tổng cộng:</span>
                                <span class="fw-bold" style="color: #10b981; font-size: 1.5rem;">2,230,000đ</span>
                            </div>
                        </div>                      
                        <a href={{ route('checkout') }} class="btn w-100 text-white py-3 fw-semibold mb-2"
                            style="background-color: #10b981; transition: background-color 0.3s ease;">
                            Tiến Hành Thanh Toán
                        </a>

                        <a href="shop.html" class="btn btn-outline-secondary w-100 py-3 fw-semibold"
                            style="transition: all 0.3s ease;">
                            Tiếp Tục Mua Sắm
                        </a>

                        <!-- Trust Badges -->
                        <div class="mt-4 pt-4 border-top">
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <i class="fa fa-shield-alt" style="color: #10b981; font-size: 1.25rem;"></i>
                                <span style="font-size: 0.875rem;" class="text-muted">Thanh toán an toàn & bảo mật</span>
                            </div>
                            <div class="d-flex align-items-center gap-3 mb-3">
                                <i class="fa fa-truck" style="color: #10b981; font-size: 1.25rem;"></i>
                                <span style="font-size: 0.875rem;" class="text-muted">Miễn phí vận chuyển đơn > 500K</span>
                            </div>
                            <div class="d-flex align-items-center gap-3">
                                <i class="fa fa-undo" style="color: #10b981; font-size: 1.25rem;"></i>
                                <span style="font-size: 0.875rem;" class="text-muted">Đổi trả trong 7 ngày</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
