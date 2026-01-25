@extends('client.layouts')
@section('title', 'Trang thanh toán')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Thanh Toán</h1>
        <form action="{{ route('thanh-toan.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Cột trái: Form thông tin -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Thông tin giao hàng -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Thông Tin Giao Hàng</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Họ và tên *</label>
                                @error('name')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                                <input type="text" name="name" value="{{ old('name', Auth::user()->name ?? '') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    placeholder="Nhập họ và tên" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Số điện thoại *</label>
                                @error('phone')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                                <input type="tel" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    placeholder="0901234567" required>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2 font-medium">Email *</label>
                            @error('email')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                            <input type="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                placeholder="email@example.com" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 mb-2 font-medium">Địa chỉ *</label>
                            @error('address')
                                <small class="text-red-600">{{ $message }}</small>
                            @enderror
                            <input type="text" name="address" value="{{ old('address') }}"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                placeholder="Số nhà, tên đường" required>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Tỉnh/Thành phố *</label>
                                @error('province_code')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                                <select id="province" name="province_code"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    required>
                                    <option value="">-- Chọn Tỉnh/Thành phố --</option>
                                    @foreach ($provinces as $province)
                                        <option value="{{ $province->province_code }}"
                                            {{ old('province_code') == $province->province_code ? 'selected' : '' }}>
                                            {{ $province->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Phường/Xã *</label>
                                @error('ward_code')
                                    <small class="text-red-600">{{ $message }}</small>
                                @enderror
                                <select id="ward" name="ward_code"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    required disabled>
                                    <option value="">-- Chọn Phường/Xã --</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Phương thức thanh toán -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Phương Thức Thanh Toán</h3>
                        @error('payment_method')
                            <small class="text-red-600">{{ $message }}</small>
                        @enderror
                        <div class="space-y-3">
                            <label
                                class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-600 transition">
                                <input type="radio" name="payment_method" value="cod"
                                    class="mr-3 w-5 h-5 text-indigo-600"
                                    {{ old('payment_method') == 'cod' ? 'checked' : '' }} required>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800">Thanh toán khi nhận hàng (COD)</div>
                                    <div class="text-sm text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                </div>
                            </label>

                            <label
                                class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-600 transition">
                                <input type="radio" name="payment_method" value="bank"
                                    class="mr-3 w-5 h-5 text-indigo-600"
                                    {{ old('payment_method') == 'bank' ? 'checked' : '' }} required>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800">Chuyển khoản ngân hàng</div>
                                    <div class="text-sm text-gray-600">Chuyển khoản trực tiếp vào tài khoản ngân hàng</div>
                                </div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Cột phải: Đơn hàng -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Đơn Hàng Của Bạn</h3>

                        <div class="space-y-3 mb-6">
                            @if (isset($checkout['items']) && count($checkout['items']) > 0)
                                @foreach ($checkout['items'] as $item)
                                    <div class="border-b pb-3">
                                        <div class="flex justify-between text-sm mb-1">
                                            <span class="text-gray-700 font-medium">{{ $item['ten'] }}</span>
                                            <span class="text-gray-600">x{{ $item['so_luong'] }}</span>
                                        </div>
                                        <div class="flex justify-between items-center">
                                            @if (isset($item['discount']) && $item['discount'] > 0)
                                                <div class="flex items-center gap-2">
                                                    <small class="text-gray-400 line-through">
                                                        {{ number_format($item['gia_goc']) }}đ
                                                    </small>
                                                    <small class="text-red-600 font-semibold">
                                                        -{{ $item['discount'] }}%
                                                    </small>
                                                </div>
                                            @endif
                                            <span class="font-semibold text-indigo-600">
                                                {{ number_format($item['thanh_tien']) }}đ
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="text-center py-8 text-gray-500">
                                    <i class="fa fa-shopping-cart text-4xl mb-3"></i>
                                    <p>Giỏ hàng trống</p>
                                </div>
                            @endif
                        </div>

                        @if (isset($checkout['totalDiscount']) && $checkout['totalDiscount'] > 0)
                            <div class="flex justify-between mb-3 pb-3 border-b">
                                <span class="text-gray-600">Tạm tính:</span>
                                <span class="font-semibold text-gray-800">
                                    {{ number_format($checkout['totalPrice'] + $checkout['totalDiscount']) }}đ
                                </span>
                            </div>
                            <div class="flex justify-between mb-3 pb-3 border-b">
                                <span class="text-gray-600">Giảm giá:</span>
                                <span class="font-semibold text-red-600">
                                    -{{ number_format($checkout['totalDiscount']) }}đ
                                </span>
                            </div>
                        @endif

                        <div class="border-t pt-4 flex justify-between items-center">
                            <span class="font-bold text-gray-800 text-lg">Tổng cộng:</span>
                            <span class="font-bold text-indigo-600 text-2xl">
                                {{ isset($checkout['totalPrice']) ? number_format($checkout['totalPrice']) : '0' }}đ
                            </span>
                        </div>

                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-semibold transition mt-6 mb-3">
                            <i class="fa fa-check-circle mr-2"></i>
                            Đặt Hàng
                        </button>

                        <a href="{{ route('carts.index') }}"
                            class="block w-full border-2 border-gray-300 text-center py-3 rounded-lg hover:bg-gray-50 font-semibold transition text-gray-800">
                            <i class="fa fa-arrow-left mr-2"></i>
                            Quay Lại Giỏ Hàng
                        </a>

                        <div class="mt-6 pt-6 border-t space-y-3">
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="fa fa-shield text-indigo-600 text-xl"></i>
                                <span>Thanh toán an toàn 100%</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="fa fa-lock text-indigo-600 text-xl"></i>
                                <span>Bảo mật thông tin khách hàng</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="fa fa-phone text-indigo-600 text-xl"></i>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Khi chọn Tỉnh/Thành phố
            $('#province').change(function() {
                let provinceCode = $(this).val();

                // Reset ward dropdown
                $('#ward').html('<option value="">-- Chọn Phường/Xã --</option>').prop('disabled', true);

                if (provinceCode) {
                    // Hiển thị loading
                    $('#ward').html('<option value="">Đang tải...</option>');
                    // Gọi API lấy danh sách phường/xã - SỬA LẠI URL
                    $.ajax({
                        url: "{{ url('/get-wards') }}/" + provinceCode,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#ward').html('<option value="">-- Chọn Phường/Xã --</option>');

                            if (data.length > 0) {
                                $.each(data, function(index, ward) {
                                    $('#ward').append(
                                        `<option value="${ward.ward_code}">${ward.name}</option>`
                                    );
                                });
                                $('#ward').prop('disabled', false);
                            }
                        }
                    });

                }
            });

            // Highlight payment method khi chọn
            $('input[name="payment_method"]').change(function() {
                $('input[name="payment_method"]').parent().parent().removeClass(
                    'border-indigo-600 bg-indigo-50');
                $(this).parent().parent().addClass('border-indigo-600 bg-indigo-50');
            });
        });
    </script>
@endpush
