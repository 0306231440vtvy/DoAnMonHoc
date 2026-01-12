@extends('server.layout')
@section('title', 'Sản phẩm')
@section('content')
    <div class="card">
        <h1 class="text-center">Quản Lý Sản Phẩm</h1>
        <a href="{{ route('products.create') }}" class="btn btn-primary">Thêm Sản Phẩm</a>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table">
                    @if (isset($products) && count($products) > 0)
                        <thead>
                            <tr class="info">
                                <th>Mã SP</th>
                                <th>Tên Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Trạng thái</th>
                                {{-- <th>Danh Mục</th> --}}
                                <th>Hành Động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @include('server.pages.products.components.table')
                        </tbody>
                    @else
                        <div class="text-center text-danger lead">Không tồn tại record</div>
                    @endif
                </table>
            </div>
        </div>
    </div>
@endsection
