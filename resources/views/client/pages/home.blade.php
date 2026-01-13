@extends('client.layouts')
@section('content')
    <div class="container py-4">
        <h1 class="h2 fw-bold mb-4 text-dark">Cửa Hàng</h1>

        <div class="d-flex flex-column gap-4">
            <div class="w-100">
                <!-- Filter and Sort Bar -->
                <div class="bg-white p-2 rounded shadow-sm mb-3 d-flex justify-content-between align-items-center">
                    <p class="text-secondary mb-0" style="font-size: 0.75rem;">Hiển thị <span class="fw-semibold">12</span> sản
                        phẩm</p>
                    <select class="form-select form-select-sm" style="width: auto; font-size: 0.75rem;">
                        <option>Sắp xếp mặc định</option>
                        <option>Giá: Thấp đến Cao</option>
                        <option>Giá: Cao đến Thấp</option>
                        <option>Mới nhất</option>
                        <option>Bán chạy nhất</option>
                    </select>
                </div>
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 row-cols-xl-6 g-2">
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-1.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-1.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-1.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-1.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-2.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-3.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-4.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-5.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Product 1 -->
                    <div class="col">
                        <div class="card h-100 shadow-sm hover:shadow-lg transition-shadow">
                            <div class="position-relative overflow-hidden">
                                <a href="product.html">
                                    <img src="{{ asset('client/img/product-6.jpg') }}"
                                        class="card-img-top h-28 object-cover hover:scale-105 transition-transform duration-300"
                                        alt="Giày Sneaker">
                                </a>
                                <div class="position-absolute top-0 end-0 m-1">
                                    <span class="badge bg-danger text-[10px] fw-semibold">-35%</span>
                                </div>
                                <button
                                    class="btn btn-light btn-sm rounded-circle position-absolute top-0 start-0 m-1 opacity-0 hover:opacity-100 transition-opacity">
                                    <i class="fa fa-heart text-danger text-xs"></i>
                                </button>
                            </div>
                            <div class="card-body p-2">
                                <a href="product.html" class="text-decoration-none">
                                    <h3
                                        class="card-title fw-medium mb-1 text-dark text-xs leading-tight line-clamp-2 hover:text-[#667eea]">
                                        Giày Sneaker Thể Thao
                                    </h3>
                                </a>
                                <div class="d-flex align-items-center mb-2 gap-1">
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                    <i class="fa fa-star text-warning text-[9px]"></i>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <div class="d-flex flex-column">
                                        <span class="text-[#667eea] fw-bold text-xs">780,000đ</span>
                                        <span class="text-muted text-decoration-line-through text-[10px]">1,200,000đ</span>
                                    </div>
                                    <a href="cart.html"
                                        class="btn btn-sm rounded-circle p-1 bg-[#667eea] hover:bg-[#5568d3] transition">
                                        <i class="fa fa-shopping-cart text-white text-[10px]"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection
