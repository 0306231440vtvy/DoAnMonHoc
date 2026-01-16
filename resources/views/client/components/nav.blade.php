   <nav class="bg-white/80 top-0 z-50 shadow-md">
       <div class="container mx-auto px-4">
           <div class="flex justify-between items-center py-3">
               <a href="index.html" class=" text-2xl font-bold">
                   e<span class="font-extrabold">Thời trang</span>
               </a>

               <ul class="flex gap-4 items-center">
                   <li><a href="{{ route('layouts') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Trang chủ</a>
                   </li>
                   <li><a href="shop.html" class="font-medium uppercase hover:text-[#667eea] transition">Cửa hàng</a>
                   </li>
                   <li><a href="{{ route('products') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Sản
                           phẩm</a>
                   </li>
                    <li><a href="{{ route('carts') }}" class="font-medium uppercase hover:text-[#667eea] transition">
                            <i class="fa fa-shopping-cart mr-1"></i>Giỏ hàng
                        </a>
                    </li>

                   {{-- <li><a href="{{ route('checkout') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Thanh
                           toán</a></li> --}}
                   <li><a href="{{ route('profile') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Tài
                           khoản</a></li>
                   <li><a href="{{ route('contact') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Liên hệ</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>
