      <div class="relative cart-widget">
          <a href="{{ route('carts.index') }}" class="flex items-center gap-2 hover:text-blue-600 transition">
              <div class="relative">
                  <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                      </path>
                  </svg>
                  @if (Auth::check())
                      <span
                          class="cart-badge absolute -top-2 -right-2 bg-red-600 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center font-bold"
                          id="cart-quantity-badge">
                          0
                      </span>
                  @endif
              </div>
              @if (Auth::check())
                  <div class="hidden md:flex flex-col items-start">
                      <span class="text-xs text-gray-500">Giỏ hàng</span>
                      <span id="cart-quantity-badge" style="display: none;">0</span>
                  </div>
              @endif
          </a>
          <div class="cart-dropdown hidden absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl z-50 border">
              <div class="p-4">
                  <h3 class="font-bold mb-3">Giỏ hàng của bạn</h3>
                  <div id="mini-cart-items" class="max-h-64 overflow-y-auto">
                  </div>
                  <div class="border-t mt-3 pt-3">
                      <div class="flex justify-between font-bold mb-3">
                          <span>Tổng cộng:</span>
                          <span id="cart-quantity-badge" style="display: none;">0</span>
                      </div>
                      <a href="{{ route('carts.index') }}"
                          class="block w-full bg-blue-600 text-white text-center py-2 rounded hover:bg-blue-700 transition">
                          Xem giỏ hàng
                      </a>
                  </div>
              </div>
          </div>
      </div>
      @push('scripts')
          <script>
              document.addEventListener('DOMContentLoaded', function() {
                  // Lấy thông tin giỏ hàng
                  function loadCartSummary() {
                      fetch('/gio-hang/summary')
                          .then(response => response.json())
                          .then(data => {
                              // Cập nhật badge số lượng
                              const badge = document.getElementById('cart-quantity-badge');
                              if (badge) {
                                  console.log(data.original.totalQuantity);
                                  badge.textContent = data.original.totalQuantity;
                                  badge.style.display = data.original.totalQuantity > 0 ? 'flex' : 'none';
                              }
                              // Cập nhật tổng tiền
                              const totalText = document.getElementById('cart-total-text');
                              if (totalText) {
                                  totalText.textContent = new Intl.NumberFormat('vi-VN').format(data.original
                                          .totalAmount) +
                                      ' ₫';
                              }
                              // Cập nhật mini cart total
                              const miniTotal = document.getElementById('mini-cart-total');
                              if (miniTotal) {
                                  miniTotal.textContent = new Intl.NumberFormat('vi-VN').format(data.original
                                          .totalAmount) +
                                      ' ₫';
                              }
                          })
                          .catch(error => console.error('Error loading cart:', error));
                  }
                  // Load khi trang load
                  @auth
                  loadCartSummary();
              @endauth
              const cartWidget = document.querySelector('.cart-widget');
              const cartDropdown = document.querySelector('.cart-dropdown');

              if (cartWidget && cartDropdown) {
                  cartWidget.addEventListener('mouseenter', function() {
                      cartDropdown.classList.remove('hidden');
                  });

                  cartWidget.addEventListener('mouseleave', function() {
                      cartDropdown.classList.add('hidden');
                  });
              }
              window.addEventListener('cartUpdated', function() {
                  loadCartSummary();
              });
              });
              window.updateCartDisplay = function() {
                  window.dispatchEvent(new Event('cartUpdated'));
              }
          </script>
      @endpush

      <style>
          .cart-badge {
              animation: pulse 0.5s ease-in-out;
          }
      </style>
