@extends('client.layouts')
@section('content')
    <div class="container py-4 py-md-5">
        <h1 class="h2 fw-bold mb-4">Giỏ Hàng (số lượng sản phẩm trong giỏ hàng)</h1>

        <div class="row g-3 g-md-4">
            <div class="col-lg-8">
                <div class="bg-white rounded shadow-sm">
                    <div class="d-flex flex-column flex-md-row align-items-start align-items-md-center gap-3 p-3 p-md-4 border-bottom"
                        style="transition: background-color 0.3s ease;">
                        <a href="product.html" class="" style="width: 120px; height: 120px;">
                            <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=150"
                                class="w-100 h-100 object-fit-cover rounded" alt="Áo Sơ Mi">
                        </a>
                        <div class="w-100">
                            <a href="product.html" class="text-decoration-none">
                                <h3 class="h6 fw-semibold mb-2 text-dark" style="transition: color 0.3s ease;">
                                    Áo Sơ Mi Nam Trắng
                                </h3>
                            </a>
                            <p class="text-muted mb-2" style="font-size: 0.875rem;">
                                Kích thước: <span class="fw-semibold text-dark">M</span> |
                                Màu: <span class="fw-semibold text-dark">Trắng</span>
                            </p>
                            <p class="mb-0 fw-bold" style="color: #10b981; font-size: 1.125rem;">450,000đ</p>
                        </div>
                        <div
                            class="d-flex align-items-center gap-3 w-100 w-md-auto justify-content-between justify-content-md-start">
                            <div class="d-flex align-items-center border rounded" style="border-width: 2px !important;">
                                <button class="btn btn-sm border-0 d-flex align-items-center justify-content-center"
                                    style="width: 36px; height: 40px; transition: background-color 0.3s ease;">
                                    <i class="fa fa-minus" style="font-size: 0.75rem;"></i>
                                </button>
                                <input type="number" value="2"
                                    class="form-control border-0 border-start border-end text-center"
                                    style="width: 60px; height: 40px; border-width: 2px !important;">
                                <button class="btn btn-sm border-0 d-flex align-items-center justify-content-center"
                                    style="width: 36px; height: 40px; transition: background-color 0.3s ease;">
                                    <i class="fa fa-plus" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>
                            <button class="btn btn-sm d-flex align-items-center justify-content-center rounded"
                                style="width: 40px; height: 40px; color: #ef4444; transition: all 0.3s ease;">
                                <i class="fa fa-trash" style="font-size: 1rem;"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row g-2 g-md-3 mt-3">
                    <div class="col-12 col-sm-6">
                        <a href="shop.html" class="btn btn-outline-secondary w-100 py-3 fw-semibold"
                            style="transition: all 0.3s ease;">
                            <i class="fa fa-arrow-left me-2"></i>Tiếp Tục Mua Sắm
                        </a>
                    </div>
                    <div class="col-12 col-sm-6">
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
                            <span class="text-muted">Tạm tính (4 sản phẩm):</span>
                            <span class="fw-semibold">2,300,000đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Phí vận chuyển:</span>
                            <span class="fw-semibold">30,000đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">Giảm giá:</span>
                            <span class="fw-semibold" style="color: #ef4444;">-100,000đ</span>
                        </div>
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
    </div>
@endsection
