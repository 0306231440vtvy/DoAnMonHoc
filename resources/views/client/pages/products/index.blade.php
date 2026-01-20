@extends('client.layouts')
@section('content')
    <div class="container py-4">
        <h1 class="h2 fw-bold mb-4 text-dark">Cửa Hàng</h1>
        @include('client.pages.products.components.shop-filter')
        <div class="d-flex flex-column gap-4">
            <div class="w-100">
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-2">
                    @if (isset($products) && count($products) > 0)
                        @foreach ($products as $item)
                            <div class="col">
                                <div class="card h-100 border-0 shadow-sm position-relative overflow-hidden"
                                    style="transition: all 0.3s ease;">
                                    <div class="position-relative" style="padding-bottom: 100%; overflow: hidden;">
                                        <a href="{{ route('client.products.show', $item->slug) }}"
                                            class="d-block position-absolute top-0 start-0 w-100 h-100">
                                            <img src="{{ $item->hinhnen }}" class="w-100 h-100 object-fit-cover"
                                                style="transition: transform 0.3s ease;" alt="{{ $item->tensp }}">
                                        </a>
                                        <div class="position-absolute d-inline-flex align-items-center justify-content-center"
                                            style="top: 8px; right: 8px; z-index: 10;">
                                            <span class="badge bg-danger text-white text-nowrap fw-semibold"
                                                style="font-size: 0.65rem; padding: 0.35rem 0.6rem; line-height: 1;">
                                                {{ $item->discount }}
                                            </span>
                                        </div>
                                        <button
                                            class="btn btn-light rounded-circle position-absolute d-flex align-items-center justify-content-center border-0 shadow-sm"
                                            style="top: 8px; left: 8px; width: 32px; height: 32px; padding: 0; opacity: 0; transition: opacity 0.3s ease; z-index: 10;">
                                            <i class="fa fa-heart text-danger" style="font-size: 0.75rem;"></i>
                                        </button>
                                    </div>

                                    <div class="card-body p-2">
                                        <a href="{{ route('client.products.show', $item->slug) }}"
                                            class="text-decoration-none">
                                            <h3 class="card-title mb-1 text-dark lh-sm"
                                                style="font-size: 0.875rem; font-weight: 500; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.5rem;">
                                                {{ $item->tensp }}
                                            </h3>
                                        </a>
                                        <div class="d-flex align-items-center mb-2 gap-1">
                                            <i class="fa fa-star text-warning"
                                                style="font-size: 0.7rem;">{{ $item->star }} </i>
                                        </div>

                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="d-flex flex-column">
                                                {{-- <span class="fw-bold"
                                                    style="color: #667eea; font-size: 0.875rem;">780,000đ</span> --}}
                                                <span class="text-muted text-decoration-line-through"
                                                    style="font-size: 0.75rem;">{{ $item->giaban }}</span>
                                            </div>
                                            <a href="cart.html"
                                                class="btn rounded-circle d-flex align-items-center justify-content-center p-0 border-0"
                                                style="background-color: #667eea; width: 32px; height: 32px; transition: background-color 0.3s ease;">
                                                <i class="fa fa-shopping-cart text-white" style="font-size: 0.75rem;"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center">Không tồn tại record này</div>
                    @endif

                </div>
                <div class="d-flex justify-content-center mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
