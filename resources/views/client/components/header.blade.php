<div class="bg-white/80 text-base/8">
    <div class="container">
        {{-- Thêm align-items-center để các phần tử căn giữa theo chiều dọc --}}
        <div class="row align-items-center">
            
            {{-- CỘT TRÁI: MENU --}}
            <div class="col-md-8 col-sm-6">
                <div class="user-menu">
                    <ul>
                        <li><a href="{{ route('about') }}"><i class="fa fa-user"></i> Về chúng tôi</a></li>
                        
                        @if(Auth::check())
                            <li><a href="{{ route('client.profile.favorite') }}"><i class="fa fa-heart"></i> Sản phẩm yêu thích</a></li>
                        @else
                            {{-- Chưa đăng nhập thì bấm vào sẽ hiện popup đăng nhập --}}
                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#loginModal"><i class="fa fa-heart"></i> Sản phẩm yêu thích</a></li>
                        @endif
                    </ul>
                </div>
            </div>

            {{-- CỘT PHẢI: TÀI KHOẢN --}}
            <div class="col-6 col-md-4">
                <div class="user-menu d-flex justify-content-end">
                    
                    @if (Auth::check())
                        {{-- TRẠNG THÁI: ĐÃ ĐĂNG NHẬP --}}
                        {{-- Sửa lỗi: Bao thẻ li bằng ul và thêm d-flex để nằm ngang --}}
                        <ul class="d-flex align-items-center list-unstyled m-0 gap-3">
                            <li>
                                <span class="text-dark">Chào, <strong>{{ Auth::user()->name }}</strong></span>
                            </li>
                            <li>
                                <a href="{{ route('auth.logout') }}" class="text-danger">
                                    <i class="fa-solid fa-right-from-bracket"></i> Đăng xuất
                                </a>
                            </li>
                        </ul>
                    @else
                        {{-- TRẠNG THÁI: CHƯA ĐĂNG NHẬP --}}
                        <button type="button"
                            class="d-flex align-items-center gap-2 border-0 bg-transparent px-3 py-2"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-user"></i>
                            <span>Tài khoản</span>
                        </button>

                        {{-- 1. MODAL LỰA CHỌN (LOGIN / REGISTER) --}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content account-modal">
                                    <div class="modal-body text-center p-4">
                                        {{-- Nút này sẽ đóng modal hiện tại và mở modal Login --}}
                                        <button type="button" class="btn btn-primary w-100 mb-3" 
                                                data-bs-toggle="modal" data-bs-target="#loginModal">
                                            Đăng nhập
                                        </button>
                                        {{-- Nút này sẽ đóng modal hiện tại và mở modal Register --}}
                                        <button type="button" class="btn btn-outline-primary w-100" 
                                                data-bs-toggle="modal" data-bs-target="#registerModal">
                                            Đăng ký
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 2. MODAL ĐĂNG NHẬP --}}
                        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center fw-bold">ĐĂNG NHẬP</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4 pb-4">
                                        <form method="POST" action="{{ route('auth.login') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Nhập email" value="{{ old('email') }}" required>
                                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                            
                                            <div class="mb-3">
                                                <label class="form-label">Mật khẩu</label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Nhập mật khẩu" required>
                                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100 mb-3">Đăng nhập</button>
                                            
                                            <div class="text-center">
                                                <p class="text-muted small mb-1">Bạn chưa có tài khoản?</p>
                                                {{-- KHÔNG CẦN SCRIPT: Dùng data-bs-target để chuyển sang modal Register --}}
                                                <a href="#" class="text-primary fw-bold text-decoration-none"
                                                   data-bs-toggle="modal" data-bs-target="#registerModal">
                                                    Tạo tài khoản mới
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- 3. MODAL ĐĂNG KÝ --}}
                        <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center fw-bold">ĐĂNG KÝ THÀNH VIÊN</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4 pb-4">
                                        <form method="POST" action="{{ route('auth.register') }}">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Họ tên</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                                    value="{{ old('name') }}" placeholder="Nhập họ tên" required>
                                                @error('name') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('email') }}" placeholder="Nhập email" required>
                                                @error('email') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Mật khẩu</label>
                                                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Nhập mật khẩu" required>
                                                @error('password') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>

                                            <button type="submit" class="btn btn-primary w-100 mb-3">Đăng ký</button>

                                            <div class="text-center">
                                                <p class="text-muted small mb-1">Bạn đã có tài khoản?</p>
                                                {{-- KHÔNG CẦN SCRIPT: Dùng data-bs-target để chuyển sang modal Login --}}
                                                <a href="#" class="text-primary fw-bold text-decoration-none"
                                                   data-bs-toggle="modal" data-bs-target="#loginModal">
                                                    Đăng nhập ngay
                                                </a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endif
                </div>
            </div>
        </div>
    </div>
</div>