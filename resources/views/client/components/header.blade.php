<div class="bg-white/80 text-base/8">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-6">
                <div class="user-menu">
                    <ul>
                        <li><a href="#"><i class="fa fa-user"></i>Về chúng tôi</a></li>
                        <li><a href="#"><i class="fa fa-heart"></i>Sản phẩm yêu thích</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-6 col-md-4">
                <div class="user-menu">
                    @if (Auth::check())
                        {{-- <ul>
                            <li><a href=""><i class="fa fa-user"></i> Register</a></li>
                            <li><a href=""><i class="fa fa-user"></i> Login</a></li>
                        </ul> --}}
                        <p>Chào mừng bạn trở lại!</p>
                        <li>
                            <a href="{{ route('auth.logout') }}">
                                <i class="fa-solid fa-right-from-bracket">
                                </i>Đăng xuất</a>
                        </li>
                    @else
                        <button type="button"
                            class="flex items-center gap-2 px-4 py-2 text-black hover:text-[#667eea] transition"
                            data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-user"></i>
                            <span>Tài khoản</span>
                        </button>

                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-sm">
                                <div class="modal-content account-modal">
                                    <div class="modal-body text-center">
                                        <button type="button" class="btn btn-login w-100 mb-3" id="btn-login">
                                            Đăng nhập
                                        </button>
                                        <button type="button" class="btn btn-register w-100" id="btn-register">
                                            Đăng ký
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="loginModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center">Đăng nhập</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <form class="m-t" method="POST" action="{{ route('auth.login') }}"
                                            id="loginForm">
                                            @csrf
                                            <div class="form-group">
                                                <label class="text-center">Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Nhập email của bạn" required=""
                                                    value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">*{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Nhập mật khẩu" required="">
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">*{{ $message }}</div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary block full-width m-b">Đăng
                                                nhập</button>
                                            <p class="text-muted text-center">
                                                <small>Bạn chưa có tài khoản thành viên?</small>
                                            </p>
                                            <a href="#" id="switchToRegister"
                                                class="btn btn-sm btn-white btn-block">
                                                Tạo tài khoản mới
                                            </a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="modal fade" id="registerModal" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header border-0">
                                        <h5 class="modal-title w-100 text-center">Đăng ký thành viên</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body px-4">
                                        <form class="m-t" role="form" action="{{ route('auth.register') }}"
                                            method="POST">
                                            @csrf
                                            <div class="form-group">
                                                <label>Họ và tên</label>
                                                <input type="text"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    value="{{ old('name') }}" placeholder="Nhập họ tên của bạn"
                                                    name="name" required="">
                                            </div>
                                            @error('name')
                                                <div class="alert alert-danger">*{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" name="email"
                                                    class="form-control @error('email') is-invalid @enderror"
                                                    placeholder="Nhập email" required=""
                                                    value="{{ old('email') }}">
                                            </div>
                                            @error('email')
                                                <div class="alert alert-danger">*{{ $message }}</div>
                                            @enderror
                                            <div class="form-group">
                                                <label>Mật khẩu</label>
                                                <input type="password" name="password"
                                                    class="form-control @error('password') is-invalid @enderror"
                                                    placeholder="Nhập mật khẩu" required="">
                                            </div>
                                            @error('password')
                                                <div class="alert alert-danger">*{{ $message }}</div>
                                            @enderror
                                            <button type="submit" class="btn btn-primary block full-width m-b">Đăng
                                                ký</button>

                                            <p class="text-muted text-center"><small>Bạn đã có tài khoản?</small></p>
                                            <a href="#" id="switchToLogin"
                                                class="btn btn-sm btn-white btn-block">Đăng nhập ngay</a>
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
