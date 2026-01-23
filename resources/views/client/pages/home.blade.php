@extends('client.layouts')
@section('content')
    <div class="container my-5">
        <div id="carouselExampleCaptions" class="carousel slide mx-auto" style="max-width: 900px;">
            <div class="carousel-indicators">
                @foreach ($slide as $index => $item)
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="{{ $index }}"
                        class="{{ $index == 0 ? 'active' : '' }}" aria-current="{{ $index == 0 ? 'true' : 'false' }}"
                        aria-label="Slide {{ $index + 1 }}"></button>
                @endforeach
            </div>
            <div class="carousel-inner rounded-3 shadow-lg">
                @foreach ($slide as $index => $item)
                    <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                        <a href="{{ $item->linklienket }}">
                            <img src="{{ asset('client/img/' . basename($item->hinhthunho)) }}" class="d-block w-100"></a>
                        <div class="carousel-caption d-none d-md-block">
                            <h5>{{ $item->tieude }}</h5>
                            <p>{{ $item->mota }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="container py-4">
        <h1 class="h2 fw-bold mb-4 text-dark">Cửa Hàng</h1>
        <div class="d-flex flex-column gap-4">
            <div class="w-100">
                <div class="bg-white p-2 rounded shadow-sm mb-3 d-flex justify-content-between align-items-center">
                    <p class="text-secondary mb-0" style="font-size: 0.75rem;">Hiển thị <span class="fw-semibold">5</span>
                        sản
                        phẩm</p>
                    <select class="form-select form-select-sm" style="width: auto; font-size: 0.75rem;">
                        <option>Sắp xếp mặc định</option>
                        <option>Giá: Thấp đến Cao</option>
                        <option>Giá: Cao đến Thấp</option>
                        <option>Mới nhất</option>
                        <option>Bán chạy nhất</option>
                    </select>
                </div>



                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2">
                    @foreach($newProducts as $item) 
                        <div class="col">
                            <div class="card h-100 shadow-sm border-0 position-relative overflow-hidden product-card">
                                
                                {{-- Logic kiểm tra tồn kho --}}
                                @php $totalStock = $item->variants->sum('soluong'); @endphp

                                {{-- Nhãn HẾT HÀNG chỉ hiện khi số lượng = 0 --}}
                                @if($totalStock <= 0)
                                    <div class="position-absolute top-0 end-0 m-2" style="z-index: 10;">
                                        <span class="badge bg-danger shadow-sm px-2 py-1" style="font-size: 10px;">HẾT HÀNG</span>
                                    </div>
                                @endif

                                <a href="{{ route('client.products.show', $item->id) }}" class="text-decoration-none">
                                    {{-- Hình ảnh sản phẩm --}}
                                    <div class="img-wrapper">
                                        <img src="{{ asset('client/img/' . basename($item->hinhnen)) }}" 
                                            class="card-img-top {{ $totalStock <= 0 ? 'opacity-50 grayscale' : '' }}" 
                                            alt="{{ $item->tensp }}"
                                            style="aspect-ratio: 1/1; object-fit: cover;">
                                    </div>

                                    {{-- Thông tin Tên và Giá --}}
                                    <div class="card-body p-2">
                                        <h6 class="text-dark mb-1 fw-normal small text-truncate-2" style="height: 38px; line-height: 1.4;">
                                            {{ $item->tensp }}
                                        </h6>

                                        <div class="d-flex align-items-center">
                                            <span class="text-dark fw-bold fs-6">
                                                {{ number_format($item->variants->first()->giaban ?? 0, 0, ',', '.') }}đ
                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <style>
                    /* Ép tên sản phẩm hiển thị 2 dòng để các ô luôn đều nhau */
                    .text-truncate-2 {
                        display: -webkit-box;
                        -webkit-line-clamp: 2;
                        -webkit-box-orient: vertical;
                        overflow: hidden;
                    }

                    /* Hiệu ứng xám ảnh khi hết hàng */
                    .grayscale {
                        filter: grayscale(1);
                    }

                    .product-card {
                        transition: transform 0.2s ease;
                    }

                    .product-card:hover {
                        transform: translateY(-3px);
                    }

                    .img-wrapper {
                        overflow: hidden;
                    }
                </style>



                
            </div>
        @endsection
