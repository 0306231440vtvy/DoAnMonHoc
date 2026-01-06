@extends('server.layout')

@section('title', 'Danh sách sản phẩm')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">Quản lý Sản phẩm</h6>
        {{-- <a href="{{ route('admin.product.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle"></i> Thêm mới
        </a> --}}
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class="bg-light text-center">
                    <tr>
                        <th width="5%">ID</th>
                        <th width="10%">Hình ảnh</th>
                        <th width="25%">Tên sản phẩm</th>
                        <th width="15%">Danh mục / Thương hiệu</th>
                        <th width="10%">Giá bán</th>
                        <th width="10%">Tồn kho</th>
                        <th width="10%">Trạng thái</th>
                        <th width="15%">Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    
                    {{-- @foreach ($products as $item)
                    <tr>
                        <td class="text-center">{{ $item->id }}</td>
                        <td class="text-center">
                            <img src="{{ asset('uploads/products/' . $item->hinhanh) }}" 
                                 alt="{{ $item->tensp }}" class="img-thumbnail" style="width: 80px; height: 80px; object-fit: cover;">
                        </td>
                        <td>
                            <span class="fw-bold">{{ $item->tensp }}</span>
                            <br>
                            <small class="text-muted">Slug: {{ $item->slug }}</small>
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $item->category->name ?? 'N/A' }}</span>
                            <br>
                            <small>{{ $item->brand->tenth ?? 'N/A' }}</small>
                        </td>
                        <td class="text-end text-danger fw-bold">
                            {{ number_format($item->giaban, 0, ',', '.') }} đ
                        </td>
                        <td class="text-center">
                            {{ $item->soluong }}
                        </td>
                        <td class="text-center">
                            @if($item->trangthai == 1)
                                <span class="badge bg-success">Hiển thị</span>
                            @else
                                <span class="badge bg-secondary">Đang ẩn</span>
                            @endif
                        </td> --}}
                        {{-- <td class="text-center">
                            <a href="{{ route('admin.product.edit', $item->id) }}" class="btn btn-warning btn-sm" title="Sửa">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.product.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" title="Xóa">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </td> --}}
                    {{-- </tr>
                    @endforeach --}}
                </tbody>
            </table>
            {{-- <div class="d-flex justify-content-end">
                {{ $products->links() }}
            </div> --}}
        </div>
    </div>
</div>
@endsection