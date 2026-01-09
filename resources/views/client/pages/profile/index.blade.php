@extends('client.layouts')
@section('content')
    <!-- Page Content -->
    <div class="container mx-auto px-4 py-12">
        <h1 class="text-4xl font-bold mb-8 text-gray-800">Tài Khoản Của Tôi</h1>

        <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
            <!-- Sidebar -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="text-center mb-6">
                        <div class="w-24 h-24 bg-[#667eea] rounded-full mx-auto mb-4 flex items-center justify-center">
                            <i class="fa fa-user text-4xl text-white"></i>
                        </div>
                        <h3 class="font-bold text-lg text-gray-800">Nguyễn Văn A</h3>
                        <p class="text-gray-600 text-sm">nguyenvana@email.com</p>
                    </div>
                    <nav class="space-y-2">
                        <a href="#" class="block px-4 py-2 rounded bg-[#667eea] text-white font-semibold">
                            <i class="fa fa-user mr-2"></i>Thông tin tài khoản
                        </a>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-50 text-gray-800">
                            <i class="fa fa-shopping-bag mr-2"></i>Đơn hàng của tôi
                        </a>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-50 text-gray-800">
                            <i class="fa fa-heart mr-2"></i>Sản phẩm yêu thích
                        </a>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-50 text-gray-800">
                            <i class="fa fa-map-marker-alt mr-2"></i>Địa chỉ giao hàng
                        </a>
                        <a href="#" class="block px-4 py-2 rounded hover:bg-gray-50 text-red-600">
                            <i class="fa fa-sign-out-alt mr-2"></i>Đăng xuất
                        </a>
                    </nav>
                </div>
            </div>

            <!-- Main Content -->
            <div class="lg:col-span-3">
                <!-- Personal Info -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Thông Tin Cá Nhân</h3>
                    <form class="space-y-4">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Họ và tên</label>
                                <input type="text" value="Nguyễn Văn A"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]">
                            </div>
                            <div>
                                <label class="block text-gray-700 mb-2 font-medium">Số điện thoại</label>
                                <input type="tel" value="0901234567"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]">
                            </div>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Email</label>
                            <input type="email" value="nguyenvana@email.com"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg bg-gray-100" readonly>
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Ngày sinh</label>
                            <input type="date" value="1990-01-01"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]">
                        </div>
                        <div>
                            <label class="block text-gray-700 mb-2 font-medium">Giới tính</label>
                            <select
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-[#667eea]">
                                <option>Nam</option>
                                <option>Nữ</option>
                                <option>Khác</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="bg-[#667eea] text-white px-8 py-2 rounded-lg hover:bg-[#5568d3] transition">
                            Cập Nhật Thông Tin
                        </button>
                    </form>
                </div>

                <!-- Recent Orders -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h3 class="text-xl font-bold mb-4 text-gray-800">Đơn Hàng Gần Đây</h3>
                    <div class="space-y-4">
                        <!-- Order 1 -->
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-800">#DH001</span>
                                <span class="px-3 py-1 rounded-full text-sm bg-green-100 text-green-600">Đang giao
                                    hàng</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Tổng: <span
                                        class="font-bold text-[#667eea]">2,230,000đ</span></span>
                                <button class="text-[#667eea] hover:text-[#5568d3] text-sm">Xem chi tiết →</button>
                            </div>
                        </div>

                        <!-- Order 2 -->
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-800">#DH002</span>
                                <span class="px-3 py-1 rounded-full text-sm bg-blue-100 text-blue-600">Đã giao hàng</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Tổng: <span
                                        class="font-bold text-[#667eea]">1,450,000đ</span></span>
                                <button class="text-[#667eea] hover:text-[#5568d3] text-sm">Xem chi tiết →</button>
                            </div>
                        </div>

                        <!-- Order 3 -->
                        <div class="border rounded-lg p-4 hover:shadow-md transition">
                            <div class="flex justify-between items-center mb-2">
                                <span class="font-semibold text-gray-800">#DH003</span>
                                <span class="px-3 py-1 rounded-full text-sm bg-red-100 text-red-600">Đã hủy</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span class="text-gray-600">Tổng: <span
                                        class="font-bold text-[#667eea]">890,000đ</span></span>
                                <button class="text-[#667eea] hover:text-[#5568d3] text-sm">Xem chi tiết →</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
