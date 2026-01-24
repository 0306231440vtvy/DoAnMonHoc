@extends('client.layouts')
@section('content')
    <div class="container py-4 py-md-5">

        @if (count($carts) === 0)
            <div class="text-center my-5">
                <h4 class="text-muted">
                    <i class="fa fa-shopping-cart fa-2x mb-3"></i><br>
                    Giỏ hàng trống
                </h4>
                <a href="{{ route('products') }}" class="btn btn-success mt-3">
                    Tiếp tục mua sắm
                </a>
            </div>
        @else
            <div class="row g-4">
                <!-- LEFT -->
                <div class="col-lg-8">
                    @foreach ($carts as $cart)
                        <div class="bg-white rounded shadow-sm p-3 mb-3">
                            <div class="row align-items-center g-3">
                                <div class="col-1 text-center">
                                    <input type="checkbox" class="form-check-input cart-checkbox" name="cart_ids[]"
                                        value="{{ $cart['cart_id'] }}" checked>
                                </div>
                                <!-- IMAGE -->
                                <div class="col-3 col-md-2">
                                    <img src="{{ asset($cart['hinhnen']) }}" class="img-fluid rounded"
                                        style="height:80px; object-fit:cover;">
                                </div>
                                <!-- INFO -->
                                <div class="col-9 col-md-4">
                                    <h6 class="mb-1">{{ $cart['tensp'] }}</h6>
                                    <span class="text-success fw-bold">
                                        {{ number_format($cart['giaban']) }} ₫
                                    </span>
                                </div>
                                <!-- QUANTITY -->
                                <div class="col-md-3 d-flex align-items-center gap-2">
                                    {{-- TĂNG --}}
                                    <form action="{{ route('carts.update-quantity') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $cart['cart_id'] }}">
                                        <input type="hidden" name="type" value="increase">
                                        <button class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </form>
                                    {{-- GIẢM --}}
                                    <form action="{{ route('carts.update-quantity') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $cart['cart_id'] }}">
                                        <input type="hidden" name="type" value="decrease">
                                        <button class="btn btn-outline-secondary btn-sm">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </form>
                                    <span class="fw-bold">{{ $cart['cart_quantity'] }}</span>
                                </div>
                                <!-- SUBTOTAL -->
                                <div class="col-md-2 text-success fw-bold">
                                    {{ number_format($cart['subtotal']) }} ₫
                                </div>
                                <!-- DELETE -->
                                <div class="action-buttons-inline" style="display: flex; gap: 8px; align-items: center;">
                                    <form action="{{ route('carts.delete') }}" method="POST" style="margin: 0;"
                                        onsubmit="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">
                                        @csrf
                                        <input type="hidden" name="cart_id" value="{{ $cart['cart_id'] }}">
                                        <button type="submit" class="btn btn-danger btn-md">Xóa</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- SUMMARY -->
                    <div class="bg-light rounded p-3 mt-3">
                        <p class="mb-1">Tổng số lượng: <strong>{{ $totals['totalQuantity'] }}</strong></p>
                        <p class="mb-0">Tổng tiền:
                            <strong class="text-success">
                                {{ number_format($totals['totalAmount']) }} ₫
                            </strong>
                        </p>
                    </div>
                </div>
                <!-- RIGHT -->
                <div class="col-lg-4">
                    <div class="bg-white rounded shadow-sm p-4 absolute" style="top:100px">
                        <h5 class="fw-bold mb-3">Tổng đơn hàng</h5>

                        <div class="d-flex justify-content-between mb-3">
                            <span>Tạm tính</span>
                            <strong>{{ number_format($totals['totalAmount']) }} ₫</strong>
                        </div>
                        <form id="checkout-form" action="{{ route('thanh-toan.index') }}" method="GET">
                            <button type="submit" class="btn btn-success w-100 py-3 fw-bold mb-2">
                                Đặt hàng
                            </button>
                        </form>
                        <a href="{{ route('products') }}" class="btn btn-outline-secondary w-100">
                            Tiếp tục mua sắm
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkboxes = document.querySelectorAll('.cart-checkbox');
        const checkoutForm = document.getElementById('checkout-form');

        function updateTotals() {
            const selectedIds = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    selectedIds.push(parseInt(cb.value));
                }
            });
            // Update tổng tiền
            fetch('{{ route('carts.calculate-selected') }}', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        cart_ids: selectedIds
                    })
                })
                .then(res => res.json())
                .then(data => {
                    document.querySelector('.total-quantity').textContent = data.totalQuantity;
                    document.querySelectorAll('.total-amount').forEach(el => {
                        el.textContent = new Intl.NumberFormat('vi-VN').format(data.totalAmount) +
                            ' ₫';
                    });
                })
                .catch(err => console.error('Lỗi:', err));
        }
        checkboxes.forEach(cb => {
            cb.addEventListener('change', updateTotals);
        });
        // ✅ THÊM ĐOẠN NÀY: Khi submit form checkout, gửi cart_ids đã chọn
        checkoutForm.addEventListener('submit', function(e) {
            const selectedIds = [];
            checkboxes.forEach(cb => {
                if (cb.checked) {
                    selectedIds.push(cb.value);
                }
            });
            if (selectedIds.length === 0) {
                e.preventDefault();
                alert('Vui lòng chọn ít nhất 1 sản phẩm!');
                return;
            }
            // Thêm input hidden với cart_ids
            selectedIds.forEach(id => {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = 'cart_ids[]';
                input.value = id;
                checkoutForm.appendChild(input);
            });
        });
    });
</script>
