@extends('client.layouts')
@section('content')
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Thanh Toán</h1>

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
                                <input type="text"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    placeholder="Nguyễn Văn A">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Số điện thoại *</label>
                                <input type="tel"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                    placeholder="0901234567">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Email *</label>
                            <input type="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                placeholder="email@example.com">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Địa chỉ *</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600"
                                placeholder="Số nhà, tên đường">
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Tỉnh/Thành phố *</label>
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600">
                                    <option>Hồ Chí Minh</option>
                                    <option>Hà Nội</option>
                                    <option>Đà Nẵng</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Quận/Huyện *</label>
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600">
                                    <option>Quận 1</option>
                                    <option>Quận 2</option>
                                    <option>Quận 3</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Phường/Xã *</label>
                                <select
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-600">
                                    <option>Phường Bến Nghé</option>
                                    <option>Phường Bến Thành</option>
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
                            <input type="radio" name="payment" class="mr-3 w-5 h-5 text-indigo-600" checked>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-800">Thanh toán khi nhận hàng (COD)</div>
                                <div class="text-sm text-gray-600">Thanh toán bằng tiền mặt khi nhận hàng</div>
                            </div>
                        </label>
                        <label
                            class="flex items-center p-4 border-2 border-gray-300 rounded-lg cursor-pointer hover:border-indigo-600">
                            <input type="radio" name="payment" class="mr-3 w-5 h-5 text-indigo-600">
                            <div class="flex-1">
                                <div class="font-semibold text-gray-800">Chuyển khoản ngân hàng</div>
                                <div class="text-sm text-gray-600">Chuyển khoản trực tiếp vào tài khoản ngân hàng</div>
                            </div>
                        </label>
                        <label
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
                        </label>
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Đơn Hàng Của Bạn</h3>

                    <div class="space-y-3 mb-4 pb-4 border-b">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Áo Sơ Mi Nam Trắng (x2)</span>
                            <span class="font-semibold text-gray-800">900,000đ</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Váy Dạ Hội Sang Trọng (x1)</span>
                            <span class="font-semibold text-gray-800">850,000đ</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Quần Jean Nam Xanh (x1)</span>
                            <span class="font-semibold text-gray-800">550,000đ</span>
                        </div>
                    </div>

                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tạm tính:</span>
                            <span class="font-semibold text-gray-800">2,300,000đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Phí vận chuyển:</span>
                            <span class="font-semibold text-gray-800">30,000đ</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Giảm giá:</span>
                            <span class="font-semibold text-red-600">-100,000đ</span>
                        </div>
                        <div class="border-t pt-3 flex justify-between text-lg">
                            <span class="font-bold text-gray-800">Tổng cộng:</span>
                            <span class="font-bold text-indigo-600 text-2xl">2,230,000đ</span>
                        </div>
                    </div>

                    <button
                        class="w-full bg-indigo-600 text-white py-3 rounded-lg hover:bg-indigo-700 font-semibold transition mb-3">
                        Đặt Hàng
                    </button>

                    <a href="cart.html"
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
    </div>
@endsection
