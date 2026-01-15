@extends('client.layouts')
@section('title', 'Về chúng tôi')
@section('content')
    <section class="page-header bg-primary bg-gradient text-white py-5">
        <div class="container text-center">
            <h1 class="display-4 fw-bold mb-3">Về Chúng Tôi</h1>
            <p class="lead mb-0">Hành trình xây dựng thương hiệu uy tín hàng đầu Việt Nam</p>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-6">
                    <img src="https://via.placeholder.com/600x400" class="img-fluid rounded shadow" alt="About Us">
                </div>
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Câu Chuyện Của Chúng Tôi</h2>
                    <p class="text-muted">ShopVN được thành lập vào năm 2020 với mục tiêu mang đến trải nghiệm mua sắm trực
                        tuyến tốt nhất cho người tiêu dùng Việt Nam.</p>
                    <p class="text-muted">Chúng tôi bắt đầu từ một cửa hàng nhỏ và đã phát triển thành một trong những nền
                        tảng thương mại điện tử hàng đầu, phục vụ hàng triệu khách hàng trên toàn quốc.</p>
                    <p class="text-muted mb-0">Với đội ngũ nhân viên tận tâm và hệ thống logistics hiện đại, chúng tôi cam
                        kết mang đến sản phẩm chất lượng, giá cả hợp lý và dịch vụ khách hàng xuất sắc.</p>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-body">
                            <i class="bi bi-bullseye display-3 text-primary mb-3"></i>
                            <h3 class="fw-bold mb-3">Sứ Mệnh</h3>
                            <p class="text-muted mb-0">Mang đến trải nghiệm mua sắm trực tuyến tốt nhất, giúp khách hàng
                                tiếp cận sản phẩm chất lượng với giá cả hợp lý, giao hàng nhanh chóng và dịch vụ chăm sóc
                                khách hàng tận tình.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card border-0 shadow-sm h-100 text-center p-4">
                        <div class="card-body">
                            <i class="bi bi-eye display-3 text-success mb-3"></i>
                            <h3 class="fw-bold mb-3">Tầm Nhìn</h3>
                            <p class="text-muted mb-0">Trở thành nền tảng thương mại điện tử hàng đầu Việt Nam, được khách
                                hàng tin tưởng và lựa chọn, đồng thời tạo ra giá trị bền vững cho cộng đồng và xã hội.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fw-bold mb-5">Giá Trị Cốt Lõi</h2>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-shield-check fs-1"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Uy Tín</h5>
                        <p class="text-muted mb-0">Cam kết sản phẩm chính hãng, minh bạch trong kinh doanh</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-success text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-gem fs-1"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Chất Lượng</h5>
                        <p class="text-muted mb-0">Chọn lọc sản phẩm tốt nhất từ các thương hiệu uy tín</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-warning text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-lightning-charge-fill fs-1"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Nhanh Chóng</h5>
                        <p class="text-muted mb-0">Giao hàng nhanh, xử lý đơn hàng hiệu quả</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="text-center p-3">
                        <div class="bg-danger text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3"
                            style="width: 80px; height: 80px;">
                            <i class="bi bi-heart-fill fs-1"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Tận Tâm</h5>
                        <p class="text-muted mb-0">Luôn lắng nghe và hỗ trợ khách hàng nhiệt tình</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-3 col-6">
                    <i class="bi bi-people display-3 d-block mb-3"></i>
                    <h2 class="fw-bold mb-2">500K+</h2>
                    <p class="mb-0">Khách Hàng Tin Tưởng</p>
                </div>
                <div class="col-md-3 col-6">
                    <i class="bi bi-box-seam display-3 d-block mb-3"></i>
                    <h2 class="fw-bold mb-2">10K+</h2>
                    <p class="mb-0">Sản Phẩm Đa Dạng</p>
                </div>
                <div class="col-md-3 col-6">
                    <i class="bi bi-truck display-3 d-block mb-3"></i>
                    <h2 class="fw-bold mb-2">1M+</h2>
                    <p class="mb-0">Đơn Hàng Thành Công</p>
                </div>
                <div class="col-md-3 col-6">
                    <i class="bi bi-star-fill display-3 d-block mb-3"></i>
                    <h2 class="fw-bold mb-2">4.8/5</h2>
                    <p class="mb-0">Đánh Giá Trung Bình</p>
                </div>
            </div>
        </div>
    </section>
@endsection
