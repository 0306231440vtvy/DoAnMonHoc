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
                       </a></li>
                   {{-- <li><a href="{{ route('checkout') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Thanh
                           toán</a></li> --}}
                   <li><a href="{{ route('profile') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Tài
                           khoản</a></li>
                   {{-- <li><a href="{{ route('gioithieu') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Liên hệ</a>
                   </li> --}}
                   <li><a href="{{ route('contact') }}"
                           class="font-medium uppercase hover:text-[#667eea] transition">Liên hệ</a>
                   </li>
               </ul>
           </div>
       </div>
   </nav>
   <div class="container my-5">
       <div id="carouselExampleCaptions" class="carousel slide mx-auto" style="max-width: 900px;">
           <div class="carousel-indicators">
               <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                   aria-current="true" aria-label="Slide 1"></button>
               <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                   aria-label="Slide 2"></button>
               <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                   aria-label="Slide 3"></button>
           </div>
           <div class="carousel-inner rounded-3 shadow-lg">
               <div class="carousel-item active">
                   <img src="{{ asset('client/img/slide-1.jpg') }}" class="d-block w-100"
                       style="height: 400px; object-fit: cover;" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                       <h5>Amazon có thể sa thải 30.000 nhân viên</h5>
                       <p>Amazon sắp có đợt cắt giảm nhân sự lớn nhất lịch sử, với số lao động tương đương 10%
                           nhân viên văn phòng hiện tại.</p>
                   </div>
               </div>
               <div class="carousel-item">
                   <img src="{{ asset('client/img/slide-2.jpg') }}" class="d-block w-100"
                       style="height: 400px; object-fit: cover;" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                       <h5>Second slide label</h5>
                       <p>Some representative placeholder content for the second slide.</p>
                   </div>
               </div>
               <div class="carousel-item">
                   <img src="{{ asset('client/img/slide-3.jpg') }}" class="d-block w-100"
                       style="height: 400px; object-fit: cover;" alt="...">
                   <div class="carousel-caption d-none d-md-block">
                       <h5>Third slide label</h5>
                       <p>Some representative placeholder content for the third slide.</p>
                   </div>
               </div>
           </div>
           <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
               data-bs-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Previous</span>
           </button>
           <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
               data-bs-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="visually-hidden">Next</span>
           </button>
       </div>
   </div>
