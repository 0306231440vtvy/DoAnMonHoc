{{-- resources/views/server/pages/products/components/varriants.blade.php --}}
<div class="col-lg-12">
    <div class="card">
        <div class="card-header">
            <label for="" class="d-flex align-items-center mb-0" style="gap: 10px">
                Sản phẩm có nhiều phiên bản
                <div class="form-check form-switch">
                    <input type="checkbox" class="form-check-input js-switch turnOnVariant" value="1"
                        name="has_attribute" id="customSwitch"
                        {{ old('has_attribute', optional($products)->has_attribute ?? 0) == 1 ? 'checked' : '' }}>
                    <label class="form-check-label" for="customSwitch"></label>
                </div>
            </label>
        </div>
        <div class="card-body">
            <div class="form-group mb-0">
                <div class="attribute_container_product">
                    <div class="form-group">
                        <div class="alert alert-primary">
                            <strong class="text-danger">*</strong> Cho phép bạn tạo nhiều phiên bản sản phẩm với các
                            thuộc tính khác nhau
                        </div>

                        <div
                            class="variant-wrapper {{ old('has_attribute', optional($products)->has_attribute ?? 0) == 1 ? '' : 'd-none' }}">
                            <div class="variant-body mb-3">
                                <div id="variantAttributesContainer">
                                    @if ($products && $products->sanpham_variants->count() > 0)
                                        @php
                                            // Lấy unique type_id từ tất cả variants
                                            $uniqueTypes = [];
                                            foreach ($products->sanpham_variants as $variant) {
                                                foreach ($variant->attributesValues as $attr) {
                                                    $typeId = $attr->bienthe_id;
                                                    if (!isset($uniqueTypes[$typeId])) {
                                                        $uniqueTypes[$typeId] = [];
                                                    }
                                                    $uniqueTypes[$typeId][] = $attr->id;
                                                }
                                            }
                                            foreach ($uniqueTypes as $typeId => $values) {
                                                $uniqueTypes[$typeId] = array_unique($values);
                                            }
                                        @endphp

                                        @php $attributeIndex = 0; @endphp

                                        @foreach ($uniqueTypes as $typeId => $valueIds)
                                            @php
                                                $attrType = $bienthe->firstWhere('id', $typeId);
                                            @endphp

                                            @if ($attrType)
                                                <div class="row mb-3 align-items-start variant-item"
                                                    id="attr-{{ $attributeIndex }}">
                                                    <div class="col-lg-3">
                                                        <label class="form-label">Chọn Thuộc Tính <span
                                                                class="text-danger">*</span></label>
                                                        <select class="form-control choose-attribute"
                                                            onchange="onTypeChange({{ $attributeIndex }})"
                                                            id="type-{{ $attributeIndex }}">
                                                            <option value="">-- Chọn Nhóm thuộc tính --</option>
                                                            @foreach ($bienthe as $type)
                                                                <option value="{{ $type->id }}"
                                                                    {{ $type->id == $typeId ? 'selected' : '' }}>
                                                                    {{ $type->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-lg-8">
                                                        <label class="form-label">Chọn Giá Trị (Click vào ô
                                                            vuông)</label>
                                                        <div class="checkbox-group"
                                                            id="value-container-{{ $attributeIndex }}">
                                                            @foreach ($attrType->bienthe_values as $value)
                                                                <div class="checkbox-item">
                                                                    <input type="checkbox"
                                                                        id="value-{{ $attributeIndex }}-{{ $value->id }}"
                                                                        name="variant-value-{{ $attributeIndex }}"
                                                                        value="{{ $value->id }}"
                                                                        data-value-name="{{ $value->value }}"
                                                                        {{ in_array($value->id, $valueIds) ? 'checked' : '' }}
                                                                        onchange="generateVariants()">
                                                                    <label
                                                                        for="value-{{ $attributeIndex }}-{{ $value->id }}">
                                                                        {{ $value->value }}
                                                                    </label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-1">
                                                        <label class="form-label">&nbsp;</label>
                                                        <button type="button"
                                                            class="btn btn-icon btn-danger w-100 h-100"
                                                            onclick="removeAttr({{ $attributeIndex }})">
                                                            <i class="fa fa-trash"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                @php $attributeIndex++; @endphp
                                            @endif
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="variant-foot mb-3">
                                <button type="button" class="btn btn-primary" id="addAttributeBtn">
                                    <i class="fa fa-plus"></i> Thêm thuộc tính
                                </button>
                            </div>

                            <div class="card product-variant mt-3">
                                <div class="card-header">
                                    Danh sách phiên bản sản phẩm
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table table-bordered mb-0" id="variantsTableContainer">
                                            <thead>
                                                <tr>
                                                    <th>Phiên bản</th>
                                                    <th>SKU</th>
                                                    <th>Giá (VNĐ)</th>
                                                    <th>Số lượng</th>
                                                    <th>Xóa</th>
                                                </tr>
                                            </thead>
                                            <tbody id="variantsTableBody">
                                                @if ($products && $products->sanpham_variants->count() > 0)
                                                    @foreach ($products->sanpham_variants as $index => $variant)
                                                        <tr data-variant-index="{{ $index }}">
                                                            <input type="hidden"
                                                                name="sanpham_variants[{{ $index }}][id]"
                                                                value="{{ $variant->id }}">
                                                            <td>
                                                                {{ $variant->attributesValues->pluck('value')->join(' - ') }}
                                                                @foreach ($variant->attributesValues as $attr)
                                                                    <input type="hidden"
                                                                        name="sanpham_variants[{{ $index }}][attributes][]"
                                                                        value="{{ $attr->id }}">
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                <input class="form-control" type="text"
                                                                    name="sanpham_variants[{{ $index }}][sku]"
                                                                    value="{{ $variant->sku }}" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="sanpham_variants[{{ $index }}][giaban]"
                                                                    value="{{ $variant->giaban }}" min="0"
                                                                    step="0.01" required>
                                                            </td>
                                                            <td>
                                                                <input type="number" class="form-control"
                                                                    name="sanpham_variants[{{ $index }}][soluong]"
                                                                    value="{{ $variant->soluong }}" min="0"
                                                                    required>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="removeVariantRow({{ $index }})">
                                                                    <i class="fa fa-trash"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @else
                                                    <tr id="emptyState">
                                                        <td colspan="5" class="text-center text-muted">
                                                            Chọn thuộc tính để tạo biến thể
                                                        </td>
                                                    </tr>
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .checkbox-group {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        max-height: 200px;
        overflow-y: auto;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        background: #f9f9f9;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        gap: 5px;
        flex: 0 0 auto;
    }

    .checkbox-item input[type="checkbox"] {
        cursor: pointer;
    }

    .checkbox-item label {
        margin: 0;
        cursor: pointer;
        user-select: none;
    }

    .variant-wrapper.d-none {
        display: none;
    }

    .variant-item {
        margin-bottom: 15px;
        padding-bottom: 15px;
        border-bottom: 1px solid #eee;
    }

    .variant-item:last-child {
        border-bottom: none;
    }
</style>

<script>
    const variantTypes = @json($bienthe ?? []);
    const baseSku = '{{ $products->sku ?? 'PROD' }}';
    const basePrice = document.getElementById('giaban')?.value || {{ $giaban ?? 0 }};

    const variantValues = {};
    variantTypes.forEach(t => {
        variantValues[t.id] = t.bienthe_values || [];
    });

    let attributeIndex = {{ $attributeIndex ?? 0 }};

    // Hàm tạo SKU unique
    function generateUniqueSku(attributes, baseSkuValue) {
        const suffix = attributes.map(a => {
            return a.value_name.substring(0, 3).toUpperCase().replace(/\s/g, '');
        }).join('-');

        return `${baseSkuValue}-${suffix}`;
    }

    function isSkuDuplicate(sku, currentIndex) {
        const allSkuInputs = document.querySelectorAll('input[name*="sanpham_variants"][name*="sku"]');
        let isDuplicate = false;

        allSkuInputs.forEach((input, idx) => {
            if (idx !== currentIndex && input.value === sku) {
                isDuplicate = true;
            }
        });

        return isDuplicate;
    }

    function ensureUniqueSku(baseSku, attributes, index) {
        let sku = generateUniqueSku(attributes, baseSku);
        let counter = 1;

        while (isSkuDuplicate(sku, index)) {
            sku = `${generateUniqueSku(attributes, baseSku)}-${counter}`;
            counter++;
        }

        return sku;
    }

    // Toggle variant wrapper
    document.getElementById('customSwitch').addEventListener('change', function() {
        const wrapper = document.querySelector('.variant-wrapper');
        if (this.checked) {
            wrapper.classList.remove('d-none');
        } else {
            wrapper.classList.add('d-none');
        }
    });

    document.getElementById('addAttributeBtn').addEventListener('click', addAttributeRow);

    function onTypeChange(id) {
        const typeId = document.getElementById(`type-${id}`).value;
        const container = document.getElementById(`value-container-${id}`);
        container.innerHTML = '';

        if (!typeId) {
            generateVariants();
            return;
        }

        const values = variantValues[typeId] || [];

        values.forEach((v) => {
            const checkboxDiv = document.createElement('div');
            checkboxDiv.className = 'checkbox-item';
            checkboxDiv.innerHTML = `
                <input 
                    type="checkbox" 
                    id="value-${id}-${v.id}" 
                    name="variant-value-${id}" 
                    value="${v.id}" 
                    data-value-name="${v.value}"
                    data-type-id="${typeId}"
                    onchange="generateVariants()">
                <label for="value-${id}-${v.id}">${v.value}</label>
            `;
            container.appendChild(checkboxDiv);
        });

        generateVariants();
    }

    function removeAttr(id) {
        const row = document.getElementById(`attr-${id}`);
        if (row) {
            row.remove();
            generateVariants();
        }
    }

    function removeVariantRow(index) {
        const row = document.querySelector(`tr[data-variant-index="${index}"]`);
        if (row) {
            row.remove();
            updateVariantIndices();
        }
    }

    function updateVariantIndices() {
        const rows = document.querySelectorAll('#variantsTableBody tr[data-variant-index]');
        rows.forEach((row, newIndex) => {
            row.setAttribute('data-variant-index', newIndex);

            row.querySelectorAll('input').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    const newName = name.replace(/\[\d+\]/, `[${newIndex}]`);
                    input.setAttribute('name', newName);
                }
            });

            const deleteBtn = row.querySelector('button[onclick]');
            if (deleteBtn) {
                deleteBtn.setAttribute('onclick', `removeVariantRow(${newIndex})`);
            }
        });
    }

    function cartesian(arr) {
        return arr.reduce((a, b) => a.flatMap(d => b.map(e => [].concat(d, e))));
    }

    function generateVariants() {
        const groups = [];

        document.querySelectorAll('[id^="attr-"]').forEach(row => {
            const id = row.id.split('-')[1];
            const type = document.getElementById(`type-${id}`);

            if (!type || !type.value) return;

            const checkboxes = document.querySelectorAll(`input[name="variant-value-${id}"]:checked`);
            const selected = Array.from(checkboxes).map(cb => ({
                bienthe_value_id: cb.value,
                value_name: cb.getAttribute('data-value-name'),
                type_id: cb.getAttribute('data-type-id') || type.value
            }));

            if (selected.length > 0) {
                groups.push(selected);
            }
        });

        if (!groups.length) {
            document.getElementById('emptyState').style.display = 'table-row';
            document.querySelectorAll('#variantsTableBody tr[data-variant-index]').forEach(el => el.remove());
            return;
        }

        document.getElementById('emptyState').style.display = 'none';
        const combos = cartesian(groups);
        renderVariants(combos);
    }

    function addAttributeRow() {
        const id = attributeIndex++;
        const div = document.createElement('div');
        div.className = 'row mb-3 align-items-start variant-item';
        div.id = `attr-${id}`;

        div.innerHTML = `
            <div class="col-lg-3">
                <label class="form-label">Chọn Thuộc Tính <span class="text-danger">*</span></label>
                <select class="form-control choose-attribute" onchange="onTypeChange(${id})" id="type-${id}">
                    <option value="">-- Chọn Nhóm thuộc tính --</option>
                    ${variantTypes.map(t => `<option value="${t.id}">${t.name}</option>`).join('')}
                </select>
            </div>

            <div class="col-lg-8">
                <label class="form-label">Chọn Giá Trị (Click vào ô vuông)</label>
                <div class="checkbox-group" id="value-container-${id}">
                    <p class="text-muted" style="width: 100%; margin: 0;">Chọn thuộc tính trước</p>
                </div>
            </div>

            <div class="col-lg-1">
                <label class="form-label">&nbsp;</label>
                <button type="button" class="btn btn-icon btn-danger w-100 h-100" onclick="removeAttr(${id})">
                    <i class="fa fa-trash"></i>
                </button>
            </div>
        `;

        document.getElementById('variantAttributesContainer').appendChild(div);
    }

    function renderVariants(combos) {
        const tbody = document.getElementById('variantsTableBody');
        const existingRows = document.querySelectorAll('#variantsTableBody tr[data-variant-index]');

        // Lưu data của các row hiện có
        const existingData = [];
        existingRows.forEach(row => {
            const variantId = row.querySelector('input[name*="[id]"]')?.value;
            const sku = row.querySelector('input[name*="[sku]"]')?.value;
            const giaban = row.querySelector('input[name*="[giaban]"]')?.value;
            const soluong = row.querySelector('input[name*="[soluong]"]')?.value;
            const attributes = Array.from(row.querySelectorAll('input[name*="[attributes]"]'))
                .map(inp => inp.value)
                .sort()
                .join(',');

            existingData.push({
                variantId,
                sku,
                giaban,
                soluong,
                attributes
            });
        });

        // Xóa tất cả rows cũ
        existingRows.forEach(el => el.remove());

        const currentBaseSku = document.getElementById('sku')?.value || baseSku;

        combos.forEach((attrs, i) => {
            const name = attrs.map(a => a.value_name).join(' - ');

            // Match với data cũ
            const newAttributes = attrs.map(a => a.bienthe_value_id).sort().join(',');
            const existingMatch = existingData.find(d => d.attributes === newAttributes);

            // Tạo SKU
            const uniqueSku = existingMatch && existingMatch.sku ?
                existingMatch.sku :
                ensureUniqueSku(currentBaseSku, attrs, i);

            // Tạo attribute inputs
            let attributeInputs = '';
            attrs.forEach(a => {
                attributeInputs += `
                    <input type="hidden" 
                           name="sanpham_variants[${i}][attributes][]" 
                           value="${a.bienthe_value_id}">
                `;
            });

            const row = document.createElement('tr');
            row.setAttribute('data-variant-index', i);
            row.innerHTML = `
                ${existingMatch && existingMatch.variantId ? `<input type="hidden" name="sanpham_variants[${i}][id]" value="${existingMatch.variantId}">` : ''}
                <td>
                    ${name}
                    ${attributeInputs}
                </td>
                <td>
                    <input class="form-control" type="text" 
                           name="sanpham_variants[${i}][sku]" 
                           value="${uniqueSku}" 
                           required>
                </td>
                <td>
                    <input type="number" class="form-control" 
                           name="sanpham_variants[${i}][giaban]" 
                           value="${existingMatch ? existingMatch.giaban : basePrice}" 
                           min="0" step="0.01" required>
                </td>
                <td>
                    <input type="number" class="form-control" 
                           name="sanpham_variants[${i}][soluong]" 
                           value="${existingMatch ? existingMatch.soluong : 0}" 
                           min="0" required>
                </td>
                <td>
                    <button type="button" class="btn btn-sm btn-danger" onclick="removeVariantRow(${i})">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            `;
            tbody.appendChild(row);
        });
    }

    const giaInput = document.getElementById('giaban');
    if (giaInput) {
        giaInput.addEventListener('change', function() {
            document.querySelectorAll('input[name*="sanpham_variants"][name*="giaban"]').forEach(el => {
                if (el.value === '0' || el.value === '') {
                    el.value = this.value;
                }
            });
        });
    }
</script>
