@extends('client.layouts')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Thanh Toán</h1>
        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Checkout Form -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Shipping Information -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Thông Tin Giao Hàng</h3>
                        <form class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    
                                    <label class="block text-gray-700 mb-2 font-medium">Họ và tên *</label>
                                    @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="text" name="name"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                        placeholder="Họ và tên">
                                </div>
                                <div>
                                    
                                    <label class="block text-gray-700 mb-2 font-medium">Số điện thoại *</label>
                                    @error('phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <input type="tel" name="phone"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                        placeholder="0901234567">
                                </div>
                            </div>
                            <div>
                                
                                <label class="block text-gray-700 mb-2 font-medium">Email *</label>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>                                    
                                @enderror
                                <input type="email" name="email"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    placeholder="email@example.com">
                            </div>
                            <div>
                                
                                <label class="block text-gray-700 mb-2 font-medium">Địa chỉ *</label>
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <input type="text" name="address"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    placeholder="Số nhà, tên đường">
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div>
                                    <label class="block text-gray-700 mb-2 font-medium">Tỉnh/Thành phố *</label>
                                    @error('province_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <select id="province" name="province_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600">
                                        <option value="">-- Chọn tỉnh --</option>
                                    </select>
                                </div>
            
                                <div>
                                    <label class="block text-gray-700 mb-2 font-medium">Phường/Xã *</label>
                                    @error('province_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                    <select id="ward" name="ward_id" class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600" disabled>
                                        <option value="">-- Chọn xã --</option>
                                    </select>
                                </div>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Ghi chú đơn hàng (tùy chọn)</label>
                                <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    rows="3" placeholder="Ghi chú về đơn hàng..."></textarea>
                            </div>
                        </form>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Phương Thức Thanh Toán</h3>
                        <div class="space-y-3">
                            <label
                                class="flex items-center p-4 border-2 border-indigo-600 rounded-lg cursor-pointer bg-indigo-50">
                                <input type="radio" name="payment_method" value="cod" class="mr-3 w-5 h-5 text-indigo-600" checked>
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800">Thanh toán khi nhận hàng (COD)</div>
                                    <div class="text-sm text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                                </div>
                            </label>
                            <label
                                class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-600">
                                <input type="radio" name="payment_method" value="bank" class="mr-3 w-5 h-5 text-indigo-600">
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800">Chuyển khoản ngân hàng</div>
                                    <div class="text-sm text-gray-600">Chuyển khoản trực tiếp vào tài khoản ngân hàng</div>
                                </div>
                            </label>
                            {{-- <label
                                class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-600">
                                <input type="radio" name="payment" class="mr-3 w-5 h-5 text-indigo-600">
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800">Ví điện tử MoMo</div>
                                    <div class="text-sm text-gray-600">Thanh toán qua ví MoMo</div>
                                </div>
                            </label>
                            <label
                                class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-600">
                                <input type="radio" name="payment" class="mr-3 w-5 h-5 text-indigo-600">
                                <div class="flex-1">
                                    <div class="font-semibold text-gray-800">Thẻ tín dụng/Ghi nợ</div>
                                    <div class="text-sm text-gray-600">Visa, Mastercard, JCB</div>
                                </div>
                            </label> --}}
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                        <h3 class="text-xl font-bold mb-4 text-gray-800">Đơn Hàng Của Bạn</h3>

                        @foreach ($checkout['items'] as $item)
                            <div class="flex justify-between text-sm">
                                <span class="text-gray-600">{{ $item['ten'] }}</span>
                                <span class="font-semibold text-gray-800">{{ $item['gia'] }}</span>
                            </div>
                        @endforeach

                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between">
                                <span class="text-gray-600">Tạm tính:</span>
                                <span class="font-semibold text-gray-800">{{{ $checkout['totalPrice'] }}}</span>
                            </div>
                            {{-- <div class="flex justify-between">
                                <span class="text-gray-600">Phí vận chuyển:</span>
                                <span class="font-semibold text-gray-800">30,000đ</span>
                            </div>
                            <div class="flex justify-between">
                                <span class="text-gray-600">Giảm giá:</span>
                                <span class="font-semibold text-red-600">-100,000đ</span>
                            </div> --}}
                            <div class="border-t pt-3 flex justify-between text-lg">
                                <span class="font-bold text-gray-800">Tổng cộng:</span>
                                <span class="font-bold text-indigo-600 text-2xl">{{ number_format($checkout['totalPrice']) }}VNĐ</span>
                            </div>
                        </div>

                        <button type="submit"
                            class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-semibold transition mb-3">
                            Đặt Hàng
                        </button>

                        <a href="{{ route('carts') }}"
                            class="block w-full border-2 border-gray-300 text-center py-3 rounded-lg hover:bg-gray-50 font-semibold transition text-gray-800">
                            Quay Lại Giỏ Hàng
                        </a>

                        <!-- Security Badges -->
                        <div class="mt-6 pt-6 border-t space-y-3">
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="fas fa-shield-alt text-indigo-600 text-xl"></i>
                                <span>Thanh toán an toàn 100%</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="fas fa-lock text-indigo-600 text-xl"></i>
                                <span>Bảo mật thông tin khách hàng</span>
                            </div>
                            <div class="flex items-center gap-3 text-sm text-gray-600">
                                <i class="fas fa-headset text-indigo-600 text-xl"></i>
                                <span>Hỗ trợ 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    
@endsection
