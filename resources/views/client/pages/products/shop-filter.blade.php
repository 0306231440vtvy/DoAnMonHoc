<div class="card border-0 shadow-sm mb-4 bg-light">
    <div class="card-body p-3">
        <form action="{{ route('client.search') }}" method="GET" class="row g-2 align-items-end">
            <div class="col-md-4">
                <label class="form-label small fw-bold">Từ khóa (Tên, mô tả)</label>
                <input type="text" name="keyword" class="form-control form-control-sm" 
                       placeholder="Tìm kiếm..." value="{{ $keyword ?? request('keyword') }}" 
                       autocomplete="off" spellcheck="false"> {{-- Tắt autocomplete để sửa lỗi xóa chữ --}}
            </div>
            
            <div class="col-md-3">
                <label class="form-label small fw-bold">Danh mục</label>
                <select name="category_id" class="form-select form-select-sm">
                    <option value="">-- Tất cả danh mục --</option>
                    @if(isset($categories)) {{-- Kiểm tra biến để tránh lỗi 500 --}}
                        @foreach ($categories as $cat)
                            <option value="{{ $cat->id }}" {{ request('category_id') == $cat->id ? 'selected' : '' }}>
                                {{ $cat->name }} {{-- Kiểm tra lại cột này là 'name' hay 'ten_danhmuc' --}}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>

            <div class="col-md-3">
                <label class="form-label small fw-bold">Khoảng giá</label>
                <div class="input-group input-group-sm">
                    <input type="number" name="min_price" class="form-control" placeholder="Từ" value="{{ request('min_price') }}">
                    <input type="number" name="max_price" class="form-control" placeholder="Đến" value="{{ request('max_price') }}">
                </div>
            </div>

            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-sm w-100 fw-bold">LỌC</button>
            </div>
        </form>
    </div>
</div>