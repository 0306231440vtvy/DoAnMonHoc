<div class="footer-top-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h4>{{ $setting->name }}</h4>
                    <p>{{ $setting->description }}</p>
                    <div class="footer-social">
                        <a href="{{ $setting->facebook_url }}" target="_blank">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ $setting->youtube_url }}" target="_blank">
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="{{ $setting->instagram_url }}" target="_blank">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="{{ $setting->linkedin_url }}" target="_blank">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h4 class="footer-wid-title">Về công ty</h4>
                    <ul>
                        <li><a href="{{ route('gioi-thieu') }}">Giới thiệu công ty</a></li>
                        <li><a href="#">Gửi góp ý,khiếu nại</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h4 class="footer-wid-title">Tài Khoản </h4>
                    <ul>
                        <li><a href="{{ route('layouts') }}">Trang chủ</a></li>
                        <li><a href="{{ route('profile') }}">Tài khoản của tôi</a></li>
                        <li><a href="#">Lịch sử đơn hàng</a></li>
                        <li><a href="#">Sản phẩm yêu thích</a></li>
                        <li><a href="{{ route('bao-mat-thong-tin') }}">Bảo mật thông tin</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
                <div class="footer-menu">
                    <h4 class="footer-wid-title">Thông tin về chính sách</h4>
                    <ul>
                        <li>
                            <a href="{{ route('thong-tin-ban-hang') }}">Thông tin bán hàng</a>
                        </li>
                        <li>
                            <a href="{{ route('dich-vu-ban-hang') }}">Dịch vụ bán hàng</a>
                        </li>
                        <li>
                            <a href="{{ route('chinh-sach-bao-hanh') }}">Chính sách bảo hành</a>
                        </li>
                        <li>
                            <a href="{{ route('chinh-sach-doi-tra') }}">Chính sách đổi trả</a>
                        </li>
                        <li><a href="{{ route('chinh-sach-van-chuyen') }}">Chính sách vận chuyển</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2 col-sm-6">
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
        <div class="copyright">
            <p>{{ $setting->copyright ?? '© ' . date('Y') }}</p>
        </div>
    </div>
</div>
