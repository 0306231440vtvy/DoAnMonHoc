<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>e<span>Thời trang</span></h2>
                    <p>Chào mừng bạn đến với eThời trang - Nơi cập nhật những xu hướng phong cách mới nhất. Chúng tôi
                        cam kết mang đến những sản phẩm quần áo chất lượng, thiết kế hiện đại và giá cả hợp lý để giúp
                        bạn tự tin tỏa sáng mỗi ngày.</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Tài Khoản </h2>
                    <ul>
                        <li><a href="{{ Auth::check() ? route('client.profile.index') : route('auth.login') }}">Tài khoản của tôi</a></li>
                        <li><a href="{{ Auth::check() ? route('client.profile.orders') : route('auth.login') }}">Lịch sử đơn hàng</a></li>
                        <li><a href="{{ Auth::check() ? route('client.profile.favorite') : route('auth.login') }}">Sản phẩm yêu thích</a></li>
                        <li><a href="{{ route('contact') }}">Liên hệ nhà cung cấp</a></li>
                        <li><a href="{{ route('layouts') }}">Trang chủ</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Danh Mục</h2>
                    <ul>
                        <li><a href="#">Thời trang Nam</a></li>
                        <li><a href="#">Thời trang Nữ</a></li>
                        <li><a href="#">Váy & Đầm dạ hội</a></li>
                        <li><a href="#">Quần Jean & Kaki</a></li>
                        <li><a href="#">Phụ kiện thời trang</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-newsletter">
                    <h2 class="footer-wid-title">Bản Tin</h2>
                    <p>Đăng ký nhận bản tin của chúng tôi để nhận các ưu đãi độc quyền và cập nhật bộ sưu tập mới nhất
                        gửi thẳng vào hộp thư của bạn!</p>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Nhập email của bạn">
                            <input type="submit" value="Đăng ký">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2024 eThời trang. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a
                            href="#" target="_blank">WP Expand</a></p>
                </div>
            </div>

            <div class="col-md-4">
                <div class="footer-card-icon">
                    <i class="fa fa-cc-discover"></i>
                    <i class="fa fa-cc-mastercard"></i>
                    <i class="fa fa-cc-paypal"></i>
                    <i class="fa fa-cc-visa"></i>
                </div>
            </div>
        </div>
    </div>
</div>
