@extends('client.layouts')
@section('content')
    <!-- Page Content -->
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold text-center mb-12 text-gray-800">Liên Hệ Với Chúng Tôi</h1>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div>
                <div class="bg-white rounded-lg shadow p-8">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Gửi Tin Nhắn</h3>
                    <form class="space-y-4">
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Họ và tên *</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]"
                                placeholder="Nhập họ tên của bạn">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Email *</label>
                            <input type="email"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]"
                                placeholder="Nhập email của bạn">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Số điện thoại</label>
                            <input type="tel"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]"
                                placeholder="Nhập số điện thoại">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Tiêu đề *</label>
                            <input type="text"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]"
                                placeholder="Tiêu đề tin nhắn">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Nội dung *</label>
                            <textarea class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]"
                                rows="5" placeholder="Nhập nội dung tin nhắn của bạn..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-[#667eea] text-white py-3 rounded-lg hover:bg-[#5568d3] font-semibold transition">
                            Gửi Tin Nhắn
                        </button>
                    </form>
                </div>
            </div>

            <!-- Contact Info -->
            <div>
                <div class="bg-white rounded-lg shadow p-8 mb-6">
                    <h3 class="text-2xl font-bold mb-6 text-gray-800">Thông Tin Liên Hệ</h3>
                    <div class="space-y-6">
                        <div class="flex items-start">
                            <div class="bg-[#667eea] bg-opacity-20 p-3 rounded-full mr-4">
                                <i class="fas fa-map-marker-alt text-[#667eea] text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1 text-gray-800">Địa chỉ</h4>
                                <p class="text-gray-600">123 Đường Nguyễn Huệ, Quận 1<br>TP. Hồ Chí Minh, Việt Nam</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-[#667eea] bg-opacity-20 p-3 rounded-full mr-4">
                                <i class="fas fa-phone text-[#667eea] text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1 text-gray-800">Điện thoại</h4>
                                <p class="text-gray-600">Hotline: 1900 xxxx<br>Mobile: 090 123 4567</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-[#667eea] bg-opacity-20 p-3 rounded-full mr-4">
                                <i class="fas fa-envelope text-[#667eea] text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1 text-gray-800">Email</h4>
                                <p class="text-gray-600">support@ethoitrang.com<br>sales@ethoitrang.com</p>
                            </div>
                        </div>
                        <div class="flex items-start">
                            <div class="bg-[#667eea] bg-opacity-20 p-3 rounded-full mr-4">
                                <i class="fas fa-clock text-[#667eea] text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold mb-1 text-gray-800">Giờ làm việc</h4>
                                <p class="text-gray-600">Thứ 2 - Thứ 7: 8:00 - 21:00<br>Chủ nhật: 9:00 - 18:00</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-8">
                    <h3 class="text-2xl font-bold mb-4 text-gray-800">Kết Nối Với Chúng Tôi</h3>
                    <div class="flex gap-4">
                        <a href="#"
                            class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center text-white hover:bg-blue-700 transition">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-blue-400 rounded-full flex items-center justify-center text-white hover:bg-blue-500 transition">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-pink-600 rounded-full flex items-center justify-center text-white hover:bg-pink-700 transition">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#"
                            class="w-12 h-12 bg-red-600 rounded-full flex items-center justify-center text-white hover:bg-red-700 transition">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Map -->
        <div class="mt-12">
            <div class="bg-white rounded-lg shadow overflow-hidden h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.4556422342135!2d106.70298731533397!3d10.775664992320737!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752f4b3330bcc5%3A0xd790c7e9c2b223a!2zTmd1eeG7hW4gSHXhu4csIFF14bqtbiAxLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1234567890123!5m2!1svi!2s"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection
