<div class="card">
    <form method="GET" action="{{ route('products') }}">
        <div class="card p-3">
            <input type="text" name="keyword" class="form-control mb-2" placeholder="Tìm theo tên hoặc mô tả"
                value="{{ request('keyword') }}">
            <select name="category_id" class="form-control mb-2">
                <option value="">-- Tất cả danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            <div class="row">
                <div class="col">
                    <input type="number" name="price_from" class="form-control" placeholder="Giá từ"
                        value="{{ request('price_from') }}">
                </div>
                <div class="col">
                    <input type="number" name="price_to" class="form-control" placeholder="Giá đến"
                        value="{{ request('price_to') }}">
                </div>
            </div>
            <button class="btn btn-primary w-100 mt-3">
                <i class="fa fa-filter"></i> Lọc sản phẩm
            </button>
        </div>
    </form>
</div>
