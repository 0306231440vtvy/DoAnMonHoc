@extends('client.layouts')
@section('content')
    <!-- Breadcrumb -->
    <div class="bg-white py-4 border-bottom">
        <div class="container">
            <nav>
                <a href="index.html" class="text-decoration-none text-secondary hover:text-success small">Trang chủ</a>
                <span class="mx-2 text-muted small">/</span>
                <a href="shop.html" class="text-decoration-none text-secondary hover:text-success small">Cửa hàng</a>
                <span class="mx-2 text-muted small">/</span>
                <span class="text-dark small">Áo Sơ Mi Nam Trắng</span>
            </nav>
        </div>
    </div>

    <!-- Product Detail -->
    <div class="container py-5">
        <div class="row g-5">
            <!-- Product Images -->
            <div class="col-12 col-lg-6">
                <div class="bg-white rounded shadow-lg overflow-hidden mb-3">
                    <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=600" class="w-100"
                        alt="Áo Sơ Mi Nam">
                </div>
                <div class="row g-2">
                    <div class="col-3">
                        <div class="border border-success rounded overflow-hidden cursor-pointer">
                            <img src="https://images.unsplash.com/photo-1596755094514-f87e34085b2c?w=150"
                                class="w-100 object-cover" style="height: 96px;" alt="Thumb 1">
                        </div>
                    </div>
                    <div class="col-3">
                        <div
                            class="border border-secondary rounded overflow-hidden cursor-pointer hover:border-success transition">
                            <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=150"
                                class="w-100 object-cover" style="height: 96px;" alt="Thumb 2">
                        </div>
                    </div>
                    <div class="col-3">
                        <div
                            class="border border-secondary rounded overflow-hidden cursor-pointer hover:border-success transition">
                            <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=150"
                                class="w-100 object-cover" style="height: 96px;" alt="Thumb 3">
                        </div>
                    </div>
                    <div class="col-3">
                        <div
                            class="border border-secondary rounded overflow-hidden cursor-pointer hover:border-success transition">
                            <img src="https://images.unsplash.com/photo-1594938291221-94f18cbb5660?w=150"
                                class="w-100 object-cover" style="height: 96px;" alt="Thumb 4">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Info -->
            <div class="col-12 col-lg-6">
                <h1 class="h2 fw-bold mb-4">Áo Sơ Mi Nam Trắng Cao Cấp</h1>

                <div class="d-flex align-items-center mb-4">
                    <div class="d-flex text-warning me-3">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span class="text-secondary">(128 đánh giá)</span>
                    <span class="mx-3 text-muted">|</span>
                    <span class="text-success fw-semibold">Còn hàng</span>
                </div>

                <div class="mb-4">
                    <div class="d-flex align-items-baseline">
                        <span class="h1 fw-bold text-success me-3">450,000đ</span>
                        <span class="h4 text-muted text-decoration-line-through me-3">540,000đ</span>
                        <span class="badge bg-danger fw-semibold">-20%</span>
                    </div>
                </div>

                <div class="border-top border-bottom py-4 mb-4">
                    <p class="text-secondary mb-0 lh-lg">
                        Áo sơ mi nam trắng cao cấp, chất liệu cotton 100%, thiết kế hiện đại, phù hợp cho môi trường công
                        sở và dự tiệc. Form dáng slim fit tôn dáng, đường may tỉ mỉ, chắc chắn.
                    </p>
                </div>

                <!-- Size Selection -->
                <div class="mb-4">
                    <h3 class="fw-semibold mb-3 h5">Kích thước:</h3>
                    <div class="d-flex gap-3 flex-wrap">
                        <button class="btn btn-outline-secondary px-4 py-2 hover:border-success transition">S</button>
                        <button class="btn btn-success px-4 py-2 fw-semibold">M</button>
                        <button class="btn btn-outline-secondary px-4 py-2 hover:border-success transition">L</button>
                        <button class="btn btn-outline-secondary px-4 py-2 hover:border-success transition">XL</button>
                        <button class="btn btn-outline-secondary px-4 py-2 hover:border-success transition">XXL</button>
                    </div>
                </div>

                <!-- Color Selection -->
                <div class="mb-4">
                    <h3 class="fw-semibold mb-3 h5">Màu sắc:</h3>
                    <div class="d-flex gap-3">
                        <button class="rounded-circle bg-white border border-success shadow-sm"
                            style="width: 48px; height: 48px;"></button>
                        <button
                            class="rounded-circle bg-primary border border-secondary hover:border-success shadow-sm transition"
                            style="width: 48px; height: 48px;"></button>
                        <button
                            class="rounded-circle bg-dark border border-secondary hover:border-success shadow-sm transition"
                            style="width: 48px; height: 48px;"></button>
                        <button
                            class="rounded-circle bg-secondary border border-secondary hover:border-success shadow-sm transition"
                            style="width: 48px; height: 48px;"></button>
                    </div>
                </div>

                <!-- Quantity -->
                <div class="mb-4">
                    <h3 class="fw-semibold mb-3 h5">Số lượng:</h3>
                    <div class="d-inline-flex align-items-stretch border rounded overflow-hidden">
                        <button class="btn px-4 py-3 border-0 hover:bg-light transition">
                            <i class="fa fa-minus"></i>
                        </button>
                        <input type="number" value="1"
                            class="form-control border-0 border-start border-end text-center" style="width: 80px;">
                        <button class="btn px-4 py-3 border-0 hover:bg-light transition">
                            <i class="fa fa-plus"></i>
                        </button>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-3 mb-3">
                    <a href="cart.html" class="btn btn-success flex-fill py-3 fw-semibold transition">
                        <i class="fa fa-shopping-cart me-2"></i>Thêm Vào Giỏ Hàng
                    </a>
                    <button class="btn btn-outline-success px-4 transition">
                        <i class="far fa-heart fs-4"></i>
                    </button>
                </div>

                <a href="checkout.html" class="btn btn-warning w-100 py-3 fw-semibold text-white transition">
                    Mua Ngay
                </a>

                <!-- Product Meta -->
                <div class="mt-4 pt-4 border-top">
                    <div class="d-flex mb-3 small">
                        <span class="text-secondary" style="min-width: 120px;">SKU:</span>
                        <span class="fw-semibold">SM-001-WT</span>
                    </div>
                    <div class="d-flex mb-3 small">
                        <span class="text-secondary" style="min-width: 120px;">Danh mục:</span>
                        <a href="shop.html" class="fw-semibold text-success text-decoration-none hover:underline">Thời
                            trang Nam, Áo Sơ Mi</a>
                    </div>
                    <div class="d-flex mb-3 small">
                        <span class="text-secondary" style="min-width: 120px;">Thẻ:</span>
                        <span class="fw-semibold">Áo sơ mi, Nam, Công sở, Cotton</span>
                    </div>
                    <div class="d-flex align-items-center small">
                        <span class="text-secondary" style="min-width: 120px;">Chia sẻ:</span>
                        <div class="d-flex gap-2">
                            <a href="#"
                                class="btn btn-primary rounded-circle p-0 d-inline-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                            <a href="#"
                                class="btn btn-info rounded-circle p-0 d-inline-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="#"
                                class="btn btn-danger rounded-circle p-0 d-inline-flex align-items-center justify-content-center"
                                style="width: 36px; height: 36px;">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Product Tabs -->
        <div class="mt-5">
            <ul class="nav nav-tabs border-bottom mb-4">
                <li class="nav-item">
                    <button class="nav-link active border-bottom border-3 border-success text-success fw-semibold">Mô
                        tả</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link border-0 text-secondary hover:text-success">Thông tin bổ sung</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link border-0 text-secondary hover:text-success">Đánh giá (128)</button>
                </li>
            </ul>

            <div class="bg-white rounded shadow p-4 p-md-5">
                <h3 class="h3 fw-bold mb-4">Mô Tả Sản Phẩm</h3>
                <div class="text-secondary lh-lg">
                    <p>Áo sơ mi nam trắng cao cấp được thiết kế với chất liệu cotton 100% cao cấp, mang lại cảm giác thoải
                        mái và thoáng mát suốt cả ngày dài. Sản phẩm phù hợp cho mọi dịp từ công sở đến dự tiệc, giúp bạn
                        luôn tự tin và lịch lãm.</p>

                    <p class="fw-bold text-dark mt-4">Đặc điểm nổi bật:</p>
                    <ul class="mb-4">
                        <li class="mb-2">Chất liệu cotton 100% cao cấp, thấm hút mồ hôi tốt</li>
                        <li class="mb-2">Form dáng slim fit hiện đại, tôn dáng người mặc</li>
                        <li class="mb-2">Đường may tỉ mỉ, chắc chắn, bền đẹp theo thời gian</li>
                        <li class="mb-2">Dễ dàng phối đồ cho nhiều phong cách khác nhau</li>
                        <li class="mb-2">Màu trắng tinh khôi, dễ phối với mọi trang phục</li>
                        <li class="mb-2">Phù hợp cho môi trường công sở, dự tiệc và các sự kiện quan trọng</li>
                    </ul>

                    <p class="fw-bold text-dark mt-4">Hướng dẫn bảo quản:</p>
                    <ul class="mb-4">
                        <li class="mb-2">Giặt máy ở nhiệt độ thường, không ngâm lâu</li>
                        <li class="mb-2">Không sử dụng chất tẩy mạnh</li>
                        <li class="mb-2">Là ủi ở nhiệt độ trung bình</li>
                        <li class="mb-2">Phơi nơi thoáng mát, tránh ánh nắng trực tiếp</li>
                    </ul>

                    <p class="fw-bold text-dark mt-4">Bảng size:</p>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="text-center">Size</th>
                                    <th class="text-center">Chiều cao (cm)</th>
                                    <th class="text-center">Cân nặng (kg)</th>
                                    <th class="text-center">Vai (cm)</th>
                                    <th class="text-center">Ngực (cm)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center fw-semibold">S</td>
                                    <td class="text-center">160-165</td>
                                    <td class="text-center">50-55</td>
                                    <td class="text-center">42</td>
                                    <td class="text-center">88</td>
                                </tr>
                                <tr class="table-light">
                                    <td class="text-center fw-semibold">M</td>
                                    <td class="text-center">165-170</td>
                                    <td class="text-center">55-62</td>
                                    <td class="text-center">44</td>
                                    <td class="text-center">92</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">L</td>
                                    <td class="text-center">170-175</td>
                                    <td class="text-center">62-68</td>
                                    <td class="text-center">46</td>
                                    <td class="text-center">96</td>
                                </tr>
                                <tr class="table-light">
                                    <td class="text-center fw-semibold">XL</td>
                                    <td class="text-center">175-180</td>
                                    <td class="text-center">68-75</td>
                                    <td class="text-center">48</td>
                                    <td class="text-center">100</td>
                                </tr>
                                <tr>
                                    <td class="text-center fw-semibold">XXL</td>
                                    <td class="text-center">180-185</td>
                                    <td class="text-center">75-82</td>
                                    <td class="text-center">50</td>
                                    <td class="text-center">104</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Related Products -->
        <div class="mt-5">
            <h2 class="h2 fw-bold mb-4">Sản Phẩm Liên Quan</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-4 g-4">
                <!-- Related Product 1 -->
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 hover:shadow-xl transition">
                        <div class="position-relative overflow-hidden">
                            <a href="product.html">
                                <img src="https://images.unsplash.com/photo-1602810318383-e386cc2a3ccf?w=300"
                                    class="card-img-top object-cover hover:scale-110 transition-transform duration-300"
                                    style="height: 256px;" alt="Áo Sơ Mi Xanh">
                            </a>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">-15%</span>
                        </div>
                        <div class="card-body">
                            <a href="product.html" class="text-decoration-none">
                                <h3 class="h6 fw-semibold mb-2 text-dark hover:text-success transition">Áo Sơ Mi Nam Xanh
                                </h3>
                            </a>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="far fa-star text-warning small"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success fw-bold">480,000đ</span>
                                    <span class="text-muted text-decoration-line-through small ms-2">565,000đ</span>
                                </div>
                                <a href="cart.html" class="btn btn-success btn-sm rounded-circle">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 2 -->
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 hover:shadow-xl transition">
                        <div class="position-relative overflow-hidden">
                            <a href="product.html">
                                <img src="https://images.unsplash.com/photo-1598033129183-c4f50c736f10?w=300"
                                    class="card-img-top object-cover hover:scale-110 transition-transform duration-300"
                                    style="height: 256px;" alt="Áo Sơ Mi Kẻ">
                            </a>
                            <span class="badge bg-success position-absolute top-0 end-0 m-2">New</span>
                        </div>
                        <div class="card-body">
                            <a href="product.html" class="text-decoration-none">
                                <h3 class="h6 fw-semibold mb-2 text-dark hover:text-success transition">Áo Sơ Mi Kẻ Sọc
                                </h3>
                            </a>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success fw-bold">520,000đ</span>
                                </div>
                                <a href="cart.html" class="btn btn-success btn-sm rounded-circle">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 3 -->
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 hover:shadow-xl transition">
                        <div class="position-relative overflow-hidden">
                            <a href="product.html">
                                <img src="https://images.unsplash.com/photo-1594938291221-94f18cbb5660?w=300"
                                    class="card-img-top object-cover hover:scale-110 transition-transform duration-300"
                                    style="height: 256px;" alt="Áo Sơ Mi Đen">
                            </a>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">-20%</span>
                        </div>
                        <div class="card-body">
                            <a href="product.html" class="text-decoration-none">
                                <h3 class="h6 fw-semibold mb-2 text-dark hover:text-success transition">Áo Sơ Mi Nam Đen
                                </h3>
                            </a>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star-half-alt text-warning small"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success fw-bold">450,000đ</span>
                                    <span class="text-muted text-decoration-line-through small ms-2">540,000đ</span>
                                </div>
                                <a href="cart.html" class="btn btn-success btn-sm rounded-circle">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Related Product 4 -->
                <div class="col">
                    <div class="card border-0 shadow-sm h-100 hover:shadow-xl transition">
                        <div class="position-relative overflow-hidden">
                            <a href="product.html">
                                <img src="https://images.unsplash.com/photo-1618932260643-eee4a2f652a6?w=300"
                                    class="card-img-top object-cover hover:scale-110 transition-transform duration-300"
                                    style="height: 256px;" alt="Quần Kaki">
                            </a>
                            <span class="badge bg-danger position-absolute top-0 end-0 m-2">-25%</span>
                        </div>
                        <div class="card-body">
                            <a href="product.html" class="text-decoration-none">
                                <h3 class="h6 fw-semibold mb-2 text-dark hover:text-success transition">Quần Kaki Nam Đen
                                </h3>
                            </a>
                            <div class="d-flex mb-2">
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="fa fa-star text-warning small"></i>
                                <i class="far fa-star text-warning small"></i>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-success fw-bold">420,000đ</span>
                                    <span class="text-muted text-decoration-line-through small ms-2">560,000đ</span>
                                </div>
                                <a href="cart.html" class="btn btn-success btn-sm rounded-circle">
                                    <i class="fa fa-shopping-cart"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
