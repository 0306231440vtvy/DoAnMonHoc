{{-- resources/views/client/partials/product-card.blade.php --}}
@php
    $giaGoc = $product->giaban ?? 0;
    $discount = $product->discount ?? 0;
    $giaSauGiam = $giaGoc - ($giaGoc * $discount) / 100;

    $hinhAnh = $product->hinhnen ?? asset('client/img/product-default.jpg');
    $tenSP = $product->tensp ?? 'Sản phẩm';
    $productUrl = route('client.products.show', $product->slug);

    $tonKho = 0;
    if ($product->has_attribute && $product->sanpham_variants) {
        $tonKho = $product->sanpham_variants->sum('soluong');
    }

    if ($product->has_attribute && $tonKho > 0) {
        $product->load('sanpham_variants.attributesValues.bienthe');
    }
@endphp

<div class="col">
    <div class="card h-100 shadow-sm">

        {{-- IMAGE --}}
        <div class="position-relative product-image-wrapper" style="height:180px">
            <a href="{{ $productUrl }}">
                <img src="{{ $hinhAnh }}" class="card-img-top" style="height:100%;object-fit:cover">
            </a>

            {{-- QUICK ADD --}}
            @if ($tonKho > 0)
                <div class="attribute-popover-hover" id="popover{{ $product->id }}">

                    @php
                        // GROUP ATTRIBUTES BY TYPE ID (FIX CHUẨN)
                        $attrsByType = [];
                        foreach ($product->sanpham_variants as $variant) {
                            foreach ($variant->attributesValues as $av) {
                                $attrsByType[$av->bienthe_id][$av->id] = $av;
                            }
                        }
                    @endphp

                    @foreach ($attrsByType as $bientheId => $values)
                        <div class="mb-2">
                            <div class="fw-bold small mb-1">
                                {{ $values[array_key_first($values)]->bienthe->type }}
                            </div>

                            <div class="d-flex flex-wrap gap-1">
                                @foreach ($values as $attr)
                                    <button type="button" class="attr-btn-hover"
                                        data-attr-type="attr_{{ $bientheId }}" data-attr-id="{{ $attr->id }}">
                                        {{ $attr->value }}
                                    </button>
                                @endforeach
                            </div>
                        </div>
                    @endforeach

                    <div id="popoverError{{ $product->id }}" class="text-danger small mt-1 d-none">
                        Vui lòng chọn đủ tuỳ chọn
                    </div>

                    <button class="btn btn-primary w-100 mt-2" onclick="quickAddToCartHover('{{ $product->id }}')">
                        <i class="fa fa-shopping-cart"></i> Thêm vào giỏ
                    </button>
                </div>
            @endif
        </div>

        {{-- INFO --}}
        <div class="card-body p-2">
            <a href="{{ $productUrl }}" class="text-decoration-none">
                <h6 class="mb-1 text-dark">{{ $tenSP }}</h6>
            </a>

            <div class="fw-bold text-primary">
                {{ number_format($giaSauGiam, 0, ',', '.') }}đ
            </div>
        </div>
    </div>
</div>

{{-- ================= VARIANT MAP + SCRIPT ================= --}}
<script>
    /**
     * MAP BIẾN THỂ
     * KEY: attr_<bienthe_id>:<value_id>|...
     */
    window.productVariantMapByAttrs{{ $product->id }} = {
        @foreach ($product->sanpham_variants as $variant)
            @php
                $pairs = [];
                foreach ($variant->attributesValues as $av) {
                    $pairs[] = 'attr_' . $av->bienthe_id . ':' . $av->id;
                }
                sort($pairs);
                $key = implode('|', $pairs);
            @endphp
                "{{ $key }}": "{{ $variant->sku }}",
        @endforeach
    };

    // CLICK ATTRIBUTE
    document.addEventListener('click', function(e) {
        if (!e.target.classList.contains('attr-btn-hover')) return;

        const type = e.target.dataset.attrType;
        const popover = e.target.closest('.attribute-popover-hover');

        popover.querySelectorAll(`[data-attr-type="${type}"]`)
            .forEach(b => b.classList.remove('active'));

        e.target.classList.add('active');
    });

    // ADD TO CART
    function quickAddToCartHover(productId) {
        const popover = document.getElementById('popover' + productId);
        const errorMsg = document.getElementById('popoverError' + productId);
        const variantMap = window['productVariantMapByAttrs' + productId];

        const selected = {};
        popover.querySelectorAll('.attr-btn-hover.active').forEach(btn => {
            selected[btn.dataset.attrType] = btn.dataset.attrId;
        });

        const requiredTypes = Object.keys(variantMap)[0]
            .split('|')
            .map(p => p.split(':')[0]);

        if (Object.keys(selected).length !== requiredTypes.length) {
            errorMsg.classList.remove('d-none');
            return;
        }

        const key = Object.entries(selected)
            .map(([t, v]) => `${t}:${v}`)
            .sort()
            .join('|');

        const sku = variantMap[key];
        if (!sku) {
            errorMsg.classList.remove('d-none');
            return;
        }

        errorMsg.classList.add('d-none');

        fetch('/gio-hang/add-to-cart', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({
                    sku: sku,
                    soluong: 1
                })
            })
            .then(r => r.json())
            .then(d => alert(d.message || 'Đã thêm vào giỏ'));
    }
</script>

<style>
    .product-image-wrapper:hover .attribute-popover-hover {
        opacity: 1;
        pointer-events: auto;
    }

    .attribute-popover-hover {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: #fff;
        padding: 10px;
        opacity: 0;
        pointer-events: none;
        transition: .25s;
    }

    .attr-btn-hover {
        border: 1px solid #ccc;
        background: #fff;
        padding: 4px 10px;
        font-size: 11px;
        cursor: pointer;
    }

    .attr-btn-hover.active {
        background: #0d6efd;
        color: #fff;
        border-color: #0d6efd;
    }
</style>
