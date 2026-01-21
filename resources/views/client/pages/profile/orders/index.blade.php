@extends('client.layouts')
@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-md-3">
            @include('client.pages.profile.layout_menu')
        </div>
        <div class="col-md-9">
            <h3>Đơn hàng của tôi</h3>
            {{-- Bộ lọc --}}
            <div class="mb-3">
                <a href="?status=all" class="btn btn-sm btn-outline-secondary">Tất cả</a>
                <a href="?status=1" class="btn btn-sm btn-outline-warning">Chờ duyệt</a>
                <a href="?status=3" class="btn btn-sm btn-outline-success">Hoàn thành</a>
            </div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã đơn</th>
                        <th>Ngày đặt</th>
                        <th>Trạng thái</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($orders as $item)
                    <tr>
                        <td>#{{ $item->id }}</td>
                        <td>{{ $item->created_at->format('d/m/Y') }}</td>
                        <td>
                            @if($item->trangthai == 1) <span class="text-warning">Chờ duyệt</span>
                            @elseif($item->trangthai == 3) <span class="text-success">Thành công</span>
                            @elseif($item->trangthai == 0) <span class="text-danger">Đã hủy</span>
                            @endif
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-info">Xem</a>
                            {{-- Nút hủy chỉ hiện khi chờ duyệt --}}
                            @if($item->trangthai == 1)
                                <form action="{{ route('client.profile.orders.cancel', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hủy đơn này?')">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Hủy</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection