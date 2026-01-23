@extends('client.layouts')

@section('content')
<div class="container py-5">
    <div class="row">
        
        {{-- PHẦN 1: MENU BÊN TRÁI (Giống các trang profile khác) --}}
        <div class="col-md-3">
            @include('client.pages.profile.layout_menu')
        </div>

        {{-- PHẦN 2: NỘI DUNG SẢN PHẨM YÊU THÍCH (Bên phải) --}}
        <div class="col-md-9">
            <h3 class="mb-4">Sản phẩm yêu thích của bạn</h3>
            
            <div class="card border-0 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        @forelse($favorite as $item)
                            <div class="col-md-4 mb-4"> {{-- Đổi col-md-3 thành col-md-4 vì không gian hẹp hơn --}}
                                <div class="card h-100">
                                    {{-- Kiểm tra xem sản phẩm có ảnh không để tránh lỗi --}}
                                    <img src="{{ $item->avatar ?? asset('path/to/default-image.jpg') }}" class="card-img-top" alt="{{ $item->name }}" style="height: 200px; object-fit: cover;">
                                    
                                    <div class="card-body d-flex flex-column">
                                        <h5 class="card-title" style="font-size: 1rem;">{{ Str::limit($item->name, 40) }}</h5>
                                        <p class="card-text text-danger font-weight-bold">{{ number_format($item->price) }} VNĐ</p>
                                        
                                        <div class="mt-auto">
                                            <a href="{{ route('client.profile.favorite.toggle', $item->id) }}" class="btn btn-outline-danger btn-sm btn-block">
                                                <i class="fa fa-trash"></i> Bỏ thích
                                            </a>
                                            {{-- Có thể thêm nút xem chi tiết nếu cần --}}
                                            <a href="{{ route('products') }}" class="btn btn-primary btn-sm btn-block mt-2">
                                                Xem chi tiết
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12 text-center py-5">
                                <p class="text-muted">Bạn chưa có sản phẩm yêu thích nào.</p>
                                <a href="{{ route('products') }}" class="btn btn-primary">Khám phá sản phẩm ngay</a>
                            </div>
                        @endforelse
                    </div>

                    {{-- Phân trang --}}
                    <div class="d-flex justify-content-center mt-3">
                        {{ $favorite->links() }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection