const provinceSelect = document.getElementById('province');
const wardSelect = document.getElementById('ward');

// Load tỉnh
fetch('/checkout/provinces')
    .then(res => res.json())
    .then(data => {
        data.forEach(p => {
            provinceSelect.innerHTML +=
                `<option value="${p.id}">${p.name}</option>`;
        });
    });
provinceSelect.addEventListener('change', function () {
    const province_Code = this.value;
    console.log(province_Code)
    wardSelect.innerHTML = '<option value="">-- Chọn xã --</option>';
    wardSelect.disabled = true;

    if (!province_Code) return;

    fetch(`/checkout/wards/${province_Code}`)
        .then(res => res.json())
        .then(data => {
            data.forEach(w => {
                wardSelect.innerHTML +=
                    `<option value="${w.id}">${w.name}</option>`;
            });
            wardSelect.disabled = false;
        });
});