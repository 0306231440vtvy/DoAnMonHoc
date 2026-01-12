<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới Thiệu - ShopVN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        .page-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 80px 0;
        }
        .feature-box {
            padding: 30px;
            border-radius: 10px;
            transition: transform 0.3s;
        }
        .feature-box:hover {
            transform: translateY(-10px);
        }
        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }
        .team-member img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="/">
                <i class="bi bi-shop text-primary"></i> ShopVN
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/"><i class="bi bi-house-door"></i> Trang Chủ</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-grid"></i> Sản Phẩm
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/products">Tất Cả Sản Phẩm</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="/category/electronics">Điện Tử</a></li>
                            <li><a class="dropdown-item" href="/category/fashion">Thời Trang</a></li>
                            <li><a class="dropdown-item" href="/category/home">Gia Dụng</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/about"><i class="bi bi-info-circle"></i> Giới Thiệu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact"><i class="bi bi-envelope"></i> Liên Hệ</a>
                    </li>
                </ul>
                <form class="d-flex me-3" role="search">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Tìm kiếm...">
                        <button class="btn btn-outline-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link position-relative" href="/cart">
                            <i class="bi bi-cart3"></i> Giỏ Hàng
                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> Tài Khoản
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="/profile"><i class="bi bi-person"></i> Thông Tin</a></li>
                            <li><a class="dropdown-item" href="/orders"><i class="bi bi-bag-check"></i> Đơn Hàng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Về Chúng Tôi</h1>
            <p class="lead">Hành trình xây dựng thương hiệu uy tín hàng đầu Việt Nam</p>
        </div>
    </section>

    <!-- About Story -->
    <section class="py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4">
                    <img src="https://via.placeholder.com/600x400" class="img-fluid rounded shadow" alt="About Us">
                </div>
                <div class="col-lg-6">
                    <h2 class="mb-4">Câu Chuyện Của Chúng Tôi</h2>
                    <p>ShopVN được thành lập vào năm 2020 với mục tiêu mang đến trải nghiệm mua sắm trực tuyến tốt nhất cho người tiêu dùng Việt Nam.</p>
                    <p>Chúng tôi bắt đầu từ một cửa hàng nhỏ và đã phát triển thành một trong những nền tảng thương mại điện tử hàng đầu, phục vụ hàng triệu khách hàng trên toàn quốc.</p>
                    <p>Với đội ngũ nhân viên tận tâm và hệ thống logistics hiện đại, chúng tôi cam kết mang đến sản phẩm chất lượng, giá cả hợp lý và dịch vụ khách hàng xuất sắc.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission & Vision -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="feature-box bg-white shadow-sm h-100">
                        <div class="text-center mb-3">
                            <i class="bi bi-bullseye display-3 text-primary"></i>
                        </div>
                        <h3 class="text-center mb-3">Sứ Mệnh</h3>
                        <p class="text-center">Mang đến trải nghiệm mua sắm trực tuyến tốt nhất, giúp khách hàng tiếp cận sản phẩm chất lượng với giá cả hợp lý, giao hàng nhanh chóng và dịch vụ chăm sóc khách hàng tận tình.</p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="feature-box bg-white shadow-sm h-100">
                        <div class="text-center mb-3">
                            <i class="bi bi-eye display-3 text-success"></i>
                        </div>
                        <h3 class="text-center mb-3">Tầm Nhìn</h3>
                        <p class="text-center">Trở thành nền tảng thương mại điện tử hàng đầu Việt Nam, được khách hàng tin tưởng và lựa chọn, đồng thời tạo ra giá trị bền vững cho cộng đồng và xã hội.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Core Values -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Giá Trị Cốt Lõi</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-shield-check display-5"></i>
                        </div>
                        <h5>Uy Tín</h5>
                        <p class="text-muted">Cam kết sản phẩm chính hãng, minh bạch trong kinh doanh</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-gem display-5"></i>
                        </div>
                        <h5>Chất Lượng</h5>
                        <p class="text-muted">Chọn lọc sản phẩm tốt nhất từ các thương hiệu uy tín</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-lightning-charge display-5"></i>
                        </div>
                        <h5>Nhanh Chóng</h5>
                        <p class="text-muted">Giao hàng nhanh, xử lý đơn hàng hiệu quả</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center">
                        <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i class="bi bi-heart display-5"></i>
                        </div>
                        <h5>Tận Tâm</h5>
                        <p class="text-muted">Luôn lắng nghe và hỗ trợ khách hàng nhiệt tình</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats -->
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 mb-4">
                    <i class="bi bi-people display-3 mb-3"></i>
                    <h2 class="fw-bold">500K+</h2>
                    <p>Khách Hàng Tin Tưởng</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="bi bi-box-seam display-3 mb-3"></i>
                    <h2 class="fw-bold">10K+</h2>
                    <p>Sản Phẩm Đa Dạng</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="bi bi-truck display-3 mb-3"></i>
                    <h2 class="fw-bold">1M+</h2>
                    <p>Đơn Hàng Thành Công</p>
                </div>
                <div class="col-md-3 mb-4">
                    <i class="bi bi-star-fill display-3 mb-3"></i>
                    <h2 class="fw-bold">4.8/5</h2>
                    <p>Đánh Giá Trung Bình</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Team -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center mb-5">Đội Ngũ Của Chúng Tôi</h2>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member">
                        <h5>Nguyễn Văn A</h5>
                        <p class="text-muted">CEO & Founder</p>
                        <div>
                            <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member">
                        <h5>Trần Thị B</h5>
                        <p class="text-muted">Giám Đốc Vận Hành</p>
                        <div>
                            <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member">
                        <h5>Lê Văn C</h5>
                        <p class="text-muted">Giám Đốc Marketing</p>
                        <div>
                            <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="team-member">
                        <img src="https://via.placeholder.com/150" alt="Team Member">
                        <h5>Phạm Thị D</h5>
                        <p class="text-muted">Giám Đốc CSKH</p>
                        <div>
                            <a href="#" class="text-primary me-2"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="text-info me-2"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="text-primary"><i class="bi bi-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white pt-5 pb-3">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3"><i class="bi bi-shop"></i> ShopVN</h5>
                    <p>Cửa hàng trực tuyến uy tín</p>
                    <div class="social-links">
                        <a href="#" class="text-white me-3"><i class="bi bi-facebook fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-instagram fs-4"></i></a>
                        <a href="#" class="text-white me-3"><i class="bi bi-twitter fs-4"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Liên Kết</h5>
                    <ul class="list-unstyled">
                        <li><a href="/" class="text-white text-decoration-none">Trang Chủ</a></li>
                        <li><a href="/products" class="text-white text-decoration-none">Sản Phẩm</a></li>
                        <li><a href="/about" class="text-white text-decoration-none">Giới Thiệu</a></li>
                        <li><a href="/contact" class="text-white text-decoration-none">Liên Hệ</a></li>
                    </ul>
                </div>
                <div class="col-md-4 mb-4">
                    <h5 class="mb-3">Liên Hệ</h5>
                    <ul class="list-unstyled">
                        <li><i class="bi bi-geo-alt"></i> 123 Nguyễn Huệ, Q1, TPHCM</li>
                        <li><i class="bi bi-telephone"></i> 0901234567</li>
                        <li><i class="bi bi-envelope"></i> contact@shopvn.com</li>
                    </ul>
                </div>
            </div>
            <hr class="bg-white">
            <div class="text-center">
                <p class="mb-0">&copy; 2024 ShopVN. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>