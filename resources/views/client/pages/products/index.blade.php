@extends('client.layouts')
@section('content')
    <div class="container py-4">
        <h1 class="h2 fw-bold mb-4 text-dark">Cửa Hàng</h1>

        <div class="d-flex flex-column gap-4">
            <div class="w-100">
                <!-- Filter and Sort Bar -->
                <div class="bg-white p-2 rounded shadow-sm mb-3 d-flex justify-content-between align-items-center">
                    <p class="text-secondary mb-0" style="font-size: 0.875rem;">
                        Hiển thị <span class="fw-semibold">12</span> sản phẩm
                    </p>
                    <select class="form-select form-select-sm w-auto" style="font-size: 0.875rem;">
                        <option>Sắp xếp mặc định</option>
                        <option>Giá: Thấp đến Cao</option>
                        <option>Giá: Cao đến Thấp</option>
                        <option>Mới nhất</option>
                        <option>Bán chạy nhất</option>
                    </select>
                </div>

                <!-- Product Grid -->
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2 g-md-3">
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                            style="transition: all 0.3s ease;">
                            <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                <a href="product.html" class="d-block position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('client/img/product-1.jpg') }}" class="w-100 h-100 object-fit-cover"
                                        style="transition: transform 0.3s ease;" alt="Giày Sneaker">
                                </a>

                                <!-- Badge -->
                                <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                    style="top: 8px; right: 8px; z-index: 10;">
                                    <span class="badge bg-danger text-white text-nowrap fw-semibold"
                                        style="font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                        -35%
                                    </span>
                                </div>

                                <!-- Wishlist Button -->
                                <button
                                    class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                    style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                    <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>

                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3 class="card-title mb-1 text-dark lh-sm"
                                        style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>

                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold" style="color: #667eea; font-size: 0.875rem;">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through"
                                            style="font-size: 0.75rem;">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                        style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                        <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                            style="transition: all 0.3s ease;">
                            <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                <a href="product.html" class="d-block position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('client/img/product-1.jpg') }}" class="w-100 h-100 object-fit-cover"
                                        style="transition: transform 0.3s ease;" alt="Giày Sneaker">
                                </a>

                                <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                    style="top: 8px; right: 8px; z-index: 10;">
                                    <span class="badge bg-danger text-white text-nowrap fw-semibold"
                                        style="font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                        -35%
                                    </span>
                                </div>

                                <button
                                    class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                    style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                    <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>

                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3 class="card-title mb-1 text-dark lh-sm"
                                        style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>

                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold" style="color: #667eea; font-size: 0.875rem;">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through"
                                            style="font-size: 0.75rem;">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                        style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                        <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                            style="transition: all 0.3s ease;">
                            <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                <a href="product.html" class="d-block position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('client/img/product-3.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s ease;"
                                        alt="Quần Jean">
                                </a>

                                <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                    style="top: 8px; right: 8px; z-index: 10;">
                                    <span class="badge bg-danger text-white text-nowrap fw-semibold"
                                        style="font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                        -25%
                                    </span>
                                </div>

                                <button
                                    class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                    style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                    <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>

                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3 class="card-title mb-1 text-dark lh-sm"
                                        style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                        Quần Jean Nam Xanh
                                    </h3>
                                </a>

                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold" style="color: #667eea; font-size: 0.875rem;">550,000đ</span>
                                        <span class="text-muted text-decoration-line-through"
                                            style="font-size: 0.75rem;">660,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                        style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                        <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                            style="transition: all 0.3s ease;">
                            <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                <a href="product.html" class="d-block position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('client/img/product-4.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s ease;"
                                        alt="Áo Khoác">
                                </a>

                                <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                    style="top: 8px; right: 8px; z-index: 10;">
                                    <span class="badge bg-danger text-white text-nowrap fw-semibold"
                                        style="font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                        -30%
                                    </span>
                                </div>

                                <button
                                    class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                    style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                    <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>

                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3 class="card-title mb-1 text-dark lh-sm"
                                        style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                        Áo Khoác Nữ Hàn Quốc
                                    </h3>
                                </a>

                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star-half-alt text-warning" style="font-size: 0.7rem;"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold" style="color: #667eea; font-size: 0.875rem;">680,000đ</span>
                                        <span class="text-muted text-decoration-line-through"
                                            style="font-size: 0.75rem;">816,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                        style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                        <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 5 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                            style="transition: all 0.3s ease;">
                            <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                <a href="product.html" class="d-block position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('client/img/product-5.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s ease;"
                                        alt="Đầm Công Sở">
                                </a>

                                <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                    style="top: 8px; right: 8px; z-index: 10;">
                                    <span class="badge text-white text-nowrap fw-semibold"
                                        style="background-color: #667eea; font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                        New
                                    </span>
                                </div>

                                <button
                                    class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                    style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                    <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>

                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3 class="card-title mb-1 text-dark lh-sm"
                                        style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                        Đầm Công Sở Thanh Lịch
                                    </h3>
                                </a>

                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold" style="color: #667eea; font-size: 0.875rem;">720,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                        style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                        <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product 6 -->
                    <div class="col">
                        <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                            style="transition: all 0.3s ease;">
                            <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                <a href="product.html" class="d-block position-absolute top-0 start-0 w-100 h-100">
                                    <img src="{{ asset('client/img/product-6.jpg') }}"
                                        class="w-100 h-100 object-fit-cover" style="transition: transform 0.3s ease;"
                                        alt="Áo Thun">
                                </a>

                                <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                    style="top: 8px; right: 8px; z-index: 10;">
                                    <span class="badge bg-danger text-white text-nowrap fw-semibold"
                                        style="font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                        -10%
                                    </span>
                                </div>

                                <button
                                    class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                    style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                    <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                </button>
                            </div>

                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3 class="card-title mb-1 text-dark lh-sm"
                                        style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                        Áo Thun Nam Basic
                                    </h3>
                                </a>

                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star text-warning" style="font-size: 0.7rem;"></i>
                                    <i class="fa fa-star-half-alt text-warning" style="font-size: 0.7rem;"></i>
                                </div>

                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="fw-bold" style="color: #667eea; font-size: 0.875rem;">250,000đ</span>
                                        <span class="text-muted text-decoration-line-through"
                                            style="font-size: 0.75rem;">280,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                        style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                        <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center align-items-center gap-2 mt-4">
                    <button class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px;">
                        <i class="fa fa-chevron-left" style="font-size: 0.75rem;"></i>
                    </button>
                    <button class="btn btn-sm text-white fw-medium d-flex align-items-center justify-content-center"
                        style="background-color: #667eea; width: 36px; height: 36px;">1</button>
                    <button class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px;">2</button>
                    <button class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px;">3</button>
                    <button class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center"
                        style="width: 36px; height: 36px;">
                        <i class="fa fa-chevron-right" style="font-size: 0.75rem;"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection
