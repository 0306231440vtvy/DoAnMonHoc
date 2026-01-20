function getCheckedItems() {
    return [...document.querySelectorAll('.check-item:checked')]
        .map(cb => cb.value);
}

function updateSummary() {
    const checkedItems = getCheckedItems();

    fetch('/cart/summary', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document
                .querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({ checked_items: checkedItems })
    })
    .then(res => res.json())
    .then(data => {
        document.getElementById('totalQuantity').innerText = data.totalQuantity;
        document.getElementById('totalPrice').innerText =
            Intl.NumberFormat().format(data.totalPrice);
    });
}
document.querySelectorAll('.check-item').forEach(cb => {
    cb.addEventListener('change', function () {
        const checkedItems = [...document.querySelectorAll('.check-item:checked')]
            .map(cb => cb.value);

        fetch('/cart/summary', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document
                    .querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                checked_items: checkedItems
            })
        })
        .then(res => res.json())
        .then(data => {
            console.log(data)
            document.getElementById('totalQuantity').innerText = data.totalQuantity;
            document.getElementById('totalPrice').innerText = new Intl.NumberFormat('vi-VN').format(data.totalPrice);
        });
    });
});

document.addEventListener('click', function (e) {
    if (!e.target.closest('.btn-plus') && !e.target.closest('.btn-minus')) return;

    const wrapper = e.target.closest('.quantity-group');
    const cartItemId = wrapper.dataset.id;
    const type = e.target.closest('.btn-plus') ? 'plus' : 'minus';

    fetch('/cart/update-quantity', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            cart_item_id: cartItemId,
            type: type
        })
    })
    .then(res => res.json())
    .then(data => {
        console.log(data)
        wrapper.querySelector('.qty-input').value = data.itemQuantity;

        const checkbox = wrapper
            .closest('.cart-item')
            ?.querySelector('.check-item');

        if (checkbox && checkbox.checked) {
            updateSummary();
        }
    });
});

document.addEventListener('click', function (e) {
    const btn = e.target.closest('.btn-delete-item');
    if (!btn) return;

    if (!confirm('Xóa sản phẩm này khỏi giỏ?')) return;

    fetch('/cart/delete', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            sanpham_id: btn.dataset.id
        })
    })
    .then(res => res.json())
    .then(() => {
        btn.closest('.cart-item').remove();
        updateSummary();
    });
});

document.getElementById('btn-clear-cart')?.addEventListener('click', function () {
    if (!confirm('Xóa toàn bộ giỏ hàng?')) return;

    fetch('/cart/clear', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content
        }
    })
    .then(res => res.json())
    .then(() => {
        document.querySelectorAll('.cart-item').forEach(i => i.remove());
        document.getElementById('totalQuantity').innerText = 0;
        document.getElementById('totalPrice').innerText = 0;
    });
});


document.addEventListener('click', function (e) {
    const btn = e.target.closest('#btnCheckout');
    if (!btn) return;

    const checkedItems = [...document.querySelectorAll('.check-item:checked')]
        .map(cb => cb.value);

    if (!checkedItems.length) {
        alert('Vui lòng chọn sản phẩm để thanh toán');
        return;
    }

    fetch('/cart/checkout', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN':
                document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            checked_items: checkedItems
        })
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.location.href = '/checkout';
        }
    });
});