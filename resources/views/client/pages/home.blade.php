@extends('client.layouts') 
{{-- Lưu ý: Layout master phải nhúng thư viện Bootstrap 5 (CSS & JS) và FontAwesome --}}

@section('content')

<div id="home-carousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#home-carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://images.unsplash.com/photo-1483985988355-763728e1935b?q=80&w=1470&auto=format&fit=crop" class="d-block w-100" alt="Fashion 1" style="height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="text-uppercase fw-bold" style="text-shadow: 2px 2px 4px #000;">Bộ sưu tập Mùa Hè</h2>
                <p>Giảm giá lên đến 50% cho tất cả các mặt hàng</p>
                <a href="#" class="btn btn-success btn-lg mt-3">MUA NGAY</a>
            </div>
        </div>
        <div class="carousel-item">
            <img src="https://images.unsplash.com/photo-1490481651871-ab68de25d43d?q=80&w=1470&auto=format&fit=crop" class="d-block w-100" alt="Fashion 2" style="height: 500px; object-fit: cover;">
            <div class="carousel-caption d-none d-md-block">
                <h2 class="text-uppercase fw-bold" style="text-shadow: 2px 2px 4px #000;">Thời trang Công sở</h2>
                <p>Thanh lịch - Hiện đại - Phong cách</p>
                <a href="#" class="btn btn-success btn-lg mt-3">XEM CHI TIẾT</a>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#home-carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#home-carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container mt-5">
    
    <div class="row text-center mb-4">
        <div class="col-12">
            <h3 class="section-title fw-bold">DANH MỤC NỔI BẬT</h3>
            <div class="line-green mx-auto"></div>
        </div>
    </div>
    
    <div class="row g-4"> {{-- g-4 là khoảng cách giữa các cột (gutter) --}}
        <div class="col-md-4 col-sm-6">
            <div class="category-card position-relative overflow-hidden rounded">
                <img src="https://images.unsplash.com/photo-1617137968427-85924c809a29?w=500&auto=format&fit=crop" class="w-100" alt="Nam">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h4 class="fw-bold">Thời trang Nam</h4>
                    <a href="#" class="btn btn-outline-light mt-2">Xem ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="category-card position-relative overflow-hidden rounded">
                <img src="https://images.unsplash.com/photo-1541099649105-f69ad21f3246?w=500&auto=format&fit=crop" class="w-100" alt="Nữ">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h4 class="fw-bold">Thời trang Nữ</h4>
                    <a href="#" class="btn btn-outline-light mt-2">Xem ngay</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-6">
            <div class="category-card position-relative overflow-hidden rounded">
                <img src="https://images.unsplash.com/photo-1522337660859-02fbefca4702?w=500&auto=format&fit=crop" class="w-100" alt="Phụ kiện">
                <div class="overlay d-flex flex-column justify-content-center align-items-center">
                    <h4 class="fw-bold">Phụ kiện</h4>
                    <a href="#" class="btn btn-outline-light mt-2">Xem ngay</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row text-center mt-5 mb-4">
        <div class="col-12">
            <h3 class="section-title fw-bold">SẢN PHẨM MỚI</h3>
            <div class="line-green mx-auto"></div>
        </div>
    </div>

    <div class="row g-4">
        @if(isset($newProducts) && count($newProducts) > 0)
            @foreach($newProducts as $product)
            <div class="col-lg-3 col-md-4 col-6"> {{-- col-6 cho mobile --}}
                <div class="card product-card border-0 shadow-sm h-100">
                    <div class="product-thumb position-relative overflow-hidden">
                        <a href="#">
                            <img src="{{ $product->image ?? 'https://via.placeholder.com/300x300' }}" class="card-img-top" alt="{{ $product->tensp ?? 'Sản phẩm' }}">
                        </a>
                        <div class="product-action position-absolute w-100 text-center bg-light bg-opacity-75 py-2">
                            <a href="#" class="btn-action mx-2 text-dark"><i class="fa fa-shopping-cart"></i></a>
                            <a href="#" class="btn-action mx-2 text-dark"><i class="fa fa-eye"></i></a>
                        </div>
                    </div>
                    <div class="card-body text-center d-flex flex-column">
                        <h5 class="card-title product-name mb-auto">
                            <a href="#" class="text-decoration-none text-dark">{{ $product->tensp ?? 'Tên sản phẩm' }}</a>
                        </h5>
                        <div class="product-price mt-2">
                            @if(isset($product->giakhuyenmai) && $product->giakhuyenmai > 0)
                                <span class="fw-bold text-success">{{ number_format($product->giakhuyenmai) }} đ</span>
                                <span class="text-muted text-decoration-line-through small ms-1">{{ number_format($product->gia) }} đ</span>
                            @else
                                <span class="fw-bold text-success">{{ number_format($product->gia) }} đ</span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        @else
            <div class="col-12 text-center text-muted">Chưa có sản phẩm nào.</div>
        @endif
    </div>

</div>

<div class="promo-banner mt-5 py-5 text-white" style="background-image: url('https://images.unsplash.com/photo-1469334031218-e382a71b716b?q=80&w=1470&auto=format&fit=crop'); background-attachment: fixed; background-size: cover; position: relative;">
    <div class="overlay-bg position-absolute top-0 start-0 w-100 h-100" style="background: rgba(0,0,0,0.5);"></div>
    <div class="container position-relative z-1">
        <div class="row">
            <div class="col-md-8 offset-md-2 text-center">
                <h2 class="fw-bold">KHUYẾN MÃI ĐẶC BIỆT MÙA HÈ</h2>
                <p class="lead">Nhập mã <strong>ETHIOTRANG20</strong> để được giảm ngay 20% cho đơn hàng đầu tiên</p>
                <a href="#" class="btn btn-success btn-lg mt-3">MUA SẮM NGAY</a>
            </div>
        </div>
    </div>
</div>

<div class="container my-5 py-5">
    <div class="row text-center g-4">
        <div class="col-lg-3 col-6">
            <div class="icon-box p-3">
                <i class="fa fa-truck text-success mb-3" style="font-size: 40px;"></i>
                <h5 class="fw-bold">Miễn phí vận chuyển</h5>
                <p class="text-muted small">Cho đơn hàng từ 500k</p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="icon-box p-3">
                <i class="fa fa-refresh text-success mb-3" style="font-size: 40px;"></i>
                <h5 class="fw-bold">Đổi trả dễ dàng</h5>
                <p class="text-muted small">Trong vòng 7 ngày</p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="icon-box p-3">
                <i class="fa fa-lock text-success mb-3" style="font-size: 40px;"></i>
                <h5 class="fw-bold">Thanh toán bảo mật</h5>
                <p class="text-muted small">An toàn tuyệt đối</p>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="icon-box p-3">
                <i class="fa fa-headphones text-success mb-3" style="font-size: 40px;"></i>
                <h5 class="fw-bold">Hỗ trợ 24/7</h5>
                <p class="text-muted small">Hotline: 0987.654.321</p>
            </div>
        </div>
    </div>
</div>

{{-- CSS TÙY CHỈNH CHO CÁC HIỆU ỨNG (BS5 không có sẵn hiệu ứng hover/overlay cụ thể này) --}}
<style>
    :root {
        --primary-green: #1ab394;
        --dark-green: #16987e;
    }
    
    /* Override Bootstrap Colors if needed */
    .text-success { color: var(--primary-green) !important; }
    .btn-success { background-color: var(--primary-green); border-color: var(--primary-green); }
    .btn-success:hover { background-color: var(--dark-green); border-color: var(--dark-green); }

    .line-green { width: 60px; height: 3px; background: var(--primary-green); }

    /* Category Card Effects */
    .category-card { height: 250px; }
    .category-card img { height: 100%; object-fit: cover; transition: transform 0.5s; }
    .category-card:hover img { transform: scale(1.1); }
    .category-card .overlay {
        position: absolute; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0,0,0,0.4); color: #fff;
    }

    /* Product Card Effects */
    .product-card { transition: box-shadow 0.3s; }
    .product-card:hover { box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; }
    
    .product-thumb { height: 300px; }
    .product-thumb img { width: 100%; height: 100%; object-fit: cover; }
    
    .product-action { bottom: -50px; transition: bottom 0.3s; }
    .product-card:hover .product-action { bottom: 0; }
    
    .btn-action:hover { color: var(--primary-green) !important; }
    
    .product-name a:hover { color: var(--primary-green) !important; }
</style>

@endsection